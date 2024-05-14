<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";  // Nombre del servidor MySQL
$username = "jljfhbrx_ProyectoIntegralCartas";   // Nombre de usuario de MySQL
$password = "rz8C8udv5VDUQJwjVyvZ"; // Contraseña de MySQL
$dbname = "jljfhbrx_ProyectoIntegralCartas";// Nombre de la base de datos

$servername = "localhost";  // Nombre del servidor MySQL
$username = "root";
$password = "";
$dbname = "dragons_den";// Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}