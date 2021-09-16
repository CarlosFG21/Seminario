<?php 
	
	session_start();
	$nombre = $_SESSION['nombre'];
    $permiso = $_SESSION['permiso'];
    
    if (isset($_SESSION['nombre'])) {

?>
<?php
//departamento
  require('../controlador/conexion.php');

  $sql = "select id_departamento, nombre FROM departamento ORDER BY nombre ASC";
  $ejecutar = mysqli_query($conexion, $sql);

  //cargar ultimo ID de expediente


?>

<?php 
include('../controlador/conexion.php');
$expediente = null;
$sql2 = "SELECT MAX(correlativo_exp) max_correlativo_exp FROM expediente";
$ejecutar2 = mysqli_query($conexion, $sql2);
while($fila = mysqli_fetch_row($ejecutar2)){
    $expediente = $fila;
    
    break;
}


if ( $expediente == null){
    $expediente = 1000;
}
$expediente[0] = $expediente[0] + 1;

?>





<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Centro de Salud</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>

    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/expediente_ingreso.css">
    <link rel="stylesheet" href="../css/boton_navegacion.css">
  

    <script language="javascript">
			$(document).ready(function(){
				$("#cbDepartamento").change(function () { 		
					$("#cbDepartamento option:selected").each(function () {
						id_departamento = $(this).val();
						$.post("../controlador/getMunicipio.php", { id_departamento: id_departamento }, function(data){
							$("#cbMunicipio").html(data);
						});            
					});
				})
			});
		</script>


   
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
                <h3>Datos del expediente</h3>   
                </div>

            <div class="card-body">
            <br>


            <form name="" id="" method="POST" action="../controlador/BDExpediente.php"> 
            <p>
            <label for="">DPI</label>
            <input name="txtDpi" type="number" class="input__text" placeholder="Ingrese Documento Personal de Identificación">
            </p>
           <p>
           <label for="">Nombres</label>
           <input name="txtNombres" type="text" class="input__text" placeholder="Ingrese los nombres" required>
           </p>
           <p>
           <label for="">Apellidos</label>
           <input name="txtApellidos" type="text" class="input__text" placeholder="Ingrese los apellidos" required>
           </p>
        <p>
          <label for="">Fecha de nacimiento</label>
          <input name="txtFecha" type="date" class="input__text" required>
        </p>
        <p>
          <label for="">Telefono</label>
          <input name="txtTelefono" type="tel" class="input__text" placeholder="Ingrese número de teléfono">
        </p>
        <p>
          <label for="">Correo</label>
          <input name="txtEmail" type="email" class="input__text" placeholder="Ingrese correo">
        </p>
        <p>
          <label for="">Departamento</label>
          <select class="input__text" name="cbDepartamento" id="cbDepartamento" required>
          <option value="value1">Seleccione</option>

          <?php
          while($row = mysqli_fetch_array($ejecutar)){

          

          ?>
            <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
          <?php }  ?>

          

          </select>
        </p>
        <p>
          <label for="">Municipio</label>
          <select class="input__text" name="cbMunicipio" id="cbMunicipio" required>
          <option value="value1">Seleccione</option>
          </select>
        </p>
        <p>
          <label for="">Dirección</label>
          <input name="txtDireccion" type="text" class="input__text" placeholder="Ingrese direccion">
        </p>
        <p>
          <label for="">No. Expediente</label>
          <input name="txtExpediente" value = "<?= $expediente[0] ?>" type="number" class="input__text" placeholder="Correlativo de expediente" required>
        </p>
        <p>
        </p>    
        <p>
        </p>
        <br>
        <div class="btn__group">
				<a href="expediente.php" class="btn btn__danger">Regresar</a>
				<input type="submit" name="registrarExpediente" value="Guardar" class="btn btn__primary">
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