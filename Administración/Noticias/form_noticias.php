
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


  <link rel="stylesheet" href="../../Formularios/formoid1_files/formoid1/formoid-flat-black.css" type="text/css" />
  <script type="text/javascript" src="../../Formularios/formoid1_files/formoid1/jquery.min.js"></script>

  <form action="form_noticias.php" enctype="multipart/form-data" class="formoid-flat-black" style="background-color:#FFFFFF;font-size:15px;font-family:'Lato', sans-serif;color:#666666;max-width:500px;min-width:150px" method="post">
    <div class="title"><h2>Nueva noticia</h2></div>
    <div class="element-input"><label class="title">Título de la noticia:</label>
      <input class="large" type="text" name="titulo" required/></div>
      <div class="element-textarea"><label class="title">Descripción:</label><textarea class="medium" name="texto" cols="20" rows="5" required></textarea></div>
      <div class="element-file"><label class="title">Imagen:</label><label class="large" ><div class="button">Seleccionar archivo</div><input type="file" class="file_input" name="uploaded_file" id="imagen" required/>
      <div class="file_text">Ningún archivo seleccionado</div></label></div>
      <div class="submit">
        <center><input type="submit" value="Agregar" name="subir"/></center></div></form>
        <script type="text/javascript" src="../../Formularios/formoid1_files/formoid1/formoid-flat-black.js"></script>
        <br><br>
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




  if(isset($_POST['subir'])){
//capturando los datos a guardar

    $titulo_noticia= $_POST["titulo"];
    $texto_noticia= $_POST["texto"];
    date_default_timezone_set("America/Bogota");
    $fecha = date('Y-m-d');
    $ruta="images/Noticias";

  //  $archivo= $_FILES['imagen']['tmp_name'];
  //  $nombreArchivo=$_FILES['imagen']['name'];
   // echo  "../../".$ruta."/".$nombreArchivo;

  //  move_uploaded_file($archivo ,"../../". $ruta."/".$nombreArchivo);
//    $ruta=$ruta."/".$nombreArchivo;


$target_path1 = "images/Noticias/";
/* Add the original filename to our target path.
Result is "uploads/filename.extension" */
$target_path1 = $target_path1 . basename( $_FILES['uploaded_file']['name']);
if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_path1)) {
   echo "The first file ".  basename( $_FILES['uploaded_file']['name']).
   " has been uploaded.";
} else{
   echo "There was an error uploading the file, please try again!";
   echo "filename: " .  basename( $_FILES['uploaded_file']['name']);
   echo "target_path: " .$target_path1;
}

 //guardar datos de nueva noticia en la bd

    $guardarnoticia=mysqli_query($conexion,"INSERT INTO tb_noticias VALUES ('null','$titulo_noticia','$texto_noticia','".$target_path1."','1','$fecha')");

    if($guardarnoticia === FALSE) { 

      echo "fallo el ingreso de la noticia";
    }

    else{

      ?>
      <script>

        alert("La noticia se guardo exitosamente")

      </script>

      <?php

    }
    
  }
?>
