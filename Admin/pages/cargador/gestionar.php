<?php  
$ubicacion ="../";
include("../menuinicial.php");
include('../../php/cargador.php');
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
								GESTION DE ARCHIVOS  
							</h2>
							<ul class="header-dropdown m-r--5">
								<li></li>
								<li>
									<button type="button" class="btn bg-red 
									waves-effect add-files">
									<i class="material-icons">add</i>
								</button>

							</li>
							<li></li>
						</ul>
					</div>
					<div class="body">
						<div class="row clearfix">

							<?php
							$vector =  Read_Files_Folder('../../../Archivos');

							foreach ($vector as $value) {
								?>

								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<div class="info-box-4 hover-zoom-effect">
										<div class="icon ">
											<i class="material-icons col-<?php echo Get_Icon($value['Extension'])[1]?>"><?php echo Get_Icon($value['Extension'])[0]; ?></i>
										</div>
										<div class="content">
											<div class="text"><?php  echo strtoupper($value['FileName'])?></div>
											<div class="number">
												<button type="button" data-url="<?php  echo $value['Url'];?>" data-toggle="tooltip" data-placement="right" title="Copiar la url al portapapeles" class="btn bg-primary btn-circle waves-effect waves-circle waves-float copy-clipboard">
													<i class="material-icons">content_copy</i>
												</button>
												<button type="button" data-url="<?php  echo $value['Url'];?>" data-toggle="tooltip" data-placement="right" title="Vista previa"  class="btn bg-indigo btn-circle waves-effect waves-circle waves-float preview">
													<i class="material-icons"><?php echo Get_Icon($value['Extension'])[0]; ?></i>
												</button>

												<button type="button" data-toggle="tooltip" data-placement="right" title="Eliminar archivo"  class="btn bg-red btn-circle waves-effect waves-circle waves-float delete">
													<i class="material-icons">delete_forever</i>
												</button>

											</div>
										</div>
									</div>
								</div>
								<?php
							}
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- JS ====================================================================================================================== -->
<!--  Js-principal -->
<script src="pages/cargador/js/nuevo.js"></script>

<div class="modal fade" id="nuevacomunicados" data-perfil="" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="defaultModalLabel">Nuevo comunicado</h4>
			</div>
			<div class="modal-body">

				<div class="body">
					<form>
						<label for="">Titulo</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control n-titulo" placeholder="Titulo del comunicado" />
							</div>
						</div>
						<div class="row clearfix">
							<div class="col-sm-6">
								<label for="">Tipo</label>
								<div class="form-group">
									<select class="form-control show-tick select-n-tipo">
										<option value="">--Selecciona un tipo --</option>
										<option value="boletin">Boletín</option>
										<option value="resolucion">Resolución</option>
										<option value="documentos">Documentos</option>

									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<label for="">Fecha de publicación</label>
								<div class="form-group">
									<div class="form-line">
										<input type="text" id="fecha" class="datepicker form-control n-fecha" placeholder="Seleccina una fecha...">
									</div>
								</div>
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
				<h4 class="modal-title" id="defaultModalLabel">Edición de comunicados</h4>
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
						<div class="row clearfix">
							<div class="col-sm-6">
								<label for="">Tipo</label>
								<div class="form-group">
									<select class="form-control show-tick select-tipo">
										<option value="">--Selecciona un tipo --</option>
										<option value="boletin">Boletín</option>
										<option value="resolucion">Resolución</option>
										<option value="documentos">Documentos</option>

									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<label for="">Fecha de publicación</label>
								<div class="form-group">
									<div class="form-line">
										<input type="text" id="fecha" class="datepicker form-control fecha" placeholder="Seleccina una fecha...">
									</div>
								</div>
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


