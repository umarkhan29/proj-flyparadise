<?php

	include_once('home/catalog/connect.khan');
	include_once('home/catalog/session.khan');	
		
		$_SESSION['Loggedin_User']="no";
		unset($_SESSION['Loggedin_User_password']);
		unset($_SESSION['current_loggedin_user']);
		unset($_SESSION['current_loggedin_user_email']);
		if($_SESSION['signvia']=="Google"){
			unset($_SESSION['signvia']);
			session_destroy();
			echo '<script> document.location.href="https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/flyparadise/get-in"; </script>';
			
		}else{
			session_destroy();
			header('location:get-in');
		}
	
?>