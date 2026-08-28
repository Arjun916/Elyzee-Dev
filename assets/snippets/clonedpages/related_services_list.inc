<cms:if services>
<cms:if main_template_name ne 'doctors.php' && main_template_name ne 'services.php'>
<cms:capture into="signature_services_list">
	<cms:related_pages 'services'>
		
			<a href="<cms:show_with_lc k_page_link/>" class="btn btn-outline-primary btn-sm text-nowrap col-auto m-2 px-2" title='<cms:get "title_<cms:show k_lang/>"/>'><cms:get "title_<cms:show k_lang/>"/></a>
	
	<cms:set has_signature_services = '1' 'global'/>
	</cms:related_pages>
</cms:capture>



<cms:if has_signature_services>
<hr class="hr-accent">
<section class="page-team-single bg-black py-5 bg_asthetic_treatments">
    <div class="container">
        <div class="row justify-content-center">
			<h3 class="col-lg-12 text-accent-color text-center m-0"><cms:get "locale.signature_skills"/></h3>
			<p class="col-lg-12 text-light text-center small"><cms:get "title_<cms:show k_lang/>"/></p>
			<cms:show signature_services_list/>
        </div>
    </div>
</section>
</cms:if>
</cms:if>
</cms:if>