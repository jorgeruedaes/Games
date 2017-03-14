


<?php
session_start();
include('../../conexion.php');
include('../Encabezado.html');
include('../RutinaDeLogueo.php');
//Consulta para mostrar las noticias existentes
if($pruebadeinicio==1 or $pruebadeinicio==2){
if(isset($_POST['editar'])){ 

$idnoticia = $_POST['idnoticia']; 

$mostrarnoticia=mysql_query("select * FROM tb_noticias where id_noticias=$idnoticia");

while($mostrada=mysql_fetch_array($mostrarnoticia)){
$imagen= $mostrada['imagen'];
			

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
</style>
<body>


<br><br>

<link rel="stylesheet" href="../../Formularios/formoid7_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="../../Formularios/formoid7_files/formoid1/jquery.min.js"></script>
<form action="editarnoticia1.php" enctype="multipart/form-data" class="formoid-flat-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">
	<center><div class="title"><h2>Noticia</h2></div></center>
	<div class="element-input"><label class="title">Título de la noticia:</label><input class="large" type="text" name="titulo" value="<?php echo $mostrada['titulo']; ?>" /></div>
	<div class="element-textarea"><label class="title">Descripción:</label><textarea class="medium" name="texto" cols="20" rows="5" ><?php echo $mostrada['texto']; ?></textarea></div>


	<div class="element-file"><label class="title">Imagen nueva:</label><label class="large" ><div class="button">Seleccionar archivo</div><input type="file" class="file_input" name="imagen" /><div class="file_text">Ningún archivo seleccionado</div></label></div>
<input type="hidden" name="idnoticia" id="idnoticia" value="<?php echo $mostrada['id_noticias']; ?>">        
	<div class="submit"><input type="submit" name="guardar" value="Guardar cambios"/></div></form>
<script type="text/javascript" src="../../Formularios/formoid7_files/formoid1/formoid-flat-black.js"></script>

<br><br>



<?php

}


//Consulta para eliminar noticias

if(isset($_POST['eliminar'])){

$idnoticia = $_POST['idnoticia']; 

$eliminarnoticia=mysql_query("DELETE FROM tb_noticias where id_noticias='$idnoticia'");
 
 if($eliminarnoticia==FALSE){

 	echo "No se pudo eliminar la noticia";
 }

 else{

?>
    <script>

  alert("La noticia se elimino exitosamente")
  window.location.href="ModificarNoticias.php";
  
  </script>

<?php
}

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