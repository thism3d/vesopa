<?php 
// Include the configuration file  
require_once 'config.php'; 
 
// Include the database connection file  
require_once 'dbConnect.php'; 
 
$statusMsg = ''; 
$status = 'error'; 
 
// Check whether the DB reference ID is not empty 
if(!empty($_GET['checkout_ref_id'])){ 
    $paypal_order_id  = base64_decode($_GET['checkout_ref_id']); 
     
    // Fetch subscription data from the database 
    $sqlQ = "SELECT S.*, P.name as plan_name, P.price as plan_price, P.interval, P.interval_count FROM user_subscriptions as S LEFT JOIN plans as P ON P.id=S.plan_id WHERE paypal_order_id = ?"; 
    $stmt = $db->prepare($sqlQ);  
    $stmt->bind_param("s", $paypal_order_id); 
    $stmt->execute(); 
    $result = $stmt->get_result(); 
 
    if($result->num_rows > 0){ 
        $subscr_data = $result->fetch_assoc(); 
         
        $status = 'success'; 
        $statusMsg = 'Your Subscription Payment has been Successful!'; 
    }else{ 
        $statusMsg = "Subscription has been failed!"; 
    } 
}else{ 
    header("Location: index.php"); 
    exit; 
} 
?>

<?php if(!empty($subscr_data)){ ?>
    <h1 class="<?php echo $status; ?>"><?php echo $statusMsg; ?></h1>

    <h4>Payment Information</h4>
    <p><b>Reference Number:</b> #<?php echo $subscr_data['id']; ?></p>
    <p><b>Subscription ID:</b> <?php echo $subscr_data['paypal_subscr_id']; ?></p>
    <p><b>TXN ID:</b> <?php echo $subscr_data['paypal_order_id']; ?></p>
    <p><b>Paid Amount:</b> <?php echo $subscr_data['paid_amount'].' '.$subscr_data['currency_code']; ?></p>
    <p><b>Status:</b> <?php echo $subscr_data['status']; ?></p>
    
    <h4>Subscription Information</h4>
    <p><b>Plan Name:</b> <?php echo $subscr_data['plan_name']; ?></p>
    <p><b>Amount:</b> <?php echo $subscr_data['plan_price'].' '.CURRENCY; ?></p>
    <p><b>Plan Interval:</b> <?php echo $subscr_data['interval_count'].$subscr_data['interval']; ?></p>
    <p><b>Period Start:</b> <?php echo $subscr_data['valid_from']; ?></p>
    <p><b>Period End:</b> <?php echo $subscr_data['valid_to']; ?></p>
    
    <h4>Payer Information</h4>
    <p><b>Name:</b> <?php echo $subscr_data['subscriber_name']; ?></p>
    <p><b>Email:</b> <?php echo $subscr_data['subscriber_email']; ?></p>
<?php }else{ ?>
    <h1 class="error">Your Subscription failed!</h1>
    <p class="error"><?php echo $statusMsg; ?></p>
<?php } ?>