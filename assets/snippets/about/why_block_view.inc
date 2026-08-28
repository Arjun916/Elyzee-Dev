    <cms:pages masterpage='about.php'>
    <section class="what-we-do bg_asthetic_treatments">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 d-none d-md-block">
                    <!-- What We Image Start -->
                    <div class="what-we-image-1">
                        <img class="lazy" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>assets/images/what-we-image.jpg" alt="<cms:show orgname/>">
                    </div>
                    <!-- What We Image End -->
                </div>

                <div class="col-md-8 col-xl-4">
                    <!-- What We Content Start -->
                    <div class="what-we-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp"><cms:get "why_title_<cms:show k_lang/>"/></h3>
                            <h2 class="wow fadeInUp" data-wow-delay="0.1s"><cms:get "why_heading_<cms:show k_lang/>"/></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s"><cms:get "why_short_desc_<cms:show k_lang/>"/></p>
                        </div>
                        <!-- Section Title End -->

                        <!-- About Experience List Start -->
                        <div class="about-experience-list wow fadeInUp" data-wow-delay="0.4s">
                            <cms:get "why_bullet_desc_<cms:show k_lang/>"/>
                        </div>
                        <!-- About Experience List End -->

                        <!-- What We Button Start -->
                        <div class="what-we-btn wow fadeInUp" data-wow-delay="0.6s">
                            <a href="<cms:link 'services.php'/>" class="btn-default"><cms:get "locale.our_services"/></a>
                        </div>
                        <!-- What We Button End -->
                    </div>
                </div>

                <div class="col-xl-4 d-none d-xl-block">
                    <!-- What We Image Start -->
                    <div class="what-we-image-2">
                        <figure class="image-anime">
                            <img class="lazy" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>assets/images/what-we-image-derma.jpg" alt="<cms:show orgname/>">
                        </figure>

                        <!-- Experirnce Box Start -->
                        <div class="experirnce-box">
                            <h2><span class="counter"><cms:sub "<cms:date format='Y'/>" org_foundingyear/></span>+</h2>
                            <p><cms:get "locale.years_exp"/></p>
                        </div>
                        <!-- Experirnce Box End -->
                    </div>
                    <!-- What We Image Start -->                   
                </div>
            </div>
        </div>
    </section>
   </cms:pages>