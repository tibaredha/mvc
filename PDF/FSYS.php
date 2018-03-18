<?php
require('DNR.php');
$pdf = new DNR( 'p', 'mm', 'A4' );
$pdf->FSYS($_GET["uc"]);
?>