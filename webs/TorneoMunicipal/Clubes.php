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
             <?php

             $vector = Get_Lista_Clubes('activo');
             echo (empty($vector)) ? '<cite>No hay clubes.</cite>' :'';
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
                <!--// Match Fixture \\-->
                <div class="col-md-4">
                    <div class="ec-fixture-list">
                        <ul>
                            <li class="add-pointer" 
                            onclick="window.location.href = 'webs/TorneoMunicipal/Club.php?id=<?php echo $id?>  ';"   >

                            <div class="ec-cell">
                             <img style="height:70px;float: left" src="images/Escudos/<?php echo $logo ?>" alt=""/>
                             <a href="webs/TorneoMunicipal/Club.php?id=<?php echo $id?>" class="club-box-size">
                             <p style="margin-left: 80px"><?php echo $nombre?></p>
                             </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
        }
        ?>
        <!--// TablePoint \\-->

        <!--// TablePoint \\-->
        <!--// Partner \\-->

        <!--// Partner \\-->
    </div>

</div>
</div>
<!--// Main Section \\-->
</div>
<?php
include('../../footerinicial.php');
?>