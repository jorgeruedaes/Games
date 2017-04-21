<?php
include('Admin/php/conexion.php');
include('Admin/php/funciones.php');
include('Admin/php/datos.php');
date_default_timezone_set('America/Bogota');
setlocale(LC_TIME, 'es_ES.UTF-8');
?>
<!-- Mirrored from eyecix.com/html/eyesports/index.html by HTTrack Website Copier/3.x [XR&CO'2010], Fri, 07 Apr 2017 20:18:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<base  href="<?php echo base_url_usuarios();?>"/>
	<title><?php echo String_Get_Valores('titulo');?></title>
		<!-- Favicon-->
	<link rel="icon" href="webs/images/<?php echo String_Get_Valores('favicon') ?>" type="image/x-icon">
    <!-- Css Files -->
    <link href="webs/css/bootstrap.css" rel="stylesheet">
    <link href="webs/css/font-awesome.css" rel="stylesheet">
    <link href="webs/style.css" rel="stylesheet">
    <link href="webs/css/owl.carousel.css" rel="stylesheet">
    <link href="webs/css/color.css" rel="stylesheet">
    <link href="webs/css/dl-menu.css" rel="stylesheet">
    <link href="webs/css/flexslider.css" rel="stylesheet">
    <link href="webs/css/prettyphoto.css" rel="stylesheet">
    <link href="webs/css/responsive.css" rel="stylesheet">
    <link href="webs/css/index.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!--// Main Wrapper \\-->
    <div class="ec-main-wrapper">
        <!--// Main Header \\-->
        <header id="ec-header">
            <!--// TopSection \\-->
             <div class="ec-top-strip" style="background-color: #27ae60">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="ec-strip-info">

                                <li><i class="fa fa-phone"></i><?php echo String_Get_Valores('telefono') ?></li>
                                <li><i class="fa fa-map-marker"></i><?php echo String_Get_Valores('direccion') ?></li>
                                <li><i class="fa fa-envelope-o"></i> <a href="#"><?php echo String_Get_Valores('email') ?></a></li> 
                            </ul> 
                        </div>
                    </div>
                </div>
            </div> 
            <!--// TopSection \\-->
            <!--// Main Header \\-->
            <div class="ec-main-navsection">
                <div class="container">
                <a href="#" class="ec-logo"><img src="images/logo.png" alt=""></a>
                    <div class="ec-right-section">
                        <nav class="ec-navigation">
                            <ul>
                            <?php
                            	$vector = Array_Get_Modulos_All_Users();
					    	foreach ($vector as $value) {

					    		if ($value['submenu']=='0')
					    		{
                            ?>
                                <li class=""><a href="<?php echo $value['ruta']; ?>"><?php echo $value['nombre']; ?></a></li>
							<?php 
								}
							    else
							    {
							    ?>
							     <li class="active"><a href="<?php echo $value['ruta']; ?>"><?php echo $value['nombre']; ?></a>
							     <ul class="as-dropdown">
							             <?php
							            $vectores = Array_Get_Modulos_Sons_All_Users($value['id_modulos']); 
							            	foreach ($vectores as $values) {
							           	  ?>
                                 <li><a href="<?php echo $values['ruta']; ?>"><?php echo $values['nombre']; ?></a></li>
                                        <?php
										}	
                                        ?>
                               
                                </ul>
                                 </li>
							    <?php
								}
													   }
							?>
                            </ul>
                        </nav>
                        <!--// End Main Header \\-->

                        <!--// Responsive Menu //-->
                        <div id="as-menu" class="as-menuwrapper">
                            <button class="as-trigger">Open Menu</button>
                            <ul class="as-menu">
                                  <?php
                            	$vector = Array_Get_Modulos_All_Users();
					    	foreach ($vector as $value) {

					    		if ($value['submenu']=='0')
					    		{
                            ?>
                                <li class=""><a href="<?php echo $value['ruta']; ?>"><?php echo $value['nombre']; ?></a></li>
							<?php 
								}
							    else
							    {
							    ?>
							     <li class="active"><a href="<?php echo $value['ruta']; ?>"><?php echo $value['nombre']; ?></a>
							   <ul class="as-submenu">
							             <?php
							            $vectores = Array_Get_Modulos_Sons_All_Users($value['id_modulos']); 
							            	foreach ($vectores as $values) {
							           	  ?>
                                 <li><a href="<?php echo $values['ruta']; ?>"><?php echo $values['nombre']; ?></a></li>
                                        <?php
										}	
                                        ?>
                               
                                </ul>
                                 </li>
							    <?php
								}
													   }
							?>

                            </ul>
                        </div>
                        <!--// Responsive Menu //-->
                        <!--  -->
                    </div>
                </div>
            </div>
            <!--// Main Header \\-->
        </header>
        <!--// Main Header \\-->
</body>
