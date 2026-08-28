<a class="team-item wow fadeInUp bg-light position-relative mx-2 d-block" href="<cms:show_with_lc k_page_link/>">
<div class="team-image"><figure class="image-anime m-2"><img class="p-2 lazy" src='<cms:show px_img/>' data-src="<cms:if page_image><cms:show page_image/><cms:else/><cms:show k_site_link/>assets/images/doctor_placeholder.png</cms:if>" data-lazy="<cms:if page_image><cms:show page_image/><cms:else/><cms:show k_site_link/>assets/images/doctor_placeholder.png</cms:if>"  alt='<cms:get "title_<cms:show k_lang/>"/>'></figure></div>

<div class="team-body bg-white position-absolute bottom-0 pt-3 px-2">
	<div class="team-content pt-2 mt-2 text-dark">
		<div class="h5 d-block text-capitalize fw-bold"><cms:get "title_<cms:show k_lang/>"/></div>
		<div class="h6"><cms:get "designation_<cms:show k_lang/>"/></div>
		
		<cms:if primary_speciality>
		<cms:folders masterpage="services.php" depth='1' root=primary_speciality include_custom_fields='1'>
			<small class="pt-2 d-block text-accent-color"><cms:get "title_<cms:show k_lang/>"/></small>
		</cms:folders>
		</cms:if>

		<div class="readmore-btn position-absolute top-0 start-50 translate-middle"><img class="lazy" src="<cms:show px_img/>" data-src="<cms:show k_site_link/>assets/images/arrow-white.svg" alt="<cms:get 'locale.view_details'/>"></div>  
	</div>			                          
</div>
</a>