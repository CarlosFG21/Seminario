<?php

	include('conexion.php');

	session_start();
	
	//Se realiza un recoleccion de los datos obtenidos de html del login
	$nickname = $_POST['nickname'];
	$contrasena = $_POST['contrasena'];

	//echo json_encode(array('nick' => $nickname, 'clave' => $clave));
	
	//Se efectua un consulta a la base de datos para verificar si el usuario y contraseña son correctos
	//asi como tambien si el usuario esta activo
	$sql = "SELECT * FROM usuario WHERE nickname= '$nickname' and estado=1";
	$resultado = $conexion->query($sql);
	
	//se utiliza la funcion fetch_assoc para devilver un array de la consulta que se realizo
	$fila = $resultado->fetch_assoc();
	//Se utiliza la condicional if para la verificacion si la contraseña y usuario son incorrectos
	if (!$fila) {
        ?><script> alert('Usuario o contraseña invalido'); //Si el usuario es incorrecto se muestra un mensaje de error y se redirije al login de nuevo
		location.href = "../vistas/login.php";</script><?php
    } else {
        if (password_verify($contrasena, $fila['contrasena'])) { //De lo contrario se verififica la contraseña incriptada para su verificacion con la ingresada en html
			$_SESSION['nombre'] = $fila['nombre']." ".$fila['apellido'];//Si usuario y contraseña son correcto 
			$_SESSION['permiso'] = $fila['permiso'];
			$_SESSION['id_usuario'] = $fila['id_usuario'];

			echo "<script> alert('".$_SESSION['permiso']."'); </script>";
			header("Location: ../vistas/index.php");//se redirecciona se deja acceder al sistema a la pagina principal
        } else {
            ?><script> alert('Contraseña invalida');
			location.href = "../vistas/login.php";</script><?php
        }
    }

?>