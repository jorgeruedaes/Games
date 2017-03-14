<?php
include('menuinicial.php');
$ipvisitante=$_SERVER["REMOTE_ADDR"];
ContadorVisitas($ipvisitante,'principal');
?>
<div class="content-info">
	<div class="container">
		<div class="content-bottom-grids">
			<div class="col-md-4 welcome-pic">	
				<h3 class="colortitulos">Calendario</h3>
				<table style="width:100% " class="table table-condensed">
					<thead>
						<tr >
							<th style="width:40%"></th>
							<th style="width:20%"></th>
							<th style="width:30%"></th>

						</tr>
					</thead>
					<tbody>
						<?php
							//contador para manejar cantidad en inicial
						$contador=0;
						$vector = Get_Lista_Torneos_Partido_Programados();
						echo (empty($vector)) ? '<cite>No hay partidos programos.</cite>' :'';
						foreach ($vector as $value)
						{
							if($contador<=3){
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
									$datospartido =Get_Partido($valores['partido']);
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
								}
								?>

							</tbody>
						</table>

						<a class="linkeados" href="web/calendario.php">Ver más..</a>
					</div>
					<div class="col-md-4 welcome-pic">
						<h3>Resultados</h3>
						<table style="width:100% " class="table table-condensed">
							<thead>
								<tr >
									<th style="width:40%"></th>
									<th style="width:20%"></th>
									<th style="width:30%"></th>

								</tr>
							</thead>
							<tbody>
								<?php
							//contador para manejar cantidad en inicial
								$contador=0;
								$vector = Get_Lista_Torneos_Partido_Terminados();
								echo (empty($vector)) ? '<cite>No hay partidos terminados.</cite>' :'';
								foreach ($vector as $value)
								{
									if($contador<=3){
										$torneo =$value['id_torneo'];

										?>
										<tr class="background"  >
											<td colspan="2">Torneo: <?php echo $value['nombre_torneo']; ?></td>
											<td colspan="2">Categoria <?php echo $value['categoria']; ?>
											</td>
										</tr>
										<?php
										$vectores = Get_Lista_Partido_Por_Torneo($torneo,'2');
										foreach ($vectores  as $valores)
										{
											$datospartido =Get_Partido($valores['partido']);

											if ($value['tipo_resultado']=='tiempo') 
											{
												?>
												<tr style="cursor : all-scroll;" onclick="location.href='web/Resultados/resultado-especiales.php?id=<?php echo $valores['partido']; ?>'">

													<td colspan="2"><?php echo $datospartido['nombre_partido'] ?></td>

													<td><?php echo  Formato_Fecha_Sin_Ano($datospartido['fecha']).'<br>'.FormatoHora($datospartido['hora']); ?></td>

												</tr>	
												<?php
											}
											else
											{
												$datosequipos = Get_Equipos_Partido_Clasico($valores['partido']);
												?>
												<tr style="cursor : all-scroll;" onclick="location.href='web/Resultados/resultados.php?id=<?php echo $valores['partido']; ?>'">

													<td><?php echo NombreEquipo($datosequipos['equipo1']) ?></td>
													<td><?php echo  $datosequipos['resultado1'].'-'.$datosequipos['resultado2']; ?></td>
													<td><?php echo NombreEquipo($datosequipos['equipo2']); ?></td>
												</tr>	
												<?php
											}
											?>
											<?php
											$contador=$contador+1;
										}


									}
								}
								?>
							</tbody>
						</table>
						<a class="linkeados" href="web/calendario.php">Ver más..</a>
					</div>
					<div class="col-md-4 welcome-pic">
						<h3>Medallero</h3>
						<table style="width:100% " class="table table-condensed">
							<thead>
								<tr class="background">
									<th style="width:5%"></th>
									<th >Colegio</th>
									<th style="width:10%"><img src="images/deportes/oro.png" alt="Smiley face" height="25" width="25"></th>
									<th style="width:10%"><img src="images/deportes/plata.png" alt="Smiley face" height="25" width="25"></th>
									<th style="width:10%"><img src="images/deportes/bronze.png" alt="Smiley face" height="25" width="25"></th>
									<th style="width:5%">Total</th>

								</tr>
							</thead>

							<tbody>
								<?php
								$vector = Get_Medallero();
								$contador = 1;
								foreach ($vector as  $value)
								{     
									?>
									<tr style="cursor : all-scroll;" onclick="location.href='web/Equipos/principal.php?id=<?php echo $value['id_colegio']; ?>'">
										<td><?php echo $contador; ?> </td>
										<td><?php echo $value['nombre']; ?></td>
										<td><?php echo $value['oro']; ?> </td>
										<td><?php echo $value['plata']; ?> </td>
										<td> <?php echo $value['bronce']; ?></td>
										<td> <?php echo $value['total']; ?></td>
									</tr>
									<?php
									$contador = $contador + 1;
								}
								?>
							</tbody>
						</table>
						<a class="linkeados" href="web/estadisticas.php#goleadores">Ver más..</a>	  
					</div>

					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<?php
		include('footerinicial.php');
		?>

