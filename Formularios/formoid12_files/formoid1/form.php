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
<form class="formoid-flat-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Asistencia</h2></div>
	<div class="element-input<?php frmd_add_class("input"); ?>"><label class="title">Fecha del partido:</label><input class="medium" type="text" name="input" /></div>
	<div class="element-input<?php frmd_add_class("input1"); ?>"><label class="title"></label><input class="large" type="text" name="input1" /></div>
	<div class="element-input<?php frmd_add_class("input2"); ?>"><label class="title"></label><input class="large" type="text" name="input2" /></div>
	<div class="element-checkbox<?php frmd_add_class("checkbox"); ?>"><label class="title"></label>		<div class="column column1"><label><input type="checkbox" name="checkbox[]" value="Asistió"/ ><span>Asistió</span></label></div><span class="clearfix"></span>
</div>
<div class="submit"><input type="submit" value=""/></div></form><script type="text/javascript" src="<?php echo dirname($form_path); ?>/formoid-flat-black.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>