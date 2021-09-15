<!DOCTYPE html>
<html lang="en">

<head>
    <script scr="../js/jquery-3.6.0.min.js"></script>
    <script src = " http://code.jquery.com/jquery-2.1.4.min.js " type=" text/javascript"></script>

    <title>Centro de Salud</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/expediente.css">
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
                    <a href="" class="active"><span class="las la-folder-open"></span>
                    <span>Expedientes</span></a>
                </li>
                <li>
                    <a href="medicamento.php"><span class="las la-medkit"></span>
                    <span>Medicamentos</span></a>
                </li>
                <li>
                    <a href="ubicacion.php"><span class="las la-map"></span>
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
                    <a href="reporte.php"><span class="las la-clipboard"></span>
                    <span>Reportes</span></a>
                </li>
                
                <li>
                    <a href="usuario.php"><span class="las la-users"></span>
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

        <!--div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Datos del Examen</strong>
                            </div>
                            <div class="card-body">
                            <label for="marca" id="dpi_1">DPI</label>
                            <input class="controls" type="text" name="dpi" id="dpi" placeholder="Dpi">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div-->

        <main>
        
        <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Expedientes</h3>
                            <div class="encabezado">
                            <input type="text"  id="myInput" onkeyup="todos()" placeholder="Buscar" class="input__text">
                            <a type="submit" href="expediente_ingresar.php" name="" id="" class="boton">Ingresar nuevo expediente</a>
                            </div> 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table  id="myTable"  width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</td>
                                            <th>No. Expediente</td>
                                            <th>Nombres</td>
                                            <th>Apellidos</td>
                                            <th>Fecha nacimiento</td>
                                            <th>Telefono</td>
                                            <th align=left>Funciones</td>
                                        </tr>
                                    </thead>
                                    <tbody class="buscar">
                                    <?php
        include('../controlador/conexion.php');
        $sql = "SELECT * FROM expediente where estado=1";
        $ejecutar = mysqli_query($conexion, $sql);
        
        while($fila = mysqli_fetch_array($ejecutar)){
            echo '<tr>';
            echo '<td><p align=center>'.$fila[0].'</p></td>';
            echo '<td><p align=center>'.$fila[2].'</p></td>';
            echo '<td><p align=center>'.$fila[3].'</p></td>';
            echo '<td><p align=center>'.$fila[4].'</p></td>';
            echo '<td><p align=center>'.$fila[5].'</p></td>';
            echo '<td><p align=center>'.$fila[6].'</p></td>';
            echo "<td><a href='editarExpediente.php?id=$fila[0]' class='boton-editar'>Editar</a>
            <a href='../controlador/proceso_eliminarExpediente.php?id=$fila[0]' class='boton-eliminar'>Eliminar</a></td>";


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

    <script src="../js/proceso_eliminarExpediente.js"></script>
    <script src="../js/buscador_expediente_nombre.js"></script>
    
    
    </body>

</html>