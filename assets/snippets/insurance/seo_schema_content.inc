{
  "@context": "https://schema.org",
  "@graph": [
    <cms:call 'get_page_seo_breadcrumbs' />,
    {
      "@type": "ItemList",
      "@id": "<cms:show_with_lc k_template_link/>#<cms:php>echo preg_replace( '/\.[^.]*$/', '', '<cms:show k_template_name />' );</cms:php>",
      "name": <cms:escape_json><cms:get "title_<cms:show k_lang/>"/></cms:escape_json>,
      "itemListElement": [
       <cms:show_repeatable 'insurance_section'>
        {
          "@type": "ListItem",
          "position": <cms:show k_count/>,
          "name": <cms:escape_json><cms:get "insurance_title_<cms:show k_lang/>"/></cms:escape_json>
        }<cms:if k_count ne k_total_records>,</cms:if>
        </cms:show_repeatable>
      ]
    },
    <cms:call 'get_page_seo_webpage' />
	<cms:call 'get_page_seo_faq' />
  ]
}