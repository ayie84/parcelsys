<?php

// Start Session
// Comment this line to off the authentication session	
	session_start();
		
		// if session is not set this will redirect to login page
		 if( !isset($_SESSION['SESS_MEMBER_ID']) ) {
		  header("Location: index.php");
		  exit;
		 }
 // End Session

//require('inc/fpdf/fpdf.php');
require('inc/fpdf/mc_table.php');
require('inc/function.php');
//include 'config/database.php';
con2db();
$date = $_REQUEST['date'];
list($ptjTotal,$courierTotal)=pmsInfo();

	class PDF extends FPDF
	{
	// Page header
	function Header()
	{
	    // Logo
	    $this->Image('ump.png',10,6,30);
	    // Arial bold 15
	    $this->SetFont('Arial','B',15);
	    // Move to the right
	    $this->Cell(60);
	    // Title
	    //$this->Cell(25, 10, '', 0);
		$this->Cell(75, 10, 'Parcel Management System' ,0);
		$this->Cell(30);
		$this->SetFont('Arial', '', 9);
		$this->Cell(30, 10, 'Date: '.date('d-m-Y').'', 0);
		//$pdf->Ln(15);
	    // Line break
	    $this->Ln(20);
	}

	// Page footer
	function Footer()
	{
	    // Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Page number
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}

	}


$cou = '';
//$raw_results = mysql_query("SELECT * FROM parcel") or die(mysql_error());
//$raw_results = mysql_query("SELECT * FROM `parcel` ORDER BY `parcel_courier` ASC") or die(mysql_error());
$raw_results = mysql_query("SELECT  * FROM `parcel` WHERE `parcel_timestamp` LIKE '%".$date."%' ORDER BY `parcel`.`parcel_courier` ASC") or die(mysql_error());

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
	

		if ($cou==$courier) {
      //duplicate
	  //echo $dbdate.'</br>';
    } else {
      //first or unique
	  //echo $courier.'</br>';
	  $data[]=array($results['parcel_courier'],'','','',''.' '.'');
    }

    $cou = $courier;
		
		
		$data[]=array('',$results['parcel_rcpt_name'],$results['parcel_cnumber'],$results['parcel_takenby'],$date.' '.$time);
	
	
}

}

// Instanciation of inherited class
$pdf=new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

$pdf->SetWidths(array(40,50,30,30,30));
$pdf->SetHeaders(array('Courier','Penerima','Tracking','Taken By','Time Receive'));

	for($i = 0; $i < count($data); $i++) {
		$pdf->Row($data[$i]);
	}

$pdf->AddPage();
$pdf->Ln(10);
//Display Total Count start

$result=mysql_query('SELECT count(*) FROM parcel WHERE DAY(parcel_timestamp) = '.date("j", strtotime($date)).' AND MONTH(parcel_timestamp) = '.date("n", strtotime($date)).' AND YEAR(parcel_timestamp) = '.date("Y", strtotime($date)).'');

$totalParcel=mysql_result($result, 0);

$result=mysql_query('SELECT count(*) FROM parcel WHERE DAY(parcel_timestamp) = '.date("j", strtotime($date)).' AND MONTH(parcel_timestamp) = '.date("n", strtotime($date)).' AND YEAR(parcel_timestamp) = '.date("Y", strtotime($date)).' AND NULLIF(parcel_takenby, " ") IS NULL');
$parcelAvailable=mysql_result($result, 0);

$result=mysql_query('SELECT count(*) FROM parcel WHERE DAY(parcel_timestamp) = '.date("j", strtotime($date)).' AND MONTH(parcel_timestamp) = '.date("n", strtotime($date)).' AND YEAR(parcel_timestamp) = '.date("Y", strtotime($date)).' AND parcel_takenby <> "" ');
$parcelTaken=mysql_result($result, 0);

$result=mysql_query('SELECT count(distinct parcel_ptj) FROM parcel WHERE DAY(parcel_timestamp) = '.date("j", strtotime($date)).' AND MONTH(parcel_timestamp) = '.date("n", strtotime($date)).' AND YEAR(parcel_timestamp) = '.date("Y", strtotime($date)).'');
$parcelPtj=mysql_result($result, 0);



$pdf->Cell(40,5,"Total Parcel Today",0,0);
$pdf->Cell(5,5,":",0,0);
$pdf->Cell(30,5,$totalParcel,0,1); //new rows

$pdf->Cell(40,5,"Total Parcel Taken",0,0);
$pdf->Cell(5,5,":",0,0);
$pdf->Cell(30,5,$parcelTaken,0,1); //new rows

$pdf->Cell(40,5,"Total Parcel Available",0,0);
$pdf->Cell(5,5,":",0,0);
$pdf->Cell(30,5,$parcelAvailable,0,1); //new rows


$pdf->Cell(40,5,"JUMLAH PTJ/Fakulti",0,0);
$pdf->Cell(5,5,":",0,0);
$pdf->Cell(30,5,$parcelPtj,0,1); //new rows
//$pdf->Cell(30,5,$date,0,1); //new rows
$pdf->Cell(40,5,"Result Print For ",0,0);
$pdf->Cell(5,5,":",0,0);
$pdf->Cell(30,5,date("d-m-Y", strtotime($date)),0,1);//new rows
$pdf->Cell(40,5,"Print On ",0,0);
$pdf->Cell(5,5,":",0,0);
$pdf->Cell(30,5,''.date('d-m-Y').'',0,1);//new rows
$pdf->Ln(10);//10 line space

//Display Total Count end
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

$pdf->Output();
?>