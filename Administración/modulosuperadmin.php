<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();
include('../conexion.php');  
include('RutinaDeLogueo.php');
if ($pruebadeinicio==1) {


$letras=$_SESSION['admin'];
$numeros=mysqli_query($conexion,"SELECT * from tb_torneo where usuario='$letras'")or die(mysql_error());
$caracteres=mysqli_fetch_array($numeros);
$name=$caracteres['id_torneo'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Copa Amistad Profesional modulo de administracion</title>
	<link rel="stylesheet" href="../css/styler.css" type="text/css" media="all" />
	    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 <script src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>
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
	
	<div id="header">
		<b><p style="color:#32CD32;font-size:15px"id="bienvenido">Bienvenido  <?php echo $_SESSION['admin']  ?></p></b>
		
		<b><a style="font-size:12px"class="cerrar" href="cerrarsesion.php">Cerrar sesión</a></b>
	
	
		<div class="shell">
	    <h1 id="logo" class="notext"><a href="#">Copa Amistad Profesional</a></h1>

		</div>
	</div>

	<div id="navigation">
		<div class="shell">
			<div class="cl">&nbsp;</div>
			<ul>
				 <li><a href="#">Agregar</a>
				 <ul>
		<li><a href="Agregar/AgregarJugadores.php">Jugadores</a></li>
		<li><a href="Agregar/AgregarEquipos.php">Equipos</a></li>
		<li><a href="Agregar/AgregarPartidoAlCalendario.php">Partidos</a></li>
		<li><a href="Agregar/form_noticias.php">Noticias</a></li>
		<li><a href="Agregar/AgregarResultados.php">Resultados</a></li>
		</ul>
	</li>

				 <li><a href="#">Modificar</a>

<ul>	<li><a href="Modificar/ModificarJugadores.php">Jugadores</a></li>
		<li><a href="Modificar/ModificarEquipos.php">Equipos</a></li>
		<li><a href="Modificar/ModificarNoticias.php">Noticias</a></li>
		<li><a href="Modificar/ModificarResultados.php">Resultados</a></li>
		<li ><a href="#">Amonestaciones</a>
<ul id="lista" style="
    display: inline-table;
    margin-top: 10px;

">
	<li ><a href="Modificar/ModificarAmonestaciones.php">Dellates</a></li>
	<li><a href="Modificar/ModificarAmonestacionesDePartidos.php" >Por partido</a></li>
</ul>
	</li>


		<li><a href="Modificar/ModificarCalendario.php">Calendario</a></li>
		<li><a href="Modificar/ModificarAsistencia.php">Asistencia</a></li>
	</ul>

			    </li>
			    
			    </li>
			    
			   <li><a href="Estadisticas.html">Estadísticas</a></li>

			   <li><a href="ModuloTraspasos.html">Traspasos</a></li>

			    <li><a href="#">Informes</a>
			    <ul>	
		
		<li><a href="Modificar/pdf.php">Amonestaciones</a></li>
		<li><a href="Modificar/pdf1.php">Ficha técnica</a></li>
		<li><a href="Modificar/pdf2.php">Posiciones</a></li>
		<li><a href="Modificar/pdf3.php">Goleadores</a></li>
	</ul>
	 <li><a href="ModuloTraspasos.html">Usuarios</a>
    <ul>	
		
		<li><a href="Admin/Crearusuario.php">Crear </a></li>
		<li><a href="Admin/Modificar.php">Modificar </a></li>
		<li><a href="Admin/VerUsuarios.php">Ver </a></li>
		<li><a href="Admin/Parametrosdeltorneo.php">Parametros</a></li>
	</ul>
	 </li>
			</ul>
			<div class="cl">&nbsp;</div>
		
	</div>
	<div id="footer">
		<div class="shell">
			<div class="cl">&nbsp;</div>
			
			<div class="cl">&nbsp;</div>
		</div>
	</div>
</div>
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