<?php

include('../../conexion.php');
include('../RutinaDeLogueo.php');
if($pruebadeinicio==1 or $pruebadeinicio==2){
if(isset($_POST['guardar'])){

	$titulo= $_POST["titulo"]; 
	$texto= $_POST["texto"]; 
	$idnoticia = $_POST["idnoticia"]; 

$ruta="../Modificar/Imagenes";
$archivo= $_FILES['imagen']['tmp_name'];
$nombreArchivo=$_FILES['imagen']['name'];
move_uploaded_file($archivo, $ruta."/".$nombreArchivo);
$ruta=$ruta."/".$nombreArchivo;

if ($ruta == "../Modificar/Imagenes/"){

$modificarnoticia1=mysql_query("UPDATE tb_noticias SET titulo='$titulo', texto='$texto' WHERE id_noticias=$idnoticia");

if($modificarnoticia1 == FALSE){
	?>
    <script>

  alert("Falló la modificación")
  window.location.href="ModificarNoticias.php";
  
  </script>

<?php

}
else

?>
    <script>

  alert("La noticia se modificó exitosamente")
  window.location.href="ModificarNoticias.php";
  
  </script>

<?php
}
	else

	{
		$modificarnoticia=mysql_query("UPDATE tb_noticias SET titulo='$titulo', texto='$texto', imagen='".$ruta."' WHERE id_noticias=$idnoticia");
if($modificarnoticia == FALSE){
	?>
    <script>

  alert("Falló la modificación")
  window.location.href="ModificarNoticias.php";
  
  </script>

<?php

}
else

		?>
    <script>

  alert("La noticia se modificó exitosamente")
  window.location.href="ModificarNoticias.php";
  
  </script>

<?php


}
} }else{
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