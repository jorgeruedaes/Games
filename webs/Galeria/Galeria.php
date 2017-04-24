<?php
include('../../menuinicial.php');
?>
<div class="ec-mini-header">
	<span class="ec-blue-transparent"></span>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="ec-mini-title">
					<h1>Galería de fotos</h1>
				</div>
				<div class="ec-breadcrumb">
					<ul>
						<li><a href="index.php">Inicio</a></li>
						<li>Galería</li>
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
				<div class="col-md-12">
					<div class="ec-gallery ec-simple-gallery">
						<ul class="row gallery">
							<?php
							$vectores = CargarImagenes();
							echo (empty($vectores)) ? '<div class="center"><cite>No hay imágenes.</cite></div>' :'';
							foreach ($vectores as $value)
							{
								?>
								<li class="col-md-3">
									<figure>
									<a href="javascript:void();"><img src="webs/extra-images/gallery-list-1.jpg" alt=""></a>
									</figure>
								</li>
								<?php
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--// Main Section \\-->
</div>

<?php
include('../../footerinicial.php');
?>
