<cms:if rt_page_name && (rt_page_name ne '')>
<cms:pages masterpage=k_template_name show_unpublished='1' page_name=rt_page_name limit='1'>
<cms:set has_event_page = '1' 'global'/>
<cms:set event_page_id = k_page_id 'global'/>
<cms:set event_page_name = k_page_name 'global'/>
<cms:set event_page_title = k_page_title 'global'/>
<cms:set event_page_link = k_page_link 'global'/>
<cms:set event_start_date = "<cms:date event_start_date format='Y-m-d'/>" 'global'/>
<cms:set event_end_date = "<cms:date event_end_date format='Y-m-d'/>" 'global'/>
<cms:no_results><cms:set new_event = '1' 'global'/></cms:no_results>
</cms:pages>
<cms:else/>
<cms:set new_event = '1' 'global'/>
</cms:if>	

	<cms:form name="new" masterpage=k_template_name
		mode="<cms:if has_event_page && event_page_id>edit<cms:else/>create</cms:if>"
		page_id = "<cms:if has_event_page && event_page_id><cms:show event_page_id/></cms:if>"
		enctype='multipart/form-data' role='form' method='post' anchor='0'
		class="card border-top border-0 border-4 border-<cms:if has_event_page && event_page_id>warning<cms:else/>success</cms:if>">
		
		<cms:if k_success >
			<cms:db_persist_form
			_invalidate_cache='0'
			_auto_title='0'
			k_page_title="<cms:show frm_event_title/>"
			event_start_date = "<cms:date frm_start_date format='Y-m-d H:i:s' />"
			event_end_date = "<cms:date frm_end_date format='Y-m-d H:i:s' />"
			k_publish_date='0000-00-00 00:00:00'
			/>

			<cms:if k_success>
				<cms:set_flash name='success_msg' value='1' />
				<cms:if has_event_page && event_page_id>
					<cms:set_flash name='message_value' value="Event updated successfully!" />
					<cms:redirect url="<cms:route_link masterpage=k_template_name 'edit_view' rt_page_name=event_page_name/>" />
				<cms:else/>
					<cms:set_flash name='message_value' value="New event added successfully!" />
					<cms:redirect url="<cms:route_link 'home_view' masterpage=k_template_name/>" />
				</cms:if>
			</cms:if>
		</cms:if>
		
		
		<div class="card-header p-3">
			<div class="card-title d-flex align-items-center mt-3">
				<i class="fa fa-clipboard-user me-1 font-22 text-<cms:if has_event_page && event_page_id>warning<cms:else/>success</cms:if>"></i>
				<h5 class="mb-0 text-<cms:if has_event_page && event_page_id>warning<cms:else/>success</cms:if>">
					<cms:if has_event_page && event_page_id>Update <cms:else/>Add New </cms:if>Event <cms:if has_event_page && event_page_id><cms:else/><span class="text-danger">*</span></cms:if>
				</h5>
			</div>
		</div>
		<div class="card-body px-5">
		<cms:embed 'common/form_error_block.html'/>
		<cms:embed 'hubspace/flash_block.inc'/>
		


		<fieldset class="row form-group bg-light rounded shadow-sm my-3">
		<legend class="col-12 lead my-3">Event - Basic Details</legend>
		<div class="col-12 form-group mb-3">
			<div class="input-group">
				<span class="input-group-text bg-transparent"><i class="fa-solid fa-ticket"></i><small class="ms-1 text-danger">*</small></span>				
				<cms:input type='bound' label="Event Title" title="Event Title" name='event_title' class="form-control <cms:if k_error_event_title>is-invalid</cms:if>" id="event_title" placeholder="Event Title *" required='1' validator_msg="required=<cms:get 'locale.field_cannot_left_empty'/>" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
			</div>
			<cms:if k_error_event_title><div class="invalid-feedback d-block">* <cms:show k_error_event_title/></div></cms:if>
		</div>
		
		
		<div class="col-md-4 form-group mb-3">
			<div class="input-group">
			<span class="input-group-text bg-transparent"><i class="fa-solid fa-circle-info"></i></span>	
			<cms:input type='bound' label="Event Type" class="form-select form-select-sm" name='event_type'/>
			</div>
		</div>
		<div class="col-md-4 form-group mb-3">
		<div class="input-group">
			<span class="input-group-text bg-transparent"><i class="fa-solid fa-circle-info"></i></span>	
			<cms:input type='bound' label="Event Category" class="form-control form-control-sm" name='event_category'/>
		</div></div>
		<div class="col-md-4 form-group mb-3">
		<div class="input-group">
			<span class="input-group-text bg-transparent"><i class="fa-solid fa-circle-info"></i></span>	
			<cms:input type='bound' label="Event Objective" class="form-control form-control-sm" name='event_objective'/>
		</div></div>

		 </fieldset>
		 
		 
<fieldset class="row form-group bg-light rounded shadow-sm my-3">
<legend class="col-12 lead my-3">Event - Date Range and Status</legend>
<div class="col-md-8 form-group mb-3">
	<div class="input-daterange input-group w-100">
	<span class="input-group-text bg-transparent"><i class="fa-solid fa-calendar-day"></i><small class="ms-1 text-danger">*</small></span>
    <cms:input type="text" label="Event Start Date" title="Event Start Date" class="input-sm form-control text-start <cms:if k_error_start_date || k_error_event_start_date>is-invalid</cms:if>" name="start_date" required='1' placeholder="Start Date * (yyyy-mm-dd)"
	value="<cms:if frm_start_date><cms:show frm_start_date/><cms:else_if event_start_date/><cms:show event_start_date/></cms:if>" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
    <span class="input-group-addon mx-2">to</span>
	<span class="input-group-text bg-transparent"><i class="fa-solid fa-calendar-days"></i><small class="ms-1 text-danger">*</small></span>
    <cms:input type="text" label="Event End Date" title="Event End Date" class="input-sm form-control text-start <cms:if k_error_end_date || k_error_event_end_date>is-invalid</cms:if>" name="end_date" placeholder="End Date (yyyy-mm-dd)"
	value="<cms:if frm_end_date><cms:show frm_end_date/><cms:else_if event_end_date/><cms:show event_end_date/></cms:if>" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
</div>
<cms:if k_error_start_date || k_error_end_date || k_error_event_start_date || k_error_event_end_date><div class="invalid-feedback d-block">* Enter valid dates</div></cms:if>
</div>

<div class="col-md-4 form-group mb-3">
		<div class="input-group">
		<span class="input-group-text bg-transparent"><i class="fa-solid fa-flag"></i><small class="ms-1 text-danger">*</small></span>	
		<cms:input type='bound' label="Event Status" class="form-select form-select-sm <cms:if k_error_event_status>is-invalid</cms:if>" name='event_status'/>
		</div>
		<cms:if k_error_event_status><div class="invalid-feedback d-block">* Required</div></cms:if>
		</div>
</fieldset>

	
<fieldset class="row form-group bg-light rounded shadow-sm my-3">
<legend class="col-12 lead my-3">Event - Venue Details</legend>
	
		
		<div class="col-12 form-group mb-3">
			<div class="input-group">
				<span class="input-group-text bg-transparent"><i class="fa-solid fa-building"></i><small class="ms-1 text-danger">*</small></span>				
				<cms:input type='bound' label="Venue Name" name='venue_name' class="form-control <cms:if k_error_venue_name>is-invalid</cms:if>" id="venue_name" placeholder="Venue Name *" required='1' validator_msg="required=<cms:get 'locale.field_cannot_left_empty'/>" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
			</div>
			<cms:if k_error_venue_name><div class="invalid-feedback d-block">* <cms:show k_error_venue_name/></div></cms:if>
		</div>
		
	<div class="col-12 col-md-6 form-group mb-3">
		<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx  bx-globe pe-1'></i>Country<small class="ms-1 text-danger">*</small></span>
			<cms:input class="form-select <cms:if k_error_event_country>is-invalid</cms:if>" id="event_country" name="event_country" type="bound"  label="Country" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
		</div>
		<cms:if k_error_event_country><div class="invalid-feedback d-block">* Required</div></cms:if>
	</div>

	<div class="col-12 col-md-6 form-group mb-3">
		<div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-solid fa-location-dot pe-1"></i>City<small class="ms-1 text-danger">*</small></span>
		<cms:input class="form-control <cms:if k_error_event_city>is-invalid</cms:if>" id="event_city" name="event_city" type="bound"  label="City or Emirate" placeholder="City or Emirate, eg: Abu Dhabi" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
		</div>
		<cms:if k_error_event_city><div class="invalid-feedback d-block">* Required</div></cms:if>
	</div>
	
	<div class="col-12 col-md-6 form-group mb-3">
		<div class="input-group"><span class="input-group-text bg-transparent"><i class="fa-solid fa-street-view pe-1"></i>Street</span>
		<cms:input class="form-control" id="event_location" name="event_location" type="bound"  label="Street" placeholder="Street or Area, eg: Al Mushrif" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
		</div>
	</div>
	
	<div class="col-12 col-md-6 form-group mb-3">
		<div class="input-group"><span class="input-group-text bg-transparent"><i class="fa-solid fa-road-circle-check"></i></span>
		<cms:input class="form-control" id="event_venue_notes" name="event_venue_notes" type="bound"  label="Location Notes" placeholder="Any Venue notes?" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
		</div>
	</div>
	
 </fieldset>

	<fieldset class="row form-group bg-light rounded shadow-sm my-3">
	<legend class="col-12 lead my-3">Event Notes or Additional Info</legend>								
	<div class="col-12 form-group mb-3">
		<cms:input type='bound' label="Event notes" placeholder="Any event notes, info, etc." class="form-control" name='event_notes' id="event_notes" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
	</div>
 </fieldset>	
</div>	
			
	<div class="card-footer d-flex justify-content-between p-3">
	<a class="btn btn-secondary" href="<cms:if has_event_page && event_page_id && event_page_link><cms:show event_page_link/><cms:else/><cms:show k_template_link/></cms:if>">Cancel</a>
	<button type="submit" class="btn btn-<cms:if has_event_page && event_page_id>warning<cms:else/>success</cms:if> text-uppercase"><cms:if has_event_page && event_page_id>Update<cms:else/>Add</cms:if> Event</button	
	</div>

	</cms:form>		