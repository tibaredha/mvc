<?php
require_once('inspection.php');
$pdf = new inspection('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->orderdemision($_POST['NM'],$_POST['NOMPRENOM'],$_POST['FONCTION'],$_POST['DEST'],$_POST['DATED'],$_POST['DATEA'],$_POST['NBRP'],$_POST['NUMV'],$_POST['OBJ']);

// print a message
// $txt = "You can also export 1D barcodes in other formats (PNG, SVG, HTML). Check the examples inside the barcodes directory.\n";
// $pdf->MultiCell(70, 50, $txt, 0, 'J', false, 1, 125, 30, true, 0, false, true, 0, 'T', false);


// -----------------------------------------------------------------------------

$pdf->SetFont('helvetica', '', 10);

// define barcode style
$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => false,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);

// CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.
//$pdf->SetXY(70,100);$pdf->Cell(0, 0, 'CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9', 0, 1);
$pdf->SetXY(10,100);$pdf->write1DBarcode($_POST['NM'], 'C39', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();




$pdf->Output($_POST['NM'].'.pdf','I');
?>
