<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='Patient Feedback' clonable='1' order="180">
<cms:globals><cms:embed 'common/page_global_editables.html'/></cms:globals>

<cms:editable type='text' name="user_email" label='Email' desc="required" order='30' validator='email' required='1' />
<cms:editable type='text' name="user_phone" label='Phone' order='40' required='1' min_len="7" validator='regex=/^\+[0-9]{7,15}$/' validator_msg='regex=Enter a valid phone number, including country code'/>
<cms:editable type='text' name="user_subject" label='Subject' desc="required" order='50' required='1'/>
<cms:editable name='user_message' type='textarea' label="Details" height='100' required='1'/>
<cms:editable type='datetime' name='page_date' allow_time='1' label="Submitted Date" default_time="@current" group='p_publish_group'
height='100' order='11'/>

<cms:config_form_view>
	<cms:field 'k_page_title' order='0' label="Full Name" required='1' hide='1'><cms:show k_page_title/></cms:field>
	<cms:field 'page_date'><cms:date page_date format='Y-m-d H:i:s'/></cms:field>
	<cms:field 'user_email'><cms:show user_email/></cms:field>
	<cms:field 'user_phone'><cms:show user_phone/></cms:field>
	<cms:field 'user_subject'><cms:show user_subject/></cms:field>
	<cms:field 'user_message'><cms:show user_message/></cms:field>
	
	<cms:field 'k_page_name'   order='1000' label="Page link name" hide='1'/>
	<cms:field 'k_published_date'  order='1001' label="Submitted status" hide='1'/>
		
</cms:config_form_view>

<cms:config_list_view exclude='default-page-for-feedback-php' searchable='1'>
<cms:html><cms:show_info heading='Helpful Hint:' >
<ol>
<li>Add global title and description for section in <strong>'Manage Globals'</strong> in top right</li>
</ol>
</cms:show_info></cms:html>

<cms:if k_user_access_level ge '10' ><cms:field 'k_selector_checkbox' /></cms:if>
	<cms:field 'k_page_title'  sortable='0'><a href="<cms:admin_link />"><strong><cms:show k_page_title/></strong></a><br><cms:show user_subject/></cms:field>
	<cms:field 'user_phone'  header='Contact' sortable='0'><cms:show user_phone/><br><cms:show user_email/></cms:field>
	<cms:field 'page_date' header='Submitted Date' sortable='0'><cms:date page_date format='Y-m-d H:i:s'/></cms:field>
	<cms:field 'k_published_date' header='View Details' sortable='0'><a href="<cms:admin_link />"><span class="label label-success">View</span></a></cms:field>
</cms:config_list_view>
</cms:template >
<cms:if k_is_home>
<cms:trim "<cms:embed 'common/header.inc' />"/>

<section class="contact-us-form bg-black">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-lg-8">
				<div class="contact-form bg-dark">                         
					

					<cms:form class="feedback pt-3 pb-3 px-md-3 loader_form"  name="feedback" masterpage=k_template_name mode='create' enctype='multipart/form-data' method='post' anchor='1'>
					
					<div class="d-block text-center text-md-start text-white mb-5 border-bottom">
						<cms:show_globals>
						<h3 class="h3 text-accent-color mb-2"><cms:get "title_<cms:show k_lang/>"/></h3>
						<cms:do_shortcodes><cms:get "content_<cms:show k_lang/>"/></cms:do_shortcodes>
						</cms:show_globals>
					</div>

					<cms:trim "<cms:embed 'common/flash_block.html'/>"/>
					
					<cms:if k_success>
						<cms:check_spam email=frm_user_email />				  
						<cms:db_persist_form
						_invalidate_cache='0'
						_auto_title='0'
						k_publish_date='0000-00-00 00:00:00'
						k_page_title="<cms:show frm_contact_name/>"
						/>
					   
						<cms:if k_success>
						<cms:set subject_email="<cms:concat frm_contact_name ' - Feedback received -' frm_user_subject/>" />
						<cms:set success_message="<strong>Dear <cms:show frm_contact_name/></strong> ,<br/><br/>Thank you for submitting the details.<br>Our team will check your message and contact you back if necessary.<br/><br/>We thank you for your patience.<br><strong>Take care</strong>."/>

						<cms:set_flash name='success_msg' value='1' />
						<cms:set_flash name='message_value' value=success_message />
					   
						<cms:set reply_email = "<cms:get_field 'feedback_form_email' masterpage='globals.php' />"/>
						<cms:if reply_email>
							<cms:set reply_email_to="<cms:concat 'Elyzee Feedback <' reply_email '>' />" />
							<cms:set subject_email="<cms:concat '[Feedback] ' frm_contact_name ' - ' frm_user_subject/>" />
							<cms:set success_message="<strong>Dear Team</strong> ,<br/><br/>The following concern was submitted from <b><cms:show orgname/></b> Website Feedback Form<br/>"/>
							<cms:send_mail from=org_noreply_email to=reply_email_to reply_to=frm_user_email subject=subject_email debug=email_debug html='1'><cms:embed 'emails/contact.html'/></cms:send_mail>
						</cms:if>

						<cms:redirect url="<cms:link k_template_name/>"/>
						</cms:if>
					</cms:if>

					<cms:trim "<cms:embed 'common/form_error_block.html'/>"/>

					<div class="row">

						<div class="col-12 pb-3">
							<div class="form-group mb-3">
								<div class="input-group">
									<span class="input-group-text"><i class="fa-solid fa-user form-group-icon text-accent-color"></i></span>
									<cms:input type="text" class="form-control <cms:if k_error_contact_name>is-invalid</cms:if>" id="contact_name" name="contact_name" label="<cms:get 'locale.full_name'/>" title="<cms:get 'locale.full_name'/>" placeholder="<cms:get 'locale.full_name'/> *" required='1' />
								</div>
								<cms:if k_error_contact_name><small class="text-danger mx-2">* <cms:get "locale.required"/>: <cms:get "locale.field_cannot_left_empty"/></small></cms:if>
							</div>
						</div>

						<div class="col-md-6 pb-3">
							<div class="form-group mb-3">
								<div class="input-group">
									<span class="input-group-text"><i class="fa-solid fa-envelope form-group-icon  text-accent-color"></i></span>
									<cms:input type="bound" class="form-control <cms:if k_error_user_email>is-invalid</cms:if>" id="user_email" required='1' validator='email' name="user_email" dir="ltr" label="<cms:get 'locale.email'/>" title="<cms:get 'locale.email'/>" placeholder="xxx@xxx.com"/>
								</div>
								<cms:if k_error_user_email><small class="text-danger mx-2">* <cms:get "locale.required"/>: <cms:get "locale.enter_valid_email"/></small></cms:if>
							</div>
						</div>

						
						<div class="col-md-6 pb-3">
							<div class="form-group mb-3">

							<cms:input type="text" class="form-control <cms:if k_error_user_phone || k_error_user_contact>is-invalid</cms:if>" id="user_contact" name="user_contact" label="<cms:get 'locale.phone'/>" dir="ltr" title="<cms:get 'locale.phone'/>" placeholder="xxxxxxxxx" inputmode="numeric" autocomplete="off" spellcheck="false" min_len="7" max_len="15" minlength="7" maxlength="15" validator='min_len=7 | max_len=15' required='1'/>
							
							<cms:hide>
							<cms:input type="bound" class="form-control d-none" id="user_phone" name="user_phone" label="<cms:get 'locale.phone'/>" dir="ltr" title="<cms:get 'locale.phone'/>" placeholder="eg: +9715XXXXXXXX" inputmode="numeric" autocomplete="off" spellcheck="false" min_len="7" max_len="15" minlength="7" maxlength="15" validator='min_len=7 | max_len=15' required='1'/>
							</cms:hide>

							<cms:if k_error_user_phone || k_error_user_contact><small class="text-danger mx-2">* <cms:get "locale.required"/>: <cms:get "locale.enter_valid_phone"/></small></cms:if>
							</div>
						</div>

						<div class="col-12 pb-3">
							<div class="form-group mb-3">
								<div class="input-group">
									<span class="input-group-text"><i class="fa-solid fa-pen form-group-icon  text-accent-color"></i></span>
									<cms:input type="bound" name="user_subject" class="form-control" label="<cms:get 'locale.subject'/>" title="<cms:get 'locale.subject'/>" placeholder="<cms:get 'locale.subject'/> *" autocomplete="off"/>
								</div>
								<cms:if k_error_user_subject><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
							</div>
						</div>
					   
						<div class="col-12 pb-3">
							<div class="form-group mb-3">
								<cms:input name='user_message' type='bound' class="form-control text-accent-color" placeholder="<cms:get 'locale.message'/> *" label="<cms:get 'locale.message'/>" title="<cms:get 'locale.message'/>"/>
								<cms:if k_error_user_message><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
								
							</div>
						</div>

						<div class="col-12 pb-3 bg-dark">
							<div class="form-group mb-3 bg-dark">
								<cms:input type='recaptcha' label="Captcha" class="form-control bg-dark w-100 <cms:if k_error_elyzee_captcha>is-invalid</cms:if>" title="Captcha" name='elyzee_captcha' hl="<cms:show k_lang/>" theme='dark'/>
								<cms:if k_error_elyzee_captcha><small class="text-danger mx-2">* <cms:get "locale.required"/>: <cms:show k_error_elyzee_captcha/></small></cms:if>
							</div>
						</div>

					   <cms:hide><cms:input name='page_date' type='bound' default_time="@current" class="d-none"/></cms:hide>	

					   <div class="col-12">
						   <button type="submit" class="btn-default mt-3" title='<cms:get "locale.submit"/>'><cms:get "locale.submit"/></button>
					   </div>

					</div>			
					</cms:form>

				</div>
			</div>

			<div class="col-lg-4"><cms:trim "<cms:embed 'contact/cta_gmap.inc' />"/></div>
		</div>
	</div>
</section>
<cms:trim "<cms:embed 'about/how_block_view.inc'/>"/>   

<cms:trim "<cms:embed 'common/footer.inc' />"/>
<cms:else/>
<cms:redirect url="<cms:link k_template_name/>"/>
</cms:if>
<?php COUCH::invoke(); ?>