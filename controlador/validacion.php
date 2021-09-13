<?php

	include('conexion.php');

	session_start();

	$nickname = $_POST['nickname'];
	$contrasena = $_POST['contrasena'];

	//echo json_encode(array('nick' => $nickname, 'clave' => $clave));

	$sql = "SELECT * FROM usuario WHERE nickname= '$nickname'";
	$resultado = $conexion->query($sql);

	$fila = $resultado->fetch_assoc();
	
	if (!$fila) {
        ?><script> alert('Usuario o contraseña invalido');
		location.href = "../vistas/login.php";</script><?php
    } else {
        if (password_verify($contrasena, $fila['contrasena'])) {
			$_SESSION['nombre'] = $fila['nombre']." ".$fila['apellido'];
			$_SESSION['permiso'] = $fila['permiso'];
			$_SESSION['id_usuario'] = $fila['id_usuario'];

			echo "<script> alert('".$_SESSION['permiso']."'); </script>";
			header("Location: ../vistas/index.php");
        } else {
            ?><script> alert('Contraseña invalida');
			location.href = "../vistas/login.php";</script><?php
        }
    }

?>