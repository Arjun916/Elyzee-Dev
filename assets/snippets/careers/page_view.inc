<section class="py-5 bg-light">
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 mb-40">
<div class="section_title mb-3">
<h1><cms:get "title_<cms:show k_lang/>"/></h1>
<cms:if job_location && job_location gt '0'>
<cms:pages masterpage="contact.php" id=job_location>
<cms:if location_url><a href="<cms:show location_url/>" target="_blank" title="<cms:get 'locale.get_directions'/>" aria-label="<cms:get 'locale.location'/>"></cms:if><cms:call 'get_page_title' tname=k_template_name pname=k_page_name/>, <cms:get "location_<cms:show k_lang/>"/>, <cms:get "location_city_<cms:show k_lang/>"/>, <cms:get "location_country_<cms:show k_lang/>"/><cms:if location_url></a></cms:if>
</cms:pages>
</cms:if>
</div>





<div class="d-flex justify-content-between" scope="row">


<cms:if (p_publish_status eq 'published') && (is_expired eq 'no')>
<div scope="col">
<p class="m-0"><cms:get "locale.apply_before"/>: <span class="text-danger"><cms:date end_date format='d M Y'/></span></p>
<cms:if job_vacancies && job_vacancies gt '0'><p class="m-0"><cms:get "locale.number_of_vacancies"/>: <strong><cms:show job_vacancies/></strong></p></cms:if>
</div>
</cms:if>




<div scope="col">
<cms:if (p_publish_status eq 'published') && (is_expired eq 'no')>
<a href="#career_form" class="btn btn-primary scroll" data-aos="fade-up" title='<cms:get "locale.apply_now"/>' aria-hidden="true"><span><cms:get "locale.apply_now"/></span><i class="icon-arrow-right"></i></a>
<cms:else/>
<h6 class="text-danger mb-0"><i class="fa fa-info-circle pe-1" aria-hidden="true"></i>
<cms:if (p_publish_status eq 'closed')><cms:get "locale.job_closed"/><cms:else/><cms:get "locale.job_expired"/></cms:if></h6>
</cms:if>
</div>
</div>
<hr>

</div>
<div class="col-sm-12 col-md-12 col-lg-12" aria-label="description">
<cms:do_shortcodes><cms:get "content_<cms:show k_lang />" /></cms:do_shortcodes>
</div>

<cms:if (p_publish_status eq 'closed') || (is_expired eq 'yes')>
<div class="alert alert-danger fw-bold col-12" role="alert">
<span aria-hidden="true"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp; </span><cms:if (p_publish_status eq 'closed')><cms:get "locale.job_closed"/><cms:else/><cms:get "locale.job_expired"/></cms:if>: <cms:get "locale.job_not_accepting_applications"/>
</div>
</cms:if>
</div>
</div>
</section>







<cms:if (is_expired eq 'no') && (p_publish_status eq 'published')>
<cms:embed 'careers/form_view.inc'/>
</cms:if>