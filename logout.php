<?php
	
	require('home/catalog/session.khan');
	session_start();
	var_dump($_SESSION);
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
	if($_SESSION['signvia'] === 'usrpwd'){
		$_SESSION['Loggedin_User']="no";
		unset($_SESSION['Loggedin_User_password']);
		unset($_SESSION['current_loggedin_user']);
		unset($_SESSION['current_loggedin_user_email']);
		session_destroy();
		header('home/components/logoff.php');
		exit();
	}

?> 

