
<cms:if k_is_page>
<cms:capture into="page_ba_content">
<cms:show_repeatable 'before_after'>
<cms:if ba_image>
<cms:set ba_alt ="<cms:get "title_<cms:show k_lang/>"/> - <cms:get 'locale.before_after_results'/> <cms:show k_count/>"/>
<cms:set has_page_ba = '1' 'global'/>

<div class="photo-gallery wow fadeInUp">
    <a href="<cms:show ba_image/>" data-type="image">
        <figure class="image-anime mx-1">
            <img class="lazy" src='<cms:show px_img/>' data-src="<cms:show ba_image/>" data-lazy="<cms:show ba_image/>" alt="<cms:show ba_alt/>">
        </figure>
    </a>
</div>

</cms:if>
</cms:show_repeatable>
</cms:capture>
	
<cms:if has_page_ba>
<section class="page-gallery bg_asthetic_treatments py-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-start mb-2 text-dark section-title">
				<h3><cms:get "title_<cms:show k_lang/>"/></h3>
				<div class="wow fadeInUp text-dark h2 mb-3"><i class="fa-solid fa-hand-holding-heart text-accent-color me-1"></i><cms:get 'locale.before_after_results'/></div>					
            </div>
		 </div>
         <div class="row justify-content-center services-slider gallery-items page-gallery-box">
			 <cms:show page_ba_content/>
 		</div>

    </div>
</section>
</cms:if>
	
</cms:if>