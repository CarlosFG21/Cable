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
    include('../clases/Pago.php');
    include('../clases/DetalleServicio.php');
    include('../clases/Direccion.php');
    include('../clases/Cliente.php');
    include('../clases/Correlativo.php');
    include('../clases/Usuario.php');

    $corr = new Correlativo();
    $correlativo = $corr->obtenerCorrelativo();
    
    $this->Image('cable.jpg',10,10,40);
    $this->SetFont('Arial','B',30);
    $this->SetTextColor(66, 131, 245);
    $this->Cell(150,16,utf8_decode('"Cablevisión '),0,0,'R',0);
    $this->SetTextColor(245, 0, 0);
    $this->Cell(40,16,utf8_decode('Robles"'),0,0,'C');
    $this->Ln(3);
    $this->SetFont('Arial','B',15);
    $this->SetTextColor(66, 131, 245);
    $this->Cell(270,28,utf8_decode('Imagen y corazon de Gualán'),0,0,'C');
    $this->Ln(18);
    $this->SetFont('Arial','B',20);
    $this->setTextColor(3,3,3);
    $this->SetX(70);
    $this->SetFillColor(215, 220, 224);
    $this->Cell(160,1,'',0,1,'C',1);
    session_start();

    $tipoReporte = $_SESSION['tipoReporte'];

    if($tipoReporte==0){
    $this->Cell(280,20,'Reporte de todos los pagos',0,0,'C');
    }
    if($tipoReporte==1){
        $this->Cell(280,20,'Reporte de pagos por cliente',0,0,'C');
    }
    if($tipoReporte==2){
        $fechaInicio= $_SESSION['fechaInicio'];
        $fechaFin = $_SESSION['fechaFin'];
        $this->Cell(280,20,'Reporte de pagos',0,0,'C');
        //--------Cambiamos a color rojo----------
        $this->SetFont('Arial','B',15);
        $this->setTextColor(244,48,13);
        $this->Ln(7);
        $this->Cell(280,25,"Desde: " . $fechaInicio . " hasta: " . $fechaFin,0,0,'C');
    }
    if($tipoReporte==3){
        $fechaInicio= $_SESSION['fechaInicio'];
        $fechaFin = $_SESSION['fechaFin'];
        $this->Cell(280,20,'Reporte de pagos por cliente',0,0,'C');
        //--------Cambiamos a color rojo----------
        $this->SetFont('Arial','B',14);
        $this->setTextColor(244,48,13);
        $this->Ln(7);
        $this->Cell(280,24,"Desde: " . $fechaInicio . " hasta: " . $fechaFin,0,0,'C');
    }
    
    //Color negro
    $this->setTextColor(3,3,3);
    $this->Ln(6);
    $this->SetFont('Arial','',12);
    $this->Ln(7);

    $p = $_SESSION['pagoArray'];

    if(sizeof($p)<1){
        echo "<script> 
alert('¡No hay resultados que coincidan con la búsqueda!'); 
window.close(); 
</script>"; 
        
    }

    $idDetSer = $p[0]->getIdDetalleServicio();

    $detSer = new DetalleServicio();
    $resDetSer = $detSer->buscarPorId($idDetSer);

    $idDireccion = $resDetSer->getIdDireccion();

    $direccion = new Direccion();
    
    $resDireccion = $direccion->buscarPorId($idDireccion);

    $idCliente = $resDireccion->getIdCliente();
    
    if($tipoReporte == 1 || $tipoReporte==3){

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
    //$fecha = date('Y-m-d');
    $fecha = date('d-m-Y');
    //Obtenemos hora
    $hora = time();
    //Damos formato a la hora
    $horaReal = date("H:i:s",$hora);
    
    $this->Cell(210,20,utf8_decode('Fecha de generación de reporte: '. $fecha . "     Hora: " . $horaReal),0,0,'L');
    $this->Ln(15);
    
 }else{
     $this->Ln(7);
 }
    
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
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->SetFont('Arial','B',12);

$tipoReporte = $_SESSION['tipoReporte'];
if($tipoReporte!=1 || $tipoReporte!=3){
$pdf->Cell(15,6,'No',1,0,'C',1);
}else{
    $pdf->Cell(50,6,'No',1,0,'C',1);
}
$pdf->Cell(80,6,'Servicio',1,0,'C',1);
$pdf->Cell(25,6,'Mes',1,0,'C',1);
$pdf->Cell(20,6,utf8_decode('Año'),1,0,'C',1);
$pdf->Cell(50,6,utf8_decode('Usuario emisor'),1,0,'C',1);
$tipoReporte = $_SESSION['tipoReporte'];
if($tipoReporte==0 || $tipoReporte==2){
    $pdf->Cell(50,6,utf8_decode('Cliente'),1,0,'C',1);
}

$pdf->Cell(30,6,utf8_decode('Precio'),1,1,'C',1);
$pdf->SetFont('Arial','',12);

$pago = $_SESSION['pagoArray'];
$detalleServicio = new DetalleServicio();

$total =0;
$tipoReporte = $_SESSION['tipoReporte'];

$contador = 1;

for($i=0; $i<sizeof($pago);$i++){
    
    if($pago[$i]->getEstado()==1){

    $idDetalleBuscar= $pago[$i]->getIdDetalleServicio();
    $resDetalleServicio = $detalleServicio->buscarPorId($idDetalleBuscar);    
    $nombreServicio = $resDetalleServicio->getNombreServicio();

    $total = $total + $pago[$i]->getTotal();
    if($tipoReporte!=1 || $tipoReporte!=3){
    $pdf->Cell(15,10,($contador),0,0,'C');
    }else{
        $pdf->Cell(50,10,($contador),0,0,'C');
    }
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
    $pdf->Cell(50,10,utf8_decode(limitarCadena($pago[$i]->getNombreUsuario(),20,"...")), 0, 0, 'C');
    

    if($tipoReporte==0 || $tipoReporte==2){
        $pdf->Cell(50,10,utf8_decode(limitarCadena($pago[$i]->getNombreCliente(),20,"...")), 0, 0, 'C');
    }
    $pdf->Cell(30,10,"Q " . $pago[$i]->getTotal(), 0, 1, 'C');
    $contador = $contador+1;
}//Fin de if validador de estado existente
}

$pdf->SetFont('Arial','B',12);

if($tipoReporte!=1 || $tipoReporte!=3){
$pdf->Cell(15,10,("...."),1,0,'C');
}else{
    $pdf->Cell(50,10,("...."),1,0,'C');
}
$pdf->Cell(80,10,utf8_decode(limitarCadena("Total a facturado (Q)",25,"...")), 1, 0, 'C');
$pdf->Cell(25,10,utf8_decode("....."), 1, 0, 'C');
$pdf->Cell(20,10,".....", 1, 0, 'C');
$pdf->Cell(50,10,".....", 1, 0, 'C');
if($tipoReporte==0 || $tipoReporte==2){
    $pdf->Cell(50,10,".....", 1, 0, 'C');
}
$pdf->Cell(30,10,"Q " . $total, 1, 1, 'C');


$pdf->Output();

//echo "<script>window.open('../vistas/pago.php');</script>";


?>