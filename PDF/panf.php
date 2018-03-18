<?php
$dateeuro=date('d/m/Y');
require('PANC.php');
$pdf = new PAN( 'p', 'mm', 'A4' );
$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$pdf->AddPage('p','A4');
$pdf->panier();

$nbArticles=count($_SESSION['panier']['libelleProduit']);
for ($i=0 ;$i < $nbArticles ; $i++)
{
$pdf->cell(15,5,$i+1,1,0,'C',0);//5  =hauteur de la cellule origine =7
$pdf->cell(105,5,$_SESSION['panier']['libelleProduit'][$i],1,0,'L',0);
$pdf->cell(25,5,'',1,0,'C',0);
$pdf->cell(25,5,$_SESSION['panier']['qteProduit'][$i],1,0,'C',0);//quantite demande
$pdf->cell(30,5,$_SESSION['panier']['prixProduit'][$i],1,0,'C',0);
$pdf->SetXY(05,$pdf->GetY()+5); 
}
function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
   {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }
   return $total;
}
$pdf->Text(130,$pdf->GetY()+10,"Total: ".MontantGlobal());

$pdf->Rect(5, $pdf->GetY()+20, 75, 25,"d");$pdf->Rect(130, $pdf->GetY()+20, 75, 25,"d");
$pdf->Text(130,$pdf->GetY()+15,"ain oussera le: ".$dateeuro);
$pdf->Text(25,$pdf->GetY()+25,"cachet du service ");$pdf->Text(145,$pdf->GetY()+25,"le medecin chef du service "); 
$pdf->Output();
?>