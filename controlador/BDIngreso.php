<?php

session_start();
include('conexion.php');
$filas = json_decode($_POST['valores'], true);
$fechaIngresoPHP = $_POST['fechaIngresoPHP'];
$cbProveedorPHP = $_POST['cbProveedorPHP'];

// var_dump($filas);
// var_dump($fechaIngresoPHP);
// die();
$inserciones = 0;


//HAGO EL PRIMER INSERT DE INGRESO
$id_user = $_SESSION['id_usuario'];

$sqlIngreso = "INSERT INTO ingreso (fecha_ingreso, id_proveedor, id_usuario) VALUES ('$fechaIngresoPHP', '$cbProveedorPHP', '$id_user')";
 if ($conexion->query($sqlIngreso) === true) {            
    //header("Location: ../vistas/medicamento.php");
    echo "Datos insertados...INGRESO NORMAL";
} else{
    die("Error algo salio mal INGRESO: " . $conexion->error);
}


//ENCONTRAMOS EL ID DEL ULTIMO INSERT
$maxId = null;
$sqlMax = "SELECT MAX(id_ingreso) max_id_ingreso FROM ingreso";
$ejecutarMax = mysqli_query($conexion, $sqlMax);
while($row = mysqli_fetch_row($ejecutarMax)){
    $maxId = $row;
    
    break;
}

 if (count($filas) == 0){
    echo "NO PUEDE INGRESAR SIN DETALLES";
 }else{

    
    for($i=0; $i < count($filas); $i++){

       $cantidad_ingreso  = $filas[$i]['cantidad_ingreso'];
       $fecha_vencimiento   = $filas[$i]['fecha_vencimiento'];
       $id_ingreso = $maxId[0];
       $id_medicamento = $filas[$i]['id_medicamento'];
       $num_lote = $filas[$i]['num_lote'];
   
       $sql = "INSERT INTO detalle_ingreso (
           cantidad_ingreso,
           fecha_vencimiento,
           id_ingreso,
           id_medicamento,
           num_lote,
           stock_inicial,
           stock_actual
       ) VALUES (
           '$cantidad_ingreso',
           '$fecha_vencimiento',
           '$id_ingreso',
           '$id_medicamento',
           '$num_lote',
           '$cantidad_ingreso',
           '$cantidad_ingreso'
       )";
   
//    var_dump($sql); die();
       
      if ($conexion->query($sql) === true) {            
         // header("Location: ../vistas/expediente.php");
          echo "Datos insertados...";
          $inserciones++;
      } else{
          die("Error algo salio mal DETALLE_INGRESO: " . $conexion->error);
      }
   
   }

   

 }




foreach ($filas as $fila) {
 
   //echo $fila['cantidad_ingreso'];
    //echo $fila['fecha_vencimiento'];
    //echo $fila['id_medicamento'];
    //echo $fila['num_lote'];
/*
    $cantidad_ingreso  = $fila['cantidad_ingreso'];
    $fecha_vencimiento   = $fila['fecha_vencimiento'];
    $id_ingreso = 1;
    $id_medicamento = $fila['id_medicamento'];
    $num_lote = $fila['num_lote'];

    $sql = "INSERT INTO detalle_ingreso (
        cantidad_ingreso,
        fecha_vencimiento,
        id_ingreso,
        id_medicamento,
        num_lote
    ) VALUES (
        $cantidad_ingreso,
        $fecha_vencimiento,
        '1',
        $id_medicamento,
        $num_lote
    )";

    
   if ($conexion->query($sql) === true) {            
      // header("Location: ../vistas/expediente.php");
       echo "Datos insertados...";
       $inserciones++;
   } else{
       die("Error algo salio mal: " . $conexion->error);
   }

*/
}

echo "Se insertaron $inserciones registros";

print_r($filas);




















if (isset($_POST['saveTransaction'])) {
   print_r($_POST['saveTransaction']);


    include('conexion.php');


    $fecha_ingreso = $_POST['fecha_ingresoK'];
    $id_proveedor = $_POST['id_proveedorK'];
    $nombre_proveedor= $_POST['nombre_proveedorK'];
    $id_medicamento = $_POST['id_medicamentoK'];
    $nombre_medicamento = $_POST['nombre_medicamentoK'];
    $fecha_vencimiento = $_POST['fecha_vencimientoK'];
    $num_lote = $_POST['num_loteK'];
    $cantidad_ingreso = $_POST['cantidad_ingresoK'];


   
    $sql = "INSERT INTO detalle_ingreso(cantidad_ingreso, fecha_vencimiento, id_ingreso, id_medicamento, num_lote) VALUES ";
    //se peude cualquier id
        for ($i=0; $i < count($id_medicamento); $i++) { 
            $sql.="('".$cantidad_ingreso[$i]."', '".$fecha_vencimiento[$i]."', '1', '".$id_medicamento[$i]."', '".$num_lote[$i]."'),";
        }
    
        $sql_ejcutar = substr($sql, 0, -1);
        $sql_ejcutar.=";";
    
        if($conexion->query($sql_ejcutar)):
            echo "<script> alert('Registro exitoso'); </script>";
           // header("Location: ../pantallas/nuevo-estudio.php");
            //echo json_encode(array('error' => false));
        else:
            echo json_encode(array('error' => true));
        endif;
    
        $conexion->close();

}
 
  


?>