<?php 
session_start();
$title = 'Vesopa EPOS | Book Training';
include 'server_files/header.php'; 
?>

<div class="support_section">
    <div class="support_section_top">
        <h1 class="support_section_heading">Request A Training Session</h1>
        <p class="support_section_brief">Whether you require comprehensive staff training or a refresher session, we’re here to help. Our experienced technicians provide on-site training tailored to your specific needs, ensuring your team is equipped with the skills and knowledge to excel. Schedule a session today and stay ahead in an ever-evolving technological landscape.</p>
    </div>

    <div class="try_vesopa_container">
        <div class="try_vesopa_left">
            <img class="try_vesopa_img" src="assets/icons/HD_M250_062.png" alt="Training">
        </div>
        <div class="try_vesopa_right" id="try-vesopa">
            <!-- <h2 class="try_vesopa_heading">Ready to Try Vesopa EPOS?</h2> -->

            <form class="try_vesopa_form" action="received_training_booking" method="post" onsubmit="this.querySelector('button').disabled=true;">
                <input name="name" type="text" class="try_vesopa_input" placeholder="Enter your name *" required>
                <input name="email" type="email" class="try_vesopa_input" placeholder="Enter email address *" required>
                <input name="phone" type="text" class="try_vesopa_input" placeholder="Enter phone number *" required>
                <input name="company" type="text" class="try_vesopa_input" placeholder="Enter your company">
                <input name="booking_time" type="datetime-local" class="try_vesopa_input" placeholder="Booking Time *" required>
                <textarea name="message" type="text" class="try_vesopa_input try_vesopa_textarea" placeholder="Message"></textarea>
                <div class="try_vesopa_button_keeper">
                    <button class="try_vesopa_button" type="submit">Request Booking</button>
                </div>
            </form>
        </div>
    </div>


    
</div>

<?php include 'server_files/footer.php'; ?>