<?php
	
	require('home/catalog/session.khan');
	session_start();
	var_dump($_SESSION);
	//Google Logout
	if($_SESSION['signvia'] === 'Google'){
		$_SESSION['Loggedin_User']="no";
		unset($_SESSION['Loggedin_User_password']);
		unset($_SESSION['current_loggedin_user']);
		unset($_SESSION['current_loggedin_user_email']);
		unset($_SESSION['signvia']);
		session_destroy();
		header('location:https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/flyparadise/get-in');
		exit();
	}
	
	//Facebook Logout
	if($_SESSION['signvia'] === 'Facebook'){
			$_SESSION['Loggedin_User']="no";
			unset($_SESSION['Loggedin_User_password']);
			unset($_SESSION['current_loggedin_user']);
			unset($_SESSION['current_loggedin_user_email']);
			unset($_SESSION['signvia']);
			session_destroy();
			include_once('home/components/fblogout.php');
			echo '<script> document.location.href="get-in"; </script>';
			
	
	} 
	
	
	//will be executed in normal logins, no google or fb login
	if($_SESSION['signvia'] === 'usrpwd'){
		$_SESSION['Loggedin_User']="no";
		unset($_SESSION['Loggedin_User_password']);
		unset($_SESSION['current_loggedin_user']);
		unset($_SESSION['current_loggedin_user_email']);
		session_destroy();
		header('location:get-in');
		exit();
	}

?> 
