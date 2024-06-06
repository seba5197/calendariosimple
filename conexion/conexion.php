<?php
function conexion(){
    $usuario="fastchec_fast";  
    $base="fastche_rev";
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
    $enlace= conexion();
?>