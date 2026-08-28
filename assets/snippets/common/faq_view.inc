<!-- F.A.Q Section -->
<cms:capture into='faq_output'>  
<cms:show_repeatable 'faq_sections' >
<cms:set faq_heading_temp = "faq_heading_<cms:show k_lang/>" />
<cms:set faq_heading_val="<cms:get faq_heading_temp />" />

<cms:set faq_content_temp = "faq_content_<cms:show k_lang/>" />
<cms:set faq_content_val="<cms:get faq_content_temp />" />

<cms:if faq_heading_val && faq_content_val >
<cms:set has_faq = '1' 'global' />

<div class="accordion-item wow fadeInUp <cms:if k_count le '1'>opened</cms:if>" data-wow-delay="0.4s">
    <h2 class="accordion-header" id="faq_heading<cms:show k_count/>">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq_collapse<cms:show k_count/>" aria-expanded="false" aria-controls="faq_collapse<cms:show k_count/>"><cms:show faq_heading_val /></button>
    </h2>
    <div id="faq_collapse<cms:show k_count/>" class="accordion-collapse collapse" aria-labelledby="faq_heading<cms:show k_count/>" data-bs-parent="#faq_accordion" role="region">
        <div class="accordion-body small"><cms:do_shortcodes><cms:show faq_content_val /></cms:do_shortcodes></div>
    </div>
</div>
</cms:if>

</cms:show_repeatable>
</cms:capture>


<cms:if has_faq >
<section class="page-service-single bg-dark py-5">
	<div class="container">
	    <div class="row">
	         <div class="col-lg-12">
				 <div class="page-single-faqs">
					 <div class="section-title wow fadeInUp h2 text-accent-color"><cms:get "faq_title_<cms:show k_lang/>"/></div>
					 <div class="accordion accordion-flush" id="faq_accordion"><cms:show faq_output/></div>
				 </div>
			 </div>
		 </div>
	 </div>
</section>
</cms:if>