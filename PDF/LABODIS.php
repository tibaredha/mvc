<?php
require('../PDF/DIS.php');
$pdf = new DIS( 'p', 'mm', 'A5' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$pdf->LABODIS(date('d/m/Y'),$_GET["uc"]); 
?>