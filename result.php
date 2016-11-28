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
include 'inc/header.php';?>
<div class="col-md-offset-4 col-md-4 row spacer">
<?php
$date_picker = $_REQUEST['date_picker'];
track();
echo $date_picker;?>
</div>
<?php
include 'inc/footer.php';
?>