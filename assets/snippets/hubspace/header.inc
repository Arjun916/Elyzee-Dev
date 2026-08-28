<cms:embed "hubspace/login_check.inc" />
<cms:embed "locale/main.inc" />
<!doctype html>
<html lang="en" class="semi-dark">
<head>
	<title>Elyzee Hubspace</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="robots" content="noindex, nofollow, noarchive, nosnippet">
	<meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet">
	<meta http-equiv="X-Robots-Tag" content="noindex, nofollow">
	<meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="0">
	<meta name="referrer" content="no-referrer">

	<meta name="theme-color" content="#000000">
	<!-- Favicons -->
	<link rel="icon" type="image/png" href="<cms:show k_site_link/>assets/images/favicons/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/svg+xml" href="<cms:show k_site_link/>assets/images/favicons/favicon.svg" />
	<link rel="shortcut icon" href="<cms:show k_site_link/>assets/images/favicons/favicon.ico" />
	<link rel="apple-touch-icon" sizes="180x180" href="<cms:show k_site_link/>assets/images/favicons/apple-touch-icon.png" />
	<meta name="apple-mobile-web-app-title" content="<cms:show orgname />" />
	<link rel="manifest" href="<cms:show k_site_link/>assets/images/favicons/site.webmanifest" />

	
	<link href="<cms:show k_site_link/>hubspace/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<cms:show k_site_link/>hubspace/assets/css/pace.min.css" rel="stylesheet" />
	<script src="<cms:show k_site_link/>hubspace/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<cms:show k_site_link/>hubspace/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<cms:show k_site_link/>hubspace/assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	
	
	<link rel="stylesheet" href="<cms:show k_site_link/>hubspace/assets/plugins/multiselect/select2.min.css">
	
	<link href="<cms:show k_site_link/>hubspace/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet">
	<link href="<cms:show k_site_link/>hubspace/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<link href="<cms:show k_site_link/>hubspace/assets/css/app.css" rel="stylesheet">
	<link href="<cms:show k_site_link/>hubspace/assets/css/icons.css" rel="stylesheet">
	<link rel="stylesheet" href="<cms:show k_site_link/>assets/lib/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="<cms:show k_site_link/>hubspace/assets/css/semi-dark.css" />
	<link rel="stylesheet" href="<cms:show k_site_link/>hubspace/assets/css/header-colors.css" />
	
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="<cms:show k_site_link/>hubspace/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Elyzee</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
				</div>
			</div>
		
			<!--navigation-->
			<ul class="metismenu" id="menu">
			
				<li class="mt-3">

				</li>
				<li>
					<a href="<cms:link 'hubspace/index.php'/>">
						<div class="parent-icon"><i class='bx bx-home'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					
				</li>
				
				<li>
					<a href="<cms:link 'hubspace/events.php'/>">
						<div class="parent-icon"><i class='bx bx-file' ></i>
						</div>
						<div class="menu-title">All Events</div>
					</a>
				</li>
				
				
				<li class="px-3">
				<div class="border-bottom border-secondary"></div>
				</li>
				<li>
					<a href="<cms:link 'hubspace/myaccount.php'/>">
						<div class="parent-icon"><i class='bx bx-user-pin' ></i>
						</div>
						<div class="menu-title">User Profile</div>
					</a>
				</li>
				<li class="px-3">
				<div class="border-bottom border-secondary"></div>
				</li>
				<li>
					<a href="<cms:show k_logout_link />">
						<div class="parent-icon"><i class='bx bx-log-out-circle' ></i>
						</div>
						<div class="menu-title">Logout</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center dash-header bg-black">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="top-menu ms-auto"></div>
					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							
							<i class="fa-solid fa-circle-user uer-img fa-2xl"></i>
							
							<div class="user-info ps-3">
								<p class="user-name mb-0"><cms:show k_user_title/></p>
								<p class="designattion mb-0">Welcome</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="<cms:link 'hubspace/myaccount.php'/>"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="<cms:link 'hubspace/index.php'/>"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>

							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="<cms:show k_logout_link />"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">