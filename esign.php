<?php require_once( 'manage/cms.php' ); ?>
<cms:template title="eSign" hidden='1' order='1000' access_level='2'/><cms:set f_e_type="<cms:get_flash 'e_type' />"/><cms:set f_e_name="<cms:get_flash 'e_name' />"/><cms:set f_e_position="<cms:get_flash 'e_position' />"/><cms:set f_e_email="<cms:get_flash 'e_email' />"/><cms:if f_e_name && f_e_position && f_e_email><cms:set f_e_mobile="<cms:get_flash 'e_mobile' />"/><cms:set f_e_code="<cms:get_flash 'e_code' />"/><cms:set f_e_subdesc="<cms:get_flash 'e_subdesc' />"/><cms:if f_e_code && f_e_code eq '2'><textarea style="width:100%; height:300px; box-sizing:border-box;"></cms:if>
	
<!--[if mso]>
<style>
  * { font-family: 'Aptos','Urbanist','Segoe UI',Arial,sans-serif !important; }
  a { text-decoration: none !important; }
  table, td { border-collapse: collapse !important; mso-table-lspace:0pt !important; mso-table-rspace:0pt !important; }
  img { border:0 !important; outline:none !important; text-decoration:none !important; -ms-interpolation-mode:bicubic !important; }
</style>
<![endif]-->
<p style="width:480px; max-width:480px; font-size:11pt; font-family:'Aptos','Urbanist','Segoe UI',Arial,sans-serif; color:#000000; padding:0;border:0;">Best Regards,</p>
<table cellpadding="0" cellspacing="0" border="0" width="480"
  style="width:480px; max-width:480px; font-family:'Aptos','Urbanist','Segoe UI',Arial,sans-serif; color:#000000; padding:0; margin:0; border:0;">

  <tr>
    <td align="left" valign="top" width="130" style="padding:0; margin:0;">
      <img src="<cms:show k_site_link/>email/elyzee<cms:if f_e_type && f_e_type eq '2'>_group</cms:if>.png" width="130" height="240" alt="Elyzee Hospital"
           style="display:block; border:0; outline:none; filter:none !important; color-scheme:light;">
    </td>

    <td width="5" style="font-size:0; line-height:0;">&nbsp;</td>
    <td valign="top" style="padding:0; margin:0;">

      <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
          <td colspan="2" style="font-size:12pt; font-weight:bold; color:#9d8d58; letter-spacing:1px; <cms:if "<cms:not_empty f_e_subdesc />" ><cms:else/>padding-top:5px;</cms:if>"><cms:show f_e_name/></td>
        </tr>
		<cms:if "<cms:not_empty f_e_subdesc />" >
        <tr>
          <td colspan="2" style="font-size:6pt;color:#9d8d58;padding:0;"><cms:show f_e_subdesc/></td>
        </tr>
		<tr><td colspan="2" height="5" style="line-height:5px; font-size:0.75pt;">&nbsp;</td></tr>
		</cms:if>
        <tr>
          <td colspan="2" style="font-size:10.5pt; letter-spacing:1px; color:#000000;"><cms:show f_e_position/></td>
        </tr>

        <tr><td colspan="2" height="<cms:if "<cms:not_empty f_e_subdesc />" >7<cms:else/>10</cms:if>" style="line-height:<cms:if "<cms:not_empty f_e_subdesc />" >7<cms:else/>10</cms:if>px; font-size:0.75pt;">&nbsp;</td></tr>
        <tr>
          <td valign="top">
            <table cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td valign="middle" style="height:17px; line-height:17px;">
                  <img src="<cms:show k_site_link/>email/mobile.png" width="17" height="17"
                       style="display:block; border:0; filter:none !important;">
                </td>
                <td style="padding-left:5px; font-size:9pt; color:#000000 !important;">
				  <cms:set f_e_mobile = "<cms:if f_e_mobile><cms:show f_e_mobile/><cms:else/>26125805</cms:if>"/>
                  <a href="tel:+971<cms:show f_e_mobile/>" 
                     x-apple-data-detectors="false"
                     style="color:#000000 !important; text-decoration:none !important; mso-style-textfill-type:none;">
                    <span style="color:#000000 !important; text-decoration:none !important;">+971 <cms:show f_e_mobile/></span>
                  </a>
                </td>
              </tr>
            </table>
          </td>
          <td valign="top">
            <table cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td valign="middle" style="height:17px; line-height:17px;">
                  <img src="<cms:show k_site_link/>email/phone.png" width="17" height="17"
                       style="display:block; border:0; filter:none !important;">
                </td>
                <td style="padding-left:5px; font-size:9pt; color:#000000 !important;">
                  <a href="tel:+9718005005" 
                     x-apple-data-detectors="false"
                     style="color:#000000 !important; text-decoration:none !important; mso-style-textfill-type:none;">
                    <span style="color:#000000 !important; text-decoration:none !important;">8005005</span>
                  </a>
                </td>
              </tr>
            </table>
          </td>

        </tr>

        <tr><td colspan="2" height="3" style="line-height:3px; font-size:0.75pt;">&nbsp;</td></tr>
        <tr>
          <td valign="top">
            <table cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td valign="middle" style="height:17px; line-height:17px;">
                  <img src="<cms:show k_site_link/>email/email.png" width="17" height="17"
                       style="display:block; border:0; filter:none !important;">
                </td>
                <td style="padding-left:5px; font-size:9pt; color:#000000 !important;">
                  <a href="mailto:<cms:show f_e_email/>"
                     x-apple-data-detectors="false"
                     style="color:#000000 !important; text-decoration:none !important; mso-style-textfill-type:none;">
                    <span style="color:#000000 !important; text-decoration:none !important;"><cms:show f_e_email/></span>
                  </a>
                </td>
              </tr>
            </table>
          </td>
          <td valign="top">
            <table cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td valign="middle" style="height:17px; line-height:17px;">
                  <img src="<cms:show k_site_link/>email/web.png" width="17" height="17"
                       style="display:block; border:0; filter:none !important;">
                </td>
                <td style="padding-left:5px; font-size:9pt; color:#000000 !important;">
                  <a href="<cms:show k_site_link/>"
                     target="_blank"
                     x-apple-data-detectors="false"
                     style="color:#000000 !important; text-decoration:none !important; mso-style-textfill-type:none;">
                    <span style="color:#000000 !important; text-decoration:none !important;">www.elyzee.ae</span>
                  </a>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <tr><td colspan="2" height="3" style="line-height:3px; font-size:0.75pt;">&nbsp;</td></tr>
        <tr>
          <td colspan="2">
            <table cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td valign="middle" style="height:17px; line-height:17px;">
                  <img src="<cms:show k_site_link/>email/location.png" width="17" height="17"
                       style="display:block; border:0; filter:none !important;">
                </td>
                <td style="padding-left:5px; font-size:9pt; color:#000000 !important;">
                  <a href="https://maps.app.goo.gl/kRgB7bew76dyjDMZ8"
                     target="_blank"
                     x-apple-data-detectors="false"
                     style="color:#000000 !important; text-decoration:none !important; mso-style-textfill-type:none;">
                    <span style="color:#000000 !important; text-decoration:none !important;">P.O. Box: 62932, Abu Dhabi – U.A.E</span>
                  </a>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <tr><td colspan="2" height="<cms:if "<cms:not_empty f_e_subdesc />" >7<cms:else/>10</cms:if>" style="line-height:<cms:if "<cms:not_empty f_e_subdesc />" >7<cms:else/>10</cms:if>px; font-size:0.75pt;">&nbsp;</td></tr>
        <tr>
          <td valign="top">
            <table cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td valign="middle" style="padding-right:5px; height:45px;">
                  <img src="<cms:show k_site_link/>email/jci.png" width="40" height="40"
                       style="display:block; border:0; filter:none !important; color-scheme:light;">
                </td>
                <td valign="middle" style="padding-right:5px; height:45px;">
                  <img src="<cms:show k_site_link/>email/jdc.png" width="40" height="40"
                       style="display:block; border:0; filter:none !important; color-scheme:light;">
                </td>
                <td valign="middle" style="height:45px;">
                  <img src="<cms:show k_site_link/>email/gpw.png" width="40" height="40"
                       style="display:block; border:0; filter:none !important; color-scheme:light;">
                </td>
              </tr>
            </table>

            <table cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td style="<cms:if "<cms:not_empty f_e_subdesc />" >padding:0<cms:else/>padding-top:2</cms:if>px; font-size:9pt; color:#000000;">Beauty . Innovation . Trust</td>
              </tr>
            </table>
          </td>

          <td valign="middle" style="padding-left:10px; font-size:9pt; color:#9d8d58;">
            <table cellpadding="0" cellspacing="0" border="0">
              <tr><td colspan="7" style="font-size:9.75pt; padding-bottom:4px;color:#9d8d58;"><strong>Follow us on</strong></td></tr>
              <tr>

                <td style="padding-right:3px;">
                  <a href="https://www.instagram.com/elyzeehospital/" target="_blank">
                    <img src="<cms:show k_site_link/>email/ig.png" width="20" height="20" style="display:block; border:0; filter:none !important;">
                  </a>
                </td>

                <td style="padding-right:3px;">
                  <a href="https://www.facebook.com/ElyzeeAE/" target="_blank">
                    <img src="<cms:show k_site_link/>email/fb.png" width="20" height="20" style="display:block; border:0; filter:none !important;">
                  </a>
                </td>

                <td style="padding-right:3px;">
                  <a href="https://www.snapchat.com/add/elyzeehospital" target="_blank">
                    <img src="<cms:show k_site_link/>email/sc.png" width="20" height="20" style="display:block; border:0; filter:none !important;">
                  </a>
                </td>

                <td style="padding-right:3px;">
                  <a href="https://wa.me/9718005005" target="_blank">
                    <img src="<cms:show k_site_link/>email/wa.png" width="20" height="20" style="display:block; border:0; filter:none !important;">
                  </a>
                </td>

                <td style="padding-right:3px;">
                  <a href="https://www.youtube.com/@elyzeehospital" target="_blank">
                    <img src="<cms:show k_site_link/>email/yt.png" width="20" height="20" style="display:block; border:0; filter:none !important;">
                  </a>
                </td>

                <td style="padding-right:3px;">
                  <a href="https://www.tiktok.com/@elyzeehospital" target="_blank">
                    <img src="<cms:show k_site_link/>email/tt.png" width="20" height="20" style="display:block; border:0; filter:none !important;">
                  </a>
                </td>

                <td>
                  <a href="https://www.linkedin.com/company/elyzee-hospital" target="_blank">
                    <img src="<cms:show k_site_link/>email/in.png" width="20" height="20" style="display:block; border:0; filter:none !important;">
                  </a>
                </td>

              </tr>
            </table>
          </td>
        </tr>

        <tr><td colspan="2" height="6" style="line-height:6px; font-size:0.75pt;">&nbsp;</td></tr>
        <tr>
          <td colspan="2" style="font-size:6pt; color:#000000; border-top:1px solid #ccc; border-bottom:1px solid #ccc; padding-top:3px; padding-bottom:3px; line-height:1.2;">Disclaimer: The content of this email is confidential and intended for the recipient specified.
            Unauthorized sharing is prohibited. If you received this by mistake, please delete it immediately.</td>
        </tr>
		<cms:if "<cms:not_empty f_e_subdesc />" ><cms:else/><tr><td colspan="2" height="4" style="line-height:4px; font-size:0.75pt;">&nbsp;</td></tr></cms:if>
        <tr>
          <td colspan="2" style="font-size:6pt; color:#000000;">
            <table cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td valign="middle" style="height:17px; line-height:17px;"><img src="<cms:show k_site_link/>email/ev.png" width="14" height="14" style="display:block; border:0; filter:none !important;"></td>
                <td style="padding-left:5px; font-size:6pt; height:17px; line-height:17px;">Please consider the environment before printing this email.</td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table><cms:if f_e_code && f_e_code eq '2'></textarea></cms:if><cms:set_flash name='logout_type' value="1" />
<cms:else/>
<cms:set f_logout_type="<cms:get_flash 'logout_type' />"/>
<cms:if (k_user_access_level lt '10') && f_logout_type && (f_logout_type eq '1')>
<cms:redirect url=k_logout_link />
<cms:else/>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-theme="light">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noimageindex, nocache">
<meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet, noimageindex, nocache">
<link rel="canonical" href="<cms:show_with_lc k_site_link/>">

<meta name="author" content="Asha Antony">
<title>Email Signature Generator </title>

<meta name="theme-color" content="#000000">
<!-- Favicons -->
<link rel="icon" type="image/png" href="<cms:show k_site_link/>assets/images/favicons/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="<cms:show k_site_link/>assets/images/favicons/favicon.svg" />
<link rel="shortcut icon" href="<cms:show k_site_link/>assets/images/favicons/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="<cms:show k_site_link/>assets/images/favicons/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="<cms:show orgname />" />
<link rel="manifest" href="<cms:show k_site_link/>assets/images/favicons/site.webmanifest" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

</head>
<body dir="ltr">
<div class="container mx-auto small">
<div class="row justify-content-center">
<div class="col-md-10 col-lg-8 col-xl-6 shadow rounded">
<div class="row pt-3 mt-2 position-relative">
<small class="position-absolute top-0 start-0 text-muted">Hello, <cms:show k_user_title/> (<a href="<cms:show k_logout_link />" class="text-link text-black">Logout</a>)</small>
<img src="<cms:show k_site_link/>assets/images/logo/elyzee.svg" class="position-absolute top-0 end-0" style="width:25%;max-width:150px;">
<h4 class="col-12 mb-1 mt-3">Email Signature Generator</h4>
<p class="col-12 mb-2 small">Please fill out the form to generate your email signature.</p>
<div class="col-12 small">
<div class="alert alert-info mb-2">
<h6 class="mb-1">Important: Please Read!</h6>
<strong>After generating your email signature, follow these steps:</strong>
<ol class="m-0">
<li>Click anywhere within the generated signature.</li>
<li>Use the keyboard shortcut <strong>Ctrl+A</strong> (Windows) or <strong>Cmd+A</strong> (Mac) to select the entire signature.</li>
<li>Next, copy the selected signature by using the keyboard shortcut <strong>Ctrl+C</strong> (Windows) or <strong>Cmd+C</strong> (Mac).</li>
<li>Finally, go to your desired email platform or email client, click within the signature field, and paste the copied signature by using <strong>Ctrl+V</strong> (Windows) or <strong>Cmd+V</strong> (Mac).</li>
</ol>
</div>
</div>

<div class="col-12 small">
<div class="alert alert-warning">
<h6 class="mb-1">Enter your details to create your email signature.</h6>
Fields marked <span class="text-danger">*</span> are required/mandatory for email signature.
<hr class="mt-1 mb-0">

<cms:form name='sign' anchor='0'>
<cms:if k_success >
<cms:set_flash name='e_type' value=frm_e_type />
<cms:set_flash name='e_name' value="<cms:php> echo strtoupper('<cms:show frm_e_name/>');</cms:php>" />
<cms:set_flash name='e_position' value="<cms:php> echo strtoupper('<cms:show frm_e_position/>');</cms:php>" />
<cms:set_flash name='e_email' value="<cms:php> echo strtolower('<cms:show frm_e_email/>');</cms:php>" />
<cms:set_flash name='e_mobile' value=frm_e_mobile />
<cms:set_flash name='e_subdesc' value=frm_e_subdesc />
<cms:set_flash name='e_code' value=frm_e_code />
<cms:redirect k_page_link />
</cms:if>

<cms:if k_error>
<div class="alert alert-danger d-block p-2">
* Please clear the below mentioned errors and try again!
<ul class="mb-0"><cms:each k_error ><li><small><cms:show item /></small></li></cms:each></ul>
</div>
</cms:if>

<div class="form-group my-3">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text text-muted small">Signature Type <span class="text-danger">*</span></span>
</div>
<cms:input name="e_type" type="dropdown" class="form-control form-control-sm form-select ps-1" label="Signature Type" opt_values="Elyzee Hospital=1 | Elyzee Healthcare Group=2" opt_selected="1"/>
</div>
</div>
<div class="form-group mb-3">
<label>Full Name <span class="text-danger">*</span> <span class="text-muted">(eg: Jane Smith, Dr. John Doe)</span></label>
<cms:input type="text" name="e_name" class="form-control form-control-sm text-uppercase" placeholder="Full Name in English" label="Full Name" required='1'/>
<cms:if k_error_e_name><span class="invalid-feedback d-block m-0">* <cms:show k_error_e_name/></span></cms:if>
</div>

<div class="form-group mb-3">
<label>Designation <span class="text-danger">*</span> <span class="text-muted">(eg: HR Manager, Consultant Dermatologist)</span></label>
<cms:input type="text" name="e_position" class="form-control form-control-sm text-uppercase" placeholder="Designation in English" label="Designation" required='1'/>
<cms:if k_error_e_position><span class="invalid-feedback d-block m-0">* <cms:show k_error_e_position/></span></cms:if>		
</div>

<div class="form-group mb-3">
<label>Accreditations or Certifications <span class="text-muted">(Optional. if not empty, will be shown in small letters under the name)</span></label>
<cms:input type="text" name="e_subdesc" class="form-control form-control-sm" placeholder="eg: Plastic, Aesthetic & Reconstructive Surgeon" label="Accreditations"/>	
</div>

<div class="form-group mb-3">
<label>Email <span class="text-danger">*</span> (use only @elyzee.ae email)</label>
<cms:input type="text" name="e_email" class="form-control form-control-sm text-lowercase" placeholder="x.xxxxxx@elyzee.ae" label="Email" validator="email" required='1'/>
<cms:if k_error_e_email><span class="invalid-feedback d-block m-0">* <cms:show k_error_e_email/></span></cms:if>		
</div>

<div class="form-group mb-3">
<label>Mobile (avoid leading 0 & country code, eg: 512345678)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text text-muted small">+971</span>
</div>
<cms:input type="text" name="e_mobile" class="form-control form-control-sm ps-1" placeholder="5xxxxxxxx" label="Mobile" validator="exact_len=9 | non_zero_integer" validator_msg='exact_len=Enter only the last 9 digits of your mobile number (no leading 0, no country code). | non_zero_integer=Only the last 9 digits of your mobile number are allowed (no leading 0, no country code).'/>
</div>
<cms:if k_error_e_mobile><span class="invalid-feedback d-block m-0">* <cms:show k_error_e_mobile/></span></cms:if>
<small class="text-muted">(** If left empty, the Elyzee Hospital landline number +971 26125805 will be displayed)</small>
</div>

<cms:ignore>
<cms:if k_user_access_level ge '10'>
<div class="form-group mb-3">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text text-muted small">Get HTML Code? <span class="text-danger">*</span></span>
</div>
<cms:input name="e_code" type="dropdown" class="form-control form-control-sm form-select ps-1" label="Get HTML Code?" opt_values="No, Show the Signature=1 | Yes, Get the HTML Code=2" opt_selected="1"/>
</div>
</div>
</cms:if>
</cms:ignore>


<div class="form-group text-end">	
<button type="submit" class="btn btn-sm btn-dark text-warning">Generate Signature</button>
</div>  
</cms:form>
</div>
</div>
</div>

<footer class="small text-muted mb-3 text-center">&copy; <cms:date format="Y"/> Copyright <a href="<cms:show_with_lc k_site_link/>" target=_blank class=" text-link text-black">Elyzee Hospital</a>. All rights reserved.<br>
</footer>
</div>
</div>
</div>
</body>
</html>
</cms:if>
</cms:if>
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>