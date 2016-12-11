<?php
/*
@Title 		: Parcel Management System
@Filename 	: update_ptj.php
@Author		: Fit3
@date		: 13-11-16

*/
session_start();

include 'inc/function.php';
//auth();
debugScript();

con2db();
pageTitle("Update PTJ Data");
include 'inc/header.php';
$id = $_REQUEST['id'];
$query =  mysql_query("SELECT  * FROM `ptj` WHERE id=$id") or die (mysql_query());
$test = mysql_fetch_array($query);//will show 1st data only
$ptj_name = $test['ptj_name'];
$ptj_acro = $test['ptj_acro'];
$ptj_code = $test['ptj_code'];
$result = ptjUpdate();
?>
<div class="col-md-offset-4 col-md-4" id="box">
    <h3>Update PTJ</h3><hr>                  
	<form class="form-horizontal" name="form" method="post" action="">
	<input type="hidden" name="new" value="1" />
    <fieldset>
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>                          
                    <input name="ptj_name" id="ptj_name" placeholder="PTJ Name" value="<?php echo $ptj_name; ?>" class="form-control" type="text" required>
                    </div>                        
                </div>
			</div>
			
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-compressed"></i></span>                          
                    <input name="ptj_acro" id="ptj_acro" placeholder="PTJ Acro" value="<?php echo $ptj_acro; ?>" class="form-control" type="text" required>
                    </div>                        
                </div>
			</div>

			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"></i></span>                        
                    <input name="ptj_code" id="ptj_code" placeholder="PTJ Code iD" value="<?php echo $ptj_code; ?>" class="form-control" type="text">                          
                    </div>
                </div>
            </div>
			
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
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                    <input name="ptj_pic_contact" id="ptj_pic_contact" placeholder="Person In Charge Mobile" class="form-control" type="text">                          
                    </div>
                </div>
            </div>

			
			<div class="form-group">                       
				

				<div class="col-md-12">

				<!--<button type="button" class="btn btn-danger" ><a href="/ptj.php" onclick="window.location='ptj.php'">CANCEL</button>-->
					<p>
					<input class="btn btn-warning" name="submit" type="submit" value="Update"> 				<input type="button" class="btn btn-danger" name="Cancel" value="Cancel"  onclick="window.location='ptj.php'" />	</p>



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
<div class="row spacer"></div>
<div class="row spacer"></div>
<div class="row spacer"></div>


<?php
include 'inc/footer.php';
?>