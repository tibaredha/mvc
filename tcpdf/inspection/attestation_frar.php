<?php
$ids=$_GET["uc"]; 
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
$pdf-> mysqlconnect(); 
$query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";//
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$nomar=$rowx->NOMAR;
$prenomar=$rowx->PRENOMAR;
$nomfr=$rowx->NOM;
$prenomfr=$rowx->PRENOM;
$DNS=$rowx->DNS;
$COMMUNEN=$rowx->COMMUNEN;
$WILAYAN=$rowx->WILAYAN;
$UNIV=$rowx->UNIV;
$STRUCTURE=$rowx->STRUCTURE;
$OUVERTURE=$rowx->OUVERTURE;
}



// $query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );//
// while($rowy=mysql_fetch_object($requetey))
// {
// $NUMD=$rowy->NUMD;
// $DATED=$rowy->DATED;
// $DATEP=$rowy->DATEP;
// $adressen=$rowy->ADRESSEAR;$communen=$pdf->nbrtostring('mvc','comar','IDCOM',$rowy->COMMUNE,'communear');$wilayan=$rowy->WILAYA;
// }



$pdf->AddPage();
$pdf->SetLineWidth(0.4);
$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
//$pdf->entetedecision("شهـــــــادة عمل",date('Y'));

$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->repar,0,0,'C');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->mspar,0,0,'C');
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,$pdf->wilayaar,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->dsparp,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->dssar,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,'رقم : ............./م. ص. س/ '.date("Y"),0,1,'R');$pdf->SetFont('aefurat', '', 16);
$pdf->SetXY(16,$pdf->GetY()+5);$pdf->Cell(200,5,"شهـــــــادة عمل",0,0,'C',0,1);

$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+15);$pdf->Cell(200,5," يشهد السيد مدير الصحة و السكان لولاية الجلفة بان السيد (ة) : ",0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5," الاسم :".$prenomar,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5," اللقب :".$nomar,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"المولود (ة) بتاريخ : ".$DNS,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5," بـ : ".$pdf->nbrtostring('mvc','com','IDCOM',$COMMUNEN,'communear'),0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5," ولاية : ",0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"تم فتح عيادته (ها) بتاريخ : ".$OUVERTURE,0,0,'R');
// $pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"و"." (ت) يعمل بمؤسستنا كما يلي : ",0,0,'R');
// $pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"الرتبة :  ",0,0,'R');
// $pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"منذ :",0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"إلى غاية يومنا هذا ",0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"سلمت هذه الشهادة للمعني (ة) بناء على طلب منه (ها) لغرض ملف اداري",0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"و في حدود ما يسمح به القانون",0,0,'R');

//$pdf->Text(65,180,"إلى غاية ");	

$pdf->SetXY(1,$pdf->GetY()+15);$pdf->Cell(200,5,"الاسم و اللقب بالاحرف اللاتنية :",0,1,'R');$pdf->SetFont('aefurat', 'B', 12);
$pdf->SetXY(1,$pdf->GetY()+2);$pdf->Cell(200,5,$nomfr." ".$prenomfr,0,1,'R');$pdf->SetFont('aefurat', 'B', 14);
$pdf->SetFont('aefurat', 'B', 14);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(100,5,'الجلفة في : ..............',0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(100,5,'مدير الصحة و السكان ',0,1,'C');
$pdf->Output($nomfr.'_'.$prenomfr.'.pdf','I');
?>
