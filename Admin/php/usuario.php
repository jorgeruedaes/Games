<?php

/**
 * [Array_Get_Usuario Obtiene los datos no sencibles del usuario]
 * @param [Integer] $usuario [Identificador del Usuario]
 */
function Array_Get_Usuario($usuario)
{

	$usuarios = consultar("SELECT `id_usuario`,`nombre_usuario`, `apellido_usuario`, `perfil`, `email_usuario`, `estado`,pregunta_usuario,respuesta,color FROM `tb_usuarios` WHERE id_usuario=$usuario ");
	while ($valor = mysqli_fetch_array($usuarios)) {
		$id_usuarios = $valor['id_usuario'];
		$nombre       = $valor['nombre_usuario'];
		$apellido          = $valor['apellido_usuario'];
		$perfil          = $valor['perfil'];
		$email        = $valor['email_usuario'];
		$estado        = $valor['estado'];
		$pregunta   = $valor['pregunta_usuario'];
		$respuesta = $valor['respuesta'];
		$color = $valor['color'];
		$datos = array(
			'id_usuarios'=>"$id_usuarios",
			'nombre' => "$nombre",
			'apellido' => "$apellido",
			'perfil' => "$perfil",
			'email' => "$email",
			'estado' => "$estado",
			'pregunta' => "$pregunta",
			'respuesta' => "$respuesta",
			'color' => "$color"
			);
	}

	return $datos;	
}

/**
 * [String_Get_Nombre Obtiene el nombre completo del usuario]
 * @param Integer $usuario [Codigo identificador del usuario]
 */
function String_Get_Nombre($usuario)
{
	$usuario = consultar("SELECT `nombre_usuario`, `apellido_usuario` FROM `tb_usuarios` WHERE id_usuario=$usuario"); 
	while ($valor = mysqli_fetch_array($usuario)) {
		return $valor['nombre_usuario']." ".$valor['apellido_usuario'];
	}
}

/**
 * [Array_Get_Usuarios Retorna el grupo de usuarios editables o modificables]
 */
function Array_Get_Usuarios($perfil)
{
	if($perfil==3)
	{
		$usuario = consultar("SELECT `id_usuario`,`nombre_usuario`, `apellido_usuario`, `perfil`, `email_usuario`, `estado` FROM `tb_usuarios`");
	}

	else
	{
		$usuario = consultar("SELECT `id_usuario`,`nombre_usuario`, `apellido_usuario`, `perfil`, `email_usuario`, `estado` FROM `tb_usuarios` WHERE perfil!=3  ");	
	}	
	$datos = array();
	while ($valor = mysqli_fetch_array($usuario)) {
		$id_usuarios = $valor['id_usuario'];
		$nombre       = $valor['nombre_usuario'];
		$apellido          = $valor['apellido_usuario'];
		$perfil          = $valor['perfil'];
		$email        = $valor['email_usuario'];
		$estado        = $valor['estado'];
		$vector = array(
			'id_usuarios'=>"$id_usuarios",
			'nombre' => "$nombre",
			'apellido' => "$apellido",
			'perfil' => "$perfil",
			'email' => "$email",
			'estado' => "$estado"
			);
		array_push($datos, $vector);
	}

	return $datos;	
}
/**
 * [Array_Get_Perfiles Obtiene los nombres de los perfiles]
 * @param [type] $perfil [Codigo que identifica el perfil para saber cuales debo o no mostrar]
 */
function Array_Get_Perfiles($perfil)
{
	if($perfil=='3')
	{
		$perfiles = consultar("SELECT * FROM `tb_perfiles`");
	}
	else
	{
		$perfiles = consultar("SELECT * FROM `tb_perfiles` WHERE id_perfiles!=3");
	}
	$datos = array();
	while ($valor = mysqli_fetch_array($perfiles)) {
		$id_perfiles = $valor['id_perfiles'];
		$nombre       = $valor['nombre'];
		$descripcion          = $valor['descripcion'];
		$nivel          = $valor['nivel'];
		$vector = array(
			'id_perfiles'=>"$id_perfiles",
			'nombre' => "$nombre",
			'descripcion' => "$descripcion",
			'nivel' => "$nivel"
			);
		array_push($datos, $vector);
	}

	return $datos;	

}
/**
 * [String_Get_Nombre_Perfil Obtiene los nombres de los perfiles]
 * @param [type] $perfil [Codigo que identifica el perfil]
 */
function String_Get_Nombre_Perfil($perfil)
{
	$usuario = consultar("SELECT * FROM `tb_perfiles` WHERE id_perfiles=$perfil"); 
	while ($valor = mysqli_fetch_array($usuario)) {
		return $valor['nombre'];
	}	
}
/**
 * [Array_Get_Listado_Perfiles Obtengo el listado de los perfiles disponibles en la pagina]
 * @param [type] $perfil [Perfil con el cual se accedio con el fin de establer cuales perfiles mostrar]
 */
function Array_Get_Listado_Perfiles($perfil)
{
	if($perfil!=3)
	{
		$perfiles = consultar("SELECT * FROM `tb_perfiles` WHERE id_perfiles!=3 ORDER BY nivel");
	}
	else
	{
		$perfiles = consultar("SELECT * FROM `tb_perfiles` ORDER BY nivel");	
	}

	$datos = array();
	while ($valor = mysqli_fetch_array($perfiles)) {
		$id_perfiles = $valor['id_perfiles'];
		$nombre       = $valor['nombre'];
		$descripcion          = $valor['descripcion'];
		$nivel          = $valor['nivel'];
		$vector = array(
			'id_perfiles'=>"$id_perfiles",
			'nombre' => "$nombre",
			'descripcion' => "$descripcion",
			'nivel' => "$nivel"
			);
		array_push($datos, $vector);
	}

	return $datos;	
}
/**
 * [Int_Get_nuevosUsuarios Obtiene la cantidad de nuevos usuarios]
 */
function Int_Get_nuevosUsuarios()
{
	$usuario = consultar("SELECT * FROM `tb_usuarios` WHERE estado='procesando'  ");
	return mysqli_num_rows($usuario);
}

/**
 * [JSON_Get_ModulosxPerfil Permite obtener los modulos asignados a un perfil]
 * @param [type] $perfil [perfil de usuario para obtener permisos]
 */
function JSON_Get_ModulosxPerfil($perfil)
{
	$perfiles = consultar("SELECT * FROM tr_modulosxperfiles WHERE id_perfiles=$perfil ");
	$datos = array();
	while ($valor = mysqli_fetch_array($perfiles)) {
		$id_perfiles = $valor['id_perfiles'];
		$id_modulos       = $valor['id_modulos'];
		$vector = $id_modulos;
		array_push($datos, $vector);
	}

	return json_encode($datos,JSON_HEX_TAG);	
}

/**
 * [Boolean_Insertar_Usuario Insertar un nuevo usuario.]
 * @param [type] $nombre    [nombre del usuario]
 * @param [type] $apellido  [apellldo del usuario]
 * @param [type] $username  [User name]
 * @param [type] $password  [contraseña]
 * @param [Int] $pregunta  [Numero de la pregunta]
 * @param [type] $respuesta [Respuesta]
 * @param [type] $email     [email del nuevo usuario]
 */
function Boolean_Insertar_Usuario($nombre,$apellido,$username,$password,$pregunta,$respuesta,$email)
{
	list ($valid,$mensaje) = Boolean_Existencia_Usuario($username,$email);
	if($valid)
	{
		$query = insertar(sprintf("INSERT INTO `tb_usuarios`(`id_usuario`, `nombre_usuario`, `apellido_usuario`, `perfil`,
			`usuario`, `contrasena`, `pregunta_usuario`, `respuesta`,`email_usuario`, `estado`)
			VALUES (NULL,'%s','%s','2','%s','%s','%d','%s','%s',
				'procesando')",escape($nombre),escape($apellido),escape($username),escape($password),
		escape($pregunta),escape($respuesta),escape($email)));	

		if($query){
			return array($query,'El usuario se creó exitosamente.');
		}
		else{
			return array($query,'El usuario se no se puedo crear.');
		}	
	}	
	else
	{
		return array(False,$mensaje);

	}
}
/**
 * [Boolean_Existencia_Usuario Valida si existe el usuario.]
 * @param [type] $username [nombre de usuario]
 * @param [type] $email    [email del usuario]
 */
function Boolean_Existencia_Usuario($username,$email)
{
	$query = consultar(sprintf("SELECT email_usuario,usuario FROM tb_usuarios WHERE email_usuario='%s' or usuario='%s'",escape($username),escape($email)));
	if(Int_consultaVacia($query)>0)
	{
		return array(true,'El usuario o el email ya existen, intenta nuevamente.');
	}else
	{
		return array(false,'');	
	}

}
/**
 * [Boolean_Set_Perfil_Estado_Usuario Permite modificar el estado o el perfil de un usuario]
 * @param [type] $id_usuarios [description]
 * @param [type] $estado      [nuevo estado]
 * @param [type] $id_perfiles [nuevo perfil]
 */
function Boolean_Set_Perfil_Estado_Usuario($id_usuarios,$estado,$id_perfiles)
{
	$query = modificar(sprintf("UPDATE `tb_usuarios` SET `estado`='%s', `perfil` ='%d' WHERE id_usuario='%d' ",escape($estado),escape($id_perfiles),escape($id_usuarios)));
	return $query;
}
/**
 * [Boolean_Set_Password Modificar el password de un usuario]
 * @param [type] $password [nueva contraseña]
 * @param [type] $usuario  [id_usuario del usuario]
 */
function Boolean_Set_Password($password,$usuario)
{
	$password  = password_hash($password, PASSWORD_BCRYPT);
	$query =  modificar(sprintf("UPDATE `tb_usuarios` SET contrasena='%s' WHERE id_usuario='%d'",escape($password),escape($usuario)));
	return $query;
}
/**
 * [Boolean_Set_Usuario Modficar los datos de un usuario]
 * @param [type] $nombre    [description]
 * @param [type] $apellido  [description]
 * @param [type] $email     [description]
 * @param [type] $pregunta  [description]
 * @param [type] $respuesta [description]
 * @param [type] $usuario   [description]
 */
function Boolean_Set_Usuario($nombre,$apellido,$email,$pregunta,$respuesta,$usuario)
{
	$query =  modificar(sprintf("UPDATE `tb_usuarios` SET nombre_usuario='%s',apellido_usuario='%s',email_usuario='%s',pregunta_usuario='%d',respuesta='%s' WHERE id_usuario='%d'",escape($nombre),escape($apellido),escape($email),escape($pregunta),escape($respuesta),escape($usuario)));
	return $query;	
}
/**
 * [Boolean_Delete_Usuario Permite eliminar un usuario]
 * @param [type] $id_usuarios [id_del usuario que eliminara]
 */
function Boolean_Delete_Usuario($id_usuarios,$perfil)
{
	if($perfil==3)
	{
	$query =  eliminar(sprintf("DELETE FROM `tb_usuarios` WHERE id_usuario='%d' and perfil!=3 ",escape($id_usuarios)));
	return $query;	
	}
	else
	{
	$query =  eliminar(sprintf("DELETE  FROM`tb_usuarios` WHERE id_usuario='%d' and perfil='1' ",escape($id_usuarios)));
	return $query;	
	}
	
}
?>