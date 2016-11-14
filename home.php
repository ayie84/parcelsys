<?php
/*
@Title 		: Parcel Management System
@Filename 	: index.php
@Author		: Fit3
@date		: 13-11-16

*/
include 'inc/function.php';
auth();
debugScript(); //comment this line for debug error msg

con2db();
pageTitle("Home");
include 'inc/header.php';
echo 'index file.php';
include 'inc/footer.php';
?>