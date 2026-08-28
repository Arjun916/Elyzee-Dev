<div class="col-md-6 col-lg-4">
		<div class="card">
			<div class="card-header p-3">
				<h5 class="card-title"><cms:show k_page_title/></h5>
			</div>
			<div class="card-body p-3 position-relative">
			
			<cms:embed 'hubspace/events/event_status.inc'/>
			
			<ul class="list-group list-group-flush">
				<li class="list-group-item d-flex justify-content-start"><i class="fa-solid fa-calendar-week me-1 mt-1 text-primary"></i>
				<p class="m-0"><cms:date event_start_date format='d M, Y'/>
				<cms:if event_start_date ne event_end_date><span class="text-muted"> to </span><cms:date event_end_date format='d M, Y'/></cms:if></p>
				</li>
				<li class="list-group-item d-flex justify-content-start"><i class="fa-solid fa-street-view me-1 mt-1 text-primary"></i><cms:show venue_name/></li>
				<li class="list-group-item d-flex justify-content-start"><i class="fa-solid fa-location-dot me-1 mt-1 text-primary"></i><cms:if event_location><cms:show event_location/>, </cms:if>
				<cms:if event_city><cms:show event_city/>, </cms:if>
				<cms:show event_country/></li>
			</ul>
			</div>
			<div class="card-footer d-flex justify-content-between  p-3">
				<a href="<cms:show k_page_link/>" class="card-link"><i class="fa-solid fa-share me-1"></i>View Details</a>
				<cms:if is_event_active && is_event_active eq '1'>
				<a href="<cms:route_link 'add_attendee' masterpage=k_template_name rt_page_name=k_page_name/>" class="card-link"><i class="fa-solid fa-user-plus me-1"></i>Add Attendee</a>
				</cms:if>
				<cms:set is_event_active = '0' 'global'/>
			</div>
		</div>
	</div>