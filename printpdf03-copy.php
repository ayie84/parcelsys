<?php

/*

Fot Test Use Only - Gezzeg

*/

require('inc/fpdf/mc_table.php');

$user_name = "walimatu_postmel"; //username
	$password = "Pusatmel2016";//password
	$database = "walimatu_pusatmel";//dbname
	$host_name = "localhost"; //server
	
	
	$connect_db=mysql_connect($host_name, $user_name, $password);

	$find_db=mysql_select_db($database);
					
	$raw_results = mysql_query("SELECT * FROM parcel") or die(mysql_error());
				
	$data = array();
				
					if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
					 
						
						while($results=mysql_fetch_assoc($raw_results)) {
						//while($results = mysql_fetch_array($raw_results)){
						
						$id = $results['id'];
						$parcel_cnumber = $results['parcel_cnumber'];
						$receive = $results['parcel_timestamp'];
						$_SESSION['id'] = $id;
						
						$timestamp = $results['parcel_timestamp'];
						$splitTimeStamp = explode(" ",$timestamp);
						$date = $splitTimeStamp[0];
						$time = $splitTimeStamp[1];
						
						
						$data[]=array($results['parcel_cnumber'],$results['parcel_courier'],$results['parcel_cnumber'],$date,$time);
						
						}
				
				
					}


$pdf=new PDF_MC_Table();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

//Both width dan header mesti sama bilangan. 
//Will be create new function for both declaration

$pdf->SetWidths(array(40,50,30,30,30));
$pdf->SetHeaders(array('C. Number','Courier','C. Number','Date','Time'));

	for($i = 0; $i < count($data); $i++) {
		$pdf->Row($data[$i]);
	}
	
$pdf->Output();
?>
