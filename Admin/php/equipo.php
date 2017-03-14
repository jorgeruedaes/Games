<?php
/**
 * [Array_Get_Equipos Obtengo un array con todos los equipos del torneo]
 */
function Array_Get_Equipos()
{
    $query = consultar("SELECT * FROM tb_equipos ORDER BY nombre_equipo ASC ");
    $vector    = array();
    while ($valor = mysqli_fetch_array($query)) {
        $arreglo = Get_Equipo($valor['id_equipo']);
        array_push($vector, $arreglo);
    }
    
    return $vector;
}
/**
 * [Get_Equipo Obtengo un equipo]
 * @param [Int] $identificador [Codigo del equipo]
 */
function Get_Equipo($identificador)
{
    $valor  = mysqli_fetch_array(consultar("SELECT * 
      FROM tb_equipos WHERE id_equipo=$identificador ORDER BY nombre_equipo desc"));
    $id_equipo = $valor['id_equipo'];
    $nombre_equipo = $valor['nombre_equipo'];
    $puntos        = $valor['puntos'];
    $tecnico1      = $valor['tecnico1'];
    $tecnico2      = $valor['tecnico2'];
    $imagen_equipo = $valor['imagen_escudo'];
    
    return array(
      "id_equipo" => "$id_equipo",
      "nombre_equipo" => "$nombre_equipo",
      "puntos" => "$puntos",
      "tecnico1" => "$tecnico1",
      "tecnico2" => "$tecnico2",
      "imagen_equipo" => "$imagen_equipo",
      "id_equipo" => "$identificador"
      );
}
/**
 * [Get_NombreEquipo Obtiene el nombre de un equipo]
 * @param [type] $identificador [Codigo del equipo]
 */
function Get_NombreEquipo($identificador)
{
    $valor = mysqli_fetch_array(consultar("SELECT nombre_equipo 
      FROM tb_equipos WHERE id_equipo=$identificador"));
    $valor = $valor['nombre_equipo'];
    
    return $valor;
}
?>