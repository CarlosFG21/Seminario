<?php

if (isset($_REQUEST['registrar'])) {
    include('conexion.php');
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nickname = $_POST['nickname'];
    $permiso = $_POST['permiso'];
    $contrasena = $_POST['contrasena'];
    $contrasena_h = password_hash($contrasena, PASSWORD_BCRYPT);
    if (isset($_POST['nombre']) && isset($_POST['apellido'])) {

        $sql = "INSERT INTO usuario (nombre, apellido, nickname, permiso, contrasena) VALUES ('$nombre', '$apellido', '$nickname', '$permiso', '$contrasena_h')";
        if ($conexion->query($sql) === true) {            
            header("Location: ../vistas/usuario.php");
            echo "Datos insertados...";
        } else{
            die("Error algo salio mal: " . $conexion->error);
        }
        $conexion->close();
    }  
}

if (isset($_REQUEST['cancelar'])) {
    header("Location: ../vistas/usuario.php");
}

if (isset($_REQUEST['actualizar'])) {

    include('conexion.php');

    $id = $_REQUEST['id_usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nickname = $_POST['nickname'];
    $permiso = $_POST['permiso'];
    $contrasena = $_POST['contrasena'];
    $contrasena_h = password_hash($contrasena, PASSWORD_BCRYPT);

    $sql = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', nickname='$nickname', permiso='$permiso', contrasena='$contrasena_h' WHERE id_usuario='$id'";
    
    if ($conexion->query($sql) === true) {            
        header("Location: ../vistas/usuario.php");
        echo "Datos Actualizados...";
    } else{
        die("Error algo salio mal: " . $conexion->error);
    }
    $conexion->close();
}


//para buscar el usuario
if (isset($_POST['buscaru'])) {
    session_start();
    //aca instacionamos las clases de coneccion a la bd y las clases de areas 
    if (isset($_SESSION['nombre'])) {
        require_once('conexion.php');//bd

        $id = $_POST['id'];//obtenemos el cod por POST enviado desde ajax

        $inf = callJson($conexion,$id);/*aca hacemos uso de la funcion llamar al usuario de 
        la bd que esta en las clases*/

        header("Content-Type: text/json; charset=utf-8;");/* aca decimos que se enviara algo por json*/ 
        echo $inf;//y aca imprimos los que nos arrojo la bd
        exit();
    }else{
        include_once($ru0.'403.shtml');
    }
}

function callJson($c1,$id){
    $inf=null;   // creo q esta diciendo q Precio no lo encuentra por que
    $sql = "SELECT id_usuario, nombre, apellido, nickname, permiso from usuario WHERE estado=1 AND id_usuario=".$id.";";
    $res = mysqli_query($c1,$sql) OR $_SESSION['Mysqli_Error'] = (mysqli_error($c1));
    $inf = '{';
        if ($res) {
            if ($res->num_rows > 0) {
                
                while ($row = mysqli_fetch_array($res)) {

                    $inf .= '"result": 1,';
                    $inf .= '"mensaje": "registro encontrado",';
                    $inf .= '"nombre": "'.$row['nombre'].'",';
                    $inf .= '"apellido": "'.$row['apellido'].'",';
                    $inf .= '"nickname": "'.$row['nickname'].'",';
                    $inf .= '"permiso": "'.$row['permiso'].'"';
                }
                mysqli_free_result($res);//liberar memoria del resultado
            }else{
                $inf .= '"result": 2,';
                $inf .= '"mensaje": "registo no enonctrado",';
                $inf .= '"id_usuario": "",';
                $inf .= '"nombre": "",';
                $inf .= '"apellido": "",';
                $inf .= '"nickname": "",';
                $inf .= '"permiso": ""';
            }
        }else{
            $inf .= '"result": 3,';
            //$inf .= '"mensaje": "erro: '.$_SESSION['Mysqli_Error'].'",';
            $inf .= '"mensaje": "Ingrese un DPI ",';
            $inf .= '"id_usuario": "",';
            $inf .= '"nombre": "",';
            $inf .= '"apellido": "",';
            $inf .= '"nickname": "",';
            $inf .= '"permiso": ""';
        }
    $inf .= '}';

    mysqli_close($c1);
    return $inf;
}


if (isset($_POST['eliminaru'])) {

    include ('conexion.php');
    
    $id = $_REQUEST['id'];
    $sql ="delete from usuario where id_usuario=" . $id;
    mysqli_query($conexion,$sql);

    echo "<script>alert('Registro eliminado');</script>";
    header('Location: ../vistas/usuario.php');
}

?>