<?php
$dateeuro=date('d/m/Y');
require('PHA.php');
$pdf = new PHA( 'p', 'mm', 'A5' );
$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$pdf->AddPage('p','A5');
// $pdf->Rect(5,5, 140, 202,"d");
//$pdf->ordonnace($_POST['NOM'],$_POST['PRENOM'],$_POST['AGE'],$_POST['ADRESSE']);
$pdf->mysqlconnect();
$idon=$_GET['uc'];
$query = "select * from DNR WHERE  ID = '$idon'     ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))//
{
$d1=substr($result->DATENAISSANCE,6,4);$d2=substr(date('d/m/Y'),6,4);$d3=$d2-$d1;
$pdf->ordonnace(trim($result->NOM),trim($result->PRENOM),$d3,trim($result->ADRESSE));
}
$nbArticles=count($_SESSION['ordonnace']['libelleProduit']);
for ($i=0 ;$i < $nbArticles ; $i++)
{
$pdf->cell(15,6,$i+1,0,0,'C',0);
$pdf->SetFont('Arial','U');
$pdf->Cell(100,6,$pdf->nbrtostring('mvc','pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'mecicament').'  '.$pdf->nbrtostring('mvc','pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'pre'),0,0,'L',0);
$pdf->SetFont('Arial','');
$pdf->Cell(20,6,$_SESSION['ordonnace']['qteProduit'][$i]." Bte",0,0,'R',0);
$pdf->SetXY(20,$pdf->GetY()+6);
$pdf->Cell(100,6,$_SESSION['ordonnace']['doseparprise'][$i].' '.$_SESSION['ordonnace']['nbrdrfoisparjours'][$i].'x/j'.' pd'.$_SESSION['ordonnace']['nbrdejours'][$i].'jours',0,0,'L',0);
$pdf->SetFont('Arial','U');$pdf->SetTextColor(255,0,0);
//$pdf->Cell(20,6,$_SESSION['ordonnace']['qteProduit'][$i] * $_SESSION['ordonnace']['prixProduit'][$i].' DA',0,0,'R',0);
$pdf->SetFont('Arial','');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(05,$pdf->GetY()+10); 
}
$pdf->Text(20,$pdf->GetY(),"______________________________________________________________");
function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['ordonnace']['libelleProduit']); $i++)
   {
      $total += $_SESSION['ordonnace']['qteProduit'][$i] * $_SESSION['ordonnace']['prixProduit'][$i];
   }
   return $total;
}
$pdf->SetFont('Arial','U');$pdf->SetTextColor(255,0,0);
//$pdf->SetXY(20,$pdf->GetY()+6);$pdf->Cell(120,6,"Montant Total: ".MontantGlobal(),0,0,'R',0);
$pdf->SetFont('Arial','');$pdf->SetTextColor(0,0,0);
$pdf->Output();
?>