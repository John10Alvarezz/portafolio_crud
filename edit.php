<?php
/**
 * Página de edición de proyectos
 * 
 * Permite modificar los datos de un proyecto existente,
 * incluyendo la actualización opcional de la imagen.
 */

include 'auth.php'; // Verificación de autenticación
include 'db.php';   // Conexión a la base de datos

$id = $_GET['id'];
$proyecto = $conn->query("SELECT * FROM proyectos WHERE id=$id")->fetch_assoc();

// Procesamiento del formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $url_github = $_POST['url_github'];
    $url_produccion = $_POST['url_produccion'];

    // Manejo de la imagen si se sube una nueva
    if ($_FILES['imagen']['name']) {
        $imagen = $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'], "uploads/$imagen");
        $img_sql = ", imagen='$imagen'";
    } else {
        $img_sql = "";
    }

    // Actualización en la base de datos
    $sql = "UPDATE proyectos SET titulo='$titulo', descripcion='$descripcion', 
            url_github='$url_github', url_produccion='$url_produccion' $img_sql WHERE id=$id";
    $conn->query($sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proyecto - Portafolio CRUD</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Editar Proyecto</h2>

                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="text" name="titulo" class="form-control" value="<?= $proyecto['titulo'] ?>"
                                    required>
                            </div>
                            <div class="mb-3">
                                <textarea name="descripcion" class="form-control"
                                    rows="4"><?= $proyecto['descripcion'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="url" name="url_github" class="form-control"
                                    value="<?= $proyecto['url_github'] ?>">
                            </div>
                            <div class="mb-3">
                                <input type="url" name="url_produccion" class="form-control"
                                    value="<?= $proyecto['url_produccion'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Imagen Actual</label>
                                <img src="uploads/<?= $proyecto['imagen'] ?>" class="img-thumbnail mb-2" width="200">
                                <input type="file" name="imagen" class="form-control">
                                <small class="text-muted">Solo si deseas cambiar la imagen</small>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Actualizar Proyecto</button>
                                <a href="index.php" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>