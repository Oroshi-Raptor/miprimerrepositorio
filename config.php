<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Parámetros de conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agencia";

// Crear la conexión utilizando PDO para mayor seguridad
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Establecer el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
