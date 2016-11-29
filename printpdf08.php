<?php
//require('inc/fpdf/fpdf.php');
require('inc/fpdf/mc_table.php');
include 'config/database.php';
con2db();

$cou = '';
//$raw_results = mysql_query("SELECT * FROM parcel") or die(mysql_error());
$raw_results = mysql_query("SELECT * FROM `parcel` ORDER BY `parcel_courier` ASC") or die(mysql_error());
$data = array();
if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
//while($results=mysql_fetch_assoc($raw_results)) 
while($results=mysql_fetch_array($raw_results)) 
{

	$timestamp = $results['parcel_timestamp'];
	$splitTimeStamp = explode(" ",$timestamp);
	$date = $splitTimeStamp[0];
	$time = $splitTimeStamp[1];
	$courier = $results['parcel_courier'];
	{
		//$data[]=array('','','','','');
		/*$courier = $results['parcel_courier'];
		if (!in_array($courier,$data))
		{
		$abc = $data[] = $courier;
		$data[]=array('$abc');
		}*/
		if ($cou==$courier) {
      //duplicate
	  //echo $dbdate.'</br>';
    } else {
      //first or unique
	  //echo $courier.'</br>';
	  $data[]=array($results['parcel_courier'],'','','',''.' '.'');
    }

    $cou = $courier;
		
		
		//$data[]=array($results['parcel_courier'],$results['parcel_cnumber'],$results['parcel_cnumber'],$results['parcel_takenby'],$date.' '.$time);
		$data[]=array('',$results['parcel_cnumber'],$results['parcel_cnumber'],$results['parcel_takenby'],$date.' '.$time);
	}
	
}

}

// Instanciation of inherited class
$pdf=new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

/*


//Setting up the table header and column width
$pdf->SetTable(array(
	
	array('C.Number',40),
	array('Courier',50),
	array('C.Number',30),
	array('Date',30),
	array('Time',30)

);

*/

$pdf->SetWidths(array(40,50,30,30,30));
$pdf->SetHeaders(array('C. Number','Courier','C. Number','Date','Time'));

	for($i = 0; $i < count($data); $i++) {
		$pdf->Row($data[$i]);
	}

/*
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(50,5,"__________________________",0,0);
$pdf->Cell(90);
$pdf->Cell(0,5,"Diterima Oleh,",0,1);
$pdf->Ln(1);
$pdf->Cell(50,5,"Tandatangan Courier",0,0);
$pdf->Cell(90);
$pdf->Cell(0,5,"Nama :",0,1);
$pdf->Ln(1);
$pdf->Cell(50,5,"Disemak dan disahkan",0,0);
$pdf->Cell(90);
$pdf->Cell(0,5,"No IC :",0,1);
$pdf->Ln(1);
$pdf->Cell(50,5,"Nama :",0,0);
$pdf->Cell(90);
$pdf->Cell(0,5,"Tarikh :",0,1);
$pdf->Ln(1);
$pdf->Cell(50,5,"Tandatangan :",0,0);
$pdf->Cell(90);
$pdf->Cell(0,5,"Masa :",0,1);
$pdf->Ln(1);
$pdf->Cell(50,5,"",0,0);
$pdf->Cell(90);
$pdf->Cell(0,5,"Tandatangan :",0,1);
$pdf->Ln(1);
$pdf->Cell(50,5,"",0,0);
$pdf->Cell(90);
$pdf->Cell(0,5,"Chop Syarikat :",0,1);
$pdf->Ln(1);
*/
$pdf->Output();
?>