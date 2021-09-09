<?php

$nombre = "";
$id = 0;
$edit_state = false;

if(isset($_REQUEST['registrar'])){
include('conexion.php');
$nombre = $_POST['txtdepartamento'];


if(isset($_POST['txtdepartamento'])){

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
    $sql = "UPDATE departamento SET nombre='$nombre' where id_departamento='$id'";
    if($conexion->query($sql)==true){
        header("Location: ../vistas/departamento.php");
        echo "Datos Actualizados...";
    }else{
        die("Error algo salio mal: " . $conexion->error);
    }
 }

?>