<?php require_once( 'manage/cms.php' ); ?>
<cms:template title='Privacy Policy' order="1000">
<cms:editable type="group" label="Title" name="p_title_group" order='10'/>	
<cms:editable type='group' label='Short Description for the page' name='page_short_desc_group' desc='Used mainly for SEO and for page content areas' order='30' collapsed='0'/>	
<cms:editable type="group" label="Highlight Image" desc='Used mainly for SEO, main menu dropdown section and for page content areas' name="image_group" order='40' />
<cms:editable name='page_image' width='1920' height='1080' label="Upload Highlight Image related to the page here" desc="Optional, Size should be 1920x1080px aspect ratio" type='image' show_preview='1' preview_height='75' group="image_group" quality='100' searchable='0'/>		

<cms:editable type='group' label='Description' name='content_group' desc='The main content' order='50'/>
<cms:editable name='banner' type='message' group='content_group' order='10'><cms:embed 'common/shortcodes_embed.html' /></cms:editable>

<cms:each k_supported_langs as='lang' key='lc'>
<cms:editable type='text'  name="title_<cms:show lc />" label="Title in <cms:show lang/>"  group='p_title_group' order=k_count required='1'>Privacy Policy</cms:editable>
<cms:editable type='text' name="short_desc_<cms:show lc />" label="<cms:show lang/>"  order=k_count desc='* Maximum 225 characters' group='page_short_desc_group'>The Privacy Policy outlines how We collect, use, and disclose Your information when You access or use Our Service. It also explains Your privacy rights and the legal protections available to You.</cms:editable>
<cms:editable type='richtext' name="content_<cms:show lc />" label="<cms:show lang/>" toolbar='custom' custom_toolbar='paste, pastetext, pastefromword, undo, redo, removeformat, cut, copy, bold, italic, underline, strike, subscript, superscript, format, image, link, unlink, table, justifyleft, justifycenter, justifyright, justifyblock, numberedlist, bulletedlist, outdent, indent, source' order=k_count group='content_group' required='1' css="<cms:show k_site_link />assets/css/editor.css"  body_class="<cms:show lc />">We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this Privacy Policy.</cms:editable>
</cms:each>

<cms:embed 'common/page_seo_editables.inc'/>
	
</cms:template >


<cms:trim "<cms:embed 'common/header.inc' />"/>

    <!-- error section Start -->
    <section class="page-single-post">
        <div class="container">
            <div class="row post-content ">
                <div class="col-lg-12 post-entry">
					<div class="post-header border-bottom mb-5 border-warning pb-3">
						<h2 class="wow fadeInUp  mb-3 h1"><cms:get "title_<cms:show k_lang/>"/></h2>
						<p class="wow fadeInUp"><cms:get "locale.last_updated"/>: <cms:if modification_date><cms:date modification_date format='d/m/Y'/><cms:else/><cms:date publish_date format='d/m/Y'/></cms:if></p>
					</div>
					<p class="lead wow fadeInUp"><cms:get "short_desc_<cms:show k_lang />" /></p>
					<cms:do_shortcodes><cms:get "content_<cms:show k_lang />" /></cms:do_shortcodes>
					
                </div>
            </div>
        </div>
    </section>
    <!-- error section End -->

<cms:trim "<cms:embed 'common/footer.inc' />"/>
<?php COUCH::invoke(); ?>