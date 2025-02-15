<?php

    include "includes/db.php";

    // Seleccionar todos los productos
    $query = "SELECT * FROM productos";
    $result = $conexion -> query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="./css/style.css">
    
</head>
<body>
    <?php include "includes/navbar.php"; ?>
    <div class="container">
        <h1>¡Bienvenido a nuestra cafetería!</h1>
        <p>Disfruta de nuestras bebidas y postres hechos con los mejores ingredientes.</p>

        <div>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="card">
                    <img src="<?php echo $row['imagen_producto']; ?>" alt="<?php echo $row['nombre']; ?>">
                    <h3><?php echo $row['nombre']; ?></h3>
                    <p><?php echo $row['descripcion']; ?></p>
                    <p><strong>$<?php echo $row['precio']; ?></strong></p>
                    <form action="ordenes.php" method="GET">
                        <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                        <button type="submit">Seleccionar</button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
    
</body>
</html>