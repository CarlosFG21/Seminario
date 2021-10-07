<?php
session_start();
if (isset($_REQUEST['registrar'])) {
    include('conexion.php');
    $departamento = $_POST['cbDepartamento'];
    $municipio = $_POST['txtmunicipio'];

    $sqll="SELECT nombre FROM municipio where nombre='$municipio'";
    $sql_runn = mysqli_query($conexion,$sqll);
    $row = mysqli_num_rows($sql_runn);
    
    if($row>0){
 
        ?><script> location.href = "../vistas/municipio_ingresar.php";
        alert('Municipio ya registrado');</script><?php

    }else{

    if ($departamento=="" || $municipio=="" ||  !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z\s]*$/", $municipio)){

        header("Location: ../vistas/municipio_ingresar.php");

    }else {

    $sql = "INSERT INTO municipio (nombre, id_departamento) VALUES ('$municipio', '$departamento')";
    if ($conexion->query($sql) === true) {            
        header("Location: ../vistas/municipio.php");
        echo "Datos insertados...";
    } else{
        die("Error algo salio mal: " . $conexion->error);
    }

} }
}

if (isset($_REQUEST['actualizar'])) {

    include('conexion.php');
    $departamento = $_POST['cbDepartamento'];
    $municipio = $_POST['txtmunicipio'];
    $id = $_REQUEST['txtid_municipio'];

    if ($municipio=="" ||  !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z\s]*$/", $municipio)){

        header("Location: ../vistas/municipio_ingresar.php");

    }else {

        $sql = "UPDATE municipio SET nombre='$municipio' WHERE id_municipio='$id'";
    if ($conexion->query($sql) === true) {            
        header("Location: ../vistas/municipio.php");
        echo "Datos insertados...";
    } else{
        die("Error algo salio mal: " . $conexion->error);
    }

}


}

?>