<?php
/**
 * Página para agregar nuevos proyectos
 * 
 * Permite crear nuevos proyectos con título, descripción,
 * URLs y una imagen. Incluye manejo de subida de archivos.
 */

include 'auth.php'; // Verificación de autenticación
include 'db.php';   // Conexión a la base de datos

// Procesamiento del formulario de agregar proyecto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $url_github = $_POST['url_github'];
    $url_produccion = $_POST['url_produccion'];

    // Manejo de la imagen
    $imagen = $_FILES['imagen']['name'];
    $tmp = $_FILES['imagen']['tmp_name'];
    move_uploaded_file($tmp, "uploads/$imagen");

    // Inserción en la base de datos
    $sql = "INSERT INTO proyectos (titulo, descripcion, url_github, url_produccion, imagen) 
            VALUES ('$titulo', '$descripcion', '$url_github', '$url_produccion', '$imagen')";

    $conn->query($sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proyecto - Portafolio CRUD</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Agregar Nuevo Proyecto</h2>

                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="text" name="titulo" class="form-control" placeholder="Título" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="descripcion" class="form-control" rows="4" maxlength="200"
                                    placeholder="Descripción (máx 200 palabras)" required></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="url" name="url_github" class="form-control" placeholder="URL GitHub">
                            </div>
                            <div class="mb-3">
                                <input type="url" name="url_produccion" class="form-control"
                                    placeholder="URL Producción">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Imagen del Proyecto</label>
                                <input type="file" name="imagen" class="form-control" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
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