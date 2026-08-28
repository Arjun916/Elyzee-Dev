    <cms:pages masterpage='about.php'>
    <section class="how-it-work bg-section bg_asthetic_treatments">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    
                    <div class="how-work-content">
                       
                        <div class="section-title">
                            <h3 class="wow fadeInUp"><a href="tel:<cms:show primaryphone/>" class="text-dark me-2"><i class="fa-solid fa-phone"></i> <cms:show primaryphone/></a><cms:show orgname/></h3>
                            <h2><cms:get "how_heading_<cms:show k_lang/>"/></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s"><cms:get "how_short_desc_<cms:show k_lang/>"/></p>
							
                        </div>
                        
                        <div class="wow fadeInUp" data-wow-delay="0.4s">
							<cms:if (main_template_name eq 'book-appointment.php') || main_template_name eq 'contact.php'><a href="<cms:link 'about'/>" class="btn-default"><cms:get "locale.our_services"/></a>
							<cms:else/><a href="<cms:link 'book-appointment.php'/>" class="btn-default"><cms:get "locale.book_appointment"/></a></cms:if>
                            
                        </div>
                       
                    </div>
                    
                </div>

                <div class="col-lg-6">
                    
					
                    <div class="how-work-steps">
						<cms:show_repeatable 'how_bullet_sections' limit='4'>
                        <div class="how-work-step-item wow fadeInUp">
                            <div class="icon-box">
                                <i class="fa-solid fa-check-double fa-xl text-accent-color"></i>
                            </div>
                            <div class="how-work-step-content">
                                <h3>0<cms:show k_count/>. <cms:get "heading_<cms:show k_lang/>"/></h3>
                                <p><cms:get "short_desc_<cms:show k_lang/>"/></p>
                            </div>
                        </div>
						</cms:show_repeatable>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    </cms:pages>