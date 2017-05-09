<?php

	$carpeta = $_GET['carpeta'];

	$archivo = $_FILES['file'];

	$temp = $archivo['tmp_name'];
	$name = $archivo['name'];

	if(!$temp)
	{
		echo "No se ha seleccionado ningun archivo.";
	}

	if(move_uploaded_file($temp,'Archivos/$name'));
	{
		echo "Se ha guardado un archivo en el servidor";
	}
	else
	{
		echo "NO! se ha guardado un archivo en el servidor";
	}





?>