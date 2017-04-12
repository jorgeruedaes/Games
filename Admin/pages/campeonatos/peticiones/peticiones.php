<?php
session_start();
include('../../../php/consultas.php');
include('../../../php/archivos.php');

if(isset($_SESSION['id_usuarios']))
{
    $resultado = '{"salida":true,';
    $bandera = $_POST['bandera'];

// Modifica uno de los perfiles de usuario.
    if ($bandera === "modificar-reglamentos") {

        $carpeta="../../../../Archivos/Reglamentos/";

        if (SubirArchivos($_FILES['file'],$carpeta)[0]) {
            $resultado.='"mensaje":true';
        } else {
            $resultado.='"mensaje":false';
        }
    }
    // Guarda los datos de un nuevo perfil.
    else if($bandera === "nuevo") {

        $nombre = $_POST['nombre'];
        $nivel = $_POST['nivel'];
        $descripcion = $_POST['descripcion'];
        if (Boolean_New_Perfil($nombre,$nivel,$descripcion)) {
            $resultado.='"mensaje":true';
        } else {
            $resultado.='"mensaje":false';
        }
    }
}
else
{
    $resultado = '{"salida":false';
}
$resultado.='}';
echo ($resultado);
?>




   IF UPDATING THEN
 
 END IF;

 IF DELETING THEN
 
 END IF;