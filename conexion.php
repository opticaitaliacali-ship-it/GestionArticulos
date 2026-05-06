<?php

$host = "mysql-opticaitalia.alwaysdata.net";
$user = "opticaitalia";
$pass = "Samueldavid23";
$db   = "opticaitalia_gestion_articulos";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>