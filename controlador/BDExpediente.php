<?php
session_start();

if (isset($_REQUEST['registrarExpediente'])) {
    include('conexion.php');

    //Aquí están todas las variables que se reciben de HTML
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

    $sqll="SELECT dpi FROM expediente where dpi='$dpi'";//Se realiza una consulta a la base de datos para verificar si el usuario ya existe
    $sql_runn = mysqli_query($conexion,$sqll);
    $row = mysqli_num_rows($sql_runn);

    if($row>0){
 
        ?><script> location.href = "../vistas/expediente_ingresar.php";//En caso de que exista se redirige al formulario ingresar usuario
        alert('DPI ya registrado');</script><?php

    }else{
    
    //Se hace la validacion para saber si el nombre y el apellido van vacios, si es así no guardará
    if(strlen($nombre)==0 || strlen($apellido)==0 ){
        echo "<script>alert('Debe escribir el nombre, apellido y seleccionar un municipio')</script>"; 
     }else{

        //SQL para insertar un nuevo expediente
        $sql = "INSERT INTO expediente (correlativo_exp, dpi, nombre, apellido, fecha_nacimiento, telefono, correo, direccion, id_municipio, id_usuario)
        VALUES ('$expediente', '$dpi', '$nombre', '$apellido', '$fecha', '$telefono', '$correo', '$direccion', '$municipio', '$id_user')";
       if ($conexion->query($sql) === true) {            
           header("Location: ../vistas/expediente.php");
           echo "Datos insertados..."; 
           //Si todo sale bien entonces se insertan los datos y se regresa al menu para ver el nuevo registro
       } else{
           //Se manda un mensaje de que algo salió mal
           die("Error algo salio mal: " . $conexion->error);
       }
       $conexion->close();

     }
    }
       
    
}


if (isset($_REQUEST['actualizarExpediente'])) {
    include('conexion.php');
    //se hace una recoleccion de los datos obtenidos del HTML
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
    
    //se prepara el UPDATE del expediente por el SQL
    $sql = "UPDATE expediente SET correlativo_exp='$expediente', dpi='$dpi', nombre='$nombre', apellido='$apellido', fecha_nacimiento='$fecha', correo='$correo', direccion='$direccion', id_municipio='$municipio', id_usuario='$id_user' WHERE id_expediente='$id'";
    
    if ($conexion->query($sql) === true) { 
        echo "<script>alert('Registro actualizado exitosamente'); window.history.go(-1);</script>";            
        header("Location: ../vistas/expediente.php");
        //Si hubo exito entonces se manda a la ventana de expedientes para ver el registro modificado
        
    } else{
        die("Error algo salio mal: " . $conexion->error);
        //Se muestra un error por el cual no se puede editar el registro
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