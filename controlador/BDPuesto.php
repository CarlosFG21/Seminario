<?php

if(isset($_REQUEST['registrar'])){
include('conexion.php');
$nombre = $_POST['txtnombre'];
$direccion = $_POST['txtdireccion'];

if($nombre=="" || $direccion=="" || !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z0-9.,\s]*$/", $nombre) || strlen($nombre)<3 ||
 strlen($direccion)<3 || !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z0-9.,\s]*$/", $direccion)){
    
        header("Location: ../vistas/puesto_ingresar.php");
    
  
 }else{

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
    if($nombre=="" || $direccion=="" || !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z0-9.,\s]*$/", $nombre) || strlen($nombre)<3 ||
    strlen($direccion)<3 || !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z0-9.,\s]*$/", $direccion)){
       
           header("Location: ../vistas/puesto_salud.php");
       
     
    }else{
    $sql = "UPDATE extencion_centro SET nombre='$nombre',direccion='$direccion' where id_extencion_cen='$id'";
    if($conexion->query($sql)==true){
        header("Location: ../vistas/puesto_salud.php");
        echo "Datos Actualizados...";
    }else{
        die("Error algo salio mal: " . $conexion->error);
    }
}
}




?>