<?php
    include "includes/db.php";

    // Seleccionar todas las ordenes
    $query = "SELECT pe.id_pedido, pr.nombre, pr.descripcion, pr.categoria, pr.precio, pr.imagen_producto, pe.personalizacion FROM pedidos AS pe INNER JOIN productos AS pr ON pe.producto_id = pr.id_producto";
    $result = $conexion -> query($query);
    $orders = [];
    while ($row = $result -> fetch_assoc()) {
        $orders[] = $row;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>
    <link rel="stylesheet" href="./css/style.css">
    
</head>
<body>
    <?php include "includes/navbar.php"; ?>

    <div class="container">
        <h1>Pedidos</h1>
        <table>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Personalización</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) { ?>
                    <tr>
                        <td><?php echo $order["id_pedido"]?></td>
                        <td><?php echo $order["nombre"] ?></td>
                        <td><?php echo $order["descripcion"] ?></td>
                        <td><?php echo $order["categoria"] ?></td>
                        <td><?php echo $order["precio"] ?></td>
                        <td><?php echo $order["personalizacion"] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>