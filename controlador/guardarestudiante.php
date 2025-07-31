<?php
require_once "../modelo/conexion.php";
$conexion = conexion();

// Recibir datos del formulario
$id = $_POST['form1'];
$nombre = $_POST['form2'];
$apellido = $_POST['form3'];
$tarjeta = $_POST['form4'];

// Validación básica
if ($id == "" || $nombre == "" || $apellido == "" || $tarjeta == "") {
    echo 2; // Error por campos vacíos
    exit;
}

// Sentencia de actualización
$sql = "UPDATE accestudiantes 
        SET nombre = '$nombre', apellido = '$apellido', tarjeta = '$tarjeta'
        WHERE id_estudiantes = '$id'";

$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    echo 1; // Éxito
} else {
    echo 2; // Fallo
}
?>
