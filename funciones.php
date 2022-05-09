<?php
    include 'conexion.php';
    
    /* Función 1: comprobar que el valor de cédula existe
        Función 2: insertar nuevos registros
        Función 3: actualizar registros si aplica
    function buscarCedula($valor) {
        $flag = true;
        si funcion sql se ejecuta bien, mostramos un alerta, y decimos
            return $flag;
        si llega a fallar, mostrar un texto donde falla
            $flag = false;
            return $flag;
    }

    function insertarDatos($valor) {}

    function actualizarDatos($valor) {}
    */
    /* Uso como valor $flag el name del botón:
    Si el botón tiene como nombre "registrar", invocar la función insertar;
    Si el botón tiene como nombre "actualizar", invocar la función actualizar;
    TODO: agregar un botón para generar reporte de PDF
    */
    //var_dump($_POST);
    if ($_POST['registrar']) {
        $img = $_POST['image'];
        $folderPath = "image/";

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        // buscar reemplazar este nombre de archivo por el valor de la cédula de la persona
        $fileName = $_POST['cedula'] . '.png';
      
        $file = $folderPath . $fileName; // debe decir [cedula].jpg
        file_put_contents($file, $image_base64);
        //print_r($file);

        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $piso = $_POST["piso"];
        $solicita = $_POST["solicita"];
        $sel_motivo = $_POST["cmb_motivo"];
        $motivo = $_POST["inpmoti"];
        $llegada = $_POST["ingreso"];
        //$finVisita = $_POST["finVisita"];
        $salida = date('1970-01-01 12:00:00');
        //adicionar, guardar la ruta de la imagen como variable
        // para agregar el campo cod_persona, adicionar con cero antes para completar los 10 dígitos
        $sql_persona = mysqli_query($conectar, "INSERT INTO persona(cod_persona, ced_persona, nom_persona, ape_persona, foto) VALUES ('00$cedula', $cedula, '$nombre', '$apellido','$file');");
        $sql_visita = mysqli_query($conectar, "INSERT INTO visita (cod_persona, piso, solicita, cmbmotivo, motivo, fecha_ingreso, fecha_salida, salida) VALUES ('$cedula', '$piso', '$solicita','$sel_motivo', '$motivo', '$llegada', '$salida', '0');");
        
        if($sql_persona && $sql_visita) {
            echo mostrarResultadoRetornar("Datos guardados", "index.php");
            //return '<script>alert("Datos guardados");location.href="index.php";</script>';
        } else {
            echo '<h1 style="color:F03000;">No se puede ejecutar la consulta SQL:'.mysqli_error($conectar).'</h1>';
        }
        
        cerrarConexion($conectar);    
    }
    if($_POST['actualizar']) {
        $cedula = $_POST["cedula"];
        $salida = $_POST["salida"];
        //echo "<br>Ejecutamos el SQL para actualizar unos datos<br>";
        $sql_actualizar = mysqli_query($conectar, "UPDATE visita SET fecha_salida='$salida',salida=1 WHERE cod_persona= '$cedula'");
        if($sql_actualizar) {
            echo mostrarResultadoRetornar("Datos actualizados", "index.php");
            //return '<script>alert("Datos guardados");location.href="index.php";</script>';
        } else {
            echo '<h1 style="color:F03000;">No se puede ejecutar la consulta SQL:'.mysqli_error($conectar).'</h1>';
        }
    }
    
function mostrarResultadoRetornar($val1, $val2) {
    return '<script>alert("'.$val1.'");location.href="'.$val2.'";</script>';
}
?>