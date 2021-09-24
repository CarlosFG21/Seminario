<?php 
include ('conexion.php');
    
    
    //$id = $_REQUEST['id_expediente'];
    $id= $_GET['id'];
    
    $sql1 ="UPDATE egreso SET estado=0 WHERE id_egreso='$id'";

    /*
    $sql2=" UPDATE di set di.stock_actual = di.stock_actual + de.cantidad_egresar
    from detalle_ingreso as di inner join
    updated as dv on di.id_detalle_ing = de.id_detalle_ingreso";
    */

   $resultadoEliminar = mysqli_query($conexion,$sql1);

  
   if ($resultadoEliminar){
    echo "<script>alert('Registro anulado'); window.history.go(-1);</script>";  
      header('Location: ../vistas/egresos.php');
   }else{
    die("Error algo salio mal: " . $conexion->error);
    echo "<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";   
   }

   // header('Location: ../vistas/expediente.php');

    ?>