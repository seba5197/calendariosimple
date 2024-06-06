<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cargaselect
 *
 * @author sebas
 */

$mes=$_POST['mes'];
$año=$_POST['anio'];
$dia=$_POST['dia'];

$enlace= conexión();

horasdisponibles($dia, $mes, $año);


function horasdisponibles( $dia,$mes,$año){
    global $enlace;
   $sql="SELECT * FROM `agenda` WHERE `mes` LIKE '$mes' AND `anio` = $año AND `dia` = $dia"; 
    $count =0;
    $count1 =0;
    $count2 =0;
      
       $result= mysqli_query($enlace,$sql);
         while($mostrar=mysqli_fetch_array($result)){
                        
    $hora = $mostrar['hora'];
    $confirma= $mostrar['confirma'];
    $fecha="2007-01-31";

    if($hora=="08:00" && $confirma=="false"){
       $count++; 
    }
  if($hora=="11:00" && $confirma=="false"){
       $count1++; 
    }
    if($hora=="14:00" && $confirma=="false"){
       $count2++; 
    
    }
         }
         
            echo "<select class='form-control' id='hora'>";
   echo"<option disabled>Escoge una hora, si no hay disponible escoge otra fecha</option>";
     opcionesselect("08:00", $count);
      opcionesselect("11:00", $count1);
               opcionesselect("14:00", $count2);
   echo "</select>";
    
}

function opcionesselect($hora, $count){
    if($count < 2){
  echo"<option value='$hora'>$hora hrs </option>";
    }else{
    echo"<option value='$hora' disabled>$hora horas, no disponible </option>";
    }
}


 function conexión(){
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