<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='Insurance' order="70">
<cms:editable type="group" label="Title & Short Description" name="p_title_group" order='10'>
	<cms:editable name='title_row' type='row' order='10'>
		<cms:editable type='text'  name="title_en" label="Title - English"  order='10' required='1' class='col-md-6'>Insurance Affiliates</cms:editable>
		<cms:editable type='text'  name="title_ar" label="Title - Arabic"  order='11' required='1' class='col-md-6'>شركات التأمين</cms:editable>

		
		<cms:editable type='textarea'  name="short_desc_en" label="Short Description - English" desc='* Maximum 225 characters' order='30' required='1' height='100' class='col-md-6'>Partnered Insurance Companies</cms:editable>
		<cms:editable type='textarea'  name="short_desc_ar" label="Short Description - Arabic" desc='* Maximum 225 characters' order='31' required='1' height='100' class='col-md-6'>Partnered Insurance Companies</cms:editable>
		
    </cms:editable>
 </cms:editable>



<cms:editable type="group" label="Insurance Details" name="p_insurance_group" order='30' collapsed='0'/>
<cms:repeatable name='insurance_section' label="Add Innsurance Company details here" desc='All fields in a stack are mandatory' stacked_layout='1' order='10' group="p_insurance_group">

<cms:editable name='insurance_image' width='500' height='500' label="Upload Logo of the insurance Company" desc="Make sure the photo is of same style as others. Should be square:500x500px. Try to upload as per the exact size, else image will be cropped proportionally from center for required size." type='image' show_preview='1' preview_height='50' quality='75' required='1' order='1' />

<cms:editable type='text' name="insurance_title_en" label='Name of the insurance Company - English' desc='eg: Daman' maxlength='100' order='10'/>
<cms:editable type='text' name="insurance_title_ar" label='Name of the insurance Company - Arabic'  desc='eg: Daman' maxlength='100' order='11'/>

</cms:repeatable>


<cms:embed 'common/page_desc_editables.html'/>
<cms:embed 'common/page_seo_editables.inc'/>




</cms:template>

<cms:trim "<cms:embed 'common/header.inc' />"/>
<cms:trim "<cms:embed 'insurance/block_view.inc'/>"/>
<cms:trim "<cms:embed 'clonedpages/cloned_detail_content.inc'/>"/>
<cms:trim "<cms:embed 'common/footer.inc' />"/>

<?php COUCH::invoke(); ?>