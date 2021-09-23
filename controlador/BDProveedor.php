<?php 

if(isset($_REQUEST['registrar'])){
include('conexion.php');
$nombre = $_POST['txtnombre'];
$direccion = $_POST['txtdireccion'];

 if($nombre=="" || $direccion=="" || !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z0-9.,_-\s]*$/", $nombre) || strlen($nombre)<3 ||
 strlen($direccion)<3 || !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z0-9.,_-\s]*$/", $direccion)){
    
        header("Location: ../vistas/proveedor_ingresar.php");
    
  
 }else{

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

    if($id=="" || $nombre=="" || $direccion=="" || !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z0-9.,_-\s]*$/", $nombre) || strlen($nombre)<3 ||
    strlen($direccion)<3 || !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z0-9.,_-\s]*$/", $direccion)){
    
        header("Location: ../vistas/proveedor.php");
    
  
   }else{

    $sql = "UPDATE proveedor SET nombre_proveedor='$nombre',direccion='$direccion' where id_proveedor='$id'";
    if($conexion->query($sql)==true){
        header("Location: ../vistas/proveedor.php");
        echo "Datos Actualizados...";
    }else{
        die("Error algo salio mal: " . $conexion->error);
    }
}
}


?>