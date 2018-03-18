<?php
require('PAT.php');
$pdf = new DNR( 'L', 'mm', 'A4' );$pdf->AliasNbPages();
$pdf->RAPDECES($_GET['d1'],$_GET['d2']);
$pdf->Output();	 
?>