<?php 
session_start();
$title = 'Download VESOPA EPOS for Windows';
include 'server_files/header.php'; 
?>


<div class="device_download_section">
    <div class="device_download_main_body">
        <div class="device_download_left">
            <h1 class="downlaod_heading">Download Vesopa EPOS for Windows</h1>
            <p class="download_brief">Optimize your business with an advanced EPOS system for seamless transactions.</p>

            <div class="downlaod_brief_description">
                <p class="donwload_brief_desc_item"><i class="fa fa-check"></i> Efficient sales and inventory management</p>
                <p class="donwload_brief_desc_item"><i class="fa fa-check"></i> Secure payment processing with multi-method support</p>
                <p class="donwload_brief_desc_item"><i class="fa fa-check"></i> Real-time reporting and analytics for better decision-making</p>
                <p class="donwload_brief_desc_item"><i class="fa fa-check"></i> Multi-user access with role-based permissions</p>
                <p class="donwload_brief_desc_item"><i class="fa fa-check"></i> Dedicated customer support for uninterrupted operations</p>
            </div>

            <div class="downlaod_brief_buttons_keeper">
                
                <a class="download_brief_store">
                    <img class="download_brief_image_windows" src="assets/icons/microsoft_store.png">
                </a>
                
                <a href="downloads/VesopaEPOS.msi" download class="download_brief_button">
                    <p class="download_brief_button_text">Download Now<span>v2.1.0</span></p>
                </a>
            </div>

            <div class="download_brief_final">
                <p class="download_free_text">Try <span>30 days</span> free!</p>
            </div>
        </div>

        <div class="device_download_right">
            <img class="device_platform_specific_image mac_app_screenshot" src="assets/demo_screenshots/demo2.jpg" alt="Download Vesopa EPOS Windows">
        </div>
    </div>
</div>


        
<?php include 'server_files/footer.php'; ?>