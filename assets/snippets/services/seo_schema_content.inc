<cms:if k_is_page>
{
  "@context": "https://schema.org",
  "@graph": [
    <cms:call 'get_page_seo_breadcrumbs' />,
    {
      "@type": "MedicalProcedure",
      "@id": "<cms:show_with_lc k_page_link/>#service",
      "name": <cms:escape_json><cms:show c_page_seo_title/></cms:escape_json>,
      "description": <cms:escape_json><cms:show c_page_seo_desc/></cms:escape_json>,
      "url": "<cms:show_with_lc k_page_link/>",
      "image": "<cms:show c_page_seo_image/>"
    },
	<cms:call 'get_page_seo_webpage' ispage='1' slugid='webpage'/>
	<cms:call 'get_page_seo_faq' />
  ]
}
<cms:else_if k_is_folder/>
{
  "@context": "https://schema.org",
  "@graph": [
    <cms:call 'get_page_seo_breadcrumbs' />,
	<cms:call 'get_page_seo_webpage' slugid='department'/>
	<cms:call 'get_page_seo_faq' />
  ]
}
<cms:else/>
{
  "@context": "https://schema.org",
  "@graph": [
    <cms:call 'get_page_seo_breadcrumbs' />,
    <cms:call 'get_page_seo_webpage'/>
	<cms:call 'get_page_seo_faq' />
  ]
}
</cms:if>