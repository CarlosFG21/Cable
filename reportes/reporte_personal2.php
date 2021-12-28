<?php
require('../pdf/fpdf.php');

$tipoReporte = $_POST['tipoReporte'];
$fechaR = $_POST['campfecha'];
$mpleado = $_POST['SEmpleado'];

if ($tipoReporte==0) {
    
}
if ($tipoReporte==1) {
    
}
if ($tipoReporte==2) {
    
}
if ($tipoReporte==3) {
    
}


class PDF extends FPDF
{

function Header()
{
    
    $this->Image('cable.jpg',10,10,34);
    $this->SetFont('Arial','B',25);
    $this->SetTextColor(66, 131, 245);
    $this->Cell(108,16,utf8_decode('"Cablevisión '),0,0,'R',0);
    $this->SetTextColor(245, 0, 0);
    $this->Cell(30,16,utf8_decode('Robles"'),0,0,'C');
    
    $this->Ln(2);
    $this->SetFont('Arial','B',12);
    $this->SetTextColor(66, 131, 245);
    $this->Cell(198,28,utf8_decode('Imagen y corazon de Gualán'),0,0,'C');

    $this->Ln(18);
    $this->SetFont('Arial','B',15);
    $this->SetTextColor(0, 0, 0);
    $this->Cell(198,18,'Reporte de Personal',0,0,'C');

    $this->SetX(50);
    $this->SetFillColor(215, 220, 224);
    $this->Cell(116,1,'',0,1,'C',1);
    $this->Ln(18);
    
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
//$consulta = "SELECT * FROM personal WHERE estado=1";
//este funciona con el mes actual
//$consulta = "SELECT p.id_personal, concat(p.nombres,' ',p.apellidos) AS empleado, p.cargo, p.telefono, COUNT(r.id_personal) AS reparaciones FROM personal p JOIN reparacion r ON p.id_personal=r.id_personal WHERE p.estado=1 AND MONTH (r.fecha_reporte)=MONTH(NOW())";
//este sirve pero es general
$consulta = "SELECT p.id_personal, concat(p.nombres,' ',p.apellidos) AS empleado, p.cargo, p.telefono, COUNT(r.id_personal) AS reparaciones, COUNT(r.id_reparacion)/DAY(LAST_DAY(fecha_reporte)) AS promedio FROM personal p JOIN reparacion r ON p.id_personal=r.id_personal WHERE p.estado=1";
$resultado = mysqli_query($conexion->db, $consulta);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//$pdf->setFillColor(232, 232, 232);
$pdf->SetFillColor(225, 225, 225);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,6,'ID',1,0,'C',1);
$pdf->Cell(68,6,'Empleado',1,0,'C',1);
$pdf->Cell(25,6,'Cargo',1,0,'C',1);
$pdf->Cell(25,6,'Telefono',1,0,'C',1);
$pdf->Cell(30,6,'Reparaciones',1,0,'C',1);
$pdf->Cell(30,6,'Promedio',1,1,'C',1);
$pdf->SetFont('Arial','',12);

while ($row=mysqli_fetch_array($resultado)) {
	$pdf->Cell(10,8,$row['id_personal'],0,0,'C');
    $pdf->Cell(68,8,$row['empleado'], 0, 0, 'C');
    $pdf->Cell(25,8,$row['cargo'], 0, 0, 'C');
	$pdf->Cell(25,8,$row['telefono'], 0, 0, 'C');
    $pdf->Cell(30,8,$row['reparaciones'], 0, 0, 'C');
    $pdf->Cell(30,8,$row['promedio'], 0, 1, 'C');

} 
$pdf->Output();

?>