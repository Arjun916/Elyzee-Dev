<?php require_once("manage/cms.php"); ?>
<cms:template title='Redirections' clonable='0' executable='0' parent='_modules_' order='100'>

    <cms:repeatable name='redirections' label='Redirections' order='-1'>
        <cms:editable name='match' label='Match' type='dropdown' opt_values='Simple=simple | RegEx=regex' opt_selected='simple' col_width='100' />
        <cms:editable name='uri' label='URI' type='text' no_xss_check ='1' required='1' validator='kredirector::validate_match' />
        <cms:editable name='redirect' label='Redirect' type='dropdown' opt_values='Temporary=temporary | Permanent=permanent' opt_selected='temporary' col_width='120' />
        <cms:editable name='to' label='To' type='text' no_xss_check ='1' required='1' validator='regex=/^(http|\/)/i' validator_msg="regex=URL should begin with either '/' or 'http'" separator='#'/>
        <cms:editable name='skip_qs' label='Skip QS?' type='checkbox' opt_values='Yes=yes' col_width='90' />
    </cms:repeatable>

</cms:template>



<cms:if k_user_access_level ge '10'>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-theme="light">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noimageindex, nocache">
<meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet, noimageindex, nocache">
<link rel="canonical" href="<cms:show_with_lc k_site_link/>">

<meta name="author" content="Asha Antony">
<title>Add redirections</title>

<meta name="theme-color" content="#000000">
<!-- Favicons -->
<link rel="icon" type="image/png" href="<cms:show k_site_link/>assets/images/favicons/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="<cms:show k_site_link/>assets/images/favicons/favicon.svg" />
<link rel="shortcut icon" href="<cms:show k_site_link/>assets/images/favicons/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="<cms:show k_site_link/>assets/images/favicons/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="<cms:show orgname />" />
<link rel="manifest" href="<cms:show k_site_link/>assets/images/favicons/site.webmanifest" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

</head>
<body dir="ltr">
<div class="container mx-auto small">
<div class="row justify-content-center">
<div class="col-md-10 col-lg-8 col-xl-6 shadow rounded">
<div class="row pt-3 mt-2 position-relative">
<small class="position-absolute top-0 start-0 text-muted">Hello, <cms:show k_user_title/> (<a href="<cms:show k_logout_link />" class="text-link text-black">Logout</a>)</small>
<img src="<cms:show k_site_link/>assets/images/logo/elyzee.svg" class="position-absolute top-0 end-0" style="width:25%;max-width:150px;">


<cms:set f_success="<cms:get_flash 'success' />"/>
<cms:if f_success && f_success eq '1'>
<div class="alert alert-success d-block p-2 col-12 mt-3">
<h4>Added successfully</h4>
<ul class="small m-0">
	<li><span class="text-muted">URI:</span> <cms:get_flash 'uri' /></li>
	<li><span class="text-muted">To:</span> <cms:get_flash 'to' /></li>
</ul>
</div>
<cms:ignore>
<table class="table w-100 table-stripped table-hover">
	<thead>
		<tr>
		<th>match</td>
		<th>uri</td>
		<th>redirect</td>
		<th>to</td>
		<th>skip_qs</td>
		</tr>
	</thead>
	<tbody>
		<cms:show_repeatable 'redirections'>
	<tr>
	<td><cms:show match/></td>
	<td><cms:show uri/></td>
	<td><cms:show redirect/></td>
	<td><cms:show to/></td>
	<td><cms:show skip_qs/></td>
	</tr>
	</cms:show_repeatable>
	</tbody>
</table>
</cms:ignore>
<cms:else/>
<h4 class="col-12 mb-1 mt-3">Add redirections</h4>
<p class="col-12 mb-2 small">Please fill out the form to add the redirections. Handle it carefully</p>


<div class="col-12 small">
<div class="alert alert-warning">
<h6 class="mb-1">Enter your details to create your email signature.</h6>
Fields marked <span class="text-danger">*</span> are required/mandatory for email signature.
<hr class="mt-1 mb-0">
<cms:form
    masterpage=k_template_name
    mode='edit'
    page_id=k_page_id
    enctype='multipart/form-data'
    method='post'
    class="add"
    anchor='0' >

<cms:if k_success>
	
	
	
	<cms:set found_uri='0' scope='global' />

	<cms:show_repeatable 'redirections'>
	    <cms:if found_uri eq '0'>
	        <cms:if uri eq frm_uri>
	            <cms:set found_uri='1' scope='global' />
	        </cms:if>
	    </cms:if>
	</cms:show_repeatable>

	<cms:if found_uri eq '0'>
		<cms:capture into='redirection_data' is_json='1'>
		<cms:show_repeatable 'redirections' as_json='1' />
		</cms:capture >
		<cms:capture into='redirection_data.' is_json='1'>
		{
			"uri" : <cms:escape_json><cms:show frm_uri /></cms:escape_json>,
			"to" : <cms:escape_json><cms:show frm_to /></cms:escape_json>,
			"match" : "simple",
			"redirect": "permanent"
		}
		</cms:capture >
	
	    <cms:db_persist_form
	        redirections  = redirection_data
	    />
		<cms:if k_success>
			<cms:set_flash name='success' value="1" />
			<cms:set_flash name='uri' value=frm_uri />
			<cms:set_flash name='to' value=frm_to />
		
			<cms:redirect url="<cms:show k_template_link/>"/>
		</cms:if>
	<cms:else/>
		<cms:set_flash name='error' value="1" />
		<cms:set_flash name='uri' value=frm_uri />
		<cms:set_flash name='to' value=frm_to />
		<cms:redirect url="<cms:show k_template_link/>"/>
	</cms:if>

</cms:if>

<cms:set f_error="<cms:get_flash 'error' />"/>
<cms:if k_error || (f_error && f_error eq '1')>
<div class="alert alert-danger d-block p-2">
<cms:if f_error>
<p class="fw-bold m-0">Same URI already exists. Adding aborted!</p>
<ul class="small m-0">
	<li><span class="text-muted">URI:</span> <cms:get_flash 'uri' /></li>
	<li><span class="text-muted">To:</span> <cms:get_flash 'to' /></li>
</ul>
</cms:if>
<cms:if k_error>
* Please clear the below mentioned errors and try again!
<ul class="mb-0"><cms:each k_error ><li><small><cms:show item /></small></li></cms:each></ul>
</cms:if>
</div>
</cms:if>


			
<div class="form-group my-3">
<label>Enter URI <span class="text-danger">*</span></label>
 <cms:input name='uri' label='URI' type='text' no_xss_check ='1' required='1' validator='kredirector::validate_match' class="form-control form-control-sm"/>
<cms:if k_error_uri><span class="invalid-feedback d-block m-0">* <cms:show k_error_uri/></span></cms:if>
</div>


<div class="form-group mb-3">
<label>Enter To URL <span class="text-danger">*</span></label>

 <cms:input name='to' label='To' type='text' no_xss_check ='1' required='1' validator='regex=/^(http|\/)/i' validator_msg="regex=URL should begin with either '/' or 'http'" separator='#' class="form-control form-control-sm"/>
<cms:if k_error_to><span class="invalid-feedback d-block m-0">* <cms:show k_error_to/></span></cms:if>
</div>

 


<cms:if "<cms:not submit_success />" >
<div class="form-group text-end">	
<button type="submit" class="btn btn-sm btn-dark text-warning">Add</button>
</div>  
 </cms:if>
</cms:form>
</cms:if>
</div>
</div>
</div>

<footer class="small text-muted mb-3 text-center">&copy; <cms:date format="Y"/> Copyright <a href="<cms:show_with_lc k_site_link/>" target=_blank class=" text-link text-black">Elyzee Hospital</a>. All rights reserved.<br>
</footer>
</div>
</div>
</div>
</body>
</html>
 
<cms:ignore>
<table>
	<thead>
		<tr>
		<th>match</td>
		<th>uri</td>
		<th>redirect</td>
		<th>to</td>
		<th>skip_qs</td>
		</tr>
	</thead>
	<tbody>
		<cms:show_repeatable 'redirections'>
	<tr>
	<td><cms:show match/></td>
	<td><cms:show uri/></td>
	<td><cms:show redirect/></td>
	<td><cms:show to/></td>
	<td><cms:show skip_qs/></td>
	</tr>
	</cms:show_repeatable>
	</tbody>
</table>


	<cms:set mystart="<cms:gpc 'import' method='get' />" />
	<cms:if mystart >
	<cms:set items_file_url="<cms:show k_site_path />assets/csv/scsv.csv"/>

	<cms:csv_reader
	file="<cms:show items_file_url/>"
	paginate='1'
	limit='800'
	prefix='_'
	>
        
	<cms:if k_paginated_top >
            
		<cms:if k_paginate_link_next >
		<script language="JavaScript" type="text/javascript">
			var myVar;
			myVar = window.setTimeout( 'location.href="<cms:show k_paginate_link_next />";', 5000 );
			</script>
			<button onclick="clearTimeout(myVar);">Stop</button>
			<cms:else />
			Done!
		</cms:if>
                	
					
		<h3><cms:show k_current_page /> / <cms:show k_total_pages /> pages (Total <cms:show k_total_records /> records. Showing <cms:show k_paginate_limit /> records per page)</hr>
                
		<table border='0'>
			<thead>
				<tr>
					<th>No.</th>
					<cms:csv_headers>
					<th><cms:show value /></th>
					</cms:csv_headers>    
				</tr>
			</thead>
			<tbody>
				
				<cms:capture into='redirection_data' is_json='1'>
				<cms:show_repeatable 'redirections' as_json='1' />
				</cms:capture >
	</cms:if>	
				<tr>
					<td><cms:show k_current_record /></td>
					<cms:csv_columns>
					<td><cms:show value /></td>
					</cms:csv_columns> 
					
							 
					
					<cms:capture into='redirection_data.' is_json='1'>
					{
						"uri" : <cms:escape_json><cms:show _uri /></cms:escape_json>,
						"to" : <cms:escape_json><cms:show _to /></cms:escape_json>,
						"match" : "simple",
						"redirect": "permanent",
						"skip_qs": "yes"
					}
					</cms:capture >
										 
					
				
				</tr>
				 
	<cms:if k_paginated_bottom >    
				<tr>
					<td></td>
					<td colspan='<cms:show k_csv_header_count />'><cms:paginator simple='1' /></td>
				</tr>
			</tbody>
		</table>  
		<cms:db_persist
			_invalidate_cache	= '0'
			_masterpage			= "redirections.php"
			_auto_title			= '0'
			_invalidate_cache	= '0'
			_mode				="edit"
			_page_id			= k_page_id
			redirections  = redirection_data

			>
				<cms:if k_error>
					<strong style="color:red;">ERROR:</strong> <cms:show k_error/>
				</cms:if>
		</cms:db_persist>
		
	</cms:if>

	</cms:csv_reader>

	<cms:else/>
	<button onclick='location.href="<cms:add_querystring k_page_link 'import=1' />"'>Start!</button>
	</cms:if>
</cms:ignore>
<cms:else/>
<cms:redirect url="<cms:link 'index.php'/>"/>
</cms:if>
<?php COUCH::invoke(); ?>