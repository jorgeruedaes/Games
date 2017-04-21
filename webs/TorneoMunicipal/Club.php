<?php
include('../../menuinicial.php');
$id = $_GET['id'];
?>

<div class="ec-mini-header">
            <span class="ec-blue-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ec-mini-title">
                            <h1><?php echo NombreClub($id)?></h1>
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
                            <div class="ec-fancy-title">
                                <h2>DATOS DEL CLUB</h2>
                            </div>
                            <div class="ec-plyer-information" >
                                <figure style="width:20%">
                                    <a href="#"><img src="webs/images/Escudos/<?php echo LogoClub($id) ?>" alt=""></a>
                                </figure>
                                <div class="ec-plyer-designation" style="width:80%">
                                    <ul>
                                        <li><small>Nombre</small> <span style="width:50%"><?php echo NombreClub($id) ?></span></li>
                                        <li><small>Dirección</small> <span style="width:50%"><?php echo DireccionClub($id) ?></span></li>
                                        <li><small>Télefonos</small> <span style="width:50%"><?php echo TelefonoClub($id) ?></span></li>
                                        <li><small>Correo</small> <span style="width:50%"><?php echo CorreoClub($id) ?></span></li>
                                        <li><small>Presidente</small> <span style="width:50%"><?php echo NombrePresidenteClub($id) ?></span></li>
                                        <li><small>Cancha entrenamientos</small> <span style="width:50%"><?php echo CanchaClub($id) ?></span></li>
                                        <li><small>Horario</small> <span style="width:50%"><?php echo HorarioClub($id) ?></span></li>
                                    </ul>
                                </div>
                            </div>
                          
                        </div>
                        <!--// TablePoint \\-->
                        <!--// Match Fixture \\-->
                        <div class="col-md-9">
                            <div class="ec-fancy-title">
                                <h2>PROGRAMACIÓN</h2>
                            </div>
                            <div class="ec-fixture-list ec-matches-list">
                                <ul>
                                    <li>
                                        <div class="ec-cell"><span>03 Sep. Friday 1:00pm</span></div>
                                        <div class="ec-cell">
                                            <a href="#" class="ec-fixture-flag"><img src="extra-images/fixer-flag-1.png" alt=""> Arsenal</a>
                                            <span class="ec-fixture-vs"><small>vs</small></span>
                                            <a href="#" class="ec-fixture-flag ec-next-flag"><img src="extra-images/fixer-flag-2.png" alt=""> Premier League</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-cell"><span>04 Sep. Monday 1:00pm</span></div>
                                        <div class="ec-cell">
                                            <a href="#" class="ec-fixture-flag"><img src="extra-images/fixer-flag-3.png" alt=""> Liver Pool</a>
                                            <span class="ec-fixture-vs"><small>vs</small></span>
                                            <a href="#" class="ec-fixture-flag ec-next-flag"><img src="extra-images/fixer-flag-4.png" alt=""> South United</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-cell"><span>10 Sep. Sunday1:00pm</span></div>
                                        <div class="ec-cell">
                                            <a href="#" class="ec-fixture-flag"><img src="extra-images/fixer-flag-5.png" alt=""> 1.FCK</a>
                                            <span class="ec-fixture-vs"><small>vs</small></span>
                                            <a href="#" class="ec-fixture-flag ec-next-flag"><img src="extra-images/fixer-flag-6.png" alt=""> Chelsea</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-cell"><span>12 Sep. Wedn 1:00pm</span></div>
                                        <div class="ec-cell">
                                            <a href="#" class="ec-fixture-flag"><img src="extra-images/fixer-flag-7.png" alt=""> Real Madrid</a>
                                            <span class="ec-fixture-vs"><small>vs</small></span>
                                            <a href="#" class="ec-fixture-flag ec-next-flag"><img src="extra-images/fixer-flag-8.png" alt=""> Arsenal</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-cell"><span>03 Sep. Friday 1:00pm</span></div>
                                        <div class="ec-cell">
                                            <a href="#" class="ec-fixture-flag"><img src="extra-images/fixer-flag-1.png" alt=""> Arsenal</a>
                                            <span class="ec-fixture-vs"><small>vs</small></span>
                                            <a href="#" class="ec-fixture-flag ec-next-flag"><img src="extra-images/fixer-flag-2.png" alt=""> Premier League</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-cell"><span>03 Sep. Friday 1:00pm</span></div>
                                        <div class="ec-cell">
                                            <a href="#" class="ec-fixture-flag"><img src="extra-images/fixer-flag-3.png" alt=""> Liver Pool</a>
                                            <span class="ec-fixture-vs"><small>vs</small></span>
                                            <a href="#" class="ec-fixture-flag ec-next-flag"><img src="extra-images/fixer-flag-4.png" alt=""> South United</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-cell"><span>03 Sep. Sunday1:00pm</span></div>
                                        <div class="ec-cell">
                                            <a href="#" class="ec-fixture-flag"><img src="extra-images/fixer-flag-5.png" alt=""> 1.FCK</a>
                                            <span class="ec-fixture-vs"><small>vs</small></span>
                                            <a href="#" class="ec-fixture-flag ec-next-flag"><img src="extra-images/fixer-flag-6.png" alt=""> Chelsea</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-cell"><span>03 Sep. Friday 1:00pm</span></div>
                                        <div class="ec-cell">
                                            <a href="#" class="ec-fixture-flag"><img src="extra-images/fixer-flag-7.png" alt=""> Real Madrid</a>
                                            <span class="ec-fixture-vs"><small>vs</small></span>
                                            <a href="#" class="ec-fixture-flag ec-next-flag"><img src="extra-images/fixer-flag-8.png" alt=""> Arsenal</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-cell"><span>03 Sep. Friday 1:00pm</span></div>
                                        <div class="ec-cell">
                                            <a href="#" class="ec-fixture-flag"><img src="extra-images/fixer-flag-1.png" alt=""> Arsenal</a>
                                            <span class="ec-fixture-vs"><small>vs</small></span>
                                            <a href="#" class="ec-fixture-flag ec-next-flag"><img src="extra-images/fixer-flag-2.png" alt=""> Premier League</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-cell"><span>03 Sep. Friday 1:00pm</span></div>
                                        <div class="ec-cell">
                                            <a href="#" class="ec-fixture-flag"><img src="extra-images/fixer-flag-3.png" alt=""> Liver Pool</a>
                                            <span class="ec-fixture-vs"><small>vs</small></span>
                                            <a href="#" class="ec-fixture-flag ec-next-flag"><img src="extra-images/fixer-flag-4.png" alt=""> South United</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-cell"><span>03 Sep. Sunday1:00pm</span></div>
                                        <div class="ec-cell">
                                            <a href="#" class="ec-fixture-flag"><img src="extra-images/fixer-flag-5.png" alt=""> 1.FCK</a>
                                            <span class="ec-fixture-vs"><small>vs</small></span>
                                            <a href="#" class="ec-fixture-flag ec-next-flag"><img src="extra-images/fixer-flag-6.png" alt=""> Chelsea</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-cell"><span>03 Sep. Friday 1:00pm</span></div>
                                        <div class="ec-cell">
                                            <a href="#" class="ec-fixture-flag"><img src="extra-images/fixer-flag-7.png" alt=""> Real Madrid</a>
                                            <span class="ec-fixture-vs"><small>vs</small></span>
                                            <a href="#" class="ec-fixture-flag ec-next-flag"><img src="extra-images/fixer-flag-8.png" alt=""> Arsenal</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-cell"><span>03 Sep. Friday 1:00pm</span></div>
                                        <div class="ec-cell">
                                            <a href="#" class="ec-fixture-flag"><img src="extra-images/fixer-flag-1.png" alt=""> Arsenal</a>
                                            <span class="ec-fixture-vs"><small>vs</small></span>
                                            <a href="#" class="ec-fixture-flag ec-next-flag"><img src="extra-images/fixer-flag-2.png" alt=""> Premier League</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-cell"><span>03 Sep. Friday 1:00pm</span></div>
                                        <div class="ec-cell">
                                            <a href="#" class="ec-fixture-flag"><img src="extra-images/fixer-flag-3.png" alt=""> Liver Pool</a>
                                            <span class="ec-fixture-vs"><small>vs</small></span>
                                            <a href="#" class="ec-fixture-flag ec-next-flag"><img src="extra-images/fixer-flag-4.png" alt=""> South United</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <aside class="col-md-3">
                            <div class="widget ec-match_widget">
                                <div class="ec-fancy-title">
                                    <h2>RESULTADOS</h2> </div>
                                <ul>
                                    <li>
                                        <div class="ec-cell">
                                            <span>Valenciaca 2</span>
                                        </div>
                                        <div class="ec-cell">
                                            <span class="ec-vs">vs</span>
                                        </div>
                                        <div class="ec-cell">
                                            <span>Real Marid 1</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-cell">
                                            <span>Bristol City 2</span>
                                        </div>
                                        <div class="ec-cell">
                                            <span class="ec-vs">vs</span>
                                        </div>
                                        <div class="ec-cell">
                                            <span>Real Socer 1</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-cell">
                                            <span>Valenciaca 2</span>
                                        </div>
                                        <div class="ec-cell">
                                            <span class="ec-vs">vs</span>
                                        </div>
                                        <div class="ec-cell">
                                            <span>Real Marid 1</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
        </div>
<?php
include('../../footerinicial.php');
?>