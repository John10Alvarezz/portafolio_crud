<?php
/**
 * Sistema de autenticación
 * 
 * Este archivo maneja la verificación de sesiones de usuario.
 * Si no existe una sesión activa, redirige al usuario a la página de login.
 */

session_start();

// Verificar si existe una sesión de usuario
if (!isset($_SESSION['user'])) {
    header("Location: /login.php");
    exit;
}
?>