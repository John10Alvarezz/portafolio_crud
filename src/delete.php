<?php
/**
 * Script de eliminación de proyectos
 */

include '../config/auth.php';
include '../config/db.php';

$id = $_GET['id'];

// Eliminar el proyecto de la base de datos
if($conn->query("DELETE FROM proyectos WHERE id=$id")) {
    header("Location: /index.php");
    exit;
}
?>