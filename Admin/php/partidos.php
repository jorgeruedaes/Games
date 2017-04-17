<?php
/////////////////////////////////////////////////////////////
////////////////////--PARTIDOS---///////////////////////////
///////////////////////////////////////////////////////////

/**
 * [Boolean_Agregar_Partido Permite agregar un nuevo partido al calendario del torneo]
 * @param [type] $equipoa [Equipo local]
 * @param [type] $equipob [Equpo visitante]
 * @param [type] $fecha   [Fecha aaaa-mm-dd]
 * @param [type] $hora    [Hora HH:mm:ss]
 * @param [type] $lugar   [Lugar o cancha del partido]
 * @param [type] $ronda   [Ronda  a jugar]
 */
function Boolean_Agregar_Partido($equipoa,$equipob,$fecha,$hora,$lugar,$ronda)
{
	$partido = insertar(sprintf("INSERT INTO 
      `tb_partidos`(`id_partido`, `equipo1`, `equipo2`, `resultado1`,
         `resultado2`, `fecha`, `numero_fecha`, `Lugar`, `Estado`, `Juez`,`hora`)
    VALUES (NULL,'%d','%d','0','0','%s','%d','%d','1','2','%s')"
    ,escape($equipoa),escape($equipob),escape($fecha),escape($ronda),escape($lugar),escape($hora)));
	return $partido;	
}
/**
 * [Get_Partido Obtiene los datos de un partido]
 * @param [type] $identificador [Codigo del partido]
 */
function Get_Partido($identificador)
{
    $valor  = mysqli_fetch_array(consultar("SELECT * 
      FROM tb_partidos WHERE id_partido=$identificador"));
    $id_partido    = $valor['id_partido'];
    $equipo1    = $valor['equipo1'];
    $equipo2    = $valor['equipo2'];
    $estado     = $valor['estado'];
    $fecha      = $valor['fecha'];
    $hora       = $valor['hora'];
    $lugar      = $valor['lugar'];
    $Nfecha     = $valor['numero_fecha'];
    $resultado1 = $valor['resultado1'];
    $resultado2 = $valor['resultado2'];
    
    return array(
    	"id_partido" => "$id_partido",
        "equipo1" => "$equipo1",
        "equipo2" => "$equipo2",
        "estado" => "$estado",
        "fecha" => "$fecha",
        "hora" => "$hora",
        "lugar" => "$lugar",
        "Nfecha" => "$Nfecha",
        "resultado1" => "$resultado1",
        "resultado2" => "$resultado2"
        );
}
/**
 * [Set_Partido Permite modificar los datos basicos de un partido]
 * @param [type] $partido [id_partido]
 * @param [type] $fecha   []
 * @param [type] $hora    []
 * @param [type] $lugar   []
 * @param [type] $estado  []
 * @param [type] $ronda   []
 */
function Set_Partido($partido,$fecha,$hora,$lugar,$estado,$ronda)
{
    $valor  = insertar(sprintf("UPDATE tb_partidos 
        SET fecha='%s', hora='%s', Estado='%d',Lugar='%d',numero_fecha='%d'
         WHERE id_partido='%d' ",escape($fecha),escape($hora),escape($estado),escape($lugar),escape($ronda),escape($partido)));
    return $valor;
}
/**
 * [Delete_Partido Permite eliminar un partido]
 * @param [Int] $partido []
 */
function Delete_Partido($partido)
{
    $valor  = eliminar("DELETE FROM `tb_partidos` WHERE id_partido=$partido");
    return $valor;
}

/**
 * [Array_Get_Partidos_No_Estado Trae los partidos que no tengan ese estado]
 * @param [type] $estado [Codigo Estado que no queremos mostrar]
 */
function Array_Get_Partidos_No_Estado($estado)
{
    $query = consultar("SELECT * FROM tb_partidos WHERE estado!='$estado' and estado!='6' ORDER BY fecha ASC ");
    $vector    = array();
    while ($valor = mysqli_fetch_array($query)) {
        $arreglo = Get_Partido($valor['id_partido']);
        array_push($vector, $arreglo);
    }
    
    return $vector;
}
function Array_Get_Partidos_Campeonato($estado,$campeonato)
{
    $query = consultar("SELECT * FROM tb_partidos WHERE (equipo1 IN (select id_equipo from tb_equipos where torneo='$campeonato' ) and equipo2  IN (select id_equipo from tb_equipos where torneo='$campeonato' )) and estado='$estado' ");
    $vector    = array();
    while ($valor = mysqli_fetch_array($query)) {
        $arreglo = Get_Partido($valor['id_partido']);
        array_push($vector, $arreglo);
    }
    
    return $vector;
}
/**
 * [Array_Get_Partidos_Estado Partidos en un estado especifico]
 * @param [type] $estado [Codigo del estado]
 */
function Array_Get_Partidos_Estado($estado)
{
    $query = consultar("SELECT * FROM tb_partidos WHERE estado='$estado' ORDER BY fecha ASC ");
    $vector    = array();
    while ($valor = mysqli_fetch_array($query)) {
        $arreglo = Get_Partido($valor['id_partido']);
        array_push($vector, $arreglo);
    }
    
    return $vector;
}

////////////////////////////////////////////////////////////////////
//////////////////////----ESTADOS----//////////////////////////////
//////////////////////////////////////////////////////////////////
///
/**
 * [Get_NombreEstado_Partido Nombres de los estados de un partido]
 * @param [type] $identificador [Codigo del estado]
 */
function Get_NombreEstado_Partido($identificador)
{
    global $conexion;
    $valor = mysqli_fetch_array(consultar("SELECT *
      FROM tb_estados_partido WHERE id_estado=$identificador"));
    
    return $valor['nombre'];
}
/**
 * [Array_Get_Estados Obtiene los estados de los partidos]
 */
function Array_Get_Estados()
{
    $lugares = consultar("SELECT * FROM tb_estados_partido WHERE id_estado!='6'");  
    $datos = array();
    while ($valor = mysqli_fetch_array($lugares)) {
        $id_estado = $valor['id_estado'];
        $nombre       = $valor['nombre'];
        $vector = array(
            'id_estado'=>"$id_estado",
            'nombre' => "$nombre",
            );
        array_push($datos, $vector);
    }

    return $datos;  
}

/////////////////////////////////////////////////////////////
/////////////////////--CANCHAS-/////////////////////////////
//////////////////////////////////////////////////////////

/**
 * [Array_Get_Lugares Obtiene los nombres de las canchas del campeonato]
 */
function Array_Get_Lugares()
{
    $lugares = consultar("SELECT * FROM tb_lugares ");  
    $datos = array();
    while ($valor = mysqli_fetch_array($lugares)) {
        $id_lugares = $valor['id_lugar'];
        $nombre       = $valor['nombre'];
        $vector = array(
            'id_lugares'=>"$id_lugares",
            'nombre' => "$nombre",
            );
        array_push($datos, $vector);
    }

    return $datos;  
}
/**
 * [Get_NombreCancha Obtiene el nombre de la cancha]
 * @param [type] $identificador [Codigo del lugar]
 */
function Get_NombreCancha($identificador)
{
    global $conexion;
    $valor = mysqli_fetch_array(consultar("SELECT nombre
      FROM tb_lugares WHERE id_lugar=$identificador"));
    
    return $valor['nombre'];
}
?>
