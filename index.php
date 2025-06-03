<?php
/**
 * Página principal del portafolio
 * 
 * Muestra todos los proyectos en un grid responsivo.
 * Incluye opciones para agregar, editar y eliminar proyectos.
 */

include 'config/auth.php';
include 'config/db.php';

// Obtener todos los proyectos ordenados por fecha de creación
$result = $conn->query("SELECT * FROM proyectos ORDER BY created_at DESC");

// Establecer el título de la página
$pageTitle = 'Portafolio CRUD';
include 'includes/header.php';
?>

<div class="container py-4">
    <!-- Grid de proyectos -->
    <div class="row">
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 project-card">
                <img src="/assets/uploads/<?= $row['imagen'] ?>" class="card-img-top" alt="<?= $row['titulo'] ?>">
                <div class="card-body">
                    <h3 class="card-title"><?= $row['titulo'] ?></h3>
                    <p class="card-text"><?= $row['descripcion'] ?></p>
                    <!-- Enlaces del proyecto -->
                    <div class="d-flex gap-2 mb-3">
                        <?php if($row['url_github']): ?>
                            <a href="<?= $row['url_github'] ?>" class="btn btn-secondary btn-sm" target="_blank">GitHub</a>
                        <?php endif; ?>
                        <?php if($row['url_produccion']): ?>
                            <a href="<?= $row['url_produccion'] ?>" class="btn btn-info btn-sm" target="_blank">Ver Proyecto</a>
                        <?php endif; ?>
                    </div>
                    <!-- Botones de acción -->
                    <div class="d-flex gap-2">
                        <a href="/src/edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="/src/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" 
                           onclick="return confirmDelete(<?= $row['id'] ?>)">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<!-- Bootstrap JS y script personalizado -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/main.js"></script>
</body>
</html>