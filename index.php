<?php 
date_default_timezone_set('America/Caracas');
//include 'funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro de visitantes</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="library/jquery.min.js"></script>
    <script src="library/webcam.min.js"></script>
    <link rel="stylesheet" href="library/bootstrap.min.css" />
    <link rel="stylesheet" href="estilos.css">
    <link href="favicon.ico" rel="icon">
    <!-- <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style> -->
</head>
<body>
  
<div class="container">
    <h1 class="text-center">Registro de visitantes</h1>
   
    <form method="POST" name="registro" id="registro" action="funciones.php">
        <div class="row">

            <div class="col-md-6" id="txtHint">
                <!-- línea 1: la cedula -->
                <div class="label">
                    <label for="cedula">Cédula:</label>
                </div>
                <div class="input">
                    <input type="text" name="cedula" id="cedula" placeholder="Cédula" maxlength="8" onkeypress="validate(event)" onchange="buscarDato(this.value)">
                    <input type="hidden" name="id_visita" value="000001" readonly>
                </div>
                <hr>
            </div> 

            <div class="col-md-6 text-center">
                <div id="my_camera"></div>
                <br/>
                <input type="hidden" name="image" class="image-tag">
                <div id="results">Presiona el botón "Tomar foto" para obtenerla</div>
                <input type=button class="btn btn-success" value="Tomar foto" onClick="take_snapshot()">
            </div>

            <div class="col-md-6 text-center">
                <br/>
                <input type="Submit" name="registrar" id="registrar" style="display: none;" class="btn btn-success" value="Registrar">
            </div>
            <div class="col-md-6 text-center">
                <br/>
                <button id="help" class="btn btn-primary" title="Abrir la Ayuda"><span>Ayuda</span></button>
            </div>
        </div>
    </form>
</div>

<script src="funciones.js"></script>
 <!-- insertar una sección de ayuda:

    * Ayuda del SIA de registro de visitas
    * Cómo usar el SIA de registro:
    - Solicitar la cédula a la visita
    - Ingresar el número de cédula en el campo
    - Presionar TAB para traer el formulario
    - Ingresar sus nombres y apellidos
    - En el campo "solicita" preguntar a quién busca
    - En el campo "piso" colocar la ubicación de la persona
    solicitada
    - Preguntar si viene a título personal o de parte de
    una empresa, y con el dato en consideración,
    elegir la selección del motivo de la visita
    - Alinear la cámara para tomarle la fotografía a la visita,
    y presionar el botón "Tomar foto"
    - Una vez obtenida la foto, y rellenado los datos,
    proceder a guadarlo.
    - Cuando la visita se retira, y busca su cédula,
    ingresarla de nuevo, y esta vez se presiona el [] ubicado
    en "fin visita", y de allí presionar el botón "actualizar"
    - Entregar la cédula a la visita
-->
</body>
</html>