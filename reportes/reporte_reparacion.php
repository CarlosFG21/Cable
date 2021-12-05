<?php
require('../pdf/fpdf.php');

class PDF extends FPDF
{

function Header()
{
    
    $this->Image('cable.jpg',10,10,40);
    $this->SetFont('Arial','B',15);
    $this->Cell(210,20,utf8_decode('Cablevisión Robles'),0,0,'C');
    $this->Ln(9);
    $this->Cell(210,20,'Reporte de Reparaciones',0,0,'C');
    $this->Ln(6);
    $this->SetFont('Arial','',12);
    $this->Cell(209,30,'Horarios de atencion: Lunes a Domingo: 7 AM-5 PM ',0,0,'C');
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

include('../db/Conexion.php');
$conexion = new Conexion();
//Conectamos a la base de datos
$conexion->conectar();
$fechaActual = date('d-m-Y');
$consulta = "SELECT a.id_personal, a.descripcion, a.estado, a.fecha_reporte, b.nombres, b.apellidos FROM reparacion as a inner join personal as b ON b.id_personal = a.id_personal WHERE a.estado=3 and a.fecha_reporte='" . $fechaActual . "'";
$resultado = mysqli_query($conexion->db, $consulta);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(70,6,'Personal',1,0,'C',1);
$pdf->Cell(70,6,'Descripcion',1,0,'C',1);
$pdf->Cell(50,6,'Estado',1,1,'C',1);
$pdf->SetFont('Arial','',12);

while ($row=mysqli_fetch_array($resultado)) {
	$pdf->Cell(70,10,utf8_decode($row['nombres']." ".$row['apellidos']),0,0,'C');
    $pdf->Cell(70,10,utf8_decode($row['descripcion']), 0, 0, 'C');
    $obtencion = $row['estado'];
   
    if($obtencion==3){
        $pdf->Cell(50,10,utf8_decode('Atendida'), 0, 1, 'C');
    }
	

} 
$pdf->Output();

?>