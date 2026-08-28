<cms:capture into='top_slider_contents'>
<cms:pages masterpage=k_template_name>
<cms:show_mosaic 'home_contents'>
<cms:if k_tile_name='slider_content' >
<cms:set has_silder_contents=k_count 'global' />
		<cms:capture into="c_slider_img"><cms:get "slider_image_<cms:show k_lang/>"/></cms:capture>
		<div class="hero-slide d-flex align-items-end bg-black">
			<div class="hero-slider-image bg-black">
				<img class="bg-black lazy" src='<cms:show px_img/>' data-src='<cms:get "slider_image_<cms:show k_lang/>"/>' alt='<cms:get "title_prefix_<cms:show k_lang/>"/>'>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="hero-content">
							<div class="section-title">
								<h3 class="wow fadeInUp"><cms:get "title_prefix_<cms:show k_lang/>"/></h3>
								<h2 class="wow fadeInUp" data-wow-delay="0.1s"><cms:get "title_main_<cms:show k_lang/>"/></h2>
								<p class="wow fadeInUp d-none d-md-block" data-wow-delay="0.2s"><cms:get "sub_title_<cms:show k_lang/>"/></p>
							</div>

							<div class="hero-body wow fadeInUp" data-wow-delay="0.4s">
								
								<cms:set btitle_temp="main_button_title_<cms:show k_lang />" />
								<cms:set btitle="<cms:get btitle_temp />" />
								<cms:set burl_temp="main_button_link_url_<cms:show k_lang />" />
								<cms:set burl="<cms:get burl_temp />" />
								<cms:if btitle && burl>
								<div class="hero-btn">
									<a href="<cms:show burl/>" class="btn-default btn-highlighted" title="<cms:show btitle/>"><cms:show btitle/></a>
								</div>
								</cms:if>
	
	
								<cms:set vtitle_temp="video_button_title_<cms:show k_lang />" />
								<cms:set vtitle="<cms:get vtitle_temp />" />
								<cms:set vurl_temp="video_link_<cms:show k_lang />" />
								<cms:set vurl="<cms:get vurl_temp />" />
								<cms:if vtitle && vurl>
								<div class="video-play-button">
									<p><cms:show vtitle/></p>
									<a href="<cms:show vurl />" class="popup-video" title="<cms:show vtitle/>"><i class="fa-solid fa-play"></i></a>
								</div>
								</cms:if>
								
							</div>
							
						</div>
					</div>

			</div>
		</div>
	</div>
</cms:if>
</cms:show_mosaic>
</cms:pages>
</cms:capture>



<section class="hero hero-bg-image hero-slider-layout bg-section dark-section bg-black">
	
		<div class="hero-slider bg-black">
			<cms:if has_silder_contents><cms:show top_slider_contents/>
			<cms:else/>
				<div class="hero-slide d-flex align-items-end bg-black" aria-hidden="false"><div class="hero-slider-image"><img class="bg-black lazy" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>assets/images/slider/1.jpg" alt="<cms:show orgname/>"></div>

					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<div class="hero-content">
									<div class="section-title">
										<h3 class="wow fadeInUp"><cms:show orgname/></h3>
										<h2 class="wow fadeInUp" data-wow-delay="0.1s">Boutique Plastic Surgery and Aesthetic Hospital in the UAE</h2>
										<p class="wow fadeInUp d-none d-md-block" data-wow-delay="0.2s"><cms:show orgdesc/></p>
									</div>
		  
									<div class="hero-body wow fadeInUp" data-wow-delay="0.4s">
										<div class="hero-btn"><a href="<cms:link 'services.php'/>" class="btn-default btn-highlighted">Our Services</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</cms:if>
		</div>
		
	
</section>