<cms:capture into='profiles_output' >
<cms:pages masterpage='globals.php' >   
    <cms:if whatsapp_id && whatsapp_show eq 'true'>
       <li><a href="<cms:show whatsapp_id />" target="_blank" title="<cms:show orgname/> - WhatsApp" rel="nofollow noopener"><i class="fab fa-whatsapp"></i></a></li>
       <cms:set has_profile='1' 'global' />
    </cms:if>
    <cms:if facebook_id && facebook_show eq 'true'>
       <li><a href="<cms:show facebook_id />" target="_blank" title="<cms:show orgname/> - Facebook" rel="nofollow noopener"><i class="fab fa-facebook-f"></i></a></li>
       <cms:set has_profile='1' 'global' />
    </cms:if>
	
    <cms:if instagram_id && instagram_show eq 'true'>
       <li><a href="<cms:show instagram_id />" target="_blank" title="<cms:show orgname/> - Instagram" rel="nofollow noopener"><i class="fab fa-instagram"></i></a></li>
       <cms:set has_profile='1' 'global' />
    </cms:if>
    <cms:if snapchat_id && snapchat_show eq 'true'>
       <li><a href="<cms:show snapchat_id />" target="_blank" title="<cms:show orgname/> - Snapchat" rel="nofollow noopener"><i class="fab fa-snapchat"></i></a></li>
       <cms:set has_profile='1' 'global' />
    </cms:if>
    <cms:if tiktok_id && tiktok_show eq 'true'>
       <li><a href="<cms:show tiktok_id />" target="_blank" title="<cms:show orgname/> - TikTok" rel="nofollow noopener"><i class="fab fa-tiktok"></i></a></li>
       <cms:set has_profile='1' 'global' />
    </cms:if>
    <cms:if youtube_id && youtube_show eq 'true'>
       <li><a href="<cms:show youtube_id />" target="_blank" title="<cms:show orgname/> - YouTube" rel="nofollow noopener"><i class="fab fa-youtube"></i></a></li>
       <cms:set has_profile='1' 'global' />
    </cms:if> 
   <cms:if x_id && x_show eq 'true'>
       <li><a href="<cms:show x_id />" target="_blank" title="<cms:show orgname/> - X.com" rel="nofollow noopener"><i class="fab fa-x-twitter"></i></a></li>
       <cms:set has_profile='1' 'global' />
    </cms:if>
    <cms:if linkedin_id && linkedin_show eq 'true'>
      <li><a href="<cms:show linkedin_id />" target="_blank" title="<cms:show orgname/> - LinkedIn" rel="nofollow noopener"><i class="fab fa-linkedin"></i></a></li>
       <cms:set has_profile='1' 'global' />
    </cms:if>
</cms:pages>
</cms:capture>
		    
<cms:if has_profile><div class="social-links"><ul><cms:show profiles_output /></ul></div></cms:if>     