<!--footer-->
		<div class="footer" style="background: black;color: white;">
			<div class="container">
			<div class="copywrite">
				<p><?php echo String_Get_Valores('año'); 
					echo " ".String_Get_Valores('copyright');?></p>
				</div>
				<div class="footer-menu">
					<ul>
							<?php
						$vector = Array_Get_Modulos_All_Users();
						foreach ($vector as $value) {
							?>
							<li><a href="<?php echo $value['ruta']; ?>"><?php echo $value['nombre']; ?></a>
							</li>
							<?php
						}
						?>

					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	<!-- //footer -->