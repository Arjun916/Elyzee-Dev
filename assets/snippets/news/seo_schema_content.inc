<cms:if k_is_page>
{
  "@context": "https://schema.org",
  "@graph": [
	<cms:call 'get_page_seo_breadcrumbs' />,
    {
      "@type": "NewsArticle",
      "@id": "<cms:show_with_lc k_page_link/>#article",
      "headline": <cms:escape_json><cms:get "title_<cms:show k_lang/>"/></cms:escape_json>,
      "description": <cms:escape_json><cms:show c_page_seo_desc/></cms:escape_json>,
      "image": [
        "<cms:show c_page_seo_image/>"
      ],
      "datePublished": "<cms:date k_page_date format='Y-m-d'/>",
      "dateModified": "<cms:date k_page_modification_date format='Y-m-d'/>",
      "url": "<cms:show_with_lc k_page_link/>",
      "author": {
        "@type": "Organization",
        "name": "<cms:show orgname/>"
      },
      <cms:call 'get_page_seo_publisher' />
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
	<cms:call 'get_page_seo_itemlist' />,
	<cms:call 'get_page_seo_webpage' slugid='list'/>
    <cms:call 'get_page_seo_faq' />
  ]
}
</cms:if>