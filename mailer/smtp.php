<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";

$mail = new PHPMailer;

//Enable SMTP debugging. 
$mail->SMTPDebug = 2;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "localhost"; 
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = false;

//Provide username and password     
$mail->Username = "support@flyparadise.in";                 
$mail->Password = "passwordhere"; 
                         
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = false;
$mail->SMTPAutoTLS = false;
//Set TCP port to connect to 
$mail->Port = 587; 
                                  

$mail->From = "umee909@gmail.com";
$mail->FromName = "Fly Paradise";

$mail->addAddress("umee909@gmail.com", "Umar");

$mail->isHTML(true);

$mail->Subject = "Package Confirmed ";
$mail->Body = "<i>Mail body here in HTML</i> <img src='https://media-cdn.tripadvisor.com/media/photo-s/02/ea/64/56/imah-seniman.jpg' /> ";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}

?>