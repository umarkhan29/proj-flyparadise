<?php
	
	require('../catalog/session.khan');
	
		$_SESSION['Loggedin_User']="no";
		unset($_SESSION['Loggedin_User_password']);
		unset($_SESSION['current_loggedin_user']);
		unset($_SESSION['current_loggedin_user_email']);
		unset($_SESSION['signvia']);
		unset($_SESSION['Loggedin_User']);
		header('location:../../get-in');
		exit();

?> 

