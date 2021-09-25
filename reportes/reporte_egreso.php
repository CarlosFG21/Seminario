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
    $this->Cell(210,20,'Reporte de Detalle Egreso',0,0,'C');
    $this->Ln(6);
    $this->SetFont('Arial','',12);
    $this->Cell(208,30,'Horarios de atencion: Lunes a Domingo: 7 AM-5 PM ',0,0,'C');
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
$consulta = "SELECT m.nombre as Medicamento, d.cantidad_egresar, di.num_lote, p.nombre as PuestoSalud from detalle_egreso d inner join detalle_ingreso di on d.id_detalle_ingreso = di.id_detalle_ing inner join medicamento m on di.id_medicamento = m.id_medicamento inner join egreso e on e.id_egreso = d.id_detalle_eg inner join extencion_centro p on p.id_extencion_cen = e.id_expencion_cen";
$resultado = $conexion->query($consulta);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,6,'Medicamento',1,0,'C',1);
$pdf->Cell(50,6,'Cantidad Egresar',1,0,'C',1);
$pdf->Cell(50,6,utf8_decode('Lote'),1,0,'C',1);
$pdf->Cell(50,6,utf8_decode('Puesto de Salud'),1,1,'C',1);
$pdf->SetFont('Arial','',12);

while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(40,10,$row['Medicamento'],0,0,'C');
    $pdf->Cell(50,10,$row['cantidad_egresar'], 0, 0, 'C');
    $pdf->Cell(50,10,utf8_decode($row['num_lote']), 0, 0, 'C');
	$pdf->Cell(50,10,utf8_decode($row['PuestoSalud']), 0, 1, 'C');

} 
$pdf->Output();

?>