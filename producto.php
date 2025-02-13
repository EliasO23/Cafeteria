<?php
    include "includes/db.php";

    // Insertar productos
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $categoria = $_POST["categoria"];
        $precio = $_POST["precio"];
        $imagen = $_POST["imagen"];

        $query = $conexion -> prepare("INSERT INTO productos (nombre, descripcion, categoria, precio, imagen_producto) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("sssis", $nombre, $descripcion, $categoria, $precio, $imagen);

        if ($query -> execute()) {
            echo "<p>Producto agregado</p>";
        } else {
            echo "<p>Error al agregar el producto " . $query -> error ."</p>";
        }

        $query -> close();
    }

    $conexion -> close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php include "includes/navbar.php"; ?>
    <h2>Agregar Producto</h2>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Descripción:</label>
        <textarea name="descripcion"></textarea>

        <label>Categoría:</label>
        <select name="categoria">
            <option value="bebidas calientes">Bebidas Calientes</option>
            <option value="bebidas frias">Bebidas Frías</option>
            <option value="postres">Postres</option>
            <option value="snacks">Snacks</option>
        </select>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" required>

        <label>Imagen Producto: </label>
        <input type="text" name="imagen" required>

        <button type="submit">Guardar Producto</button>
    </form>

</body>
</html>
 