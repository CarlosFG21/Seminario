<?php 
	
	session_start();
	$nombre = $_SESSION['nombre'];
    $permiso = $_SESSION['permiso'];
    
    if (isset($_SESSION['nombre'])) {

        if($permiso=="Usuario"){
            header('Location: index.php');
        }else{   

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

  $sqlMedicamento = "select di.id_detalle_ing, di.id_medicamento, m.nombre, di.stock_actual, di.estado, sum(di.stock_actual) as STOCK
from detalle_ingreso di inner join medicamento m
on di.id_medicamento = m.id_medicamento
inner join ingreso i 
on di.id_ingreso = i.id_ingreso
where i.estado = 1

group by di.id_medicamento, m.nombre
 ";
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
   
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.5/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.5/chosen.min.css" >
    
  
 
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



    



<script>
     $(document).ready(function(){
    $("#cbMedicamento").change(function () { 	

        document.getElementById("txtId").value = "";

              document.getElementById("txtStockDisponible").value = "";
              document.getElementById("txtFechaVencimiento").value = "";
              document.getElementById("txtConcentracion").value = "";
              document.getElementById("txtPresentacion").value = "";

              document.getElementById("txtNombre").value = "";
              document.getElementById("txtLote").value = "";
        	
        $("#cbMedicamento option:selected").each(function () {
            id_medicamento = $(this).val();
            
            $.post("../controlador/getLote.php", { id_medicamento: id_medicamento }, function(data){
                $("#cbLote").html(data);
            });            
        });
    })
});


</script>


<script>
     $(document).ready(function(){
    $("#cbLote").change(function () { 	

       var index =  document.getElementById("cbLote").selectedIndex;

        if (index == 0){
            document.getElementById("txtId").value = "";

        document.getElementById("txtStockDisponible").value = "";
        document.getElementById("txtFechaVencimiento").value = "";
        document.getElementById("txtConcentracion").value = "";
        document.getElementById("txtPresentacion").value = "";

        document.getElementById("txtNombre").value = "";
        document.getElementById("txtLote").value = "";

        }

       
        	
       
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
                    <a href="expediente.php" class=""><span class="las la-folder-open"></span>
                    <span>Expedientes</span></a>
                </li>
                <li>
                    <a href="medicamento.php" ><span class="las la-medkit"></span>
                    <span>Medicamentos</span></a>
                </li>
                <li>
                    <a href="ingresos.php"><span class="las la-prescription-bottle-alt"></span>
                    <span>Ingresos</span>
                </a>
                </li>
                <li>
                    <a href="egresos.php" class="active"><span class="la la-prescription-bottle"></span>
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
             <select id="cbPuestoSalud" class="input__text" name="cbPuestoSalud" onChange="mostrar()" required>

             <?php
                 while($row = mysqli_fetch_array($ejecutarPuestoSalud)){
             ?>
            <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
             <?php }  ?>   
            </select>
            </p>

                
            <p>
              

                <label for="">Medicamento</label>
             <select id="cbMedicamento" class="chosen" name="cbMedicamento"  required>
             <option value="" disabled="disabled" selected>Seleccione</option>
             <?php
                 while($row = mysqli_fetch_array($ejecutarMedicamento)){
             ?>
            <option value="<?php echo $row[1]; ?>"><?php echo $row[2] . ' - ' . $row[5]; ?></option>
             <?php }  ?>   
            </select>


               
           
            </p>


            <p>
            <label for="">Lote</label>
             <select id="cbLote" class="input__text" name="cbLote"  required>
             <option value="" disabled="disabled" selected>Seleccione</option>
            
            </select>
            </p>


            
            <p>
             <label for="">STOCK DISPONIBLE</label>
             <input id="txtStockDisponible" name="txtStockDisponible" type="text" class="input__text" placeholder="Stock Disponible" value="" readonly>
             </p>
            
           
           
             <p>
             <label for="">Concentracion</label>
             <input id="txtConcentracion" name="txtConcentracion" type="text" class="input__text" placeholder="Concentracion" value="" readonly>
             </p>

             <p>
             <label for="">Presentacion</label>
             <input id="txtPresentacion" name="txtCantidadEgreso" type="text" class="input__text" placeholder="Presentacion" value="" readonly >
             </p>

             <p>
             <label for="">Fecha de vencimiento</label>
             <input id="txtFechaVencimiento" name="txtFechaVencimiento" type="text" class="input__text" placeholder="Fecha de Vencimiento" value="" readonly >
             </p>

             <p>
             <label for="">Cantidad Egresar</label>
             <input id="txtCantidadEgreso" name="txtCantidadEgreso" type="number" class="input__text" placeholder="Ingrese cantidad a egresar" value="0"  >
             </p>

        

        
        
       

        <p>
        </p>    
        <p>
        </p>
        <br>
        <div class="btn__group">


        
             <input id="txtId" type="hidden" name="txtId" type="text" class="input__text" placeholder="" value="0"  >
             <input id="txtNombre" type="hidden" name="txtNombre" type="text" class="input__text" placeholder="" value=""  >
             <input id="txtLote" type="hidden" name="txtLote" type="text" class="input__text" placeholder="" value=""  >
            


				<a href="egresos.php" class="btn btn__danger">Regresar</a>
				<input id="add_row" type="submit" name="add_row" value="Añadir" class="btn btn__primary">

                <input id="enviar" name="enviar" type="button"  class="btn btn__primary" value="EGRESO" onclick="">


			</div>

            <div class="card-body">
                            <div class="table-responsive">
                                <table id="transactionTable" width="100%"  name="tabla_detalles">
                                    <thead>
                                        <tr>
                                           
                                            
                                            <td>id_detalle_ing</td>
                                            <td>medicamento</td>
                                            <td>lote</td>
                                            <td>cantidad_egresar</td>
                                            <td>Funcion</td>
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

    <script src="../js/tablaDetalleVenta.js"></script>
    <script src="../js/recorrerTabla.js"></script>
    <script src="../js/tablajsonVenta.js"></script>
    <!--  --> 
    <script src="../js/eventoMedicamentoEgreso.js"></script>
    
    <script>var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("txtFechaEgreso")[0].setAttribute('max', today);</script>
  

    


    
    </body>

    <script type="text/javascript">
    $(".chosen").chosen();

    </script>

</html>
<?php
    }
	}else{
		header('Location: login.php');
	}
?>