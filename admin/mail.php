<?php 

// require 'admin/config.php';
// require 'funciones.php';

// require_once 'admin/phpmailer.php';
require_once '../index.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true); 

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

function enviar(){
	$correo_destino = $usuario['email'];
	$nombre = strip_tags($_POST['nombre']);
	$email = strip_tags($_POST['email']);
	$asunto = "A VER SI ESO FUNCIONA....";
	$mensaje = "Hello $nombre, <br /><br /> A VER SI ESTO FUNCIONA.... isn't it cool to send HTML email rather than plain text, it helps to improve Your email marketing.";      
	   
	   
	// HTML email starts here
	   
	$message  = "<html><body>";
	 
	$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
	   
	$message .= "<tr><td>";
	   
	$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
	    
	$message .= "<thead>
	      <tr height='80'>
	       <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >Programacion.net</th>
	      </tr>
	      </thead>";
	    
	$message .= "<tbody>
	      
	      
	      <tr>
	       <td colspan='4' style='padding:15px;'>
	        <p style='font-size:20px;'>Hola' ".$usuario['nombre'].",</p>
	        <hr />
	        <p style='font-size:25px;'>Correo enviado desde el formulario de TradCBM</p>
	        <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>".$mensaje.".</p>
	       </td>
	      </tr>
	      
	      </tbody>";
	    
	$message .= "</table>";
	   
	$message .= "</td></tr>";
	$message .= "</table>";
	   
	$message .= "</body></html>";
	   
	   // HTML email ends here
	   
    try
	{
		$mail->IsSMTP(); 
		$mail->CharSet="UTF-8";
		$mail->isHTML(true);
		$mail->SMTPDebug  = 0;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "STARTTLS";                 
		$mail->Host       = "smtp.1und1.de";      
		$mail->Port       = 587;             
		$mail->AddAddress($correo_destino);
		$mail->Username   ="carmen_barcos@tradcbm.com";  
		$mail->Password   ="Blasera1976!";            
		$mail->SetFrom('carmen_barcos@tradcbm.com','Programacion net');
		$mail->AddReplyTo("alfredruiz@gmail.com","Programacion net");

		$mail->Subject    = $asunto;
		$mail->Body    = $message;
		$mail->AltBody    = $message;
		     
		if($mail->Send())
		{
		    $msg = "<div class='alert alert-success'>
		       Hi,<br /> ".$nombre." mail was successfully sent to ".$email." go and check, cheers :)
		       </div>";
		}
	}

	catch(phpmailerException $ex)
	{
		$msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
	}
}

?>