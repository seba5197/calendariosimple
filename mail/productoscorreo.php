<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// $productos  $rut $tel1 $tel2 $correo  $renta $region $afp 

require 'PHPMailerAutoload.php';
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
$mail->Host = "mail.comparaisapres.cl"; // servidor smtp
$mail->Port = 465; //puerto
$mail->Username ='contacto@comparaisapres.cl'; //nombre usuario
$mail->Password = 'compara5197'; //contraseña
//Agregar destinatario//Agregar destinatario
$mail->AddAddress("contacto@comparaisapres.cl");
$mail->Subject = "Solicitud de productos adicionales para $nombre ";


$body = " $nombre Solicita los siguientes productos y/o servicios $productos
    

<li><strong style='color: #333333; font-family: 'Lucida Grande', Verdana, Arial, Helvetica, sans-serif; font-size: 11px;'>Los datos ingresados, fueron los siguientes:&nbsp;</strong></li>
</ul>
</h6>
<h4>
<table style='width: 749px;' border='1' cellspacing='0' cellpadding='0'>
<colgroup>
<col style='mso-width-source: userset; mso-width-alt: 8667; width: 178pt;' width='237'>
<col style='mso-width-source: userset; mso-width-alt: 9472; width: 194pt;' width='259'> </colgroup>
<tbody>
<tr style='height: 15.0pt;'>
<td class='xl66' style='height: 15pt; width: 120px;' height='20'>Datos de $nombre Rut $rut</td>
<td class='xl67' style='border-left: none; width: 626px;'>
<p><strong class='texto'><span style='color: #333333; font-family: 'Lucida Grande', Verdana, Arial, Helvetica, sans-serif;'><span style='font-size: 11px;'>Renta: $renta $afp <br> Telefonos $tel1 $tel2 
    <br>Correo: $correo <br> Solicita: $productos  <br> $region </span></span></strong></p>
</td>
</tr>



</tbody>
</table>
</h4>
<p><a href='whatsapp://send?text=https://comparaisapres.cl' data-action='share/whatsapp/share'><img style='width: 54.4063px; height: 54.4063px;' src='http://comparaisapres.cl/wp-content/uploads/2017/05/whatsapp_logo.png' width='30px' height='30px' align='absbottom' border='0' data-pin-nopin='true' scale='0'></a><a style='color: #00a0d2; transition: all 700ms; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; text-align: center;' href='tel:+56945106413'>+56 9 4510 6413</a></p>
<p><a href='whatsapp://send?text=https://comparaisapres.cl' data-action='share/whatsapp/share'>Compartir por WhatsApp con un contacto</a></p>
<p><iframe style='border: none; overflow: hidden;' src='https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Ffacebook.com%2Fcomparaisapres&amp;width=450&amp;layout=standard&amp;action=like&amp;size=small&amp;show_faces=false&amp;share=true&amp;height=35&amp;appId' width='450' height='35' frameborder='0' scrolling='no'></iframe></p>
";

$mail->Body = $body; // Mensaje a enviar

//Avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {
    ///echo'<script type="text/javascript">           alert("Enviado Correctamente");        </script>';
} else {
    echo'<script type="text/javascript">
           alert("NO ENVIADO, intentar de nuevo");
        </script>';
}