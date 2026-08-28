<section class="<cms:if k_template_name eq 'doctors.php'>page-team-single<cms:else/>page-single-post bg-black</cms:if> pt-md-0 pb-5">
	<div class="container">
		<div class="row align-items-center">
			
			<cms:if k_template_name eq 'doctors.php'> <cms:trim "<cms:embed 'doctors/page_header_view.inc'/>"/>
           
			<cms:else/>
			
			<div class="col-lg-6 my-3 my-lg-0">
				<div class="section-title my-3 text-accent-color text-center text-lg-start">
					<h3 class="wow fadeInUp">
					<cms:if k_template_name eq 'news-events.php'>
						&#x200E;<cms:date k_page_date format='d M Y'/>&#x200E;<i class="fa-regular fa-calendar-days ps-1"></i>
					<cms:else_if k_page_foldername/>
						<cms:ignore><a href="<cms:show_with_lc k_page_folderlink/>" title="<cms:show k_page_foldertitle />"> <cms:folders hierarchical='1' include_custom_fields='1' root=k_page_foldername depth='1'><cms:get "title_<cms:show k_lang/>"/></cms:folders></a></cms:ignore>
						
						<cms:parentfolders 
							folder=k_page_foldername 
							extended_info='0' 
							include_custom_fields='0'>
							<cms:capture into="rpage_category_title"><cms:folders masterpage="services.php" depth='1' root=k_folder_name include_custom_fields='1'><cms:get "title_<cms:show k_lang/>"/></cms:folders></cms:capture>
								<cms:if k_level gt '0'><br>- </cms:if><a href="<cms:show_with_lc k_folder_link/>" title="<cms:show rpage_category_title />" <cms:if k_level gt '0'>class="small"</cms:if>><cms:show rpage_category_title/></a>
							
						</cms:parentfolders>				
					<cms:else/>
						<cms:set cloned_main_template_name = "<cms:call 'get_page_title' tname=main_template_name/>"/>
						<a href="<cms:show_with_lc k_template_link/>" title="<cms:show cloned_main_template_name />"><cms:show cloned_main_template_name/></a>
					</cms:if>
					</h3>
					<h2 class="wow fadeInUp  text-accent-color" data-wow-delay="0.1s"><cms:get "title_<cms:show k_lang/>"/></h2>
					<p class="wow fadeInUp  text-accent-color" data-wow-delay="0.2s"><cms:get "short_desc_<cms:show k_lang/>"/></p>
					
					
					<cms:if show_appointment_block && (show_appointment_block eq '2')><cms:else/>
					<a href="#book_appointment" class="btn-default mt-3" title='<cms:get "locale.book_appointment"/>'><i class="fa-solid fa-calendar"></i> <cms:get "locale.book_appointment"/></a>
					</cms:if>
				</div>
			</div>
			
			<div class="col-lg-6">
				<div class="post-image p-0 m-0 px-sm-3 mx-sm-3 px-md-5 mx-md-5 px-lg-0 mx-lg-0">
					<figure class="image-anime reveal">
						<img class="lazy" src='<cms:show px_img/>' data-src="<cms:show page_image/>" alt='<cms:get "title_<cms:show k_lang/>"/>'>
					</figure>
				</div>
			</div>
			</cms:if>
		</div>
	</div>
</section>


<cms:trim "<cms:embed 'doctors/signature_services_list.inc'/>"/>
<cms:trim "<cms:embed 'doctors/related_doctors_list.inc'/>"/>

<cms:trim "<cms:embed 'clonedpages/related_services_list.inc'/>"/>
<cms:trim "<cms:embed 'clonedpages/cloned_detail_content.inc'/>"/>

	
<cms:trim "<cms:embed 'transformations/page_ba_view.inc'/>"/>

<cms:trim "<cms:embed 'news/gallery_view.inc'/>"/>
<cms:if show_appointment_block && (show_appointment_block eq '2')><cms:else/>
<cms:if primary_speciality><cms:folders masterpage="services.php" depth='1' root=primary_speciality ><cms:set current_speciality_title = k_folder_title 'global'/></cms:folders></cms:if>				

<cms:set curr_doct_count ="<cms:if doctors><cms:related_pages 'doctors' count_only='1'/></cms:if>"/>
<cms:set curr_doct_name = "<cms:if curr_doct_count && curr_doct_count eq '1'><cms:related_pages 'doctors' limit='1'><cms:show k_page_name/></cms:related_pages></cms:if>	"/>
<cms:trim "<cms:embed 'appointments/section_view.inc'/>"/></cms:if>