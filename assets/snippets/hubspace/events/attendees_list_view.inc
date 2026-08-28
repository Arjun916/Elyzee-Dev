<div class="card-body bg-light">
		<div class="card-title d-flex justify-content-between mb-3">
		<p class="lead m-0">Attendees</p>
		<cms:if is_event_active && is_event_active eq '1'>
		<a class="btn btn-primary btn-sm" href="<cms:route_link 'add_attendee' masterpage=k_template_name rt_page_name=k_page_name/>"><i class="fa-solid fa-user-plus small"></i>Add new</a>
		</cms:if>
		</div>
		<div class="table-responsive">
			<table id="attendees_table" class="table table-striped table-hover table-bordered dt-responsive nowrap"
			data-message-top="Event Location: <cms:show venue_name/>, <cms:if event_city><cms:show event_city/>, </cms:if><cms:show event_country/> | Event Date: <cms:date event_start_date format="d M Y"/><cms:if event_end_date ne event_start_date> to <cms:date event_end_date format="d M Y"/></cms:if>"
			data-message-bottom="Generated from Elyzee Internal System on <cms:date format='%F %H-%M-%S'/> by <cms:show k_user_title/>"
			<cms:if k_user_access_level ge '7'>data-export="1"</cms:if>
			data-export-title="<cms:show k_page_title/> - Attendees Report - <cms:date format='%F %H-%M-%S'/>">
				<thead>
					<tr>
						<th>Name</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Designation</th>
						<th>Preferred Speciality</th>
						<th>Preferred Doctors</th>
						<th>Additional note</th>
						<th>Nationality</th>
						<th>City</th>
						<th>Preferred Language</th>
						<th>Existing Elyzee Patient?</th>
						<th>Related Event</th>
						<th>Captured Date</th>
						<th>Captured by</th>
						<th>CRM Lead ID</th>
						<th>CRM Lead Date</th>
						<th>CRM Lead by</th>
					</tr>
					</thead>
					<tbody>
					<cms:pages masterpage="hubspace/attendees.php" show_unpublished='1' show_future_entries='1' page_name="NOT default-page-for-hubspace-attendees-php" custom_field="related_event=<cms:show rt_page_name/>">
							<tr data-id="<cms:show k_page_id/>" data-lead-id="<cms:show crm_lead_id/>">
								
								<td><cms:show attendee_name/></td>
								<td><cms:show attendee_phone/></td>
								<td><cms:show attendee_email/></td>
								<td><cms:show attendee_gender/></td>
								<td><cms:show attendee_designation/></td>
								<td><cms:show speciality/></td>
								<td><cms:show doctors/></td>
								<td><cms:show note/></td>
								<td><cms:show attendee_nationality/></td>
								<td><cms:show attendee_city/></td>
								<td><cms:show attendee_language/></td>
								<td><cms:show attendee_existing/></td>
								<td><cms:pages masterpage="hubspace/events.php" show_unpublished='1'  show_future_entries='1' page_name=related_event limit='1' skip_custom_fields='0'><cms:show k_page_title/></cms:pages></td>
								<td><cms:show page_date/></td>
								<td><cms:show owner_name/></td>
								<td><cms:show crm_lead_id/></td>
								<td><cms:show crm_synced_on/></td>
								<td><cms:show crm_owner_name/></td>
							</tr>
					</cms:pages>
									
					</tbody>
					<tfoot>
						<tr>
						<th>Name</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Designation</th>
						<th>Preferred Speciality</th>
						<th>Preferred Doctors</th>
						<th>Additional note</th>
						<th>Nationality</th>
						<th>City</th>
						<th>Preferred Language</th>
						<th>Existing Elyzee Patient?</th>
						<th>Related Event</th>
						<th>Captured Date</th>
						<th>Captured by</th>
						<th>CRM Lead ID</th>
						<th>CRM Lead Date</th>
						<th>CRM Lead by</th>
						</tr>
					</tfoot>
							</table>
						</div>
					
	</div>
	
	
	<div class="offcanvas offcanvas-end" tabindex="-1" id="attendeeCanvas">
		<div class="offcanvas-header shadow-sm">
		<h5 class="offcanvas-title">Attendee Details</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
		</div>

		<div class="offcanvas-body bg-light" id="attendeeCanvasBody">
   
		</div>
		<div class="offcanvas-footer border-top p-3 text-end">
	
		  <div class="alert alert-info text-start" id="attendeeLockInformation"><p class="fw-bold m-0"><i class="fa fa-lock"></i> CRM Lead Created</p>
		  This attendee details are locked as it has already been pushed to the CRM.
		  <small class="text-muted d-block mt-2"><i class="fa fa-warning"></i> Further edits are disabled!</small></div>
		  <a class="btn btn-primary" id="btnEditAttendee" data-base="<cms:show k_template_link/><cms:show k_page_name/>/edit_attendee/" href=""><i class="fa fa-edit"></i> Edit Details</a>
		</div>
	</div>
