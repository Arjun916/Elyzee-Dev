<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='About Elyzee' order="40">

<cms:editable type="group" label="Title & Short Description" name="p_title_group" order='10'>
	<cms:editable name='title_row' type='row' order='10'>
		<cms:editable type='text'  name="title_en" label="Title - English"  order='10' required='1' class='col-md-6'>About Elyzee</cms:editable>
		<cms:editable type='text'  name="title_ar" label="Title - Arabic"  order='11' required='1' class='col-md-6'>عن مستشفى إليزي</cms:editable>
		
		<cms:editable type='text'  name="heading_en" label="Heading - English" desc='* Maximum 225 characters' order='20' required='1' class='col-md-6'>Redefining beauty through expert aesthetic care</cms:editable>

		<cms:editable type='text'  name="heading_ar" label="Heading - Arabic" desc='* Maximum 225 characters' order='21' required='1' class='col-md-6'>إعادة تعريف الجمال من خلال رعاية تجميلية متخصصة</cms:editable>
		
		<cms:editable type='textarea'  name="short_desc_en" label="Short Description - English" desc='* Maximum 225 characters' order='30' required='1' height='100' class='col-md-6'>Elyzee Hospital redefines the art of transformation, offering world-class plastic surgery and aesthetic treatments in an ambiance of unparalleled sophistication.</cms:editable>
		<cms:editable type='textarea'  name="short_desc_ar" label="Short Description - Arabic" desc='* Maximum 225 characters' order='31' required='1' height='100' class='col-md-6'>يعيد مستشفى إليزي تعريف فن التحول، حيث يقدم جراحة تجميلية وعلاجات طبية جمالية بمستوى عالمي ضمن أجواء من الفخامة والرقي اللامتناهي.</cms:editable>
		
		<cms:editable type='nicedit' name="bullet_desc_en" label="Bullet Descriptions - English"  order="40" desc='* Add as short bullet points' required='1' class='col-md-6'  height="125"><ul><li>Your Beauty, Our Expertise</li><li>Where Science Meets Beauty</li><li>Cutting-Edge Techniques</li></ul></cms:editable>
		
		<cms:editable type='nicedit' name="bullet_desc_ar" label="Bullet Descriptions - Arabic"  order="41" desc='* Add as short bullet points' required='1' class='col-md-6' height="125"><ul><li>جمالك... خبرتنا</li><li>حيث يلتقي العلم بالجمال</li><li>تقنيات متطورة وحديثة</li></ul></cms:editable>
		
    </cms:editable>
 </cms:editable>




<cms:editable type="group" label="Mission Vision & Purpose" name="p_approach_group" order='20' collapsed='0'>
	<cms:editable name='approach_block_title_row' type='row' order='10'>
		<cms:editable type='text' name="approach_block_title_en" label='Block Title - English' order='10' required='1' class='col-md-6'>Where beauty meets luxury</cms:editable>
		<cms:editable type='text' name="approach_block_title_ar" label='Block Title - English' order='11' required='1' class='col-md-6'>حيث يلتقي الجمال بالفخامة</cms:editable>
	<cms:editable type='text' name="approach_block_short_desc_en" label='Short Description - English' order='20' required='1' class='col-md-6'>The hospital not only offers the latest medical-surgical equipment and technology but also appoints the most experienced surgeons.</cms:editable>
	<cms:editable type='text' name="approach_block_short_desc_ar" label='Short Description - Arabic' order='21' required='1' class='col-md-6'>لا يقتصر المستشفى على توفير أحدث المعدات والتقنيات الطبية والجراحية، بل يضم أيضًا نخبة من الجراحين ذوي الخبرة الواسعة.</cms:editable>
	</cms:editable>
	

<cms:editable name='approach_sections_row' type='row' order='20'>
<cms:repeatable name='approach_sections' label="Add Mission, Vision, Purpose" desc='All fields in a stack are mandatory' stacked_layout='1' order='10' class='col-md-12'>

<cms:editable type='text' name="approach_section_heading_en" label='Heading in English' maxlength='100' order='1' />
<cms:editable type='text' name="approach_section_heading_ar" label='Heading in Arabic'  maxlength='100' order='2' />
<cms:editable type='textarea' name="approach_section_content_en" label='Content in English' height='100' order='3'/>
<cms:editable type='textarea' name="approach_section_content_ar" label='Content in Arabic' height='100' order='4'/>

</cms:repeatable>

</cms:editable>
</cms:editable>


<cms:editable type="group" label="Timeline" name="p_timeline_group" order='30' collapsed='0'>
	<cms:editable name='timeline_title_row' type='row' order='10'>
		<cms:editable type='text'  name="timeline_title_en" label="Timeline Title - English"  order='10' required='1' class='col-md-6'>Elyzee Timeline
</cms:editable>
		<cms:editable type='text'  name="timeline_title_ar" label="Timeline Title - Arabic"  order='11' required='1' class='col-md-6'>الخط الزمني لمستشفى إليزي</cms:editable>
		
		
		<cms:editable type='text'  name="timeline_heading_en" label="Timeline Heading - English" desc='* Maximum 225 characters' order='20' required='1' class='col-md-6'>Your journey to radiant confidence</cms:editable>
		<cms:editable type='text'  name="timeline_heading_ar" label="Timeline Heading - Arabic" desc='* Maximum 225 characters' order='21' required='1' class='col-md-6'>رحلتك نحو ثقة متألقة</cms:editable>
	
		<cms:editable type='textarea'  name="timeline_short_desc_en" label="Timeline Short Description - English" desc='* Maximum 225 characters' order='30' required='1' height='100' class='col-md-6'>Elyzee Hospital is a subsidiary of Safari Group from Riyadh, Saudi Arabia.</cms:editable>
		<cms:editable type='textarea'  name="timeline_short_desc_ar" label="Timeline Short Description - Arabic" desc='* Maximum 225 characters' order='31' required='1' height='100' class='col-md-6'>مستشفى إليزي هو أحد فروع مجموعة سفاري في الرياض، المملكة العربية السعودية.
</cms:editable>
		
		<cms:editable type='nicedit' name="timeline_bullet_desc_en" label="Timeline Bullet Descriptions - English"  order="40" desc='* Add as short bullet points' required='1' class='col-md-6'  height="125"><ul><li>Decades of Trust, Timeless</li><li>The Art &amp; Science of Beauty</li><li>From Vision to Transformation</li><li>Milestones in Excellence</li></ul></cms:editable>
		
		<cms:editable type='nicedit' name="timeline_bullet_desc_ar" label="Timeline Bullet Descriptions - Arabic"  order="41" desc='* Add as short bullet points' required='1' class='col-md-6' height="125"><ul><li>عقود من الثقة والتميّز الدائم</li><li>فن وعلم الجمال</li><li>من الرؤية إلى التحول</li><li>محطات من التميّز</li></ul></cms:editable>
		
		
		<cms:repeatable name='timeline_short_headings_sections' label="Short Headings" desc='All fields in a stack are mandatory' stacked_layout='1' order='50' class='col-md-12'>
		<cms:editable type='text' name="timeline_short_heading_en" label='Short Heading in English' maxlength='100' order='1' />
		<cms:editable type='text' name="timeline_short_heading_ar" label='Short Heading in Arabic'  maxlength='100' order='2' />

		</cms:repeatable>
		
</cms:editable>
</cms:editable>



<cms:editable type="group" label="Why Elyzee - Block" name="p_why_group" order='50' collapsed='0'>
	<cms:editable name='why_title_row' type='row' order='10'>
		<cms:editable type='text'  name="why_title_en" label="Title - English"  order='10' required='1' class='col-md-6'>Why Elyzee
</cms:editable>
		<cms:editable type='text'  name="why_title_ar" label="Title - Arabic"  order='11' required='1' class='col-md-6'>لماذا إليزي
</cms:editable>
		<cms:editable type='text'  name="why_heading_en" label="Heading - English" desc='* Maximum 225 characters' order='20' required='1' class='col-md-6'>Transforming beauty with confidence</cms:editable>

		<cms:editable type='text'  name="why_heading_ar" label="Heading - Arabic" desc='* Maximum 225 characters' order='21' required='1' class='col-md-6'>نحو جمال متجدد بثقة</cms:editable>
		
		<cms:editable type='textarea'  name="why_short_desc_en" label="Short Description - English" desc='* Maximum 225 characters' order='30' required='1' height='100' class='col-md-6'>First and Only Boutique Plastic Surgery and Aesthetic Hospital in the UAE. Enjoy top-quality care in a cozy and luxurious space that makes your journey to looking and feeling great special.</cms:editable>
		<cms:editable type='textarea'  name="why_short_desc_ar" label="Short Description - Arabic" desc='* Maximum 225 characters' order='31' required='1' height='100' class='col-md-6'>أول مستشفى تجميلي وبوتيك للجراحة التجميلية والعناية الجمالية في دولة الإمارات. استمتع برعاية طبية عالية الجودة في أجواء مريحة وفاخرة تجعل رحلتك نحو الجمال والثقة تجربة فريدة ومميزة.</cms:editable>
		
		<cms:editable type='nicedit' name="why_bullet_desc_en" label="Bullet Descriptions - English"  order="40" desc='* Add as short bullet points' required='1' class='col-md-6'  height="125"><ul><li>Restore Firmness and Shape</li><li>Minimize and Improve Scars</li><li>Tailored Enhancements for Men</li></ul></cms:editable>
		
		<cms:editable type='nicedit' name="why_bullet_desc_ar" label="Bullet Descriptions - Arabic"  order="41" desc='* Add as short bullet points' required='1' class='col-md-6' height="125"><ul><li>استعادة التماسك والشكل الطبيعي</li><li>تقليل الندبات وتحسين مظهرها</li><li>تحسينات مصممة خصيصًا للرجال</li></ul></cms:editable>
		
    </cms:editable>
 </cms:editable>
 
 
 
 <cms:editable type="group" label="How Elyzee Works - Block" name="p_how_group" order='60' collapsed='0'>
 	<cms:editable name='how_title_row' type='row' order='10'>		
 		<cms:editable type='text'  name="how_heading_en" label="Heading - English" desc='* Maximum 225 characters' order='20' required='1' class='col-md-6'>Where Your Stunning Transformation Begins</cms:editable>
		<cms:editable type='text'  name="how_heading_ar" label="Heading - Arabic" desc='* Maximum 225 characters' order='21' required='1' class='col-md-6'>حيث تبدأ رحلتك نحو تحول جمالي مذهل</cms:editable>
 		
		
 		<cms:editable type='textarea'  name="how_short_desc_en" label="Short Description - English" desc='* Maximum 225 characters' order='30' required='1' height='100' class='col-md-6'>Experience a smooth and trusted aesthetic journey tailored to your goals. With personalized consultations, expert procedures, and dedicated aftercare, we ensure clarity, comfort, and confidence at every stage.</cms:editable>
 		<cms:editable type='textarea'  name="how_short_desc_ar" label="Short Description - Arabic" desc='* Maximum 225 characters' order='31' required='1' height='100' class='col-md-6'>اختبري رحلة تجميلية سلسة وداعمة وموثوقة، مصممة وفق أهدافك لتعزيز جمالك الطبيعي. من استشارتك الأولى إلى خطط العلاج المخصصة والإجراءات المتقدمة والرعاية اللاحقة والمتابعات الدورية، يضمن لك فريقنا الوضوح والراحة والثقة بدقة وعناية لتحقيق نتائج استثنائية في كل مرحلة.</cms:editable>
 		
		<cms:repeatable name='how_bullet_sections' label="Bullets Points" desc='All fields in a stack are mandatory' stacked_layout='1' order='40' class='col-md-12'>
		<cms:editable type='text' name="heading_en" label='Short Heading in English' maxlength='100' order='10' />
		<cms:editable type='text' name="heading_ar" label='Short Heading in Arabic' maxlength='100' order='11' />
		
		<cms:editable type='textarea' name="short_desc_en" height='75' label='Short Heading in English' order='20' />
		<cms:editable type='textarea' name="short_desc_ar" height='75' label='Short Heading in Arabic' order='21' />

 		</cms:repeatable>
		
 	</cms:editable>
 </cms:editable>

  

<cms:embed 'common/page_seo_editables.inc'/>

</cms:template>

<cms:trim "<cms:embed 'common/header.inc' />"/>

<cms:trim "<cms:embed 'about/block_view.inc'/>"/>
<cms:trim "<cms:embed 'about/approach_view.inc'/>"/>
<cms:trim "<cms:embed 'about/journey_view.inc'/>"/>
<cms:trim "<cms:embed 'about/why_block_view.inc'/>"/>
<cms:trim "<cms:embed 'about/how_block_view.inc'/>"/>
<cms:trim "<cms:embed 'common/footer.inc' />"/>
 <?php COUCH::invoke(); ?>