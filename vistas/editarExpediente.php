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

<?php
//departamento
  require('../controlador/conexion.php');

  $sql = "select id_departamento, nombre FROM departamento ORDER BY nombre ASC";
  $ejecutarD = mysqli_query($conexion, $sql);

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
    <link rel="stylesheet" href="../css/expediente_ingreso.css">
    
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
                    <span>Municipio</span>
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
                <h3>Datos del expediente</h3>   
                </div>

            <div class="card-body">
            <br>
            <form name="" id="" method="POST" action="../controlador/BDExpediente.php"> 
            <p>
            <label for="">DPI</label>
            <input name="txtDpi" value="<?= $expediente[1] ?>" type="number" class="input__text" placeholder="Ingrese su dpi" required>
            </p>
           <p>
           <label for="">Nombre</label>
           <input name="txtNombres" value="<?= $expediente[3] ?>" type="text" class="input__text" placeholder="Ingresa su nombre" required>
           </p>
           <p>
           <label for="">Apellido</label>
           <input name="txtApellidos" value="<?= $expediente[4] ?>" type="text" class="input__text" placeholder="Ingreso su apellido" required>
           </p>
        <p>
          <label for="">Fecha de nacimiento</label>
          <input name="txtFecha" value="<?= $expediente[5] ?>" type="date" class="input__text" required>
        </p>
        <p>
          <label for="">Telefono</label>
          <input name="txtTelefono" value="<?= $expediente[6] ?>" type="tel" class="input__text" placeholder="Ingrese su número">
        </p>
        <p>
          <label for="">Correo</label>
          <input name="txtEmail" value="<?= $expediente[7] ?>" type="email" class="input__text" placeholder="Ingrese su correo">
        </p>
        <p>
          <label for="">Departamento</label>
          <select name="cbDepartamento" class="input__text" name="select">
          
         <?php

        while($row = mysqli_fetch_array($ejecutarD)){

        ?>
        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
        <?php }  ?>


          </select>
        </p>
        <p>
          <label for="">Municipio</label>
          <select name="cbMunicipio" class="input__text" name="select">

          <?php

            require('../controlador/conexion.php');

             $sql = "select id_municipio, nombre FROM municipio ORDER BY nombre ASC";
             $ejecutarM = mysqli_query($conexion, $sql);

             while($rowM = mysqli_fetch_array($ejecutarM)){

  

             ?>
             <option value="<?php echo $rowM[0]; ?>"><?php echo $rowM[1]; ?></option>
             <?php }  ?>
     
          </select>
        </p>
        <p>
          <label for="">Dirección</label>
          <input name="txtDireccion" value="<?= $expediente[8] ?>" type="text" class="input__text" placeholder="Ingrese su direccion">
        </p>
        <p>
          <label for="">No. Expediente</label>
          <input name="txtCorrelativo" value="<?= $expediente[2] ?>" type="number" class="input__text" placeholder="Numero Correlativo">
        </p>
        <p>
        </p>    
        <p>
        </p>
        <br>

        <input type="hidden" name="txtIdExpediente" value="<?= $expediente[0] ?>">
        <div class="btn__group">
				<a href="expediente.php" class="btn btn__danger">Regresar</a>
				<input type="submit" name="actualizarExpediente" value="Editar" class="btn btn__primary">
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