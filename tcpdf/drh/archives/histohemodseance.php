<?php
$id=$_GET["id"]; 
require_once('hemo.php');
$pdf = new hemo('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,180);  //text noire
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', '', 12);
$pdf->seances($_GET["id"]);
$pdf->Output();
?>
