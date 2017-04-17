<?php
session_start();
include('../../../php/consultas.php');
include('../../../php/campeonatos.php');

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
    // Guarda los datos de un nuevo campeonato.
    else if($bandera === "nuevo") {

        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];

        if (boolean_new_Campeonato($nombre,$categoria)) {
            $resultado.='"mensaje":true';
        } else {
            $resultado.='"mensaje":false';
        }
    }
    // Guarda los datos de un nuevo perfil.
    else if($bandera === "modificar-campeonato") {

        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $estado = $_POST['estado'];
        $puntos = $_POST['puntos'];
        $torneo = $_POST['torneo'];

        if (Set_Campeonatos($nombre,$categoria,$estado,$torneo,$puntos)) {
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