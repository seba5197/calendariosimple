<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cambiodeestado
 *
 * @author sebas
 */


$tel=$_GET['num'];
$token=$_GET['token'];


$sql="UPDATE `agenda` SET `confirma` = 'true'  WHERE `tel` LIKE '$tel' AND `token` LIKE '$token'";
$sql2="SELECT * FROM `agenda` WHERE `tel` LIKE '$tel' AND `token` LIKE '$token'";

$enlace = conexión();

$res=mysqli_query($enlace, $sql);

$count = mysqli_affected_rows($enlace);
if($count>0){
echo "<center><h1>Se a cancelado su solicitud</h1></center>".mysqli_affected_rows();
}else{
    echo "<center><h1>Esta solicitud no es valida o ya fue cancelada</h1></center>";

}


echo "<br><center>"
. "<a  href='https://fastcheckservice.cl'>Ir a página principal </a>"
        . ""
        . "</center>";


 $result= mysqli_query($enlace,$sql2);
    $cadena="";
                    while($mostrar=mysqli_fetch_array($result)){
                        
                        $nombre = $mostrar['nombre'];
    $tel = $mostrar['tel'];
    $correo = $mostrar['correo'];
    $dia = $mostrar['dia'];
    $mes = $mostrar['mes'];
    $año = $mostrar['anio'];
    $conf = $mostrar['confirma'];
    $hora = $mostrar['hora'];
                    }
                    include 'mail/send2.php';                 
                    
                    
                    

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