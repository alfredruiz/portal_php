<?php 

// Editar

/*Limpiar la id de la iagen para utilizarla, por ejemplo como parámetro GET*/
function id_imagen($id){
	return (int)limpiarDatos($id);
}

/*Obtener una imagen por su id*/
function obtener_imagen_por_id($conexion, $id){
	$resultado = $conexion->query("SELECT * FROM galeria_img WHERE id = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

// LISTADO

/*Para obtener las imagenes de la galeria*/
function obtener_imagenes($conexion, $idioma){ //en el tutorial es obtener_post
    $totalImagenes = $conexion->prepare('SELECT * FROM galeria_img WHERE idioma = :idioma ORDER BY orden');
    $totalImagenes->execute(array(':idioma' => $idioma));
    return $totalImagenes->fetchAll();
}

/*Obtener una imagen por su orden*/
function obtener_imagen_por_orden($conexion, $orden){
    $resultado = $conexion->query("SELECT * FROM galeria_img WHERE orden = $orden LIMIT 1");
    $resultado = $resultado->fetch();
    return ($resultado) ? $resultado : false;
}

function subirBajarImagen($conexion, $posicionOrigen, $posicionDestino){

    $origen = obtener_imagen_por_orden($conexion,$posicionOrigen);
    $destino =  obtener_imagen_por_orden($conexion,$posicionDestino);

    $ordenOrigen = (int)$origen['orden'];
    $idOrigen = (int)$origen['id'];
    $ordenDestino = (int)$destino['orden'];
    $idDestino = (int)$destino['id'];

    $insertarOrdenDestino = $conexion->prepare('UPDATE galeria_img SET orden = :ordenDestino WHERE id = :idOrigen');
    $insertarOrdenDestino->execute(array(
            ':ordenDestino' => $ordenDestino, 
            ':idOrigen' => $idOrigen
    ));

    $insertarOrdenOrigen = $conexion->prepare('UPDATE galeria_img SET orden = :ordenOrigen WHERE id = :idDestino');
    $insertarOrdenOrigen->execute(array(
            ':ordenOrigen' => $ordenOrigen, 
            ':idDestino' => $idDestino
    ));

    // header('Location: listado.php');
}

/*Para conocer cuántos artículos hay en total. Es útil para establecer el número de orden
de los artículos en la BD. Posteriormente se debería permitir que el orden lo establezca
el usuario*/
function total_imagenes($conexion, $idioma){
    $total_imagenes = $conexion->prepare('SELECT * FROM galeria_img WHERE idioma = :idioma');
    $total_imagenes->execute(array(':idioma' => $idioma));
    $total_imagenes = $total_imagenes->rowCount();
    return $total_imagenes;
}

/** Limpia los datos evitando que se guarden especios o caracteres especiales en la BD */
function limpiarDatosImagen($datos){
	$datos = trim($datos);
	$datos = stripcslashes($datos);
	$datos = htmlspecialchars($datos);
	$datos = str_replace(' ', '',$datos);
	$datos = str_replace('.', '',$datos);
	$datos = str_replace("'", '',$datos);
	return $datos;
}

?>