<?php
	//Start session
	session_start();
	
	include 'inc/function.php';
	con2db();

 
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	

	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		//header("location: /aug/index.php");
		exit();
	}
	
	//Create query
	$qry="SELECT * FROM login_user WHERE login='$login' AND passwd='".md5($_POST['password'])."'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['member_id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
			$_SESSION['SESS_LAST_NAME'] = $member['lastname'];
			$_SESSION['SESS_LOGIN'] = $member['login'];
			session_write_close();
			//redirect after login successful
			header("location: parcel.php");
			exit();
		}else {
				//redirect after login failed
		$errmsg_arr[] = 'The username do not exist or wrong password.';
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();			
			header("location: index.php");
			//header("location: login-failed.php");
			exit();
		}
	}else {
		//$errmsg_arr[] = 'The username do not exist or wrong password.';
		//$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		//	session_write_close();
		die("Query failed");
	}
?>