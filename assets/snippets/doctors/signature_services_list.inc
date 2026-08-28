<cms:if k_template_name eq 'doctors.php'>
<cms:capture into="signature_services_list">
	<cms:related_pages 'services' orderby='weight' order='asc'>
		<a href="<cms:show_with_lc k_page_link/>" class="btn btn-primary <cms:zebra '' 'bg-accent-dark'/> btn-sm text-nowrap m-1 p-1 text-small small" title='<cms:get "title_<cms:show k_lang/>"/>'><cms:get "title_<cms:show k_lang/>"/></a>
	<cms:set has_signature_services = '1' 'global'/>
	</cms:related_pages>
</cms:capture>

<cms:if has_signature_services || intro_video>
<section class="page-team-single bg-black py-5 bg_asthetic_treatments">
    <div class="container">
        <div class="row justify-content-center">
			<h4 class="d-none zero-size"><cms:get "locale.signature_skills"/></h4>
			<cms:if has_signature_services>
            <div class="<cms:if intro_video>col-lg-6<cms:else/>col-lg-12</cms:if>">
				<div class="section-title mb-3 text-accent-color text-center <cms:if intro_video>text-lg-start</cms:if>">
					<h3 class="m-0"><small><cms:get "title_<cms:show k_lang/>"/></small></h3>
					<div class="h2"><cms:get "locale.signature_skills"/></div>
				</div>						
				
				<div class="section-content text-center <cms:if intro_video>text-lg-start</cms:if>"><cms:show signature_services_list/></div>
				
			</div>			
			</cms:if>
                           
            
			<cms:if intro_video>
			<div class="<cms:if has_signature_services>col-lg-6<cms:else/>col-lg-8</cms:if> mt-5 mt-lg-0">	
				<div class="intro-video-box h-100">
					<div class="w-100 h-100">
						<figure class="image-anime reveal rounded h-100 d-flex align-items-center bg-light rounded lazy" data-src="<cms:show k_site_link/>assets/images/blurred-bg.jpg">
							<img class="w-100 lazy" src="<cms:show px_img/>" data-src="<cms:youtube_thumbnail data=intro_video default=placeholder/>" alt='<cms:get "title_<cms:show k_lang/>"/>'>
						</figure>
					</div>
						
					<div class="video-play-button"><a href="<cms:youtube_url data=intro_video />" class="popup-video" title='<cms:get "locale.play_video"/>'><i class="fa-solid fa-play"></i></a></div>
				</div>				
			</div>
			</cms:if>
                   
        </div>
    </div>
</section>
</cms:if>
</cms:if>