<?php 
$ndp=$_GET["uc"];
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
$sql = "SELECT * FROM grh WHERE  idp = '".$ndp."' "; 
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
$result = mysql_fetch_array( $requete ); 
mysql_free_result($requete);


// $query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";//
// $requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
// while($rowx=mysql_fetch_object($requetex))
// {
// $nomar=$rowx->NOMAR;
// $prenomar=$rowx->PRENOMAR;
// $nomfr=$rowx->NOM;
// $prenomfr=$rowx->PRENOM;
// $UNIV=$rowx->UNIV;
// $STRUCTURE=$rowx->STRUCTURE;
// }
$pdf->AddPage();
$pdf->SetLineWidth(0.4);
$photos='../../public/photos/'.$ndp.'.jpg';
if(file_exists($photos)){
$pdf->Image($photos, $x='5', $y='5', $w=30, $h=35, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());	
}
else{
	
	
}


$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->repar,0,0,'C');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->mspar,0,0,'C');
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,$pdf->wilayaar,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->dsparp,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"المؤسسة العمومية الاستشفائية عين وسارة",0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"المديرية الفرعية للموارد البشرية",0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,'رقم : ............./م . م . ب /'.date("Y"),0,1,'R');$pdf->SetFont('aefurat', '', 16);
$pdf->setRTL(true);

$pdf->SetFont('aefurat', '', 28);
$pdf->SetXY(70,80);
$pdf->Cell(65,15,'شهادة عمل',1,1,'C');
$pdf->SetFont('aefurat', '', 18);
$pdf->Text(5,110," يشهد السيـد مديـرالمؤسسة العمومية الاستشفائية بعين وسارة بأن السيد(ة):");
$pdf->Text(5,120," الاسم :");
$pdf->Text(100,120," اللقب :");
$pdf->Text(5,130,"المولود (ة) بتاريخ : ");
$pdf->Text(82,130," بـ");
$pdf->Text(150,130," ولاية ");
$pdf->Text(5,140,"تم تعيينه (ها) بتاريخ:");
$pdf->Text(60,160,"و"." (ت) يعمل بمؤسستنا كما يلي : ");
$pdf->Text(10,170,"الرتبة :  ");
$pdf->Text(10,180,"منذ :");
$pdf->Text(65,180,"إلى غاية يومنا هذا ");
$pdf->Text(10,200,"سلمت هذه الشهادة للمعني (ة) بناء على طلب منه (ها) لغرض ملف اداري");
$pdf->Text(60,210,"و في حدود ما يسمح به القانون");
$pdf->Text(128,220,"عين وسارة في :  ");
$pdf->Text(150,230," المدير");
$pdf->SetFont('aefurat', '', 12);
$pdf->Text(5,240," حررت من طرف :");//
//$pdf->Text(6,245," السيد(ة):".$_SESSION["USER"]);//
//$pdf->Code39(172,252,$ndp,1,5);
$pdf->SetFont('aefurat', '', 28);
$date=date("Y-m-d");
$pdf->SetTextColor(225,0,0);
$pdf->SetFont('aefurat','I', 19);
$pdf->Text(165,220,$date);
$pdf->Text(120,120,$result["Nomarab"]);
$pdf->Text(25,120,$result["Prenom_Arabe"]);
$pdf->Text(50,130,$result["Date_Naissance"]);
$pdf->Text(54,140,$result["Date_Premier_Recrutement"]);
$pdf->Text(95,130,$pdf->nbrtostring("grh","com","IDCOM",$result["Commune_Naissancear"],"communear"));
$pdf->Text(165,130,$pdf->nbrtostring("grh","wil","IDWIL",$result["Wilaya_Naissancear"],"WILAYASAR"));
$pdf->Text(30,170,$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));

if($result["rnvgradear"]==1 or $result["rnvgradear"]==3 )
{
$pdf->Text(88,170," في ".$pdf->nbrtostring("grh","specialite","idspecialite",$result["FILIERE"],"specialitear"));
}
$pdf->Text(26,180,$result["DATEARRIVE"]);

// $pdf->SetXY(16,$pdf->GetY()+5);$pdf->Cell(100,5,"مدير الصحة و السكان لولاية الجلفـــــــــة",0,0,'C',0,1);
// $pdf->SetXY(16,$pdf->GetY()+8);$pdf->Cell(100,5,"الى",0,0,'C',0,1);
// if ($STRUCTURE==12) {$pdf->SetXY(16,$pdf->GetY()+8);$pdf->Cell(100,5,$pdf->directeur.$UNIV,0,0,'C',0,1);} 
// if ($STRUCTURE==13) {$pdf->SetXY(16,$pdf->GetY()+8);$pdf->Cell(100,5,$pdf->directeur.$UNIV,0,0,'C',0,1);} 
// if ($STRUCTURE==14) {$pdf->SetXY(16,$pdf->GetY()+8);$pdf->Cell(100,5,$pdf->directeur.$UNIV,0,0,'C',0,1);} 
// if ($STRUCTURE==15) {$pdf->SetXY(16,$pdf->GetY()+8);$pdf->Cell(100,5,$pdf->directeur.$UNIV,0,0,'C',0,1);} 
// if ($STRUCTURE==16) {$pdf->SetXY(16,$pdf->GetY()+8);$pdf->Cell(100,5,$pdf->directeur.$UNIV,0,0,'C',0,1);} 
// if ($STRUCTURE==17) {$pdf->SetXY(16,$pdf->GetY()+8);$pdf->Cell(100,5,$pdf->directeur.$UNIV,0,0,'C',0,1);} 
// if ($STRUCTURE==19) {$pdf->SetXY(16,$pdf->GetY()+8);$pdf->Cell(100,5,$pdf->directeur.$UNIV,0,0,'C',0,1);} 
// if ($STRUCTURE==23) {$pdf->SetXY(16,$pdf->GetY()+8);$pdf->Cell(100,5,$pdf->directeur_p.$UNIV,0,0,'C',0,1);} 
// if ($STRUCTURE==24) {$pdf->SetXY(16,$pdf->GetY()+8);$pdf->Cell(100,5,$pdf->directeur_p.$UNIV,0,0,'C',0,1);} 
// if ($STRUCTURE==25) {$pdf->SetXY(16,$pdf->GetY()+8);$pdf->Cell(100,5,$pdf->directeur_p.$UNIV,0,0,'C',0,1);} 
// $pdf->SetXY(80,$pdf->GetY()+10);$pdf->Cell(120,5," الموضوع : طلب توثيق شهادة",0,0,'R',0,1);$pdf->SetFont('aefurat', '', 14);
// $pdf->SetXY(80,$pdf->GetY()+10);$pdf->Cell(120,5," المرفقات :  ".""."نسخة من الشهادة.",0,0,'R',0,1);$pdf->SetFont('aefurat', '', 12);
// $pdf->SetXY(0,$pdf->GetY()+15);$pdf->Cell(200,5,'يشرفني أن أطلب منكم توثيق شهادة السيد(ة) '.$nomar.' '.$prenomar .' .' ,0,1,'R');
// $pdf->SetXY(1,$pdf->GetY()+5);$pdf->Cell(200,5,'و تأكيد صحة المعلومات الخاصة بالمعني (ة) .',0,1,'R');
// $pdf->SetXY(1,$pdf->GetY()+5);$pdf->Cell(200,5,'حيث ان المعني (ة) تقدم (ت) بطلب إعتماد نشاط في إطار الممارسة الحرة لمهني الصحة على مستوى ولايتنا.',0,1,'R');
// $pdf->SetXY(1,$pdf->GetY()+5);$pdf->Cell(200,5,'تقبلوا منا فائق عبارات التقدير و الإحترام .',0,1,'C');
// $pdf->SetFont('aefurat', 'B', 14);
// $pdf->SetXY(5,$pdf->GetY()+15);$pdf->Cell(100,5,'الجلفة في : ..............',0,1,'C');
// $pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(100,5,'مدير الصحة و السكان ',0,1,'C');
$pdf->Output('.pdf','I');
?>
