<?php require_once( '../manage/cms.php' ); ?>
<cms:template title='Attendees' clonable='1' parent='_hubspace_' order="5002" access_level='2' hidden='1'>
	<cms:editable type='uid' name='id_value' search_type='integer' min_length='6' prefix='ELZ-ATND-' label='ID Number' desc='will be generated automatically' begin_from='100' order="10"/>  
	
	<cms:editable label="Related Event" type='dropdown' name='related_event' opt_values='hubspace/events/event_names_dropdown.inc' dynamic='opt_values' required='1' order='-10'/>
   
	<cms:editable name="attendee_name" type="text" label='Full Name' required='1'  order='10'/>
	
	<cms:editable name="attendee_gender" label="Gender" desc="Select one from these"
	  opt_values='--Select Gender--=- | Male | Female'
	  type='dropdown'
	  required='1'
	  order='30'
	/>
	
	<cms:editable label='Date of Birth' name='attendee_dob' type='text' order="32"/>
	<cms:editable label='Created By (Staff)' name='owner_name' type='text' order="32" required='1'/>
	
	
	<cms:editable type="group" name="crm_group" label="CRM Information" order="100"/>
	<cms:editable name='crm_lead_id' type='text' group="crm_group" label='CRM Lead ID' order="10"/>
	<cms:editable name='crm_raw_response' type='textarea' group="crm_group" label='CRM Raw Response' order="11"/>
	<cms:editable name='crm_error' type='text' group="crm_group" label='CRM Error' order="20"/>
	<cms:editable name='crm_error_desc' type='textarea' group="crm_group" label='CRM Error Desc' order="21"/>
	<cms:editable label='CRM Owner' name='crm_owner_name' type='text' group="crm_group" order="30"/>
	<cms:editable label='CRM Synced Date' name='crm_synced_on' type='text' group="crm_group" order="31"/>


	
<cms:editable type="dropdown" name="attendee_nationality" label="Nationality" desc="Select one from these" order='60' group='p_title_group'
opt_values="--Select Nationality--=- |
   Afghanistan | 
   Albania | 
   Algeria | 
   Andorra | 
   Angola | 
   Antigua and Barbuda | 
   Argentina | 
   Armenia | 
   Australia | 
   Austria | 
   Azerbaijan | 
   Bahamas | 
   Bahrain | 
   Bangladesh | 
   Barbados | 
   Belarus | 
   Belgium | 
   Belize | 
   Benin | 
   Bhutan | 
   Bolivia (Plurinational State of) | 
   Bosnia and Herzegovina | 
   Botswana | 
   Brazil | 
   Brunei Darussalam | 
   Bulgaria | 
   Burkina Faso | 
   Burundi | 
   Cabo Verde | 
   Cambodia | 
   Cameroon | 
   Canada | 
   Central African Republic | 
   Chad | 
   Chile | 
   China | 
   Colombia | 
   Comoros | 
   Congo | 
   Congo, Democratic Republic of the | 
   Costa Rica | 
   Côte d'Ivoire | 
   Croatia | 
   Cuba | 
   Cyprus | 
   Czechia | 
   Denmark | 
   Djibouti | 
   Dominica | 
   Dominican Republic | 
   Ecuador | 
   Egypt | 
   El Salvador | 
   Equatorial Guinea | 
   Eritrea | 
   Estonia | 
   Eswatini | 
   Ethiopia | 
   Fiji | 
   Finland | 
   France | 
   Gabon | 
   Gambia | 
   Georgia | 
   Germany | 
   Ghana | 
   Greece | 
   Grenada | 
   Guatemala | 
   Guinea | 
   Guinea-Bissau | 
   Guyana | 
   Haiti | 
   Honduras | 
   Hungary | 
   Iceland | 
   India | 
   Indonesia | 
   Iran (Islamic Republic of) | 
   Iraq | 
   Ireland | 
   Israel | 
   Italy | 
   Jamaica | 
   Japan | 
   Jordan | 
   Kazakhstan | 
   Kenya | 
   Kiribati | 
   Korea (Democratic People's Republic of) | 
   Korea, Republic of | 
   Kuwait | 
   Kyrgyzstan | 
   Lao People's Democratic Republic | 
   Latvia | 
   Lebanon | 
   Lesotho | 
   Liberia | 
   Libya | 
   Liechtenstein | 
   Lithuania | 
   Luxembourg | 
   Madagascar | 
   Malawi | 
   Malaysia | 
   Maldives | 
   Mali | 
   Malta | 
   Marshall Islands | 
   Mauritania | 
   Mauritius | 
   Mexico | 
   Micronesia (Federated States of) | 
   Moldova, Republic of | 
   Monaco | 
   Mongolia | 
   Montenegro | 
   Morocco | 
   Mozambique | 
   Myanmar | 
   Namibia | 
   Nauru | 
   Nepal | 
   Netherlands | 
   New Zealand | 
   Nicaragua | 
   Niger | 
   Nigeria | 
   North Macedonia | 
   Norway | 
   Oman | 
   Pakistan | 
   Palau | 
   Panama | 
   Papua New Guinea | 
   Paraguay | 
   Peru | 
   Philippines | 
   Poland | 
   Portugal | 
   Qatar | 
   Romania | 
   Russian Federation | 
   Rwanda | 
   Saint Kitts and Nevis | 
   Saint Lucia | 
   Saint Vincent and the Grenadines | 
   Samoa | 
   San Marino | 
   Sao Tome and Principe | 
   Saudi Arabia | 
   Senegal | 
   Serbia | 
   Seychelles | 
   Sierra Leone | 
   Singapore | 
   Slovakia | 
   Slovenia | 
   Solomon Islands | 
   Somalia | 
   South Africa | 
   South Sudan | 
   Spain | 
   Sri Lanka | 
   Sudan | 
   Suriname | 
   Sweden | 
   Switzerland | 
   Syrian Arab Republic | 
   Tajikistan | 
   Tanzania, United Republic of | 
   Thailand | 
   Timor-Leste | 
   Togo | 
   Tonga | 
   Trinidad and Tobago | 
   Tunisia | 
   Turkey | 
   Turkmenistan | 
   Tuvalu | 
   Uganda | 
   Ukraine | 
   United Arab Emirates | 
   United Kingdom of Great Britain and Northern Ireland | 
   United States of America | 
   Uruguay | 
   Uzbekistan | 
   Vanuatu | 
   Venezuela (Bolivarian Republic of) | 
   Viet Nam | 
   Yemen | 
   Zambia | 
   Zimbabwe | 
   Others" />
   
   
   <cms:editable type="text" name="attendee_city" label='Current City/Emirate' group='p_title_group' order='79'/>
   <cms:editable type="text" name="attendee_street" label='Address - Street Info' desc="eg: Al Mushrif, Abu Dhabi" group='p_title_group' order='80'/>
   
	<cms:editable name="attendee_language" label="Preferred Communication Language"
	  opt_values='No Preference=- | Arabic | English'
	  type='dropdown'
	  order='30'
	/>
	
	
	<cms:editable name="attendee_existing" label="Existing patient at Elyzee?"
	  opt_values='-- Select --=- | No | Yes'
	  type='dropdown'
	  order='30'
	/>
	
	<cms:editable type='text' name='speciality' label='Choose Specialty' order='40'   />
	<cms:editable type='text' name='doctors' label='Choose Doctors' order='50'   />
	
	<cms:editable type="text" label="Email" name="attendee_email" validator='email' order='18' searchable='1'/>
	<cms:editable type="text" name="attendee_phone" label=' Mobile Number' desc='eg: for UAE 009715xxxxxxxx' validator='non_negative_integer | min_len=9 | max_len=14' maxlength="14" validator_msg='Enter valid number with country code. Do not add + or spaces. Only numbers allowed!'  required='1' order='19'/>		
  	
	<cms:editable type='text' name='page_date' label="Submitted Date" group='p_publish_group' order='10001'><cms:date format="Y-m-d H:i:s"/></cms:editable>
	
	
	
	<cms:editable type="text" label="Designation" name="attendee_designation"  order='40'/>
	<cms:editable type='textarea' name="note" label="Any additional note" height='100' order="70"/>	


    <cms:editable type='group' label='Attendee Registration Date & Status' name='p_publish_group' order='1000' collapsed='0'/>
	
	
	<cms:config_form_view>
	    <cms:field 'k_page_title' hide='1' skip='1'/>
		<cms:persist k_page_title="<cms:show frm_attendee_name/>" />
		<cms:field 'k_page_name'  group='p_publish_group' order='3' label="Page link name"/>
		<cms:field 'page_date'  label="Submitted Date"><cms:show page_date/></cms:field>
		<cms:field 'k_page_name'   order='1000' label="Page link name" hide='1'/>
		<cms:field 'k_publish_date'  order='1001' label="Submitted status" hide='1'/>
	</cms:config_form_view>

	<cms:config_list_view exclude='default-page-for-hubspace-attendees-php' searchable='0' >
	
	
	<cms:field 'k_selector_checkbox' />
	
	<cms:field 'k_page_title' header="Name & Email" sortable='0'/>
	<cms:field 'attendee_designation' header="Designation" sortable='1'/>
	<cms:field 'related_event' header="Event" sortable='1'/>
	<cms:field 'k_page_date' sortable='1'/>
	
	<cms:field 'k_actions' />

	</cms:config_list_view>
	


</cms:template>

<cms:set is_secured_page='1' 'global'/>		

<cms:trim "<cms:embed 'hubspace/header.inc' />"/>
<cms:trim "<cms:embed 'hubspace/breadcrumbs.inc' />"/>	
<cms:redirect url="<cms:link 'hubspace/events.php'/>"/>
<cms:trim "<cms:embed 'hubspace/footer.inc' />"/>	

<?php COUCH::invoke(); ?>