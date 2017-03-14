<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
session_start();
include('../../conexion.php');
include('../../funciones.php');
include('../Encabezado.html');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2) {

    $letras = $_SESSION['admin'];
    $numeros = mysqli_query($conexion,"select * from tb_torneo where usuario='$letras'");
    $caracteres = mysqli_fetch_array($numeros);
    $name = $caracteres['id_torneo'];
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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


</style>
<body>

    <?php
    $totaljugadores = 0;
    if (isset($_POST['agregar'])) {
        $idpartido = $_POST['idpartido'];
        $equipo1 = $_POST['equipo1'];
        $equipo2 = $_POST['equipo2'];
        ?>

        <form  id="principal" method="POST">
            <div class="content-info">
                <div class="container">

                    <div class="content-bottom-grids">
                     <div class="col-md-5 popular">  
                        <h3><?php echo NombreEquipo($equipo1);?> <input style="padding-left:8px;width:50px" type="text" name="resultado1" value="0" size="1" maxlength="1" required/></h3>

                        <input type="hidden" name="idpartido" value="<?php echo $idpartido; ?>">
                        <br>
                        <table style="width:100% " class="table table-condensed">
                         <thead>
                             <tr style="background : #00A859; color: white;">
                                <th style="width:70%">Nombre</th>
                                <th style="width:20%">Amonestación</th>
                                <th style="width:5%">Gol</th>
                                <th style="width:5%">Autogol</th>
                                <th style="width:10%">Asistencia</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            $i = 0;
                            $vector = Array_Jugadores_Equipo($equipo1);
                            foreach ($vector as  $value)
                            {

                               $id = $value['id_jugador'];

                               ?>
                               <tr>
                                <td><input type="hidden" type="text" name="jugador<?php echo $i ?>"/><?php echo Obtener_Nombre_Jugador($id)?></td>
                                <input type="hidden" name="idjugador<?php echo $i ?>" value="<?php echo $id ?>"/>

                                <td> <select class="form-control" name="amonestacion<?php echo $i ?>">                                                                                                                        
                                    <option value="5" selected="selected">-</option>
                                    <option value="1">Amarilla</option>
                                    <option value="2">Roja</option>
                                </select>
                            </td>     
                            <td> <input style="padding-left:8px;width:50px" type="number" name="goles<?php echo $i ?>" value="0" size="1" maxlength="1"/></td>
                            <td><input style="padding-left:8px;width:50px" type="number" name="autogoles<?php echo $i ?>" value="0" size="1" maxlength="1"/></td>
                            <td>  <label class="checkbox-inline">
                              <input type="checkbox" 
                              name="asistencia<?php echo $i ?>" value="on"> Asistió
                          </label>
                      </td>                    

                  </tr>
                  <?php
                  $i = $i + 1;
              }
              ?>
          </tbody>
      </table>
  </div>
  <div class="col-md-2 popular">

  </div>
  <div class="col-md-5 popular"> 
    <h3><?php echo NombreEquipo($equipo2); ?> <input style="padding-left:8px;width:50px" type="text" name="resultado2" value="0" size="1" maxlength="1" required/></h3>

    <br>
    <table style="width:100% " class="table table-condensed">
     <thead>
         <tr  style="background : #00A859; color: white;">
            <th style="width:70%">Nombre</th>
            <th style="width:20%">Amonestación</th>
            <th style="width:5%">Gol</th>
            <th style="width:5%">Autogol</th>
            <th style="width:10%">Asistencia</th>

        </tr>
    </thead>

    <tbody>
        <?php

        $vector = Array_Jugadores_Equipo($equipo2);
        foreach ($vector as  $value)
        {

            $id1 = $value['id_jugador'];
            ?>
            <tr>
                <td><input type="hidden" name="jugador<?php echo $i ?>"/><?php echo Obtener_Nombre_Jugador($id1)?></td>
                <input type="hidden" name="idjugador<?php echo $i ?>" value="<?php echo $id1 ?>"/>

                <td> <select class="form-control" name="amonestacion<?php echo $i ?>">
                    <option value="5" selected="selected">-</option>
                    <option value="1">Amarilla</option>
                    <option value="2">Roja</option>
                </select>
            </td>     
            <td><input style="padding-left:8px;width:50px" type="number" name="goles<?php echo $i ?>" value="0" size="1" maxlength="1"/></td>
            <td><input style="padding-left:8px;width:50px" type="number" name="autogoles<?php echo $i ?>" value="0" size="1" maxlength="1"/></td>
            <td>
                <label class="checkbox-inline">
                  <input type="checkbox" 
                  name="asistencia<?php echo $i ?>" value="on"> Asistió
              </label>

          </td>                    
      </tr>

      <?php
      $i = $i + 1;
  }
  ?>
</tbody>
</table>
<div>
</div>
</div>
</div>
<?php

}
?>
<input type="hidden" name="numerodejugadores" value="<?php echo $i ?>"/>
<center>
<input type="submit" name="guardar" value="Guardar" class="btn btn-success"></input></center>
</form>
</body>
</html>
<?php
}

if (isset($_POST['guardar'])) {
    $num = $_POST['numerodejugadores'];
    $idgame = $_POST['idpartido'];
    $result1 = $_POST['resultado1'];
    $result2 = $_POST['resultado2'];

    $matriz['75']['4'] = 0;

    for ($i = 0; $i < $num; $i++) {
        $matriz[$i]['0'] = $_POST['jugador' . $i];
        $matriz[$i]['1'] = $_POST['amonestacion' . $i];
        $matriz[$i]['2'] = $_POST['goles' . $i];
        $matriz[$i]['4'] = $_POST['idjugador' . $i];
        $matriz[$i]['5'] = $_POST['autogoles' . $i];
        if (empty($_POST['asistencia' . $i])) {
            $matriz[$i]['3'] = "off";
        } else {
            $matriz[$i]['3'] = "on";
        }
    }

    for ($i = 0; $i < $num; $i++) {
        if ($matriz[$i]['3'] == "on") {
            $goal = $matriz[$i]['2'];
            $autogoal = $matriz[$i]['5'];
            $faul = $matriz[$i]['1'];
            $game = $_POST['idpartido'];
            $player = $matriz[$i]['4'];
            
            mysqli_query($conexion,"INSERT INTO `tr_jugadoresxpartido`(`jugador`, `partido`, `amonestacion`, `goles`,`autogoles`)
               VALUES ('$player','$game','$faul','$goal','$autogoal')");
            $jornadadelaamonestacion = mysqli_fetch_array(mysqli_query($conexion,"SELECT numero_fecha FROM tb_partidos WHERE id_partido='$idgame'"));
            $jornada = $jornadadelaamonestacion['numero_fecha'];
            mysqli_query($conexion,"INSERT INTO `tr_amonestacionesxjugador`(`id_amonestacioxjugador`, `jugador`, `amonestacion`, `estado_amonestacion`, `duracion`,`comentario`, `jornada_amonestacion`) 
               VALUES (null,'$player','$faul','1','0','','$jornada')");
        }
    }
    $resultado = mysqli_query($conexion,"UPDATE `tb_partidos` SET `resultado1`=$result1,`resultado2`=$result2,`Estado`='2' WHERE id_partido=$idgame");
    if ($resultado == TRUE) {
        ?>
        <script>

            alert("Se agregó el resultado")
            window.location.href = "AgregarResultados.php";
        </script>
        <?php
    } else {
        ?>
        <script>

            alert("Falló la operación")
            window.location.href = "AgregarResultados.php";
        </script>
        <?php
    }
}
?>