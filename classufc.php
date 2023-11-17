<?php
class PDF extends FPDF {
    // Cabecera
    function Header() {

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