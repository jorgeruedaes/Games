<?php
function Array_Get_Noticias()
{
    $query = consultar("SELECT * FROM `tb_noticias` order by fecha desc");
    $vector    = array();
    while ($valor = mysqli_fetch_array($query)) {

    $id_noticias = $valor['id_noticias'];
    $titulo = $valor['titulo'];
    $emcabezado =$valor['emcabezado'];
    $texto =$valor['texto'];
    $fecha = $valor['fecha'];
    $imagen =$valor['imagen'];
    $torneo =$valor['torneo'];

    $arreglo = array(
      'id_noticias'=>"$id_noticias",
      'titulo'=>"$titulo",
      'emcabezado'=>"$emcabezado",
      'fecha'=>"$fecha",
      'texto'=>"$texto",
      'imagen'=>"$imagen",
      'torneo'=>"$torneo"
      );
        array_push($vector, $arreglo);
    }
    
    return $vector;
}