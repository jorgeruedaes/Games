<?php
/**
 * [Array_Get_Clubs Retorna el grupo de torneos]
 */
function Array_Get_Clubs()
{

	$clubs = consultar("SELECT `id_colegio`, `nombre`, `direccion`, `telefono`, `correo`, `presidente`, `cancha_entrenamiento`, `horario`, `logo`, `estado` FROM `tb_colegio`  order by id_colegio  ");	


	$datos = array();
	while ($valor = mysqli_fetch_array($clubs)) {
		$id_colegio = $valor['id_colegio'];
		$nombre = $valor['nombre'];
		$direccion = $valor['direccion'];
		$telefono = $valor['telefono'];
		$correo = $valor['correo'];
		$presidente = $valor['presidente'];
		$cancha_entrenamiento = $valor['cancha_entrenamiento'];
		$horario = $valor['horario'];
		$logo = $valor['logo'];
		$estado = $valor['estado'];


		$vector = array(
			'id_colegio'=>"$id_colegio",
			'nombre'=>"$nombre",
			'direccion'=>"$direccion",
			'telefono'=>"$telefono",
			'correo'=>"$correo",
			'presidente'=>"$presidente",
			'cancha_entrenamiento'=>"$cancha_entrenamiento",
			'horario'=>"$horario",
			'logo'=>"$logo",
			'estado'=>"$estado"

			);
		array_push($datos, $vector);
	}

	return $datos;	
}