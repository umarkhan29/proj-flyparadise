<?php
	include_once('../catalog/connect.khan');
	include_once('../catalog/session.khan');	
	
	$name=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['name']))));
	$email=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['email']))));
	$img=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['img']))));
	$uid=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['uid']))));
	$uid=$uid/10000000000;
	$uid=substr($uid, 0, 5);
	$pass=rand(0000,999999);
	$pass=md5(md5(hash('sha512',md5(base64_encode(hash('sha1',$pass))))));

	//checking if user already exits and storing signup details if user doesnt exist
	
 	echo $query="select * from `users` where `email` ='$email' OR `uid` like '$uid';";
	if($user=mysqli_query($dbconn,$query)){  
			if(mysqli_num_rows($user)==1){ //user already exists
				$_SESSION['Loggedin_User']="yes";
				$_SESSION['Loggedin_User_password']=$pass;
				$_SESSION['current_loggedin_user']= $name;
				$_SESSION['current_loggedin_user_email']=$email;
				$_SESSION['signvia']="Facebook";	
				header('location:../../index');
			}
			else{ //a new user signin in, Saving the user informations
				if(mysqli_query($dbconn,"INSERT INTO `users` (`name`,`passcode`,`email`,`img`,`uid`)  VALUES ('$name','$pass','$email','$img','$uid')")){
					$_SESSION['Loggedin_User']="yes";
					$_SESSION['Loggedin_User_password']=$pass;
					$_SESSION['current_loggedin_user']= $name;
					$_SESSION['current_loggedin_user_email']=$email;
					$_SESSION['signvia']="Facebook";
					header('location:../../index');		
				}
				else{
					echo mysqli_error($dbconn);
					echo "Something Went Wrong !";
				}
		
			}
	}
					

?>