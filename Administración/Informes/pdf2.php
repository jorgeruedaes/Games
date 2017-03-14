<?php

require('fpdf/fpdf.php');
require('../../conexion.php');
class PDF extends FPDF
{
   //Cabecera de página
   function Header()
   {

       $this->Image('../../images/EscudoTorneoN.png',20,8,33);

      $this->SetFont('Arial','B',12);

      $this->Cell(0,10,'Copa Amistad Profesional',0,0,'C');
      $this->Ln();
      $this->Cell(0,10,'TABLA DE POSICIONES',0,0,'C');

   }
}

//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->SetMargins(20, 15 , 30);
$pdf->AddPage();
$pdf->SetFont('Times','',9);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf-> Cell(35,10,'Equipo',1,0,'C');
$pdf-> Cell(25,10,'Puntos',1,0,'C');
$pdf-> Cell(15,10,'PJ',1,0,'C');
$pdf-> Cell(15,10,'PG',1,0,'C');
$pdf-> Cell(15,10,'PE',1,0,'C');
$pdf-> Cell(15,10,'PP',1,0,'C');
$pdf-> Cell(15,10,'GF',1,0,'C');
$pdf-> Cell(15,10,'GC',1,0,'C');
$pdf-> Cell(15,10,'DG',1,1,'C');

$consulta= mysql_query("SELECT * FROM te_posiciones ORDER BY puntos DESC;");


while($sql1=mysql_fetch_array($consulta)){

$pdf->Cell(35,5,$sql1['equipo'],1,0,'C');
$pdf->Cell(25,5,$sql1['puntos'],1,0,'C');
$pdf->Cell(15,5,$sql1['pj'],1,0,'C');
$pdf->Cell(15,5,$sql1['pg'],1,0,'C');
$pdf->Cell(15,5,$sql1['pe'],1,0,'C');
$pdf->Cell(15,5,$sql1['pp'],1,0,'C');
$pdf->Cell(15,5,$sql1['gf'],1,0,'C');
$pdf->Cell(15,5,$sql1['gc'],1,0,'C');
$pdf->Cell(15,5,$sql1['dg'],1,0,'C');
$pdf->Ln();

}
ob_end_clean();
$pdf->Output();
?>





