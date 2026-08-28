<cms:if k_is_page>
{
  "@context": "https://schema.org",
  "@graph": [
     <cms:call 'get_page_seo_breadcrumbs' />,
    {
      "@type": "Physician",
      "@id": "<cms:show_with_lc k_page_link/>#doctor",
      "name": <cms:escape_json><cms:get "title_<cms:show k_lang/>"/></cms:escape_json>,
      "description": <cms:escape_json><cms:show c_page_seo_desc/></cms:escape_json>,
      "image": "<cms:show c_page_seo_image/>",
      "gender": "<cms:show gender/>",
      "url": "<cms:show_with_lc k_page_link/>",
      <cms:call 'get_page_seo_address' />,
      <cms:call 'get_page_seo_telephone' />,
      "worksFor": {
        "@type": "Hospital",
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
    },
	<cms:call 'get_page_seo_webpage' ispage='1' slugid='webpage'/>
	<cms:call 'get_page_seo_faq' />
  ]
}
<cms:else/>
{
  "@context": "https://schema.org",
  "@graph": [
	<cms:call 'get_page_seo_breadcrumbs' />,
	<cms:call 'get_page_seo_itemlist' orderby='weight' order='asc'/>,
    <cms:call 'get_page_seo_webpage'/>
	<cms:call 'get_page_seo_faq' />
  ]
}
</cms:if>