
	<div class="card-title d-flex justify-content-between mb-3">
		<p class="lead m-0">All Events</p>
		<cms:if k_user_access_level ge '4'>
		<a class="btn btn-primary btn-sm" href="<cms:route_link 'create_view' masterpage=k_template_name/>"><i class="fa-solid fa-plus small"></i>Add new event</a>
		</cms:if>
		</div>
		
<hr/>
<cms:embed 'hubspace/flash_block.inc'/>
<div class="row">
	<cms:pages masterpage='hubspace/events.php' show_unpublished = '1' show_future_entries='1' page_name="NOT default-page-for-hubspace-events-php" base_link=k_template_link paginate='1' limit='18'  orderby='event_start_date, event_status' order='desc'>
		<cms:embed 'hubspace/events/event_tile.inc'/>
		<cms:no_results><div class="alert alert-warning"><i class="fa-solid fa-warning me-1"></i>No events found</div></cms:no_results>
	</cms:pages>
</div>