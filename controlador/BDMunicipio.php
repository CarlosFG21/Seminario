<?php
session_start();
if (isset($_REQUEST['registrar'])) {
    include('conexion.php');
    $departamento = $_POST['cbDepartamento'];
    $municipio = $_POST['txtmunicipio'];

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

} 
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