<?php require_once( 'manage/cms.php' ); ?>

<cms:template title='OP Survey Form' clonable='1' order="191">

<cms:globals>
<cms:editable type='group' label='Title of the listing page' name='p_title_group' order='10' collapsed='0'>
	<cms:editable name='title_row' type='row' order='10'>
		<cms:editable type='text'  name="title_en" label="Title - English"  order='10' required='1' class='col-md-6'>Out-Patient Satisfaction Survey</cms:editable>
		<cms:editable type='text'  name="title_ar" label="Title - Arabic"  order='11' required='1' class='col-md-6'>استبيان للمرضى في قسم العيادات الخارجية</cms:editable>

		<cms:editable type='textarea' name="short_content_en" label="Short Description Introduction - English" height='75'  order='20' required='1' class='col-md-6'>Dear Patient, your feedback is important to us and helps us improve our services. Please let us know how satisfied you are with the following aspects of your experience.</cms:editable>

		<cms:editable type='textarea' name="short_content_ar" label="Short Description Introduction - Arabic"  height='75' order='21' required='1' class='col-md-6'>عزيزي المريض، رأيك يهمنا ويساعدنا على تحسين خدماتنا. يرجى توضيح مستوى رضاك عن الجوانب التالية من تجربتك.</cms:editable>
		
	</cms:editable>
</cms:editable>
</cms:globals>


<cms:editable type="text" name="contact_name" label="Patient Name" required='1' order='10'/>
<cms:editable type='text' name="user_email" label='Email' order='11' validator='email' />
<cms:editable type='text' name="user_phone" label='Mobile Number' order='12' required='1' min_len="7" validator='regex=/^\+[0-9]{7,15}$/' validator_msg='regex=Enter a valid phone number, including country code'/>
<cms:editable type="text" name="doctor_technician" label="Treating Doctor or Technician" order='20'/>


<cms:editable type="dropdown" name="reception_registration" label='Reception and Registration' opt_values="-- Select --= | Satisfied | Neutral | Dissatisfied" order='30'/>
<cms:editable type="dropdown" name="doctor_technician_service" label='Doctor or Technician Service' opt_values="-- Select --= | Satisfied | Neutral | Dissatisfied" order='35'/>
<cms:editable type="dropdown" name="nursing_care" label='Medical & Nursing Care' opt_values="-- Select --= | Satisfied | Neutral | Dissatisfied" order='36'/>
<cms:editable type="dropdown" name="waiting_time" label='Waiting Time' opt_values="-- Select --= | Satisfied | Neutral | Dissatisfied" order='40'/>
<cms:editable type="dropdown" name="cleanliness_accessibility" label='Cleanliness and accessibility' opt_values="-- Select --= | Satisfied | Neutral | Dissatisfied" order='50'/>
<cms:editable type="dropdown" name="aftercare_advice" label='Aftercare advice' opt_values="-- Select --= | Satisfied | Neutral | Dissatisfied" order='55'/>




<cms:editable name='user_message' type='textarea' label="Comments or suggestions"  order='60' height='75'/>
<cms:editable type="radio" name="user_contact_consent" label="Would you like to be contacted?" opt_values="نعم / Yes = Yes | لا / No = No" opt_selected='0' order='61'/>
<cms:editable type="radio" name="recommend_elyzee" label="Would you recommend Elyzee Hospital?" opt_values="نعم / Yes = Yes | لا / No = No" opt_selected='0' order='62'/>
<cms:editable type='text' name="hear_aboutus" label='How did you hear about us' order='63'/>

<cms:editable type='datetime' name='page_date' allow_time='1' label="Submitted Date" default_time="@current" group='p_publish_group'
height='100' order='11'/>








<cms:editable type='group' label='Publish Status' name='p_publish_group' order='1000' collapsed='0'/>


<cms:config_form_view>
<cms:field 'k_page_title' order='0' label="Full Name" required='1'/>
<cms:field 'k_page_name'  group='p_publish_group' order='3' label="Page link name"/>
<cms:field 'k_publish_date' group='p_publish_group' order='1' label="Submitted Date"/>
</cms:config_form_view>


<cms:config_list_view exclude='default-page-for-survey-php' searchable='1'>
<cms:html><cms:show_info heading='Helpful Hint:' >
<ol>
<li>Add global title and description for section in <strong>'Manage Globals'</strong> in top right</li>
</ol>
</cms:show_info></cms:html>

<cms:field 'k_selector_checkbox' />
<cms:field 'k_page_title' />
<cms:field 'k_publish_date' group='p_publish_group' order='1' label="Submitted Date"/>
<cms:field 'k_actions' />

</cms:config_list_view>
</cms:template >
<cms:if k_is_home>
<cms:trim "<cms:embed 'common/header.inc' />"/>


<section class="bg-black dark-section pt-5 pb-3">
<div class="container">
    <div class="row justify-content-center">
		<div class="col-lg-10 col-xl-8 text-center">
		<cms:show_globals>
		<h4 class="text-accent-color mb-3 ar"><cms:get "title_ar"/></h4>
		<h4 class="text-accent-color mb-3 en"><cms:get "title_en"/></h4>
		
		</cms:show_globals>
		</div>
    </div>
	 </div>
</section>

<section class="bg-light p-0">
<div class="container">

<cms:form class="row text-accent-color justify-content-center align-items-center loader_form elyzee_form" name="survery" masterpage='survey.php' mode='create' enctype='multipart/form-data' method='post' anchor='0' data-bs-theme="light">
<div class="col-lg-10 col-xl-8 shadow py-0 card rounded-0 border-0">	
<cms:if k_success>
		  
<cms:db_persist_form
_invalidate_cache='0'
_auto_title='0'
k_page_title="<cms:show frm_contact_name/> - <cms:show frm_doctor_technician/>"
k_publish_date='0000-00-00 00:00:00'
hear_aboutus = frm_reach_source
doctor_technician = frm_doctor_technician
reception_registration = frm_reception_registration
doctor_technician_service = frm_doctor_technician_service
nursing_care = frm_nursing_care
waiting_time = frm_waiting_time
cleanliness_accessibility = frm_cleanliness_accessibility
aftercare_advice = frm_aftercare_advice
/>			
				

<cms:if k_success>

<cms:set success_message="<strong>Dear <cms:show frm_contact_name/>,</strong><br/><br/>Thank you for taking the time to complete the survey. Your feedback is important to us.<br/><br/>شكرًا لك على الوقت الذي قضيته في إكمال هذا الاستبيان. نُقدّر ملاحظاتك، وسنستخدمها لمواصلة تحسين جودة الرعاية التي نقدمها لمرضانا."/>
<cms:set_flash name='success_msg' value='1' />
<cms:set_flash name='message_value' value=success_message />


<cms:set reply_email = "<cms:get_field 'survey_form_email' masterpage='globals.php' />"/>

<cms:if reply_email>
<cms:set reply_email_to="<cms:concat 'Elyzee Survey <' reply_email '>' />" />
<cms:set subject_email="<cms:concat '[OPD Survey] ' frm_contact_name ' [' frm_doctor_technician ']'/>" />
<cms:set success_message="<strong>Dear Team</strong> ,<br/><br/>The following details have been submitted via the <b><cms:show orgname/></b> Website - <cms:show k_template_title/>."/>

<cms:send_mail from=org_noreply_email to=reply_email_to reply_to=frm_user_email subject=subject_email debug=email_debug html='1'><cms:embed 'emails/survey.html'/>
</cms:send_mail>
</cms:if>
<cms:redirect url="<cms:link k_template_name/>"/>
</cms:if>
</cms:if>

<cms:trim "<cms:embed 'common/flash_block.html' />"/>

<cms:trim "<cms:embed 'common/form_error_block.html'/>"/>


<fieldset class="row pt-5 card-header border-0">
<div class="col-md-6 pb-3">
<div class="form-group mb-3">
	<label class="fw-bold m-0 text-dark d-block ar"><span class="text-danger">*</span> Patient Name / إسم المريض </label>
	<div class="input-group">
	  <span class="input-group-text"><i class="fa-solid fa-user form-group-icon text-accent-color"></i></span>
	  <cms:input type="bound" class="form-control form-control-sm -sm <cms:if k_error_contact_name>is-invalid</cms:if>" id="contact_name" name="contact_name" label="Patient Name" title="Patient Name" placeholder="Required / المطلوب" required='1' />
</div>
<cms:if k_error_contact_name><small class="text-danger mx-2 ar">* <cms:get "locale.required"/>: <cms:get "locale.field_cannot_left_empty"/></small></cms:if>
</div>
</div>

<cms:ignore>
<div class="col-md-6 pb-3">
<div class="form-group mb-3">
	<div class="input-group">
		 <span class="input-group-text"><i class="fa-solid fa-envelope form-group-icon  text-accent-color"></i></span>
<cms:input type="bound" class="form-control form-control-sm  <cms:if k_error_user_email>is-invalid</cms:if>" id="user_email" required='1' validator='email' name="user_email" dir="ltr" label="<cms:get 'locale.email'/>" title="<cms:get 'locale.email'/>" placeholder="xxx@xxx.com"/>
</div>
<cms:if k_error_user_email><small class="text-danger mx-2 ar">* Required / المطلوب: <cms:get "locale.enter_valid_email"/></small></cms:if>
</div>
</div>
</cms:ignore>


<div class="col-md-6 pb-3">
<div class="form-group mb-3">

	<cms:input type="text" class="form-control <cms:if k_error_user_phone || k_error_user_contact>is-invalid</cms:if>" id="user_contact" name="user_contact" label="<cms:get 'locale.phone'/>" dir="ltr" title="<cms:get 'locale.phone'/>" placeholder="xxxxxxxxx" inputmode="numeric" autocomplete="off" spellcheck="false" min_len="7" max_len="15" minlength="7" maxlength="15" validator='min_len=7 | max_len=15' required='1'/>
	
	<cms:hide>
	<cms:input type="bound" class="form-control d-none" id="user_phone" name="user_phone" label="<cms:get 'locale.phone'/>" dir="ltr" title="<cms:get 'locale.phone'/>" placeholder="eg: +9715XXXXXXXX" inputmode="numeric" autocomplete="off" spellcheck="false" min_len="7" max_len="15" minlength="7" maxlength="15" validator='min_len=7 | max_len=15' required='1'/>
	</cms:hide>

	<cms:if k_error_user_phone><small class="text-danger mx-2 ar">* Required / المطلوب: <cms:get "locale.enter_valid_phone"/></small></cms:if>
</div>
</div>





<cms:ignore>
<div class="col-md-6 pb-3">
<div class="form-group mb-3">
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-bullhorn form-group-icon text-accent-color"></i></span>
	<cms:input type="dropdown" name="reach_source" class="form-control form-control-sm  form-select <cms:if k_error_reach_source>is-invalid</cms:if>" label="<cms:get 'locale.specialty'/>" title="<cms:get 'locale.specialty'/>" opt_values="* -- How did you hear about us? --=- | Friend or Family/Word of Mouth | Referred by external physician/facility | Newspaper/Magazine | Radio/TV | Google Search | Facebook/Instagram | Other Social Media | Hospital Website | Exhibition/Events/Talk Shows | SMS/WhatsApp | Insurance Referral | Others" required='1'/>
</div>
<cms:if k_error_reach_source><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>

</div>
</div>
</cms:ignore>



<cms:capture into='doctors_output'>
<cms:pages masterpage='doctors.php' orderby='weight' order='asc'>
	<cms:show title_ar/> / <cms:show title_en/> = <cms:show title_en/><cms:if "<cms:not k_paginated_bottom />" > | </cms:if>
</cms:pages>
</cms:capture>



<div class="col-md-12">
<div class="form-group mb-3">
	<label class="fw-bold m-0 text-dark d-block ar" for="doctor_technician"><span class="text-danger">*</span> Treating Doctor or Technician / الطبيب أو مقدم الخدمة </label>
	<div class="input-group">
	  <span class="input-group-text"><i class="fa-solid fa-user-md form-group-icon text-accent-color"></i></span>
	  <cms:input type="dropdown" opt_values="-- <cms:get 'locale.select'/> --= | <cms:show doctors_output/>" class="form-control form-select form-select-sm  <cms:if k_error_doctor_technician>is-invalid</cms:if>" id="doctor_technician" name="doctor_technician" label="Treating Doctor or Technician" title="Treating Doctor or Technician" placeholder="Required / المطلوب" required='1' />
</div>
<cms:if k_error_doctor_technician><small class="text-danger mx-2 ar">* Required / المطلوب: <cms:get "locale.field_cannot_left_empty"/></small></cms:if>
</div>
</div>

</fieldset>

<fieldset class="row my-3 card-body">
<p class="fw-bold text-accent-color col-12 text-center"><cms:show_globals><span class="mb-2 ar d-block" ><cms:get "short_content_ar"/></span><span class="en d-block"><cms:get "short_content_en"/></span></cms:show_globals></p>


<div class="col-md-6 p-0">
<div class="form-group mx-1 my-2 rounded p-2 bg-light">
<label class="fw-bold m-0 text-dark d-block ar" for="reception_registration"><span class="text-danger">*</span> Reception and Registration / الاستقبال والتسجيل</label>
<cms:input type="dropdown" id="reception_registration" name="reception_registration" label='Reception and Registration' title='Reception and Registration' opt_values="-- <cms:get 'locale.select'/> --= | 😃راضي / Satisfied = Satisfied | 😐محايد / Neutral = Neutral | 🙁غير راضي / Dissatisfied = Dissatisfied" required="1" opt_selected='0' class="form-select form-select-sm  <cms:if k_error_reception_registration>is-invalid</cms:if>" />
<cms:if k_error_reception_registration><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>

<div class="col-md-6 p-0">
<div class="form-group mx-1 my-2 rounded p-2 bg-light">
<label class="fw-bold m-0 text-dark d-block ar" for="waiting_time"><span class="text-danger">*</span> Waiting Time / وقت الانتظار</label>
<cms:input type="dropdown" id="waiting_time" name="waiting_time" label='Waiting Time' title='Waiting Time' opt_values="-- <cms:get 'locale.select'/> --= | 😃راضي / Satisfied = Satisfied | 😐محايد / Neutral = Neutral | 🙁غير راضي / Dissatisfied = Dissatisfied" opt_selected='0' required="1" class="form-select form-select-sm  <cms:if k_error_waiting_time>is-invalid</cms:if>" />
<cms:if k_error_waiting_time><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>


<div class="col-md-6 p-0">
<div class="form-group mx-1 my-2 rounded p-2 bg-light">
<label class="fw-bold m-0 text-dark d-block ar" for="doctor_technician_service"><span class="text-danger">*</span> Doctor or Technician Service / خدمة الطبيب أو الفني</label>
<cms:input type="dropdown" id="doctor_technician_service" name="doctor_technician_service" label='Doctor or Technician Service' title='Doctor or Technician Service' opt_values="-- <cms:get 'locale.select'/> --= | 😃راضي / Satisfied = Satisfied | 😐محايد / Neutral = Neutral | 🙁غير راضي / Dissatisfied = Dissatisfied" opt_selected='0' required="1" class="form-select form-select-sm  <cms:if k_error_doctor_technician_service>is-invalid</cms:if>" />
<cms:if k_error_doctor_technician_service><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>

<div class="col-md-6 p-0">
<div class="form-group mx-1 my-2 rounded p-2 bg-light">
<label class="fw-bold m-0 text-dark d-block ar" for="nursing_care"><span class="text-danger">*</span> Nursing Care / الرعاية الطبية والتمريضية</label>
<cms:input type="dropdown" id="nursing_care" name="nursing_care" label='Nursing Care' title='Nursing Care' opt_values="-- <cms:get 'locale.select'/> --= | 😃راضي / Satisfied = Satisfied | 😐محايد / Neutral = Neutral | 🙁غير راضي / Dissatisfied = Dissatisfied" opt_selected='0' required="1" class="form-select form-select-sm  <cms:if k_error_nursing_care>is-invalid</cms:if>" />
<cms:if k_error_nursing_care><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>




<cms:ignore>
<div class="col-md-6 p-0">
<div class="form-group mx-1 my-2 rounded p-2 bg-light">
<label class="fw-bold m-0 text-dark d-block ar" for="support_assistance"><span class="text-danger">*</span> Support & Assistance / الدعم والمساعدة</label>
<cms:input type="dropdown" id="support_assistance" name="support_assistance" label='Support & Assistance' title='Support & Assistance' opt_values="-- <cms:get 'locale.select'/> --= | 😃راضي / Satisfied = Satisfied | 😐محايد / Neutral = Neutral | 🙁غير راضي / Dissatisfied = Dissatisfied" opt_selected='0' required="1" class="form-select form-select-sm  <cms:if k_error_support_assistance>is-invalid</cms:if>" />
<cms:if k_error_support_assistance><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>
</cms:ignore>

<div class="col-md-12 p-0">
<div class="form-group mx-1 my-2 rounded p-2 bg-light">
<label class="fw-bold m-0 text-dark d-block ar" for="cleanliness_accessibility"><span class="text-danger">*</span> Cleanliness and accessibility of the Hospital and the facilities / نظافة وسهولة الوصول إلى المستشفى والأقسام</label>
<cms:input type="dropdown" id="cleanliness_accessibility" name="cleanliness_accessibility" label='Cleanliness and accessibility' title='Cleanliness and accessibility' opt_values="-- <cms:get 'locale.select'/> --= | 😃راضي / Satisfied = Satisfied | 😐محايد / Neutral = Neutral | 🙁غير راضي / Dissatisfied = Dissatisfied" opt_selected='0' required="1" class="form-select form-select-sm  <cms:if k_error_cleanliness_accessibility>is-invalid</cms:if>" />
<cms:if k_error_cleanliness_accessibility><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>

<div class="col-md-12 p-0">
<div class="form-group mx-1 my-2 rounded p-2 bg-light">
<label class="fw-bold m-0 text-dark d-block ar" for="cleanliness_accessibility"><span class="text-danger">*</span> Aftercare advice provided post treatment /  شرح الارشادات والنصائح المقدمة للعناية بعد العلاج</label>
<cms:input type="dropdown" id="aftercare_advice" name="aftercare_advice" label='Aftercare advice' title='Aftercare advice' opt_values="-- <cms:get 'locale.select'/> --= | 😃راضي / Satisfied = Satisfied | 😐محايد / Neutral = Neutral | 🙁غير راضي / Dissatisfied = Dissatisfied" opt_selected='0' required="1" class="form-select form-select-sm  <cms:if k_error_aftercare_advice>is-invalid</cms:if>" />
<cms:if k_error_aftercare_advice><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>

</fieldset>







<fieldset class="row py-3 card-footer border-0">

<div class="col-md-12">
<div class="form-group mb-3">
	  <label class="fw-bold m-0 text-dark d-block ar" for="user_message">Any comments or suggestions to help us serve you better? / أي تعليقات أو اقتراحات لمساعدتنا في خدمتك بشكل أفضل؟</label>
	<cms:input name='user_message' id="user_message" type='bound' class="form-control form-control-sm text-small small" placeholder="Type your message here..." label="Comments or suggestions" title="Comments or suggestions"/>
	<cms:if k_error_user_message><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>

<div class="col-md-12">
<div class="form-group mb-3">
<label class="fw-bold m-0 text-dark d-block ar"  for="recommend_elyzee"><span class="text-danger">*</span> Would you recommend Elyzee Hospital? / هل تنصح بمستشفى الإليزيه؟</label>
  <cms:input type="bound" name="recommend_elyzee" id="recommend_elyzee" label="Would you recommend Elyzee Hospital?" class="form-check-input ms-2" title="Would you recommend Elyzee Hospital?"/>
<cms:if k_error_recommend_elyzee><small class="text-danger mx-2">* <cms:get "locale.required"/></small></cms:if>
</div>
</div>


<div class="col-md-12">
<div class="form-group mb-3">
	  <label class="fw-bold m-0 text-dark d-block ar" for="user_contact_consent"><span class="text-danger">*</span> Would you like to be contacted regarding your feedback? / <span class="ar"> هل تود أن يتم التواصل معك بخصوص ملاحظاتك؟</span></label>
	 <cms:input type="bound" name="user_contact_consent" id="user_contact_consent" label="Would you like to be contacted regarding your feedback?" class="form-check-input ms-2" title="Would you like to be contacted regarding your feedback?"/>
</div>
</div>



<cms:hide><cms:input name='page_date' type='bound' default_time="@current" class="d-none"/></cms:hide>	


<div class="col-md-6 pb-3">
<div class="form-group my-3">
<cms:input type='recaptcha' label="Captcha" class="form-control form-control-sm  w-100 <cms:if k_error_elyzee_captcha>is-invalid</cms:if>" title="Captcha" name='elyzee_captcha' hl="<cms:show k_lang/>" theme='dark'/>
<cms:if k_error_elyzee_captcha><small class="text-danger mx-2">* <cms:get "locale.required"/>: <cms:show k_error_elyzee_captcha/></small></cms:if>
</div>
</div>




<div class="col-md-6 text-start text-md-end">
<button type="submit" class="btn-default my-3" title='<cms:get "locale.submit"/>'>
<cms:get "locale.submit"/>
</button>
</div>
</fieldset>
		


</div>
</cms:form>
</div>
</section>
<cms:trim "<cms:embed 'about/how_block_view.inc'/>"/>
<cms:trim "<cms:embed 'common/footer.inc' />"/>
<cms:else/>
<cms:redirect url="<cms:link k_template_name/>"/>
</cms:if>
<?php COUCH::invoke(); ?>