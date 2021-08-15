<?php
    include('../controlador/conexion.php');
    $expediente = null;
    $sql = "SELECT * FROM usuario where id_usuario = " . $_GET['id'];
    $ejecutar = mysqli_query($conexion, $sql);
    while($fila = mysqli_fetch_row($ejecutar)){
        $usuario = $fila;
        break;
    }

    if ( $usuario == null){
        header('Location: usuario.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Centro de Salud</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/index_1.css">
    <link rel="stylesheet" href="../css/usuario.css">
    
</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="las la-clinic-medical"></span> <span>Centro de Salud San Diego</span></h2>
        </div>
        <br>
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php" class=""><span class="las la-home"></span>
                    <span>Tablero</span></a>
                </li>
                <li>
                    <a href="expediente.php" class=""><span class="las la-folder-open"></span>
                    <span>Expedientes</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-medkit"></span>
                    <span>Medicamentos</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard"></span>
                    <span>Reportes</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-search"></span>
                    <span>Busqueda de expedientes</span></a>
                </li>
                <li>
                    <a href="" class="active"><span class="las la-users"></span>
                    <span>Usuarios</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label> Tablero
            </h2>

            <div class="user-wrapper">
                <img src="../img/Avatar.png" width="40px" height="40px" alt="">
                <div>
                    <h4>Administrador</h4>
                    <small>Carlos Franco</small>
                </div>
            </div>
        </header>

        <main>

        <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Datos personales</h3>
                        </div>

                        <div class="card-body">
                            <br>
                            <form name="formusuario" id="formusuario" method="POST" action="../controlador/BDUsuario.php"> 
                            <div class="plas">
                            <label for="marca" id="nombre_1">Nombre</label>
                            <label for="marca" id="apellido_1">Apellido</label>
                            <label for="marca" id="nickname_1">Usuario</label>
                            </div>
                                <div class="lasd">
                                <input class="controls" type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre" value="<?= $usuario[1] ?>">
                                <input class="controls" type="text" name="apellido" id="apellido" placeholder="Ingrese su apellido" value="<?= $usuario[2] ?>">
                                <input class="controls" type="text" name="nickname" id="nickname" placeholder="Ingrese un usuario" value="<?= $usuario[3] ?>">
                               </div>
                               <br>
                               <div class="plas">
                               <label for="marca" id="permiso_1">Permiso</label>
                               <label for="marca" id="contrasena_1">Contraseña</label>
                               <div class="lasd">
                               <select class="controls2" name="permiso" id="permiso">
                               <option value="administrador">Administrado</option>
                               <option value="usuario">Usuario</option>
                               </select>
                               
                             
                               <input class="controls" type="paswword" name="contrasena" id="contrasena" placeholder="Ingrese su contraseña" value="<?= $contrasena_h = password_hash($usuario[5], PASSWORD_BCRYPT); ?>">
                               </div>
                               <br>
                               <input type="hidden" name="id_usuario" value="<?= $usuario[0] ?>">
                               <button class="butto1" name="actualizar" id="actualizar" >Actualizar</button>
                               <button class="butto3" name="cancelar" id="cancelar">Cancelar</button>
                               <button class="butto3" name="eliminarUsuario" id="eliminarUsuario">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
                       
        
    </main>

    <script>

        function Buscar_usuario(dni){
            var dpi = dni;
            let button2 = document.querySelector(".btn");
            //let inp = document.querySelector(".in");
            $.ajax({
				type:"POST",
				url:"../controlador/BDUsuario.php",
				dataType: "json",
				data:{ buscaru:"buscaru", id:dpi},
                success:function(data){

                    if (data.result == 1) {
                        document.formusuario.id.value = dpi;
                        document.formusuario.nombre.value = data.nombre;
                        document.formusuario.apellido.value = data.apellido;
                        document.formusuario.nickname.value = data.nickname;
                        document.formusuario.permiso.value = data.permiso;
                        document.formusuario.contrasena.value = data.contrasena;
                        
                        btnactualizar.disabled = false;
                    }else{
                        alert(data.mensaje);
                    }
				},
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
			});
    		return false;
    	}

        function Eliminar(id){
            var id_u = id;
            let button2 = document.querySelector(".btn");
            //let inp = document.querySelector(".in");
            $.ajax({
				type:"POST",
				url:"../controlador/BDUsuario.php",
				data:{ eliminaru:"eliminaru", id:id_u},
                success: function(r){
                    console.log(dpip, nombrep, apellidop, direccionp, fechanacimientop, generop, telefonop, correop, medicop, sumatotal, ides);
                    alert("Usuario eliminado");
                    location.href = "vistas/usuario.php";
                },
                error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
                }
			});
    		return false;
    	}
    </script>

    </body>

</html>