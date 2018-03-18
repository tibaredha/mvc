<?php
require('../PDF/MAL.php');
$pdf = new MAL( 'p', 'mm', 'A5' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$pdf->RESMALPDF($_GET["uc"]);
?>