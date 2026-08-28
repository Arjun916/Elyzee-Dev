<?php require_once( 'manage/cms.php' ); ?>

<cms:template title='Testimonials' clonable='1' order="150">

<cms:globals>
<cms:embed 'common/page_global_editables.html'/>
<cms:editable type="group" name="google_review_group" order='3000'/>
<cms:editable type='datetime' name="google_review_last_fetch" allow_time='0' label="Google Review - Last Fetched" order='10' group='google_review_group'/>
</cms:globals>


<cms:editable type="group" label="Name, Designation & Testimonial content" name="p_title_group" order='10'>
	<cms:editable name='title_row' type='row' order='10'>
		<cms:editable type='text'  name="title_en" label="Name of the person - English"  desc="eg: Lucy P. Norman" order='10' required='1' class='col-md-6'/>
		<cms:editable type='text'  name="title_ar" label="Name of the person - Arabic"  desc="eg: Lucy P. Norman" order='11' required='1' class='col-md-6'/>
		
		<cms:editable type='text'  name="heading_en" label="Person Designation of or date details of the testimonial - English" desc='eg: Patient, November 2026. * Maximum 225 characters' order='20' required='1' class='col-md-6'/>

		<cms:editable type='text'  name="heading_ar" label="Person Designation of or date details of the testimonial - Arabic" desc='eg: Patient, November 2026. * Maximum 225 characters' order='21' required='1' class='col-md-6'/>
		
		<cms:editable type='textarea'  name="short_desc_en" label="Testimonial content - English" desc='* Maximum 225 characters' order='30' required='1' height='100' class='col-md-6'/>
		<cms:editable type='textarea'  name="short_desc_ar" label="Testimonial content - Arabic" desc='* Maximum 225 characters' order='31' required='1' height='100' class='col-md-6'/>
		
		<cms:editable name="gender" label="Gender" opt_values='Prefer not to say=0 | Female=1 | Male=2' opt_selected = '0' type='radio' order='40' required='1' class='col-md-6'/>
		
		<cms:editable type='radio' opt_values='5 | 4 | 3 | 2 | 1'  name='rating_value' label="Testimonial Rating" opt_selected='5' required='1' class='col-md-6' order='41'/>		
		
		
		<cms:editable name="page_image" label='Upload Profile Photo here' desc='Optional, Size:250x250px. Try to upload as per the exact size, else image will be cropped proportionally from center for required size.' show_preview='1' preview_height='50' width='250' height='250' crop='1' order='42' type="image" class='col-md-6'/>
		
    </cms:editable>
 </cms:editable>
 
 
<cms:editable type="group" label="Related Dept, Services or Doctors" desc="optional" name="p_related_group" order='20' collapsed='0'>
 <cms:editable name='services_row' type='row' order='10'>
	<cms:editable name="primary_speciality" label="Choose the Primary Department/Speciality" opt_values='data/primary_specialties.inc' dynamic='opt_values' type='dropdown' order='10' class='col-md-12'/>

	<cms:editable type='relation' name='doctors' masterpage='doctors.php' order='60' label="Choose Related Doctors" orderby='weight' order_dir='asc' advanced_gui='1' order='20' class='col-md-6'/>

	<cms:editable type='relation' name='services' masterpage='services.php' order='60' label="Choose Related Services"  orderby='weight' order_dir='asc' advanced_gui='1' order='30' class='col-md-6'/>
</cms:editable>
 </cms:editable>




<cms:editable type='group' label='Publish Status' name='p_publish_group' order='1000' collapsed='0'/>


<cms:config_form_view>
<cms:field 'k_page_title' hide='1' skip='1'/>
<cms:persist k_page_title=frm_title_en />
<cms:field 'k_page_name'  group='p_publish_group' order='3' label="Page link name"/>
<cms:field 'k_publish_date' group='p_publish_group' order='1' label="('Unpublished' will be hidden from the public listing)"/>
<cms:embed "common/hide_published_date.html"/>
</cms:config_form_view>


<cms:config_list_view exclude='default-page-for-testimonials-php' searchable='1' limit='200' orderby='weight' order='asc'>
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
	<cms:trim "<cms:embed 'testimonials/block_view.inc' />"/>
	
	<cms:capture into='real_testimonials'>
		<cms:pages masterpage=k_template_name limit='150'>
			<cms:embed "testimonials/tile_view.inc"/>
        	<cms:trim "<cms:embed 'common/pagination.html' />"/>	
			<cms:set has_real_testimonials ='1'/>
		</cms:pages>
	</cms:capture>
	
	<cms:if has_real_testimonials>
	<section class="page-testimonials bg_asthetic_treatments">
	    <div class="container">
	     
			 <div class="row" data-masonry='{"percentPosition": true }'>
				<cms:show real_testimonials/>
				<cms:if has_pagination_output><cms:show pagination_output /></cms:if>

           
	        </div>
	    </div>
	</section>
	<cms:else/>
	<cms:trim "<cms:embed 'transformations/block_view.inc' />"/>
	</cms:if>
	<cms:trim "<cms:embed 'about/how_block_view.inc'/>"/>
	<cms:trim "<cms:embed 'appointments/section_view.inc'/>"/>

	<cms:trim "<cms:embed 'common/footer.inc' />"/>
<cms:else/>
<cms:redirect url="<cms:link k_template_name/>"/>
</cms:if>
<?php COUCH::invoke(); ?>