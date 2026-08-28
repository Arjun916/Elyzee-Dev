	<section class="page-gallery bg_asthetic_treatments pb-2">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-12 text-start mb-5 text-dark section-title">
					<cms:show_globals masterpage='before-after.php'>
					<h3><cms:get "title_<cms:show k_lang/>"/></h3>
					<div class="wow fadeInUp text-dark h1 mb-3"><i class="fa-solid fa-hand-holding-heart text-accent-color"></i> <cms:get "short_content_<cms:show k_lang/>"/></div>
					<cms:do_shortcodes><cms:get "content_<cms:show k_lang/>"/></cms:do_shortcodes>
					</cms:show_globals>
	            </div>
			 </div>
			 

	         <div class="row justify-content-center <cms:if main_template_name ne 'before-after.php'>services-slider</cms:if> gallery-items page-gallery-box">
				<cms:pages masterpage='before-after.php' orderby='weight' order='asc'>
                <div class="col-lg-4 col-6 <cms:if main_template_name ne 'before-after.php'>px-1</cms:if>">
                    <div class="photo-gallery wow fadeInUp">
                        <a href="<cms:show page_image/>">
                            <figure class="image-anime">
                                <img class="lazy" src='<cms:show px_img/>' data-src="<cms:show page_image/>" data-lazy="<cms:show page_image/>" alt="<cms:show k_template_title/>">
                            </figure>
                        </a>
                    </div>
                </div>
	 			</cms:pages>
				
	 		</div>

	    </div>
	</section>