<section class="page-single-post py-5">
	<div class="container post-content">
		<div class="post-entry border-0 m-0 row mw-100">
			
			<cms:if k_template_name eq 'doctors.php'>
            <div class="section-title text-accent-color">
				<div class="h1 d-block text-accent-color"><i class="fa-solid fa-user-doctor"></i> <cms:get "locale.doctor_profile"/></div>
				<p class="lead fw-bold mb-0 mt-3"><cms:get "title_<cms:show k_lang/>"/></p>
				
				<cms:set detailed_designation_temp = "detailed_designation_<cms:show k_lang />"/>
				<cms:set detailed_designation_val = "<cms:get detailed_designation_temp />"/>
				
				<p class=" mb-0 mt-1"><strong><cms:if detailed_designation_val><cms:show detailed_designation_val/><cms:else/><cms:get "designation_<cms:show k_lang/>"/></cms:if></strong></p>
				
				
				<cms:if license_number><p class=" mb-0 mt-1 small"><cms:get "locale.license_no"/>: <strong><cms:show license_number/></strong></p></cms:if>
				
				
				<a href="#book_appointment" class="btn-default mt-3 text-white" title='<cms:get "locale.book_appointment"/>'><i class="fa-solid fa-calendar"></i> <cms:get "locale.book_appointment"/></a>
				
			</div>
			</cms:if>
			
			
			<div class="col-lg-12 mb-3"><cms:do_shortcodes><cms:get "content_<cms:show k_lang />" /></cms:do_shortcodes></div>
			
			<cms:set desc_image_alignment_pos = "first" 'global'/>			
			<cms:show_mosaic 'desc_contents'>
			<cms:if k_tile_name='desc_sections' >
			
			<cms:if (desc_media_type eq 'embed_video') && "<cms:not_empty desc_media_embed />" ><cms:set has_embed_media = '1' 'global'/>
			<cms:else_if "<cms:not_empty desc_image />" || "<cms:not_empty desc_video />" /><cms:set has_desc_media = '1' 'global'/></cms:if>
			
			<cms:set desc_heading_val="<cms:get "desc_heading_<cms:show k_lang/>"/>"/>
			<cms:if "<cms:not_empty desc_heading_val />" ><h4 class="col-12 text-accent-color"><cms:show desc_heading_val/></h4>
			<cms:else/><p>&nbsp;</p></cms:if>
			
			<div class="row mb-3">
			<div class="<cms:if has_embed_media || has_desc_media>col-lg-7<cms:else/>col-12</cms:if> order-first  order-lg-<cms:show desc_image_alignment_pos/>">
				<cms:get "desc_content_<cms:show k_lang/>"/>
			</div>
			
			
			<cms:if has_embed_media || has_desc_media>
			<cms:if desc_image_alignment_pos eq 'last'><cms:set desc_image_alignment_pos = "first" 'global'/><cms:else/><cms:set desc_image_alignment_pos = "last" 'global'/></cms:if>
			<div class="col-lg-5 mt-3 mt-lg-0 order-last order-lg-<cms:show desc_image_alignment_pos/> <cms:if has_embed_media>d-flex justify-content-center</cms:if>">
				<cms:if has_embed_media><cms:show desc_media_embed/>
				<cms:else/>
				<div class="<cms:if desc_video>intro-video-box</cms:if> h-100">
					<div class="post-image h-100">
					<figure class="image-anime reveal rounded h-100">
						<img class="h-100 img-top-center lazy" src='<cms:show px_img/>' data-src="<cms:if desc_image><cms:show desc_image/><cms:else/><cms:youtube_thumbnail data=desc_video default=placeholder/></cms:if>" alt="<cms:if desc_heading_val><cms:show desc_heading_val/><cms:else/><cms:get "title_<cms:show k_lang/>"/></cms:if>">
					</figure>
					</div>
					<cms:if desc_video>
					<div class="video-play-button"><a href="<cms:youtube_url data=desc_video />" class="popup-video" title='<cms:get "locale.play_video"/>'><i class="fa-solid fa-play"></i></a></div>
					</cms:if>
				</div>
				</cms:if>
			</div>
			</cms:if>
			</div>
			<cms:set has_embed_media = '0' 'global'/>
			<cms:set has_desc_media = '0' 'global'/>
			
			</cms:if>
			</cms:show_mosaic>	
		</div>
	</div>
    </section>
	
	<cms:trim "<cms:embed 'common/faq_view.inc'/>"/>
	
	
	<cms:set footnote_temp = "footnote_<cms:show k_lang/>" />
	<cms:set footnote_val="<cms:get footnote_temp />" />
	<cms:if footnote_val>
	<section class="bg-section py-5">
		<div class="container" data-aos="fade-up">
			<div class="row">
			<h6 class="d-none zero-size"><cms:show orgname/></h6>
			<div class="col-12 wow fadeInUp service-entry m-0" data-wow-delay="0.4s"><cms:do_shortcodes><cms:show footnote_val/></cms:do_shortcodes></div>
			</div>
		</div>
	</section>
	</cms:if>