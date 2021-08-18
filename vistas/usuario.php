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
    <link rel="stylesheet" href="../css/usuarios.css">
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
                    <h3>Usuarios</h3>
                    <div class="encabezado">
                    <input type="text" name="" id="" placeholder="Buscar" class="input__text">
                    <a type="submit" href="usuario_ingresar.php" name="" id="" class="boton">Ingresar nuevo usuario</a>
                    </div> 
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </main>

    </body>

</html>