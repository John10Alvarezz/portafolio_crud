<?php
/**
 * Página de edición de proyectos
 */

include '../config/auth.php';
include '../config/db.php';

$id = $_GET['id'];
$proyecto = $conn->query("SELECT * FROM proyectos WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $url_github = $_POST['url_github'];
    $url_produccion = $_POST['url_produccion'];

    if ($_FILES['imagen']['name']) {
        $imagen = $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'], "../assets/uploads/$imagen");
        $img_sql = ", imagen='$imagen'";
    } else {
        $img_sql = "";
    }

    $sql = "UPDATE proyectos SET titulo='$titulo', descripcion='$descripcion', 
            url_github='$url_github', url_produccion='$url_produccion' $img_sql WHERE id=$id";
    
    if($conn->query($sql)) {
        header("Location: /index.php");
        exit;
    }
}

$pageTitle = 'Editar Proyecto';
include '../includes/header.php';
?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Editar Proyecto</h2>

                    <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <input type="text" name="titulo" class="form-control" value="<?= htmlspecialchars($proyecto['titulo']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <textarea name="descripcion" class="form-control" rows="4"><?= htmlspecialchars($proyecto['descripcion']) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="url" name="url_github" class="form-control" value="<?= htmlspecialchars($proyecto['url_github']) ?>">
                        </div>
                        <div class="mb-3">
                            <input type="url" name="url_produccion" class="form-control" value="<?= htmlspecialchars($proyecto['url_produccion']) ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Imagen Actual</label>
                            <img src="/assets/uploads/<?= $proyecto['imagen'] ?>" class="img-thumbnail mb-2" width="200">
                            <input type="file" name="imagen" class="form-control">
                            <small class="text-muted">Solo si deseas cambiar la imagen</small>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Actualizar Proyecto</button>
                            <a href="/index.php" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/main.js"></script>
</body>
</html>