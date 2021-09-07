<?php

if(isset($_REQUEST['registrar'])){
include('conexion.php');
$nombre = $_POST['txtnombre'];
$direccion = $_POST['txtdireccion'];

if(isset($_POST['txtnombre'])&& isset($_POST['txtdireccion'])){

    $sql = "INSERT INTO extencion_centro(nombre,direccion) values('$nombre','$direccion')";
    if($conexion->query($sql)== true){
        header("Location: ../vistas/puesto_salud.php");
        echo "Datos insertados...";
    }else{
        die("Error algo salio mal: " . $conexion->error);
    }
    $conexion->close();


}
}

if(isset($_REQUEST['actualizar'])){
    include('conexion.php');
    $id= $_POST['txtid_puesto'];
    $nombre = $_POST['txtnombre'];
    $direccion = $_POST['txtdireccion'];

    $sql = "UPDATE extencion_centro SET nombre='$nombre',direccion='$direccion' where id_extencion_cen='$id'";
    if($conexion->query($sql)==true){
        header("Location: ../vistas/puesto_salud.php");
        echo "Datos Actualizados...";
    }else{
        die("Error algo salio mal: " . $conexion->error);
    }
    
}




?>