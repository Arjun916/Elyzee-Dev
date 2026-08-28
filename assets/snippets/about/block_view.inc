   <cms:pages masterpage='about.php'>
    <section class="about-us bg-black <cms:if main_template_name eq 'about.php'>pt-3</cms:if>">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="about-us-images">
                        <div class="about-img-1">
                            <figure class="image-anime reveal">
                                <img class="lazy" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>assets/images/about/about-img-1.jpg" alt='<cms:show orgname/>'>
                            </figure>
                        </div>

                        <div class="about-img-2">
                            <figure class="image-anime reveal">
                                <img class="lazy" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>assets/images/about/about-img-2.jpg" alt='<cms:show orgname/>'>
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-us-content">
                        <div class="section-title">
                            <h3 class="wow fadeInUp"><cms:get "title_<cms:show k_lang/>"/></h3>
                            <h2 class="wow fadeInUp text-light" data-wow-delay="0.1s"><cms:get "heading_<cms:show k_lang/>"/></h2>
                            <p class="wow fadeInUp  text-light" data-wow-delay="0.2s"><cms:get "short_desc_<cms:show k_lang/>"/></p>
                        </div>

                        <div class="about-experience-box">                           
                            <div class="about-experience-list wow fadeInUp  text-light" data-wow-delay="0.4s">
                                <cms:get "bullet_desc_<cms:show k_lang/>"/>
                            </div>

                            <div class="about-experience-image">
                                <figure class="image-anime reveal">
                                    <img class="lazy" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>assets/images/about/about-experience-image.jpg" alt='<cms:show orgname/>'>
                                </figure>
                            </div>
                        </div>

                        <div class="about-us-body wow fadeInUp" data-wow-delay="0.6s">
                            <div class="about-contact-box">
                                <div class="icon-box">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="about-contact-box-content">
                                    <p><a href="<cms:link 'book-appointment.php'/>" class="btn btn-link m-0 p-0 text-dark"><cms:get "locale.book_appointment"/></a></p>
                                    <h3 class="fw-bold"><a href="tel:<cms:show primaryphone/>"><cms:show primaryphone/></a></h3>
                                </div>
                            </div>

                            <div class="about-us-btn">
								<cms:if main_template_name ne 'about.php'><a href="<cms:link 'about.php'/>" class="btn-default"><cms:get "locale.about_us"/></a>
								<cms:else/><a href="<cms:link 'services.php'/>" class="btn-default"><cms:get "locale.our_services"/></a>
								</cms:if>
                                
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
 </cms:pages>