<?php 
$row_affected = false;       // Default Initialisation

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'server_files/connectserver.php';

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $company = $_POST["company"];
    $description = $_POST["description"];

    $stmt = $conn->prepare("INSERT INTO career_request (name, email, phone, company, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $company, $description);

    if ($stmt->execute()) {
        $row_affected = true;

        $mail_address = $email;
        $mail_subject = 'New Job Request From '. $name;

        $mail_html_body = 
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <!--[if gte mso 9]>
        <xml>
            <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="format-detection" content="date=no" />
        <meta name="format-detection" content="address=no" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="x-apple-disable-message-reformatting" />
        <!--[if !mso]><!-->
        <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet" />
        <!--<![endif]-->
        <title>Vesopa EPOS | Job Request</title>
        <!--[if gte mso 9]>
        <style type="text/css" media="all">
            sup { font-size: 100% !important; }
        </style>
        <![endif]-->
        <!-- body, html, table, thead, tbody, tr, td, div, a, span { font-family: Arial, sans-serif !important; } -->
        

        <style type="text/css" media="screen">
            body { padding:0 !important; margin:0 auto !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4ecfa; -webkit-text-size-adjust:none }
            a { color:#f3189e; text-decoration:none }
            p { padding:0 !important; margin:0 !important } 
            img { margin: 0 !important; -ms-interpolation-mode: bicubic; /* Allow smoother rendering of resized image in Internet Explorer */ }

            a[x-apple-data-detectors] { color: inherit !important; text-decoration: inherit !important; font-size: inherit !important; font-family: inherit !important; font-weight: inherit !important; line-height: inherit !important; }
            
            .btn-16 a { display: block; padding: 15px 35px; text-decoration: none; }
            .btn-20 a { display: block; padding: 15px 35px; text-decoration: none; }

            .l-white a { color: #ffffff; }
            .l-black a { color: #282828; }
            .l-pink a { color: #f3189e; }
            .l-grey a { color: #6e6e6e; }
            .l-purple a { color: #9128df; }

            .gradient { background: linear-gradient(to right, #9028df 0%,#f3189e 100%); }

            .btn-secondary { border-radius: 10px; background: linear-gradient(to right, #9028df 0%,#f3189e 100%); }

                    
            /* Mobile styles */
            @media only screen and (max-device-width: 480px), only screen and (max-width: 480px) {
                .mpx-10 { padding-left: 10px !important; padding-right: 10px !important; }

                .mpx-15 { padding-left: 15px !important; padding-right: 15px !important; }

                u + .body .gwfw { width:100% !important; width:100vw !important; }

                .td,
                .m-shell { width: 100% !important; min-width: 100% !important; }
                
                .mt-left { text-align: left !important; }
                .mt-center { text-align: center !important; }
                .mt-right { text-align: right !important; }
                
                .me-left { margin-right: auto !important; }
                .me-center { margin: 0 auto !important; }
                .me-right { margin-left: auto !important; }

                .mh-auto { height: auto !important; }
                .mw-auto { width: auto !important; }

                .fluid-img img { width: 100% !important; max-width: 100% !important; height: auto !important; }

                .column,
                .column-top,
                .column-dir-top { float: left !important; width: 100% !important; display: block !important; }

                .m-hide { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }
                .m-block { display: block !important; }

                .mw-15 { width: 15px !important; }

                .mw-2p { width: 2% !important; }
                .mw-32p { width: 32% !important; }
                .mw-49p { width: 49% !important; }
                .mw-50p { width: 50% !important; }
                .mw-100p { width: 100% !important; }

                .mmt-0 { margin-top: 0 !important; }
            }

                </style>
    </head>
    <body class="body" style="padding:0 !important; margin:0 auto !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4ecfa; -webkit-text-size-adjust:none;">
        <center>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0; padding: 0; width: 100%; height: 100%;" data-bgcolor="Body" bgcolor="#f4ecfa" class="gwfw">
                <tr>
                    <td style="margin: 0; padding: 0; width: 100%; height: 100%;" align="center" valign="top">
                        
                        <!-- Logo -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" data-module="Logo">
                            <tr>
                                <td align="center" valign="top" data-bgcolor="Body" data-primary-order="1" data-primary-type="bgcolor" bgcolor="#f4ecfa">
                                    <table width="600" border="0" cellspacing="0" cellpadding="0" class="m-shell">
                                        <tr>
                                            <td class="td" style="width:600px; min-width:600px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td class="mpx-10">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td class="gradient pt-10" style="border-radius: 10px 10px 0 0; padding-top: 10px;" data-bgcolor="Logo" bgcolor="#f3189e">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td class="img-center p-30 px-15" style="border-radius: 10px 10px 0 0; font-size:0pt; line-height:0pt; text-align:center; padding: 30px; padding-left: 15px; padding-right: 15px;" data-bgcolor="bgcolor" bgcolor="#ffffff">
                                                                                    <a target="_blank"><img data-crop="false" src="https://vesopaepos.store/assets/logo/vesopa_logo.png" style="max-width: 220px;" width="100%" border="0" alt="Vesopa EPOS Logo" /></a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <!-- END Logo -->

                        <!-- Intro -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" data-module="Intro">
                            <tr>
                                <td align="center" valign="top" data-bgcolor="Body" data-primary-order="1" data-primary-type="bgcolor" bgcolor="#f4ecfa">
                                    <table width="600" border="0" cellspacing="0" cellpadding="0" class="m-shell">
                                        <tr>
                                            <td class="td" style="width:600px; min-width:600px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td class="mpx-10">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td class="py-25 px-50 mpx-15" data-bgcolor="Intro" bgcolor="#ffffff" style="padding-top: 25px; padding-bottom: 25px; padding-left: 50px; padding-right: 50px;">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td class="fluid-img img-center pb-50" style="font-size:0pt; line-height:0pt; text-align:center; padding-bottom: 50px;">
                                                                                    <img data-crop="false" src="https://vesopaepos.store/assets/icons/hiring-01.png" style="max-width: 300px;" width="100%" border="0" alt="" />
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="title-30 a-center pb-10" style="font-size:30px; line-height:34px; color:#282828; font-family: Arial, sans-serif; text-align:center; padding-bottom: 10px;">
                                                                                    New Job Position Requested
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="title-36 a-center pb-35" style="font-size:36px; line-height:40px; color:#282828; font-family: Arial, sans-serif; text-align:center; padding-bottom: 35px;">
                                                                                    <strong>Request Received From "'. $name .'"</strong>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="py-30" style="padding-top: 30px; padding-bottom: 30px;">
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <td class="py-35 px-50 mpx-15" style="border-radius: 10px; padding-top: 35px; padding-bottom: 35px; padding-left: 50px; padding-right: 50px; background-color: #f4ecfa;">
                                                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                    <tr>
                                                                                                        <td class="py-20" style="padding-top: 20px;">
                                                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                <tr>
                                                                                                                    <td class="text-18 a-center c-purple pb-15" style="font-size:16px; line-height:22px; font-family: Arial, sans-serif; padding-bottom: 15px;">
                                                                                                                        Phone: <strong><span style="color:#9128df;">'. $phone .'</span></strong>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="text-18 a-center c-purple pb-15" style="font-size:16px; line-height:22px; font-family: Arial, sans-serif; padding-bottom: 15px;">
                                                                                                                        Email: <strong><span style="color:#9128df;">'. $email .'</span></strong>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="text-18 a-center c-purple pb-15" style="font-size:16px; line-height:22px; font-family: Arial, sans-serif; padding-bottom: 15px;">
                                                                                                                        Company: <strong><span style="color:#9128df;">'. $company .'</span></strong>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="text-18 a-center c-purple pb-15" style="font-size:16px; line-height:22px; font-family: Arial, sans-serif; padding-bottom: 15px;">
                                                                                                                        Brief: <strong><span style="color:#9128df;">'. $description .'</span></strong>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                
                                                                                                            </table>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <!-- END Intro -->

                        <!-- Footer -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" data-module="Footer">
                            <tr>
                                <td align="center" valign="top" data-bgcolor="Body" data-primary-order="1" data-primary-type="bgcolor" bgcolor="#f4ecfa">
                                    <table width="600" border="0" cellspacing="0" cellpadding="0" class="m-shell">
                                        <tr>
                                            <td class="td" style="width:600px; min-width:600px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td class="mpx-10">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td data-bgcolor="Footer" class="p-50 mpx-15" bgcolor="#949196" style="border-radius: 0 0 10px 10px; padding: 50px;">
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="center" class="pb-20" style="padding-bottom: 20px;">
                                                                            <!-- Socials -->
                                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td class="img" width="34" style="font-size:0pt; line-height:0pt; text-align:left;">
                                                                                        <a href="https://wa.me/447501928043?text=Hello%2C%20I%20am%20interested%20in%20Vesopa%20EPOS!" target="_blank"><img src="https://vesopaepos.store/assets/social/WhatsApp.svg.png" width="34" height="34" border="0" alt="Whatsapp" /></a>
                                                                                    </td>
                                                                                    <td class="img" width="15" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
                                                                                    <td class="img" width="34" style="font-size:0pt; line-height:0pt; text-align:left;">
                                                                                        <a href="https://www.facebook.com/people/Vesopa/100027790131992/" target="_blank"><img src="https://vesopaepos.store/assets/social/facebook.svg.png" width="34" height="34" border="0" alt="Facebook" /></a>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <!-- END Socials -->
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td data-color="text-color-footer" data-size="text-size-footer" data-min="12" data-max="36" class="text-14 lh-24 a-center c-white l-white pb-20" style="font-size:14px; font-family: Arial, sans-serif; min-width:auto !important; line-height: 24px; text-align:center; color:#ffffff; padding-bottom: 20px;">
                                                                            Address: 1 High Street, Pontardawe, Swansea, SA8 4HU, United Kingdom
                                                                            <br />
                                                                            <a href="tel:+447501928043" target="_blank" class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">+44 7501 928043</span></a> - <a href="tel:+441792316282" target="_blank" class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">+44 1792 316282</span></a>
                                                                            <br />
                                                                            <a href="mailto:support@vesopa.com" target="_blank" class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">support@vesopa.com</span></a> - <a href="https://vesopaepos.store/" target="_blank" class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">vesopaepos.store</span></a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="center">
                                                                            <!-- Download App -->
                                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td class="img" width="117" style="font-size:0pt; line-height:0pt; text-align:left;">
                                                                                        <a target="_blank"><img src="https://vesopaepos.store/assets/icons/microsoft_store.png" width="100%" style="max-width: 100px;" border="0" alt="" /></a>
                                                                                    </td>
                                                                                    <td class="img" width="15" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
                                                                                    <td class="img" width="117" style="font-size:0pt; line-height:0pt; text-align:left;">
                                                                                        <a target="_blank"><img src="https://vesopaepos.store/assets/icons/download_app_store.png" width="100%" style="max-width: 120px;" border="0" alt="" /></a>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <!-- END Download App -->
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>													</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <!-- END Footer -->
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>
';


        require_once 'mail.php';
    }
}

?>






<?php

if($row_affected){
    $title = 'Vesopa EPOS | Demo Request Received';
    require_once 'server_files/header.php';

    echo '
        <div class="support_section">
            <div class="support_section_top">
                <img style="width: 100%; max-width: 300px;" src="assets/icons/Work-Complete-Task-Illustration.svg" alt="Work Complete">
                <h1 class="support_section_heading">Career Request Recevied!</h1>
                <p class="support_section_brief">Thank You! Your Request Has Been Received Successfully. Our Team Will Get Back to You Shortly!</p>
            </div>
        </div>
    ';

    require_once 'server_files/footer.php';
}else{
    header("Location: index.php");
}

?>
