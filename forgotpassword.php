<?php
	ob_start();
	require_once('config.khan');
	session_start();
	include_once('home/catalog/connect.khan');
	?>
	
	
	<?php
	$admin="1";
		if(isset($_POST['forgot_password'])){
	
				$result=mysqli_query($dbconn,"SELECT * FROM `users`") or die(header('location:error.php?token=dbt'));
				if($result){		
						while($row = mysqli_fetch_assoc($result)){
								if($_POST['forgot_password']==$row['email']){
								$admin="1";
								break;
							}
							else{
								$admin="0";
							}	
						}
				}									
		}
?>
	
	
<div>

<p>
Enter your registered email to restore your password.<br>
</p>

<form action="" method="post">
	<div>
	<table>
		<tr>
			<td ><input type="text" name="forgot_password" /></td>
			<td>
				<?php 
						
						if(isset($_POST['forgot_password'])){
							
							if($_POST['forgot_password']==""){
								
								echo "Enter Email";
								$admin="0";
								}
								else{
									if(preg_match("%^[a-z A-Z 0-9 */()><.,!@&#$]{2,100}[@]{1,1}[a-zA-Z]{3,16}[.]{1,1}[a-z]{2,16}[.]{0,1}[a-z]{0,16}$%",$_POST['forgot_password'])){
										if($admin=="0"){
											echo "Email not registered";
											}
											else{
												$admin=1;
											}
									}	
									else{
									
									echo "Enter a valid Email";
									$admin="0";
									}
								}
						} 
					?>
			</td>
		</tr>
	</table>
	

	<input type="submit" value="Continue" name="authbtn" id="authenticatebtn"/>
		</div>
</form>

</div>
<?php
	if(isset($_POST['forgot_password'])){
	if($admin=="1"){
		$_SESSION['forgot_email']=mysql_real_escape_string(trim(strip_tags(stripslashes($_POST['forgot_password']))));;
		$_SESSION['forgot_pass_auth']=rand(0000,999999);
		$message="\n \n Your password verification code is ".$_SESSION['forgot_pass_auth']."\n \n \n  This message is live till your browser is open.\n"."Disclaimer:
		This message is intended only for the use of the addressee and may contain information that is privileged, confidential and exempt from disclosure under applicable law. If the reader of this message is not the intended recipient, or the employee or agent responsible for delivering the message to the intended recipient, you are hereby notified that any dissemination, distribution or copying of this communication is strictly prohibited. If you have received this e-mail in error, please notify us immediately and delete this e-mail and all attachments from your system.";
		mail($_SESSION['forgot_email'],"Password Verification Code",$message,"From:flyparadise.in");
		header('location:passauth');
			
	}
	}
?>

