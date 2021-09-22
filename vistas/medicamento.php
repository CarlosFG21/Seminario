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
    <link rel="stylesheet" href="../css/medicamento.css">
    <style>
        .boton-editar{
            color: #FFF;
            background-color: blue;
            padding: 5px;
        }

        .boton-eliminar{
            color: #FFF;
            background-color: red;
            padding: 5px;
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
                    <a href="" class="active"><span class="las la-medkit"></span>
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
                    <a href=""><span class="las la-clipboard"></span>
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
                            <h3>Medicamento</h3>
                            <div class="encabezado">
                            <input type="text" name="" id="" placeholder="Buscar" class="input__text">
                            <a type="submit" href="medicamento_ingresar.php" name="" id="" class="boton">Ingresar nuevo medicamento</a>
                            </div> 
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Medicamento</td>
                                            <td>Descripcion</td>
                                            <td>Concentracion</td>
                                            <td>Presentacion</td>
                                        
                                            <td>Funciones</td>
                                        </tr>
                                    </thead>
                                    <?php
        include('../controlador/conexion.php');
        $sql = "SELECT id_medicamento, nombre, descripcion, id_concentracion, id_presentacion FROM medicamento where estado=1";
        $ejecutar = mysqli_query($conexion, $sql);
        echo '<tbody>';
        while($fila = mysqli_fetch_array($ejecutar)){
            echo '<tr>';
            echo '<td>'.$fila[0].'</td>';
            echo '<td>'.$fila[1].'</td>';
            echo '<td>'.$fila[2].'</td>';
            echo '<td>'.$fila[3].'</td>';
            echo '<td>'.$fila[4].'</td>';
           
            echo "<td><a href='editarMedicamento.php?id=$fila[0]' class='boton-editar'>Editar</a>
            <a href='../controlador/proceso_eliminarMedicamento.php?id=$fila[0]' class='boton-eliminar'>Eliminar</a></td>";


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
    </body>

</html>