<cms:func "star_rating" rating='5'>
    <cms:php>
		$rating = "<cms:show rating/>";
		$fullStars = floor($rating);
	    $halfStar  = ($rating - $fullStars) >= 0.5 ? 1 : 0;
	    $emptyStars = 5 - ($fullStars + $halfStar);
	    $html = '';
	    for($i = 0; $i < $fullStars; $i++){$html .= '<i class="fa-solid fa-star"></i>';}
	    if($halfStar){$html .= '<i class="fa-solid fa-star-half-stroke"></i>';}
	    for($i = 0; $i < $emptyStars; $i++){$html .= '<i class="fa-regular fa-star"></i>';}
	    echo $html;
    </cms:php>
</cms:func>


<cms:func "limit_string" value='' count=''>
	<cms:if value && count && (count gt '0')>
    <cms:php>
	$limit = intval("<cms:show count/>");
	$string = "<cms:show value/>";
	if (mb_strlen($string, 'UTF-8') <= $limit) {
        echo  $string;
    } else {
		echo mb_substr($string, 0, $limit - 3, 'UTF-8') . '...';
	}
    </cms:php>
	</cms:if>
</cms:func>


<cms:func "get_page_seo_title" >
    
    <cms:set seo_title = '' />

    <cms:set field_seo_title   = "page_seo_title_<cms:show k_lang />" />
    <cms:set field_title = "title_<cms:show k_lang />" />


    <cms:set tmp_seo_title = "<cms:get field_seo_title />" />
    <cms:if tmp_seo_title>
        <cms:set seo_title = tmp_seo_title />
    <cms:else />
        <cms:set tmp_title = "<cms:get field_title />" />
        <cms:if tmp_title>
            <cms:set seo_title = tmp_title />
        </cms:if>
    </cms:if>


    <cms:if (seo_title eq '') && k_page_folderid>
        <cms:folders masterpage=k_template_name id=k_page_folderid>
            <cms:set tmp_seo_title = "<cms:get field_seo_title />" />
            <cms:if tmp_seo_title>
                <cms:set seo_title = tmp_seo_title />
            <cms:else />
                <cms:set tmp_title = "<cms:get field_title />" />
                <cms:if tmp_title>
                    <cms:set seo_title = tmp_title />
                </cms:if>
            </cms:if>
        </cms:folders>
    </cms:if>


    <cms:if seo_title eq ''>
        <cms:set tmp_seo_title = "<cms:get_global field_seo_title />" />
        <cms:if tmp_seo_title>
            <cms:set seo_title = tmp_seo_title />
        <cms:else />
            <cms:set tmp_title = "<cms:get_global field_title />" />
            <cms:if tmp_title>
                <cms:set seo_title = "<cms:show tmp_title /> | <cms:show orgname />" />
            </cms:if>
        </cms:if>
    </cms:if>


    <cms:if (seo_title eq '') && (k_template_name ne 'index.php')>
        <cms:capture into="seo_title">
            <cms:if k_page_title>
                <cms:show k_page_title />
                <cms:if k_page_foldertitle> | <cms:show k_page_foldertitle /></cms:if> |
            <cms:else_if k_folder_title />
                <cms:show k_folder_title /> |
            </cms:if>
            <cms:show k_template_title /> | <cms:show orgname />
        </cms:capture>
    </cms:if>

	
	<cms:if seo_title eq ''><cms:set seo_title = org_seotitle /></cms:if>
    <cms:if seo_title eq ''><cms:set seo_title = "<cms:show orgname /> | <cms:show orgcity />, <cms:show orgcountry />" /></cms:if>
	
	<cms:php>echo html_entity_decode("<cms:show seo_title />", ENT_QUOTES, 'UTF-8');</cms:php>	
</cms:func>




<cms:func 'get_page_seo_desc'>
    <cms:set seo_desc = '' />


    <cms:set field_page_desc     = "page_seo_desc_<cms:show k_lang />" />
    <cms:set field_short_desc    = "short_desc_<cms:show k_lang />" />
	<cms:set field_short_content = "short_content_<cms:show k_lang />" />
    <cms:set field_content       = "content_<cms:show k_lang />" />



    
	<cms:set seo_tmp = "<cms:get field_page_desc />" />
	<cms:if seo_tmp>
		<cms:set seo_desc = seo_tmp />
    <cms:else />
        
        <cms:set seo_tmp = "<cms:get field_short_desc />" />
        <cms:if seo_tmp>
            <cms:set seo_desc = seo_tmp />
        <cms:else />
            
            <cms:set seo_tmp = "<cms:get field_content />" />
            <cms:if seo_tmp>
                <cms:set seo_desc = seo_tmp />
            </cms:if>
        </cms:if>
    </cms:if>

    <cms:if seo_desc eq '' && k_template_is_clonable>
        <cms:set seo_tmp = "<cms:get_global field_page_desc />" />
        <cms:if seo_tmp>
            <cms:set seo_desc = seo_tmp />
        <cms:else />
            <cms:set seo_tmp = "<cms:get_global field_short_content />" />
            <cms:if seo_tmp>
                <cms:set seo_desc = seo_tmp />
            <cms:else />
                <cms:set seo_tmp = "<cms:get_global field_content />" />
                <cms:if seo_tmp>
                    <cms:set seo_desc = seo_tmp />
                </cms:if>
            </cms:if>
        </cms:if>
    </cms:if>
	
	<cms:if seo_desc eq ''><cms:set seo_desc = org_seodesc /></cms:if>
    <cms:if seo_desc eq ''><cms:set seo_desc = orgdesc /></cms:if>
    <cms:php>echo html_entity_decode("<cms:excerpt count='250' truncate_chars='1'><cms:show seo_desc /></cms:excerpt>", ENT_QUOTES, 'UTF-8');</cms:php>
</cms:func>


<cms:func 'get_page_seo_image'>
    <cms:set seo_img = '' />


    <cms:set field_page_img   = 'page_seo_image' />
    <cms:set field_page_image = 'page_image' />

   
    <cms:if page_seo_image>
        <cms:set seo_img = page_seo_image />
    <cms:else_if page_image />
        <cms:set seo_img = page_image />
    </cms:if>
   


    <cms:if (seo_img eq '') && k_page_folderid>
        <cms:folders masterpage=k_template_name id=k_page_folderid>
            <cms:set img_tmp = "<cms:get field_page_img />" />
            <cms:if img_tmp>
                <cms:set seo_img = img_tmp />
            <cms:else />
                <cms:set img_tmp = "<cms:get field_page_image />" />
                <cms:if img_tmp>
                    <cms:set seo_img = img_tmp />
                </cms:if>
            </cms:if>
        </cms:folders>
    </cms:if>


    <cms:if seo_img eq '' && k_template_is_clonable>
        <cms:set img_tmp = "<cms:get_global field_page_img />" />
        <cms:if img_tmp>
            <cms:set seo_img = img_tmp />
        <cms:else />
            <cms:set img_tmp = "<cms:get_global field_page_image />" />
            <cms:if img_tmp>
                <cms:set seo_img = img_tmp />
            </cms:if>
        </cms:if>
    </cms:if>


    <cms:if seo_img eq ''><cms:set seo_img = org_seoimg /></cms:if>

    <cms:show seo_img />
</cms:func>




<cms:func 'get_page_seo_keywords'>
    <cms:set pg_seo_kw = '' />
    <cms:set field_pg_seo_kw = "page_seo_keywords_<cms:show k_lang />" />
   
	<cms:set pg_seo_kw_tmp = "<cms:get field_pg_seo_kw />" />
	<cms:if pg_seo_kw_tmp><cms:set pg_seo_kw = pg_seo_kw_tmp /></cms:if>
  

    <cms:if (pg_seo_kw eq '') && k_page_folderid>
        <cms:folders masterpage=k_template_name id=k_page_folderid>
            <cms:set pg_seo_kw_tmp = "<cms:get field_pg_seo_kw />" />
            <cms:if pg_seo_kw_tmp><cms:set pg_seo_kw = pg_seo_kw_tmp /></cms:if>
        </cms:folders>
    </cms:if>

    <cms:if pg_seo_kw eq '' && k_template_is_clonable>
        <cms:set pg_seo_kw_tmp = "<cms:get_global field_pg_seo_kw />" />
        <cms:if pg_seo_kw_tmp><cms:set pg_seo_kw = pg_seo_kw_tmp /></cms:if>
    </cms:if>

    <cms:if pg_seo_kw eq ''><cms:set pg_seo_kw = org_seokeywords /></cms:if>
	<cms:php>echo html_entity_decode("<cms:show pg_seo_kw />", ENT_QUOTES, 'UTF-8');</cms:php>	
</cms:func>



<cms:func 'get_page_seo_faq'>
<cms:capture into='seo_faq_output_schema'>
	<cms:set printed_faq_count='0' />
    {
      "@type": "FAQPage",
      "@id": "<cms:if k_is_page><cms:show_with_lc k_page_link/><cms:else_if k_is_folder/><cms:show_with_lc k_folder_link/><cms:else/><cms:show_with_lc k_template_link/></cms:if>#faq",
      "mainEntity": [
        <cms:show_repeatable 'faq_sections'>
		<cms:set seo_faq_heading_temp = "faq_heading_<cms:show k_lang/>" /><cms:set seo_faq_heading_val="<cms:get seo_faq_heading_temp />" /><cms:set seo_faq_content_temp = "faq_content_<cms:show k_lang/>" /><cms:set seo_faq_content_val="<cms:get seo_faq_content_temp />" /><cms:if "<cms:not_empty seo_faq_heading_val />" && "<cms:not_empty seo_faq_content_val />" ><cms:set has_seo_faq_schema = '1' 'global' /><cms:if printed_faq_count ne '0'>,</cms:if>
        {
          "@type": "Question",
          "name": <cms:escape_json><cms:get "faq_heading_<cms:show k_lang/>"/></cms:escape_json>,
          "acceptedAnswer": {
            "@type": "Answer",
            "text": <cms:escape_json><cms:get "faq_content_<cms:show k_lang/>"/></cms:escape_json>
          }
        }<cms:set printed_faq_count = "<cms:add printed_faq_count '1' />" /></cms:if>
        </cms:show_repeatable>
		<cms:if has_seo_faq_schema>
		<cms:else/>
		<cms:show_globals>
        <cms:show_repeatable 'faq_sections'>
		<cms:set seo_faq_heading_temp = "faq_heading_<cms:show k_lang/>" /><cms:set seo_faq_heading_val="<cms:get seo_faq_heading_temp />" /><cms:set seo_faq_content_temp = "faq_content_<cms:show k_lang/>" /><cms:set seo_faq_content_val="<cms:get seo_faq_content_temp />" /><cms:if "<cms:not_empty seo_faq_heading_val />" && "<cms:not_empty seo_faq_content_val />" ><cms:set has_seo_faq_schema = '1' 'global' /><cms:if printed_faq_count ne '0'>,</cms:if>
        {
          "@type": "Question",
          "name": <cms:escape_json><cms:get "faq_heading_<cms:show k_lang/>"/></cms:escape_json>,
          "acceptedAnswer": {
            "@type": "Answer",
            "text": <cms:escape_json><cms:get "faq_content_<cms:show k_lang/>"/></cms:escape_json>
          }
        }<cms:set printed_faq_count = "<cms:add printed_faq_count '1' />" /></cms:if>
        </cms:show_repeatable>
		</cms:show_globals>
		</cms:if>
      ]
    }
</cms:capture>
<cms:if has_seo_faq_schema>,<cms:show seo_faq_output_schema/></cms:if>
</cms:func>

<cms:func 'get_page_seo_address'>
"address": {
  "@type": "PostalAddress",
  "streetAddress": "<cms:show orgstreet/>",
  "addressLocality": "<cms:show orgcity/>",
  "addressRegion": "<cms:show orgcity/>",
  "postalCode": "<cms:show orgpobox/>",
  "addressCountry": "<cms:if orgcountryisocode><cms:show orgcountryisocode/><cms:else/>AE</cms:if>"
}
</cms:func>
<cms:func 'get_page_seo_telephone'>"telephone": "<cms:show orglocationcode/><cms:show primaryphone/>"</cms:func>

<cms:func 'get_page_seo_publisher'>
  "publisher": {
    "@type": "Organization",
    "name": "<cms:show orgname/>",
    "url": "<cms:show_with_lc k_site_link/>",
    "logo": {
      "@type": "ImageObject",
      "url": "<cms:show org_logo/>"
    },
   <cms:if org_seoimg>"image": "<cms:show org_seoimg/>",</cms:if>
   <cms:call 'get_page_seo_address' />,
   <cms:call 'get_page_seo_telephone' />
  }
</cms:func>

<cms:func 'get_page_seo_webpage' schematype='WebPage' ispage='' slugid=''>
    {
      "@type": "<cms:show schematype/>",
      "@id": "<cms:if k_is_page><cms:show_with_lc k_page_link/><cms:else_if k_is_folder/><cms:show_with_lc k_folder_link/><cms:else/><cms:show_with_lc k_template_link/></cms:if>#<cms:if slugid><cms:show slugid/><cms:else/><cms:php>echo preg_replace( '/\.[^.]*$/', '', '<cms:show k_template_name />' );</cms:php></cms:if>",
      "url": "<cms:if k_is_page><cms:show_with_lc k_page_link/><cms:else_if k_is_folder/><cms:show_with_lc k_folder_link/><cms:else/><cms:show_with_lc k_template_link/></cms:if>",
      "name": <cms:escape_json><cms:show c_page_seo_title/></cms:escape_json>,
      "description": <cms:escape_json><cms:show c_page_seo_desc/></cms:escape_json>,
      "inLanguage": "<cms:show k_lang/>",
      "primaryImageOfPage": {
        "@type": "ImageObject",
        "url": "<cms:show c_page_seo_image/>",
		"width": 1200,
		"height": 630
      },
      "isPartOf": {
        "@type": "WebSite",
        "@id": "<cms:show k_site_link/>#website"
      },
	  "mainEntityOfPage": {
	    "@type": "WebPage",
	    "@id": "<cms:if k_is_page><cms:show_with_lc k_page_link/><cms:else_if k_is_folder/><cms:show_with_lc k_folder_link/><cms:else/><cms:show_with_lc k_template_link/></cms:if>"
	  },
      <cms:call 'get_page_seo_publisher' />
    }
</cms:func>



<cms:func 'get_page_seo_breadcrumbs'>
    {
      "@type": "BreadcrumbList",
      "@id": "<cms:if k_page_link><cms:show_with_lc k_page_link/><cms:else_if k_folder_link/><cms:show_with_lc k_folder_link/><cms:else/><cms:show_with_lc k_template_link/></cms:if>#breadcrumb",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": <cms:escape_json><cms:show orgname/></cms:escape_json>,
          "item": "<cms:show_with_lc k_site_link/>"
        },
        {<cms:set seobreadcrumppos = '2' 'global'/>
          "@type": "ListItem",
          "position": <cms:show seobreadcrumppos/>,
          "name": <cms:escape_json><cms:call 'get_page_title' tname=k_template_name/></cms:escape_json>,
          "item": "<cms:show_with_lc k_template_link/>"
        }
		<cms:if k_folder_name || k_page_foldername>
			<cms:if k_folder_name ><cms:set seo_category_folder=k_folder_name /></cms:if>
			<cms:if k_page_foldername ><cms:set seo_category_folder=k_page_foldername /></cms:if>
			<cms:if seo_category_folder >
            <cms:parentfolders folder=seo_category_folder extended_info='1' include_custom_fields='1'>
                <cms:if seobreadcrumppos ge '2'>,</cms:if>{<cms:set seobreadcrumppos = "<cms:add seobreadcrumppos '1'/>" 'global'/>
                  "@type": "ListItem",
                  "position": <cms:show seobreadcrumppos/>,
                  "name": <cms:escape_json><cms:if k_template_name eq 'services.php'><cms:folders masterpage="services.php" depth='1' root=k_folder_name include_custom_fields='1'><cms:get "title_<cms:show k_lang/>"/></cms:folders><cms:else/><cms:get "title_<cms:show k_lang/>"/></cms:if></cms:escape_json>,
                  "item": "<cms:show_with_lc k_folder_link/>"
                }
            </cms:parentfolders>
  		  <cms:if seobreadcrumppos le '2' && seo_category_folder>
            ,{<cms:set seobreadcrumppos = "<cms:add seobreadcrumppos '1'/>" 'global'/>
              "@type": "ListItem",
              "position": <cms:add seobreadcrumppos '1'/>,
              "name": <cms:escape_json><cms:if k_template_name eq 'services.php'><cms:folders masterpage="services.php" depth='1' root=k_folder_name include_custom_fields='1'><cms:get "title_<cms:show k_lang/>"/></cms:folders><cms:else/><cms:get "title_<cms:show k_lang/>"/></cms:if></cms:escape_json>,
              "item": "<cms:show_with_lc k_folder_link/>"
            }
			</cms:if>
  	  	 </cms:if>
  	  	</cms:if>
	  <cms:if k_is_page>
       ,{
         "@type": "ListItem",
         "position": <cms:add seobreadcrumppos '1'/>,
         "name": <cms:escape_json><cms:show c_page_seo_title/></cms:escape_json>,
         "item": "<cms:show_with_lc k_page_link/>"
       }
	   </cms:if>
      ]
    }
</cms:func>


<cms:func 'get_page_seo_itemlist' orderby='publish_date' order='desc'>
    {
      "@type": "ItemList",
      "@id": "<cms:show_with_lc k_template_link/>#<cms:php>echo preg_replace( '/\.[^.]*$/', '', '<cms:show k_template_name />' );</cms:php>",
      "name": <cms:escape_json><cms:show c_page_seo_title/></cms:escape_json>,
      "itemListElement": [<cms:pages masterpage=k_template_name orderby=orderby order=order>
        {
          "@type": "ListItem",
          "position": <cms:show k_count/>,
          "name": <cms:escape_json><cms:get "title_<cms:show k_lang/>"/></cms:escape_json>,
          "url": "<cms:show_with_lc k_page_link/>"
        }<cms:if "<cms:not k_paginated_bottom />" >,</cms:if></cms:pages>]
    }
</cms:func>