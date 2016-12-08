<?php
/*
@Title 		: Parcel Management System
@Filename 	: update_parcel.php
@Author		: Fit3
@date		: 13-11-16

*/
session_start();

include 'inc/function.php';
//auth();
debugScript(); //comment this line for debug error msg

con2db();
pageTitle("Update Parcel Data");
include 'inc/header.php';
$id = $_REQUEST['id'];
$query =  mysql_query("SELECT  * FROM `parcel` WHERE id=$id") or die (mysql_query());
$test = mysql_fetch_array($query);//will show 1st data only
$parcel_cnumber = $test['parcel_cnumber'];
$parcel_rcpt_name = $test['parcel_rcpt_name'];
$parcel_takenby = $test['parcel_takenby'];
$parcel_remark = $test['parcel_remark'];

echo 'rcpt'.$parcel_rcpt_name;

$result = parcelUpdate();
?>
<div class="col-md-offset-4 col-md-4" id="box">
    <h3>Update Parcel</h3><hr>                  
	<form class="form-horizontal" name="form" method="post" action="">
	<input type="hidden" name="new" value="1" />
    <fieldset>
	<div class="form-group">
	<div class="col-md-12">
		<div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
            <input name="parcel_cnumber" id="parcel_cnumber" value="<?php echo $parcel_cnumber; ?>" class="form-control" type="text" required>
        </div>
    </div>
    </div>
    
	<div class="form-group">
	<div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="parcel_rcpt_name" value="<?php echo $parcel_rcpt_name; ?>" class="form-control" type="text">
        </div>
    </div>
    </div>
	
	<div class="form-group">
    <div class="col-md-12">
        <?php ptjGetDropMenu(); ?>
    </div>
    </div>
										
	<div class="form-group">
    <div class="col-md-12">
        <?php courierGetDropMenu(); ?>
    </div>
    </div>
	<!--
	<div class="form-group">
	<div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span>
            <input name="parcel_takenby" placeholder="Taken By" value="<?php echo $parcel_takenby; ?>" class="form-control" type="text">
        </div>
    </div>
    </div>
	-->
	<?php
	$query =  mysql_query("SELECT  * FROM `ptj` ") or die (mysql_query());
	?>
	<div class="form-group">
	<div class="col-md-12">
    <div class="input-group">                    
        <span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span>                        
        <!--<input name="parcel_takenby" placeholder="Taken By" class="form-control" type="text">-->
		<input name="parcel_takenby" type="text" list="categoryname" autocomplete="off" id="pcategory" class="form-control" value="<?php echo $parcel_takenby; ?>">
			<datalist id="categoryname">
			<?php while($row = mysql_fetch_array($query)) { ?>
				<option value="<?php echo $row['ptj_pic']; ?>"><?php echo $row['ptj_pic'].'-'.$row['ptj_acro']; ?></option> 
			<?php } ?>
			</datalist>                    
    </div>
    </div>
    </div>


           <div class="form-group">
                <div class="col-md-12">
                    <div class="input-group">                    
                    <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                    <textarea name="parcel_remark" placeholder="Remark" class="form-control"><?php echo $parcel_remark; ?></textarea>
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
		<input class="btn btn-warning pull-right" name="submit" type="submit" value="UPDATE">
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