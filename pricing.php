<?php 
session_start();
$title = 'Vesopa EPOS Pricing: Purchase with Paypal, Card, or Bitcoin';
include 'server_files/header.php'; 
?>



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
                            <p class="pricing_money_back"><img src="assets/icons/refund.svg" class="pricing_refund_icon"> 30-day money back guarantee</p>
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
                            <p class="pricing_money_back"><img src="assets/icons/refund.svg" class="pricing_refund_icon"> 30-day money back guarantee</p>
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
                            <p class="pricing_money_back"><img src="assets/icons/refund.svg" class="pricing_refund_icon"> 30-day money back guarantee</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
    </div>
</div>


<?php include 'server_files/footer.php'; ?>