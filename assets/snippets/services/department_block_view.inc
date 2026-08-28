<section class="our-services bg-section">
    <div class="container">
        <div class="row section-row align-items-center">
            <div class="col-lg-12">
               
                <div class="section-title section-title-center">
					<cms:show_globals masterpage='services.php'>
					<h3 class="wow fadeInUp " data-wow-delay="0.1s"><cms:get "title_<cms:show k_lang/>"/></h3>
					<h2 class="wow fadeInUp " data-wow-delay="0.2s"><cms:get "short_content_<cms:show k_lang/>"/></h2>
					</cms:show_globals>					
					
                </div>
               
            </div>
        </div>
        
        <div class="row justify-content-center <cms:if main_template_name ne 'index.php'>services-slider</cms:if>">
			<cms:folders masterpage='services.php' depth='1' orderby='weight' order='asc' extended_info='1' include_custom_fields='1'>
			<cms:if k_folder_pagecount || k_folder_immediate_children>
            <div class="col-6 col-lg-3 col-xs-6 col-sm-6 mh-100 p-1 p-sm-2 h-100">
                <a href="<cms:link 'services.php'/>#<cms:show k_folder_name/>" class="service-item wow fadeInUp bg-black d-flex d-block align-items-start flex-column w-100" title='<cms:show orgname/> - <cms:get "title_<cms:show k_lang/>"/>'>
                    <div class="service-content mb-auto h5 text-uppercase text-white text-center w-100"><cms:get "title_<cms:show k_lang/>"/></div>
                    <div class="service-image">
                            <figure class="image-anime">
                                <img src='<cms:show px_img/>' class="lazy" data-src="<cms:show page_image/>" data-lazy="<cms:show page_image/>" alt='<cms:show orgname/> - <cms:get "title_<cms:show k_lang/>"/>'>
                            </figure>
                                         
                    </div>
                </a>
             </div>
			</cms:if>
			</cms:folders>
		</div>                
	   <div class="row justify-content-center">
            <div class="col-lg-12">
                
                <div class="section-footer-text wow fadeInUp" data-wow-delay="1.2s">
                    <p><span><cms:show orgname/></span><a href="<cms:link 'book-appointment.php'/>" class="m-0 p-0 me-2"><cms:get "locale.book_appointment"/></a> <a href="tel:<cms:show primaryphone/>"><i class="fa-solid fa-phone"></i> <cms:show primaryphone/></a></p>
                </div>
               
            </div>
        </div>
    </div>
</section>