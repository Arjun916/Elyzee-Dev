	<cms:capture into="crm_lead_pending_count"><cms:pages masterpage="hubspace/attendees.php" show_future_entries='1' custom_field="related_event=<cms:show rt_page_name/>" count_only='1'/></cms:capture>
	<cms:if crm_lead_pending_count && crm_lead_pending_count gt'0'>

	<cms:set crm_push_start="<cms:gpc 'generate' method='get' />" />
    <cms:set curr_page_link = "<cms:route_link masterpage=k_template_name 'crm_update' rt_page_name=rt_page_name/>"/>
    <cms:if crm_push_start >
			
		<cms:embed 'hubspace/events/attendees_generate_crm_leads.inc'/>
    <cms:else/>
		<cms:embed 'hubspace/flash_block.inc'/>
		

		<div class="alert alert-warning">
			<h4>Push to CRM?</h4>
			<p class="lead">You have <b><cms:show crm_lead_pending_count/></b> pending lead(s) waiting to be pushed to the CRM. Would you like to proceed now?</p>
			
			<a class="btn btn-secondary btn-sm" href="<cms:route_link masterpage=k_template_name 'page_view' rt_page_name=rt_page_name rt_format=".html" />">Cancel</a>
			<a class="btn btn-danger btn-sm fw-bold" href="<cms:add_querystring curr_page_link 'generate=1' />">Yes, Push Leads to CRM</a>
		</div>
		
       
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>Name</th>
						<th>Mobile</th>
						<th>Gender</th>
						<th>Related Event</th>
						<th>Captured Date</th>
					</tr>
					</thead>
					<tbody>
					<cms:pages masterpage="hubspace/attendees.php" show_future_entries='1' custom_field="related_event=<cms:show rt_page_name/>">
							<tr>
								<td><cms:show attendee_name/></td>
								<td><cms:show attendee_phone/></td>
								<td><cms:show attendee_gender/></td>
								<td><cms:pages masterpage="hubspace/events.php" show_unpublished='1'  show_future_entries='1' page_name=related_event limit='1' skip_custom_fields='0'><cms:show k_page_title/></cms:pages></td>
								<td><cms:date page_date format='d M Y H:i:s'/></td>
							</tr>
					</cms:pages>
									
					</tbody>
					<tfoot>
						<tr>
						<th>Name</th>
						<th>Mobile</th>
						<th>Gender</th>
						<th>Related Event</th>
						<th>Captured Date</th>
						</tr>
					</tfoot>
				</table>
						</div>
						
    </cms:if>
	
	<cms:else/>
		<div class="alert alert-success">
			<h5>No Pending Leads to be pushed to the CRM</h5>
			<p>All attendee information for this event has already been added to the CRM, and leads have been generated.</p>
			<a class="btn btn-secondary btn-sm" href="<cms:route_link masterpage=k_template_name 'page_view' rt_page_name=rt_page_name rt_format=".html" />">Go back to Event Details</a>
			
		</div>
	</cms:if>