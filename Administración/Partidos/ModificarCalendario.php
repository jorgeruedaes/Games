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
<center><div class="title"><h2>Listado de partidos</h2></div></center>
<br>
  
<link rel="stylesheet" href="../../Formularios/formoid17_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="../../Formularios/formoid17_files/formoid1/jquery.min.js"></script>
<?php
$partidos = mysqli_query($conexion,"SELECT * from tb_partidos WHERE Estado!='2'    and Estado!=6");
  while ($res_partidos=mysqli_fetch_array($partidos)) {

$equipo1=$res_partidos['equipo1'];
$equipo2=$res_partidos['equipo2'];
$estado=$res_partidos['Estado'];
$partido=$res_partidos['id_partido'];
$idlugar=$res_partidos['Lugar'];

$nombrelugar= mysqli_query($conexion,"SELECT * from tb_lugares WHERE id_lugar='$idlugar'");
$equi1=mysqli_query($conexion,"SELECT * from tb_equipos WHERE id_equipo='$equipo1'");
$equi2=mysqli_query($conexion,"SELECT * from tb_equipos WHERE id_equipo='$equipo2'");
$nombreestado=mysqli_query($conexion,"SELECT * from tb_estados_partido WHERE id_estado='$estado'");

$res=mysqli_fetch_array($nombreestado);
$result=mysqli_fetch_array($nombrelugar);
while($res1= mysqli_fetch_array($equi1)){
  
while($res2= mysqli_fetch_array($equi2)){


?>

<form action="ModificarCalendario1.php"class="formoid-flat-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:500px;min-width:150px" method="post">
  <div class="element-input"><label class="title"></label>
<input style="font-weight:bold;width:330px" size="30"  type="text" readonly="readonly" name="equipos" value="<?php echo $res1['nombre_equipo']." vs ".$res2['nombre_equipo']?>"  />
<input type="hidden" name="idequipo1" value="<?php echo $equipo1?>">    
<input type="hidden" name="idequipo2" value="<?php echo $equipo2?>">    
<input type="hidden" name="idpartido" value="<?php echo $partido?>">    
<input type="hidden" name="idestado" value="<?php echo $estado?>">
<input type="hidden" name="fecha" value="<?php echo $res_partidos['fecha']?>">
<input type="hidden" name="hora" value="<?php echo $res_partidos['hora']?>">
<input type="hidden" name="lugar" value="<?php echo $res_partidos['Lugar']?>">
<button style="width:100px;padding-left:10px;padding-right:10px;margin-left:10px"class="boton_modificar" name="modificar" type="submit">Modificar</button>
<label>Fecha:</label> <input  type="text" readonly="readonly" size="30" value="<?php echo $res_partidos['fecha']?>">
<label>Hora:</label> <input  type="text" readonly="readonly" size="30" value="<?php echo $res_partidos['hora']?>">
<label>Lugar:</label> <input  type="text" readonly="readonly" size="30" value="<?php echo $result['nombre']?>">
<label>Estado:</label> <input type="text" size="30" readonly="readonly" value="<?php echo $res['nombre']?>">
</div>

</form><script type="text/javascript" src="../../Formularios/formoid17_files/formoid1/formoid-flat-black.js"></script>
<br>
</body>
</html>
<?php
}
}}
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