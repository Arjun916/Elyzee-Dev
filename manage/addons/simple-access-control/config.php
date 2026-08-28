<?php

    if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

    ///////////EDIT BELOW THIS////////////////////////////////////////

    // Names of the restricted templates with names of the usets allowed access to them (use '|' to separate multiple users).
    // If list of users left blank, *all* users (including the super-admin) will be denied access.
    // $t['blog.php'] = 'admin';
    // $t['news.php'] = 'admin | jane | joe';
    // $t['test.php'] = '';
	
	
	
	
	
	$t['404.php'] = '10';
	$t['503.php'] = '10';
	$t['about.php'] = '10 | nhalfya | sachin_hma';
	$t['offers.php'] = '10 | nhalfya | sachin_hma';
	$t['before-after.php'] = '10 | nhalfya | sachin_hma';
	$t['book-appointment.php'] = '10 | nhalfya | sachin_hma';
	$t['careers.php'] = '10 | nhalfya | sachin_hma | j_crasta_hr';
	$t['contact.php'] = '10 | nhalfya | sachin_hma';
	$t['csv_export.php'] = '10 | sachin_hma';
	$t['doctors.php'] = '10 | nhalfya | sachin_hma';
	$t['esign.php'] = '10';
	$t['executive-team.php'] = '10 | nhalfya | sachin_hma';
	$t['feedback.php'] = '10 | nhalfya | sachin_hma';
	$t['gallery.php'] = '10 | nhalfya | sachin_hma';
	$t['globals.php'] = '10 | nhalfya | sachin_hma';
	$t['index.php'] = '10 | nhalfya | sachin_hma';
	$t['insights.php'] = '10 | nhalfya | sachin_hma';
	$t['insurance.php'] = '10 | nhalfya | sachin_hma';
	$t['jobs.php'] = '10';
	$t['mlang_category.php'] = '10';
	$t['multi_lang_folder.php'] = '10';
	$t['news-events.php'] = '10 | nhalfya | sachin_hma';
	$t['notice.php'] = '10 | nhalfya | sachin_hma';
	$t['pharmacy.php'] = '10 | nhalfya | sachin_hma';
	$t['photo_gallery.php'] = '10';
	$t['privacy-policy.php'] = '10 | nhalfya | sachin_hma';
	$t['redirections.php'] = '10 | nhalfya | sachin_hma';
	$t['rss.php'] = '10 | sachin_hma';
	$t['search.php'] = '10 | sachin_hma';
	$t['seo.php'] = '10 | sachin_hma';
	$t['services_folder.php'] = '10';
	$t['services.php'] = '10 | nhalfya | sachin_hma';
	$t['sitemap.php'] = '10 | nhalfya | sachin_hma';
	$t['survey.php'] = '10 | nhalfya | sachin_hma';
	$t['users'] = '10 | nhalfya | sachin_hma';
	$t['testimonials.php'] = '10 | nhalfya | sachin_hma';
	$t['assets/connect.php'] = '10';
	$t['hubspace/attendees.php'] = '10';
	$t['hubspace/events.php'] = '10';
	$t['hubspace/index.php'] = '10';
	$t['hubspace/myaccount.php'] = '10';