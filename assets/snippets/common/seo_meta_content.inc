<cms:embed 'common/functions.inc'/>
<cms:set c_page_seo_title = "<cms:call 'get_page_seo_title' />" 'global' />
<cms:set c_page_seo_title = "<cms:trim c_page_seo_title />" 'global' />

<cms:set c_page_seo_desc = "<cms:call 'get_page_seo_desc' />" 'global' />
<cms:set c_page_seo_desc = "<cms:trim c_page_seo_desc />" 'global' />

<cms:set c_page_seo_image = "<cms:call 'get_page_seo_image' />" 'global' />
<cms:set c_page_seo_image = "<cms:trim c_page_seo_image />" 'global' />

<cms:set c_page_seo_keywords = "<cms:call 'get_page_seo_keywords' />" 'global' />
<cms:set c_page_seo_keywords = "<cms:trim c_page_seo_keywords />" 'global' />
	
	
	
<title><cms:call 'limit_string' value=c_page_seo_title count='60'/></title>
<meta name="title" content="<cms:show c_page_seo_title />">
<meta name='subtitle' content="<cms:show orgtagline />">
<meta name="description" content="<cms:call 'limit_string' value=c_page_seo_desc count='155'/>">
<meta name="keywords" content="<cms:show c_page_seo_keywords/>">
<meta name="author" content="<cms:show orgname/>">
<meta name='subject' content="<cms:show orgname /> <cms:show orgtagline />">
<meta name='copyright' content="<cms:show orgname />, <cms:show orgcountry />">
<meta name="image" content="<cms:show c_page_seo_image />">
<meta name='url' content="<cms:show k_page_link />">
<meta name='identifier-URL' content='<cms:show k_page_link />'>
<meta name='pagename' content="<cms:show c_page_seo_title />">
<meta name='distribution' content='Global'>
<meta name='rating' content='General'>



<meta name="language" content="<cms:show k_lang/>">	
<meta name="robots" content="index, follow" />
<link rel="canonical" href="<cms:show_with_lc k_page_link/>">
<link rel='index' title='<cms:show c_page_seo_title />' href='<cms:show k_site_link />'>


<meta property="og:type" content="website">
<meta property="og:title" content="<cms:show c_page_seo_title/>">
<meta property="og:description" content="<cms:call 'limit_string' value=c_page_seo_desc count='155'/>">
<meta property="og:locale" content="en_AE">
<meta property="og:locale:alternate" content="ar_AE">
<meta property="og:image" content="<cms:show c_page_seo_image/>">
<meta property="og:image:secure_url" content="<cms:show c_page_seo_image />" >
<meta property="og:image:alt" content="<cms:show c_page_seo_title />" >
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:url" content="<cms:show_with_lc k_page_link/>">
<meta property="og:site_name" content="<cms:show orgname/>">
<meta property="ia:markup_url" content="<cms:show_with_lc k_page_link/>">
<meta property="ia:markup_url_dev" content="<cms:show_with_lc k_page_link/>">
<meta property="ia:rules_url" content="<cms:show_with_lc k_page_link/>">
<meta property="ia:rules_url_dev" content="<cms:show_with_lc k_page_link/>">
<meta property="og:updated_time" content="<cms:if k_page_modification_date && k_page_modification_date ne '0000-00-00 00:00:00'><cms:date k_page_modification_date format='Y-m-d'/>T<cms:date k_page_modification_date format='H:i:s+04:00'/><cms:else/><cms:date k_published_date format='Y-m-d'/>T<cms:date k_published_date format='H:i:s+04:00'/></cms:if>">


<meta name="og:title" content="<cms:show c_page_seo_title />">
<meta name="og:description" content="<cms:call 'limit_string' value=c_page_seo_desc count='155'/>">
<meta name="og:image" content="<cms:show c_page_seo_image />">
<meta name="og:url" content="<cms:show_with_lc k_page_link/>">
<meta name="og:site_name" content="<cms:show orgname />">
<cms:if primaryemail><meta name='og:email' content='<cms:show primaryemail />'></cms:if>
<cms:if primaryphone><meta name='og:phone_number' content='<cms:show orglocationcode/><cms:show primaryphone />'></cms:if>
<meta name='og:latitude' content='<cms:if orglatitude><cms:show orglatitude/><cms:else/>24.45938740470179</cms:if>'>
<meta name='og:longitude' content='<cms:if orglongitude><cms:show orglongitude/><cms:else/>54.3492404355819</cms:if>'>
<meta name='og:street-address' content='<cms:show orgstreet/>, <cms:show orgcity/>, <cms:show orgcountry/>'>
<meta name='og:locality' content='<cms:show orgstreet/>, <cms:show orgcity/>, <cms:show orgcountry/>'>
<meta name='og:region' content='<cms:if orgcountryisocode><cms:show orgcountryisocode/><cms:else/>AE</cms:if>'>
<meta name='og:country-name' content='<cms:if orgcountryshortcode><cms:show orgcountryshortcode/><cms:else/>UAE</cms:if>'>



<cms:if k_template_name eq 'insights.php' && k_is_page>
<cms:if org_facebook_id><meta property="article:author" content="<cms:show org_facebook_id/>"></cms:if>
<meta property="article:published_time" content="<cms:date k_published_date format='U'/>">
<meta property="article:modified_time" content="<cms:date k_page_modification_date format='U'/>">
</cms:if>


<cms:if org_x_id>
<meta name="twitter:site" content='<cms:php>echo getSMHandleFromURL("<cms:show org_x_id/>");</cms:php>'>
<meta name="twitter:creator" content='<cms:php>echo getSMHandleFromURL("<cms:show org_x_id/>");</cms:php>'>
</cms:if>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<cms:show c_page_seo_title/>">
<meta name="twitter:description" content="<cms:call 'limit_string' value=c_page_seo_desc count='155'/>">
<meta name="twitter:image" content="<cms:show c_page_seo_image/>">
<meta name="twitter:image:src" content="<cms:show c_page_seo_image />">	
<meta name="twitter:image:alt" content="<cms:show c_page_seo_title />">