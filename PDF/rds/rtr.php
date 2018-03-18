<?php
require('INSPECTION1.php');
$pdf = new INSPECTION1 ( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(250);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire

$pdf->AddPage('p','A4');
$pdf->entete('','','Retrait et Mise en Quarantaine : ','');
$pdf->produitrtr('','','','','');



$pdf->pied();
$pdf->Output();
?>