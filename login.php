<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
</head>

	<body>
		<?php
			
			include_once('home/components/val.php');
		?>
		
		<?php
			//Authentication module
			include_once('home/components/authenticate.php');
		?>
		
		
		<form action="" method ="POST">
		  <input type="text" placeholder="email" name="usernametxtbox"/> <br />
		  <input type="password" placeholder="password"  name="passwrdtxtbox" /> <br />
		 <input type="submit" name="btn" value="Login" /><br /><br />
		  
		  <a href="forgotpassword"> Forgot Password</a>
		 
		</form>
		
		
		
	</body>
<html>