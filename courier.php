<?php
/*
@Title 		: Parcel Management System
@Filename 	: courier.php
@Author		: Fit3
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
//auth();
debugScript();//comment this line to debug
con2db();
pageTitle("Courier");
include 'inc/header.php';
$result = courierReg();
?>
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
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span> 
                    <textarea class="form-control" rows="3" name="courier_address" placeholder="Address" ></textarea>                       
                   <!-- <input name="courier_address" placeholder="Address" class="form-control" type="text">                -->          
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
courierView();
include 'inc/footer.php';
?>