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
$pdf->Cell(100,10,utf8_decode('Formato autoevaluación cualitativa del prestador Servicio Social'),1,0,'C',0);
$pdf->SetXY(135,15);
$pdf->Cell(59,8,utf8_decode ('Código: TecNM-VI-PO-002-09'),1,1,'C',0);
$pdf->SetXY(35,25);
$pdf->Cell(100,12,'Referencia a la Norma ISO 9001:2015  8.1',1,1,'C',0);
$pdf->SetXY(135,23);
$pdf->Cell(59,7,utf8_decode ('revisión: 0'),1,1,'C',0);
$pdf->SetXY(135,30);
$pdf->Cell(59,7,utf8_decode('Página ').$pdf->PageNo().'/{nb}',1,1,'C',0);
$pdf->Ln(60);

//POSICION NOMBRE DE FORMATO
$pdf->SetXY(15,45);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(30,10,utf8_decode('FORMATO DE AUTOEVALUACION CUALITATIVA DEL PRESTADOR DE SERVICIO SOCIAL '),90,90);

    //DATOS PRINCIPALES
$pdf->SetXY(15,58);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('Nombre del prestador de Servicio Social: ' .$Nombre.' ' .$ApellidoP.' '.$ApellidoM.' '),40,40);
$pdf->Cell(50,4,utf8_decode('Programa: ' .$NombreP. ' '),40,40);
$pdf->Cell(50,4,utf8_decode('Periodo de realización: ' .$fechaI. ' al ' .$fechaT. ' '),40,40);
$pdf->SetXY(15,75);
$pdf->Cell(50,4,utf8_decode('Indique a que bimestre corresponde: '),40,40);

    //BIMESTRE
    $pdf->SetXY(85,75);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(50,4,utf8_decode(' Bimestre [ ' .$bimestre. '   ]'),40,40);

        //FINAL
        $pdf->SetXY(115,75);
        $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->Cell(50,4,utf8_decode(' FINAL [ ' .$final. ' ]'),40,40);
 
        //TABLA DE OBSERVACIONES//
   $pdf->SetXY(88,81);
   $pdf->Cell(106,6,' ',1,1,'C',0);

   //POSICION NOMBRE DE FORMATO
$pdf->SetXY(115,80);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(30,10,utf8_decode('Nivel de desempeño del criterio '),90,90);


 //TABLA NIVEL DE DESEMPEÑO//
 $pdf->SetXY(15,87);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(8,10,utf8_decode(' No'),1.0,'');
$pdf->Cell(65,10,utf8_decode('               Criterios a evaluar'),1.0,'');
$pdf->Cell(22,10,utf8_decode(' Insuficiente'),1.0,'');
$pdf->Cell(22,10,utf8_decode('  Suficiente'),1.0,'');
$pdf->Cell(21,10,utf8_decode('    Bueno'),1.0,'');
$pdf->Cell(20,10,utf8_decode('   Notable'),1.0,'');
$pdf->Cell(21,10,utf8_decode(' Excelente'),1.0,'');

 //COLUMNA DOS
 //OPCIONES SEGUN EL SELECT OPTION DEL FORMULARIO DE AUTOEVALUACION
 //PREGUNTA NUMERO 1
$pdf->SetXY(15,97);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(8,15,utf8_decode(' 1'),1.0,'');
$pdf->Cell(65,15,utf8_decode(' '),1.0,'');
if ($pregunta1 == '0') {
$pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 1 PREGUNTA 1
} else {
$pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 1 PREGUNTA 1
}
if ($pregunta1 == '1') {
$pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 2 PREGUNTA 1
} else {
$pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 2 PREGUNTA 1
}
if ($pregunta1 == '2') {
$pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 3 PREGUNTA 1
} else {
$pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 3 PREGUNTA 1
}
if ($pregunta1 == '3') {
$pdf->Cell(20,15,utf8_decode('X'),1.0,''); //OPCION 4 PREGUNTA 1
} else {
$pdf->Cell(20,15,utf8_decode(' '),1.0,''); //OPCION 4 PREGUNTA 1
}
if ($pregunta1 == '4') {
$pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 5 PREGUNTA 1
} else {
$pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 5 PREGUNTA 1
}
 //COLUMNA TRES
 //PREGUNTA NUMERO 2
 $pdf->SetXY(15,112);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(8,15,utf8_decode(' 2'),1.0,'');
$pdf->Cell(65,15,utf8_decode(' '),1.0,'');
if ($pregunta2 == '0') {
$pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 1 PREGUNTA 2
} else {
$pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 1 PREGUNTA 2
}
if ($pregunta2 == '1') {
$pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 2 PREGUNTA 2
} else {
$pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 2 PREGUNTA 2
}
if ($pregunta2 == '2') {
$pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 3 PREGUNTA 2
} else {
$pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 3 PREGUNTA 2
}
if ($pregunta2 == '3') {
$pdf->Cell(20,15,utf8_decode('X'),1.0,''); //OPCION 4 PREGUNTA 2
} else {
$pdf->Cell(20,15,utf8_decode(' '),1.0,''); //OPCION 4 PREGUNTA 2
}
if ($pregunta2 == '4') {
$pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 5 PREGUNTA 2
} else {
$pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 5 PREGUNTA 2
}
 //COLUMNA CUATRO
 //PREGUNTA NUMERO 3
 $pdf->SetXY(15,127);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(8,15,utf8_decode(' 3'),1.0,'');
$pdf->Cell(65,15,utf8_decode(' '),1.0,'');
if ($pregunta3 == '0') {
$pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 1 PREGUNTA 3
} else {
$pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 1 PREGUNTA 3
}
if ($pregunta3 == '1') {
$pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 2 PREGUNTA 3
} else {
$pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 2 PREGUNTA 3
}
if ($pregunta3 == '2') {
$pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 3 PREGUNTA 3
} else {
$pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 3 PREGUNTA 3
}
if ($pregunta3 == '3') {
$pdf->Cell(20,15,utf8_decode('X'),1.0,''); //OPCION 4 PREGUNTA 3
} else {
$pdf->Cell(20,15,utf8_decode(' '),1.0,''); //OPCION 4 PREGUNTA 3
}
if ($pregunta3 == '4') {
$pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 5 PREGUNTA 3
} else {
$pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 5 PREGUNTA 3
}
 //COLUMNA CINCO
 //PREGUNTA NUMERO 4
 $pdf->SetXY(15,142);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(8,15,utf8_decode(' 4'),1.0,'');
$pdf->Cell(65,15,utf8_decode(' '),1.0,'');
if ($pregunta4 == '0') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 1 PREGUNTA 4
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 1 PREGUNTA 4
    }
    if ($pregunta4 == '1') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 2 PREGUNTA 4
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 2 PREGUNTA 4
    }
    if ($pregunta4 == '2') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 3 PREGUNTA 4
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 3 PREGUNTA 4
    }
    if ($pregunta4 == '3') {
    $pdf->Cell(20,15,utf8_decode('X'),1.0,''); //OPCION 4 PREGUNTA 4
    } else {
    $pdf->Cell(20,15,utf8_decode(' '),1.0,''); //OPCION 4 PREGUNTA 4
    }
    if ($pregunta4 == '4') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 5 PREGUNTA 4
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 5 PREGUNTA 4
    }
 //COLUMNA SEIS
 //PREGUNTA NUMERO 5
 $pdf->SetXY(15,157);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(8,15,utf8_decode(' 5'),1.0,'');
$pdf->Cell(65,15,utf8_decode(' '),1.0,'');
if ($pregunta5 == '0') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 1 PREGUNTA 5
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 1 PREGUNTA 5
    }
    if ($pregunta5 == '1') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 2 PREGUNTA 5
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 2 PREGUNTA 5
    }
    if ($pregunta5 == '2') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 3 PREGUNTA 5
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 3 PREGUNTA 5
    }
    if ($pregunta5 == '3') {
    $pdf->Cell(20,15,utf8_decode('X'),1.0,''); //OPCION 4 PREGUNTA 5
    } else {
    $pdf->Cell(20,15,utf8_decode(' '),1.0,''); //OPCION 4 PREGUNTA 5
    }
    if ($pregunta5 == '4') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 5 PREGUNTA 5
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 5 PREGUNTA 5
    }
 //COLUMNA SIETE
 //PREGUNTA NUMERO 6
 $pdf->SetXY(15,172);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(8,15,utf8_decode(' 6'),1.0,'');
$pdf->Cell(65,15,utf8_decode(' '),1.0,'');
if ($pregunta6 == '0') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 1 PREGUNTA 6
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 1 PREGUNTA 6
    }
    if ($pregunta6 == '1') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 2 PREGUNTA 6
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 2 PREGUNTA 6
    }
    if ($pregunta6 == '2') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 3 PREGUNTA 6
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 3 PREGUNTA 6
    }
    if ($pregunta6 == '3') {
    $pdf->Cell(20,15,utf8_decode('X'),1.0,''); //OPCION 4 PREGUNTA 6
    } else {
    $pdf->Cell(20,15,utf8_decode(' '),1.0,''); //OPCION 4 PREGUNTA 6
    }
    if ($pregunta6 == '4') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 5 PREGUNTA 6
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 5 PREGUNTA 6
    }
 //COLUMNA OCHO
 //PREGUNTA NUMERO 7
 $pdf->SetXY(15,187);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(8,15,utf8_decode(' 7'),1.0,'');
$pdf->Cell(65,15,utf8_decode(' '),1.0,'');
if ($pregunta7 == '0') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 1 PREGUNTA 7
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 1 PREGUNTA 7
    }
    if ($pregunta7 == '1') {
    $pdf->Cell(22,15,utf8_decode('X'),1.0,''); //OPCION 2 PREGUNTA 7
    } else {
    $pdf->Cell(22,15,utf8_decode(' '),1.0,''); //OPCION 2 PREGUNTA 7
    }
    if ($pregunta7 == '2') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 3 PREGUNTA 7
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 3 PREGUNTA 7
    }
    if ($pregunta7 == '3') {
    $pdf->Cell(20,15,utf8_decode('X'),1.0,''); //OPCION 4 PREGUNTA 7
    } else {
    $pdf->Cell(20,15,utf8_decode(' '),1.0,''); //OPCION 4 PREGUNTA 7
    }
    if ($pregunta7 == '4') {
    $pdf->Cell(21,15,utf8_decode('X'),1.0,''); //OPCION 5 PREGUNTA 7
    } else {
    $pdf->Cell(21,15,utf8_decode(' '),1.0,''); //OPCION 5 PREGUNTA 7
    }

//DATOS COLUMNAS//
 //DATOS COLUMNA DOS
 $pdf->SetXY(23,99);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('    Cumplí en tiempo y forma con las'),40,40);
 $pdf->Cell(50,4,utf8_decode('actividades encomendadas alcanzando'),40,40);
 $pdf->Cell(50,4,utf8_decode('                   los objetivos.'),40,40);

 //DATOS COLUMNA TRES
 $pdf->SetXY(23,115);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('     Trabajé en equipo y me adapté a '),40,40);
 $pdf->Cell(50,4,utf8_decode('              nuevas situaciones.'),40,40);
 
 //DATOS COLUMNA CUATRO
 $pdf->SetXY(23,130);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('  Mostré liderazgo en las actividades'),40,40);
 $pdf->Cell(50,4,utf8_decode('                  encomendadas.'),40,40);

 //DATOS COLUMNA CINCO
 $pdf->SetXY(23,146);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('     Organicé mi tiempo y trabajé de'),40,40);
 $pdf->Cell(50,4,utf8_decode('               manera proactiva.'),40,40);

 //DATOS COLUMNA SEIS
 $pdf->SetXY(23,159);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('   interpreté la realizad y me sensibilicé'),40,40);
 $pdf->Cell(50,4,utf8_decode('aportando soluciones a la problemática'),40,40);
 $pdf->Cell(50,4,utf8_decode('   con la actividad complementaria.'),40,40);

 //DATOS COLUMNA SIETE
 $pdf->SetXY(23,174);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode(' Realicé sugerencias innovadoras para '),40,40);
 $pdf->Cell(50,4,utf8_decode('beneficio o mejora en el programa en el '),40,40);
 $pdf->Cell(50,4,utf8_decode('                   que participa.'),40,40);

 //DATOS COLUMNA OCHO
 $pdf->SetXY(23,188);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(50,4,utf8_decode('    Tuve iniciativa para ayudar en las '),40,40);
 $pdf->Cell(50,4,utf8_decode('     actividades y mostré espíritu de '),40,40);
 $pdf->Cell(50,4,utf8_decode('                       servicio.'),40,40);


   //TABLA DE OBSERVACIONES//
   $pdf->SetXY(15,202);
   $pdf->Cell(179,60,' ',1,1,'C',0);

//POSICION NOMBRE DE FORMATO
$pdf->SetXY(15,204);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
 $pdf->Cell(30,10,utf8_decode('Observaciones:_____________________________________________________________________________ '),90,90);
 $pdf->Cell(30,10,utf8_decode('___________________________________________________________________________________________ '),90,90);

  // FIRMAS//
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->SetXY(45,223);
$pdf->Cell(62,40,utf8_decode ('                     '.$Nombre.' '.$ApellidoP.' '.$ApellidoM.', '.$NoControl.''),90,90);
$pdf->SetXY(45,225);
$pdf->Cell(62,40,utf8_decode ('_____________________________________________________'),90,90);
$pdf->SetXY(45,229);
$pdf->Cell(62,40,utf8_decode ('Nombre, No. de control y firma del prestador de servicio social'),90,90);
$pdf->SetXY(15,236.8);
$pdf->Cell(60,40,utf8_decode ('c.c.p Oficina de Servicio Social'),90,90);
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="tecnm09.pdf"');

    $pdf->Output('D','tecnm09.pdf');
?>