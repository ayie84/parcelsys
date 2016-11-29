<?php
require('inc/fpdf/mysql_table.php');




class PDF extends PDF_MySQL_Table
{
	function Header()
	{
		//Title
		$this->SetFont('Arial','',10);
		$this->Cell(0,6,'World populations',0,1,'C');
		$this->Ln(10);
		//Ensure table header is output
		parent::Header();
	}
}


	$user_name = "walimatu_postmel"; //username
	$password = "Pusatmel2016";//password
	$database = "walimatu_pusatmel";//dbname
	$host_name = "localhost"; //server

//Connect to database
mysql_connect($host_name,$user_name,$password);
mysql_select_db($database);

$pdf=new PDF();
$pdf->AddPage();
//First table: put all columns automatically
//$pdf->Table('SELECT * FROM parcel');

$pdf->Table('SELECT parcel_cnumber, parcel_ptj, parcel_courier FROM parcel');

//$pdf->AddPage();
//Second table: specify 3 columns
/*
$pdf->AddCol('rank',20,'','C');
$pdf->AddCol('name',40,'Country');
$pdf->AddCol('pop',40,'Pop (2001)','R');
$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,210),
			'padding'=>2);
$pdf->Table('select name, format(pop,0) as pop, rank from country order by rank limit 0,10',$prop);
*/
$pdf->Output();
?>

