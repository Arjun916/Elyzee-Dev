<?php require_once( 'manage/cms.php' ); ?>

<cms:template title='Careers' clonable='1' order="170" dynamic_folders='1' folder_masterpage='jobs.php'>
	
<cms:globals><cms:embed 'common/page_global_editables.html'/></cms:globals>


<cms:editable type='dropdown' name="user_title" opt_values="-- Select --=- | Dr.| Mr.| Mrs.| Ms." label='Title' desc="required" required='1' order='10'/>
<cms:editable type="dropdown" label="Gender" name="user_gender" opt_values="-- Select --=- | Male | Female" order="20" required='1'/>
<cms:editable type='text' name="user_email" label='Email' desc="required" order='30' validator='email' required='1' />
<cms:editable type='text' name="user_phone" label='Phone' desc="required" required='1' order='40'/>

<cms:editable type="dropdown" name="user_nationality" required='1' label="Nationality" desc="Select one from these" order='59' group='p_title_group'
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
<cms:editable name='user_city' type='dropdown' label="Current Emirate or City" required='1' order="60" opt_values="--Select--=- | Abu Dhabi | Dubai | Sharjah | Ajman | Umm Al-Quwain | Fujairah | Ras Al Khaimah | Al Ain | Khor Fakkan | Others"/>	

<cms:editable type='text' name="user_job_role" label='Interested Job Role' desc="required" required='1' order='70'/>

<cms:editable type='dropdown' name="user_experience" label='Years of Experience' desc="required" order='80' required='1' opt_values="--Select--=- | No Experience | 0-1 Year | 1-2 Years | 2-3 Years | 3-5 Years | 5-7 Years | 7-10 Years | 10-15 Years | 15-20 Years | 20+ Years"/>

<cms:editable name='user_availablity' type='text' label="Availability"  required='1' order='85'/>

<cms:editable name='user_message' type='textarea' label="Cover Letter" height='100' required='1' order='90'/>

<cms:editable type='datetime' name='page_date' allow_time='1' label="Submitted Date" default_time="@current" group='p_publish_group'
height='100' order='10001'/>	
	
<cms:config_form_view>
<cms:field 'user_title'  order='-1' group='_system_fields'><cms:show user_title/></cms:field>
<cms:field 'k_page_title' order='0' label="Full Name" required='1'><cms:show k_page_title/></cms:field>
<cms:field 'page_date'><cms:date page_date format='Y-m-d H:i:s'/></cms:field>

<cms:field 'user_email'><cms:show user_email/></cms:field>
<cms:field 'user_phone'><cms:show user_phone/></cms:field>
<cms:field 'user_gender'><cms:show user_gender/></cms:field>
<cms:field 'user_nationality'><cms:show user_nationality/></cms:field>
<cms:field 'user_city'><cms:show user_city/></cms:field>
<cms:field 'user_job_role'><cms:show user_job_role/></cms:field>
<cms:field 'user_experience'><cms:show user_experience/></cms:field>
<cms:field 'user_availablity'><cms:show user_availablity/></cms:field>
<cms:field 'user_message'><cms:show user_message/></cms:field>


<cms:field 'k_page_name'   order='1000' label="Page link name" hide='1'/>
<cms:field 'k_published_date'  order='1001' label="Submitted status" hide='1'/>
</cms:config_form_view>



<cms:config_list_view exclude='default-page-for-careers-php' searchable='1' limit='750'>
<cms:html><cms:show_info heading='Helpful Hint:' >
<ol>
<li>Add global title and description for section in <strong>'Manage Globals'</strong> in top right</li>
<li>Add <strong>Jobs</strong> from <strong>'Add/Manage Jobs'</strong> in top right</li>
</ol>
</cms:show_info></cms:html>

<cms:script>
$( function(){
$("a[data-title='Manage Folders'] span").html("Add/Manage Jobs");
});
</cms:script>
<cms:field 'k_selector_checkbox' />
<cms:field 'k_page_title' header='Applicant' />
<cms:field 'k_page_foldertitle' header='Applied for'><cms:if k_page_foldertitle><cms:show k_page_foldertitle/><cms:else/>-- General --</cms:if></cms:field>
<cms:field 'k_page_date' header="Applied date"/>
<cms:field 'k_actions' />


</cms:config_list_view>
</cms:template >




<cms:trim "<cms:embed 'common/header.inc' />"/>



	


<cms:if k_is_home>

<cms:embed "careers/list_view.inc"/>

<cms:else_if k_is_folder />

<cms:if p_publish_status ne 'draft'>
<cms:set end_date_val ="<cms:date end_date format='Y-m-d H:i:s'/>"/>
<cms:set curr_date_val =" <cms:date format='Y-m-d H:i:s'/>"/>
<cms:if end_date_val gt curr_date_val>
<cms:set is_expired='no' 'global'/>
<cms:else/>
<cms:set is_expired='yes' 'global'/>
</cms:if>

<!-- page view -->
<cms:embed "careers/page_view.inc"/>
<cms:else /><cms:redirect url="<cms:link k_template_name/>"/></cms:if>
<cms:else_if k_is_page /><cms:redirect url="<cms:link k_template_name/>"/>
<cms:else /><cms:redirect url="<cms:link k_template_name/>"/>
</cms:if>



<cms:trim "<cms:embed 'common/footer.inc' />"/>
<?php COUCH::invoke(); ?>