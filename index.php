<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.office365.com';
$mail->Port       = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth   = true;
$mail->Username = 'your-outlook-email-address';
$mail->Password = 'your-outlook-password';
$mail->SetFrom('your-outlook-email-address( = username)', 'FromEmail');
$mail->addAddress('receiver-user-email', 'ToEmail');
//$mail->SMTPDebug  = 3;
//$mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";}; //$mail->Debugoutput = 'echo';
$mail->IsHTML(true);

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is authenticated by **** user';
$mail->AltBody = 'Authentication user and send user should be equal. This is test message, so understand issue from outlook';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}