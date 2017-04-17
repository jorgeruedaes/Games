<?php  
$ubicacion ="../";
include("../menuinicial.php");
include($ubicacion."../php/partidos.php");
include($ubicacion."../php/equipo.php");
$id_modulos =Int_RutaModulo($_SERVER['REQUEST_URI']);
if(Boolean_Get_Modulo_Permiso($id_modulos,$_SESSION['perfil'])){
	?>

	<!-- JQuery DataTable Css -->
	<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

	<section class="content">
		<div class="container-fluid">
			<div class="block-header">
				<h2>
					<ol class="breadcrumb">
						<li>
							<a href="pages/administracion.php">
								<!--<i class="material-icons">home</i>-->
								Administración
							</a>
						</li>
						<?php
						$vector = Array_Get_PadreHijo($id_modulos);
						foreach ($vector as $value)
						{
							?>
							<li>
								<a href="<?php echo $value['ruta'] ?>" class="active">
									<!--<i class="material-icons"><?php echo $value['icono'] ?></i>-->
									<?php echo $value['nombre'] ?>
								</a>
							</li>
							<?php
						}
						?>
					</ol>
				</h2>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h2>
								Agregar resultados 
								<small>Seleciona el partido del cual quieres agregar el resultado.</small>
							</h2>
						</div>
						<div class="body">
							<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
								<thead>
									<tr>
										<th>Partido</th>
										<th>Ronda y fecha</th>
										<th>Opciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$vector = Array_Get_Partidos_Estado('1');
									$i=1;
									foreach ($vector as $value) {
										?>
										<tr>
											<td><?php echo Get_NombreEquipo($value['equipo1'])." <strong>vs</strong> ".Get_NombreEquipo($value['equipo2']) ?></td>
											<td><strong><?php echo $value['Nfecha'] ?></strong><br><?php echo $value['fecha'] ?></td>

											<td>
												<div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
													<button data-id="<?php echo $value['id_partido']?>" type="button" 
														class="btn bg-blue waves-effect
														to-partido"> 
														<i class="material-icons">border_color</i></button>
													</div>	

												</td>
											</tr>
											<?php
											$i++; 
										}
										?>
									</tbody>
								</table>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- JS ====================================================================================================================== -->
		<!--  Js-principal -->
		<script src="pages/partidos/js/partidos.js"></script>

		<!-- Jquery DataTable Plugin Js -->
		<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
		<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

		<!-- Custom Js -->
		<script src="js/pages/tables/jquery-datatable.js"></script>


		<!-- Modal Dialogs ====================================================================================================================== -->
		<!-- Default Size -->
		<?php
	}else
	{
		require("../sinpermiso.php");
	}
	?>