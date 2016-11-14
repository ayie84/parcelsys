<?php
/*
@Title 		: Parcel Management System
@Filename 	: delete_courier.php
@Author		: Fit3
@date		: 13-11-16

*/
session_start();
include 'inc/function.php';
auth();

debugScript(); //comment this line for debug error msg

con2db();
pageTitle("Remove Courier Data");
include 'inc/header.php';
$id = $_REQUEST['id'];

courierDel();
include 'inc/footer.php';
?>