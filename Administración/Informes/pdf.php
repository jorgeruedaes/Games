
<?php 
require('fpdf/fpdf.php');
require('../../conexion.php');
mysql_query("DELETE FROM te_amonestaciones");
class PDF extends FPDF
{
   //Cabecera de página
   function Header()
   {

       $this->Image('../../images/EscudoTorneoN.png',20,8,33);

      $this->SetFont('Arial','B',12);

      $this->Cell(0,10,'Copa Amistad Profesional',0,0,'C');
      $this->Ln();
      $this->Cell(0,10,'AMONESTACIONES ',0,0,'C');
      $this->Ln();
$this->Ln();


   }
}

//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetMargins(20, 25 , 30);
$pdf->SetFont('Times','',9);
$pdf->Ln();
$pdf->Write(5,'AMONESTACIONES DE JUGADORES');
$pdf->Ln();
$pdf->Ln();



$pdf-> Cell(35,10,'Equipo',1,0,'C');
$pdf-> Cell(60,10,'Nombre del Jugador',1,0,'C');
$pdf-> Cell(20,10,'Amonestacion',1,0,'C');
$pdf-> Cell(20,10,'Valor',1,0,'C');
$pdf-> Cell(30,10,'Comentario',1,1,'C');


$consulta= mysql_query("SELECT * FROM tr_amonestacionesxjugador WHERE estado_amonestacion='1' and amonestacion!='5'");
$consultavalor=mysql_num_rows($consulta);
while ($sql1=mysql_fetch_array($consulta)){

$idjugador=$sql1['jugador'];
$idamonestacion=$sql1['amonestacion'];

$consulta2= mysql_query("SELECT * FROM tb_jugadores WHERE id_jugadores=$idjugador");

while ($sql=mysql_fetch_array($consulta2)){

	$idequipo = $sql['equipo'];


$consulta3= mysql_query("SELECT * FROM tb_amonestaciones WHERE id_amonestacion=$idamonestacion");
$consulta4= mysql_query("SELECT * FROM tb_equipos WHERE id_equipo=$idequipo order by nombre_equipo asc");
$resultado4=mysql_fetch_array($consulta4);

while($sql2=mysql_fetch_array($consulta3)){

$nombreequipo=$resultado4['nombre_equipo'];
$nombrejugador=$sql['nombre1']." ".$sql['nombre2']." ".$sql['apellido1']." ".$sql['apellido2'];


$nombreamonestacion=$sql2['nombre'];
if($nombreamonestacion=="Tarjeta Amarilla"){
  $letraamonestacion="A";
}else{
  $letraamonestacion="R";
}
$numero=$sql2['valor'];
$comentario=$sql1['comentario'];
mysql_query("INSERT INTO te_amonestaciones(`equipo`, `jugador`, `amonestacion`, `valor`, `Comentario`)
 VALUES ('$nombreequipo','$nombrejugador','$letraamonestacion','$numero','$comentario');");
}
}
}


$consulta5= mysql_query("SELECT * FROM te_amonestaciones ORDER BY equipo ASC,jugador ASC");


while($sql1=mysql_fetch_array($consulta5)){



$pdf->Cell(35,5,$sql1['equipo'],1,0);
$pdf->Cell(60,5,$sql1['jugador'],1,0);
$pdf->Cell(20,5,$sql1['amonestacion'],1,0,'C');
$pdf->Cell(20,5,$sql1['valor'],1,0,'C');
$pdf->Cell(30,5,$sql1['Comentario'],1,0,'C');

$pdf->Ln();

}

$pdf->Ln();
$pdf->Ln();
$pdf->Write(5,'AMONESTACIONES DE EQUIPOS');
$pdf->Ln();
$pdf->Ln();
$pdf-> Cell(50,10,'Equipo',1,0,'C');
$pdf-> Cell(60,10,'Amonestacion',1,0,'C');
$pdf-> Cell(60,10,'Valor',1,1,'C');

$consultando= mysql_query("SELECT * FROM tr_amonestacionxequipo WHERE estado_amonestacion='1' and amonestacion!='5'");

while ($cons=mysql_fetch_array($consultando)){
  $idequipo=$cons['id_equipo'];
  $idamon=$cons['amonestacion'];

$consultando1= mysql_query("SELECT * FROM tb_equipos WHERE id_equipo='$idequipo'");
$consultando2=mysql_query("SELECT * FROM tb_amonestaciones WHERE id_amonestacion='$idamon'");

while($cons1=mysql_fetch_array($consultando1)){


while($cons2=mysql_fetch_array($consultando2)){

$pdf->Cell(50,5,$cons1['nombre_equipo'],1,0,'C');
$pdf->Cell(60,5,$cons2['nombre'],1,0,'C');
$pdf->Cell(60,5,$cons2['valor'],1,0,'C');


$pdf->Ln();
}}}

ob_end_clean();
$pdf->Output();
?>
