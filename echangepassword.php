<?php
ob_start();

require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/common/employeeheader.fly');//adding employee header 
require_once('home/components/employeeauthorize.fly');
	
?>

<p>Employee Change Password </p> <br /><br />
          
<form action="" method="post">
	<table>
		<tr>
			<td><label> Current Password </label><input type="text"name="oldpass" /></td>
			<td >
					<?php 

						if(isset($_POST['loginbtn'])){
							$admin="1";
							if($_POST['oldpass']==""){
								$admin="0";
								echo "Enter password";
								}
								else{
									if(preg_match("%^[a-z A-Z 0-9 .,!@&$]{4,26}$%",$_POST['oldpass'])){
										if($_SESSION['Loggedin_User_password']!= md5(md5(hash('sha512',md5(base64_encode(hash('sha1',$_POST['oldpass']))))))){
											echo "Incorrect Password";
											$admin="0";
										}
									}	
									else{
									$admin="0";
									echo "Enter a valid password";
									}
								}
						} 
					?>
				</td>
		</tr>
		<tr>
			<td><label >New Password </label><input type="password"  name="passwrdtxtbox" /></td>
			<td >
					<?php 
						if(isset($_POST['loginbtn'])){
							if($_POST['passwrdtxtbox']==""){
								$admin="0";
								echo "Enter Password";
								}
								else{
									if(preg_match("%^[a-z A-Z 0-9 .,!@&$]{4,30}$%",$_POST['passwrdtxtbox'])){
										
									}	
									else{
									$admin="0";
									echo "Enter a valid Password";
									}
								}
						} 
					?>
			</td>
		</tr>
			
		<tr>
			<td><label>Confirm Password </label><input type="password"  name="confirmpasswrdtxtbox" /></td>
			<td >
					<?php 
						if(isset($_POST['loginbtn'])){
							if($_POST['confirmpasswrdtxtbox']==""){
								$admin="0";
								echo "Enter Password";
								}
								else{
									if(preg_match("%^[a-z A-Z 0-9 .,!@&$]{4,30}$%",$_POST['confirmpasswrdtxtbox'])){
										if($_POST['confirmpasswrdtxtbox']!=$_POST['passwrdtxtbox']){
											echo "Passwords do not match";
											$admin="0";
										}
									}	
									else{
									$admin="0";
									echo "Enter a valid Password";
									}
								}
						} 
					?>
			</td>
		</tr>
	</table>
           
     <input type="submit" id="changePassbtn" value="Update Password" name="loginbtn" />
            
</form>
		 


<?php
	if(isset($_POST['loginbtn'])){
		if($admin=="1"){
			
			$user_pass=mysql_real_escape_string(trim(strip_tags(stripslashes($_POST['confirmpasswrdtxtbox']))));
			$user_pass=md5(md5(hash('sha512',md5(base64_encode(hash('sha1',$user_pass))))));
			$email=$_SESSION['current_loggedin_user_email'];
			$query="UPDATE `employees` SET `passcode` = '$user_pass' WHERE `email` = '$email';";
			
			if(mysqli_query($dbconn,$query)){
			
					$_SESSION['Loggedin_User_password']=$user_pass;
					echo "Password Changed";
				}
				else{
					echo "Something Went Wrong";
					
				}
			}
			
		}
		
	
	?>


<?php require_once('home/common/footer.fly'); ?>
<?php

ob_end_flush();
?>