<cms:trim "<cms:embed 'common/header.inc' />"/>


    <!-- What We Do section Start -->
    <div class="what-we-do pt-0 bg-black text-accent-color">
        <div class="container">
            <div class="row align-items-center">
                

                <div class="col-lg-6 mb-5 mt-0 mt-md-3">
                    <!-- What We Content Start -->
                    <div class="what-we-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp fw-bold"><i class="far fa-frown-open"></i> <cms:get "locale.oops"/>!</h3>
                            <h2 class="wow fadeInUp  text-accent-color" data-wow-delay="0.1s"><cms:if k_template_name eq '404.php'>404<cms:else/>503</cms:if>: <cms:get "locale.page_not_found"/></h2>
                            <p class="wow fadeInUp  text-accent-color" data-wow-delay="0.2s"><cms:if k_template_name eq '404.php'><cms:get "locale.page_not_exists"/><cms:else/><cms:get "locale.page_removed"/></cms:if></p>
                        </div>
                        <!-- Section Title End -->

                        

                        <!-- What We Button Start -->
                        <div class="what-we-btn wow fadeInUp mb-3 pb-3 " data-wow-delay="0.4s">
							<p class="lead ps-3 mb-3  text-accent-color"><i class="fas fa-spinner fa-spin text-white me-2"></i><cms:get "locale.redirecting_to_home_page"/> : <span id="countdown" class="text-white">12</span></strong> <cms:get "locale.seconds"/></p>
							
                            <a href="<cms:show_with_lc k_site_link/>"  target="self" class="btn-default btn-highlighted"><i class="fas fa-globe"></i> <cms:get "locale.go_back_to_home_page"/></a>
							
							
                        </div>
                        <!-- What We Button End -->
						
						
						<cms:trim "<cms:embed 'common/sociallinks.inc' />"/>
						

						<script type="text/javascript">
						var seconds = 12;
						function countdown() {
						seconds = seconds - 1;
						if (seconds < 0) {window.location = "<cms:show_with_lc k_site_link/>";
						} else {document.getElementById("countdown").innerHTML = seconds;window.setTimeout("countdown()", 500);}
						}
						countdown();
						</script>

                    </div>
                </div>

                <div class="col-lg-6">
                    <!-- What We Image Start -->
					<div class="journey-image-box">
	                            <!-- Journey Image Start -->
	                            <div class="journey-img">
	                                <figure class="image-anime reveal">
	                                    <img class="lazy" src="<cms:show px_img/>" data-src="<cms:show k_site_link/>assets/images/elyzee_front.webp" alt="<cms:show org_name/>">
	                                </figure>
	                            </div>
	                            <!-- Journey Image End -->

           
	                        </div>
							
                    
                    <!-- What We Image Start -->                   
                </div>
            </div>
        </div>
    </div>
    <!-- What We Do section End -->



<cms:trim "<cms:embed 'common/footer.inc' />"/>
