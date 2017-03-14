<?php



require('fpdf/fpdf.php');
require('../../conexion.php');
class PDF extends FPDF
{
   //Cabecera de página
   function Header()
   {

       $this->Image('../../images/EscudoTorneoN.png',30,8,33);

      $this->SetFont('Arial','B',12);

      $this->Cell(0,10,'Copa Amistad Profesional',0,0,'C');
      $this->Ln();
      $this->Cell(0,10,'FICHA TECNICA DE JUGADORES',0,0,'C');
      $this->Ln();
      $this->Ln();

   }
}

//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage('L','Legal');
$pdf->SetMargins(30, 25 , 30);
$pdf->SetFont('Times','',9);
$pdf->Ln();


$pdf-> Cell(40,10,'Equipo',1,0,'C');
$pdf-> Cell(80,10,'Nombres y Apellidos',1,0,'C');
$pdf-> Cell(25,10,'F. Nacimiento',1,0,'C');
$pdf-> Cell(50,10,'Correo',1,0,'C');
$pdf-> Cell(25,10,'F. Ingreso',1,0,'C');
$pdf-> Cell(25,10,'Estado',1,0,'C');
$pdf-> Cell(25,10,'Telefono',1,0,'C');
$pdf-> Cell(25,10,'Profesion',1,1,'C');

$consulta= mysql_query("SELECT * FROM tb_jugadores WHERE estado_jugador='1'");

while ($sql1=mysql_fetch_array($consulta)){

$imagen= $sql1['foto_jugador'];
$equipo = $sql1['equipo'];
$estado = $sql1['estado_jugador'];
$profesion = $sql1['profesion'];


$nombreequipo= mysql_query("SELECT * FROM tb_equipos where id_equipo=$equipo");
$nombreestado = mysql_query("SELECT * FROM tb_estados_jugador where id_estado=$estado");
$nombreprofesion = mysql_query("SELECT * FROM tb_profesiones where id_profesion=$profesion");

while ($res=mysql_fetch_array($nombreequipo)){

while($res1=mysql_fetch_array($nombreestado)){

while($res2=mysql_fetch_array($nombreprofesion)){

//$pdf->Cell(30,5,$sql1['foto_jugador'],1,0,'C');


//$pdf->Image($imagen,65,100,50,37.5);
//$pdf->Cell(30,10,$imagen,1,0);
//$pdf->Cell(30, 10, $pdf->Image($imagen, $pdf->GetX(),$pdf->GetY()),'LR',0,'R');
$pdf->Cell(40,5,$res['nombre_equipo'],1,0,'C');
$pdf->Cell(80,5,$sql1['nombre1']." ".$sql1['nombre2']." ".$sql1['apellido1']." ".$sql1['apellido2'],1,0,'C');
$pdf->Cell(25,5,$sql1['fecha_nacimiento'],1,0,'C');
$pdf->Cell(50,5,$sql1['email'],1,0,'C');
$pdf->Cell(25,5,$sql1['fecha_ingreso'],1,0,'C');
$pdf->Cell(25,5,$res1['nombre'],1,0,'C');
$pdf->Cell(25,5,$sql1['telefono'],1,0,'C');
$pdf->Cell(25,5,$res2['nombre'],1,0,'C');
$pdf->Ln();

}}
}
}
$pdf->Output();
?>

