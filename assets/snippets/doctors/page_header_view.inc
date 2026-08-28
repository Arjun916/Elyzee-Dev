            <div class="col-md-6">
                <div class="team-member-image">
                    <figure class="image-anime reveal">
						<cms:set team_pic = "<cms:if page_image><cms:show page_image/><cms:else/><cms:show k_site_link/>assets/images/doctor_placeholder.png</cms:if>" />
						
                        <img class="px-5 px-sm-0 px-md-0 px-lg-5 lazy" src="<cms:show px_img/>" data-src="<cms:show team_pic/>" alt='<cms:get "title_<cms:show k_lang/>"/>'>
                    </figure>
                </div>
			</div>
			
			
			<div class="col-md-6 my-5">
				<div class="team-member-content mt-lg-3 pt-lg-3">
					<div class="section-title mb-3">							   
						<cms:if primary_speciality>
						<h3 class="wow fadeInUp">
							<cms:folders masterpage="services.php" depth='1' root=primary_speciality include_custom_fields='1'>
								<cms:get "title_<cms:show k_lang/>"/>
								<cms:set current_speciality_title = k_folder_title 'global'/>
							</cms:folders>
						</h3>
						</cms:if>
						<h2 class="wow fadeInUp" data-wow-delay="0.1s"><cms:get "title_<cms:show k_lang/>"/></h2>
						<p class="wow fadeInUp" data-wow-delay="0.2s"></p>
					</div>
                       
					<div class="member-info-list wow fadeInUp" data-wow-delay="0.4s">
						<div class="fw-bold d-block text-primary mb-1"><cms:get "locale.licensed_as"/></div>
						<p><cms:get "designation_<cms:show k_lang/>"/></p>
							
						<cms:if years_exp>
						<div class="fw-bold d-block text-primary mb-1"><cms:get "locale.years_exp"/></div>
						<p>&#x200E;<cms:show years_exp/> +&#x200E;</p>
						</cms:if>
							
							
						<cms:set languages_spoken_temp = "languages_spoken_<cms:show k_lang />"/>
						<cms:set languages_spoken_val = "<cms:get languages_spoken_temp />"/>
						<cms:if languages_spoken_val>
						<div class="fw-bold d-block text-primary mb-1"><cms:get "locale.languages_spoken"/></div>
						<p><cms:show languages_spoken_val/></p>
						</cms:if>

							
						<a href="#book_appointment" class="btn-default" title='<cms:get "locale.book_appointment"/>'><i class="fa-solid fa-calendar"></i> <cms:get "locale.book_appointment"/></a>
                           
					</div>
				</div>
			</div>