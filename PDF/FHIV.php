<?php
require('DNR.php');
$pdf = new DNR( 'p', 'mm', 'A4' );
$pdf->FHIV($_GET["uc"]);
?>