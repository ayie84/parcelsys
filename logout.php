<?php
	//Start session
	session_start();


if (!isset($_SESSION['SESS_MEMBER_ID'])) {
  header("Location: index.php");
 } else if(isset($_SESSION['SESS_MEMBER_ID'])!="") {
  header("Location: parcel.php");
 }
	
if (isset($_GET['logout'])) {
  		unset($_SESSION['SESS_MEMBER_ID']);
  		session_unset();
  		session_destroy();
  		header("Location: index.php");
  exit;
 }

	//Unset the variables stored in session
	//unset($_SESSION['SESS_MEMBER_ID']);
	//unset($_SESSION['SESS_FIRST_NAME']);
	//unset($_SESSION['SESS_LAST_NAME']);
	//unset($_SESSION['SESS_LOGIN']);
	//unset($_SESSION['ERRMSG_ARR']);

?>

<!-- 
<meta http-equiv=Refresh content=0;url=index.php>
-->