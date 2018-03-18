<?php
require('DIS.php');
$pdf = new DIS( 'p', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$pdf->CARTABORDNR($_GET["uc"],'RECEVEUR DE SANG');
?>