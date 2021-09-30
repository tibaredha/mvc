<?php
$ids=$_GET["ids"]; 
$idh=$_GET["idh"]; 
require_once('inspection.php');
$pdf = new inspection('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('DECISION');
$pdf->SetSubject('PROTOCOLE');
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->AddPage();
$pdf->SetLineWidth(0.4);
$pdf-> mysqlconnect(); 
$query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";//
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$num=$rowx->NREALISATION;$date=$rowx->REALISATION;
$nomfr=$rowx->NOM;$prenomfr=$rowx->PRENOM;$nomar=$rowx->NOMAR;$prenomar=$rowx->PRENOMAR;
$adresse=$rowx->ADRESSEAR;$commune=$pdf->nbrtostring('mvc','comar','IDCOM',$rowx->COMMUNE,'communear');$wilaya=$rowx->WILAYA;
}
$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowy=mysql_fetch_object($requetey))
{
$STL=$rowy->STL;
$DATEP=$rowy->DATEP;
$CDS0=$rowy->CDS0;
$SDS0=$rowy->SDS0;
$SAH0=$rowy->SAH0;
$NUMD=$rowy->NUMD;
$DATED=$rowy->DATED;
$num1="__";
$date1="____";
$adressen=$rowy->ADRESSEAR;$communen=$pdf->nbrtostring('mvc','comar','IDCOM',$rowy->COMMUNE,'communear');$wilayan=$rowy->WILAYA;
}
//*************************************************************************************************************************//
$pdf->entetedecision("مقررة تتضمن فتح و إستغلال وحدة للنقل الصحي",$DATEP);
//*************************************************************************************************************************//
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->loi18_11,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->decision39_98,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->circulaire03_99,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->circulaire03_99_0,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->note_00_2006,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->note_01_2006,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->note_01_2008,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->note_06_2013,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'- بناءا على مقررة الإنجاز لوحدة النقل الصحي رقم  '.$num.' المؤرخة في '.$date.' الخاصة بالسيد(ة) '.$nomar.' '.$prenomar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'- و بعد الإطلاع على الملف المتضمن فتح وحدة للنقل الصحي للسيد(ة) '.$nomar.' '.$prenomar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'  على مستوى  '.$adressen.' بلدية '.$communen.' ولاية الجلفة',0,1,'R');$pdf->SetFont('aefurat', 'B', 16);
//*************************************************************************************************************************//
$pdf->propositiondecision();
//*************************************************************************************************************************//
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'المادة الأولى : يرخص للسيد(ة)  '.$nomar.' '.$prenomar.' بفتح و إستغلال وحدة للنقل الصحي الكائن مقرها ',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,' ب'.$adressen.' بلدية '.$communen.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'المادة 02 : يسري مفعول هذه المقررة ابتداء من تاريخ إمضائها',0,1,'R');
$pdf->mhmts($ids,$nomar,$prenomar);
$pdf->SetFont('aefurat', '', 14);
$pdf->ctdecision($nomfr,$prenomfr,$DATEP);
$pdf->Output($nomfr.'_'.$prenomfr.'.pdf','I');
?>
