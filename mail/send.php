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
$mail->Subject = "Confirmarción revisión para  $nombre";
 // Attachments
          // Add attachments
$body = "Nueva revisión tecnica agendada $nombre $tel $dia/$mes/$año $hora";

 

$mail->Body = $body; // Mensaje a enviar

if ($mail->Send()) {
    ///echo'<script type="text/javascript">           alert("Enviado Correctamente");        </script>';
 

} else {
   
}


$mail2 = new PHPMailer();
$mail2->IsSMTP();
 
//Configuracion servidor mail
$mail2->From = "Contacto@fastcheckservice.cl"; //remitente
$mail2->FromName = "FastCheckService";
$mail2->SMTPAuth = true;
$mail2->IsHTML(true); 
$mail2->CharSet = 'UTF-8';
$mail2->SMTPSecure = 'ssl'; //seguridad
$mail2->Host = "mail.fastcheckservice.cl"; // servidor smtp
$mail2->Port = 465; //puerto
$mail2->Username ='contacto@fastcheckservice.cl'; //nombre usuario
$mail2->Password = 'fastcheckservice123'; //contraseña
//Agregar destinatario//Agregar destinatario
$mail2->AddAddress("$correo");
$mail2->Subject = "Hemos recibido tu solicitud";
 // Attachments
          // Add attachments
$body2 = "<h2>Junto con saludar&nbsp; <span style='font-size: 1.3em; color: rgb(255, 0, 0);'>$nombre</span><br /></h2>
<p><span style='white-space: pre-wrap;'>Gracias por ingresar a <a href='https://fastcheckservice.cl'><b>FastCheckService.cl</b></a>
<br>
Se ha reservado con éxito la revisión técnica a domicilio. 

<a  href='https://fastcheckservice.cl/calendario/cambiodeestado.php?num=$tel&token=$token'><b>Si necesitas cancelar tu solicitud haz click aquí</b></a>

";




$mail2->Body = $body2; // Mensaje a enviar

//Avisar si fue enviado o no y dirigir al index


//Avisar si fue enviado o no y dirigir al index
if ($mail2->Send()) {
    ///echo'<script type="text/javascript">           alert("Enviado Correctamente");        </script>';
 

} else {
}

?>