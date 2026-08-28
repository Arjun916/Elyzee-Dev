	<cms:pages masterpage='about.php'>
    <div class="our-approach bg-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                  
                    <div class="our-approach-content">
                       
                        <div class="section-title">
                            <h3 class="wow fadeInUp"><cms:show orgname/></h3>
                            <h2 class="wow fadeInUp" data-wow-delay="0.1s"><cms:get "approach_block_title_<cms:show k_lang/>"/></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s"><cms:get "approach_block_short_desc_<cms:show k_lang/>"/></p>
                        </div>
                       

                       
                        <div class="our-approach-body wow fadeInUp" data-wow-delay="0.4s">
                           
						   <cms:show_repeatable 'approach_sections' limit='3'>							   
                               <div class="mission-vison-item">
                                   <div class="icon-box">
                                       <i class="fa-solid fa-check-double fa-xl text-accent-color"></i>
                                   </div>
                                   <div class="mission-vison-content">
                                       <h3><cms:get "approach_section_heading_<cms:show k_lang/>"/></h3>
                                       <p class="small m-0"><cms:get "approach_section_content_<cms:show k_lang/>"/></p>
                                   </div>
                               </div>						     
						   </cms:show_repeatable>

                        </div>
                       
                    </div>
                   
                </div>
                <div class="col-lg-6  d-none d-lg-block">
                   
                    <div class="approach-image">
                        <div class="approach-img-1">
                            <figure class="image-anime reveal">
                                <img class="lazy" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>assets/images/approach-image-1.jpg" alt="<cms:show orgname/>">
                            </figure>
                        </div>

                        <div class="approach-img-2">
                            <figure class="image-anime">
                                <img class="lazy" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>assets/images/approach-image-2.jpg" alt="<cms:show orgname/>">
                            </figure>
                        </div>

                      
                        <div class="approach-support-box">
                            <div class="icon-box">
                                <img class="lazy" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>assets/images/icon-phone.svg" alt="<cms:show orgname/>">
                            </div>
                            <div class="approach-support-box-content">
                                <h3><cms:get "locale.book_appointment"/></h3>
                                <p><a href="tel:<cms:show primaryphone/>"><cms:show primaryphone/></a></p>
                            </div>
                        </div>
                       
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
   </cms:pages>