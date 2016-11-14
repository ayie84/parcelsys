<?php
/*
@Title 		: Parcel Management System
@Filename 	: delete_parcel.php
@Author		: Fit3
@date		: 13-11-16

*/
include 'inc/function.php';

debugScript(); //comment this line for debug error msg

con2db();
pageTitle("Remove Parcel Data");
include 'inc/header.php';
$id = $_REQUEST['id'];

parcelDel();
include 'inc/footer.php';
?>