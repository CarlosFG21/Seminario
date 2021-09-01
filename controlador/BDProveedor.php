<?php 

if(isset($_REQUEST['registrar'])){
include('conexion.php');
$nombre = $_POST['txtnombre'];
$direccion = $_POST['txtdireccion'];
if(isset($_POST['txtnombre'])&& isset($_POST['txtdireccion'])){

    $sql = "INSERT INTO proveedor(nombre_proveedor,direccion) values('$nombre','$direccion')";
    if($conexion->query($sql)== true){
        header("Location: ../vistas/proveedor.php");
        echo "Datos insertados...";
    }else{
        die("Error algo salio mal: " . $conexion->error);
    }
    $conexion->close();
}
}

if(isset($_REQUEST['actualizar'])){
    include('conexion.php');
    $id= $_POST['txtid_proveedor'];
    $nombre = $_POST['txtnombre'];
    $direccion = $_POST['txtdireccion'];

    $sql = "UPDATE proveedor SET nombre_proveedor='$nombre',direccion='$direccion' where id_proveedor='$id'";
    if($conexion->query($sql)==true){
        header("Location: ../vistas/proveedor.php");
        echo "Datos Actualizados...";
    }else{
        die("Error algo salio mal: " . $conexion->error);
    }
    
}


?>