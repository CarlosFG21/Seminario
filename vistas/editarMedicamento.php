<?php 
	
	session_start();
	$nombre = $_SESSION['nombre'];
    $permiso = $_SESSION['permiso'];
    
    if (isset($_SESSION['nombre'])) {

?>
<?php
    include('../controlador/conexion.php');
    $medicamento = null;
    $sql = "SELECT * FROM medicamento where id_medicamento = " . $_GET['id'];
    $ejecutar = mysqli_query($conexion, $sql);
    while($fila = mysqli_fetch_row($ejecutar)){
        $medicamento = $fila;
        break;
    }

    if ( $medicamento == null){
        header('Location: medicamento.php');
    }
?>


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
    <link rel="stylesheet" href="../css/medicamento_ingreso.css">
    <link rel="stylesheet" href="../css/boton_navegacion.css">
    
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
                    <a href="expediente.php" class=""><span class="las la-folder-open"></span>
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
                    <span>Ubicaci??n</span>
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
        <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                <h3>Datos del medicamento</h3>   
                </div>

            <div class="card-body">
            <br>
            <form name="" id="" method="POST" action="../controlador/BDMedicamento.php"> 
            <p>
            <label for="">Nombre del medicamento</label>
            <input name="txtNombre" type="text" class="input__text" placeholder="Ingrese el nombre del medicamento" value="<?= $medicamento[1] ?>">
            </p>
           <p>
           <label for="">Descripcion del medicamento</label>
           <input name="txtDescripcion" type="text" class="input__text" placeholder="Ingresa una descripci??n del medicamento" value="<?= $medicamento[2] ?>">
           </p>
          
     
        
        <p>
          <label for="">Concentraci??n</label>
          <select class="input__text" name="cbConcentracion">
          <?php
          while($rowC = mysqli_fetch_array($ejecutarConcentracion)){

          
          ?>
          

            <option <?php if($_GET['id'] == $rowC[0]){?>selected <?php } ?> value="<?php echo $rowC[0];?>"><?php echo $rowC[1];?></option>


          <?php }  ?>
          </select>
        </p>
        <p>
          <label for="">Presentaci??n</label>
          <select class="input__text" name="cbPresentacion">

          <?php
          while($rowC = mysqli_fetch_array($ejecutarPresentacion)){

          

          ?>
            <option value="<?php echo $rowC[0]; ?>"><?php echo $rowC[1]; ?></option>
          <?php }  ?>
         
          

          </select>
        </p>
      
      
        <p>
        </p>    
        <p>
        </p>
        <br>
        <div class="btn__group">

        <input type="hidden" name="txtIdMedicamento" value="<?= $medicamento[0] ?>">

				<a href="medicamento.php" class="btn btn__danger">Regresar</a>
				<input type="submit" name="actualizarMedicamento" value="Editar" class="btn btn__primary">
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