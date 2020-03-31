<?php 
/**
 * PHPMailer - PHP email creation and transport class.
 */
use PHPMailer\PHPMailer\PHPMailer;

require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';

// Check for empty fields
if (empty($_POST['name']) 
    || empty($_POST['email']) 
    || empty($_POST['phone'])     
    || empty($_POST['message'])   
    || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
) {
    echo "No arguments Provided!";
    return false;
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$email = "enquiry@shieldspremisespersonnel.co.uk";
$password = "letmein1";

// Create the email and send the message
$to = 'enquiry@shieldspremisespersonnel.co.uk'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: enquiry@shieldspremisespersonnel.co.uk\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";

// Configuring SMTP server settings
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'mail.shieldspremisespersonnel.co.uk';
$mail->Port = 465;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = $email;
$mail->Password = $password;

// Email Sending Details
$mail->addAddress($to_id);
$mail->Subject = $subject;
$mail->msgHTML($message);

mail($to, $email_subject, $email_body, $headers);
return true;
