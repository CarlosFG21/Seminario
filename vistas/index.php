<?php 
	
	session_start();
	$nombre = $_SESSION['nombre'];
    $permiso = $_SESSION['permiso'];
    
    if (isset($_SESSION['nombre'])) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <title>Centro de Salud</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/boton_navegacion.css">
    <style>
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
            <h2><span class="las la-clinic-medical"></span> <span>Centro de Salud</span></h2>
        </div>
       
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

        <main>
            <div class="cards">

                <div class="card-single">
                    <div>
                    <?php
                    include('../controlador/conexion.php');
                    $sql = "SELECT id_usuario FROM usuario  where estado=1";
                    $sql_run = mysqli_query($conexion,$sql);
                    $row = mysqli_num_rows($sql_run);
                    echo '<h1>'.$row.'</h1>';
                    ?>
                        <span>Usuarios</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                    <?php
                    include('../controlador/conexion.php');
                    $sqll = "SELECT id_expediente FROM expediente where estado=1";
                    $sql_runn = mysqli_query($conexion,$sqll);
                    $roww = mysqli_num_rows($sql_runn);
                    echo '<h1>'.$roww.'</h1>';
                    ?>
                        <span>Expedientes</span>
                    </div>
                    <div>
                        <span class="las la-folder-open"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                    <?php
                    include('../controlador/conexion.php');
                    $sqlu = "SELECT * FROM medicamento where estado=1";
                    $sql_runo = mysqli_query($conexion,$sqlu);
                    $rows = mysqli_num_rows($sql_runo);
                    echo '<h1>'.$rows.'</h1>';
                    ?>
                        <span>Medicamentos</span>
                    </div>
                    <div>
                        <span class="las la-medkit"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                    <?php
                    include('../controlador/conexion.php');
                    $sqll = "SELECT id_proveedor FROM proveedor where estado=1";
                    $sql_runn = mysqli_query($conexion,$sqll);
                    $roww = mysqli_num_rows($sql_runn);
                    echo '<h1>'.$roww.'</h1>';
                    ?>
                        <span>Proveedores</span>
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

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tblusuario"width="100%">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Nombre</td>
                                            <td>Lote</td>
                                            <td>Stock</td>
                                            <td>Fecha</td>
                                            <td>Alerta</td>
                                            <td>Función</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        include('../controlador/conexion.php');//Se manda a llamar el archivo conexion en donde se conecta a la base de datos
                                        $sql = "SELECT a.nombre, b.num_lote, b.id_detalle_ing, b.stock_actual,b.fecha_vencimiento FROM medicamento as a INNER JOIN detalle_ingreso as b ON a.id_medicamento = b.id_medicamento WHERE b.estado=1";
                                        $ejecutar = mysqli_query($conexion, $sql);//Se efectua una consulta para mostrar los datos del medicamento
                                       
                                        while($fila = mysqli_fetch_array($ejecutar)){//se utiliza la condicional while para recorrer un array a su vez tambien se imprimen los datos en html
                                        ?>
                                            <tr>
                                            <td><?php echo $fila['id_detalle_ing'] ?></td>
                                            <td><?php echo $fila['nombre'] ?></td>
                                            <td><?php echo $fila['num_lote'] ?></td>
                                            <td><?php echo $fila['stock_actual'] ?></td>
                                            <td><?php echo $fila['fecha_vencimiento'] ?></td>
                                            <td><?php 
                                                     $datetime1 = date_create(date('Y-m-d'));//Se declar una variable para capturar la fecha del sistema    
                                                     $datetime2 = date_create($fila['fecha_vencimiento']);//Se declara otra variable vara capturar la fecha del medicamento  
                                                     $dias= $diff = $datetime1->diff($datetime2);//se declar otra variable para calcular y obtner la diferencia de dias
                                                     $dias = $datetime1->diff($datetime2)->format('%r%a');//Se utiliza una condiciona para agregar un color al medicamento dependiendo los dias que tiene de diferencia con la fecha del sistema
                                                    if($dias <= 0){
                                                        echo '<span class="status red"></span> Vencido';
                                                        
                                                    }      
                                                    elseif ($dias <= 183) {
                                                        echo '<span class="status red"></span> Por vencer';//Se muestra un punto de color rojo
                                                    } elseif ($dias <= 365) {
                                                        echo '<span class="status yellow"></span> Precaución';//Se muestra un punto de color amarillo
                                                    } else{
                                                        echo '<span class="status green"></span> Activo ';//Se muestra un punto de color verde
                                                    }
                                            ?></td>
                                            <td><?php 
                                                     $datetime1 = date_create(date('Y-m-d'));//Se declar una variable para capturar la fecha del sistema    
                                                     $datetime2 = date_create($fila['fecha_vencimiento']);//Se declara otra variable vara capturar la fecha del medicamento  
                                                     $dias= $diff = $datetime1->diff($datetime2);//se declar otra variable para calcular y obtner la diferencia de dias
                                                     $dias = $datetime1->diff($datetime2)->format('%r%a');//Se utiliza una condiciona para agregar un color al medicamento dependiendo los dias que tiene de diferencia con la fecha del sistema
                                                    if($dias <= 0){
                                                        
                                                        echo "<a href='../controlador/proceso_baja.php?id=$fila[id_detalle_ing]' class='boton-eliminar'>Dar de baja </a> ";  
                                                    }      
                                                    
                                            ?></td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
        </main>
        <script src="../js/proceso_baja.js"></script>
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
                    "search": "Buscar ",
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
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>

        </div>

</body>

</html>

<?php
	}else{
		header('Location: login.php');
	}
?>
