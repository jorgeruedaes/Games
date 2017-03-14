
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();
include('../../conexion.php'); 
include('../Encabezado.html');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2) {

$letras=$_SESSION['admin'];
$numeros=mysql_query("SELECT * from tb_torneo where usuario='$letras'")or die(mysql_error());
$caracteres=mysql_fetch_array($numeros);
$name=$caracteres['id_torneo'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Copa Amistad Profesional modulo de Administracion</title>
	<link rel="stylesheet" href="../../css/styler.css" type="text/css" media="all" />
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
	
	
<br><br><br>
<BR><BR>
<link rel="stylesheet" href="../../Formularios/formoid_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="../../Formularios/formoid_files/formoid1/jquery.min.js"></script>

<form action="AgregarEquipos.php" class="formoid-flat-black" style="background-color:#FFFFFF;font-size:16px;font-family:'Lato', sans-serif;color:#666666;max-width:500px;min-width:150px" method ="post">
	<div class="title"><h2>Nuevo equipo</h2></div>
	<div class="element-input" title="sccxc"><label class="title">Nombre del nuevo equipo:</label><input class="medium" type="text" name="nombre" id="nombre" required/></div>
	<div class="element-input"><label class="title">Nombre del técnico 1:</label><input class="large" type="text" name="tecnico1" id="tecnico1" required/></div>
	<div class="element-input"><label class="title">Nombre del técnico 2:</label><input class="large" type="text" name="tecnico2" id="tecnico2" / ></div>
<div class="submit"><input type="submit" value="Agregar" name="enviar"/></div>
<input type="hidden" value="1" name="torneo">
<input type="hidden" value="0" name="puntos">
</form>

<script type="text/javascript" src="../../Formularios/formoid_files/formoid1/formoid-flat-black.js"></script>


</body>
</html>
<?php
}

if(isset($_POST['enviar'])){

// INSERTAR EQUIPOS EN LA BASE DE DATOS

	$nombre= $_POST['nombre'];
	$tecnico1= $_POST['tecnico1'];
	$tecnico2= $_POST['tecnico2'];
	//$imagen= $_POST['imagen'];
	$puntos= $_POST['puntos'];
	$torneo= $_POST['torneo'];
	$guardaramonestacion =  mysql_query("INSERT INTO `tb_equipos`(`id_equipo`, `nombre_equipo`, `tecnico1`, `tecnico2`, `puntos`, `torneo`, `imagen_escudo`) 
	VALUES (NULL,'$nombre','$tecnico1','$tecnico2','$puntos','$torneo','xx')");

	echo "<script language='JavaScript' type='text/javascript'>
alert('Equipo Creado!');
</script>";

}

?>