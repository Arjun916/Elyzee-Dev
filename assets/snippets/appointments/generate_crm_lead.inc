<cms:php>
global $CTX;
function hasRealValue($value, int $length = 0): bool {
    if (!is_string($value)) {return false;}
    $clean = html_entity_decode($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $clean = strip_tags($clean);
    $clean = preg_replace('/\x{00A0}/u', ' ', $clean);
    $clean = trim($clean);
    return mb_strlen($clean, 'UTF-8') > $length;
}
function crm_utf8($s){
    $s = (string)$s;
    $s = html_entity_decode($s, ENT_QUOTES, 'UTF-8');
    if (!mb_detect_encoding($s, 'UTF-8', true)) {
        $s = mb_convert_encoding($s, 'UTF-8', 'auto');
    }
    $s = iconv('UTF-8', 'UTF-8//IGNORE', $s);
    return $s;
}



$endpoint = "<cms:get_custom_field 'bitrix_endpoint_url' masterpage='globals.php' />";

$crm_comments = "<b>Department:</b> <cms:show frm_speciality_list />\n<b>Doctor:</b> <cms:show doctor_value/>\n<b>Appointment Date &amp; Time:</b> <cms:show frm_appointment_date />\n<b>Note to Doctor:</b><br><cms:show frm_user_message />";


$name  = crm_utf8(trim("<cms:show frm_contact_name/>"));
$email = trim("<cms:show frm_user_email/>");
$phone = trim("<cms:show frm_user_phone/>");
$comments = crm_utf8(trim($crm_comments));
$pageUrl = trim("<cms:show_with_lc k_page_link/>");
$title = crm_utf8(trim("[Website Appointment Request] - <cms:show frm_contact_name/>"));	

$params = [
'FIELDS[TITLE]' => $title,
'FIELDS[NAME]'  => $name,
'FIELDS[EMAIL][0][VALUE]'      => $email,
'FIELDS[EMAIL][0][VALUE_TYPE]' => 'WORK',
'FIELDS[PHONE][0][VALUE]'      => $phone,
'FIELDS[PHONE][0][VALUE_TYPE]' => 'MOBILE',
'FIELDS[SOURCE_ID]' => 'UC_0AAZKV',
'FIELDS[COMMENTS]'  => $comments,
'FIELDS[SOURCE_DESCRIPTION]' => $pageUrl,
'FIELDS[UTM_SOURCE]'         => $pageUrl,
];

if ($email === '') {unset($params['FIELDS[EMAIL][0][VALUE]'], $params['FIELDS[EMAIL][0][VALUE_TYPE]']);}
if ($phone === '') {unset($params['FIELDS[PHONE][0][VALUE]'], $params['FIELDS[PHONE][0][VALUE_TYPE]']);}

$ch = curl_init($endpoint);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $params,
    CURLOPT_HTTPHEADER     => ['Accept: application/json'],
    CURLOPT_TIMEOUT        => 20,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_FOLLOWLOCATION => true,
]);

$response = curl_exec($ch);
$curlErr  = curl_error($ch);
$httpCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$leadId = '';
$crmError = '';
$crmErrorDesc = '';

if ($curlErr) {
$crmError = 'CURL_ERROR';
$crmErrorDesc = $curlErr;
} else {
$json = json_decode((string)$response, true);

if (is_array($json) && isset($json['result'])) {
$leadId = (string)$json['result'];
} elseif (is_array($json) && isset($json['error'])) {
$crmError = (string)$json['error'];
$crmErrorDesc = (string)($json['error_description'] ?? '');
} else {
$crmError = 'UNKNOWN_RESPONSE';
$crmErrorDesc = (string)$response;
}
}

$CTX->set('crm_lead_id_val', $leadId, 'global');
$CTX->set('crm_error_val', $crmError, 'global');
$CTX->set('crm_error_desc_val', $crmErrorDesc, 'global');
$CTX->set('crm_raw_response_val', $response, 'global');
</cms:php>
<cms:if k_last_insert_id && k_last_insert_id gt '0'>
<cms:db_persist
    _invalidate_cache='0'
    _masterpage='book-appointment.php'
    _mode='edit'
	_page_id = k_last_insert_id
	crm_lead_id = crm_lead_id_val
	crm_raw_response = crm_raw_response_val
	crm_error = crm_error_val
	crm_error_desc = crm_error_desc_val
	k_publish_date='0000-00-00 00:00:00'
>  
<cms:if k_user_access_level ge '10'>
    <cms:if k_error >
        <font color='red'>ERROR:
        <cms:each k_error >
            <cms:show item /><br>
        </cms:each>
        </font>
    <cms:else />
       Success: <cms:show crm_lead_id_val/>
    </cms:if>
</cms:if>
</cms:db_persist>
<script>
  window.dataLayer = window.dataLayer || [];
  setTimeout(function () {
    window.dataLayer.push({
      event: 'crm_form_success'
    });
  }, 300);
</script>
</cms:if>