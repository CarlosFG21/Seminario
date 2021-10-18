<?php 
include ('conexion.php');
    
    //$id = $_REQUEST['id_expediente']; Se obtiene el ID del registro que se quiere eliminar
    $id= $_GET['id'];
    $sql ="UPDATE detalle_ingreso SET estado=0 WHERE id_detalle_ing='$id'";//Se realiza la sentencia SQL para poner el estado en O
   $resultadoEliminar = mysqli_query($conexion,$sql);


   if ($resultadoEliminar){//Se utiliza la condicional para verificar si se ejecuto correctamente
    echo "<script>alert('Registro eliminado'); window.history.go(-1);</script>";  
      header('Location: ../vistas/index.php');//Si se ejecuto se redirige a la vista de usuario
   }else{
    die("Error algo salio mal: " . $conexion->error);
    echo "<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";//De los contrario se lansa un mensaje de que no se pudo eliminar   
   }

   // header('Location: ../vistas/expediente.php');

    ?>