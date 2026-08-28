<cms:embed "locale/main.inc" />
<cms:php>
function getSMHandleFromURL($url) {
    $url = trim($url, "/ ");
    $parts = parse_url($url);
    if (isset($parts['path'])) {return '@' . ltrim($parts['path'], '/');}
    return null;
}
</cms:php>


<cms:func 'get_page_title' tname='' pname=''><cms:set p_title_temp = "title_<cms:show k_lang/>" /><cms:if tname && (tname ne '') && pname && (pname ne '')><cms:set pp_title_val = "<cms:get_field p_title_temp masterpage=tname page=pname />" /><cms:set pp_title_val_name="<cms:if pp_title_val && (pp_title_val ne '')><cms:show pp_title_val/><cms:else/><cms:pages masterpage=tname page_name=pname limit='1' skip_custom_fields='1'><cms:show k_page_title /></cms:pages></cms:if>"/><cms:php>echo trim("<cms:show pp_title_val_name/>");</cms:php><cms:else /><cms:if tname && (tname ne '')><cms:set t_title_val = "<cms:get_global p_title_temp masterpage=tname/>" /><cms:if t_title_val && (t_title_val ne '')><cms:php>echo trim("<cms:show t_title_val/>");</cms:php><cms:else/><cms:set c_title_val = "<cms:get_field p_title_temp masterpage=tname/>" /><cms:set ct_title_val="<cms:if c_title_val && (c_title_val ne '')><cms:show c_title_val/><cms:else/><cms:pages masterpage=tname limit='1' skip_custom_fields='1'><cms:show k_template_title /></cms:pages></cms:if>"/><cms:php>echo trim("<cms:show ct_title_val/>");</cms:php></cms:if>
<cms:else /><cms:if k_is_page || k_is_folder><cms:set p_title_val = "<cms:get p_title_temp />" /><cms:if p_title_val && (p_title_val ne '')><cms:php>echo trim("<cms:show p_title_val/>");</cms:php><cms:else/><cms:php>echo trim("<cms:if k_is_page><cms:show k_page_title/><cms:else/><cms:show k_folder_title/></cms:if>");</cms:php></cms:if><cms:else /><cms:set t_title_val = "<cms:get_global p_title_temp />" /><cms:if t_title_val && (t_title_val ne '')><cms:php>echo trim("<cms:show t_title_val/>");</cms:php><cms:else/><cms:set c_title_val = "<cms:get p_title_temp />" /><cms:set ct_title_val="<cms:if c_title_val && (c_title_val ne '')><cms:show c_title_val/><cms:else/><cms:show k_template_title/></cms:if>"/><cms:php>echo trim("<cms:show ct_title_val/>");</cms:php></cms:if></cms:if></cms:if></cms:if></cms:func>


					

<cms:set team-modal='0' 'global' />
<cms:set notifications='0' 'global' />
<cms:set show_breadcrumbs = "1" />
<cms:pages masterpage='globals.php' >
<cms:set orgname_temp = "name_<cms:show k_lang/>" />	
<cms:set orgname="<cms:get orgname_temp />" 'global' />	

<cms:set primaryphone="<cms:show phone_primary />" 'global' />
<cms:set primaryemail="<cms:show email_primary />" 'global' />	

<cms:set orgdesc_temp= "desc_<cms:show k_lang />" />
<cms:set orgdesc="<cms:get orgdesc_temp />" 'global' />

<cms:set orgtagline_temp= "tagline_<cms:show k_lang />" />
<cms:set orgtagline="<cms:get orgtagline_temp />" 'global' />

<cms:set orgtaglinedesc_temp= "tagline_desc_<cms:show k_lang />" />
<cms:set orgtaglinedesc="<cms:get orgtaglinedesc_temp />" 'global' />


<cms:set org_moh_temp= "moh_id_<cms:show k_lang />" />
<cms:set org_moh_id="<cms:get org_moh_temp />" 'global' />	

<cms:set placeholder="<cms:show k_site_link/>assets/images/placeholder.jpg" 'global' />

<cms:set org_facebook_id="<cms:show facebook_id/>" 'global' />
<cms:set org_x_id="<cms:show x_id/>" 'global' />
<cms:set org_noreply_email="<cms:concat 'Elyzee Hospital' ' <' k_email_from '>' />" 'global' />

<cms:set org_foundingyear=orgfoundyear 'global' />
<cms:set org_type=orgtype 'global' />


<cms:set orgaltname_temp= "orgaltname_<cms:show k_lang />" />
<cms:set orgaltname="<cms:get orgaltname_temp />" 'global' />

<cms:set orglegalname_temp= "orglegalname_<cms:show k_lang />" />
<cms:set orglegalname="<cms:get orglegalname_temp />" 'global' />

<cms:set org_founder_temp= "orgfounder_<cms:show k_lang />" />
<cms:set org_founder="<cms:get org_founder_temp />" 'global' />


<cms:set org_seotitle_temp= "page_seo_title_<cms:show k_lang />" />
<cms:set org_seotitle="<cms:get org_seotitle_temp />" 'global' />	

<cms:set org_seodesc_temp= "page_seo_desc_<cms:show k_lang />" />
<cms:set org_seodesc="<cms:get org_seodesc_temp />" 'global' />	


<cms:set org_seokeywords_temp= "page_seo_keywords_<cms:show k_lang />" />
<cms:set org_seokeywords="<cms:get org_seokeywords_temp />" 'global' />	

<cms:set hide_arabic="<cms:show hide_arabic_switch/>" 'global'/>

<cms:set org_seoimg=page_seo_image 'global' />

</cms:pages>

<cms:pages masterpage='contact.php' orderby='weight' order='asc' limit='1' paginate='0'>

<cms:set primaryphone="<cms:if phone_primary><cms:show phone_primary /><cms:else/><cms:show location_phone_primary /></cms:if>" 'global' />
<cms:set primaryemail="<cms:if primaryemail><cms:show primaryemail /><cms:else/><cms:show location_email /></cms:if>" 'global' />
<cms:set orglocationcode="<cms:show location_phone_code />" 'global' />

<cms:set orgstreet_temp= "location_<cms:show k_lang />" />
<cms:set orgstreet="<cms:get orgstreet_temp />" 'global' />

<cms:set orgcity_temp= "location_city_<cms:show k_lang />" />
<cms:set orgcity="<cms:get orgcity_temp />" 'global' />

<cms:set orgcountry_temp= "location_country_<cms:show k_lang />" />
<cms:set orgcountry="<cms:get orgcountry_temp />" 'global' />

<cms:set orgaddress="<cms:show orgstreet />,<br><cms:show orgcity />, <cms:show orgcountry/>" 'global' />

<cms:set orgschedule_temp= "location_schedule_<cms:show k_lang />" />
<cms:set orgschedule="<cms:get orgschedule_temp />" 'global' />

<cms:set orgmaplink="<cms:show location_url />" 'global' />
<cms:set orgpobox="<cms:show location_pobox />" 'global' />
</cms:pages>

<cms:if org_seoimg ne ''><cms:else/><cms:set org_seoimg="<cms:show k_site_link/>assets/images/elyzeehospital-abudhabi.jpg" 'global' /></cms:if>
<cms:set org_logo="<cms:show k_site_link/>assets/images/logo/elyzee_hospital.jpg" 'global' />

<cms:set main_template_name=k_template_name 'global' />
<cms:set p_img="<cms:show k_site_link/>assets/images/logo/logo_og.jpg" 'global' />
<cms:set px_img="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" 'global' />

<cms:set email_debug='0' 'global' />