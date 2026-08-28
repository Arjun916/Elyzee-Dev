<?php require_once( 'manage/cms.php' ); ?>

<cms:template title='News & Events' clonable='1' order="100">

<cms:globals><cms:embed 'common/page_global_editables.html'/></cms:globals>

<cms:editable type="group" label="Title & Short Description" name="p_page_group" order='10'/>

	<cms:editable name='title_row' type='row' order='10' group='p_page_group'>
		<cms:editable type='text'  name="title_en" label="Title - English"  order='10' required='1' class='col-md-6'/>
		<cms:editable type='text'  name="title_ar" label="Title - Arabic"  order='10' required='1' class='col-md-6'/>
    </cms:editable>
	
	
		<cms:editable name='content_row' type='row' order='20' group='p_page_group'>
		<cms:editable type='richtext' name="content_en" label="Description Introduction - English"  order='10' required='1' toolbar='custom' custom_toolbar='paste, pastetext, pastefromword, undo, redo, removeformat, cut, copy, bold, italic, underline, strike, subscript, superscript, format, link, unlink, table, justifyleft, justifycenter, justifyright, justifyblock, numberedlist, bulletedlist, outdent, indent, source' css="<cms:show k_site_link />assets/css/editor.css" body_class="en" class='col-md-6' />
		<cms:editable type='richtext' name="content_ar" label="Description Introduction - Arabic"  order='20' required='1' toolbar='custom' custom_toolbar='paste, pastetext, pastefromword, undo, redo, removeformat, cut, copy, bold, italic, underline, strike, subscript, superscript, format, link, unlink, table, justifyleft, justifycenter, justifyright, justifyblock, numberedlist, bulletedlist, outdent, indent, source' css="<cms:show k_site_link />assets/css/editor.css" body_class="ar" class='col-md-6' />
		</cms:editable>
	
	
	<cms:editable name='page_image_row' type='row' order='30' group='p_page_group'>
		<cms:editable name='page_image'
		width='1920'
		height='1080'
		label="Upload Highlight Image related to the Event or News"
		desc="Size should be 1920x1080px aspect ratio"
		type='image'
		show_preview='1'
		preview_height='50'
		quality='100'
		required='1'
		order='10'
		class='col-md-6'
		/>
	
	<cms:editable type='relation' name='location' masterpage='contact.php' order='50' label="Choose Hospital Location"  group='p_title_group' orderby='weight' order_dir='asc' required='1' class='col-md-6'/>
	
	<cms:editable name="show_appointment_block" label="Show Appointment form in this page?" desc='If yes, the appointment form will be shown in the page' opt_values='Yes=1 | No=2' opt_selected='2' type='radio' order='60' required='1' class='col-md-6'/>
	
	</cms:editable>
	


<cms:editable type='group' label='Additional Gallery Images & Videos' desc='optional' name='gallery_group' order='100' collapsed='0'/>
<cms:editable type='reverse_relation' name='gallery_photos' masterpage='photo_gallery.php' field='gallery_photo' anchor_text='<span class="btn">View/Add Gallery Images</span>' label='(Important Info: Save this page first to add images to this gallery.)' order='10'  group='gallery_group' />



<cms:repeatable name='video_links' label="Leave 'Video Image' empty to use the default youtube thumbnail" desc="Youtube Video URL format should be: https://www.youtube.com/watch?v=wAKlKvboPyI" order='20' group='gallery_group' >
<cms:editable type='image' name='video_image' label='Video Image' description='will be cropped/resized to 500x300px' show_preview='1' preview_width='100' input_width='200' col_width='300' width="500" height="300"  crop='1' />
<cms:editable 
name='video_url'
no_xss_check ='1'
label='Youtube Video URL' 
type='text'
validator='url'
/>
</cms:repeatable>

<cms:editable type='group' label='Publish Status' name='p_publish_group' order='1000' collapsed='0'/>
<cms:embed 'common/page_seo_editables.inc'/>


<cms:config_form_view>
<cms:field 'k_page_title' hide='1' skip='1'/>
<cms:persist k_page_title=frm_title_en />
<cms:field 'k_page_name'  group='p_seo_group' order='100' label="Page link name" desc="SEO friendly Slug for page URL"/>
<cms:field 'k_publish_date' group='p_publish_group' order='1' label='Start Date & Status' desc="'Unpublished' will be hidden from the public listing"/>	
</cms:config_form_view>


<cms:config_list_view exclude='default-page-for-news-events-php' searchable='1' >
<cms:html><cms:show_info heading='Helpful Hint:' >
<ol>
<li>Add global title and description for section in <strong>'Manage Globals'</strong> in top right.</li>
</ol>
</cms:show_info></cms:html>
</cms:config_list_view>

</cms:template>
<cms:trim "<cms:embed 'common/header.inc' />"/>
<cms:if k_is_page>
<cms:trim "<cms:embed 'clonedpages/detail_view.inc'/>"/>
<cms:else />
<cms:set title_header_icon_val = "bullhorn" />
<cms:set clonedpages_tile = "news/tile_view.inc" />
<cms:trim "<cms:embed 'clonedpages/list_view.inc'/>	"/>	
</cms:if>
<cms:trim "<cms:embed 'common/footer.inc' />"/>	
<?php COUCH::invoke(); ?>