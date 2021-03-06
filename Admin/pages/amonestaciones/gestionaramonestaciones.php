<?php  
$ubicacion ="../";
include("../menuinicial.php");
include($ubicacion."../php/partidos.php");
include($ubicacion."../php/equipo.php");
include($ubicacion."../php/campeonatos.php");
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
								Selecciona un campeonato 
								<small>Selecciona un campeonato, para visualizar sus respecivos partidos.</small>
							</h2>
						</div>
						<div class="body">
								<label for="">Campeonato</label>
								<div class="form-group">
									<select class="form-control show-tick selector-fechas">
										<option value="0">--Selecciona un campeonato --</option>
										<?php 
										$vector = Array_Get_Campeonatos();
										foreach ($vector as $value) {
									
										?>
								<option value="<?php echo $value['id_torneo']; ?>"><?php echo $value['nombre_torneo']; ?></option>
										<?php
										}
										?>

									</select>
								</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h2>
								Gestionar amonestaciones 
								<small>Seleciona el partido del cual quieres gestionar las amonestaciones.</small>
							</h2>
						</div>
						<div class="body">
							<table class="table table-bordered table-striped table-hover  tabla-resultados">
								<thead>
									<tr>
										<th width="70%">Fecha o Ronda</th>
										<th width="15%">Opciones</th>
									</tr>
								</thead>
								<tbody>
			
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
		<script src="pages/amonestaciones/js/nuevo.js"></script>

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