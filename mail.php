<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'nanaosafokissi@gmail.com';                     //SMTP username
    $mail->Password   = 'nzesdfdsvzbrveaj';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('nanaosafokissi@gmail.com', 'Mailer');  //Sender's info
    $mail->addAddress('auramyaw@gmail.com', 'Joe User');     //Add a recipient
//    $mail->addAddress('goodluck.luhanjo@tmx.co.tz');               //Name is optional
//    $mail->addAddress('denis.gordian@tmx.co.tz');
//    $mail->addReplyTo('aurameow@skiff.com', 'Information');
    $mail->addCC('nanayaw@skiff.com');
    $mail->addCC('goodluck.luhanjo@tmx.co.tz');
    $mail->addCC('denis.gordian@tmx.co.tz');
    //$mail->addBCC('nanaosafokissi@gmail.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}