<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'G:\xammp\htdocs\composer\vendor\autoload.php';
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to         use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mariam.nakanyike@gmail.com';                 // SMTP username
$mail->Password = 'xxx';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$person = array(0 => 'mariam.nakanyike01@gmail.com', 'mariam.nakanyike@gmail.com');

$mail->setFrom('mariam.nakanyike@gmail.com');
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Here is the subject';
$mail->Body    = "no seeing TO other email";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

 // $allFilesList= glob('C:\Users\Mariam\Desktop\skype\test\files\*');
 //        //Loop through the array that glob returned.
 //        foreach($allFilesList as $filename){
 //            $mail->addAttachment($filename);}
$errors = [];
for ($x = 0; $x < 2; $x++) {
    $mail->addAddress($person[$x]);
     $allFilesList= glob(
	'C:\Users\Mariam\Desktop\skype\test\*');
        //Loop through the array that glob returned.
        foreach($allFilesList as $filename){
            $mail->addAttachment($filename);}
    if(!$mail->send()) {
        $errors[] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
    $mail->clearAddresses();
}


if(empty($errors)) {
    // success
} else {
    // handle errors
}
