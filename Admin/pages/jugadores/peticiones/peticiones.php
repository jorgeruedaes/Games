<?php
session_start();
include('../../../php/principal.php');
include('../../../php/partidos.php');
include('../../../php/equipo.php');

if(isset($_SESSION['perfil']))
{
	$resultado = '{"salida":true,';
	$bandera = $_POST['bandera'];

// Agrega un partido al sitio.
	if ($bandera === "nuevo") {
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
	else if($bandera === "equiposxclub") {
		$club = $_POST['club'];
		$vector = Array_Get_Equipos_Club($club);
		if (!empty($vector)) {
			$resultado.='"mensaje":true,';
			$resultado.='"datos":'.json_encode($vector).'';
		} else {
			$resultado.='"mensaje":false';
		}
	}
	// Modifica un partido del sitio.
	else if($bandera === "modificar") {
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
	else if($bandera === "eliminar") {
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