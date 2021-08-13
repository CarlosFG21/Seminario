<?php

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
    $direccion = $_POST['select_direccion'];

    $expediente = $_POST['expediente'];

    //para que funcione el crud para mientras
    $id_user = 1;
    $id_municipio = 1;


        $sql = "INSERT INTO expediente (correlativo_exp, nombre, apellido, fecha_nacimiento, telefono, correo, id_municipio, id_usuario)
         VALUES ('$expediente', '$nombre', '$apellido', '$fecha', '$telefono', '$correo', '$id_municipio', '$id_user')";
        if ($conexion->query($sql) === true) {            
            header("Location: ../vistas/expediente.php");
            echo "Datos insertados...";
        } else{
            die("Error algo salio mal: " . $conexion->error);
        }
        $conexion->close();
    
}



?>