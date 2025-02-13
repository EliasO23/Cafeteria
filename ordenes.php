<?php
    include "includes/db.php";

    // Obtener ID del producto
    $id_producto = isset($_GET["id_producto"]) ? intval($_GET["id_producto"]) : 0;
    if ($id_producto == 0) {
        die("Error: ID de producto no válido.");
    }


    // Obtener información del producto seleccionado
    $sql = "SELECT * FROM productos WHERE id_producto = $id_producto";
    $result = $conexion -> query($sql);
    $producto = $result->fetch_assoc();

    // Insertar orden
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $producto = $_POST["producto_id"];
        $personalizacion = $_POST["personalizacion"];

        $query = $conexion -> prepare("INSERT INTO pedidos (producto_id, personalizacion) VALUES (?, ?)");
        $query->bind_param("is", $producto, $personalizacion);

        if ($query -> execute()) {
            echo "<p>Orden agregada</p>";
            header("Location: productos.php?success=1");
        } else {
            echo "<p>Error al agregar la orden " . $query -> error ."</p>";
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

    <h2>Realizar Orden</h2>
    <form method="POST">
        <label>Producto:</label>
        <input type="text" name="producto" value="<?php echo $producto['nombre']; ?>" readonly>

        <input type="hidden" name="producto_id" value="<?php echo $producto['id_producto']; ?>">

        <label>Personalización:</label>
        <input type="text" name="personalizacion" placeholder="Ej. Sin azúcar, con extra crema">

        <button type="submit">Enviar Orden</button>
    </form>

</body>
</html>
 