<!doctype html>
<html lang="en">
  <head>
  	<title>Calendario simple</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
            <?php
            
            
  header("Content-Type: text/html; charset=utf-8");

 // include ("conexion/conexion.php");

            
   

     //$cadena= datosagenda($enlace);
    $cadena="";
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$valida="";
if (strpos($url,'?ingresa') !== false) {
$valida=$_GET['ingresa'];
}

            
    if($valida=="fastcheck"){

     $cadena= datosagenda($enlace);
    }
         
          echo"<script>"           . ""
                    . "var event_data = {
    'events': [
    $cadena
    ]
};"
                    . "</script>";

?>
       
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="content w-100">
				    <div class="calendar-container">
				      <div class="calendar"> 
				        <div class="year-header"> 
				          <span class="left-button fa fa-chevron-left" id="prev"> </span> 
				          <span class="year" id="label"></span> 
				          <span class="right-button fa fa-chevron-right" id="next"> </span>
				        </div> 
				        <table class="months-table w-100"> 
				          <tbody>
				            <tr class="months-row">
				              <td class="month">Ene</td> 
				              <td class="month">Feb</td> 
				              <td class="month">Mar</td> 
				              <td class="month">Abr</td> 
				              <td class="month">May</td> 
				              <td class="month">Jun</td> 
				              <td class="month">Jul</td>
				              <td class="month">Ago</td> 
				              <td class="month">Sep</td> 
				              <td class="month">Oct</td>          
				              <td class="month">Nov</td>
				              <td class="month">Dic</td>
				            </tr>
				          </tbody>
				        </table> 
				        
				        <table class="days-table w-100"> 
				       
				          <td class="day">Lun</td> 
				          <td class="day">Mar</td> 
				          <td class="day">Mie</td> 
				          <td class="day">Jue</td> 
				          <td class="day">Vie</td> 
				          <td class="day">Sab</td>
                                             <td class="day">Dom</td> 
				        </table> 
				        <div class="frame"> 
				          <table class="dates-table w-100"> 
			              <tbody class="tbody">             
			              </tbody> 
				          </table>
                                        </div> 
                                          <a href="https://fastcheckservice.cl/"> <button class="btn btn-danger btn-large" id="">Volver</button></a>
                                          <button class="button" id="add-button" >Agendar</button>
				      </div>
				    </div>
				    <div class="events-container">
				    </div>
				    <div class="dialog" id="dialog">
				        <h2 class="dialog-header"> Agendar Revisión Técnica</h2>
                                        <form class="form" id="form">
				          <div class="form-container" align="center">
				            <label class="form-label" id="valueFromMyButton" for="name">Nombre</label>
				            <input class="input" type="text" id="name" maxlength="36">
				            <label class="form-label" id="valueFromMyButton" for="count">teléfono</label>
				            <input class="input" type="number" id="count" min="0" max="100000000" maxlength="12">
				            <label class="form-label" id="valueFromMyButton" for="count">correo</label>
				            <input class="input" type="text" id="correo">
				            <label class="form-label" id="valueFromMyButton" for="count">Hora</label>
                                            
                                            <br>
                                            <div id="select">
				          
                                            </div>
                                            <hr>
                                            
				            <input type="button" value="Cancelar" class="button" id="cancel-button" >
				            <input type="button" value="Enviar" class="button button-white" onclick="guardabase();" id="ok-button">
				          </div>
				        </form>
                                   		      </div>
				  </div>
				</div>
			</div>
		</div>
	</section>

<center>Diseñado por Sebastián Martínez</center>
	</body>
	<footer class="text-center mt-5 footbg" >
        <div class="container">
            <div class="row">
                <div class="col"><a  class="textoblanco" href="https://promarketing.cl" target="_blank">
                    <img src="LOGO-PROMARKETING_1.png"  height="80px;" alt="Descripción de la imagen" class="img-fluid"> </a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                <p  class="textoblanco"> <span id="year" class="textoblanco"></span> Diseño hecho por <a  class="textoblanco" href="https://promarketing.cl" target="_blank">Promarketing.cl</a></p>
                </div>
            </div>
        </div>
    </footer>

</html>
            
<?php 


function datosagenda($enlace){
            $sql="SELECT * FROM `agenda`";
            
            $result= mysqli_query($enlace,$sql);
    $cadena="";
                    while($mostrar=mysqli_fetch_array($result)){
                        
    $id = $mostrar['id'];
    $nombre = $mostrar['nombre'];
    $tel = $mostrar['tel'];
    $correo = $mostrar['correo'];
    $dia = $mostrar['dia'];
    $mes = $mostrar['mes'];
    $año = $mostrar['anio'];
    $conf = $mostrar['confirma'];
    $hora = $mostrar['hora'];
    $cadena=$cadena."{
        'occasion': ' $nombre',
        'invited_count':' $tel',
        'correo': '$correo',
     
       'hora': '$hora',
        'year': $año,
        'month': $mes,
        'day': $dia,
        'cancelled': $conf
    }, ";
    
  
                    }
                    
 return $cadena;                   
}


?>