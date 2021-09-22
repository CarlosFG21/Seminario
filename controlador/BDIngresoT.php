<?php

session_start();
include('conexion.php');

//HAGO EL PRIMER INSERT DE INGRESO
$id_user = $_SESSION['id_usuario'];
//$id_proveedor = $_POST['cbProveedorS'];

$sqlIngreso = "INSERT INTO ingreso (id_proveedor, id_usuario)
VALUES ('1', '$id_user')";
 if ($conexion->query($sqlIngreso) === true) {            
    //header("Location: ../vistas/medicamento.php");
    echo "Datos insertados...INGRESO NORMAL";
} else{
    die("Error algo salio mal INGRESO: " . $conexion->error);
}


?>