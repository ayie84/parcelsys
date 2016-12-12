<?php
/*
@Title 		: Parcel Management System
@Filename 	: result.php
@Author		: Restu Lestari Resources
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
//include 'config/database.php';
debugScript();//comment this line to debug
$navbar = '1';
//auth();
con2db();
pageTitle("Parcel Query Result");
include 'inc/header.php';?>
<!--<div class="col-md-offset-2 col-md-4 row spacer">-->
<?php
$date_picker = $_REQUEST['date_picker'];
track();
echo $date_picker;?>
<!--</div>-->
<?php
include 'inc/footer.php';
?>