<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of agregaevento
 *
 * @author sebas
 */

$nombre=$_POST['nombre'];
$tel=$_POST['tel'];
$correo=$_POST['correo'];
$mes=$_POST['mes'];
$año=$_POST['anio'];
$dia=$_POST['dia'];
$hora=$_POST['hora'];
$token =  generar_token_seguro(20);


$enlace= conexión();



$sql="INSERT INTO `agenda` (`id`, `nombre`, `tel`, `correo`, `mes`, `anio`, `confirma`, `hora`, `dia`, `token` ) VALUES "
  . "(NULL, '$nombre', '$tel', '$correo', '$mes', '$año', 'false', '$hora', '$dia', '$token')";

$actualiza= mysqli_query($enlace, $sql);
 
 echo"Guardado";

 
 
 include 'mail/send.php';
 
 
 

function verduplicados($token){
    $sql="SELECT * FROM `agenda` WHERE `token` LIKE '$token'";
   $enlace= conexión();
   
 
   $res=mysqli_query($enlace, $sql);

if(mysqli_num_rows($res)==0){
//echo "no hay registro <br>";
	//	La búsqueda no arrojó usuarios con ese ID, por lo tanto el usuario no existe

	
return false;
}else {
  //  echo "hay registro <br>";
    
    return true;
}
}

//genera un token unico
function generar_token_seguro($longitud)
{
    $valida=true;
  
    if ($longitud < 4) {
        $longitud = 4;
    }
    
    $count=0;
    while($valida){
 $token=bin2hex(openssl_random_pseudo_bytes(($longitud - ($longitud % 2)) / 2));

 $valida=verduplicados($token);
 $count++;
 if ($count>=3){
     break;
 }
    }
 
 
 
    return $token;
}


 echo"Guardado";
 
 
 function conexión(){
     $usuario="fastchec_fast";   
         $base="fastchec_rev";
         $pass="fastcheck123";     
     
     
$enlace = mysqli_connect("localhost", "$usuario", "$pass", "$base");
if (!$enlace->set_charset("utf8")) {
    echo"Error cargando el conjunto de caracteres utf8: %s\n", $enlace->error;
exit();}

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    echo"Conexión fallida: %s\n", mysqli_connect_error();
    exit();
}

/* comprobar si el servidor sigue funcionando */
if (mysqli_ping($enlace)) {

} else {
    echo "Error: %s\n", mysqli_error($enlace);
}
return $enlace;
}
?>