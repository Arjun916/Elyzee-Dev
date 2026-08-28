<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='Home' order="30">
<cms:editable type='group' label='Home Slider Contents' desc='Important: Upload atleast one slider content here' name='slider_group' order='10'/>
<cms:mosaic name='home_contents' label='Home Slider Contents' group='slider_group'>

<cms:tile name='slider_content' label='Add Top Slider'>
<cms:editable type='group' label='Slider Image' desc='required' name='images_main' order='10'/>
<cms:editable name='slider_image_en' label='Slider Main Image' desc='Required minimum size:1920x1080px.' width='1920' height='1080' quality='100' show_preview='1' preview_height='100' type='image' crop='1' order='10' required='1' group='images_main'/>	
<cms:editable name='slider_image_ar' label='Slider Main Image  - Arabic' desc='Required minimum size:1920x1080px.' width='1920' height='1080' quality='100' show_preview='1' preview_height='100' type='image' crop='1' order='10' required='1' group='images_main'/>

<cms:editable type='group' label='Slider Title Prefix' desc='optional' name='title_prefix' order='20'/>
<cms:editable type='text'  name="title_prefix_en" label="Slider Title Prefix - English"  order="20" group='title_prefix'>Elyzee Hospital</cms:editable>
<cms:editable type='text'  name="title_prefix_ar" label="Slider Title Prefix - Arabic"  order="21" group='title_prefix'>مستشفى اليزيه</cms:editable>

<cms:editable type='group' label='Slider Main Title' desc='required' name='title_main' order='30'/>	
<cms:editable type='text'  name="title_main_en" label="Slider Main Title - English"  order="30" required='1' group='title_main'>Boutique Plastic Surgery and Aesthetic Hospital in the UAE</cms:editable>
<cms:editable type='text'  name="title_main_ar" label="Slider Main Title - Arabic"  order="31" required='1' group='title_main'>مستشفى بوتيك للجراحة التجميلية والتجميلية في الإمارات العربية المتحدة</cms:editable>

<cms:editable type='group' label='Slider Short Content' desc='optional' name='content_main' order='40'/>
<cms:editable type='text'  name="sub_title_en" label="Slider Short Description - English"  order="40" group='content_main'>Where transformation meets artistry — Elyzee Hospital delivers world-class plastic surgery and aesthetic excellence in a setting of timeless sophistication.</cms:editable>
<cms:editable type='text'  name="sub_title_ar" label="Slider Short Description - Arabic"  order="41" group='content_main'>حيث يلتقي التحول بالفن، يجسّد مستشفى اليزيه التميز في جراحات التجميل والعناية الجمالية ضمن أجواء من الرقي والفخامة الخالدة.</cms:editable>

<cms:editable type='group' label='Slider Main Button Title & Link' desc='required' name='main_button' order='50'/>
<cms:editable type='text'  name="main_button_title_en" label="Slider Main Button Title - English"  order="50" required='1' group='main_button'>Our Services</cms:editable>
<cms:editable type='text'  name="main_button_title_ar" label="Slider Main Button Title - Arabic"  order="51" required='1' group='main_button'>خدماتنا</cms:editable>

<cms:editable name="main_button_link_url_en" label="English Page URL of Respective Button Link" validator='url' type='text' order="52" searchable='0' required='1' group='main_button'><cms:link 'services.php'/></cms:editable>

<cms:editable name="main_button_link_url_ar" label="Arabic Page URL of Respective Button Link" validator='url' type='text' order="53" searchable='0' required='1' group='main_button'><cms:link 'services.php'/></cms:editable>


<cms:editable name='main_link_is_blank' type='radio' label='The URL should open in separate window?' opt_values='<strong>No</strong> (if the URL is from our website only)=No | <strong>Yes</strong> (if the URL is from external website)=Yes' opt_selected='No' order='100' searchable='0' group='main_button'/>


<cms:editable type='group' label='Slider Video Button Title & Link' desc='optional' name='video_button' order='60' />
<cms:editable type='text'  name="video_button_title_en" label="Slider Video Button Title - English"  order="60" desc='optional' group='video_button'>Watch Video</cms:editable>
<cms:editable type='text'  name="video_button_title_ar" label="Slider Video Button Title - Arabic"  order="61" desc='optional' group='video_button'>Watch Video</cms:editable>

<cms:editable name='video_link_en' no_xss_check ='1' label='Youtube URL of the Slider Video - English' desc='Youtube Video URL format should be: https://www.youtube.com/watch?v=xXXxXxxxXxX' type='text' validator='url' group='video_button' order="62"/>

<cms:editable name='video_link_ar' no_xss_check ='1' label='Youtube URL of the Slider Video - Arabic' desc='Youtube Video URL format should be: https://www.youtube.com/watch?v=xXXxXxxxXxX' type='text' validator='url' group='video_button' order="62"/>



<cms:config_list_view>
<cms:field 'k_content' >
<div class="mosaic-list">
<div class="panel-heading">
<h3>Slider<cms:add k_count '1'/> - English Content</h3>
<a class="img-popup" href="<cms:show slider_image_en />">

<img src="<cms:show slider_image_en />" width="150">
</a>   
<h5> <cms:show title_prefix_en/></h5>
<h3> <cms:show title_main_en/></h3>
<p> <cms:show sub_title_en/></p>
<cms:if main_button_link_url_en>
<a class="label label-primary" href="<cms:show main_button_link_url_en />" target='_blank'>
<cms:show main_button_title_en/>
</a>
</cms:if>
<cms:if video_link_en>
<a class="label label-secondary" href="<cms:show video_link_en />" target='_blank'>
<cms:show video_button_title_en/>
</a>
</cms:if>

<hr>
<h3>Slider<cms:add k_count '1'/> - Arabic Content</h3>
<a class="img-popup" href="<cms:show slider_image_ar />">

<img src="<cms:show slider_image_ar />" width="150">
</a>   
<h5> <cms:show title_prefix_ar/></h5>
<h3> <cms:show title_main_ar/></h3>
<p> <cms:show sub_title_ar/></p>
<cms:if main_button_link_url_ar>
<a class="label label-primary" href="<cms:show main_button_link_url_en />" target='_blank'>
<cms:show main_button_title_ar/>
</a>
</cms:if>
<cms:if video_link_ar>
<a class="label label-secondary" href="<cms:show video_link_en />" target='_blank'>
<cms:show video_button_title_ar/>
</a>
</cms:if>

</div>
</div> 
</cms:field>
</cms:config_list_view>

</cms:tile>


</cms:mosaic>


<cms:embed 'common/page_seo_editables.inc'/>

</cms:template>

<cms:trim "<cms:embed 'common/header.inc' />"/>
<cms:trim "<cms:embed 'home/main_view.inc'/>"/>
<cms:trim "<cms:embed 'common/footer.inc' />"/>
<?php COUCH::invoke(); ?>