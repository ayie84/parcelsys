<?php
/*
@Title 		: Parcel Management System
@Filename 	: result.php
@Author		: Fit3
@date		: 13-11-16

*/
session_start();

include 'inc/function.php';
auth();
con2db();
pageTitle("Parcel Query Result");
include 'inc/header.php';

track();
include 'inc/footer.php';
?>