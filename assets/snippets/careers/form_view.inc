<section id="career_form" class="bg-black py-5">
<div class="container">
<div class="row justify-content-center">
<h4 class="d-none zero-size"><cms:get "locale.apply_now"/></h4>
<div class="col-lg-8">

<!-- Careers Form -->
<cms:form class="w-100 bg-dark shadow-sm rounded px-5 py-5 loader_form" name="careers" masterpage='careers.php' mode='create' enctype='multipart/form-data' method='post' anchor='1'>	

<cms:trim "<cms:embed 'common/flash_block.html'/>"/>
		  
<cms:if k_success>
<cms:check_spam email=frm_user_email />

<cms:if k_is_folder && k_folder_id>

<cms:db_persist_form
_invalidate_cache='0'
_auto_title='0'
k_page_title=frm_contact_name
k_page_folder_id=k_folder_id
user_job_role = k_folder_title
k_publish_date='0000-00-00 00:00:00'
/>

<cms:if k_success>
	<cms:embed 'careers/form_submit_success.inc'/>
	<cms:redirect url="<cms:show_with_lc k_folder_link/>#career_form"/>
</cms:if>

<cms:else/>
	<cms:embed 'careers/form_submit_success.inc'/>
	<cms:redirect url="<cms:show_with_lc k_template_link/>#career_form"/>
</cms:if>
</cms:if>

<cms:trim "<cms:embed 'common/form_error_block.html'/>"/>

<div class="row">
	
    <div class="col-sm-12">
	<cms:if k_is_folder>
		<div class="d-block h3 text-accent-color mb-3 fw-bold"><cms:get "locale.apply_for_this_job"/></div>
		<p class="lead mt-1 text-light fw-bold"><cms:get "title_<cms:show k_lang/>"/></p>
	  
	   <cms:else/>
	   <div class="d-block h3 text-accent-color mb-3"><strong><cms:get "locale.fill_upload_resume"/></strong></div>
	  
   	   </cms:if>
	   <hr class="mb-40">       
    </div>
	
	
							


<!-- Title -->
<div class="col-md-12 col-lg-4 pb-3">
<label><cms:get "locale.title"/> <span class="text-danger">*</span></label>
<div class="form-group mb-3">
	<div class="input-group">
	  <span class="input-group-text"><i class="fa-solid fa-circle-info form-group-icon"></i></span>
	  <cms:input type="bound" class="form-control form-select <cms:if k_error_user_title>is-invalid</cms:if>" id="user_title" required='1' name="user_title" label="<cms:get 'locale.title'/>" title="<cms:get 'locale.title'/>" />
	</div>
	<cms:if k_error_user_title><small class="text-danger mx-2">* <cms:get "locale.required"/>: <cms:get "locale.field_cannot_left_empty"/></small></cms:if>
</div>
</div>

<!-- Full Name -->
<div class="col-md-12 col-lg-8 pb-3">
<label><cms:get 'locale.full_name'/> <span class="text-danger">*</span></label>
<div class="form-group mb-3">
	<div class="input-group">
	  <span class="input-group-text"><i class="fa-solid fa-user form-group-icon"></i></span>
	  <cms:input type="text" class="form-control <cms:if k_error_contact_name>is-invalid</cms:if>" id="contact_name" name="contact_name" label="<cms:get 'locale.full_name'/>" title="<cms:get 'locale.full_name'/>" placeholder="<cms:get 'locale.full_name'/> *" required='1' />
</div>
<cms:if k_error_contact_name><small class="text-danger mx-2">* <cms:get "locale.required"/>: <cms:get "locale.field_cannot_left_empty"/></small></cms:if>
</div>
</div>

<!-- Email -->
<div class="col-md-12 col-lg-4 pb-3">
<label><cms:get 'locale.email'/> <span class="text-danger">*</span></label>
<div class="form-group mb-3">
	<div class="input-group">
		 <span class="input-group-text"><i class="fa-solid fa-envelope form-group-icon"></i></span>
<cms:input type="bound" class="form-control <cms:if k_error_user_email>is-invalid</cms:if>" id="user_email" required='1' validator='email' name="user_email" label="<cms:get 'locale.email'/>" title="<cms:get 'locale.email'/>" placeholder="xxx@xxx.com"/>
</div>
<cms:if k_error_user_email><small class="text-danger mx-2">* <cms:get "locale.required"/>: <cms:get "locale.enter_valid_email"/></small></cms:if>
</div>
</div>

<!-- Phone -->
<div class="col-md-12 col-lg-4 pb-3">
<label><cms:get 'locale.phone'/> <span class="text-danger">*</span></label>
<div class="form-group mb-3">
	<div class="input-group">
		 <span class="input-group-text"><i class="fa-solid fa-phone form-group-icon"></i></span>
<cms:input type="bound" class="form-control <cms:if k_error_user_phone>is-invalid</cms:if>" id="user_phone" name="user_phone" label="<cms:get 'locale.phone'/>" title="<cms:get 'locale.phone'/>" placeholder="eg: +9715XXXXXXXX"/>
</div>
<cms:if k_error_user_phone><small class="text-danger mx-2">* <cms:get "locale.required"/>: <cms:get "locale.enter_valid_phone"/></small></cms:if>
</div>
</div>

<!-- Gender -->
<div class="col-md-12 col-lg-4 pb-3">
<label><cms:get 'locale.gender'/> <span class="text-danger">*</span></label>
<div class="form-group mb-3">
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-circle-info form-group-icon"></i></span>

<cms:input type="bound" class="form-control form-select <cms:if k_error_user_gender>is-invalid</cms:if>" id="user_gender" name="user_gender" label="<cms:get 'locale.gender'/>" title="<cms:get 'locale.gender'/>"/>
</div>
<cms:if k_error_user_gender><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>

<!-- Nationality -->
<div class="col-md-12 col-lg-6 pb-3">
<label><cms:get 'locale.nationality'/> <span class="text-danger">*</span></label>
<div class="form-group mb-3">
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-globe form-group-icon"></i></span>

<cms:input type="bound" class="form-control form-select <cms:if k_error_user_nationality>is-invalid</cms:if>" id="user_nationality" name="user_nationality" label="<cms:get 'locale.nationality'/>" title="<cms:get 'locale.nationality'/>"/>
</div>
<cms:if k_error_user_nationality><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>

<!-- country_of_residence -->
<div class="col-md-12 col-lg-6 pb-3">
<label><cms:get 'locale.current_emirate_city'/> <span class="text-danger">*</span></label>
<div class="form-group mb-3">
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-location-crosshairs form-group-icon"></i></span>
<cms:input type="bound" class="form-control form-select <cms:if k_error_user_city>is-invalid</cms:if>" id="user_city" name="user_city" label="<cms:get 'locale.current_emirate_city'/>" title="<cms:get 'locale.current_emirate_city'/>"/>
</div>
<cms:if k_error_user_city><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>



<cms:if k_is_folder>
<cms:hide>
<cms:input type="bound" name="user_job_role" value="<cms:show k_folder_title/>"/>
</cms:hide>
<cms:else/>
<!-- interested_job_role -->
<div class="col-md-12 pb-3">
<label><cms:get 'locale.interested_job_role'/> <span class="text-danger">*</span></label>
<div class="form-group mb-3">
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-briefcase form-group-icon"></i></span>
<cms:input type="bound" class="form-control <cms:if k_error_user_job_role>is-invalid</cms:if>" id="user_job_role" name="user_job_role" label="<cms:get 'locale.interested_job_role'/> " title="<cms:get 'locale.interested_job_role'/> " placeholder="eg: Doctor, Nurse, HR Executive, ..."/>
</div>
<cms:if k_error_user_job_role><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>	
</cms:if>		
				  
				  

				  

<!-- years_exp -->
<div class="col-md-12 col-lg-6 pb-3">
<label><cms:get 'locale.years_exp'/> <span class="text-danger">*</span></label>
<div class="form-group mb-3">
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-calendar-days form-group-icon"></i></span>

<cms:input type="bound" name="user_experience" class="form-control form-select <cms:if k_error_user_experience>is-invalid</cms:if>" label="<cms:get 'locale.years_exp'/>" title="<cms:get 'locale.years_exp'/>" autocomplete="off"/>
</div>
<cms:if k_error_user_experience><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>

<!-- availablity_to_join -->
<div class="col-md-12 col-lg-6 pb-3">
<label><cms:get 'locale.availablity_to_join'/> <span class="text-danger">*</span></label>
<div class="form-group mb-3">
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-handshake form-group-icon"></i></span>
<cms:input type="bound" name="user_availablity" class="form-control <cms:if k_error_user_availablity>is-invalid</cms:if>" label="<cms:get 'locale.availablity_to_join'/>" title="<cms:get 'locale.availablity_to_join'/>" placeholder='eg: within 1 month' autocomplete="off"/>
</div>
<cms:if k_error_user_availablity><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>

<!-- cover_letter -->
<div class="col-12 pb-3">
<label><cms:get 'locale.cover_letter'/> <span class="text-danger">*</span></label>
<div class="form-group mb-3">
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-pen form-group-icon"></i></span>

<cms:input name='user_message' type='bound' class="form-control <cms:if k_error_user_message>is-invalid</cms:if>" placeholder="<cms:get 'locale.cover_letter_placeholder'/>" label="<cms:get 'locale.cover_letter'/>" title="<cms:get 'locale.cover_letter'/>"/>
</div>
<cms:if k_error_user_message><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>

<!-- upload_resume -->
<div class="col-12 pb-3">
<label><cms:get 'locale.upload_resume'/> <span class="text-danger">*</span> <small>(<cms:get 'locale.upload_files_limit_info'/>)</small></label>
<div class="form-group">
	<cms:input type='uploadfile' name='user_cv' class="form-control <cms:if k_error_user_cv>is-invalid</cms:if>" allowed_ext='doc, docx, pdf' max_size='51200'  label="<cms:get 'locale.upload_resume'/>" title="<cms:get 'locale.upload_resume'/>" desc="<cms:show k_error_user_cv/>" required='1' />
<cms:if k_error_user_cv><small class="text-danger mx-2">* <cms:get "locale.required"/>: <cms:show k_error_user_cv/></small></cms:if>
</div>
</div>

 <cms:hide><cms:input name='page_date' type='bound' default_time="@current" class="d-none"/></cms:hide>	

<!-- Captcha -->
<div class="col-12 mt-3">
<div class="form-group">
<cms:input type='recaptcha' label="Captcha" class="form-control w-100 <cms:if k_error_careers_captcha>is-invalid</cms:if>" title="Captcha" name='careers_captcha' hl="<cms:show k_lang/>"  theme='dark'/>
<cms:if k_error_careers_captcha><small class="text-danger mx-2">* <cms:get "locale.required"/>: <cms:show k_error_careers_captcha/></small></cms:if>
</div>
</div>


<!-- submit Button -->
<div class="col-12 mt-5">
<button type="submit" class="btn-default">
<span><cms:get "locale.submit"/></span> <i class="icon-arrow-right"></i>
</button>
<div class="contact-result"></div>
</div>

</div>			
</cms:form>
<!-- /. Careers Form -->


</div><!-- /.col-lg-6 -->
</div><!-- /.row -->
</div><!-- /.container -->
</section>
