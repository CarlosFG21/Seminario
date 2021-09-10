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
    <link rel="stylesheet" href="../css/proveedor.css">
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
                    <span>Ubicación</span></a>
                </li>
                <li>
                    <a href="puesto_salud.php"><span class="las la-clinic-medical"></span>
                    <span>Puesto de salud</span>
                </a>
                </li>
                <li>
                    <a href="" class="active"><span class="las la-user-md"></span>
                    <span>Proveedor</span>
                </a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard"></span>
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
                <img src="../img/Avatar.png" width="40px" height="40px" alt="">
                <div>
                    <h4>Usuario</h4>
                    <small>Carlos Franco2</small>
                </div>
            </div>
        </header>

        <main>

        <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3>Proveedores</h3>
                    <div class="encabezado">
                    <input type="text" name="" id="" placeholder="Buscar" class="input__text">
                    <a type="submit" href="proveedor_ingresar.php" name="" id="" class="boton">Ingresar nuevo proveedor</a>
                    </div> 
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Nombre</td>
                                    <td>Dirección</td>
                                    <td>Funciones</td>
                                </tr>
                            </thead>
                            <?php 
                            include('../controlador/conexion.php');
                            $sql = "SELECT * FROM proveedor where estado=1";
                            $ejecutar = mysqli_query($conexion,$sql);
                            echo '<tbody>';
                            while($fila = mysqli_fetch_array($ejecutar)){  
                            echo '<td>'.$fila[0].'</td>';
                            echo '<td>'.$fila[1].'</td>';
                            echo '<td>'.$fila[2].'</td>';
                            echo "<td><a href='editarProveedor.php?id=$fila[0]' class='boton-editar'>Editar</a>
                            <a href='../controlador/proceso_eliminarProveedor.php?id=$fila[0]' class='boton-eliminar'>Eliminar</a></td>";
                            
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