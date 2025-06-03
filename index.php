<?php
include 'auth.php'; // Verificación de autenticación
include 'db.php';   // Conexión a la base de datos
$result = $conn->query("SELECT * FROM proyectos ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio CRUD</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <a href="add.php" class="btn btn-primary">+ Agregar Proyecto</a>
                <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
            </div>
        </div>

        <h2 class="mb-4">Proyectos</h2>

        <div class="row">
            <?php while($row = $result->fetch_assoc()): ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="uploads/<?= $row['imagen'] ?>" class="card-img-top" alt="<?= $row['titulo'] ?>">
                    <div class="card-body">
                        <h3 class="card-title"><?= $row['titulo'] ?></h3>
                        <p class="card-text"><?= $row['descripcion'] ?></p>
                        <div class="d-flex gap-2 mb-3">
                            <a href="<?= $row['url_github'] ?>" class="btn btn-secondary btn-sm"
                                target="_blank">GitHub</a>
                            <a href="<?= $row['url_produccion'] ?>" class="btn btn-info btn-sm" target="_blank">Ver
                                Proyecto</a>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Estás seguro de eliminar este proyecto?')">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>