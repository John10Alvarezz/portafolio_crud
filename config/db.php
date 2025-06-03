<?php
/**
 * Configuración de la conexión a la base de datos
 * 
 * Este archivo maneja la conexión a la base de datos MySQL utilizando mysqli.
 * Contiene las credenciales y establece la conexión que será utilizada en todo el sistema.
 */

// Credenciales de la base de datos
$host = "localhost";
$db = "portafolio_db";
$user = "root";
$pass = "";

// Establecer conexión a la base de datos
$conn = new mysqli($host, $user, $pass, $db);

// Verificar si hay errores en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>