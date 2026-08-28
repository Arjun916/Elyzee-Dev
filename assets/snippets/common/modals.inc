<!-- Search Modal -->
<div class="modal fade" id="search_modal" tabindex="-1" role="dialog" aria-labelledby="searchLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-min-width">
<div class="modal-content">

<div class="modal-header d-flex justify-content-between">
<div id="searchLabel" class="h4 modal-title"><cms:get 'locale.search'/></div>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
<form method="get" class="searchform search-form" action="<cms:link 'search.php'/>">
<div class="input-group mb-3">
<input type="text" value="<cms:show s_kw />" name="s" class="form-control" label="<cms:get 'locale.search'/>" title="<cms:get 'locale.search'/>" placeholder="<cms:if k_lang eq 'ar'>أدخل الكلمات الرئيسية<cms:else/>Enter keywords...</cms:if>">
<div class="input-group-prepend">
<button class="btn btn-primary bg-primary h-100" type="submit" title="<cms:get 'locale.search'/>"><i class="fa fa-search"></i></button>
</div>
</div>
<small><cms:if k_lang eq 'ar'>الحد الأدنى 3 أحرف المطلوبة.<cms:else/>Minimum 3 characters required.</cms:if></small>
</form>
</div>

</div>
</div>
</div>



<div class="modal fade" id="elyzee_modal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content">

<div class="modal-header d-flex justify-content-between">
<div class="h4 modal-title"></div>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body"></div>
<div class="modal-footer d-flex justify-content-start"></div>

</div>
</div>
</div>


