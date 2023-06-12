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
    //TABLAS
    $pdf->SetXY(15,15);
    $pdf->Cell(20,22, $pdf->Image('img/SGC.jpg', $pdf->GetX(), $pdf->GetY(),20,22),1);
    $pdf->Cell(93.8,10,utf8_decode('Formato evaluación cualitativa del prestador Servicio Social'),1,0,'C',0);
    $pdf->SetXY(129,15);
    $pdf->Cell(65,8,utf8_decode ('Código: TecNM-VI-PO-002-01'),1,1,'C',0);
    $pdf->SetXY(35,25);
    $pdf->Cell(93.8,12,'Referencia a la Norma ISO 9001:2015  8.1',1,1,'C',0);
    $pdf->SetXY(129,23);
    $pdf->Cell(65,7,utf8_decode ('revisión: 0'),1,1,'C',0);
    $pdf->SetXY(129,30);
    $pdf->Cell(65,7,utf8_decode('Página ').$pdf->PageNo().'/{nb}',1,1,'C',0);
    $pdf->Ln(60);
    
    
    //POSICION NOMBRE DE FORMATO
    $pdf->SetXY(50,42);
    //TITULO
    $pdf->SetFont('Arial','B',10); //propiedades de la letra
        $pdf->Cell(35,10,utf8_decode('DEPARTAMENTO DE GESTIÓN TECNOLÓGICA Y VINCULACIÓN '),90,90);
    
        //SALTO DE LINEA //POSICION NOMBRE DE FORMATO
    $pdf->SetXY(70,50);
    $pdf->Cell(50,4,utf8_decode('SOLICITUD DE  SERVICIO SOCIAL '),40,40);
    //SALTO DE LINEA
    $pdf->Ln(5);
    //CELDA (ANCHO, LARGO, CONTENIDO, BORDE, SALTO)
    
    // posicion de foto
    $pdf->Image('img/foto.png',160,40,30); //imagen(archivo, png/jpg || x,y,tamaño)
    
    //POSICION DATOS PERSONALES//
    $pdf->SetXY(15,60);
    $pdf->SetFont('Arial','B',10); //propiedades de la letra
        $pdf->Cell(35,10,('DATOS PERSONALES '),90,90);
    //Nombre completo y sexo 
        $pdf->SetXY(15,70);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->Cell(35,10,('Nombre completo: '),90,90);
        //sexo
        $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->SetXY(15,80);
        $pdf->Cell(35,10,('Sexo: '),90,90);
    //teléfono y domicilio 
    $pdf->SetXY(110,70);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->Cell(35,10,utf8_decode('Teléfono: '),90,90);
        $pdf->Cell(35,10,utf8_decode('Domicilio: '),100,90);
    
        // Escolaridad//
        $pdf->SetXY(15,90);
    $pdf->SetFont('Arial','B',10); //propiedades de la letra
        $pdf->Cell(35,10,('ESCOLARIDAD '),90,90);
    
        //N° de control  
        $pdf->SetXY(15,100);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->Cell(35,10,('No. de Control: '),90,90);
        //Periodo
        $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->SetXY(15,110);
        $pdf->Cell(35,10,('Periodo: '),90,90);
    //Carrera y semestre 
    $pdf->SetXY(90,100);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->Cell(35,10,utf8_decode('Carrera: '),90,90);
        $pdf->Cell(35,10,utf8_decode('Semestre: '),100,90);
    
            // DATOS DEL PROGRAMA//
            $pdf->SetXY(15,120);
            $pdf->SetFont('Arial','B',10); //propiedades de la letra
                $pdf->Cell(35,10,('DATOS DEL PROGRAMA'),90,90);
            
    //DEPENDENCIA OFICIAL
    $pdf->SetXY(15,130);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->Cell(35,10,('Dependencia oficial: '),90,90);
        //Titular dependencia
        $pdf->SetXY(15,140);
        $pdf->SetFont('Arial','',10); //propiedades de la letra
            $pdf->Cell(35,10,('Titular de la dependencia: '),90,90);
    
     //Puesto 
     $pdf->SetXY(15,150);
        $pdf->SetFont('Arial','',10); //propiedades de la letra
            $pdf->Cell(35,10,('Puesto: '),90,90);
    
     //Nombre del programa 
     $pdf->SetXY(15,160);
     $pdf->SetFont('Arial','',10); //propiedades de la letra
         $pdf->Cell(35,10,('Nombre del programa: '),90,90);
    
     //Modalidad 
     $pdf->SetXY(15,170);
     $pdf->SetFont('Arial','',10); //propiedades de la letra
         $pdf->Cell(35,10,('Modalidad: '),90,90);
     //fecha de inicio
     $pdf->SetXY(65,170);
     $pdf->SetFont('Arial','',10); //propiedades de la letra
         $pdf->Cell(35,10,('Fecha de inicio: '),90,90);
     // fecha de terminacion 
     $pdf->SetXY(130,170);
     $pdf->SetFont('Arial','',10); //propiedades de la letra
         $pdf->Cell(35,10,utf8_decode('Fecha de terminación: '),90,90);
     // actividdes
     $pdf->SetXY(15,180);
     $pdf->SetFont('Arial','',10); //propiedades de la letra
         $pdf->Cell(35,10,('Actividades: '),90,90);
    
         // tipo de programa//
         $pdf->SetXY(15,200);
     $pdf->SetFont('Arial','B',10); //propiedades de la letra
         $pdf->Cell(35,10,('Tipo de programa '),90,90);
    // tipos de programas primera colummna
    $pdf->SetXY(15,210);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->Cell(35,10,utf8_decode('(    ) Educación para adultos'),90,90);
    
        $pdf->SetXY(70,210);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->Cell(35,10,utf8_decode('(    ) Desarrollo de comunidad'),90,90);
    
    
        $pdf->SetXY(130,210);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->Cell(35,10,utf8_decode('(    ) Actividades deportivas'),90,90);
    
    //tipos de programas segunda columna
    $pdf->SetXY(15,220);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->Cell(35,10,utf8_decode('(    ) Actividades Culturales'),90,90);
    
        $pdf->SetXY(70,220);
        $pdf->SetFont('Arial','',10); //propiedades de la letra
            $pdf->Cell(35,10,utf8_decode('(    ) Actividades cívicas'),90,90);
    
            $pdf->SetXY(130,220);
        $pdf->SetFont('Arial','',10); //propiedades de la letra
            $pdf->Cell(35,10,utf8_decode('(    ) Desarrollo sustentable'),90,90);
            
    
            //tipos de programas tercera columna
    $pdf->SetXY(15,230);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->Cell(35,10,utf8_decode('(    ) Apoyo a la salud'),90,90);
    
        $pdf->SetXY(70,230);
        $pdf->SetFont('Arial','',10); //propiedades de la letra
            $pdf->Cell(35,10,utf8_decode('(    ) Medio ambiente'),90,90);
    
            $pdf->SetXY(130,230);
        $pdf->SetFont('Arial','',10); //propiedades de la letra
            $pdf->Cell(35,10,utf8_decode('(    ) Otros'),90,90);
            
    //PARA USO EXCLUSIVO DE LA OFICINA DE SERVICIO SOCIAL//
    $pdf->SetXY(15,240);
    $pdf->SetFont('Arial','B',10); //propiedades de la letra
        $pdf->Cell(35,10,utf8_decode('PARA USO EXCLUSIVO DE LA OFICINA DE SERVICIO SOCIAL'),90,90);
    //ACEPTADO
        $pdf->SetXY(15,250);
        $pdf->SetFont('Arial','',10); //propiedades de la letra
            $pdf->Cell(35,10,utf8_decode('ACEPTADO:'),90,90);
    //SI 
    $pdf->SetXY(37,250);
        $pdf->SetFont('Arial','',10); //propiedades de la letra
            $pdf->Cell(35,10,utf8_decode('SI (     ):'),90,90);
    //NO
    $pdf->SetXY(51,250);
        $pdf->SetFont('Arial','',10); //propiedades de la letra
            $pdf->Cell(35,10,utf8_decode('NO (     ):'),90,90);
    //MOTIVO 
    $pdf->SetXY(70,250);
        $pdf->SetFont('Arial','',10); //propiedades de la letra
            $pdf->Cell(35,10,utf8_decode('MOTIVO:'),90,90);
    //OBSERVACIONES
    $pdf->SetXY(15,260);
        $pdf->SetFont('Arial','',10); //propiedades de la letra
            $pdf->Cell(35,10,utf8_decode('OBSERVACIONES:'),90,90);
        $pdf->Output();
    
    ?>