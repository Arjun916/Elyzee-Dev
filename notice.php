<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='Notification Popup' clonable='1' order="80">

<cms:editable type="group" label="Title" name="p_title_group" order='10'/>		
<cms:editable type="group" label="Highlight Image related to the Popup" desc="Required, Size should be 1920x1080px aspect ratio" name="image_group" order='30' collapsed='0'/>
<cms:editable name='image_en'
width='1080'
height='1350'
label="Upload Popup Image - English"
desc="Required size is 1080x1350px aspect ratio"
type='image'
show_preview='1'
preview_height='75'
group="image_group"	
quality='100'
required='1'
order="10"
/>

<cms:editable name='image_ar'
width='1080'
height='1350'
label="Upload Popup Image - Arabic"
desc="Required size is 1080x1350px aspect ratio"
type='image'
show_preview='1'
preview_height='75'
group="image_group"	
quality='100'
required='1'
order="20"
/>

<cms:editable type="group" label="Title" name="p_title_group" order='10'/>

<cms:editable type='group' label='Page Redirection URL and Details' name='redirection_group' order='150' collapsed='0'/>
<cms:editable name='is_blank' type='radio' label='The URL should open in separate window?' opt_values='No | Yes' order='30' required='1' group='redirection_group' />


<cms:each k_supported_langs as='lang' key='lc'>
<cms:editable type='text'  name="title_<cms:show lc />" label="Title in <cms:show lang/>"  group='p_title_group' order=k_count required='1'/>

<cms:editable name="url_<cms:show lc />" label="URL for the <cms:show lang/> page" validator='url' group='redirection_group' type='text' order=k_count required='1'/>
</cms:each>

<cms:editable type='group' label='Publish Status' name='p_publish_group' order='1000' collapsed='0'/>	
<cms:editable name='end_date' label='Popup Expiry Date & Time' type='datetime' allow_time='1' format='mdy' order="2" required='1' group="p_publish_group"/>
<cms:embed 'common/page_seo_editables.inc'/>


<cms:config_form_view>


<cms:field 'k_page_title' hide='1' skip='1'/>
<cms:persist k_page_title=frm_title_en />
<cms:field 'k_page_name'  group='p_seo_group' order='100' label="Page link name" desc="SEO friendly Slug for page URL"/>
<cms:field 'k_publish_date' group='p_publish_group' order='1' label='Start Date & Status' desc="'Unpublished' will be hidden from the public listing"/>		 
</cms:config_form_view>

<cms:config_list_view exclude='default-page-for-notice-php' searchable='1' >

<cms:html><cms:show_info heading='Helpful Hint:' >
<ol>
<li>Only the most recent active notification will be displayed as a popup</li>
</ol>
</cms:show_info></cms:html>


<cms:field 'k_selector_checkbox' />
<cms:field 'k_page_title' />
<cms:field 'is_blank' header="Ex-Link?"/>

<cms:field 'k_page_date' sortable='1' header="Publish Status">
<cms:if k_page_date='0000-00-00 00:00:00'><span class="label label-error">Unpublished</span><cms:else/>
<cms:if end_date gt "<cms:date format='Y-m-d H:i:s' />">
<span class="label label-success">Active</span>
<cms:else/>
<span class="label label-info">Ended</span>
</cms:if>
</cms:if>
<br>
<cms:date k_page_date format='d M Y H:i:s'/>

</cms:field>

<cms:field 'end_date' sortable='1' header="End Date">
<cms:if k_page_date ne '0000-00-00 00:00:00'>
<cms:date end_date format="d M Y H:i:s"/>
<cms:else/>-</cms:if>
</cms:field>


<cms:field 'k_actions' />

</cms:config_list_view>
</cms:template >
<cms:set url_val="<cms:show_with_lc k_site_link />" 'global' />
<cms:if k_is_page>
<cms:set url_temp = "url_<cms:show k_lang/>" />
<cms:set url_val="<cms:get url_temp />" 'global' />
</cms:if>

<cms:redirect url=url_val />
<?php COUCH::invoke(); ?>