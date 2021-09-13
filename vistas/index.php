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
                    <a href="" class="active"><span class="las la-home"></span>
                    <span>Tablero</span></a>
                </li>
                <li>
                    <a href="expediente.php"><span class="las la-folder-open"></span>
                    <span>Expedientes</span></a>
                </li>
                <li>
                    <a href="medicamento.php"><span class="las la-medkit"></span>
                    <span>Medicamentos</span>
                </a>
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

        <main>
            <div class="cards">

                <div class="card-single">
                    <div>
                    <?php
                    include('../controlador/conexion.php');
                    $sql = "SELECT id_usuario FROM usuario ORDER BY estado=1";
                    $sql_run = mysqli_query($conexion,$sql);
                    $row = mysqli_num_rows($sql_run);
                    echo '<h1>'.$row.'</h1>';
                    ?>
                        <span>Menejo de usuarios</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                    <?php
                    include('../controlador/conexion.php');
                    $sqll = "SELECT id_expediente FROM expediente ORDER BY estado=1";
                    $sql_runn = mysqli_query($conexion,$sqll);
                    $roww = mysqli_num_rows($sql_runn);
                    echo '<h1>'.$roww.'</h1>';
                    ?>
                        <span>Menejo de expedientes</span>
                    </div>
                    <div>
                        <span class="las la-folder-open"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>25</h1>
                        <span>Manejo de medicamentos</span>
                    </div>
                    <div>
                        <span class="las la-medkit"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                    <?php
                    include('../controlador/conexion.php');
                    $sqll = "SELECT id_proveedor FROM proveedor ORDER BY estado=1";
                    $sql_runn = mysqli_query($conexion,$sqll);
                    $roww = mysqli_num_rows($sql_runn);
                    echo '<h1>'.$roww.'</h1>';
                    ?>
                        <span>Manejo de proveedores</span>
                    </div>
                    <div>
                        <span class="las la-user-md"></span>
                    </div>
                </div>
            </div>
            <!--Tabla-->
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Medicamentos</h3>

                            <button>Ingresar nuevo medicamento <span class="las la-arrow-right">
                            </span></button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Nombre</td>
                                            <td>Descripcion</td>
                                            <td>Estado</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Buprenorfina</td>
                                            <td>Tableta sublingual</td>
                                            <td>
                                                <span class="status green"></span> Bueno
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tramadol</td>
                                            <td>Solución inyectable</td>
                                            <td>
                                                <span class="status red"></span> Vencido
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Oxicodona</td>
                                            <td>Tableta de liberación</td>
                                            <td>
                                                <span class="status yellow"></span> Por Vencer
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Morfina</td>
                                            <td>Tableta o cápsula</td>
                                            <td>
                                                <span class="status green"></span> Bueno
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Hidromorfona</td>
                                            <td>Tableta</td>
                                            <td>
                                                <span class="status red"></span> Vencido
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fentanilo</td>
                                            <td>Parche</td>
                                            <td>
                                                <span class="status yellow"></span> Por Vencer
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Etofenamato</td>
                                            <td>Solución inyectable</td>
                                            <td>
                                                <span class="status yellow"></span> Por Vencer
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dextropropoxifeno </td>
                                            <td>Cápsula o comprimido </td>
                                            <td>
                                                <span class="status green"></span> Bueno
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Clonixinato de lisina</td>
                                            <td>Solución inyectable</td>
                                            <td>
                                                <span class="status red"></span> Vencido
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Capsaicina</td>
                                            <td>Crema</td>
                                            <td>
                                                <span class="status yellow"></span> Por Vencer
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tramadol-paracetamol</td>
                                            <td>Tableta</td>
                                            <td>
                                                <span class="status yellow"></span> Por Vencer
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
        </main>

        </div>

</body>

</html>