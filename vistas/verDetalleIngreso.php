<?php 
	
	session_start();
	$nombre = $_SESSION['nombre'];
    $permiso = $_SESSION['permiso'];
    
    if (isset($_SESSION['nombre'])) {

?>
<?php
    include('../controlador/conexion.php');
    $ingreso = null;
    $sql = "SELECT i.id_ingreso, (concat_ws(' ', u.nombre, u.apellido)) as Usuario, p.nombre_proveedor as Proveedor, i.fecha_ingreso, i.estado
    from detalle_ingreso d inner join ingreso i
    on d.id_ingreso = i.id_ingreso
    inner join proveedor p 
    on i.id_proveedor = p.id_proveedor
    inner join usuario u
    on i.id_usuario = u.id_usuario
    
    group by i.id_ingreso, (concat_ws(' ', u.nombre, u.apellido)), p.nombre_proveedor, i.fecha_ingreso, i.estado
    HAVING i.id_ingreso = " . $_GET['id'];
    $ejecutar = mysqli_query($conexion, $sql);
    while($fila = mysqli_fetch_row($ejecutar)){
        $ingreso = $fila;
        break;
    }

    if ( $ingreso == null){
        header('Location: ingresos.php');
    }
?>




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
    <link rel="stylesheet" href="../css/expediente_ingreso.css">
    <link rel="stylesheet" href="../css/boton_navegacion.css">
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
                    <a href=""><span class="las la-map"></span>
                    <span>Ubicación</span>
                </a>
                </li>
                <li>
                    <a href=""><span class="las la-clinic-medical"></span>
                    <span>Puesto de salud</span>
                </a>
                </li>
                <li>
                    <a href=""><span class="las la-user-md"></span>
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
        <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                <h3>Detalle de ingreso</h3>   
                </div>

            <div class="card-body">
            <br>
            <form name="" id="" method="POST" action=""> 
            <p>
            <label for="">Id_ingreso</label>
            <input name="txIdIngreso" value="<?= $ingreso[0] ?>" type="number" class="input__text" placeholder="Ingrese su dpi" required readonly>
            </p>
           <p>
           <label for="">Usuario</label>
           <input name="txtUsuario" value="<?= $ingreso[1] ?>" type="text" class="input__text" placeholder="Ingresa su nombre" required readonly>
           </p>
           <p>
           <label for="">Proveedor</label>
           <input name="txtProveedor" value="<?= $ingreso[2] ?>" type="text" class="input__text" placeholder="Ingreso su apellido" required readonly>
           </p>
        <p>
          <label for="">Fecha de ingreso</label>
          <input name="txtFechaIngreso" value="<?= $ingreso[3] ?>" type="text" class="input__text" required readonly>
        </p>
       
       
       
        <p>
        </p>    
        <p>
        </p>
        <br>

        <input type="hidden" name="txtIdIng" value="<?= $ingreso[0] ?>">
        <div class="btn__group">
				<a href="egresos.php" class="btn btn__danger">Regresar</a>
				<input type="submit" name="Reporte" value="Reporte" class="btn btn__primary">
			</div>




            <div class="card-body">
                            <div class="table-responsive">
                                <table id="transactionTable" width="100%"  name="tabla_detalles">
                                    <thead>
                                        <tr>
                                           
                                            
                                            <th>id_med</th>
                                            <th>medicamento</th>
                                            <th>Stock inicial</th>
                                            <th>num_lote</th>
                                            <th>fecha_vecimiento</th>
                                            
                                        </tr>
                                    </thead>
                                   
                                         <tbody id="content_table">

                                          <?php
                                            include('../controlador/conexion.php');
                                            $sqlDetalle = "SELECT m.id_medicamento, m.nombre as Medicamento, d.stock_inicial, d.num_lote, d.fecha_vencimiento
                                            from detalle_ingreso d inner join medicamento m
                                            on d.id_medicamento = m.id_medicamento
                                            where d.id_ingreso = " . $_GET['id'];
                                            $ejecutarDetalle = mysqli_query($conexion, $sqlDetalle);
                                            
                                                while($fila = mysqli_fetch_array($ejecutarDetalle)){
                                                   

                                                    echo '<tr>';
                                                    echo '<td><p align=center>'.$fila[0].'</p></td>';
                                                    echo '<td><p align=center>'.$fila[1].'</p></td>';
                                                    echo '<td><p align=center>'.$fila[2].'</p></td>';
                                                    echo '<td><p align=center>'.$fila[3].'</p></td>';
                                                    echo '<td><p align=center>'.$fila[4].'</p></td>';
                                                    
                                                   


                                                    echo '</tr>';
                                                }
                                                ?>
     
                                    </tbody>
                                </table>

                                <script>
                                    const form = document.getElementById("transactionForm");

                                    form.addEventListener("submit", function(event) {
                                        event.preventDefault(); //cancelar el evento para que no se recargue la pagina
                                        let transactionFormData = new FormData(form);
                                       // console.log("di click");
                                    })
                                    
                                </script>



                            </div>
                        </div>



            </div>



            </form>






            </div>
            </div>
            </div>
            </div>
            </div>
    </main>

    </body>

</html>
<?php
	}else{
		header('Location: login.php');
	}
?>