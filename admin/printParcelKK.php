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
$dateGlobal = $_REQUEST['date'];

//echo $date;

$ptj=urldecode($_REQUEST['ptj']);



list($ptjTotal,$courierTotal)=pmsInfo();

	class PDF extends FPDF
	{
	// Page header
	function Header()
	{
	    // Logo
	    $this->Image('ump.png',10,6,30);
	    // Arial bold 15
	    $this->SetFont('Arial','B',6);
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


//$raw_results = mysql_query("SELECT  * FROM `parcel` WHERE `parcel_timestamp` LIKE '%".$date."%' ORDER BY `parcel`.`parcel_courier` ASC") or die(mysql_error());

				
				//Dapatkan rekod daripada STAFF sahaja
				//$value = mysql_query("SELECT COUNT( * ) AS Value FROM  `parcel` where `parcel_timestamp` LIKE '%".$date."%' AND parcel_ptj NOT Like '%KK1%' AND parcel_ptj NOT Like '%KK2%' AND parcel_ptj NOT Like '%KK3%' AND parcel_ptj NOT Like '%KK4%' AND parcel_ptj NOT Like '%KK5%'") or die (mysql_query());


				/*if(!empty($ptj)){
				$raw_results = mysql_query("SELECT * FROM  `parcel` where `parcel_timestamp` LIKE '%".$dateGlobal."%' AND parcel_ptj='".$ptj."' ORDER BY `parcel`.`parcel_courier` ASC") or die (mysql_query());

				
				}else{
				$raw_results = mysql_query("SELECT * FROM  `parcel` where `parcel_timestamp` LIKE '%".$dateGlobal."%' ORDER BY `parcel`.`parcel_courier` ASC") or die (mysql_query());

				
				}*/

$raw_results = mysql_query("SELECT * FROM  `parcel` where `parcel_timestamp` LIKE '%".$dateGlobal."%' AND parcel_ptj LIKE '%kolej%' ORDER BY `parcel`.`parcel_courier` ASC") or die (mysql_query());



//echo $date;


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
	  $data[]=array($results['parcel_courier'],'','','','',''.' '.'');
    }

    $cou = $courier;
		
		
		$data[]=array('',$results['parcel_cnumber'],$results['parcel_ptj'],$results['parcel_takenby'],$date.'  '.$time,$results['parcel_remark']);
	
	
}

//echo $date;

}

// Instanciation of inherited class
$pdf=new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

		//PRINT NAMA PTJ JIKA ADA
		if (!empty($ptj)){



						$pdf->Cell(40,5,"SENARAI PARCEL > ".$ptj,0,1);
						$pdf->Ln(10);//10 line space
						//$pdf->Cell(5,5,":",0,0);
						//$pdf->Cell(30,5,$totalParcel,0,1); //new rows

		}else{

						$pdf->Cell(40,5,"SENARAI PARCEL > KOLEJ KEDIAMAN",0,1);
						$pdf->Ln(10);
		}

$pdf->SetWidths(array(30,35,35,35,25,30));
$pdf->SetHeaders(array('Courier','Tracking','PTJ','Taken By','Date','Remark'));

	for($i = 0; $i < count($data); $i++) {
		$pdf->Row($data[$i]);
	}

$pdf->AddPage();
$pdf->Ln(10);
//Display Total Count start


//echo $date;

//Count $totalParcel, $parcelAvailable, $parcelTaken, $parcelPtj
if (!empty($ptj)){

	//$result=mysql_query('SELECT count(*) FROM parcel WHERE DAY(parcel_timestamp) = '.date("j", strtotime($date)).' AND MONTH(parcel_timestamp) = '.date("n", strtotime($date)).' AND YEAR(parcel_timestamp) = '.date("Y", strtotime($date)).' AND parcel_ptj="'.$ptj.'"');

	$result=mysql_query('SELECT count(*) FROM parcel WHERE `parcel_timestamp` LIKE "%'.$dateGlobal.'%" AND parcel_ptj="'.$ptj.'"');
	 

	$totalParcel=mysql_result($result, 0);

	//$result=mysql_query('SELECT count(*) FROM parcel WHERE DAY(parcel_timestamp) = '.date("j", strtotime($date)).' AND MONTH(parcel_timestamp) = '.date("n", strtotime($date)).' AND YEAR(parcel_timestamp) = '.date("Y", strtotime($date)).' AND NULLIF(parcel_takenby, " ") IS NULL AND parcel_ptj="'.$ptj.'"');
	
	$result=mysql_query('SELECT count(*) FROM parcel WHERE `parcel_timestamp` LIKE "%'.$dateGlobal.'%" AND NULLIF(parcel_takenby, " ") IS NULL AND parcel_ptj="'.$ptj.'"');
	

	$parcelAvailable=mysql_result($result, 0);

	//$result=mysql_query('SELECT count(*) FROM parcel WHERE DAY(parcel_timestamp) = '.date("j", strtotime($date)).' AND MONTH(parcel_timestamp) = '.date("n", strtotime($date)).' AND YEAR(parcel_timestamp) = '.date("Y", strtotime($date)).' AND parcel_takenby <> "" AND parcel_ptj="'.$ptj.'"');
	
	$result=mysql_query('SELECT count(*) FROM parcel WHERE `parcel_timestamp` LIKE "%'.$dateGlobal.'%" AND parcel_takenby <> "" AND parcel_ptj="'.$ptj.'"');

	$parcelTaken=mysql_result($result, 0);

	//$result=mysql_query('SELECT count(distinct parcel_ptj) FROM parcel WHERE DAY(parcel_timestamp) = '.date("j", strtotime($date)).' AND MONTH(parcel_timestamp) = '.date("n", strtotime($date)).' AND YEAR(parcel_timestamp) = '.date("Y", strtotime($date)).' AND parcel_ptj="'.$ptj.'"');
	
	$result=mysql_query('SELECT count(*) FROM parcel WHERE `parcel_timestamp` LIKE "%'.$dateGlobal.'%" AND parcel_ptj="'.$ptj.'"');

	$parcelPtj=mysql_result($result, 0);

}else{

	//echo $dateGlobal;

	//$result=mysql_query('SELECT count(*) FROM parcel WHERE DAY(parcel_timestamp) = '.date("j", strtotime($date)).' AND MONTH(parcel_timestamp) = '.date("n", strtotime($date)).' AND YEAR(parcel_timestamp) = '.date("Y", strtotime($date)).'');

	$result=mysql_query('SELECT count(*) FROM parcel WHERE `parcel_timestamp` LIKE "%'.$dateGlobal.'%"');

	//echo 'SELECT count(*) FROM parcel WHERE `parcel_timestamp` LIKE "%'.$dateGlobal.'%"';

	//echo 'SELECT count(*) FROM parcel WHERE DAY(parcel_timestamp) = '.date("j", strtotime($date)).' AND MONTH(parcel_timestamp) = '.date("n", strtotime($date)).' AND YEAR(parcel_timestamp) = '.date("Y", strtotime($date)).'';

	$totalParcel=mysql_result($result, 0);

	//$result=mysql_query('SELECT count(*) FROM parcel WHERE DAY(parcel_timestamp) = '.date("j", strtotime($date)).' AND MONTH(parcel_timestamp) = '.date("n", strtotime($date)).' AND YEAR(parcel_timestamp) = '.date("Y", strtotime($date)).' AND NULLIF(parcel_takenby, "") IS NULL');
	
	$result=mysql_query('SELECT count(*) FROM parcel WHERE `parcel_timestamp` LIKE "%'.$dateGlobal.'%" AND NULLIF(parcel_takenby, "") IS NULL');
	

	$parcelAvailable=mysql_result($result, 0);

	//$result=mysql_query('SELECT count(*) FROM parcel WHERE DAY(parcel_timestamp) = '.date("j", strtotime($date)).' AND MONTH(parcel_timestamp) = '.date("n", strtotime($date)).' AND YEAR(parcel_timestamp) = '.date("Y", strtotime($date)).' AND parcel_takenby <> " " ');

	$result=mysql_query('SELECT count(*) FROM parcel WHERE `parcel_timestamp` LIKE "%'.$dateGlobal.'%" AND parcel_takenby <> " " ');

	$parcelTaken=mysql_result($result, 0);

	//$result=mysql_query('SELECT count(distinct parcel_ptj) FROM parcel WHERE DAY(parcel_timestamp) = '.date("j", strtotime($date)).' AND MONTH(parcel_timestamp) = '.date("n", strtotime($date)).' AND YEAR(parcel_timestamp) = '.date("Y", strtotime($date)).'');

	$result=mysql_query('SELECT count(distinct parcel_ptj) FROM parcel WHERE  `parcel_timestamp` LIKE "%'.$dateGlobal.'%"');

	$parcelPtj=mysql_result($result, 0);

}

$pdf->Cell(40,5,"Total Parcel",0,0);
$pdf->Cell(5,5,":",0,0);
$pdf->Cell(30,5,$totalParcel,0,1); //new rows

$pdf->Cell(40,5,"Total Parcel Taken",0,0);
$pdf->Cell(5,5,":",0,0);
$pdf->Cell(30,5,$parcelTaken,0,1); //new rows

$pdf->Cell(40,5,"Total Parcel Available",0,0);
$pdf->Cell(5,5,":",0,0);
$pdf->Cell(30,5,$parcelAvailable,0,1); //new rows


/*

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
*/

if(!empty($ptj)){

//dapatkan $ptj_pic
$result = mysql_query("SELECT ptj_pic FROM  `ptj` where `ptj_name`='".$ptj."'") or die (mysql_query());


$pdf->Ln(10);//10 line space
//Display Total Count end
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50,5,"__________________________",0,0);
$pdf->Cell(70);
$pdf->Cell(0,5,"Diterima Oleh,",0,1);
$pdf->Ln(1);

$pdf->Cell(50,5,"Disemak dan disahkan",0,0);
$pdf->Cell(70);
$pdf->Cell(0,5,"Nama : ".mysql_result($result, 0),0,1);
$pdf->Ln(1);


$pdf->Cell(50,5,"PUSAT MEL KAMPUS GAMBANG",0,0);
$pdf->Cell(70);
$pdf->Cell(0,5,"Tarikh :",0,1);
$pdf->Ln(1);


$pdf->Cell(50,5," ",0,0);
$pdf->Cell(70);
$pdf->Cell(0,5,"Masa :",0,1);
$pdf->Ln(1);
$pdf->Cell(50,5,"",0,0);
$pdf->Cell(70);
$pdf->Cell(0,5,"Tandatangan :",0,1);
$pdf->Ln(1);
$pdf->Cell(50,5,"",0,0);
$pdf->Cell(70);
$pdf->Cell(0,5,"Cop :",0,1);
$pdf->Ln(1);

}

$pdf->Output();
?>