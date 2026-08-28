{
  "@context": "https://schema.org",
  "@graph": [
 	<cms:call 'get_page_seo_breadcrumbs' />,
    {
      "@type": "ItemList",
      "@id": "<cms:show_with_lc k_template_link/>#testimonials",
      "name": <cms:escape_json><cms:get "title_<cms:show k_lang/>"/></cms:escape_json>,
      "itemListElement": [<cms:pages masterpage=k_template_name orderby='weight' order='asc'>
        {
          "@type": "Review",
          "position": <cms:show k_count/>,
          "author": {
            "@type": "Person",
            "name": <cms:escape_json><cms:get "title_<cms:show k_lang/>"/></cms:escape_json>
          },
          "reviewBody": <cms:escape_json><cms:get "short_desc_<cms:show k_lang/>"/></cms:escape_json>,
          <cms:if rating_value>
          "reviewRating": {
            "@type": "Rating",
            "ratingValue": "<cms:show rating_value/>",
            "bestRating": "5",
            "worstRating": "1"
          },</cms:if>
          "itemReviewed": {
            "@type": "Hospital",
            "name": "<cms:show orgname/>"
          }
        }<cms:if "<cms:not k_paginated_bottom />" >,</cms:if></cms:pages>]
    },
	<cms:call 'get_page_seo_webpage' slugid='webpage'/>
	<cms:call 'get_page_seo_faq' />
  ]
}