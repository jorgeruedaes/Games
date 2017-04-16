<?php
/**
 * [Get_Jugadores_Equipo Obtiene los jugadores de un equipo]
 * @param [type] $identificador [codigo del equipo]
 */
function Array_Get_Jugadores_Equipo($identificador)
{
    $jugadores = consultar("SELECT *FROM tb_jugadores WHERE 
        equipo=$identificador  ORDER BY fecha_nacimiento desc");
    $vector    = array();
    while ($valor = mysqli_fetch_array($jugadores)) {
        $id_jugador       = $valor['id_jugadores'];
        $nombre1          = $valor['nombre1'];
        $nombre2          = $valor['nombre2'];
        $apellido1        = $valor['apellido1'];
        $apellido2        = $valor['apellido2'];
        $estado_jugador   = $valor['estado_jugador'];
        $fecha_ingreso    = $valor['fecha_ingreso'];
        $fecha_nacimiento = $valor['fecha_nacimiento'];
        $telefono         = $valor['telefono'];
        $profesion        = $valor['profesion'];
        $datos            = array(
            'id_jugador' => "$id_jugador",
            'nombre1' => "$nombre1",
            'nombre2' => "$nombre2",
            'apellido1' => "$apellido1",
            'apellido2' => "$apellido2",
            'estado_jugador' => "$estado_jugador",
            'fecha_ingreso' => "$fecha_ingreso",
            'fecha_nacimiento' => "$fecha_nacimiento",
            'telefono' => "$telefono",
            'profesion' => "$profesion"
            
            );
        array_push($vector, $datos);
    }
    
    return $vector;
}
function Array_Get_Jugadores()
{
    $jugadores = consultar("SELECT * FROM tb_jugadores  ORDER BY fecha_nacimiento desc");
    $vector    = array();
    while ($valor = mysqli_fetch_array($jugadores)) {
        $id_jugador       = $valor['id_jugadores'];
        $equipo       = $valor['equipo'];
        $nombre1          = $valor['nombre1'];
        $nombre2          = $valor['nombre2'];
        $apellido1        = $valor['apellido1'];
        $apellido2        = $valor['apellido2'];
        $estado_jugador   = $valor['estado_jugador'];
        $fecha_ingreso    = $valor['fecha_ingreso'];
        $fecha_nacimiento = $valor['fecha_nacimiento'];
        $telefono         = $valor['telefono'];
        $profesion        = $valor['profesion'];
        $datos            = array(
            'id_jugador' => "$id_jugador",
            'equipo' => "$equipo",
            'nombre1' => "$nombre1",
            'nombre2' => "$nombre2",
            'apellido1' => "$apellido1",
            'apellido2' => "$apellido2",
            'estado_jugador' => "$estado_jugador",
            'fecha_ingreso' => "$fecha_ingreso",
            'fecha_nacimiento' => "$fecha_nacimiento",
            'telefono' => "$telefono",
            'profesion' => "$profesion"
            
            );
        array_push($vector, $datos);
    }
    
    return $vector;
}
/**
 * [ObtenerNombreCompletoJugador ]
 * @param [Int] $identificador [Codigo del jugador]
 */
function String_Get_NombreCompleto($identificador)
{
    $valor = mysqli_fetch_array(consultar("SELECT nombre1,apellido1 
      FROM tb_jugadores WHERE id_jugadores=$identificador"));
    $valor = $valor['nombre1'] . " " . $valor['apellido1'];
    ;
    
    return $valor;
}
