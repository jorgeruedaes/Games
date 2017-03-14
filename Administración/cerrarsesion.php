<?php

session_start();
include('../conexion.php');  
if(!isset($_SESSION['admin']))
	
   {
        echo "No hay ninguna sesion iniciada";
//esto ocurre cuando la sesion caduca.
        
   }
   else
   { 
     session_destroy();
       //echo "Has cerrado la sesion";
echo "<meta content='0;URL=iniciox.php' http-equiv='REFRESH'> </meta>";
       
   }

?>