<?php
$dateeuro=date('d/m/Y');
require('INSPECTION1.php');$pdf = new INSPECTION1 ( 'p', 'mm', 'A5' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$pdf->AliasNbPages();
$pdf->AddPage('p','A5');
$pdf->mysqlconnect();
$pdf->ordonnace("","","","");
$nbArticles=count($_SESSION['ordonnace']['libelleProduit']);
for ($i=0 ;$i < $nbArticles ; $i++)
{
$pdf->cell(15,6,$i+1,0,0,'C',0);
$pdf->SetFont('Arial','U');
$pdf->Cell(100,6,html_entity_decode(utf8_decode($pdf->nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'mecicament').'  '.$pdf->nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'pre'))),0,0,'L',0);
$pdf->SetFont('Arial','');
$pdf->Cell(20,6,$_SESSION['ordonnace']['qteProduit'][$i]." Bte",0,0,'R',0);
$pdf->SetXY(20,$pdf->GetY()+6);
$pdf->Cell(100,6,$_SESSION['ordonnace']['doseparprise'][$i].' '.$_SESSION['ordonnace']['nbrdrfoisparjours'][$i].'x/j'.' pd'.$_SESSION['ordonnace']['nbrdejours'][$i].'jours',0,0,'L',0);
$pdf->SetFont('Arial','U');$pdf->SetTextColor(255,0,0);
$pdf->SetFont('Arial','');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(05,$pdf->GetY()+10); 
}
$pdf->Text(20,$pdf->GetY(),"______________________________________________________________");
$pdf->SetFont('Arial','U');$pdf->SetTextColor(255,0,0);
$pdf->SetFont('Arial','');$pdf->SetTextColor(0,0,0);
$pdf->Output();
?>