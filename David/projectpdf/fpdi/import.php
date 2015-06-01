<?php

    require('fpdf.php');
    require('fpdi.php');

$pdf = new FPDI();
$pageCount = $pdf->SetSourceFile('testpdf.pdf');

// iterate through all pages
for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    // import a page
    $pdf->AddPage();
    $template = $pdf->importPage($pageNo);
    $pdf->useTemplate($template);
}


$pdf->Output();
