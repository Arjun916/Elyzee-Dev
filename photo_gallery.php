<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='Photo Gallery' clonable='1'  gallery='1' order='1000' executable='0' hidden='1'>	
<cms:editable type='group' label='Page Publish Status' name='p_publish_group' order='2' collapsed='0'/>

<cms:config_form_view>
<cms:field 'k_publish_date' group='p_publish_group'  />
</cms:config_form_view>

<cms:editable 
name='gg_image' 
label='Upload your main image here' 
desc='(Will be cropped/resized to 1920x1280px)'
width='1920'
height='1280'
show_preview='1'
preview_height='200'
type='image'
/>

<cms:editable 
name='gg_thumb' 
label='Image Thumbnail' 
desc='Thumbnail of the main image above'
width='640'
height='360'
enforce_max='1'
assoc_field='gg_image' 
show_preview='1'
type='thumbnail'
/>  


<cms:editable 
type='relation'
name='gallery_photo' 
masterpage='news-events.php' 
has='one' 
label='Related Gallery'
/>

<cms:config_list_view exclude='default-page-for-photo_gallery-php' searchable='0' orderby='weight' order='asc' limit='300' paginate='1'>
<cms:field 'k_selector_checkbox' />
<cms:field 'k_page_title' sortable='0' />
<cms:field 'gallery_photo' />
<cms:field 'k_up_down' />
<cms:field 'k_actions' />
</cms:config_list_view>


</cms:template>

<cms:set current_url="<cms:link 'news-events.php'/>" />
<cms:redirect url=current_url />

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sample Gallery</title>
<style type="text/css">
body{
background:white none repeat scroll 0;
margin:0 auto;
padding:0;
width:780px;
}

/* Gallery */
#gallery-wrapper{
font-size:13px;
font-family:Arial,Helevtica,Verdana,san-serif;
overflow:auto;
width:100%;
}
#gallery-wrapper h1{
font-size:1.8em;
font-weight:bold;
display:block;
margin:0.67em 0;
}
#gallery-wrapper #breadcrumbs{
margin:25px 0 20px 0;
padding:2px;
line-height:28px;
font-size:14px;
color:#666;
border-top: 1px solid #ccc;
border-bottom: 1px solid #ccc;
}
#gallery-wrapper #breadcrumbs a{
text-decoration:none;
color:#000;
margin:2px;
}
#gallery-wrapper a{
text-decoration:none;
color:#000;
}
#gallery-wrapper a:focus{ -moz-outline-style: none;  }
ul.gallery{
list-style:none;
margin:0;
padding:0;
clear:both;
}
ul.gallery li{
position:relative;
height:120px;
width:130px;
float:left;
margin:0 0 10px 0;
padding:0px;
overflow:hidden;
text-align:center;
}
ul.gallery.folders li{
height:175px;
}
ul.gallery li:hover img{
border-color: #000;
background: #eee;
}
ul.gallery img{
border: solid 1px #888;
background: #fff;
margin:3px;
padding:5px;
width:100px;
height:100px;
}
ul.gallery span.title, 
ul.gallery span.count_images, 
ul.gallery span.count_folders {
display:block;
color:#666;
padding:0;
margin:3px 10px 2px;
overflow: hidden;
white-space:nowrap;
text-align:center;
}
ul.gallery span.title{
font-size:12px;
font-weight:bold;
}
ul.gallery span.count_images, 
ul.gallery span.count_folders{
font-size:11px;
margin: 1px; 10px;
}
ul.gallery a:hover span{
color: #000;
}
#image_container{
text-align:center;
clear:both;
}
#image_container img{
border: solid 1px #888;
background: #fff;
padding:5px;
margin-bottom: 20px;
}

/*
Paginator -
Source: http://www.strangerstudios.com/sandbox/pagination/diggstyle.php (strangerstudios.com)
*/

div.pagination {
padding: 3px;
margin: 3px;
}

div.pagination a {
padding: 2px 5px 2px 5px;
margin: 2px;
border: 1px solid #666;
zoom: 100%;
text-decoration: none; /* no underline */
color: #666;
}
div.pagination a:hover, div.pagination a:active {
border: 1px solid #000;

color: #000;
}
div.pagination span.page_current {
padding: 2px 5px 2px 5px;
margin: 2px;
border: 1px solid #666;

* zoom: 100%;

font-weight: bold;
background-color: #666;
color: #FFF;
}
div.pagination span.page_disabled {
display: none;
}

* span.elipsis {zoom:100%}   

</style>
</head>
<body>

<div id="gallery-wrapper">
<h1>Sample Gallery</h1>

<div id="breadcrumbs">
<cms:breadcrumbs separator='&nbsp;&raquo;&nbsp;' include_template='1'/><cms:if k_is_page>&nbsp;&raquo;&nbsp;<cms:show k_page_title /></cms:if>
</div><!-- breadcrumbs -->

<cms:if k_is_list >

<!-- gallery folders --> 
<cms:ignore>
NOTE: A few points to note about the way folders are displayed -
1. We display only the immediate child folders of the current folder (root is also considered a folder). 
If the images in the current folder are numerous enough to need pagination, we take care to display the folders
only on the first page.
2. If the folder has an image associated with it (via the 'Manage folders' admin section), that image is used.
If no image is associated, we pick up the first page contained within this folder and use its thumbnail.
Finally if there are no child pages within, we use a default folder icon.
</cms:ignore>

<cms:set my_page="<cms:gpc 'pg' method='get' />" />
<cms:if my_page lt '2' >
<ul class="gallery folders"> 
<cms:folders childof=k_folder_name hierarchical='1' depth='1'>

<cms:set my_folder_image="" />
<cms:if k_folder_image>
<cms:set my_folder_image=k_folder_image />
<cms:else />
<cms:pages folder=k_folder_name include_subfolders='0' limit='1'>
<cms:set my_folder_image=my_thumb_2 scope='parent' />
</cms:pages>
</cms:if>
<cms:if my_folder_image=''><cms:set my_folder_image="<cms:show k_admin_link />theme/images/empty-folder.gif" /></cms:if>

<li>
<a href="<cms:show k_folder_link />" title="<cms:show k_folder_title />">
<img alt="<cms:show k_folder_title />" src="<cms:show my_folder_image />"/>
<span class="title"><cms:show k_folder_title /></span>
<span class="count_images"><cms:show k_folder_totalpagecount /> images</span>
<span class="count_folders"><cms:show k_folder_totalchildren /> folders</span>
</a>
</li>
</cms:folders> 
</ul>   
</cms:if>

<!-- gallery images-->
<ul class="gallery">
<cms:pages folder=k_folder_name include_subfolders='0' limit='18' paginate='1'>
<li>
<a href="<cms:show k_page_link />" title="<cms:show k_page_title />">
<img alt="<cms:show k_page_title />" src="<cms:show my_thumb_2 />"/>
</a>
</li>

<cms:if k_paginated_bottom ><!-- pagination --> 
<div style="clear:both"><cms:paginator /></div>   
</cms:if>

</cms:pages>
</ul>

<cms:else /><!-- k_is_page -->   

<div id="image_container">
<img alt="<cms:show k_page_title />" src="<cms:show gg_image />"/>
</div>

</cms:if>

</div><!-- gallery-wrapper -->

</body>
</html>

<?php COUCH::invoke(); ?>