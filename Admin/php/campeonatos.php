<?php
/**
 * [Array_Get_Campeonatos Retorna el grupo de torneos]
 */
function Array_Get_Campeonatos()
{

	$campeonatos = consultar("SELECT `id_torneo`, `nombre_torneo`, `deporte`, `categoria`, `reglamento`,estado FROM `tb_torneo` order by id_torneo  ");	


	$datos = array();
	while ($valor = mysqli_fetch_array($campeonatos)) {
		$id_torneo = $valor['id_torneo'];
		$nombre_torneo = $valor['nombre_torneo'];
		$categoria = $valor['categoria'];
		$reglamento = $valor['reglamento'];
		$estado = $valor['estado'];

		$vector = array(
			'id_torneo'=>"$id_torneo",
			'nombre_torneo'=>"$nombre_torneo",
			'categoria'=>"$categoria",
			'reglamento'=>"$reglamento",
			'estado'=>"$estado"

			);
		array_push($datos, $vector);
	}

	return $datos;	
}
/**
 * [Set_Campeonatos el reglamento de un campeonato]
 */
function Set_Campeonatos($nombre,$categoria,$estado,$torneo)
{

	$campeonatos = modificar(sprintf("UPDATE `tb_torneo` SET`nombre_torneo`='%s',`categoria`='%s',`estado`='%s'
	 WHERE  `id_torneo`='%d' ",
		escape($nombre),escape($categoria),escape($estado),escape($torneo)));
	return $campeonatos;	
}
/**
 * [Set_Reglamento_Campeonatos Modifica reglamento de un campeonato]
 */
function Set_Reglamento_Campeonatos($reglamento,$torneo)
{

	$campeonatos = modificar(sprintf("UPDATE `tb_torneo` SET`reglamento`='%s'
	 WHERE  `id_torneo`='%d' ",
		escape($reglamento),escape($torneo)));
	return $campeonatos;	
}