<?php
/**
 * Header común para todas las páginas
 * Incluye los elementos comunes del head HTML y la navegación
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Portafolio CRUD' ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/styles.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php if (isset($_SESSION['user'])): ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/index.php">Portafolio</a>
            <div class="navbar-nav ms-auto">
                <a href="/src/add.php" class="nav-link">Agregar Proyecto</a>
                <a href="/logout.php" class="nav-link">Cerrar sesión</a>
            </div>
        </div>
    </nav>
<?php endif; ?>