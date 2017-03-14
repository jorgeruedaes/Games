<?php
session_start();
include('../../conexion.php');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2) {

if (isset($_POST['guardar'])) {

$idpartido=$_POST['idpartido'];
$resultado1=$_POST['resultado1'];
$resultado2=$_POST['resultado2'];
$numero=$_POST['numerodejugadores'];
$matriz['75']['1']=0;
for ($i=0; $i <$numero ; $i++) { 
	$matriz[$i]['0']=$_POST['idjugadores'.$i];
	$matriz[$i]['1']=$_POST['nuevosgoles'.$i];
    $matriz[$i]['2']=$_POST['nuevosautogoles'.$i];
}
for ($i=0; $i <$numero ; $i++) { 
	$id=$matriz[$i]['0'];
	$goles=$matriz[$i]['1'];
    $autogoles=$matriz[$i]['2'];
	$guardargoles= mysqli_query($conexion,"UPDATE tr_jugadoresxpartido SET goles=$goles,autogoles=$autogoles WHERE jugador=$id AND partido=$idpartido");
}
$guardarnuevoresultado=mysqli_query($conexion,"UPDATE tb_partidos SET resultado1=$resultado1, resultado2=$resultado2 WHERE id_partido=$idpartido");
if($guardarnuevoresultado=== FALSE) { 

   ?>
    <script>

  alert("Falló la modificación")
 window.location.href="ModificarResultados.php";
 
   </script>

<?php
  }

else{

?>
    <script>

  alert("Resultados Modificados!")
 window.location.href="ModificarResultados.php";
 
   </script>

<?php

}
}
}else{
      ?>
<!-- CUANDO EL PERSONAJE NO ESTA AUTORIZADO PARA EL INGRESO-->
<br><br>
<center>
    <div>
        <label>Lo sentimos pero usted no tiene autorización para estar en este lugar.</label>
    </div>
</center>
<center><button  type="submit" ><a href="iniciox.php">Volver</a></button></center>
<?php
}

?>