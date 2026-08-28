<?php
if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

require_once( K_COUCH_DIR.'addons/cart/cart.php' );
require_once( K_COUCH_DIR.'addons/data-bound-form/data-bound-form.php' );

//require_once( K_COUCH_DIR.'addons/inline/inline.php' );
require_once( K_COUCH_DIR.'addons/extended/extended-folders.php' );
//require_once( K_COUCH_DIR.'addons/extended/extended-comments.php' );
require_once( K_COUCH_DIR.'addons/extended/extended-users.php' );
require_once( K_COUCH_DIR.'addons/routes/routes.php' );
require_once( K_COUCH_DIR.'addons/jcropthumb/jcropthumb.php' );
//require_once( K_COUCH_DIR.'addons/page-builder/page-builder.php' );
//require_once( K_COUCH_DIR.'addons/sub-templates/sub-templates.php' );

require_once( K_COUCH_DIR.'addons/minify-js-css/minify.php' );
require_once( K_COUCH_DIR.'addons/tiny-html-minifier/TinyMinify.php' );
require_once( K_COUCH_DIR.'addons/copy-to-new/copy-to-new.php' );
require_once( K_COUCH_DIR.'addons/phpmailer/phpmailer.php' );
require_once( K_COUCH_DIR.'addons/multi-lang/multi-lang.php' );
require_once( K_COUCH_DIR.'addons/color-picker/color-picker.php' );
require_once( K_COUCH_DIR.'addons/csv/csv.php' );
require_once( K_COUCH_DIR.'addons/redirector/redirector.php' );
require_once( K_COUCH_DIR.'addons/youtube_helper/youtube_helper.php' );
require_once( K_COUCH_DIR.'addons/filter/filter.php' );
require_once( K_COUCH_DIR.'addons/uid/uid.php' );
//require_once( K_COUCH_DIR.'addons/simple-access-control/simple-access-control.php' );



// Page-view: the very first cloned page created automatically now has a shorter default title - "Default page". 
// A clonable template's first page now gets auto-un-published.
$FUNCS->add_event_listener( 'alter_create_insert', 'default_page_naming' );
function default_page_naming( &$arr_insert, &$pg ){
    global $PAGE, $FUNCS;

    $is_master = $arr_insert['is_master'];
    $title = $arr_insert['page_title'];
    $name = $arr_insert['page_name'];
    $unwelcomed_title_str = '* PLEASE CHANGE THIS TITLE *';
    $unwelcomed_name_str = '-please-change-this-title';

    if( $is_master && strpos( $title, $unwelcomed_title_str )){
        $arr_insert['page_title'] = 'Default page *Do not delete';
        $arr_insert['page_name'] = str_replace( $unwelcomed_name_str, '', $name);

        if( $pg->tpl_is_clonable ){
            $arr_insert['publish_date'] = '0000-00-00 00:00:00';
        }
        else{
            // don't know for sure if the template is indeed non-clonable.
            // The <cms:template> tag that might follow can set this as clonable.
            // This is therefore handled by the other hook.
        }
    }
}

// A clonable template's first page now gets auto-un-published in case template was converted from non-clonable.
$FUNCS->add_event_listener( 'template_modified', 'unpublish_clonable_master' );
function unpublish_clonable_master( $rec, $attr, $prev_custom_values, $attr_custom, $modified ){
    global $PAGE, $DB, $FUNCS;

    // if the clonable status of masterpage is being modified ..
    if( array_key_exists('clonable', $modified) ){

        // get id of the masterpage
        if( $PAGE->is_master ){
            $id = $PAGE->id;
        }
        else{
            $rs = $DB->select( K_TBL_PAGES, array('id'), "template_id='" . $DB->sanitize( $PAGE->tpl_id ). "' AND is_master='1'" );
            if( !count($rs) ) return;
            $id = $rs[0]['id'];
        }

        if( $modified['clonable']==='1' ){
            // .. update page record to unpublish it
            $rs = $DB->update( K_TBL_PAGES, array('publish_date'=>'0000-00-00 00:00:00'), "id='" . $DB->sanitize( $id ). "'" );
        }
        elseif( $modified['clonable']==='0' ){
            // .. update page record to publish it
            $rs = $DB->update( K_TBL_PAGES, array('publish_date'=>$FUNCS->get_current_desktop_time() ), "id='" . $DB->sanitize( $id ). "'" );
        }
        if( $rs==-1 ) die( "ERROR: Unable to change publish status of masterpage" );
    }
}




// handle type 'reverse_relation' upon copying page to a new page ..
$FUNCS->add_event_listener( 'copy_to_new_complete', 'my_handle_reverse_related' );
function my_handle_reverse_related( &$pg, $orig_page_id ){
    global $FUNCS, $DB;

    for( $x=0; $x<count($pg->fields); $x++ ){
        $f = &$pg->fields[$x];
        if( (!$f->system) && $f->k_type=='reverse_relation'){
            $fid = $f->id;
            break;
        }
        unset( $f );
    }

    if( $f ){
        // get template_id of reverse related masterpage
        $rs = $DB->select( K_TBL_TEMPLATES, array('id', 'name'), "name='" . $DB->sanitize( $f->masterpage ). "'" );
        if( count($rs) ){
            $template_id = $rs[0]['id'];
            $template_name = $rs[0]['name'];
        }
        else{
            return;
        }

        // get relation_field_id using template_id
        if( $f->field ){
            $rs = $DB->select( K_TBL_FIELDS, array('*'), "template_id='" . $DB->sanitize( $template_id ). "' AND k_type='relation' AND name='" . $DB->sanitize( $f->field ) . "'" );
        }
        else{ // if field not specified, get the first 'relation' field defined
            $rs = $DB->select( K_TBL_FIELDS, array('*'), "template_id='" . $DB->sanitize( $template_id ). "' AND k_type='relation' LIMIT 1" );
        }
        if( count($rs) ){
            $field_id = $rs[0]['id'];
        }
        else{
            return;
        }

        // find all related pages
        $cid = $orig_page_id; // original page
        if( $cid != -1 ){ // not a new page
            $rel_tables = K_TBL_PAGES . ' p inner join ' . K_TBL_RELATIONS . ' rel on rel.pid = p.id' . "\r\n";
            $rel_sql = "p.parent_id=0 AND rel.cid='" . $DB->sanitize( $cid ). "' AND rel.fid='" . $DB->sanitize( $field_id ). "'";
            $rs = $DB->select( $rel_tables, array('p.id'), $rel_sql );

            // relate those pages to the newly created page
            if( count($rs) ){
                foreach( $rs as $row ){
                    $weight = 0; //TODO
                    $rs2 = $DB->insert( K_TBL_RELATIONS, array(
                        'pid'=>$row['id'],
                        'fid'=>$field_id,
                        'cid'=>$pg->id,
                        'weight'=>$weight
                        )
                    );
                    if( $rs2!=1 ) die( "ERROR: Failed to insert record in K_TBL_RELATIONS" );
                }
            }
        }
    }
}


// validator for core folders dropdown (set on a dummy hidden field)
	  function required_check_folders( $field, $args ){
	      $f = $field->page->_fields['k_page_folder_id'];
	      $fid = $f->get_data();
	      if( $fid=='-1' ){
	          $f->err_msg='* Required'; // set error on folder field
	          return KFuncs::raise_error( '' ); // returning an error to fail page save 
	      }
	  }
	  





   // 1.
   // Adsense shortcode
   // Usage: [adsense]
   $FUNCS->register_shortcode( 'adsense', 'adsense_handler' );
   function adsense_handler( $params, $content=null ){
      return '<script type="text/javascript"><!--
         google_ad_client = "pub-XXXXXXXXXXXXXXXX"; /* Put your own value here */
         google_ad_slot = "XXXXXXXXXX"; /* Put your own value here */
         google_ad_width = 468;
         google_ad_height = 60;
         //-->
      </script>
      <script type="text/javascript"
         src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
      </script>';
   }   

   // 2.
   // IFrame shortcode
   // Usage: [iframe src="http://www.somesite.com/" width="100" height="100" scrolling="yes" frameborder="1" marginheight="2"]
   $FUNCS->register_shortcode( 'iframe', 'iframe_handler' );
   function iframe_handler( $params, $content=null ){
      global $FUNCS;

      extract( $FUNCS->get_named_vars(array( 
         'src' => '',
         'width' => '100%',
         'height' => '500',         
         'scrolling' => 'no',
         'frameborder' => '0',
         'marginheight' => '0'
      ), $params) );

      $html =<<<EOS
      <iframe src="$src" title="" width="$width" height="$height" scrolling="$scrolling" frameborder="$frameborder" marginheight="$marginheight">
         <a href="$src" target="_blank">$src</a>
      </iframe>
EOS;
       return $html;
   }

   // 3.
   // Google map shortcode
   // Usage: [googlemap src="http://maps.google.com/?ll=23.250652,77.402072&spn=0.019912,0.038581&z=15"]
   $FUNCS->register_shortcode( 'googlemap', 'googlemap_handler' );
   function googlemap_handler( $params, $content=null ){
      global $FUNCS;

      extract( $FUNCS->get_named_vars(array( 
         'src' => '',
         'width' => '425',
         'height' => '350'         
      ), $params) );

      return '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&output=embed"></iframe>';
   }
   
   // 4.
   // YouTube Shortcode
   // Usage:   [youtube video="http://www.youtube.com/watch?v=5PsnxDQvQpw"]
   //          [youtube http://www.youtube.com/watch?v=1aBSPn2P9bg]
   //          [youtube 1aBSPn2P9bg]
   $FUNCS->register_shortcode( 'youtube', 'youtube_handler' );
   function youtube_handler( $params, $content=null ){
      global $FUNCS;
      
      extract( $FUNCS->get_named_vars(array( 
         'video' => 'http://',
         'width' => '475',
         'height' => '350',
		  'type' => 'landscape'
      ), $params) );

      // Video parameter is link or ID?
      if ( (substr($video, 0, 7) == 'http://') || (substr($video, 0, 8) == 'https://') ){
         /*
         Example links that can be handled:
         http://www.youtube.com/watch?v=5PsnxDQvQpw
         http://youtube.com/watch?v=5PsnxDQvQpw
         http://youtube.com/watch?gl=US&hl=en-US&v=5PsnxDQvQpw
         http://youtube.com/v/5PsnxDQvQpw&rel=1
         */
         if( !preg_match('#https?://(?:[^\.]+\.)?youtube.com.*(?:\?v=|&v=|/v/)([\w_-]+)#i', $video, $matches) ) return;
         $video = $matches[1];
      }

      // Sanitize parameters
      $video = htmlspecialchars( $video, ENT_QUOTES );
      $width = (int)$width;
      $height = (int)$height;
	  $type = $type;
      
      // Output HTML
      $html =<<<EOS
      <iframe class="youtube-player $type" type="text/html" width="$width" height="$height" src="http://www.youtube.com/embed/$video" frameborder="0"></iframe>
EOS;
      return $html;
   }

   // 5.
   // PayPal Donate Button shortcode
   // Usage:   [donate]
   //          [donate]Donate Now[/donate]
   //          [donate account="you@yoursite.com" onHover="Thanks" for="Title"]
   //          [donate account="you@yoursite.com" onHover="Thanks" for="Title"]Donate Now[/donate]
   $FUNCS->register_shortcode( 'donate', 'donate_handler' );
   function donate_handler( $params, $content=null ){
      global $FUNCS, $CTX;

      extract( $FUNCS->get_named_vars(array( 
         'account' => 'your-paypal-email-address',
         'for' => $CTX->get( 'k_page_title' ),
         'onHover' => ''
      ), $params) );

      if( empty($content) ) $content='Make A Donation';
      return '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$account.'&item_name=Donation for '.$for.'" title="'.$onHover.'">'.$content.'</a>';
   }   
   
   // 6.
   // Obfuscate email
   // Usage: [mailto]email@mydomain.com[/mailto]
   $FUNCS->register_shortcode( 'mailto', 'mailto_handler' );
   function mailto_handler( $params, $content=null ){
      global $FUNCS;

      // Create Couch script.. we'll use the 'cloak_email' tag to encrypt email
      $html = "<cms:cloak_email email='{$content}' />";

      // Pass on the code to Couch for execution using the 'embed' function
      return $FUNCS->embed( $html, $is_code=1 );
   } 
   
   // 7.
   // Embed SWF
   // Usage: [swf http://www.youtube.com/v/5PsnxDQvQpw&hl=en_GB&fs=1]
   //        [swf src="http://www.youtube.com/v/5PsnxDQvQpw&hl=en_GB&fs=1" width="640" height="480"]
   $FUNCS->register_shortcode( 'swf', 'swf_handler' );
   function swf_handler( $params, $content=null ){
      global $FUNCS;

      extract( $FUNCS->get_named_vars(array( 
         'src' => '',
         'width' => '480',
         'height' => '385' 
      ), $params) );
      
      // Sanitize parameters
      $src = htmlspecialchars( $src, ENT_QUOTES );
      $width = (int)$width;
      $height = (int)$height;
      
      $html =<<<EOS
      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="$width" height="$height">
         <param name="movie" value="$src"></param>
         <param name="allowFullScreen" value="true"></param>
         <param name="allowscriptaccess" value="always"></param>
         <param name="wmode" value="opaque"></param>
         <embed
            src="$src"
            type="application/x-shockwave-flash"
            allowscriptaccess="always"
            allowfullscreen="true"
            width="$width"
            height="$height"
            wmode="opaque">
         </embed>
      </object>    
EOS;
       return $html;
      
   }
   
    //[flip pdf="https://domain.com/uploads/file/handbooks/file.pdf" thumbnail="https://domain.com/uploads/file/handbooks/thumbnail.jpg" title="PDF Title"]
	 //[flip pdf="https://domain.com/uploads/file/handbooks/file.pdf" thumbnail="" title="PDF Title"]
	 //[flip pdf="https://domain.com/uploads/file/handbooks/file.pdf" thumbnail="" title=""]
   $FUNCS->register_shortcode( 'flip', 'flip_handler' );
   function flip_handler( $params, $content=null ){
      global $FUNCS, $CTX;

      extract( $FUNCS->get_named_vars(array(
         'pdf' => '',
         'title' => '',
         'thumbnail' => ''
      ), $params) );
	  
	  $pdf = trim(strip_tags($pdf));
	  $thumbnail = trim(strip_tags($thumbnail));
	  $title = trim(strip_tags($title));
	  
	  if(strlen($thumbnail)>0) {
		  return (strlen($title)>0? "<h5 class='nopm'>{$title}</h5>":"").'<a class="_df_thumb" source="'.$pdf.'" id="df_manual_thumb" transparent="true" thumb="'.$thumbnail.'" > '.(strlen($title)<=0? "<i class='fas fa-eye'></i>":$title).' </a>';
	  } else {
		  if(strlen($title)>0) $title = "<h5 class='text-center pt-20'>".$title."</h5>";
		  return '<div class="_df_book" source="'.$pdf.'">'.$title.'</div>';
	  }

   }
   
   
   


  
   
   // All-Purpose Embed Shortcode
      // Embed any code (almost).
      // Careful of your quotation mark types.
      // Won't accept the word "script."  No new lines. PHP code won't work.
      // Usage: [embed code='<p>Any code goes here.</p>']
      $FUNCS->register_shortcode( 'embed', 'embed_handler' );
      function embed_handler( $params, $content=null ){
         global $FUNCS;

         extract( $FUNCS->get_named_vars(array( 
            'code' => '',
         ), $params) );

          // Pass on the code to Couch for execution using the 'embed' function
         return $FUNCS->embed( $code, $is_code=1 );
      }
	  
	  //Usage: [section]contact[/section]
      $FUNCS->register_shortcode( 'section', 'section_handler' );
      function section_handler( $params, $content=null ){
         global $FUNCS;

         // Create Couch script.. we'll use the 'cms:embed' tag to encrypt email
         $html = "<cms:embed '{$content}.html' />";

         // Pass on the code to Couch for execution using the 'embed' function
         return $FUNCS->embed( $html, $is_code=1 );

      }
	  
	  
	  
	  
	  // Tag <cms:format_csv />
	  // formats enclosed contents to make them RFC 4180 valid for a csv file
	  $FUNCS->register_tag( 'format_csv', 'my_format_csv_handler' );
	  function my_format_csv_handler( $params, $node ){
	      $enclosure = '"';
	      $delimiter = ',';

	      $content = '';
	      if( count($node->children) ){ // if used as a tag-pair, get the enclosed contents ..
	          foreach( $node->children as $child ){
	              $content .= $child->get_HTML();
	          }
	      }
	      else{ // the first parameter is the content
	          $content = $params[0]['rhs'];
	      }

	      // format contents
	      if(
	          strchr($content, $delimiter) !== false ||
	          strchr($content, $enclosure) !== false ||
	          strchr($content, "\n") !== false ||
	          strchr($content, "\r") !== false ){

	          $content = str_replace( $enclosure, $enclosure.$enclosure, $content ); // escape double-quotes within contents
	          $content = $enclosure . $content . $enclosure; // enclose contents in double-quotes
	      }

	      return $content;
	  }
	  
	  
	  // Tag <cms:write />
	  // writes the enclosed contents into file
	  $FUNCS->register_tag( 'write', 'my_write_handler' );
	  function my_write_handler( $params, $node ){
	      global $FUNCS;

	      extract( $FUNCS->get_named_vars(
	                  array(
	                        'file'=>'',       /* file name if provided needs to be relative to the site directory */
	                        'truncate'=>'0',  /* will begin afresh */
	                        'add_newline'=>'0',   /* appends newline character to the content */
	                      ),
	                  $params)
	             );

	      // sanitize params
	      $file = trim( $file );
	      if( !$file ){
	          $file = 'my_log.txt';
	      }
	      $file = K_SITE_DIR . $file;
	      $truncate = ( $truncate==1 ) ? 1 : 0;
	      $add_newline = ( $add_newline==1 ) ? 1 : 0;

	      $content='';
	      foreach( $node->children as $child ){
	          $content .= $child->get_HTML();
	      }
	      if( $add_newline ){
	          $content .= "\r\n";
	      }

	      $fp = @fopen( $file,'a' );
	      if( $fp ){
	          @flock( $fp, LOCK_EX );
	          if( $truncate ){
	              ftruncate( $fp, 0 );
	              rewind( $fp );
	          }
	          @fwrite( $fp, $content );
	          @flock( $fp, LOCK_UN );
	          @fclose( $fp );
	      }

	      return;
	  }
	  
