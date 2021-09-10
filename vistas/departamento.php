<?php 
include('../controlador/conexion.php');
include('../controlador/BDepartamento.php');
if(isset($_GET['id'])){
 $id = $_GET['id'];
 $edit_state = true;
 $sql = mysqli_query($conexion,"SELECT * FROM departamento WHERE id_departamento=$id");
 $rec = mysqli_fetch_array($sql);
 $nombre = $rec['nombre'];
 $id = $rec['id_departamento'];

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
    <link rel="stylesheet" href="../css/municipio_ingreso.css">
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
                    <a href=""><span class="las la-medkit"></span>
                    <span>Medicamentos</span></a>
                </li>
                <li>
                    <a href="ubicacion.php" class="active"><span class="las la-map"></span>
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
                <h3>Datos del municipio</h3>   
                </div>

            <div class="card-body">
            <br>
            <form name="" id="" method="POST" action="../controlador/BDepartamento.php"> 
           <p>
           <label for="">País</label>
           <input type="text" class="input__text" placeholder="Guatemala"  readonly="readonly">
           </p>
           <p>
           <label for="">Departamento</label>
           <input name="txtdepartamento" type="text" class="input__text" placeholder="Ingrese un departamento" value="<?php echo $nombre;?>">
           </p>     
        <p>
        </p>    
        <p>
        </p>
        <br>
        <div class="btn__group">
        <input type="hidden" name="txtid_departamento" value="<?php echo $id;?>">
        <?php if ($edit_state == false): ?>
				<input type="submit" name="registrar" value="Guardar" class="btn btn__primary">
                <?php else: ?>
                <input type="submit" name="actualizar" value="Editar" class="btn btn__primary">
                <?php endif     ?>
			</div>
            </form>
            <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Departamento</td>
                                            <td>Funciones</td>
                                        </tr>
                                    </thead>
                                    <?php
        include('../controlador/conexion.php');
        $sql = "SELECT * FROM departamento where estado=1";
        $ejecutar = mysqli_query($conexion, $sql);
        echo '<tbody>';
        while($fila = mysqli_fetch_array($ejecutar)){
            echo '<tr>';
            echo '<td>'.$fila['id_departamento'].'</td>';
            echo '<td>'.$fila['nombre'].'</td>';
            echo "<td><a href='departamento.php?id=$fila[id_departamento]' class='boton-editar'>Editar</a>
            <a href='../controlador/proceso_eliminarDepartamento.php?id=$fila[0]' class='boton-eliminar'>Eliminar</a></td>";


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
    <script src="../js/proceso_eliminar.js"></script>
    </body>

</html>