<?php  
$ubicacion ="../";
include("../menuinicial.php");
include('../../php/noticias.php');
include('../../php/campeonatos.php');
$id_modulos =Int_RutaModulo($_SERVER['REQUEST_URI']);

if(Boolean_Get_Modulo_Permiso($id_modulos,$_SESSION['perfil'])){
	?>
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
			<!-- Basic Table -->
			<div class="row ">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h2>
								GESTION DE NOTICIAS  
							</h2>
							<ul class="header-dropdown m-r--5">
								<li></li>
								<li>
									<button type="button" class="btn bg-red 
									waves-effect add-noticia">
									<i class="material-icons">add</i>
								</button>

							</li>
							<li></li>
						</ul>
					</div>
					<div class="body">
						<table  id="tabla-noticias" class="table table-bordered table-striped table-hover js-basic-example dataTable">
							<thead>
								<tr>
									<th>#</th>
									<th width="70%">Titulo</th>
									<th width="15%">Fecha</th>
									<th width="15%">Opciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$vector = Array_Get_Noticias();
								foreach ($vector as  $value) {
									?>
									<tr>
										<td scope="row"><?php echo $value['id_noticias']; ?></td>
										<td scope="row"><?php echo $value['titulo']; ?></td>
										<td><?php echo $value['fecha']; ?></td>
										<td>
											<div class="btn-group btn-group-xs" role="group" aria-label="Small button group">
												<button 
												data-id="<?php echo $value['id_noticias'];?>"
												data-titulo="<?php echo $value['titulo']; ?>"
												data-fecha="<?php echo $value['fecha'];?>"
												data-emcabezado="<?php echo $value['emcabezado'];?>"
												data-texto="<?php echo $value['texto'];?>"
												data-torneo="<?php echo $value['torneo'];?>"

												type="button" class="btn btn-primary waves-effect edit-item"><i class="material-icons">edit</i></button>
												<button 
												data-id="<?php echo $value['id_noticias'];?>"
												type="button" class="btn btn-danger waves-effect delete-item"><i class="material-icons">delete</i></button>

											</td>
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
		</div>
	</section>

	<!-- JS ====================================================================================================================== -->
	<!--  Js-principal -->
	<script src="pages/noticias/js/nuevo.js"></script>

	<div class="modal fade" id="nuevanoticias" data-perfil="" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="defaultModalLabel">Nueva noticia</h4>
				</div>
				<div class="modal-body">

					<div class="body">
						<form>
							<label for="">Titulo</label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" class="form-control n-titulo" placeholder="Titulo de la noticia" />
								</div>
							</div>
							<label for="">Emcabezado</label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" class="form-control n-emcabezado" placeholder="Resumen corto de la noticia" />
								</div>
							</div>
							<label for="">Torneo</label>
							<div class="form-group">
								<select class="form-control show-tick select-n-torneo">
									<option value="">--Selecciona un torneo --</option>
									<?php 
									$vector = Array_Get_Campeonatos();
									foreach ($vector as  $value) {
										?>
										<option value="<?php echo $value['id_torneo'];?>"><?php echo $value['nombre_torneo']; ?></option>
										<?php
									}
									?>
								</select>
							</div>
							<label for="">Fecha de publicación</label>
							<div class="form-group">
								<div class="form-line">
										<input type="text" id="fecha" class="datepicker form-control n-fecha" placeholder="Seleccina una fecha...">
								</div>
							</div>
							<label for="">Noticia</label>
							<div class="form-group">
								<div class="form-line">
										<textarea class="n-texto" id="ckeditor"></textarea>
								</div>
							</div>

						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info waves-effect guardar-nuevo">Guardar cambios</button>
					<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Dialogs ====================================================================================================================== -->
	<!-- Default Size -->
	<div class="modal fade" id="defaultModal" data-id="" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="defaultModalLabel">Edición de canchas</h4>
				</div>
				<div class="modal-body">

					<div class="body">
						<form>
			<label for="">Titulo</label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" class="form-control titulo" placeholder="Titulo de la noticia" />
								</div>
							</div>
							<label for="">Emcabezado</label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" class="form-control emcabezado" placeholder="resumen corto de la noticia" />
								</div>
							</div>
							<label for="">Torneo</label>
							<div class="form-group">
								<select class="form-control show-tick select-torneo">
									<option value="">--Selecciona un torneo --</option>
									<?php 
									$vector = Array_Get_Campeonatos();
									foreach ($vector as  $value) {
										?>
										<option value="<?php echo $value['id_torneo'];?>"><?php echo $value['nombre_torneo']; ?></option>
										<?php
									}
									?>
								</select>
							</div>
							<label for="">Fecha de publicación</label>
							<div class="form-group">
								<div class="form-line">
										<input type="text" id="fecha" class="datepicker form-control fecha" placeholder="Seleccina una fecha...">
								</div>
							</div>
							<label for="">Noticia</label>
							<div class="form-group">
								<div class="form-line">
								<textarea class="texto" id="ckeditor"></textarea>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info waves-effect guardar">Guardar cambios</button>
					<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>


	<?php
}else
{
	require("../sinpermiso.php");

}
?>


