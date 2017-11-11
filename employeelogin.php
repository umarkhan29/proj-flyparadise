<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
</head>

	<body>
		<?php
			require_once('config.khan');
			include_once(CATALOG.SESSION);
			include_once('home/components/val.php');
		?>
		
		<?php
			//Employee Authentication module
			include_once('home/components/employeeauthenticate.khan');
		?>
		
		
		<form action="" method ="POST">
		  <input type="text" placeholder="email" name="usernametxtbox"/> <br />
		  <input type="password" placeholder="password"  name="passwrdtxtbox" /> <br />
		  <input type="submit" name="btn" value="Login" /><br /><br />
		  
		  <a href="employeeforgotpassword"> Forgot Password</a>
		 
		</form>
		
		
		
	</body>
<html>