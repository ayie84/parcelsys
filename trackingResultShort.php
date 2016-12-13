<?php
/*
@Title 		: Parcel Management System
@Filename 	: Parcel.php
@Author		: Restu Lestari Resources
@date		: 13-11-16

*/

// Start Session
// Comment this line to off the authentication session	
	session_start();
		
		// if session is not set this will redirect to login page
		/* if( !isset($_SESSION['SESS_MEMBER_ID']) ) {
		  header("Location: index.php");
		  exit;
		 }*/
 // End Session

include 'inc/function.php';
//auth();
debugScript(); //comment this line for debug error msg
con2db();
pageTitle("Tracking Result");
//include 'inc/header.php';


$query = $_GET['query']; 


//$query = "34234234234";
     
    $min_length = 8;
    // you can set minimum length of the query if you want
     
 /*
 // jika length lebih dari $min_length
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
 */        
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection

       // $raw_results = mysql_query("SELECT * FROM parcel WHERE (`parcel_cnumber` = '".$query."') OR (`parcel_courier` LIKE '%".$query."%')") or die(mysql_error());
		
		$raw_results = mysql_query("SELECT * FROM parcel WHERE (`parcel_cnumber` = '".$query."')") or die(mysql_error());

		echo '<div class="col-md-offset-2 col-md-8 row spacer"></div>';
		/*	echo '<div class="col-md-offset-2 col-md-8 row spacer" >';
			echo '<h3 class="sub-header">Status Parcel</h3></div>';
			
			echo '
			
			<div class="table-responsive col-md-offset-2 col-md-8 row spacer">
			<table class="table table-striped table-bordered table-list" style="word-wrap: break-word;">
			<thead>
			  <tr>
				<th class="text-center">Title</th>
				<th class="text-center">&nbsp;</th>
				<th class="text-center">Desc</th>
			
				</tr> 
			</thead>
			<tbody>
			';*/

			echo '<table class="table table-striped table-bordered table-list" style="word-wrap: break-word;"><thead>
			  <tr>
				<th class="text-center">Title</th>
				<th class="text-center">&nbsp;</th>
				<th class="text-center">Detail</th>
			
				</tr> 
			</thead>
			<tbody>';
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
			$id = $results['id'];
			$parcel_cnumber = $results['parcel_cnumber'];
			$parcel_courier = $results['parcel_courier'];
			$parcel_ptj = $results['parcel_ptj'];
			$receive = $results['parcel_timestamp'];
			$_SESSION['id'] = $id;
			
			$timestamp = $results['parcel_timestamp'];
			$splitTimeStamp = explode(" ",$timestamp);
			$date = $splitTimeStamp[0];
			$time = $splitTimeStamp[1];
			
			echo '
			<tr>
				<td>Parcel Number</td>
				<td>:</td>
				<td>'.$results['parcel_cnumber'].'</td>
			</tr>

			<tr>
				<td>Parcel Courier </td>
				<td>:</td>
				<td>'.$results['parcel_courier'].'</td>
			</tr>

			<tr>
				<td>PTJ </td>
				<td>:</td>
				<td>'.$results['parcel_ptj'].'</td>
			</tr>


			<tr>
				<td>Date Arrived </td>
				<td>:</td>
				<td>'.$date.'</td>
			</tr>

			<tr>
				<td>Time Arrived </td>
				<td>:</td>
				<td>'.$time.'</td>
			</tr>

			';


            }
            echo '</tbody></table></div>';
        }
        else{ // if there is no matching rows do following
            
			echo "<tr><td colspan='3'><center>Maaf, Tiada Rekod ".$query." Di Temui</center></td></tr>";

        }
         
 
	echo '</tbody></table></div>';



//include 'inc/footer.php';

?>
