<?php 

// Conexión a una BBDD MySQL
$hostname = "localhost";
$usuario = "root";
$contrasenia = "";
$database = "visita";

$conectar = mysqli_connect($hostname, $usuario, $contrasenia, $database);
if (mysqli_connect_errno($conectar)) {
    echo "Fallo al conectar a MySQL, causado por: " . mysqli_connect_error();
} 
//echo "<p>Se ha conectado muy bien</p>";

/* $mbd = new PDO('mysql:host=localhost;dbname=prueba', $usuario, $contraseña);

try {
    $dbh = new PDO('mysql:host=localhost;dbname=prueba', $usuario, $contrasenia);
    
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
unset($dbh);
*/
/* Conexión principal:
$conectar = mysqli_connect($server, $uname, $pass, $bbdd);
if (mysqli_connect_errno($conectar)) {
    echo "Fallo al conectar a MySQL, causado por: " . mysqli_connect_error();
} else {
	echo "<p>Se ha conectado muy bien";
	unset($conectar);
	echo "<br>Y ahora se ha limpiado</p>";
}*/
//var_dump($conectar);

function desconectar($connect) {
	$cierre = mysqli_close($connect);
	echo "Cierre exitoso<br>";
}
?>