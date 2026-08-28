<!DOCTYPE html>
<html xml:lang="<cms:show k_lang/>" lang="<cms:show k_lang/>" dir="<cms:if k_lang eq 'ar'>rtl<cms:else/>ltr</cms:if>" itemscope itemtype="http://schema.org/WebPage">
<cms:trim "<cms:embed 'common/globals.inc' />"/>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<meta name="format-detection" content="telephone=no">

<link rel="alternate" href="<cms:show k_site_link/>" hreflang="x-default" />
<cms:each k_supported_langs as='lang' key='lc'><link rel="alternate" href="<cms:show k_site_link/><cms:show lc />/" hreflang="<cms:show lc />-ae" /></cms:each>


<cms:trim "<cms:embed 'common/seo_meta_content.inc'/>"/>
<cms:trim "<cms:embed 'common/seo_schema_content.inc'/>"/>


<meta name="theme-color" content="#000000">
<!-- Favicons -->
<link rel="icon" type="image/png" href="<cms:show k_site_link/>assets/images/favicons/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="<cms:show k_site_link/>assets/images/favicons/favicon.svg" />
<link rel="shortcut icon" href="<cms:show k_site_link/>assets/images/favicons/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="<cms:show k_site_link/>assets/images/favicons/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="<cms:show orgname />" />
<link rel="manifest" href="<cms:show k_site_link/>assets/images/favicons/site.webmanifest" />

<link rel="sitemap" type="application/xml" href="<cms:link 'sitemap.php'/>">
<meta name="google-site-verification" content="XXXXXXX">


<!-- Font-Awesome Files -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Halant:wght@300;400;500;600;700&family=Sora:wght@100..800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<cms:show k_site_link/>assets/lib/bootstrap/css/bootstrap.<cms:if k_lang eq 'ar'>rtl.</cms:if>min.css">
<link rel="stylesheet" href="<cms:show k_site_link/>assets/lib/fontawesome/css/all.min.css">


<cms:minify 'css' into="assets/css/elyzee.plugins.min.css" is_async='1' rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
	/assets/lib/datetimepicker/jquery.datetimepicker.min.css
	/assets/lib/slick/slick.css
	/assets/lib/slick/slick-theme.css
	/assets/css/animate.css
	/assets/css/magnific-popup.css
	/assets/css/mousecursor.css
	/assets/lib/intlTelInput/intlTelInput.css
    /assets/lib/droopmenu/css/droopmenu.css
	/assets/lib/droopmenu/css/addons/droopmenu-scrollup.css
	/assets/lib/droopmenu/css/themes/transparent-overlay.css
</cms:minify>


<cms:minify "css" into="/assets/css/elyzee.web.min.css">assets/css/custom.css</cms:minify>

<cms:get_custom_field 'header_scripts' masterpage='globals.php' />

</head>

<body class="web-design dark <cms:if k_lang eq 'ar'>ar<cms:else/>en</cms:if>" dir="<cms:if k_lang eq 'ar'>rtl<cms:else/>ltr</cms:if>" data-bs-theme="dark">

<cms:get_custom_field 'body_scripts' masterpage='globals.php' />

<h1 class="position-absolute zero-size"><cms:show c_page_seo_title/></h1>
<p class="position-absolute zero-size"><cms:show c_page_seo_desc/></p>
<div class="position-absolute zero-size"><cms:show c_page_seo_keywords/></div>

	<div class="preloader">
		<div class="loading-container"><div class="loading"></div><div id="loading-icon"><img class="lazy" src="<cms:show k_site_link/>assets/images/loader.svg" alt="<cms:show orgname/>"></div></div>
	</div>

			
			<header>
				<nav class="topbar d-none d-md-block navbar fixed-top navbar-dark bg-black">
				<div class="container h-100">
				<div class="row h-100 w-100">
				<div class="col-12 d-flex align-items-center justify-content-end">
				<div class="contact_phone"><a href="tel:<cms:show primaryphone/>" title="<cms:get 'locale.phone'/>">&#x200E;<i class="fa fa-phone pe-2"></i> <cms:show primaryphone/>&#x200E;</a></div>
				
				
				
				<a href="#search_modal" data-bs-toggle="modal" data-bs-target="#search_modal" title="<cms:get 'locale.search'/>" class="mx-3 border-seperator"><i class="fa fa-search"></i></a>
				

				<cms:if hide_arabic eq '0'>
				<a href="<cms:if k_lang eq 'en'><cms:show k_link_ar /><cms:else/><cms:show k_link_en /></cms:if>" class="language border-seperator-end me-3" title="<cms:get 'locale.language'/>"><cms:get 'locale.language'/></a>
				</cms:if>
				
				<cms:trim "<cms:embed 'common/sociallinks.inc' />"/>
				
				</div>
				</div>
				</div>
				</nav>
				
				
				
				
				
				
			<nav class="droopmenu-navbar droopmenu-pinned">
	            <div class="droopmenu-inner container p-0">
	                <div class="droopmenu-header">
	                    <a href="<cms:show_with_lc k_site_link/>" title="<cms:show orgname/>" class="droopmenu-brand"><img class="lazy" src='<cms:show k_site_link/>assets/images/logo/elyzee.svg' data-src="<cms:show k_site_link/>assets/images/logo/elyzee.svg" alt="<cms:show orgname/>"></a>
	                    <a href="#" class="droopmenu-toggle" title="Menu"></a>                
	                </div><!-- droopmenu-header -->
	                <div class="droopmenu-nav">
	                    <ul class="droopmenu droopmenu-right">
	                        <li class="d-none d-md-block"><a href="<cms:show_with_lc k_site_link/>" title="<cms:show orgname/>"><i class="fa-solid fa-house"></i></a></li>
							<li class="d-md-none d-flex justify-content-between align-items-center px-2">
							<a href="<cms:show_with_lc k_site_link/>" class="px-3" title="<cms:show orgname/>"><i class="fa-solid fa-house"></i></a>
							<cms:if hide_arabic eq '0'>
							 | <a href="<cms:if k_lang eq 'en'><cms:show k_link_ar /><cms:else/><cms:show k_link_en /></cms:if>" class="language p-0" title="<cms:get 'locale.language'/>"><cms:get 'locale.language'/></a>
							</cms:if>
							 | <a href="#search_modal" class="px-3" data-toggle="modal" data-target="#search_modal" title="Search"><i class="fa-solid fa-search"></i></a>
							</li>
							
							 <li class="d-md-none"><a href="<cms:link 'about.php'/>" title="<cms:call 'get_page_title' tname='about.php'/>"><cms:call 'get_page_title' tname='about.php'/></a></li>
							 
	                        <li>
	                            <a href="<cms:link 'services.php'/>" title="<cms:call 'get_page_title' tname='services.php'/>"><cms:call 'get_page_title' tname='services.php'/></a>
								<cms:ignore>
	                            <ul class="droopmenu-grid droopmenu-grid-3">
									<cms:folders masterpage='services.php' depth='1' orderby='weight' order='asc' extended_info='1' include_custom_fields='1'>
                                    <li><a href="<cms:show_with_lc k_folder_link/>" class="text-dark" title='<cms:get "title_<cms:show k_lang/>"/>'><cms:get "title_<cms:show k_lang/>"/></a></li>
									</cms:folders>
	                             
	                                <li><a href="<cms:link 'services.php'/>" class="text-dark fw-bold">(<cms:get "locale.view_all"/>)</a></li>                                
	                            </ul>
								</cms:ignore>
	                        </li>                         
							<li><a href="<cms:link 'doctors.php'/>" title='<cms:get "locale.doctors"/>'><cms:get "locale.doctors"/></a></li>  
 	                        <li class="d-none d-md-block">
 	                            <a class="droopmenu-button" href="<cms:link 'book-appointment.php'/>" title='<cms:get "locale.book_appointment"/>'><span><cms:get "locale.book_appointment"/></span> </a>
 	                        </li> 
 	                        <li class="d-md-none">
 	                            <a href="<cms:link 'book-appointment.php'/>" title='<cms:get "locale.book_appointment"/>'><span><cms:get "locale.book_appointment"/></span> </a>
 	                        </li>
							<li class="d-md-none"><a href="<cms:link 'before-after.php'/>" title="<cms:call 'get_page_title' tname='before-after.php'/>"><cms:call 'get_page_title' tname='before-after.php'/></a></li>
							
							<li class="d-md-none"><a href="<cms:link 'insurance.php'/>" title="<cms:call 'get_page_title' tname='insurance.php'/>"><cms:call 'get_page_title' tname='insurance.php'/></a></li>
							<li class="d-md-none"><a href="<cms:link 'news-events.php'/>" title="<cms:call 'get_page_title' tname='news-events.php'/>"><cms:call 'get_page_title' tname='news-events.php'/></a></li>
							<li class="d-md-none"><a href="<cms:link 'insights.php'/>" title="<cms:call 'get_page_title' tname='insights.php'/>"><cms:call 'get_page_title' tname='insights.php'/></a></li>
							<li class="d-md-none"><a href="<cms:link 'testimonials.php'/>" title="<cms:call 'get_page_title' tname='testimonials.php'/>"><cms:call 'get_page_title' tname='testimonials.php'/></a></li>
							<li class="d-md-none"><a href="<cms:link 'careers.php'/>" title="<cms:call 'get_page_title' tname='careers.php'/>"><cms:call 'get_page_title' tname='careers.php'/></a></li>
							<li class="d-md-none"><a href="<cms:link 'pharmacy.php'/>" title="<cms:call 'get_page_title' tname='pharmacy.php'/>"><cms:call 'get_page_title' tname='pharmacy.php'/></a></li>
							<li class="d-md-none"><a href="<cms:link 'contact.php'/>" title="<cms:call 'get_page_title' tname='contact.php'/>"><cms:call 'get_page_title' tname='contact.php'/></a></li>
							
							
							
 	                        <li class="d-none d-md-block">
							   <a class="droopmenu-button" data-bs-toggle="offcanvas" data-bs-target="#elyzee-mega-sidebar" aria-controls="elyzee-mega-sidebar" href="javascript:void();">
							     <i class="fa-solid fa-bars"></i>
							   </a>
								
 	                        </li>   
							
							<li class="d-md-none"><a href="tel:<cms:show primaryphone/>" title="<cms:get 'locale.phone'/>">&#x200E;<i class="fa fa-phone pe-2"></i> <cms:show primaryphone/>&#x200E;</a></li> 
	                    </ul>
						
						
						
	                </div><!-- droopmenu-nav -->
	              
				</div><!-- droopmenu-inner -->
			</nav>
		</header>


		<div class="offcanvas offcanvas-end text-bg-dark bg-black" tabindex="-1" id="elyzee-mega-sidebar" aria-labelledby="elyzee-mega-sidebarLabel" role="navigation">
			<div class="offcanvas-header justify-content-end px-5 pt-5">
				<h5 class="offcanvas-title w-100 text-white" id="elyzee-mega-sidebarLabel"><cms:show orgname/></h5>
				<a href="javascript:void();" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark fa-2xl"></i></a>
			</div>
			<div class="offcanvas-body px-5">
				<div class="small"><cms:show orgdesc/></div>
				<div class="offcanvas-menu my-5"><cms:trim "<cms:embed 'common/footerlinks.inc'/>"/></div>
				<cms:trim "<cms:embed 'common/sociallinks.inc' />"/>
				<div class="copyright-text small mt-3">
                    <cms:get 'locale.copyright'/> &copy; <cms:date format='Y'/>&#x200E; <cms:show orgname/>
                </div>
			</div>
		</div>

	

	<!-- Header End -->
	
	
	
	
	<cms:trim "<cms:embed 'common/breadcrumbs.inc' />"/>