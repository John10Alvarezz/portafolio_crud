<?php
/**
 * Script de eliminación de proyectos
 * 
 * Elimina un proyecto específico de la base de datos
 * y redirige al usuario a la página principal.
 */

include 'auth.php';
include 'db.php';

$id = $_GET['id'];

// Eliminar el proyecto de la base de datos
$conn->query("DELETE FROM proyectos WHERE id=$id");
header("Location: index.php");
?>