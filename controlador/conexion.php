<?php
    $conexion = mysqli_connect('localhost','root','','proyecto_csd');
    if(mysqli_connect_error())
    {
        die('Error no se pudo conectar a la base de datos'. mysqli_connect_error());
    }
?>