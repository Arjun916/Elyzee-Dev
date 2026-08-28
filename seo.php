<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='SEO Content Export' order="1000" executable='0' hidden='1'>
  <cms:editable type="text" name="current_folder_name" label="Enter Folder Name"/>
</cms:template>

<!DOCTYPE html>
<html>
<head>
  <style>
    table.seo-table{width:100%;border-collapse:collapse;margin-bottom:40px;font-size:14px;}
    table.seo-table th, table.seo-table td{border:1px dotted #b45f06;padding:10px;vertical-align:top;}
    table.seo-table thead th{background:#000;color:#fff;text-align:left;}
    tr.main-folder{background:#783f04;font-weight:700;color:#fff;}
    tr.sub-folder{background:#b45f06;font-weight:700;color:#fff;}
    tr.page-row td{background:#fff;color:#000;}
    tr.page-row td:nth-child(2){padding-left:25px;} /* indent EN title a bit */
    td.col-no{width:90px;white-space:nowrap;}
    td.col-url a{word-break:break-all;}
  </style>
</head>

<body>

<table class="seo-table">
  <thead>
    <tr>
      <th style="width:90px;">Order</th>
      <th>Title (EN)</th>
      <th>Title (AR)</th>
      <th>URL</th>
    </tr>
  </thead>

  <tbody>

  <!-- MAIN counter -->
  <cms:set main_i='0' />

  <cms:folders masterpage='services.php'
      depth='1'
      orderby='weight'
      order='asc'
      extended_info='1'
      include_custom_fields='1'
      root="<cms:if current_folder_name><cms:show current_folder_name/></cms:if>">

      <cms:incr main_i />
      <cms:set main_prefix="<cms:show main_i />" />

      <!-- MAIN FOLDER ROW -->
      <tr class="main-folder">
        <td class="col-no"><cms:show main_prefix /></td>
        <td><cms:show title_en /></td>
        <td><cms:show title_ar /></td>
        <td class="col-url">
          <a href="<cms:show_with_lc k_folder_link />" target="_blank" rel="noopener"><cms:show_with_lc k_folder_link /></a>
        </td>
      </tr>

      <!-- Pages directly under MAIN (optional) -->
      <cms:if k_folder_pagecount>
        <cms:set main_page_i='0' />
        <cms:pages masterpage='services.php' folder=k_folder_name include_subfolders='0' orderby="weight" order="asc">
          <cms:incr main_page_i />
          <tr class="page-row">
            <td class="col-no"><cms:show main_prefix />.<cms:show main_page_i /></td>
            <td><cms:show title_en /></td>
            <td><cms:show title_ar /></td>
            <td class="col-url">
              <a href="<cms:show_with_lc k_page_link />" target="_blank" rel="noopener"><cms:show_with_lc k_page_link /></a>
            </td>
          </tr>
        </cms:pages>
      </cms:if>

      <!-- SUBFOLDERS under MAIN -->
      <cms:set sub_i='0' />

      <cms:folders masterpage='services.php'
          childof=k_folder_name
          depth='1'
          include_subfolders='1'
          extended_info='1'
          include_custom_fields='1'>

          <cms:incr sub_i />
          <cms:set sub_prefix="<cms:concat main_prefix '.' sub_i />" />

          <tr class="sub-folder">
            <td class="col-no"><cms:show sub_prefix /></td>
            <td><cms:show title_en /></td>
            <td><cms:show title_ar /></td>
            <td class="col-url">
              <a href="<cms:show_with_lc k_folder_link />" target="_blank" rel="noopener"><cms:show_with_lc k_folder_link /></a>
            </td>
          </tr>

          <!-- PAGES under SUBFOLDER -->
          <cms:if k_folder_pagecount>
            <cms:set svc_i='0' />
            <cms:pages masterpage='services.php' folder=k_folder_name orderby="weight" order="asc">
              <cms:incr svc_i />
              <tr class="page-row">
                <td class="col-no"><cms:show sub_prefix />.<cms:show svc_i /></td>
                <td><cms:show title_en /></td>
                <td><cms:show title_ar /></td>
                <td class="col-url">
                  <a href="<cms:show_with_lc k_page_link />" target="_blank" rel="noopener"><cms:show_with_lc k_page_link /></a>
                </td>
              </tr>
            </cms:pages>
          </cms:if>

      </cms:folders>

  </cms:folders>

  </tbody>
</table>

</body>
</html>

<?php COUCH::invoke(); ?>