<cms:set success_message="<strong>Dear <cms:show frm_user_title/> <cms:show frm_contact_name/></strong>, <br/><br/>Thank you for submitting your details.<br>Our team will review your resume and contact you if your skills match the roles we are currently recruiting for.<br/><br/>If you do not have the applicable skills on this occasion, please be assured that we will retain your details on our internal database. Your application will be matched against any additional vacancies we may have now or in the future and you will be contacted by our team as needed.<br/><br/>We thank you for your patience.<br><strong>Take care</strong>."/>
<cms:set_flash name='success_msg' value='1' />
<cms:set_flash name='message_value' value=success_message />

<cms:set reply_email = "<cms:get_field 'career_form_email' masterpage='globals.php' />"/>
<cms:if reply_email>
<cms:set reply_email_to="<cms:concat 'Careers <' reply_email '>' />" />

<cms:set user_jr = "[<cms:if k_is_folder && k_folder_id><cms:show k_folder_title/><cms:else_if frm_user_job_role/><cms:show frm_user_job_role/><cms:else/>Resume</cms:if>]"/>
<cms:set subject_email="<cms:concat user_jr ' ' frm_contact_name/>" />
<cms:set success_message="<strong>Dear Team</strong> ,<br/><br/>The following details and resume (attached with this email) was submitted from <b><cms:show orgname/></b> Website Careers Form<br/>"/>
	
<cms:send_mail from=org_noreply_email to=reply_email_to reply_to=frm_user_email subject=subject_email debug=email_debug html='1'><cms:embed 'emails/careers.html'/><cms:if frm_user_cv> <cms:attachment field='user_cv'  /></cms:if></cms:send_mail>
</cms:if>