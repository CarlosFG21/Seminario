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
    <link rel="stylesheet" href="../css/municipio_ingreso.css">
    
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
                    <a href="ubicacion.php" class="active"><span class="las la-map"></span>
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
                <h3>Datos del municipio</h3>   
                </div>

            <div class="card-body">
            <br>
            <form name="" id="" method="POST" action=""> 
           <p>
           <label for="">Departamento</label>
           <select class="input__text" name="select">
           <option value="value1">Zacapa</option>
           </select>
           </p>
           <p>
           <label for="">Municipio</label>
           <input type="text" class="input__text" placeholder="Ingrese un departamento">
           </p>     
        <p>
        </p>    
        <p>
        </p>
        <br>
        <div class="btn__group">
				
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
            </form>
            <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Municipio</td>
                                            <td>Funciones</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Buprenor</td>
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
            </div>
            </div>
            </div>
    </main>

    </body>

</html>