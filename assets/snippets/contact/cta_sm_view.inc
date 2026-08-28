		<section class="cta_mini position-relative bg-black">
	    <div class="container py-2 ">
	      <div class="row cs_cta_in py-3 wow fadeInUp">
	        <div class="col-md cs_cta_left">
	         
	          <div class="cs_cta_info d-flex justify-content-start align-items-center w-100">
				
				<div class="cta_content ps-md-2 ps-lg-5 ms-xl-5 text-center text-md-start w-100">
	            <h2 class="cs_cta_title"><cms:show orgtagline/></h2>
	            <p class="cs_cta_subtitle"><cms:show orgtaglinedesc/></p>
				</div>
	          </div>
	        </div>
	        <div class="col-md-auto cs_cta_right text-center mt-3 pt-3 pt-md-0">
          <a class="btn-dark mx-3 btn-sm" href="tel:<cms:show primaryphone/>">
            <i class="fa-solid fa-phone me-2"></i>  
			 <span><cms:show primaryphone/></span>
          </a>
		  
	          <a class="btn-default btn-highlighted d-none d-lg-inline" href="<cms:link 'book-appointment.php'/>">
	            <span><cms:get "locale.book_appointment"/></span>
				
			</a>
	        </div>
	      </div>
	    </div>
	    <div class="cs_cta_shape"></div>
	  </section>