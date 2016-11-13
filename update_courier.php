<?php
//include 'inc/mail_func.php';
include 'inc/function.php';
con2db();
$id = $_REQUEST['id'];
$query =  mysql_query("SELECT  * FROM `courier` WHERE id=$id") or die (mysql_query());
$test = mysql_fetch_array($query);//will show 1st data only
$courier_name = $test['courier_name'];
$courier_address = $test['courier_address'];
$courier_contact_no = $test['courier_contact_no'];
$courier_fax_no = $test['courier_fax_no'];
$result = courier_update();
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
            <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>  
            <input name="courier_name" id="courier_name" value="<?php echo $courier_name; ?>" class="form-control" type="text" required>
        </div>
    </div>
    </div>
    
	<div class="form-group">
	<div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input name="courier_address" value="<?php echo $courier_address; ?>" class="form-control" type="text">
        </div>
    </div>
    </div>
	
	<div class="form-group">
	<div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
            <input name="courier_contact_no" value="<?php echo $courier_contact_no; ?>" class="form-control" type="text">
        </div>
    </div>
    </div>
	
	<div class="form-group">
	<div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-print"></i></span>
            <input name="courier_fax_no" value="<?php echo $courier_fax_no; ?>" class="form-control" type="text">
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

