<?php  
$ubicacion ="../";
$id_modulos="39";
include("../menuinicial.php");
include('../../php/campeonatos.php');
if(Boolean_Get_Modulo_Permiso($id_modulos,"3")){
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
								GESTION DE CAMPEONATOS 
							</h2>
							<ul class="header-dropdown m-r--5">
								<li></li>
								<li>
									<button type="button" class="btn bg-red 
									waves-effect add-perfil">
									<i class="material-icons">add</i>
								</button>

							</li>
							<li></li>
						</ul>
					</div>
					<div class="body table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Categoria</th>
									<th>Reglamentos</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$vector = Array_Get_Campeonatos();
								foreach ($vector as  $value) {
									?>
									<tr>
										<th scope="row"><?php echo $value['id_torneo']; ?></th>
										<td><?php echo $value['nombre_torneo']; ?></td>
										<td><?php echo $value['categoria']; ?></td>
										<td> 
											<div class="demo-google-material-icon"><a href="../Archivos/Reglamentos/<?php echo $value['reglamento']; ?>" target="_blank"> <i class="material-icons">picture_as_pdf</i> <span class="icon-name"></span><a/></div>
										</td>
										<td>
											<div class="btn-group btn-group-xs" role="group" aria-label="Small button group">
												<button  data-categoria="<?php echo $value['categoria']; ?>"  data-nombre="<?php echo $value['nombre_torneo']; ?>" data-id="<?php echo $value['id_torneo']; ?>" type="button" class="btn btn-primary waves-effect edit-item"><i class="material-icons">edit</i></button>
												<button  data-id="<?php echo $value['id_torneo']; ?>" type="button" class="btn btn-primary waves-effect add-pdf"><i class="material-icons">picture_as_pdf</i></button>

											</div>

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
<script src="pages/campeonatos/js/nuevo.js"></script>

<div class="modal fade" id="nuevoPerfil" data-perfil="" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="defaultModalLabel">Nuevo de campeonato</h4>
			</div>
			<div class="modal-body">

				<div class="body">
					<form>
						<label for="perfil">Nombre</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control nuevo-nombre" placeholder="Nombre perfil" />
							</div>
						</div>
						<label for="estado">Categoria</label>
						<div class="form-group ">
							<select class="form-control show-tick select-nuevo-categoria">
								<option value="">--Selecciona una categoria --</option>

								<option value="menores">Menores</option>
								<option value="intermedio">Intermedio</option>
								<option value="Mayores">Mayores</option>

							</select>
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
<div class="modal fade" id="defaultModal" data-perfil="" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="defaultModalLabel">Edición Campeonato</h4>
			</div>
			<div class="modal-body">

				<div class="body">
					<form>
						<label for="perfil">Campeonato</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control nombre" placeholder="Nombre campeonato" />
							</div>
						</div>
						<label for="estado">Categoria</label>
						<div class="form-group ">
							<div class="form-line">
								<input type="Text" class="form-control nivel" placeholder="Categoria" />
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

<!-- Default Size -->
<div class="modal fade" id="defaultModalReglamentos" data-perfil="" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="defaultModalLabel">Agregar Reglamentos</h4>
			</div>
			<div class="modal-body">

				<div class="body">
					<form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
						<div class="dz-message">
							<div class="drag-icon-cph">
								<i class="material-icons">touch_app</i>
							</div>
							<h3>Arrastra el archivo o Haz click para cargarlo.</h3>
							<em>(Selecciona solamente  <strong>un (1 )</strong> Archivo.)</em>
						</div>
						<div class="fallback">
							<input name="file" type="file" multiple />
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info waves-effect guardar-reglamentos">Guardar</button>
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
