
<!DOCTYPE html>
<html>
<head>
  <title></title>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 <script src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>
</head>
<body>

</body>
</html>

<?php 
include('../conexion.php');
    session_start();
 $contraseña= $_POST['pass'];
 $usuario = $_POST['user'];
$contra_encriptada = md5($contraseña);
$usuario_encriptado= md5($usuario);
$primero=mysqli_query($conexion,"SELECT usuario,contrasena,torneo,tipo,estado,torneo FROM tb_usuarios ");
while ($var=mysqli_fetch_array($primero)) {
if ($usuario_encriptado==$var['usuario']
  and $contra_encriptada==$var['contrasena']
   and $var['estado']=='Activo') {
if($var['tipo']==1 ){
// SUPER ADMIN
      $_SESSION['admin']=$_POST['user'];
      $_SESSION['identificacion']=$var['torneo'];
      $_SESSION['tipo_usuario']=$var['tipo'];
      $_SESSION['torneo']=$var['torneo'];
header("location:modulosuperadmin.php");
          }else if($var['tipo']==2){
// ADMINISTRADOR
      $_SESSION['admin']=$_POST['user'];
      $_SESSION['identificacion']=$var['torneo'];
      $_SESSION['tipo_usuario']=$var['tipo'];
      $_SESSION['torneo']=$var['torneo'];
header("location:modulousuariostutorneo.php");

        	}else if($var['tipo']==3){
// PLANILLERO
      $_SESSION['admin']=$_POST['user'];
      $_SESSION['identificacion']=$var['torneo'];
      $_SESSION['tipo_usuario']=$var['tipo'];
      $_SESSION['torneo']=$var['torneo'];
header("location:../Usuarios/Planilleros/moduloplanilla.php");

        	}

}else{

echo "<script language='JavaScript' type='text/javascript'>
alert('Usuario y/o contraseña incorrectos, intenta de nuevo!');
  $(location).attr('href','iniciox.php'); 
</script>";

}
}
echo "<script language='JavaScript' type='text/javascript'>
alert('Usuario y/o contraseña incorrectos, intenta de nuevo!');
  $(location).attr('href','iniciox.php'); 
</script>";

?>