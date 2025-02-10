<?php 
session_start();
$title = 'Amzro VPN | Reset Password';
include 'server_files/header.php'; 
?>

<div class="login_container">
    <div class="login_container_inside">
        
        <div class="login_top_part">
            <p class="reset_password_headline">Reset your password</span></p>
            <p class="login_welcome_message">Enter the email address you used during registration</p>
                            
            <div class="input_fields_keeper_member_l">
                <input class="input_items_member_l" name="amzro_email" type="text" placeholder="" required autocomplete="email">  
                <label class="input_labels_member_l">Email address</label>
            </div>
            <p class="warning_message_member_l"></p>
        </div>

        <div class="login_bottom_part">
            <button class="login_form_button">Get reset link</button>
        </div>

        <div>
            <a href="reset" class="forget_password_link">Go to login</a>
        </div>

    </div>
</div>


<?php include 'server_files/footer.php'; ?>