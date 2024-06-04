<?php
// Detalles de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "db_01"; // Nombre de la base de datos

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
