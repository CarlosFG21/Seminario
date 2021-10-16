<?php

session_start();
include('conexion.php');
//Para ingresar un medicamento lo que se hace es recorrer una variable $filas que viene de la tabla detalle de ingreso
//esa tabla viene de html que fue enviada desde javascript para realizar esta función
//viene en formato JSON, y la debemos decodificar
//es lo que hace las variables de abajo
//La variable fechaIngresoPHP y cbProveedorPHP las obtenemos de javascript y las mandamos por medio de AJAX 

$filas = json_decode($_POST['valores'], true);
$fechaIngresoPHP = $_POST['fechaIngresoPHP'];
$cbProveedorPHP = $_POST['cbProveedorPHP'];

// var_dump($filas);
// var_dump($fechaIngresoPHP);
// die();
$inserciones = 0; //esta variable solo es para imprimir cuantas inserciones se hicieron en print console

//SE HACE LA VALIDACION PARA SABER SI VAN DETALLES, ESTA VALIDACION ES UN PLUS DE SEGURIDAD

 if (sizeof($filas) == 0){
    //echo '<script language="javascript">alert("Error de autentificacion");window.location.href="ingreso_medicamento_stock.php"</script>';
    //echo "<script>alert('No se puede ingresar sin detalles')</script>"; 
    //echo '<script language="javascript">alert("No se puede ingresar sin detalles");</script>';
 }else{


    //HAGO EL PRIMER INSERT DE INGRESO
$id_user = $_SESSION['id_usuario']; //siempre se obtiene el ID del usuario
//SE HACE PRIMERO EL INSERT DE UN INGRESO, PARA LUEGO OBTENER SU ID Y DESPUES HACER CADA DETALLE DE INGRESO
$sqlIngreso = "INSERT INTO ingreso (fecha_ingreso, id_proveedor, id_usuario) VALUES ('$fechaIngresoPHP', '$cbProveedorPHP', '$id_user')";
 if ($conexion->query($sqlIngreso) === true) {            
   
    echo "Datos insertados...INGRESO NORMAL";
} else{
    die("Error algo salio mal INGRESO: " . $conexion->error);
}


//ENCONTRAMOS EL ID DEL ULTIMO INSERT DE INGRESO PARA LUEGO OCUPARLO EN CADA DETALLE 
$maxId = null;
$sqlMax = "SELECT MAX(id_ingreso) max_id_ingreso FROM ingreso";
$ejecutarMax = mysqli_query($conexion, $sqlMax);
while($row = mysqli_fetch_row($ejecutarMax)){
    $maxId = $row;
    
    break;
}






    //HACEMOS EL FOR PARA INGRESAR CADA DETALLE DE INGRESO CON SU DIFERENTE FILA EN EL ARRAY
    for($i=0; $i < count($filas); $i++){

        //SE RECORRE CADA ELEMENTO DEL ARRAY
       $cantidad_ingreso  = $filas[$i]['cantidad_ingreso'];
       $fecha_vencimiento   = $filas[$i]['fecha_vencimiento'];
       $id_ingreso = $maxId[0];
       $id_medicamento = $filas[$i]['id_medicamento'];
       $num_lote = $filas[$i]['num_lote'];
       
        //SE HACE UN INSERT DE CADA DETALLE
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
   

       
      if ($conexion->query($sql) === true) {            
         // header("Location: ../vistas/expediente.php");
          echo "Datos insertados...";
          $inserciones++;
      } else{
          die("Error algo salio mal DETALLE_INGRESO: " . $conexion->error);
      }
   
   }

  // header("Location: ../vistas/ingresos.php");

   

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