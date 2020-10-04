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
$adresse=$rowx->ADRESSEAR;
$commune=$pdf->nbrtostring('mvc','comar','IDCOM',$rowx->COMMUNE,'communear');
$wilaya=$rowx->WILAYA;
$DIPLOME=$rowx->DIPLOME;
$UNIV=$rowx->UNIV;
$NUMORDER=$rowx->NUMORDER;
$DATEORDER=$rowx->DATEORDER;
$NUMDEM=$rowx->NUMDEM;
$DATEDEM=$rowx->DATEDEM;
}

$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );//
while($rowy=mysql_fetch_object($requetey))
{
$NUMD=$rowy->NUMD;
$DATED=$rowy->DATED;
$DATEP=$rowy->DATEP;
}
$y=3;
$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->repar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->wilayaar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dsparp,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dssar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'رقم : '.'_____'.' / م. ص. س / '.substr($DATEP,0,4),0,1,'R');$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetXY(5,$pdf->GetY()+3);$pdf->Cell(200,5,'مقــــررة فتح  عيادة طبية عامـــــــة',0,1,'C');$pdf->SetFont('aefurat', '', 16);
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(100,5,$pdf->ledspar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->loi18_11,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->decret92_276,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->decret97_261,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"- بمقتضى التعليمة الوزارية رقم 112 المؤرخة في 1987/03/02 المتعلقة بأحكام تنصيب الممارسين الطبيين العامين و المتخصصين",0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"- بمقتضى التعليمة الوزارية رقم 06 المؤرخة في 1998/06/28 المتعلقة بتشغيل الشبه الطبيين في الهياكل الصحية الخاصة",0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"- بمقتضى التعليمة الوزارية رقم 01 المؤرخة في 1999/01/20 المتعلقة بالممارسة في القطاع الخاص لمهنيي الصحة ",0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->diplome17.$DIPLOME.' الصادرة عن جامعة '.$UNIV,0,1,'R');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بناء على شهلدة التسجيل بمجلس اخلاقيات المهنة  للطب العام  رقم '.$NUMORDER.' بتاريخ '.$DATEORDER.' للمعنى (ة)  ',0,1,'R');
//$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'- بناء على مقرر الاستقالة رقم '.$NUMDEM.' المؤرخ في '.$DATEDEM.' الصادر عن المؤسسة العمومية '.' للصحة الجوارية ',0,1,'R');
//$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'  تخص السيد (ة) '.$nomar.' '.$prenomar.' طبيب عام .',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بناء على طلب السيد (ة) '.$nomar.' '.$prenomar.' طبيب عام بتاريخ '.$DATED.' المتعلق بفتح عيادة طبية عامة',0,1,'R');$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'  ب '.$adresse.'  ببلدية  '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بناء علي محضر المطابقة الخاص بالعيادة المؤرخ في '.$DATEP,0,1,'R');$pdf->SetFont('aefurat', 'B', 16);
/*************************************************************************************************************************/
$pdf->SetXY(5,$pdf->GetY()+$y+1);$pdf->Cell(200,5,$pdf->proposition,0,1,'C');$pdf->SetFont('aefurat', 'U', 16);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'يقــــــــــرر ',0,1,'C');$pdf->SetFont('aefurat', '', 13);
/*************************************************************************************************************************/
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->article1.$nomar.' '.$prenomar.' طبيب عام'.' بفتح عيادته (ها) الطبية العامة الكائن مقرها ',0,1,'R');
$pdf->SetXY(0,$pdf->GetY());$pdf->Cell(200,5,'               بـ : '.$adresse.' بلدية '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'المادة 02 : لايمكن تحويل اي مقر  للعيادة دون استشارة مصالح مديرية الصحة و السكان',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->article3,0,1,'R');$pdf->SetFont('aefurat', '', 12.5);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->article4,0,1,'R');$pdf->SetFont('aefurat', 'B', 14);
$pdf->SetXY(5,$pdf->GetY()+$y+10);$pdf->Cell(100,5,'الجلفة في : '.$DATEP,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(100,5,'مدير الصحة و السكان ',0,1,'C');
$pdf->Output();
?>
