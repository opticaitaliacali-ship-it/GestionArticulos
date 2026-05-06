CREATE DATABASE inventario;

USE inventario;

CREATE TABLE articulos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    marca VARCHAR(100) NOT NULL,
    cantidad INT NOT NULL,
    bodega VARCHAR(100) NOT NULL
);