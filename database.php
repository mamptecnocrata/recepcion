<?php 
include 'conexion.php';
date_default_timezone_set('America/Caracas');
$cedper = $_REQUEST['cedula'];

/* Paso 1: Crear las variables para insertar en los campos del formulario 
 *  Paso 2: Consultar a partir de la información de la cédula.
 		2.1.- Primero obtener la información de la persona
 		2.2.- Y a partir de la persona, obtener la de la visita
 		2.3.- Y a partir de la persona, también obtener la foto
 	Paso 3: Si hay un dato de visita, y su valor de salida es 0, registrar su salida;
 		en caso de no tener visita, se deja en limpio para agregar sus datos
 	Paso 4: Si la persona tiene una foto, traer la foto;
 		en caso contrario, mostrar la cámara para obtener la foto
*/
$idvisi = $cedpers = $nomper = $apeper = $piso = $solicita = $motivo = $fecha_sql = $hor_ing = $hora_actual = "";
$foto;
$button = "Registrar";
$fecha_sql = date('Y-m-d H:i:s');

$datoPersona = mysqli_query($conectar, "SELECT * FROM persona WHERE ced_persona = '$cedper'");
if (mysqli_num_rows($datoPersona) > 0) {
	while ($row = mysqli_fetch_assoc($datoPersona)) {
		$cedpers = $row['ced_persona'];
		$nomper = $row['nom_persona'];
		$apeper = $row['ape_persona'];
		$foto = $row['foto'];
	}
	$datoVisita = mysqli_query($conectar, "SELECT * FROM visita WHERE cod_persona = '$cedper'");
	if (mysqli_num_rows($datoVisita) > 0) {
		while ($visita = mysqli_fetch_assoc($datoVisita)) {
			$idvisi = $visita['id_visita'];
			$piso = $visita['piso'];
			$solicita = $visita['solicita'];
			$sel_motivo = $visita['cmbmotivo'];
			$motivo = $visita['motivo'];
			$fecha_sql = $visita['fecha_ingreso'];
			//$hor_ing = "";
			$hora_actual = date('Y-m-d H:i:s');
			$button = "Actualizar";
		}
	}
	$params = "readonly";
}
/* Si existe el dato de la persona, obtener sus datos
Y se usa para comprobar la data de la visita
Si el valor de salida es 0, es porque la persona se retira
Si el valor de salida es 1, ya tiene una visita previa,
en cuyo caso se crea una nueva visita
*/

include "formulario.php";
?>