<?php require_once( 'admin/cms.php' ); ?>
<cms:template title='Gallery' clonable='1' dynamic_folders='1' folder_masterpage='multi_lang_folder.php' order='130'>

<cms:globals><cms:embed 'common/page_global_editables.html'/></cms:globals>


<cms:editable type="group" label="Title" name="p_title_group" order='10'/>


<cms:editable type='group' label='Gallery Images' desc='' name='gallery_images_group' order='40' collapsed='0'/>
<cms:editable type='reverse_relation' name='gallery_photos' masterpage='photo_gallery.php' field='gallery_photo' anchor_text='<span class="btn">View/Add Images</span>' label='(Info: Save this page first to add images to this gallery.)' order='20'  group='gallery_images_group'/>


<cms:editable type='group' name='video_group' label='Gallery Videos' desc="Youtube links"  order='41'/>
<cms:repeatable name='video_links' label="Leave 'Video Image' empty to use the default youtube thumbnail" desc="Youtube Video URL format should be: https://www.youtube.com/watch?v=wAKlKvboPyI" order='1' group='video_group'>
<cms:editable type='image' name='video_image' label='Video Image' description='will be cropped/resized to 500x300px' show_preview='1' preview_width='100' input_width='200' col_width='300' width="500" height="300"  crop='1'/>
<cms:editable 
name='video_url'
no_xss_check ='1'
label='Youtube Video URL' 
type='text'
validator='url'
/>
</cms:repeatable>

<cms:editable type='group' label='Short Description' name='content_group' desc='Optional' order='50'/>


<cms:each k_supported_langs as='lang' key='lc'>
<cms:editable type='text'  name="title_<cms:show lc />" label="Title in <cms:show lang/>"  group='p_title_group' order=k_count required='1'/>

<cms:editable type='richtext' name="content_<cms:show lc />" label="<cms:show lang/>"  order=k_count group='content_group' toolbar='custom' custom_toolbar='paste, pastetext, pastefromword, undo, redo, removeformat, cut, copy, bold, italic, underline, strike, subscript, superscript, format, image, link, unlink, table, justifyleft, justifycenter, justifyright, justifyblock, numberedlist, bulletedlist, outdent, indent, source'  css="<cms:show k_site_link />assets/css/editor.css"  body_class="<cms:show lc />"/>
</cms:each>



<cms:editable type='group' label='Publish Status' name='p_publish_group' order='1000' collapsed='0'/>


<cms:config_form_view>
<cms:field 'k_page_title' hide='1' skip='1'/>
<cms:persist k_page_title=frm_title_en />
<cms:field 'k_page_name'  group='p_publish_group' order='3' label="Page link name"/>
<cms:field 'k_page_folder_id' group='p_title_group' order='10' label='Choose category (folder)'/>
<cms:field 'k_publish_date' group='p_publish_group' order='1' label='Date & Status' desc="'Unpublished' will be hidden from the public listing"/>	
</cms:config_form_view>



<cms:config_list_view exclude='default-page-for-gallery-php' searchable='1' >
<cms:html><cms:show_info heading='Helpful Hint:' >
<ol>
<li>Add global title and description for section in <strong>'Manage Globals'</strong> in top right.</li>
<li>Add Folder Categories in <strong>'Manage Folders'</strong> in top right.</li>
</ol>
</cms:show_info></cms:html>
</cms:config_list_view>

</cms:template>
<cms:trim "<cms:embed 'common/header.html' />"/>
<cms:if k_is_page>
<cms:trim "<cms:embed 'common/title_header.html'/>"/>
<section class="pt-30 pb-80">
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-8">
<small class="d-block mb-3"><cms:date k_page_date format='M d, Y'/></small>
<cms:do_shortcodes><cms:get "content_<cms:show k_lang />" /></cms:do_shortcodes>				   
<div class="gallery-layout2 pt-3" data-aos="fade-up"><cms:trim "<cms:embed 'gallery/block_view.html' />"/></div>
</div>
<cms:trim "<cms:embed 'clonedpages/sidebar.html'/>"/>
</div>
</div>
</section>

<cms:trim "<cms:embed 'common/prevnext.html' />"/>
<cms:else />
<cms:set title_header_icon_val = "<i class='fa-solid fa-photo-film'></i>" />
<cms:set clonedpages_tile = "clonedpages/tile_view.html" />
<cms:trim "<cms:embed 'clonedpages/list_view.html'/>"/>
</cms:if>
<cms:trim "<cms:embed 'common/footer.html' />"/>
<?php COUCH::invoke(); ?>