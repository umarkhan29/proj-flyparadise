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
			if($users=mysqli_query($dbconn,$query)){  
				while($row = mysqli_fetch_assoc($users)){
					$user[] = array(
							
							'ID'			=>	$row['id'],
							'NAME' 			=> 	$row['name'],
							'EMAIL' 		=> 	$row['email'],
							'IMG' 			=> 	$row['img'],
							'ROLE' 			=> 	$row['role'],
							
						);
						 $count=$count+1;
						
				}
				
			if(mysqli_num_rows($users)==1){
				$_SESSION['Loggedin_User']="yes";
				$_SESSION['Loggedin_User_password']=$user[0][''];
				$_SESSION['current_loggedin_user']= $user[0]['NAME'];;
				$_SESSION['current_loggedin_user_email']=$user[0]['EMAIL'];
				$_SESSION['current_loggedin_user_role']=$user[0]['ROLE'];
				$_SESSION['signvia']="usrpwd";
				if($_SESSION['current_loggedin_user_role']=='employee' || $_SESSION['current_loggedin_user_role'] == 'admin')
					header('location:addpackages');
				else
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