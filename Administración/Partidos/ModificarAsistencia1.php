<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();
include('../../conexion.php');  
include('../Encabezado.html');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2) {

  $letras=$_SESSION['admin'];
  $numeros=mysqli_query($conexion,"select * from tb_torneo where usuario='$letras'");
  $caracteres=mysqli_fetch_array($numeros);
  $name=$caracteres['id_torneo'];
  ?>

  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
   <!--<meta http-equiv="Content-type" content="text/html; charset=utf-8" />-->
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Copa Amistad Profesional modulo de Administracion</title>
   <link rel="stylesheet" href="../../css/styler.css" type="text/css" media="all" />
   <!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
 </head>
 <style type="text/css">
  #bienvenido{

    width: auto;
    margin-left: 0px;
    margin-right: 15px;
    margin-top: 0px;
    float: right;
    color: black;

  }


</style>
<body>

  <br><br>
  <?php
  if (isset($_POST['buscar'])) {
   $partido=$_POST['partido1'];
   ?>
   <link rel="stylesheet" href="../../Formularios/formoid5_files/formoid1/formoid-solid-dark.css" type="text/css" />
   <script type="text/javascript" src="../../Formularios/formoid5_files/formoid1/jquery.min.js"></script>

   <script type="text/javascript" src="../../Formularios/formoid5_files/formoid1/formoid-solid-dark.js"></script>

   <form  id="principal"
   class="formoid-solid-dark" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',
   Arial,Helvetica,sans-serif;color:#34495E;max-width:800px;min-width:150px" method="POST">
   <br>
   <b><label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspJugadores&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAsistencia</label></b>
    <br>
    <input type="hidden" name="partido" value="<?php echo $partido;?>">
    <?php
    $consulta1=mysqli_query($conexion,"SELECT * from tb_partidos where id_partido=$partido");
    $resultado1=mysqli_fetch_array($consulta1);

    $idequipo1= $_POST['equipo'];
    $consulta2=mysqli_query($conexion,"SELECT * FROM tb_jugadores WHERE equipo=$idequipo1 ORDER BY nombre1 asc");
    $i=0;
    while($consultajugadores = mysqli_fetch_array($consulta2)){

      $idjugador=$consultajugadores['id_jugadores'];
      $consulta3= mysqli_query($conexion,"SELECT * from tr_jugadoresxpartido where partido=$partido and jugador=$idjugador ");
      ?>

      <input style="margin-left: 40px;" class="medium" style="margin-left:2px"type="text" name="jugador<?php echo $i ?>" readonly="readonly" value="<?php echo $consultajugadores['nombre1']." ".$consultajugadores['nombre2']." ".$consultajugadores['apellido1']." ".$consultajugadores['apellido2']; ?>"/>
      <?php
      if(mysqli_num_rows($consulta3) > 0){
       ?>

       <input type="hidden" name="numeroasistente<?php echo $i; ?>" value="<?php echo $idjugador;  ?>"/>

       <div class="element-checkbox" style="width:80px;float:right"><input  type="checkbox" checked="checked" name="checkbox<?php echo $i ?>" value="Reasistencia"/><span></span></div>


       <?php 

     }else{
      ?>

      <input type="hidden" name="numeroasistente<?php echo $i; ?>" value="<?php echo $idjugador;  ?>"/>
      <div class="element-checkbox" style="width:80px;float:right"><input  type="checkbox"  name="checkbox<?php echo $i ?>" value="Asistió"/><span></span></div>
      <?php
    }
    ?>


    <?php
    $i=$i+1;
  }
}

?>
<input type="hidden" name="numerojugadores" value="<?php echo $i ?>"/>
<br><br>
<br>
<center><input type="submit" value="Guardar" name="guardar"></center>
</form>
<?php
}

if (isset($_POST['guardar'])) {

  $partido = $_POST['partido'];
  $nueva=mysqli_fetch_array(mysqli_query($conexion,"SELECT numero_fecha FROM tb_partidos WHERE id_partido=$partido"));
  $jornada=$nueva['numero_fecha'];
  $totaljugadores = $_POST['numerojugadores'];
  $matriz['35']['1']=0;


  for ($i=0; $i < $totaljugadores; $i++) { 
   $matriz[$i]['0']=$_POST['numeroasistente'.$i];
   if(empty($_POST['checkbox'.$i])){
    $matriz[$i]['1']="off";
  }else{
    $matriz[$i]['1']=$_POST['checkbox'.$i];
  }  
}
for ($i=0; $i <$totaljugadores ; $i++) {
  $identificarjugador=$matriz[$i]['0'];
  $identificarsituacion=$matriz[$i]['1'];

  if ($identificarsituacion == "off") {
    $querydeprueba=mysqli_query($conexion,"SELECT * FROM tr_jugadoresxpartido WHERE jugador=$identificarjugador");
    $numero= mysqli_num_rows($querydeprueba);
    if ($numero >0) {
      mysqli_query($conexion,"DELETE FROM `tr_jugadoresxpartido` WHERE jugador=$identificarjugador and partido=$partido"); 
      mysqli_query($conexion,"DELETE FROM `tr_amonestacionesxjugador` WHERE jugador=$identificarjugador AND jornada_amonestacion=$jornada")
      ?>
      <?php

    }else{

    }

  }else if ($identificarsituacion == "Reasistencia") {

  }else if ($identificarsituacion == "Asistió") {
    ?>
    <?php
    mysqli_query($conexion,"INSERT INTO `tr_jugadoresxpartido`(`jugador`, `partido`, `amonestacion`, `goles`,`autogoles`) VALUES ('$identificarjugador','$partido',5,0,0)");
  }
  
}



?>
<script>

  alert("Se modifico la asistencia")
  window.location.href="ModificarAsistencia.php";
</script>
<?php



}

?>
<br><br>
</body>
</html>