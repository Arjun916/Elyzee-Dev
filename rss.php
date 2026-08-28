<?php require_once( 'manage/cms.php' ); ?>
<cms:content_type 'text/xml' /><cms:concat '<' '?xml version="1.0" encoding="' k_site_charset '"?' '>' />
<cms:template title='RSS Feed' parent='_modules_' routable='1' hidden='1'>
	<cms:route name='page_view' path="{:page_name}{:format}">
	<cms:route_constraints format='(\.xml)'/><cms:route_validators page_name='title_ready | min_len=3 | max_len=32'/>
	</cms:route>	
</cms:template>

<cms:match_route debug='0' /><cms:set feed_rt_name = rt_page_name/><cms:set feed_template_name_temp = "<cms:show rt_page_name/>.php"/><cms:templates show_hidden='1'  order='asc' > <cms:if (k_template_name eq feed_template_name_temp) && k_template_is_clonable="1" && k_template_is_executable="1">
<cms:set feed_template_name = k_template_name 'global'/></cms:if></cms:templates>
<cms:if "<cms:not_empty feed_template_name />" >
<cms:trim "<cms:embed 'common/globals.inc'/>"/>	
<rss version="2.0"
  xmlns:atom="http://www.w3.org/2005/Atom"
  xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
  xmlns:dc="http://purl.org/dc/elements/1.1/"
  xmlns:content="http://purl.org/rss/1.0/modules/content/">
   <channel>
     <title><cms:show orgname/> <cms:call 'get_page_title' tname=feed_template_name/></title>
     <link><cms:link feed_template_name/></link>
     <atom:link href="<cms:show_with_lc k_template_link/><cms:show feed_rt_name/>.xml" rel="self" type="application/rss+xml" />
     <description><![CDATA[<cms:get_global "short_content_<cms:show k_lang/>" masterpage=feed_template_name/>]]></description>
     <language><cms:show k_lang/>-AE</language>
     <pubDate><cms:date format='D, d M Y H:i:s'/> +0400</pubDate>
     <generator>Elyzee CMS</generator>  
	 <ttl>60</ttl>
	 <sy:updatePeriod>hourly</sy:updatePeriod>
	 <sy:updateFrequency>1</sy:updateFrequency>
	 <copyright><cms:get 'locale.copyright'/> © <cms:date format='Y'/> <cms:show orgname/></copyright>   
	 
	 <image>
	 	<url><cms:show k_site_link/>assets/images/favicons/favicon-96x96.png</url>
        <title><cms:show orgname/> <cms:call 'get_page_title' tname=feed_template_name/></title>
        <link><cms:link feed_template_name/></link>
	 	<width>96</width>
	 	<height>96</height>
	 </image>
	 
	 <cms:pages masterpage=feed_template_name orderby='publish_date' order='desc'>
	 <cms:capture into="rss_content"><cms:get "content_<cms:show k_lang/>"/></cms:capture>
	 <cms:if "<cms:not_empty rss_content />" >
     <item>
       <title><![CDATA[<cms:get "title_<cms:show k_lang/>"/>]]></title>
       <link><cms:show_with_lc k_page_link/></link>
	   <dc:creator><![CDATA[<cms:show orgname/>]]></dc:creator>
	   <description><cms:html_encode><cms:excerpt count='1000' trail='.' truncate_chars='0'><cms:get "content_<cms:show k_lang/>"/></cms:excerpt></cms:html_encode></description>
      
	   <content:encoded><![CDATA[
	       <cms:get "content_<cms:show k_lang/>"/>
	     ]]></content:encoded>
		 
       <pubDate><cms:date k_page_date format='D, d M Y H:i:s'/> +0400</pubDate>
       <guid isPermaLink="true"><cms:show_with_lc k_page_link/></guid>
     </item>
	 </cms:if>
	</cms:pages>
	</channel>
	</rss>
	<cms:else/><cms:redirect url="<cms:show_with_lc k_site_link/>"/></cms:if>
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>