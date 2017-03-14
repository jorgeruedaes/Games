
<?php
session_start();
include('../../../conexion.php');
include('../../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2) {
    
if(isset($_POST['guardar'])){
    $numerodemultas=$_POST['numerodemultas'];
    $matriz['3']['1']=0;
   for ($i=0; $i <$numerodemultas ; $i++) {
        if(empty($_POST['vigencia'.$i])){
   $matriz[$i]['0']=1;
   
        }else{
    $matriz[$i]['0']=2;
     $matriz[$i]['1']=$_POST['vigencia'.$i];
        }
   }
   for ($i=0; $i <$numerodemultas ; $i++) {
       $estado =  $matriz[$i]['0'];
       $id= $matriz[$i]['1'];
       $query=  mysqli_query($conexion,"UPDATE `tr_amonestacionxequipo` SET 
    `estado_amonestacion`=$estado WHERE
     id_amonestacionxequipo=$id");
       
   }
   
  ?>
<script type="text/javascript">
  alert("Amonestaciones actualizadas con éxito!");
       window.location.href="ModificarAmonestacionesEquipo.php";

</script>
<?php
  }
}else{
  ?>
<!-- CUANDO EL PERSONAJE NO ESTA AUTORIZADO PARA EL INGRESO-->
<br><br>
<center>
    <div>
        <label>Lo sentimos pero usted no tiene autorización para estar en este lugar.</label>
    </div>
</center>
<center><button  type="submit" ><a href="iniciox.php">Volver</a></button></center>
<?php
}

?>