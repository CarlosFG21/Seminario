<?php 
include ('conexion.php');
    
    //$id = $_REQUEST['id_expediente'];
    $id= $_GET['id'];
    $sql ="UPDATE detalle_ingreso SET estado=0 WHERE fecha_vencimiento='$id'";
   $resultadoEliminar = mysqli_query($conexion,$sql);


   if ($resultadoEliminar){
    echo "<script>alert('Medicamento dado de baja'); window.history.go(-1);</script>";  
      header('Location: ../vistas/index.php');
   }else{
    die("Error algo salio mal: " . $conexion->error);
    echo "<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";   
   }

   // header('Location: ../vistas/expediente.php');

    ?>