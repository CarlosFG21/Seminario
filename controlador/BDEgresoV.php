<?php

session_start();
include('conexion.php');
$filas = json_decode($_POST['valores'], true);
$fechaEgresoPHP = $_POST['fechaEgresoPHP'];
$cbPuestoSaludPHP = $_POST['cbPuestoSaludPHP'];

// var_dump($filas);
// var_dump($fechaIngresoPHP);
// die();


 if (count($filas) == 0){
    echo "<script>alert('NO PUEDE DAR EGRESO SIN DETALLES')</script>"; 
    echo "NO SE PUEDE EGRESAR SIN DETALLES";
 }else{


    $inserciones = 0;


//HAGO EL PRIMER INSERT DE INGRESO
$id_user = $_SESSION['id_usuario'];

$sqlIngreso = "INSERT INTO egreso (fecha_egreso, id_expencion_cen, id_usuario) VALUES ('$fechaEgresoPHP', '$cbPuestoSaludPHP', '$id_user')";
 if ($conexion->query($sqlIngreso) === true) {            
    //header("Location: ../vistas/medicamento.php");
    echo "Datos insertados...EGRESO NORMAL";
} else{
    die("Error algo salio mal EGRESO: " . $conexion->error);
}


//ENCONTRAMOS EL ID DEL ULTIMO INSERT
$maxId = null;
$sqlMax = "SELECT MAX(id_egreso) max_id_egreso FROM egreso";
$ejecutarMax = mysqli_query($conexion, $sqlMax);
while($row = mysqli_fetch_row($ejecutarMax)){
    $maxId = $row;
    
    break;
}

    
    for($i=0; $i < count($filas); $i++){

       $cantidad_egreso  = $filas[$i]['cantidad_egreso'];
       $id_egreso = $maxId[0];
       $id_detalle_ingreso = $filas[$i]['id_detalle_ingreso'];
   
       $sql = "INSERT INTO detalle_egreso (
           cantidad_egresar,
           id_egreso,
           id_detalle_ingreso
       ) VALUES (
           '$cantidad_egreso',
           '$id_egreso',
           '$id_detalle_ingreso'
       )";
   
//    var_dump($sql); die();
       
      if ($conexion->query($sql) === true) {            
         // header("Location: ../vistas/expediente.php");
          echo "Datos insertados...";
          $inserciones++;
      } else{
          die("Error algo salio mal DETALLE_EGRESO: " . $conexion->error);
      }
   
   }

   

 }


?>