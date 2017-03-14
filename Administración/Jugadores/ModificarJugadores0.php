
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();
include('../../conexion.php');  
include('../Encabezado.html');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2 or $pruebadeinicio==4) {

$letras=$_SESSION['admin'];
$numeros=mysql_query("SELECT * from tb_torneo where usuario='$letras'")or die(mysql_error());
$caracteres=mysql_fetch_array($numeros);
$name=$caracteres['id_torneo'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



  <title>Copa Amistad Profesional modulo de Administracion</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
<link rel="stylesheet" href="../../Formularios/formoid10_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="../../Formularios/formoid10_files/formoid1/jquery.min.js"></script>
<form action="ModificarJugadores1.php" class="formoid-flat-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">
  <br><br>

<?php


if (isset($_POST['buscar'])) {


$equipo = $_POST['equipo'];

$nombreequipo= mysql_query("SELECT * FROM tb_equipos where id_equipo=$equipo ");
$res=mysql_fetch_array($nombreequipo);
$jugadores=mysql_query("SELECT * FROM tb_jugadores where equipo=$equipo ORDER BY nombre1 asc");

if (mysql_num_rows($jugadores) > 0)
  {
   echo"&nbsp&nbsp<center><h3>Jugadores de ".$res['nombre_equipo'].": </h3><center><BR><select name='idjugador' >\n";
    while ($temp = mysql_fetch_array($jugadores))
      {
       print" <option value='".$temp["id_jugadores"]."'>".$temp["nombre1"]." ".$temp["nombre2"]." ".$temp["apellido1"]." ".$temp["apellido2"]."</option>\n";
      }
   echo" </select></center></center>\n";
   ?>
   <br><br>
<center><div style="margin-left:80px">
<input type="submit" value="Modificar" name="modificar"/>
<input type="submit" value="Eliminar" name="eliminar"/>
</div></center>
<br><br>
   <?php
  }
  else
     {
      ?>
<center>
      <?php
      echo"No hay datos";
      ?>
</center>
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


</form><br><br>
</body>
</html>