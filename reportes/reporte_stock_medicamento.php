<?php
require('../pdf/fpdf.php');

class PDF extends FPDF
{

function Header()
{
    
    $this->Image('centro1.jpg',10,10,40);
    $this->SetFont('Arial','B',15);
    $this->Cell(210,20,'Centro de Salud San Diego, Zacapa',0,0,'C');
    $this->Ln(9);
    $this->Cell(210,20,'Reporte de Stock Medicamentos',0,0,'C');
    $this->Ln(6);
    $this->SetFont('Arial','',12);
    $this->Cell(205,30,'Horarios de atencion: Lunes a Domingo: 7 AM-5 PM ',0,0,'C');
    $this->Ln(30);
    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
}
}

include('../controlador/conexion.php');
$consulta = "select m.id_medicamento, m.nombre, c.descripcion,
sum(di.stock_inicial) as Quantity_Ingreso,
sum(di.stock_actual) as Quantity_Stock,

(sum(di.stock_inicial)-
sum(di.stock_actual)) as Quantity_Venta
 
from medicamento m inner join concentracion c
on m.id_concentracion = c.id_concentracion
inner join detalle_ingreso di
on m.id_medicamento = di.id_medicamento
inner join ingreso i
on di.id_ingreso = i.id_ingreso
where i.estado = 1
group by m.id_medicamento, m.nombre, c.descripcion";
$resultado = $conexion->query($consulta);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,6,'Medicamento',1,0,'C',1);
$pdf->Cell(50,6,'Ingreso',1,0,'C',1);
$pdf->Cell(50,6,'Stock',1,0,'C',1);
$pdf->Cell(50,6,'Egreso',1,1,'C',1);
$pdf->SetFont('Arial','',12);

while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(40,10,utf8_decode($row['nombre']),0,0,'C');
    $pdf->Cell(50,10,$row['Quantity_Ingreso'], 0, 0, 'C');
    $pdf->Cell(50,10,$row['Quantity_Stock'], 0, 0, 'C');
	$pdf->Cell(50,10,$row['Quantity_Venta'], 0, 1, 'C');

} 
$pdf->Output();

?>