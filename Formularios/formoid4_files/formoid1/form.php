<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'redirect');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

define('_DIR_', str_replace('\\', '/', dirname(__FILE__)) . '/');
require_once _DIR_ . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-flat-black.css" type="text/css" />
<span class="alert alert-success"><?php echo FINISH_MESSAGE; ?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="<?php echo dirname($form_path); ?>/jquery.min.js"></script>
<form class="formoid-flat-black" style="background-color:#FFFFFF;font-size:17px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Nuevo partido</h2></div>
	<div class="element-date<?php frmd_add_class("date"); ?>"><label class="title">Fecha del partido:</label><input class="large" data-format="yyyy-mm-dd" type="date" name="date" placeholder="yyyy-mm-dd"/></div>
	<div class="element-select<?php frmd_add_class("select2"); ?>"><label class="title">Lugar:</label><div class="large"><span><select name="select2" >

		<option value="option 1">option 1</option>
		<option value="option 2">option 2</option>
		<option value="option 3">option 3</option></select><i></i></span></div></div>
	<div class="element-select<?php frmd_add_class("select"); ?>"><label class="title">Equipo Local:</label><div class="large"><span><select name="select" >

		<option value="option 1">option 1</option>
		<option value="option 2">option 2</option>
		<option value="option 3">option 3</option></select><i></i></span></div></div>
	<div class="element-select<?php frmd_add_class("select1"); ?>"><label class="title">Equipo Visitante:</label><div class="large"><span><select name="select1" >

		<option value="option 1">option 1</option>
		<option value="option 2">option 2</option>
		<option value="option 3">option 3</option></select><i></i></span></div></div>
	<div class="element-select<?php frmd_add_class("select3"); ?>"><label class="title">Juez:</label><div class="large"><span><select name="select3" >

		<option value="option 1">option 1</option>
		<option value="option 2">option 2</option>
		<option value="option 3">option 3</option></select><i></i></span></div></div>
	<div class="element-input<?php frmd_add_class("input"); ?>"><label class="title">Número de la fecha:</label><input class="small" type="text" name="input" /></div>
<div class="submit"><input type="submit" value="Crear"/></div></form><script type="text/javascript" src="<?php echo dirname($form_path); ?>/formoid-flat-black.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>