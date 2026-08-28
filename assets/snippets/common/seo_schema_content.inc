<cms:capture into="schema_website">
    <cms:if k_template_name eq 'index.php'><cms:embed 'home/seo_schema_content.inc'/>
    <cms:else_if k_template_name eq 'careers.php'/><cms:embed 'careers/seo_schema_content.inc'/>
    <cms:else_if k_template_name eq 'services.php'/><cms:embed 'services/seo_schema_content.inc'/>
    <cms:else_if k_template_name eq 'doctors.php'/><cms:embed 'doctors/seo_schema_content.inc'/>
    <cms:else_if k_template_name eq 'insurance.php'/><cms:embed 'insurance/seo_schema_content.inc'/>
    <cms:else_if k_template_name eq 'news-events.php'/><cms:embed 'news/seo_schema_content.inc'/>
    <cms:else_if k_template_name eq 'insights.php'/><cms:embed 'insights/seo_schema_content.inc'/>
    <cms:else_if k_template_name eq 'testimonials.php'/><cms:embed 'testimonials/seo_schema_content.inc'/>
    <cms:else/>
        {
          "@context": "https://schema.org",
          "@graph": [
            <cms:call 'get_page_seo_breadcrumbs' />,
            <cms:if k_template_name eq 'about.php'><cms:call 'get_page_seo_webpage' schematype='AboutPage' />
            <cms:else_if k_template_name eq 'contact.php'/><cms:call 'get_page_seo_webpage' schematype='ContactPage' />
            <cms:else_if k_template_name eq 'before-after.php'/><cms:call 'get_page_seo_webpage' slugid='webpage' />
            <cms:else_if k_template_name eq 'search.php'/>
                {
                  "@type": "SearchResultsPage",
                  "@id": "<cms:show_with_lc k_template_link/>#search",
                  "url": "<cms:show_with_lc k_template_link/>",
                  "name": <cms:escape_json><cms:show c_page_seo_title/></cms:escape_json>,
                  "description": <cms:escape_json><cms:show c_page_seo_desc/></cms:escape_json>,
                  "inLanguage": "<cms:show k_lang/>",
                  "isPartOf": {
                    "@type": "WebSite",
                    "@id": "<cms:show k_site_link/>#website"
                  },
                  "mainEntityOfPage": "<cms:show_with_lc k_template_link/>"
                },
                <cms:call 'get_page_seo_webpage' slugid='webpage' />
            <cms:else/><cms:call 'get_page_seo_webpage' /></cms:if>
            <cms:call 'get_page_seo_faq' />
          ]
        }
    </cms:if>
</cms:capture>

<cms:minify 'schema' >/*CODE*/<cms:show schema_website/>/*CODE*/</cms:minify>