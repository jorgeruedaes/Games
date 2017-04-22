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
                                <figure >
                                    <a href="#"><img src="images/Escudos/<?php echo LogoClub($id) ?>" alt=""></a>
                                </figure>
                                <div class="ec-plyer-designation">
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
                      
                      
                    </div>
                    <br>
                    <br>
                    <div class="row">
                          <div class="col-md-9">
                            <div class="ec-fancy-title">
                                <h2>PROGRAMACIÓN</h2>
                            </div>
                            <div class="ec-fixture-list ec-matches-list">
                                <ul>
                                <?php
                                $vectores = ObtenerPartidosDeUnClub($id,'1');
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
                                    <li>
                                        <div class="ec-cell"><span><?php echo FormatoFecha($fecha) . ' ' . FormatoHora($hora)?></span></div>
                                        <div class="ec-cell"><span><?php echo NombreCancha($lugar)?></span></div>
                                        <div class="ec-cell">
                                            <a href="#" class="ec-fixture-flag"><img src="images/Escudos/<?php echo LogoClub(ClubEquipo($equipo1))?>" alt=""> <?php echo NombreEquipo($equipo1)?></a>
                                            <span class="ec-fixture-vs"><small>vs</small></span>
                                            <a href="#" class="ec-fixture-flag ec-next-flag"><img src="images/Escudos/<?php echo LogoClub(ClubEquipo($equipo2))?>" alt=""><?php echo NombreEquipo($equipo2)?></a>
                                        </div>
                                    </li>
                                <?php
                                }   
                                ?>
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