<?php
session_start();
include('../../../php/principal.php');
include('../../../php/partidos.php');

if(isset($_SESSION['perfil']))
{
	$resultado = '{"salida":true,';
	$bandera = $_POST['bandera'];
	$perfil = $_SESSION['perfil'];
	$modulo =$_POST['modulo'];

// Agrega un partido al sitio.
	if ($bandera === "nuevo" and Boolean_Get_Modulo_Permiso($modulo,$perfil)) {
		$equipoa = $_POST['equipoa'];
		$equipob = $_POST['equipob'];
		$fecha = $_POST['fecha'];
		$hora = $_POST['hora'];
		$lugar = $_POST['lugar'];
		$ronda = $_POST['ronda'];
		$query = Boolean_Agregar_Partido($equipoa,$equipob,$fecha,$hora,$lugar,$ronda);
		if ($query) {
			$resultado.='"mensaje":true';
		} else {
			$resultado.='"mensaje":false';
		}
	}
	// Obtiene los datos de un partido.
	else if($bandera === "get_datos" and Boolean_Get_Modulo_Permiso($modulo,$perfil)) {
		$id_partido = $_POST['id_partido'];
		    $vector = Get_Partido($id_partido);
		if (!empty($vector)) {
			$resultado.='"mensaje":true,';
			$resultado.='"datos":'.json_encode($vector).'';
		} else {
			$resultado.='"mensaje":false';
		}
	}
	// Modifica un partido del sitio.
	else if($bandera === "modificar" and Boolean_Get_Modulo_Permiso($modulo,$perfil)) {
		$partido = $_POST['partido'];
		$fecha = $_POST['fecha'];
		$hora = $_POST['hora'];
		$lugar = $_POST['lugar'];
		$estado = $_POST['estado'];
		$ronda = $_POST['ronda'];
		$query = Set_Partido($partido,$fecha,$hora,$lugar,$estado,$ronda);
		if ($query) {
			$resultado.='"mensaje":true';
		} else {
			$resultado.='"mensaje":false';
		}
	}
	//  Elimina un partido.
	else if($bandera === "eliminar" and Boolean_Get_Modulo_Permiso($modulo,$perfil)) {
		$partido = $_POST['partido'];
		$query = Delete_Partido($partido);
		if ($query) {
			$resultado.='"mensaje":true';
		} else {
			$resultado.='"mensaje":false';
		}
	}
	
}
else
{
	$resultado = '{"salida":false';
}
$resultado.='}';
echo ($resultado);
?>