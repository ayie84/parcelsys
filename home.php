<?php
/*
10-11-2016
parcel.php
-store & view courier company

*/
include 'inc/function.php';
con2db();
$result = courier_reg();
//echo 'parcel.php file';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>UMP Parcel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="inc/css/bootstrap.min.css">
  <link rel="stylesheet" href="inc/css/style.min.css">
  <script src="inc/js/jquery.min.js"></script>
  <script src="inc/js/bootstrap.min.js"></script>
  <style>
	.spacer { margin-top: 40px;}
  </style>
</head>
<body>

<?php navbar(); ?>
  
<div class="container spacer">
	<div class="col-md-offset-4 col-md-4" id="box">
	<h3>Add Courier </h3><hr>
	
	</div>
	
</div>

</body>
</html>

