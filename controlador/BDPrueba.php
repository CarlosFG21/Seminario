<?php

session_start();
include('conexion.php');

$IdPHP = $_POST['IdPHP'];

//esto se hace para devolver los campos del medicamento en el egresar
$medic;
$sqlMedic = "SELECT d.id_detalle_ing, m.nombre as nmedicamento, c.descripcion as Concentra, p.descripcion as Presenta, d.stock_actual,
d.fecha_vencimiento, d.num_lote

from
medicamento m inner join concentracion c
on m.id_concentracion = c.id_concentracion
inner join presentacion p
on m.id_presentacion = p.id_presentacion
inner join detalle_ingreso d
on m.id_medicamento = d.id_medicamento
inner join ingreso i
on d.id_ingreso = i.id_ingreso 
where d.id_detalle_ing = $IdPHP";

$ejecutarMedic = mysqli_query($conexion, $sqlMedic);
while($fila = mysqli_fetch_row($ejecutarMedic)){
    $medic = $fila;
    break;
}

echo json_encode($medic);



?>