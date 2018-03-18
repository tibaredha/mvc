<?php
require('DNR.php');
$pdf = new DNR( 'p', 'mm', 'A4' );$pdf->AliasNbPages();
$pdf->FHVCM($_GET["uc"]);
?>