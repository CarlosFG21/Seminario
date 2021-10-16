<?php 
include ('conexion.php');
    
    //$id = $_REQUEST['id_expediente'];
    //Primero se obtiene el ID del registro a eliminar
    $id= $_GET['id'];
    //Se hace la sentencia SQL en donde se coloca estado 0 el id del expediente seleccionado
    $sql ="UPDATE expediente SET estado=0 WHERE id_expediente='$id'";
   $resultadoEliminar = mysqli_query($conexion,$sql); //se ejecuta la instrucción


   if ($resultadoEliminar){
    echo "<script>alert('Registro eliminado'); window.history.go(-1);</script>";  
      header('Location: ../vistas/expediente.php');
      //Si se ejecutó correctamente vuelve de nuevo al mostrar registros
   }else{
    die("Error algo salio mal: " . $conexion->error);
    echo "<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";   
    //De lo contrario muestra un mensaje de error
   }

   // header('Location: ../vistas/expediente.php');

    ?>