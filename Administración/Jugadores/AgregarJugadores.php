<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
session_start();
include('../../conexion.php');
include('../Encabezado.html');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2 or $pruebadeinicio==4) {

    $letras = $_SESSION['admin'];
    $numeros = mysqli_query($conexion,"SELECT * from tb_torneo where usuario='$letras'")or die(mysql_error());
    $caracteres = mysqli_fetch_array($numeros);
    $name = $caracteres['id_torneo'];
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>Copa Amistad Profesional modulo de Administracion</title>
            <link rel="stylesheet" href="../../css/styler.css" type="text/css" media="all" />
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

        <link rel="stylesheet" href="../../Formularios/formoid9_files/formoid1/formoid-flat-black.css" type="text/css" />
                <script type="text/javascript" src="../../Formularios/formoid9_files/formoid1/jquery.min.js"></script>
                <script type="text/javascript" src="../../Formularios/formoid9_files/formoid1/formoid-flat-black.js"></script>
                <form action="AgregarJugadores.php"enctype="multipart/form-data" class="formoid-flat-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:500px;min-width:150px" method="post">
                    <div class="title"><h2>Nuevo jugador</h2></div>
                    <div class="element-input"><label class="title">Primer nombre:</label><input class="medium" type="text" name="primernombre" required/></div>
                    <div class="element-input"><label class="title">Segundo nombre:</label><input class="medium" type="text" name="segundonombre" /></div>

 <div class="element-phone"><label class="title">CEDULA:</label><input class="medium" type="NUMBER" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="CEDULA"  value="" required/></div>
                    <div class="element-input"><label class="title">Primer apellido:</label><input class="large" type="text" name="primerapellido" required/></div>
                    <div class="element-input"><label class="title">Segundo apellido:</label><input class="large" type="text" name="segundoapellido" /></div>
                    <div class="element-date"><label class="title">Fecha de nacimiento:</label><input class="large" data-format="yyyy-mm-dd" type="date" name="fecha_nacimiento" placeholder="yyyy-mm-dd" required/></div>
                    <div class="element-email"><label class="title">E-mail:</label><input class="large" type="email" name="email" value="" /></div>
                    <div class="element-phone"><label class="title">Télefono/celular:</label><input class="medium" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="telefono"  value="" required/></div>
                    <div ><label >Profesión:</label><div ><span><select name="profesion" >

                                    <?php
                                    $profesiones = mysqli_query($conexion,"SELECT * from tb_profesiones ORDER BY nombre asc");
                                    while ($listaprofesiones = mysqli_fetch_array($profesiones)) {
                                        ?>
                                        <option  value="<?php echo $listaprofesiones['id_profesion']; ?>" ><?php echo $listaprofesiones['nombre']; ?>
                                        </option>

                                        <?php
                                    }
                                    ?>

                                </select></span></div></div>
                    <div class="element-file"><label class="title">Foto:</label><label class="large" ><div class="button">Seleccionar archivo</div><input type="file" class="file_input" name="foto" /><div class="file_text">Ningún archivo seleccionado</div></label></div>

                    <div ><label >Equipo:</label><div ><span><select name="equipo">

                                    <?php
                                    $equipos = mysql_query($conexion,"SELECT * from tb_equipos where torneo='1' ORDER BY nombre_equipo asc ");
                                    while ($listaequipos = mysql_fetch_array($equipos)) {
                                        ?>
                                        <option value="<?php echo $listaequipos['id_equipo']; ?>" selected="selected"><?php echo $listaequipos['nombre_equipo']; ?> </option>

                                        <?php
                                    }
                                    ?>
                                </select><i></i></span></div></div>

                    <div style="text-align:center" class="submit"><input type="submit" value="Crear" name="crear"/></div>
                </form>

        </body>
    </html>


    <?php
}

if (isset($_POST['crear'])) {

    $CEDULA= $_POST['CEDULA'];
$primernombre = $_POST['primernombre'];
    $segundonombre = $_POST['segundonombre'];
    $primerapellido = $_POST['primerapellido'];
    $segundoapellido = $_POST['segundoapellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $correo = $_POST['email'];
    date_default_timezone_set("America/Bogota");
    $fecha = date('Y-m-d');
    $telefono = $_POST['telefono'];
    $profesion = $_POST['profesion'];
    $ruta = "../Modificar/Imagenes";
    $archivo = $_FILES['foto']['tmp_name'];
    $nombreArchivo = $_FILES['foto']['name'];
    move_uploaded_file($archivo, $ruta . "/" . $nombreArchivo);
    $ruta = $ruta . "/" . $nombreArchivo;
    $equipo = $_POST['equipo'];


    $guardarjugador = mysql_query("INSERT INTO tb_jugadores VALUES ('$CEDULA','$primernombre','$segundonombre','$primerapellido','$segundoapellido','$fecha_nacimiento',
	'$correo','$equipo','" . $ruta . "','$fecha','1','$telefono','$profesion')");

    if ($guardarjugador === FALSE) {
        
    } else {
        ?>
        <script>

            alert("Jugador agregado!")

        </script>

        <?php
    }
}
?>
<br>
<br>
<br>
<br>
<br>
<br>