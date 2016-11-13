<?php
/*
UMP Parcel Databased & Tracking System
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
  
<div class="container">
	<div class="col-md-offset-4 col-md-4" id="box">
	<h3>Add Courier </h3><hr>
	<form class="form-horizontal" name="form" method="post" action="">
	<input type="hidden" name="new" value="1" />
	<!--<form class="form-horizontal" name="form" action="" method="post" id="contact_form">-->
        <fieldset>
        <!-- Text input-->
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>                          
                    <input name="courier_name" id="courier_name" placeholder="Courier Name" class="form-control" type="text" required>
                    </div>                        
                </div>
            </div>

			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>                        
                    <input name="courier_address" placeholder="Address" class="form-control" type="text">                          
                    </div>
                </div>
            </div>
			
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>                        
                    <input name="courier_contact_no" placeholder="Phone Number" class="form-control" type="text">                          
                    </div>
                </div>
            </div>
			
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-print"></i></span>                        
                    <input name="courier_fax_no" placeholder="Fax Number" class="form-control" type="text">                          
                    </div>
                </div>
            </div>
			
			<div class="form-group">                       
				<div class="col-md-12">
				
					<input class="btn btn-warning pull-right" name="submit" type="submit" value="Submit">
				</div>
            </div>
			
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<?php echo $result; ?>    
				</div>
			</div>
            </fieldset>
			</form>
	</div>
	<?php
		bsview_courier();
		?>
</div>

</body>
</html>

