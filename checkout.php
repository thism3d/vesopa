<?php
session_start();
include 'server_files/cookiesvariables.php'; 

$period = 12;
if(isset($_GET["period"])){
    if($_GET["period"] == "24" || $_GET["period"] == "12" || $_GET["period"] == "1") $period = $_GET["period"];
}

require_once 'paypal/config.php'; 

?>
<!DOCTYPE html>
<html>
	<head>

		<title>Vesopa EPOS Checkout</title>


		<!-- Personal Properties -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=no, shrink-to-fit=no" />


		<!-- Font Awesome Link -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


		<!-- Material Icons -->
		<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->



		<!-- CSS For this Page -->
		<link rel="icon" href="assets/logo/logo.png">
		<link rel="stylesheet" href="library/main<?php echo $version;?>.css">



		<!-- jQuery 3.5.1 -->
		<script src="library/jquery.min.js"></script>
        
        
        
        
        <!-- Owl Carousel Slider -->
        <link rel="stylesheet" href="library/owlcarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="library/owlcarousel/owl.theme.default.min.css">
        <script src="library/owlcarousel/owl.carousel.min.js"></script>

	</head>

	<body>
        
        
        <div class="header header_checkout">
            <div class="header_inside">
                <div class="header_left">
                    <div class="header_left_img_keeper">
                        <a href="index"><img class="header_left_img" src="assets/logo/vesopa_logo.png" alt="Vesopa EPOS"></a>
                        <h2 class="checkout_text">Checkout</h2>
                    </div>
                </div>

                <div class="header_right">
                    <?php 
                    if(!$is_user_found){
                        echo '<p class="already_have_account_text">Already have an account?</p>
                              <a href="backoffice" class="checkout_login">BackOffice</a>';
                    }else echo '<a href="myaccount" class="checkout_login">MyAccount</a>';
                    ?>
                </div>
            </div>
        </div>
        
       
       <div class="checkout_container">
            <div class="checkout_contianer_inside">

                <div class="checkout_container_left">
                    <div class="checkout_email_section">
                        <h2 class="enter_email_checkout_text">Enter the email for your Vesopa EPOS account</h2>
                        <p class="email_address_brief_text">This email address will be used for system access and account management.</p>

                        <div class="input_fields_keeper_member_l checkout_email_keeper">
                            <input id="email_input" class="input_items_member_l" name="vesopa_email" type="email" placeholder="Email Address" <?php echo isset($decrypted_useremail) ? 'value="'. $decrypted_useremail .'" disabled' : ''; ?> required autocomplete="email">  
                            <label class="input_labels_member_l">Email Address</label>
                        </div>
                        <p id="email_warning" class="warning_message_member_l checkout_email_warning"></p>

                        <p class="email_why_use_text">Your email address will not be shared with third parties. It will only be used by Vesopa EPOS for service purposes and important system updates.</p>
                    </div>


                    <div class="checkout_payment_method">
                        <h2 class="choose_payment_method_text">Choose a payment method</h2>
                        <p class="encypted_payment_text"><i class="fa fa-lock"></i> Secure and encrypted payments</p>

                        <div onclick="toggle_payment_item(this, 'paypal')" class="payment_method_item">
                            <div class="payment_method_top">
                                <div class="payment_method_item_left">
                                    <p class="payment_method_name">PayPal</p>
                                </div>
    
                                <div class="payment_method_item_right">
                                    <p class="payment_item_picute_keeper"><img src="assets/icons/paypal_logo.png"></p>
                                    <p class="payment_item_click"><i class="fa fa-angle-down"></i></p>
                                </div>
                            </div>

                            <div class="payment_method_bottom">
                                <p class="payment_method_bottom_border_top"></p>
                                <p class="payment_today_cost_brief">Today, you will be charged a total of GBP <?php echo $pricing_plan[$period]["discounted_price"]; ?> for the <?php echo $period; ?>-month subscription. Your subscription will automatically renew every <?php echo $period; ?> months thereafter. You can cancel at any time.</p>

                                <div class="payment_method_checkout">
                                    
                                    <p class="pricing_money_back pricing_money_back_center"><img src="assets/icons/refund.svg" class="pricing_refund_icon"> 30-day money back guarantee</p>
                                    <!-- <div class="payment_paypal_keeper">
                                        <p>Pay with Paypal</p>
                                    </div> -->
                                </div>

                                <div id="paypal_loader">
                                    <div class="panel">
                                        <div id="paypal_loading_system">
                                            <div class="paypal_loading_system">
                                                <p class="paypal_loading_txt">Loading</p>
                                                <img class="paypal_loading_img" src="assets/icons/paypal_logo.png">
                                                <i class="fa fa-spinner fa-spin"></i>
                                            </div>
                                        </div>
                                        <!-- <div class="overlay hidden"><div class="overlay-content"><img src="css/loading.gif" alt="Processing..."/></div></div> -->

                                        
                                        <div class="paypal-panel-body">
                                            <!-- Display status message -->
                                            <div id="paymentResponse" class="hidden"></div>
                                            
                                            <!-- Set up a container element for the button -->
                                            <div id="paypal-button-container"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        <!-- New Codes -->
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <?php 
                                        
                            if($period==24){
                                $stringStripe = '<script async
                                      src="https://js.stripe.com/v3/buy-button.js">
                                    </script>
                                    
                                    <stripe-buy-button
                                      buy-button-id="buy_btn_1PckBLHT9TVkcBqnicWg2xIy"
                                      publishable-key="pk_live_51P0rDfHT9TVkcBqnlUOJSd7aQ4EIPFORWPiLaz6TKJi6nSIIoasmbcyGSIqBsusvSni2CavdnhnLfKuiaqiXmngH00TStM5maI"
                                    >
                                    </stripe-buy-button>';
                            }else if($period==12){
                                $stringStripe =  '<script async
                                    src="https://js.stripe.com/v3/buy-button.js">
                                    </script>
                                    
                                    <stripe-buy-button
                                      buy-button-id="buy_btn_1Pcd2YHT9TVkcBqnhZmVw4pm"
                                      publishable-key="pk_live_51P0rDfHT9TVkcBqnlUOJSd7aQ4EIPFORWPiLaz6TKJi6nSIIoasmbcyGSIqBsusvSni2CavdnhnLfKuiaqiXmngH00TStM5maI"
                                    >
                                    </stripe-buy-button>';
                            }else{
                                $stringStripe =  '<script async
                                      src="https://js.stripe.com/v3/buy-button.js">
                                    </script>
                                    
                                    <stripe-buy-button
                                      buy-button-id="buy_btn_1PckCeHT9TVkcBqnIIeB7Uzs"
                                      publishable-key="pk_live_51P0rDfHT9TVkcBqnlUOJSd7aQ4EIPFORWPiLaz6TKJi6nSIIoasmbcyGSIqBsusvSni2CavdnhnLfKuiaqiXmngH00TStM5maI"
                                    >
                                    </stripe-buy-button>';
                            }
                            
                            
                        
                        
                        ?>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="payment_method_item payment_method_item_disabled">
                            <div class="payment_method_top">
                                <div class="payment_method_item_left">
                                    <p class="payment_method_name">Credit or debit card</p>
                                </div>
    
                                <div class="payment_method_item_right">
                                    <p class="payment_item_picute_keeper"><img src="assets/icons/payment_mastercard.png"></p>
                                    <p class="payment_item_picute_keeper"><img src="assets/icons/payment_visacard.png"></p>
                                    <p class="payment_item_picute_keeper"><img src="assets/icons/payment_american_express.png"></p>
                                    <p class="payment_item_picute_keeper"><img src="assets/icons/payment_discover.png"></p>
                                    <p class="payment_item_picute_keeper"><img src="assets/icons/payment_jcb.png"></p>

                                    <p class="payment_item_click"><i class="fa fa-angle-down"></i></p>
                                </div>
                            </div>
                        </div>




                        <div class="payment_method_item payment_method_item_disabled">
                            <div class="payment_method_top">
                                <div class="payment_method_item_left">
                                    <p class="payment_method_name">Google Pay</p>
                                </div>
    
                                <div class="payment_method_item_right">
                                    <p class="payment_item_picute_keeper"><img src="assets/icons/payment_google_pay.png"></p>

                                    <p class="payment_item_click"><i class="fa fa-angle-down"></i></p>
                                </div>
                            </div>
                        </div>


                        <div class="payment_method_item payment_method_item_disabled">
                            <div class="payment_method_top">
                                <div class="payment_method_item_left">
                                    <p class="payment_method_name">Apple Pay</p>
                                </div>
    
                                <div class="payment_method_item_right">
                                    <p class="payment_item_picute_keeper"><img src="assets/icons/payment_apple_pay.png"></p>

                                    <p class="payment_item_click"><i class="fa fa-angle-down"></i></p>
                                </div>
                            </div>
                        </div>


                        <div class="payment_method_item payment_method_item_disabled">
                            <div class="payment_method_top">
                                <div class="payment_method_item_left">
                                    <p class="payment_method_name">UnionPay</p>
                                </div>

                                <div class="payment_method_item_right">
                                    <p class="payment_item_picute_keeper"><img src="assets/icons/payment_unionpay.png"></p>

                                    <p class="payment_item_click"><i class="fa fa-angle-down"></i></p>
                                </div>
                            </div>
                        </div>

<!--                         
                        <div class="payment_method_item payment_method_item_disabled">
                            <div class="payment_method_top">
                                <div class="payment_method_item_left">
                                    <p class="payment_method_name">AliPay</p>
                                </div>
    
                                <div class="payment_method_item_right">
                                    <p class="payment_item_picute_keeper"><img src="assets/icons/payment_alipay2.png"></p>

                                    <p class="payment_item_click"><i class="fa fa-angle-down"></i></p>
                                </div>
                            </div>
                        </div> -->
                        
                        
                        
                        <div class="payment_method_item payment_method_item_disabled">
                            <div class="payment_method_top">
                                <div class="payment_method_item_left">
                                    <p class="payment_method_name">Cryptocurrency</p>
                                </div>
    
                                <div class="payment_method_item_right">
                                    <p class="payment_item_picute_keeper"><img src="assets/icons/payment_bitcoin.png"></p>
                                    <p class="payment_item_picute_keeper"><img src="assets/icons/payment_etherum.png"></p>
                                    <p class="payment_item_picute_keeper"><img src="assets/icons/payment_tron.png"></p>
                                    <p class="payment_item_picute_keeper"><img src="assets/icons/payment_tether.png"></p>

                                    <p class="payment_item_click"><i class="fa fa-angle-down"></i></p>
                                </div>
                            </div>
                        </div>


                             

                    </div>
                    
                        
                    <script>

                        const paypal_loading_system = document.getElementById("paypal_loading_system");
                        function load_paypal() {
                            // Paypal Subscription Checkout
                            if(paypal_loading_system.innerHTML=="") return;
                                
                            
                            var script = document.createElement('script');
                                // script load after button click 
                                script.src = "https://www.paypal.com/sdk/js?client-id=<?php echo PAYPAL_SANDBOX?PAYPAL_SANDBOX_CLIENT_ID:PAYPAL_PROD_CLIENT_ID; ?>&vault=true&intent=subscription";
                                
                                script.onload = function() {       // if script loaded successfuly load the paypal
                                    const paypal_plan_id = <?php echo $period; ?>;
                                    paypal.Buttons({
                                        createSubscription: async (data, actions) => {
                                            // Get the selected plan ID
                                            let subscr_plan_id = paypal_plan_id;
                                            
                                            // Send request to the backend server to create subscription plan via PayPal API
                                            let postData = {
                                                request_type: 'create_plan', 
                                                plan_id: subscr_plan_id
                                            };
                                            const PLAN_ID = await fetch("paypal/paypal_subscription_init.php", {
                                                method: "POST",
                                                headers: {'Accept': 'application/json'},
                                                body: encodeFormData(postData)
                                            })
                                            .then((res) => {
                                                return res.json();
                                            })
                                            .then((result) => {
                                                if(result.status == 1){
                                                    return result.data.id;
                                                }else{
                                                    // resultMessage(result.msg); // Log Error
                                                    return false;
                                                }
                                            });

                                            // Creates the subscription
                                            return actions.subscription.create({
                                                'plan_id': PLAN_ID,
                                                'custom_id': '0'
                                            });
                                        },
                                        onApprove: (data, actions) => {

                                            let subscr_plan_id = paypal_plan_id;
                                            // Send request to the backend server to validate subscription via PayPal API
                                            var postData = {request_type:'capture_subscr', order_id:data.orderID, subscription_id:data.subscriptionID, plan_id: subscr_plan_id};
                                            fetch('paypal/paypal_subscription_init.php', {
                                                method: 'POST',
                                                headers: {'Accept': 'application/json'},
                                                body: encodeFormData(postData)
                                            })
                                            .then((response) => response.json())
                                            .then((result) => {
                                                if(result.status == 1){
                                                    // Redirect the user to the status page
                                                    window.location.href = "payment-status.php?checkout_ref_id="+result.ref_id;
                                                }else{
                                                    // resultMessage(result.msg); // Log error
                                                }
                                            })
                                            .catch(error => console.log(error));
                                        }
                                    }).render('#paypal-button-container').then(() => {
                                        paypal_loading_system.innerHTML = "";
                                    });

                                    // Helper function to encode payload parameters
                                    const encodeFormData = (data) => {
                                        var form_data = new FormData();

                                        for ( var key in data ) {
                                            form_data.append(key, data[key]);
                                        }
                                        return form_data;   
                                    }


                                    // Display status message
                                    /* 
                                    const resultMessage = (msg_txt) => {
                                        const messageContainer = document.querySelector("#paymentResponse");

                                        messageContainer.classList.remove("hidden");
                                        messageContainer.textContent = msg_txt;
                                        
                                        setTimeout(function () {
                                            messageContainer.classList.add("hidden");
                                            messageContainer.textContent = "";
                                        }, 5000);
                                    }    
                                    */

                                };

                                document.head.appendChild(script);
                        }

                        function load_paypal_two_years() {
                            // Paypal Standard Checkout
                            if(paypal_loading_system.innerHTML=="") return;
                                
                            
                            var script = document.createElement('script');
                                // script load after button click 
                                script.src = "https://www.paypal.com/sdk/js?client-id=<?php echo PAYPAL_SANDBOX?PAYPAL_SANDBOX_CLIENT_ID:PAYPAL_PROD_CLIENT_ID; ?>&currency=GBP";
                                
                                script.onload = function() {       // if script loaded successfuly load the paypal
                                    paypal.Buttons({
                                        // Sets up the transaction when a payment button is clicked
                                        createOrder: (data, actions) => {
                                            return actions.order.create({
                                                "purchase_units": [{
                                                    "custom_id": "VESOPAEPOS2YEAR",
                                                    "description": "2 Year Plan",
                                                    "amount": {
                                                        "currency_code": "GBP",
                                                        "value": <?php echo $pricing_plan[$period]["discounted_price"]; ?>,
                                                        "breakdown": {
                                                            "item_total": {
                                                                "currency_code": "GBP",
                                                                "value": <?php echo $pricing_plan[$period]["discounted_price"]; ?>
                                                            }
                                                        }
                                                    },
                                                    "items": [
                                                        {
                                                            "name": "Vespopa EPOS Subscriptin",
                                                            "description": "2-year subscription, non-renewing",
                                                            "unit_amount": {
                                                                "currency_code": "GBP",
                                                                "value": <?php echo $pricing_plan[$period]["discounted_price"]; ?>
                                                            },
                                                            "quantity": "1",
                                                            "category": "DIGITAL_GOODS"
                                                        },
                                                    ]
                                                }]
                                            });
                                        },
                                        // Finalize the transaction after payer approval
                                        onApprove: (data, actions) => {
                                            return actions.order.capture().then(function(orderData) {
                                                setProcessing(true);

                                                var postData = {paypal_order_check: 1, order_id: orderData.id};
                                                fetch('paypal_checkout_validate.php', {
                                                    method: 'POST',
                                                    headers: {'Accept': 'application/json'},
                                                    body: encodeFormData(postData)
                                                })
                                                .then((response) => response.json())
                                                .then((result) => {
                                                    if(result.status == 1){
                                                        window.location.href = "payment-status.php?checkout_ref_id="+result.ref_id;
                                                    }else{
                                                        const messageContainer = document.querySelector("#paymentResponse");
                                                        messageContainer.classList.remove("hidden");
                                                        messageContainer.textContent = result.msg;
                                                        
                                                        setTimeout(function () {
                                                            messageContainer.classList.add("hidden");
                                                            messageText.textContent = "";
                                                        }, 5000);
                                                    }
                                                    setProcessing(false);
                                                })
                                                .catch(error => console.log(error));
                                            });
                                        }
                                    }).render('#paypal-button-container').then(() => {
                                        paypal_loading_system.innerHTML = "";
                                    });

                                    const encodeFormData = (data) => {
                                        var form_data = new FormData();

                                        for ( var key in data ) {
                                            form_data.append(key, data[key]);
                                        }
                                        return form_data;   
                                    }

                                };

                                document.head.appendChild(script);
                        }


                        const email_input =document.getElementById("email_input");
                        const email_warning =document.getElementById("email_warning");

                        function scrollToTop() {
                            document.body.scrollTop = 0; 
                            document.documentElement.scrollTop = 0;
                        }

                        function isValidEmail(email) {
                            const emailRegex = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
                            return emailRegex.test(email);
                        }

                        function toggle_payment_item(clickedItem, payment_method){
                            email_warning.innerHTML = "";
                            const email_input_value =email_input.value.trim();

                            var is_warning_found = false;
                            if(email_input_value == "" || !isValidEmail(email_input_value)){
                                scrollToTop();
                                email_warning.innerHTML = "Enter valid email address and checkout";
                                email_input.focus();
                            }else{
                                if(clickedItem.className == "payment_method_item"){
                                clickedItem.className = "payment_method_item checkout_active";

                                }else {
                                    clickedItem.className = "payment_method_item";
                                }

                                if(payment_method == 'paypal'){
                                    <?php echo $period == "24" ? 'load_paypal_two_years()' : 'load_paypal();';?>
                                } 
                            }
                            
                        }
                    </script>
                </div>





                <div id="checkout_container_right" class="checkout_container_right">
                    <div class="checkout_cancel_background" onclick="toggle_tablet_order_summary()"></div>

                    <div class="money_back_guarantee_payment checkout_hide_tablet">
                        <img class="checkout_money_back_guarantee_img" src="assets/icons/money_back.svg">
                        <p class="checkout_money_back_guarantee_text">Money back<span>Guaratee</span></p>
                    </div>

                    <div class="order_summary_section">
                        <div class="order_summary_inside">
                            <div class="order_summary_text_keeper">
                                <h2 class="order_summary_text">Order Summary</h2>
                                <i onclick="toggle_tablet_order_summary()" class="fa fa-chevron-down show_only_tablet"></i>
                            </div>
                            <div class="order_summary_small_border"><p></p></div>


                            <?php
                                $next_period = NULL;
                                if($period == 1 || $period == 12){
                                    $next_period = $period == 1 ? 12 : 24;
                                    echo '
                                    <div class="switch_to_years">
                                        <div class="switch_to_years_inside">
                                            <div class="switch_to_offer_keeper">
                                                <img class="switch_to_img" src="assets/icons/get_offer.svg">
                                                <p class="swith_to_text">Switch to a '. $next_period .'-month subscription to <b>save '. $pricing_plan[$next_period]["save_percentage"] .'%</b>.</p>
                                            </div>
                                            <a href="checkout?period='. $next_period .'" class="switch_to_months_button">Switch to '. $pricing_plan[$next_period]["name"] .'</a>
                                        </div>
                                    </div>';
                                }
                            ?>
                            
                            

                            <div class="order_summary_main_container">
                                <p class="order_subscription_details_text">Subscription Details</p>

                                <p class="order_subscription_pack"><img class="order_sub_pack_icon" src="assets/logo/logo.png"> <?php echo $pricing_plan[$period]["name"];?></p>

                                <div class="order_summary_item">
                                    <p class="order_summary_item_left"><?php echo $period;?> months ($<?php echo $pricing_plan[$period]["price_per_month"];?>/month)</p>
                                    <p class="order_summary_item_right">$<?php echo number_format($pricing_plan[$period]["discounted_price"], 2);?></p>
                                </div>

                                <div class="order_summary_item">
                                    <p class="order_save_offer">Save <?php echo $pricing_plan[$period]["save_percentage"];?>%</p>
                                    <p class="order_summary_item_right"><del>$<?php echo number_format($pricing_plan[$period]["total_price"], 2);?></del></p>
                                </div>

                                <div id="coupon_code_section" class="order_summary_item">
                                    <p class="order_coupon_offer">Coupon</p>
                                    <p class="order_summary_item_right">$0.00</p>
                                </div>

                                <p class="order_summary_border_bottom"></p>



                                <div class="order_summary_item">
                                    <p class="order_summary_item_left">VAT/TAX <span>10%</span></p>
                                    <p class="order_summary_item_right"><del>$<?php echo number_format($pricing_plan[$period]["vat"], 2);?></del></p>
                                </div>

                                <div class="order_summary_item">
                                    <p class="order_summary_item_left total_order_summary">Total</p>
                                    <p class="order_summary_item_right total_order_summary">$<?php echo number_format($pricing_plan[$period]["discounted_price"], 2);?></p>
                                </div>

                                <p class="order_summary_border_bottom"></p>

                                <div class="coupon_code_system">
                                    <div class="coupon_code_system_inside">
                                        <input class="coupon_code_input" type="text" placeholder="Enter Coupon Code">
                                        <button class="coupon_code_button">APPLY</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                  
                </div>
            </div>
        </div>

        <div onclick="toggle_tablet_order_summary()" id="tablet_order_summary_container" class="checkout_container_table">
            <div class="checkout_container_tablet_inside">
               <div class="checkout_container_tablet_final">
                    <div class="checkout_container_tablet_left">
                        <p class="checkout_tablet_order_summary">Order summary</p>
                        <p class="check_tablet_total">Total: GBP <?php echo $pricing_plan[$period]["discounted_price"];?></p>
                    </div>
                    <div class="checkout_container_tablet_right">
                        <p class="checkout_tablet_expand"><i class="fa fa-chevron-up"></i></p>
                    </div>
               </div>
            </div>
        </div>

        <script>
            const tablet_order_summary_container = document.getElementById("tablet_order_summary_container");
            const checkout_container_right = document.getElementById("checkout_container_right");

            function toggle_tablet_order_summary(){
                if(tablet_order_summary_container.className == "checkout_container_table"){
                    tablet_order_summary_container.className = "checkout_container_table checkout_hide_the_summary";
                    checkout_container_right.className = "checkout_container_right show_checkout_container_right"
                }else {
                    tablet_order_summary_container.className = "checkout_container_table";
                    checkout_container_right.className = "checkout_container_right";
                }
            }
        </script>

        




        
        <script>
        // Paypal Checkout Script
        
        </script>

        
        <div class="checkout_footer">
            <p class="checkout_footer_links"><a href="privacy">Privacy Policy</a>, <a href="terms">Terms and Condition</a>, <a href="refund">Refund Policy</a></p>
        </div>
        
	</body>
</html>