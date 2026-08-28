<section class="page-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-start mb-5 text-dark">
				<cms:show_globals masterpage=k_template_name>
				<h4 class="wow fadeInUp text-dark h1 mb-3"><i class="fa-solid fa-<cms:if title_header_icon_val><cms:show title_header_icon_val/><cms:else/>newspaper</cms:if> text-accent-color"></i> <cms:get "title_<cms:show k_lang/>"/></h4>
				<p class="wow fadeInUp mb-3 lead" data-wow-delay="0.2s"><cms:get "short_content_<cms:show k_lang/>"/></p>
				<cms:do_shortcodes><cms:get "content_<cms:show k_lang/>"/></cms:do_shortcodes>
				</cms:show_globals>
            </div>
			
			<cms:capture into="cloned_list_output">
			<cms:pages masterpage=k_template_name paginate='1' limit='18'>
				<cms:trim "<cms:embed 'common/paginationtop.html' />"/>
				<cms:embed "<cms:show clonedpages_tile/>"/>
            	<cms:trim "<cms:embed 'common/pagination.html' />"/>
				<cms:no_results><div class="col-12 alert alert-warning"><cms:get "locale.nothing_to_show"/></div></cms:no_results>				
			</cms:pages>
			</cms:capture>
			
			<cms:if haspaginationtop_output><cms:show paginationtop_output /></cms:if>
			<cms:show cloned_list_output/>
			<cms:if has_pagination_output><cms:show pagination_output /></cms:if>

           
        </div>
    </div>
</section>




