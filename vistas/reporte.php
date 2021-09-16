<?php

 session_start();
 $nombre = $_SESSION['nombre'];
    $permiso = $_SESSION['permiso'];
    
    if (isset($_SESSION['nombre'])) {

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
    <link rel="stylesheet" href="../css/reporte.css">
    <link rel="stylesheet" href="../css/boton_navegacion.css">
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
                    <a href="medicamento.php"><span class="las la-medkit"></span>
                    <span>Medicamentos</span></a>
                </li>
                <li>
                    <a href="ubicacion.php" ><span class="las la-map"></span>
                    <span>Ubicación</span>
                </a>
                </li>
                <li>
                    <a href="puesto_salud.php"><span class="las la-clinic-medical"></span>
                    <span>Puesto de salud</span>
                </a>
                </li>
                <li>
                    <a href="proveedor.php"><span class="las la-user-md"></span>
                    <span>Proveedor</span>
                </a>
                </li>
                <li>
                    <a href="" class="active"><span class="las la-clipboard"></span>
                    <span>Reportes</span></a>
                </li>
                
                <li>
                    <a href="usuario.php" ><span class="las la-users"></span>
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
            <img src="../reportes/centro1.jpg" width="50px" height="50px" alt="">
            <div>
            <nav id="menu">
            <ul>
           <li><a href=""><?php echo $nombre;?></a>
           <ul>
            <li><a href=""><?php echo $permiso;?></a></li>
            <li><a href="../controlador/salir.php">Cerrar Sesion</a></li>
            </ul>
            </li>
           </ul>
        </nav> 
                </div>
            </div>
        </header>

        <main>
        <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                <h3>Reportes</h3>   
                </div>

            <div class="card-body">
            <br>
            <form name="" id="" method="POST" action=""> 
           <p>
           <a type="submit" href="../reportes/reporte_expediente.php" class="las la-folder-open  " target="_blank" id="botonr">  Reporte de Expedientes</a> 
           </p>
           <p>
           <a type="submit" href="puesto_ingresar.php" class="las la-medkit  " target="_blank" id="botonr">  Reporte de Medicamentos</a>
           </p>
           <p>
           <a type="submit" href="../reportes/reporte_puesto.php" class="las la-clinic-medical  " target="_blank" id="botonr">  Reporte de Puestos de Salud</a>
           </p>
           <p>
           <a type="submit" href="../reportes/reporte_proveedor.php" class="las la-user-md  " target="_blank" id="botonr">  Reporte de Proveedores</a>
           </p>
           <p>
           <a type="submit" href="../reportes/reporte_usuario.php" class=" las la-users  " target="_blank" id="botonr">  Reporte de Usuarios</a>
           </p>
           <p>
           <a type="submit" href="../reportes/reporte_ubicacion.php" class="las la-map  " target="_blank" id="botonr">  Reporte de Ubicación </a>
           </p>
        <p>
        </p>    
        <p>
        </p>
        <br>
            </form>
            </div>
            </div>
            </div>
            </div>
            </div>
    </main>

    </body>

</html>
<?php
	}else{
		header('Location: login.php');
	}
?>