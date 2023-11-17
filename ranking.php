<?php

// Incluye la biblioteca FPDF
require('fpdf.php');
ini_set('memory_limit', '100000M');

// Define una clase personalizada que hereda de FPDF
class PDF extends FPDF {
    // Cabecera
    function H() {

        $this->Image('img/logo.png', 0, 1, 30);
        // Título del informe
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(80);
        $this->Cell(0, 10, 'Elias, Pedro y Daniel', 0, 1, 'R');
        $this->Cell(80);
        $this->Cell(0, 10, '2 DAW', 0, 1, 'R');
        // Salto de línea
        $this->Ln(20);
    }

    // Tabla
    function ufc($peleadores) {
        $this->SetFont('Arial', 'B', 13);
        $this->Cell(0, 10, 'Campeon de peso ' . array_search($peleadores, $GLOBALS), 0, 1, 'L');
        $imagenX = $this->GetX(); // Obtiene la posición actual en X
        $imagenY = $this->GetY() + 5; // Suma 10 a la posición actual en Y para colocar la imagen debajo del texto "CAMPEÓN"
        $this->Image('img/ufc/' . array_search($peleadores, $GLOBALS) . '/' . array_search($peleadores, $GLOBALS) . '.png', $imagenX, $imagenY, 30);
    
        // Ajusta la posición actual para el contenido de la tabla
        $this->SetY($this->GetY() + 40); 
    
        // Encabezados de la tabla
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(20, 10, 'Posicion', 1);
        $this->Cell(60, 10, 'Nombre', 1);
        $this->Ln();
    
        // Contenido de la tabla
        $this->SetFont('Arial', '', 12);
        foreach ($peleadores as $peleador) {
            $this->Cell(20, 10, $peleador['pos'], 1);
            $this->Cell(60, 10, $peleador['nombre'], 1);
            $this->Ln();
        }
    }
}

// Datos de ejemplo de alumnos
$mosca = [
    
    ['pos' =>1,'nombre' => 'ALEXANDRE PANTOJA'],
    ['pos' => 2,'nombre'=> 'Brandon Moreno'],
    ['pos' => 3,'nombre'=> 'Deiveson Figueiredo'],
];
$gallo = [
    
    ['pos' =>1,'nombre' => 'SEAN OMALLEY'],
    ['pos' => 2,'nombre'=> 'Aljamain Sterling'],
    ['pos' => 3,'nombre'=> 'Merab Dvalishvili'],
];
$pluma = [
    ['pos' => 1, 'nombre' => 'ALEXANDER VOLKANOVSKI'],
    ['pos' => 2, 'nombre' => 'Max Holloway'],
    ['pos' => 3, 'nombre' => 'Yair Rodriguez'],
];

$ligero = [
    ['pos' => 1, 'nombre' => 'ISLAM MAKHACHEV'],
    ['pos' => 2, 'nombre' => 'Charles Oliveira'],
    ['pos' => 3, 'nombre' => 'Justin Gaethje'],
];

$welter = [
    ['pos' => 1, 'nombre' => 'LEON EDWARDS'],
    ['pos' => 2, 'nombre' => 'Kamaru Usman'],
    ['pos' => 3, 'nombre' => 'Belal Muhammad'],
];

$medio = [
    ['pos' => 1, 'nombre' => 'SEAN STRICKLAND'],
    ['pos' => 2, 'nombre' => 'Israel Adesanya'],
    ['pos' => 3, 'nombre' => 'Dricus Du Plessis'],
];

$semipesado = [
    ['pos' => 1, 'nombre' => 'JAMAHAL HILL'],
    ['pos' => 2, 'nombre' => 'Jiri Prochazka'],
    ['pos' => 3, 'nombre' => 'Magomed Ankalaev'],
];

$pesado = [
    ['pos' => 1, 'nombre' => 'JON JONES'],
    ['pos' => 2, 'nombre' => 'Ciryl Gane'],
    ['pos' => 3, 'nombre' => 'Sergei Pavlovich'],
];

// Crear una instancia de la clase PDF
$pdf = new PDF();
$pdf->AddPage();

// Nombre del grupo y curso
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'PELEADORES DE LA UFC POR PESO', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 10, 'MEJORES EN LA ACTUALIDAD', 0, 1, 'C');
$pdf->Ln(10);

// Generar la tabla de alumnos
$pdf->ufc($mosca);
$pdf->Ln(5);
$pdf->ufc($gallo);

$pdf->AddPage();
$pdf->ufc($pluma);
$pdf->Ln(5);
$pdf->ufc($ligero);
$pdf->AddPage();
$pdf->ufc($welter);
$pdf->Ln(5);
$pdf->ufc($medio);
$pdf->AddPage();
$pdf->ufc($semipesado);
$pdf->Ln(5);
$pdf->ufc($pesado);

// Salida del PDF (puedes elegir descargarlo o mostrarlo en el navegador)
$pdf->Output();






