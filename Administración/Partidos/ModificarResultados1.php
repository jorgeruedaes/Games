<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();
include('../../conexion.php'); 
include('../../funciones.php');  
include('../Encabezado.html');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2) {

  $letras=$_SESSION['admin'];
  $numeros=mysqli_query($conexion,"select * from tb_torneo where usuario='$letras'");
  $caracteres=mysqli_fetch_array($numeros);
  $name=$caracteres['id_torneo'];
  ?>
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Copa Amistad Profesional</title>
    <!--fonts-->
    <link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'> 
    <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>    
    <!--//fonts-->    
    <link href="../../web/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../../web/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="shortcut icon" href="web/images/Logo.png">
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <!-- js -->
    <script src="../../web/js/jquery.min.js"></script>
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


    <?php



    if (isset($_POST['ir'])) {

      $partido=$_POST['partido'];

      $consulta= mysqli_query($conexion,"SELECT * FROM tb_partidos WHERE id_partido=$partido");

      $res=mysqli_fetch_array($consulta);

      $equipo1= $res['equipo1'];
      $equipo2= $res['equipo2'];
      $resultado1=$res['resultado1'];
      $resultado2=$res['resultado2'];

      $consulta2= mysqli_query($conexion,"SELECT * FROM tb_equipos WHERE id_equipo=$equipo1");
      $consulta3= mysqli_query($conexion,"SELECT * FROM tb_equipos WHERE id_equipo=$equipo2");

      $res2=mysqli_fetch_array($consulta2);
      $res3=mysqli_fetch_array($consulta3);

      $nombreequipo1=$res2['nombre_equipo'];
      $nombreequipo2=$res3['nombre_equipo'];

      ?>


      <form   action="ModificarResultados2.php" method="POST">
       <br><br>
       <center><cite>Las personas que aparecen en la siguiente lista han sido previamente marcados como asistentes del compromiso. </cite></center>
       <input type="hidden" value="<?php echo $partido?>" name="idpartido">
       <div class="content-info">
         <div class="container">
           <div class="content-bottom-grids">
             <div class="col-md-6 popular"> 
               <h3><?php echo $nombreequipo1?> <input style="width :50px" type="number" size="1" name="resultado1" value="<?php echo $resultado1?>"></h3>
               <table style="width:100% " class="table table-condensed">
                 <thead>
                   <tr  style="background : #00A859; color: white;">
                    <th style="width:70%">Jugador</th>
                    <th style="width:25%">Goles</th>
                    <th style="width:25%">Autogoles</th>

                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $consulta4= mysqli_query($conexion,"SELECT * FROM tr_jugadoresxpartido where partido = $partido");

                  $consultadejugadoresdelequipo=mysqli_query($conexion,"SELECT jugador,nombre1,nombre2,apellido1,apellido2,goles,autogoles FROM `tr_jugadoresxpartido`,tb_jugadores WHERE partido=$partido AND jugador IN (SELECT id_jugadores FROM tb_jugadores WHERE equipo=$equipo1) AND tr_jugadoresxpartido.jugador=tb_jugadores.id_jugadores");
                  $i=0;
                  while($resultadoconsulta=mysqli_fetch_array($consultadejugadoresdelequipo)){


                    ?>
                    <tr>
                      <td><?php echo Obtener_Nombre_Jugador($resultadoconsulta['jugador']) ?></td>
                      <input type="hidden" value="<?php echo $resultadoconsulta['jugador']?>" name="idjugadores<?php echo $i ?>">
                      <td><input style="width :50px" type="number" size="1" value="<?php echo $resultadoconsulta['goles']?>" name="nuevosgoles<?php echo $i ?>"></td>
                      <td><input style="width :50px" type="number" size="1" value="<?php echo $resultadoconsulta['autogoles']?>" name="nuevosautogoles<?php echo $i ?>"></td>
                    </tr>


                    <?php 
                    $i=$i+1;
                  }
                  ?>
                </tbody>
              </table>
            </div>

            <div class="col-md-6 popular"> 
             <h3><?php echo $nombreequipo2?> <input style="width :50px" type="number" size="1" name="resultado2" value="<?php echo $resultado2?>"></h3>
             <table style="width:100% " class="table table-condensed">
               <thead>
                 <tr  style="background : #00A859; color: white;">
                  <th style="width:70%">Jugador</th>
                  <th style="width:25%">Goles</th>
                  <th style="width:25%">Autogoles</th>

                </tr>
              </thead>
              <tbody>
                <?php 
                $consulta4= mysqli_query($conexion,"SELECT * FROM tr_jugadoresxpartido where partido = $partido");

                $consultadejugadoresdelequipo=mysqli_query($conexion,"SELECT jugador,nombre1,nombre2,apellido1,apellido2,goles,autogoles FROM `tr_jugadoresxpartido`,tb_jugadores WHERE partido=$partido AND jugador IN (SELECT id_jugadores FROM tb_jugadores WHERE equipo=$equipo2) AND tr_jugadoresxpartido.jugador=tb_jugadores.id_jugadores");
                while($resultadoconsulta=mysqli_fetch_array($consultadejugadoresdelequipo)){


                  ?>
                  <tr>
                    <td><?php echo Obtener_Nombre_Jugador($resultadoconsulta['jugador']) ?></td>
                    <input type="hidden" value="<?php echo $resultadoconsulta['jugador']?>" name="idjugadores<?php echo $i ?>">
                    <td><input style="width :50px" type="number" size="1" value="<?php echo $resultadoconsulta['goles']?>" name="nuevosgoles<?php echo $i ?>"></td>
                    <td><input style="width :50px" type="number" size="1" value="<?php echo $resultadoconsulta['autogoles']?>" name="nuevosautogoles<?php echo $i ?>"></td>
                  </tr>

                  <?php
                  $i=$i+1;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div></div></div>
        <input type="hidden" name="numerodejugadores" value="<?php echo  $i ?>"/>
        <center><input class="btn btn-success" type="submit" value="Guardar" name="guardar"></center></form>
        <br><br><br><br><br>
        <?php

      }
    }
    ?>