<?php 
$ndp=$_GET["uc"];require_once('drh.php');$pdf = new drh('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf-> mysqlconnect(); 
$sql = "SELECT * FROM grh WHERE  idp = '".$ndp."' "; 
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
$result = mysql_fetch_array( $requete ); 
mysql_free_result($requete);

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
	if($sex==1){$pdf->Image($photosm, $x='5', $y='5', $w=30, $h=35, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());		}
	else{$pdf->Image($photosf, $x='5', $y='5', $w=30, $h=35, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());		}	
}

$pdf->ENTETEDRH('استمارة معلومات'," _____",date("Y"));
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
$pdf->Output('.pdf','I');
?>
