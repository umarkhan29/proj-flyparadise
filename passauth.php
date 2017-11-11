<?php
ob_start();
	require_once('config.khan');
	session_start();
	if(!isset($_SESSION['forgot_email']))
		header('location:forgotpassword'); 
	
	include_once('home/catalog/connect.khan');
?>


<p >
A verification code has been sent to <span ><?php echo $_SESSION['forgot_email']; ?></span> <br/>Please Enter that code to continue.<br/>
</p>


<form action="" method="post">
	
	<table>
		<tr>
			<td ><input type="text" name="auth" placeholder="Authentication Code"  /></td>
			<td >
				<?php 
						$admin="1";
						if(isset($_POST['authbtn'])){
							
							if($_POST['auth']==""){
								
								echo "Enter Authentication Code";
								$admin="0";
								}
								else{
									if(preg_match("%^[0-9]{2,6}$%",$_POST['auth'])){
									
									}	
									else{
									
									echo "Enter a valid Code";
									$admin="0";
									}
								}
						} 
					?>
			</td>
		</tr>
		<tr>
			<td ><input type="password" name="new_pass" placeholder="New Password"  /></td>
			<td >
				<?php 
						
						if(isset($_POST['authbtn'])){
							
							if($_POST['new_pass']==""){
								
								echo "Enter New Password";
								$admin="0";
								}
								else{
									if(preg_match("%^[0-9 a-z A_Z .,-90&!@]{4,20}$%",$_POST['new_pass'])){
									
									}	
									else{
									
									echo "Enter a valid Password";
									$admin="0";
									}
								}
						} 
					?>
			</td>
		</tr>
		<tr>
			<td ><input type="password" name="repass" placeholder="ReEnter Password" /></td>
			<td >
				<?php 
						
						if(isset($_POST['authbtn'])){
							
							if($_POST['repass']==""){
								
								echo "Retype new password";
								$admin="0";
								}
								else{
									if(preg_match("%^[0-9 a-z A_Z .,-90&!@]{4,20}$%",$_POST['repass'])){
										if($_POST['repass']!=$_POST['new_pass']){
											echo "Passwords do not match";
											$admin="0";
										
										}
									}	
									
									
									
								}
						} 
					?>
			</td>
		</tr>
	
	</table>

	<input type="submit" value="Change Password" name="authbtn" id="authenticatebtn"/>
		
</form>


<?php
	if(isset($_POST['authbtn'])){
	if($admin=="1"){
	$auth_code=mysql_real_escape_string(trim(strip_tags(stripslashes($_POST['auth']))));
	if($auth_code==$_SESSION['forgot_pass_auth']){
		
		$new_pass=mysql_real_escape_string(trim(strip_tags(stripslashes($_POST['new_pass']))));
		$new_pass=md5(md5(hash('sha512',md5(base64_encode(hash('sha1',$new_pass))))));
		$email=$_SESSION['forgot_email'];
		if(mysqli_query($dbconn,"UPDATE `users` SET `passcode` ='$new_pass' WHERE `email`='$email' ")){
						echo '<div style="font-family:Arial,Helvetica,sans-serif;width:22%;height:100px;margin-left:25%;font-size:18px; color:green;">Password Changed Sucessfully<br><a href="login.php">Login</a></div>';
						session_destroy();
			}
			else{
				
				echo '<div style="font-family:Arial,Helvetica,sans-serif;font-size:14px;margin-left:25%; color:red;">Something Went Wrong !</div>';
			}
	}
	else{
		echo '<div style="font-family:Arial,Helvetica,sans-serif;font-size:14px; margin-left:25%; color:red;">The Code you entered is incorrect.<br>ReEnter Your Code.</div>';
	
	}
	}
	}
?>

