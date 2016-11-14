<?php
/*
@Title 		: Parcel Management System
@Filename 	: query.php
@Author		: Fit3
@date		: 13-11-16

*/
session_start();
include 'inc/function.php';
auth();
con2db();
pageTitle("Parcel Query Data");
include 'inc/header.php';
?>

	<div class="col-md-offset-4 col-md-4" id="box">
	<h3>Add PTJ </h3><hr>
	<form class="form-horizontal" name="form" method="post" action="">
	<input type="hidden" name="new" value="1" />
	<!--<form class="form-horizontal" name="form" action="" method="post" id="contact_form">-->
        <fieldset>
        <!-- Text input-->
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>                          
                    <input name="ptj_name" id="ptj_name" placeholder="PTJ Name" class="form-control" type="text" required>
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

