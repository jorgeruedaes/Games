<?php

function Add_detalle_amonestacion($jugador,$amonestacion,$comentario,$jornada)
{
    $valor  = insertar(sprintf("INSERT INTO `tr_amonestacionesxjugador`(`id_amonestacioxjugador`, `jugador`, `amonestacion`, `estado_amonestacion`, `duracion`, `comentario`, `jornada_amonestacion`)
        VALUES (NULL,'%d','%d','1','','%s','%d') "
 ,escape($jugador),escape($amonestacion),escape($comentario),escape($jornada)));
    return $valor;
}

function Add_detalles_amonestaciones_partido($vector,$fecha)
{
    $json = json_decode($vector);
    $bandera ='';
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
function Boolean_Jugadorxpartido_amonestaciones($jugador,$partido)
{
    $query = consultar("SELECT * FROM  `tr_jugadoresxpartido` WHERE `jugador`='$jugador' and `partido`='$partido' ");

    return (Int_consultaVacia($query)>0) ? true : false ;
}
function Set_detalle_jugador_amonestado($jugador,$partido,$amonestacion)
{
    $valor  = insertar(sprintf("UPDATE `tr_jugadoresxpartido` SET amonestacion='%d' WHERE jugador='%d'
     and partido='%d' ",escape($amonestacion),escape($jugador),escape($partido)));
    return $valor;
}

function Add_detalle_jugador_amonestado($jugador,$partido,$amonestacion,$gol,$autogol)
{
    $valor  = insertar(sprintf("INSERT INTO `tr_jugadoresxpartido`(`jugador`, `partido`, `amonestacion`, `goles`, `autogoles`)
     VALUES ('%d','%d','%d','%d','%d') ",escape($jugador),escape($partido),escape($amonestacion),escape($gol),escape($autogol)));
    return $valor;
}

function Add_detalles_partido_Amonestados($vector,$partido)
{
    $json = json_decode($vector);
    $bandera ='';
        for ($i=0; $i < count($json) ; $i++) {

            if(Boolean_Jugadorxpartido_amonestaciones($json[$i][0],$partido))
            {
            if(Set_detalle_jugador_amonestado($json[$i][0],$partido,$json[$i][3]))
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
            if(Add_detalle_jugador_amonestado($json[$i][0],$partido,$json[$i][3],'0','0'))
            {
                $bandera=true;
            }   
            else
            {
                $bandera=false;
            }

            }
        }
    return $bandera;
}