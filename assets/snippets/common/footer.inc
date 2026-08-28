<cms:trim "<cms:embed 'testimonials/fetch_google_reviews.inc' />"/>
<footer class="main-footer bg-section dark-section">
	<div class="container">
		<div class="row">
			<div class="about-footer col-lg-5 col-md-12">
				<div class="footer-logo"><a href="<cms:show_with_lc k_site_link/>" title="<cms:show orgname/>"><img class="lazy" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>assets/images/logo/elyzee.svg" alt="<cms:show orgname/>"></a></div>
				<div class="about-footer-content">
					<p class="text-accent-color"><cms:show orgdesc/></p>
					<cms:if org_moh_id><p class="small mt-2 text-light"><cms:show org_moh_id/></p></cms:if>
				
					<cms:capture into='footer_logos'><cms:pages masterpage='globals.php'><cms:show_repeatable 'footer_logos'>
					<cms:if footer_logo><cms:set has_footer_logos="1" 'global'/><img class="lazy" src='<cms:show px_img/>' data-src="<cms:show footer_logo/>" alt="<cms:get 'locale.accreditations'/>"></cms:if>
					</cms:show_repeatable></cms:pages></cms:capture>
					<cms:if has_footer_logos><div class="d-block footer_logos mt-2"><cms:show footer_logos/></div></cms:if>
				
				</div>
			</div>
           
			<div class="footer-contact-box col-lg-4 col-md-6 col-sm-6">
				<div class="footer-contact-item">
					<a href="<cms:link 'contact.php'/>" class="h3 text-accent-color d-block mb-3"><cms:get 'locale.contact_us'/></a>
					<ul class="mb-3">
						<li><i class="fa-solid fa-phone"></i><a href="tel:<cms:show primaryphone/>">&#x200E;<cms:show primaryphone/>&#x200E;</a></li>
						<cms:if orgaddress><li class="d-flex justify-content-start"><i class="fa-solid fa-location-dot mt-2"></i><cms:if orgmaplink><a href="<cms:show orgmaplink/>" target="_blank" rel="nofollow noopener" title="<cms:get 'locale.get_directions'/>"></cms:if><cms:show orgaddress/><cms:if orgmaplink></a></cms:if></li></cms:if>
					</ul>
					<cms:trim "<cms:embed 'common/sociallinks.inc' />"/>
				</div>
			</div>
		
			<div class="footer-links-box col-lg-3 col-md-6 col-sm-6 two-column">
				<cms:trim "<cms:embed 'common/footerlinks.inc'/>"/>
			</div>
		

	        <div class="col-lg-12">
				<div class="footer-copyright">
					<div class="footer-copyright-text footer-copyright-text small text-light text-center text-md-start">
	                    <cms:get 'locale.copyright'/> &copy; <cms:date format='Y'/>&#x200E; <cms:show orgname/>.<span class="ps-md-1 d-block d-md-inline"><cms:get 'locale.all_rights_reserved'/></span>
	                </div>
	                <div class="footer-privacy-policy">
						<ul>
							<li><a href="<cms:link 'privacy-policy.php'/>" title='<cms:get "locale.privacy_policy"/>' class="small"><cms:get "locale.privacy_policy"/></a></li><li><a class="small" title="Sitemap" href="<cms:link 'sitemap.php'/>"><i class="fa-solid fa-sitemap"></i></a></li>
	                    </ul>
					</div>
				</div>
	        </div>
		</div>
	</div>
</footer>

<cms:trim "<cms:embed 'common/modals.inc'/>"/>



<cms:minify 'js' as="assets/js/elyzee.jquery.plugins.min.js">
assets/js/jquery-3.7.1.min.js
assets/lib/datetimepicker/jquery.datetimepicker.full.min.js
assets/js/jquery.magnific-popup.min.js
assets/lib/jquery.lazy/jquery.lazy.min.js
</cms:minify>

<cms:minify 'js' as="assets/js/elyzee.bootstrap.plugins.min.js">
assets/lib/bootstrap/js/popper.min.js
assets/lib/bootstrap/js/bootstrap.min.js
</cms:minify>

<cms:minify 'js' as="assets/js/elyzee.all.plugins.min.js">
assets/lib/slick/slick.min.js
assets/js/gsap.min.js
assets/js/magiccursor.js
assets/js/wow.min.js
assets/lib/intlTelInput/intlTelInput.min.js
assets/lib/droopmenu/js/droopmenu.js
</cms:minify>



<cms:minify 'js' as="assets/js/elyzee.<cms:if k_lang eq 'ar'>ar<cms:else/>en</cms:if>.web.min.js">
assets/js/function.js

/*CODE*/
$(function($) {
	
	$(".lazy").Lazy();
	
	$('.droopmenu-navbar').droopmenu({
		dmFixed:true,
		dmArrow:true,
		dmArrowDirection:'dmarrowup',
		dmAnimationEffect:'dmslidedown'	
	});
			
	var droopmenu_didScroll;
	var droopmenu_scrollContainer = $('.droopmenu-pinned');
	var droopmenu_scrollContainerHeight = droopmenu_scrollContainer.outerHeight();
	var droopmenu_lastScrollTop = 0;
	var droopmenu_delta = 5;

	$(window).scroll(function(event){
		droopmenu_didScroll = true;
	});

	setInterval(function() {
		if (droopmenu_didScroll) {
			droomenu_hasScrolled();
			droopmenu_didScroll = false;
		}
	}, 250);

	function droomenu_hasScrolled() {
		var droopmenu_scrollTop = $(this).scrollTop();
		if(Math.abs(droopmenu_lastScrollTop - droopmenu_scrollTop) <= droopmenu_delta){
			
			return;
		}
		
		if (droopmenu_scrollTop > droopmenu_lastScrollTop && droopmenu_scrollTop > droopmenu_scrollContainerHeight){
			droopmenu_scrollContainer.addClass('droopmenu-unpinned').removeClass('droopmenu-scrollup');
			droopmenu_scrollContainer.removeClass('scrolled');
		} else {
			if(droopmenu_scrollTop + $(window).height() < $(document).height()) {
				droopmenu_scrollContainer.removeClass('droopmenu-unpinned').addClass('droopmenu-scrollup');
				
			}
		}
		
		if(Math.abs(droopmenu_scrollTop)<= 175){	
			droopmenu_scrollContainer.removeClass('droopmenu-scrolled');		
			$('nav.topbar').addClass('d-md-block');
		} else {
			droopmenu_scrollContainer.addClass('droopmenu-scrolled');
			$('nav.topbar').removeClass('d-md-block');
		}
		droopmenu_lastScrollTop = droopmenu_scrollTop;
	}
	
	
	if ($('.lazymap').length) {
		$('.lazymap').each(function () {
			var mapContainer = $(this);
			var gmap_url = mapContainer.data('gmap');
			var observer = new IntersectionObserver(function(entries) {
				if (entries[0].isIntersecting) {
					mapContainer.html(
					'<iframe src="' + gmap_url + '" ' +
					'class="iframe-wh-100" ' +
					'allowfullscreen ' +
					'loading="lazy" ' +
					'referrerpolicy="no-referrer-when-downgrade">' +
					'</iframe>'
					);
					observer.disconnect();
				}
			});
			observer.observe(this);
		});
	}
	
	
	
	  
	  if ($('#user_contact').length) {
	  const user_contact_input = document.querySelector("#user_contact");
	  window.intlTelInput(user_contact_input, {
		loadUtils: () => import("<cms:show k_site_link/>assets/lib/intlTelInput/utils.min.js"),
		separateDialCode: true,
		strictMode: true,
		hiddenInput: (telInputName) => ({
			phone: "f_user_phone"
		}),
		initialCountry: "AE",
		countryNameLocale: "<cms:if k_lang eq 'ar'>ar<cms:else/>en</cms:if>"
	  });
	  }
});
		
/*CODE*/
</cms:minify>

<script>var ehw_ph_payload={ehw_ph_tpl:"<cms:show k_template_name />",ehw_ph_pid:<cms:if k_page_id><cms:show k_page_id /><cms:else/><cms:show k_template_id/></cms:if>,ehw_ph_pname:"<cms:show k_page_name />",ehw_ph_type:"<cms:if k_is_page>page<cms:else_if k_is_list />list<cms:else/>template</cms:if>",ehw_ph_token:"<cms:show k_site_link />"},ehw_ph_url="/assets/connect.php?s=hits",body=JSON.stringify(ehw_ph_payload);navigator.sendBeacon?navigator.sendBeacon(ehw_ph_url,new Blob([body],{type:"application/json"})):fetch(ehw_ph_url,{method:"POST",headers:{"Content-Type":"application/json"},body:body,keepalive:true});</script>

<cms:get_custom_field 'footer_scripts' masterpage='globals.php' />


<cms:if k_logged_in>
<cms:php>
@file_get_contents("<cms:show k_site_link/>assets/ping-sitemap.php");

@touch($_SERVER['DOCUMENT_ROOT'].'/sitemap.xml');
@touch($_SERVER['DOCUMENT_ROOT'].'/en/sitemap/');
@touch($_SERVER['DOCUMENT_ROOT'].'/ar/sitemap/');
</cms:php>
</cms:if>


</body>
</html>

<cms:tiny_minify_page collapse_whitespace='1' disable_comments='1' />
