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
		
		$raw_results = mysql_query("SELECT * FROM parcel WHERE (`parcel_cnumber` = '".$query."') ") or die(mysql_error());

		echo '<div class="col-md-offset-2 col-md-8 row spacer"></div>';
			echo '<div class="col-md-offset-2 col-md-8 row spacer" >';
			echo '<h3 class="sub-header">Received Parcel Today</h3></div>';
			
			echo '
			
			<div class="table-responsive col-md-offset-2 col-md-8 row spacer">
			<table class="table table-striped table-bordered table-list" style="word-wrap: break-word;">
			<thead>
			  <tr>
				<th class="text-center">Tracking Number</th>
				<th class="text-center">Courier</th>
				<th class="text-center">Taken By</th>
				<th class="text-center">Received Date</th>
				<th class="text-center">Received Time</th>
			
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
				<td>'.$results['parcel_takenby'].'</td>
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
         
 /* 
// jika length kurang dari $min_length
    }
   else{ // if query length is less than minimum
    	echo '<div class="col-md-offset-2 col-md-8 row spacer"></div>';
			echo '<div class="col-md-offset-2 col-md-8 row spacer" >';
			echo '<h3 class="sub-header">Received Parcel Today</h3></div>';
			
			echo '
			
			<div class="table-responsive col-md-offset-2 col-md-8 row spacer">
			<table class="table table-striped table-bordered table-list" style="word-wrap: break-word;">
			<thead>
			  <tr>
				<th class="text-center">Tracking Number</th>
				<th class="text-center">Courier</th>
				<th class="text-center">Taken By</th>
				<th class="text-center">Received Date</th>
				<th class="text-center">Received Time</th>
			
				</tr> 
			</thead>
			<tbody>
			';

		//echo "<tr><td colspan='5'>".$min_length."</td></tr>";
       echo "<tr><td colspan='5'><center>Minimum Tracking Number length is ".$min_length."</center></td></tr>";
		echo '</tbody></table></div>';
    } 
// jika length kurang dari $min_length
    */
	echo '</tbody></table></div>';
		echo '<div class="col-md-offset-2 col-md-8 row spacer"></div>';//Add row space
					echo '<div class="col-md-offset-2 col-md-8 row spacer"></div>';//Add row space




//include 'inc/footer.php';

?>
