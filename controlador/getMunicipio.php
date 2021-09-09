<?php 
    require('../controlador/conexion.php');
    echo "entro a municipio";

    $id_departamento = $_POST['id_departamento'];

    $queryM = "SELECT id_municipio, nombre FROM municipio where id_departamento = '
    $id_departamento' ORDER BY nombre ASC ";

    $ejecutar = mysqli_query($conexion, $queryM);

    $html = "<option value='0'>Seleccione municipio</option>";
    echo $html;

    while($row = mysqli_fetch_array($ejecutar)){
 
       echo $html = "<option value=".$row[0].">".$row[1]."</option>";

    }

?>