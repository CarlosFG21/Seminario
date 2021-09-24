<?php 
	
	session_start();
	$nombre = $_SESSION['nombre'];
    $permiso = $_SESSION['permiso'];
    
    if (isset($_SESSION['nombre'])) {

?>
<?php
//departamento
  require('../controlador/conexion.php');

  $sqlPuestoSalud = "select id_extencion_cen, nombre FROM extencion_centro where estado = 1 ORDER BY nombre ASC";
  $ejecutarPuestoSalud = mysqli_query($conexion, $sqlPuestoSalud);
  //cargar ultimo ID de expediente

?>

<?php
//departamento
  require('../controlador/conexion.php');

  $sqlMedicamento = "select id_medicamento, nombre FROM medicamento ORDER BY nombre ASC";
  $ejecutarMedicamento = mysqli_query($conexion, $sqlMedicamento);
  //cargar ultimo ID de expediente

?>

<?php
  // Obteniendo la fecha actual del sistema con PHP
  $fechaActual = date('d-m-Y');
  

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
  
 
    <script scr="../js/jquery-3.6.0.min.js"></script>
    <title>Centro de Salud</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/medicamento_ingreso_stock.css">
    <link rel="stylesheet" href="../css/boton_navegacion.css">

    <script language="javascript">
			$(document).ready(function(){
				$("#cbMedicamento").change(function () { 		
					$("#cbMedicamento option:selected").each(function () {
						id_medicamento = $(this).val();
						$.post("../controlador/getStockMedicamento.php", { id_medicamento: id_medicamento }, function(data){
							$("#txtStockDisponible").html(data);
						});            
					});
				})
			});
		</script>



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
          

          .fa-eraser{
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
                    <a href="" class=""><span class="las la-folder-open"></span>
                    <span>Expedientes</span></a>
                </li>
                <li>
                    <a href="" class="active"><span class="las la-medkit"></span>
                    <span>Medicamentos</span></a>
                </li>
                <li>
                    <a href="ingresos.php" class="active"><span class="las la-prescription-bottle-alt"></span>
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
                <h3>Egreso de medicamento</h3>   
                </div>

            <div class="card-body">
            <br>
            <form id="transactionForm" name="transactionForm" id="" method="POST" action="#"> 
            <p>
            <label for="">Fecha de egreso</label>
            <input id="txtFechaEgreso" name="txtFechaEgreso" type="date" class="input__text"  required>
            </p>

           <p>
            <label for="">Puesto de salud</label>
             <select id="cbPuestoSalud" class="input__text" name="cbPuestoSalud" required>

             <?php
                 while($row = mysqli_fetch_array($ejecutarPuestoSalud)){
             ?>
            <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
             <?php }  ?>   
            </select>
            </p>


            <p>
            <label for="">Medicamento</label>
             <select id="cbMedicamento" class="input__text" name="cbMedicamento" required>
             <?php
                 while($row = mysqli_fetch_array($ejecutarMedicamento)){
             ?>
            <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
             <?php }  ?>   
            </select>
            </p>

            <p>
             <label for="">STOCK DISPONIBLE</label>
             <input id="txtStockDisponible" name="txtStockDisponible" type="number" class="input__text" placeholder="Stock Disponible" value="" readonly>
             </p>
           
             <p>
             <label for="">Cantidad a egresar</label>
             <input id="txtCantidadEgreso" name="txtCantidadEgreso" type="number" class="input__text" placeholder="Ingrese cantidad a ingresar" value="" required>
             </p>

        

        
        
       

        <p>
        </p>    
        <p>
        </p>
        <br>
        <div class="btn__group">
				<a href="medicamento.php" class="btn btn__danger">Regresar</a>
				<input id="add_row" type="submit" name="add_row" value="Añadir" class="btn btn__primary">

                <input id="enviar" name="enviar" type="button"  class="btn btn__primary" value="EGRESO" onclick="">


			</div>

            <div class="card-body">
                            <div class="table-responsive">
                                <table id="transactionTable" width="100%"  name="tabla_detalles">
                                    <thead>
                                        <tr>
                                           
                                            
                                            <td>id_med</td>
                                            <td>medicamento</td>
                                            <td>cantidad</td>
                                            <td>Funciones</td>
                                        </tr>
                                    </thead>
                                   
                                         <tbody id="content_table">
     
                                        <tr>
                                            
           
                                         </tr>
       
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
    </main>

    <script src="../js/tablaDetalleEgreso.js"></script>
    <script src="../js/recorrerTabla.js"></script>
    <script src="../js/tablajsonEgreso.js"></script>
    <script src="../js/eventoMedicamentoEgreso.js"></script>


    
    </body>

</html>
<?php
	}else{
		header('Location: login.php');
	}
?>