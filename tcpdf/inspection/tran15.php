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
$query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );//
while($rowx=mysql_fetch_object($requetex))
{
$num=$rowx->NREALISATION;
$date=$rowx->REALISATION;
$num1=$rowx->NOUVERTURE;
$date1=$rowx->OUVERTURE;
$nomar=$rowx->NOMAR;
$prenomar=$rowx->PRENOMAR;
$nomfr=$rowx->NOM;
$prenomfr=$rowx->PRENOM;
$adresse=$rowx->ADRESSEAR;
$commune=$pdf->nbrtostring('mvc','comar','IDCOM',$rowx->COMMUNE,'communear');
$wilaya=$rowx->WILAYA;
$DIPLOME=$rowx->DIPLOME;
$UNIV=$rowx->UNIV;
$NUMORDER=$rowx->NUMORDER;
$DATEORDER=$rowx->DATEORDER;
$NUMDEM=$rowx->NUMDEM;
$DATEDEM=$rowx->DATEDEM;
$OUVERTURE=$rowx->OUVERTURE;
$NOUVERTURE=$rowx->NOUVERTURE;
}

$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );//
while($rowy=mysql_fetch_object($requetey))
{
$NUMD=$rowy->NUMD;
$DATED=$rowy->DATED;
$DATEP=$rowy->DATEP;
}
//*************************************************************************************************************************//
$pdf->entetedecision("مقررة ترخيص بتحويل عيادة طبية لجراحة الاسنان",$DATEP);
//*************************************************************************************************************************//
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->loi18_11,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->decret92_276,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->decret97_261,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->instruction112_90,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->instruction06_98,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->instruction01_99,0,1,'R');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->diplome15.$DIPLOME.' الصادرة عن جامعة '.$UNIV." الخاصة بالسيد (ة) : ".$nomar." ".$prenomar,0,1,'R');$pdf->SetFont('aefurat', '', 12);//
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->ordre15.$NUMORDER.' بتاريخ '.$DATEORDER.' للمعنى (ة)  ',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بناء على المقررة رقم '.$NOUVERTURE.' المؤرخة في '.$OUVERTURE.' المتعلقة بفتح عيادة طبية لجراحة الاسنان '."للسيد(ة) ".$nomar." ".$prenomar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بناء على طلب المعني (ة) '.' بتاريخ  '.$DATED.' المتعلق بتحويل عيادته (ها)  الطبية لجراحة الاسنان ',0,1,'R');$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'  إلى '.$adresse.'  ببلدية  '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بناء على محضر المطابقة الخاص بالعيادة المؤرخ في '.$DATEP,0,1,'R');$pdf->SetFont('aefurat', 'B', 16);
//*************************************************************************************************************************//
$pdf->propositiondecision();
//*************************************************************************************************************************//
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->article1.$nomar.' '.$prenomar.' جراح (ة) اسنان'.' بتحويل عيادته (ها) الطبية لجراحة الاسنان',0,1,'R');
$pdf->SetXY(0,$pdf->GetY());$pdf->Cell(200,5,'        إلى '.$adresse.' بلدية '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'المادة 02 : لايمكن تحويل اي مقر  للعيادة دون استشارة مصالح مديرية الصحة و السكان',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->article3,0,1,'R');$pdf->SetFont('aefurat', '', 12.5);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->article4,0,1,'R');$pdf->SetFont('aefurat', 'B', 14);
$pdf->ctdecision($nomfr,$prenomfr,$DATEP);
$pdf->Output($nomfr.'_'.$prenomfr.'.pdf','I');
?>