<?php
require('PAT.php');
$pdf = new DNR( 'p', 'mm', 'A4' );$pdf->AliasNbPages();
$pdf->FPATPDF($_GET["uc"]);
?>