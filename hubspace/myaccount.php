<?php require_once( '../manage/cms.php' ); ?>
<cms:template title='User Profile' parent='_hubspace_' order="5001" access_level='2' hidden='1'/>

<cms:set is_secured_page='1' 'global'/>		

<cms:trim "<cms:embed 'hubspace/header.inc' />"/>
<cms:trim "<cms:embed 'hubspace/breadcrumbs.inc' />"/>	
<cms:trim "<cms:embed 'hubspace/user_profile.inc' />"/>	
<cms:trim "<cms:embed 'hubspace/footer.inc' />"/>	
<?php COUCH::invoke(); ?>