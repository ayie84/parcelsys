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

?>

<!-- 
<meta http-equiv=Refresh content=0;url=index.php>
-->