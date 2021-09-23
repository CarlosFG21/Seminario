<?php

$nombred = "";
$id = 0;
$edit_state = false;

if(isset($_REQUEST['registrar'])){
include('conexion.php');
$nombre = $_POST['txtdepartamento'];


if($nombre=="" || !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú\s]+[a-zA-Z0-9\s]*$/", $nombre) || strlen($nombre)<3){

    header("Location: ../vistas/departamento.php");
    

}else{

    $sql = "INSERT INTO departamento(nombre) values('$nombre')";
    if($conexion->query($sql)== true){
        header("Location: ../vistas/departamento.php");
        echo "Datos insertados...";
    }else{
        die("Error algo salio mal: " . $conexion->error);
    }
    $conexion->close();

}
}

if(isset($_REQUEST['actualizar'])){
    include('conexion.php');
    $nombre = $_POST['txtdepartamento'];
    $id = $_POST['txtid_departamento'];
    if($nombre=="" || !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú\s]+[a-zA-Z0-9\s]*$/", $nombre) || strlen($nombre)<3){

        header("Location: ../vistas/departamento.php");
        
    
    }else{
    $sql = "UPDATE departamento SET nombre='$nombre' where id_departamento='$id'";
    if($conexion->query($sql)==true){
        header("Location: ../vistas/departamento.php");
        echo "Datos Actualizados...";
    }else{
        die("Error algo salio mal: " . $conexion->error);
    }
}
 }

?>