

<?php
session_start();
include('../conexion.php');
if (isset($_SESSION['admin'])) {
include('RutinaDeLogue.php');
 if ($_SESSION['tipo_usuario'] == 1) {
            header("location:modulosuperadmin.php");
    } elseif ($_SESSION['tipo_usuario'] == 2) {
        
        header("location:modulousuariostutorneo.php");
    } elseif ($_SESSION['tipo_usuario'] == 3) {
        header("location:../Usuarios/Planilleros/moduloplanilla.php");
        $pruebadeinicio = 3;
    } else {
        echo "Usted no está autorizado para ingresar";
        header("location:iniciox.php");
    }
} else {
    ?>
    <style type="text/css">
        body{
            background: url(../images/footballfan.jpg) no-repeat fixed center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;}
        </style>

        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8" />
                <title>Módulo Administrador</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
            </head>
            <link rel="stylesheet" href="../Formularios/formoid3_files/formoid1/formoid-solid-green.css" type="text/css" />
            <script type="text/javascript" src="../Formularios/formoid3_files/formoid1/jquery.min.js"></script>
            <script type="text/javascript" src="../Formularios/formoid3_files/formoid1/formoid-solid-green.js"></script>
            <body>
            <br>
            <form action="comprobar.php" class="formoid-solid-green" style="background-color:#FFFFFF;font-size:14px;font-family:serif;color:#34495E;max-width:480px;min-width:150px" method="post">

            <div class="title"><h2>Módulo de Administración</h2></div>
            <div class="element-input"><label class="title"></label><div class="item-cont">
                    <center><input class="medium" type="text" name="user" id="username" placeholder="Usuario" required/><span class="icon-place"></span></div></div></center>
        <div class="element-password"><label class="title"></label><div class="item-cont">
                <center><input class="medium" type="password" name="pass" id="password" value="" placeholder="Contraseña" required/><span class="icon-place"></span></div></div></center>
    <div style="text-align:center" class="submit"><input type="submit" style="width:120px;height:30px" value="Iniciar sesión"/></div>
    </form>

    </body>
    </html>
    <?php

}if (isset($_SESSION['error'])) {
    header("location:index.php");
}
?>