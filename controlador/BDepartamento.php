<?php



if(isset($_REQUEST['registrar'])){
include('conexion.php');
$nombre = $_POST['txtdepartamento'];

$sqll="SELECT nombre FROM departamento where nombre='$nombre'";
    $sql_runn = mysqli_query($conexion,$sqll);
    $row = mysqli_num_rows($sql_runn);
    
    if($row>0){
 
        ?><script> location.href = "../vistas/departamento_ingresar.php";
        alert('Departamento ya registrado');</script><?php

    }else{
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

}}
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