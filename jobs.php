<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='Jobs' clonable='1' hidden='1' order='1000' parent="_hidden_">
	<cms:editable type='message'  order='-1' name='title_header' group="_system_fields_">
	<h3>Job Position as Title</h3>
	<p>eg: Registered Nurse - Plastic Surgery, This will not show in public, will only show it on the admin panel for your easy access.</p>
	</cms:editable>
	<cms:editable type="group" label="Job headline Title" desc='This will show as the title of the job in public. eg: Plastic Surgery - Registered Nurse' name="p_title_group" order='10' collapsed='0'/>	
	
	
	<cms:editable type="group" label="Highlight Image related to the job" desc="Optional, Size should be 1920x700px aspect ratio" name="image_group" order='60'/>
	<cms:editable name='page_image'
		width='1920'
		height='700'
		label="Upload Image"
		desc="Optional, Size should be 1920x700px aspect ratio"
		type='image'
		show_preview='1'
		preview_height='75'
		group="image_group"	
		quality='100'
		/>
	
	
	
	<cms:editable type='group' label='Job Description' name='content_group' desc='The main content' order='50' collapsed='0'/>
	
	<cms:editable type='group' label='Additonal Job Information' name='additional_group' desc='no: of vacancies, location, etc.' order='60' collapsed='0'/>
	<cms:editable type="text" name="job_vacancies" label="Number of vacancies" desc="Only number allowed, eg: 2; Leave it blank if you don't want to show it in public" order='10' group='additional_group' validator='non_zero_integer'/>
	<cms:editable type='relation' name='job_location' masterpage='contact.php' order='60' label="Choose Job Location"  group='additional_group' orderby='weight' order_dir='asc' order='20' has="one"/>
	<cms:editable type='dropdown' name="job_type" label="Job Type" required='1' order='30' group='additional_group' opt_values="FULL_TIME = Full time employment | PART_TIME = Part time employment | CONTRACT = Fixed-term or project-based contract | TEMPORARY = Short-term or seasonal employment | INTERN = Internship position | VOLUNTEER = Unpaid volunteer role | REMOTE = Fully remote / work-from-home position | COMMISSION = Pay based primarily on commission | APPRENTICESHIP = Training-based apprenticeship role | FREELANCE = Independent contractor / freelancer role | OTHER = Other or undefined employment arrangement"/>
	
	

  	<cms:each k_supported_langs as='lang' key='lc'>
  	<cms:editable type='text'  name="title_<cms:show lc />" label="Title in <cms:show lang/>"  group='p_title_group' order=k_count required='1'/>
	
  	<cms:editable type='richtext' name="content_<cms:show lc />" label="<cms:show lang/>"  order=k_count group='content_group' required='1' toolbar='custom' custom_toolbar='paste, pastetext, pastefromword, undo, redo, removeformat, cut, copy, bold, italic, underline, strike, subscript, superscript, link, unlink, table, format, justifyleft, justifycenter, justifyright, justifyblock, numberedlist, bulletedlist, outdent, indent, source'  css="<cms:show k_site_link />assets/css/editor.css"  body_class="<cms:show lc />"/>
	
	
	
  	</cms:each>
	

	
    <cms:editable type='group' label='Publish Status & End date' name='p_publish_group' order='1000' collapsed='0'/>
	
	
	<cms:editable name='end_date'
     label='Apply before - Date'
	 desc="date to stop receiving job applications"
     type='datetime'
	 group="p_publish_group"
	 order='15'
	 default_time=""
	 default_date=""
	 required='1'
	 allow_time='0'> 
    </cms:editable>
	
    <cms:editable name="p_publish_status" label="Current Job Status" desc='for public listing'
       opt_values="-Select-= | Published=published | Close=closed | Draft=draft"
	   type='dropdown'
	   required='1'
	   opt_selected = "published"
	   group="p_publish_group"
	   order='10'
      />
	
	<cms:embed 'common/page_seo_editables.inc'/>

	
	<cms:editable name='hide' type='message' dynamic='default_data'>
        <style>
 		   #settings-panel, #k_pid, #k_element_k_k_desc, #k_element_k_image{display:none;}
 	   </style>
	</cms:editable>
	
	
	<cms:config_form_view>
	    <cms:field 'k_page_title' label='Job Position' desc="eg: Medical Coder, This will only show it on the backend"/>
		<cms:field 'k_page_name'  group='p_publish_group' order='3' label="Page link name"/>
		<cms:field 'k_publish_date' group='p_publish_group' order='1' label='Start Date & Status' desc="date to start receiving applications. 'Unpublished' will be hidden from the public listing"/>	
		
		
	</cms:config_form_view>
	
	

	<cms:config_list_view exclude='default-page-for-jobs-php' searchable='1' >
	<cms:html><cms:show_info heading='Helpful Hint:' >
			<ol>
				<li>Add global title and description for section in <strong>'Manage Globals'</strong> in top right.</li>
				<li>Add jobs for section in <strong>'Manage Folders'</strong> in top right.</li>
			</ol>
	</cms:show_info></cms:html>
	</cms:config_list_view>
</cms:template>


<cms:if k_user_access_level lt '10' ><cms:redirect url="<cms:link 'careers.php'/>"/></cms:if>
<?php COUCH::invoke(); ?>