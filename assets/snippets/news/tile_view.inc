<cms:set new_tile_tttitle="<cms:get "title_<cms:show k_lang/>"/>"/>			
<div class="col-lg-4 col-md-6">
    
    <div class="post-item bg-light rounded rounded-lg shadow-sm wow fadeInUp">
       
        <div class="post-featured-image landscape">
            <a href="<cms:show_with_lc k_page_link />">
                <figure class="image-anime">
                    <img class="lazy" src="<cms:show px_img/>" data-src="<cms:show page_image/>" alt="<cms:show new_tile_tttitle/>">
                </figure>
            </a>
        </div>
        <div class="post-item-body pb-2">
            
            <div class="post-item-content">
				<small class="text-accent-color"><i class="fa-regular fa-calendar-days pe-1"></i> &#x200E;<cms:date k_page_date format='d M Y'/>&#x200E;</small>
                <h2><a href="<cms:show_with_lc k_page_link />" title="<cms:show new_tile_tttitle/>"><cms:show new_tile_tttitle/></a></h2>
            </div>
           
            <div class="post-item-btn">
                <a href="<cms:show_with_lc k_page_link />" class="readmore-btn" title="<cms:show new_tile_tttitle/>"><img class="lazy" src="<cms:show px_img/>" data-src="<cms:show k_site_link/>assets/images/arrow-white.svg" alt="<cms:get 'locale.read_more'/>"></a>
            </div>
           
        </div>
    </div>
</div>