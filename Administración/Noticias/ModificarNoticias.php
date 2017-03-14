<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
session_start();
include('../../conexion.php');
include('../Encabezado.html');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2) {

    $letras = $_SESSION['admin'];
    $numeros = mysql_query("select * from tb_torneo where usuario='$letras'")or die(mysql_error());
    $caracteres = mysql_fetch_array($numeros);
    $name = $caracteres['id_torneo'];
    ?>

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
            <form action="buscar_noticia.php" method="POST">

                <b><label style="margin-left:130px">Búsqueda por fecha:</label><b>
                        <input type="date" name="fecha">
                        &nbsp&nbsp
                        <input style="width:60px;background-color:#E0FFFF;height:25px;border-radius:8px"type="submit" name="buscar" value="Buscar">
                        </form>
                        <center><div class="title"><h2>Noticias Recientes</h2></div></center>
                        <?php
                        $datos = mysql_query("select * FROM tb_noticias where torneo='1' ORDER BY fecha DESC");
                        while ($noticias = mysql_fetch_array($datos)) {

                            $imagen = $noticias['imagen'];
                            $titulo = $noticias['titulo'];
                            $texto = $noticias['texto'];
                            $fecha = $noticias['fecha'];
                            ?>



                            <link rel="stylesheet" href="../../Formularios/formoid6_files/formoid1/formoid-flat-black.css" type="text/css" />
                            <script type="text/javascript" src="../../Formularios/formoid6_files/formoid1/jquery.min.js"></script>
                            <form action="editarnoticia.php"class="formoid-flat-black" style="height:150px;background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:1100px;min-width:150px" method="post">

                                <td><img style='margin-left:15px;margin-top:10px' src='../../<?php echo $imagen ?>' width='120' height='100'></td>

                                <div style="float:right;margin-left:0;margin-right:0;margin-top:80px"><input type="submit" value="Editar noticia" name="editar"/>
                                    <input type="submit" value="Eliminar noticia" name="eliminar"/>
                                    <input type="hidden" name="idnoticia" id="idnoticia" value="<?php echo $noticias['id_noticias']; ?>">        

                                </div>

                                <div class="element-textarea" style="margin-left:0;float:right;width:500px"><label class="title"></label><textarea class="medium" name="textarea" cols="20" rows="5" readonly="readonly"><?php echo $titulo . "\n" . $fecha . "\n" . $texto; ?></textarea>

        </div>


        </form>
        <script type="text/javascript" src="../../Formularios/formoid6_files/formoid1/formoid-flat-black.js"></script>
        <br><br>
                            <?php
                        }
                        ?>

    </body>
    </html>
                        <?php
                    }else{

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



