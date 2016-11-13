<?php
//include 'inc/mail_func.php';
include 'inc/function.php';
con2db();
$id = $_REQUEST['id'];
$query =  mysql_query("SELECT  * FROM `parcel` WHERE id=$id") or die (mysql_query());
$test = mysql_fetch_array($query);//will show 1st data only
$parcel_cnumber = $test['parcel_cnumber'];
$parcel_rcpt_name = $test['parcel_rcpt_name'];
$parcel_takenby = $test['parcel_takenby'];
$result = parcel_update();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>UMP Update Parcel Data..</title>
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
  
<div class="container row spacer">
	<div class="col-md-offset-5 col-md-4" id="box">
    <h3>Update Parcel</h3><hr>                  
	<form class="form-horizontal" name="form" method="post" action="">
	<input type="hidden" name="new" value="1" />
    <fieldset>
	<div class="form-group">
	<div class="col-md-12">
		<div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
            <input name="parcel_cnumber" id="parcel_cnumber" value="<?php echo $parcel_cnumber; ?>" class="form-control" type="text" required>
        </div>
    </div>
    </div>
    
	<div class="form-group">
	<div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="parcel_rcpt_name" value="<?php echo $parcel_rcpt_name; ?>" class="form-control" type="text" required>
        </div>
    </div>
    </div>
	
	<div class="form-group">
    <div class="col-md-12">
        <?php bs_ptj_ret(); ?>
    </div>
    </div>
										
	<div class="form-group">
    <div class="col-md-12">
        <?php bs_courier_ret(); ?>
    </div>
    </div>
	
	<div class="form-group">
	<div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="parcel_takenby" placeholder="Taken By" value="<?php echo $parcel_takenby; ?>" class="form-control" type="text">
        </div>
    </div>
    </div>

	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<?php echo $result; ?>    
		</div>
	</div>

    <div class="form-group">
	<div class="col-md-12">
		<input class="btn btn-warning pull-right" name="submit" type="submit" value="UPDATE">
	</div>
    </div>

	</fieldset>
	</form> 
	<?php  ?>
</div>

</body>
</html>

