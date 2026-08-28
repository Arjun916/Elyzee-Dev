<?php require_once( 'manage/cms.php' ); ?>

<cms:template title='Before After' clonable='1' order="150">

<cms:globals><cms:embed 'common/page_global_editables.html'/></cms:globals>


	<cms:editable name='page_image_row' type='row' order='10'>		
		<cms:editable name="page_image" label='Upload Before-After Photo here' desc='Required size:1980x1080px. Try to upload as per the exact size, else image will be cropped proportionally from center for required size.' show_preview='1' preview_height='50' crop='1' height="1080" order='20' type="image" class='col-md-6' required='1'/>
		
		<cms:editable name="primary_speciality" label="Choose the Primary Department/Speciality" opt_values='data/primary_specialties.inc' dynamic='opt_values' type='dropdown' order='30' required='1' class='col-md-6'/>
	</cms:editable>
	<cms:editable name='title_row' type='row' order='20'>
		<cms:editable type='text'  name="title_en" label="Title / Heading - English"  order='10' required='1' class='col-md-6'/>
		<cms:editable type='text'  name="title_ar" label="Title / Heading - Arabic"  order='10' required='1' class='col-md-6'/>
    </cms:editable>
	<cms:editable name='services_row' type='row' order='30'>
		<cms:editable type='relation' name='services' masterpage='services.php' order='31' label="Choose Related Services"  orderby='weight' order_dir='asc' advanced_gui='1' class='col-md-6' required='1'/>
		
		<cms:editable type='relation' name='doctor' depth='1' masterpage='doctors.php' order='32'  label="Choose the Related Dotor" desc="optional" orderby='weight' desc="optional" advanced_gui='1' order_dir='asc' class='col-md-6'/>
		
    </cms:editable>






<cms:editable type='group' label='Publish Status' name='p_publish_group' order='1000' collapsed='0'/>


<cms:config_form_view>
<cms:field 'k_page_title' hide='1' skip='1'/>
<cms:persist k_page_title=frm_title_en />
<cms:field 'k_page_name'  group='p_publish_group' order='3' label="Page link name"/>
<cms:field 'k_publish_date' group='p_publish_group' order='1' label="('Unpublished' will be hidden from the public listing)"/>
<cms:embed "common/hide_published_date.html"/>
</cms:config_form_view>


<cms:config_list_view exclude='default-page-for-before-after-php' searchable='1' limit='200' orderby='weight' order='asc'>
<cms:html><cms:show_info heading='Helpful Hint:' >
<ol>
<li>Add global title and description for section in <strong>'Manage Globals'</strong> in top right</li>
</ol>
</cms:show_info></cms:html>

<cms:field 'k_selector_checkbox' />
<cms:field 'k_page_title' header='Name' sortable='0' />
<cms:field 'designation_en' header='Relation' sortable='0'><cms:show heading_en/></cms:field>
<cms:field 'k_page_date' header='Status' sortable='0'>
<cms:if k_page_date='0000-00-00 00:00:00'><span class="label label-error">Unpublished</span><cms:else/><span class="label label-success">Published</span></cms:if>
</cms:field>
<cms:field 'k_up_down' header='Sort Order' sortable='0'/>
<cms:field 'k_actions' sortable='0'/>
</cms:config_list_view>

</cms:template >

<cms:if k_is_home>
	<cms:trim "<cms:embed 'common/header.inc' />"/>	

	<cms:trim "<cms:embed 'transformations/block_view.inc' />"/>
	<cms:trim "<cms:embed 'testimonials/block_view.inc' />"/>	
	<cms:trim "<cms:embed 'about/how_block_view.inc'/>"/>
	<cms:trim "<cms:embed 'appointments/section_view.inc'/>"/>
	<cms:trim "<cms:embed 'common/footer.inc' />"/>
<cms:else/>
<cms:redirect url="<cms:show_with_lc k_template_link/>"/>
</cms:if>
<?php COUCH::invoke(); ?>