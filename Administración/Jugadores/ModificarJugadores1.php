<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();
include('../../conexion.php');  
include('../Encabezado.html');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2 or $pruebadeinicio==4) {

$letras=$_SESSION['admin'];
$numeros=mysql_query("select * from tb_torneo where usuario='$letras'")or die(mysql_error());
$caracteres=mysql_fetch_array($numeros);
$name=$caracteres['id_torneo'];
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


<?php

if (isset($_POST['modificar'])) {

$id_jugador=$_POST['idjugador'];

$consultajugador=mysql_query("SELECT * FROM tb_jugadores where id_jugadores=$id_jugador");

if($datos=mysql_fetch_array($consultajugador))
{

$profesion = $datos['profesion'];
$estado = $datos['estado_jugador'];

$nombreprofesion=mysql_query("SELECT * from  tb_profesiones where id_profesion=$profesion");
$nombreestado=mysql_query("SELECT * from  tb_estados_jugador where id_estado=$estado");


$res=mysql_fetch_array($nombreprofesion);
$res1=mysql_fetch_array($nombreestado);
?>
<link rel="stylesheet" href="../../Formularios/formoid11_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="../../Formularios/formoid11_files/formoid1/jquery.min.js"></script>
<form action="ModificarJugadores2.php"enctype="multipart/form-data" class="formoid-flat-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:600px;min-width:150px" method="post">
  <center><div class="title"><h2>DATOS DEL JUGADOR</h2></div></center>
  <div class="element-input"><label class="title">Primer nombre:</label><input class="medium" type="text" name="primernombre" value="<?php echo $datos['nombre1']?>" /></div>
  <div class="element-input"><label class="title">Segundo nombre:</label><input class="medium" type="text" name="segundonombre" value="<?php echo $datos['nombre2']?>"/></div>
  <div class="element-input"><label class="title">Primer apellido:</label><input class="large" type="text" name="primerapellido" value="<?php echo $datos['apellido1']?>" /></div>
  <div class="element-input"><label class="title">Segundo apellido:</label><input class="large" type="text" name="segundoapellido" value="<?php echo $datos['apellido2']?>" /></div>
  <div class="element-date"><label class="title">Fecha de nacimiento:</label><input class="large" data-format="yyyy-mm-dd" type="text" name="fecha_nacimiento" value="<?php echo $datos['fecha_nacimiento']?>"/></div>
  <div class="element-email"><label class="title">E-mail:</label><input class="large" type="email" name="correo" value="<?php echo $datos['email']?>" /></div>
  <div class="element-phone"><label class="title">Télefono/celular:</label><input class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="telefono"  value="<?php echo $datos['telefono']?>"/></div>
  <div class="element-input"><label class="title">Profesión actual:</label><input class="medium" type="text" name="input1" readonly="readonly" value="<?php echo $res['nombre']?>"/></div>
  <div class="element-select"><label class="title">Profesión nueva: (Marcar la misma si no hay cambio)</label><div class="large"><span>
    <select name="profesion" >
   
<?php
$profesiones=mysql_query("SELECT * from tb_profesiones ORDER BY nombre asc");
while($listaprofesiones=mysql_fetch_array($profesiones)){
             ?>
<option value="<?php echo $listaprofesiones['id_profesion'];  ?>" selected="selected"><?php echo $listaprofesiones['nombre']; ?> </option>

    <?php 
}
?>
</select><i></i></span></div></div>
 <input type="hidden" value="<?php echo $datos['id_jugadores']?>" name="idjugador">
<div class="element-input"><label class="title">Estado actual:</label></div>

<div class="element-select"><div class="large"><span>
<select name="estado" >
<?php
if($res1['nombre']=="Activo"){
             ?>
<option value="1" selected="selected">Activo</option>
<option value="2">Inactivo</option>

    <?php 
}else{
               ?>
<option value="1" >Activo</option>
<option value="2" selected="selected">Inactivo</option>

    <?php 
}
?>
</select><i></i></span></div></div>

<div class="element-file"><label class="title">Foto:</label><label class="large" ><div class="button">Seleccionar archivo</div><input type="file" class="file_input" name="foto" /><div class="file_text">Ningún archivo seleccionado</div></label></div>
<div class="submit"><input type="submit" value="Modificar" name="modificar"/></div></form><script type="text/javascript" src="../../Formularios/formoid11_files/formoid1/formoid-flat-black.js"></script>
<br><br>

<?php

}

}}

if(isset($_POST['eliminar'])){

$id_jugador=$_POST['idjugador'];

$eliminarjugador=mysql_query("DELETE FROM tb_jugadores where id_jugadores=$id_jugador");
 
 if($eliminarjugador==FALSE){

  echo "No se pudo eliminar el jugador";
 }

 else{

?>
    <script>

  alert("Jugador eliminado!")
  window.location.href="ModificarJugadores.php";
  
  </script>

<?php
}

 }
?>
</body>
</html>