<?php
include("conexion.php");

if(isset($_POST['guardar'])){

    $nombre   = $_POST['nombre'];
    $marca    = $_POST['marca'];
    $cantidad = $_POST['cantidad'];
    $bodega   = $_POST['bodega'];

    $sql = "INSERT INTO articulos(nombre,marca,cantidad,bodega)
            VALUES('$nombre','$marca','$cantidad','$bodega')";

    $conn->query($sql);

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Crear Artículo</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="formulario">

<h1>➕ Crear Artículo</h1>

<form method="POST">

<input type="text"
name="nombre"
placeholder="Nombre"
required>

<input type="text"
name="marca"
placeholder="Marca"
required>

<input type="number"
name="cantidad"
placeholder="Cantidad"
required>

<input type="text"
name="bodega"
placeholder="Bodega"
required>

<button type="submit" name="guardar">
Guardar
</button>

</form>

</div>

</body>
</html>