<?php
/*
@Title 		: Parcel Management System
@Filename 	: update_courier.php
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
debugScript();

con2db();
pageTitle("Update Courier Data");
include 'inc/header.php';
$id = $_REQUEST['id'];
$query =  mysql_query("SELECT  * FROM `courier` WHERE id=$id") or die (mysql_query());
$test = mysql_fetch_array($query);//will show 1st data only
$courier_name = $test['courier_name'];
$courier_address = $test['courier_address'];
$courier_contact_no = $test['courier_contact_no'];
$courier_fax_no = $test['courier_fax_no'];
$courier_pic = $test['courier_pic'];
$result = courierUpdate();
?>

<div class="col-md-offset-4 col-md-4" id="box">
    <h3>Update Courier</h3><hr>                  
	<form class="form-horizontal" name="form" method="post" action="">
	<input type="hidden" name="new" value="1" />
    <fieldset>
	<div class="form-group">
	<div class="col-md-12">
		<div class="input-group">
            <span class="input-group-addon"><i class="fa fa-truck"></i></span>  
            <input name="courier_name" id="courier_name" placeholder="Courier Name" value="<?php echo $courier_name; ?>" class="form-control" type="text" required>
        </div>
    </div>
    </div>

	
	<div class="form-group">
	<div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <input name="courier_contact_no" placeholder="Contact Number" value="<?php echo $courier_contact_no; ?>" class="form-control" type="text">
        </div>
    </div>
    </div>
	
	<div class="form-group">
	<div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-fax"></i></span>
            <input name="courier_fax_no" placeholder="Fax Number" value="<?php echo $courier_fax_no; ?>" class="form-control" type="text">
        </div>
    </div>
    </div>



    <div class="form-group">
	<div class="col-md-12">
        <div class="input-group">                    
            <span class="input-group-addon"><i class="fa fa-address-book"></i></span> 
            <textarea class="form-control" rows="3" name="courier_address" placeholder="Address" ><?php echo $courier_address; ?></textarea>                       
        </div>
    </div>
    </div>
	

    <!--
	<div class="form-group">
	<div class="col-md-12">
        <div class="input-group">                    
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>                        
            <input name="courier_pic_staff" placeholder="Courier Staff" value="<?php echo $courier_pic_staff; ?>" class="form-control" type="text">                          
        </div>
    </div>
    </div>
    -->

	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<?php echo $result; ?>    
		</div>
	</div>

    <div class="form-group">
	<div class="col-md-12">

<p><input type="button" class="btn btn-danger" name="Cancel" value="Cancel"  onclick="javascript:history.back()" /> 
                    <input class="btn btn-warning" name="submit" type="submit" value="Update">                 </p>
    <!--
		<input class="btn btn-warning pull-right" name="submit" type="submit" value="UPDATE">

        -->
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