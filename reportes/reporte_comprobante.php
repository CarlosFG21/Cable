<?php
function limitarCadena($cadena, $limite, $sufijo){
	// Si la longitud es mayor que el límite...
	if(strlen($cadena) > $limite){
		// Entonces corta la cadena y ponle el sufijo
		return substr($cadena, 0, $limite) . $sufijo;
	}
	
	// Si no, entonces devuelve la cadena normal
	return $cadena;
}


?>

<?php
require('../pdf/fpdf.php');

class PDF extends FPDF
{


function Header()
{

    //include('../db/Conexion.php');
    include('../clases/Pago.php');
    include('../clases/DetalleServicio.php');
    include('../clases/Direccion.php');
    include('../clases/Cliente.php');
    include('../clases/Correlativo.php');
    include('../clases/Usuario.php');

    $corr = new Correlativo();
    $correlativo = $corr->obtenerCorrelativo();
    
    $this->Image('cable.jpg',10,10,40);
    $this->SetFont('Arial','B',15);
    $this->Cell(210,20,utf8_decode('Cablevisión Robles'),0,0,'C');
    $this->Ln(9);
    $this->Cell(210,20,'Comprobante de pago',0,0,'C');
    //--------Cambiamos a color rojo----------
    $this->setTextColor(244,48,13);
    $this->Ln(9);
    $this->Cell(210,20,"No. " . $correlativo,0,0,'C');
    
    //Color negro
    $this->setTextColor(3,3,3);
    $this->Ln(6);
    $this->SetFont('Arial','',12);
    $this->Ln(7);

    session_start();

    $p = $_SESSION['pagoArray'];
    $idDetSer = $p[0]->getIdDetalleServicio();

    $detSer = new DetalleServicio();
    $resDetSer = $detSer->buscarPorId($idDetSer);

    $idDireccion = $resDetSer->getIdDireccion();

    $direccion = new Direccion();
    
    $resDireccion = $direccion->buscarPorId($idDireccion);

    $idCliente = $resDireccion->getIdCliente();

    $cliente = new Cliente();

    $resCliente = $cliente->buscarPorId($idCliente);

    $nombreCliente = $resCliente->getNombres() . " " . $resCliente->getApellidos();
    $nitCliente = $resCliente->getNit();

    $this->Cell(209,30,limitarCadena(utf8_decode('Nombre del cliente: ' . $nombreCliente),60,"..."),0,0,'L');
    $this->Ln(7);
    $this->Cell(209,30,limitarCadena(utf8_decode('Nit: ' . $nitCliente),60,"..."),0,0,'L');
    $this->Ln(12);
    
    //Asignamos zona horaria al servidor    
    date_default_timezone_set('America/Guatemala');
    //Año mes dia
    $fecha = date('Y-m-d');
    //Obtenemos hora
    $hora = time();
    //Damos formato a la hora
    $horaReal = date("H:i:s",$hora);

    $this->Cell(210,20,utf8_decode('Fecha: '. $fecha . "     Hora: " . $horaReal),0,0,'L');
    $this->Ln(15);
 
    
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


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,6,'No',1,0,'C',1);
$pdf->Cell(80,6,'Servicio',1,0,'C',1);
$pdf->Cell(25,6,'Mes',1,0,'C',1);
$pdf->Cell(20,6,utf8_decode('Año'),1,0,'C',1);
$pdf->Cell(50,6,utf8_decode('Precio'),1,1,'C',1);
$pdf->SetFont('Arial','',12);

$pago = $_SESSION['pagoArray'];
$detalleServicio = new DetalleServicio();

$total =0;

for($i=0; $i<sizeof($pago);$i++){
    $idDetalleBuscar= $pago[$i]->getIdDetalleServicio();
    $resDetalleServicio = $detalleServicio->buscarPorId($idDetalleBuscar);    
    $nombreServicio = $resDetalleServicio->getNombreServicio();

    $total = $total + $pago[$i]->getTotal();
    $pdf->Cell(15,10,($i+1),0,0,'C');
    $pdf->Cell(80,10,utf8_decode(limitarCadena($nombreServicio,25,"...")), 0, 0, 'C');

    $mesLetras="";

    if($pago[$i]->getMes()==1){
        $mesLetras="Enero";
    }
    if($pago[$i]->getMes()==2){
        $mesLetras="Febrero";
    }
    if($pago[$i]->getMes()==3){
        $mesLetras="Marzo";
    }
    if($pago[$i]->getMes()==4){
        $mesLetras="Abril";
    }
    if($pago[$i]->getMes()==5){
        $mesLetras="Mayo";
    }
    if($pago[$i]->getMes()==6){
        $mesLetras="Junio";
    }
    if($pago[$i]->getMes()==7){
        $mesLetras="Julio";
    }    
    if($pago[$i]->getMes()==8){
        $mesLetras="Agosto";
    }
    if($pago[$i]->getMes()==9){
        $mesLetras="Septiembre";
    }
    if($pago[$i]->getMes()==10){
        $mesLetras="Octubre";
    }
    if($pago[$i]->getMes()==11){
        $mesLetras="Noviembre";
    }
    if($pago[$i]->getMes()==12){
        $mesLetras="Diciembre";
    }

    $pdf->Cell(25,10,limitarCadena(utf8_decode($mesLetras),13,"..."), 0, 0, 'C');
	
    $pdf->Cell(20,10,$pago[$i]->getAnio(), 0, 0, 'C');
    $pdf->Cell(50,10,"Q " . $pago[$i]->getTotal(), 0, 1, 'C');
}

$pdf->SetFont('Arial','B',12);

$pdf->Cell(15,10,("...."),1,0,'C');
$pdf->Cell(80,10,utf8_decode(limitarCadena("Total a pagar (Q)",25,"...")), 1, 0, 'C');
$pdf->Cell(25,10,utf8_decode("....."), 1, 0, 'C');
$pdf->Cell(20,10,".....", 1, 0, 'C');
$pdf->Cell(50,10,"Q " . $total, 1, 1, 'C');


$pdf->Output();

echo "<script>window.open('../vistas/pago.php');</script>";


?>