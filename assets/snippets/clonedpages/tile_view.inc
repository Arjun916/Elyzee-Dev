<cms:trim "<cms:embed 'common/pageimage.html' />"/>

<cms:set clonedpages_tile_view_tttitle="<cms:call 'get_page_title' tname=k_template_name pname=k_page_name/>"/>
<div class="card card-blog border-0 shadow-sm">
<div class="card-image <cms:if k_template_name eq 'gallery.php'>letter</cms:if> position-relative">		
<cms:set curr_image="<cms:thumbnail img_output width='640' height='640'/>" />		
<a href="<cms:if k_template_name eq 'index.php'><cms:show_with_lc k_nestedpage_link /><cms:else /><cms:show_with_lc k_page_link /></cms:if>" class="d-block position-relative" title="<cms:show clonedpages_tile_view_tttitle/>">
<img class="img lazy" src="<cms:show px_img />" data-src="<cms:show curr_image />" alt="<cms:show clonedpages_tile_view_tttitle/>">
</a>
<h6 class="position-absolute bottom-positioned text-light p-3 bg-blue-75 m-0 date"><small class="d-block"><cms:date k_page_date format='d M'/></small><cms:date k_page_date format='Y'/></h6>
</div>
<div class="table m-0 px-3 mb-3">
<cms:if show_desc eq '1' && k_page_foldertitle >
<a href="<cms:show_with_lc k_page_folderlink />" class="category text-danger" title="<cms:show k_page_foldertitle/>">
<i class="fas fa-folder-open"></i> 
<cms:folders masterpage=k_template_name extended_info='1' include_custom_fields='1' root=k_page_foldername depth='1'>
<cms:if k_lang eq 'ar'><cms:show title_ar /><cms:else/><cms:show k_folder_title /></cms:if>
</cms:folders>
</a>
</cms:if>

<h6 class="card-caption text-white m-0 text-capitalize">
<a href="<cms:if k_template_name eq 'index.php'><cms:show_with_lc k_nestedpage_link /><cms:else /><cms:show_with_lc k_page_link /></cms:if>" class="text-white" title="<cms:show clonedpages_tile_view_tttitle/>">
<cms:show clonedpages_tile_view_tttitle/>
</a>
</h6>

<cms:if show_desc eq '1' && k_template_name eq 'news-events.php'>
<cms:excerpt count='15' ignore='img' trail="&nbsp;(<a href=\"<cms:show_with_lc k_page_link />\" title=\"<cms:show clonedpages_tile_view_tttitle/>\">...</a>)"><cms:get "content_<cms:show k_lang />" /></cms:excerpt>
</cms:if>
</div>
</div>

