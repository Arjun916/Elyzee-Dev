<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='Executive Team' clonable='1' order="85">
<cms:globals><cms:embed 'common/page_global_editables.html'/></cms:globals>


<cms:editable type="group" label="Name, Designation & Short Description" name="p_title_group" order='10'>
	<cms:editable name='title_row' type='row' order='10'>
	
	<cms:editable type='text'  name="title_en" label="Full Name - English"  order='10' required='1' class='col-md-6'/>
	<cms:editable type='text'  name="title_ar" label="Full Name - Arabic"  order='11' required='1' class='col-md-6'/>
		
	<cms:editable type='text' name="designation_en" label="Designation  - English" desc='eg: Chairman, Chief Executive Officer' order='20' required='1' class='col-md-6'/>
	<cms:editable type='text' name="designation_ar" label="Designation  - Arabic" desc='eg: Chairman, Chief Executive Officer' order='21' required='1' class='col-md-6'/>

	<cms:editable type='textarea'  name="short_desc_en" label="Short Profile Description - English" order='40' class='col-md-6'/>
	<cms:editable type='textarea'  name="short_desc_ar" label="Short Profile Description - Arabic" order='41' class='col-md-6'/>
		
    </cms:editable>
	
	<cms:editable name='page_image_row' type='row' order='30'>
		<cms:editable name="page_image" label='Upload Profile Photo here' desc='Required size:Square 750x750px. Uploadthe exact size, else image will be cropped proportionally from center for required size.' show_preview='1' preview_height='50' width='750' height='750' crop='1' order='10' type="image" required='1' class='col-md-6'/>
		
		<cms:editable name="gender" label="Gender" opt_values='Prefer not to say=PreferNotToSay | Female=Female | Male=Male' opt_selected = 'PreferNotToSay' type='radio' order='20' required='1' class='col-md-6'/>
		
		
		<cms:editable name="part_of" label="Executive Type" opt_values='Select Type=- | Top Senior Leadership=leadership | Senior Executive Team=executive' type='dropdown' order='20' required='1' class='col-md-6'/>

		<cms:editable type='relation' name='location' masterpage='contact.php' order='50' label="Choose Hospital Location"  group='p_title_group' orderby='weight' order_dir='asc' required='1' class='col-md-6'/>
	</cms:editable>
</cms:editable>


<cms:editable type='group' label='Personal Message' desc='Usually the first paragraph' name='content_group' desc='The main content' order='50' collapsed='0'>
<cms:editable name='content_row' type='row' order='10' >
<cms:editable type='richtext' name="message_en" label="Message - English"  order='10' toolbar='custom' custom_toolbar='paste, pastetext, pastefromword, undo, redo, removeformat, cut, copy, bold, italic, underline, strike, subscript, superscript, format, link, unlink, table, justifyleft, justifycenter, justifyright, justifyblock, numberedlist, bulletedlist, outdent, indent, source' css="<cms:show k_site_link />assets/css/editor.css" body_class="en" class='col-md-6'/>
<cms:editable type='richtext' name="message_ar" label="Message - Arabic"  order='20' toolbar='custom' custom_toolbar='paste, pastetext, pastefromword, undo, redo, removeformat, cut, copy, bold, italic, underline, strike, subscript, superscript, format, link, unlink, table, justifyleft, justifycenter, justifyright, justifyblock, numberedlist, bulletedlist, outdent, indent, source' css="<cms:show k_site_link />assets/css/editor.css" body_class="ar" class='col-md-6'/>
</cms:editable>
</cms:editable>


<cms:editable name="show_in_list" label="Show in list" desc='If yes, it will be shown in the list under the department, else will only be shown under related doctors profile' opt_values='Yes=1 | No=2' type='radio' order='1' required='1' group='p_publish_group'/>

<cms:editable type='group' label='Publish Status' name='p_publish_group' order='60' collapsed='0'/>

<cms:embed 'common/page_seo_editables.inc'/>


<cms:config_form_view>
<cms:field 'k_page_title' hide='1' skip='1'/>
<cms:persist k_page_title=frm_designation_en />
<cms:field 'k_page_name'  group='p_publish_group' order='3' label="Page link name"/>
<cms:field 'k_publish_date' group='p_publish_group' order='1' label="('Unpublished' will be hidden from the public listing)"/>
<cms:embed "common/hide_published_date.html"/>

</cms:config_form_view>


<cms:config_list_view exclude='default-page-for-executive-team-php' searchable='1' limit='200' orderby='weight' order='asc'>
<cms:html>
<cms:show_info heading='Helpful Hint:' >
<p>1. Use short code <b>[section]team[/section]</b> to render team group in any page content.</p>
<p>2. Add global description for team section in <strong>'Manage Globals'</strong> in top right</p>
</cms:show_info>

</cms:html>


<cms:field 'k_selector_checkbox' />
<cms:field 'photo' header='Photo'>
<img src='<cms:show page_image/>' width='30'>
</cms:field>
<cms:field 'k_page_title' header='Designation' sortable='0'/>
<cms:field 'title_en' header='Name' sortable='0'/>
<cms:field 'k_page_date' header='Status' sortable='0'>
<cms:if k_page_date='0000-00-00 00:00:00'><span class="label label-error">Unpublished</span><cms:else/><span class="label label-success">Published</span></cms:if>
</cms:field>
<cms:field 'k_up_down' header='Hierarchy/Order'/>
<cms:field 'k_actions' />
</cms:config_list_view>


<cms:editable name='hide' type='message' dynamic='default_data'>
common/hide.html
</cms:editable>

</cms:template>

<cms:trim "<cms:embed 'common/header.inc' />"/>

<cms:if k_is_page>
<cms:capture into="executive_tmp_message"><cms:get "message_<cms:show k_lang/>"/></cms:capture>
<cms:if show_in_list && (show_in_list eq '1') && executive_tmp_message>

    <section class="page-team-single">
        <div class="container">
            <div class="row align-items-center justify-content-center">
				
	            <div class="col-sm-8 col-md-8 col-lg-4 px-5">
	                <div class="team-member-image">
	                    <figure class="image-anime">
							<cms:set team_pic = "<cms:if page_image><cms:show page_image/><cms:else/><cms:show k_site_link/>assets/images/doctor_placeholder.png</cms:if>" />
						
	                        <img class="lazy" src="<cms:show px_img/>" data-src="<cms:show team_pic/>" alt='<cms:get "title_<cms:show k_lang/>"/>'>
	                    </figure>
	                </div>
				</div>
			
				<div class="col-md-12 col-lg-8">
					<div class="team-member-content mt-3 pt-lg-3">
						<div class="section-title mb-3 text-center text-lg-start px-3 px-lg-0">		
							<h3 class="wow fadeInUp" data-wow-delay="0.1s"><cms:show orgname/></h3>					   
							<h2 class="wow fadeInUp" data-wow-delay="0.1s"><cms:get "title_<cms:show k_lang/>"/></h2>
							<h4 class="wow fadeInUp" data-wow-delay="0.1s"><cms:get "designation_<cms:show k_lang/>"/></h4>
							
						</div>
                       
						
					</div>
				</div>
				
				<div class="col-md-12 mt-5 px-3 px-lg-5">
	                    <div class="our-testimonial-content bg-dark px-5 py-5 px-sm-5 rounded h-100 position-relative"> 
						
							<div class="pe-3 pt-3 position-absolute top-0 end-0"><i class="fas fa-quote-<cms:if k_lang eq 'ar'>left<cms:else/>right</cms:if> display-1 text-accent-color"></i></div>
						
							<div class="testimonial-author mb-3 pb-3">
								         
								<div class="author-content">
									<h4 class="text-accent-color mb-3">Message</h4>
									<p class="lead"><cms:get "title_<cms:show k_lang/>"/></p>
									<p class="text-light"><cms:get "designation_<cms:show k_lang/>"/></p>
								</div>
							</div>
	                        <div class="section-content m-0 pt-2 wow fadeInUp text-accent-color" data-wow-delay="0.2s"><cms:show executive_tmp_message/></div>
                       
	                    </div>
						
					
				</div>
		           
            </div>
        </div>
    </section>

<cms:else/>
<cms:redirect url="<cms:link 'executive-team.php'/>"/></cms:if>

<cms:else/>
<section class="page-section lazy">
	<img class="page-image lazy" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>/assets/images/blurred-bg.jpg" alt="<cms:show orgname/>">	   
	<div class="row page-header px-3 py-5 justify-content-center">
		<cms:show_globals masterpage=k_template_name>
		<h2 class="h1 mb-3 text-center col-12"><cms:get "title_<cms:show k_lang/>"/></h2>
		<p class="lead m-0 text-center col-lg-8"><cms:get "short_content_<cms:show k_lang/>"/></p>
		</cms:show_globals>				 
	</div>					 
</section>

<section class="page-team bg-white pt-3">
	<div class="container">
		<div class="row justify-content-center">
			<cms:pages masterpage=k_template_name orderby='weight' order='asc' custom_field="part_of==leadership | show_in_list==1'">		
            <a href="<cms:show_with_lc k_page_link/>" class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                <div class="team-item wow fadeInUp">
                    <figure class="image-anime mb-2">
                        <img class="lazy" src='<cms:show px_img/>' data-src="<cms:show page_image/>" alt='<cms:get "title_<cms:show k_lang/>"/>'>
                    </figure>
                    <div class="team-body">
                        <div class="team-content">
                            <h2 class="text-accent-color"><cms:get "title_<cms:show k_lang/>"/></h2>
							<div class="h4 text-black"><cms:get "designation_<cms:show k_lang/>"/></div>
                        </div>
                    </div>
                </div>
			</a>
			<cms:no_results><cms:redirect url="<cms:link 'doctors.php'/>"/></cms:no_results>
			</cms:pages>
		</div>
	</div>
</section>
</cms:if>

<cms:trim "<cms:embed 'common/footer.inc' />"/>
<?php COUCH::invoke(); ?>