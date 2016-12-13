<?php
/*
@Title 		: Parcel Management System
@Filename 	: index.php
@Author		: Restu Lestari Resources
@date		: 13-11-16

*/





include 'inc/function.php';


debugScript(); //comment this line for debug error msg
$navbar = '0';
con2db();
pageTitle("Parcel Management System");
//include 'inc/header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php pageTitle(); ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
   <link rel="stylesheet" href="public/css/style.css">
  <!-- Start Dashboard Theme CSS -->
   <link rel="stylesheet" href="public/css/dashboard.css">
   <link rel="stylesheet" href="public/css/font-awesome.css">
<!-- End Dashboard Theme CSS -->

  <script src="public/js/jquery.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/jquery-1.8.3.js"></script>
	
	 <link rel="stylesheet" href="public/css/bootstrap-datepicker3.min.css">
    <script type='text/javascript' src="public/js/bootstrap-datepicker.min.js"></script>
	
	<!-- High Chart-->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	
<script type='text/javascript'>

 $( function() {
    $("#datepicker" ).datepicker("setDate", new Date());
      //datepicker( "setDate", new Date())
       $("input[name=parcel_cnumber]").focus();
  } );

</script>

<script>
//SHOW RESULT
 function showTracking(str) {
    if (str.length == 0) { 
        document.getElementById("result").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("result").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "trackingResult.php?query=" + str, true);
        xmlhttp.send();
    }
}
// SHOW RESULT</script>
</head>
<body>
 <div class="container" style="margin-top:40px">
		<div class="row spacer">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong><center> Parcel Management System</center></strong>
					</div>
					<div class="panel-body">

<!-- Error Message Print -->
						 <?php
   if ( isset($_SESSION['ERRMSG_ARR']) ) {
    foreach ($_SESSION['ERRMSG_ARR'] as $error) {
    ?>
	    
	        <div class="alert alert-danger">
	    		<span class="glyphicon glyphicon-info-sign"></span> 
			    <?php 

					    
					    	echo $error;
					    
					    //echo $_SESSION['ERRMSG_ARR']; 
				?>
	        </div>
	    
   
    <?php
   }}	?>

   <!-- Error Message Print -->

						
						<!--
						<form role="form" action="result.php" method="GET"> -->

						<!-- <form id="loginForm" name="loginForm" method="post" action="/aug/login-exec.php"> -->

						<form>
							<fieldset>
								<div class="row">
									<div class="center-block spacer" align="center">
										<p>Please enter your consignment number here.</p>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">

   <span class="input-group-addon"><i class="fa fa-search"></i></span>

											  <input type="text" name="query" class="form-control" placeholder="Consignment Number" onkeyup="showTracking(this.value)" autofocus="">
    <span class="input-group-btn">
     <!--     <button class="btn btn-default" type="submit">Go!</button>-->
      </span> 
											</div>
										</div>
									
									</div>
								</div>
							</fieldset>
						</form>
					</div>

<div>
	



</div>



					<div class="panel-footer ">
						<!--<h6 align="center">Hakcipta © 2013 Universiti Malaysia Pahang. </br>Hak cipta terpelihara.</h6>-->
					</div>
                </div>
			</div>
		</div>
		<!-- Display result -->
		<span id="result"></span>
		<!-- Display result -->

	</div>
	
<?php
include 'inc/footer.php';
?>