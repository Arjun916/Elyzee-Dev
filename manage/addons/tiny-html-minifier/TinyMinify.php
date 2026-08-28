<?php

if( ! defined('K_COUCH_DIR') ) die(); // cannot be loaded directly
if( ! class_exists('TinyHtmlMinifier') ) require_once( K_ADDONS_DIR.'tiny-html-minifier/TinyHtmlMinifier.php' );

class TinyMinify
{

    public static function tiny_minify($params, $node)
    {
        global $FUNCS;

        $options = $FUNCS->get_named_vars(
            array(
                'disable_comments' => 0,
                'collapse_whitespace' => 0,
            ), $params);

        $options = array_map( function(&$option){ return (bool) $option; }, $options);
        $options['disable_comments'] ^= 1;

        foreach ($node->children as $child) {
            $html .= $child->get_HTML();
        }

        $minifier = new TinyHtmlMinifier($options);
        return $minifier->tiny_minify($html);
    }

    public static function tiny_minify_page( $params, $node )
    {
        global $FUNCS, $PAGE;
        if( count($node->children) ) {die("ERROR: Tag \"".$node->name."\" is a self closing tag");}

        $options = $FUNCS->get_named_vars(
                       array(
                              'disable_comments' => 0,
                              'collapse_whitespace' => 0,
                             ),
                       $params
                    );

        $options = array_map( function(&$option){ return (bool) $option; }, $options);
        $options['disable_comments'] ^= 1;

        $PAGE->tiny_minify = 1;
        $PAGE->tiny_minify_options = $options;
    }

    public static function alter_tiny_minify(&$html, $PAGE, $k_cache_file, $redirect_url, $content_type_header)
    {
        if( ! is_null($redirect_url) ){ return; }

        // comment following to always compress all pages without tag
        if( ! isset($PAGE->tiny_minify) || $PAGE->tiny_minify !== 1 ){ return; }

        $minifier = new TinyHtmlMinifier( (array) $PAGE->tiny_minify_options );
        $html = $minifier->tiny_minify($html);
    }

}

$FUNCS->register_tag( 'tiny_minify', array('TinyMinify', 'tiny_minify') );
$FUNCS->register_tag( 'tiny_minify_page', array('TinyMinify', 'tiny_minify_page') );
$FUNCS->add_event_listener( 'alter_final_page_output', array('TinyMinify', 'alter_tiny_minify') );
