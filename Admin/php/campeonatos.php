<?php
/**
 * [Array_Get_Campeonatos Retorna el grupo de torneos]
 */
function Array_Get_Campeonatos()
{

	$campeonatos = consultar("SELECT `id_torneo`, `nombre_torneo`, `deporte`, `categoria`, `reglamento`,estado,puntos_ganador FROM `tb_torneo` order by id_torneo  ");	


	$datos = array();
	while ($valor = mysqli_fetch_array($campeonatos)) {
		$id_torneo = $valor['id_torneo'];
		$nombre_torneo = $valor['nombre_torneo'];
		$categoria = $valor['categoria'];
		$reglamento = $valor['reglamento'];
		$estado = $valor['estado'];
		$puntos_ganador = $valor['puntos_ganador'];

		$vector = array(
			'id_torneo'=>"$id_torneo",
			'nombre_torneo'=>"$nombre_torneo",
			'categoria'=>"$categoria",
			'reglamento'=>"$reglamento",
			'estado'=>"$estado",
			'puntos_ganador'=>"$puntos_ganador"

			);
		array_push($datos, $vector);
	}

	return $datos;	
}
/**
 * [Set_Campeonatos el reglamento de un campeonato]
 */
function Set_Campeonatos($nombre,$categoria,$estado,$torneo,$puntos)
{

	$campeonatos = modificar(sprintf("UPDATE `tb_torneo` SET`nombre_torneo`='%s',`categoria`='%s',`estado`='%s',puntos_ganador='%d'
	 WHERE  `id_torneo`='%d' ",
		escape($nombre),escape($categoria),escape($estado),escape($puntos),escape($torneo)));
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
 * [new_Campeonato description]
 * @return [type] [Boolean]
 */
function boolean_new_Campeonato($nombre,$categoria)
{
	$campeonatos = insertar(sprintf("INSERT INTO
	 `tb_torneo`(`id_torneo`, `nombre_torneo`, `deporte`, `categoria`, `reglamento`, `estado`,puntos_ganador)
	 VALUES (NULL,'%s','1','%s','','inactivo','3')",
		escape($nombre),escape($categoria)));
	return $campeonatos;	

}
/**
 * [Get_nombre_campeonato description]
 * @param [type] $identificador [description]
 */
function Get_nombre_campeonato($identificador)
{
    $valor = mysqli_fetch_array(consultar("SELECT nombre_torneo 
      FROM tb_torneo WHERE id_torneo=$identificador"));
    $valor = $valor['nombre_torneo'];
    
    return $valor;
}