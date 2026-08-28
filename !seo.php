<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='SEO Content Export' order="1000" executable='0' hidden='1'>
<cms:editable type="text" name="current_folder_name" label="Enter Folder Name"/>
</cms:template>

<!DOCTYPE html>
<html>
<head>
	<style>
	    table.seo-table {
	        width: 100%;
	        border-collapse: collapse;
	        margin-bottom: 40px;
	        font-size: 14px;
	    }
	    table.seo-table th,
	    table.seo-table td {
	        border: 1px dotted #b45f06;
	        padding: 10px;
	        vertical-align: top;
	    }
	    table.seo-table thead th {
	        background: #000000;
	        color: #ffffff;
	        text-align: left;
	    }
	    tr.main-folder {
	        background: #783f04;
	        font-weight: 700;
	        color: #ffffff;
	    }
	    tr.sub-folder {
	        background: #b45f06;
	        font-weight: 700;
	        color: #ffffff;
	    }
	    tr.page-row td:first-child {
	        padding-left: 25px;
	    }
	</style>
</head>

<body>
<table class="seo-table">
    <thead>
        <tr>
            <th>Service</th>
            <th>Title</th>
            <th>Short Desc</th>
            <th>Primary (High Intent) Search Keywords</th>
        </tr>
    </thead>

    <tbody>	
	
	
	
	<cms:folders masterpage='services.php' depth='1' orderby='weight' order='asc' extended_info='1' include_custom_fields='1' root="<cms:if current_folder_name><cms:show current_folder_name/></cms:if>">
		
			<tr class="main-folder">
				<td colspan="4">
					<cms:show title_en /> || <cms:show title_ar />
				</td>
			</tr>
		
			<cms:if k_folder_immediate_children || k_folder_pagecount>
			
				<cms:pages masterpage='services.php' folder=k_folder_name include_subfolders='0' orderby="weight" order="asc">
				    <tr class="page-row">
				                               <td><cms:show title_en /><br><br><cms:show title_ar /></td>
				                               <td><cms:show page_seo_title_en /><br><br><cms:show page_seo_title_ar /></td>
				                               <td><cms:show page_seo_desc_en /><br><br><cms:show page_seo_desc_ar /></td>
				                               <td><cms:show page_seo_keywords_en /><br><br><cms:show page_seo_keywords_ar /></td>
				                           </tr>
				
				</cms:pages>
			
			
			
			
			<cms:folders masterpage='services.php' childof=k_folder_name depth='1' include_subfolders='1' extended_info='1' include_custom_fields='1'>
				<tr class="sub-folder"><td colspan="4"><cms:show title_en /> || <cms:show title_ar /></td></tr>
				<cms:if k_folder_pagecount>
					
					
						<cms:pages masterpage='services.php' folder=k_folder_name orderby="weight" order="asc">
							<tr class="page-row">
								<td><cms:show title_en /><br><br><cms:show title_ar /></td>
								<td><cms:if page_seo_title_en><cms:show page_seo_title_en /><cms:else/><cms:show title_en/></cms:if><br><br><cms:if page_seo_title_en><cms:show page_seo_title_ar /><cms:else/><cms:show title_ar/></cms:if></td>
								<td><cms:if page_seo_desc_en><cms:show page_seo_desc_en /><cms:else/><cms:show short_desc_en/></cms:if><br><br><cms:if page_seo_desc_ar><cms:show page_seo_desc_ar /><cms:else/><cms:show short_desc_ar/></cms:if></td>
								<td><cms:show page_seo_keywords_en /><br><br><cms:show page_seo_keywords_ar /></td>
							</tr>
							
						</cms:pages>
					
				</cms:if>
			</cms:folders>	
			</cms:if>	
	</cms:folders>

    </tbody>
</table>

</body>
</html>

<?php COUCH::invoke(); ?>
