<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include('../../../conexion.php');
include('../../Encabezado.html');
include('../../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2) {

    $letras = $_SESSION['admin'];
    $numeros = mysqli_query($conexion,"SELECT * from tb_torneo where usuario='$letras'");
    $caracteres = mysqli_fetch_array($numeros);
    $name = $caracteres['id_torneo'];
    ?>

    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>Copa Amistad Profesional modulo de Administracion</title>
            <link rel="stylesheet" href="../../../css/styler.css" type="text/css" media="all" />
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

                <br><br><br>
                            <BR><BR>
                                    <link rel="stylesheet" href="../../../Formularios/formoid_files/formoid1/formoid-flat-black.css" type="text/css" />
                                    <script type="text/javascript" src="../../../Formularios/formoid_files/formoid1/jquery.min.js"></script>

                                    <form action="AgregarAmonEquipos.php" class="formoid-flat-black" style="background-color:#FFFFFF;font-size:16px;font-family:'Lato', sans-serif;color:#666666;max-width:500px;min-width:150px" method ="post">
                                        <div class="title"><h2>Nueva Amonestación</h2></div>
                                        <div ><label >Equipo:</label>
                                            <div ><span><select name="equipo" required>
                                                        <?php
                                                        $equipos = mysqli_query($conexion,"select * from tb_equipos ORDER BY nombre_equipo asc");
                                                        while ($teams = mysqli_fetch_array($equipos)) {
                                                            ?>
                                                            <option value="<?php echo $teams['id_equipo']; ?>" selected="selected"><?php echo $teams['nombre_equipo']; ?> </option>

                                                            <?php
                                                        }
                                                        ?></select><i></i></span
                                            </div>
                                        </div>

                                        <div ><label >Amonestación:</label>
                                            <div ><span><select name="amon" required>
                                                        <?php
                                                        $amonestaciones = mysqli_query($conexion,"select * from tb_amonestaciones where id_amonestacion!=1 AND id_amonestacion!=2 AND id_amonestacion!=5");
                                                        while ($amon = mysqli_fetch_array($amonestaciones)) {
                                                            ?>
                                                            <option value="<?php echo $amon['id_amonestacion']; ?>" selected="selected"><?php echo $amon['nombre']; ?> </option>

                                                            <?php
                                                        }
                                                        ?></select><i></i></span
                                            </div>
                                        </div>
                                        <div class="submit"><input type="submit" value="Agregar" name="agregar"/></div>
                                        <input type="hidden" value="1" name="torneo">
                                            <input type="hidden" value="0" name="puntos">
                                                </form>

                                                <script type="text/javascript" src="../../../Formularios/formoid_files/formoid1/formoid-flat-black.js"></script>


                                                </body>
                                                </html>
                                                <?php
}
                                                if (isset($_POST['agregar'])) {

                                                    $equipo = $_POST['equipo'];
                                                    $amonestacion = $_POST['amon'];
                                                    $insertar = mysqli_query($conexion,"INSERT INTO tr_amonestacionxequipo (`id_amonestacionxequipo`, `id_equipo`, `amonestacion`, `estado_amonestacion`) VALUES ('null','$equipo','$amonestacion','1')");
                                                    if ($insertar == true) {
                                                        echo "<script language='JavaScript' type='text/javascript'>alert('Amonestación agregada!');
                                                    </script>";
                                                    } else {
                                                        echo "<script language='JavaScript' type='text/javascript'>alert('Ha ocurrido un error, no se agregó la amonestación.');
                                                    </script>";
                                                    }
                                                }
                                            
                                            ?>