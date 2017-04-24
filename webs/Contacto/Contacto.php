<?php
include('../../menuinicial.php');
?>
<div class="ec-mini-header">
	<span class="ec-blue-transparent"></span>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="ec-mini-title">
					<h1>Contáctenos</h1>
				</div>
				<div class="ec-breadcrumb">
					<ul>
						<li><a href="index.php">Inicio</a></li>
						<li>Contáctenos</li>
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
					<div class="ec-map">
						<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDhlYO8a5jTRHQgPhtTovjMBriyKZNyJa4
						&q=Instituto Departamental de Recreación y Deportes de Santander "Indersantander",Bucaramanga"" height="380"></iframe>
					</div>
				</div>
				<div class="col-md-4">
					<div class="widget widget-userinfo">
						<div class="ec-fancy-title">
							<h2>Ubicación</h2>
						</div>
						<ul>
							<?php echo String_Get_Datos('direccion_3')?>
							<?php echo String_Get_Datos('telefono_contacto')?>
							<?php echo String_Get_Datos('celular_contacto')?>
						</ul>
					</div>
					<div class="widget widget-userinfo">
						<div class="ec-fancy-title">
							<h2>EMAIL</h2>
						</div>
						<ul>
							<li> <i class="fa fa-envelope"></i>
								<p><a href="#"><?php echo String_Get_Datos('email')?></a></p>
							</li>
							<li> <i class="fa fa-envelope-o"></i>
								<p><a href="#"><?php echo String_Get_Datos('email2')?></a></p>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-8">
					<!--// Comment Form //-->
					<div class="ec-form">
						<div class="ec-fancy-title">
							<h2>Formulario de contacto</h2> </div>
							<form method="post">
								<p>
									<input type="text" value="Nombre" onblur="if(this.value == '') { this.value ='Nombre'; }" onfocus="if(this.value =='Nombre') { this.value = ''; }" name="usrname" required=""> </p>
									<p>
										<input type="text" value="Email" onblur="if(this.value == '') { this.value ='Email'; }" onfocus="if(this.value =='Email') { this.value = ''; }" name="usrname" required=""> </p>
										<p>
											<input type="text" value="Asunto" onblur="if(this.value == '') { this.value ='Asunto'; }" onfocus="if(this.value =='Asunto') { this.value = ''; }" name="usrname" required=""> </p>
											<p class="ec-comment">
												<textarea placeholder="Mensaje"></textarea>
											</p>
											<p class="ec-submit">
												<input type="submit" name="submit" value="Enviar" class="ec-bgcolor"> </p>
											</form>
										</div>
										<!--// Comment Form //-->
									</div>

								</div>
							</div>
						</div>
						<!--// Main Section \\-->
					</div>
					<?php
// 					if(isset($_POST['submit'])){

// // Varios destinatarios
// $para  = 'correomargarita' . ', '; // atención a la coma
// $para .= 'liz.rood7@gmail.com';

// // título
// $título = 'Solicitud de página web';

// // mensaje
// $mensaje = '
// <html>
// <head>
// 	<title>Mensaje de página web - Liga santandereana de fútbol</title>
// </head>
// <body>
// 	<p></p>
// 	<table>

// 	</body>
// 	</html>
// 	';

// // Para enviar un correo HTML, debe establecerse la cabecera Content-type
// 	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
// 	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// // Cabeceras adicionales
// 	$cabeceras .= 'To: <correodestinatario' . "\r\n";
// 	$cabeceras .= 'From: <correoliga>' . "\r\n";

// // Enviarlo
// 	if(mail($para, $título, $mensaje, $cabeceras)){

// 		echo "Mensaje enviado con éxito!";
// 	}else
// 	{
// 		echo "No se pudo enviar el mensaje.";
// 	}

// }

include('../../footerinicial.php');
?>



