<cms:editable type="group" label="SEO Title, Description, Keywords and Image" desc="Optional but recommended. It will be used solely for SEO purposes and will not appear in the visible website content." name="p_seo_group" order='1500'>
	<cms:editable name='p_seo_title_row' type='row' order='10'>
		<cms:editable type='text' name="page_seo_title_en" label='SEO Friendly Title - English' desc="Optional but recommended. Keep it under maximum 60 characters" order='10' class='col-md-6'/>
		<cms:editable type='text' name="page_seo_title_ar" label='SEO Friendly Title - Arabic' desc="Optional but recommended. Keep it under maximum 60 characters" order='11' class='col-md-6'/>
	</cms:editable>
	
	<cms:editable name='p_seo_desc_row' type='row' order='20'>
		<cms:editable type='textarea' name="page_seo_desc_en" label='SEO Friendly Description - English' desc="Optional but recommended. Keep it under 160 characters" order='20' height='75' class='col-md-6'/>
		<cms:editable type='textarea' name="page_seo_desc_ar" label='SEO Friendly Description - Arabic' desc="Optional but recommended. Keep it under 160 characters" order='21' height='75' class='col-md-6'/>
	</cms:editable>
	
	<cms:editable name='p_seo_keywords_row' type='row' order='30'>
		<cms:editable type='textarea' name="page_seo_keywords_en" label='SEO Friendly Keywords - English' desc="Optional but recommended. Add 5 to 10 highly relevant keyword phrases" order='30' class='col-md-6'/>
		
		<cms:editable type='textarea' name="page_seo_keywords_ar" label='SEO Friendly Keywords - Arabic' desc="Optional but recommended. Add 5 to 10 highly relevant keyword phrases" order='31' class='col-md-6'/>
	</cms:editable>
	
	<cms:editable name='p_seo_image_row' type='row' order='40'>
		<cms:editable name='page_seo_image' width='1200' height='630' label="SEO Friendly - Upload Page Related Image" desc="Optional but recommended, Size will be cropped from the center to match the required aspect ratio 1200x630px" type='image' show_preview='1' preview_height='75' quality='60' crop='1' order='40' class='col-md-12'/>
    </cms:editable>
 </cms:editable>
 
 
 <cms:editable label='Page hits' name='page_hits' type='text' default='1' hidden='1' searchable='0' order='10000' disabled='1'/>