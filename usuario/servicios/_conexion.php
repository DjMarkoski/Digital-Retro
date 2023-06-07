<?php
$servername = "localhost";
$username = "admin";
$password = "123456";
$dbname = "ecommerce";

// Crear la conexión
$con= mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>