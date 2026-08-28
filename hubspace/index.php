<?php require_once( '../manage/cms.php' ); ?>
<cms:template title='Dashboard' parent='_hubspace_' order="5000" access_level='2' hidden='1'/>

<cms:set is_secured_page='1' 'global'/>		

<cms:trim "<cms:embed 'hubspace/header.inc' />"/>
<cms:trim "<cms:embed 'hubspace/breadcrumbs.inc' />"/>	

  <div class="dash-wrapper dash-header bg-black">
                 <div class="row row-cols-2">
					 <div class="col border-end border-secondary-2">
						 <div class="card bg-transparent shadow-none mb-0">
							 <div class="card-body text-center">
                                <p class="mb-1 text-light">Total<br>Events</p>  
								<h3 class="my-3 text-white"><cms:pages masterpage="hubspace/events.php" show_unpublished='1' page_name="NOT default-page-for-hubspace-events-php" count_only='1'/></h3>
							 </div>
						 </div>
					 </div>
					 <div class="col">
						<div class="card bg-transparent shadow-none mb-0">
							<div class="card-body text-center">
							   <p class="mb-1 text-light">Total<br>Attendees</p>  
							   <h3 class="my-3 text-white"><cms:pages masterpage="hubspace/attendees.php" show_unpublished='1' page_name="NOT default-page-for-hubspace-attendees-php" count_only='1'/></h3>
							</div>
						</div>
					</div>					
				 </div><!--end row-->
			 </div>

			  <div class="row">
				  <div class="col-12">
                     <div class="card p-3 bg-dark">
					 
					 <div class="card-header d-flex justify-content-between">
							<h5 class="card-title m-0 text-light">Active Events</h5>
							<cms:if k_user_access_level ge '4'>
							<a class="btn btn-primary btn-sm" href="<cms:route_link 'create_view' masterpage='hubspace/events.php'/>"><i class="fa-solid fa-plus small"></i>Add new event</a>
							</cms:if>
		
					</div>
						 <div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									
								</div>
							</div>
                            <div class="card-body">
								<div class="row">
									<cms:set curr_date_comparison="<cms:date format='Y-m-d' />"/>
									<cms:pages masterpage='hubspace/events.php' show_unpublished = '1' show_future_entries='1' page_name="NOT default-page-for-hubspace-events-php" custom_field="event_status==Active | event_end_date >= <cms:show curr_date_comparison/>" orderby='event_start_date, event_status' order='desc'>
											<cms:embed 'hubspace/events/event_tile.inc'/>
											<cms:no_results><div class="alert alert-warning"><i class="fa-solid fa-warning me-1"></i>No active events found <a class="text-link ms-1" href="<cms:link 'hubspace/events.php'/>">(View all events)</a></div></cms:no_results>
									</cms:pages>
								</div>
							
							</div>
						 </div>
					 </div>
				  </div>
			  </div><!--end row-->

<cms:trim "<cms:embed 'hubspace/footer.inc' />"/>	
<?php COUCH::invoke(); ?>