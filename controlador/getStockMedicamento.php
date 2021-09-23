<?php 
    require('../controlador/conexion.php');
    echo "llego a evento";
    print "llegoPHP";
    $id_medicamento = $_POST['id_medicamento'];

    $queryStock = "SELECT stock FROM medicamento where id_medicamento = '
    $id_medicamento'";

    $ejecutar = mysqli_query($conexion, $queryStock);

   // $html = "<option value='0'>Seleccione municipio</option>";

    while($row = mysqli_fetch_array($ejecutar)){
 
      // echo $html = "<a value=".$row[0].">".$row[0]."</a>";
       echo $row[0];


    }

?>