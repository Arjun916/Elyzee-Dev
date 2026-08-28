{
  "@context": "https://schema.org",
  "@graph": [
	{
	  "@type": "Hospital",
	  "@id": "<cms:show k_site_link/>#hospital",
	  "name": "<cms:show orgname/>",
	  <cms:if orgaltname>"alternateName": "<cms:show orgaltname/>",</cms:if>
	  <cms:if orglegalname>"legalName": "<cms:show orglegalname/>",</cms:if>
	  "description": "<cms:show c_page_seo_desc/>",
	  <cms:if orgtagline>"slogan": "<cms:show orgtagline/>",</cms:if>
	  "url": "<cms:show k_site_link/>",
	  <cms:if org_seoimg>"image": "<cms:show org_seoimg/>",</cms:if>
	  <cms:if org_logo>"logo": "<cms:show org_logo/>",</cms:if>
	  <cms:if primaryemail>"email": "<cms:show primaryemail/>",</cms:if>
	  <cms:call 'get_page_seo_address' />,
	  <cms:call 'get_page_seo_telephone' />,

	  "foundingDate": "<cms:show org_foundingyear/>", 
	  "founders": [{
	    "@type": "<cms:show org_type/>",
	    "name": "<cms:show org_founder/>"
	  }],
	  "medicalSpecialty": [
		"PlasticSurgery",
		"CosmeticSurgery",
		"Dermatology",
		"Gynecologic",
		"DietNutrition",
		"PharmacySpecialty",
		"Urologic",
		"Surgical",
		"Otolaryngologic"
	  ],

	  "openingHoursSpecification": [
	    {
	      "@type": "OpeningHoursSpecification",
	      "dayOfWeek": [
	        "Monday",
	        "Tuesday",
	        "Wednesday",
	        "Thursday",
	        "Friday",
	        "Saturday",
			"Sunday"
	      ],
	      "opens": "07:00",
	      "closes": "22:00"
	    }
	  ],

	  "currenciesAccepted": "AED",
	  "paymentAccepted": ["Cash", "Credit Card", "Debit Card", "Insurance", "Tabby", "Tamara", "Apple Pay", "Google Pay", "Samsung Pay"],

	  "sameAs": [
	  	<cms:pages masterpage='globals.php' >
		<cms:if instagram_id>"<cms:show instagram_id/>",</cms:if>
		<cms:if whatsapp_id>"<cms:show whatsapp_id/>",</cms:if>
		<cms:if snapchat_id>"<cms:show snapchat_id/>",</cms:if>
		<cms:if tiktok_id>"<cms:show tiktok_id/>",</cms:if>
		<cms:if youtube_id>"<cms:show youtube_id/>",</cms:if>
		<cms:if x_id>"<cms:show x_id/>",</cms:if>
		<cms:if linkedin_id>"<cms:show linkedin_id/>",</cms:if>
		<cms:if facebook_id>"<cms:show facebook_id/>"</cms:if>
		</cms:pages>
	  ],

	  "department": [
		<cms:folders masterpage='services.php' depth='1' orderby='weight' order='asc' extended_info='1' include_custom_fields='1'>{
	      "@type": "MedicalBusiness",
	      "name": "<cms:php>echo html_entity_decode("<cms:get "title_<cms:show k_lang/>"/>", ENT_QUOTES, 'UTF-8');</cms:php>",
		  <cms:if primaryphone>"telephone": "<cms:show orglocationcode/><cms:show primaryphone/>",</cms:if>
	      "address": {
	        "@type": "PostalAddress",
	        "streetAddress": "<cms:show orgstreet/>",
	        "addressLocality": "<cms:show orgcity/>",
	        "addressRegion": "<cms:show orgcity/>",
	        <cms:if orgpobox>"postalCode": "<cms:show orgpobox/>",</cms:if>
	        "addressCountry": "<cms:if orgcountryisocode><cms:show orgcountryisocode/><cms:else/>AE</cms:if>"
	      },
		  <cms:if k_folder_pagecount>"serviceType": [<cms:pages masterpage='services.php' folder=k_folder_name include_subfolders='0' orderby="weight" order="asc">"<cms:php>echo html_entity_decode("<cms:get "title_<cms:show k_lang/>"/>", ENT_QUOTES, 'UTF-8');</cms:php>"<cms:if "<cms:not k_paginated_bottom />">, </cms:if></cms:pages>],</cms:if>
		  "url": "<cms:show_with_lc k_folder_link/>"
	    }<cms:if k_folder_pos lt "<cms:sub k_total_folders '1'/>">,</cms:if></cms:folders>],
		<cms:if primaryphone>"contactPoint": [
	    {
	      "@type": "ContactPoint",
	      "telephone": "<cms:show orglocationcode/><cms:show primaryphone/>",
	      "contactType": "Customer Service",
	      "areaServed": "<cms:if orgcountryisocode><cms:show orgcountryisocode/><cms:else/>AE</cms:if>",
	      "availableLanguage": ["English", "Arabic"]
	    },
	    {
	      "@type": "ContactPoint",
	      "telephone": "<cms:show orglocationcode/><cms:show primaryphone/>",
	      "contactType": "Appointments",
	      "areaServed": "<cms:if orgcountryisocode><cms:show orgcountryisocode/><cms:else/>AE</cms:if>",
	      "availableLanguage": ["English", "Arabic"]
	    }
	  ],</cms:if>
	  <cms:if orgmaplink>"hasMap": "<cms:show orgmaplink/>",</cms:if>
	  "geo": {
	    "@type": "GeoCoordinates",
	    "latitude": <cms:if orglatitude><cms:show orglatitude/><cms:else/>24.45938740470179</cms:if>,
	    "longitude": <cms:if orglongitude><cms:show orglongitude/><cms:else/>54.3492404355819</cms:if>
	  }
	},
	{
		"@type": "WebSite",
		"@id": "<cms:show k_site_link/>#website",
		"url": "<cms:show k_site_link/>",
		"name": <cms:escape_json><cms:show orgname/></cms:escape_json>,
		"potentialAction": {
			"@type": "SearchAction",
			"target": "<cms:link 'search.php'/>?s={search_term_string}",
			"query-input": "required name=search_term_string"
		}
	}
  ]
}