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
}
$pdf->AddPage();
$pdf->SetLineWidth(0.4);
$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->repar,0,0,'C');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->mspar,0,0,'C');
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,$pdf->wilayaar,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->dsparp,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->dssar,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,'رقم : ............./م. ص. س/ '.date("Y"),0,1,'R');$pdf->SetFont('aefurat', '', 16);
$pdf->SetXY(16,$pdf->GetY()+5);$pdf->Cell(100,5,"مدير الصحة و السكان لولاية الجلفـــــــــة",0,0,'C',0,1);
$pdf->SetXY(16,$pdf->GetY()+8);$pdf->Cell(100,5,"الى",0,0,'C',0,1);
//*************//
if ($STRUCTURE==12) {$pdf->directeuruniv($UNIV);} 
if ($STRUCTURE==13) {$pdf->directeuruniv($UNIV);} 
if ($STRUCTURE==14) {$pdf->directeuruniv($UNIV);} 
if ($STRUCTURE==15) {$pdf->directeuruniv($UNIV);}
if ($STRUCTURE==28) {$pdf->directeuruniv($UNIV);}  
if ($STRUCTURE==16) {$pdf->directeuruniv($UNIV);} 
if ($STRUCTURE==17) {$pdf->directeuruniv($UNIV);}
if ($STRUCTURE==11) {$pdf->directeuruniv($UNIV);}
//*************//
if ($STRUCTURE==19) {$pdf->directeurunivx($UNIV);}
if ($STRUCTURE==27) {$pdf->directeurunivx($UNIV);}
 //*************//
if ($STRUCTURE==20) {$pdf->directeurep($UNIV);} 
if ($STRUCTURE==24) {$pdf->directeurep($UNIV);} 
if ($STRUCTURE==18) {$pdf->directeurep($UNIV);} 
if ($STRUCTURE==25) {$pdf->directeurep($UNIV);} 
//*************//
if ($STRUCTURE==23) {$pdf->SetXY(16,$pdf->GetY()+8);$pdf->Cell(100,5,$pdf->directeur_p.$UNIV,0,0,'C',0,1);} 
//*************//

$pdf->SetXY(80,$pdf->GetY()+10);$pdf->Cell(120,5," الموضوع : طلب توثيق شهادة نجاح",0,0,'R',0,1);$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(80,$pdf->GetY()+10);$pdf->Cell(120,5," المرفقات :  ".""."نسخة من الشهادة.",0,0,'R',0,1);$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(0,$pdf->GetY()+15);$pdf->Cell(200,5,'يشرفني أن أطلب منكم توثيق شهادة نجاح الخاصة بـ : ' ,0,1,'R');
$pdf->SetXY(1,$pdf->GetY()+5);$pdf->Cell(200,5,'السيد (ة) : '.$nomar."  ".$prenomar,0,1,'R');
$pdf->SetXY(1,$pdf->GetY()+5);$pdf->Cell(200,5,'المولود (ة) في : '.$DNS."      ببلدية : ".$pdf->nbrtostring('mvc','com','IDCOM',$COMMUNEN,'communear')."       ولايــــة : ".$pdf->nbrtostring('mvc','wil','IDWIL',$WILAYAN,'WILAYASAR'),0,1,'R');
$pdf->SetXY(1,$pdf->GetY()+5);$pdf->Cell(200,5,'و تأكيد صحة المعلومات الخاصة بالمعني (ة) .',0,1,'R');
$pdf->SetXY(1,$pdf->GetY()+5);$pdf->Cell(200,5,'حيث ان المعني (ة) تقدم (ت) بطلب إعتماد نشاط في إطار الممارسة الحرة لمهني الصحة على مستوى ولايتنا.',0,1,'R');
$pdf->SetXY(1,$pdf->GetY()+5);$pdf->Cell(200,5,'تقبلوا منا فائق عبارات التقدير و الإحترام .',0,1,'C');
$pdf->SetXY(1,$pdf->GetY()+15);$pdf->Cell(200,5,"الاسم و اللقب بالاحرف اللاتنية :",0,1,'R');$pdf->SetFont('aefurat', 'B', 12);
$pdf->SetXY(1,$pdf->GetY()+2);$pdf->Cell(200,5,$nomfr." ".$prenomfr,0,1,'R');$pdf->SetFont('aefurat', 'B', 14);
$pdf->SetFont('aefurat', 'B', 14);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(100,5,'الجلفة في : ..............',0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(100,5,'مدير الصحة و السكان ',0,1,'C');
$pdf->Output($nomfr.'_'.$prenomfr.'.pdf','I');
?>
