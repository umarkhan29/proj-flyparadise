<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Travel Blogging</title>
</head>

<body>

<?php
	//Establishing Session and Database Connection
	include_once('../home/catalog/connect.khan');
	include_once('../home/catalog/session.khan');	
	
	
	//Handling Request
	if(isset($_POST['btn'])){
		$name=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['name']))));
		$email=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['email']))));
		$phone=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['phone']))));
		$bio=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['bio']))));
		
		$query="INSERT INTO `event_travel_blogger` ( `name`,`email`, `phone`,`bio`) VALUES ('$name', '$email', '$phone','$bio');";
		if(mysqli_query($dbconn,$query)){ 
			echo "We have recieved your query. We will email you if you meet the requirements for our event.";
		}else{
			echo "fail";
		}
	}
?>

	<form action="" method="post">
		<input type="text" name="name" placeholder="Name" /> <br />
		<input type="text" name="email" placeholder="Email" />  <br />
		<input type="text" name="phone" placeholder="Phone" /> <br />
		<textarea name="bio" rows="20" cols="150">
		
		</textarea><br />
		<input type="submit" name="btn" value="Register" />
	</form>
</body>
</html>
