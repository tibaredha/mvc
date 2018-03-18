<?php
require('DNR.php');
$pdf = new DNR( 'l', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$pdf->PROSDNRFR($_GET["uc"]);
?>