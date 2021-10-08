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
$photos='../../public/webcam/drh/'.$ndp.'.jpg';
$photosm='../../public/webcam/drh/m.jpg';
$photosf='../../public/webcam/drh/f.jpg';
$sex=	$result["Sexe"];
if(file_exists($photos))
{
	$pdf->Image($photos, $x='5', $y='5', $w=30, $h=35, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());	
}
else
{
	if($sex==1)
	{
		$pdf->Image($photosm, $x='5', $y='5', $w=30, $h=35, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());		
	}
	else
	{
		$pdf->Image($photosf, $x='5', $y='5', $w=30, $h=35, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());		
		
	}	
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
$pdf->SetXY(70,80);$pdf->Cell(65,15,'استمارة معلومات',1,1,'C');
$pdf->SetFont('aefurat', '', 19);
$pdf->Text(6,100,"الاسم :");
$pdf->Text(6,110,"اللقب :");
$pdf->Text(6,120,"تاريخ الميلاد :");
$pdf->Text(6,130,"مكان الميلاد :");
$pdf->Text(6,140,"اسم الاب : ");
$pdf->Text(6,150,"اسم و لقب الام :");
$pdf->Text(6,160,"الحالة العائلية :");
$pdf->Text(6,170,"عدد الاولاد :");
$pdf->Text(6,180,"الرتبة :");
$pdf->Text(6,190,"تاريخ التوظيف :"); $pdf->Text(90,190,"تاريخ الإلتحاق :");
$pdf->Text(6,200,"رقم بطاقة التعريف :");
$pdf->Text(6,210,"رقم الضمان الاجتماعي :");
$pdf->Text(6,220,"العنوان :");
$pdf->Text(128,230,"عين وسارة في :  ");
$pdf->Text(150,240," المدير");
$pdf->SetFont('aefurat', '', 12);
$pdf->Text(5,250," حررت من طرف :");//
$pdf->SetFont('aefurat', '', 28);
$date=date("Y-m-d");
$pdf->SetTextColor(225,0,0);
$pdf->SetFont('aefurat','I', 19);
$pdf->Text(168,230,$date);
$pdf->Text(25,100,$result["Prenom_Arabe"]);
$pdf->Text(25,110,$result["Nomarab"]);
$pdf->Text(42,120,$result["Date_Naissance"]);
$pdf->Text(40,130," بلدية ".$pdf->nbrtostring("grh","com","IDCOM",$result["Commune_Naissancear"],"communear")." ولاية ".$pdf->nbrtostring("grh","wil","IDWIL",$result["Wilaya_Naissancear"],"WILAYASAR"));
$pdf->Text(32,140,$result["pere"]);
$pdf->Text(45,150,$result["mere"]);
$pdf->Text(25,180,$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));
$pdf->Text(45,190,$result["Date_Premier_Recrutement"]);$pdf->Text(128,190,$result["DATEARRIVE"]);
if($result["rnvgradear"]==1 or $result["rnvgradear"]==3 )
{
	$pdf->Text(88,180," في ".$pdf->nbrtostring("grh","specialite","idspecialite",$result["FILIERE"],"specialitear"));
}
$pdf->Text(43,160,$pdf->nbrtostring("grh","sfamiliale","idsfamiliale",$result["Situation_familliale"],"sfamilialear"));
$pdf->Text(36,170,$result["NBRENF"]);
$pdf->Text(65,210,$result["NSECU"]);
$pdf->Text(28,220,$result["ADRESSEAR"]);




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
