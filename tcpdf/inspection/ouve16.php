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
$pdf->setFooterMargin($fm=1);
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
$nom=$rowx->NOM;
$prenom=$rowx->PRENOM;
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
$SPECIALITE=$rowx->SPECIALITEX;
}

$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );//
while($rowy=mysql_fetch_object($requetey))
{
$NUMD=$rowy->NUMD;
$DATED=$rowy->DATED;
$DATEP=$rowy->DATEP;

$NUMCOM=$rowy->NUMCOM;
$DATECOM=$rowy->DATECOM;
}
//*************************************************************************************************************************//
$pdf->entetedecisions("بفتح عيادة طبية متخصصة ",$DATEP);
//*************************************************************************************************************************//
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->loi18_11,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->loi12_07,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->decret97_261,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->decret92_276,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->instruction04_2013,0,1,'R');$pdf->SetFont('aefurat', '', 11.5);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->circulaire10_2018,0,1,'R');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->avisfavorable,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5," في القطاع الخاص رقم ".$NUMCOM." المؤرخ في ".$DATECOM,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"- و بعد الإطلاع على ملف طلب "." فتح "."عيادة طبية متخصصة "."للسيد(ة) : ".$nomar.' '.$prenomar." المودع بتاريخ ".$DATEDEM,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->diplome16."للسيد(ة) : ".$nomar.' '.$prenomar." رقم "." بتاريخ ".$DIPLOME,0,1,'R');//.' الصادرة عن جامعة '.$UNIV
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5," و الممنوحة من طرف جامعة ".$UNIV,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->servicecivile." **** "."المؤرخة في "."000-00-00",0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بناء على شهلدة التسجيل بمجلس اخلاقيات المهنة  رقم '.$NUMORDER.'  بتاريخ '.$DATEORDER.' للمعنى (ة)  ',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بناء علي محضر المطابقة الخاص بالعيادة المؤرخ في '.$DATEP.' والمحرر من طرف المصالح الصحية للولاية ',0,1,'R');$pdf->SetFont('aefurat', 'B', 16);
$pdf->propositiondecisions();
$pdf->SetXY(5,$pdf->GetY()+3);$pdf->Cell(200,5,$pdf->article1.$nomar.' '.$prenomar.' طبيب اخصائ في '.$pdf->nbrtostring('mvc','specialite','idspecialite',$SPECIALITE,'specialitear') ,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,' بفتح عيادته (ها) الطبية المتخصصة  الكائن مقرها ' .' ب '.$adresse.' بلدية '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'المادة 02 : يلتزم المستفيد من هذا الترخيص باداء المناوبة بالمؤسسات الصحية العمومية عند الحاجة و  ذلك حسب',0,1,'R');
$pdf->SetXY(0,$pdf->GetY());$pdf->Cell(200,5,' جدول مسطر طرف مدير الصحة والسكان للولاية   ',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'المادة 02 : لايمكن تحويل اي مقر  للعيادة دون استشارة مصالح مديرية الصحة و السكان',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->article3,0,1,'R');$pdf->SetFont('aefurat', '', 12.5);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->article4,0,1,'R');$pdf->SetFont('aefurat', 'B', 14);
$pdf->ctdecision($nomfr,$prenomfr,$DATEP);
$pdf->Output($nomfr.'_'.$prenomfr.'.pdf','I');
$pdf->Output();
?>
