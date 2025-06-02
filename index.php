<?php
include 'auth.php';
include 'db.php';
$result = $conn->query("SELECT * FROM proyectos ORDER BY created_at DESC");
?>

<a href="add.php">+ Agregar Proyecto</a> | <a href="logout.php">Cerrar sesión</a>
<h2>Proyectos</h2>
<?php while($row = $result->fetch_assoc()): ?>
<div>
    <h3><?= $row['titulo'] ?></h3>
    <p><?= $row['descripcion'] ?></p>
    <img src="uploads/<?= $row['imagen'] ?>" width="150"><br>
    <a href="<?= $row['url_github'] ?>">GitHub</a> |
    <a href="<?= $row['url_produccion'] ?>">Enlace</a><br>
    <a href="edit.php?id=<?= $row['id'] ?>">Editar</a> |
    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
</div>
<hr>
<?php endwhile; ?>