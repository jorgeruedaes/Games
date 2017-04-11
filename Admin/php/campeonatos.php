<?php
/**
 * [Array_Get_Campeonatos Retorna el grupo de torneos]
 */
function Array_Get_Campeonatos()
{

	$campeonatos = consultar("SELECT `id_torneo`, `nombre_torneo`, `deporte`, `categoria`, `reglamento` FROM `tb_torneo` order by id_torneo  ");	


	$datos = array();
	while ($valor = mysqli_fetch_array($campeonatos)) {
		$id_torneo = $valor['id_torneo'];
		$nombre_torneo = $valor['nombre_torneo'];
		$categoria = $valor['categoria'];
		$reglamento = $valor['reglamento'];

		$vector = array(
			'id_torneo'=>"$id_torneo",
			'nombre_torneo'=>"$nombre_torneo",
			'categoria'=>"$categoria",
			'reglamento'=>"$reglamento"

			);
		array_push($datos, $vector);
	}

	return $datos;	
}