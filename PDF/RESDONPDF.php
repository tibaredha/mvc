<?php
require('../PDF/DNR.php');
$pdf = new DNR( 'p', 'mm', 'A5' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$pdf->RESDONPDF($_GET["id"],$_GET["IDDNR"],'');
?>