<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

require_once str_replace('\\', '/', __DIR__) . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?=dirname($form_path)?>/formoid-solid-dark.css" type="text/css" />
<span class="alert alert-success"><?=FINISH_MESSAGE;?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?=dirname($form_path)?>/formoid-solid-dark.css" type="text/css" />
<script type="text/javascript" src="<?=dirname($form_path)?>/jquery.min.js"></script>
<form class="formoid-solid-dark" style="background-color:#ffffff;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Crear Partidos</h2></div>
	<div class="element-date<?frmd_add_class("date")?>" title="Es obligatorio"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="small" data-format="yyyy-mm-dd" type="date" name="date" required="required" placeholder="Fecha"/><span class="icon-place"></span></div></div>
	<div class="element-date<?frmd_add_class("date1")?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="small" data-format="yyyy-mm-dd" type="date" name="date1" required="required" placeholder="Hora"/><span class="icon-place"></span></div></div>
	<div class="element-select<?frmd_add_class("select")?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="medium"><span><select name="select" required="required">

		<option value="option 1">option 1</option>
		<option value="option 2">option 2</option>
		<option value="option 3">option 3</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-select<?frmd_add_class("select1")?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="medium"><span><select name="select1" required="required">

		<option value="option 1">option 1</option>
		<option value="option 2">option 2</option>
		<option value="option 3">option 3</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-select<?frmd_add_class("select2")?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="small"><span><select name="select2" required="required">

		<option value="option 1">option 1</option>
		<option value="option 2">option 2</option>
		<option value="option 3">option 3</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-number<?frmd_add_class("number")?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="small" type="text" min="0" max="25" name="number" required="required" placeholder="Number" value=""/><span class="icon-place"></span></div></div>
<div class="submit"><input type="submit" value="Crear"/></div></form><script type="text/javascript" src="<?=dirname($form_path)?>/formoid-solid-dark.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>