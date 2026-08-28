<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='Blogs / Insights' clonable='1' order="120">

<cms:globals><cms:embed 'common/page_global_editables.html'/></cms:globals>

<cms:editable type="group" label="Title & Short Description" name="p_title_group" order='10'>
	<cms:editable name='title_row' type='row' order='10'>
		<cms:editable type='text'  name="title_en" label="Title - English"  order='10' required='1' class='col-md-6'/>
		<cms:editable type='text'  name="title_ar" label="Title - Arabic"  order='10' required='1' class='col-md-6'/>
    </cms:editable>
	
	<cms:editable name='short_desc_row' type='row' order='20'>
		<cms:editable type='textarea'  name="short_desc_en" label="Short Description - English" desc='* Maximum 225 characters' order='10' required='1' height='100' class='col-md-6'/>
		<cms:editable type='textarea'  name="short_desc_ar" label="Short Description - Arabic" desc='* Maximum 225 characters' order='10' required='1' height='100' class='col-md-6'/>
    </cms:editable>
	<cms:editable name='page_image_row' type='row' order='30'>
		<cms:editable name='page_image'
		width='1920'
		height='1080'
		label="Upload Highlight Image related to the page"
		desc="Size should be 1920x1080px aspect ratio"
		type='image'
		show_preview='1'
		preview_height='50'
		quality='100'
		required='1'
		order='10'
		class='col-md-6'
		/>
		
		
		<cms:editable name="primary_speciality" label="Choose the Primary Department/Speciality" opt_values='data/primary_specialties.inc' dynamic='opt_values' type='dropdown' order='39' required='1' class='col-md-6'/>
		
	</cms:editable>
	
	
	
	<cms:editable name='services_row' type='row' order='40'>
		<cms:editable type='relation' name='doctors' masterpage='doctors.php' order='60' label="Choose Related Doctors" orderby='weight' order_dir='asc' advanced_gui='1' order='10' class='col-md-6'/>

		<cms:editable type='relation' name='services' masterpage='services.php' order='60' label="Choose Related Services"  orderby='weight' order_dir='asc' advanced_gui='1' order='30' class='col-md-6'/>
	</cms:editable>
	
</cms:editable>



<cms:embed 'common/page_desc_editables.html'/>
<cms:embed 'common/page_seo_editables.inc'/>


<cms:config_form_view>
<cms:field 'k_page_title' hide='1' skip='1'/>
<cms:persist k_page_title=frm_title_en />
<cms:field 'k_page_name'  group='p_seo_group' order='100' label="Page link name" desc="SEO friendly Slug for page URL"/>
<cms:field 'k_page_folder_id' group='p_title_group' order='10' label='Choose category (folder)'/>
<cms:field 'k_publish_date' group='p_publish_group' order='1' label='Start Date & Status' desc="'Unpublished' will be hidden from the public listing"/>	
</cms:config_form_view>

<cms:config_list_view exclude='default-page-for-insights-php' searchable='1' limit='150'>
<cms:html><cms:show_info heading='Helpful Hint:' >
<ol>
<li>Add global title and description for section in <strong>'Manage Globals'</strong> in top right.</li>
</ol>
</cms:show_info></cms:html>

<cms:field 'k_selector_checkbox' />
<cms:field 'k_page_title' />
<cms:field 'k_page_date' />
<cms:field 'k_actions'/>
</cms:config_list_view>

</cms:template>

<cms:trim "<cms:embed 'common/header.inc' />"/>
<cms:if k_is_page>
<cms:trim "<cms:embed 'clonedpages/detail_view.inc'/>"/>
<cms:else />
<cms:set title_header_icon_val = "rss" />
<cms:set clonedpages_tile = "insights/tile_view.inc" />
<cms:trim "<cms:embed 'clonedpages/list_view.inc'/>"/>
</cms:if>
<cms:trim "<cms:embed 'common/footer.inc' />"/>
<?php COUCH::invoke(); ?>