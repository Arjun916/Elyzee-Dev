<cms:pages masterpage="insurance.php">
<cms:capture into='insurance_affiliates'>
<cms:show_repeatable 'insurance_section'>
<cms:set has_insurance_affiliates='1' 'global' />
<div class="p-2 h-100">
<div class="rounded d-flex align-items-center justify-content-center h-100 bg-white overflow-hidden">
	<figure class="image-anime reveal" title='<cms:get "insurance_title_<cms:show k_lang/>"/>'>
	 <img src="<cms:show px_img/>" data-lazy="<cms:show insurance_image/>" class="mw-100 bg-white" alt='<cms:get "insurance_title_<cms:show k_lang/>"/>'>		
	</figure>
	
</div>
</div>
</cms:show_repeatable >
</cms:capture>

<cms:if has_insurance_affiliates>
<section class="bg-black py-5 bg-parallax lazy" data-src="<cms:show k_site_link/>/assets/images/blurred-bg.jpg">
	<div class="container">
		<div class="section-content my-3 text-center text-accent-color">
			<h4 class="text-center h1 d-block text-accent-color"><cms:get "title_<cms:show k_lang/>"/></h4>
			<p class="text-center"><cms:get "short_desc_<cms:show k_lang/>"/></p>
		</div>
		<div class="justify-content-center block-carousel" dir="<cms:if k_lang eq 'ar'>rtl<cms:else/>ltr</cms:if>">
			<cms:show insurance_affiliates />
		</div>
	</div>
</section>
</cms:if>
</cms:pages>