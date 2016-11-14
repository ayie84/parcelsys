<?php
/*
@Title 		: Parcel Management System
@Filename 	: courier.php
@Author		: Fit3
@date		: 13-11-16

*/
//session_start();
include 'inc/function.php';
//auth();
//include 'config/database.php';
debugScript();//comment this line to debug
//con2db();
pageTitle("Create New User");
include 'inc/headerIndex.php';

if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
?>
<div class="col-md-offset-4 col-md-4" id="box">
	<h3>Add Courier </h3><hr>
	<form class="form-horizontal" name="form" method="post" action="register-exec.php">
	<input type="hidden" name="new" value="1" />
	<!--<form class="form-horizontal" name="form" action="" method="post" id="contact_form">-->
        <fieldset>
        <!-- Text input-->
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>                          
                    <input name="fname" id="fname" placeholder="Fisrtname" class="form-control" type="text" required>
                    </div>                        
                </div>
            </div>

			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>                        
                    <input name="lname" id="lname" placeholder="Lastname" class="form-control" type="text">                          
                    </div>
                </div>
            </div>
			
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>                        
                    <input name="login" id="login" placeholder="Username" class="form-control" type="text">                          
                    </div>
                </div>
            </div>
			
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-print"></i></span>                        
                    <input name="password" id="password" placeholder="password" class="form-control" type="password">                          
                    </div>
                </div>
            </div>
			
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-print"></i></span>                        
                    <input name="cpassword" id="cpassword" placeholder="password" class="form-control" type="password">                          
                    </div>
                </div>
            </div>
			
			<div class="form-group">                       
				<div class="col-md-12">
				
					<input class="btn btn-warning pull-right" name="submit" type="submit" value="Submit">
				</div>
            </div>
			
            </fieldset>
			</form>
	</div>

<?php
include 'inc/footer.php';
?>