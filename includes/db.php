<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $BD = 'cafeteria';

    $conexion = mysqli_connect($host, $user, $password, $BD);

    if ($conexion -> connect_error) {
        die("Conexion fallida: " . mysqli_connect_error());
    } else {
        // echo "Conexion exitosa";
    }
    
?> 