<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
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
<form enctype="multipart/form-data" class="formoid-flat-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Datos del jugador:</h2></div>
	<div class="element-input<?php frmd_add_class("input"); ?>"><label class="title">Primer nombre:</label><input class="medium" type="text" name="input" /></div>
	<div class="element-input<?php frmd_add_class("input1"); ?>"><label class="title">Segundo nombre:</label><input class="medium" type="text" name="input1" /></div>
	<div class="element-input<?php frmd_add_class("input2"); ?>"><label class="title">Primer apellido:</label><input class="large" type="text" name="input2" /></div>
	<div class="element-input<?php frmd_add_class("input3"); ?>"><label class="title">Segundo apellido:</label><input class="large" type="text" name="input3" /></div>
	<div class="element-date<?php frmd_add_class("date"); ?>"><label class="title">Fecha de nacimiento:</label><input class="large" data-format="yyyy-mm-dd" type="date" name="date" placeholder="yyyy-mm-dd"/></div>
	<div class="element-email<?php frmd_add_class("email"); ?>"><label class="title">E-mail:</label><input class="large" type="email" name="email" value="" /></div>
	<div class="element-phone<?php frmd_add_class("phone"); ?>"><label class="title">Télefono/celular:</label><input class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="phone"  value=""/></div>
	<div class="element-select<?php frmd_add_class("select"); ?>"><label class="title">Profesión:</label><div class="large"><span><select name="select" >

		<option value="option 1">option 1</option>
		<option value="option 2">option 2</option>
		<option value="option 3">option 3</option></select><i></i></span></div></div>
	<div class="element-file<?php frmd_add_class("file"); ?>"><label class="title">Foto:</label><label class="large" ><div class="button">Seleccionar archivo</div><input type="file" class="file_input" name="file" /><div class="file_text">Ningún archivo seleccionado</div></label></div>
<div class="submit"><input type="submit" value="Modificar"/></div></form><script type="text/javascript" src="<?php echo dirname($form_path); ?>/formoid-flat-black.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>