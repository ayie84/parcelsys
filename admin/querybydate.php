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

include 'inc/function.php';
debugScript();//comment this line to debug
//auth();
con2db();
pageTitle("Parcel Query Data");
include 'inc/header.php';

?>


<div class="row spacer"></div>

	<div class="col-md-offset-4 col-md-4 row spacer" id="box">
	<h3>Query By Date</h3><hr>
	<form class="form-horizontal" name="form" method="post" action="resultbydate.php">
	<input type="hidden" name="new" value="1" />
	<!--<form class="form-horizontal" name="form" action="" method="post" id="contact_form">-->
        <fieldset>
        <!-- Text input-->
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group date">
					<!-- <input name="date_picker" type="text" class="form-control" required>
					-->
					<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					
					<input name="date_picker" id="datepicker" type="text" class="form-control" required value="">

					</div>                        
                </div>
            </div>

            <?php 
            	ptjDropMenu(); 
            ?>
			
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

<div class="row spacer"></div>
<div class="row spacer"></div>
<div class="row spacer"></div>


<?php
	include 'inc/footer.php';
?>

