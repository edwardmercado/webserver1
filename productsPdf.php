<?php
require('fpdf.php');
require_once('config.php');
require_once("class.database.inc");
$db = User::getInstance();

	class PDF extends FPDF
	{
		function Header()
{
		//Logo
		date_default_timezone_set("Asia/Manila");
		$this->Image('Images/user.png',30,-13,50,50);
		//Arial bold 15
		$this->SetFont('Arial','B',15);
		//Move to the right
		$this->Cell(80);
		//Title
		$this->Cell(100,10,'Karts Burger and Restobar',0,0,'C');
		//Line break
		$this->Cell(100,10,"Date: ".date("m/d/y"),0,0,'C');
		$this->Cell(100,10,"Time: " .date("h:i:sa"),0,0,'C');
		$this->Ln(20);
	}

	//Page footer
	function Footer()
	{
		//Position at 1.5 cm from bottom
		$this->SetY(-15);
		//Arial italic 8
		$this->SetFont('Arial','I',8);
		//Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'Products-Report',0,0,'C');
	}
	
	
	function LoadData()
	{
		$db = User::getInstance();
		$result=$db->query("SELECT * from tbl_products");
		while($row=$db->fetch_array($result)) 
		{ 
			$data[] = $row;
		}
		return $data;
	}



		//Simple table
		function ShowTable($header,$data)
		{
			//Header
			foreach($header as $col)
				$this->Cell(50,7,$col,1);
			$this->Ln();
			//Data
			foreach($data as $row)
			{
				foreach($row as $col)
					$this->Cell(50,6,$col,1);
				$this->Ln();
			}
		}
		
		function ImprovedTable($header,$data)
		{
			//Column widths
			$w=array(30,35,50,65,80,95,110,125,135,150,90,60);
			//Header
			for($i=0;$i<count($header);$i++)
				$this->Cell($w[$i],7,$header[$i],1,0,'C');
			$this->Ln();
			//Data
			foreach($data as $row)
			{
				$this->Cell($w[0],6,$row[0],'LR');
				$this->Cell($w[1],6,$row[1],'LR');
				$this->Cell($w[2],6,$row[2],'LR');
				$this->Cell($w[3],6,$row[3],'LR');
				$this->Cell($w[4],6,$row[4],'LR');
				$this->Cell($w[5],6,$row[5],'LR');
				$this->Cell($w[6],6,$row[6],'LR');
				$this->Cell($w[7],6,$row[7],'LR');
				$this->Cell($w[8],6,$row[8],'LR');
				$this->Cell($w[9],6,$row[9],'LR');
				$this->Cell($w[10],6,$row[10],'LR');
				$this->Cell($w[11],6,$row[11],'LR');
				$this->Ln();
			}
			//Closure line
			$this->Cell(array_sum($w),0,'','T');
		}
	
		//Colored table
		function FancyTable($header,$data)
		{
			$ctr = 0;
			//Colors, line width and bold font
			$this->SetFillColor(128,128,128);
			$this->SetTextColor(255);
			$this->SetDrawColor(128,128,128);
			$this->SetLineWidth(.3);
			$this->SetFont('','B');
			//Header
			//$w=array(10,40,50,30);
			$w=array(35,25,35,35,80,55,20,15,28,25,30,30);
			for($i=0;$i<count($header);$i++)
				$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
			$this->Ln();
			//Color and font restoration
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$this->SetFont('');
			//Data
			$fill=false;
			foreach($data as $row)
			{
				$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
				$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
				$this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
				$this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
				$this->Cell($w[4],6,$row[4],'LR',0,'L',$fill);
	
				$this->Ln();
				$fill=!$fill;
				$ctr = $ctr + 1;
			}
			$this->Cell(413,6,'Number of Products: '.$ctr.'',1,1,'C');
			$this->Cell(array_sum($w),0,'','T');
			
		}				
	}
	

$pdf=new PDF();
//Column titles
$header=array('prodId','prodDesc','prodPrice');
//Data loading
$data=$pdf->LoadData();
$pdf->SetFont('Arial','',12);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>

<a href = 'viewmoneyremit.php'> Back to Admin Panel </a>