<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer via Composer or download manually

$mail = new PHPMailer(true); // Create a new PHPMailer instance

try {
    // Server settings
    $mail->SMTPDebug = 0;                                   // Enable verbose debug output (for development)
    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->Host       = 'mail.vesopaepos.store';                     // Specify main SMTP server
    $mail->SMTPAuth   = true;                               // Enable SMTP authentication
    $mail->Username   = 'support@vesopaepos.store';             // SMTP username
    $mail->Password   = '@Vesopa24';                      // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        // Enable SSL encryption (port 465)
    $mail->Port       = 465;                                // TCP port for SSL

    // Recipients
    $mail->setFrom('support@vesopaepos.store', 'Vesopa EPOS Store');       // Sender's email and name
    
    
    // $mail->addAddress($mail_address); // Add a recipient
    if(isset($mail_address)) $mail->addAddress($mail_address); // Add a recipient
    else $mail->addAddress('support@vesopa.com', 'Vesopa EPOS Support'); // Add Another recipient
    
    // $mail->addReplyTo('gvirdi@arekpm.com', 'Arek Property Support'); // Add a different reply-to email address

    

    // Content
    $mail->isHTML(true);                                    // Set email format to HTML
    $mail->Subject = $mail_subject;
    $mail->Body    = $mail_html_body;


    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

