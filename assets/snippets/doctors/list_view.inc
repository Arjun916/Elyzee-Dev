<section class="page-team bg-black">
	<div class="container">
		<div class="row justify-content-center">
            <div class="col-lg-12 text-start mb-3 text-white">
				<cms:show_globals>
				<h4 class="wow fadeInUp text-accent-color h1 mb-3"><i class="fa-solid fa-user-doctor text-accent-color"></i> <cms:get "title_<cms:show k_lang/>"/></h4>
				<p class="wow fadeInUp mb-3" data-wow-delay="0.2s"><cms:get "short_content_<cms:show k_lang/>"/></p>
				<cms:do_shortcodes><cms:get "content_<cms:show k_lang/>"/></cms:do_shortcodes>
				</cms:show_globals>
            </div>


			<cms:form class="col-12 mb-5 text-start bg-dark p-3 rounded" anchor="0" name="doctors" method="post">
				<cms:if k_success >
					
					<cms:set frm_doc_search=frm_k scope='global' />
					<cms:set frm_specialty_list=frm_s scope='global' />
					<cms:if frm_specialty_list><cms:capture into="frm_specialty_title" scope='global'><cms:folders masterpage='services.php' root=frm_specialty_list depth='1' include_custom_fields='1'><cms:get "title_<cms:show k_lang/>"/></cms:folders></cms:capture></cms:if>
				</cms:if>

				<cms:if frm_doc_search>
					<cms:set search_strings="<cms:php>echo trim(implode('|', explode(' ', '<cms:show frm_doc_search />')),'|');</cms:php>" />
					<cms:set found_ids="" scope='global' />
					
					<cms:each search_strings>
						<cms:set tmp_ids="" scope='global' />
						
						<cms:set tmp_ids="<cms:show tmp_ids />,<cms:pages masterpage='doctors.php' custom_field="title_en=<cms:show item />" ids_only='1' />" scope='global' />
						<cms:set tmp_ids="<cms:show tmp_ids />,<cms:pages masterpage='doctors.php' custom_field="title_ar=<cms:show item />" ids_only='1' />" scope='global' />
						<cms:set tmp_ids="<cms:php>echo trim(implode(',', array_unique(explode(',', '<cms:show tmp_ids />'))),',');</cms:php>" scope='global' />
						<cms:if found_ids != ''>
							<cms:set found_ids="<cms:php>echo trim(implode(',', array_intersect(explode(',', '<cms:show tmp_ids />'), explode(',', '<cms:show found_ids />'))),',');</cms:php>" scope='global' />
						<cms:else/><cms:set found_ids=tmp_ids scope='global' /></cms:if>
					</cms:each>
				</cms:if>
				
				<div class="input-group">
					<cms:capture into="specialty_list"><cms:pages masterpage='doctors.php' orderby='weight' order='asc' skip_custom_fields='1'>,<cms:folders masterpage='services.php' root="<cms:get_custom_field var='primary_speciality' page=k_page_name masterpage=k_template_name />" depth='1' include_custom_fields='1'>| <cms:get "title_<cms:show k_lang/>"/>=<cms:show k_folder_name/></cms:folders></cms:pages></cms:capture>
					
					<cms:if specialty_list><cms:set specialty_list="<cms:php>echo trim(implode(' ',array_unique(array_filter(explode(',', '<cms:show specialty_list/>')))),',');</cms:php>" scope="global" /></cms:if>
					
					
					<span class="input-group-text"><i class="fa-solid fa-filter"></i></span>
					<cms:input class="form-select form-select-sm" onchange="this.form.submit()" type="dropdown" name='s' opt_values="All Specialities = <cms:show specialty_list/>"/>
					<cms:input name='k' type="text" class="form-control form-control-sm" list="doctorslist" placeholder="Search by doctor's name" aria-label="Search by doctor's name" onchange="this.form.submit()"/>
					<datalist id="doctorslist"><cms:pages masterpage="doctors.php" orderby='weight' order='asc' custom_field="primary_speciality = <cms:show frm_specialty_list/>"><option value='<cms:get "title_<cms:show k_lang/>"/>'></cms:pages></datalist>
					<button name="btn_submit" type="submit" class="btn btn-primary btn-lg" title='<cms:get "locale.search"/>'><i class="fa-solid fa-search"></i></button>
				</div>
				
				<cms:if frm_specialty_list ne '' || frm_doc_search ne ''>
					<cms:capture into="doc_count_only"><cms:pages masterpage="doctors.php" id="<cms:show found_ids />" custom_field="primary_speciality = <cms:show frm_specialty_list/>" count_only='1'/></cms:capture>
					<cms:if doc_count_only && doc_count_only ge '1'>
						<div class="alert alert-warning small m-0 py-2">Showing doctors<cms:if frm_doc_search> with names containing '<strong><cms:show frm_doc_search/></strong>'</cms:if><cms:if frm_specialty_title> from '<strong><cms:show frm_specialty_title/></strong>'</cms:if>. <a class="btn btn-link btn-sm" href="<cms:show_with_lc k_template_link/>">(<cms:get "locale.view_all"/>)</a></div>
					<cms:else/>
						<div class="alert alert-danger small m-0 py-2"><i class="fa-solid fa-triangle-exclamation"></i> No doctors found<cms:if frm_doc_search> with names containing '<strong><cms:show frm_doc_search/></strong>'</cms:if><cms:if frm_specialty_title> in '<strong><cms:show frm_specialty_title/></strong>'</cms:if>. <a class="btn btn-link btn-sm text-danger" href="<cms:show_with_lc k_template_link/>">(<cms:get "locale.view_all"/>)</a></div>
					</cms:if>
				</cms:if>
			</cms:form>

			<div class="col-12 px-4">
				<div class="row">
					<cms:pages masterpage="doctors.php" id="<cms:show found_ids />"  orderby='weight' order='asc' custom_field="primary_speciality = <cms:show frm_specialty_list/>">
						<div class="col-xl-3 col-lg-4 col-sm-6 p-0 m-0"><cms:trim "<cms:embed 'doctors/tile_view.inc'/>"/></div>				
					</cms:pages>		
				</div>
			</div>
		</div>
	</div>
</section>