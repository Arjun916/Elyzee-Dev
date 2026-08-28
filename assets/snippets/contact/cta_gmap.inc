<div class="google-map-iframe bg-accent-dark">
<cms:if k_template_name ne 'contact.php'>
<div class="contact-box py-5 px-3 w-100 text-light text-center">
<a href="tel:<cms:show primaryphone/>" class="btn d-block my-3 fs-5"><i class="fa-solid fa-phone pe-2"></i> &#x200E;<cms:show primaryphone/>&#x200E;</a>
		
<cms:if orgaddress><p><cms:show orgaddress/></p></cms:if>
		
<cms:trim "<cms:embed 'common/sociallinks.inc' />"/>
	
</div>	
</cms:if>	
<cms:set gmap_url="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3150.230926258155!2d54.405403400000004!3d24.426532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e65fa9c968e63%3A0x544ea0382557d102!2sElyzee%20Hospital!5e1!3m2!1s<cms:show k_lang/>!2sae!4v1765285998966!5m2!1s<cms:show k_lang/>!2sae"/>
<div class="iframe-wh-100 lazymap lazy" data-src="<cms:show k_site_link/>assets/images/elyzee_map.avif" data-gmap="<cms:show gmap_url />">&nbsp;</div>
</div>