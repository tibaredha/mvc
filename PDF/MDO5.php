<?php
require('../PDF/MDOO.php');
$pdf = new MDO( 'l', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$pdf->MDO5('2010-01-01');
?>