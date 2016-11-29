<?php
/*
@Title 		: Parcel Management System
@Filename 	: result.php
@Author		: Fit3
@date		: 13-11-16
*/
session_start();
include 'inc/function.php';
//include 'config/database.php';
debugScript();//comment this line to debug
$navbar = '1';
//auth();
con2db();
pageTitle("Parcel Query Result");
include 'inc/header.php';
track();
include 'inc/footer.php';
?>