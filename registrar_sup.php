<?php
// Verificar si se ha enviado el formulario de registro
include("conexion2.php")

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y obtener los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    // Otras variables como fecha pueden ser generadas automáticamente si es necesario

    // Preparar la consulta SQL para insertar un nuevo supervisor en la tabla 'administradores'
    $sql = "INSERT INTO administradores (username, password, nombre, email) VALUES (:username, :password, :nombre, :email)";

    try {
        // Preparar la consulta para ejecución
        $stmt = $conexion->prepare($sql);

        // Vincular parámetros
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);

        // Ejecutar la consulta
        $stmt->execute();

        // Mostrar mensaje de éxito si la consulta se ejecuta correctamente
        echo "Registro exitoso. Bienvenido, $nombre.";

        // Redirigir a la página de inicio de sesión u otra página deseada
        // header("Location: inicio_sesion.php");
        // exit();
    } catch (PDOException $e) {
        // En caso de error, mostrar el mensaje de error
        echo "Error al registrar al supervisor: " . $e->getMessage();
    }
}
?>
