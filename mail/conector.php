<?php 
header('Content-Type: text/html; charset=UTF-8');
?>

<?php


$enlace = mysqli_connect("localhost", "cambiais_seba", "sebastian5197", "cambiais_clientes");
if (!$enlace->set_charset("utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $enlace->error);
exit();}

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

/* comprobar si el servidor sigue funcionando */
if (mysqli_ping($enlace)) {

} else {
    printf ("Error: %s\n", mysqli_error($enlace));
}

/* cerrar la conexión */

?>