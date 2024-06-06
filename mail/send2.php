<?php require 'PHPMailerAutoload.php';


 
header('Content-Type: text/html; charset=utf-8');

require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP();
 
//Configuracion servidor mail
$mail->From = "$correo"; //remitente
$mail->FromName = "$nombre";
$mail->SMTPAuth = true;
$mail->IsHTML(true); 
$mail->CharSet = 'UTF-8';
$mail->SMTPSecure = 'ssl'; //seguridad
$mail->Host = "mail.fastcheckservice.cl"; // servidor smtp
$mail->Port = 465; //puerto
$mail->Username ='contacto@fastcheckservice.cl'; //nombre usuario
$mail->Password = 'fastcheckservice123'; //contraseña
//Agregar destinatario//Agregar destinatario
$mail->AddAddress("contacto@fastcheckservice.cl");
$mail->Subject = "Cancelación revisión para  $nombre";
 // Attachments
          // Add attachments
$body = "Se cancelo revisión técnica agendada $nombre $tel $dia/$mes/$año $hora";

 

$mail->Body = $body; // Mensaje a enviar

if ($mail->Send()) {
    ///echo'<script type="text/javascript">           alert("Enviado Correctamente");        </script>';
 

} else {
   
}

?>