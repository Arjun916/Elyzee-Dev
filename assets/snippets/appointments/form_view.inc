<cms:if main_template_name eq 'services.php' && k_is_page><cms:set book_user_message = "<cms:get "title_<cms:show k_lang/>"/>" 'global'/></cms:if>
<cms:no_cache />
<cms:form class="appointments py-3 px-md-3 loader_form" name="book_now" masterpage='book-appointment.php' mode='create' enctype='multipart/form-data' method='post' anchor='1'>

<div class="row align-items-center border-bottom pb-3 mb-5">
	

<cms:if ((k_template_name eq 'doctors.php') || (k_template_name eq 'services.php')) && page_image>
<div class="col-md-auto text-center text-md-start">
	 <img class="img-100 lazy" src='<cms:show px_img/>' data-src="<cms:show page_image/>" alt='<cms:get "title_<cms:show k_lang/>"/>'>
</div>
<cms:else_if curr_doct_name/>
<div class="col-md-auto text-center text-md-start">
	 <img class="img-100 lazy" src='<cms:show px_img/>' data-src="<cms:get_custom_field 'page_image' masterpage='doctors.php' page=curr_doct_name/>" alt='<cms:get "title_<cms:show k_lang/>"/>'>
</div>

</cms:if>
<div class="col-md text-center text-md-start">
	<div class="h3 text-accent-color"><cms:get "locale.book_appointment"/></div>
	<cms:if k_is_folder && k_template_name eq 'services.php'><p class="lead fw-bold mt-0 mb-2 text-accent-color"><cms:folders masterpage='services.php' root=k_folder_name depth='1' include_custom_fields='1' orderby='weight' order='asc'><cms:get "title_<cms:show k_lang/>"/><cms:set current_speciality_title = k_folder_title 'global'/></cms:folders></p>
	<cms:else_if (k_template_name eq 'doctors.php') || (k_template_name eq 'services.php')/><p class="lead fw-bold mt-0 mb-2 text-accent-color"><cms:get "title_<cms:show k_lang/>"/></p>
	<cms:else_if curr_doct_name/>
	<p class="lead fw-bold mt-0 mb-2 text-accent-color"><cms:get_custom_field var="title_<cms:show k_lang/>" masterpage='doctors.php' page=curr_doct_name/></p>
	</cms:if>
	<p class=" text-white mb-0 small"><cms:get "locale.appointment_heading"/></p>
</div>
</div>


<cms:trim "<cms:embed 'common/flash_block.html'/>"/>

<cms:if k_success>
<cms:capture into='doctor_value' 'global'><cms:gpc 'doctor_list'/></cms:capture>		  
<cms:db_persist_form
_invalidate_cache='1'
_auto_title='0'
k_page_title="<cms:show frm_contact_name/>"
speciality = frm_speciality_list
doctor	= doctor_value
reach_source = frm_reach_source
user_message = frm_user_message
crm_lead_id = crm_lead_id_val
crm_raw_response = crm_raw_response_val
crm_error = crm_error_val
crm_error_desc = crm_error_desc_val
/>
<cms:if k_success>
<cms:if k_user_access_level lt '10'><cms:embed "appointments/generate_crm_lead.inc"/></cms:if>
	
<cms:set success_message="<strong>Dear <cms:show frm_contact_name/></strong> ,<br/><br/>Thank you for sending your appointment request.<br>We are committed to offering you the best medical care.<br>One of our representatives will contact you shortly to confirm the appointment.<br/><br/>We thank you for your patience.<br><strong>Take care</strong>."/>
<cms:set_flash name='success_msg' value='1' />
<cms:set_flash name='message_value' value=success_message />


<cms:set reply_email = "<cms:get_field 'appointment_form_email' masterpage='globals.php' />"/>
<cms:if (k_user_access_level lt '10') && reply_email>
<cms:capture into='speciality_value' 'global'><cms:show frm_speciality_list/></cms:capture>

<cms:set reply_email_to="<cms:concat 'Elyzee Appointments <' reply_email '>' />" />

<cms:set subject_email="<cms:concat '[Appointment] ' frm_contact_name ' - ' frm_appointment_date/>" />
<cms:set success_message="<strong>Dear Team</strong> ,<br/><br/>The following appointment request was submitted from <b><cms:show orgname/></b> Website Appointments Form<br/>"/>

<cms:send_mail from=org_noreply_email to=reply_email_to reply_to=frm_user_email subject=subject_email debug=email_debug html='1'><cms:embed 'emails/appointments.html'/></cms:send_mail>	
</cms:if>

<cms:ignore><cms:redirect url="<cms:show_with_lc k_page_link/>"/></cms:ignore>

<cms:set_flash name='r_page_link' value="<cms:show_with_lc k_page_link/>" />
<cms:redirect url="<cms:link 'thank-you.php'/>"/>
</cms:if>			
</cms:if>


<cms:trim "<cms:embed 'common/form_error_block.html'/>"/>

<div class="row">
<div class="col-sm-6 col-md-6 col-lg-6 pb-3">
<div class="form-group mb-3">
	<div class="input-group">
	  <span class="input-group-text"><i class="fa-solid fa-user form-group-icon text-accent-color"></i></span>
	  <cms:input type="text" class="form-control <cms:if k_error_contact_name>is-invalid</cms:if>" id="contact_name" name="contact_name" label="<cms:get 'locale.full_name'/>" title="<cms:get 'locale.full_name'/>" placeholder="<cms:get 'locale.full_name'/> *" required='1' />
</div>
<cms:if k_error_contact_name><small class="text-danger mx-2">* <cms:get "locale.required"/>: <cms:get "locale.field_cannot_left_empty"/></small></cms:if>
</div>
</div>


<div class="col-sm-6 pb-3">
<div class="form-group mb-3 form-group-date">
	<div class="input-group">
		 <span class="input-group-text" dir="ltr"><i class="fa-solid fa-calendar form-group-icon  text-accent-color"></i></span>
		 <cms:input dir="ltr" type="bound" name="appointment_date" class="form-control datetime_input " label="<cms:get 'locale.date_time'/>" title="<cms:get 'locale.date_time'/>" placeholder="<cms:get 'locale.date_time'/> *" autocomplete="off"/>
	 </div>
	 <cms:if k_error_appointment_date><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
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




<!-- Specialities -->
<cms:capture into='specialities_output'>
<cms:folders masterpage='services.php' depth='1' extended_info='1' include_custom_fields='1' orderby='weight' order='asc'>
	<option class="<cms:show k_folder_name/>"  value="<cms:show k_folder_name/>" <cms:if frm_speciality_list && (frm_speciality_list eq k_folder_name)>selected<cms:else_if current_speciality_title && (current_speciality_title eq k_folder_title)/>selected</cms:if>><cms:get "title_<cms:show k_lang/>"/></option>
	<cms:set has_specialities = '1' 'global'/>		
</cms:folders>
</cms:capture>


<cms:if has_specialities>
<div class="col-md-6 pb-3">
<div class="form-group mb-3">
	<div class="input-group">
		 <span class="input-group-text"><i class="fa-solid fa-stethoscope form-group-icon  text-accent-color"></i></span>
		 <cms:show frm_speciality_list/>
		 <select name="speciality_list" class="form-control form-select select-parent select-picker <cms:if k_error_speciality_list>is-invalid</cms:if>" title='<cms:get "locale.specialty"/>'>
			<option class="any -"  value="-">* -- <cms:get 'locale.choose_specialty'/> --</option>
			<cms:show specialities_output/>
		</select>

</div>
<cms:if k_error_speciality_list><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>

</cms:if>
<!-- /. Specialities -->

<cms:set curr_doct_name = "<cms:if main_template_name eq 'doctors.php'><cms:show k_page_name/><cms:else_if curr_doct_name/><cms:show curr_doct_name/></cms:if>"/>
<!-- Doctors -->
<cms:capture into='doctors_output'>
<cms:pages masterpage='doctors.php' orderby='weight' order='asc'>
	<cms:capture into="doc_speciality"><cms:show primary_speciality/></cms:capture>
	
	<option class="<cms:show doc_speciality/> -"  value="<cms:show k_page_name/>" <cms:if curr_doct_name eq k_page_name>selected</cms:if>><cms:get "title_<cms:show k_lang/>"/></option>
	<cms:set has_doctors = '1' 'global'/>
</cms:pages>
</cms:capture>

<cms:if has_doctors>
<div class="col-md-6 pb-3">
<div class="form-group mb-3">
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-user-doctor form-group-icon text-accent-color "></i></span>
		<select name="doctor_list" class="form-control form-select select-filter select-picker <cms:if k_error_doctor_list>is-invalid</cms:if>" title='<cms:get "locale.select_doctor"/>'>
			<option class="any -"  value="-"><cms:get "locale.select_doctor"/></option>
			<cms:show doctors_output/>
		</select>
</div>
<cms:if k_error_doctor_list><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>

</cms:if>
<!-- /. Doctors -->

<div class="col-12 pb-3">
<div class="form-group mb-3">
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-bullhorn form-group-icon text-accent-color"></i></span>
	<cms:input type="dropdown" name="reach_source" class="form-control form-select <cms:if k_error_reach_source>is-invalid</cms:if>" label="How did you hear about us?" title="How did you hear about us?" opt_values="* -- How did you hear about us? --=- | Friend or Family/Word of Mouth | Referred by external physician/facility | Newspaper/Magazine | Radio/TV | Google Search | Facebook/Instagram | Other Social Media | Hospital Website | Exhibition/Events/Talk Shows | SMS/WhatsApp | Insurance Referral | Others" required='1'/>
</div>
<cms:if k_error_reach_source><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>

</div>
</div>

<div class="col-12 pb-3">
<div class="form-group mb-3">
	
<cms:if k_submitted || k_error || k_success || frm_user_message><cms:set book_user_message = frm_user_message 'global'/></cms:if>
<label><span class="text-accent-color"><cms:get 'locale.notes_to_doctor'/></span></label>
<cms:input name='user_message' type='textarea' height='100' class="form-control text-white" placeholder="<cms:get 'locale.add_notes_for_doctor'/>…" label="<cms:get 'locale.notes_to_doctor'/>" title="<cms:get 'locale.notes_to_doctor'/>"><cms:show book_user_message/></cms:input>
<cms:if k_error_user_message><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>

<cms:hide><cms:input name='page_date' type='bound' default_time="@current" class="d-none"/></cms:hide>	

<cms:if k_user_access_level lt '10'>
<div class="col-12 pb-3 bg-dark">
<div class="form-group mb-3 bg-dark">
<cms:input type='recaptcha' label="Captcha" class="form-control bg-dark w-100 <cms:if k_error_elyzee_captcha>is-invalid</cms:if>" title="Captcha" name='elyzee_captcha' hl="<cms:show k_lang/>" theme='dark'/>
<cms:if k_error_elyzee_captcha><small class="text-danger mx-2">* <cms:get "locale.required"/>: <cms:show k_error_elyzee_captcha/></small></cms:if>
</div>
</div>
</cms:if>




<div class="col-12 small text-white">
	<div class="alert alert-secondary py-2 d-flex align-items-center justify-content-start">
		<i class="fa-solid fa-triangle-exclamation me-3 fa-xl text-accent-color"></i> <cms:get "locale.appointment_declaration_statement"/></div>
</div>

<div class="col-12">
<button type="submit" class="btn-default mt-3" title='<cms:get "locale.submit"/>'>
<cms:get "locale.book_appointment"/>
</button>
</div>

</div>			
</cms:form>