<?php
/*
@Title 		: Parcel Management System
@Filename 	: delete_ptj.php
@Author		: Restu Lestari
@date		: 13-11-16

*/

// Start Session
// Comment this line to off the authentication session	
	session_start();
		
		// if session is not set this will redirect to login page
		 if( !isset($_SESSION['SESS_MEMBER_ID']) ) {
		  header("Location: index.php");
		  exit;
		 }
 // End Session
 
include 'inc/function.php';
//auth();
debugScript(); //comment this line for debug error msg

con2db();
pageTitle("Remove PTJ Data");
include 'inc/header.php';
$id = $_REQUEST['id'];

ptjDel();
include 'inc/footer.php';
?>