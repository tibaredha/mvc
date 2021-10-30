<?php 
$ndp=$_GET["uc"];require_once('drh.php');$pdf = new drh('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf-> mysqlconnect(); 
$sql = "SELECT * FROM grh WHERE  idp = '".$ndp."' "; 
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
$result = mysql_fetch_array( $requete ); 
mysql_free_result($requete);

$pdf->ENTETEDRH('شهادة عمل'," _____",date("Y"));

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
if(trim($result["cessation"])=='y'){
$pdf->Text(65,180,"إلى غاية ");	
}else{
$pdf->Text(65,180,"إلى غاية يومنا هذا ");
} 
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

$Motif_Cessation=$pdf->nbrtostringx('motif_cessation','idcausedepart',trim($result['Motif_Cessation']),'causedepartar');

if(trim($result["cessation"])=='y'){
	$pdf->Text(120,180,"("."تاريخ ال".$Motif_Cessation.")");
	$A = substr($result["Date_Cessation"],0,2);
	$M = substr($result["Date_Cessation"],3,2);
	$J = substr($result["Date_Cessation"],6,4);
	$Date_Cessation=$J."-".$M."-".$A;
	$pdf->Text(87,180,$Date_Cessation);	
} 
if($result["rnvgradear"]==1 or $result["rnvgradear"]==3 )
{
	$pdf->Text(88,170," في ".$pdf->nbrtostring("grh","specialite","idspecialite",$result["FILIERE"],"specialitear"));
}
$pdf->Text(26,180,$result["DATEARRIVE"]);
$pdf->Output('trav_ar.pdf','I');
?>
