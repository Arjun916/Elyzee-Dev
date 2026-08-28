<cms:if k_template_name ne 'index.php'>
<section class="page-header bg-black pb-3">
	<div class="container">
		<div class="row page-header-box">
			<h6 class="d-none zero-size"><cms:show orgname/></h6>
			<nav class="col-12 wow fadeInUp">
				<ol class="breadcrumb">

					<cms:if k_is_home!='1' && (k_is_page || k_is_folder) >
						
						<li class="breadcrumb-item">
							<a href="<cms:show_with_lc k_site_link/>" title="<cms:show orgname/>">
								<i class="fa-solid fa-house"></i><em class="droopmenu-topanim"></em>
							</a>
						</li>

						
						<li class="breadcrumb-item">
							<a href="<cms:show_with_lc k_template_link/>" 
							   title="<cms:call 'get_page_title' tname=k_template_name/>">
								<cms:call 'get_page_title' tname=k_template_name/>
								<em class="droopmenu-topanim"></em>
							</a>
						</li>

						<cms:if k_folder_name || k_page_foldername>
						<cms:set breadcrumb_category_folder="<cms:if k_folder_name ><cms:show k_folder_name /><cms:else_if k_page_foldername /><cms:show k_page_foldername /></cms:if>" />
						
						<cms:if breadcrumb_category_folder >
							<cms:parentfolders 
								folder=breadcrumb_category_folder 
								extended_info='0' 
								include_custom_fields='0'>
								<li class="breadcrumb-item">
									<cms:capture into="breadcrumb_category_title"><cms:folders masterpage="services.php" depth='1' root=k_folder_name include_custom_fields='1'><cms:get "title_<cms:show k_lang/>"/></cms:folders></cms:capture>
									<a href="<cms:show_with_lc k_folder_link/>" title="<cms:show breadcrumb_category_title />">
										<cms:show breadcrumb_category_title/><em class="droopmenu-topanim"></em>
									</a>
								</li>
							</cms:parentfolders>
						</cms:if>
						</cms:if>
						
						<cms:ignore>
						<cms:if k_is_page >
							<li class="breadcrumb-item active" aria-current="page"><cms:get "title_<cms:show k_lang/>"/></li>
						</cms:if>
						</cms:ignore>
					</cms:if>
				</ol>
			</nav>
		</div>
	</div>
</section>
</cms:if>