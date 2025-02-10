<?php 
session_start();
$title = 'Amzro VPN | Forget Password';
include 'server_files/header.php'; 
?>


<div class="login_container">
    <div class="login_container_inside">
        
        <div class="login_top_part">
            <p class="login_welcome_back">Forget Password</span></p>
            <p class="login_welcome_message">Please enter new password for your account</p>
                            
            <div class="input_fields_keeper_member_l">
                <input class="input_items_member_l" name="amzro_password_new" type="password" placeholder="" required autocomplete="off">  
                <label class="input_labels_member_l">New Password</label>
            </div>
            <p class="warning_message_member_l"></p>

            <div class="input_fields_keeper_member_l">
                <input class="input_items_member_l" name="amzro_password_confirm" type="password" placeholder="" required autocomplete="off">  
                <label class="input_labels_member_l">Confirm Password</label>
            </div>
            <p class="warning_message_member_l"></p>
        </div>

        <div class="login_bottom_part">
            <button class="login_form_button">Confirm Change</button>
            <!-- <button class="login_form_button2">Login with code</button> -->
        </div>

        <div>
            <a href="login" class="forget_password_link">Remembered, Log in Now!</a>
        </div>
    </div>
</div>

<?php include 'server_files/footer.php'; ?>