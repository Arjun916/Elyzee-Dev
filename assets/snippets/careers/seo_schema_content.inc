<cms:if k_is_folder>
{
  "@context": "https://schema.org",
  "@graph": [
    <cms:call 'get_page_seo_breadcrumbs' />,
    {
      "@type": "JobPosting",
      "@id": "<cms:show_with_lc k_folder_link/>#<cms:php>echo preg_replace( '/\.[^.]*$/', '', '<cms:show k_template_name />' );</cms:php>",
      "title": <cms:escape_json><cms:get "title_<cms:show k_lang/>"/></cms:escape_json>,
      "description": <cms:escape_json><cms:get "content_<cms:show k_lang/>"/></cms:escape_json>,
      "datePosted": "<cms:date k_page_modification_date format='Y-m-d'/>",
	  "validThrough": "<cms:date end_date format='Y-m-d'/>",
      "hiringOrganization": {
        "@type": "Organization",
        "name": "<cms:show orgname/>",
        "sameAs": "<cms:show_with_lc k_site_link/>",
        "logo": "<cms:show org_logo/>"
      },
      "employmentType": "<cms:show job_type/>",
      "applicantLocationRequirements": "<cms:if orgcountryisocode><cms:show orgcountryisocode/><cms:else/>AE</cms:if>",
      "jobLocation": {
        "@type": "Place",
	     <cms:call 'get_page_seo_address'/>
      },
      "inLanguage": "<cms:show k_lang/>",
      "isPartOf": {
        "@type": "WebPage",
        "@id": "<cms:show_with_lc k_template_link/>"
      }
    }
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