<?php require_once('manage/cms.php' ); ?>
<cms:template title='CSVExporter' executable='0' hidden='1' order="100001"/>
<cms:if k_user_access_level lt '10' ><cms:redirect url="<cms:show_with_lc k_site_link />" /></cms:if>
<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<cms:set mystart="<cms:gpc 'import' method='get' />" />
    
    <cms:if mystart >
    
        <cms:pages 
            masterpage='book-appointment.php' 
            paginate='1' 
            limit='500'
			page_name = "NOT default-page-for-book-appointment-php"
			show_unpublished='1'
			orderby='page_date' order='desc'
        >
        
            <cms:if k_paginated_top >
                <cms:if k_current_page='1'>
                    <!-- Header. 'truncate' starts a new file -->
                    <cms:write 'my.csv' add_newline='1' truncate='1'>Full Name, Email, Phone, Appointment Date, Specialty, Doctor, Any notes for the doctor's office, Submitted Date, How did you hear about us</cms:write>
                </cms:if>
            
                <cms:if k_paginate_link_next >
                    <script language="JavaScript" type="text/javascript">
                        var myVar;
                        myVar = window.setTimeout( 'location.href="<cms:show k_paginate_link_next />";', 100 );
                    </script>
                    <button onclick="clearTimeout(myVar);">Stop</button>
                <cms:else />
                    <cms:set write_footer='1' />
                    Done!    
                </cms:if>
                
                <h3><cms:show k_current_page /> / <cms:show k_total_pages /> pages (Total <cms:show k_total_records /> records. Showing <cms:show k_paginate_limit /> records per page)</h3>
					
	                <table class="table table-striped-columns table-hover table-bordered  table align-middle">
	                    <thead>
	                        <tr>
								<th scope="col">No</th>
								<th scope="col">Full Name</th>
								<th scope="col">Email</th>
								<th scope="col">Phone</th>
								<th scope="col">Appointment Date</th>
								<th scope="col">Speciality</th>
								<th scope="col">Doctor</th>
								<th scope="col">Notes</th>
								<th scope="col">Submitted Date</th>
								<th scope="col">CRM Lead</th>
	                        </tr>
	                    </thead>
	                    <tbody class="table-group-divider">
            </cms:if>
			
			
             <tr>
                 <th scope="row"><cms:show k_current_record /></th>
				 <td><cms:show k_page_title /></td>
				 <td><cms:show user_email /></td>
				 <td><cms:show user_phone /></td>
				 <td><cms:show appointment_date/></td>
				 <td><cms:show speciality /></td>
				 <td><cms:show doctor /></td>
				 <td><cms:show user_message /></td>
				 <td><cms:date page_date format='d M Y, h:i a' /></td>
				 <td><cms:show crm_lead_id /></td>
			<tr>  
                <!-- CSV row -->
                <cms:write 'my.csv' add_newline='1'><cms:format_csv k_page_title/>,<cms:format_csv user_email/>,<cms:format_csv user_phone/>,<cms:format_csv appointment_date/>,<cms:format_csv speciality/>, <cms:format_csv doctor/>,<cms:format_csv user_message/>,<cms:format_csv page_date/>, <cms:format_csv reach_source/></cms:write>

            <cms:if k_paginated_bottom >
                <hr>
                
                <!-- Footer -->
                <cms:if write_footer>
                    <!-- CSV does not require a footer so doing nothing here but for XML this could be used to output the document closing tags -->
                <cms:else />
	                        <tr>
	                            <td></td>
	                            <td colspan='10'>
	                                <cms:paginator simple='1' />
	                            </td>
	                        </tr>
	                    </tbody>
	                </table>

                </cms:if>    
            </cms:if>
            
        </cms:pages>    
    <cms:else/>
        <button onclick='location.href="<cms:add_querystring k_page_link 'import=1' />"'>Start!</button>
    </cms:if>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
	</body>
	</html>	
<?php COUCH::invoke(); ?>