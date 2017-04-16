<?php
session_start();
include('../../../php/consultas.php');
include('../../../php/equipo.php');

if(isset($_SESSION['id_usuarios']))
{
    $resultado = '{"salida":true,';
    $bandera = $_POST['bandera'];

// Modifica un club.
    if ($bandera === "modificar-imagen") {
    }
    // Guarda los datos de un nuevo equipo.
    else if($bandera === "nuevo") {

        $nombre = $_POST['nombre'];
        $tecnico = $_POST['tecnico'];
        $torneo = $_POST['torneo'];
        $grupo = $_POST['grupo'];
         $club = $_POST['club'];
         $estado = $_POST['estado'];
        if (boolean_new_equipo($nombre,$tecnico,$grupo,$torneo,$club,$estado)) {
            $resultado.='"mensaje":true';
        } else {
            $resultado.='"mensaje":false';
        }
    }
    // Guarda los datos de un nuevo equipo.
    else if($bandera === "modificar") {
        $equipo = $_POST['equipo'];
        $nombre = $_POST['nombre'];
        $tecnico = $_POST['tecnico'];
        $torneo = $_POST['torneo'];
        $grupo = $_POST['grupo'];
         $club = $_POST['club'];
         $estado = $_POST['estado'];

        if (boolean_Set_equipo($nombre,$tecnico,$grupo,$torneo,$club,$estado,$equipo)) {
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