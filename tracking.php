<?php
/*
UMP Parcel Databased & Tracking System
10-11-2016
parcel.php
-store & view courier company

*/
include 'inc/function.php';
con2db();
//$result = track();
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
  
<div class="container  spacer">
	<div class="col-md-offset-4 col-md-4" id="box">
	<h3>Tracking Parcel</h3><hr>
	
	
	
	
	<form class="form-horizontal" method="get" action="result.php">
	
	<!--<form class="form-horizontal" name="form" action="" method="post" id="contact_form">-->
        <fieldset>
        <!-- Text input-->
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>                          
                    <input name="query" id="query" placeholder="Insert Tracking Number" class="form-control" type="text" required>
                    </div>                        
                </div>
            </div>

			
			
			<div class="form-group">                       
				<div class="col-md-12">
				
					<input class="btn btn-warning pull-right" type="submit" value="Track Now!!">
				</div>
            </div>
			
			
            </fieldset>
			</form>
	</div>
	<?php
		//track();
		?>
</div>

</body>
</html>

