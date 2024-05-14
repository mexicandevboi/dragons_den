<?php
// Importar archivo de configuración de la base de datos usando absolute path
require_once ('../dbconfig.php');


$query = "SELECT id,username,email FROM users";
$result = mysqli_query($conn, $query);

//return the result in json format
echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));