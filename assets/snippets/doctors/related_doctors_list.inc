<cms:if main_template_name ne 'doctors.php'>

<cms:capture into='team_output'>

<cms:set found_dr_ids="" scope='global' />
<cms:if k_folder_name || k_page_foldername >
    <cms:set tmp_dr_folder="<cms:if k_page_foldername><cms:show k_page_foldername/><cms:else/><cms:show k_folder_name/></cms:if>" />

    <cms:set speciality_ids="<cms:parentfolders folder=tmp_dr_folder extended_info='0' include_custom_fields='0'><cms:show k_folder_name/>,</cms:parentfolders>" />

    <cms:if speciality_ids >
		<cms:set speciality_ids="<cms:php>echo trim(implode(',', array_filter(explode(',', '<cms:show speciality_ids/>'))), ',');</cms:php>" />

        <cms:if speciality_ids >
            <cms:capture into="found_dr_ids" scope="global"><cms:show found_dr_ids />,<cms:pages masterpage='doctors.php' custom_field="primary_speciality = <cms:php>echo trim('<cms:show speciality_ids/>', ', ');</cms:php>" ids_only='1' />,<cms:pages masterpage='doctors.php' custom_field="secondary_speciality = <cms:php>echo trim('<cms:show speciality_ids/>', ', ');</cms:php>" ids_only='1' /></cms:capture>
        </cms:if>
    </cms:if>
</cms:if>

<cms:if services >
    <cms:set found_dr_ids="<cms:show found_dr_ids />,<cms:reverse_related_pages 'services' masterpage='doctors.php' orderby='weight' order='asc' ids_only='1'/>" scope='global' />
</cms:if>

<cms:if doctors >
    <cms:set found_dr_ids="<cms:show found_dr_ids />,<cms:related_pages 'doctors' orderby='weight' order='asc' ids_only='1'/>" scope='global'/>
</cms:if>

<cms:if found_dr_ids >
    <cms:set found_dr_ids="<cms:php>echo trim(implode(',',array_unique(array_filter(explode(',', '<cms:show found_dr_ids/>')))),',');</cms:php>" scope="global" />
</cms:if>


<cms:if found_dr_ids && found_dr_ids != '' && found_dr_ids != ','>
<cms:pages masterpage="doctors.php" id="<cms:php>echo trim('<cms:show found_dr_ids />', ', ');</cms:php>">
<cms:set has_team='1' 'global' />
<cms:trim "<cms:embed 'doctors/tile_view.inc'/>"/>
</cms:pages>
</cms:if>

</cms:capture>


<cms:if has_team>
<section class="page-team bg-dark py-5">
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<h3 class="col-12 wow fadeInUp text-center text-accent-color "><cms:get "locale.our_specialists" /></h3>
			
			<div class="section-footer-text wow fadeInUp text-light col-12 mt-2 mb-5">
				<p class="d-block"><a href="<cms:link 'book-appointment.php'/>" class="text-light m-0 p-0 me-2"><cms:get "locale.book_appointment"/></a> <a href="tel:<cms:show primaryphone/>" class="text-light m-0 p-0"><i class="fa-solid fa-phone"></i> <cms:show primaryphone/></a></p>
			</div>
			<div class="col-12 px-4"><div class="team-slider"><cms:show team_output /></div></div>	
		</div>
	</div>
</section>
</cms:if>
</cms:if>