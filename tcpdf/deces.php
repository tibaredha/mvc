<?php
require('PDF0.php');
$pdf = new PDF0( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->SetMargins(0,0,0);
$pdf->SetAutoPageBreak(true,5); 
// $pdf->deces($_POST['id']);
$pdf->decesn($_POST['id']);
?>



