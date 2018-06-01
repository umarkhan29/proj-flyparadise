<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mailer</title>
</head>

<body>

		<?php
			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\Exception;
			require_once "vendor/autoload.php";
			
			
			//PHPMailer Object
			$mail = new PHPMailer;

			//From email address and name
			$mail->From = "support@flyparadise.in";
			$mail->FromName = "Fly Paradise";

			//To address and name
			$mail->addAddress("umee909@gmail.com", "Umar Khan");
			$mail->addAddress("umee909@gmail.com"); //Recipient name is optional

			//Address to which recipient will reply
			$mail->addReplyTo("support@flyparadise.in", "Reply");

			//CC and BCC
			$mail->addCC("cctest@example.com");
			
			//Send HTML or Plain Text email
			$mail->isHTML(true);

			$mail->Subject = "Package Confirmed";
			$mail->Body = "<i>Mail body in HTML</i>";
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

</body>
</html>
