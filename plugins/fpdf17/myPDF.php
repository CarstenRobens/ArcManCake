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

        function Footer()       {

        //Position at 1.5 cm from bottom

        $this->SetY(-15);

        $this->SetFont('Arial','I',8);

        $this->Cell(0,10,'page footer -> Page '.$this->PageNo().'/{nb}',0,0,'C');

        }



}

?>