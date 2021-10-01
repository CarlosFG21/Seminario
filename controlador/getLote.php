<?php 
    require('../controlador/conexion.php');
    echo "entro a lote";

    $id_medicamento = $_POST['id_medicamento'];

    $queryM = "select id_detalle_ing, num_lote, id_medicamento, stock_actual from detalle_ingreso where id_medicamento = '
    $id_medicamento' and stock_actual > 0  ";

    $ejecutar = mysqli_query($conexion, $queryM);


    $html = "<option value='0'>Seleccione un LOTE</option>";
    echo $html;

 

    while($row = mysqli_fetch_array($ejecutar)){
 
       echo $html = "<option value=".$row[0].">".$row[1]."</option>";

    }

?>