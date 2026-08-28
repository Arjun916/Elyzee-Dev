<cms:set success_msg = "<cms:get_flash 'success_msg' />" />
<cms:set message_value = "<cms:get_flash 'message_value' />" />
<cms:if success_msg && message_value>

<div class="toast show w-100 align-items-center text-bg-<cms:if success_msg eq '1'>success<cms:else/>danger</cms:if> border-0 p-2 mb-2" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
	<i class="my-1 fas fa-<cms:if success_msg eq '1'>check-circle<cms:else/>exclamation-circle</cms:if> "></i>
    <div class="toast-body py-0 mx-2 w-100">
      <cms:show message_value/>
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
</cms:if>