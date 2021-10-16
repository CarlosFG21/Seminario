<?php

if (isset($_REQUEST['registrar'])) { //Se utiliza un condicional y la funcion isset para comprobacion de si una variable se encuentra null
    include('conexion.php'); //Se incluye la conexion con la base de datos
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $nickname = $_POST['txtUsuario'];
    $permiso = $_POST['cbPermiso'];
    $contrasena = $_POST['txtContrasena'];//Se hace la verificacion de todas la variables que se reciben del html
    $contrasena_h = password_hash($contrasena, PASSWORD_BCRYPT);//Se utiliza la funcion password_hash para la incripacion de la contraseña

    $sqll="SELECT nickname FROM usuario where nickname='$nickname'";//Se realiza una consulta a la base de datos para verificar si el usuario ya existe
    $sql_runn = mysqli_query($conexion,$sqll);
    $row = mysqli_num_rows($sql_runn);
    
    if($row>0){
 
        ?><script> location.href = "../vistas/usuario_ingresar.php";//En caso de que exista se redirige al formulario ingresar usuario
        alert('Usuario ya registrado');</script><?php

    }else{//De caso contrario si no existe se efectuan las validaciones de no campos vacion y caracteres especiales
    if ($nombre=="" || $apellido=="" || $nickname=="" || $permiso=="" || $contrasena=="" || !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z\s]*$/", $nombre) ||
    !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z\s]*$/", $apellido) || !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z0-9.,_-\s]*$/", $nickname) ||
    !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z0-9.#$,_-\s]*$/", $contrasena)){

        header("Location: ../vistas/usuario_ingresar.php");//Si en caso se encuentra un campo vacion o un caracter especial, se redirige al usuari ingresar

    }else {
        //De caso contrario se efectua un captura de los datos y se realiza una inserccion a la base de datos
        $sql = "INSERT INTO usuario (nombre, apellido, nickname, permiso, contrasena) VALUES ('$nombre', '$apellido', '$nickname', '$permiso', '$contrasena_h')";
        if ($conexion->query($sql) === true) {            
            header("Location: ../vistas/usuario.php");//Al momento de realizar la insercion se redirige a la vista de mostrar usuario
            echo "Datos insertados...";
        } else{
            die("Error algo salio mal: " . $conexion->error);
        }
        $conexion->close();
    }  }
}

if (isset($_REQUEST['cancelar'])) {
    header("Location: ../vistas/usuario.php");
}

if (isset($_REQUEST['actualizar'])) {//Se utiliza un condicional y la funcion isset para comprobacion de si una variable se encuentra null

    include('conexion.php');//Se incluye la conexion con la base de datos

    $id = $_REQUEST['txtId_usuario'];
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $nickname = $_POST['txtUsuario'];
    $permiso = $_POST['cbPermiso'];
    $contrasena = $_POST['txtContrasena'];//Se hace la verificacion de todas la variables que se reciben del html
    $contrasena_h = password_hash($contrasena, PASSWORD_BCRYPT);
    //se efectuan las validaciones de no campos y caracteres especiales
    if ($nombre=="" || $apellido=="" || $nickname=="" || $permiso=="" || $contrasena=="" || !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z\s]*$/", $nombre) ||
    !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z\s]*$/", $apellido) || !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z0-9.,_-\s]*$/", $nickname) ||
    !preg_match("/^(?!-+)[a-zA-Z0-9-ñáéíóú.,\s]+[a-zA-Z0-9.#$,_-\s]*$/", $contrasena)){

        header("Location: ../vistas/usuario_ingresar.php");//Si encaso se ingres un caracter especial o un campo vacion se lansa un mensaje y se redirige de nuevo al ingresar usuario

    }else {
    //Se verifica lasvariables y se realiza el update a la base de datos 
    $sql = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', nickname='$nickname', permiso='$permiso' WHERE id_usuario='$id'";
    
    if ($conexion->query($sql) === true) {            
        header("Location: ../vistas/usuario.php");//Al momento de realizar el update se redirige a la vista de usuario 
        echo "Datos Actualizados...";
    } else{
        die("Error algo salio mal: " . $conexion->error);
    }
    $conexion->close();
}
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


if (isset($_POST['eliminarUsuario'])) {

    include ('conexion.php');
    
    $id = $_REQUEST['id_usuario'];
    $sql ="UPDATE usuario SET estado=0 where id_usuario=" . $id;
    mysqli_query($conexion,$sql);

    echo "<script>alert('Registro eliminado');</script>";
    header('Location: ../vistas/usuario.php');
}


?>