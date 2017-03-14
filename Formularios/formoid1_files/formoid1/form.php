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
<form enctype="multipart/form-data" class="formoid-flat-black" style="background-color:#FFFFFF;font-size:15px;font-family:'Lato', sans-serif;color:#666666;max-width:500px;min-width:150px" method="post"><div class="title"><h2>Nueva noticia</h2></div>
	<div class="element-input<?php frmd_add_class("input"); ?>"><label class="title">Título de la noticia:</label><input class="large" type="text" name="input" /></div>
	<div class="element-textarea<?php frmd_add_class("textarea"); ?>"><label class="title">Descripción:</label><textarea class="medium" name="textarea" cols="20" rows="5" ></textarea></div>
	<div class="element-file<?php frmd_add_class("file"); ?>"><label class="title">Imagen:</label><label class="large" ><div class="button">Seleccionar archivo</div><input type="file" class="file_input" name="file" /><div class="file_text">Ningún archivo seleccionado</div></label></div>
<div class="submit"><input type="submit" value="Agregar"/></div></form><script type="text/javascript" src="<?php echo dirname($form_path); ?>/formoid-flat-black.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>