-- Script de la BD CAFETERIA

CREATE DATABASE cafeteria;

USE cafeteria;

CREATE TABLE productos(
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    categoria ENUM('bebidas calientes', 'bebidas frias', 'postres', 'snacks');
    precio DECIMAL(5,2) NOT NULL,
    imagen_producto TEXT,
    activo  BOOLEAN DEFAULT TRUE
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pedidos(
    id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    producto_id INT,
    personalizacion TEXT,
    fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (producto_id) REFERENCES productos(id_producto)
);


INSERT INTO productos (nombre, descripcion, categoria, precio, imagen_producto, activo) VALUES
('Pastel de Chocolate', 'Delicioso pastel con cobertura de chocolate.', 'postres', 4.00, '', 1)