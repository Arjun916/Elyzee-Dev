<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='Locations' clonable='1' order="40">
<cms:globals><cms:embed 'common/page_global_editables.html'/></cms:globals>

<cms:editable type="group" label="Location Name" desc='eg: Elyzee Hospital' name="p_title_group" order='10'/>
<cms:editable type="group" label="Location - Street Address, City & Country" desc='eg: Abu Dhabi, United Arab Emirates' name="location_group" order='20' collapsed='0'/>	
<cms:editable name='location_pobox' label='PO Box' desc='00000' type='text' group='location_group' order='1' validator='non_zero_integer' />

<cms:editable type="group" label="Location - Map & Geo Cordinates" name="map_group" order='20' collapsed='0'>
<cms:editable name='map_row' type='row' order='10'>
<cms:editable name='location_url' label='Enter Google Maps URL of location here' desc='eg: https://maps.app.goo.gl/MZZA31FnVbWv3GUM8' type='text' group='map_group' order='10' validator='url' validator_msg="Enter a valid URL" class='col-md-12'/>

<cms:editable name='location_latitude' label='Latitude' desc='24.45938740470179' type='text' group='location_group' order='20' validator='decimal' class='col-md-6'/>
<cms:editable name='location_longitude' label='Longitude' desc='54.3492404355819' type='text' group='location_group' order='21' validator='decimal' class='col-md-6'/>
</cms:editable>
</cms:editable>




<cms:editable type="group" label="Location Working Days/Hours" desc='eg: Monday - Sunday 7:00 AM - 10:00 AM' name="p_work_group" order='49' collapsed='0'/>	


<!-- Contact Information - Secondary -->
<cms:editable type='group' label='Contact Information - Location' name='p_contact_group' order='50' collapsed='0'>

<cms:editable name='contact_row' type='row' order='10'>
<cms:editable type="text" name="location_phone_code" label='Country Code' desc='eg: +971' required='1' order='10' class='col-xs-3'>+971</cms:editable>
<cms:editable type="text" name="location_phone_primary" label='Primary Mobile Number' desc='eg: 8005005' validator='non_negative_integer | min_len=7 | max_len=14' maxlength="14" validator_msg='Enter valid number with country code!' order='11' class='col-xs-9'>8005005</cms:editable>
</cms:editable>
<cms:editable name='email_row' type='row' order='20'>
<cms:editable name="location_email" type="text" label='Contact Email' validator='email' order='20' class='col-md-6'/>
</cms:editable>
</cms:editable>

<cms:editable type='group' label='Location - description' name='p_desc_group' order='60' collapsed='0'/>
	<cms:editable type="group" label="Location - Highlight Photo" desc="Optional, Size should be 1920x700px aspect ratio" name="p_image_group" order='70'/>
	<cms:editable name='page_image'
		width='1920'
		height='1080'
		label="Upload Photo"
		desc="Size should be 1920x1080px aspect ratio"
		type='image'
		show_preview='1'
		preview_height='75'
		group="p_image_group"
		required='1'	
		quality='100'
		/>
	

	
<cms:each k_supported_langs as='lang' key='lc'>
<cms:editable type='text'  name="title_<cms:show lc />" label="<cms:show lang/>"  group='p_title_group' order=k_count required='1'>Elyzee Hospital</cms:editable>
<cms:editable type='text'  name="location_schedule_<cms:show lc />" label="<cms:show lang/>"  group='p_work_group' order=k_count required='1'>Monday - Sunday 7:00 AM - 10:00 AM</cms:editable>

<cms:editable type='text' name="location_<cms:show lc />" label="Street Address in <cms:show lang/>"  group='location_group' required='1' order="<cms:add k_count '10'/>">Al Khaleej Al Arabi Street, Mushrif, Abu Dhabi</cms:editable>
<cms:editable type='text' name="location_city_<cms:show lc />" label="Emirates/City - <cms:show lang/>"  group='location_group' required='1' order="<cms:add k_count '20'/>" ><cms:if lc eq 'ar'>أبو ظبي<cms:else/>Abu Dhabi</cms:if></cms:editable>
<cms:editable type='text' name="location_country_<cms:show lc />" label="Country - <cms:show lang/>"  group='location_group' required='1' order="<cms:add k_count '30'/>" ><cms:if lc eq 'ar'>الإمارات العربية المتحدة<cms:else/>United Arab Emirates</cms:if></cms:editable>

<cms:editable type='richtext' name="content_<cms:show lc />" label="<cms:show lang/>"  order=k_count group='p_desc_group' required='1' toolbar='custom' custom_toolbar='paste, pastetext, pastefromword, undo, redo, removeformat, cut, copy, bold, italic, underline, strike, subscript, superscript, link, unlink, table, format, justifyleft, justifycenter, justifyright, justifyblock, numberedlist, bulletedlist, outdent, indent, source'  css="<cms:show k_site_link />assets/css/editor.css"  body_class="<cms:show lc />"/>

</cms:each>

<cms:embed 'common/page_seo_editables.inc'/>

<cms:editable type='group' label='Publish Status' name='p_publish_group' order='1000' collapsed='0'/>

<cms:config_form_view>
<cms:field 'k_page_title' hide='1' skip='1'/>
<cms:persist k_page_title=frm_title_en />
<cms:field 'k_page_name'  group='p_seo_group' order='100' label="Page link name" desc="SEO friendly Slug for page URL"/>
<cms:field 'k_publish_date' group='p_publish_group' order='10' label="('Unpublished' will be hidden from the public listing)"/>
<cms:embed "common/hide_published_date.html"/>
</cms:config_form_view>



<cms:config_list_view exclude='default-page-for-contact-php' searchable='1' orderby='weight' order='asc'>
<cms:html><cms:show_info heading='Helpful Hint:' >
<ol>
<li>Add global title and description for section in <strong>'Manage Globals'</strong> in top right.</li>
</ol>
</cms:show_info></cms:html>

<cms:field 'k_selector_checkbox' />
<cms:field 'k_page_title' header='Title' sortable='0'>
<a href="<cms:show k_update_link/>"><cms:show k_page_title/></a>
</cms:field>
<cms:field 'location_en' header='Location' sortable='0'><cms:show location_en/>, <cms:show location_city_en/>, <cms:show location_country_en/></cms:field>
<cms:field 'k_page_date' header='Status' sortable='0'>
<cms:if k_page_date='0000-00-00 00:00:00'><span class="label label-error">Unpublished</span><cms:else/><span class="label label-success">Published</span></cms:if>
</cms:field>
<cms:field 'k_up_down' header='Sort Order' sortable='0'/>
<cms:field 'k_actions' sortable='0'/>
</cms:config_list_view>

</cms:template>

<cms:if k_is_page><cms:redirect url="<cms:link k_template_name/>"/></cms:if>
<cms:trim "<cms:embed 'common/header.inc' />"/>
    <section class="page-contact-us bg-black">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-us-content">
                        <div class="section-title text-accent-color">
							<cms:show_globals>
							<h3 class="wow fadeInUp text-accent-color"><cms:get "title_<cms:show k_lang/>"/></h3>
							<h2><cms:get "short_content_<cms:show k_lang/>"/></h2>
                            <cms:do_shortcodes><cms:get "content_<cms:show k_lang/>"/></cms:do_shortcodes>
							</cms:show_globals>
							<div class="d-block">
							<a href="#book_appointment" class="mt-3 btn-default" title='<cms:get "locale.book_appointment"/>'><i class="fa-solid fa-calendar"></i> <cms:get "locale.book_appointment"/></a>
							</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
       
                        <div class="contact-info-item wow fadeInUp" data-wow-delay="0.4s">								
									<p class="lead fw-bold mb-2"><a href="tel:<cms:show primaryphone/>" class="text-dark"><i class="fa-solid fa-phone pe-2"></i>&#x200E;<cms:show primaryphone/>&#x200E;</a></p>
										<cms:if orgaddress><p class=" d-flex justify-content-start pe-2 mb-2"><i class="fa-solid fa-location-dot pe-2 mt-1"></i><cms:show orgstreet />, <cms:show orgcity />, <cms:show orgcountry/></p></cms:if>
										<cms:if orgschedule><p class=" d-flex justify-content-start pe-2 mb-3"><i class="fa-solid fa-clock pe-2  mt-1"></i><cms:show orgschedule/></p></cms:if>

										<p class=" fw-bold mb-0"><cms:get "locale.follow_us"/>:</p>
										<cms:trim "<cms:embed 'common/sociallinks.inc' />"/>						
                           
                        </div>
                         
                     <p class="small text-accent-color mb-0 text-center mt-2"><cms:get "locale.feedback_form_prefix"/> <a href="<cms:link 'feedback.php'/>" class="btn btn-link btn-sm fw-bold p-0 m-0 text-light small"><cms:get "locale.feedback_form"/></a>.</p>

                </div>
				
				
            </div>
        </div>
    </section>

	 <section class="p-0 m-0 bg-black">
	<cms:trim "<cms:embed 'contact/cta_gmap.inc' />"/></section>
    <section id="book_appointment" class="contact-us-form bg-black">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-dark"><cms:trim "<cms:embed 'appointments/form_view.inc' />"/></div>
                </div>
            </div>
        </div>
    </section>
	
	<cms:trim "<cms:embed 'about/how_block_view.inc'/>"/>
<cms:trim "<cms:embed 'common/footer.inc' />"/>
<?php COUCH::invoke(); ?>