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
			if(isset($_POST['btn'])){
				val_email($_POST['usernametxtbox']);
				if($GLOBALS['__ValFlag']==1){ 
					$user__name=mysqli_real_escape_string(trim(strip_tags(stripslashes($_POST['usernametxtbox']))));
					$user__pass=mysqli_real_escape_string(trim(strip_tags(stripslashes($_POST['passwrdtxtbox']))));
					
					if($user__name="admin@flyparadise.in" && $user__pass="#flyparadise"){  
								$_SESSION['Super_admin']="yes";
								$_SESSION['Loggedin_User']="yes";
								$_SESSION['Loggedin_User_password']=$user__pass;
								$_SESSION['current_loggedin_user']= $user__name;
								$_SESSION['current_loggedin_user_email']=$row['email'];
								header('location:superadmindashboard');
					}
					else{
						echo "Invalid Login";
					}
					
				}
				
			} 
		?>
		
		
		<form action="" method ="POST">
		  <input type="text" placeholder="email" name="usernametxtbox"/> <br />
		  <input type="password" placeholder="password"  name="passwrdtxtbox" /> <br />
		 <input type="submit" name="btn" value="Login" /><br /><br />
		  
		  
		 
		</form>
		
		
		
	</body>
<html>