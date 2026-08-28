<?php

    if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

    ///////////EDIT BELOW THIS////////////////////////////////////////

    // Names of the templates with names of the editable-regions used as filters (use '|' to separate multiple regions) e.g.
     $t['doctors.php'] = 'speciality';
	 $t['insights.php'] = 'speciality | doctors';
    // $t['news.php'] = 'state | genre';
