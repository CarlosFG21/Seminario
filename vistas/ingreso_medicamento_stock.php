<?php
//departamento
  require('../controlador/conexion.php');

  $sqlConcentracion = "select id_concentracion, descripcion FROM concentracion ORDER BY descripcion ASC";
  $ejecutarConcentracion = mysqli_query($conexion, $sqlConcentracion);
  //cargar ultimo ID de expediente

  $sqlPresentacion = "select id_presentacion, descripcion FROM presentacion ORDER BY descripcion ASC";
  $ejecutarPresentacion = mysqli_query($conexion, $sqlPresentacion);
  //cargar ultimo ID de expediente
?>

<?php
  // Obteniendo la fecha actual del sistema con PHP
  $fechaActual = date('d-m-Y');
  

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
    <link rel="stylesheet" href="../css/medicamento_ingreso_stock.css">
    
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
                    <a href=""><span class="las la-users"></span>
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
                <h3>Ingreso de medicamento</h3>   
                </div>

            <div class="card-body">
            <br>
            <form name="" id="" method="POST" action="../controlador/BDMedicamento.php"> 
            <p>
            <label for="">Fecha de ingreso</label>
            <input name="txtFechaIngreso" type="date" class="input__text" placeholder="Ingrese el nombre del medicamento">
            </p>

           <p>
            <label for="">Proveedor</label>
             <select class="input__text" name="cbProveedor">
              
            </select>
            </p>


            <p>
            <label for="">Medicamento</label>
             <select class="input__text" name="cbMedicamento">
              
            </select>
            </p>
           
        <p>
          <label for="">Cantidad a ingresar</label>
          <input name="txtCantidad" type="number" class="input__text" placeholder="Ingrese cantidad a ingresar" value="">
        </p>

        <p>
          <label for="">Número de lote</label>
          <input name="txtLote" type="text" class="input__text" placeholder="Ingrese cantidad a ingresar" value="">
        </p>
        
       
       
     


      
        <p>
        </p>    
        <p>
        </p>
        <br>
        <div class="btn__group">
				<a href="medicamento.php" class="btn btn__danger">Regresar</a>
				<input type="submit" name="registrarMedicamento" value="Guardar" class="btn btn__primary">
			</div>
            </form>


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
        $sql = "SELECT id_medicamento, nombre, descripcion, concentracion, id_presentacion FROM medicamento where estado=1";
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
            </div>
            </div>
            </div>
    </main>

    </body>

</html>