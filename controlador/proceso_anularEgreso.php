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
   // echo "<script>alert('Registro anulado'); window.history.go(-1);</script>";  
      //header('Location: ../vistas/egresos.php');
   }else{
    die("Error algo salio mal: " . $conexion->error);
    echo "<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";   
   }



   $sqlDetalleEgreso = "SELECT d.id_detalle_ingreso, m.nombre as Medicamento,
   d.cantidad_egresar, d.id_detalle_eg, di.num_lote, di.fecha_vencimiento
   from detalle_egreso d inner join detalle_ingreso di 
   on d.id_detalle_ingreso = di.id_detalle_ing
   inner join medicamento m 
   on di.id_medicamento = m.id_medicamento
   where d.id_egreso ='$id'";

$ejecutarDetalleEgreso = mysqli_query($conexion, $sqlDetalleEgreso);

while($detalleEgreso = mysqli_fetch_array($ejecutarDetalleEgreso)){

  $cantidadEgreso = $detalleEgreso[2];


  
  //encontrar el stock para sumarlo
  $sqlFindStock = "select stock_actual from detalle_ingreso where id_detalle_ing ='$detalleEgreso[0]'";
  $ejecutarFindStock = mysqli_query($conexion, $sqlFindStock);
  
  while($stock = mysqli_fetch_array($ejecutarFindStock)){


    $sqlUpdateStock ="UPDATE detalle_ingreso SET stock_actual= stock_actual + '$cantidadEgreso' WHERE id_detalle_ing='$detalleEgreso[0]'";
     $resultadoUpdateStock = mysqli_query($conexion,$sqlUpdateStock);

  }

    //updatear el estado del egreso a 0 también para que se vaya con todo y egreso y detalle de egreso
    $sqlUpdateEstado ="UPDATE detalle_egreso SET estado=0 WHERE id_detalle_eg='$detalleEgreso[3]'";
    $resultadoEliminar = mysqli_query($conexion,$sqlUpdateEstado);
 
}





    ?>