<?php 
include ('conexion.php');
    
    
    //$id = $_REQUEST['id_expediente'];
    $id= $_GET['id'];
    
    $sql1 ="UPDATE ingreso SET estado=0 WHERE id_ingreso='$id'";

    /*
    $sql2=" UPDATE di set di.stock_actual = di.stock_actual + de.cantidad_egresar
    from detalle_ingreso as di inner join
    updated as dv on di.id_detalle_ing = de.id_detalle_ingreso";
    */

   $resultadoEliminar = mysqli_query($conexion,$sql1);

   if ($resultadoEliminar){
   // echo "<script>alert('Registro anulado'); window.history.go(-1);</script>";  
      //header('Location: ../vistas/egresos.php');
   }else{
    die("Error algo salio mal: " . $conexion->error);
    echo "<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";   
   }



   $sqlDetalleIngreso = "SELECT m.id_medicamento, m.nombre as Medicamento, d.stock_inicial, d.num_lote, d.fecha_vencimiento, d.id_detalle_ing
   from detalle_ingreso d inner join medicamento m
   on d.id_medicamento = m.id_medicamento
   where d.id_ingreso ='$id'";

$ejecutarDetalleIngreso = mysqli_query($conexion, $sqlDetalleIngreso);

while($detalleIngreso = mysqli_fetch_array($ejecutarDetalleIngreso)){

   

    //updatear el estado del egreso a 0 también para que se vaya con todo y egreso y detalle de ingreso
    $sqlUpdateEstado ="UPDATE detalle_ingreso SET estado=0 WHERE id_detalle_ing='$detalleIngreso[5]'";
    $resultadoEliminar = mysqli_query($conexion,$sqlUpdateEstado);
 
}





    ?>