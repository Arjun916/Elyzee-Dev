<?php require_once( 'manage/cms.php' ); ?>
<cms:template title="Thank You" hidden='1' order='1000'>
<cms:editable type="group" label="Title" name="p_title_group" order='10'/>
<cms:each k_supported_langs as='lang' key='lc'>
<cms:editable type='text'  name="title_<cms:show lc />" label="Title in <cms:show lang/>"  group='p_title_group' order=k_count required='1'><cms:if lc eq 'ar'>شكرًا<cms:else/>Thank You</cms:if></cms:editable>	
</cms:each>

</cms:template>
<cms:set success_msg = "<cms:get_flash 'success_msg' />" />
<cms:set message_value = "<cms:get_flash 'message_value' />" />
<cms:set r_page_link = "<cms:get_flash 'r_page_link' />" />
<cms:if success_msg && success_msg eq '1' && message_value>

<cms:trim "<cms:embed 'common/header.inc' />"/>

<section class="bg-black dark-section py-5" data-aos="fade-up">
<div class="container">
<div class="row">
	<h2 class="wow fadeInUp text-accent-color h1 mb-3"><i class="fa-solid fa-thumbs-up text-accent-color"></i> <cms:get "title_<cms:show k_lang/>"/></h2>
	<cms:set_flash name='r_page_link' value=r_page_link />
	
	<div class="col-12 close_alert">
		<div class="mt-40 mb-2 w-100 position-relative d-flex justify-content-start align-items-top alert alert-success alert-dismissible" role="alert">
			<a href="<cms:if r_page_link><cms:show r_page_link/><cms:else/><cms:link 'book-appointment.php'/></cms:if>" class="position-absolute btn top-0 end-0 close"><span aria-hidden="true">&times;</span></a>
			<p class="m-0"><i class="fas fa-check-circle "></i></p>
			<div class="px-2"><cms:show message_value/></div>
		</div>
	</div>
</div><!-- /.row -->
</div><!-- /.container -->
</section>
<cms:trim "<cms:embed 'common/footer.inc' />"/>
<cms:else/>
	<cms:redirect url="<cms:if r_page_link><cms:show r_page_link/><cms:else/><cms:link 'book-appointment.php'/></cms:if>"/>
</cms:if>
<?php COUCH::invoke(); ?>