<?php
$name=$_POST['name'];
$email=$_POST['email'];
$tel=$_POST['tel'];

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
     
    $mail->Password   = '';                        //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = '587';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    //Recipients
    $mail->setFrom('');                //From address
    $mail->addAddress('');             //To Address

    // $mail->addReplyTo('', '');      //From Address and subject name
    // $mail->addCC('cc@example.com'); //cc address
    // $mail->addBCC('bcc@example.com'); //bcc address
    
    // $msg="Name".$name."/n".Email.$email."/n".Phone.$tel."/n";
    // echo $msg;
    
    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = ""; //subject here
    $mail->Body    = ""; //body of the mail here
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; /this is alternate body
   
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
