<?php require_once( '../manage/cms.php' ); ?>
<cms:template title='Events' clonable='1' routable='1' parent='_hubspace_' order="5003" access_level='2' hidden='1'>

<cms:editable type='uid' name='id_value' search_type='integer' min_length='6' prefix='ELZ-EVENT-' label='ID Number' desc='will be generated automatically' group="_system_fields_"  begin_from='100' order="-10"/>  

<cms:editable name="event_title" type="text" label="Event Title" required='1' group="_system_fields_" order="10"/>

<cms:editable name="event_type" type="dropdown" label="Event Type" opt_values="-- Select Event Type --=- | Expo | Medical Camp | Conference | Roadshow | Awareness Camp | Corporate Visit | Others" group="_system_fields_" order="20"/>

<cms:editable name="event_category" type="dropdown" label="Event Category" opt_values="-- Select Event Category --=- | Marketing | Sales | Outreach | Others" group="_system_fields_" order="30"/>

<cms:editable name="event_objective" type="dropdown" label="Event Objective" opt_values="-- Select Event Objective --=- | Lead Generation | Brand Awareness | Patient Education | Corporate Tie-up | Others" group="_system_fields_" order="40"/>




<cms:editable name="event_notes" type="textarea" label="Event - Internal Notes" group="_system_fields_" order="50" height='75'/>

<cms:editable name='page_image_secure' allowed_ext='png, jpg, jpeg' max_size='10240' type='securefile' max_width='2160' max_height='2160'  label="Event Poster Image" desc='Should be under 1MB' group="_system_fields_" thumb_width='75' show_preview='1' use_thumb_for_preview='1' order='60'/>



<cms:editable type='group' label='Event Venue Details' name='p_venue_group' order='400' collapsed='0'/>
<cms:editable name="venue_name" type="text" label="Event - Venue Name" desc="eg: ADNEC" required='1' order='30' group='p_venue_group'/>
<cms:editable name="event_location" type="text" label="Event - Location / Street / Area" desc="eg: Al Mushrif" order='40' group='p_venue_group'/>
<cms:editable name="event_city" type="text" required='1' label="Event - Emirate / State / City" desc="eg: Abu Dhabi" order='50' group='p_venue_group'/>
<cms:editable name="event_venue_notes" type="text" label="Event - Venue notes?" order='55' group='p_venue_group'/>
<cms:editable type="dropdown" name="event_country" required='1' label="Event - Country" desc="Select one from these" order='60' group='p_venue_group'
   opt_values="--Select Country--=- |
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
   Others"
   opt_selected = "United Arab Emirates"/>
   


<cms:editable type='group' label='Publish Status' name='p_publish_group' order='1000' collapsed='0'/>
<cms:editable name="event_status" type="dropdown" label="Event Status" opt_values="-- Event Status --=- | Active | Inactive" opt_selected="Active" required="1"  group='p_publish_group' order='100'/>
<cms:editable name="event_start_date" type="datetime" label="Event Start Date" required="1" group='p_publish_group' order='10'/>
<cms:editable name="event_end_date" type="datetime" label="Event End Date"  group='p_publish_group' order='20'/>


<cms:config_form_view>
<cms:field 'k_page_title' hide='1' skip='1'/>
<cms:persist k_page_title=frm_event_title />
<cms:field 'k_page_name'  hide='1'/>
<cms:field 'k_publish_date' group='p_publish_group' order='1' label='Start Date & Status' desc="'Unpublished' will be hidden from the public listing" hide='0'/>	
</cms:config_form_view>

<cms:config_list_view exclude='default-page-for-hubspace-events-php' searchable='0' />

	<!-- define routes -->
	<cms:route name='home_view' path='' />
	<cms:route name='create_view' path='create' />
	<cms:route name='add_attendee' path='{:page_name}/add_attendee' />
	<cms:route name='edit_attendee' path='{:page_name}/edit_attendee/{:page_id}'>
		<cms:route_validators page_name='title_ready' page_id='non_zero_integer'/>
	</cms:route>

	<cms:route name='edit_view' path='{:page_name}/edit' />
	<cms:route name='page_view' path='{:page_name}{:format}'><cms:route_constraints format='(\.html)'/></cms:route>
	<cms:route name='crm_update' path='{:page_name}/crm_update' />

</cms:template>

<cms:set is_secured_page='1' 'global'/>		

<cms:trim "<cms:embed 'hubspace/header.inc' />"/>
<cms:trim "<cms:embed 'hubspace/breadcrumbs.inc' />"/>	

<cms:if (k_matched_route = 'create_view') || (k_matched_route = 'edit_view')>
	<cms:if k_user_access_level ge '4'><cms:embed 'hubspace/events/events_form_view.inc'/>
	<cms:else/><cms:redirect url="<cms:link 'hubspace/index.php'/>"/></cms:if>
<cms:else_if (k_matched_route = 'page_view')/><cms:embed 'hubspace/events/events_page_view.inc'/>
<cms:else_if (k_matched_route = 'add_attendee') || (k_matched_route = 'edit_attendee')/><cms:embed 'hubspace/events/attendees_form_view.inc'/>
<cms:else_if (k_matched_route = 'crm_update')/>
	<cms:if k_user_access_level ge '4'><cms:embed 'hubspace/events/event_generate_crm_leads.inc'/>
	<cms:else/><cms:redirect url="<cms:link 'hubspace/index.php'/>"/></cms:if>
<cms:else/><cms:embed 'hubspace/events/events_list_view.inc'/></cms:if>
<cms:trim "<cms:embed 'hubspace/footer.inc' />"/>	
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>