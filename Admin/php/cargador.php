<?php
/**
 * [Read_Folders_Folder description]
 * @param [type] $directorio [description]
 */
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
/**
 * [new_Folder description]
 * @param  [type] $carpeta [description]
 * @return [type]          [description]
 */
function new_Folder($carpeta)
{
	$carpeta = $_SERVER['DOCUMENT_ROOT'].'/Games'.'/Archivos/'.$carpeta;
	if (!file_exists($carpeta)) {
		return mkdir($carpeta, 0777, true);
	}
}

/**
 * [Read_Files_Folder description]
 * @param [type] $directorio [description]
 * @param [type] $carpeta    [description]
 */
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
/**
 * [Get_Icon description]
 * @param [type] $tipo [description]
 */
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
		return	array("dvr","blue");
	}
}
/**
 * [boolean_delete_file description]
 * @param  [type] $FileName [description]
 * @return [type]           [description]
 */
function boolean_delete_file($FileName)
{
	return unlink($FileName);

}

/**
 * [Cargar_Partidos description]
 * @param [type] $FileName [description]
 * @param [type] $torneo   [description]
 */
function Cargar_Partidos($FileName,$torneo)
{
	$boolean = false;
	$resultado ='';

	list($boolean,$resultado) =Validate_All_Partidos($FileName,$torneo);
	if($boolean)
	{
		list($boolean,$resultado) =  Load_Partidos($FileName,$torneo);
	}
	else
	{

	}

	return array($boolean,$resultado);

}

function Cargar_Resultados($FileName,$torneo)
{
	$boolean = false;
	$resultado ='';

	list($boolean,$resultado) =Validate_All_Partidos_Resultados($FileName,$torneo);
	if($boolean)
	{
		list($boolean,$resultado) =  Set_Partidos($FileName,$torneo);
	}
	else
	{

	}

	return array($boolean,$resultado);

}
/**
 * [Insertar_Partido description]
 * @param [type] $NombreEquipo1 [description]
 * @param [type] $Fecha         [description]
 * @param [type] $NombreEquipo2 [description]
 * @param [type] $Lugar         [description]
 * @param [type] $Numero_Fecha  [description]
 * @param [type] $Hora          [description]
 * @param [type] $torneo        [description]
 */
function Insertar_Partido($NombreEquipo1,$Fecha,$NombreEquipo2,$Lugar,$Numero_Fecha,$Hora,$torneo)
{
	global $conexion;

	$equipo1 = Codigo_Equipo($NombreEquipo1,$torneo)[1];
	$equipo2 = Codigo_Equipo($NombreEquipo2,$torneo)[1];
	$lugar = Codigo_Lugar($Lugar)[1];
	$Fecha = date('Y-m-d', strtotime($Fecha));
	$Hora = date('H:i', strtotime($Hora));



	return insertar("INSERT INTO `tb_partidos`(`id_partido`, `equipo1`, `equipo2`, `resultado1`, `resultado2`, `fecha`, `hora`, `numero_fecha`, `Lugar`, `Estado`) VALUES (NULL,$equipo1,$equipo2,0,0,'$Fecha','$Hora',$Numero_Fecha,$lugar,1)");
}
/**
 * [Codigo_Equipo description]
 * @param [type] $NombreEquipo [description]
 * @param [type] $torneo       [description]
 */
function Codigo_Equipo($NombreEquipo,$torneo)
{
	global $conexion;
	$valor = mysqli_fetch_array(consultar("SELECT id_equipo FROM tb_equipos WHERE (nombre_equipo='$NombreEquipo' or nombre_equipo like '%$NombreEquipo%') and torneo='$torneo' "));

	return array(!empty($valor),$valor['id_equipo']);
}
/**
 * [Codigo_Lugar description]
 * @param [type] $NombreLugar [description]
 */
function Codigo_Lugar($NombreLugar)
{
	global $conexion;

	$valor = mysqli_fetch_array(consultar("SELECT id_lugar FROM tb_lugares WHERE nombre='$NombreLugar'  "));

	return array(empty($valor),$valor['id_lugar']);
}
/**
 * [ValidarEquipos description]
 * @param [type] $NombreEquipo [description]
 * @param [type] $torneo       [description]
 */
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
/**
 * [Validar_Lugar description]
 * @param [type] $Lugar [description]
 */
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
/**
 * [check_date description]
 * @param  [type] $str [description]
 * @return [type]      [description]
 */
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

/**
 * [Validar_Fecha description]
 * @param [type] $fecha [description]
 */
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
/**
 * [validateTime description]
 * @param  [type] $time [description]
 * @return [type]       [description]
 */
function validateTime($time)
{
	$pattern="/^([0-1][0-9]|[2][0-3])[\:]([0-5][0-9])$/";
	if(preg_match($pattern,$time))
		return true;
	return false;
}
/**
 * [Validar_Hora description]
 * @param [type] $Hora [description]
 */
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
/**
 * [Validar_Numero_DatosFila Valida la cantidad de datos en las filas.]
 * @param [type] $datos    [description]
 * @param [type] $cantidad [description]
 */
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
/**
 * [Load_Partidos Carga los partidos al calendario]
 * @param [type] $FileName [description]
 * @param [type] $torneo   [description]
 */
function Load_Partidos($FileName,$torneo)
{
	$bandera = true;
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
				$mensaje = 'true';
			}
			else
			{
				$bandera=false;
				$mensaje = $NombreEquipo1.$Fecha.$NombreEquipo2.$Lugar.$Numero_Fecha.$Hora.$torneo;
			}
		}
		fclose($gestor);
	}
	return array($bandera,$mensaje);
}
/**
 * [Validate_All_Partidos Valida lque los datos a cargar del archivo.]
 * @param [type] $FileName [El archivo]
 * @param [type] $torneo   [Torneo]
 */
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
/**
 * [Validar_Existencia Valida la existeencia de un partido para la respetiva fecha.]
 * @param [type] $NombreEquipo1 [description]
 * @param [type] $NombreEquipo2 [description]
 * @param [type] $Numero_Fecha  [description]
 */
function Validar_Existencia($NombreEquipo1,$NombreEquipo2,$Numero_Fecha)
{
	global $conexion;
	$query = "SELECT * FROM `tb_partidos` WHERE equipo1='$NombreEquipo1'
	and equipo2='$NombreEquipo2' and numero_fecha='$Numero_Fecha'  ";
	$valor = consultar($query);
	return mysqli_num_rows($valor)>0;
}
function Validar_Existencia_Terminado($NombreEquipo1,$NombreEquipo2,$Numero_Fecha)
{
	global $conexion;
	$query = "SELECT * FROM `tb_partidos` WHERE equipo1='$NombreEquipo1'
	and equipo2='$NombreEquipo2' and numero_fecha='$Numero_Fecha' and estado='2' ";
	$valor = consultar($query);
	return mysqli_num_rows($valor)>0;
}
/**
 * [Validate_A_Partidos Valida que un partido sea valido para la inserción.]
 * @param [type] $NombreEquipo1 [description]
 * @param [type] $Fecha         [description]
 * @param [type] $NombreEquipo2 [description]
 * @param [type] $Lugar         [description]
 * @param [type] $Numero_Fecha  [description]
 * @param [type] $Hora          [description]
 * @param [type] $torneo        [description]
 */
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


function Validate_A_Partidos_Resultados($NombreEquipo1,$Fecha,$NombreEquipo2,$Lugar,$Numero_Fecha,$Hora,$torneo,$marcador1,$marcador2)
{
	$resultado="";
	$valor = true;
	if($marcador2>=0)
	{

	}
	else
	{
		$resultado.='El marcador numero 2 no es valido. <br>';
		$valor=false;

	}
	if($marcador1>=0)
	{

	}
	else
	{
		$resultado.='El marcador numero 1 no es valido. <br>';
		$valor=false;

	}

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


	}
	
	else
	{
		$resultado.=' No Existe!. <br>';	
		$valor=false;
	}
	
	if(Validar_Existencia_Terminado(Codigo_Equipo($NombreEquipo1,$torneo)[1],Codigo_Equipo($NombreEquipo2,$torneo)[1],$Numero_Fecha))
	{
		$resultado.='Ya tiene resultados!. <br>';	
		$valor=false;

	}
	
	else
	{
		
	}


	return array($valor,$resultado);

}

function Validate_All_Partidos_Resultados($FileName,$torneo)
{
	$resultado = '';
	$boolean = true;
	$numero =1;
	if (($gestor = fopen($FileName, "r")) !== FALSE) {
		while (($datos = fgetcsv($gestor,100, ",")) !== FALSE) {

			list($valorbolean,$resultado2) = Validar_Numero_DatosFila($datos,'9');
			if($valorbolean)
			{
				$Lugar= $datos[0];
				$Fecha= $datos[1];
				$Hora= $datos[2];
				$NombreEquipo1= $datos[3];
				$marcador1= $datos[4];
				$NombreEquipo2= $datos[7];
				$marcador2= $datos[6];
				$Numero_Fecha= $datos[8];

				list($valor,$resultado1) = Validate_A_Partidos_Resultados($NombreEquipo1,$Fecha,$NombreEquipo2,$Lugar,$Numero_Fecha,$Hora,$torneo,$marcador1,$marcador2);
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


function Set_Partidos($FileName,$torneo)
{
	$bandera = true;
	if (($gestor = fopen($FileName, "r")) !== FALSE) {
		while (($datos = fgetcsv($gestor,100, ",")) !== FALSE) {

			$Lugar= $datos[0];
			$Fecha= $datos[1];
			$Hora= $datos[2];
			$NombreEquipo1= $datos[3];
			$marcador1= $datos[4];
			$NombreEquipo2= $datos[7];
			$marcador2= $datos[6];
			$Numero_Fecha= $datos[8];

			if(Set_Partido($NombreEquipo1,$Fecha,$NombreEquipo2,$Lugar,$Numero_Fecha,$Hora,$torneo,$marcador1,$marcador2))
			{
				$mensaje = 'true';
			}
			else
			{
				$bandera=false;
				$mensaje = $NombreEquipo1.$Fecha.$NombreEquipo2.$Lugar.$Numero_Fecha.$Hora.$torneo;
			}
		}
		fclose($gestor);
	}
	return array($bandera,$mensaje);
}

function Set_Partido($NombreEquipo1,$Fecha,$NombreEquipo2,$Lugar,$Numero_Fecha,$Hora,$torneo,$marcador1,$marcador2)
{
$equipo1 = Codigo_Equipo($NombreEquipo1,$torneo)[1];
$equipo2 = Codigo_Equipo($NombreEquipo2,$torneo)[1];
$lugar = Codigo_Lugar($Lugar)[1];
$Fecha = date('Y-m-d', strtotime($Fecha));
$Hora = date('H:i', strtotime($Hora));
$partido = Int_Get_Id_Partido($NombreEquipo1,$Fecha,$NombreEquipo2,$Lugar,$Numero_Fecha,$Hora,$torneo);


$valor  = modificar(sprintf("UPDATE `tb_partidos` SET `resultado1`='%d',`resultado2`='%d',`estado`='2' 
	WHERE `id_partido`='%d' ",escape($marcador1),escape($marcador2),escape($partido)));
return $valor;

}

function Int_Get_Id_Partido($NombreEquipo1,$Fecha,$NombreEquipo2,$Lugar,$Numero_Fecha,$Hora,$torneo)
{
	$equipo1 = Codigo_Equipo($NombreEquipo1,$torneo)[1];
	$equipo2 = Codigo_Equipo($NombreEquipo2,$torneo)[1];
	$lugar = Codigo_Lugar($Lugar)[1];
	$Fecha = date('Y-m-d', strtotime($Fecha));
	$Hora = date('H:i', strtotime($Hora));


	$query = "SELECT id_partido as id FROM `tb_partidos` WHERE equipo1='$equipo1'
	and equipo2='$equipo2' and numero_fecha='$Numero_Fecha' and hora='$Hora' and lugar='$lugar' and estado='1' ";
	$valor =  mysqli_fetch_array(consultar($query));
	return $valor['id'];
}

