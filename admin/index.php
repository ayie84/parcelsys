<?php
/*
@Title 		: Parcel Management System
@Filename 	: index.php
@Author		: Restu Lestari
@date		: 13-11-16

*/





include 'inc/function.php';

// Start Session
// Comment this line to off the authentication session	
	session_start();
		
		// if session is not set this will redirect to login page
		 if( isset($_SESSION['SESS_MEMBER_ID']) ) {
		  header("Location: dashboard.php");
		  exit;
		 }
 // End Session

/*

session_start();

 if( isset($_SESSION['SESS_MEMBER_ID']) ) {
  //header("Location: dashboard.php");
  header("Location: dashboard.php");
  exit;
 }else{

 }

 */


debugScript(); //comment this line for debug error msg
$navbar = '0';
con2db();
pageTitle("Parcel Management System");
include 'inc/header.php';

?>
 <div class="container" style="margin-top:40px">
		<div class="row spacer">

		<div class="col-sm-6 col-md-4 col-md-offset-4" align="center">

			<img width="200px" class="logo" src="public/images/ump.png">
		</div> 
		<div class="col-md-offset-2 col-md-8 row spacer"></div>
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

						<form role="form" action="login-exec.php" method="POST"> <!-- <form id="loginForm" name="loginForm" method="post" action="/aug/login-exec.php"> -->
							<fieldset>
								<div class="row" align="center">
									
								<p>		<a href="../">Utama</a> | 
					<a href="../tracking.html">Semak Parcel</a>
					</p>
								
								</div>
								<div class="row" align="center">

									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Username" name="login" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Password" name="password" type="password" value="">
											</div>
										</div>
										<div class="form-group">
											<!--<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">-->
											<input type="submit" class="btn btn-warning pull-right" value="Login">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="panel-footer ">
						<h6 align="center">Hakcipta © 2016 Universiti Malaysia Pahang. </br>Hak cipta terpelihara.</h6>
					</div>
                </div>
			</div>
		</div>
	</div>
<?php
//include 'inc/footer.php';
?>