<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='Appointments' clonable='1' order="160">

<cms:globals><cms:embed 'common/page_global_editables.html'/></cms:globals>


<cms:editable type='text' name="user_email" label='Email' order='20' validator='email'/>
<cms:editable type='text' name="user_phone" label='Phone' order='30' required='1' min_len="7" validator='regex=/^\+[0-9]{7,15}$/' validator_msg='regex=Enter a valid phone number, including country code'/>

<cms:editable type='text' name='speciality' label='Choose Specialty' order='40'   />
<cms:editable type='text' name='doctor' label='Choose Doctor' order='50'   />

<cms:editable type='text' name="appointment_date" label='Appointment Date' desc="required" order='60' required='1'/>
<cms:editable name='user_message' type='textarea' label="Any notes for the doctor's office" height='100' order="70"/>

<cms:editable type='text' name="reach_page_url" label='Source Page' no_xss_check ='1' order='80'/>
<cms:editable type='text' name="reach_source" label='How did you hear about us' order='80'/>


<cms:editable type='datetime' name='page_date' allow_time='1' label="Submitted Date" default_time="@current" group='p_publish_group'
height='100' order='11'/>


<cms:editable type="group" name="crm_group" label="CRM Information" order="100"/>
<cms:editable name='crm_lead_id' type='text' group="crm_group" label='CRM Lead ID' order="10"/>
<cms:editable name='crm_raw_response' type='textarea' group="crm_group" label='CRM Raw Response' order="11"/>
<cms:editable name='crm_error' type='text' group="crm_group" label='CRM Error' order="20"/>
<cms:editable name='crm_error_desc' type='textarea' group="crm_group" label='CRM Error Desc' order="21"/>

 <cms:editable type="message" name="admin_hack">
        <style>
           #header-inner .btn-group, #btn_submit, #settings-panel{display:none;}
        </style>
    </cms:editable>

<cms:config_form_view>
<cms:field 'k_page_title' order='10' label="Full Name" required='1'><cms:show k_page_title/></cms:field>
<cms:field 'appointment_date' ><cms:show appointment_date/></cms:field>
<cms:field 'user_email'><cms:if user_email><cms:show user_email/><cms:else/>-</cms:if></cms:field>
<cms:field 'user_phone'><cms:show user_phone/></cms:field>
<cms:field 'speciality'><cms:show speciality/></cms:field>
<cms:field 'doctor'><cms:show doctor/></cms:field>
<cms:field 'user_message'><cms:show user_message/></cms:field>


<cms:field 'reach_page_url'><cms:if reach_page_url><cms:show reach_page_url/><cms:else/>-</cms:if></cms:field>
<cms:field 'reach_source'><cms:show reach_source/></cms:field>

<cms:field 'k_page_name' order='1000' label="Page link name" hide='1'/>
<cms:field 'k_published_date'  order='1001' label="Submitted status" hide='1'/>
<cms:field 'page_date'><cms:show page_date/></cms:field>
<cms:field 'crm_lead_id'><cms:show crm_lead_id/></cms:field>
<cms:field 'crm_raw_response'><cms:show crm_raw_response/></cms:field>
<cms:field 'crm_error'><cms:show crm_error/></cms:field>
<cms:field 'crm_error_desc'><cms:show crm_error_desc/></cms:field>


</cms:config_form_view>


<cms:config_list_view exclude='default-page-for-book-appointment-php' searchable='1' limit='500'>
<cms:html><cms:show_info heading='Helpful Hint:' >
<ol>
<li>Add global title and description for section in <strong>'Manage Globals'</strong> in top right</li>
</ol>
</cms:show_info></cms:html>

<cms:field 'k_selector_checkbox' />
<cms:field 'k_page_title' header='Full Name' sortable='0'/>
<cms:field 'speciality' header='Dept/Dr.' sortable='0'><cms:show speciality/><br><cms:show doctor/></cms:field>
<cms:field 'user_phone' header='Contact' sortable='0'><cms:show user_phone/><br><cms:show user_email/></cms:field>
<cms:field 'crm_lead_id'><cms:if crm_lead_id><span class="label label-success"><cms:show crm_lead_id/></span><cms:else/><span class="label label-error">No Lead ID</span></cms:if></cms:field>
<cms:field 'appointment_date' header='Appointment Date' sortable='0'><cms:show appointment_date/></cms:field>
<cms:field 'k_published_date' header='View Details' sortable='0'><a href="<cms:admin_link />"><span class="label label-success">View</span></a></cms:field>

</cms:config_list_view>
</cms:template >


<cms:if k_is_home>
<cms:trim "<cms:embed 'common/header.inc' />"/>
<cms:trim "<cms:embed 'appointments/section_view.inc' />"/>
<cms:trim "<cms:embed 'about/how_block_view.inc'/>"/>
<cms:trim "<cms:embed 'common/footer.inc' />"/>
<cms:else_if (k_user_access_level ge '10') && k_is_page && (crm_lead_id eq '') />
<cms:embed 'appointments/retry_crm_lead.inc'/>
<cms:else/>
<cms:redirect url="<cms:link k_template_name/>"/>
</cms:if>
<?php COUCH::invoke(); ?>