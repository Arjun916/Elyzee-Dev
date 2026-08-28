<?php require_once( 'manage/cms.php' ); ?>
<cms:template title="Search" hidden='1' order='1000'>
<cms:editable type="group" label="Title" name="p_title_group" order='10'/>
<cms:each k_supported_langs as='lang' key='lc'>
<cms:editable type='text'  name="title_<cms:show lc />" label="Title in <cms:show lang/>"  group='p_title_group' order=k_count required='1'><cms:if lc eq 'ar'>بحث<cms:else/>SEARCH</cms:if></cms:editable>	
</cms:each>

<cms:embed 'common/page_seo_editables.inc'/>

</cms:template>
<cms:trim "<cms:embed 'common/header.inc' />"/>


<section class="bg-black dark-section py-5" data-aos="fade-up">
<div class="container">
<div class="row">
<cms:ignore><cms:set s_kw="<cms:php>echo urldecode($_GET['s']);</cms:php>" /></cms:ignore>

<cms:set s_kw="<cms:html_encode><cms:gpc 's'/></cms:html_encode>" />

<h2 class="wow fadeInUp text-accent-color h1 mb-3"><i class="fa-solid fa-search text-accent-color"></i> <cms:get "title_<cms:show k_lang/>"/></h2>
				
<form class="col-lg-12" method="get" id="search-form" action="<cms:link 'search.php'/>">
<div class="form-group input-group mb-3">
<i class="icon-alert form-group-icon"></i>
<input type="text" value="<cms:show s_kw />" name="s" class="form-control rounded-0" placeholder="<cms:if k_lang eq 'ar'>أدخل الكلمات الرئيسية<cms:else/>Enter keywords...</cms:if>">
<div class="input-group-prepend">
<button class="btn btn-primary bg-primary h-100" type="submit" title="<cms:get 'locale.search'/>"><i class="fa fa-search"></i></button>
</div>
</div>
</form>

<div class="col-12 search_container dark-section mt-2">
<cms:ignore><cms:set charcount="<cms:php>echo strlen('<cms:show s_kw/>');</cms:php>"/></cms:ignore>
<cms:set charcount="<cms:php>echo mb_strlen('<cms:show s_kw/>', 'UTF-8');</cms:php>" />

<cms:if s_kw && charcount ge '3'>
<cms:search masterpage='index.php, about.php, insights.php, insurance.php, news-events.php, privacy-policy.php, doctors.php, services.php' keywords="<cms:show s_kw />">

<div class="overflow-hidden">
<h5 class="mb-1">
<cms:set name_temp = "title_<cms:show k_lang/>" />
<cms:set name_val="<cms:get name_temp />" />
<cms:set search_ttitle="<cms:if name_val><cms:show name_val /><cms:else /><cms:show k_search_title /></cms:if>"/>
<a href="<cms:show_with_lc k_page_link />" title="<cms:show search_ttitle/>"><cms:show search_ttitle/></a>
</h5>
<p class="search_result text-light small"><cms:show k_search_excerpt /></p>
<hr>
</div>

<cms:no_results>
<small class="text-light"><cms:if k_lang eq 'ar'>لم يتم العثور على نتائج. يرجى تجربة كلمات بحث مختلفة.<cms:else/>No search results found. Please try different keywords.</b></cms:if></small>
</cms:no_results>											  


</cms:search>
<cms:else />
<small class="text-light"><cms:if k_lang eq 'ar'>لا يوجد مدخلات للبحث. يرجى تقديم كلمة بحث أساسية لا تقل عن 3 أحرف.<cms:else/>Nothing to search. Please provide a search keyword with minimum 3 characters.</cms:if></small>
</cms:if>
</div>
</div><!-- /.row -->
</div><!-- /.container -->
</section>
<cms:trim "<cms:embed 'common/footer.inc' />"/>
<?php COUCH::invoke(); ?>