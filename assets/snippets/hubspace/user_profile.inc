<div class="row">
<div class="col-md-12">
<div class="alert alert-primary text-center">
<i class="fa-solid fa-check-double me-2"></i> This profile is part of Elyzee’s internal system and is visible only to authorized staff.
</div>
</div>
<div class="col-md-6">
<div class="card pt-5">
	<div class="card-body text-center">
		<i class="fa-solid fa-circle-user uer-img fa-2xl"></i>
		<h4 class="mt-3"><cms:show k_user_title/></h4>
		<p class="text-secondary mb-1">(<cms:show k_user_email/>)</p>
		
		
	</div>
	
	<div class="card-footer text-center">
		<a class="my-3 btn btn-primary btn-sm" href="<cms:show k_logout_link />"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
	</div>
	</div>
</div>

<div class="col-md-6">
	<div class="card pt-5">
	<div class="card-body text-center">
	For any support email to <a href="mailto:itsupport@elyzee.ae" target="_blank" class="d-block mb-3 text-center"> itsupport@elyzee.ae</a>
	</div>
	
	<div class="card-footer">
		<div class="d-flex flex-column align-items-center text-center">
		<cms:trim "<cms:embed 'common/sociallinks.inc' />"/>
		<a href="<cms:show k_site_link/>" target="_blank" class="mt-3 d-block mb-2 text-center"> Elyzee Hospital, Abu Dhabi, UAE</a>
		<a href="tel:009718005005" target="_blank" class="d-block mb-3 text-center"> 8005005</a>
		</div>
	</div>
	</div>
</div>

<div class="col-md-12">
	<div class="card alert alert-warning p-3">
	<div class="card-header mt-3">
	<h5 class=""><i class="fa-solid fa-user-lock me-2"></i> Confidentiality Notice</h5>
	</div>
	<div class="card-body">
		
<ul>
	<li>This portal is for authorized Elyzee staff only.</li>
	<li>Do not enter sensitive personal data unless required for business operations.</li>
	<li>Ensure appropriate consent is obtained before recording any personal contact details.</li>
	<li>Do not share logins, OTPs, or screenshots of internal records.</li>
	<li>Access and changes are monitored and logged.</li>
	<li>Users are responsible for the accuracy and lawful handling of the data they enter.</li>
	<li>Report any suspected data misuse to IT Support immediately.</li>
</ul>
	</div>
	
	<div class="card-footer bg-transparent">
	<p class="fw-bold mt-3"><i class="fa-solid fa-triangle-exclamation me-2"></i> By accessing and using this system, you acknowledge the above and confirm your obligation to strictly adhere to these requirements.</p>

	</div>
	
</div>						
</div>
					