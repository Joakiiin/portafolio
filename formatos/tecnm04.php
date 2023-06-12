<?php
$Numero = $_POST['numeroReporte'];
$Nombre= $_POST['NombreRep'];
$ApellidoP= $_POST['apellidoPRep'];
$ApellidoM= $_POST['apellidoMRep'];
$Carrera= $_POST['carreraRep'];
$NoControl= $_POST['nocontrolRep'];
$dia1= $_POST['dia1'];
$mes1= $_POST['mes1'];
$Year1= $_POST['year1'];
$dia2= $_POST['dia2'];
$mes2= $_POST['mes2'];
$Year2= $_POST['year2'];
$horasRep= $_POST['horasRep'];
$horasAcRep= $_POST['horasAcRep'];
$Programa= $_POST['ProgramaRep'];
$Dependencia= $_POST['DependenciaRep'];
$Titular= $_POST['TDependenciaRep'];
$Puesto= $_POST['TPuestoRep'];
$Actividades= $_POST['ActividadesRep'];
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
   // $this->Image('',10,8,33);
    // Arial bold 15
    //$this->SetFont('Arial','B',15);
    // Movernos a la derecha
   // $this->Cell(80);
    // Título
   // $this->Cell(30,10,'Title',1,0,'C');
    // Salto de línea
   // $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF(); //hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage(); // añade pagina en blanco
$pdf->SetFont('Arial','',10); //propiedades de la letra
 //imagen: nombre de archivo, png o jpg, x-y de posicion y tamaño

//TABLAS
$pdf->SetXY(15,15);
$pdf->Cell(20,22, $pdf->Image('img/SGC.jpg', $pdf->GetX(), $pdf->GetY(),20,22),1);
$pdf->Cell(93.8,10,utf8_decode('Formato evaluación cualitativa del prestador Servicio Social'),1,0,'C',0);
$pdf->SetXY(129,15);
$pdf->Cell(65,8,utf8_decode ('Código: TecNM-VI-PO-002-04'),1,1,'C',0);
$pdf->SetXY(35,25);
$pdf->Cell(93.8,12,'Referencia a la Norma ISO 9001:2015  8.1',1,1,'C',0);
$pdf->SetXY(129,23);
$pdf->Cell(65,7,utf8_decode ('revisión: 0'),1,1,'C',0);
$pdf->SetXY(129,30);
$pdf->Cell(65,7,utf8_decode('Página ').$pdf->PageNo().'/{nb}',1,1,'C',0);
$pdf->Ln(60);

//POSICION NOMBRE DE FORMATO
$pdf->SetXY(50,35);
//TITULO
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('DEPARTAMENTO DE GESTIÓN TECNOLÓGICA Y VINCULACIÓN '),90,90);

    //SALTO DE LINEA //POSICION NOMBRE DE FORMATO
$pdf->SetXY(70,45);
$pdf->Cell(50,4,utf8_decode('OFICINA DE  SERVICIO SOCIAL '),40,40);
//SALTO DE LINEA
$pdf->Ln(5);
    //SALTO DE LINEA //POSICION NOMBRE DE FORMATO
    $pdf->SetXY(150,55);
    $pdf->Cell(50,4,utf8_decode('REPORTE No. ' .$Numero. ''),40,40);

    //datos//
//nombre, APELLIDO PATERNO,APELLIDO MATERNO Y NOMBRE (S)
$pdf->SetXY(15,60);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Nombre: ' .$Nombre. ' '.$ApellidoP.' '.$ApellidoM.''),90,90);
    //CARRERA 
$pdf->SetXY(15,67);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Carrera: '.$Carrera.''),90,90);
   //No de control (S)
$pdf->SetXY(115,67);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('No de Control: '.$NoControl.''),90,90);
   
 //PERIODO REPORTADO//
 $pdf->SetXY(15,73);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Periodo Reportado:'),90,90);  
//DIA
$pdf->SetXY(15,80);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Del día    ' .$dia1. ''),90,90);
    $pdf->SetXY(27,81);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('_____'),90,90);
 //MES
$pdf->SetXY(40,80);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('mes  ' .$mes1.''),90,90); 
    $pdf->SetXY(48,81);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('__________'),90,90); 
//AÑO
$pdf->SetXY(69,80);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('año  '.$Year1.''),90,90);
    $pdf->SetXY(76,80);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('_____'),90,90);
//AL DIA
$pdf->SetXY(89,80);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode(' al día     '.$dia2.''),90,90);  
    $pdf->SetXY(100,80);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('_____'),90,90); 
 //MES
$pdf->SetXY(111,80);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('mes  '.$mes2.''),90,90);
    $pdf->SetXY(119,80);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('__________'),90,90);   
//AÑO
$pdf->SetXY(140,80);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('año  '.$Year2.''),90,90);
    $pdf->SetXY(147,80);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('_____'),90,90);

//DEPENDENCIA
$pdf->SetXY(15,90);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Dependencia: '.$Dependencia.''),90,90);  
//PROGRAMA
$pdf->SetXY(15,100);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Programa: '.$Programa.''),90,90);  
//RESUMEN DE ACTIVIDADES
$pdf->SetXY(15, 110);
$pdf->SetFont('Arial', '', 10); // Propiedades de la letra
$pdf->Cell(35, 10, utf8_decode('Resumen de actividades:'), 0, 90);
$pdf->SetXY(15, 120);
$pdf->SetFont('Arial', '', 10); // Propiedades de la letra
$pdf->MultiCell(180, 6, utf8_decode($Actividades), 0, 'J');

//TOTAL DE HORAS
$pdf->SetXY(15,150);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Total de horas de este reporte: '.$horasRep.''),90,90);      
 
//TOTAL DE HORAS
$pdf->SetXY(90,150);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Total de horas acumuladas: '.$horasAcRep.''),90,90); 

    //TABLAS DE FIRMAS//
    $pdf->SetXY(15,160);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(60,60,utf8_decode (''),1,1,'',0);
 $pdf->SetXY(20,177);
 $pdf->Cell(62,40,utf8_decode ('    '.$Titular.''),90,90);
 $pdf->SetXY(20,182);
 $pdf->Cell(62,40,utf8_decode ('         '.$Puesto.''),90,90);
 $pdf->SetXY(20,183);
 $pdf->Cell(62,40,utf8_decode ('________________________'),90,90);
 $pdf->SetXY(20,190);
 $pdf->Cell(62,40,utf8_decode ('NOMBRE,PUESTO Y FIRMA'),90,90);
 $pdf->SetXY(28,195);
 $pdf->Cell(60,40,utf8_decode ('DEL SUPERVISOR'),90,90);

 
 
 
    //SELLO
  $pdf->SetXY(75,160);
  $pdf->SetFont('Arial','',10); //propiedades de la letra
  $pdf->Cell(55,60,utf8_decode (''),1,1,'C',0);
  $pdf->SetXY(95,195);
  $pdf->Cell(62,40,utf8_decode ('SELLO'),90,90);

  //FIRMA INTERESADO
  $pdf->SetXY(130,160);
  $pdf->SetFont('Arial','',10); //propiedades de la letra
  $pdf->Cell(60,20,utf8_decode ('_______________________'),1,1,'C',0);
$pdf->SetXY(135,157);
 $pdf->Cell(62,40,utf8_decode ('FIRMA DEL INTERESADO'),90,90);


 //OFICINA SERVICIO SOCIAL
 $pdf->SetXY(130,180);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(60,40,utf8_decode (' ____________________________'),1,1,'',0);
 $pdf->SetXY(130,186);
 $pdf->Cell(62,40,utf8_decode ('Vo.Bo.OFICINA SERVICIO SOCIAL'),90,90);
 $pdf->SetXY(132,190);
 $pdf->Cell(60,40,utf8_decode ('DEL INSTITUTO TECNOLOGICO'),90,90);

//LEYENDA

$pdf->SetXY(15,230);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('NOTA:   ESTE REPORTE DEBERÁ SER LLENADO, ENTREGADO CADA DOS MESES EN ORIGINAL Y '),40,40);
$pdf->Cell(50,4,utf8_decode('COPIA, DENTRO DE LOS PRIMEROS 5 DÍAS HÁBILES DE LA FECHA DE TÉRMINO DEL MISMO,  DE  '),40,40);   
$pdf->Cell(50,4,utf8_decode('LO CONTRARIO PROCEDERÁ SANCIÓN DE ACUERDO AL REGLAMENTO VIGENTE (No es válido si '),40,40);
$pdf->Cell(50,4,utf8_decode('presenta tachaduras, enmendaduras y/o correcciones).'),40,40);  
$pdf->Cell(50,4,utf8_decode(''),40,40);     
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="tecnm04.pdf"');

    $pdf->Output('D','tecnm04.pdf');


?>