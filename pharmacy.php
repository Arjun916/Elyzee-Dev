<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='Pharmacy' order="1000">
<cms:editable type="group" label="Title" name="p_title_group" order='10'>	

	<cms:editable name='title_row' type='row' order='10'>
	
	<cms:editable type='text'  name="title_en" label="Title - English"  order='10' required='1' class='col-md-6'>Pharmacy</cms:editable>
	<cms:editable type='text'  name="title_ar" label="Title - Arabic"  order='11' required='1' class='col-md-6'>صيدلية</cms:editable>
	
	<cms:editable type='text'  name="heading_en" label="Heading - English"  order='20' required='1' class='col-md-6'>Elyzee Pharmacy in Abu Dhabi</cms:editable>
	<cms:editable type='text'  name="heading_ar" label="Heading - Arabic"  order='21' required='1' class='col-md-6'>صيدلية اليزيه في أبوظبي</cms:editable>
	
	<cms:editable type='text' name="short_desc_en" label="Short Description - English"  order='30' desc='* Maximum 225 characters' required='1' class='col-md-6'>Your trusted pharmacy at Elyzee Hospital, offering prescriptions, OTC products and expert guidance.</cms:editable>
	<cms:editable type='text' name="short_desc_ar" label="Short Description - Arabic"  order='31' desc='* Maximum 225 characters' required='1' class='col-md-6'>صيدليّتكم الموثوقة في مستشفى إليزيه، نوفر الوصفات الطبية والأدوية دون وصفة، مع إرشادات صيدلانية دقيقة لضمان سلامتكم</cms:editable>
		

<cms:editable name='page_image' width='1920' height='1080' label="Upload Highlight Image related to the page here" desc="Optional, Size should be 1920x1080px aspect ratio" type='image' show_preview='1' preview_height='75'  quality='100' searchable='0'  order='40' class='col-md-12'/>	
	
</cms:editable>
</cms:editable>

<cms:embed 'common/page_desc_editables.html'/>

<cms:embed 'common/page_seo_editables.inc'/>
	
</cms:template >


<cms:trim "<cms:embed 'common/header.inc' />"/>

   
<section class="page-section lazy">
	<img class="page-image lazy" src='<cms:show px_img/>' data-src="<cms:if page_image><cms:show page_image/><cms:else/><cms:show k_site_link/>/assets/images/elyzee-pharmacy.webp</cms:if>" alt='<cms:get "heading_<cms:show k_lang/>"/>'>	   
	<div class="page-header px-5 py-5">
		<h2 class="h1 mb-3"><cms:get "heading_<cms:show k_lang/>"/></h2>
		<p class="lead m-0"><cms:get "short_desc_<cms:show k_lang/>"/></p>							 
	</div>					 
</section>
 
 <cms:trim "<cms:embed 'clonedpages/cloned_detail_content.inc'/>"/>
 
	
<cms:trim "<cms:embed 'appointments/section_view.inc'/>"/>

<cms:trim "<cms:embed 'common/footer.inc' />"/>
<?php COUCH::invoke(); ?>