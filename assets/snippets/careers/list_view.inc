<cms:capture into="jobs_list">
<cms:set curr_value='1' 'global'/>
<cms:folders masterpage='careers.php' extended_info='1' include_custom_fields='1'>
<cms:set end_date_val ="<cms:date end_date format='Y-m-d H:i:s'/>"/>
<cms:set curr_date_val =" <cms:date format='Y-m-d H:i:s'/>"/>	
<cms:if (p_publish_status eq 'published') && (end_date_val gt curr_date_val)>

<div class="d-flex justify-content-start bg-light border border-bottom p-3 h-auto">
<div scope="row" class="px-2 pt-2" aria-hidden="true"><cms:show curr_value/></div>

<a href="<cms:show_with_lc k_folder_link/>" class="d-block px-3 pt-2" title='<cms:get "title_<cms:show k_lang/>"/>' aria-label="<cms:get 'locale.job'/> <cms:show curr_value/>" scope="row">

<h4 class="m-0 text-black"><cms:get "title_<cms:show k_lang/>"/></h4>
<cms:if job_location && job_location gt '0'>
<cms:pages masterpage="contact.php" id=job_location>
<p class="m-0 text-secondary small" aria-label="<cms:get 'locale.location'/>"><cms:call 'get_page_title' tname=k_template_name pname=k_page_name/>, <cms:get "location_<cms:show k_lang/>"/>, <cms:get "location_city_<cms:show k_lang/>"/>, <cms:get "location_country_<cms:show k_lang/>"/></p>
</cms:pages>
</cms:if>

<small class="d-block text-black my-2" aria-hidden="true"><cms:excerpt count='300' truncate_chars='1' trail="..."><cms:get "content_<cms:show k_lang />" /></cms:excerpt></small>

<div class="btn btn-link text-accent-color p-0" aria-hidden="true"><span><cms:get "locale.view_details_apply"/></span><i class="fa-solid fa-chevron-right"></i></div>				

</a>

</div>



<cms:set has_jobs='1' 'global'/>
<cms:set curr_value = "<cms:add curr_value '1'/>" 'global'/>
</cms:if>
</cms:folders>
</cms:capture>


<section class="bg-white pt-5 pb-0">
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-12">
            <div class="section-title">
				<cms:show_globals masterpage=k_template_name>
				<h4 class="wow fadeInUp text-dark h1 mb-3"><i class="fa-solid fa-check-to-slot text-accent-color"></i> <cms:get "title_<cms:show k_lang/>"/></h4>
				<p class="wow fadeInUp mb-3 fw-bold" data-wow-delay="0.2s"><cms:get "short_content_<cms:show k_lang/>"/></p>
				<cms:do_shortcodes><cms:get "content_<cms:show k_lang/>"/></cms:do_shortcodes>
				</cms:show_globals>
            </div>
        </div>
    </div>
</div>
</section>
	



<cms:if has_jobs>
<section class="bg-light py-5">
<div class="container">
<div class="row justify-content-start">

<div class="col-12">
<h3 class="mb-3"><cms:get "locale.explore_job_openings"/></h3>
<div class="d-flex justify-content-start bg-dark text-light fw-bold p-3">
<div scope="col" class="px-3 fw-bold" aria-hidden="true">#</div>
<div scope="col" class="px-3 fw-bold"><cms:get "locale.job_details"/></div>
</div>

<cms:show jobs_list/>
</div>
</div>
</div>
</section>	
</cms:if>

<section class="bg-dark">
<div class="container">
<div class="row justify-content-start">
<div class="col-lg-6 pt-5 pb-3 align-self-center">	
<h3 class="text-accent-color"><cms:if has_jobs><cms:get "locale.no_matching_openings"/><cms:else/><cms:get "locale.no_job_openings"/></cms:if></h3>

<p class="lead text-light"><cms:get "locale.submit_cv_via_form"/></p>
<p class="text-light"><cms:get "locale.submit_cv_via_form_desc"/></p>

<a href="#career_form" class="btn-default btn-highlighted aos-init aos-animate" data-aos="fade-up" title='<cms:get "locale.submit_your_resume"/>' aria-hidden="true"><span><cms:get "locale.submit_your_resume"/></span> <i class="icon-arrow-right"></i></a>
</div>

<div class="col-lg-6 d-none d-lg-block align-self-end" aria-hidden="true">
<img class="w-100 lazy mt-3" src='<cms:show px_img/>' data-src="<cms:show k_site_link/>assets/images/job_search.png" data-aos="fade-in" alt="<cms:show orgname/>">


</div>


</div>
</div>
</section>

<cms:embed 'careers/form_view.inc'/>