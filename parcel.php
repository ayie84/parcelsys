<?php
/*
10-11-2016
parcel.php
-store & view courier company

*/
include 'inc/function.php';
con2db();
$result = parcel_reg();
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
	   <h3>Parcel </h3><hr>
	<form class="form-horizontal" name="form" method="post" action="">
	<input type="hidden" name="new" value="1" />
	<!--<form class="form-horizontal" name="form" action="" method="post" id="contact_form">-->
        <fieldset>
        <!-- Text input-->
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>                          
                    <input name="parcel_cnumber" id="parcel_cnumber" placeholder="Tracking Number" class="form-control" type="text" required>
                    </div>                        
                </div>
            </div>

			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>                        
                    <input name="parcel_rcpt_name" placeholder="Receipent Name" class="form-control" type="text" required>                          
                    </div>
                </div>
            </div>

                <?php 	
					bs_ptj(); 
					bs_courier();
				?>
				
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>                        
                    <input name="parcel_takenby" placeholder="Taken By" class="form-control" type="text">                          
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
				
					<input class="btn btn-warning pull-right" name="submit" type="submit" value="Submit"><?php //parcel_reg(); ?>
				</div>
            </div>
            </fieldset>
			</form>
		
	</div>
	</div>
	<?php bsview_parcel(); ?>
</div>

</body>
</html>

