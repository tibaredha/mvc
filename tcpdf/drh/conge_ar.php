<?php 
$ndp=$_GET["idp"];
$ndc=$_GET["idc"];
require_once('drh.php');$pdf = new drh('P', 'mm', 'A4', true, 'UTF-8', false);
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
$pdf->AddPage();
$pdf->SetLineWidth(0.4);
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
$pdf->SetFont('aefurat', 'U', 28);
$pdf->SetXY(6,80);$pdf->Cell(198,15,' رخصة عطلة سنوية',0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 14);
$pdf->Text(6,$pdf->GetY()+8,"الاسم :" );     $pdf->SetTextColor(225,0,0);$pdf->Text(23,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
$pdf->Text(6,$pdf->GetY()+8,"اللقب :");     $pdf->SetTextColor(225,0,0);$pdf->Text(23,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
$pdf->Text(6,$pdf->GetY()+8,"الرتبـــة :"); $pdf->SetTextColor(225,0,0);$pdf->Text(30,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
$pdf->Text(6,$pdf->GetY()+8,"الوظيفـة :");
$pdf->Text(6,$pdf->GetY()+8,"المصلحة :");
$pdf->Text(6,$pdf->GetY()+8,"المدة :");
$pdf->Text(6,$pdf->GetY()+8,"تاريخ الخروج :");
$pdf->Text(6,$pdf->GetY()+8,"تاريخ الدخول :");
$pdf->Text(6,$pdf->GetY()+8,"سبب الخروج :");
$pdf->Text(6,$pdf->GetY()+8,"المستخلـف :");

$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(198,10,' توضيح العطلة ال ',1,1,'C',1,0);
$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقي من العطل الماضية',1,0,'R',0,0);$pdf->Cell(20,10,'',1,0,'R',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'السنة الحالية',1,0,'R',0,0);$pdf->Cell(20,10,'',1,0,'R',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المجموع',1,0,'R',0,0);$pdf->Cell(20,10,'',1,0,'R',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المدة المأخوذة',1,0,'R',0,0);$pdf->Cell(20,10,'',1,0,'R',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقى من العطل',1,0,'R',0,0);$pdf->Cell(20,10,'',1,0,'R',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);

$pdf->Text(128,$pdf->GetY()+5,"عين وسارة في :  ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(165,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
$pdf->Text(150,$pdf->GetY()+8," المدير");



// if(trim($result["cessation"])=='y'){
// $pdf->Text(65,180,"إلى غاية ");	
// }else{
// $pdf->Text(65,180,"إلى غاية يومنا هذا ");
// } 
// $pdf->Text(10,200,"سلمت هذه الشهادة للمعني (ة) بناء على طلب منه (ها) لغرض ملف اداري");
// $pdf->Text(60,210,"و في حدود ما يسمح به القانون");

//$pdf->SetFont('aefurat', '', 12);$pdf->Text(5,240," حررت من طرف :");//
//$pdf->Text(6,245," السيد(ة):".$_SESSION["USER"]);//
//$pdf->Code39(172,252,$ndp,1,5);
//$pdf->SetFont('aefurat', '', 28);


//$pdf->SetFont('aefurat','I', 19);



// $pdf->Text(50,130,$result["Date_Naissance"]);
// $pdf->Text(54,140,$result["Date_Premier_Recrutement"]);
// $pdf->Text(95,130,$pdf->nbrtostring("grh","com","IDCOM",$result["Commune_Naissancear"],"communear"));
// $pdf->Text(165,130,$pdf->nbrtostring("grh","wil","IDWIL",$result["Wilaya_Naissancear"],"WILAYASAR"));
// 

// $Motif_Cessation=$pdf->nbrtostringx('motif_cessation','idcausedepart',trim($result['Motif_Cessation']),'causedepartar');

// if(trim($result["cessation"])=='y'){
	// $pdf->Text(120,180,"("."تاريخ ال".$Motif_Cessation.")");
	// $A = substr($result["Date_Cessation"],0,2);
	// $M = substr($result["Date_Cessation"],3,2);
	// $J = substr($result["Date_Cessation"],6,4);
	// $Date_Cessation=$J."-".$M."-".$A;
	// $pdf->Text(87,180,$Date_Cessation);	
// } 
// if($result["rnvgradear"]==1 or $result["rnvgradear"]==3 )
// {
	// $pdf->Text(88,170," في ".$pdf->nbrtostring("grh","specialite","idspecialite",$result["FILIERE"],"specialitear"));
// }
// $pdf->Text(26,180,$result["DATEARRIVE"]);
$pdf->Output('trav_ar.pdf','I');
?>
