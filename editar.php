<?php
include("conexion.php");

$id = $_GET['id'];

$resultado = $conn->query("SELECT * FROM articulos WHERE id=$id");

$row = $resultado->fetch_assoc();

if(isset($_POST['actualizar'])){

    $nombre   = $_POST['nombre'];
    $marca    = $_POST['marca'];
    $cantidad = $_POST['cantidad'];
    $bodega   = $_POST['bodega'];

    $sql = "UPDATE articulos SET
            nombre='$nombre',
            marca='$marca',
            cantidad='$cantidad',
            bodega='$bodega'
            WHERE id=$id";

    $conn->query($sql);

    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Editar Artículo</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="formulario">

<h1>✏️ Editar Artículo</h1>

<form method="POST">

<input type="text"
name="nombre"
value="<?= $row['nombre'] ?>"
required>

<input type="text"
name="marca"
value="<?= $row['marca'] ?>"
required>

<input type="number"
name="cantidad"
value="<?= $row['cantidad'] ?>"
required>

<input type="text"
name="bodega"
value="<?= $row['bodega'] ?>"
required>

<button type="submit" name="actualizar">
Actualizar
</button>

</form>

</div>

</body>
</html>