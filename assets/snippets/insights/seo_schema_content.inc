<cms:if k_is_page>
{
  "@context": "https://schema.org",
  "@graph": [
	<cms:call 'get_page_seo_breadcrumbs' />,
    {
      "@type": "BlogPosting",
      "@id": "<cms:show_with_lc k_page_link/>#post",
      "headline": <cms:escape_json><cms:get "title_<cms:show k_lang/>"/></cms:escape_json>,
      "description": <cms:escape_json><cms:show c_page_seo_desc/></cms:escape_json>,
      "articleBody": <cms:escape_json><cms:get "content_<cms:show k_lang/>"/></cms:escape_json>,
      "image": "<cms:show c_page_seo_image/>",
      "url": "<cms:show_with_lc k_page_link/>",
      "datePublished": "<cms:date k_page_date format='Y-m-d\TH:i:sP' />",
      "dateModified": "<cms:date k_page_date_modified format='Y-m-d\TH:i:sP' />",
      "author": {
        "@type": "Organization",
        "name": "<cms:show orgname/>",
		"url": "<cms:show k_site_link/>"
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
    {
      "@type": "Blog",
      "@id": "<cms:show_with_lc k_template_link/>#<cms:php>echo preg_replace( '/\.[^.]*$/', '', '<cms:show k_template_name />' );</cms:php>",
      "name": <cms:escape_json><cms:call 'get_page_title' tname=k_template_name/></cms:escape_json>,
      "url":  "<cms:show_with_lc k_template_link/>",
      "blogPost": [<cms:pages masterpage=k_template_name orderby='publish_date' order='desc'>
        {
          "@type": "BlogPosting",
          "headline": <cms:escape_json><cms:get "title_<cms:show k_lang/>"/></cms:escape_json>,
          "url": "<cms:show_with_lc k_page_link/>"
       }<cms:if "<cms:not k_paginated_bottom />" >,</cms:if></cms:pages>]
    },
	<cms:call 'get_page_seo_webpage' slugid='webpage'/>
    <cms:call 'get_page_seo_faq' />
  ]
}
</cms:if>