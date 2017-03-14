<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();
include('../../conexion.php');  
include('../Encabezado.html');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2) {


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
.cerrar{

  color: #000000;
  float: right;
  clear: right;
  padding-right:  15px;
}
</style>
<body>
  
  
<br><br>
<link rel="stylesheet" href="../../Formularios/formoid9_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="../../Formularios/formoid9_files/formoid1/jquery.min.js"></script>
<script type="text/javascript" src="../../Formularios/formoid9_files/formoid1/formoid-flat-black.js"></script>
<form class="formoid-flat-black" style="background-color:#FFFFFF;font-size:16px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="get">
  <div class="title"><h2>Nuevo partido</h2></div>
  <div class="element-date"><label class="title">Fecha del partido:</label><input class="large" data-format="yyyy-mm-dd" type="date" name="fecha" placeholder="yyyy-mm-dd" required/></div>
  <div class="element-date"><label class="title">Hora del partido:</label><input class="medium" type="time" name="hora" value="12:00:00" min="07:00:00" max="22:00:00" step="1"required/></div>

  <div ><label >Lugar:</label><div ><span><select name="lugar" required>

   <?php
$lugares=mysqli_query($conexion,"select id_lugar,nombre from tb_lugares");
while($lug=mysqli_fetch_array($lugares)){
             ?>
<option value="<?php echo $lug['id_lugar'];  ?>" selected="selected"><?php echo $lug['nombre']; ?> </option>

<?php 
}

?></select><i></i></span></div></div>
  <div ><label>Equipo Local:</label><div ><span><select name="EquipoA" required>

    <?php
   $EAs=mysqli_query($conexion,"SELECT id_equipo,nombre_equipo from tb_equipos ORDER BY nombre_equipo asc ");
while($EA=mysqli_fetch_array($EAs)){
             ?>
<option value="<?php echo $EA['id_equipo'];  ?>"><?php echo $EA['nombre_equipo']; ?> </option>

<?php 
}
?>
</select><i></i></span></div></div>
  <div ><label >Equipo Visitante:</label><div ><span><select name="EquipoB" required >

    <?php
   $EBs=mysqli_query($conexion,"SELECT id_equipo,nombre_equipo from tb_equipos ORDER BY nombre_equipo asc");
while($EB=mysqli_fetch_array($EBs)){
             ?>
<option value="<?php echo $EB['id_equipo'];  ?>"><?php echo $EB['nombre_equipo']; ?> </option>

<?php 
}
?></select><i></i></span></div></div>
  <div ><label >Juez:</label><div ><span><select name="juez" required>

    <?php
$lugares=mysqli_query($conexion,"select id_arbitro,nombre from tb_arbitros");
while($lug=mysqli_fetch_array($lugares)){
             ?>
<option value="<?php echo $lug['id_arbitro'];  ?>" selected="selected"><?php echo $lug['nombre']; ?> </option>

<?php 
}

?></select><i></i></span></div></div>
  <div class="element-input"><label class="title">Número de la fecha:</label><input class="small" type="text" name="NumeroF" required/></div>
<div class="submit"><center><input type="submit" value="Crear" name="cargar"/></center></div></form>
<!-- Stop Formoid form-->


  <?php

if (isset($_GET['cargar'])) {
  if ($_GET['EquipoA']==$_GET['EquipoB']) {
    echo "Los partidos deben ser entre equipos diferentes, intenta nuevamente";
  } else {

     $pal=$_GET['EquipoA'];
    $pal1=$_GET['EquipoB'];
    $pal3=$_GET['fecha'];
    $pal4=$_GET['hora'];
    $pal5=$_GET['lugar'];
    $pal8=$_GET['NumeroF'];
    $pal9=$_GET['juez'];
 $mymodifi=mysqli_query($conexion,"INSERT INTO `tb_partidos`(`id_partido`, `equipo1`, `equipo2`, `resultado1`, `resultado2`, `fecha`, `numero_fecha`, `Lugar`, `Estado`, `Juez`,`hora`) VALUES (NULL,'$pal','$pal1',0,0,'$pal3','$pal8','$pal5','1','$pal9','$pal4');");
 echo "<script language='JavaScript' type='text/javascript'>
alert('Partido creado!');
</script>
               ";
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



</body>
</html>
