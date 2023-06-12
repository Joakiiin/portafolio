<?php
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
$pdf->Cell(65,8,utf8_decode ('Código: TecNM-VI-PO-002-06'),1,1,'C',0);
$pdf->SetXY(35,25);
$pdf->Cell(93.8,12,'Referencia a la Norma ISO 9001:2015  8.1',1,1,'C',0);
$pdf->SetXY(129,23);
$pdf->Cell(65,7,utf8_decode ('revisión: 0'),1,1,'C',0);
$pdf->SetXY(129,30);
$pdf->Cell(65,7,utf8_decode('Página ').$pdf->PageNo().'/{nb}',1,1,'C',0);
$pdf->Ln(60);

//POSICION NOMBRE DE FORMATO
$pdf->SetXY(50,40);
//TITULO
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('INSTITUTO TECNOLOGICO DE _______________ '),90,90);

    //SALTO DE LINEA //POSICION NOMBRE DE FORMATO
$pdf->SetXY(70,50);
$pdf->Cell(50,4,utf8_decode('TARJETA DE CONTROL DE  '),40,40);
//SALTO DE LINEA
$pdf->Ln(5);
    //SALTO DE LINEA //POSICION NOMBRE DE FORMATO
    $pdf->SetXY(80,55);
    $pdf->Cell(50,4,utf8_decode('SERVICIO SOCIAL '),40,40);

    //TABLA DE DATOS PERSONALES//
    $pdf->SetXY(15,60);
$pdf->Cell(179,45,' ',1,1,'C',0);

//DATOS DE TABLA//
//NOMBRE
 $pdf->SetXY(15,65);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('NOMBRE:_______________________________________ '),40,40);
//EDAD
$pdf->SetXY(110,65);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('EDAD:_______ '),40,40);
//SEXO
$pdf->SetXY(140,65);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('SEXO:  M (   )     H (    ) '),40,40);
//DOMICILIO
$pdf->SetXY(15,75);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('DOMICILIO:_____________________________________________________ '),40,40);
//TEL
$pdf->SetXY(140,75);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('TEL:_________________ '),40,40);
//CARRERA
$pdf->SetXY(15,85);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('CARRERA:________________________________________________ '),40,40);
//SEMESTRE
$pdf->SetXY(130,85);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('SEMESTRE:_________________ '),40,40);
//NO DE CONTROL
$pdf->SetXY(15,95);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('No DE CONTROL:___________________________ '),40,40);
//CREDITOS APROBADOS
$pdf->SetXY(100,95);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('CREDITOS APROBADOS_____________% '),40,40);

//PERIODO//
$pdf->SetXY(50,120);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('PERIODO:'),90,90);
//PERIODO ENERO-JUNIO//
$pdf->SetXY(75,120);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('ENERO-JUNIO (           )'),90,90);

//PERIODO JULIO-DICIEMBRE//
$pdf->SetXY(125,120);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('JULIO-DICIEMBRE (           )'),90,90);



 //TABLA DE PERIODO//
 $pdf->Ln();
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(30,10,utf8_decode('INICIO'),1.0,'C');
$pdf->Cell(40,10,utf8_decode('TERMINACION'),1.0,'C');
$pdf->Cell(40,10,utf8_decode('PROGRAMA'),1.0,'C');
$pdf->Cell(40,10,utf8_decode('DEPENDENCIA'),1.0,'C');
$pdf->Cell(40,10,utf8_decode('HRS.ACREDITADAS'),1.0,'C');
 //COLUMNA DOS
 $pdf->Ln();
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(30,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');
 //COLUMNA TRES
 $pdf->Ln();
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(30,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');
 //COLUMNA CUATRO
 $pdf->Ln();
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(30,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');
 //COLUMNA CINCO
 $pdf->Ln();
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(30,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');
$pdf->Cell(40,10,utf8_decode(' '),1.0,'');


//SALTO DE PAGINA //
$pdf->AddPage();



// ENCABEZADO PAGINA 2//
//TABLAS
$pdf->SetXY(15,15);
$pdf->Cell(20,22, $pdf->Image('img/SGC.jpg', $pdf->GetX(), $pdf->GetY(),20,22),1);
$pdf->Cell(93.8,10,utf8_decode('Formato evaluación cualitativa del prestador Servicio Social'),1,0,'C',0);
$pdf->SetXY(129,15);
$pdf->Cell(65,8,utf8_decode ('Código: TecNM-VI-PO-002-06'),1,1,'C',0);
$pdf->SetXY(35,25);
$pdf->Cell(93.8,12,'Referencia a la Norma ISO 9001:2015  8.1',1,1,'C',0);
$pdf->SetXY(129,23);
$pdf->Cell(65,7,utf8_decode ('revisión: 0'),1,1,'C',0);
$pdf->SetXY(129,30);
$pdf->Cell(65,7,utf8_decode('Página ').$pdf->PageNo().'/{nb}',1,1,'C',0);
$pdf->Ln(60);

//CONTROL DE EXPEDIENTE//
$pdf->SetXY(75,40);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode(' CONTROL DE EXPEDIENTE '),90,90);

   //TABLA CONTROL DE EXPEDIENTE//
   $pdf->SetXY(15,50);
   $pdf->Cell(179,80,' ',1,1,'C',0);


//DATOS TABLA CONTROL EXPEDIENTE//
   //SOLICITUD
$pdf->SetXY(15,55);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('SOLICITUD                                   [     ] '),40,40);
//REPORTES BIMESTRALES
$pdf->SetXY(80,55);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('REPORTES BIMESTRALES  [           ]     [_____]   [_____]   [_____]    '),40,40);
  //CURSO DE INDUCCION
  $pdf->SetXY(15,65);
  $pdf->SetFont('Arial','',10); //propiedades de la letra
  $pdf->Cell(50,4,utf8_decode('CURSO DE INDUCCION              [     ] '),40,40);
  //REPORTE FINAL
  $pdf->SetXY(80,65);
  $pdf->SetFont('Arial','',10); //propiedades de la letra
  $pdf->Cell(50,4,utf8_decode('REPORTE FINAL                    [           ]      '),40,40);
  //CARTA DE ACEPTACION
$pdf->SetXY(15,75);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('CARTA DE ACEPTTACION          [     ] '),40,40);
//EVALUACION CUALITATIVA
$pdf->SetXY(80,75);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('EVALUACION CUALITATIVA  [           ]     [_____]   [_____]   [_____]    '),40,40); 
 //PLAN DE TRABAJO
 $pdf->SetXY(15,85);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('PLAN DE TRABAJO                      [     ] '),40,40);
 //AUTOEVALUACION CUALITATIVA
 $pdf->SetXY(85,85);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('AUTOEVALUACION           [           ]     [_____]   [_____]   [_____]    '),40,40);  
 $pdf->Cell(50,4,utf8_decode(' CUALITATIVA     '),40,40);  
//CONSTANCIA DE TERMINACION
$pdf->SetXY(15,95);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('CONSTANCIA DE                         [     ] '),40,40);
$pdf->Cell(50,4,utf8_decode(' TERMINACION     '),40,40);  
//EVALUACION DE LAS ACTIVIDADES
$pdf->SetXY(85,95);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('EVALUACION DE LAS       [           ]     [_____]   [_____]   [_____]    '),40,40);  
$pdf->Cell(50,4,utf8_decode(' ACTIVIDADES     '),40,40);  
//CARTA DE TERMINACION
$pdf->SetXY(80,110);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('CARTA DE TERMINACION     [           ]     FECHA   [_____]    '),40,40); 
//CONSTANCIA OFICIAL
$pdf->SetXY(80,120);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('CONSTANCIA OFICIAL           [           ]     FECHA   [_____]    '),40,40); 

   //TABLA OBSERVACIONES//
$pdf->SetXY(15,140);
$pdf->Cell(179,50,' OBSERVACIONES:',1,1,'L',0);


    $pdf->Output();


?>