<?php
include('Admin/php/conexion.php');
include('Admin/php/funciones.php');
date_default_timezone_set('America/Bogota');
setlocale(LC_TIME, 'es_ES.UTF-8');
?>
<html>
 	<head>
	<base  href="<?php echo base_url_usuarios();?>"/>
	<title><?php echo String_Get_Valores('titulo');?></title>
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>	
	<link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>		
	<!--//fonts-->		
	<link href="web/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="shortcut icon" href="images/<?php echo String_Get_Valores('favicon');?>">
	<style type="text/css">
.background {
		background: <?php echo String_Get_Valores('color'); ?>;
		color : <?php echo String_Get_Valores('letratitulo'); ?>;
	}
	.welcome-pic h3,.coach h3,.popular h3{
		color : <?php echo String_Get_Valores('colortitulo'); ?>;
	}
	.top-menu ul li a {
		color : <?php echo String_Get_Valores('colortitulo'); ?>;
	}

	</style>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<!-- js -->
	<script src="web/js/jquery.min.js"></script>
	<!-- js -->
  	</head>
	<body>
		<!-- header -->
		<div class="header">
			<div class="container">
			<div class="logo">
				<h1><a href="index.php">
					<img  style=" width :100%; max-width:50px;" src="images/<?php echo String_Get_Valores('favicon'); ?>" alt=""></a></h1>
			</div>	
				<div class="top-menu">
					<span class="menu"></span>
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
				<!-- script-for-menu -->
				<script>
					$("span.menu").click(function(){
						$(".top-menu ul").slideToggle("slow" , function(){
						});
					});
				</script>
				<!-- script-for-menu -->	  	

				<div class="clearfix"></div>
			</div>
		</div>
		<!-- //header -->
		<div class="strip background">
		<MARQUEE WIDTH=100% HEIGHT=40 SCROLLDELAY =200 SCROLLAMOUNT=12>
				<?php
				$vector = Get_Lista_Deportes();
				foreach ($vector as $value)
					{
					?>
				<a style="color:#054C89;cursor:all-scroll;font-family:'Audiowide', cursive" 
				href="web/Deportes/principal.php?id=<?php echo $value['id_deportes']; ?>">
				<img src="images/deportes/<?php echo $value['logo']; ?>" alt="Smiley face" height="42" width="42"> <?php echo $value['nombre']; ?> <a/>
				<?php
			}
			?>
		</MARQUEE>
		</div>
	</body>
</html>