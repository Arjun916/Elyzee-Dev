<?php require_once('manage/cms.php' ); ?>
<cms:template title='Global Info / Settings' executable='0' order="10">


<cms:editable type='group' label='Organisation- basic Detils' name='orgname_group' order='10'/>
<cms:editable type='group' label='Organisation - tagline' name='orgtagline_group' order='20'/>
<cms:editable type='group' label='Organisation - MOHAP License details' name='moh_approval_group' order='21'/>
<cms:editable type='group' label='Short Description' desc='Will be used in as common description if necessary' name='orgshortdesc_group' order='30'/>

<cms:each k_supported_langs as='lang' key='lc'>
	<cms:editable type='text' name="tagline_<cms:show lc />" label="Tagline - <cms:show lang/>" order=k_count required='1' group='orgtagline_group' >Beauty . Innovation . Trust</cms:editable>
	<cms:editable type='text' name="tagline_desc_<cms:show lc />" label="Sub Tagline - <cms:show lang/>" order="<cms:add k_count '10'/>" required='1' group='orgtagline_group' >Your health, beauty, and confidence — in expert hands.</cms:editable>
	
	<cms:editable type='text' name="moh_id_<cms:show lc />" label="<cms:show lang/>" order=k_count desc='eg: MOHAP License: AFYY86SV-260424' required='1' group='moh_approval_group'>MOHAP License: AFYY86SV-260424</cms:editable>
	<cms:editable type='text' name="desc_<cms:show lc />" label="<cms:show lang/>" desc='* Maximum 200 characters' order=k_count required='1' maxlength='200' group='orgshortdesc_group' >Where transformation meets artistry — Elyzee Hospital delivers world-class plastic surgery and aesthetic excellence in a setting of timeless sophistication.</cms:editable>
</cms:each>


<cms:editable type='group' label='Form emails & Bitrix24 Integration' desc='Emails address which will recieve message from website forms' desc='If left empty, no emails will be recieved.' name='orgforms_group' order='40'/>
<cms:editable type='text' name="contact_form_email" label='Contact - Email Address' desc='Messages from Website Contact form will be will be recieved here; If left empty, no emails will be recieved.' order='30' group='orgforms_group' validator='email'/>
<cms:editable type='text' name="appointment_form_email" label='Appointments - Email Address' desc='Appointments emails will be recieved here; If left empty, no emails will be recieved.' order='31' group='orgforms_group' validator='email'/>
<cms:editable type='text' name="feedback_form_email" label='Feedback - Email Address' desc='Feedback emails will be recieved here; If left empty, no emails will be recieved.' order='33' group='orgforms_group' validator='email'/>
<cms:editable type='text' name="career_form_email" label='Careers - Email Address' desc='Careers emails will be recieved here; If left empty, no emails will be recieved.' order='34' group='orgforms_group' validator='email'/>
<cms:editable type='text' name="survey_form_email" label='Satisfaction Survey - Email Address' desc='Satisfaction Survey will be recieved here; If left empty, no emails will be recieved.' order='35' group='orgforms_group' validator='email'/>

<cms:editable type='text' name="bitrix_endpoint_url" label='Bitrix24 Endpoint URL' validator="url" desc='If left empty or error, appointments will not be created as leads in the bitrix ' order='50' group='orgforms_group' />


     <!-- Social Site Accounts -->
	<cms:editable name='group_social' label='Company - Social Profiles URLs' desc='Company\'s account public url on social media sites' type='group' order='80'/>
		
		<cms:editable name='whatsapp_row' type='row' order='10' group='group_social'>
		<cms:editable type="message" name="whatsapp_banner" order='1'><h3 style="margin-top:10px">WhatsApp link</h3>Choose 'No' to only use the url for SEO purposes and  hide it from the social media menu icons in the website</cms:editable>
		
		<cms:editable name='whatsapp_id' label='Your WhatsApp URL' validator='url' desc="eg: https://wa.me/9718005005" group='group_social' type='text' order='10' class='col-sm-10' />
		<cms:editable name='whatsapp_show' label='Show?' type='dropdown' order='20' class='col-sm-2' required='1' opt_values="Yes=true | No=false" opt_selected="Yes"/>
		</cms:editable>
		
		
		<cms:editable name='x_row' type='row' order='20' group='group_social'>
		<cms:editable type="message" name="x_banner" order='1'><h3 style="margin-top:10px">X.com link</h3>Choose 'No' to only use the url for SEO purposes and  hide it from the social media menu icons in the website</cms:editable>
		<cms:editable name='x_id' label='Your X.com URL' desc='eg: https://x.com/elyzeehospital' validator='url' group='group_social' type='text' order='10' class='col-sm-10' />
		<cms:editable name='x_show' label='Show?' type='dropdown' order='20' class='col-sm-2' required='1' opt_values="Yes=true | No=false" opt_selected="Yes"/>
		</cms:editable>
		
		<cms:editable name='snapchat_row' type='row' order='20' group='group_social'>
		<cms:editable type="message" name="snapchat_banner" order='1'><h3 style="margin-top:10px">SnapChat link</h3>Choose 'No' to only use the url for SEO purposes and  hide it from the social media menu icons in the website</cms:editable>
		<cms:editable name='snapchat_id' label='Your SnapChat URL' desc='eg: https://www.snapchat.com/add/elyzeehospital' validator='url' group='group_social' type='text' order='10' class='col-sm-10' />
		<cms:editable name='snapchat_show' label='Show?' type='dropdown' order='20' class='col-sm-2' required='1' opt_values="Yes=true | No=false" opt_selected="Yes"/>
		</cms:editable>
		
		<cms:editable name='tiktok_row' type='row' order='20' group='group_social'>
		<cms:editable type="message" name="tiktok_banner" order='1'><h3 style="margin-top:10px">TikTok link</h3>Choose 'No' to only use the url for SEO purposes and  hide it from the social media menu icons in the website</cms:editable>
		<cms:editable name='tiktok_id' label='Your TikTok URL' desc='eg: https://tiktok.com/elyzeehospital' validator='url' group='group_social' type='text' order='10' class='col-sm-10' />
		<cms:editable name='tiktok_show' label='Show?' type='dropdown' order='20' class='col-sm-2' required='1' opt_values="Yes=true | No=false" opt_selected="Yes"/>
		</cms:editable>
		
		
		
		<cms:editable name='facebook_row' type='row' order='30' group='group_social'>
		<cms:editable type="message" name="facebook_banner" order='1'><h3 style="margin-top:10px">Facebook Page link</h3>Choose 'No' to only use the url for SEO purposes and  hide it from the social media menu icons in the website</cms:editable>
		<cms:editable name='facebook_id' label='Your Facebook URL' desc='eg: https://www.facebook.com/elyzeehospital/' validator='url' group='group_social' type='text' order='10' class='col-sm-10' />
		<cms:editable name='facebook_show' label='Show?' type='dropdown' order='20' class='col-sm-2' required='1' opt_values="Yes=true | No=false" opt_selected="Yes"/>
		</cms:editable>
		
		
		<cms:editable name='instagram_row' type='row' order='50' group='group_social'>
		<cms:editable type="message" name="instagram_banner" order='1'><h3 style="margin-top:10px">Instagram link</h3>Choose 'No' to only use the url for SEO purposes and  hide it from the social media menu icons in the website</cms:editable>
		<cms:editable name='instagram_id' label='Your Instagram URL' desc='eg: https://www.instagram.com/elyzeehospital/' validator='url' group='group_social' type='text' order='10' class='col-sm-10' />
	   		<cms:editable name='instagram_show' label='Show?' type='dropdown' order='20' class='col-sm-2' required='1' opt_values="Yes=true | No=false" opt_selected="Yes"/>
		</cms:editable>
		
		
		<cms:editable name='linkedin_row' type='row' order='60' group='group_social'>
		<cms:editable type="message" name="linkedin_banner" order='1'><h3 style="margin-top:10px">LinkedIn Page link</h3>Choose 'No' to only use the url for SEO purposes and  hide it from the social media menu icons in the website</cms:editable>
		<cms:editable name='linkedin_id' label='Your LinkedIn URL' desc='eg: https://www.linkedin.com/company/elyzee-hospital' validator='url' group='group_social' type='text' order='10' class='col-sm-10' />
	   		<cms:editable name='linkedin_show' label='Show?' type='dropdown' order='20' class='col-sm-2' required='1' opt_values="Yes=true | No=false" opt_selected="Yes"/>
		</cms:editable>
		
		
		<cms:editable name='youtube_row' type='row' order='70' group='group_social' label="YouTube link">
		<cms:editable type="message" name="youtube_banner" order='1'><h3 style="margin-top:10px">YouTube link</h3>Choose 'No' to only use the url for SEO purposes and  hide it from the social media menu icons in the website</cms:editable>
		<cms:editable name='youtube_id' label='Your YouTube URL' desc='eg: https://www.youtube.com/@elyzeehospital' type='text' order='10' validator='url' class='col-sm-10'/>
		<cms:editable name='youtube_show' label='Show?' type='dropdown' order='20' class='col-sm-2' required='1' opt_values="Yes=true | No=false" opt_selected="Yes"/>
		</cms:editable>


<cms:editable type="group" label="Footer Logos" name="footer_logos_group" order='70'/>

<cms:repeatable name='footer_logos' label="Upload Logos here" group="footer_logos_group">
<cms:editable name='footer_logo'
label="Logo should be transparent png"
type='image'
show_preview='1'
preview_height='75'
quality='100'
/>	
</cms:repeatable>

<cms:editable type="group" label="Show/Hide Arabic switch option in the website" name="hide_arabic_switch_group" order='150'/>
<cms:editable name="hide_arabic_switch" label="If selected 'Hide', the arabic switch option will be hidden from the website." opt_values='Show=0 | Hide=1' opt_selected = '0' type='radio' order='1' group='hide_arabic_switch_group'/>


<cms:editable type="group" label="Additional header and footer scripts" desc="eg: Meta Pixel, Google Analytics etc." name="header_scripts_group" order='149'/>
<cms:editable name='header_scripts' label="Paste the scripts for header here" desc="Kindly handle this area carefully" no_xss_check='1' type="textarea" group="header_scripts_group" order="10"/>
<cms:editable name='body_scripts' label="Paste script or code to add after the body open here" desc="Kindly handle this area carefully" no_xss_check='1' type="textarea" group="header_scripts_group" order="20"/>
<cms:editable name='footer_scripts' label="Paste the scripts for footer here" desc="Kindly handle this area carefully" no_xss_check='1' type="textarea" group="header_scripts_group" order="30"/>




<cms:embed 'common/page_seo_editables.inc'/>


<cms:editable name='title_row' type='row' order='20' group="orgname_group">
	<cms:editable type='text'  name="name_en" label="Organisation Common Name - English"  order='1' required='1' class='col-md-6'>Elyzee Hospital</cms:editable>
	<cms:editable type='text'  name="name_ar" label="Organisation Common Name - Arabic"  order='1' required='1' class='col-md-6'>مستشفى اليزيه</cms:editable>
	
	<cms:editable type='text'  name="orgaltname_en" label="Organisation Alternate Name - English"  order='10' required='1' class='col-md-6'>Elyzee Aesthetic & Plastic Surgery Hospital</cms:editable>
	<cms:editable type='text'  name="orgaltname_ar" label="Organisation Alternate Name - Arabic"  order='11' required='1' class='col-md-6'>Elyzee Aesthetic & Plastic Surgery Hospital</cms:editable>
	
	<cms:editable type='text'  name="orglegalname_en" label="Organisation Legal Name - English"  order='20' required='1' class='col-md-6'>Elyzee Hospital LLC</cms:editable>
	<cms:editable type='text'  name="orglegalname_ar" label="Organisation Legal Name - Arabic"  order='21' required='1' class='col-md-6'>Elyzee Hospital LLC</cms:editable>
	
	<cms:editable type='text'  name="orgfoundyear" label="Organisation Founding Year" order='30' type='text' validator='min_len=4 | non_zero_integer | max_len=4' required='1' class='col-md-6'>2015</cms:editable>
	
	<cms:editable type='dropdown'  name="orgtype" label="Organisation Founder Type" desc="Select one from these" opt_values='Organization | Individual' opt_selected='Organization' order='40' required='1' class='col-md-6'/>
	  
	<cms:editable type='text'  name="orgfounder_en" label="Organisation Founder Name - English"  order='41' required='1' class='col-md-6'>Safari Group, Riyadh, Saudi Arabia</cms:editable>
	<cms:editable type='text'  name="orgfounder_ar" label="Organisation Founder Name - Arabic"  order='42' required='1' class='col-md-6'>Safari Group, Riyadh, Saudi Arabia</cms:editable>
	
</cms:editable>


</cms:template>
<cms:if k_user_access_level lt '10' ><cms:redirect url="<cms:show_with_lc k_site_link />" /></cms:if>
<?php COUCH::invoke(); ?>