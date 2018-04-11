<?php 

/*En este archivo se guardan todas las funciones que se utilizarán en distintos archivos y
apartados de la web*/

/*Establece la conexión*/
function conexion($bd_config){
	try {
		$conexion = new PDO('mysql:host=' . $bd_config['host'] . ';dbname=' . $bd_config['basedatos'], $bd_config['usuario'], $bd_config['password']);
		return $conexion;
	} catch (PDOException $e) {
		echo "error de conexion: $e";
		return false;
	}
}

/** Limpia los datos evitando que se guarden especios o caracteres especiales en la BD */
function limpiarDatos($datos){
	$datos = trim($datos);
	$datos = stripcslashes($datos);
	$datos = htmlspecialchars($datos);
	return $datos;
}

/*Para obtener los apartados o secciones de la web*/
function obtener_articulos($conexion, $idioma){ //en el tutorial es obtener_post
	$totalArticulos = $conexion->prepare('SELECT * FROM articulos WHERE idioma = :idioma ORDER BY orden');
	$totalArticulos->execute(array(':idioma' => $idioma));
	return $totalArticulos->fetchAll();
}

/*Para conocer cuántos artículos hay en total. Es útil para establecer el número de orden
de los artículos en la BD. Posteriormente se debería permitir que el orden lo establezca
el usuario*/
function total_articulos($conexion, $idioma){
	$total_articulos = $conexion->prepare('SELECT * FROM articulos WHERE idioma = :idioma');
	$total_articulos->execute(array(':idioma' => $idioma));
	$total_articulos = $total_articulos->rowCount();
	return $total_articulos;
}

/*Limpiar la id del artículo para utilizarlo, por ejemplo como parámetro GET*/
function id_articulo($id){
	return (int)limpiarDatos($id);
}

/*Obtener un artículo por su id*/
function obtener_articulo_por_id($conexion, $id){
	$resultado = $conexion->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

/*Obtener un artículo por su orden*/
function obtener_articulo_por_orden($conexion, $orden){
	$resultado = $conexion->query("SELECT * FROM articulos WHERE orden = $orden LIMIT 1");
	$resultado = $resultado->fetch();
	return ($resultado) ? $resultado : false;
}


function subirBajarArticulo($conexion, $posicionOrigen, $posicionDestino){

	$origen = obtener_articulo_por_orden($conexion,$posicionOrigen);
	$destino =  obtener_articulo_por_orden($conexion,$posicionDestino);

	$ordenOrigen = (int)$origen['orden'];
	$idOrigen = (int)$origen['id'];
	$ordenDestino = (int)$destino['orden'];
	$idDestino = (int)$destino['id'];

	$insertarOrdenDestino = $conexion->prepare('UPDATE articulos SET orden = :ordenDestino WHERE id = :idOrigen');
	$insertarOrdenDestino->execute(array(
			':ordenDestino' => $ordenDestino, 
			':idOrigen' => $idOrigen
	));

	$insertarOrdenOrigen = $conexion->prepare('UPDATE articulos SET orden = :ordenOrigen WHERE id = :idDestino');
	$insertarOrdenOrigen->execute(array(
			':ordenOrigen' => $ordenOrigen, 
			':idDestino' => $idDestino
	));

	// header('Location: listado.php');
}

/*Obtener la cabecera por idioma*/
function obtener_cabecera($conexion, $idioma){ //en el tutorial es obtener_post
	$resultado_cabecera = $conexion->prepare("SELECT * FROM cabecera WHERE idioma = :idioma");
	$resultado_cabecera->execute(array(':idioma' => $idioma));
	return $resultado_cabecera->fetch();
}

/*Obtener la cabecera por su id para poder editarla*/
function obtener_cabecera_por_id($conexion, $id){
	$resultado = $conexion->query("SELECT * FROM cabecera WHERE id = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

/*Limpiar la id de la cabecera*/
function id_cabecera($id){
	return (int)limpiarDatos($id);
}

/*Limpiar la id del usuario*/
function id_usuario($id){
	return (int)limpiarDatos($id);
}

/*obtener el usuario por su nombre de usuario para el login*/
function obtener_usuario($conexion, $usuario){
	$resultado_usuario = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario');
	$resultado_usuario->execute(array(':usuario' => $usuario));
	return $resultado_usuario->fetch();
}

/*Obtener todos los usuarios para mostrar en el listado*/
function obtener_usuarios($conexion){
	$resultado_usuarios = $conexion->prepare('SELECT * FROM usuarios');
	$resultado_usuarios->execute();
	return $resultado_usuarios->fetchAll();
}

/*obtener el usuario por su id para editarlo*/
function obtener_usuario_por_id($conexion, $id){
	$resultado = $conexion->query("SELECT * FROM usuarios WHERE id = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

/*Obtener el usuario por su nombre... ¿Su función la podría hacer la función anterior de login?*/
function obtener_usuario_por_nombre($conexion, $usuario){
	$resultado = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = $usuario LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

/*Control para la identificación del usuario*/
function login($conexion, $usuario, $password){
	$resultado_login = $conexion->prepare('
		SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password'
	);
	$resultado_login->execute(array(':usuario' => $usuario, ':password' => $password));
	return $resultado_login->fetch();
}

/*Inserar usuario. Tener en cuenta que no sde insertan los valores autómáticos como el id...*/
function insertar_usuario($conexion, $usuario, $password, $nombre, $email, $direccion, $codigopostal, $ciudad, $provincia, $ccaa, $pais, $telefono1, $telefono2, $fax){
	$password = hash('sha512', $password);

	$statement = $conexion->prepare('INSERT INTO usuarios (usuario, pass, nombre, email, direccion, codigopostal, ciudad, provincia, ccaa, pais, telefono1) VALUES (:usuario, :password, :nombre, :email, :direccion, :codigopostal, :ciudad, :provincia, :ccaa, :pais, :telefono1, :telefono2, :fax )');
	$statement->execute(array(
			':usuario' => $usuario,
			':password' => $password,
			':nombre' => $nombre,
			':email' => $email,
			':direccion' => $direccion,
			':codigopostal' => $codigopostal,
			':ciudad' => $ciudad,
			':provincia' => $provincia,
			':ccaa' => $ccaa,
			':pais' => $pais,
			':telefono1' => $telefono1,
			':telefono2' => $telefono2,
			':fax' => $fax
		));

	return $statement;
	// header('Location: index.php');
}



/*Comprobar si se ha iniciado sesión para limitar el acceso a las páginas de administración, por ejemplo*/
function comprobarSesion(){
	if (!isset($_SESSION['usuario'])) {
		header('Location:' . RUTA);
	}
}




 ?>