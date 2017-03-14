
<?php
session_start();
include('../../../conexion.php');
include('../../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2) {

if (isset($_POST['guardar'])) {

$idpartido=$_POST['partido'];
$numero=$_POST['numerojugadores'];
$matriz['75']['1']=0;
for ($i=0; $i <$numero ; $i++) { 
	$matriz[$i]['0']=$_POST['numeroasistente'.$i];
	$matriz[$i]['1']=$_POST['tarjeta'.$i];
}
for ($i=0; $i <$numero ; $i++) { 
	$id=$matriz[$i]['0'];
	$tarjeta=$matriz[$i]['1'];
// CUANDO LA PERSONA NO TIENE AMONESTACION AHORA
if($tarjeta==5){
// TENIA TARJETA PROBAMOS HABER 

  $consulta1=mysqli_query($conexion,"SELECT * from tr_jugadoresxpartido WHERE amonestacion=1 and jugador=$id and partido=$idpartido");
  $consulta2=mysqli_query($conexion,"SELECT * from  tr_jugadoresxpartido WHERE amonestacion=2 and jugador=$id and partido=$idpartido");  
if((mysqli_num_rows($consulta1)>0) || (mysqli_num_rows($consulta2)>0)){


    $iddelatarjeta=mysqli_fetch_array(mysqli_query($conexion,"SELECT id_amonestacioxjugador from tr_amonestacionesxjugador WHERE jugador=$id and 
      jornada_amonestacion IN (SELECT numero_fecha from tb_partidos WHERE id_partido=$idpartido) "));
  $latarjeta=$iddelatarjeta['id_amonestacioxjugador'];
    $modificcartr=mysqli_query($conexion,"UPDATE tr_jugadoresxpartido SET amonestacion=$tarjeta WHERE jugador=$id and partido=$idpartido");
    $queryborrar=mysqli_query($conexion,"DELETE FROM `tr_amonestacionesxjugador` WHERE id_amonestacioxjugador=$latarjeta ");

}else{
// NO PASA NADA YA QUE LA PERSONA NO TENIA AMONESTACION Y CONTINUA IGUAL
}

}elseif ($tarjeta==1) {
  $consulta1=mysqli_query($conexion,"SELECT * from tr_jugadoresxpartido WHERE amonestacion=1 and jugador=$id and partido=$idpartido");
  $consulta2=mysqli_query($conexion,"SELECT * from tr_jugadoresxpartido WHERE amonestacion=2 and jugador=$id and partido=$idpartido");  
if(mysqli_num_rows($consulta1)>0 || mysqli_num_rows($consulta2)>0){
  $iddelatarjeta=mysqli_fetch_array(mysqli_query($conexion,"SELECT id_amonestacioxjugador from tr_amonestacionesxjugador WHERE jugador=$id and jornada_amonestacion
   IN (SELECT numero_fecha from tb_partidos WHERE id_partido=$idpartido) "));
  $latarjeta=$iddelatarjeta['id_amonestacioxjugador'];
    $modificcartr=mysqli_query($conexion,"UPDATE tr_jugadoresxpartido SET amonestacion=$tarjeta WHERE jugador=$id and partido=$idpartido");
$modificaamonestaciones= mysqli_query($conexion,"UPDATE `tr_amonestacionesxjugador` SET `amonestacion`=$tarjeta WHERE `id_amonestacioxjugador`=$latarjeta");

}else{
  // CUANDO EL JUGADOR NO TENIA AMONESTACION Y AHORA VA A TENER!!
  $modificaamonestaciones= mysqli_query($conexion,"UPDATE tr_jugadoresxpartido SET amonestacion=$tarjeta WHERE jugador=$id AND partido=$idpartido");
  // SACAR EL NUMERO DE LA FECHA PARA HACER LA RESPECTIVA INSERCION 
  $paralajornada=mysqli_fetch_array(mysqli_query($conexion,"SELECT numero_fecha from tb_partidos WHERE id_partido=$idpartido"));
  $jornada=$paralajornada['numero_fecha'];
  $insert=mysqli_query($conexion,"INSERT INTO `tr_amonestacionesxjugador`
    (`id_amonestacioxjugador`, `jugador`, `amonestacion`, `estado_amonestacion`, `duracion`, `comentario`, `jornada_amonestacion`)
   VALUES (null,$id,$tarjeta,'1','1','comentario',$jornada)");
}


}elseif ($tarjeta==2) {

$consulta1=mysqli_query($conexion,"SELECT * from tr_jugadoresxpartido WHERE amonestacion=1 and jugador=$id and partido=$idpartido");
  $consulta2=mysqli_query($conexion,"SELECT * from  tr_jugadoresxpartido WHERE amonestacion=2 and jugador=$id and partido=$idpartido");  


if(mysqli_num_rows($consulta1)>0 || mysqli_num_rows($consulta2)>0){
  $iddelatarjeta=mysqli_fetch_array(mysqli_query($conexion,"SELECT id_amonestacioxjugador from tr_amonestacionesxjugador WHERE jugador=$id and jornada_amonestacion
   IN (SELECT numero_fecha from tb_partidos WHERE id_partido=$idpartido) "));
  $latarjeta=$iddelatarjeta['id_amonestacioxjugador'];
    $modificcartr=mysqli_query($conexion,"UPDATE tr_jugadoresxpartido SET amonestacion=$tarjeta WHERE jugador=$id and partido=$idpartido");
$modificaamonestaciones= mysqli_query($conexion,"UPDATE `tr_amonestacionesxjugador` SET `amonestacion`=$tarjeta WHERE `id_amonestacioxjugador`=$latarjeta");

}else{
  // CUANDO EL JUGADOR NO TENIA AMONESTACION Y AHORA VA A TENER!!
  $modificaamonestaciones= mysqli_query($conexion,"UPDATE tr_jugadoresxpartido SET amonestacion=$tarjeta WHERE jugador=$id AND partido=$idpartido");
  // SACAR EL NUMERO DE LA FECHA PARA HACER LA RESPECTIVA INSERCION 
  $paralajornada=mysqli_fetch_array(mysqli_query($conexion,"SELECT numero_fecha from tb_partidos WHERE id_partido=$idpartido"));
  $jornada=$paralajornada['numero_fecha'];
  $insert=mysqli_query($conexion,"INSERT INTO `tr_amonestacionesxjugador`
    (`id_amonestacioxjugador`, `jugador`, `amonestacion`, `estado_amonestacion`, `duracion`, `comentario`, `jornada_amonestacion`)
   VALUES (null,$id,$tarjeta,'1','1','comentario',$jornada)");
}
}
}
?>
<script type="text/javascript">
  alert("Todo ha sido consumado");
     window.location.href="ModificarAmonestacionesDePartidos.php";
</script>
<?php
}
}

?>