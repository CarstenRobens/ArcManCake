<?php
require('/home/elgatil/Development/CakePHP/Blog/plugins/fpdf17/fpdf.php');

class myPDF extends FPDF {



	public $title = "FPDF Sample Page Header";



	//Page header method
	function Header() {
		$this->SetFont('Times','',24);
		
		#$w = $this->GetStringWidth($this->title)+150;

		#$this->SetDrawColor(0,0,180);

		#$this->SetFillColor(170,169,148);

		$this->SetTextColor(255,0,0);

		$this->SetLineWidth(1);

		$this->imagePath='/home/elgatil/Development/CakePHP/Blog/plugins/fpdf17/tutorial/logo.png';
		$this->Image($this->imagePath,10,10.5,15,8.5);

		$this->Cell(0,10,$this->title,'B',1,'C');

		$this->Ln(10);

	}

	//Page footer method
	function Footer() {

		//Position at 1.5 cm from bottom

		$this->SetY(-15);

		$this->SetFont('Arial','I',8);

		$this->Cell(0,10,'page footer -> Page '.$this->PageNo().'/{nb}',0,0,'C');

	}


	
	// Simple table
	function BasicTable($header, $data){
		// Header
		foreach($header as $col){
			$this->Cell(95,7,$col,1);
		}
		$this->Ln();
		// Data
		foreach($data as $row){
			foreach($row as $col){
				$this->Cell(95,6,$col,1);
			}
			$this->Ln();
		}
	}

	// Better table
	function ImprovedTable($header, $data)
	{
		// Column widths
		$w = array(40, 35, 40, 45);
		// Header
		for($i=0;$i<count($header);$i++){
			$this->Cell($w[$i],7,$header[$i],1,0,'C');
		}
		$this->Ln();
		// Data
		foreach($data as $row){
			
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
	function FancyTable($header, $data)	{
		
		// Colors, line width and bold font
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		// Header
		$w = array(40, 35, 40, 45);
		for($i=0;$i<count($header);$i++){
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		}
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = false;
		foreach($data as $row) {
			
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

?>
