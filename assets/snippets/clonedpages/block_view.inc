<cms:pages masterpage=block_template_name limit='7'>
<cms:if k_count eq '1'>
<section class="our-blog border-top-accent-5 bg-light bg_asthetic_treatments">
    <div class="container">
        <div class="row section-row align-items-center">
            <div class="col-lg-12">
                <div class="section-title section-title-center">
                    <cms:show_globals masterpage=k_template_name>
					<h3 class="wow fadeInUp"><cms:get "title_<cms:show k_lang/>"/></h3>
                    <h2><cms:get "short_content_<cms:show k_lang/>"/></h2>
					</cms:show_globals>
					
                </div>
            </div>
        </div>
        
		<div class="block-carousel px-1 mx-3" data-slidesToShow='3' data-slidesLoop='false'>
</cms:if>
          
			<cms:embed "<cms:if block_tile_name><cms:show block_tile_name/><cms:else/>clonedpages/tile_view.inc</cms:if>"/>
           
<cms:if k_count eq k_total_records || k_count eq '7'>
			<div class="col-lg-4 col-md-6 d-flex text-center">
			<div class="align-self-center p-5 rounded bg-light m-auto" >
			<a class="btn btn-default text-uppercase text-light" href="<cms:show_with_lc k_template_link/>" title="<cms:get 'locale.view_all'/>: <cms:call 'get_page_title' tname=k_template_name/>" aria-label="<cms:get 'locale.view_all'/>">
			<cms:get 'locale.view_all'/></a>
			</div>
			</div>
			
        </div>
    </div>
</section>
</cms:if>
</cms:pages>

<cms:set block_template_name=''/><cms:set block_title_name=''/>