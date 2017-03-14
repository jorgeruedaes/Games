<html>

<?php
session_start();
 include('../../conexion.php');
include('../Encabezado.html');

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
#cuadronoticia{

   border-style: solid;
   border-width: 1px;
   
   padding-left: 10px;
   padding-right: 10px;
   width: 81%;
   position: relative;
   margin: 0 0 0 120px;
   padding-bottom: 5px;

   
}

.title{

	font-family: Arial;
    font-size: 23px;
	margin-top: 1px;
	margin-bottom: 0px;
}

#imagennoticia{
	
	position: absolute;
	height: 100px;
	margin-top: 20px;
}

.hora{

	margin-top: 3px;
	margin-bottom: 1px;
	text-align: justify;
	color: #4682B4;
	font-size: 14px;
}
.texto{

	margin-top: 3px;
	margin-bottom: 1px;
	text-align: justify;
	color: #2F4F4F;

	}

.boton_editar{

	float: right;
	margin-right: 5px;
	height: 40px;
}
.boton_eliminar{

	float: right;
	height: 40px;
}

</style>
<body>
  
<br><br>
<b><label style="margin-left:130px">Resultados Encontrados..</label></b>
<br><br>
<?php

if(isset($_POST['buscar'])){

 
$fecha = $_POST['fecha']; 
 
$buscarnoticia=mysql_query("select * FROM tb_noticias WHERE fecha = '$fecha'");

while($busqueda = mysql_fetch_array($buscarnoticia))


{
			$imagen= $busqueda['imagen'];
			$titulo= $busqueda['titulo'];
 			$texto= $busqueda['texto'];	
 			$fecha=$busqueda['fecha'];

	?>


<link rel="stylesheet" href="formoid6_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="formoid6_files/formoid1/jquery.min.js"></script>
<form action="editarnoticia.php"class="formoid-flat-black" style="height:150px;background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:1100px;min-width:150px" method="post">

<td><img style='margin-left:15px;margin-top:10px' src='<?php echo $imagen?>' width='120' height='100'></td>
	  
<div style="float:right;margin-left:0;margin-right:0;margin-top:80px"><input type="submit" value="Editar noticia" name="editar"/>
  <input type="submit" value="Eliminar noticia" name="eliminar"/>
  <input type="hidden" name="idnoticia" id="idnoticia" value="<?php echo $busqueda['id_noticias']; ?>">        

</div>

<div class="element-textarea" style="margin-left:0;float:right;width:500px"><label class="title"></label><textarea class="medium" name="textarea" cols="20" rows="5" readonly="readonly"><?php echo $titulo."\n".$fecha."\n".$texto;?></textarea>

</div>


</form>
<script type="text/javascript" src="formoid6_files/formoid1/formoid-flat-black.js"></script>

<?php
}
}
?>
</body>
</html>