<?php
require('../pdf/fpdf.php');

class PDF extends FPDF
{

function Header()
{
    
    $this->Image('centro1.jpg',10,6);
    $this->SetFont('Arial','B',15);
    $this->Cell(55);
    $this->Cell(100,25,'Reporte de Usuarios',0,0,'C');
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
$consulta = "SELECT * FROM usuario WHERE estado=1";
$resultado = $conexion->query($consulta);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->Cell(40,6,'ID',1,0,'C',1);
$pdf->Cell(50,6,'Nombre',1,0,'C',1);
$pdf->Cell(50,6,'Apellido',1,0,'C',1);
$pdf->Cell(50,6,utf8_decode('Nickname'),1,1,'C',1);
$pdf->SetFont('Arial','B',12);

while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(40,25,$row['id_usuario'],0,0,'C');
    $pdf->Cell(50,25,utf8_decode($row['nombre']), 0, 0, 'C');
    $pdf->Cell(50,25,utf8_decode($row['apellido']), 0, 0, 'C');
	$pdf->Cell(50,25,$row['nickname'], 0, 1, 'C');

} 
$pdf->Output();

?>