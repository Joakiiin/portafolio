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
$pdf->Cell(65,8,utf8_decode ('Código: TecNM-VI-PO-002-07'),1,1,'C',0);
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
    $pdf->Cell(35,10,utf8_decode('INSTITUTO TECNOLOGICO  _______________________________ '),90,90);

    //SALTO DE LINEA //CARTA DE ASIGNACION
$pdf->SetXY(80,45);
$pdf->Cell(50,4,utf8_decode('CARTA DE ASIGNACION '),40,40);

   //SALTO DE LINEA //DATOS DEL PRESTANTE
   $pdf->SetXY(15,55);
   $pdf->SetFont('Arial','',10); //propiedades de la letra
   $pdf->Cell(50,4,utf8_decode('DATOS DEL PRESTANTE DE SERVICIO SOCIAL '),40,40);


    //TABLA DE DATOS PERSONALES//
    $pdf->SetXY(15,60);
$pdf->Cell(180,45,' ',1,1,'C',0);

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


//SALTO DE LINEA //DATOS DEL PROGRAMA
$pdf->SetXY(15,120);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('DATOS DEL PROGRAMA '),40,40);


//TABLA DE DATOS DEL PROGRAMA//
$pdf->SetXY(15,125);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(80,25,utf8_decode(''),1.0,'');
$pdf->Cell(100,25,utf8_decode(''),1.0,'');
 //COLUMNA DOS
 $pdf->SetXY(15,150);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(80,40,utf8_decode(' '),1.0,'');
$pdf->Cell(100,40,utf8_decode(' '),1.0,'');
 //COLUMNA TRES
 $pdf->SetXY(15,190);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(180,30,utf8_decode(' '),1.0,'');


//DATOS DE TABLA//
//NOMBRE
$pdf->SetXY(15,125);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('NOMBRE '),40,40);
//OBJETIVO
$pdf->SetXY(95,125);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('OBJETIVO '),40,40);
//ACTIVIDADES A DESARROLLAR
$pdf->SetXY(95,150);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('ACTIVIDADES A DESARROLLAR:'),40,40);
$pdf->SetXY(15,160);
$pdf->Cell(50,4,utf8_decode('1.-'),40,40);
$pdf->Cell(50,4,utf8_decode('2.-'),40,40);
$pdf->Cell(50,4,utf8_decode('3.-'),40,40);
$pdf->Cell(50,4,utf8_decode('4.-'),40,40);
$pdf->Cell(50,4,utf8_decode('5.-'),40,40);
$pdf->Cell(50,4,utf8_decode('6.-'),40,40);
//TIPO DE ACTIVIDADES
$pdf->SetXY(15,150);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('TIPO DE ACTIVIDADES: '),40,40);
$pdf->SetXY(95,160);
$pdf->Cell(50,4,utf8_decode('ADMINISTRATIVAS    (    )'),40,40);
$pdf->Cell(50,4,utf8_decode('TECNICAS                   (    )'),40,40);
$pdf->Cell(50,4,utf8_decode('ASESORIA                   (    )'),40,40);
$pdf->Cell(50,4,utf8_decode('INVESTIGACION         (    )'),40,40);
$pdf->Cell(50,4,utf8_decode('DOCENTES                 (    )'),40,40);
$pdf->Cell(50,4,utf8_decode('OTRAS                         (    )'),40,40);

//LEYENDA DENTRO DE TABLA//
$pdf->SetXY(15,193);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('EL SERVICIO SOCIAL LO REALIZARA DENTRO DE LAS INSTALACIONES DE LA DEPENDENCIA: :'),40,40);

//SI
$pdf->SetXY(40,200);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode(' SI [   ] '),40,40);
//NO
$pdf->SetXY(80,200);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode(' NO [   ] '),40,40);

//DONDE
$pdf->SetXY(15,208);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode(' DONDE:  '),40,40);

//RESPONSABLE DEL PROGRAMA
$pdf->SetXY(10,225);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode(' RESPONSABLE DEL PROGRAMA:  '),40,40);

//JEFE DE LA OFICINA DE SERVICIO SOCIAL
$pdf->SetXY(10,235);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode(' JEFE DE LA OFICINA DE SERVICIO SOCIAL:  '),40,40);

//FECHA//
$pdf->SetXY(10,245);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('FECHA'),90,90);
//DIA
$pdf->SetXY(25,245);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Día______'),90,90);
 //MES
$pdf->SetXY(45,245);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('mes__________'),90,90);  
//AÑO
$pdf->SetXY(75,245);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('año__________'),90,90);




    $pdf->Output();


?>