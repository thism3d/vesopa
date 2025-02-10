<?php 
session_start();
$title = 'Vesopa EPOS | Career With Vesopa Limited';
include 'server_files/header.php'; 
?>

<div class="support_section">
    <div class="support_section_top">
        <h1 class="support_section_heading">Career with Vesopa Limited</h1>
        <p class="support_section_brief">Experiencing an issue that requires attention? We're here to help. Please complete the form below with detailed information, and our team will promptly assess and address your concern. Our priority is to resolve issues remotely for your convenience. If a remote solution is not possible, we will dispatch a skilled technician to your location to ensure a swift and effective resolution.</p>
    </div>

    <div class="try_vesopa_container">
        <div class="try_vesopa_left">
            <img class="try_vesopa_img" src="assets/icons/hiring-01.svg" alt="Hiring">
        </div>
        <div class="try_vesopa_right" id="try-vesopa">
            <!-- <h2 class="try_vesopa_heading">Ready to Try Vesopa EPOS?</h2> -->

            <form class="try_vesopa_form" action="received_job_information" method="post" onsubmit="this.querySelector('button').disabled=true;">
                <input name="name" type="text" class="try_vesopa_input" placeholder="Enter your name *" required>
                <input name="email" type="email" class="try_vesopa_input" placeholder="Enter email address *" required>
                <input name="phone" type="text" class="try_vesopa_input" placeholder="Enter phone number *" required>
                <input name="company" type="text" class="try_vesopa_input" placeholder="Enter your company">
                <textarea name="description" type="text" class="try_vesopa_input try_vesopa_textarea" placeholder="Please describe the job/issue in as much detail as possible *" required></textarea>
                <div class="try_vesopa_button_keeper">
                    <button class="try_vesopa_button" type="submit">Request Your Position</button>
                </div>
            </form>
        </div>
    </div>


    
</div>

<?php include 'server_files/footer.php'; ?>