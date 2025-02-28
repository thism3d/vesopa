<?php 
session_start();
$title = 'Vesopa EPOS | Need Support? Contact Us';
include 'server_files/header.php'; 
?>

<div class="support_section">
    <div class="support_section_top">
        <h1 class="support_section_heading">Get Help with Vesopa EPOS</h1>
        <p class="support_section_brief">Need assistance? Our team is here to help! General support is available Monday to Friday from 9 am to 5 pm, but don't worry if you encounter an emergency outside of these hours or on weekends - we've got you covered. Simply reach out to us via our helpdesk on +441792 316282, WhatsApp, or email, and we'll swiftly address your concerns and provide the support you need. Your satisfaction is our priority, anytime, anywhere.</p>

        <div class="support_section_socials">
            <a href="tel:+447501928043"><i class="fa fa-phone"></i></a>
            <a href="mailto:support@vesopa.com?subject=Support%20Needed"><i class="fa fa-envelope"></i></a>
            <a href="https://wa.me/447501928043?text=Hello%2C%20I%20am%20interested%20in%20Vesopa%20EPOS!"><i class="fa fa-whatsapp"></i></a>
            <a href="https://www.facebook.com/people/Vesopa/100027790131992/"><i class="fa fa-facebook"></i></a>
            <a href="https://uk.linkedin.com/company/made-to-measure-nutrition"><i class="fa fa-linkedin"></i></a>
            <a href="tel:+441792316282"><i class="fa fa-exclamation-triangle"></i></a>
        </div>
    </div>

    <div class="support_section_middle">
        <div class="support_section_middle_left">
            <h2 class="support_section_middle_heading">Get in Touch With Us Now</h2>
            <div class="support_section_middle_inside">
                <div class="support_section_touch_item">
                    <a href="tel:+447501928043" class="support_section_touch_item_inside">
                        <p class="support_section_touch_icon"><i class="fa fa-phone"></i></p>
                        <p class="support_section_touch_title">Phone Number</p>
                        <p class="support_section_touch_anchor">+44 7501 928043</p>
                    </a>
                </div>
                <div class="support_section_touch_item">
                    <a href="mailto:support@vesopa.com?subject=Support%20Needed" class="support_section_touch_item_inside">
                        <p class="support_section_touch_icon"><i class="fa fa-envelope"></i></p>
                        <p class="support_section_touch_title">Email</p>
                        <p class="support_section_touch_anchor">support@vesopa.com</p>
                    </a>
                </div>
                <div class="support_section_touch_item">
                    <a href="https://wa.me/447501928043?text=Hello%2C%20I%20am%20interested%20in%20Vesopa%20EPOS!" class="support_section_touch_item_inside">
                        <p class="support_section_touch_icon"><i class="fa fa-whatsapp"></i></p>
                        <p class="support_section_touch_title">Whatsapp</p>
                        <p class="support_section_touch_anchor">+44 7501 928043</p>
                    </a>
                </div>
                <div class="support_section_touch_item">
                    <div class="support_section_touch_item_inside">
                        <p class="support_section_touch_icon"><i class="fa fa-map-marker"></i></p>
                        <p class="support_section_touch_title">Location</p>
                        <p class="support_section_touch_anchor">1 High Street, Pontardawe, Swansea, SA8 4HU</p>
                    </div>
                </div>
                <div class="support_section_touch_item">
                    <div class="support_section_touch_item_inside">
                        <p class="support_section_touch_icon"><i class="fa fa-life-ring"></i></p>
                        <p class="support_section_touch_title">General Support</p>
                        <p class="support_section_touch_anchor">Monday - Friday<br>9am to 5pm</p>
                    </div>
                </div>
                <div class="support_section_touch_item">
                    <a href="tel:+441792316282" class="support_section_touch_item_inside">
                        <p class="support_section_touch_icon"><i class="fa fa-exclamation-triangle"></i></p>
                        <p class="support_section_touch_title">Emergency Support</p>
                        <p class="support_section_touch_anchor">Available after hours & weekends.<br>Call +44 1792 316282</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="support_section_middle_right">
            <h2 class="support_section_middle_heading">Contact Us</h2>
            <div class="support_section_contact_form_container">
                <form class="try_vesopa_form" action="received_customer_message" method="post" onsubmit="this.querySelector('button').disabled=true;">
                    <input name="name" type="text" class="try_vesopa_input" placeholder="Enter your name *" required>
                    <input name="email" type="email" class="try_vesopa_input" placeholder="Enter email address *" required>
                    <input name="phone" type="text" class="try_vesopa_input" placeholder="Enter phone number *" required>
                    <textarea name="message" type="text" class="try_vesopa_input try_vesopa_textarea" placeholder="Your Message *" required></textarea>
                    <textarea name="comment" style="min-height: auto;" type="text" class="try_vesopa_input try_vesopa_textarea" placeholder="Your Comment"></textarea>
                    <div style="text-align: center;" class="try_vesopa_button_keeper">
                        <button class="try_vesopa_button" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="support_section_bottom">
        <div class="support_section_bottom_item">
            <div class="support_section_bottom_item_inside">
                <img class="support_section_bi_img" src="assets/icons/hiring-01.svg" alt="Hiring">
                <a href="career" class="try_vesopa_button">Log A Job</a>
            </div>
        </div>
        <div class="support_section_bottom_item">
            <div class="support_section_bottom_item_inside">
                <img class="support_section_bi_img" src="assets/icons/HD_M250_062.png" alt="Training">
                <a href="training" class="try_vesopa_button">Book Training</a>
            </div>
        </div>
        <div class="support_section_bottom_item">
            <div class="support_section_bottom_item_inside">
                <img class="support_section_bi_img" src="assets/icons/20.png" alt="Tutorial">
                <a class="try_vesopa_button">Tutorial</a>
            </div>
        </div>
    </div>
</div>

<?php include 'server_files/footer.php'; ?>