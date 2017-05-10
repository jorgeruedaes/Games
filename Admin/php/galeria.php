<?php 

/**
 * [Array_Get_Galeria description]
 */
function Array_Get_Galeria()
{
    $query = consultar("SELECT `codigo`, `imagen`, `fecha`, `torneo` FROM `tb_galeria` order by fecha desc");
    $vector    = array();
    while ($valor = mysqli_fetch_array($query)) {

    $codigo = $valor['codigo'];
    $imagen = $valor['imagen'];
    $fecha =$valor['fecha'];

    $arreglo = array(
      'codigo'=>"$codigo",
      'imagen'=>"$imagen",
      'fecha'=>"$fecha"
      );
        array_push($vector, $arreglo);
    }
    
    return $vector;
}
/**
 * [boolean_new_imagen description]
 * @param  [type] $url    [description]
 * @param  [type] $torneo [description]
 * @return [type]         [description]
 */
function boolean_new_imagen($url,$torneo)
{
  $galeria = insertar(sprintf("INSERT INTO `tb_galeria`(`codigo`, `imagen`, `fecha`, `torneo`) 
  	VALUES (NULL,'%s',NOW(),'%d')",
    escape($url),escape($torneo)));
  return $galeria;  

}
/**
 * [boolean_delete_imagen description]
 * @param  [type] $imagen [description]
 * @return [type]         [description]
 */
function boolean_delete_imagen($imagen)
{
  $galeria = eliminar("DELETE FROM `tb_galeria` WHERE codigo='$imagen' ");
  return $galeria;  

}

?>