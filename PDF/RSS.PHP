<?php
if ($_GET['MODESORTI']!=='') {
require('PAT.php');
$pdf = new DNR( 'p', 'mm', 'A4' );$pdf->AliasNbPages();
$pdf->RSS($_GET['id'],$_GET['IDDNR']);
$pdf->CSEJOUR($_GET['id'],$_GET['IDDNR']);
$pdf->Output();	 
}
else
{
header('location: ../Pat/view/'.$_GET['IDDNR']);
}
?>