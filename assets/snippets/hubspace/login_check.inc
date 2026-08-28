<cms:if is_secured_page && is_secured_page gt '0' && k_logged_out>
    <cms:redirect url="<cms:show k_login_link />"/>
<cms:else/>
	<cms:match_route debug='0'/>
</cms:if>