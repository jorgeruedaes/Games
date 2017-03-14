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
  <link rel="stylesheet" href="../../Formularios/formoid15_files/formoid1/formoid-flat-black.css" type="text/css" />
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
<script type="text/javascript" src="../../Formularios/formoid15_files/formoid1/jquery.min.js"></script>
<form class="formoid-flat-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="post"><center><div class="title"><h2>Selecciona la fecha:</h2></div></center>
<br><center>
<b><label >Búsqueda por fecha:</label><b>
<select name="fecha" class="small">

<?php
$equipos=mysqli_query($conexion,"SELECT DISTINCT numero_fecha from tb_partidos  ORDER BY numero_fecha asc ");
while($listaequipos=mysqli_fetch_array($equipos)){
             ?>
<option value="<?php echo $listaequipos['numero_fecha'];  ?>" ><?php echo $listaequipos['numero_fecha']; ?> </option>

    <?php 
}
?>
</select></center>

<div class="submit"><input type="submit" value="Buscar" name="buscar"/></div></form>
<script type="text/javascript" src="../../Formularios/formoid15_files/formoid1/formoid-flat-black.js"></script>
</center>
<br>



<?php

if (isset($_POST['buscar'])) {
  ?>
  <form action="ModificarResultados1.php"class="formoid-flat-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">
<center><div class="title"><h2>Selecciona el partido a modificar:</h2></div></center><br>

  <?php

$fecha = $_POST['fecha']; 
 
$buscarpartidos=mysqli_query($conexion,"SELECT * FROM tb_partidos WHERE numero_fecha = '$fecha' and Estado='2'");

if (mysqli_num_rows($buscarpartidos) > 0)
  {
   echo "&nbsp&nbsp Partidos: <select name='partido'>\n ";


while($busqueda = mysqli_fetch_array($buscarpartidos)){

      $idequipo1= $busqueda['equipo1'];
      $idequipo2= $busqueda['equipo2'];
      $nombreequipo1= mysqli_query($conexion,"SELECT * from tb_equipos where id_equipo=$idequipo1");
      $nombreequipo2= mysqli_query($conexion,"SELECT * from tb_equipos where id_equipo=$idequipo2");

while ($temp1=mysqli_fetch_array($nombreequipo1)){

  while  ($temp2=mysqli_fetch_array($nombreequipo2)){

print" <option value='".$busqueda["id_partido"]."'>".$temp1["nombre_equipo"]." vs ".$temp2["nombre_equipo"]."</option>\n";
      }}}
   echo" </select>\n";
}
  else
     {
      echo"No hay datos";
     }
?>

<div class="submit"><input type="submit" value="Ir" name="ir"/></div></form>

<?php

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