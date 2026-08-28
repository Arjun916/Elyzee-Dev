<cms:set blog_tttitle="<cms:call 'get_page_title' tname='insights.php' pname=k_page_name/>"/>
<div class="col-lg-4 col-md-6">
<div class="case-study-item wow fadeInUp">

<div class="case-study-image">
<a href="<cms:show_with_lc k_page_link/>" title="<cms:show blog_tttitle/>">
<figure class="image-anime">
<img class="lazy" src="<cms:show px_img/>" data-src="<cms:show page_image/>" data-lazy="<cms:show page_image/>" alt="<cms:show blog_tttitle/>">
</figure>
</a>
</div>

<div class="case-study-body">

<div class="case-study-item-content">
<h3><a href="<cms:show_with_lc k_page_link/>" title="<cms:show blog_tttitle/>"><cms:show blog_tttitle/></a></h3>
</div>

<div class="case-study-readmore-btn">
<a href="<cms:show_with_lc k_page_link/>" class="readmore-btn" title="<cms:get 'locale.read_more'/>"><img class="lazy" src="<cms:show px_img/>" data-src="<cms:show k_site_link/>assets/images/arrow-white.svg" data-lazy="<cms:show k_site_link/>assets/images/arrow-white.svg" alt="<cms:get 'locale.read_more'/>"></a>
</div>
</div>
</div>
</div>