<?php
/**
 * Script de cierre de sesión
 * 
 * Destruye la sesión actual y redirige al usuario
 * a la página de inicio de sesión.
 */

session_start();
session_destroy();
header("Location: login.php");
?>