<?php
	include_once('../catalog/connect.khan');
	include_once('../catalog/session.khan');	
	
	$name=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['name']))));
	$email=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['email']))));
	$img=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['img']))));
	$pass=rand(0000,999999);
	$pass=md5(md5(hash('sha512',md5(base64_encode(hash('sha1',$pass))))));

	//checking if user already exits and storing signup details if user doesnt exist
 	$query="select * from `users` where `email` ='$email';";
	if($user=mysqli_query($dbconn,$query)){  
			if(mysqli_num_rows($user)==1){ //user already exists
				$_SESSION['Loggedin_User']="yes";
				$_SESSION['Loggedin_User_password']=$pass;
				$_SESSION['current_loggedin_user']= $user__name;
				$_SESSION['current_loggedin_user_email']=$email;
				$_SESSION['signvia']="Google";	
				header('location:../../index');
			}
			else{ //a new user signin in, Saving the user informations
				if(mysqli_query($dbconn,"INSERT INTO `users` (`name`,`passcode`,`email`,`img`)  VALUES ('$name','$pass','$email','$img')")){
					$_SESSION['Loggedin_User']="yes";
					$_SESSION['Loggedin_User_password']=$pass;
					$_SESSION['current_loggedin_user']= $user__name;
					$_SESSION['current_loggedin_user_email']=$email;
					$_SESSION['signvia']="Google";
					header('location:../../index');		
				}
				else{
					echo mysqli_error($dbconn);
					echo "Something Went Wrong !";
				}
		
			}
	}
					

?>