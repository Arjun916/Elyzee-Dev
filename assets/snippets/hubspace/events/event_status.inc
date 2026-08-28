<div class="position-absolute top-0 start-0 translate-middle ms-5 z-1">
<cms:if event_status eq 'Inactive'>
	<span class="badge text-bg-secondary"><cms:show event_status/></span>
<cms:else/>
	<cms:set compare_event_end_date="<cms:date event_end_date format='Y-m-d' />" />
	<cms:if compare_event_end_date lt "<cms:date format='Y-m-d' />" >
		<span class="badge text-bg-danger">Ended</span>
	<cms:else/>
		<span class="badge text-bg-success"><cms:show event_status/></span>
		<cms:set is_event_active = '1' 'global'/>
	</cms:if>
</cms:if>
</div>