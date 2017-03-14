<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="es-Es" xmlns="http://www.w3.org/1999/xhtml">
<?php
 session_start();
    include('conexion.php');
?>

<head>
	<title>Copa Amistad Profesional</title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css" href="jquery.mobile-1.4.3.css">
<link rel="stylesheet" href="css/themes/revolucion.css" />
  <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
<script type="text/javascript" src="jquery-1.11.1.js"></script>
<script type="text/javascript" src="jquery.mobile-1.4.3.js"></script>
</head>
<body>

<!--Pagina Posiciones -->

<?php
/// Consulta de numero de equipos que han jugado para generar la Tabla de posiciones

$equiposquehanjugado = mysql_query("SELECT id_equipo,nombre_equipo,puntos
FROM u197933013_copa.tb_equipos, u197933013_copa.tb_partidos 
WHERE tb_equipos.id_equipo = tb_partidos.equipo1
OR tb_equipos.id_equipo = tb_partidos.equipo2
 AND  tb_partidos.Estado='2'
GROUP BY id_equipo");




// se realiza la busqueda equipo por equipo con el fin de que se guarden los datos en una matrix , esto ayudara a organizar la informacion
// se calcula el numero de equipos que han jugado hasta ahora con una nueva variable que define el numero de columnas creadas (numero de equipos que ha jugado)
$numerodeequiposparaeltamañodelamatriz=mysql_num_rows($equiposquehanjugado);

$matriz['$numerodeequiposparaeltamañodelamatriz']['10'];
$i=0;
while($identificaciones=mysql_fetch_array($equiposquehanjugado)){		
$matriz[$i]['3']=0;  // GOLES A FAVOR
$matriz[$i]['4']=0; // GOLES CONTRA
$matriz[$i]['5']=0;  // PARTIDOS PERDIOS
$matriz[$i]['6']=0;  // PARTIDOS GANADOS
$matriz[$i]['7']=0; // EMPATES


 $matriz[$i]['0'] =$identificaciones['id_equipo'];
 $matriz[$i]['1'] =$identificaciones['nombre_equipo'];
 $matriz[$i]['2'] =$identificaciones['puntos']; 



// // saber en que lugar esta si en el equipo1 o equipo2 para tomar los valores de los goles 
 $lugardentrodelospartidos=mysql_query("SELECT  distinct equipo1,equipo2,resultado1,resultado2
 FROM  u197933013_copa.tb_partidos WHERE tb_partidos.Estado='2'
 ");

while ($equipoparticipante=mysql_fetch_array($lugardentrodelospartidos)) { 
	if ($equipoparticipante['equipo1']==$identificaciones['id_equipo'] || $equipoparticipante['equipo2']==$identificaciones['id_equipo'] ) {

	
	// se incluira el codigo para saber que partidos se han ganado perdido o empatado por el respectivo equipo
// ifs para definir el ganador perdedor o empate
if ($equipoparticipante['equipo1']==$identificaciones['id_equipo']) {

if ($equipoparticipante['resultado1']==$equipoparticipante['resultado2']) {
	// EMPATE
$matriz[$i]['7']=$matriz[$i]['7']+1;
}

if ($equipoparticipante['resultado1']>$equipoparticipante['resultado2']) {
	// GANA EQUIPO 1
	$matriz[$i]['6']=$matriz[$i]['6']+1;
}

if($equipoparticipante['resultado1']<$equipoparticipante['resultado2']){
	// GANA EQUIPO 2
	$matriz[$i]['5']=$matriz[$i]['5']+1;
}
}    ///---------------> PARA EQUIPO 1 ARRIBA


if ($equipoparticipante['equipo2']==$identificaciones['id_equipo']) {

if ($equipoparticipante['resultado1']==$equipoparticipante['resultado2']) {
	// EMPATE
$matriz[$i]['7']=$matriz[$i]['7']+1;
}

if ($equipoparticipante['resultado1']>$equipoparticipante['resultado2']) {
	// GANA EQUIPO 1
	$matriz[$i]['5']=$matriz[$i]['5']+1;
}

if($equipoparticipante['resultado1']<$equipoparticipante['resultado2']){
	// GANA EQUIPO 2
	$matriz[$i]['6']=$matriz[$i]['6']+1;
}
}//-------------------> PARA EQUIPO 2 CUANDO GPE ARRIBA

// --->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>AQUI TERMINA CODIGO PARTIDOS GPE


		if($equipoparticipante['equipo1']==$identificaciones['id_equipo']){
		  $Golesafavor =	$equipoparticipante['resultado1'];
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
		  $matriz[$i]['3']=$matriz[$i]['3']+$Golesafavor;
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
		  $Golescontra =	$equipoparticipante['resultado2'];
		  $matriz[$i]['4']=$matriz[$i]['4']+$Golescontra;

		}else{
  $Golesacontra =$equipoparticipante['resultado1'];
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
		  $matriz[$i]['4']=$matriz[$i]['4']+$Golesacontra;
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
		  $Golesafavor =	$equipoparticipante['resultado2'];
		  $matriz[$i]['3']=$matriz[$i]['3']+$Golesafavor;

		}
	}
}
$i++;
	
}

	?>
<div data-role="page">
	
<div data-role="header" data-theme="b">
	<h1><b>Posiciones</b> </h1>
</div>
	<div width="90%" height="100%">
<table style="font-size: small;" data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive t" 
data-column-btn-text="=" >
	  <thead>
           <tr class="ui-bar-d">
             <th style="font-weight: bold;" >  </th>
             <th >Equipo</th>
             <th >Puntos</th>
             <th >PJ</th>
             <th >PG</th>
             <th data-priority="1">PE</th>
             <th data-priority="1">PP</th>
             <th data-priority="1">GF</th>
             <th data-priority="1">GC</th>
             <th >GD</th>
           </tr>
         </thead>
<tbody>
<tr >
	<?php  

	// Ordenar matriz
$eliminaciondeinfoanterio=mysql_query("DELETE FROM te_posiciones");

for ($i=0; $i <$numerodeequiposparaeltamañodelamatriz ; $i++) {
	$matriz[$i]['8']=$matriz[$i]['6']+$matriz[$i]['7']+$matriz[$i]['5'];
$matriz[$i]['9']=$matriz[$i]['3']-$matriz[$i]['4'];
$matriz[$i]['10']=$i+1;

$variable1=$matriz[$i]['1'];  // nombre equipo
$variable2=(($matriz[$i]['6']*2)+$matriz[$i]['7']);  // puntos

$variable3=$matriz[$i]['8'];  // partidos jugados
$variable4=$matriz[$i]['6'];  // partidos ganados
$variable5=$matriz[$i]['7'];  // empates
$variable6=$matriz[$i]['5'];  // partidos perdidos
$variable7=$matriz[$i]['3'];  // goles a favor
$variable8=$matriz[$i]['4'];  // goles en contra
$variable9=$matriz[$i]['9'];  // diferencia de Gol

mysql_query("INSERT INTO `u197933013_copa`.`te_posiciones`(`equipo`, `puntos`, `pj`, `pg`, `pe`, `pp`, `gf`, `gc`, `dg`)
  VALUES ('$variable1','$variable2','$variable3','$variable4','$variable5','$variable6','$variable7','$variable8','$variable9');")or die(mysql_error());
}

$queryimprimir=mysql_query("SELECT * FROM te_posiciones order by  puntos desc, pg desc,dg desc")or die(mysql_error());
$contador=1;
while ($datos=mysql_fetch_array($queryimprimir)) {7
	?>

	<td>  <?php echo $contador; ?> </td>
	<td>  <?php echo $datos['equipo']; ?> </td>
	<td>  <?php echo $datos['puntos']; ?> </td>
	<td>  <?php echo $datos['pj']; ?> </td>
	<td>  <?php echo $datos['pg']; ?> </td>
	<td>  <?php echo $datos['pe']; ?> </td>
	<td>  <?php echo $datos['pp']; ?> </td>
	<td>  <?php echo $datos['gf']; ?> </td>
	<td>  <?php echo $datos['gc']; ?> </td>
	<td>  <?php echo $datos['dg']; ?> </td>

	 </td>
</tr>

	<?php
$contador=$contador+1;
}
?>
</tbody>
</table>
</div>
	
 




<div data-role="footer" align="center">
			<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u='+document.URL,'ventanacompartir', 'toolbar=0, status=0, width=device-width, height=device-height');"><img src="https://lh3.googleusercontent.com/-H8xMuAxM-bE/UefWwJr2vwI/AAAAAAAAEdY/N5I41q19KMk/s32-no/facebook.png"></a>
</a>

<a href="javascript: void(0);" onclick="window.open('http://www.twitter.com/home?status='+document.URL,'ventanacompartir', 'toolbar=0, status=0, width=device-width, height=device-height');"><img src="https://lh5.googleusercontent.com/-xZVxH6CsUaQ/UefWwgi8o3I/AAAAAAAAEdk/reo5XS6z8-8/s32-no/twitter.png"></a></a>
</a>

<a href="javascript: void(0);" onclick="window.open('https://plus.google.com/share?url='+document.URL,'ventanacompartir', 'toolbar=0, status=0,
 width=device-width, height=device-height');"><img src="https://lh5.googleusercontent.com/-5Q7Sj0SXhOA/UefWwcrnZ-I/AAAAAAAAEdg/auK3wqGCbZE/s32-no/googleplus.png"></a>
</a>
</a>
</div>
</div>
</body>
</html>