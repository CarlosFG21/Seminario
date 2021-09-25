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
    $this->Cell(210,20,'Reporte de Medicamentos',0,0,'C');
    $this->Ln(6);
    $this->SetFont('Arial','',12);
    $this->Cell(200,30,'Horarios de atencion: Lunes a Domingo: 7 AM-5 PM ',0,0,'C');
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
$consulta = "SELECT nombre, n.descripcion as ndp, p.descripcion as nma FROM medicamento m INNER JOIN concentracion n ON m.id_concentracion = n.id_concentracion INNER JOIN presentacion p on m.id_presentacion = p.id_presentacion WHERE m.estado = 1";
$resultado = $conexion->query($consulta);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(65,6,'Nombre',1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('Concentración'),1,0,'C',1);
$pdf->Cell(65,6,utf8_decode('Presentación'),1,1,'C',1);
$pdf->SetFont('Arial','',12);

while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(65,10,$row['nombre'],0,0,'C');
    $pdf->Cell(60,10,$row['nma'], 0, 0, 'C');
	$pdf->Cell(65,10,utf8_decode($row['ndp']), 0, 1, 'C');

} 
$pdf->Output();

?>