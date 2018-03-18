<?php
require('../PDF/DIS.php');
$pdf = new DIS( 'p', 'mm', 'A4' );$pdf->AliasNbPages();
$pdf->fichetrans($_GET["uc"]);
?>