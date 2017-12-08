<?php
	
	require('../catalog/session.khan');
	
		$_SESSION['Loggedin_User']="no";
		unset($_SESSION['Loggedin_User_password']);
		unset($_SESSION['current_loggedin_user']);
		unset($_SESSION['current_loggedin_user_email']);
		session_destroy();
		header('location:../../get-in');
		exit();

?> 

