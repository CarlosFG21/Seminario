<?php 
include ('conexion.php');
    
    //$id = $_REQUEST['id_expediente'];
    $id= $_GET['id'];
    $sql ="UPDATE
    departamento
    INNER JOIN
    municipio
    ON
    municipio.id_departamento = departamento.id_departamento
    SET
    departamento.estado = 0, municipio.estado = 0  WHERE departamento.id_departamento='$id' and departamento.estado=1";
   $resultadoEliminar = mysqli_query($conexion,$sql);


   if ($resultadoEliminar){
    echo "<script>alert('Registro eliminado'); window.history.go(-1);</script>";  
      header('Location: ../vistas/departamento.php');
   }else{
    die("Error algo salio mal: " . $conexion->error);
    echo "<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";   
   }

   // header('Location: ../vistas/expediente.php');

    ?>