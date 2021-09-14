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
           <input name="txtDescripcion" type="text" class="input__text" placeholder="Ingresa una descripción del medicamento" value="<?= $medicamento[2] ?>">
           </p>
          
        <p>
          <label for="">Numero de lote</label>
          <input name="txtLote" type="text" class="input__text" placeholder="Ingrese el numero de lote" value="<?= $medicamento[3] ?>">
        </p>
        
        <p>
          <label for="">Concentración</label>
          <select class="input__text" name="cbConcentracion">
          <?php
          while($rowC = mysqli_fetch_array($ejecutarConcentracion)){

          

          ?>
            <option value="<?php echo $rowC[0]; ?>"><?php echo $rowC[1]; ?></option>
          <?php }  ?>
          </select>
        </p>
        <p>
          <label for="">Presentación</label>
          <select class="input__text" name="cbPresentacion">

          <?php
          while($rowC = mysqli_fetch_array($ejecutarPresentacion)){

          

          ?>
            <option value="<?php echo $rowC[0]; ?>"><?php echo $rowC[1]; ?></option>
          <?php }  ?>
         
          

          </select>
        </p>
      
        <p>
          <label for="">Stock</label>
          <input name="txtStock" type="text" class="input__text" placeholder="Ingrese el stock" value="<?= $medicamento[5] ?>">
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