<?php
/*
@Title 		: Parcel Management System
@Filename 	: Parcel.php
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
debugScript(); //comment this line for debug error msg
con2db();
$result = parcelReg();
//title("it about Test");
pageTitle("Parcel Management System");
include 'inc/header.php';

?>
<div class="col-md-offset-4 col-md-4" id="box">
	   <h3>Parcel</h3><p>Register new parcel.</p><hr>
	<form class="form-horizontal" name="form" method="post" action="">
	<input type="hidden" name="new" value="1" />
	<!--<form class="form-horizontal" name="form" action="" method="post" id="contact_form">-->
        <fieldset>
        <!-- Text input-->
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>                          
                    <input name="parcel_cnumber" id="parcel_cnumber" placeholder="Tracking Number" class="form-control" type="text" required>
                    </div>                        
                </div>
            </div>


                <?php 	
					ptjDropMenu(); 
					courierDropMenu();
				?>

			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>                        
                    <input name="parcel_rcpt_name" placeholder="Receipent Name" class="form-control" type="text">                          
                    </div>
                </div>
            </div>				
			<!--<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span>                        
                    <input name="parcel_takenby" placeholder="Taken By" class="form-control" type="text">                          
                    </div>
                </div>
            </div>-->
			
			<?php
			
			$query =  mysql_query("SELECT  * FROM `ptj` ") or die (mysql_query());
			?>
			<div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span>                        
                    <!--<input name="parcel_takenby" placeholder="Taken By" class="form-control" type="text">-->
					<input name="parcel_takenby" placeholder="Taken By" type="text" list="categoryname" autocomplete="off" id="pcategory" class="form-control">
					<datalist id="categoryname">
					 <div style="width:400px;height:500px; overflow:scroll;">
					<?php while($row = mysql_fetch_array($query)) { ?>
						<option value="<?php echo $row['ptj_pic']; ?>"><?php echo $row['ptj_pic'].'-'.$row['ptj_acro']; ?></option>
					<?php } ?>
					 </div>
					</datalist>                    
                    </div>
                </div>
            </div>


            <div class="form-group">
				<div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
					<textarea name="parcel_remark" placeholder="Remark" class="form-control"></textarea>
                    </div>
                </div>
            </div>
						
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<?php echo $result; ?>    
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
parcelView();
include 'inc/footer.php';
?>