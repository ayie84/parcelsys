<?php
/*
@Title 		: Parcel Management System
@Filename 	: ptj.php
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
//auth();
debugScript(); //comment this line for debug error msg
con2db();
pageTitle("PTJ");
include 'inc/header.php';
$result = ptjReg();
?>
<div class="col-md-offset-4 col-md-4" id="box">
	<h3>Add PTJ </h3><p>Register new PTJ.</p><hr>
	<form class="form-horizontal" name="form" method="post" action="">
	<input type="hidden" name="new" value="1" />
	<!--<form class="form-horizontal" name="form" action="" method="post" id="contact_form">-->
        <fieldset>
        <!-- Text input-->
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-building"></i></span>                          
                    <input name="ptj_name" id="ptj_name" placeholder="PTJ Name" class="form-control" type="text" required>
                    </div>                        
                </div>
            </div>
			
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-compressed"></i></span>                          
                    <input name="ptj_acro" id="ptj_acro" placeholder="PTJ Acro" class="form-control" type="text" required>
                    </div>                        
                </div>
            </div>
<!--
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"></i></span>                        
                    <input name="ptj_code" id="ptj_code" placeholder="PTJ Code iD" class="form-control" type="text">                          
                    </div>
                </div>
            </div>
-->
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>                        
                    <input name="ptj_pic" id="ptj_pic" placeholder="PTJ Person In Charge" class="form-control" type="text">                          
                    </div>
                </div>
            </div>
			
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input name="ptj_pic_contact" id="ptj_pic_contact" placeholder="Person In Charge Mobile" class="form-control" type="text">                          
                    </div>
                </div>
            </div>

            <div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input name="ptj_pic_email" id="ptj_pic_contact" placeholder="Person In Charge Email" class="form-control" type="text">                          
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
ptjView();
include 'inc/footer.php';
?>