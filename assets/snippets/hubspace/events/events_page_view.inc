<cms:pages masterpage="hubspace/events.php" page_name=rt_page_name show_unpublished='1' limit-='1'>
<div class="card p-2 position-relative">
	
	<cms:embed 'hubspace/events/event_status.inc'/>
	
	
	<div class="card-header">
		<div class="card-header-content d-flex align-items-center justify-content-between">
			<h5 class="card-title"><cms:show k_page_title/> <a data-bs-toggle="collapse" href="#event_details" role="button" class="card-link btn btn-primary btn-sm m-0 py-0 px-1 collapse-toggle"><i class="fa-solid fa-chevron-down me-0"></i> Details</a></h5>
			<div class="dropdown">
				<a class="btn btn-link btn-sm px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>

				<ul class="dropdown-menu">
					<cms:if k_user_access_level ge '4'>
					<li><a class="dropdown-item" href="<cms:route_link masterpage=k_template_name 'edit_view' rt_page_name=k_page_name/>"><i class="fa-solid fa-pen-to-square me-1"></i>Edit Event</a></li>
					<li><hr class="dropdown-divider"></li>
					<li><a class="dropdown-item text-danger" href="<cms:route_link masterpage=k_template_name 'crm_update' rt_page_name=k_page_name/>"><i class="fa-solid fa-arrows-rotate me-1"></i>Push Attendees to CRM</a></li>
					<li><hr class="dropdown-divider"></li>
					</cms:if>
					
					<cms:if k_user_access_level ge '7'>
					<li id="datatable_btn"><span class="text-muted px-3">Download Attendees</span></li>
					<li><hr class="dropdown-divider"></li>
					</cms:if>
					
					<li><a class="dropdown-item" href="<cms:show k_template_link/>">View All Events</a></li>
				</ul>
			</div>
		</div>

		<div class="collapse card-text p-0" id="event_details">
			<div class="alert alert-info">
			<p><i class="fa-solid fa-calendar-day me-1"></i><cms:date event_start_date format="d M Y"/><cms:if event_end_date ne event_start_date> to <cms:date event_end_date format="d M Y"/></cms:if></p>
			
			<p><i class="fa-solid fa-street-view me-1"></i><cms:show venue_name/>, <cms:if event_city><cms:show event_city/>, </cms:if><cms:show event_country/>
			<cms:if event_venue_notes><br><i class="fa-solid fa-road-circle-check me-1"></i><cms:show event_venue_notes/></cms:if>
			</p>
			
			<cms:if event_notes><p><i class="fa-solid fa-file-pen me-1"></i><strong>Notes:</strong><br>
			<cms:show event_notes/></p></cms:if>
			
			
			<cms:if event_type ne '-'><small class="badge badge-pill bg-secondary"><cms:show event_type/></small></cms:if>
			<cms:if event_category ne '-'><small class="badge badge-pill bg-secondary"><cms:show event_category/></small></cms:if>
			<cms:if event_objective ne '-'><small class="badge badge-pill bg-secondary"><cms:show event_objective/></small></cms:if>
			</div>
		</div>
	</div>
	<cms:embed 'hubspace/flash_block.inc'/>
	<cms:embed "hubspace/events/attendees_list_view.inc"/>
</div>

<cms:no_results><cms:redirect k_template_link/></cms:no_results>	
					
</cms:pages>