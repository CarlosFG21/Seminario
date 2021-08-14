<?php
session_start();
if (isset($_REQUEST['registrarExpediente'])) {
    include('conexion.php');
    $dpi = $_POST['dpi'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $municipio = $_POST['select_municipio'];
    $departamento = $_POST['select_departamento'];
    $direccion = $_POST['direccion'];

    $expediente = $_POST['expediente'];

    //para que funcione el crud para mientras
    $id_user = $_SESSION['id_usuario'];
    $id_municipio = 1;


        $sql = "INSERT INTO expediente (correlativo_exp, nombre, apellido, fecha_nacimiento, telefono, correo, direccion, id_municipio, id_usuario)
         VALUES ('$expediente', '$nombre', '$apellido', '$fecha', '$telefono', '$correo', '$direccion', '$id_municipio', '$id_user')";
        if ($conexion->query($sql) === true) {            
            header("Location: ../vistas/expediente.php");
            echo "Datos insertados...";
        } else{
            die("Error algo salio mal: " . $conexion->error);
        }
        $conexion->close();
    
}


if (isset($_REQUEST['actualizar'])) {

    include('conexion.php');

    $id = $_REQUEST['id_expediente'];
     $dpi = $_POST['dpi'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];
    
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $municipio = $_POST['select_municipio'];
    $departamento = $_POST['select_departamento'];
    $direccion = $_POST['direccion'];

    $expediente = $_POST['correlativo_exp'];

    //para que funcione el crud para mientras
    $id_user = $_SESSION['id_usuario'];
    $id_municipio = 1;

    
    $sql = "UPDATE expediente SET correlativo_exp='$expediente', nombre='$nombre', apellido='$apellido', fecha_nacimiento='$fecha', correo='$correo', direccion='$direccion', id_municipio='$id_municipio', id_usuario='$id_user' WHERE id_expediente='$id'";
    
    if ($conexion->query($sql) === true) {            
        header("Location: ../vistas/expediente.php");
        echo "Datos Actualizados...";
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