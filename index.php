<?php
include("conexion.php");

if(isset($_GET['eliminar'])){

    $id = $_GET['eliminar'];

    $stmt = $conn->prepare("DELETE FROM articulos WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location:index.php");
}

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

<div class="background"></div>

<div class="container">

    <div class="header">

        <div>
            <h1>📦 Sistema Inventario</h1>
            <p class="subtitulo">
                Gestión moderna de artículos y bodegas
            </p>
        </div>

        <a href="crear.php" class="btn nuevo">
            + Nuevo Artículo
        </a>

    </div>

    <div class="tabla-container">

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
                <td>
                    <span class="cantidad">
                        <?= $row['cantidad'] ?>
                    </span>
                </td>

                <td>
                    <span class="bodega">
                        <?= $row['bodega'] ?>
                    </span>
                </td>

                <td class="acciones">

                    <a class="btn editar"
                    href="editar.php?id=<?= $row['id'] ?>">
                    ✏ Editar
                    </a>

                    <a class="btn eliminar"
                    href="?eliminar=<?= $row['id'] ?>"
                    onclick="return confirm('¿Eliminar artículo?')">
                    🗑 Eliminar
                    </a>

                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>