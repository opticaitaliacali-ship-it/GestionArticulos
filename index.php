<?php
include("conexion.php");

/* =========================
   ELIMINAR
========================= */

if(isset($_GET['eliminar'])){

    $id = $_GET['eliminar'];

    $conn->query("DELETE FROM articulos WHERE id=$id");

    header("Location:index.php");
}

/* =========================
   CONSULTAR ARTICULOS
========================= */

$resultado = $conn->query("SELECT * FROM articulos ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sistema Inventario</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📦 Gestión de Artículos</h1>

<a href="crear.php" class="btn nuevo">
➕ Nuevo Artículo
</a>

<table>

<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Marca</th>
    <th>Cantidad</th>
    <th>Bodega</th>
    <th>Acciones</th>
</tr>

<?php while($row = $resultado->fetch_assoc()) { ?>

<tr>

<td><?= $row['id'] ?></td>
<td><?= $row['nombre'] ?></td>
<td><?= $row['marca'] ?></td>
<td><?= $row['cantidad'] ?></td>
<td><?= $row['bodega'] ?></td>

<td>

<a class="btn editar"
href="editar.php?id=<?= $row['id'] ?>">
Editar
</a>

<a class="btn eliminar"
href="?eliminar=<?= $row['id'] ?>"
onclick="return confirm('¿Eliminar artículo?')">
Eliminar
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>