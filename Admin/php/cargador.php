<?php

function Read_Folders_Folder($directorio)
{
	$vector = array();
	$ruta = opendir($directorio);
	$cantidad =0;

	while (($archivo = readdir($ruta)) != false) {
		if (!is_dir($archivo) and $archivo !="." and $archivo !=".."){

			$informacion= array(
				'archivo' => "$archivo"
				);

			array_push($vector,$informacion);
		}
	}
	return $vector;
}

function new_Folder($carpeta)
{
	$carpeta = $_SERVER['DOCUMENT_ROOT'].'/Games1'.'/Archivos/'.$carpeta;
if (!file_exists($carpeta)) {
   return mkdir($carpeta, 0777, true);
}
}


function Read_Files_Folder($directorio,$carpeta)
{
	$vector = array();
	$ruta = opendir($directorio);
	$cantidad =0;

	while ($archivo = readdir($ruta)) {
		if (!is_dir($archivo)){
			$cantidad = $cantidad +1;

			$url = base_url_usuarios().'Archivos/'.$carpeta.'/'.$archivo;
			$ex = explode(".",$archivo);
			$extension = $ex[1];
			$nombre = $ex[0];
			$archivo = $_SERVER['DOCUMENT_ROOT'].'/Games1'.'/Archivos/'.$carpeta.'/'.$archivo;

			$informacion= array(
				'FileName' => "$nombre",
				'Extension' => "$extension",
				'Url' => "$url",
				'Archivo' => "$archivo",
				);

			array_push($vector,$informacion);
		}
	}
	return $vector;
}

function Get_Icon($tipo)
{
	if($tipo=="png" or $tipo=="jpg" or $tipo=="jpge" or $tipo=="bmp" or $tipo=="png" )
	{
		return array("image","green");
	}
	else if($tipo=="pdf" or $tipo=="PDF" )
	{
		return array("picture_as_pdf","red");
	}else
	{
	return	array("attach_file","blue");
	}
}

function boolean_delete_file($FileName)
{
	return unlink($FileName);

}
