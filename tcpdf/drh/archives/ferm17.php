<?php
$ids=$_GET["ids"]; 
$idh=$_GET["idh"];  
require_once('inspection.php');
$pdf = new inspection('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('fermeture_medecin');
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
$query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );//
while($rowx=mysql_fetch_object($requetex))
{
$num=$rowx->NREALISATION;$date=$rowx->REALISATION;
$num1=$rowx->NOUVERTURE;$date1=$rowx->OUVERTURE;
$nomar=$rowx->NOMAR;$prenomar=$rowx->PRENOMAR;$nomfr=$rowx->NOM;$prenomfr=$rowx->PRENOM;
$adresse=$rowx->ADRESSEAR;$commune=$pdf->nbrtostring('mvc','comar','IDCOM',$rowx->COMMUNE,'communear');$wilaya=$rowx->WILAYA;
$DIPLOME=$rowx->DIPLOME;$UNIV=$rowx->UNIV;
$NUMORDER=$rowx->NUMORDER;$DATEORDER=$rowx->DATEORDER;
$NUMDEM=$rowx->NUMDEM;$DATEDEM=$rowx->DATEDEM;
}
$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );//
while($rowy=mysql_fetch_object($requetey))
{
$NUMD=$rowy->NUMD;
$DATED=$rowy->DATED;
$DATEP=$rowy->DATEP;
$adressen=$rowy->ADRESSEAR;$communen=$pdf->nbrtostring('mvc','comar','IDCOM',$rowy->COMMUNE,'communear');$wilayan=$rowy->WILAYA;
}
//*************************************************************************************************************************//
$pdf->entetedecision("مقررة غلق عيادة طبية عامة ",$DATEP);
//*************************************************************************************************************************//
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->loi18_11,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->decret92_276,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->decret97_261,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->instruction112_87_m,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->instruction06_98,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"- بمقتضى التعليمة الوزارية رقم 01 المؤرخة في 1999/01/20 المتعلقة بالممارسة في القطاع الخاص لمهنيي الصحة ",0,1,'R');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->diplome17.$DIPLOME.' الصادرة عن جامعة '.$UNIV." الخاصة بالسيد (ة) : ".$nomar." ".$prenomar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->ordre17.$NUMORDER.' بتاريخ '.$DATEORDER.' للمعنى (ة)  ',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بناء على المقررة رقم '.$num1.' المؤرخة في '.$date1.' المتعلقة بفتح عيادة طبية عامة '."للسيد(ة) ".$nomar." ".$prenomar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بناء على طلب المعني (ة) '.'بتاريخ '.$DATED.' المتعلق بغلق عيادته (ها) الطبية العامة  الكائن مقرها ',0,1,'R');$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'  بـ : '.$adressen.'  ببلدية  '.$communen.' ولاية الجلفة',0,1,'R');$pdf->SetFont('aefurat', 'B', 16);
//*************************************************************************************************************************//
$pdf->propositiondecision();
//*************************************************************************************************************************//
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->article1f.$nomar.' '.$prenomar.' طبيب (ة) عام (ة) '.' الكائن مقرها',0,1,'R');
$pdf->SetXY(0,$pdf->GetY());$pdf->Cell(200,5,'           بـ : '.$adressen.' بلدية '.$communen.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"المادة 02 :  يسري مفعول هذه المقررة ابتداء من تاريخ إمضائها",0,1,'R');$pdf->SetFont('aefurat', '', 12.5);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5," المادة 03 : يكلف كل من السادة مدير المؤسسة العمومية للصحة الجوارية و مدير صندوق الضمان الإجتماعي بتنفيذ هذه المقررة .",0,1,'R');$pdf->SetFont('aefurat', 'B', 14);
$pdf->ctdecision($nomfr,$prenomfr,$DATEP);
$pdf->Output($nomfr.'_'.$prenomfr.'.pdf','I');
?>