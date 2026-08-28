<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='Services' clonable='1' order="50" dynamic_folders='1' folder_masterpage='services_folder.php'>

<cms:globals><cms:embed 'common/page_global_editables.html'/></cms:globals>


<cms:editable name='checkboxhr_top' type='message' order='0' searchable='0'><br/><br/><hr><h3 style="color:maroon;">IS THIS PAGE POINTS TO ANOTHER PAGE?</h3></cms:editable>
<cms:editable type='radio' name='is_redirection' label='Important: If so, select the check box below to enter the redirection page URL' opt_values='No | Yes' opt_selected='No' searchable='0' order='1'/>
<cms:editable name='checkboxhr_bottom' type='message' order='2' searchable='0'><hr><br/><br/></cms:editable>

<cms:func _into='NoRedirection' is_redirection=''><cms:if is_redirection='No'>show<cms:else />hide</cms:if></cms:func>


<cms:editable type="group" label="Title & Short Description" name="p_title_group" order='10'>
	<cms:editable name='title_row' type='row' order='10'>
		<cms:editable type='text'  name="title_en" label="Title - English"  order='10' required='1' class='col-md-6'/>
		<cms:editable type='text'  name="title_ar" label="Title - Arabic"  order='11' required='1' class='col-md-6'/>

		<cms:editable type='textarea'  name="short_desc_en" label="Short Description - English" desc='* Maximum 225 characters' order='20' required='1' height='100' class='col-md-6'/>
		<cms:editable type='textarea'  name="short_desc_ar" label="Short Description - Arabic" desc='* Maximum 225 characters' order='21' required='1' height='100' class='col-md-6'/>
    </cms:editable>
	<cms:editable name='page_image_row' type='row' order='30'>
		<cms:editable type='relation' name='location' masterpage='contact.php' order='10' label="Choose Hospital Location" required='1' orderby='weight' order_dir='asc' lass='col-md-12'/>
		
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
		
		
		<cms:editable type='reverse_relation' name='doctors' masterpage='doctors.php' field='services' anchor_text='<span class="btn">View/Add Related Doctors</span>' label='Link the relevant doctors to this service' desc='(The selected doctors will be displayed on the service page.. Info: This page should be saved first to add or view related doctors.)' order='20' orderby='weight' order_dir='asc'  class='col-md-6' not_active=NoRedirection/>
	</cms:editable>
	
</cms:editable>




<cms:embed 'common/page_desc_editables.html'/>



<cms:func _into='isRedirectionActive' is_redirection=''><cms:if is_redirection='Yes'>show<cms:else />hide</cms:if></cms:func>

<cms:editable type='group' label='Page Redirection URL and Details' name='redirection_group' order='150' collapsed='0' not_active=isRedirectionActive/>

<cms:editable name='is_blank' type='radio' label='The URL should open in separate window?' opt_values='No | Yes'  order='30' required='1' searchable='0' group='redirection_group' not_active=isRedirectionActive/>

<cms:each k_supported_langs as='lang' key='lc'>
<cms:editable name="url_<cms:show lc />" label="<cms:show lang/> page URL" validator='url' group='redirection_group' type='text' order=k_count required='1' searchable='0' not_active=isRedirectionActive/>
</cms:each>




<cms:editable name="show_in_list" label="Show in list" desc='If yes, it will be shown in the list under the department, else will only be shown under related doctors profile' opt_values='Yes=1 | No=2' type='radio' order='1' required='1' group='p_publish_group'/>


<cms:embed 'common/page_seo_editables.inc'/>


<cms:config_form_view>
<cms:field 'k_page_title' hide='1' skip='1'/>
<cms:persist k_page_title=frm_title_en />
<cms:field 'k_page_name'  group='p_seo_group' order='100' label="Page link name" desc="SEO friendly Slug for page URL"/>
<cms:field 'k_page_folder_id' order='-10' label="Choose Department" required='1' desc="required"/>

<cms:field 'k_publish_date' group='p_publish_group' order='10' label="('Unpublished' will be hidden from the public listing)"/>
<cms:embed "common/hide_published_date.html"/>

</cms:config_form_view>


<cms:config_list_view exclude='default-page-for-services-php' searchable='1' orderby='weight' order='asc' limit='250'>
<cms:html><cms:show_info heading='Helpful Hint:' >
<ol>
<li>Add global title and description for section in <strong>'Manage Globals'</strong> in top right</li>
<li>Add <strong>Departments</strong> from <strong>'Add/Manage Departments'</strong> in top right</li>
<li>No: of pages <strong><cms:pages masterpage=k_template_name count_only='1'/></strong></li>
</ol>
</cms:show_info></cms:html>

<cms:script>
$( function(){
$("a[data-title='Manage Folders'] span").html("Add/Manage Departments");
});
</cms:script>

<cms:field 'k_selector_checkbox' />
<cms:field 'k_page_title' ><a href="<cms:admin_link />"><cms:show k_page_title/></a><br>(<cms:show k_page_name/>)</cms:field>
<cms:field 'k_page_foldername' header='Department'>
	<cms:if k_folder_name ><cms:set category_folder=k_folder_name /></cms:if>
	<cms:if k_page_foldername ><cms:set category_folder=k_page_foldername /></cms:if>
	<cms:if category_folder >
		<cms:parentfolders folder=category_folder extended_info='1' include_custom_fields='1'>      
			<cms:folders masterpage="services.php" depth='1' root=k_folder_name include_custom_fields='1'><cms:show title_en/></cms:folders>
			<cms:if k_folder_immediate_children> &#x25B6; </cms:if>
		</cms:parentfolders>
		<cms:set category_folder='' />
	</cms:if>

</cms:field>
<cms:field 'k_page_date' header='Status' sortable='0'>
<cms:if k_page_date='0000-00-00 00:00:00'><span class="label label-error">Unpublished</span><cms:else/><span class="label label-success">Published</span></cms:if>
</cms:field>

<cms:field 'k_up_down' header='Order'/>
<cms:field 'k_actions' />

</cms:config_list_view>
</cms:template >

<cms:trim "<cms:embed 'common/header.inc' />"/>

<cms:if k_is_page>
	<cms:if is_redirection && is_redirection eq 'Yes'>
		<cms:set url_temp = "url_<cms:show k_lang/>" />
		<cms:set url_val="<cms:get url_temp />" 'global' />
		<cms:redirect url=url_val permanently='1'/>
	<cms:else />
		<cms:trim "<cms:embed 'clonedpages/detail_view.inc'/>"/>
		<cms:trim "<cms:embed 'services/department_block_view.inc' />"/>
	</cms:if>

<cms:else_if k_is_folder/>
<cms:trim "<cms:embed 'services/department_list_view.inc' />"/>
<cms:trim "<cms:embed 'doctors/related_doctors_list.inc'/>"/>

<cms:parentfolders folder=k_folder_name extended_info='0' include_custom_fields='0'><cms:if k_level eq '0'><cms:set current_speciality_title = k_folder_title 'global'/></cms:if></cms:parentfolders>						
<cms:trim "<cms:embed 'appointments/section_view.inc'/>"/>

<cms:trim "<cms:embed 'services/department_block_view.inc' />"/>
<cms:trim "<cms:embed 'testimonials/block_view.inc' />"/>
<cms:trim "<cms:embed 'about/how_block_view.inc'/>"/>

<cms:else/>
	<cms:trim "<cms:embed 'services/department_block_view.inc' />"/>
	<cms:trim "<cms:embed 'services/department_list_view.inc' />"/>
	<hr class="hr-accent">
	<cms:trim "<cms:embed 'doctors/block_view.inc' />"/>
	<cms:trim "<cms:embed 'about/how_block_view.inc'/>"/>
</cms:if>


<cms:trim "<cms:embed 'common/footer.inc' />"/>
<?php COUCH::invoke(); ?>