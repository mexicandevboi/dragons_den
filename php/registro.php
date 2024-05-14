<?php
// Importar archivo de configuración de la base de datos
require_once '../dbconfig.php';

// Obtener los valores de nombre de usuario, email y contraseña de POST
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Crear la conexión a la base de datos

// Verificar si hay algún error en la conexión
if ($conn->connect_error)
{
    die("Error de conexión: " . $conn->connect_error);
}

// Preparar la consulta SQL para insertar el nuevo usuario en la tabla "users"
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

// Ejecutar la consulta SQL
if ($conn->query($sql) === TRUE)
{
    // display conn response
    echo "Usuario registrado correctamente";

} else
{
    echo "Error al registrar el usuario: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();