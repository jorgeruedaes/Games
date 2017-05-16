<?php
include('../../menuinicial.php');
$ipvisitante=$_SERVER["REMOTE_ADDR"];
ContadorVisitas($ipvisitante,'categorias');
?>
<head>
	<link href="css/bootstrap.css" rel="stylesheet">
	<style>
		
		 @font-face { font-family: Bariol; src: url('webs/fonts/FontBariol.otf'); } 

	</style>
</head>
<div class="ec-loading-section"><div class="ball-scale-multiple"><div></div><div></div><div></div></div></div>
<div class="ec-mini-header">
	<span class="ec-blue-transparent"></span>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="ec-mini-title">
					<h1>Categorías</h1>
				</div>
				<div class="ec-breadcrumb">
					<ul>
						<li><a href="index.php">Inicio</a></li>
						<li>Categorías</li>
					</ul>
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
				<?php

				$vector = ObtenerTorneosPorDeporteOrdenado('1','activo');
				echo (empty($vector)) ? '<cite>No hay categorías.</cite>' :'';
				foreach ($vector as $value)
				{

					$id = $value['id'];
					$nombre =$value['nombre'];
					?>
					<!--// Match Fixture \\-->
					<div class="col-md-4 add-pointer" id="<?php echo $id?>">
						<div class=""  style="height: 7em;">
							<ul  style="background-color: #27ae60;border: 1px solid #03A678;    padding: 1em;border-radius: 4px">
							<li >
							<i class="fa-4x fa fa-futbol-o" style="color: white;">
							</i>
							<a href="webs/TorneoMunicipal/Categoria.php?id=<?php echo $id?>" style="font-size: 1.7em;color: white;padding-left: 1.5em;font-family: Bariol" ><?php echo $nombre?>
							</a>
							</li>
							</ul>
							</div>
					</div>
					<?php
				}
				?>
			</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</div>
	</div>
	<!--// Main Section \\-->
</div>
<?php
include('../../footerinicial.php');
?>

<script src="webs/js/index.js"></script>
<script src="script/bootstrap.min.js"></script>