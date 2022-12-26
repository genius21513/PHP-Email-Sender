

<?php
    require_once 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    
    if(isset($_POST['submit'])){
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->Port       = 587;
        $mail->SMTPSecure = 'tls';        
        $mail->SMTPAuth   = true;
        $mail->Username = 'geniusdev1011@outlook.com';
        $mail->Password = 'Strong123.!@#';
        $mail->SetFrom('geniusdev1011@outlook.com', 'FromEmail');
        $mail->addAddress($_POST['email'], 'ToEmail');
        //$mail->SMTPDebug  = 3;
        //$mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";}; //$mail->Debugoutput = 'echo';
        $mail->IsHTML(true);

        $mail->Subject = 'This is Subject';
        $mail->Body    = $_POST['message'];
        $mail->AltBody = 'This is Body text.';

        if(!$mail->send()) {
            echo '<h2>Message could not be sent.</h2>';
            echo '<h2>Mailer Error: ' . $mail->ErrorInfo . '</h2>';
        } else {
            echo '<h2>Message has been sent successfully.</h2>';
        }
    }
?>

<!DOCTYPE html>
<head>
<title>Form submission</title>
</head>
<body>

<form action="" method="post">
This is my email sender { geniusdev1011@outlook.com } <br>
To Email: <input type="text" name="email"><br>
Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html> 