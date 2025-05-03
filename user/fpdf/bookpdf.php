<?php

require ("fpdf/fpdf.php");


class PDF extends FPDF{
       }
    $pdf=new PDF("P","mm","A4");
    $pdf->AddPage();
    
    $pdf->Output();
    ?>