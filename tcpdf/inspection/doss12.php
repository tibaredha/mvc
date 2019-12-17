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
$pdf->SetFont('aefurat', 'B', 12);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetLineWidth(0.4);
$pdf-> mysqlconnect(); 
$query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$num=$rowx->NREALISATION;
$date=$rowx->REALISATION;
$num1=$rowx->NOUVERTURE;
$date1=$rowx->OUVERTURE;
$nom=$rowx->NOM;
$prenom=$rowx->PRENOM;
$nomar=$rowx->NOMAR;
$prenomar=$rowx->PRENOMAR;
$sexe=$rowx->SEX;
$DNS=$rowx->DNS;
$Mobile=$rowx->Mobile;
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
$NAT=$rowy->NAT;
$PHA1=$rowy->PHA1;
$PHA2=$rowy->PHA2;
$PHA3=$rowy->PHA3;
$DIST1=$rowy->DIST1;
$DIST2=$rowy->DIST2;
$DIST3=$rowy->DIST3;
$CDS0=$rowy->CDS0;
$SDS0=$rowy->SDS0;
$SAH0=$rowy->SAH0;
$SAF0=$rowy->SAF0;
$SAN0=$rowy->SAN0;
$STL=$rowy->STL;
$adresse=$rowy->ADRESSE;
$adressear=$rowy->ADRESSEAR;
$idcommune=$rowy->COMMUNE;
$commune=$pdf->nbrtostring('mvc','comar','IDCOM',$rowy->COMMUNE,'COMMUNE');
$communear=$pdf->nbrtostring('mvc','comar','IDCOM',$rowy->COMMUNE,'communear');
$wilaya=$pdf->nbrtostring('mvc','wil','IDWIL',$rowy->WILAYA,'WILAYAS');;
}
$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspfr,0,1,'C');

$pdf->setRTL($enable=true, $resetx=true);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(140,5,'مصلحة الهياكل و النشاط الصحي',0,0,'R');$pdf->cell(50,5,"الجلفة في : ".date('Y-m-d'),0,1,'L',0,0);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(140,5,'الرقم : .........../ م ص س / '.date('Y'),0,0,'R');
$pdf->SetXY(85,$pdf->GetY()+10);$pdf->Cell(120,5,'السيد مدير الصحة و الســـــــــكان',0,1,'C');
$pdf->SetXY(85,$pdf->GetY()+2);$pdf->Cell(120,5,'الى',0,1,'C');
$pdf->SetXY(85,$pdf->GetY()+2);$pdf->Cell(120,5,' السيـــــــــد ( ة ) : '.$nomar.' - '.$prenomar,0,1,'C');
$pdf->SetXY(85,$pdf->GetY()+2);$pdf->Cell(120,5,$adressear. '  بلدية : '.$communear ,0,1,'C');

//





$pdf->SetXY(25,$pdf->GetY()+15);$pdf->Cell(20,5,'الموضوع :',0,0,'R');

if ($NAT==1) {$pdf->Cell(180,5,'ف / ي  طلبكم المتعلق '.'بتحويل '.'صيدلية '.'ببلدية '.$communear,0,1,'R'); }
if ($NAT==2) {$pdf->Cell(180,5,'ف / ي  طلبكم المتعلق '.'بتنصيب '.'صيدلية '.'ببلدية '.$communear,0,1,'R'); }
if ($NAT==3) {$pdf->Cell(180,5,'ف / ي  طلبكم المتعلق '.'بفتح '.'صيدلية '.'ببلدية '.$communear,0,1,'R'); }
if ($NAT==4) {$pdf->Cell(180,5,'ف / ي  طلبكم المتعلق '.'بغلق'.'صيدلية '.'ببلدية '.$communear,0,1,'R'); }




if ($NAT==1) {$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,'تبعا لطلبكم المتعلق '.'بتحويل '.'صيدلية '. 'يشرفني ان اعلمكم بالموافقة المبدئية كما اطلب منكم تكملة ملفكم بالوثائق التالية',0,1,'R');}
if ($NAT==2) {$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,'تبعا لطلبكم المتعلق '.'بتنصيب '.'صيدلية '. 'يشرفني ان اعلمكم بالموافقة المبدئية كما اطلب منكم تكملة ملفكم بالوثائق التالية',0,1,'R');}
if ($NAT==3) {$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,'تبعا لطلبكم المتعلق '.'بفتح '.'صيدلية '. 'يشرفني ان اعلمكم بالموافقة المبدئية كما اطلب منكم تكملة ملفكم بالوثائق التالية',0,1,'R');}
if ($NAT==4) {$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,'تبعا لطلبكم المتعلق '.'بغلق'.'صيدلية '. 'يشرفني ان اعلمكم بالموافقة المبدئية كما اطلب منكم تكملة ملفكم بالوثائق التالية',0,1,'R');}




$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,'في اجل 20 يوما والا سوف يلغى طلبكم ',0,1,'R');

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(95,5,'قائمة الوثائق المطلوبة في حالة ',0,0,'R');                        
if ($NAT==1) {$pdf->Cell(20,5,'التحويل',1,1,'C');}
if ($NAT==2) {$pdf->Cell(20,5,'التنصيب',1,1,'C');} 
if ($NAT==3) {$pdf->Cell(20,5,'الفتح',1,1,'C');}
if ($NAT==4) {$pdf->Cell(20,5,'الغلق',1,1,'C');}

$pdf->SetXY(15,$pdf->GetY()+2);$pdf->Cell(95,5,'- طلب خطي ',0,0,'R');                                   $pdf->Cell(20,5,'',1,1,'C');
$pdf->SetXY(15,$pdf->GetY()+2);$pdf->Cell(95,5,'- شهادة الميلاد',0,0,'R');                               $pdf->Cell(20,5,'',1,1,'C');
$pdf->SetXY(15,$pdf->GetY()+2);$pdf->Cell(95,5,'- شهادة الجنسية',0,0,'R');                              $pdf->Cell(20,5,'',1,1,'C');
$pdf->SetXY(15,$pdf->GetY()+2);$pdf->Cell(95,5,'- شهادة السوابق العدلية',0,0,'R');                      $pdf->Cell(20,5,'',1,1,'C');
$pdf->SetXY(15,$pdf->GetY()+2);$pdf->Cell(95,5,'- شهادة النجاح ',0,0,'R');                              $pdf->Cell(20,5,'',1,1,'C');
$pdf->SetXY(15,$pdf->GetY()+2);$pdf->Cell(95,5,'- شهادت التسجيل في الفرع النضامي الجهوي ',0,0,'R');     $pdf->Cell(20,5,'',1,1,'C');
if ($sexe=='M'){$pdf->SetXY(15,$pdf->GetY()+2);$pdf->Cell(95,5,'- الوضعية تجاه الخدمة الوطنية',0,0,'R');$pdf->Cell(20,5,'',1,1,'C');} 
$pdf->SetXY(15,$pdf->GetY()+2);$pdf->Cell(95,5,'- مقرر الاستقالة / مقرر الغلق ',0,0,'R');                $pdf->Cell(20,5,'',1,1,'C');
$pdf->SetXY(15,$pdf->GetY()+2);$pdf->Cell(95,5,'- شهادة عدم الانتساب'.' (CNAS + CASNOS) ',0,0,'R');      $pdf->Cell(20,5,'',1,1,'C');
$pdf->SetXY(15,$pdf->GetY()+2);$pdf->Cell(95,5,'- شهادة طبية عامة و خاصة ',0,0,'R');                    $pdf->Cell(20,5,'',1,1,'C');
$pdf->SetXY(15,$pdf->GetY()+2);$pdf->Cell(95,5,'- صور شمسية 02 ',0,0,'R');                              $pdf->Cell(20,5,'',1,1,'C');
$pdf->SetXY(15,$pdf->GetY()+2);$pdf->Cell(95,5,'- عقد الكراء او الملكية للمحل ',0,0,'R');               $pdf->Cell(20,5,'',1,1,'C');
$pdf->SetXY(15,$pdf->GetY()+2);$pdf->Cell(95,5,'مخطط تفصيلي للمحل مقياس 1/100 (A4) ',0,0,'R');          $pdf->Cell(20,5,'',1,1,'C');
$pdf->SetXY(15,$pdf->GetY()+2);$pdf->Cell(95,5,'شهادة المطابقة للمحل',0,0,'R');                         $pdf->Cell(20,5,'',1,1,'C');


$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(50,5,'تقبلوا تحيـــــــــــاتنا',0,1,'R');
$pdf->SetXY(120,$pdf->GetY()+5);$pdf->Cell(50,5,'مدير الصحة و الســــــــكان',0,1,'R');
$pdf->setRTL($enable=false, $resetx=true);

$pdf->Output();
?>
