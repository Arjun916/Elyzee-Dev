<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='Multi Language Folders' clonable='1' hidden='1' order='1000' parent="_hidden_">
<cms:editable type="group" label="Title of the category or folder" desc='This title will shown in the website' name="p_title_group" order='10'/>		

<cms:editable type="group" label="Highlight Image related to the folder" desc="optional, Size should be 1920x1080px aspect ratio" name="image_group" order='60'/>
<cms:editable name='page_image'
width='1920'
height='1080'
label="Upload Image"
desc="Size should be 1920x1080px aspect ratio"
type='image'
show_preview='1'
preview_height='75'
group="image_group"	
quality='100'
/>
<cms:editable type='group' label='Short Description' name='content_group' desc='The short content' order='50'/>

<cms:each k_supported_langs as='lang' key='lc'>
<cms:editable type='text'  name="title_<cms:show lc />" label="Title in <cms:show lang/>"  group='p_title_group' order=k_count required="1"/>

<cms:editable type='textarea' name="content_<cms:show lc />" label="<cms:show lang/>"  order=k_count group='content_group'/>
</cms:each>

<cms:editable type='color'
   name='category_bgcolor'
   label='Primary color for packages under this category'
   desc='pick a color, any color; Only used in packages area'
   color='#8fb5d6'
   alpha='1'
   width='50%'
   height='100px'
/>


<cms:embed 'common/page_seo_editables.inc'/>

<cms:editable name='hide' type='message' dynamic='default_data'>common/folder_hide.html</cms:editable>

<cms:config_list_view exclude='default-page-for-multi_lang_folder-php' searchable='1' />

</cms:template>
<cms:if k_user_access_level lt '10' ><cms:redirect url="<cms:show_with_lc k_site_link/>"/></cms:if>
<?php COUCH::invoke(); ?>