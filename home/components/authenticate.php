<?php
	include_once('home/catalog/connect.khan');
	include_once('home/catalog/session.khan');
	
	if(isset($_POST['btn'])){
		val_email($_POST['usernametxtbox']);
		
		if($GLOBALS['__ValFlag']==1){ 
			$user__name=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['usernametxtbox']))));
			$user__pass=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['passwrdtxtbox']))));
			$user__pass=md5(md5(hash('sha512',md5(base64_encode(hash('sha1',$user__pass))))));
			$query="select * from `users` where `email` ='$user__name' and `passcode`='$user__pass';";
			if($user=mysqli_query($dbconn,$query)){  
					if(mysqli_num_rows($user)==1){
						$_SESSION['Loggedin_User']="yes";
						$_SESSION['Loggedin_User_password']=$user__pass;
						$_SESSION['current_loggedin_user']= $user__name;
						$_SESSION['current_loggedin_user_email']=$row['email'];
						header('location:index');
					}
					else{
						echo "Invalid Login";
					}
			}
			else{
				echo "Something Went Wrong. Contact your Administrator !";
				//echo mysqli_error($dbconn);
			}
		}
		
	} 
	?>