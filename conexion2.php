<?php
// Datos de conexión a la base de datos
$host = 'localhost';
$dbname = 'tabla_sup';
$username = 'username';
$password = 'password';

// Intentar conectar a la base de datos
try {
    $conexion = new PDO("mysql:host=$host;dbname=$tabla_sup", $username, $password);
    // Habilitar errores de PDO
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Establecer el juego de caracteres a UTF-8
    $conexion->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    // En caso de error, mostrar el mensaje de error
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
