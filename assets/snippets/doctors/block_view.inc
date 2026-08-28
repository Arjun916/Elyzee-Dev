<section class="page-team bg-black">
	<div class="container">
		<div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-3 text-accent-color">
				<cms:show_globals masterpage='doctors.php'>
				<h2 class="wow fadeInUp text-white h1 mb-3" data-wow-delay="0.1s"><i class="fa-solid fa-user-doctor text-accent-color"></i> <cms:get "title_<cms:show k_lang/>"/></h2>
				<p class="wow fadeInUp " data-wow-delay="0.2s"><cms:get "short_content_<cms:show k_lang/>"/></p>
				</cms:show_globals>
				
				    
            </div>

			<div class="col-12 px-4">
				<div class="team-slider">
					<cms:pages masterpage="doctors.php" orderby='weight' order='asc' >
					<cms:trim "<cms:embed 'doctors/tile_view.inc'/>"/>					
					</cms:pages>		
				</div>
			</div>
		</div>
	</div>
</section>