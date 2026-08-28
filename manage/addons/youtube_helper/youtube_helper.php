<?php
/*
    YouTube Helper Addon for CouchCMS
*/

if( !defined('K_COUCH_DIR') ) die();

global $FUNCS;

/*------------------------------------------------------------------------------
    Extract YouTube Video ID
------------------------------------------------------------------------------*/
if( !function_exists('youtube_extract_id') ){
    function youtube_extract_id( $data ){
        $data = trim($data);
        if( $data === '' ) return false;

        // Direct 11-char ID
        if( strlen($data) === 11 && preg_match('/^[a-zA-Z0-9_-]+$/', $data) ){
            return $data;
        }

        // Parse URL
        $parts = @parse_url($data);
        if( $parts && isset($parts['host']) ){

            // watch?v=ID
            if( !empty($parts['query']) ){
                parse_str($parts['query'], $query);
                if( !empty($query['v']) && preg_match('/^[a-zA-Z0-9_-]{11}$/', $query['v']) ){
                    return $query['v'];
                }
            }

            // /embed/ID, /v/ID, /shorts/ID
            if( !empty($parts['path']) ){
                if( preg_match('~/(?:embed|v|shorts)/([a-zA-Z0-9_-]{11})~', $parts['path'], $m) ){
                    return $m[1];
                }

                // youtu.be/ID
                if( stripos($parts['host'], 'youtu.be') !== false ){
                    $segments = explode('/', trim($parts['path'], '/'));
                    if( !empty($segments[0]) && preg_match('/^[a-zA-Z0-9_-]{11}$/', $segments[0]) ){
                        return $segments[0];
                    }
                }
            }
        }

        // Regex fallback
        if( preg_match('~(?:v=|youtu\.be/|embed/|shorts/)([a-zA-Z0-9_-]{11})~', $data, $m) ){
            return $m[1];
        }

        return false;
    }
}

/*------------------------------------------------------------------------------
    Safe cURL HEAD checker (2s timeout)
------------------------------------------------------------------------------*/
if( !function_exists('youtube_safe_head') ){
    function youtube_safe_head( $url ){
        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_NOBODY         => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT        => 2,
            CURLOPT_CONNECTTIMEOUT => 2,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        ]);

        curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ($status == 200);
    }
}

/*------------------------------------------------------------------------------
    File-Based Cache Functions (Stored in /couch/data/)
------------------------------------------------------------------------------*/
function yt_cache_get($id){
    $file = K_SNIPPETS_DIR . "data/youtube_cache_{$id}.json";
    if( !file_exists($file) ) return false;

    $json = json_decode( file_get_contents($file), true );
    if( !$json || !isset($json['url']) || !isset($json['time']) ) return false;

    if( time() - $json['time'] > 7*24*3600 ) return false;

    return $json['url'];
}

function yt_cache_set($id, $url){
    $file = K_SNIPPETS_DIR . "data/youtube_cache_{$id}.json";
    $data = [
        'url'  => $url,
        'time' => time(),
    ];
    @file_put_contents($file, json_encode($data));
}

/*------------------------------------------------------------------------------
    <cms:youtube_id />
------------------------------------------------------------------------------*/
$FUNCS->register_tag( 'youtube_id', 'k_youtube_id' );
function k_youtube_id( $params, $node ){
    global $FUNCS;
    extract( $FUNCS->get_named_vars(['data'=>''], $params) );
    $id = youtube_extract_id($data);
    return $id ? $id : '';
}

/*------------------------------------------------------------------------------
    <cms:youtube_url />
------------------------------------------------------------------------------*/
$FUNCS->register_tag( 'youtube_url', 'k_youtube_url' );
function k_youtube_url( $params, $node ){
    global $FUNCS;
    extract( $FUNCS->get_named_vars(['data'=>''], $params) );
    $id = youtube_extract_id($data);
    return $id ? "https://www.youtube.com/watch?v={$id}" : trim($data);
}

/*------------------------------------------------------------------------------
    <cms:youtube_embed_url />
------------------------------------------------------------------------------*/
$FUNCS->register_tag( 'youtube_embed_url', 'k_youtube_embed_url' );
function k_youtube_embed_url( $params, $node ){
    global $FUNCS;
    extract( $FUNCS->get_named_vars(['data'=>''], $params) );

    $id = youtube_extract_id($data);
    if( !$id ) return '';

    $nocookie = (!empty($params['nocookie']) ? 1 : 0);

    $base = $nocookie
        ? "https://www.youtube-nocookie.com/embed/"
        : "https://www.youtube.com/embed/";

    return $base.$id;
}

/*------------------------------------------------------------------------------
    <cms:youtube_thumbnail />
    ✔ caching
    ✔ automatic fallback
    ✔ safe cURL
    ✔ smart + fast modes
------------------------------------------------------------------------------*/
$FUNCS->register_tag( 'youtube_thumbnail', 'k_youtube_thumbnail' );
function k_youtube_thumbnail( $params, $node ){
    global $FUNCS;

    extract( $FUNCS->get_named_vars(
        array(
            'data'    => '',
            'default' => K_COUCH_DIR.'addons/youtube_helper/placeholder.jpg',
            'mode'    => 'smart',
            'size'    => 'hq',
        ),
        $params
    ));

    $id = youtube_extract_id($data);
    if( !$id ) return $default;

    /* FAST MODE (no network calls) */
    if( strtolower($mode) === 'fast' ){
        $map = [
            'maxres'  => 'maxresdefault.jpg',
            'sd'      => 'sddefault.jpg',
            'hq'      => 'hqdefault.jpg',
            'mq'      => 'mqdefault.jpg',
            'default' => 'default.jpg',
        ];
        $file = $map[$size] ?? 'hqdefault.jpg';
        return "https://img.youtube.com/vi/{$id}/{$file}";
    }

    /* SMART MODE CACHE CHECK */
    $cached = yt_cache_get($id);
    if( $cached ) return $cached;

    /* FALLBACK CHAIN */
    $fallback_order = [
        'maxresdefault.jpg',
        'sddefault.jpg',
        'hqdefault.jpg',
        'mqdefault.jpg',
        'default.jpg',
    ];

    $final = $default;

    foreach( $fallback_order as $file ){
        $url = "https://img.youtube.com/vi/{$id}/{$file}";
        if( youtube_safe_head($url) ){
            $final = $url;
            break;
        }
    }

    /* SAVE CACHE */
    yt_cache_set($id, $final);

    return $final;
}

/*------------------------------------------------------------------------------
    <cms:youtube_iframe />
------------------------------------------------------------------------------*/
$FUNCS->register_tag( 'youtube_iframe', 'k_youtube_iframe' );
function k_youtube_iframe( $params, $node ){
    global $FUNCS;

    extract( $FUNCS->get_named_vars(
        array(
            'data'     => '',
            'width'    => '560',
            'height'   => '315',
            'autoplay' => '0',
            'controls' => '1',
            'mute'     => '0',
            'loop'     => '0',
            'rel'      => '0',
            'class'    => '',
            'nocookie' => '0',
        ),
        $params
    ));

    $id = youtube_extract_id($data);
    if( !$id ) return '';

    $base = ($nocookie ? 'https://www.youtube-nocookie.com' : 'https://www.youtube.com');

    $src = "{$base}/embed/{$id}?autoplay={$autoplay}&controls={$controls}&mute={$mute}&loop={$loop}&rel={$rel}";

    if( $loop === '1' ){
        $src .= "&playlist={$id}";
    }

    $class_attr = $class ? ' class="'.htmlspecialchars($class).'"' : '';

    return '<iframe'
        .$class_attr
        .' width="'.htmlspecialchars($width).'"'
        .' height="'.htmlspecialchars($height).'"'
        .' src="'.htmlspecialchars($src).'"'
        .' frameborder="0"'
        .' allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"'
        .' allowfullscreen></iframe>';
}

?>
