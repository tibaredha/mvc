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
}


$y=3;
$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->repar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->wilayaar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->dsparp,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->dssar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'رقم : '.'_____'.' / م. ص. س / '.substr($DATEP,0,4),0,1,'R');$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'مقــــررة فتح  عيادة طبية متخصصــــــة',0,1,'C');$pdf->SetFont('aefurat', '', 16);
$pdf->SetXY(100,$pdf->GetY()+$y);$pdf->Cell(100,5,$pdf->ledspar,0,1,'C');$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->loi18_11,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->decret92_276,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->decret97_261,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->circulaire10_2018,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->avisfavorable,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5," في القطاع الخاص رقم "." 00 "."المؤرخ في "."0000-00-00",0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->servicecivile." **** "."المؤرخة في "."000-00-00",0,1,'R');

$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->diplome16.$DIPLOME.' الصادرة عن جامعة '.$UNIV,0,1,'R');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'- بناء على شهلدة التسجيل بمجلس اخلاقيات المهنة  رقم '.$NUMORDER.'  بتاريخ '.$DATEORDER.' للمعنى (ة)  ',0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'- بناء على مقرر الاستقالة رقم '.$NUMDEM.' المؤرخ في '.$DATEDEM.' الصادر عن المؤسسة العمومية '.' للصحة الجوارية ',0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'  تخص السيد (ة) '.$nomar.' '.$prenomar.' طبيب عام .',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'- بناء على طلب السيد (ة) '.$nomar.' '.$prenomar.' طبيب مختص بتاريخ '.$DATED.' المتعلق بفتح  عيادة طبية متخصصة ',0,1,'R');$pdf->SetFont('aefurat', '', 13);
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'  ب '.$adresse.'  ببلدية  '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'- بناء علي محضر المطابقة الخاص بالعيادة المؤرخ في '.$DATEP.' والمحرر من طرف المصالح الصحية للولاية ',0,1,'R');$pdf->SetFont('aefurat', 'B', 16);

$pdf->SetXY(5,$pdf->GetY()+$y+1);$pdf->Cell(200,5,$pdf->proposition,0,1,'C');$pdf->SetFont('aefurat', 'U', 16);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'يقــــــــــرر ',0,1,'C');$pdf->SetFont('aefurat', '', 13);

$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->article1.$nomar.' '.$prenomar.' طبيب اخصائ في '.$pdf->nbrtostring('mvc','specialite','idspecialite',$SPECIALITE,'specialitear') ,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,' بفتح عيادته (ها) الطبية المتخصصة  الكائن مقرها ' .' ب '.$adresse.' بلدية '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'المادة 02 : لايمكن تحويل اي مقر  للعيادة دون استشارة مصالح مديرية الصحة و السكان',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->article3,0,1,'R');$pdf->SetFont('aefurat', '', 12.5);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->article4,0,1,'R');$pdf->SetFont('aefurat', 'B', 10);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,"الاسم و اللقب بالاحرف اللاتنية : ".$prenom.'_'.$nom,0,1,'R');

$pdf->SetFont('aefurat', 'B', 14);
$pdf->setRTL(true); 
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(100,5,"نسخة مرسلة الى :",1,0,'R');                   $pdf->SetXY(130,$pdf->GetY()+5);$pdf->Cell(50,5,'الجلفة في : '.$DATEP,1,0,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(100,5,"الصندوق الوطني للضمان الاجتماعي ",1,0,'R');    $pdf->SetXY(130,$pdf->GetY()+5);$pdf->Cell(50,5,'مدير الصحة و السكان ',1,0,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(100,5,"المعني بالامر ",1,0,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(100,5," ",1,0,'R');

$pdf->Output();
?>
