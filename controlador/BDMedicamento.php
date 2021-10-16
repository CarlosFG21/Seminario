<?php

session_start();
if (isset($_REQUEST['registrarMedicamento'])) {
    include('conexion.php');
    //SE OBTIENEN TODOS LOS CAMPOS DEL MEDICAMENTO DESDE HTML
    $nombre = $_POST['txtNombre'];
    $descripcion = $_POST['txtDescripcion'];
    
    $id_presentacion = $_POST['cbPresentacion'];
    $id_concentracion = $_POST['cbConcentracion'];


    //para que funcione el crud para mientras
    $id_user = $_SESSION['id_usuario'];

    //SE HACE UNA VERIFICACION SI LOS ELEMENTOS MAS IMPORTANTES EN LOS REQUERIMIENTOS VAN VACIOS
    
    if(strlen($nombre)==0 || strlen($id_presentacion)==0 || strlen($id_concentracion)==0){
       
       echo "<script>alert('Error, campo vacío o stock negativo')</script>"; 

    }else{
        //SI VA TODO BIEN; HACE EL INSERT


        
        $sqlMedicamento = "INSERT INTO medicamento (nombre, descripcion, id_concentracion, stock, id_presentacion, id_usuario)
        VALUES ('$nombre', '$descripcion', '$id_concentracion', '0', '$id_presentacion', '$id_user')";
    
            if ($conexion->query($sqlMedicamento) === true) {            
                header("Location: ../vistas/medicamento.php");
                echo "Datos insertados...";
            } else{
                die("Error algo salio mal: " . $conexion->error);
            }
            $conexion->close();
        



    }

   
}



if (isset($_REQUEST['actualizarMedicamento'])) {

    include('conexion.php');
//se obttienen los datos
    $id = $_REQUEST['txtIdMedicamento'];
    $nombre = $_POST['txtNombre'];
    $descripcion = $_POST['txtDescripcion'];
  //  $fechaVencimiento = $_POST['txtFechaVencimiento'];
   // $lote = $_POST['txtLote'];
    $id_presentacion = $_POST['cbPresentacion'];
    $id_concentracion = $_POST['cbConcentracion'];

   // $fechaIngreso = $_POST['txtFechaIngreso'];
   // $stock = $_POST['txtStock'];
  
    $id_user = $_SESSION['id_usuario'];
    

    //se hace la misma comprobacion de campos requisitos
    if(strlen($nombre)==0 || strlen($id_presentacion)==0 || strlen($id_concentracion)==0){
       
        echo "<script>alert('Debe llenar los campos necesarios')</script>"; 
        //mensaje de si no cumple con las condiciones
 
     }else{
         //de lo contrario ejecuta el SQL
        $sql = "UPDATE medicamento SET nombre='$nombre', descripcion='$descripcion', id_concentracion='$id_concentracion', stock='0', id_presentacion='$id_presentacion' WHERE id_medicamento='$id'";
    
        if ($conexion->query($sql) === true) { 
            echo "<script>alert('Registro actualizado exitosamente'); window.history.go(-1);</script>";            
            header("Location: ../vistas/medicamento.php");
            
        } else{
            die("Error algo salio mal: " . $conexion->error);
        }
        $conexion->close();

     }

   
}





?>