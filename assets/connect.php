<?php require_once("../manage/cms.php"); ?>
<cms:template title='Ajax connector' hidden='1' order='1000' parent="_hidden_"/>


<cms:if "<cms:gpc 's' />" >
    <cms:set snippet = "<cms:gpc 's' />" />
</cms:if>

/** Alow only ajax requests.
<cms:if (k_logged_in && k_user_access_level ge '10') || (snippet eq 'hits') >
<cms:else/>
	<cms:if "<cms:not "<cms:is_ajax />" />" >
    	<cms:abort msg="ERROR: Page can't be accessed directly." is_404='1'/>
	</cms:if>
</cms:if>


<cms:if "<cms:gpc 'ij' />" >
    <cms:set is_json = "<cms:gpc 'ij' />" />
</cms:if>


<cms:capture into='whitelist' >
   hits | onetimepopup
</cms:capture>


<cms:each whitelist >
    <cms:if item = snippet >
		<cms:set item_snippet = "ajax/<cms:show snippet/>.inc"/>
        <cms:if "<cms:exists item_snippet />">
            /** Check if file exists
            <cms:set snippet_is_valid=item_snippet scope='global' />
        </cms:if>
    </cms:if>
</cms:each>


/** Store the result of snippet code
<cms:capture into='ajax_output' >
    <cms:if snippet_is_valid >
        <cms:embed snippet_is_valid/>
    </cms:if>
</cms:capture>

/** Send back to JS only the result
<cms:if snippet_is_valid >
<cms:if is_json && is_json eq '1'><cms:content_type 'application/json'/></cms:if>
<cms:abort msg=ajax_output is_404='0' />
<cms:else />
<cms:abort msg="ERROR: File not found: <cms:show snippet />" is_404='1'/>
</cms:if>
<?php COUCH::invoke(); ?>