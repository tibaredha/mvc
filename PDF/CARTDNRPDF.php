<?php
require('DNR.php');
$pdf = new DNR( 'p', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$pdf->CARTDNRPDF($_GET["uc"],'DONNEUR DE SANG');
?>