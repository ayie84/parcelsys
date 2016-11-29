<?php
/*
@Title 		: Parcel Management System
@Filename 	: Function.php
@Author		: Fit3
@date		: 13-11-16

*/

//session_start();
include 'config/database.php';

//Connection File

function debugScript()
{
	ini_set('display_errors', 0);
	error_reporting(E_ERROR | E_WARNING | E_PARSE); 
}

function auth()
{
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: 403.php");
		exit();
	}
}

function pageTitle($title)
{
	if(!empty($title)){
	echo '<title>'.$title.'</title>';
	}
	//echo 'this function is RUNNING.. :)';
}

//bootstrap navigantion Bar
function navbar()
{
/*echo '<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-envelope"></span> parcel@Mail</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="picker.php">Home</a></li>
      <!--<li class="active"><a href="home.php">Home</a></li>-->
      <li><a href="parcel.php">Parcel</a></li>
      <li><a href="courier.php">Courier</a></li>
      <li><a href="ptj.php">PTJ</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
        <li><a><form class="form-inline float-xs-right" method="get" action="result.php">
    <input name="query" class="form-control" type="text" placeholder="Tracking Number">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form></a></li>
    </ul>
	
  </div>
</nav>';*/

echo '
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-envelope"></span> parcel@Mail</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="parcel.php">Parcel</a></li>
        <li><a href="courier.php">Courier</a></li>
        <li><a href="ptj.php">PTJ</a></li>
  
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Query <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">By Date</a></li>
            <li><a href="#">By Tracking Number</a></li>
            <li><a href="#">By PTJ</a></li>
            <li><a href="tableresponsive.php">table</a></li>
          </ul>
        </li>

		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php?logout">Logout</a></li>
         </ul>
        </li>

      </ul>
      <form class="navbar-form navbar-right" method="get" action="result.php">
        <div class="form-group">
          <input name="query" type="text" class="form-control" placeholder="QuickTrack">
        <button type="submit" class="btn btn-outline-success">Search</button></div>
      </form>
      <!--
	  <form class="form-inline float-xs-right" method="get" action="result.php">
    <input name="query" class="form-control" type="text" placeholder="Tracking Number">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
	  <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>-->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
';
	
}

function ptjDropMenu()
{
	con2db();
	$query="SELECT * FROM ptj"; 
	$result = mysql_query ($query);
	echo '<div class="form-group"><div class="col-md-12"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>';
	echo "<select name='ptj' id='ptj' class='form-control'>";
	echo '<option value=".." selected>Please Select PTJ</option>';
   		while($nt=mysql_fetch_array($result))
	#
	{//Array or records stored in $nt
		echo "<option value='$nt[ptj_name]'>$nt[ptj_name]</option>";
	}
    echo '</select></div></div></div>';
}

function courierDropMenu()
{
	con2db();
	$query="SELECT * FROM courier"; 
	$result = mysql_query ($query);
	echo '<div class="form-group"><div class="col-md-12"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>';
	
	echo "<select name='courier' id='courier' class='form-control'>";
	echo '<option value=".." selected>Please Select Courier</option>';
   		while($nt=mysql_fetch_array($result))
	#
	{//Array or records stored in $nt
		echo "<option value='$nt[courier_name]'>$nt[courier_name]</option>";
	}
    echo '</select></div></div></div>';
}

function parcelReg()
{
	
	con2db();
	if(isset($_POST['new']) && $_POST['new']==1)
	{
	
	//$trn_date = date("Y-m-d H:i:s");
	$parcel_cnumber =$_REQUEST['parcel_cnumber'];
	$parcel_rcpt_name = $_REQUEST['parcel_rcpt_name'];
	$parcel_ptj = $_REQUEST['ptj'];
	$parcel_courier = $_REQUEST['courier'];
	$parcel_takenby = $_REQUEST['parcel_takenby'];
	$ins_query="insert into parcel(`parcel_cnumber`,`parcel_rcpt_name`,`parcel_ptj`,`parcel_courier`,`parcel_takenby`)values('$parcel_cnumber','$parcel_rcpt_name','$parcel_ptj','$parcel_courier','$parcel_takenby')";
	mysql_query($ins_query) or die(mysql_error());
	if ($error == false) {
		$result='<div class="alert alert-success vertical-center">'.$parcel_cnumber.' Successful!!</div>';
		}else {
		$result='<div class="alert alert-danger">OOPPSSS Something Wrong there, Please Try Again. TQ</div>';
		}
	}
	return $result;
}


function parcelUpdate()
{
	
	con2db();
	if(isset($_POST['new']) && $_POST['new']==1)
	{
	$id = $_REQUEST['id'];
	$parcel_courier = $_REQUEST['parcel_courier'];
	$parcel_cnumber = $_REQUEST['parcel_cnumber'];
	$parcel_rcpt_name = $_REQUEST['parcel_rcpt_name'];
	$parcel_ptj = $_REQUEST['parcel_ptj'];
	$parcel_takenby = $_REQUEST['parcel_takenby'];
				
	mysql_query("UPDATE parcel SET 
	parcel_courier = '$parcel_courier', 
	parcel_cnumber='$parcel_cnumber',
	parcel_rcpt_name='$parcel_rcpt_name', 
	parcel_ptj = '$parcel_ptj', 
	parcel_takenby = '$parcel_takenby' 
	WHERE id = '$id'")or die(mysql_error());
	if ($error == false) {
		
		$result='<div class="alert alert-success vertical-center">'.$parcel_cnumber.' UPDATE Successful!!</div> <meta http-equiv=Refresh content=1;url=parcel.php>';
		}else {
		$result='<div class="alert alert-danger">OOPPSSS Something Wrong there, Please Try Again. TQ</div>';
	}
	return $result;
	}
}

function parcelDel()
{
	$id = $_REQUEST['id'];

	$query =  mysql_query("DELETE  FROM parcel WHERE id=$id") or die (mysql_query());
	echo "<meta http-equiv=Refresh content=0;url=parcel.php>";
}

function courierReg()
{
	con2db();
	if(isset($_POST['new']) && $_POST['new']==1)
	{
	
	//$trn_date = date("Y-m-d H:i:s");
	$courier_name =$_REQUEST['courier_name'];
	$courier_address = $_REQUEST['courier_address'];
	$courier_contact_no = $_REQUEST['courier_contact_no'];
	$courier_fax_no = $_REQUEST['courier_fax_no'];
	//$class_ses = $_REQUEST['cses'];
	$ins_query="insert into courier(`courier_name`,`courier_address`,`courier_contact_no`,`courier_fax_no`)values('$courier_name','$courier_address','$courier_contact_no','$courier_fax_no')";
	mysql_query($ins_query) or die(mysql_error());
	if ($error == false) {
		$result='<div class="alert alert-success vertical-center">'.$courier_name.' Successful!!</div>';
		}else {
		$result='<div class="alert alert-danger">OOPPSSS Something Wrong there, Please Try Again. TQ</div>';
		}
	}
	return $result;
	
}

function courierUpdate()
{
	$status = 0;
	con2db();
	if(isset($_POST['new']) && $_POST['new']==1)
	{
	
	$id = $_REQUEST['id'];
	$courier_name = $_REQUEST['courier_name'];
	$courier_address = $_REQUEST['courier_address'];
	$courier_contact_no = $_REQUEST['courier_contact_no'];
	$courier_fax_no = $_REQUEST['courier_fax_no'];
				
				
	mysql_query("UPDATE courier SET courier_name = '$courier_name', courier_address='$courier_address', courier_contact_no='$courier_contact_no', courier_fax_no='$courier_fax_no' WHERE id = '$id'")or die(mysql_error());

	if ($error == false) {
		$result='<div class="alert alert-success vertical-center">'.$courier_name.' UPDATE Successful!!</div> <meta http-equiv=Refresh content=1;url=courier.php>';
		}else {
		$result='<div class="alert alert-danger">OOPPSSS Something Wrong there, Please Try Again. TQ</div>';
		}
	}
	//echo "";
	return $result;
}

function courierDel()
{
	$id = $_REQUEST['id'];

	$query =  mysql_query("DELETE  FROM courier WHERE id=$id") or die (mysql_query());
	echo "<meta http-equiv=Refresh content=0;url=courier.php>";
}

function ptjReg()
{
	con2db();
	if(isset($_POST['new']) && $_POST['new']==1)
	{
	$ptj_name =$_REQUEST['ptj_name'];
	$ptj_acro = $_REQUEST['ptj_acro'];
	$ptj_code = $_REQUEST['ptj_code'];
	$ins_query="insert into ptj(`ptj_name`,`ptj_acro`,`ptj_code`)values('$ptj_name','$ptj_acro','$ptj_code')";
	mysql_query($ins_query) or die(mysql_error());
	if ($error == false) {
		$result='<div class="alert alert-success vertical-center">'.$ptj_name.' Successful!!</div>';
		}else {
		$result='<div class="alert alert-danger">OOPPSSS Something Wrong there, Please Try Again. TQ</div>';
		}
	}
	return $result;
}


function ptjUpdate()
{
	$status = 0;
	con2db();
	if(isset($_POST['new']) && $_POST['new']==1)
	{
	
	$id = $_REQUEST['id'];
	$ptj_name = $_REQUEST['ptj_name'];
	$ptj_acro = $_REQUEST['ptj_acro'];
	$ptj_code = $_REQUEST['ptj_code'];
	
				
				
	mysql_query("UPDATE ptj SET ptj_name = '$ptj_name', ptj_acro = '$ptj_acro', ptj_code='$ptj_code' WHERE id = '$id'")or die(mysql_error());

	if ($error == false) {
		$result='<div class="alert alert-success vertical-center">'.$ptj_name.' UPDATE Successful!!</div> <meta http-equiv=Refresh content=1;url=ptj.php>';
		}else {
		$result='<div class="alert alert-danger">OOPPSSS Something Wrong there, Please Try Again. TQ</div>';
		}
	}
	//echo "";
	return $result;
}

function ptjDel()
{
	$id = $_REQUEST['id'];

	$query =  mysql_query("DELETE  FROM ptj WHERE id=$id") or die (mysql_query());
	echo "<meta http-equiv=Refresh content=0;url=ptj.php>";
}
function ptjGetDropMenu()
{
	con2db();

	echo '<div class="form-group"><div class="col-md-12"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>';
	$id = $_REQUEST['id'];
	$query =  mysql_query("SELECT  * FROM `parcel` WHERE id=$id") or die (mysql_query());
	$test = mysql_fetch_array($query);//will show 1st data only
	$ptj_db = $test['parcel_ptj'];
	echo "<select name='parcel_ptj' id='parcel_ptj' class='form-control'>";
	echo '<option><center>'.$ptj_db.'</center></option>';
	$query="SELECT * FROM ptj"; 
	$result = mysql_query ($query);
	while($select=mysql_fetch_array($result))
	{//Array or records stored in $nt
		$aPtj = $select['ptj_name'];
		//echo $aCourse;
		if($ptj_db == $aPtj)
		{
			//blank for selected course
		}
		else
		{
			echo "<option value='$select[ptj_name]'>$select[ptj_name]</option>";
		}
		
	}
	echo "</select></div>";// Closing of list box 
}

function courierGetDropMenu()
{
	con2db();

	echo '<div class="form-group"><div class="col-md-12"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>';
	$id = $_REQUEST['id'];
	$query =  mysql_query("SELECT  * FROM `parcel` WHERE id=$id") or die (mysql_query());
	$test = mysql_fetch_array($query);//will show 1st data only
	$courier_db = $test['parcel_courier'];
	echo "<select name='parcel_courier' id='parcel_courier' class='form-control'>";
	echo '<option><center>'.$courier_db.'</center></option>';
	$query="SELECT * FROM courier"; 
	$result = mysql_query ($query);
	while($select=mysql_fetch_array($result))
	{//Array or records stored in $nt
		$aCourier = $select['courier_name'];
		//echo $aCourse;
		if($courier_db == $aCourier)
		{
			//blank for selected course
		}
		else
		{
			echo "<option value='$select[courier_name]'>$select[courier_name]</option>";
		}
		
	}
	echo "</select></div>";// Closing of list box 
}

function parcelView()
{

	date_default_timezone_set("Asia/Kuala_Lumpur");
    //echo date('d-m-Y H:i:s'); //Returns IST
   // echo date('Y-m-d H:i:s'); //Returns IST
	$tableTitle = 'Received Parcel Today';
	$today = date("Y-m-d H:i:s");

	
	$timestamp = $today;
	$splitTimeStamp = explode(" ",$timestamp);
	$date = $splitTimeStamp[0];
	$time = $splitTimeStamp[1];
	
	con2db();//db connect
	$value = mysql_query("SELECT COUNT( * ) AS Value FROM  `parcel` where `parcel_timestamp` LIKE '%".$date."%'") or die (mysql_query());
	//$value = mysql_query("SELECT COUNT( * ) AS Value FROM  `parcel` where `parcel_timestamp` LIKE '%".$date."%'") or die (mysql_query());
	$num_rows = mysql_fetch_array($value);
	$val = $num_rows['Value'];
	if($val>0)
		{
			$cnt = 1;
			$limit = 10;  
			if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
			$start_from = ($page-1) * $limit; 
			$query =  mysql_query("SELECT  * FROM `parcel` WHERE `parcel_timestamp` LIKE '%".$date."%' ORDER BY id DESC LIMIT $start_from, $limit") or die (mysql_query());
			echo '<div class="col-md-offset-2 col-md-8 row spacer"></div>';
			echo '<div class="col-md-offset-2 col-md-8 row spacer" >';
			echo '<h3 class="sub-header">'.$tableTitle.' - '.$date.'</h3></div>';
			
			echo '
			<div class="col col-xs-10 text-right">
			<button type="button" class="btn btn-warning pull-right">View Report</button>
			</div>
			<div class="table-responsive col-md-offset-2 col-md-8 row spacer">
			<table class="table table-striped table-bordered table-list" style="word-wrap: break-word;">
			<thead>
			  <tr>
				<th class="text-center">Tracking Number</th>
				<th class="text-center">Courier</th>
				<th class="text-center">PTJ</th>
				<th class="text-center">Taken By</th>
				<th style="width:15%" class="text-center"><em class="glyphicon glyphicon-cog"></em></th>
				</tr> 
			</thead>
			<tbody>
			';
			//$query01 =  mysql_query("SELECT  * FROM `parcel` ORDER BY id ASC") or die (mysql_query());
			while($test = mysql_fetch_array($query))//loop process
				{
					$id = $test['id'];
					$_SESSION['id'] = $id;

					echo '<tr><td>'. $test['parcel_cnumber'].'</td>';
					echo '<td>'. $test['parcel_courier'].'</td>';
					echo '<td>'. $test['parcel_ptj'].'</td>';
					echo '<td>'. $test['parcel_takenby'].'</td>';
					echo '<td align="center">
					<a href="update_parcel.php?id='.$id.'" class="btn btn-default" onclick="javascript:return confirm(\'Are you sure to UPDATE '.$test['parcel_cnumber'].'?\')"><em class="glyphicon glyphicon-pencil"></em></a>
					<a href="delete_parcel.php?id='.$id.'" class="btn btn-danger" onclick="javascript:return confirm(\'Are You Sure to REMOVE '.$test['parcel_cnumber'].'?\')"><em class="glyphicon glyphicon-trash"></em></a>
					</td>';
					echo '</tr>';
					$cnt++;
			
				}
			echo '</tbody></table></div>';

			$sql = "SELECT COUNT(id) FROM parcel WHERE `parcel_timestamp` LIKE '%".$date."%'";  
			$rs_result = mysql_query($sql);  
			$row = mysql_fetch_row($rs_result);  
			$total_records = $row[0];  
			$total_pages = ceil($total_records / $limit);
			?>
			<div class="col-md-offset-3	 col-md-9 row spacer">
			<ul class="pagination navbar-right margin-right=10px">
			<?php 
			for ($i=1; $i<=$total_pages; $i++) {
			echo '<li><a href="parcel.php?page='.$i.'">'.$i.'</a></li>';
			};?>
		    </ul></div>
		<?php	
		}
		else
		{ //jika tiada data pada table, echo this..
			echo '<div class="col-md-offset-2 col-md-8 row spacer"></div>';
			echo '<div class="col-md-offset-2 col-md-8 row spacer" >';
			echo '<h3 class="sub-header">'.$tableTitle.' - '.$date.'</h3></div>';
			
			echo '
			<div class="col col-xs-10 text-right">
			<button type="button" class="btn btn-warning pull-right">View Report</button>
			</div>
			<div class="table-responsive col-md-offset-2 col-md-8 row spacer">
			<table class="table table-striped table-bordered table-list" style="word-wrap: break-word;">
			<thead>
			  <tr>
				<th class="text-center">Tracking Number</th>
				<th class="text-center">Courier</th>
				<th class="text-center">PTJ</th>
				<th class="text-center">Taken By</th>
				<th style="width:15%" class="text-center"><em class="glyphicon glyphicon-cog"></em></th>
				</tr> 
			</thead>
			<tbody><tr><td colspan=5>
			';
			echo '
			<center>Sorry No Record found for Parcel Today.</center></td></tr></tbody></table></div>';
		}
}

function courierView()
{
	
	con2db();//db connect
	$tableTitle = 'Courier List';
	$value = mysql_query("SELECT COUNT( * ) AS Value FROM  `courier`") or die (mysql_query());
	$num_rows = mysql_fetch_array($value);
	$val = $num_rows['Value'];
	if($val>0)
	{
		$limit = 10;  
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
		$start_from = ($page-1) * $limit; 
		$query =  mysql_query("SELECT  * FROM `courier` ORDER BY id DESC LIMIT $start_from, $limit") or die (mysql_query());
		
		echo '<div class="col-md-offset-2 col-md-8 row spacer"></div>';
		echo '<div class="col-md-offset-2 col-md-8 row spacer" >';
		echo '<h3 class="sub-header">'.$tableTitle.'</h3></div>';
		echo '
		<div class="col col-xs-10 text-right">
			<button type="button" class="btn btn-warning pull-right">View Report</button>
			</div>
		<div class="table-responsive col-md-offset-2 col-md-8 row spacer">
		<table class="table table-striped table-bordered table-list" style="word-wrap: break-word;">
        <thead>
			<tr>
				<th class="text-center">Courier</th>
				<th class="text-center">Contact Number</th>
				<th class="text-center">Fax Number</th>
				<th style="width:15%"><em class="glyphicon glyphicon-cog"></em></th>
			</tr> 
        </thead>
        <tbody>
		';
		while($test = mysql_fetch_array($query))//loop process
				{
					$id = $test['id'];
					$_SESSION['id'] = $id;
					
					echo '<tr><td>'. $test['courier_name'].'</td>';
					echo '<td>'. $test['courier_contact_no'].'</td>';
					echo '<td>'. $test['courier_fax_no'].'</td>';
					echo '<td align="center">
					<a href="update_courier.php?id='.$id.'" class="btn btn-default" onclick="javascript:return confirm(\'Are you sure to UPDATE '.$test['courier_name'].'?\')"><em class="glyphicon glyphicon-pencil"></em></a>
					<a href="delete_courier.php?id='.$id.'" class="btn btn-danger" onclick="javascript:return confirm(\'Are You Sure to REMOVE '.$test['courier_name'].'?\')"><em class="glyphicon glyphicon-trash"></em></a>
					</td>';
					echo '</tr>';
			
		}
		
		echo '</tbody></table></div>';
		$sql = "SELECT COUNT(id) FROM courier";  
			$rs_result = mysql_query($sql);  
			$row = mysql_fetch_row($rs_result);  
			$total_records = $row[0];  
			$total_pages = ceil($total_records / $limit);
			?>
			<div class="col-md-offset-3	 col-md-8 row spacer">
			<ul class="pagination navbar-right margin-right=10px">

			<?php 
			
			
			for ($i=1; $i<=$total_pages; $i++) {
				
			echo '<li><a href="courier.php?page='.$i.'">'.$i.'</a></li>';
			};
			?>

		  </ul></div><?php
	}
	else
	{ //jika tiada data pada table, echo this..
		echo '<div class="col-md-offset-2 col-md-8 row spacer"></div>';
			echo '<div class="col-md-offset-2 col-md-8 row spacer" >';
			echo '<h3 class="sub-header">'.$tableTitle.'</h3></div>';
			
			echo '
			<div class="col col-xs-10 text-right">
			<button type="button" class="btn btn-warning pull-right">View Report</button>
			</div>
			<div class="table-responsive col-md-offset-2 col-md-8 row spacer">
			<table class="table table-striped table-bordered table-list" style="word-wrap: break-word;">
			<thead>
			  <tr>
				<th class="text-center">Courier</th>
				<th class="text-center">Contact Number</th>
				<th class="text-center">Fax Number</th>
				<th style="width:15%"><em class="glyphicon glyphicon-cog"></em></th>
			</tr> 
			</thead>
			<tbody><tr><td colspan=4>
			';
			echo '
			<center>Sorry No Record found for Courier.</center></td></tr></tbody></table></div>';
	}
}

function ptjView()
{
	con2db();//db connect
	$tableTitle = "PTJ List";
	$value = mysql_query("SELECT COUNT( * ) AS Value FROM  `ptj`") or die (mysql_query());
	$num_rows = mysql_fetch_array($value);
	$val = $num_rows['Value'];
	if($val>0)
		{
			$cnt = 1;
			$limit = 25;  
			if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
			$start_from = ($page-1) * $limit; 
			$query =  mysql_query("SELECT  * FROM `ptj` ORDER BY id DESC LIMIT $start_from, $limit") or die (mysql_query());
			echo '<div class="col-md-offset-2 col-md-8 row spacer"></div>';
			echo '<div class="col-md-offset-2 col-md-8 row spacer" >';
			echo '<h3 class="sub-header">'.$tableTitle.'</h3></div>';
			echo '
			<div class="col col-xs-10 text-right">
				<button type="button" class="btn btn-warning pull-right">View Report</button>
				</div>
			<div class="table-responsive col-md-offset-2 col-md-8 row spacer">
			<table class="table table-striped table-bordered table-list" style="word-wrap: break-word;">
			<thead>
			  <tr>
				<th class="text-center">Courier</th>
				<th class="text-center">Contact Number</th>
				<th style="width:15%" class="text-center"><em class="glyphicon glyphicon-cog"></em></th>
				</tr> 
			</thead>
			<tbody>
			';
			//$query01 =  mysql_query("SELECT  * FROM `parcel` ORDER BY id ASC") or die (mysql_query());
			while($test = mysql_fetch_array($query))//loop process
				{
					$id = $test['id'];
					$_SESSION['id'] = $id;

					echo '<tr><td>'. $test['ptj_name'].'</td>';
					echo '<td>'. $test['ptj_acro'].'</td>';
					echo '<td align="center">
					<a href="update_ptj.php?id='.$id.'" class="btn btn-default" onclick="javascript:return confirm(\'Are you sure to UPDATE '.$test['ptj_name'].'?\')"><em class="glyphicon glyphicon-pencil"></em></a>
					<a href="delete_ptj.php?id='.$id.'" class="btn btn-danger" onclick="javascript:return confirm(\'Are You Sure to REMOVE '.$test['ptj_name'].'?\')"><em class="glyphicon glyphicon-trash"></em></a>
					</td>';
					echo '</tr>';
					$cnt++;
			
				}
			echo '</tbody></table></div>';

			$sql = "SELECT COUNT(id) FROM ptj";  
			$rs_result = mysql_query($sql);  
			$row = mysql_fetch_row($rs_result);  
			$total_records = $row[0];  
			$total_pages = ceil($total_records / $limit);
			?>
			<div class="col-md-offset-3	 col-md-8 row spacer">
			<ul class="pagination navbar-right margin-right=10px">
			<?php 
			for ($i=1; $i<=$total_pages; $i++) {
			echo '<li><a href="ptj.php?page='.$i.'">'.$i.'</a></li>';
			};?>
		    </ul></div>
		<?php	
		}
		else
		{ //jika tiada data pada table, echo this..
			echo '<div class="col-md-offset-2 col-md-8 row spacer"></div>';
			echo '<div class="col-md-offset-2 col-md-8 row spacer" >';
			echo '<h3 class="sub-header">'.$tableTitle.'</h3></div>';
			
			echo '
			<div class="col col-xs-10 text-right">
			<button type="button" class="btn btn-warning pull-right">View Report</button>
			</div>
			<div class="table-responsive col-md-offset-2 col-md-8 row spacer">
			<table class="table table-striped table-bordered table-list" style="word-wrap: break-word;">
			<thead>
			  <tr>
				<th class="text-center">Courier</th>
				<th class="text-center">Contact Number</th>
				<th style="width:15%" class="text-center"><em class="glyphicon glyphicon-cog"></em></th>
				</tr> 
			</thead>
			<tbody><tr><td colspan=3>
			';
			echo '
			<center>Sorry No Record found for PTJ.</center></td></tr></tbody></table></div>';
		}
}

function track()
{
	con2db();
	$query = $_GET['query']; 
     
    $min_length = 6;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection

        $raw_results = mysql_query("SELECT * FROM parcel WHERE (`parcel_cnumber` LIKE '%".$query."%') OR (`parcel_courier` LIKE '%".$query."%')") or die(mysql_error());
		
		
		echo '<div class="col-md-offset-2 col-md-8 row spacer"></div>';
			echo '<div class="col-md-offset-2 col-md-8 row spacer" >';
			echo '<h3 class="sub-header">Received Parcel Today</h3></div>';
			
			echo '
			<div class="col col-xs-10 text-right">
			<button type="button" class="btn btn-warning pull-right">View Report</button>
			</div>
			<div class="table-responsive col-md-offset-2 col-md-8 row spacer">
			<table class="table table-striped table-bordered table-list" style="word-wrap: break-word;">
			<thead>
			  <tr>
				<th class="text-center">Tracking Number</th>
				<th class="text-center">Courier</th>
				<th class="text-center">Taken By</th>
				<th class="text-center">Received Date</th>
				<th class="text-center">Received Time</th>
				<!--<th style="width:15%" class="text-center"><em class="glyphicon glyphicon-cog"></em></th>-->
				</tr> 
			</thead>
			<tbody>
			';
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
			$id = $results['id'];
			$parcel_cnumber = $results['parcel_cnumber'];
			$receive = $results['parcel_timestamp'];
			$_SESSION['id'] = $id;
			
			$timestamp = $results['parcel_timestamp'];
			$splitTimeStamp = explode(" ",$timestamp);
			$date = $splitTimeStamp[0];
			$time = $splitTimeStamp[1];
			
			echo '
			<tr>
				<td>'.$results['parcel_cnumber'].'</td>
				<td>'.$results['parcel_courier'].'</td>
				<td>'.$results['parcel_cnumber'].'</td>
				<td>'.$date.'</td>
				<td>'.$time.'</td>
			</tr>
			';
            }
            echo '</tbody></table></div>';
        }
        else{ // if there is no matching rows do following
            
			echo "<tr><td colspan='5'><center>Maaf, Tiada Rekod ".$query." Di Temui</center></td></tr>";
			echo '</tbody></table></div>';
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    } 
	echo '</tbody></table></div>';
}



function parcelReportToday()
{
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$today = date("Y-m-d H:i:s");
	//echo $today;
	$timestamp = $today;
	$splitTimeStamp = explode(" ",$timestamp);
	$date = $splitTimeStamp[0];
	$time = $splitTimeStamp[1];
	
	con2db();
	
	$value = mysql_query("SELECT COUNT( * ) AS Value FROM  `parcel`") or die (mysql_query());
	$num_rows = mysql_fetch_array($value);
	$val = $num_rows['Value'];
	if($val>0)
	{
	$names = array();
	//$query = mysql_query("SELECT * FROM parcel");
	$query =  mysql_query("SELECT  * FROM `parcel`  where `parcel_timestamp` LIKE '%".$date."%' ORDER BY `parcel_courier` ASC ") or die (mysql_query());
			echo '
			
			<div class="row">
			<div class="col-md-offset-2	 col-md-8 row spacer">
			<div class="panel panel-default panel-table row spacer"  id="box">
			<div class="panel-heading">
			<div class="row">
			<div class="col col-xs-6" >
			<h3 class="panel-title">Parcel List For Today [ '.$date.' ]</h3>
			</div>
			<div class="col col-xs-6 text-right">
			<button type="button" class="btn btn-warning pull-right">View Report</button>
			</div></div></div>
			<div class="panel-body">
			<table class="table table-striped table-bordered table-list">
			<thead>
			<tr>
			
			<th style="width:25%">Courier</th>
			<th>Tracking Number</th>
			<th>Receipent</th>
			
			</tr> 
			</thead>
			<tbody>
			';
	while($fetch =mysql_fetch_array($query)) 
	{
	$name = $fetch['parcel_courier'];
	$tracking = $fetch['parcel_cnumber'];

		if (!in_array($name,$names))
		{
		//echo "$name</br>"; 
		$names[] = $name;
		$trackings[] = $tracking;
		
		echo '<tr><td><strong>'. $name.'</strong></td><td></td><td></td></tr>';
					
		}
		
		echo '<tr><td></td><td>'. $fetch['parcel_cnumber'].'</td><td>'. $fetch['parcel_rcpt_name'].'</td></tr>';
		//echo $tracking.'</br>';
	}
	echo '</tbody></table></div></div></div></div>';
	}
		else
		{ //jika tiada data pada table, echo this..
			//echo '<center>Sorry No Record found for PTJ.</center>';
			echo '
			
			<div class="row">
			<div class="col-md-offset-2	 col-md-8 row spacer">
			<div class="panel panel-default panel-table row spacer"  id="box">
			<div class="panel-heading">
			<div class="row">
			<div class="col col-xs-6" >
			<h3 class="panel-title">Parcel List For Today [ '.$date.' ]</h3>
			</div>
			<div class="col col-xs-6 text-right">
			<button type="button" class="btn btn-warning pull-right">View Report</button>
			</div></div></div>
			<div class="panel-body">
			<table class="table table-striped table-bordered table-list">
			<thead>
			<tr>
			
			<th style="width:25%">Courier</th>
			<th>Tracking Number</th>
			<th>Receipent</th>
			
			</tr> 
			</thead>
			<tbody>
			<tr><td colspan="2" align="center">No Record Found</td><td></td></tr>';
		}
}
?>