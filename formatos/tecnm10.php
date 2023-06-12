<?php
require('fpdf/fpdf.php');
$Nombre=$_POST['NombreA'];
$ApellidoP=$_POST['apellidoPA'];
$ApellidoM=$_POST['apellidoMA'];
$NombreP=$_POST['ProgramaA'];
$NoControl = $_POST['nocontrolA'];
$fechaI= $_POST['fechaIA'];
$fechaT= $_POST['fechaTA'];
$bimestre= $_POST['bimestre'];
$final = '';
if (isset($_POST['final']) && $_POST['final'] == 'X') {
  $final = 'X';
}
$pregunta1 = $_POST['pregunta1'];
$pregunta2 = $_POST['pregunta2'];
$pregunta3 = $_POST['pregunta3'];
$pregunta4 = $_POST['pregunta4'];
$pregunta5 = $_POST['pregunta5'];
$pregunta6 = $_POST['pregunta6'];
$pregunta7 = $_POST['pregunta7'];
$pregunta8 = $_POST['pregunta8'];
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
$pdf->Cell(100,10,utf8_decode(' '),1,0,'C',0);
$pdf->SetXY(135,15);
$pdf->Cell(59,8,utf8_decode ('Código: TecNM-VI-PO-002-10'),1,1,'C',0);
$pdf->SetXY(35,25);
$pdf->Cell(100,12,'Referencia a la Norma ISO 9001:2015  8.1',1,1,'C',0);
$pdf->SetXY(135,23);
$pdf->Cell(59,7,utf8_decode ('revisión: 0'),1,1,'C',0);
$pdf->SetXY(135,30);
$pdf->Cell(59,7,utf8_decode('Página ').$pdf->PageNo().'/{nb}',1,1,'C',0);
$pdf->Ln(60);

//POSICION NOMBRE DE FORMATO
$pdf->SetXY(38,13);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(30,10,utf8_decode('Formato de evaluación de las actividades por el prestador '),90,90);
    $pdf->SetXY(66,17);
    $pdf->Cell(30,10,utf8_decode(' de Servicio Social '),90,90);
//POSICION NOMBRE DE FORMATO
$pdf->SetXY(15,38);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(30,10,utf8_decode('FORMATO DE EVALUACIÓN DE LAS ACTIVIDADES POR EL PRESTADOR DE SERVICIO SOCIAL '),90,90);

    //DATOS PRINCIPALES
$pdf->SetXY(15,48);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('Nombre del prestador de Servicio Social: ' .$Nombre.' ' .$ApellidoP.' '.$ApellidoM.' '),40,40);
$pdf->Cell(50,4,utf8_decode('Programa: ' .$NombreP. ' '),40,40);
$pdf->Cell(50,4,utf8_decode('Periodo de realización: ' .$fechaI. ' al ' .$fechaT. ' '),40,40);
$pdf->SetXY(15,63);
$pdf->Cell(50,4,utf8_decode('Indique a que bimestre corresponde: '),40,40);

    //BIMESTRE
    $pdf->SetXY(85,63);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(50,4,utf8_decode(' Bimestre [ ' .$bimestre. ' ]'),40,40);

        //FINAL
        $pdf->SetXY(115,63);
        $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->Cell(50,4,utf8_decode(' FINAL [ ' .$final. ' ]'),40,40);
 
        //TABLA DE OBSERVACIONES//
   $pdf->SetXY(87.5,70);
   $pdf->Cell(106,6,' ',1,1,'C',0);

   //POSICION NOMBRE DE FORMATO
$pdf->SetXY(110,68);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(30,10,utf8_decode('Nivel de desempeño del criterio '),90,90);


 //TABLA NIVEL DE DESEMPEÑO//
 $pdf->SetXY(15,76);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(6,10,utf8_decode('No'),1.0,'');
$pdf->Cell(66.5,10,utf8_decode('               Criterios a evaluar'),1.0,'');
$pdf->Cell(22,10,utf8_decode(' Insuficiente'),1.0,'');
$pdf->Cell(22,10,utf8_decode('  Suficiente'),1.0,'');
$pdf->Cell(21,10,utf8_decode('    Bueno'),1.0,'');
$pdf->Cell(20,10,utf8_decode('   Notable'),1.0,'');
$pdf->Cell(21,10,utf8_decode(' Excelente'),1.0,'');

 //COLUMNA DOS
  //OPCIONES SEGUN EL SELECT OPTION DEL FORMULARIO DE ACTIVIDADES
 //PREGUNTA NUMERO 1
 $pdf->SetXY(15,86);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(6,15,utf8_decode(' 1'),1.0,'');
$pdf->Cell(66.5,15,utf8_decode(' '),1.0,'');
if ($pregunta1 == '1') {
$pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 1 PREGUNTA 1
} else {
$pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 1 PREGUNTA 1
}
if ($pregunta1 == '2') {
$pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 2 PREGUNTA 1
} else {
$pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 2 PREGUNTA 1
}
if ($pregunta1 == '3') {
$pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 3 PREGUNTA 1
} else {
$pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 3 PREGUNTA 1
}
if ($pregunta1 == '4') {
$pdf->Cell(20,15,utf8_decode('X'),1.0,''); //OPCION 4 PREGUNTA 1
} else {
$pdf->Cell(20,15,utf8_decode(' '),1.0,''); //OPCION 4 PREGUNTA 1
}
if ($pregunta1 == '5') {
$pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 5 PREGUNTA 1
} else {
$pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 5 PREGUNTA 1
}

 //COLUMNA TRES
  //PREGUNTA NUMERO 2
 $pdf->SetXY(15,101);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(6,15,utf8_decode(' 2'),1.0,'');
$pdf->Cell(66.5,15,utf8_decode(' '),1.0,'');
if ($pregunta2 == '1') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 1 PREGUNTA 2
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 1 PREGUNTA 2
    }
    if ($pregunta2 == '2') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 2 PREGUNTA 2
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 2 PREGUNTA 2
    }
    if ($pregunta2 == '3') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 3 PREGUNTA 2
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 3 PREGUNTA 2
    }
    if ($pregunta2 == '4') {
    $pdf->Cell(20,15,utf8_decode('X'),1.0,''); //OPCION 4 PREGUNTA 2
    } else {
    $pdf->Cell(20,15,utf8_decode(' '),1.0,''); //OPCION 4 PREGUNTA 2
    }
    if ($pregunta2 == '5') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 5 PREGUNTA 2
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 5 PREGUNTA 2
    }
    
 //COLUMNA CUATRO
  //PREGUNTA NUMERO 3
 $pdf->SetXY(15,116);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(6,15,utf8_decode(' 3'),1.0,'');
$pdf->Cell(66.5,15,utf8_decode(' '),1.0,'');
if ($pregunta3 == '1') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 1 PREGUNTA 3
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 1 PREGUNTA 3
    }
    if ($pregunta3 == '2') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 2 PREGUNTA 3
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 2 PREGUNTA 3
    }
    if ($pregunta3 == '3') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 3 PREGUNTA 3
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 3 PREGUNTA 3
    }
    if ($pregunta3 == '4') {
    $pdf->Cell(20,15,utf8_decode('X'),1.0,''); //OPCION 4 PREGUNTA 3
    } else {
    $pdf->Cell(20,15,utf8_decode(' '),1.0,''); //OPCION 4 PREGUNTA 3
    }
    if ($pregunta3 == '5') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 5 PREGUNTA 3
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 5 PREGUNTA 3
    }
    
 //COLUMNA CINCO
  //PREGUNTA NUMERO 4
 $pdf->SetXY(15,131);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(6,15,utf8_decode(' 4'),1.0,'');
$pdf->Cell(66.5,15,utf8_decode(' '),1.0,'');
if ($pregunta4 == '1') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 1 PREGUNTA 4
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 1 PREGUNTA 4
    }
    if ($pregunta4 == '2') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 2 PREGUNTA 4
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 2 PREGUNTA 4
    }
    if ($pregunta4 == '3') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 3 PREGUNTA 4
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 3 PREGUNTA 4
    }
    if ($pregunta4 == '4') {
    $pdf->Cell(20,15,utf8_decode('X'),1.0,''); //OPCION 4 PREGUNTA 4
    } else {
    $pdf->Cell(20,15,utf8_decode(' '),1.0,''); //OPCION 4 PREGUNTA 4
    }
    if ($pregunta4 == '5') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 5 PREGUNTA 4
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 5 PREGUNTA 4
    }
    
 //COLUMNA SEIS
  //PREGUNTA NUMERO 5
 $pdf->SetXY(15,146);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(6,15,utf8_decode(' 5'),1.0,'');
$pdf->Cell(66.5,15,utf8_decode(' '),1.0,'');
if ($pregunta5 == '1') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 1 PREGUNTA 5
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 1 PREGUNTA 5
    }
    if ($pregunta5 == '2') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 2 PREGUNTA 5
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 2 PREGUNTA 5
    }
    if ($pregunta5 == '3') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 3 PREGUNTA 5
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 3 PREGUNTA 5
    }
    if ($pregunta5 == '4') {
    $pdf->Cell(20,15,utf8_decode('X'),1.0,''); //OPCION 4 PREGUNTA 5
    } else {
    $pdf->Cell(20,15,utf8_decode(' '),1.0,''); //OPCION 4 PREGUNTA 5
    }
    if ($pregunta5 == '5') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 5 PREGUNTA 5
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 5 PREGUNTA 5
    }
    
 //COLUMNA SIETE
  //PREGUNTA NUMERO 6
 $pdf->SetXY(15,161);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(6,21,utf8_decode(' 6'),1.0,'');
$pdf->Cell(66.5,21,utf8_decode(' '),1.0,'');
if ($pregunta6 == '1') {
    $pdf->Cell(22,21,utf8_decode('X'),1.0,''); //OPCION 1 PREGUNTA 6
    } else {
    $pdf->Cell(22,21,utf8_decode(' '),1.0,''); //OPCION 1 PREGUNTA 6
    }
    if ($pregunta6 == '2') {
    $pdf->Cell(22,21,utf8_decode('X'),1.0,''); //OPCION 2 PREGUNTA 6
    } else {
    $pdf->Cell(22,21,utf8_decode(' '),1.0,''); //OPCION 2 PREGUNTA 6
    }
    if ($pregunta6 == '3') {
    $pdf->Cell(21,21,utf8_decode('X'),1.0,''); //OPCION 3 PREGUNTA 6
    } else {
    $pdf->Cell(21,21,utf8_decode(' '),1.0,''); //OPCION 3 PREGUNTA 6
    }
    if ($pregunta6 == '4') {
    $pdf->Cell(20,21,utf8_decode('X'),1.0,''); //OPCION 4 PREGUNTA 6
    } else {
    $pdf->Cell(20,21,utf8_decode(' '),1.0,''); //OPCION 4 PREGUNTA 6
    }
    if ($pregunta6 == '5') {
    $pdf->Cell(21,21,utf8_decode('X'),1.0,''); //OPCION 5 PREGUNTA 6
    } else {
    $pdf->Cell(21,21,utf8_decode(' '),1.0,''); //OPCION 5 PREGUNTA 6
    }
    
 //COLUMNA OCHO
  //PREGUNTA NUMERO 7
 $pdf->SetXY(15,182);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(6,22,utf8_decode(' 7'),1.0,'');
$pdf->Cell(66.5,22,utf8_decode(' '),1.0,'');
if ($pregunta7 == '1') {
    $pdf->Cell(22,22,utf8_decode('X'),1.0,''); //OPCION 1 PREGUNTA 7
    } else {
    $pdf->Cell(22,22,utf8_decode(' '),1.0,''); //OPCION 1 PREGUNTA 7
    }
    if ($pregunta7 == '2') {
    $pdf->Cell(22,22,utf8_decode('X'),1.0,''); //OPCION 2 PREGUNTA 7
    } else {
    $pdf->Cell(22,22,utf8_decode(' '),1.0,''); //OPCION 2 PREGUNTA 7
    }
    if ($pregunta7 == '3') {
    $pdf->Cell(21,22,utf8_decode('X'),1.0,''); //OPCION 3 PREGUNTA 7
    } else {
    $pdf->Cell(21,22,utf8_decode(' '),1.0,''); //OPCION 3 PREGUNTA 7
    }
    if ($pregunta7 == '4') {
    $pdf->Cell(20,22,utf8_decode('X'),1.0,''); //OPCION 4 PREGUNTA 7
    } else {
    $pdf->Cell(20,22,utf8_decode(' '),1.0,''); //OPCION 4 PREGUNTA 7
    }
    if ($pregunta7 == '5') {
    $pdf->Cell(21,22,utf8_decode('X'),1.0,''); //OPCION 5 PREGUNTA 7
    } else {
    $pdf->Cell(21,22,utf8_decode(' '),1.0,''); //OPCION 5 PREGUNTA 7
    }
    
 //COLUMNA NUEVE
  //PREGUNTA NUMERO 8
 $pdf->SetXY(15,204);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(6,15,utf8_decode(' 8'),1.0,'');
$pdf->Cell(66.5,15,utf8_decode(' '),1.0,'');
if ($pregunta8 == '1') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 1 PREGUNTA 8
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 1 PREGUNTA 8
    }
    if ($pregunta8 == '2') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 2 PREGUNTA 8
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 2 PREGUNTA 8
    }
    if ($pregunta8 == '3') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 3 PREGUNTA 8
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 3 PREGUNTA 8
    }
    if ($pregunta8 == '4') {
    $pdf->Cell(20,15,utf8_decode('X'),1.0,''); //OPCION 4 PREGUNTA 8
    } else {
    $pdf->Cell(20,15,utf8_decode(' '),1.0,''); //OPCION 4 PREGUNTA 8
    }
    if ($pregunta8 == '5') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 5 PREGUNTA 8
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 5 PREGUNTA 8
    }
    

//DATOS COLUMNAS//
 //DATOS COLUMNA DOS
 $pdf->SetXY(23,89);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('¿Consideras importante la realización'),40,40);
 $pdf->Cell(50,4,utf8_decode('              del servicio social?'),40,40);
 

 //DATOS COLUMNA TRES
 $pdf->SetXY(23,103);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('¿Consideras que las atividades que '),40,40);
 $pdf->Cell(50,4,utf8_decode(' realizas son pertinentes a los fines del'),40,40);
 $pdf->Cell(50,4,utf8_decode('                  servicio social?'),40,40);
 //DATOS COLUMNA CUATRO
 $pdf->SetXY(23,118);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode(' ¿Consideras que las actividades que'),40,40);
 $pdf->Cell(50,4,utf8_decode(' realizaste contribuyen a tu formación'),40,40);
 $pdf->Cell(50,4,utf8_decode('                       integral?'),40,40);
 //DATOS COLUMNA CINCO
 $pdf->SetXY(23,135);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('   ¿Contribuiste en actividades de '),40,40);
 $pdf->Cell(50,4,utf8_decode('      beneficio social comunitario?'),40,40);

 //DATOS COLUMNA SEIS
 $pdf->SetXY(23,149);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('    ¿Contribuiste en actividades de'),40,40);
 $pdf->Cell(50,4,utf8_decode('    protección al medio ambiente?'),40,40);

 //DATOS COLUMNA SIETE
 $pdf->SetXY(23,162);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('       ¿Cómo consideras que las '),40,40);
 $pdf->Cell(50,4,utf8_decode('  competencias que adquiriste en la'),40,40);
 $pdf->Cell(50,4,utf8_decode('   escuela contribuyeron a atender'),40,40);
 $pdf->Cell(50,4,utf8_decode('   asertivamente las actividades de'),40,40);
 $pdf->Cell(50,4,utf8_decode('               servicio social?'),40,40);

 //DATOS COLUMNA OCHO
 $pdf->SetXY(23,183);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('¿Consideras que sería factible continuar'),40,40);
 $pdf->Cell(50,4,utf8_decode('con ese proyecto de servico social a un '),40,40);
 $pdf->Cell(50,4,utf8_decode(' proyecto de residencias profesionales '),40,40);
 $pdf->Cell(50,4,utf8_decode('proyecto integrado, proyecto de investi-'),40,40);
 $pdf->Cell(50,4,utf8_decode('    gación o desarrollo tecnológico?'),40,40);
 
 //DATOS COLUMNA NUEVE
 $pdf->SetXY(23,206);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('  ¿Recomendarías a otro estudiante'),40,40);
 $pdf->Cell(50,4,utf8_decode('    realizar su servicio social en la  '),40,40);
 $pdf->Cell(50,4,utf8_decode('   dependencia donde lo realizaste? '),40,40);




   //TABLA DE OBSERVACIONES//
   $pdf->SetXY(15,219);
   $pdf->Cell(178.5,40,' ',1,1,'C',0);

//POSICION NOMBRE DE FORMATO
$pdf->SetXY(15,220);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
 $pdf->Cell(30,10,utf8_decode('Observaciones:____________________________________________________________________________ '),90,90);
 $pdf->Cell(30,10,utf8_decode(' ________________________________________________________________________________________ '),90,90);
 
 // FIRMAS//
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->SetXY(47,223);
$pdf->Cell(62,40,utf8_decode ('                     '.$Nombre.' '.$ApellidoP.' '.$ApellidoM.', '.$NoControl.''),90,90);
$pdf->SetXY(47,225);
$pdf->Cell(62,40,utf8_decode ('_____________________________________________________'),90,90);
$pdf->SetXY(50,229);
$pdf->Cell(62,40,utf8_decode ('Nombre, No. de control y firma del prestador de servicio social'),90,90);

$pdf->SetXY(15,236);
$pdf->Cell(60,40,utf8_decode ('c.c.p Oficina de Servicio Social'),90,90);
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="tecnm10.pdf"');

    $pdf->Output('D','tecnm10.pdf');


?>