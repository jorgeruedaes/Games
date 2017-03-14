<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();
include('../../../conexion.php');  
include('../Encabezado.html');
include('../../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2) {

$letras=$_SESSION['admin'];
$numeros=mysqli_query($conexion,"SELECT * from tb_torneo where usuario='$letras'");
$caracteres=mysqli_fetch_array($numeros);
$name=$caracteres['id_torneo'];
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>Copa Amistad Profesional modulo de Administracion</title>
  <link rel="stylesheet" href="../../../css/styler.css" type="text/css" media="all" />
  <script type="text/javascript" src="../../../Formularios/formoid14_files/formoid1/formoid-flat-black.js"></script>
  <link rel="stylesheet" href="../../../Formularios/formoid14_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="../../../Formularios/formoid14_files/formoid1/jquery.min.js"></script>
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

 $equipo = $_POST['equipo'];

 $cons=mysqli_query($conexion,"SELECT nombre_equipo from tb_equipos where id_equipo=$equipo");
 $result=mysqli_fetch_array($cons);

?>

<center><div class="title"><h2><?php echo $result['nombre_equipo']?></h2></div></center>
<div>
<br><br>

<center><div class="title"><h2>Amonestaciones de equipo</h2></div></center>
<br>
<?php

}
  $equipo = $_POST['equipo'];

$i=0;

$consultaamon = mysqli_query($conexion,"SELECT * FROM tr_amonestacionxequipo WHERE id_equipo=$equipo and estado_amonestacion='1' and amonestacion !='5'");

while($res1=mysqli_fetch_array($consultaamon)){
    
    $amon = $res1['amonestacion'];

 $nombreamon = mysqli_query($conexion,"SELECT * FROM tb_amonestaciones where id_amonestacion=$amon");
 $consulta=  mysqli_fetch_array($nombreamon);
?>



<div>
    <form action="ModificarAmonestacionesEquipo2.php" class="formoid-flat-black" 
   style="background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="post" >
  <div class="element-input"><label style="font-weight: bolder;" class="title">Amonestación:</label><?php echo $consulta['nombre']; ?></div>
   <center><input style="margin-left:20px"type="checkbox"  name="vigencia<?php echo $i ?>" value="<?php echo $res1['id_amonestacionxequipo']; ?>"/><span style="margin-left:25px">Marcar como antigua</span></center>
<div>

</body>
</html>

<br><br>
<?php
$i=$i+1;
}
?>
<input type="hidden" value="<?php echo $i ?>" name="numerodemultas"/>
<center><input type="submit" value="Guardar" name="guardar" /></center>
</form></div>

<?php



?>