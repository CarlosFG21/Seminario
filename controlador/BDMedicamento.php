<?php

session_start();
if (isset($_REQUEST['registrarMedicamento'])) {
    include('conexion.php');
    $nombre = $_POST['txtNombre'];
    $descripcion = $_POST['txtDescripcion'];
    $fechaVencimiento = $_POST['txtFechaVencimiento'];
    $lote = $_POST['txtLote'];
    $id_presentacion = $_POST['cbPresentacion'];
    $id_concentracion = $_POST['cbConcentracion'];

    $fechaIngreso = $_POST['txtFechaIngreso'];
    $stock = $_POST['txtStock'];
  

    //para que funcione el crud para mientras
    $id_user = $_SESSION['id_usuario'];
    


        $sql = "INSERT INTO medicamento (nombre, descripcion, num_lote, concentracion, stock, id_presentacion)
         VALUES ('$nombre', '$descripcion', '$lote', '$id_concentracion', '$stock', '$id_presentacion')";
        if ($conexion->query($sql) === true) {            
            header("Location: ../vistas/medicamento.php");
            echo "Datos insertados...";
        } else{
            die("Error algo salio mal: " . $conexion->error);
        }
        $conexion->close();
    
}



if (isset($_REQUEST['actualizarMedicamento'])) {

    include('conexion.php');

    $id = $_REQUEST['txtIdMedicamento'];
    $nombre = $_POST['txtNombre'];
    $descripcion = $_POST['txtDescripcion'];
    $fechaVencimiento = $_POST['txtFechaVencimiento'];
    $lote = $_POST['txtLote'];
    $id_presentacion = $_POST['cbPresentacion'];
    $id_concentracion = $_POST['cbConcentracion'];

    $fechaIngreso = $_POST['txtFechaIngreso'];
    $stock = $_POST['txtStock'];
  

    //para que funcione el crud para mientras
    $id_user = $_SESSION['id_usuario'];
    

    

    $sql = "UPDATE medicamento SET nombre='$nombre', descripcion='$descripcion', concentracion='$id_concentracion', stock='$stock', id_presentacion='$id_presentacion' WHERE id_medicamento='$id'";
    
    if ($conexion->query($sql) === true) { 
        echo "<script>alert('Registro actualizado exitosamente'); window.history.go(-1);</script>";            
        header("Location: ../vistas/medicamento.php");
        
    } else{
        die("Error algo salio mal: " . $conexion->error);
    }
    $conexion->close();
}





?>