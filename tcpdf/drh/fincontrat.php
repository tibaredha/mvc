<?php 
$ndp=$_GET["uc"];require_once('drh.php');$pdf = new drh('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf-> mysqlconnect(); 
$sql = "SELECT * FROM grh WHERE  idp = '".$ndp."' "; 
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
$result = mysql_fetch_array( $requete ); 
mysql_free_result($requete);
$y=7;
$pdf->ENTETEDRH('مقرر نهاية العقد'," _____",date("Y"));
$pdf->htiat($result["rnvgradear"],$y);
//****************************************************************//
$pdf->Text(5,$pdf->GetY()+$y," بناء :  على المقرر رقم ");$pdf->Text(54,$pdf->GetY()," المؤرخ في  ");$pdf->Text(100,$pdf->GetY(),"المتضمن تثبيت  السيد : ");
$pdf->Text(15,$pdf->GetY()+$y," في رتبة: ");$pdf->Text(130,$pdf->GetY()," ابتداء من:");		
$pdf->decision_drh($y);
$pdf->Text(5,$pdf->GetY()+$y,"المادة الأولى : (ت)  ينقل السيد (ة) :");
$pdf->Text(105,$pdf->GetY()+$y," بناءا على طلبه  ");
$pdf->Text(28,$pdf->GetY()+$y," من ");$pdf->Text(100,$pdf->GetY()," الى ");$pdf->Text(160,$pdf->GetY(),"ابتداء من:");
$pdf->foot_drh($y);
$pdf->Output('fin_contrat_'.$result["Nomlatin"].'.pdf','I');
?>
