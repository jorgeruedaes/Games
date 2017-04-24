<?php
include('../../menuinicial.php');
?>
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
					<div class="col-md-4" id="<?php echo $id?>">
						<div class="widget widget_categories">
							<ul>
							<li><a href="webs/TorneoMunicipal/Categoria.php?id=<?php echo $id?>"><?php echo $nombre?></a></li>
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