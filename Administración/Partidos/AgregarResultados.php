
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();
include('../../conexion.php');  
include('../Encabezado.html');
include('../RutinaDeLogueo.php');
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

	<br>
<div  data-theme="b">

	<center><div class="title"><h2>Resultados</h2></div></center>
<?php
$nametor = mysqli_query($conexion,"SELECT * from tb_partidos WHERE  Estado='1' ");
	while ($tor=mysqli_fetch_array($nametor)) {

	?>

<tr class="alt">
	
	<td>  
	 <?php
	 $nombre=$tor['equipo1'];
	 $par= $tor['id_partido'];

$nom=mysqli_query($conexion,"select * from tb_equipos where id_equipo=$nombre");
$nome1=mysqli_fetch_array($nom);

	   ?> 


	</td>
	
	<td> 
	 <?php 
$nombre=$tor['equipo2'];
$nom=mysqli_query($conexion,"select * from tb_equipos where id_equipo=$nombre");
$nome2=mysqli_fetch_array($nom);

	
$final = $nome1['nombre_equipo']." vs ".$nome2['nombre_equipo'];  
$par= $tor['id_partido'];
 
 	?>


	 </td>
	 
</tr>

<link rel="stylesheet" href="../../Formularios/formoid2_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="../../Formularios/formoid2_files/formoid1/jquery.min.js"></script>
<form action= "formularioResultados.php"class="formoid-flat-black" style="background-color:#FFFFFF;font-size:13px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">
<input type="hidden"  name="equipo1" value="<?php echo $nome1['id_equipo'];?>">
<input type="hidden" name="equipo2" value="<?php echo $nome2['id_equipo'];?>">
	<div class="element-input"><label class="title"></label><input style="width:360px" type="text" name="input" readonly="readonly" value="<?php echo $final; ?>" />
<input type="submit" name="agregar" value="+"/>
</div>

<input type="hidden"  name="idpartido" value="<?php echo $par;?>">

	<!--<a href="formularioResultados.php?id=<?php echo $tor['id_partido'];?>">Agregar Resultado</a>-->
</form><script type="text/javascript" src="../../Formularios/formoid2_files/formoid1/formoid-flat-black.js"></script>

<?php

}

?>

	<div id="footer">
		<div class="shell">
			<div class="cl">&nbsp;</div>
			
			<div class="cl">&nbsp;</div>
		</div>
	</div>
</div>
	<!-- End Footer -->
</body>
</html>
<?php
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