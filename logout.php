<?php
	
	require('home/catalog/session.khan');
		
	//Google Logout
	if($_SESSION['signvia'] === 'Google'){
	
		header('location:https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/flyparadise/home/components/logoff.php');
		exit();
	}
	
	//Facebook Logout
	if($_SESSION['signvia'] === 'Facebook'){
			include_once('home/components/fblogout.php');
			echo '<script> document.location.href="home/components/logoff.php"; </script>';
			
	
	} 
	
	
	//will be executed in normal logins, no google or fb login
	
		header('home/components/logoff.php');
		exit();
	
?> 

