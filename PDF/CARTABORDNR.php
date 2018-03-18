<?php
require('DNR.php');
$pdf = new DNR( 'p', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$pdf->CARTABORDNR($_GET["uc"],'RECEVEUR DE SANG');
?>
