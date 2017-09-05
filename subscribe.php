<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
		include_once('home/catalog/connect.khan');
?>


<?php

if(isset($_POST['btn'])){ 
		$email=	$_POST['subscribe_email'];
			if($email==""){
				
				echo '<div style="width:80%;padding-top:50px; padding-bottom:60px; padding-left:20%; overflow:hidden; color:red; font-size:32px; background:#999999;">Enter Email</div>';				}
				else{
					if(preg_match("%^[a-z A-Z 0-9 */()><.,!@&#$]{3,45}[@]{1,1}[a-zA-Z]{2,16}[.]{1,1}[a-z]{2,16}$%",$email)){
							$email=mysql_real_escape_string(trim(strip_tags(stripslashes($_POST['subscribe_email']))));	
							
							
							
								$result=mysqli_query($dbconn,"SELECT * FROM `subscribers`") or die("Database error");
								$user="unsubscribed";
								if($result){
										
										while($row = mysqli_fetch_assoc($result)){
												
												if($email == $row['email']){
													$user="subscribed";
													break;
												
												}
										}
									
									}
			
							if($user=="unsubscribed"){
			
							$query="INSERT INTO `subscribers`(`email`) VALUES ('$email');";
							mysqli_query($dbconn,$query) or die( mysqli_error());
							echo'<div style="width:80%;padding-top:50px; padding-bottom:60px; padding-left:20%; overflow:hidden; color:green; font-size:32px; background:#999999;">You have been sucessflly subscribed to our newsletters</div>';
							$message="You have been sucessflly subscribed to our newsletters";
							mail($email,"Subscribed",$message,"From:Flyparadise.in");
					}else{
						echo '<div style="width:80%;padding-top:50px; padding-bottom:60px; padding-left:20%; overflow:hidden; color:green; font-size:32px; background:#999999;">You are aleady subscribed to our newsletters</div>';
					}
					}	
					else{
					
					echo '<div style="width:80%;padding-top:50px; padding-bottom:60px; padding-left:20%; overflow:hidden; color:red; font-size:32px; background:#999999;">Invalid Email</div>';
					}
				}
}
?>



<p>
		<form action="" method="POST">
			<input type="text" name="subscribe_email" placeholder="Email"/><br />
			<input type="submit" name="btn" value="Subscribe"/><br />
		</form>
</p>

</body>
</html>
