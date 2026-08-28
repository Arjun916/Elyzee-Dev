<cms:pages masterpage="hubspace/events.php" show_unpublished='1' page_name=rt_page_name limit='1'>
<div class="position-relative">
<cms:set event_page_link = k_page_link 'global'/>
<cms:embed 'hubspace/events/event_status.inc'/>	
<cms:if is_event_active && is_event_active eq '1'>

	<cms:set curr_main_template_name  = "hubspace/events.php" 'global'/>
	<cms:set curr_form_template_name  = "hubspace/attendees.php" 'global'/>
	<cms:set has_event_page = '1' 'global'/>
	<cms:set event_page_id = k_page_id 'global'/>
	<cms:set event_page_name = k_page_name 'global'/>
	<cms:set event_page_title = k_page_title 'global'/>

	<cms:if rt_page_id && (rt_page_id gt '0')>
		<cms:pages masterpage="hubspace/attendees.php" show_unpublished='1' id=rt_page_id limit='1'>
			<cms:set has_attendee_page = '1' 'global'/>
			<cms:set attendee_page_id = k_page_id 'global'/>
			<cms:set attendee_page_name = k_page_name 'global'/>
			<cms:set attendee_page_title = k_page_title 'global'/>
			<cms:set attendee_crm_lead_id = crm_lead_id 'global'/>
			<cms:no_results><cms:set new_attendee = '1' 'global'/></cms:no_results>
		</cms:pages>
	<cms:else/>
		<cms:set new_attendee = '1' 'global'/>
	</cms:if>
	
	<cms:if attendee_crm_lead_id && attendee_crm_lead_id ne ''><cms:redirect url=event_page_link /></cms:if>

	
	<cms:form name="attendee" masterpage=curr_form_template_name
		mode="<cms:if has_attendee_page && attendee_page_id>edit<cms:else/>create</cms:if>"
		page_id = "<cms:if has_attendee_page && attendee_page_id><cms:show attendee_page_id/></cms:if>"
		enctype='multipart/form-data' role='form' method='post' anchor='0' class="card border-top border-0 border-4 border-<cms:if has_attendee_page && attendee_page_id>danger<cms:else/>primary</cms:if>">
		
		<cms:if k_success >
				
			<cms:set is_update="<cms:gpc 'do_save'/>"/>
			<cms:set is_delete="<cms:gpc 'do_delete'/>"/>
				
			<cms:if is_update && is_update eq '1'>
				<cms:capture into='speciality_value' 'global'><cms:php>if (!empty($_POST['speciality_list'])) {  echo implode(', ', $_POST['speciality_list']);}</cms:php></cms:capture>
					
				<cms:capture into='doctor_value' 'global'><cms:php>if (!empty($_POST['doctor_list'])) {  echo implode(', ', $_POST['doctor_list']);}</cms:php></cms:capture>
					
				<cms:db_persist_form
					_invalidate_cache='0'
					_auto_title='0'
					k_page_title="<cms:show frm_attendee_name/>"
					related_event = event_page_name
					page_date = "<cms:date format='Y-m-d H:i:s'/>"
					doctors = doctor_value
					owner_name = frm_owner_name
					speciality = speciality_value/>

					<cms:if k_success>
						<cms:set_session name='curr_log_user' value=frm_owner_name />
						<cms:set_flash name='success_msg' value='1' />
						<cms:set_flash name='message_value' value="<cms:if has_attendee_page && attendee_page_id>Attendee details updated successfully!<cms:else/>New Attendee details added successfully!</cms:if>" />
						<cms:redirect url=event_page_link />
					</cms:if>
					
				<cms:else/>
					<cms:set_flash name='success_msg' value='2' />
					<cms:set_flash name='message_value' value="Attendee information deleted successfully" />
					<cms:db_delete_form />           
					<cms:redirect url=event_page_link />
				</cms:if>
			</cms:if>
			

			<div class="card-header bg-light p-3 p-md-5 mb-3">
				<h5 class="mb-0 d-block ">
					<i class="fa-solid fa-<cms:if has_attendee_page && attendee_page_id>user-pen<cms:else/>clipboard-user</cms:if> me-2"></i>
					<cms:if has_attendee_page && attendee_page_id>Edit <cms:else/>Add New </cms:if>Attendee<cms:if has_attendee_page && attendee_page_id> Details</cms:if>
				</h5>
				<span class="text-muted">To event: </span> <a href="<cms:show event_page_link/>" class="h6 mt-2 m-0 text-<cms:if has_attendee_page && attendee_page_id>danger<cms:else/>primary</cms:if>"><cms:show event_page_title/></a>
		
				<div class="form-group mt-3">
					<div class="input-group w-100"> <span class="input-group-text bg-transparent text-danger small"><i class="fa-solid fa-user-shield small me-1"></i> <small>Created By (Staff) *</small></span>
					<cms:input class="form-control form-control-sm <cms:if k_error_owner_name>is-invalid</cms:if>" id="owner_name" name="owner_name" type="bound"  label="Created by" validator_msg="required=<cms:get 'locale.field_cannot_left_empty'/>" value="<cms:if frm_owner_name><cms:show frm_owner_name/><cms:else_if owner_name/><cms:show owner_name/><cms:else/><cms:get_session 'curr_log_user' /></cms:if>" placeholder="Enter staff (your) full name" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
					</div>
					<cms:if k_error_owner_name><div class="invalid-feedback d-block"> <cms:show k_error_owner_name/></div></cms:if>
				</div>
			
			
			</div>
			
			
			
			<div class="card-body py-0 px-3 px-md-5">
			
			<cms:embed 'common/form_error_block.html'/>
			<cms:embed 'hubspace/flash_block.inc'/>
			
				<fieldset class="row form-group bg-light rounded shadow-sm mb-3">
				<legend class="col-12 lead my-3 text-muted">Attendee - Basic Details</legend>
				<div class="col-12 col-md-6 form-group mb-3">
					<label for="f_attendee_name" class="form-label">Full Name <span class="text-danger">*</span></label>
					<div class="input-group">
						<span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>				
						<cms:input type='bound' label="Attendee Full Name" name='attendee_name' class="form-control <cms:if k_error_attendee_name>is-invalid</cms:if>" id="attendee_name" placeholder="Required*" required='1' validator_msg="required=<cms:get 'locale.field_cannot_left_empty'/>" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
					</div>
					<cms:if k_error_attendee_name><div class="invalid-feedback d-block">* <cms:show k_error_attendee_name/></div></cms:if>
				</div>
			
				<div class="col-12 col-md-6 form-group mb-3">
				<label for="f_attendee_gender" class="form-label">Gender <span class="text-danger">*</span></label>
				<div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-solid fa-mars-and-venus"></i></span>
					<cms:input class="form-select <cms:if k_error_attendee_gender>is-invalid</cms:if>" id="attendee_gender" name="attendee_gender" type="bound"  label="Gender"/>
				</div>
				<cms:if k_error_attendee_gender><div class="invalid-feedback d-block">* <cms:show k_error_attendee_gender/></div></cms:if>
				</div>
						
				<div class="col-12 col-md-6 form-group mb-3">
				<label for="f_attendee_phone" class="form-label">Mobile Number <span class="text-danger">*</span></label>
				<div class="input-group">
					<span class="input-group-text bg-transparent"><i class='bx  bx-phone'></i></span>
					<cms:input dir="ltr" type="bound" name='attendee_phone' id='attendee_phone' class="form-control text-lowercase <cms:if k_error_owner_phone_primary >is-invalid</cms:if>" placeholder="<cms:get 'locale.eg'/> 9715xxxxxxxx" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" label="Attendee Mobile Number" inputmode="numeric" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
				</div>
				<cms:if k_error_attendee_phone>
				<div class="invalid-feedback d-block">* <cms:show k_error_attendee_phone/>. <cms:get 'locale.eg'/> 971500000000</div>
				<cms:else/><small class="d-block">(<cms:get "locale.valid_phone_format_info"/>)</small>
				</cms:if>
				</div>
				
				<div class="col-12 col-md-6 form-group mb-3">
				<label for="f_attendee_email" class="form-label">Email Address <span class="text-primary">*</span></label>
				<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bx-envelope'></i></span>
					<cms:input class="form-control <cms:if k_error_attendee_email>is-invalid</cms:if>" id="attendee_email" name="attendee_email" type="bound" placeholder="eg: abc@abc.com" label="Attendee Email" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
				</div>
				<cms:if k_error_attendee_email><div class="invalid-feedback d-block">* <cms:get "locale.enter_valid_email"/></div></cms:if>
				</div>
		
				<div class="col-12 col-md-6 form-group mb-3">
				<label for="f_attendee_designation" class="form-label">Designation</label>
				<div class="input-group">
					<span class="input-group-text bg-transparent"><i class='bx  bx-briefcase-alt'></i></span>	
					<cms:input type='bound' label="Attendee Designation" class="form-control" name='attendee_designation' placeholder="eg: HR Manager" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
				</div>
				</div>
				
				<div class="col-12 col-md-6 form-group mb-3">
					<label for="f_attendee_language" class="form-label d-block">Language Preference</label>
					<div class="input-group"> <span class="input-group-text"><i class="fa-solid fa-language"></i></span>
					<cms:input class="form-select" id="attendee_language" name="attendee_language" type="bound"  label="Language Preference"/>
					</div>
				</div>
				</fieldset>							
		

				<fieldset class="row form-group bg-light rounded shadow-sm mb-3">
				<legend class="col-12 lead my-3 text-muted">Attendee - Location Details</legend>
				<div class="col-12 col-md-6 form-group mb-3">
					<label for="f_attendee_nationality" class="form-label">Nationality <span class="text-primary">*</span></label>
					<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx  bx-globe'></i></span>
						<cms:input class="form-select" id="attendee_nationality" name="attendee_nationality" type="bound"  label="Nationality"/>
					</div>
				</div>

				<div class="col-12 col-md-6 form-group mb-3">
					<label for="f_attendee_city" class="form-label">City or Emirate <span class="text-primary">*</span></label>
					<div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-solid fa-location-dot"></i></span>
						<cms:input class="form-control" id="attendee_city" name="attendee_city" type="bound"  label="City or Emirate" placeholder="eg: Abu Dhabi" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
					</div>
				</div>
				
				<div class="col-12 form-group mb-3">
					<label for="f_attendee_street" class="form-label">Detailed Location</label>
					<div class="input-group"><span class="input-group-text bg-transparent"><i class="fa-solid fa-street-view"></i></span>
						<cms:input class="form-control" id="attendee_street" name="attendee_street" type="bound"  label="City or Emirate" placeholder="eg: Al Mushrif, Abu Dhabi" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
					</div>
				</div>
				</fieldset>		
		
		
		
		
		<fieldset class="row form-group bg-light rounded shadow-sm mb-3">
		<legend class="col-12 lead my-3 text-muted">Attendee - Preferences</legend>
		<div class="col-md-6 form-group mb-3">
			<label for="speciality_list" class="form-label"><i class='fa-solid fa-stethoscope'></i> Preferred Departments <span class="text-primary">*</span></label>
			<select name="speciality_list[]" id="speciality_list" class="js-multiple-select form-control" multiple="multiple" title='Departments' autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off">
			<cms:folders masterpage='services.php' depth='1' extended_info='1' include_custom_fields='1' orderby='weight' order='asc'><option <cms:each speciality_value sep=', '><cms:if item eq title_en>selected</cms:if></cms:each>><cms:show title_en/></option></cms:folders>
			</select>
		</div>

		<div class="col-md-6 form-group mb-3">
			<label for="doctor_list" class="form-label"><i class='fa-solid fa-user-doctor'></i> Preferred Doctors</label>
			<select name="doctor_list[]" id="doctor_list" class="js-multiple-select form-control" multiple="multiple" title='Doctors' autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off">
			<cms:pages masterpage='doctors.php' orderby='weight' order='asc'>
			<option <cms:each doctor_value sep=', '><cms:if item eq title_en>selected</cms:if></cms:each>><cms:show title_en/></option>
			</cms:pages>
			</select>
		</div>
							
		<div class="col-12 form-group mb-3">
			<label for="f_note" class="form-label"><i class='bx  bx-message-detail'></i>  Any additional note? <span class="text-primary">*</span></label>
			<cms:input type='bound' label="Any additional note" placeholder="Any notes, services, procedure, info, etc." class="form-control" name='note' id="note" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off"/>
		</div>
		
		<div class="col-12 col-md-6 form-group mb-3">
			<label for="f_attendee_existing" class="form-label d-block">Existing patient at Elyzee? <span class="text-primary">*</span></label>
			<div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-solid fa-circle-exclamation"></i></span>
			<cms:input id="attendee_existing" class="form-select" name="attendee_existing" type="bound" label="Existing patient at Elyzee?"/>
			</div>
		</div>
		</fieldset>
		
		</div>		
				
		<div class="card-footer bg-light p-3 p-md-5">
			<div class="d-flex justify-content-between">
				<a class="btn btn-secondary" href="<cms:show event_page_link/>">Cancel</a>

				<button type="submit" name="do_save" value="1" class="btn btn-<cms:if has_attendee_page && attendee_page_id>danger<cms:else/>primary</cms:if> text-uppercase"><cms:if has_attendee_page && attendee_page_id>Update<cms:else/>Save</cms:if> Details</button>
			</div>
			<cms:if has_attendee_page && attendee_page_id>
				<div class="alert alert-warning mt-5 text-center">
					This attendee is no longer required.
					<a href="#" class="btn btn-link btn-sm p-0 m-0 text-danger" data-bs-toggle="modal" data-bs-target="#confirmAttendeeDeleteModal">Remove?</a>
					<small class="text-muted d-block"><i class="fa fa-warning"></i> You will asked to confirm the deletion!</small>
				</div>

				<div class="modal fade" id="confirmAttendeeDeleteModal" tabindex="-1" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title">Confirm delete</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					  </div>

					  <div class="modal-body">
						Are you sure you want to delete this attendee information?<br>
						<strong>This action cannot be undone and the details will be lost.<strong>
					  </div>

					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>

						<button type="submit" name="do_delete" value='1' class="btn btn-danger btn-sm"><i class='fa fa-sm fa-trash'></i> Yes, Delete</button>
					  </div>
					</div>
				  </div>
				</div>
			</cms:if>
		</div>
	</cms:form>

	<cms:no_results><cms:route_link 'home_view' masterpage=curr_main_template_name/></cms:no_results>
<cms:else/><cms:redirect url=event_page_link /></cms:if>
</div>
</cms:pages>