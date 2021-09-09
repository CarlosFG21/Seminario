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
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/expediente_ingreso.css">
    
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
                    <a href="" class=""><span class="las la-folder-open"></span>
                    <span>Expedientes</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-medkit"></span>
                    <span>Medicamentos</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-map"></span>
                    <span>Ubicación</span>
                </a>
                </li>
                <li>
                    <a href=""><span class="las la-clinic-medical"></span>
                    <span>Puesto de salud</span>
                </a>
                </li>
                <li>
                    <a href=""><span class="las la-user-md"></span>
                    <span>Proveedor</span>
                </a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard"></span>
                    <span>Reportes</span></a>
                </li>
                
                <li>
                    <a href="usuario.php" class="active"><span class="las la-users"></span>
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
                    <h4>Usuario</h4>
                    <small>Carlos Franco</small>
                </div>
            </div>
        </header>

        <main>
        <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                <h3>Datos del usuario</h3>   
                </div>

            <div class="card-body">
            <br>
            <form name="" id="" method="POST" action="../controlador/BDUsuario.php"> 
           <p>
           <label for="">Nombre</label>
           <input name="txtNombre" type="text" class="input__text" placeholder="Ingresa su nombre" value="<?= $usuario[1] ?>">
           </p>
           <p>
           <label for="">Apellido</label>
           <input name="txtApellido" type="text" class="input__text" placeholder="Ingreso su apellido" value="<?= $usuario[2] ?>">
           </p>
           <p>
           <label for="">Usuario</label>
           <input name="txtUsuario" type="text" class="input__text" placeholder="Ingreso un usuario" value="<?= $usuario[3] ?>">
           </p>
           <p>
           <label for="">Permiso</label>
           <select name="cbPermiso" class="input__text" >
          <option value="Administrador">Administrador</option>
          <option value="Usuario">Usuario</option>
          </select>
           </p>
           <p>
           <label for="">Contraseña</label>
           <input name="txtContrasena" type="password" class="input__text" placeholder="Ingrese su contraseña" value="<?= $usuario[5] ?>">
           </p>
        <p>
        </p>    
        <p>
        </p>
        <br>
        <div class="btn__group">

        <input type="hidden" name="txtId_usuario" value="<?= $usuario[0] ?>">
				<a href="usuario.php" class="btn btn__danger">Regresar</a>
				<input type="submit" name="actualizar" value="Editar" class="btn btn__primary">
			</div>
            </form>
            </div>
            </div>
            </div>
            </div>
            </div>
    </main>

    </body>

</html>