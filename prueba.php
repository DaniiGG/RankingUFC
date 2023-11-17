<?php

// Incluye la biblioteca FPDF
require('fpdf.php');
ini_set('memory_limit', '100000M');
require('classufc.php');
// Define una clase personalizada que hereda de FPDF


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






