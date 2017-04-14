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
function boolean_set_reglamento_campeonatos($reglamento,$torneo)
{

	$campeonatos = modificar(sprintf("UPDATE `tb_torneo` SET`reglamento`='%s'
	 WHERE  `id_torneo`='%d' ",
		escape($reglamento),escape($torneo)));
	return $campeonatos;	
}

/**
 * [Set__Campeonatos description]
 * @param [type] $nombre    [description]
 * @param [type] $categoria [description]
 * @param [type] $estado    [description]
 *  * @return [type] [Boolean]
 */
function boolean_set__Campeonatos($nombre,$categoria,$estado,$torneo)
{

	$campeonatos = modificar(sprintf("UPDATE `tb_torneo` SET`nombre_torneo`='%s',categoria='%s',estado='%s'
	 WHERE  `id_torneo`='%d' ",
		escape($nombre),escape($categoria),escape($estado),escape($torneo)));
	return $campeonatos;	
}

/**
 * [new_Campeonato description]
 * @return [type] [Boolean]
 */
function boolean_new_Campeonato($nombre,$categoria)
{
	$campeonatos = insertar(sprintf("INSERT INTO
	 `tb_torneo`(`id_torneo`, `nombre_torneo`, `deporte`, `categoria`, `reglamento`, `estado`)
	 VALUES (NULL,'%s','1','%s','','inactivo')",
		escape($nombre),escape($categoria)));
	return $campeonatos;	

}