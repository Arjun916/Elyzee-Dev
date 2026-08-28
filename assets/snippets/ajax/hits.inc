<cms:php>
  global $CTX;

  $is_post = (isset($_SERVER['REQUEST_METHOD']) && strtoupper($_SERVER['REQUEST_METHOD']) === 'POST');

  $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
  $is_bot = ($ua && preg_match('/bot|crawl|slurp|spider|mediapartners|facebookexternalhit|facebot|telegrambot|embedly|quora link preview/i', $ua));

  $is_admin = (defined('K_ADMIN') && K_ADMIN==1);

  $ehw_ph_data = json_decode(file_get_contents('php://input'), true);

  // default
  $CTX->set('ehw_ph_is_countable', '0', 'global');

  if ($is_post && !$is_bot && !$is_admin && is_array($ehw_ph_data)) {

    $ehw_ph_tpl   = trim($ehw_ph_data['ehw_ph_tpl'] ?? '');
    $ehw_ph_type  = trim($ehw_ph_data['ehw_ph_type'] ?? '');
    $ehw_ph_token = trim($ehw_ph_data['ehw_ph_token'] ?? '');
    $ehw_ph_pid   = (int)($ehw_ph_data['ehw_ph_pid'] ?? 0);
	  $ehw_ph_pname  = trim($ehw_ph_data['ehw_ph_pname'] ?? '');

    if ($ehw_ph_tpl !== '' && $ehw_ph_type !== '' && $ehw_ph_token !== '') {
      $CTX->set('ehw_ph_tpl', $ehw_ph_tpl, 'global');
      $CTX->set('ehw_ph_pid', $ehw_ph_pid, 'global');
      $CTX->set('ehw_ph_type', $ehw_ph_type, 'global');
      $CTX->set('ehw_ph_token', $ehw_ph_token, 'global');
	    $CTX->set('ehw_ph_pname', $ehw_ph_pname, 'global');
      $CTX->set('ehw_ph_is_countable', '1', 'global');

      if (session_status() === PHP_SESSION_NONE) { @session_start(); }

      $ehw_hit_pageKey = 'ehw_hit_' . $ehw_ph_tpl . '_' . $ehw_ph_pid . '_' . $ehw_ph_type;

      $ehw_hit_now = time();
      $ehw_hit_ttl = 15 * 60;
      $ehw_hit_last = $_SESSION[$ehw_hit_pageKey] ?? 0;

      if (($ehw_hit_now - (int)$ehw_hit_last) < $ehw_hit_ttl) {
        $CTX->set('ehw_ph_is_countable', '0', 'global');
      } else {
        $_SESSION[$ehw_hit_pageKey] = $ehw_hit_now;
      }
    }
  }
</cms:php>


<cms:if (ehw_ph_is_countable gt '0')>
    <cms:if (ehw_ph_type eq 'page') && (ehw_ph_pid gt '0') && ehw_ph_pname ne ''>
		<cms:set ehw_ph_page_hits = "<cms:get_custom_field 'page_hits' masterpage=ehw_ph_tpl page=ehw_ph_pname />" />
        <cms:db_persist
            _masterpage	= ehw_ph_tpl
            _page_id	= ehw_ph_pid
            _mode		= "edit"
			location	= "700"
            page_hits	= "<cms:add ehw_ph_page_hits '1' />"
        ></cms:db_persist>
    <cms:else_if (ehw_ph_type eq 'list') />
		<cms:set ehw_ph_page_hits = "<cms:get_global 'page_hits' masterpage=ehw_ph_tpl />" />
        <cms:db_persist
            _masterpage	= "<cms:show ehw_ph_tpl/>__globals"
            _mode		= "edit"
            page_hits	= "<cms:add ehw_ph_page_hits '1' />"
        ></cms:db_persist>
	<cms:else_if (ehw_ph_type eq 'template') />
		<cms:set ehw_ph_page_hits = "<cms:get_custom_field 'page_hits' masterpage=ehw_ph_tpl />" />
		<cms:db_persist
			_masterpage	= ehw_ph_tpl
			_mode		= "edit"
			page_hits	= "<cms:add ehw_ph_page_hits '1' />" 
		></cms:db_persist>
    </cms:if>
</cms:if>