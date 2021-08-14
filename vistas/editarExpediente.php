<?php
    include('../controlador/conexion.php');
    $expediente = null;
    $sql = "SELECT * FROM expediente where id_expediente = " . $_GET['id'];
    $ejecutar = mysqli_query($conexion, $sql);
    while($fila = mysqli_fetch_row($ejecutar)){
        $expediente = $fila;
        break;
    }

    if ( $expediente == null){
        header('Location: expediente.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Centro de Salud</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Editar expediente</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/index_1.css">
    <link rel="stylesheet" href="../css/expediente.css">
    <style>
       
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
                    <a href="expediente.php" class="active"><span class="las la-folder-open"></span>
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
                            <form name="formExpediente" id="" method="POST" action="../controlador/BDExpediente.php"> 
                                
                            <label for="marca" id="dpi_1">DPI</label>
                            <label for="marca" id="nombre_1">Nombre</label>
                            <label for="marca" id="apellido_1">Apellido</label>
                                <div class="lasd">

                                <input class="controls" type="number" name="dpi" id="dpi" placeholder="Ingrese su DPI" value="<?= $expediente[1] ?>">
                                <input class="controls" type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre" value="<?= $expediente[2] ?>">
                                <input class="controls" type="text" name="apellido" id="apellido" placeholder="Ingrese su apellido"  value="<?= $expediente[3] ?>">
                               </div>
                               <br>
                               <label for="marca" id="fecha_1">Fecha de nacimiento</label>
                               <label for="marca" id="telefono_1">Telefono</label>
                               <label for="marca" id="correo_1">Correo</label>
                               <div class="lasd">
                               <input class="controls2" type="date" name="fecha" id="fecha" value = "<?= $expediente[4]?>">
                               <input class="controls" type="tel" name="telefono" id="telefono" placeholder="Ingrese su telefono"  value = "<?= $expediente[5]?>">
                               <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su correo" value = "<?= $expediente[6]?>">
                               </div>
                               <br>
                               <label for="marca" id="departamento_1">Departamento</label>
                               <label for="marca" id="municipio_1">Municipio</label>
                               <label for="marca" id="direccion_1">Dirección</label>
                               <div class="lasd">
                               <select class="controls2" name="select_departamento">
                               <option value="value1">Zacapa</option>
                               </select>
                               <select class="controls2" name="select_municipio">
                               <option value="value1">San Diego</option>
                               </select>
                               <input class="controls2" type="text" name="direccion" id="direccion" placeholder="Ingrese su direccion" value = "<?= $expediente[7]?>">    
                               </div>
                               <br>
                               <label for="marca" id="departamento_1">No. Expediente</label>
                               <div class="lasd">
                               <input class="controls2" type="text" name="correlativo_exp" id="extediente" placeholder="Correlativo" value="<?= $expediente[1] ?>">
                               </div>
                               <input type="hidden" name="id_expediente" value="<?= $expediente[0] ?>">
                               <button class="butto2" name="actualizar" id="actualizar">Actualizar</button>
                               <a class="butto3" href="expediente.php" name="" id="">Cancelar</a>
                               <button class="butto3" name="eliminarExpediente" id="eliminarExpediente">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </main>
    </body>
</html>