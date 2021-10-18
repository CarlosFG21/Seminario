<?php 
	
	session_start();
	$nombre = $_SESSION['nombre'];
    $permiso = $_SESSION['permiso'];
    
    if (isset($_SESSION['nombre'])) {

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <script scr="../js/jquery-3.6.0.min.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src = " http://code.jquery.com/jquery-2.1.4.min.js " type=" text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>

    <title>Centro de Salud</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/expediente.css">
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
          
          .boton-reporte{
            text-decoration: none;
            padding: 10px;
            font-weight: 600;
            font-size: 14px;
            color: #ffffff;
            background-color: #1f8fc3;
            border-radius: 6px;
            margin-left: 10px
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

          .boton-regresar{
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
            <h2><span class="las la-clinic-medical"></span> <span>Centro de Salud</span></h2>
        </div>
        
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php" class=""><span class="las la-home"></span>
                    <span>Tablero</span></a>
                </li>
                <li>
                    <a href="" ><span class="las la-folder-open"></span>
                    <span>Expedientes</span></a>
                </li>
                <li>
                    <a href="medicamento.php" class="active"><span class="las la-medkit"></span>
                    <span>Medicamentos</span></a>
                </li>
                <li>
                    <a href="ingresos.php"><span class="las la-prescription-bottle-alt"></span>
                    <span>Ingresos</span>
                </a>
                </li>
                <li>
                    <a href="egresos.php"><span class="la la-prescription-bottle"></span>
                    <span>Egresos</span>
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
                            <h3>Stock de medicamentos</h3>
                            <div class="encabezado">
                            <a href="medicamento.php" class="boton-regresar">Regresar</a>
                            <a type="submit" href="../reportes/reporte_stock_medicamento.php" target="_blank" name="" id="" class="boton-reporte">Reporte</a>
                            </div> 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table  id="tblusuario"  width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID_Med</th>
                                            <th>Medicamento</th>
                                            <th>Concentracion</th>
                                            <th>Cantidad Ingreso</th>
                                            <th>Stock</th>
                                            <th align=left>Cantidad Egreso</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="buscar">
                                    <?php
        include('../controlador/conexion.php');
        $sql = "select m.id_medicamento, m.nombre, c.descripcion,
        sum(di.stock_inicial) as Quantity_Ingreso,
        sum(di.stock_actual) as Quantity_Stock,
        
        (sum(di.stock_inicial)-
        sum(di.stock_actual)) as Quantity_Venta
         
        from medicamento m inner join concentracion c
        on m.id_concentracion = c.id_concentracion
        inner join detalle_ingreso di
        on m.id_medicamento = di.id_medicamento
        inner join ingreso i
        on di.id_ingreso = i.id_ingreso
        where i.estado = 1
        group by m.id_medicamento, m.nombre, c.descripcion";
        $ejecutar = mysqli_query($conexion, $sql);
        
        while($fila = mysqli_fetch_array($ejecutar)){
            

            echo '<tr>';
            echo '<td><p align=center>'.$fila[0].'</p></td>';
            echo '<td><p align=center>'.$fila[1].'</p></td>';
            echo '<td><p align=center>'.$fila[2].'</p></td>';
            echo '<td><p align=center>'.$fila[3].'</p></td>';
            echo '<td><p align=center>'.$fila[4].'</p></td>';
            echo '<td><p align=center>'.$fila[5].'</p></td>';
      
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
    <script>
        $(document).ready(function () {
            $('#tblusuario').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar    ",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                
            });
        })
    </script>
    </body>

</html>
<?php
	}else{
		header('Location: login.php');
	}
?>