<?php
	
	require('home/catalog/session.khan');
	if(!isset($_SESSION['Loggedin_User'])){
		header('location:get-in');
	}
	else{
		
	var_dump($_SESSION);
	
	//Google Logout
	if($_SESSION['signvia'] == 'Google'){
	
		header('location:https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/flyparadise/home/components/logoff.php');
		exit();
	}
	
	//Facebook Logout
	if($_SESSION['signvia'] == 'Facebook'){
			include_once('home/components/fblogout.php');
			header('location:home/components/logoff.php');
	} 
	
	
	//will be executed in normal logins, no google or fb login
	
		header('location:home/components/logoff.php');
		exit();
		
	}
?> 

