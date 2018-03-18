<?php
require('code39.php');
//code 39 qui mache bien
$pdf=new PDF_Code39();
$pdf->AddPage();
$pdf->Code39(80,40,'*',1,10);
$pdf->Output();
?>
