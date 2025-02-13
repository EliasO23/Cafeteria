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
    <title>Document</title>

    <style>
        .card { 
            border: 1px solid #ccc; 
            padding: 15px; 
            margin: 10px; 
            display: inline-block; 
            width: 250px; 
            text-align: center; 
            border-radius: 10px; 
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }
        img { width: 100%; height: auto; border-radius: 10px; }
        button { background-color: #28a745; color: white; padding: 10px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <?php include "includes/navbar.php"; ?>
    
    <h1>Lista de Productos</h1>
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
    
</body>
</html>