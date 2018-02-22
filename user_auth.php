<?php
ob_start();
	require_once('config.khan');
	include_once('home/catalog/connect.khan');
	include_once('home/catalog/session.khan');
	//echo $_SESSION['$auth'];
	if(!isset($_SESSION['$auth'])){
		header('location:get-in.php');
	}
?>
<div>

<div style="margin:auto;padding: 7px;border: 0;font-size: 18px;background: transparent; color:#333333; width:50%; ">
A verification code has been send to <span style="color:#602D8D;"><a href=""><?php echo $_SESSION['$email']; ?></a></span><br>Please Enter that code to continue.<br>
</div>
<form action="" method="post">
	<div style="margin-left:25%; width:35%;">
	<table>
		<tr>
			<td ><input type="text" name="auth" /></td>
			<td style="color:#FF0000; font-size:12px;">
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
	</table>
	

	<input type="submit" value="Authenticate" name="authbtn" id="authenticatebtn"/>
		</div>
</form>

</div>
<?php
	if(isset($_POST['authbtn'])){
	if($admin=="1"){
	$auth_code=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['auth']))));;
	if($auth_code==$_SESSION['$auth']){
		
		$user_name=$_SESSION['$user_name'];
		$pass=$_SESSION['$pass'];
		$email=$_SESSION['$email'];
	    $phone=$_SESSION['$phone'];
		$img='assets\users\default.png';
		if(mysqli_query($dbconn,"INSERT INTO `users` (`name`,`passcode`,`email`,`phone`,`img`)  VALUES ('$user_name','$pass','$email','$phone','$img')")){
						echo "<script type='text/javascript'> alert('Account Created'); </script>";
						echo "<script type='text/javascript'> window.location = 'get-in' </script>";
						
						session_destroy();
						//header('location:get-in.php');
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

<?php

ob_end_flush();
?>