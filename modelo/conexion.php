<?php
function conexion() {
    $conexion = mysqli_connect("localhost", "root", "", "helpedu");
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    return $conexion;
}
?>
