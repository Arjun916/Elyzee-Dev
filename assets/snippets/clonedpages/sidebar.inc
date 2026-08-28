<div class="col-sm-12 col-md-12 col-lg-4">
<aside class="sidebar">

<!-- Latest -->
<cms:capture into='latest_output'>  
<cms:pages masterpage=k_template_name limit='3' id="NOT <cms:show k_page_id/>">
<cms:set latest_title_tttitle="<cms:call 'get_page_title' tname=k_template_name pname=k_page_name/>"/>
<div class="widget-post-item d-flex align-items-center">
<div class="widget-post__img">
<cms:trim "<cms:embed 'common/pageimage.html'/>"/>
<a href="<cms:show_with_lc k_page_link />" title="<cms:show latest_title_tttitle/>"><img src="<cms:thumbnail img_output width='640' height='640'/>" alt="<cms:show latest_title_tttitle/>"></a>
</div>
<div class="widget-post__content">
<span class="widget-post__date"><cms:date k_page_date format='M d, Y'/></span>
<h4 class="widget-post__title"><a href="<cms:show_with_lc k_page_link />" title="<cms:show latest_title_tttitle/>"><cms:show latest_title_tttitle/></a></h4>
</div>
</div>
<cms:set haslatest_output='1' 'global' />
</cms:pages>
</cms:capture>

<cms:if haslatest_output>				
<div class="widget widget-posts">
<h5 class="widget__title"><cms:get 'locale.latest'/></h5>
<div class="widget__content"><cms:show latest_output /></div>
</div>
</cms:if>
<!-- /. Latest -->


<!-- Categories -->
<cms:capture into='categories_output'>  
<cms:if k_is_folder ><cms:set current_page_folder=k_folder_name 'global'/></cms:if>
<cms:folders masterpage=k_template_name extended_info='1' include_custom_fields='1'>
<cms:set categories_folder_tttitle="<cms:if k_lang eq 'ar'><cms:show title_ar /><cms:else/><cms:show k_folder_title /></cms:if>"/>
<cms:if k_folder_totalpagecount gt '0'>
<li><a href="<cms:show_with_lc k_folder_link />" title="<cms:show categories_folder_tttitle/>">
<span class="cat-count"><cms:show k_folder_totalpagecount /></span>
<span><cms:show categories_folder_tttitle/></span>
</a></li>
<cms:set hascategories_output='1' 'global' />
</cms:if>
</cms:folders>
</cms:capture>

<cms:if hascategories_output>
<div class="widget widget-categories">
<h5 class="widget__title"><cms:get 'locale.categories'/></h5>
<div class="widget-content">
<ul class="list-unstyled mb-0"><cms:show categories_output /></ul>
</div>
</div>
</cms:if>
<!-- /. Categories -->

<!-- Archives -->
<cms:capture into='archives_output'>
<cms:if k_is_archive > <cms:set current_page_archive="<cms:date k_archive_date format='Y' />" 'global'/></cms:if>
<cms:archives masterpage=k_template_name type='yearly'>
<li <cms:if current_page_archive && current_page_archive eq "<cms:date k_archive_date format='Y' />">class="current"</cms:if>>
<a href="<cms:show_with_lc k_archive_link />" title="<cms:date k_archive_date format='Y' />"><cms:date k_archive_date format='Y' /> &#x200E;(<cms:show k_archive_count />)&#x200E;</a>
</li>
<cms:set hasarchives_output='1' 'global' />
</cms:archives>
</cms:capture>

<cms:if hasarchives_output>
<div class="widget widget-tags">
<h5 class="widget__title"><cms:get 'locale.archives'/></h5>
<div class="widget-content">
<ul class="list-unstyled mb-0"><cms:show archives_output /></ul>
</div>
</div>
</cms:if>
<!-- /. Archives -->

</aside>
</div>