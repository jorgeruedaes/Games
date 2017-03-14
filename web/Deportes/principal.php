<?php
include('../../menuinicial.php');
$id = $_GET['id'];
$datos = Get_Deporte($id);
$ipvisitante=$_SERVER["REMOTE_ADDR"];
ContadorVisitas($ipvisitante,'deportes'.'_'.$id);
?>
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="index.php">Inicio</a></li>
				<li><a href="web/deportes.php">Deportes</a></li>
				<li class="active"><a href="web/Deportes/principal.php?id=<?php echo $id ?>"><?php echo $datos['nombre'];?></a></li>
			</ol>
		</div>
		<div class="content-info">
			<div class="container">
				<div class="col-md-12 popular">	
					<table style="width:100% " class="table table-condensed">
						<thead>
							<tr>
								<th style="width:25%"></th>
								<th style="width:75%"></th>
							</tr>
						</thead>
						<tbody>
							<tr style="color: #C0392B;font-size: 1.85em;font-family: 'Audiowide', cursive;margin: 0 0 12px 0;">
								<td>
									<img style=" width :100%; max-width:50px;" src="images/deportes/<?php echo $datos['logo'];?>" alt="">
								</td>
								<td><?php echo $datos['nombre'];?></td>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- content-bottom -->
			<div class="content-info">
				<div class="container">

					<div class="content-bottom-grids">
						<div class="col-md-4 welcome-pic">	
							<h3>Calendario</h3>
							<div style="max-height: 300px; overflow-y:scroll; ">
							<table style="width:100% " class="table table-condensed">
								<thead>
									<tr>
						        <!--<th style="width:40%">Pos</th>
						        <th style="width:20%">PJ</th>
						        <th style="width:30%">PG</th>
						    -->
						</tr>
					</thead>
					<tbody>
					<?php
						//contador para manejar cantidad en inicial
						$contador=0;
						$vector = Get_Lista_Partido_Deporte($id,'1');
						echo (empty($vector)) ? '<cite>No hay partidos programos.</cite>' :'';
						foreach ($vector as $value)
						{
								$torneo =$value['id_torneo'];
								?>
								<tr class="background"  >
									<td colspan="2">Torneo : <?php echo $value['nombre_torneo']; ?></td>
									<td colspan="2">Categoria <?php echo $value['categoria']; ?>
									</td>
								</tr>
								<?php
								$vectores = Get_Lista_Partido_Por_Torneo($torneo,'1');
								foreach ($vectores  as $valores)
								{
									$datospartido = Get_Partido($valores['partido']);
									?>
									<?php
									if ($value['tipo_resultado']=='tiempo') 
									{
										?>
										<tr style="cursor : all-scroll;" onclick="location.href='web/Calendario/calendario-especial.php?id=<?php echo $valores['partido']; ?>'">
											<td>
												<?php
												echo $datospartido['nombre_partido'];	
											}
											else
											{
												?>
												<tr style="cursor : all-scroll;" onclick="location.href='web/Calendario/calendario.php?id=<?php echo $valores['partido']; ?>'">
													<td>
														<?php
														$datosequipos = Get_Equipos_Partido_Clasico($valores['partido']);
														echo NombreEquipo($datosequipos['equipo1']).' vs '.NombreEquipo($datosequipos['equipo2']);
													}

													?>
												</td>
												<td><?php echo  Formato_Fecha_Sin_Ano($datospartido['fecha']).'<br>'.FormatoHora($datospartido['hora']); ?></td>
												<td><?php echo NombreCancha($datospartido['lugar']); ?></td>

											</tr>
											<?php
											$contador=$contador+1;
										}
								}
								?>

					</tbody>
				</table>
				</div>
				
			</div>
			<div class="col-md-4 welcome-pic">
				<h3>Resultados</h3>
				<div style="max-height: 300px; overflow-y:scroll; ">
					<table style="width:100% " class="table table-condensed">
						<thead>
							<tr>
						        <!--<th style="width:40%">Pos</th>
						        <th style="width:20%">PJ</th>
						        <th style="width:30%">PG</th>
						    -->
						</tr>
					</thead>
					<tbody>
						<?php
						//contador para manejar cantidad en inicial
						$contador=0;
						$vector = Get_Lista_Partido_Deporte($id,'2');
						echo (empty($vector)) ? '<cite>No hay resultados.</cite>' :'';
						foreach ($vector as $value)
						{
								$torneo =$value['id_torneo'];
								?>
								<tr class="background"  >
									<td colspan="2">Torneo : <?php echo $value['nombre_torneo']; ?></td>
									<td colspan="2">Categoria <?php echo $value['categoria']; ?>
									</td>
								</tr>
								<?php
								$vectores = Get_Lista_Partido_Por_Torneo($torneo,'1');
								foreach ($vectores  as $valores)
								{
									$datospartido = Get_Partido($valores['partido']);
									?>
									<?php
									if ($value['tipo_resultado']=='tiempo') 
									{
										?>
										<tr style="cursor : all-scroll;" onclick="location.href='web/Resultados/resultado-especiales.php?id=<?php echo $valores['partido']; ?>'">
											<td>
												<?php
												echo $datospartido['nombre_partido'];	
											}
											else
											{
												?>
												<tr style="cursor : all-scroll;" onclick="location.href='web/Resultados/resultados.php?id=<?php echo $valores['partido']; ?>'">
													<td>
														<?php
														$datosequipos = Get_Equipos_Partido_Clasico($valores['partido']);
														echo NombreEquipo($datosequipos['equipo1']).' vs '.NombreEquipo($datosequipos['equipo2']);
													}

													?>
												</td>
												<td><?php echo  Formato_Fecha_Sin_Ano($datospartido['fecha']).'<br>'.FormatoHora($datospartido['hora']); ?></td>
												<td><?php echo NombreCancha($datospartido['lugar']); ?></td>

											</tr>
											<?php
											$contador=$contador+1;
										}
								}
								?>
					</tbody>
				</table>
			</div>
		</div>
		<script src="js/responsiveslides.min.js"></script>
		<div class="col-md-4 welcome-pic">
			<h3>Goleadores</h3>
			<div style="max-height: 300px; overflow-y:scroll;">
				<table style="width:100% " class="table table-condensed">
					<thead>
						<tr class="background">
							<th style="width:3%">Pos</th>
							<th style="width:15%">Jugador</th>
							<th style="width:3%">PJ</th>
							<th style="width:5%">Goles</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$contador=1;
						$vector = ObtenerGoleadoresEquipo($id);
						foreach ($vector as $value)
						{
							$jugador = $value['jugador'];
							?>
							<tr>
								<td><?php echo $contador;?></td>
								<td><?php echo ObtenerNombreCompletoJugador($jugador);?></td>
								<td><?php echo ObtenerPartidosAsistidos($jugador); ?></td>
								<td><?php echo $value['goles']; ?> </td>
							</tr>
							<?php
							$contador = $contador + 1;   
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	
</div>
</div>
<!-- //content-bottom -->

<!-- content-2 PARTE  -->
<div class="content-info">
	<div class="container">

		<div class="content-bottom-grids">
			<div class="col-md-4 welcome-pic">	
				<h3>Amonestaciones</h3>
				<table style="width:100% " class="table table-condensed">
					<thead>
						<tr  class="background">
							<th >Jugador</th>
							<th style="width:15%">Tarjeta</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$vector = AmonestadoFechaeEquipo($id);
						echo (empty($vector)) ? '<tr><td><cite>No hay amonestaciones vigentes.</cite></td></tr>' :'';
						foreach ($vector as  $value) 
							{?>
								<tr>
									<td><?php echo ObtenerNombreCompletoJugador($value['jugador']); ?> </td>
									<td><?php echo ObtenerTipoTarjeta($value['amonestacion']); ?></td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
				<div class="col-md-4 welcome-pic">
					<h3>Tarjetas Acumuladas</h3>
					<div style="max-height: 300px; overflow-y:scroll;">
						<table style="width:100% " class="table table-condensed">
							<thead>
								<tr class="background">
									<th>Jugador</th>
									<th style="width:10%" >Amarilla</th>
									<th style="width:10%">Roja</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$vector = Array_Amonestados_Jugadores($id);
								foreach ($vector as $value)
								{
									?> 
									<tr>
										<td><?php echo ObtenerNombreCompletoJugador($value['jugador']) ?></td>
										<td><?php echo Int_Amonestaciones_Jugadores($value['jugador'],'1'); ?></td>
										<td><?php echo Int_Amonestaciones_Jugadores($value['jugador'],'2'); ?></td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>
					
				</div>
				

				<div class="col-md-4 welcome-pic">
					<h3>Asistencia</h3>
					<div style="max-height: 300px; overflow-y:scroll; ">
						<table style="width:100% " class="table table-condensed">
							<thead>
								<tr class="background">
									<th style="width:50%">Jugador</th>
									<th style="width:20%" >Partidos</th>
									<th style="width:20%" >Porcentaje</th>
								</tr>
							</thead>
							<?php 
							$vector = ObtenerJugadoresEquipo($id);
							
							foreach ($vector as $value) {
								?>
								<tbody>
									<tr>
										<td><?php echo ObtenerNombreCompletoJugador($value['id_jugador'])?></td>
										<td><?php echo Int_PartidosAsistidos_Jugador($value['id_jugador'])?></td>
										<td><?php echo Int_PorcentajeAsistencia_Jugador(Int_PartidosAsistidos_Jugador($value['id_jugador']),18)?></td>
									</tr>
								</tbody>
								<?php 
							}
							?>

						</table>
					</div>
					<div class="clearfix"><br></div>
					<a class="linkeados" href="web/Equipos/asistencia.php?id=<?php echo $id ?>">Ver más..</a>	
				</div>

				<div class="clearfix"></div>
			</div>
			
		</div>
	</div>
	<!-- //content-bottom -->

	<!-- content-3 PARTE  -->
	<div class="content-info">
		<div class="container">

			<div class="content-bottom-grids">

				<div class="col-md-8 popular scroll">	
					<h3>Plantilla de jugadores</h3>
					<div style="max-height: 300px; overflow-y:scroll;">
						<table style="width:100% " class="table table-condensed">
							<thead>
								<tr class="background">
									<th >Jugador</th>
									<th style="width:25%">Carnet</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$vectores = ObtenerJugadoresEquipo($id);
								foreach ($vectores as  $value)
								{
									?>
									<tr>
										<td><?php echo ObtenerNombreCompletoJugador($value['id_jugador']); ?></td>
										<td><img src="web/images/<?php echo ObtenerCarnet($value['fecha_nacimiento']); ?>"
											whith="10px" heigth="10px" style="width: 15px;"></td>
										</tr>
										<?php 
									}
									?>
								</tbody>
							</table>
						</div>
					</div>

				
			</div>
		</div>

	<?php
include('../../footerinicial.php');
	?>
