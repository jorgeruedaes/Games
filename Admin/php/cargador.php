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
	$carpeta = $_SERVER['DOCUMENT_ROOT'].'/Games'.'/Archivos/'.$carpeta;
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
			$archivo = $_SERVER['DOCUMENT_ROOT'].'/Games'.'/Archivos/'.$carpeta.'/'.$archivo;

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


function Cargar_Partidos($FileName,$torneo)
{
	$boolean = true;
	$resultado ='';

	list($boolean,$resultado) =Validate_All_Partidos($FileName,$torneo);
	if($boolean)
	{
		Load_Partidos($FileName,$torneo);
		$resultado ='OK';
	}
	else
	{

	}

	return array($boolean,$resultado);

}

function Insertar_Partido($NombreEquipo1,$Fecha,$NombreEquipo2,$Lugar,$Numero_Fecha,$Hora,$torneo)
{
	global $conexion;

	$equipo1 = Codigo_Equipo($NombreEquipo1,$torneo)[1];
	$equipo2 = Codigo_Equipo($NombreEquipo2,$torneo)[1];
	$lugar = Codigo_Lugar($Lugar)[1];
	$Fecha = date('Y-m-d', strtotime($Fecha));
	$Hora = date('H:i', strtotime($Hora));



	return insertar("
		INSERT INTO `tb_partidos`(`id_partido`, `equipo1`, `equipo2`, `resultado1`, `resultado2`, `fecha`, `hora`, `numero_fecha`, `Lugar`, `Estado`, `Juez`) VALUES (NULL,$equipo1,$equipo2,0,0,'$Fecha','$Hora',$Numero_Fecha,$lugar,1,2)");
}

function Codigo_Equipo($NombreEquipo,$torneo)
{
	global $conexion;
	$valor = mysqli_fetch_array(consultar("SELECT id_equipo FROM tb_equipos WHERE (nombre_equipo='$NombreEquipo' or nombre_equipo like '%$NombreEquipo%') and torneo='$torneo' "));

	return array($valor,$valor['id_equipo']);
}

function Codigo_Lugar($NombreLugar)
{
	global $conexion;

	$valor = mysqli_fetch_array(consultar("SELECT id_lugar FROM tb_lugares WHERE nombre='$NombreLugar'  "));

	return array(empty($valor),$valor['id_lugar']);
}

function ValidarEquipos($NombreEquipo,$torneo)
{
	$resultado ="";
	$valor =false;

	if(Codigo_Equipo($NombreEquipo,$torneo)[0])
	{
		$resultado ="";
		$valor =true;
	}
	else
	{
		$resultado= "Uno de los nombre  de equipo  no es valido : ".$NombreEquipo." ".", Intenta nuevamente";
		$valor =false;

	}

	return array($valor,$resultado);
}
function Validar_Lugar($Lugar)
{
	$resultado ="";
	$valor =false;

	if(!Codigo_Lugar($Lugar)[0])
	{
		$resultado ="";
		$valor =true;
	}
	else
	{
		$resultado= "El lugar no es valido : ".$Lugar." ".", Intenta nuevamente";
		$valor =false;

	}

	return array($valor,$resultado);
}
function check_date($str){ 

	try {
		trim($str);
		$trozos = explode ("-", $str);
		$dia=$trozos[2];

		$mes=$trozos[1];

		$año=$trozos[0];


		if(checkdate ($mes,$dia,$año)){
			return true;
		}
		else{
			return false;
		}
		throw new Exception('La fecha no es valida.');

	} catch (Exception $e) {
		return false;
	}


}


function Validar_Fecha($fecha)
{
	$resultado ="";
	$valor =false;


	if(check_date($fecha))
	{
		$resultado ="";
		$valor =true;
	}
	else
	{
		$resultado= "La fecha no es valida : ".$fecha." ".", Intenta nuevamente";
		$valor =false;

	}

	return array($valor,$resultado);
}
 function validateTime($time)
{
    $pattern="/^([0-1][0-9]|[2][0-3])[\:]([0-5][0-9])$/";
    if(preg_match($pattern,$time))
        return true;
    return false;
}
function Validar_Hora($Hora)
{
	$resultado = "";
	$valor =false;

	if(validateTime($Hora))
	{
		$resultado = "";
		$valor =true;
	}
	else
	{
		$resultado= "La hora no es valida : ".$Hora." ".", Intenta nuevamente";
		$valor =false;

	}

	return array($valor,$resultado);
}
function Validar_Numero_DatosFila($datos,$cantidad)
{
	$resultado = "";
	$valor =false;

	if(count($datos)==$cantidad)
	{
		$resultado = "";
		$valor =true;
	}
	else
	{
		$resultado= " Debe tener exactamente ".$cantidad." columnas , Intenta nuevamente";
		$valor =false;
	}

	return array($valor,$resultado);
}
function Load_Partidos($FileName,$torneo)
{
	$resultado = "";
	if (($gestor = fopen($FileName, "r")) !== FALSE) {
		while (($datos = fgetcsv($gestor,100, ",")) !== FALSE) {

			$Lugar= $datos[0];
			$Fecha= $datos[1];
			$Hora= $datos[2];
			$NombreEquipo1= $datos[3];
			$NombreEquipo2= $datos[5];
			$Numero_Fecha= $datos[6];

			if(Insertar_Partido($NombreEquipo1,$Fecha,$NombreEquipo2,$Lugar,$Numero_Fecha,$Hora,$torneo))
			{
			}
			else
			{
				$resultado.='N';
			}
		}
		fclose($gestor);
	}
	return $resultado;
}

function Validate_All_Partidos($FileName,$torneo)
{
	$resultado = '';
	$boolean = true;
	$numero =1;
	if (($gestor = fopen($FileName, "r")) !== FALSE) {
		while (($datos = fgetcsv($gestor,100, ",")) !== FALSE) {

			list($valorbolean,$resultado2) = Validar_Numero_DatosFila($datos,'7');
			if($valorbolean)
			{
				$Lugar= $datos[0];
				$Fecha= $datos[1];
				$Hora= $datos[2];
				$NombreEquipo1= $datos[3];
				$NombreEquipo2= $datos[5];
				$Numero_Fecha= $datos[6];

				list($valor,$resultado1) = Validate_A_Partidos($NombreEquipo1,$Fecha,$NombreEquipo2,$Lugar,$Numero_Fecha,$Hora,$torneo);
				if($valor)
				{

				}
				else
				{
					$boolean = false;
					$resultado =$resultado.'<h3>En el partido '.$numero.'</h3> <br>'.$resultado1;
				}
			}
			else
			{
				$boolean = false;
				$resultado =$resultado.'<br><h3>En el partido '.$numero.'</h3> <br>'.$resultado2;
			}

			$numero=$numero+1;
		}
		fclose($gestor);
	}
	return array($boolean,$resultado);
}
function Validar_Existencia($NombreEquipo1,$NombreEquipo2,$Numero_Fecha)
{
global $conexion;
	$query = "SELECT * FROM `tb_partidos` WHERE equipo1='$NombreEquipo1'
	 and equipo2='$NombreEquipo2' and numero_fecha='$Numero_Fecha' ";
	$valor = consultar($query);
	 return mysqli_num_rows($valor)>0;
}

function Validate_A_Partidos($NombreEquipo1,$Fecha,$NombreEquipo2,$Lugar,$Numero_Fecha,$Hora,$torneo)
{
	$resultado="";
	$valor = true;

	if($NombreEquipo1!=$NombreEquipo2)
	{

	}
	else
	{
		$resultado.='No se puede enfrentar un equipo consigo mismo. <br>';
		$valor=false;
	}

	if(ValidarEquipos($NombreEquipo1,$torneo)[0])
	{

	}
	else
	{
		$resultado.=ValidarEquipos($NombreEquipo1,$torneo)[1].'<br>';
		$valor=false;
	}
	if(ValidarEquipos($NombreEquipo2,$torneo)[0])
	{

	}
	else
	{
		$resultado.=ValidarEquipos($NombreEquipo2,$torneo)[1].'<br>';
		$valor=false;
	}
	if(Validar_Lugar($Lugar)[0])
	{

	}
	else
	{
		$resultado.=Validar_Lugar($Lugar)[1].'<br>';
		$valor=false;
	}
	if(Validar_Fecha($Fecha)[0])
	{
		
	}
	else
	{
		$resultado.=Validar_Fecha($Fecha)[1].'<br>';
		$valor=false;
	}
	if(Validar_Hora($Hora)[0])
	{
		
	}
	else
	{
		$resultado.=Validar_Hora($Hora)[1].'<br>';
		$valor=false;
	}

	if(Validar_Existencia(Codigo_Equipo($NombreEquipo1,$torneo)[1],Codigo_Equipo($NombreEquipo2,$torneo)[1],$Numero_Fecha))
	{
$resultado.='Ya Existe!. <br>';
		$valor=false;
	}
	
	else
	{
	}
		

	return array($valor,$resultado);

}