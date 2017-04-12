<?php
session_start();
include('consultas.php');
include('usuario.php');
$resultado = '{"salida":true,';
$bandera = $_POST['bandera'];


// Permite guardar el nuevo usuario en la BD.
if ($bandera === "guardar") {

	$nombre = $_POST['name'];
	$apellido = $_POST['lastname'];
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$pregunta = $_POST['pregunta'];
	$respuesta = $_POST['respuesta'];
	$email = $_POST['email'];

	list ($query,$mensaje) = Boolean_Insertar_Usuario($nombre,$apellido,$username,$password,$pregunta,$respuesta,$email);	

	if ($query) {
		$resultado.='"mensaje":true';
		$resultado.=',"comentario":'.$mensaje.'';
				header("location:../pages/usuariocreado.php");
	} else {
		$resultado.='"mensaje":false';
		$resultado.=',"comentario":'.$mensaje.'';
	    header("location:../pages/registro.php");
	}
}
// Permite saber si se puede o no registrar el nuevo usuario con ese nombre y email.
else if($bandera === "validar-usuario") {
	$email = $_POST['email'];
	$username = $_POST['username'];
	list($query,$mensaje) = Boolean_Existencia_Usuario($username,$email); 
	if ($query) {
		$resultado.='"mensaje":false';
		$resultado.=',"comentario":'.$mensaje.'';
	} else {
		$resultado.='"mensaje":true';
	}
	// Permite recuperar la contraseña
}else if($bandera === "recuperar") {
	$email = $_POST['email'];
	$query = consultar(sprintf("SELECT  id_usuario,pregunta_usuario FROM `tb_usuarios` WHERE email_usuario='%s'",escape($email)));
	$values = mysqli_fetch_array($query);
	if (Int_consultaVacia($query)>0) {
		 session_start();   

		$_SESSION['usuario']=$values['id_usuario'];
		$_SESSION['pregunta']=$values['pregunta_usuario'];
		header("location:../pages/preguntas.php");
	} else {
		session_destroy();
		header("location:../pages/error.php");
	}
	// Valida la respuesta del usuario.
}else if($bandera === "validar-respuesta") {
	$respuesta = $_POST['respuesta'];
	$query = consultar(sprintf("SELECT id_usuario FROM `tb_usuarios` WHERE id_usuario='%d' and respuesta= '%s' ",escape($_SESSION['usuario']),escape($respuesta)));
	if (Int_consultaVacia($query)>0) {
		$_SESSION['valido']=$_SESSION['usuario'];
		header("location:../pages/nuevacontrasena.php");
	} else {
		session_destroy();
		header("location:../pages/error.php");
	}
}
// Permite crear una nueva contraseña.
else if($bandera === "nueva") {
	$password = $_POST['password'];
	$query = Boolean_Set_Password($password,$_SESSION['valido']);
	if ($query) {
		$_SESSION['recuperada']='Si';
		header("location:../pages/recuperada.php");
	} else {
		session_destroy();
		header("location:../pages/error.php");
	}
}
// Permite el inicio de sesión.
else if($bandera === "conectar") {
	$contrasena= $_POST['password'];
	$email = $_POST['username'];
	$usuario_resgistrado=consultar(sprintf("SELECT id_usuario,perfil,contrasena FROM tb_usuarios WHERE (usuario='%s' or email_usuario='%s') and estado='activo' ",escape($email),escape($email)));
	if(Int_consultaVacia($usuario_resgistrado)>0){
		$values=mysqli_fetch_array($usuario_resgistrado);
		if (password_verify($contrasena,$values['contrasena']))
		{
			session_start();   
			$_SESSION['id_usuarios']=$values['id_usuario'];
			$_SESSION['perfil']=$values['perfil'];
			$_SESSION['Id']=Int_New_Sesion($values['id_usuario']);
			header("location:../pages/administracion.php");
		}else{
				session_destroy();
			header("location:../pages/error.php?=".$values['contrasena']." ");
		}
	}else{
		header("location:../pages/inicio.php");
	}
}


$resultado.='}';
echo ($resultado);
?>