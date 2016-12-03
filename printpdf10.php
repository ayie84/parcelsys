<?php
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
	$this->Cell(30, 10, 'Date Today: '.date('d-m-Y').'', 0);
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
$raw_results = mysql_query("SELECT  * FROM `ptj` ORDER BY ptj_name ASC") or die(mysql_error());
$data = array();
if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
//while($results=mysql_fetch_assoc($raw_results)) 
while($results=mysql_fetch_array($raw_results)) 
{

	//loop proses start
	
	$ptj = $results['ptj_name'];
	$acro = $results['ptj_acro'];
	$code = $results['ptj_code'];
	$pic = $results['ptj_pic'];
	$contact = $results['ptj_pic_contact'];
	
	$data[]=array($ptj,$acro,$code,$pic,$contact);
	
	//loop proses end
	
}

}

// Instanciation of inherited class
$pdf=new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

//Display Total Count start
$pdf->Cell(40,5,"JUMLAH PTJ/Fakulti",0,0);
$pdf->Cell(5,5,":",0,0);
$pdf->Cell(30,5,$ptjTotal,0,1); //new rows
$pdf->Cell(40,5,"Print On ",0,0);
$pdf->Cell(5,5,":",0,0);
$pdf->Cell(30,5,''.date('d-m-Y').'',0,1);//new rows
$pdf->Ln(10);//10 line space

//Display Total Count end


$pdf->SetWidths(array(60,30,30,45,30));
$pdf->SetHeaders(array('PTJ/Fakulti','Acronym','CODE','Staff','Contact Number'));

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