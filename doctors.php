<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='Doctors' clonable='1' order="60">
<cms:globals><cms:embed 'common/page_global_editables.html'/></cms:globals>

<cms:editable type="group" label="Title, Short Description & Basic Details" name="p_title_group" order='10'>
	<cms:editable name='title_row' type='row' order='10'>
	
		<cms:editable type='text'  name="title_en" label="Title - English"  order='10' required='1' class='col-md-6'/>
		<cms:editable type='text'  name="title_ar" label="Title - Arabic"  order='11' required='1' class='col-md-6'/>
		
		<cms:editable type='text' name="designation_en" label="Designation or Title as per the Medical License  - English" desc='Exacly as in the registered Medical License - eg: Consultant Vascular Surgery' order='20' required='1' group='designation_group' class='col-md-6'/>
		<cms:editable type='text' name="designation_ar" label="Designation or Title as per the Medical License  - Arabic" desc='Exacly as in the registered Medical License - eg: Consultant Vascular Surgery' order='21' required='1' group='designation_group' class='col-md-6'/>

		<cms:editable type='text' name="detailed_designation_en" label="Detailed Designation - English" desc='Optional, Will be shown in the doctor profile.' order="30" class='col-md-6'/>
		<cms:editable type='text' name="detailed_designation_ar" label="Detailed Designation - Arabic" desc='Optional, Will be shown in the doctor profile.' order="31" class='col-md-6'/>
	
		<cms:editable type='textarea'  name="short_desc_en" label="Short Description - English" desc='* Maximum 225 characters' order='40' height='100' class='col-md-6'/>
		<cms:editable type='textarea'  name="short_desc_ar" label="Short Description - Arabic" desc='* Maximum 225 characters' order='41' height='100' class='col-md-6'/>
		
		<cms:editable type='text' name="languages_spoken_en" label='Languages spoken in English' desc="eg: English, Arabic" order='50' required='1' class='col-md-6'/>
		
		<cms:editable type='text' name="languages_spoken_ar" label='Languages spoken in Arabic' desc="eg: English, Arabic" order='51' required='1' class='col-md-6'/>
		
    </cms:editable>
	
	<cms:editable name='page_image_row' type='row' order='30'>
		<cms:editable name="page_image" label='Upload Profile Photo here' desc='Required size:600x600px. Try to upload as per the exact size, else image will be cropped proportionally from center for required size.' show_preview='1' preview_height='50' width='600' height='600' crop='1' order='10' type="image" class='col-md-6'/>
		
		<cms:editable name="gender" label="Gender" opt_values='Prefer not to say=PreferNotToSay | Female=Female | Male=Male' opt_selected = 'PreferNotToSay' type='radio' order='20' required='1' class='col-md-6'/>
		
		<cms:editable name="license_number" label="License No." desc='eg: D3427' type='text' order='30' class='col-md-6'/>
		
		<cms:editable name="years_exp" label="Years of Experience" desc='eg: 5' validator='non_negative_integer | max_len=2' type='text' order='40' class='col-md-6'/>


		<cms:editable type='relation' name='location' masterpage='contact.php' order='50' label="Choose Hospital Location"  group='p_title_group' orderby='weight' order_dir='asc' required='1' class='col-md-6'/>
		
		<cms:editable name='intro_video' no_xss_check ='1' label="Youtube URL of the doctor's Intro or Services Video - Landscape Size" desc='Optional, Youtube Video URL format should be: https://www.youtube.com/watch?v=xXXxXxxxXxX' type='text' validator='url' order="55" class='col-md-6'/>

	</cms:editable>
</cms:editable>

<cms:editable type="group" label="Department & Signature Services" name="p_services_group" order='20' collapsed='0'>
	<cms:editable name='page_services_row' type='row' order='10'>	
		<cms:editable name="primary_speciality" label="Choose the Primary Department/Speciality" opt_values='data/primary_specialties.inc' dynamic='opt_values' type='dropdown' order='60' required='1' class='col-md-12'/>
		
		<cms:editable name="secondary_speciality" label="Choose the Secondary Departments/Specialities" opt_values='data/secondary_specialties.inc' dynamic='opt_values' type='checkbox' order='62'  desc="Optional" class='col-md-6' height='70'/>
		
		<cms:editable type='relation' name='services' masterpage='services.php' order='63' label="Choose Signature Services"   orderby='weight' order_dir='asc' advanced_gui='1' class='col-md-6'/>
	</cms:editable>
</cms:editable>

<cms:repeatable name='before_after' label="Before After Photos by the Doctor" desc='Only add the photos belong to this doctor. The photos will be listed under the doctor name' order="100" group="p_services_group">
    <cms:editable type='image' name='ba_image' label='Upload Before After Photo here (Required size:1080x1080px)' show_preview='1' preview_height='50' height="1080"/>

</cms:repeatable>

<cms:embed 'common/page_desc_editables.html'/>


<cms:embed 'common/page_seo_editables.inc'/>

<cms:config_form_view>
<cms:field 'k_page_title' hide='1' skip='1'/>
<cms:persist k_page_title=frm_title_en page_seo_title_en="<cms:show frm_title_en/> | <cms:show frm_designation_en/> in Abu dhabi | Elyzee Hospital" page_seo_title_ar="<cms:show frm_title_ar/> | <cms:show frm_designation_ar/> | مستشفى اليزيه"/>
<cms:field 'k_page_name'  group='p_seo_group' order='100' label="Page link name" desc="SEO friendly Slug for page URL"/>
<cms:field 'k_publish_date' group='p_publish_group' order='1' label="('Unpublished' will be hidden from the public listing)"/>



<cms:embed "common/hide_published_date.html"/>

</cms:config_form_view>

<cms:config_list_view exclude='default-page-for-doctors-php' searchable='1' limit='200' orderby='weight' order='asc'>
<cms:html><cms:show_info heading='Helpful Hint:' >
<ol>
<li>Add global title and description for section in <strong>'Manage Globals'</strong> in top right</li>
</ol>
</cms:show_info></cms:html>

<cms:field 'k_selector_checkbox' />
<cms:field 'k_page_title' header='Name' sortable='0'>
<img src="<cms:if page_image><cms:show page_image/><cms:else/><cms:show k_site_link/>assets/images/person_placeholder-sm.png</cms:if>" width='30' alt="<cms:show k_page_title/>"> <a href="<cms:show k_update_link/>" style="text-transform:capitalize" title="<cms:show k_page_title/>"><cms:show k_page_title/></a>
</cms:field>
<cms:field 'designation_en' header='Designation' sortable='0'><cms:show designation_en/><br><small class="pt-2 d-block text-accent-color"><cms:show primary_speciality/></small></cms:field>
<cms:field 'k_page_date' header='Status' sortable='0'>
<cms:if k_page_date='0000-00-00 00:00:00'><span class="label label-error">Unpublished</span><cms:else/><span class="label label-success">Published</span></cms:if>
</cms:field>
<cms:field 'k_up_down' header='Sort Order' sortable='0'/>
<cms:field 'k_actions' sortable='0'/>
</cms:config_list_view>

</cms:template>
<cms:trim "<cms:embed 'common/header.inc' />"/>
<cms:if k_is_page>
<cms:trim "<cms:embed 'clonedpages/detail_view.inc'/>"/>
<cms:trim "<cms:embed 'insights/doctors_related_insights.inc'/>"/>
<cms:else/>
<cms:trim "<cms:embed 'doctors/list_view.inc'/>"/>
<cms:trim "<cms:embed 'about/how_block_view.inc'/>"/>
</cms:if>
<cms:trim "<cms:embed 'common/footer.inc' />"/>
<?php COUCH::invoke(); ?>