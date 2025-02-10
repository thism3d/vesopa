<?php 
session_start();
$title = 'VESOPA | Epos Wales | 1 High Street, Pontarddulais, Swansea, UK';
include 'server_files/header.php'; 
?>



<div class="container_1">
    <video autoplay muted loop playsinline>
        <source src="assets/logo/file.mp4" type="video/mp4">
    </video>

    <h1 class="front_heading">Welcome to Vesopa <span>EPOS Store</span></h1>
    <h2 class="front_heading_2">Reliable and innovative solutions <span>|</span> <b>Powering Your Business</b></h2>

    <a href="#try-vesopa" class="menu_get_button menu_get_button_middle">Try Vesopa EPOS</a>
    <p class="money_back_text"><b>30 Day Money Back Guarantee</b></p>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const video = document.querySelector("video");
        video.play().catch(error => console.error("Autoplay failed:", error));
    });
</script>

<div class="epos_demo_container">
    <div class="epos-demo-carousel owl-carousel">
        <div class="epos_demo_carousel_item">
            <div class="epos_demo_item">
                <img class="epos_demo_item_img" src="assets/demo_screenshots/demo2.jpg" alt="Vesopa EPOS Demo">
                <div class="epos_demo_item_txt_keeper">
                    <h2 class="epos_demo_item_brief">Beautifully Designed</h2>
                    <h2 class="epos_demo_item_heading">A Modern Home Screen for an Advanced EPOS Experience</h2>
                </div>
            </div>
        </div>
        <div class="epos_demo_carousel_item">
            <div class="epos_demo_item">
                <img class="epos_demo_item_img" src="assets/demo_screenshots/demo1.jpg" alt="Vesopa EPOS Demo">
                <div class="epos_demo_item_txt_keeper">
                    <h2 class="epos_demo_item_brief">Seamless User Experience</h2>
                    <h2 class="epos_demo_item_heading">Switch Effortlessly Between Light and Dark Modes</h2>
                </div>
            </div>
        </div>
        <div class="epos_demo_carousel_item">
            <div class="epos_demo_item">
                <img class="epos_demo_item_img" src="assets/demo_screenshots/demo3.jpg" alt="Vesopa EPOS Demo">
                <div class="epos_demo_item_txt_keeper">
                    <h2 class="epos_demo_item_brief">Flexible & Interactive</h2>
                    <h2 class="epos_demo_item_heading">A Customizable Payment Solution for Every Business</h2>
                </div>
            </div>
        </div>
        <div class="epos_demo_carousel_item">
            <div class="epos_demo_item">
                <img class="epos_demo_item_img" src="assets/demo_screenshots/demo4.jpg" alt="Vesopa EPOS Demo">
                <div class="epos_demo_item_txt_keeper">
                    <h2 class="epos_demo_item_brief">Smart Table Management</h2>
                    <h2 class="epos_demo_item_heading">Vesopa EPOS Brings an Intuitive Seating Solution</h2>
                </div>
            </div>
        </div>
    </div>
  
    <script>
        $(document).ready(function(){
            $(".epos-demo-carousel").owlCarousel({ 
            loop:true,
            nav:true,
            dots:true,
            rewind:true,
            lazyLoad: true,
            autoplay: true,
            autoplayTimeout: 4000,
            responsive:{
                0:{
                    items:1
                },
                335:{
                    items:1
                },
                600:{
                    items:1
                },
                800:{
                    items:1
                },
                1024:{
                    items:1
                }
            }
            });
        });
    </script>
</div>

    
<div class="free_offer_container">
    <div class="free_offer_left">
        <img class="free_offer_img" src="assets/icons/gift_icon.png" alt="Vesopa EPOS Free Offer">
        <img class="free_offer_img free_offer_mobile_show" src="assets/icons/Payment-by-card-processed-on-POS-terminal.png" alt="Vesopa EPOS Free Offer">
    </div>
    <div class="free_offer_middle">
        <h2 class="hour_free_headline">Get Exclusive Access to Vesopa EPOS</h2>
        <p class="hour_free_desc">Interested in trying Vesopa EPOS? Contact us today to request a personalized trial. Once we verify your details, we will provide comprehensive training and support to help you get started with the system.</p>
        
        <p class="free_no_card">Grab exclusive offers!</p>
        
        <a href="#try-vesopa" class="menu_get_button menu_get_button_middle">Try Vesopa EPOS</a>
    </div>
    <div class="free_offer_right">
        <img class="free_offer_img" src="assets/icons/Payment-by-card-processed-on-POS-terminal.png" alt="Vesopa EPOS Free Offer">
    </div>
</div>



<div class="fast_servers_container">
    <h2 class="fast_server_headline">Vending <span>Software Payment</span></h2>
    <div>
        
        <div class="flag-carosel owl-carousel">
            <div class="flag_item">
                <div class="flag_item_inside">
                    <img class="flat_item_image" src="assets/with_us/newbridge.png" alt="Newbridge">
                </div>
            </div>
            <div class="flag_item">
                <div class="flag_item_inside">
                    <img class="flat_item_image" src="assets/with_us/icrtouch.png" alt="ICRTouch">
                </div>
            </div>
            <div class="flag_item">
                <div class="flag_item_inside">
                    <img class="flat_item_image" src="assets/with_us/dojo.png" alt="Dojo">
                </div>
            </div>
            <div class="flag_item">
                <div class="flag_item_inside">
                    <img class="flat_item_image" src="assets/with_us/sam4s.png" alt="Sam4s">
                </div>
            </div>
            <div class="flag_item">
                <div class="flag_item_inside">
                    <img class="flat_item_image" src="assets/with_us/oxhoo.png" alt="Oxhoo">
                </div>
            </div>
        </div>
        
    </div>
    <p class="fast_server_description">The Smarter Way <span>to Manage Sales, Payments, and Growth!</span></p>
    
    <script>
        $(document).ready(function(){
            $(".flag-carosel").owlCarousel({ 
            loop:true,
            nav:false,
            rewind:true,
            lazyLoad: true,
            autoplay: true,
            autoplayTimeout: 2000,
            responsive:{
                0:{
                    items:3
                },
                335:{
                    items:4
                },
                600:{
                    items:5
                },
            }
            });
        });
    </script>
</div>


<div class="container_2">
    <div class="continaer_2_left">
        <div class="protect_data_icon_keeper">
            <img class="protect_data_icon" src="assets/icons/Cybersecurity-for-computer-data.png" alt="Vesopa EPOS Security">
        </div>
        <h2 class="protect_data_h2">Data Protection</h2>
        <p class="protect_data_p">Safeguard your business with <span>enterprise-grade security</span> built into Vesopa EPOS. Our system ensures that your sales, transactions, and customer data remain <span>fully encrypted and protected</span> from unauthorized access.</p>
        
        <p class="protect_data_p">With <span>ecure cloud backups, user access controls, and compliance with industry standards,</span> Vesopa EPOS keeps your data safe while allowing you to focus on growing your business.</p>
        
    </div>
    
    <div class="container_2_right">
        <img class="protect_data_img" src="assets/app/Vesopa_Security_Home_Focus.png" alt="Vesopa EPOS Security">
    </div>
</div>


<div class="money_back_guarantee">
    <div class="money_back_left">
        <h2 class="money_back_h2">Satisfaction Guaranteed</h2>
        <p class="money_back_description">Experience Vesopa EPOS with confidence. If it doesn’t meet your business needs, contact us within 30 days, and we’ll work to make it right or offer a refund. Your success is our priority!</p>
    </div>
    <div class="money_back_right">
        <img class="money_back_img" src="assets/icons/filling-out-customer-satisfaction-survey.png" alt="Vesopa Satisfaction Guarantee">
    </div>
</div>



<div class="short_features_container">
    <div class="short_fetures_top">
        <h2 class="short_ft_heading">Enhance Your <span>Business Efficiency</span></h2>
        <p class="short_ft_description">
            Empower your business with Vesopa EPOS, a smart and seamless point-of-sale system designed to streamline transactions, 
            optimize operations, and enhance customer satisfaction.
        </p>
        
        
        <div class="vesopa_epos_features_text_keeper">
            <p class="vesopa_epos_features_text">Vesopa EPOS Features <i class="fa fa-angle-down"></i></p>
        </div>
    </div>
    <div class="short_feature_middle">
        <div class="short_fm_item short_fm_item1">
            <img class="short_fm_img" src="assets/icons/Payment-terminal-with-credit-card-and-coin.png" alt="Secure Payment Terminal">
            <p class="short_fm_description">Process transactions swiftly and securely with our <b>fast, reliable, and intuitive POS interface</b></p>
        </div>
        <div class="short_fm_item">
            <p class="short_fm_description">Manage your entire <b>product catalog</b> effortlessly with real-time pricing and inventory updates.</p>
            <img class="short_fm_img" src="assets/icons/Taking-Orders-by-Customer-Service.png" alt="Order Management">
        </div>
    </div>
    
    
    <div class="short_feature_bottom">
        <div class="short_fb_item short_fb_item1">
            <img class="short_fb_img" src="assets/icons/business-analytics-with-growing-profits.png" alt="Business Analytics">  
            <p class="short_fb_desc">
                Gain valuable business insights with <b>real-time reports</b> on sales, stock levels, and staff performance.
            </p>
        </div>
        <div class="short_fb_item short_fb_item2">
            <img class="short_fb_img" src="assets/icons/TND_M395_08.png" alt="Loyalty Program">
            <p class="short_fb_desc">
                Reward your customers with an integrated <b>loyalty and membership program</b> for repeat business.
            </p>
        </div>
        <div class="short_fb_item short_fb_item3">
            <img class="short_fb_img" src="assets/icons/online-money-transfer.png" alt="Payment Integration">
            <p class="short_fb_desc">
                Accept <b>cash, card, and contactless payments</b> seamlessly with Dojo integration support.
            </p>
        </div>
    </div>
</div>





<div id="pricing_plans" class="pricing_plan">
    <div class="pricing_plan_heading">
        <h2 class="plan_header">Maximize Sales <span>Minimize Hassle Today</span></h2>
        <p class="select_plan">Select a plan</p>
    </div>
    
    <div class="pricing_items_keeper">

        <div class="pricing_single_item">
            <a href="checkout?period=24" class="pricing_single_item_inside">
                    <p class="highlighted_popular_pricing_text pricing_mobile_hide"></p>
                <div class="pricing_single_item_wrapper">
                    <div class="pricing_siw_inside">
                        <div class="pricing_top_bar">
                            <div class="pricing_item_left">
                                <p class="pricing_single_save_text pricing_mobile_hide">Save <?php echo $pricing_plan["24"]["save_percentage"];?>%</p>
                                <p class="pricing_duration"><?php echo $pricing_plan["24"]["name"];?></p>

                                <p class="pricing_price pricing_mobile_hide">£<?php echo number_format($pricing_plan["24"]["price_per_month"], 2);?><span>/mo</span></p>

                                <p class="pricing_final_desc"><del>£<?php echo number_format($pricing_plan["24"]["total_price"], 2);?></del> <span>£<?php echo number_format($pricing_plan["24"]["discounted_price"], 2);?></span> for the first two years</p>
                                <p class="pricing_vat_may">VAT may apply</p>
                            </div>
                            <div class="pricing_item_right">
                                <p class="pricing_price">£<?php echo number_format($pricing_plan["24"]["price_per_month"], 2);?><span>/mo</span></p>
                                <p class="pricing_single_save_text">Save <?php echo $pricing_plan["24"]["save_percentage"];?>%</p>
                            </div>
                        </div>
                        <div class="pricing_bottom_bar">
                            <button class="pricing_button_started">Get <?php echo $pricing_plan["24"]["name"];?></button>
                            <p class="pricing_money_back"><img src="assets/icons/refund.svg" class="pricing_refund_icon" alt="Vesopa Money Back Guarantee"> 30-day money back guarantee</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="pricing_single_item">
            <a href="checkout?period=12" class="pricing_single_item_inside pricing_si_popular">
                    <p class="highlighted_popular_pricing_text">Most Popular</p>
                <div class="pricing_single_item_wrapper psiw_popular">
                    <div class="pricing_siw_inside">
                        <div class="pricing_top_bar">
                            <div class="pricing_item_left">
                                <p class="pricing_single_save_text pricing_mobile_hide">Save <?php echo $pricing_plan["12"]["save_percentage"];?>%</p>
                                <p class="pricing_duration"><?php echo $pricing_plan["12"]["name"];?></p>

                                <p class="pricing_price pricing_mobile_hide">£<?php echo number_format($pricing_plan["12"]["price_per_month"], 2);?><span>/mo</span></p>

                                <p class="pricing_final_desc"><del>£<?php echo number_format($pricing_plan["12"]["total_price"], 2);?></del> <span>£<?php echo number_format($pricing_plan["12"]["discounted_price"], 2);?></span> for the first year</p>
                                <p class="pricing_vat_may">VAT may apply</p>
                            </div>
                            <div class="pricing_item_right">
                                <p class="pricing_price">£<?php echo number_format($pricing_plan["12"]["price_per_month"], 2);?><span>/mo</span></p>
                                <p class="pricing_single_save_text">Save <?php echo $pricing_plan["12"]["save_percentage"];?>%</p>
                            </div>
                        </div>
                        
                        <div class="pricing_bottom_bar">
                            <button class="pricing_button_started pricing_button_started_popular">Get <?php echo $pricing_plan["12"]["name"];?></button>
                            <p class="pricing_money_back"><img src="assets/icons/refund.svg" class="pricing_refund_icon" alt="Vesopa EPOS Refund"> 30-day money back guarantee</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="pricing_single_item">
            <a href="checkout?period=1" class="pricing_single_item_inside">
                <p class="highlighted_popular_pricing_text pricing_mobile_hide"></p>
                <div class="pricing_single_item_wrapper">
                    <div class="pricing_siw_inside">
                        <div class="pricing_top_bar">
                            <div class="pricing_item_left">
                                <p class="pricing_single_save_text pricing_mobile_hide">Save <?php echo $pricing_plan["1"]["save_percentage"];?>%</p>
                                <p class="pricing_duration"><?php echo $pricing_plan["1"]["name"];?></p>

                                <p class="pricing_price pricing_mobile_hide">£<?php echo number_format($pricing_plan["1"]["price_per_month"], 2);?><span>/mo</span></p>

                                <p class="pricing_final_desc"><del>£<?php echo number_format($pricing_plan["1"]["total_price"], 2);?></del> <span>£<?php echo number_format($pricing_plan["1"]["discounted_price"], 2);?></span> for the first month</p>
                                <p class="pricing_vat_may">VAT may apply</p>
                            </div>
                            <div class="pricing_item_right">
                                <p class="pricing_price">£<?php echo number_format($pricing_plan["1"]["price_per_month"], 2);?><span>/mo</span></p>
                                <p class="pricing_single_save_text">Save <?php echo $pricing_plan["1"]["save_percentage"];?>%</p>
                            </div>
                        </div>
                        
                        <div class="pricing_bottom_bar">
                            <button class="pricing_button_started">Get <?php echo $pricing_plan["1"]["name"];?></button>
                            <p class="pricing_money_back"><img src="assets/icons/refund.svg" class="pricing_refund_icon" alt="Vesopa EPOS Money Back Guarantee"> 30-day money back guarantee</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
    </div>
</div>


<div class="customer_support_center">
    <div>
        <img class="customer_support_img" src="assets/icons/customer_support_2.png" alt="Customer Care">
    </div>
    <div class="customer_support_right">
        <h2 class="customer_support_text">24/7 Customer Support<b>: </b><span>Here for You</span></h2>
        <p class="customer_support_desc">Experience Personalized Support from Our Team of Experts. Reach Out for Assistance with Any Inquiries or Concerns. Call or email us to help you set up and troubleshoot.</p>
        
            <a class="customer_support_button" href="help">Contact Support</a>
    </div>
</div>

<div class="users_review_container">
    <div class="users_review_container_inside">
        <h2 class="user_review_headline">Testimonials from Our Valued Users</h2>

        <div>
            <div class="user_review_item">
                <div class="user_review_text_keeper">
                    <p id="user_review_dom" class="user_review_text">We've had an outstanding experience with Vesopa. Their support team has been exceptional every step of the way, from the initial training sessions to the ongoing updates of our product prices. Their dedication and willingness to help have been truly remarkable. With Vesopa, we've found a partner we can rely on for expert guidance and seamless assistance. Thank you for your continued support!</p>
                </div>

                <div id="user_reviews_slider" class="user_review_images_keeper">
                    <div class="user_review_image_item">
                        <img onclick="change_user_review(1)" class="user_review_image" src="assets/review/the_dyffryn_arms_logo.jpg" alt="The Dyffryn Arms">
                    </div>
                    <div class="user_review_image_item">
                        <img onclick="change_user_review(2)"  class="user_review_image" src="assets/review/bar_98_logo.jpg" alt="Bar 98">
                    </div>
                    <div class="user_review_image_item user_review_image_active">
                        <img onclick="change_user_review(3)" class="user_review_image" src="assets/review/pontardare_rfc_logo.jpg" alt="Pontardawe RFC">
                    </div>
                    <div class="user_review_image_item">
                        <img onclick="change_user_review(4)" class="user_review_image" src="assets/review/the_bridge_logo.jpg" alt="The Bridge Llangennech">
                    </div>
                    <div class="user_review_image_item">
                        <img onclick="change_user_review(5)" class="user_review_image" src="assets/review/rossellis_logo.jpg" alt="Rossellis Coffee House">
                    </div>
                </div>

                <div class="user_review_person_data">
                    <p id="user_name_dom" class="user_review_name">Ryan</p>
                    <p id="user_extra_data_dom" class="user_review_from">Pontardawe RFC</p>
                </div>
            </div>
        </div>
        
        
        <script>
            
            const user_reviews = {
                1: {
                    name: "Mark",
                    review: "Switching to Vesopa EPOS has been a game-changer for us. The system is incredibly intuitive, and the team provided excellent training to get us up and running. Managing orders and payments has never been smoother. Highly recommended!",
                    extra_data: "The Dyffryn Arms",
                    img: "the_dyffryn_arms_logo.jpg",
                },
                2: {
                    name: "Emma",
                    review: "Vesopa EPOS has made a significant impact on our business operations. The reporting tools are fantastic, allowing us to track sales in real time. Their customer service team is always quick to respond whenever we need assistance.",
                    extra_data: "Bar 98",
                    img: "bar_98_logo.jpg",
                },
                3: {
                    name: "Ryan",
                    review: "We've had an outstanding experience with Vesopa. Their support team has been exceptional every step of the way, from the initial training sessions to the ongoing updates of our product prices. Their dedication and willingness to help have been truly remarkable. With Vesopa, we've found a partner we can rely on for expert guidance and seamless assistance. Thank you for your continued support!",
                    extra_data: "Pontardawe RFC",
                    img: "pontardare_rfc_logo.jpg",
                },
                4: {
                    name: "James",
                    // review: "Vesopa has truly exceeded our expectations. When our internet suddenly went down on a Saturday, they didn't hesitate to come to our site and resolve the issue promptly, ensuring minimal disruption to our operations. Their dedication was further demonstrated when they expertly installed our new system, consisting of three terminals and four handheld devices seamlessly integrated with our kitchen printers. The support team has been a pleasure to work with, always ready to assist whenever we need them. With Vesopa, we've found a reliable partner who goes above and beyond to ensure our satisfaction.",
                    review: "Vesopa exceeded our expectations! When our internet went down on a Saturday, they quickly resolved it with minimal disruption. Their seamless installation of three terminals and four handhelds was impressive. The support team is always responsive and reliable. Truly a partner that goes above and beyond!",
                    extra_data: "The Bridge Llangennech",
                    img: "the_bridge_logo.jpg",
                },
                5: {
                    name: "Sarah",
                    review: "We recently upgraded to Vesopa EPOS, and it has been an excellent decision. The user interface is simple yet powerful, making it easy for our staff to process transactions quickly. The seamless integration with our kitchen printers has improved efficiency tremendously!",
                    extra_data: "Rossellis Coffee House",
                    img: "rossellis_logo.jpg",
                },
                6: {
                    name: "Rajesh",
                    review: "Our restaurant needed a reliable and efficient POS system, and Vesopa delivered exactly that. The ability to track table orders and split bills has made service much smoother for our team. Plus, the customer support is always on hand to assist when needed.",
                    extra_data: "Tamarind",
                    img: "tamarind_logo.jpg",
                },
                total: 6,
            };

            
            const total_user_reviews = user_reviews.total;
            
            const user_reviews_slider = document.getElementById("user_reviews_slider");
            
            const user_review_dom = document.getElementById("user_review_dom");
            const user_name_dom = document.getElementById("user_name_dom");
            const user_extra_data_dom = document.getElementById("user_extra_data_dom");
            
            var current_review_index = 3;
            function change_user_review(index, isAutomatic = false){
                if(!isAutomatic){
                    clearInterval(reviewInterval);
                    reviewInterval = setInterval(changeTheSliderAutomatic, 5750);
//                            console.log("Automatic");
                }else{
//                            console.log("User Clicked");
                }
                
                current_review_index = index;
                var array_indexes = null;
                
                switch(index){
                    case 1:
                        array_indexes = [5, 6, 1, 2, 3];
                        break;
                    case 2:
                        array_indexes = [6, 1, 2, 3, 4];
                        break;
                    case 5:
                        array_indexes = [3, 4, 5, 6, 1];
                        break;
                    case 6:
                        array_indexes = [4, 5, 6, 1, 2];
                        break;
                    default:
                        array_indexes = [index-2, index-1, index, index+1, index+2];
                }
                
                
//                        console.log(array_indexes);
                
                if(array_indexes!=null){
                    user_review_dom.innerHTML = user_reviews[index]["review"];
                    user_name_dom.innerHTML = user_reviews[index]["name"];
                    user_extra_data_dom.innerHTML = user_reviews[index]["extra_data"];
                    
                    var final_HTML_str = ``;
                    for(i = 0; i<array_indexes.length; i++){
                        final_HTML_str += 
                            `<div class="user_review_image_item `+ (i==2 ? `user_review_image_active` : ``) +`">
                                <img onclick="change_user_review(`+ array_indexes[i] +`)" class="user_review_image" src="assets/review/`+ user_reviews[array_indexes[i]]["img"] +`" alt="`+ user_reviews[array_indexes[i]]["extra_data"] +`">
                            </div>`;
                    }
                    
                    user_reviews_slider.innerHTML = final_HTML_str;
                }
            }
            
            var reviewInterval = setInterval(changeTheSliderAutomatic, 5750);
            
            function changeTheSliderAutomatic(){
                var nextIndex = current_review_index == total_user_reviews ? 1 : current_review_index+1;
                change_user_review(nextIndex, true);
            }
            
            
        </script>
    </div>
</div>



<div class="faq_main_container">
    <h2 class="frequently_asked_headline">Frequently Asked Questions</h2>
    <div class="frequently_asked_items_container">
        <div class="faq_item_container_inside">
            
            <div class="faq_item">
                <div class="faq_item_inside" onclick="toggle_faq(this)">
                    <div class="faq_item_top">
                        <h3 class="faq_question">How can I request a demo or trial of Vesopa EPOS?</h3>
                        <p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
                    </div>

                    <div class="faq_item_bottom">
                        <p class="faq_answer">To request a demo or trial, contact us via email at <b>info@vesopa.com</b> or call us at <b>+44 1792 316282</b>. Our team will arrange a personalized demonstration and provide training to ensure a smooth transition for your business.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq_item">
                <div class="faq_item_inside" onclick="toggle_faq(this)">
                    <div class="faq_item_top">
                        <h3 class="faq_question">What types of businesses can use Vesopa EPOS?</h3>
                        <p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
                    </div>

                    <div class="faq_item_bottom">
                        <p class="faq_answer">Vesopa EPOS is designed for businesses in the <b>Retail & Hospitality</b> industry, including restaurants, bars, cafés, pubs, takeaways, and retail stores. Our system is scalable to suit both small businesses and large enterprises.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq_item">
                <div class="faq_item_inside" onclick="toggle_faq(this)">
                    <div class="faq_item_top">
                        <h3 class="faq_question">Does Vesopa EPOS support multiple payment methods?</h3>
                        <p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
                    </div>

                    <div class="faq_item_bottom">
                        <p class="faq_answer">Yes! Vesopa EPOS supports <b>cash and card payments</b>, with integration options for major payment processors like <b>DOJO</b> (SDK provided). We also support contactless payments, Apple Pay, and Google Pay.</p>
                    </div>
                </div>
            </div>
            
            <!-- <div class="faq_item">
                <div class="faq_item_inside" onclick="toggle_faq(this)">
                    <div class="faq_item_top">
                        <h3 class="faq_question">Can Vesopa EPOS work without an internet connection?</h3>
                        <p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
                    </div>

                    <div class="faq_item_bottom">
                        <p class="faq_answer">Yes! Vesopa EPOS can function in <b>offline mode</b>, allowing transactions to continue even if the internet goes down. Once the connection is restored, all data is automatically synced.</p>
                    </div>
                </div>
            </div> -->
            
            <div class="faq_item">
                <div class="faq_item_inside" onclick="toggle_faq(this)">
                    <div class="faq_item_top">
                        <h3 class="faq_question">What hardware is compatible with Vesopa EPOS?</h3>
                        <p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
                    </div>

                    <div class="faq_item_bottom">
                        <p class="faq_answer">Vesopa EPOS works with a wide range of hardware, including <b>touchscreen terminals, tablets, receipt printers (80mm thermal via COM ports), kitchen printers, barcode scanners, and cash drawers</b>. Contact us for specific compatibility inquiries.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq_item">
                <div class="faq_item_inside" onclick="toggle_faq(this)">
                    <div class="faq_item_top">
                        <h3 class="faq_question">How do I update product prices or modify the menu?</h3>
                        <p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
                    </div>

                    <div class="faq_item_bottom">
                        <p class="faq_answer">You can update product prices, add new items, or modify the menu directly through the <b>Back Office Management Portal</b>. Changes will be reflected in real-time on all connected devices.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq_item">
                <div class="faq_item_inside" onclick="toggle_faq(this)">
                    <div class="faq_item_top">
                        <h3 class="faq_question">Is training provided for new users?</h3>
                        <p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
                    </div>

                    <div class="faq_item_bottom">
                        <p class="faq_answer">Yes! Our team provides <b>on-site and remote training</b> to ensure your staff can efficiently use the Vesopa EPOS system. We also offer ongoing support whenever needed.</p>
                    </div>
                </div>
            </div>
            
            <script>
                function toggle_faq(clickedItem){
                    if(clickedItem.className == "faq_item_inside"){
                        clickedItem.className = "faq_item_inside faq_active";
                    } else {
                        clickedItem.className = "faq_item_inside";
                    }
                }
            </script>
        </div>
    </div>
</div>



<div class="try_vesopa_container">
    <div class="try_vesopa_left">
        <img class="try_vesopa_img" src="assets/icons/contact_left.png" alt="Vesopa EPOS Contact">
    </div>
    <div class="try_vesopa_right" id="try-vesopa">
        <h2 class="try_vesopa_heading">Ready to Try Vesopa EPOS?</h2>
        <p class="try_vesopa_desc">Contact us today to request a personalized demo or trial of Vesopa EPOS. Our team will provide comprehensive training and support to help you get started with the system.</p>
        
        <form class="try_vesopa_form" action="received_demo_request" method="post" onsubmit="this.querySelector('button').disabled=true;">
            <input name="name" type="text" class="try_vesopa_input" placeholder="Enter your name *" required>
            <input name="email" type="email" class="try_vesopa_input" placeholder="Enter email address *" required>
            <input name="phone" type="text" class="try_vesopa_input" placeholder="Enter phone number *" required>
            <input name="business_name" type="text" class="try_vesopa_input" placeholder="Enter your business name *" required>
            <textarea name="business_brief" type="text" class="try_vesopa_input try_vesopa_textarea" placeholder="Brief about your business"></textarea>
            <div class="try_vesopa_button_keeper">
                <button class="try_vesopa_button" type="submit">Request a Demo</button>
            </div>
        </form>
    </div>
</div>


<?php include 'server_files/footer.php'; ?>