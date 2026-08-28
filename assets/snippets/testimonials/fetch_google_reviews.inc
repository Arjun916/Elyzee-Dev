<cms:if (main_template_name eq 'contact.php') || (main_template_name eq 'testimonials.php')>
<cms:if (k_user_access_level ge '10') && main_template_name eq 'testimonials.php'>
	<cms:set should_fetch_testimonials="<cms:gpc 'import' method='get' />"  'global'/>
	
	<div class="bg-dark p-3 row text-center text-md-start">
		<h4 class="col-md-8 text-light">Fetch & Keep Google Reviews Updated?
			<small class="d-block">(This option is not displayed to public users; it is only shown when the superadmin is logged in.)</small></h4>
		<div class="col-md-4 px-3 text-center"><button class="btn btn-primary my-3" onclick='location.href="<cms:add_querystring k_page_link 'import=1' />"'><i class="fa-solid fa-comments"></i> Start Fetching Google Reviews!</button></div>
		<cms:trim "<cms:embed 'common/flash_block.html'/>"/>
	</div>

<cms:else_if (main_template_name eq 'contact.php')/>
	<cms:set last_fetch = "<cms:get_global 'google_review_last_fetch' masterpage='testimonials.php'/>"/>
	<cms:set last_fetch_date = "<cms:date last_fetch format='Y-m-d'/>"/>
	<cms:set current_fetch_date = "<cms:date format='Y-m-d'/>"/>
	<cms:set should_fetch_testimonials = "<cms:if current_fetch_date eq last_fetch_date>0<cms:else/>1</cms:if>" 'global'/>
</cms:if>


<cms:if should_fetch_testimonials && (should_fetch_testimonials gt '0')>
<cms:php>

global $CTX;

$place_id = "ChIJY46WnPplXj4RAtFXJTigTlQ";
$api_key  = "AIzaSyDFqsE49Tq5M-wYE0w48uXbNfH6n3YQoac";
$url = "https://maps.googleapis.com/maps/api/place/details/json"
     . "?place_id={$place_id}"
     . "&fields=name,rating,reviews,user_ratings_total"
     . "&key={$api_key}";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$response = curl_exec($ch);
curl_close($ch);

if ($response) {

    $data = json_decode($response, true);

    $is_valid = (
        json_last_error() === JSON_ERROR_NONE &&
        isset($data['status']) &&
        $data['status'] === "OK" &&
        isset($data['result']['reviews']) &&
        is_array($data['result']['reviews']) &&
        count($data['result']['reviews']) >= 5
    );

    if ($is_valid) {
        file_put_contents("reviews.json", json_encode($data, JSON_PRETTY_PRINT));
		$echo_response_status =  '1';
        $echo_response =  "Reviews updated successfully.";
    } else {
		$echo_response_status = '2';
        $echo_response = "API returned invalid data. Old reviews.json kept.";
    }

} else {
	$echo_response_status = '3';
    $echo_response = "No API response. Keeping old reviews.json.";
}

$CTX->set( 'success_message_val', $echo_response_status, 'global' );
$CTX->set( 'success_message', $echo_response, 'global' );
</cms:php>
<cms:if success_message_val && success_message_val eq '1'>
<cms:db_persist
    _masterpage="testimonials.php__globals"
    _mode="edit"
    _page_name="testimonials.php"
    google_review_last_fetch="<cms:date format='Y-m-d' />"
/>
</cms:if>

<cms:if k_user_access_level ge '10'  && main_template_name eq 'testimonials.php'>
<cms:set_flash name='success_msg' value=success_message_val />
<cms:set_flash name='message_value' value=success_message />
<cms:redirect url="<cms:show_with_lc k_template_link/>"/>
</cms:if>
</cms:if>
</cms:if>