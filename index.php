 <?php
include('menuinicial.php');
   ?>
  <div class="ec-mainbanner">
            <div class="flexslider">
                <ul class="slides">
                   <li>
                        <img src="webs/images/Banner/principal4.png" alt="">
                   </li>
                   <li>
                        <img src="webs/images/Banner/principal3.png" alt="">
                   </li>
                   <li>
                        <img src="webs/images/Banner/principal2.png" alt="">
                   </li>
                   <li>
                        <img src="webs/images/Banner/principal1.png" alt="">
                   </li>
                   <li>
                        <img src="webs/images/Banner/principal6.jpg" alt="">
                   </li>
           
                </ul>
            </div>
        </div>
        <!--// Main Banner \\-->
        <!--// Main Content \\-->
        <div class="ec-main-content">
            <!--// Main Section \\-->
     
            <!--// Main Section \\-->
            <!--// Main Section \\-->
            <div class="ec-main-section ec-promofull padding-top-10" >
                <div class="container">
                    <div class="row">
                        <!--// Match Fixture \\-->
                           <div class="col-md-6">
                            <div class="ec-fancy-title">
                                <h2>Programación</h2>
                            </div>
                            <div class="ec-nextmatch">
                            <?php

                            $vector = ObtenerTorneosPorDeporte('1','activo');
                            echo (empty($vector)) ? '<div class="center"><cite>No hay programación.</cite></div>' :'';
                            foreach ($vector as $value)
                            {

                                $id = $value['id'];
                                $nombre =$value['nombre'];
                            ?>

                               
                            <div class="item scrollbar-height scrollbar">
                            <div>
                            <h3 class="header-torneo"><?php echo $nombre?></h3>
                            </div>
                            <?php
                            $vectores = ObtenerPartidosDeUnTorneo($id,'1');
                            echo (empty($vectores)) ? '<div class="center"><cite>No hay programación.</cite></div>' :'';
                            foreach ($vectores  as $values)
                                    {
                                        $idpartido=$values['idpartido'];
                                        $equipo1=$values['equipo1'];
                                        $equipo2=$values['equipo2'];
                                        $fecha=$values['fecha'];
                                        $hora=$values['hora'];
                                        $lugar=$values['lugar'];
                                    ?>
                             
                   
                                    <ul class="ec-team-matches add-pointer calendar-detail" id="<?php echo $idpartido?>">
                                        <li class="padding-top-5">
                                            <a href="javascript:void();"><img style="width: 35%;height: 17%" src="images/Escudos/<?php echo LogoClub(ClubEquipo($equipo1))?>" alt=""> <span><?php echo NombreEquipo($equipo1);?></span></a>
                                        </li>
                                        <li>
                                            <time class="ec-color" datetime="2008-02-14 20:00">
                                                <?php echo FormatoFecha($fecha);?>
                                            </time> 
                                            <small>
                                            <?php echo FormatoHora($hora); ?>
                                            </small>
                                            <br>
                                             <small>
                                            <?php echo NombreCancha($lugar); ?>
                                            </small>
                                            </li>
                                        <li class="padding-top-5">
                                            <a href="javascript:void();"><img style="width: 35%;height: 17%" src="images/Escudos/<?php echo LogoClub(ClubEquipo($equipo2))?>" alt=""> <span><?php echo NombreEquipo($equipo2);?></span></a>
                                        </li>
                                    </ul>

                                    <?php

                                    }

                                    ?>
                                </div> 

                                    <?php
                                }
                            ?>
                            </div>
                        </div>
                        <!--// TablePoint \\-->
                        <div class="col-md-6">
                            <div class="ec-fancy-title">
                                <h2>Tabla de posiciones</h2>
                            </div>

                            <div class="ec-nextmatch">
                            <?php

                            $vector = ObtenerTorneosPorDeporte('1','activo');
                            echo (empty($vector)) ? '<div class="center"><cite>No hay programación.</cite></div>' :'';
                            foreach ($vector as $value)
                            {

                                $id = $value['id'];
                                $nombre =$value['nombre'];
                            ?>
                               
                            <div class="item scrollbar-height scrollbar">
                            <div>
                            <h3 class="header-torneo"><?php echo $nombre?></h3>
                            </div>
                            
                            <?php
                            $numero = 1;
                            $vectores = ObtenerTablaPosiciones('8','A',$id);
                            echo (empty($vectores)) ? '<div class="center"><cite>No hay posiciones.</cite></div>' :'<ul class="ec-table-head">
                                    <li>
                                        <div class="ec-cell">#</div>
                                        <div class="ec-cell">Equipo</div>
                                        <div class="ec-cell">P</div>
                                        <div class="ec-cell">PG</div>
                                        <div class="ec-cell">PE</div>
                                        <div class="ec-cell">PP</div>
                                    </li>
                                </ul>';
                            foreach ($vectores  as $values)
                            {
                            
                            ?>
                            <ul class="ec-table-list">
                            <li>
                                        <div class="ec-cell"><?php echo $numero;?></div>
                                        <div class="ec-cell"><?php echo $values['equipo']  ?></div>
                                        <div class="ec-cell"><?php echo $values['puntos']  ?></div>
                                        <div class="ec-cell"><?php echo $values['pj']  ?></div>
                                        <div class="ec-cell"><?php echo $values['pe']  ?></div>
                                        <div class="ec-cell"><?php echo $values['pp']  ?></div>
                                       
                            </li>
                            </ul>
                             
                            <?php

                            $numero = $numero + 1;

                                }

                            ?>

                            </div> 
                            
                            <?php
                                
                                }

                            ?>
                            </div>
                        </div>
                        <!--// TablePoint \\-->
                        <!--// Partner \\-->
                        <div class="col-md-12">
                            <div class="ec-fancy-title">
                                <h2>Patrocinadores</h2>
                            </div>
                            <div class="ec-sponsored">
                                <div class="item">
                                    <a href="#"><img class="height-15" src="webs/images/Partners/macpollo.png" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img class="height-15" src="webs/images/Partners/financieracomultrasan.png" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img class="height-15" src="webs/images/Partners/indersantander.png" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img class="height-15" src="webs/images/Partners/vanguardialiberal.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="ec-fancy-title">
                                <h2>Asociados</h2>
                            </div>
                            <div class="ec-sponsored">
                                <div class="item">
                                    <a href="#"><img class="height-15" src="webs/images/Associates/fifa.png" alt=""></a>
                                </div>
                                <div class="item">
                                     <a href="#"><img class="height-15" src="webs/images/Associates/dimayor.png" alt=""></a></a>
                                </div>
                                <div class="item">
                                     <a href="#"><img class="height-15" src="webs/images/Associates/fedecolfut.png" alt=""></a></a>
                                </div>
                                <div class="item">
                                     <a href="#"><img class="height-15" src="webs/images/Associates/difutbol.png" alt=""></a></a>
                                </div>
                            </div>
                        </div>
                        <!--// Partner \\-->
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
            <!--// Main Section \\-->
      
            <!--// Main Section \\-->
            <!--// Main Section \\-->
            <div class="ec-main-section ec-full-counter">
                <span class="ec-transparent-bg"></span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ec-counter">
                                <ul class="row">
                                    <li class="col-md-3">
                                        <i class="fa fa-globe"></i>
                                        <div class="ec-counter-info">
                                            <small>Equipos</small>
                                            <span class="word-count ec-color"><?php echo Int_Total_Equipos()?></span>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <i class="fa fa-user"></i>
                                        <div class="ec-counter-info">
                                            <small>Jugadores &nbsp; &nbsp;</small>
                                            <span class="word-count ec-color"><?php echo Int_Total_Jugadores('1')?>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <i class="fa fa-hand-o-right"></i>
                                        <div class="ec-counter-info">
                                            <small>Partidos &nbsp; &nbsp; </small>
                                            <span class="word-count ec-color"><?php echo Int_Total_Partidos('2')?>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <i class="fa fa-soccer-ball-o"></i>
                                        <div class="ec-counter-info">
                                            <small>Goles </small>
                                            <span class="word-count ec-color"><?php echo Int_Total_Goles()?>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
            <!--// Main Section \\-->
 
            <!--// Main Section \\-->
        </div>
        <!--// Main Content \\-->
        <footer id="ec-footer">

            <!--// Twitter \\-->
            <!--// Footer Widget \\-->
            <div class="ec-footer-widget">
                <div class="container">
                    <div class="row">
                        <aside class="widget col-md-4 widget_text_info">
                            <div class="ec-section-heading">
                                <h2>Visítanos</h2></div>
                          <ul>
                                <?php echo String_Get_Datos('direccion_2')?>
                            </ul>
                        </aside>
                          <aside class="widget col-md-4 widget_text_info">
                            <div class="ec-section-heading">
                                <h2>Horario de oficina</h2></div>
                            <ul>
                              <?php echo String_Get_Datos('horario')?>
                            </ul>
                        </aside>
                        <aside class="widget col-md-4 widget_text_info">
                            <div class="ec-section-heading">
                                <h2>Comunícate</h2></div>
                            <ul>
                               <?php echo String_Get_Datos('telefono_2')?>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>

             <?php
include('footerinicial.php');
   ?>

<script src="webs/js/index.js"></script>