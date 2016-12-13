<?php
/*
@Title 		: Parcel Management System
@Filename 	: query.php
@Author		: Restu Lestari Resources
@date		: 13-11-16

*/

// Start Session
// Comment this line to off the authentication session	
	session_start();
		
		// if session is not set this will redirect to login page
		 if( !isset($_SESSION['SESS_MEMBER_ID']) ) {
		  header("Location: index.php");
		  exit;
		 }
 // End Session


//session_start();
include 'inc/function.php';
debugScript();//comment this line to debug
//auth();
con2db();
pageTitle("Parcel Query Data");
include 'inc/header.php';

?>
	<div class="col-md-offset-4 col-md-4" id="box">
	<h3>Track Parcel</h3><hr>
	<form class="form-horizontal" name="form" method="get" action="result.php">
	<input type="hidden" name="new" value="1" />
	<!--<form class="form-horizontal" name="form" action="" method="post" id="contact_form">-->
        <fieldset>
        <!-- Text input-->
			<div class="form-group">
				<div class="col-md-12">
                    <!--<div class="input-group date">
					<input name="date_picker" type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					</div> -->

					<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>                          
                    <input name="query" id="query" placeholder="Tracking Number" class="form-control" type="text" required>
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
					<?php //echo $result; ?>    
				</div>
			</div>
            </fieldset>
			</form>
	</div>
<?php
	include 'inc/footer.php';
?>

