<cms:capture into='googlereviews' is_json='1'>
	<cms:php>		
		$url = "<cms:show k_site_link/>reviews.json";

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");

		$response = curl_exec($ch);
		curl_close($ch);

		echo $response;
	</cms:php>
</cms:capture>

	
<cms:capture into='googlereviews_content'>
	<cms:each googlereviews.result.reviews as='rev'>
	<cms:set has_googlereviews_content='1' 'global'/>
	<div class="testimonial-item wow fadeInUp px-2 pb-3">
		<cms:capture into='testimonial_author'>
		<div class="testimonial-author">
			<div class="author-image">
				<figure class="image-anime">
					<img class="lazy" src="<cms:show px_img/>" data-src="<cms:show rev.profile_photo_url/>" alt="<cms:show rev.author_name/>">
				</figure>
			</div>            
			<div class="author-content small">
                <h3><cms:show rev.author_name /></h3>
                <div class="hero-review-box m-0">
                    <ul class="m-0">
						
                        <li class="m-0"><cms:call 'star_rating' rating="<cms:show rev.rating />" /></li>
                        <li dir="ltr" class="ps-2">(<cms:show rev.relative_time_description />)</li>
                    </ul>
                </div>
               
            </div>
        </div>
		</cms:capture>
			
			
		<div class="testimonial-item-content small text-light">
			<cms:excerpt count='265' truncate_chars='1' trail="<a href='#' class='review-popup text-link'>&hellip; <cms:get 'locale.read_more'/></a>"><cms:show rev.text/></cms:excerpt>
			  
			<div class="full-review d-none" data-title="<cms:get 'locale.reviews'/>">
			<div class="review-content"><cms:show rev.text/></div>
			<div class="review-footer"><cms:show testimonial_author/></div>
			</div>
			  
		</div>
		<cms:show testimonial_author/>
			                           
	</div>
	</cms:each>
</cms:capture>

 
<section class="our-testimonials bg-black dark-section">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="our-testimonial-content">
					<div class="section-title mb-3">
						<cms:show_globals masterpage='testimonials.php'>
						<div class="wow fadeInUp text-light h1 mb-3"><i class="fa-solid fa-hand-holding-heart text-accent-color"></i> <cms:get "title_<cms:show k_lang/>"/></div>
						<h4 class="wow fadeInUp mb-3 text-light " data-wow-delay="0.2s"><cms:get "short_content_<cms:show k_lang/>"/></h4>
						<cms:do_shortcodes><cms:get "content_<cms:show k_lang/>"/></cms:do_shortcodes>
						</cms:show_globals>
							
							
						<div class="hero-review-box wow fadeInUp mt-0" data-wow-delay="0.6s">
							<ul class="d-inline" dir="ltr">
								<li><img class="lazy" src="<cms:show px_img/>" data-src="<cms:show k_site_link/>assets/images/icon-google.svg" alt="<cms:get 'locale.reviews'/>"></li>
								<cms:if has_googlereviews_content>
								<li dir="ltr" class="small"><cms:show googlereviews.result.rating/></li>
								<li><cms:call 'star_rating' rating="<cms:show googlereviews.result.rating />" /></li>
								<li class="small">(<a href="https://share.google/B9EFknpFmPBiHCNT9" target="_blank" title="View Google Profile" rel="nofollow noopener"><cms:show googlereviews.result.user_ratings_total/> <cms:get "locale.reviews"/></a>)</li>
								</cms:if>
								<li><a href="https://g.page/r/CQLRVyU4oE5UEAE/review" target="_blank" class="btn btn-sm btn-link small p-0 my-2" rel="nofollow noopener"><i class="fa-regular fa-pen-to-square"></i> <cms:get "locale.write_review"/></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<cms:if has_googlereviews_content><div class="col-lg-12 mt-3"><div class="testimonial-carousel mx-3"><cms:show googlereviews_content/></div></div></cms:if>
		</div>
	</div>
</section>