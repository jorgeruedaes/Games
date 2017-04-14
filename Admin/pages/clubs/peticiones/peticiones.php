<?php
session_start();
include('../../../php/consultas.php');
include('../../../php/clubs.php');

if(isset($_SESSION['id_usuarios']))
{
    $resultado = '{"salida":true,';
    $bandera = $_POST['bandera'];

// Modifica un club.
    if ($bandera === "modificar-imagen") {



        if (SubirArchivos($_FILES['file'],$carpeta)[0]) {
            $resultado.='"mensaje":true';
        } else {
            $resultado.='"mensaje":false';
        }
    }
    // Guarda los datos de un nuevo campeonato.
    else if($bandera === "nuevo") {

        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $presidente = $_POST['presidente'];
         $horario = $_POST['horario'];
         $cancha = $_POST['cancha'];
         $correo = $_POST['email'];
         $estado = $_POST['estado'];

        if (boolean_new_Club($nombre,$telefono,$direccion,$presidente,$horario,$cancha,$correo,$estado)) {
            $resultado.='"mensaje":true';
        } else {
            $resultado.='"mensaje":false';
        }
    }
    // Guarda los datos de un nuevo perfil.
    else if($bandera === "modificar") {
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $presidente = $_POST['presidente'];
         $horario = $_POST['horario'];
         $cancha = $_POST['cancha'];
         $correo = $_POST['email'];
         $estado = $_POST['estado'];
         $club = $_POST['club'];

        if (Set_Clubs($nombre,$telefono,$direccion,$presidente,$horario,$cancha,$correo,$estado,$club)) {
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