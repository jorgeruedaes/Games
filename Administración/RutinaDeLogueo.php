<?php
if (isset($_SESSION['admin'])) {
    if ($_SESSION['tipo_usuario'] == 1) {
        $pruebadeinicio = 1;
    } elseif ($_SESSION['tipo_usuario'] == 2) {
        $pruebadeinicio = 2;
    } elseif ($_SESSION['tipo_usuario'] == 3) {
        $pruebadeinicio = 3;
    }elseif($_SESSION['tipo_usuario'] == 4){
        $pruebadeinicio = 4;

     }else {
        echo "Usted no está autorizado para ingresar";
        header("location:iniciox.php");
    }
}
?>