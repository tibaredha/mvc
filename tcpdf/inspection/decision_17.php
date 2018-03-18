<?php
$id=$_GET["uc"]; 
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
$query_listex = "SELECT * FROM structure WHERE id  ='$id' ";//
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );

while($rowx=mysql_fetch_object($requetex))
{
// $pdf->cell(40,06,$rowx->Marque,1,0,'C',0);
$num=$rowx->NREALISATION;
$date=$rowx->REALISATION;

$num1=$rowx->NOUVERTURE;
$date1=$rowx->OUVERTURE;

$nomar=$rowx->NOMAR;
$prenomar=$rowx->PRENOMAR;
$adresse=$rowx->ADRESSEAR;
$commune=$pdf->nbrtostring('mvc','comar','IDCOM',$rowx->COMMUNE,'communear');
$wilaya=$rowx->WILAYA;
}
$y=3;
$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'الجمـهوريـــة الجزائرية الديمقراطية الشعبية',0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'وزارة الصحة و السكان وإصلاح المستشفيات',0,1,'C');$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'ولايــــــــة الجلفـــــــــة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'مـديريــــــة الصحة و السكان',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'مصلحة الهياكل و النشاط الصحي',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'رقم : '.$num1.' /م. ص. س / '.substr($date1,0,4),0,1,'R');$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'مقررة تتضمن فتح  عيادة طبية عامـــــــة',0,1,'C');$pdf->SetFont('aefurat', '', 16);
$pdf->SetXY(100,$pdf->GetY()+$y);$pdf->Cell(100,5,'إن مدير الصحة و السكان لولاية الجلفة ',0,1,'C');$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'- بمقتضى القانون 05-85 المؤرخ في 1985/02/16 المتعلق بحماية الصحة و ترقيتها المعدل و المتمم .',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'- بمقتضى المرسوم التنفيدي رقم 276-92 المؤرخ في 1992/07/06 المتعلق بمدونة اخلاقيات الطب .',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'- بمقتضى المرسوم رقم 261/97 المؤرخ في 1997/07/14 المحدد لقواعد الخاصة بتنضيم مديرية الصحة و السكان ',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'- بناء على شهادة النجاح في  الطب العام بتاريخ  '.' 0000/00/00 '.' الصادرة عن جامعة '.'********',0,1,'R');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'- بناء على مقرر الاستقالة رقم '.' 000 '.' المؤرخ في '.' 0000/00/00 '.' الصادر عن المؤسسة العمومية '.' للصحة الجوارية ',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'  تخص السيد (ة) '.$nomar.' '.$prenomar.'',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'- بناء على طلب السيد (ة) '.$nomar.' '.$prenomar.' طبيب عام بتاريخ '.' __ __ ____ '.' المتعلق بفتح  عيادة طبية عامة ',0,1,'R');$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'  ب '.$adresse.'  ببلدية  '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'- بناء على شهلدة التسجيل بمجلس اخلاقيات المهنة  للطب العام  رقم '.' 000 '.' بتاريخ '.' 0000/00/00 '.' للمعنى ',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'- بناء علي محضر المطابقة الخاص بالعيادة المؤرخ في '.'0000/00/00',0,1,'R');
/*************************************************************************************************************************/
$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetXY(5,$pdf->GetY()+$y+1);$pdf->Cell(200,5,'بإقتراح من السيد رئيس مصلحة الهياكل و النشاط الصحي  ',0,1,'C');
$pdf->SetFont('aefurat', 'U', 16);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'يقــــــــــرر ',0,1,'C');
/*************************************************************************************************************************/
$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'المادة الأولى : يرخص للسيد(ة)  '.$nomar.' '.$prenomar.' طبيب عام'.' بفتح عيادته (ها) الطبية العامة الكائن مقرها ',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,' ب '.$adresse.' بلدية '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'المادة 02 : لايمكن تحويل اي مقر  للعيادة دون استشارة مصالح مديرية الصحة و السكان',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'المادة 03 :  يسري مفعول هذه المقررة ابتداء من تاريخ أمضائها',0,1,'R');$pdf->SetFont('aefurat', '', 12.5);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'المادة 04 : '.'يكلف كل من السادة مدير المؤسسة العمومية للصحة الجوارية  '.'و مدير صندوق الضمان الإجتماعي بتنفيذ هذه المقررة .',0,1,'R');
$pdf->SetFont('aefurat', 'B', 14);
$pdf->SetXY(5,$pdf->GetY()+$y+1);$pdf->Cell(100,5,'الجلفة في : '.$date1,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(100,5,'مدير الصحة و السكان ',0,1,'C');
$pdf->Output();
?>
