<?php
require('inc/fpdf/fpdf.php');




class PDF extends FPDF
{
	

	function getData(){
					
					
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
					
					if(!empty($data))
					return $data;
				}
	
	// Load data
	function LoadData($file)
	{
		// Read file lines
		$lines = file($file);
		$data = array();
		foreach($lines as $line)
			$data[] = explode(';',trim($line));
		return $data;
	}

	// Simple table
	function BasicTable($header, $data)
	{
		// Header
		foreach($header as $col)
			$this->Cell(40,7,$col,1);
		$this->Ln();
		// Data
		foreach($data as $row)
		{
			foreach($row as $col)
				$this->Cell(40,6,$col,1);
			$this->Ln();
		}
	}

	// Better table
	function ImprovedTable($header, $data)
	{
		// Column widths
		$w = array(40, 35, 40, 45);
		// Header
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C');
		$this->Ln();
		// Data
		foreach($data as $row)
		{
			$this->Cell($w[0],6,$row[0],'LR');
			$this->Cell($w[1],6,$row[1],'LR');
			$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
			$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
			$this->Ln();
		}
		// Closing line
		$this->Cell(array_sum($w),0,'','T');
	}

	// Colored table
	function FancyTable($header, $data)
	{
		// Colors, line width and bold font
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		// Header
		$w = array(40, 35, 40, 45);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = false;
		foreach($data as $row)
		{
			$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
			$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
			$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
			$this->Ln();
			$fill = !$fill;
		}
		// Closing line
		$this->Cell(array_sum($w),0,'','T');
	}
}

$pdf = new PDF();
// Column headings
//$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
$header = array('Tracking Number', 'Courier', 'Taken By', 'Received Date','Received Time');
// Data loading
//$data = $pdf->LoadData('countries.txt');


$data = $pdf->getData();


$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>