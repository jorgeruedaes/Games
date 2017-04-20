<?php

function Add_detalle_amonestacion($jugador,$amonestacion,$duracion,$jornada)
{
    $valor  = insertar(sprintf("INSERT INTO `tr_amonestacionesxjugador`(`id_amonestacioxjugador`, `jugador`, `amonestacion`, `estado_amonestacion`, `duracion`, `comentario`, `jornada_amonestacion`)
        VALUES (NULL,'%d','%d','1','%d','','%d') "
 ,escape($jugador),escape($amonestacion),escape($duracion),escape($jornada)));
    return $valor;
}
function Add_detalles_amonestaciones_partido($vector,$fecha)
{
    $json = json_decode($vector);
    $bandera ='';
    $duracion ='1';
        for ($i=0; $i < count($json) ; $i++) {
            if($json[$i][3]!='5'){
            if(Add_detalle_amonestacion($json[$i][0],$json[$i][3],$duracion,$fecha))
            {
                $bandera=true;
            }   
            else
            {
                $bandera=false;
            }
        }
        else
        {
         $bandera=true;   
        }

        }
    return $bandera;
}