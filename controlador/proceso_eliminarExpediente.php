<?php 
include ('conexion.php');
    
    //$id = $_REQUEST['id_expediente'];
    $id= $_GET['id'];
    $sql ="UPDATE expediente SET estado=0 WHERE id_expediente='$id'";
   $resultadoEliminar = mysqli_query($conexion,$sql);


   if ($resultadoEliminar){
    echo "<script>alert('Registro eliminado'); window.history.go(-1);</script>";  
      header('Location: ../vistas/expediente.php');
   }else{
    die("Error algo salio mal: " . $conexion->error);
    echo "<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";   
   }

   // header('Location: ../vistas/expediente.php');

    ?>