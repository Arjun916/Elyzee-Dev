<cms:if main_template_name eq 'news-events.php'>
<cms:capture into='video_gallery_output'>
<cms:show_repeatable 'video_links' >
<cms:if video_url>
<cms:set has_gallery_videos='1' 'global' />
		
<cms:set tmp_video_image = "<cms:if video_image><cms:show video_image/><cms:else/><cms:show placeholder /></cms:if>"/>
<cms:set tmp_video_alt = "<cms:get 'locale.videos'/>"/>
<div class="col-md-4 col-lg-4 col-6 gallery-item video">
    <!-- Video Gallery Image start -->
    <div class="video-gallery-image wow fadeInUp">
        <a href="<cms:youtube_url data=video_url />" title="<cms:get 'locale.videos'/>" data-type="video">
		
		<i class="fa-solid fa-play position-absolute top-50 start-50 fa-2xl shadow"></i>
            <figure>
                <img class="lazy" src="<cms:show px_img/>" data-src="<cms:youtube_thumbnail data=video_url default=tmp_video_image />" alt="<cms:get 'locale.videos'/>">
            </figure>
        </a>
    </div>
    <!-- Video Gallery Image end -->
</div>	
</cms:if>
</cms:show_repeatable>
</cms:capture>

<cms:capture into='photo_gallery_output'>
<cms:reverse_related_pages 'gallery_photo' masterpage='photo_gallery.php' orderby='weight' order='asc'>
<cms:if gg_image>
    <div class="col-md-4 col-lg-4 col-6 gallery-item photo">
        <!-- Image Gallery start -->
        <div class="photo-gallery wow fadeInUp">
			
            <a href="<cms:show gg_image/>" title="<cms:get 'locale.photos'/>" data-type="image">
			<i class="fa-regular fa-eye position-absolute top-50 start-50 fa-2xl shadow-lg"></i>
                <figure>
                    <img class="lazy" src="<cms:show px_img/>" data-src="<cms:show gg_thumb/>" alt="<cms:get 'locale.photos'/>">
                </figure>
            </a>
        </div>
        <!-- Image Gallery end -->
    </div>    

<cms:set has_gallery_photos='1' 'global' />
</cms:if>
</cms:reverse_related_pages>
</cms:capture>




    
<cms:if has_gallery_photos || has_gallery_videos >
<section class="page-gallery bg-light pt-3 bg_asthetic_treatments">
	<div class="container">
		<h3 class="my-3"><cms:get 'locale.related_gallery'/></h3>
<cms:if has_gallery_photos && has_gallery_videos >

<div class="row" data-aos="fade-up" data-aos-delay="100">
<div class="col-lg-12">
<div class="gallery-filters d-flex justify-content-start mb-20">
<a href="#" data-filter="*" data-bgcolor="#bda86e" class="btn btn-sm mx-1 btn-secondary bg-accent-color" title="<cms:get 'locale.all'/>"><cms:get 'locale.all'/></a>
<a href="#" data-filter=".photo" data-bgcolor="#bda86e" class="btn btn-sm mx-1 btn-secondary " title="<cms:get 'locale.photos'/>"><cms:get 'locale.photos'/></a>
<a href="#" data-filter=".video" data-bgcolor="#bda86e" class="btn btn-sm  mx-1 btn-secondary" title="<cms:get 'locale.videos'/>"><cms:get 'locale.videos'/></a>
</div>
</div>
</div>
</cms:if>

<div class="row gallery-items page-gallery-box">

<cms:if has_gallery_videos >
<cms:show video_gallery_output />
</cms:if>

<cms:if has_gallery_photos >
<cms:show photo_gallery_output />
</cms:if>




</div>
</div>
</section>
</cms:if>

</cms:if>



