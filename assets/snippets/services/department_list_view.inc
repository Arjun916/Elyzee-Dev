	<section class="bg-black pt-5 pb-0 bg_asthetic_treatments">
	<div class="container-sm">
	<cms:set current_folder_name =k_folder_name />
	<cms:folders masterpage='services.php' depth='1' orderby='weight' order='asc' root="<cms:if current_folder_name><cms:show current_folder_name/></cms:if>" extended_info='1' include_custom_fields='1' >
	<cms:if k_folder_pagecount || k_folder_immediate_children>
	<h6 class="d-none zero-size"><cms:show k_folder_title/></h6>
	
	<div id="<cms:show k_folder_name/>" class="row justify-contents-center align-items-center border-bottom mb-3">
		<cms:set is_page_image="<cms:if page_image>true<cms:else/>false</cms:if>" 'global'/>
		
		<cms:if current_folder_name && (is_page_image eq 'false')>			
			<cms:parentfolders folder=current_folder_name depth='1'>
				
				<cms:if (current_folder_name ne k_folder_name) && (is_page_image eq 'false')>
				
				<cms:folders masterpage="services.php" depth='1' root=k_folder_name include_custom_fields='1'>
				<cms:if is_page_image eq 'false'><cms:set page_image_val=page_image 'global'/><cms:set is_page_image='true' 'global'/><cms:show is_page_image/></cms:if></cms:folders>
				</cms:if>
				</cms:parentfolders>
				
				
			</cms:if>
			
			<cms:set page_image = "<cms:if page_image><cms:show page_image/><cms:else_if page_image_val/><cms:show page_image_val/></cms:if>"/>
			<cms:if page_image><div class="col-md-auto text-center my-0 py-0">
			<img class="lazy" src='<cms:show px_img/>' data-src="<cms:show page_image/>" alt='<cms:show orgname/> - <cms:get "title_<cms:show k_lang/>"/>' style="max-width: 350px;">
		</div>
	</cms:if>
		<div class="col-md text-center text-accent-color display-5 text-uppercase bg-black my-0 py-0">
			<cms:if current_folder_name>			
				<cms:parentfolders folder=current_folder_name depth='1'>
					<cms:if current_folder_name ne k_folder_name>
					<cms:folders masterpage="services.php" depth='1' root=k_folder_name include_custom_fields='1'><a href="<cms:show_with_lc k_folder_link/>" class="d-block mb-3 small" title="<cms:get 'locale.view_details'/>"><cms:get "title_<cms:show k_lang/>"/></a></cms:folders></cms:if>
				
					</cms:parentfolders>
				</cms:if>
			
			<a href="<cms:show_with_lc k_folder_link/>" title="<cms:get 'locale.view_details'/>"><strong><cms:get "title_<cms:show k_lang/>"/></strong></a>
		</div>
	
	</div>
	<div class="row">
		<div class="col-12 our-journey-list">
			
			<cms:if k_folder_pagecount>
			<ul class="mt-3 mb-5">
				<cms:pages masterpage='services.php' folder=k_folder_name include_subfolders='0' custom_field='show_in_list=1' orderby="weight" order="asc">
				<li><a href="<cms:show_with_lc k_page_link/>" class="bg-dark w-100 d-block px-1 rounded" title="<cms:get 'locale.know_more'/>"><cms:get "title_<cms:show k_lang/>"/></a></li>
				
				</cms:pages>
				</ul>
			</cms:if>
			
        <cms:folders childof=k_folder_name depth='1' include_subfolders='1' extended_info='1' include_custom_fields='1'>
           <cms:if k_folder_pagecount>
                <a href="<cms:show_with_lc k_folder_link />" class="h2 text-accent-color text-center w-100 d-block text-uppercase" title="<cms:get 'locale.view_details'/>"><cms:get "title_<cms:show k_lang/>"/></a>
				<ul class="mt-3 mb-5">
  				<cms:pages masterpage='services.php' folder=k_folder_name orderby="weight" order="asc" custom_field='show_in_list=1'>
				<li><a href="<cms:show_with_lc k_page_link/>" class="bg-dark w-100 d-block px-1 rounded" title="<cms:get 'locale.know_more'/>"><cms:get "title_<cms:show k_lang/>"/></a></li>
				</cms:pages>
  				</ul>
          	 </cms:if>
        </cms:folders>
	</div>
	</div>
	
	</cms:if>	
	</cms:folders>
	</div>
	</section>
	
