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
$num0=$rowx->NREALISATION;$date0=$rowx->REALISATION;	
$num=$rowx->NOUVERTURE;$date=$rowx->OUVERTURE;
$nomar=$rowx->NOMAR;$prenomar=$rowx->PRENOMAR;$nomfr=$rowx->NOM;$prenomfr=$rowx->PRENOM;
$adresse=$rowx->ADRESSEAR;$commune=$pdf->nbrtostring('mvc','comar','IDCOM',$rowx->COMMUNE,'communear');$wilaya=$rowx->WILAYA;
}
$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowy=mysql_fetch_object($requetey))
{
$NAT=$rowy->NAT;
$STL=$rowy->STL;
$DATEP=$rowy->DATEP;
$CDS0=$rowy->CDS0;
$SDS0=$rowy->SDS0;
$SAH0=$rowy->SAH0;
$NUMD=$rowy->NUMD;
$DATED=$rowy->DATED;
$adressen=$rowy->ADRESSEAR;$communen=$pdf->nbrtostring('mvc','comar','IDCOM',$rowy->COMMUNE,'communear');$wilayan=$rowy->WILAYA;
}
//*************************************************************************************************************************//
$pdf->entetedecision("مقررة تتضمن فتح و إستغلال وحدة للنقل الصحي (معدلة) ",$DATEP);
//*************************************************************************************************************************//
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->loi18_11,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->decision39_98,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->circulaire03_99,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->circulaire03_99_0,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->note_00_2006,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->note_01_2006,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->note_01_2008,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->note_06_2013,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'- بناءا على مقررة الإنجاز لوحدة النقل الصحي رقم  '.$num0.' المؤرخة في '.$date0.' الخاصة بالسيد(ة) '.$nomar.' '.$prenomar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'- بناءا على المقررة رقم '.$num.' المؤرخة في '.$date.' المتضمنة فتح وحدة نقل صحي '.' الخاصة بالسيد(ة) '.$nomar.' '.$prenomar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'- بناءا على الطلب الخاص بالسيد(ة) : '.$nomar.' '.$prenomar.' المؤرخ في '.$DATED.' المتضمن تجديد الموارد المادية و البشرية ',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'- و بعد الإطلاع على ملف وحدة النقل الصحي للسيد(ة) : '.$nomar.' '.$prenomar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,' على مستوى  '.$adressen.' بلدية '.$communen.' ولاية الجلفة',0,1,'R');$pdf->SetFont('aefurat', 'B', 16);
//*************************************************************************************************************************//
$pdf->propositiondecision();
//*************************************************************************************************************************//
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'المادة الأولى : تهدف هذه المقررة إلى تغيير الأحكام الخاصة بالوسائل المادية و البشرية للسيد(ة) : '.$nomar.' '.$prenomar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,' لوحدة النقل الصحي الكائن مقرها ب '.$adresse.' بلدية '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"المادة 02 : "."لايمكن تحويل مقر وحدة النقل الصحي او تغير الوسائل المادية و البشرية  دون استشارة مصالح مديرية الصحة و السكان ",0,1,'R');
$pdf->mhmts($ids,$nomar,$prenomar);
$pdf->SetFont('aefurat', '', 14);
$pdf->ctdecision($nomfr,$prenomfr,$DATEP);
$pdf->Output($nomfr.'_'.$prenomfr.'.pdf','I');
?>
