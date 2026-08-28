<cms:if k_template_name ne 'hubspace/index.php'>
				<div class="page-breadcrumb d-flex align-items-center mb-3">
					<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<cms:link 'hubspace/index.php'/>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item" aria-current="page"><a href="<cms:show k_template_link/>"><cms:show k_template_title/></a></li>
								
								<cms:if rt_page_name>
								<cms:pages masterpage="hubspace/events.php" page_name=rt_page_name show_unpublished='1' limit-='1'>
								<li class="breadcrumb-item" aria-current="page"><a href="<cms:show k_page_link/>"><cms:show k_page_title/></a></li></cms:pages>
								</cms:if>
							</ol>
						</nav>
					
				</div>
</cms:if>