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
                   <!--  <li>
                        <img src="webs/extra-images/banner-2.jpg" alt="">
                        <span class="ec-transparent-color"></span>
                        <div class="ec-caption">
                            <div class="container">
                                <div class="caption-inner-wrap">
                                    <time class="ec-bgcolor" datetime="2008-02-14 20:00">From the March 7, 2014</time>
                                    <div class="clearfix"></div>
                                    <h1>Welcome to eyesports</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id justo a arcu viverra placerat in eget dolor. In hac habitasse platea dictumst. Etiam porta diam sed lacus pharetra, elementum molestie metus fermentum.</p>
                                    <a href="#" class="ec-bgcolor">Read More</a>
                                </div>
                                <div class="ec-caption-image"> <img src="webs/extra-images/banner-static.png" alt=""> </div>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
        <!--// Main Banner \\-->
        <!--// Main Content \\-->
        <div class="ec-main-content">
            <!--// Main Section \\-->
          <!--   <div class="ec-main-section ec-newsticker-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ec-newsticker">
                                <span class="ec-color"><small>Latest News</small></span>
                                <ul id="ec-news">
                                    <li><a href="#">September 29, 2014 - impressive seven in his first four games</a></li>
                                    <li><a href="#"> Bibendum bibendumuris suscipit convallis ultrices. - 11 September 2015 </a></li>
                                    <li><a href="#">Quisque eleifend auctor turpis mauris non convallis dui. - 12 August 2015</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--// Main Section \\-->
            <!--// Main Section \\-->
            <div class="ec-main-section ec-promofull">
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
                            echo (empty($vector)) ? '<cite>No hay programación.</cite>' :'';
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
                            echo (empty($vectores)) ? '<cite>No hay programación.</cite>' :'';
                            foreach ($vectores  as $values)
                                    {

                                        $equipo1=$values['equipo1'];
                                        $equipo2=$values['equipo2'];
                                        $fecha=$values['fecha'];
                                        $hora=$values['hora'];
                                        $lugar=$values['lugar'];
                                    ?>
                             
                   
                                    <ul class="ec-team-matches">
                                        <li>
                                            <a href="#"><img src="webs/extra-images/next-match-1.png" alt=""> <span><?php echo NombreEquipo($equipo1);?></span></a>
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
                                        <li>
                                            <a href="#"><img src="webs/extra-images/next-match-2.png" alt=""> <span><?php echo NombreEquipo($equipo2);?></span></a>
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
                            echo (empty($vector)) ? '<cite>No hay programación.</cite>' :'';
                            foreach ($vector as $value)
                            {

                                $id = $value['id'];
                                $nombre =$value['nombre'];
                            ?>
                               
                            <div class="item scrollbar-height scrollbar">
                            <div>
                            <h3 class="header-torneo"><?php echo $nombre?></h3>
                            </div>
                            <ul class="ec-table-head">
                                    <li>
                                        <div class="ec-cell">#</div>
                                        <div class="ec-cell">Equipo</div>
                                        <div class="ec-cell">P</div>
                                        <div class="ec-cell">PG</div>
                                        <div class="ec-cell">PE</div>
                                        <div class="ec-cell">PP</div>
                                    </li>
                                </ul>
                            <?php
                            $numero = 1;
                            $vectores = ObtenerTablaPosiciones('8','A',$id);
                            echo (empty($vectores)) ? '<cite>No hay posiciones.</cite>' :'';
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
                                    <a href="#"><img src="webs/images/Partners/macpollo.png" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img src="webs/images/Partners/financieracomultrasan.png" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img src="webs/images/Partners/indersantander.png" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img src="webs/images/Partners/vanguardialiberal.png" alt=""></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="ec-fancy-title">
                                <h2>Asociados</h2>
                            </div>
                            <div class="ec-sponsored">
                                <div class="item">
                                    <a href="#"><img src="webs/extra-images/partner-logo-1.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img src="webs/extra-images/partner-logo-2.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img src="webs/extra-images/partner-logo-3.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img src="webs/extra-images/partner-logo-4.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img src="webs/extra-images/partner-logo-5.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img src="webs/extra-images/partner-logo-6.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <!--// Partner \\-->
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
            <!--// Main Section \\-->
            <!-- <div class="ec-main-section ec-full-parallexbg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ec-parallex-info">
                                <span>ready to be Join</span>
                                <h2>Boss 'understands if striker wanted move</h2>
                                <p>Vardy has been one of the stars of the season so far and is currently the top scorer. in the Premier League with 10 goals to his name.</p>
                                <a href="#" class="ec-default-button">FREE ENTER</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--// Main Section \\-->
            <!--// Main Section \\-->
          <!--   <div class="ec-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ec-fancy-title">
                                <h2>Next Match</h2>
                            </div>
                            <div class="ec-nextmatch">
                                <div class="item">
                                    <ul class="ec-team-matches">
                                        <li>
                                            <a href="#"><img src="webs/extra-images/next-match-1.png" alt=""> <span>Arsenal</span></a>
                                        </li>
                                        <li><small>Thurseday</small>
                                            <time class="ec-color" datetime="2008-02-14 20:00">28 October</time> <small>15:00pm</small></li>
                                        <li>
                                            <a href="#"><img src="webs/extra-images/next-match-2.png" alt=""> <span>Premier League</span></a>
                                        </li>
                                    </ul>
                                    <div id="ec-Countdown" class="ec-match-countdown"></div>
                                    <a href="#" class="ec-ticket-button">Less Than 600 Tickets Left For Villa</a>
                                </div>
                                <div class="item">
                                    <ul class="ec-team-matches">
                                        <li>
                                            <a href="#"><img src="webs/extra-images/next-match-1.png" alt=""> <span>Arsenal</span></a>
                                        </li>
                                        <li><small>Thurseday</small>
                                            <time class="ec-color" datetime="2008-02-14 20:00">22 October</time> <small>15:00pm</small></li>
                                        <li>
                                            <a href="#"><img src="webs/extra-images/next-match-2.png" alt=""> <span>Premier League</span></a>
                                        </li>
                                    </ul>
                                    <div id="ec-Countdowntwo" class="ec-match-countdown"></div>
                                    <a href="#" class="ec-ticket-button">Less Than 600 Tickets Left For Villa</a>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="ec-fancy-title">
                                <h2>Latest Result</h2>
                                <span>On Live</span>
                            </div>
                            <div class="ec-latest-result-wrap">
                                <div class="ec-latest-result">
                                    <ul>
                                        <li>
                                            <span>Corner FC</span>
                                            <img src="webs/extra-images/latest-result-1.png" alt="">
                                            <span>Win</span>
                                        </li>
                                        <li>
                                            <div class="ec-result-time">
                                                <div class="ec-time-wrap">
                                                    3:1
                                                    <small>14 October 2016 21:00 (FT)</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <span>LiMax</span>
                                            <img src="webs/extra-images/latest-result-2.png" alt="">
                                            <span>Loss</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ec-skillst">
                                    <div class="skillbar" data-percent="40%">
                                        <div class="count-bar">
                                            <div class="count"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div> -->
            <!--// Main Section \\-->
            <!--// Main Section \\-->
         <!--    <div class="ec-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ec-simple-title">
                                <h2>Controlling Related Videos</h2>
                                <p>Bafe Gomis’ header sealed the comeback for Garry Monk’s side, who went on to complete the double over Arsenal later</p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="ec-blog ec-blog-medium">
                                <ul class="row">
                                    <li class="col-md-12">
                                        <div class="ec-blog-wrap">
                                            <figure>
                                                <a href="#"><img src="webs/extra-images/blog-medium-1.jpg" alt=""></a>
                                                <figcaption>
                                                    <span><small>8:12</small></span>
                                                    <a href="#" class="fa fa-play ec-playbutton"></a>
                                                </figcaption>
                                            </figure>
                                            <div class="ec-blog-text">
                                                <ul class="ec-blog-option">
                                                    <li><i class="fa fa-user"></i> Admin by. <a href="#" class="ec-colorhover">Alexander Protikhin</a></li>
                                                </ul>
                                                <h2><a href="#">Stamford Bridge contact information</a></h2>
                                                <p>Africa has some of the most incredible soccer teams (referre to as “football” for. <a href="#" class="ec-color">Watch</a></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-12">
                                        <div class="ec-blog-wrap">
                                            <figure>
                                                <a href="#"><img src="webs/extra-images/blog-medium-2.jpg" alt=""></a>
                                                <figcaption>
                                                    <span><small>2:00</small></span>
                                                    <a href="#" class="fa fa-play ec-playbutton"></a>
                                                </figcaption>
                                            </figure>
                                            <div class="ec-blog-text">
                                                <ul class="ec-blog-option">
                                                    <li><i class="fa fa-user"></i> Admin by. <a href="#" class="ec-colorhover">Jonathan Yurek</a></li>
                                                </ul>
                                                <h2><a href="#">Barrow looking for a repeat Performance</a></h2>
                                                <p>Africa has some of the most incredible soccer teams (referre to as “football” for. <a href="#" class="ec-color">Watch</a></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-12">
                                        <div class="ec-blog-wrap">
                                            <figure>
                                                <a href="#"><img src="webs/extra-images/blog-medium-3.jpg" alt=""></a>
                                                <figcaption>
                                                    <span><small>1:26</small></span>
                                                    <a href="#" class="fa fa-play ec-playbutton"></a>
                                                </figcaption>
                                            </figure>
                                            <div class="ec-blog-text">
                                                <ul class="ec-blog-option">
                                                    <li><i class="fa fa-user"></i> Admin by. <a href="#" class="ec-colorhover">Dino Henderson</a></li>
                                                </ul>
                                                <h2><a href="#">We'll have to be at our best</a></h2>
                                                <p>Africa has some of the most incredible soccer teams (referre to as “football” for. <a href="#" class="ec-color">Watch</a></p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="ec-frame">
                                <iframe src="https://player.vimeo.com/video/165441527" height="374"></iframe>
                            </div>
                            <div class="ec-gallery-slider gallery">
                                <div class="item">
                                    <a title="" rel="prettyPhoto[gallery1]" href="webs/extra-images/banner-1.jpg"><img src="webs/extra-images/slider-gallery-1.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a title="" rel="prettyPhoto[gallery1]" href="webs/extra-images/banner-2.jpg"><img src="webs/extra-images/slider-gallery-2.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a title="" rel="prettyPhoto[gallery1]" href="webs/extra-images/banner-1.jpg"><img src="webs/extra-images/slider-gallery-3.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a title="" rel="prettyPhoto[gallery1]" href="webs/extra-images/banner-2.jpg"><img src="webs/extra-images/slider-gallery-4.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
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
       <!--      <div class="ec-main-section blog-grid-full">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ec-simple-title">
                                <h2>Latest news</h2>
                                <p>Bafe Gomis’ header sealed the comeback for Garry Monk’s side, who went on to complete the double over Arsenal later</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="ec-blog ec-blog-grid">
                                <ul class="row">
                                    <li class="col-md-4">
                                        <div class="ec-blog-wrap">
                                            <figure>
                                                <a href="#"><img src="webs/extra-images/blog-grid-1.jpg" alt=""></a> <span class="ec-featured-star ec-bgcolor"><i class="fa fa-star"></i></span></figure>
                                            <div class="ec-blog-text">
                                                <h2><a href="#">United, Palace Aim To Rebound From Setbacks</a></h2>
                                                <div class="ec-grid-time">
                                                    <span><i class="fa fa-clock-o"></i> 3 hours ago</span>
                                                    <a href="#" class="fa fa-angle-right"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <div class="ec-blog-wrap">
                                            <figure>
                                                <a href="#"><img src="webs/extra-images/blog-grid-2.jpg" alt=""></a>
                                            </figure>
                                            <div class="ec-blog-text">
                                                <h2><a href="#">The summer of 2014 was understandably all about the</a></h2>
                                                <div class="ec-grid-time">
                                                    <span><i class="fa fa-clock-o"></i> 1 hours ago</span>
                                                    <a href="#" class="fa fa-angle-right"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <div class="ec-blog-wrap">
                                            <figure>
                                                <a href="#"><img src="webs/extra-images/blog-grid-3.jpg" alt=""></a> <span class="ec-featured-star ec-bgcolor"><i class="fa fa-star"></i></span></figure>
                                            <div class="ec-blog-text">
                                                <h2><a href="#">Sevilla finished fifth and just out of the Champions League spots</a></h2>
                                                <div class="ec-grid-time">
                                                    <span><i class="fa fa-clock-o"></i> 1 day ago</span>
                                                    <a href="#" class="fa fa-angle-right"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--// Main Section \\-->
            <!--// Main Section \\-->
          <!--   <div class="ec-main-section blog-grid-full">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ec-simple-title">
                                <h2>Meet Our Team</h2>
                                <p>Bafe Gomis’ header sealed the comeback for Garry Monk’s side, who went on to complete the double over Arsenal later</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="ec-team ec-team-grid">
                                <ul class="row">
                                    <li class="col-md-3">
                                        <div class="ec-team-wrap">
                                            <figure>
                                                <a href="#"><img src="webs/extra-images/team-grid-1.jpg" alt=""></a>
                                            </figure>
                                            <div class="ec-team-info">
                                                <div class="ec-forinfo">
                                                    <h3><a href="#">KELVIN DAVIS</a></h3>
                                                    <small>gOALKEEPER</small>
                                                </div>
                                                <span class="ec-goal-counter ec-bgcolor">06</span>
                                                <span class="ec-plyer-info">Born August 31, 1988 <br> Medellin, Colombia</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="ec-team-wrap">
                                            <figure>
                                                <a href="#"><img src="webs/extra-images/team-grid-2.jpg" alt=""></a>
                                            </figure>
                                            <div class="ec-team-info">
                                                <div class="ec-forinfo">
                                                    <h3><a href="#">Debuchy Profile</a></h3>
                                                    <small>Defender</small>
                                                </div>
                                                <span class="ec-goal-counter ec-bgcolor">12</span>
                                                <span class="ec-plyer-info">Born August 31, 1988 <br> Medellin, Colombia</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="ec-team-wrap">
                                            <figure>
                                                <a href="#"><img src="webs/extra-images/team-grid-3.jpg" alt=""></a>
                                            </figure>
                                            <div class="ec-team-info">
                                                <div class="ec-forinfo">
                                                    <h3><a href="#">Laurent Koscielny</a></h3>
                                                    <small>Midfielder</small>
                                                </div>
                                                <span class="ec-goal-counter ec-bgcolor">10</span>
                                                <span class="ec-plyer-info">Born August 31, 1988 <br> Medellin, Colombia</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="ec-team-wrap">
                                            <figure>
                                                <a href="#"><img src="webs/extra-images/team-grid-4.jpg" alt=""></a>
                                            </figure>
                                            <div class="ec-team-info">
                                                <div class="ec-forinfo">
                                                    <h3><a href="#">Tomas Rosicky</a></h3>
                                                    <small>Striker</small>
                                                </div>
                                                <span class="ec-goal-counter ec-bgcolor">08</span>
                                                <span class="ec-plyer-info">Born August 31, 1988 <br> Medellin, Colombia</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--// Main Section \\-->
            <!--// Main Section \\-->
  <!--           <div class="ec-main-section blog-grid-full">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ec-testimonial flexslider">
                                <ul class="slides">
                                    <li>
                                        <div class="ec-testimonial-wrap">
                                            <h2>People Love us</h2>
                                            <p>“Fiercely contested matches between Kaizer Chiefs and Orlando Pirates have become known as The Soweto Derby some of South Africa's biggest and most popular sporting events.”</p>
                                            <img src="webs/extra-images/testimonial-1.jpg" alt="">
                                            <span>Jorge Olino</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-testimonial-wrap">
                                            <h2>People Love us</h2>
                                            <p>“Fiercely contested matches between Kaizer Chiefs and Orlando Pirates have become known as The Soweto Derby some of South Africa's biggest and most popular sporting events.”</p>
                                            <img src="webs/extra-images/testimonial-2.jpg" alt="">
                                            <span>Jorge Olino</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-testimonial-wrap">
                                            <h2>People Love us</h2>
                                            <p>“Fiercely contested matches between Kaizer Chiefs and Orlando Pirates have become known as The Soweto Derby some of South Africa's biggest and most popular sporting events.”</p>
                                            <img src="webs/extra-images/testimonial-1.jpg" alt="">
                                            <span>Jorge Olino</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--// Main Section \\-->
            <!--// Main Section \\-->
         <!--    <div class="ec-main-section blog-grid-full">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ec-simple-title">
                                <h2>Welcome To Our Gallery</h2>
                                <p>Real Madrid and Barcelona. Barcelona and Real Madrid. Spanish football has been about those two massive</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="ec-gallery ec-simple-gallery">
                                <ul class="row gallery">
                                    <li class="col-md-3">
                                        <figure>
                                            <a href="#"><img src="webs/extra-images/gallery-list-1.jpg" alt=""></a>
                                            <figcaption>
                                                <a title="" rel="prettyPhoto[gallery1]" href="webs/extra-images/gallery-list-1.jpg" class="ec-color"><i class="fa fa-compress"></i></a>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <li class="col-md-3">
                                        <figure>
                                            <a href="#"><img src="webs/extra-images/gallery-list-2.jpg" alt=""></a>
                                            <figcaption>
                                                <a title="" rel="prettyPhoto[gallery1]" href="webs/extra-images/gallery-list-2.jpg" class="ec-color"><i class="fa fa-compress"></i></a>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <li class="col-md-3">
                                        <figure>
                                            <a href="#"><img src="webs/extra-images/gallery-list-3.jpg" alt=""></a>
                                            <figcaption>
                                                <a title="" rel="prettyPhoto[gallery1]" href="webs/extra-images/gallery-list-3.jpg" class="ec-color"><i class="fa fa-compress"></i></a>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <li class="col-md-3">
                                        <figure>
                                            <a href="#"><img src="webs/extra-images/gallery-list-4.jpg" alt=""></a>
                                            <figcaption>
                                                <a title="" rel="prettyPhoto[gallery1]" href="webs/extra-images/gallery-list-4.jpg" class="ec-color"><i class="fa fa-compress"></i></a>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <li class="col-md-3">
                                        <figure>
                                            <a href="#"><img src="webs/extra-images/gallery-list-5.jpg" alt=""></a>
                                            <figcaption>
                                                <a title="" rel="prettyPhoto[gallery1]" href="webs/extra-images/gallery-list-5.jpg" class="ec-color"><i class="fa fa-compress"></i></a>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <li class="col-md-3">
                                        <figure>
                                            <a href="#"><img src="webs/extra-images/gallery-list-6.jpg" alt=""></a>
                                            <figcaption>
                                                <a title="" rel="prettyPhoto[gallery1]" href="webs/extra-images/gallery-list-6.jpg" class="ec-color"><i class="fa fa-compress"></i></a>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <li class="col-md-3">
                                        <figure>
                                            <a href="#"><img src="webs/extra-images/gallery-list-7.jpg" alt=""></a>
                                            <figcaption>
                                                <a title="" rel="prettyPhoto[gallery1]" href="webs/extra-images/gallery-list-7.jpg" class="ec-color"><i class="fa fa-compress"></i></a>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <li class="col-md-3">
                                        <figure>
                                            <a href="#"><img src="webs/extra-images/gallery-list-8.jpg" alt=""></a>
                                            <figcaption>
                                                <a title="" rel="prettyPhoto[gallery1]" href="webs/extra-images/gallery-list-8.jpg" class="ec-color"><i class="fa fa-compress"></i></a>
                                            </figcaption>
                                        </figure>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--// Main Section \\-->
            <!--// Main Section \\-->
           <!--  <div class="ec-main-section shop-grid-full">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ec-section-heading">
                                <h2>Our Favourite Shop</h2></div>
                        </div>
                        <div class="col-md-12">
                            <div class="ec-shop ec-shop-list">
                                <ul class="row">
                                    <li class="col-md-3">
                                        <figure>
                                            <a href="#" class="ec-shop-thumb"><img src="webs/extra-images/shop-list-1.jpg" alt=""></a>
                                            <span class="ec-festured">Sale</span>
                                            <figcaption>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-search"></i></a></li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                        <div class="ec-shopinfo">
                                            <h2><a href="#">Sports shores</a></h2>
                                            <span class="ec-price"><del><span class="amount">£300</span></del>
                                            <ins><span class="amount">£250</span></ins>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <figure>
                                            <a href="#" class="ec-shop-thumb"><img src="webs/extra-images/shop-list-2.jpg" alt=""></a>
                                            <figcaption>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-search"></i></a></li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                        <div class="ec-shopinfo">
                                            <h2><a href="#">Sports shores</a></h2>
                                            <span class="ec-price"><del><span class="amount">£300</span></del>
                                            <ins><span class="amount">£250</span></ins>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <figure>
                                            <a href="#" class="ec-shop-thumb"><img src="webs/extra-images/shop-list-3.jpg" alt=""></a>
                                            <span class="ec-festured">Sale</span>
                                            <figcaption>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-search"></i></a></li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                        <div class="ec-shopinfo">
                                            <h2><a href="#">Sports shores</a></h2>
                                            <span class="ec-price"><del><span class="amount">£300</span></del>
                                            <ins><span class="amount">£250</span></ins>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <figure>
                                            <a href="#" class="ec-shop-thumb"><img src="webs/extra-images/shop-list-4.jpg" alt=""></a>
                                            <figcaption>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-search"></i></a></li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                        <div class="ec-shopinfo">
                                            <h2><a href="#">Sports shores</a></h2>
                                            <span class="ec-price"><del><span class="amount">£300</span></del>
                                            <ins><span class="amount">£250</span></ins>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--// Main Section \\-->
        </div>
        <!--// Main Content \\-->
        <footer id="ec-footer">
            <!--// Twitter \\-->
       <!--      <div class="ec-twitter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 twiiter-icon">
                            <i class="fa fa-twitter"></i>
                            <span>2 hours ago</span>
                        </div>
                        <div class="col-md-10">
                            <div class="ec-twitter-slider">
                                <div class="item">
                                    <p><a href="#">@alexwhite</a> Singolo is a free PSD template of a flat, single page website created by <a href="#">@PsdChat #freebie #psd http://bit.ly/19XM8Lj</a></p>
                                </div>
                                <div class="item">
                                    <p><a href="#">@alexwhite</a> Singolo is a free PSD template of a flat, single page website created by <a href="#">@PsdChat #freebie #psd http://bit.ly/19XM8Lj</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
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