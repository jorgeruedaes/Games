<?php
include('../../menuinicial.php');
?>
<div class="ec-mini-header">
            <span class="ec-blue-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ec-mini-title">
                            <h1>Clubes</h1>
                        </div>
                        <div class="ec-breadcrumb">
                            <ul>
                                <li><a href="index.php">Inicio</a></li>
                                <li>Clubes</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="ec-main-content">
            <!--// Main Section \\-->
            <div class="ec-main-section">
                <div class="container">
                <div class="row">
                        <div class="col-md-12">
                            <div class="ec-gallery ec-gallery ec-modren-gallery">
                                <ul class="row gallery">

                                 <?php

                                $vector = Get_Lista_Clubes('activo');
                                echo (empty($vector)) ? '<cite>No hay programación.</cite>' :'';
                                foreach ($vector as $value)
                                {

                                $id = $value['id'];
                                $nombre =$value['nombre'];
                                $direccion = $value['direccion'];
                                $telefono =$value['telefono'];
                                $correo = $value['correo'];
                                $presidente =$value['presidente'];
                                $cancha = $value['cancha'];
                                $horario =$value['horario'];
                                $logo = $value['logo'];
                                ?>
                                     <li class="col-md-2 add-pointer">
                                        <figure>
                                            <a href="webs/TorneoMunicipal/Club.php?id=<?php echo $id?>"><img class="club-box-size" src="images/Escudos/<?php echo $logo ?>"></a>
                                           
                                        </figure>
                                    </li>
                                 <?php
                                 }
                                 ?>
                                </ul>
                            </div>
                        </div>
                </div>
                </div>
            </div>
            <!--// Main Section \\-->
        </div>
<?php
include('../../footerinicial.php');
?>