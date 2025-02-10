<?php include 'server_files/cookiesvariables.php'; ?>


<!DOCTYPE html>
<html lang="en">
	<head>
	   
        

		<title><?php echo $title; ?></title>


		<!-- Personal Properties -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=no, shrink-to-fit=no" />
        
        <meta name="description" content="Your trusted EPOS partner in Pontardawe, Wales. Streamline transactions and enhance customer experiences with tailored solutions for Hospitality & Retail."/>
        
        <meta property="og:title" content="VESOPA | Epos Wales - Your Trusted EPOS Partner"/>
        <meta property="og:description" content="Vesopa: Your trusted EPOS partner in Pontardawe, Wales. Elevate your business with our tailored solutions for Hospitality and Retail. Streamline transactions and enhance customer experiences with cutting-edge technology."/>
        <meta property="og:url" content="https://vesopaepos.store"/>
        <meta property="og:site_name" content="Vesopa EPOS Store"/>
        <meta property="og:type" content="website"/>
        <meta property="og:image" content="https://vesopaepos.store/assets/app/preview.jpg"/>
        <meta property="og:image:width" content="1200"/>
        <meta property="og:image:height" content="630"/>


        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:title" content="VESOPA | Epos Wales | 1 High Street, Pontarddulais, Swansea, UK"/>
        <meta name="twitter:description" content="Vesopa: Your trusted EPOS partner in Pontardawe, Wales. Elevate your business with our tailored solutions for the Hospitality and Retail industry. Streamline transactions and enhance customer experiences with cutting-edge technology"/>

        <!-- PWA Code -->
        <link rel="manifest" href="manifest.json" />
        <meta name="theme-color" content="#8a3393">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="apple-touch-icon" href="favicon.png">
        <link rel="apple-touch-startup-image" href="assets/logo/vesopa_logo_monochrome.png">


        <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
            navigator.serviceWorker.register('sw.js');
            });
        }
        </script>
        <script type="module" src="script.js"></script>

        <!-- Place favicon.ico in the root directory -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link rel="icon" href="assets/logo/logo.png">

		<!-- Font Awesome Link -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


		<!-- Material Icons -->
		<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->



		<!-- CSS For this Page -->
		<link rel="stylesheet" href="library/main0.1.0.css?v=1">



		<!-- jQuery 3.5.1 -->
		<script src="library/jquery.min.js"></script>
        
        
        
        
        <!-- Owl Carousel Slider -->
        <link rel="stylesheet" href="library/owlcarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="library/owlcarousel/owl.theme.default.min.css">
        <script src="library/owlcarousel/owl.carousel.min.js"></script>

	</head>

	<body>
        

        <div id="mobile_menu" class="header_mobile_menu">
            <div class="header_mobile_menu_top">
                <div class="header_mobile_heading">
                    <img class="header_left_img" src="assets/logo/vesopa_logo.png" alt="Vesopa EPOS">
                    <a onclick="toogle_mobile_menu()" class="menu_mobile_button"><i class="fa fa-remove"></i></a>
                </div>

                <div class="header_mobile_menus">
                    <a class="menu_item_desktop" href="pricing">Pricing</a>
                    <a class="menu_item_desktop" href="download">Download</a>
                    <a class="menu_item_desktop" href="help">Help</a>
                </div>
            </div>
            <div class="header_mobile_menu_bottom">
                <a class="menu_get_button mobile_login_button" <?php echo $is_user_found ? 'href="myaccount">MyAccount' : 'href="backoffice">BackOffice'; ?></a>
                <a class="menu_get_button" onclick="toogle_mobile_menu()" href="index#try-vesopa">Try VesopaEPOS</a>
            </div>

        </div>

        
        <div class="header">
            <div class="header_inside">
                <div class="header_left">
                    <div class="header_left_img_keeper">
                        <a href="index"><img class="header_left_img desktop_menu_icon" src="assets/logo/vesopa_logo.png" alt="Vesopa EPOS"></a>
                        <a href="index"><img class="header_left_img mobile_menu_icon" src="assets/logo/logo.png" alt="Vesopa EPOS"></a>
                    </div>
                    <div class="header_right_menu">
                        <a class="menu_item_desktop" href="pricing">Pricing</a>
                        <a class="menu_item_desktop" href="download">Download</a>
                        <a class="menu_item_desktop" href="help">Help</a>
                    </div>
                </div>

                <div class="header_right">
                    <a class="menu_item_desktop login_button" <?php echo $is_user_found ? 'href="myaccount">MyAccount' : 'href="backoffice">BackOffice'; ?></a>
                    <a class="menu_get_button" href="index#try-vesopa">Try VesopaEPOS</a>
                    <a onclick="toogle_mobile_menu()" class="menu_mobile_button"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
        
       
        <script>
            const mobile_menu = document.getElementById("mobile_menu");

            function toogle_mobile_menu(){
                if(mobile_menu.className == "header_mobile_menu"){
                    mobile_menu.className = "header_mobile_menu header_mobile_menu_show";
                }else mobile_menu.className = "header_mobile_menu";
            }
        </script>