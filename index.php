<?php 

require 'admin/config.php';
require 'funciones.php';
require 'galeria/funciones_galeria.php';

// require_once 'admin/phpmailer.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true); 

$mensajeError = '';

// $urlActual = $_SERVER['HTTP_HOST'];

/*Se llama a la conexión, en el archivo funciones.php y se comprueba si hay error*/
$conexion = conexion($bd_config);

if (!$conexion) {
	$mensajeError .= 'Se ha producido un error de conexión a la Base de Datos';
	echo $mensajeError;
	//header('Location: error.php');
} 

/*Obtener los datos de contacto del usuarioi propietario de la web para los datos de contacto
y para el formulario de envío de correo electrónico*/
$usuario_propietario = $blog_config['usuarioContactos'];

$usuario = obtener_usuario($conexion, $usuario_propietario);

if (!$usuario) {
    $mensajeError .= 'No se ha recibido información de la base de datos';
    echo $mensajeError;
    header('Location: error.php');
}

/*Para poder el contenido en los distintos idiomas, se envía por get el parámetro
que modifica la variable idioma que luego se usará para la funcióin obtener_artículos.
Para el español no se envía parámetro*/

if (isset($_GET['lan'])) {
	$idioma = $_GET['lan'];
	
} else {
	$idioma = $idioma_principal;
}


/*ENVÍO DE FORMULARIO DE CORREO ELECTRÓNICO*/

if(isset($_POST['btn_send']))
{
	$correo_destino = $usuario['email'];
	$nombre = strip_tags($_POST['nombre']);
	$email = strip_tags($_POST['email']);
	$asunto = "Mensaje desde la web de " . $usuario['razonsocial'];
	$message = "<p style='font-size:15px; font-weight:bold; font-family:Verdana, Geneva, sans-serif;'>Hola " . $usuario['nombre'] . ', has recibido este mensaje desde la web de ' . $usuario['razonsocial'] . ':</p>';  
	$message .= '<br>';
	$message .=  'Nombre: ' . $_POST['nombre'] . '<br>';
	$message .=  'Correo:' . $_POST['email'] . '<br>';
	$message .=  'Teléfono:' . $_POST['telefono'] . '<br>';
	$message .=  'Mensaje:<br>';
	$message .=  $_POST['mensaje'];
	   
    try
	{
		$mail->IsSMTP(); 
		$mail->CharSet="UTF-8";
		$mail->isHTML(true);
		// $mail->IsSendmail() ;
		$mail->SMTPDebug  = $mail_config['smtpDebug'];                     
		$mail->SMTPAuth   = $mail_config['smtpAuth'];                  
		$mail->SMTPSecure = $mail_config['smtpSecure'];                 
		$mail->Host       = $mail_config['host'];      
		$mail->Port       = $mail_config['port'];   
		$mail->IsSMTP(); // use SMTP          
		$mail->AddAddress('alfredruiz@gmail.com');
		// $mail->AddAddress($correo_destino);
		$mail->Username   =$mail_config['username'];  
		$mail->Password   =$mail_config['password'];            
		$mail->SetFrom($_POST['email'],$_POST['nombre']); //remitente
		$mail->AddReplyTo($_POST['email'],$_POST['nombre']); // copia a

		$mail->Subject    = $asunto;
		$mail->Body    = $message;
		$mail->AltBody    = $message;
		     
		if($mail->Send())
		{
		    $msg = "<div class='alert alert-success'>Mensaje enviado correctamente</div>";
		}
	}

	catch(phpmailerException $ex)
	{
		$msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
	}
} 



// $mensajeError = '';

// // $urlActual = $_SERVER['HTTP_HOST'];

// /*Se llama a la conexión, en el archivo funciones.php y se comprueba si hay error*/
// $conexion = conexion($bd_config);

// if (!$conexion) {
// 	$mensajeError .= 'Se ha producido un error de conexión a la Base de Datos';
// 	echo $mensajeError;
// 	//header('Location: error.php');
// } 

// /*Para poder el contenido en los distintos idiomas, se envía por get el parámetro
// que modifica la variable idioma que luego se usará para la funcióin obtener_artículos.
// Para el español no se envía parámetro*/

// if (isset($_GET['lan'])) {
// 	$idioma = $_GET['lan'];
	
// } else {
// 	$idioma = "es";
// }


/*Se llama a las funciones de obtener artículos, cabecera y usuario, en este 
caso para rellenar el apartado de contacto.
Los datos de contacto son los del usuario dueño de la web y que está definido
en el archivo config.php*/

$articulos = obtener_articulos($conexion, $idioma);

// if (!$articulos) {
// 	$mensajeError .= 'No se ha recibido información de la base de datos';
// 	//echo $mensajeError;
// 	//header('Location: error.php');
// }

$cabecera = obtener_cabecera($conexion, $idioma);

if (!$cabecera) {
	$mensajeError .= 'No se ha recibido información de la base de datos';
	echo $mensajeError;
	header('Location: error.php');
}

// $usuario_propietario = $blog_config['usuarioContactos'];

// $usuario = obtener_usuario($conexion, $usuario_propietario);

// if (!$usuario) {
//     $mensajeError .= 'No se ha recibido información de la base de datos';
//     echo $mensajeError;
//     header('Location: error.php');
// }

$imagenes = obtener_imagenes($conexion, $idioma);
$totalImagenesMostradas = 3;

if (isset($_GET['idImg'])) {
	$imagenSola = obtener_imagen_por_id($conexion, $imgId);
}

// FUNCIONES

/*Para obtener los apartados o secciones de la web*/
// function obtener_imagenes($conexion, $idioma){ //en el tutorial es obtener_post
// 	$totalImagenes = $conexion->prepare('SELECT * FROM galeria_img WHERE idioma = :idioma ORDER BY orden');
// 	$totalImagenes->execute(array(':idioma' => $idioma));
// 	return $totalImagenes->fetchAll();
// }

// /*Obtener una imagen por su id*/
// function obtener_imagen_por_id($conexion, $id){
// 	$resultado = $conexion->query("SELECT * FROM galeria_img WHERE id = $id LIMIT 1");
// 	$resultado = $resultado->fetchAll();
// 	return ($resultado) ? $resultado : false;
// }

require 'views/index.view.php';


 ?>