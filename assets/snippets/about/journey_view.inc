    <cms:pages masterpage='about.php'>
    <section class="our-journey bg-black dark-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Our Journey Image Start -->
                    <div class="our-journey-image">
                       
                        <div class="journey-img">
                            <figure class="image-anime reveal">
                                <img class="lazy" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>assets/images/journey-img-1.jpg" alt="<cms:show orgname/>">
                            </figure>
                        </div>
                       

                        
                        <div class="journey-img">
                            <figure class="image-anime reveal">
                                <img class="lazy" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>assets/images/journey-img-2.jpg" alt="<cms:show orgname/>">
                            </figure>
                        </div>
                        

                       
                        <div class="journey-image-box">
                            
                            <div class="journey-img">
                                <figure class="image-anime reveal">
                                    <img class="lazy" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>assets/images/journey-img-3.jpg" alt="<cms:show orgname/>">
                                </figure>
                            </div>
                            

                           
                        </div>
                    </div>
                    
                </div>

                <div class="col-lg-6">
                  
                    <div class="our-journey-content">
                      
                        <div class="section-title">
                            <h3 class="wow fadeInUp"><cms:get "timeline_title_<cms:show k_lang/>"/></h3>
                            <h2 class="wow fadeInUp" data-wow-delay="0.2s"><cms:get "timeline_heading_<cms:show k_lang/>"/></h2>
							<p><cms:get "timeline_short_desc_<cms:show k_lang/>"/></p>
                        </div>
                        
						
                        <div class="our-journey-list wow fadeInUp" data-wow-delay="0.4s">
                            <cms:get "timeline_bullet_desc_<cms:show k_lang/>"/>
                        </div>
                       

                        
                        <div class="our-journey-body wow fadeInUp" data-wow-delay="0.6s">
							
							<cms:show_repeatable 'timeline_short_headings_sections' limit='4'>
	                           
	                            <div class="journey-item">
	                                <div class="icon-box">
	                                    <img class="lazy" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>assets/images/icon-journey-<cms:zebra '1' '2' />.svg" alt="icon">
	                                </div>
	                                <div class="journey-item-content">
	                                    <h3><cms:get "timeline_short_heading_<cms:show k_lang/>"/></h3>
	                                </div>
	                            </div>
								
								
								
							</cms:show_repeatable>
                           
                        </div>
                        <!-- Our Journey Body End -->

                        <!-- Our Journey Button Start -->
                        <div class="our-journey-btn wow fadeInUp" data-wow-delay="0.8s">
                            <a href="<cms:link 'book-appointment.php'/>" class="btn-default btn-highlighted"><cms:get "locale.book_appointment"/></a>
                        </div>
                        <!-- Our Journey Button End -->
                    </div>
                    <!-- Our Journey Content End -->
                </div>
            </div>
			
			
            
				<cms:capture into="message_executive_team_content">
				<cms:pages masterpage='executive-team.php' orderby='weight' order='asc' show_unpublished='1' custom_field="part_of==leadership">
                  	<cms:capture into="executive_tmp_message"><cms:get "message_<cms:show k_lang/>"/></cms:capture>
					<cms:if executive_tmp_message>
					<cms:set has_executive_tmp_message='1' 'global'/>
	                <div class="col-lg-12 mb-3">
	                   
	                    <div class="our-testimonial-content bg-dark px-3 py-5 px-sm-5 rounded h-100 position-relative"> 
						
							<div class="pe-3 pt-3 position-absolute top-0 end-0"><i class="fas fa-quote-<cms:if k_lang eq 'ar'>left<cms:else/>right</cms:if> display-1 text-accent-color"></i></div>
						
							<div class="testimonial-author mb-3 pb-3">
								<div class="author-image">
									<figure class="image-anime">
										<img class="lazy" src='<cms:show px_img/>' data-src="<cms:show page_image/>" alt='<cms:get "title_<cms:show k_lang/>"/>'>
									</figure>
								</div>            
								<div class="author-content">
									<h2 class="text-accent-color"><cms:get "title_<cms:show k_lang/>"/></h2>
									<p class="lead text-light"><cms:get "designation_<cms:show k_lang/>"/></p>
								</div>
							</div>																		
	                      	
	                        <div class="section-content m-0 pt-2 wow fadeInUp text-accent-color" data-wow-delay="0.2s"><cms:show executive_tmp_message/></div>
                       
	                    </div>
	                    
	                </div>
					</cms:if>
				</cms:pages>
				</cms:capture>
				
				<cms:if has_executive_tmp_message><div class="row mt-5 pt-5"><cms:show message_executive_team_content/></div></cms:if>
        </div>
    </section>
    </cms:pages>