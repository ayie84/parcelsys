<?php
/*
UMP Parcel Databased & Tracking System
10-11-2016
parcel.php
-store & view courier company

*/
include 'inc/function.php';

con2db();
//$result = courier_reg();
//echo 'parcel.php file';
?>

<?php include 'inc/header.php'?>


	
	<?php
		view_parcel_record();
		?>


<?php include 'inc/footer.php'?>