<?php
require('fpdf/fpdf.php');
require('../../Admin/php/conexion.php');
$id = $_GET['id'];

class PDF extends FPDF
{
   //Cabecera de página
   function Header()
   {

	  $this->Image('../../images/Escudos/logo.png',20,8,33);
      $this->SetFont('Arial','B',12);

      $this->Cell(0,10,'Liga santandereana de futbol',0,0,'C');
      $this->Ln();
      $this->Cell(0,10,'PROGRAMACION',0,0,'C');

   }
}

$pdf=new PDF();
$pdf->SetMargins(20, 15 , 30);
$pdf->AddPage();
$pdf->SetFont('Times','',9);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$pdf->Output();
?>