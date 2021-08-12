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
    <link rel="stylesheet" href="../css/expediente.css">
    
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
                            <h3>Datos personales</h3>

                            
                        </div>

                        <div class="card-body">
                            <br>
                            <form name="" id="" method="POST" action=""> 
                                
                            <label for="marca" id="dpi_1">DPI</label>
                            <label for="marca" id="nombre_1">Nombre</label>
                            <label for="marca" id="apellido_1">Apellido</label>
                                <div class="lasd">
                                <input class="controls" type="number" name="dpi" id="dpi" placeholder="Ingrese su DPI">
                                <input class="controls" type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre">
                                <input class="controls" type="text" name="apellido" id="nombre" placeholder="Ingrese su apellido">
                               </div>
                               <br>
                               <label for="marca" id="fecha_1">Fecha de nacimiento</label>
                               <label for="marca" id="telefono_1">Telefono</label>
                               <label for="marca" id="correo_1">Correo</label>
                               <div class="lasd">
                               <input class="controls2" type="date" name="fecha" id="fecha">
                               <input class="controls" type="tel" name="telefono" id="telefono" placeholder="Ingrese su telefono">
                               <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su correo">
                               </div>
                               <br>
                               <label for="marca" id="departamento_1">Departamento</label>
                               <label for="marca" id="municipio_1">Municipio</label>
                               <label for="marca" id="direccion_1">Dirección</label>
                               <div class="lasd">
                               <select class="controls2" name="select">
                               <option value="value1">Zacapa</option>
                               </select>
                               <select class="controls2" name="select">
                               <option value="value1">San Diego</option>
                               </select>
                               <input class="controls2" type="text" name="direccion" id="direccion" placeholder="Ingrese su direccion">    
                               </div>
                               <br>
                               <label for="marca" id="departamento_1">No. Expediente</label>
                               <div class="lasd">
                               <input class="controls2" type="text" name="expediente" id="extediente" placeholder="Correlativo">
                               </div>
                               <button class="button" id="registrar">Registrar</button>
                               <button class="butto2" name="actualizar" id="actualizar">Actualizar</button>
                               <button class="butto3" id="cancelar">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="recent-grid">
                <div class="projects">
                    <div class="card">
        <div class="card-body">
                            <div class="table-responsive">
<table width="100%">
<thead>
<tr>
<td>ID</td>
<td>Nombre</td>
<td>Apellido</td>
<td>Permiso</td>
<td>Fuenciones</td>
</tr>
</thead>
</tbody>
</table>
    </div>
    </div>
    </div>
    </div>
    </div>
        </div>

    </main>

    </body>

</html>