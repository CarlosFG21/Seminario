<?php
session_start();
if (isset($_REQUEST['registrarExpediente'])) {
    include('conexion.php');
    $dpi = $_POST['txtDpi'];
    $nombre = $_POST['txtNombres'];
    $apellido = $_POST['txtApellidos'];
    $fecha = $_POST['txtFecha'];
    $telefono = $_POST['txtTelefono'];
    $correo = $_POST['txtEmail'];

    $municipio = $_POST['cbMunicipio'];
    $departamento = $_POST['cbDepartamento'];
    $direccion = $_POST['txtDireccion'];

    $expediente = $_POST['txtExpediente'];

    //para que funcione el crud para mientras
    $id_user = $_SESSION['id_usuario'];
    

    if(strlen($nombre)==0 || strlen($apellido)==0 ){
        echo "<script>alert('Debe escribir el nombre, apellido y seleccionar un municipio')</script>"; 
     }else{

        $sql = "INSERT INTO expediente (correlativo_exp, dpi, nombre, apellido, fecha_nacimiento, telefono, correo, direccion, id_municipio, id_usuario)
        VALUES ('$expediente', '$dpi', '$nombre', '$apellido', '$fecha', '$telefono', '$correo', '$direccion', '$municipio', '$id_user')";
       if ($conexion->query($sql) === true) {            
           header("Location: ../vistas/expediente.php");
           echo "Datos insertados...";
       } else{
           die("Error algo salio mal: " . $conexion->error);
       }
       $conexion->close();

     }

       
    
}


if (isset($_REQUEST['actualizarExpediente'])) {

    include('conexion.php');

    $id = $_REQUEST['txtIdExpediente'];
     $dpi = $_POST['txtDpi'];
    $nombre = $_POST['txtNombres'];
    $apellido = $_POST['txtApellidos'];
    $fecha = $_POST['txtFecha'];
    
    $telefono = $_POST['txtTelefono'];
    $correo = $_POST['txtEmail'];

    $municipio = $_POST['cbMunicipio'];
   // $departamento = $_POST['cbDepartamento'];
    $direccion = $_POST['txtDireccion'];

    $expediente = $_POST['txtCorrelativo'];

    //para que funcione el crud para mientras
    $id_user = $_SESSION['id_usuario'];
    

    $sql = "UPDATE expediente SET correlativo_exp='$expediente', dpi='$dpi', nombre='$nombre', apellido='$apellido', fecha_nacimiento='$fecha', correo='$correo', direccion='$direccion', id_municipio='$municipio', id_usuario='$id_user' WHERE id_expediente='$id'";
    
    if ($conexion->query($sql) === true) { 
        echo "<script>alert('Registro actualizado exitosamente'); window.history.go(-1);</script>";            
        header("Location: ../vistas/expediente.php");
        
    } else{
        die("Error algo salio mal: " . $conexion->error);
    }
    $conexion->close();
}


if (isset($_REQUEST['cancelarEditar'])) {
    header('Location: ../vistas/expediente.php');
}



if (isset($_POST['eliminarExpediente'])) {

    include ('conexion.php');
    
    $id = $_REQUEST['id_expediente'];
    $sql ="UPDATE expediente SET estado=0 where id_expediente=" . $id;
    mysqli_query($conexion,$sql);

    echo "<script>alert('Registro eliminado');</script>";
    header('Location: ../vistas/expediente.php');
}







?>