<?php
	ob_start();
	include_once('../catalog/connect.khan');
?>

   <div>Create An Account</div>
  
  
  
 <form action="" method="post">
  <table>
	<tr>
	<td>Username <input type="text" id="Username"  name="Username" /></td>
	 
	 <td>
		<?php 
				$admin="1";
				if(isset($_POST['signupbtn'])){
					
					if($_POST['Username']==""){
						$admin="0";
						echo "Enter UserName";
						}
						else{
							if(!preg_match("%^[a-z A-Z 0-9 .,!@&$]{4,26}$%",$_POST['Username'])){
							$admin="0";
							echo "Enter a valid UserName";
						}
					}
				} 
			?>
	 </td>
	
	</tr>
	
	
	<tr>
	<td> Email id <input type="text"  id="Email" name="Email" /></td>
	  <td>
			<?php 
				
				if(isset($_POST['signupbtn'])){
				
					if($_POST['Email']==""){
						$admin="0";
						echo "Enter Email";
						}
						else{
							if(preg_match("%^[a-z A-Z 0-9 */()><.,!@&#$]{2,100}[@]{1,1}[a-zA-Z]{3,16}[.]{1,1}[a-z]{2,16}[.]{0,1}[a-z]{0,16}$%",$_POST['Email'])){
									$result=mysqli_query($dbconn,"SELECT * FROM `users`") or die("Db error");
							if($result){
									$users;
									while($row = mysqli_fetch_assoc($result)){
										if($_POST['Email']==$row['email']){
											echo "Email already registered";
											$admin="0";
										}
										
									}
							}
							}	
							else{
							$admin="0";
							echo "Enter a valid Email";
							}
						}
				} 
			?>
		
		</td>
  
	</tr>
	
	<tr>
	<td>Phone Number <input type="text" id="Phone_Number" name="Phone_Number" /></td>
	  <td >
			<?php 
				
				if(isset($_POST['signupbtn'])){
					
					if($_POST['Phone_Number']==""){
						$admin="0";
						echo "Enter Phone Number";
						}
						else{
							if(preg_match("%^[+ ]{0,2}[0-9 ]{10,13}$%",$_POST['Phone_Number'])){
							
							}	
							else{
							$admin="0";
							echo "Enter a valid Number";
							}
						}
				} 
			?>
			
		</td>
   
	</tr>
	
	
	<tr>
		<td></td>
		<td><input type="submit"  value="Sign Up" name="signupbtn"/></td>
	</tr>
  </table>
</form>
		 


<?php
	
	if(isset($_POST['Username'])){
		if($admin=="1"){
			$user_name=mysql_real_escape_string(trim(strip_tags(stripslashes($_POST['Username']))));
			$email=mysql_real_escape_string(trim(strip_tags(stripslashes($_POST['Email']))));
			$phone=mysql_real_escape_string(trim(strip_tags(stripslashes($_POST['Phone_Number']))));
			$pass=rand(0000,999999);
			$pass=md5(md5(hash('sha512',md5(base64_encode(hash('sha1',$pass))))));
		
		if(mysqli_query($dbconn,"INSERT INTO `users` (`name`,`passcode`,`email`,`phone`)  VALUES ('$user_name','$pass','$email','$phone')")){
				$_SESSION['Loggedin_User']="yes";
				$_SESSION['Loggedin_User_password']=$pass;
				$_SESSION['current_loggedin_user']= $user__name;
				$_SESSION['current_loggedin_user_email']=$email;
				
				//send mail here including password
				header('location:../../dashboard');		
			}
			else{
				echo mysqli_error($dbconn);
				echo "Something Went Wrong !";
			}
		}
	}
?>

