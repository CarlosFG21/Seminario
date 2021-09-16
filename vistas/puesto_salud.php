<?php 
	
	session_start();
	$nombre = $_SESSION['nombre'];
    $permiso = $_SESSION['permiso'];
    
    if (isset($_SESSION['nombre'])) {

?>
<!DOCTYPE html>
<html lang="en">

<head>
<script scr="../js/jquery-3.6.0.min.js"></script>

    <title>Centro de Salud</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/puesto_salud.css">
    <link rel="stylesheet" href="../css/boton_navegacion.css">
    <style>
        .boton-editar{
            text-decoration: none;
            padding: 10px;
            font-weight: 600;
            font-size: 14px;
            color: #ffffff;
            background-color: rgb(3, 113, 163);
            border-radius: 6px;
          }
          

          .boton-eliminar{
            text-decoration: none;
            padding: 10px;
            font-weight: 600;
            font-size: 14px;
            color: #ffffff;
            background-color: #ff0000;
            border-radius: 6px;
            
          }
          
    </style>
    
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
                    <a href="" class="active"><span class="las la-clinic-medical"></span>
                    <span>Puesto de salud</span>
                </a>
                </li>
                <li>
                    <a href="proveedor.php"><span class="las la-user-md"></span>
                    <span>Proveedor</span>
                </a>
                </li>
                <li>
                    <a href="reporte.php"><span class="las la-clipboard"></span>
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
                    <h3>Puesto de salud</h3>
                    <div class="encabezado">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar" class="input__text">
                    <a type="submit" href="puesto_ingresar.php" name="" id="" class="boton">Ingresar nuevo puesto de salud</a>
                    </div> 
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" width="100%">
                            <thead>
                                <tr class="header">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th align=left>Funciones</th>
                                </tr>
                            </thead>
                            <tbody class="buscartabla">
                           <?php
                           include('../controlador/conexion.php');
                           $sql = "SELECT * FROM extencion_centro where estado=1";
                           $ejecutar = mysqli_query($conexion,$sql);
                           
                           while($fila=mysqli_fetch_array($ejecutar)){
                               echo '<tr>';
                               echo '<td><p align=center>'.$fila[0].'</p></td>';
                               echo '<td><p align=center>'.$fila[1].'</p></td>';
                               echo '<td><p align=center>'.$fila[2].'</p></td>';
                               echo "<td><a href='editarPuesto.php?id=$fila[0]' class='boton-editar'>Editar</a>
                               <a href='../controlador/proceso_eliminarPuesto.php?id=$fila[0]' class='boton-eliminar'>Eliminar</a></td>";

                               echo '</tr>';

                           }
                           ?>   
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <script src="../js/proceso_eliminar.js"></script>
    <script src="../js/buscador.js"></script>
    </body>

</html>
<?php
	}else{
		header('Location: login.php');
	}
?>