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
$raw_results = mysql_query("SELECT  * FROM `courier` ORDER BY courier_name ASC") or die(mysql_error());
$data = array();
if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
//while($results=mysql_fetch_assoc($raw_results)) 
while($results=mysql_fetch_array($raw_results)) 
{

	//loop proses start
	
	$courier = $results['courier_name'];
	$address = $results['courier_address'];
	$phone = $results['courier_contact_no'];
	$fax = $results['courier_fax_no'];
	$courier_staff = $results['courier_pic_staff'];
	
	$data[]=array($courier,$address,$phone,$fax,$courier_staff);
	
	//loop proses end
	
}

}

// Instanciation of inherited class
$pdf=new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',7);

//Display Total Count start
$pdf->Cell(40,5,"JUMLAH Courier",0,0);
$pdf->Cell(5,5,":",0,0);
$pdf->Cell(30,5,$courierTotal,0,1); //new rows
$pdf->Cell(40,5,"Print On ",0,0);
$pdf->Cell(5,5,":",0,0);
$pdf->Cell(30,5,''.date('d-m-Y').'',0,1);//new rows
$pdf->Ln(10);//10 line space

//Display Total Count end


$pdf->SetWidths(array(40,50,30,30,30));
$pdf->SetHeaders(array('Courier','Address','Office Number','Fax Number','Courier Staff'));

	for($i = 0; $i < count($data); $i++) {
		$pdf->Row($data[$i]);
	}

$pdf->AddPage();
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

$pdf->Output();
?>