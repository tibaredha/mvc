<?php 
// echo  'id : '.$_GET['id'];
// echo  '<br/>';
// echo  'mdo : '.$_GET['mdo'];

require('../fpdf.php');
require('../fpdi.php');
$pdf = new FPDI();$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->setSourceFile('3.pdf');
$tplIdx = $pdf->importPage(13);
$pdf->useTemplate($tplIdx, 5, 5, 200);



$pdf->Output();
?>