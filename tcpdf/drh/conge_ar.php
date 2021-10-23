<?php 
$ndp=$_GET["idp"];
$idc=$_GET["idc"];
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
//******************************************************//
$sql1 = "SELECT * FROM regconge WHERE  id = '".$idc."' "; 
$requete1 = @mysql_query($sql1) or die($sql1."<br>".mysql_error()) ;
$result1 = mysql_fetch_array( $requete1 ); 
mysql_free_result($requete1);
$pdf->AddPage();$y=7;
$pdf->entete_drh($y);
$pdf->setRTL(true);

if($result1["CAUSECONGE"]==1){
	$pdf->SetFont('aefurat', 'U', 28);$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,' رخصة عطلة سنوية',0,1,'C',1,0);$pdf->SetFont('aefurat', '', 14);
	$pdf->Text(6,$pdf->GetY()+8,"الاسم :" );        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"اللقب :");        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الرتبـــة :");    $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الوظيفـة :");     $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"المصلحة :");      $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"المدة :");        $pdf->SetTextColor(225,0,0);$pdf->Text(19,$pdf->GetY(),$result1["DURECONGE"]." يوم / ايام ");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الخروج :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["DEBUTCONGE"]);$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الدخول :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["FINCONGE"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"سبب الخروج :");   $pdf->SetTextColor(225,0,0);$pdf->Text(32,$pdf->GetY(),$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"));$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"المستخلـف :");    $pdf->SetTextColor(225,0,0);$pdf->Text(30,$pdf->GetY(),$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Nomarab")." _ ".$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Prenom_Arabe"));$pdf->SetTextColor(0,0,0);
	$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(198,10,' توضيح العطلة : '.$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"),1,1,'C',1,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقي من العطل الماضية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'السنة الحالية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المجموع',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المدة المأخوذة',1,0,'R',0,0);$pdf->Cell(20,10,$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقى من العطل',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"]-$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->Text(128,$pdf->GetY()+5,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
	$pdf->Text(150,$pdf->GetY()+8," المدير");	
}
if($result1["CAUSECONGE"]==2){
	$pdf->SetFont('aefurat', 'U', 28);$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,' رخصة عطلة سنوية',0,1,'C',1,0);$pdf->SetFont('aefurat', '', 14);
	$pdf->Text(6,$pdf->GetY()+8,"الاسم :" );        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"اللقب :");        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الرتبـــة :");    $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الوظيفـة :");     $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"المصلحة :");      $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"المدة :");        $pdf->SetTextColor(225,0,0);$pdf->Text(19,$pdf->GetY(),$result1["DURECONGE"]." يوم / ايام ");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الخروج :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["DEBUTCONGE"]);$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الدخول :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["FINCONGE"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"سبب الخروج :");   $pdf->SetTextColor(225,0,0);$pdf->Text(32,$pdf->GetY(),$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"));$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"المستخلـف :");    $pdf->SetTextColor(225,0,0);$pdf->Text(30,$pdf->GetY(),$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Nomarab")." _ ".$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Prenom_Arabe"));$pdf->SetTextColor(0,0,0);
	$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(198,10,' توضيح العطلة : '.$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"),1,1,'C',1,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقي من العطل الماضية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'السنة الحالية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المجموع',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المدة المأخوذة',1,0,'R',0,0);$pdf->Cell(20,10,$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقى من العطل',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"]-$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->Text(128,$pdf->GetY()+5,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
	$pdf->Text(150,$pdf->GetY()+8," المدير");	
}
if($result1["CAUSECONGE"]==3){
	$pdf->SetFont('aefurat', 'U', 28);$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,' رخصة عطلة سنوية',0,1,'C',1,0);$pdf->SetFont('aefurat', '', 14);
	$pdf->Text(6,$pdf->GetY()+8,"الاسم :" );        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"اللقب :");        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الرتبـــة :");    $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الوظيفـة :");     $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"المصلحة :");      $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"المدة :");        $pdf->SetTextColor(225,0,0);$pdf->Text(19,$pdf->GetY(),$result1["DURECONGE"]." يوم / ايام ");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الخروج :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["DEBUTCONGE"]);$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الدخول :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["FINCONGE"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"سبب الخروج :");   $pdf->SetTextColor(225,0,0);$pdf->Text(32,$pdf->GetY(),$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"));$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"المستخلـف :");    $pdf->SetTextColor(225,0,0);$pdf->Text(30,$pdf->GetY(),$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Nomarab")." _ ".$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Prenom_Arabe"));$pdf->SetTextColor(0,0,0);
	$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(198,10,' توضيح العطلة : '.$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"),1,1,'C',1,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقي من العطل الماضية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'السنة الحالية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المجموع',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المدة المأخوذة',1,0,'R',0,0);$pdf->Cell(20,10,$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقى من العطل',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"]-$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->Text(128,$pdf->GetY()+5,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
	$pdf->Text(150,$pdf->GetY()+8," المدير");	
}
if($result1["CAUSECONGE"]==4){
	$pdf->SetFont('aefurat', 'U', 28);$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,' رخصة عطلة سنوية',0,1,'C',1,0);$pdf->SetFont('aefurat', '', 14);
	$pdf->Text(6,$pdf->GetY()+8,"الاسم :" );        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"اللقب :");        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الرتبـــة :");    $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الوظيفـة :");     $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"المصلحة :");      $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"المدة :");        $pdf->SetTextColor(225,0,0);$pdf->Text(19,$pdf->GetY(),$result1["DURECONGE"]." يوم / ايام ");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الخروج :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["DEBUTCONGE"]);$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الدخول :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["FINCONGE"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"سبب الخروج :");   $pdf->SetTextColor(225,0,0);$pdf->Text(32,$pdf->GetY(),$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"));$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"المستخلـف :");    $pdf->SetTextColor(225,0,0);$pdf->Text(30,$pdf->GetY(),$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Nomarab")." _ ".$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Prenom_Arabe"));$pdf->SetTextColor(0,0,0);
	$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(198,10,' توضيح العطلة : '.$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"),1,1,'C',1,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقي من العطل الماضية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'السنة الحالية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المجموع',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المدة المأخوذة',1,0,'R',0,0);$pdf->Cell(20,10,$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقى من العطل',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"]-$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->Text(128,$pdf->GetY()+5,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
	$pdf->Text(150,$pdf->GetY()+8," المدير");	
}
if($result1["CAUSECONGE"]==5){
	$pdf->SetFont('aefurat', 'U', 28);$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,' رخصة عطلة سنوية',0,1,'C',1,0);$pdf->SetFont('aefurat', '', 14);
	$pdf->Text(6,$pdf->GetY()+8,"الاسم :" );        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"اللقب :");        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الرتبـــة :");    $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الوظيفـة :");     $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"المصلحة :");      $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"المدة :");        $pdf->SetTextColor(225,0,0);$pdf->Text(19,$pdf->GetY(),$result1["DURECONGE"]." يوم / ايام ");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الخروج :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["DEBUTCONGE"]);$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الدخول :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["FINCONGE"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"سبب الخروج :");   $pdf->SetTextColor(225,0,0);$pdf->Text(32,$pdf->GetY(),$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"));$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"المستخلـف :");    $pdf->SetTextColor(225,0,0);$pdf->Text(30,$pdf->GetY(),$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Nomarab")." _ ".$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Prenom_Arabe"));$pdf->SetTextColor(0,0,0);
	$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(198,10,' توضيح العطلة : '.$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"),1,1,'C',1,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقي من العطل الماضية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'السنة الحالية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المجموع',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المدة المأخوذة',1,0,'R',0,0);$pdf->Cell(20,10,$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقى من العطل',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"]-$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->Text(128,$pdf->GetY()+5,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
	$pdf->Text(150,$pdf->GetY()+8," المدير");	
}
if($result1["CAUSECONGE"]==6){
	$pdf->SetFont('aefurat', 'U', 28);$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,' رخصة عطلة سنوية',0,1,'C',1,0);$pdf->SetFont('aefurat', '', 14);
	$pdf->Text(6,$pdf->GetY()+8,"الاسم :" );        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"اللقب :");        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الرتبـــة :");    $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الوظيفـة :");     $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"المصلحة :");      $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"المدة :");        $pdf->SetTextColor(225,0,0);$pdf->Text(19,$pdf->GetY(),$result1["DURECONGE"]." يوم / ايام ");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الخروج :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["DEBUTCONGE"]);$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الدخول :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["FINCONGE"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"سبب الخروج :");   $pdf->SetTextColor(225,0,0);$pdf->Text(32,$pdf->GetY(),$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"));$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"المستخلـف :");    $pdf->SetTextColor(225,0,0);$pdf->Text(30,$pdf->GetY(),$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Nomarab")." _ ".$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Prenom_Arabe"));$pdf->SetTextColor(0,0,0);
	$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(198,10,' توضيح العطلة : '.$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"),1,1,'C',1,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقي من العطل الماضية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'السنة الحالية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المجموع',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المدة المأخوذة',1,0,'R',0,0);$pdf->Cell(20,10,$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقى من العطل',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"]-$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->Text(128,$pdf->GetY()+5,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
	$pdf->Text(150,$pdf->GetY()+8," المدير");	
}
if($result1["CAUSECONGE"]==7){
	$pdf->SetFont('aefurat', 'U', 28);$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,' رخصة عطلة سنوية',0,1,'C',1,0);$pdf->SetFont('aefurat', '', 14);
	$pdf->Text(6,$pdf->GetY()+8,"الاسم :" );        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"اللقب :");        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الرتبـــة :");    $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الوظيفـة :");     $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"المصلحة :");      $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"المدة :");        $pdf->SetTextColor(225,0,0);$pdf->Text(19,$pdf->GetY(),$result1["DURECONGE"]." يوم / ايام ");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الخروج :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["DEBUTCONGE"]);$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الدخول :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["FINCONGE"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"سبب الخروج :");   $pdf->SetTextColor(225,0,0);$pdf->Text(32,$pdf->GetY(),$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"));$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"المستخلـف :");    $pdf->SetTextColor(225,0,0);$pdf->Text(30,$pdf->GetY(),$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Nomarab")." _ ".$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Prenom_Arabe"));$pdf->SetTextColor(0,0,0);
	$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(198,10,' توضيح العطلة : '.$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"),1,1,'C',1,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقي من العطل الماضية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'السنة الحالية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المجموع',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المدة المأخوذة',1,0,'R',0,0);$pdf->Cell(20,10,$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقى من العطل',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"]-$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->Text(128,$pdf->GetY()+5,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
	$pdf->Text(150,$pdf->GetY()+8," المدير");	
}
if($result1["CAUSECONGE"]==8){
	$pdf->SetFont('aefurat', 'U', 28);$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,' رخصة عطلة سنوية',0,1,'C',1,0);$pdf->SetFont('aefurat', '', 14);
	$pdf->Text(6,$pdf->GetY()+8,"الاسم :" );        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"اللقب :");        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الرتبـــة :");    $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الوظيفـة :");     $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"المصلحة :");      $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"المدة :");        $pdf->SetTextColor(225,0,0);$pdf->Text(19,$pdf->GetY(),$result1["DURECONGE"]." يوم / ايام ");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الخروج :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["DEBUTCONGE"]);$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الدخول :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["FINCONGE"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"سبب الخروج :");   $pdf->SetTextColor(225,0,0);$pdf->Text(32,$pdf->GetY(),$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"));$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"المستخلـف :");    $pdf->SetTextColor(225,0,0);$pdf->Text(30,$pdf->GetY(),$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Nomarab")." _ ".$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Prenom_Arabe"));$pdf->SetTextColor(0,0,0);
	$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(198,10,' توضيح العطلة : '.$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"),1,1,'C',1,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقي من العطل الماضية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'السنة الحالية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المجموع',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المدة المأخوذة',1,0,'R',0,0);$pdf->Cell(20,10,$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقى من العطل',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"]-$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->Text(128,$pdf->GetY()+5,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
	$pdf->Text(150,$pdf->GetY()+8," المدير");	
}
if($result1["CAUSECONGE"]==9){
	$pdf->SetFont('aefurat', 'U', 28);$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,' رخصة عطلة سنوية',0,1,'C',1,0);$pdf->SetFont('aefurat', '', 14);
	$pdf->Text(6,$pdf->GetY()+8,"الاسم :" );        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"اللقب :");        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الرتبـــة :");    $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الوظيفـة :");     $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"المصلحة :");      $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"المدة :");        $pdf->SetTextColor(225,0,0);$pdf->Text(19,$pdf->GetY(),$result1["DURECONGE"]." يوم / ايام ");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الخروج :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["DEBUTCONGE"]);$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الدخول :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["FINCONGE"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"سبب الخروج :");   $pdf->SetTextColor(225,0,0);$pdf->Text(32,$pdf->GetY(),$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"));$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"المستخلـف :");    $pdf->SetTextColor(225,0,0);$pdf->Text(30,$pdf->GetY(),$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Nomarab")." _ ".$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Prenom_Arabe"));$pdf->SetTextColor(0,0,0);
	$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(198,10,' توضيح العطلة : '.$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"),1,1,'C',1,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقي من العطل الماضية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'السنة الحالية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المجموع',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المدة المأخوذة',1,0,'R',0,0);$pdf->Cell(20,10,$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقى من العطل',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"]-$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->Text(128,$pdf->GetY()+5,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
	$pdf->Text(150,$pdf->GetY()+8," المدير");	
}
if($result1["CAUSECONGE"]==10){
	$pdf->SetFont('aefurat', 'U', 28);$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,' رخصة عطلة سنوية',0,1,'C',1,0);$pdf->SetFont('aefurat', '', 14);
	$pdf->Text(6,$pdf->GetY()+8,"الاسم :" );        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"اللقب :");        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الرتبـــة :");    $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الوظيفـة :");     $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"المصلحة :");      $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"المدة :");        $pdf->SetTextColor(225,0,0);$pdf->Text(19,$pdf->GetY(),$result1["DURECONGE"]." يوم / ايام ");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الخروج :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["DEBUTCONGE"]);$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الدخول :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["FINCONGE"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"سبب الخروج :");   $pdf->SetTextColor(225,0,0);$pdf->Text(32,$pdf->GetY(),$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"));$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"المستخلـف :");    $pdf->SetTextColor(225,0,0);$pdf->Text(30,$pdf->GetY(),$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Nomarab")." _ ".$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Prenom_Arabe"));$pdf->SetTextColor(0,0,0);
	$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(198,10,' توضيح العطلة : '.$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"),1,1,'C',1,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقي من العطل الماضية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'السنة الحالية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المجموع',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المدة المأخوذة',1,0,'R',0,0);$pdf->Cell(20,10,$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقى من العطل',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"]-$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->Text(128,$pdf->GetY()+5,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
	$pdf->Text(150,$pdf->GetY()+8," المدير");	
}
if($result1["CAUSECONGE"]==11){
	$pdf->SetFont('aefurat', 'U', 28);$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,' رخصة عطلة سنوية',0,1,'C',1,0);$pdf->SetFont('aefurat', '', 14);
	$pdf->Text(6,$pdf->GetY()+8,"الاسم :" );        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"اللقب :");        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الرتبـــة :");    $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الوظيفـة :");     $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"المصلحة :");      $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"المدة :");        $pdf->SetTextColor(225,0,0);$pdf->Text(19,$pdf->GetY(),$result1["DURECONGE"]." يوم / ايام ");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الخروج :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["DEBUTCONGE"]);$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الدخول :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["FINCONGE"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"سبب الخروج :");   $pdf->SetTextColor(225,0,0);$pdf->Text(32,$pdf->GetY(),$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"));$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"المستخلـف :");    $pdf->SetTextColor(225,0,0);$pdf->Text(30,$pdf->GetY(),$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Nomarab")." _ ".$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Prenom_Arabe"));$pdf->SetTextColor(0,0,0);
	$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(198,10,' توضيح العطلة : '.$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"),1,1,'C',1,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقي من العطل الماضية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'السنة الحالية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المجموع',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المدة المأخوذة',1,0,'R',0,0);$pdf->Cell(20,10,$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقى من العطل',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"]-$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->Text(128,$pdf->GetY()+5,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
	$pdf->Text(150,$pdf->GetY()+8," المدير");	
}
if($result1["CAUSECONGE"]==12){
	$pdf->SetFont('aefurat', 'U', 28);$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,' رخصة عطلة سنوية',0,1,'C',1,0);$pdf->SetFont('aefurat', '', 14);
	$pdf->Text(6,$pdf->GetY()+8,"الاسم :" );        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"اللقب :");        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الرتبـــة :");    $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الوظيفـة :");     $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"المصلحة :");      $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"المدة :");        $pdf->SetTextColor(225,0,0);$pdf->Text(19,$pdf->GetY(),$result1["DURECONGE"]." يوم / ايام ");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الخروج :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["DEBUTCONGE"]);$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الدخول :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["FINCONGE"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"سبب الخروج :");   $pdf->SetTextColor(225,0,0);$pdf->Text(32,$pdf->GetY(),$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"));$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"المستخلـف :");    $pdf->SetTextColor(225,0,0);$pdf->Text(30,$pdf->GetY(),$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Nomarab")." _ ".$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Prenom_Arabe"));$pdf->SetTextColor(0,0,0);
	$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(198,10,' توضيح العطلة : '.$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"),1,1,'C',1,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقي من العطل الماضية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'السنة الحالية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المجموع',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المدة المأخوذة',1,0,'R',0,0);$pdf->Cell(20,10,$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقى من العطل',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"]-$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->Text(128,$pdf->GetY()+5,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
	$pdf->Text(150,$pdf->GetY()+8," المدير");	
}
if($result1["CAUSECONGE"]==13)
{
	$pdf->SetFont('aefurat', 'U', 28);$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,' رخصة عطلة سنوية',0,1,'C',1,0);$pdf->SetFont('aefurat', '', 14);
	$pdf->Text(6,$pdf->GetY()+8,"الاسم :" );        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"اللقب :");        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الرتبـــة :");    $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الوظيفـة :");     $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"المصلحة :");      $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"المدة :");        $pdf->SetTextColor(225,0,0);$pdf->Text(19,$pdf->GetY(),$result1["DURECONGE"]." يوم / ايام ");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الخروج :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["DEBUTCONGE"]);$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الدخول :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["FINCONGE"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"سبب الخروج :");   $pdf->SetTextColor(225,0,0);$pdf->Text(32,$pdf->GetY(),$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"));$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"المستخلـف :");    $pdf->SetTextColor(225,0,0);$pdf->Text(30,$pdf->GetY(),$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Nomarab")." _ ".$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Prenom_Arabe"));$pdf->SetTextColor(0,0,0);
	$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(198,10,' توضيح العطلة : '.$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"),1,1,'C',1,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقي من العطل الماضية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'السنة الحالية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المجموع',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المدة المأخوذة',1,0,'R',0,0);$pdf->Cell(20,10,$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقى من العطل',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"]-$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->Text(128,$pdf->GetY()+5,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
	$pdf->Text(150,$pdf->GetY()+8," المدير");	
}
if($result1["CAUSECONGE"]==14)
{
	$pdf->SetFont('aefurat', 'U', 28);$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,' رخصة عطلة سنوية',0,1,'C',1,0);$pdf->SetFont('aefurat', '', 14);
	$pdf->Text(6,$pdf->GetY()+8,"الاسم :" );        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"اللقب :");        $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الرتبـــة :");    $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"الوظيفـة :");     $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"المصلحة :");      $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"المدة :");        $pdf->SetTextColor(225,0,0);$pdf->Text(19,$pdf->GetY(),$result1["DURECONGE"]." يوم / ايام ");$pdf->SetTextColor(0,0,0);  
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الخروج :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["DEBUTCONGE"]);$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"تاريخ الدخول :"); $pdf->SetTextColor(225,0,0);$pdf->Text(34,$pdf->GetY(),$result1["FINCONGE"]);$pdf->SetTextColor(0,0,0);
	$pdf->Text(6,$pdf->GetY()+8,"سبب الخروج :");   $pdf->SetTextColor(225,0,0);$pdf->Text(32,$pdf->GetY(),$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"));$pdf->SetTextColor(0,0,0); 
	$pdf->Text(6,$pdf->GetY()+8,"المستخلـف :");    $pdf->SetTextColor(225,0,0);$pdf->Text(30,$pdf->GetY(),$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Nomarab")." _ ".$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Prenom_Arabe"));$pdf->SetTextColor(0,0,0);
	$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(198,10,' توضيح العطلة : '.$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"),1,1,'C',1,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقي من العطل الماضية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'السنة الحالية',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المجموع',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'المدة المأخوذة',1,0,'R',0,0);$pdf->Cell(20,10,$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(150,10,'الباقى من العطل',1,0,'R',0,0);$pdf->Cell(20,10,$result1["RESTETOT"]+$result1["RESTEANNEE"]-$result1["DURECONGE"],1,0,'C',0,0);$pdf->Cell(28,10,' يوم / ايام',1,1,'R',0,0);
	$pdf->Text(128,$pdf->GetY()+5,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
	$pdf->Text(150,$pdf->GetY()+8," المدير");	
}

if($result1["CAUSECONGE"]==15)
{
	$pdf->SetXY(15,70);$pdf->Cell(180,8,"مــقرر عطلة مرضية ",0,1,'C');$pdf->SetFont('aefurat', '', 16);
	$pdf->SetXY(15,90);$pdf->Cell(180,8,"إن مدير المؤسسة العمومية الإستشفائية بعين وسارة  ",0,1,'C');
	$pdf->Text(5,100,"بمقتضى : الأمر رقم 03-06 المؤرخ في 15 يوليو سنة 2006 المتضمن القانون الأساسي العام  ");
	$pdf->Text(25,110,"للوظيفة العمومية .");
	$pdf->Text(5,120,"بمقتضى :القانون رقم 11-83 المؤرخ في 02 يوليو سنة 1983 المتعلق بالتأمينات الإجتماعية ");
	$pdf->Text(25,130,"المعدل بالقانون 01-08 المؤرخ في 23 جانفي سنة 2008.");
	$pdf->Text(5,140," بمقتضى : المرسوم التنفيذي رقم 140-07 المؤرخ في 19 ماي سنة 2007 المتضمن إنشاء المؤسسات ");
	$pdf->Text(25,150,"العمومية الإستشفائية و المؤسسات العمومية للصحة الجوارية و تنظيمها و سيرها.");
	$pdf->Text(5,160,"-بناء : على الشهادة الطبية المقدمة .");
	$pdf->Text(90,170,"يقـــــرر");
	$pdf->Text(5,180,"المادة الأولى : تقبل العطلة المرضية المقدرة بـ");
	$pdf->Text(35,190,"لفائدة السيد(ة):");
	$pdf->Text(35,200,"بصفته (ها) :");
	$pdf->Text(35,210,"إبتداء من :");
	$pdf->Text(95,210,"إلى غاية :");
	//$pdf->Text(5,220,"المادة الثانية :خلال هذه العطلة لا تتحصل المسماة أعلاه على أجرها.");
	$pdf->Text(5,220,"المادة الثانية : خلال هذه المدة لا (ت) يتحصل المعني (ة) على أجره (ها).");
	$pdf->Text(5,230,"المادة الثالثة : يكلف كل من السادة المديرة الفرعية للموارد البشرية و أمين الخزينة ");
	$pdf->Text(34,240,"بعين وسارة بتنفيذ هذا المقرر.");
	$pdf->Text(140,250," عين وسارة في :  ");
	//$pdf->Text(175,250,$date);
	$pdf->Text(150,260,"  المدير");
	$pdf->SetFont('aefurat', '', 12);
	$pdf->Text(5,260," حررت من طرف :");//
	// $pdf->Text(6,265," السيد(ة):".$_SESSION["USER"]);//
	$pdf->SetFont('aefurat', '', 28);	
}


if($result1["CAUSECONGE"]==16)
{
	$pdf->SetXY(15,70);$pdf->Cell(180,8,"مــقرر عطلة أمومة ",0,1,'C');$pdf->SetFont('aefurat', '', 16);
	$pdf->SetXY(15,90);$pdf->Cell(180,8,"إن مدير المؤسسة العمومية الإستشفائية بعين وسارة  ",0,1,'C');
	$pdf->Text(5,100,"بمقتضى : الأمر رقم 03-06 المؤرخ في 15 يوليو سنة 2006 المتضمن القانون الأساسي العام  ");
	$pdf->Text(25,110,"للوظيفة العمومية .");
	$pdf->Text(5,120,"بمقتضى :القانون رقم 11-83 المؤرخ في 02 يوليو سنة 1983 المتعلق بالتأمينات الإجتماعية ");
	$pdf->Text(25,130,"المعدل بالقانون 01-08 المؤرخ في 23 جانفي سنة 2008.");
	$pdf->Text(5,140," بمقتضى : المرسوم التنفيذي رقم 140-07 المؤرخ في 19 ماي سنة 2007 المتضمن إنشاء المؤسسات ");
	$pdf->Text(25,150,"العمومية الإستشفائية و المؤسسات العمومية للصحة الجوارية و تنظيمها و سيرها.");
	$pdf->Text(5,160,"بناء :على عطلة الأمومة المقدمة .");
	$pdf->Text(90,170,"يقـــــرر");
	$pdf->Text(5,180,"المادة الأولى :تمنح عطلة أمومة مدتها (98 يوم) لفائدة السيدة ");
	$pdf->Text(35,190,"بصفتها :");
	$pdf->Text(35,200,"إبتداء من :");
	$pdf->Text(95,200,"إلى غاية :");
	$pdf->Text(5,210,"المادة الثانية :خلال هذه العطلة لا تتحصل المسماة أعلاه على أجرها.");
	$pdf->Text(5,220,"المادة الثالثة : يكلف كل من السادة المديرة الفرعية للموارد البشرية و أمين الخزينة ");
	$pdf->Text(34,230,"بعين وسارة بتنفيذ هذا المقرر.");
	$pdf->Text(140,240," عين وسارة في :  ");
	//$pdf->Text(175,240,$date);
	$pdf->Text(150,250,"  المدير");
	$pdf->SetFont('aefurat', '', 12);
	$pdf->Text(5,260," حررت من طرف :");//
	//$pdf->Text(6,265," السيد(ة):".$_SESSION["USER"]);//
	$pdf->SetFont('aefurat','I', 17);
	$pdf->SetTextColor(225,0,0);		
}
if($result1["CAUSECONGE"]==17)
{
	$pdf->htiat('مقرر  خصم',$result["rnvgradear"],$y);
	$pdf->Text(5,$pdf->GetY()+8," نظرا : للغياب الغير المبرر لمدة ".$result1["DURECONGE"]." يوم / ايام "." من ".$result1["DEBUTCONGE"]." إلى ".$result1["FINCONGE"]);
	$pdf->Text(5,$pdf->GetY()+8," نظرا : للرد على الإستفسارالكتابي ");
	$pdf->decision_drh($y);
	$pdf->Text(5,$pdf->GetY()+8,"المادة الأولى  : يخصم للسيد(ة) : ".$result["Nomarab"]." ".$result["Prenom_Arabe"]);
	$pdf->Text(35,$pdf->GetY()+8,"بصفته (ها) : ".$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));
	$pdf->Text(35,$pdf->GetY()+8,$result1["DURECONGE"]." يوم / ايام "." من الراتب الشهري  ");
	$pdf->Text(35,$pdf->GetY()+8," نظرا : للغياب الغير المبرر لمدة ".$result1["DURECONGE"]." يوم / ايام "." من ".$result1["DEBUTCONGE"]." إلى ".$result1["FINCONGE"]);
    $pdf->foot_drh($y);
	
}
if($result1["CAUSECONGE"]==18)
{
	$pdf->htiat('مقرر الإحالة على الإستيداع ',$result["rnvgradear"],$y);
	$pdf->Text(5,$pdf->GetY()+8," نظرا : للغياب الغير المبرر لمدة ".$result1["DURECONGE"]." يوم / ايام "." من ".$result1["DEBUTCONGE"]." إلى ".$result1["FINCONGE"]);
	$pdf->Text(5,$pdf->GetY()+8," نظرا : للرد على الإستفسارالكتابي ");
	$pdf->decision_drh($y);
	$pdf->Text(5,$pdf->GetY()+8,"المادة الأولى  : يخصم للسيد(ة) : ".$result["Nomarab"]." ".$result["Prenom_Arabe"]);
	$pdf->Text(35,$pdf->GetY()+8,"بصفته (ها) : ".$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));
	$pdf->Text(35,$pdf->GetY()+8,$result1["DURECONGE"]." يوم / ايام "." من الراتب الشهري  ");
	$pdf->Text(35,$pdf->GetY()+8," نظرا : للغياب الغير المبرر لمدة ".$result1["DURECONGE"]." يوم / ايام "." من ".$result1["DEBUTCONGE"]." إلى ".$result1["FINCONGE"]);
    $pdf->foot_drh($y);
	
}
if($result1["CAUSECONGE"]==19)
{
	$pdf->htiat('مقرر الإحالة على الإستيداع ',$result["rnvgradear"],$y);
	$pdf->Text(5,$pdf->GetY()+8," نظرا : للغياب الغير المبرر لمدة ".$result1["DURECONGE"]." يوم / ايام "." من ".$result1["DEBUTCONGE"]." إلى ".$result1["FINCONGE"]);
	$pdf->Text(5,$pdf->GetY()+8," نظرا : للرد على الإستفسارالكتابي ");
	$pdf->decision_drh($y);
	$pdf->Text(5,$pdf->GetY()+8,"المادة الأولى  : يخصم للسيد(ة) : ".$result["Nomarab"]." ".$result["Prenom_Arabe"]);
	$pdf->Text(35,$pdf->GetY()+8,"بصفته (ها) : ".$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));
	$pdf->Text(35,$pdf->GetY()+8,$result1["DURECONGE"]." يوم / ايام "." من الراتب الشهري  ");
	$pdf->Text(35,$pdf->GetY()+8," نظرا : للغياب الغير المبرر لمدة ".$result1["DURECONGE"]." يوم / ايام "." من ".$result1["DEBUTCONGE"]." إلى ".$result1["FINCONGE"]);
    $pdf->foot_drh($y);
	
}
if($result1["CAUSECONGE"]==20)
{
	$pdf->htiat('مقرر الإحالة على الإستيداع ',$result["rnvgradear"],$y);
	$pdf->Text(5,$pdf->GetY()+8," نظرا : للغياب الغير المبرر لمدة ".$result1["DURECONGE"]." يوم / ايام "." من ".$result1["DEBUTCONGE"]." إلى ".$result1["FINCONGE"]);
	$pdf->Text(5,$pdf->GetY()+8," نظرا : للرد على الإستفسارالكتابي ");
	$pdf->decision_drh($y);
	$pdf->Text(5,$pdf->GetY()+8,"المادة الأولى  : يخصم للسيد(ة) : ".$result["Nomarab"]." ".$result["Prenom_Arabe"]);
	$pdf->Text(35,$pdf->GetY()+8,"بصفته (ها) : ".$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));
	$pdf->Text(35,$pdf->GetY()+8,$result1["DURECONGE"]." يوم / ايام "." من الراتب الشهري  ");
	$pdf->Text(35,$pdf->GetY()+8," نظرا : للغياب الغير المبرر لمدة ".$result1["DURECONGE"]." يوم / ايام "." من ".$result1["DEBUTCONGE"]." إلى ".$result1["FINCONGE"]);
    $pdf->foot_drh($y);
	
}
if($result1["CAUSECONGE"]==21)
{
	$pdf->htiat('مقرر الإحالة على الإستيداع ',$result["rnvgradear"],$y);
	$pdf->Text(5,$pdf->GetY()+8," نظرا : للغياب الغير المبرر لمدة ".$result1["DURECONGE"]." يوم / ايام "." من ".$result1["DEBUTCONGE"]." إلى ".$result1["FINCONGE"]);
	$pdf->Text(5,$pdf->GetY()+8," نظرا : للرد على الإستفسارالكتابي ");
	$pdf->decision_drh($y);
	$pdf->Text(5,$pdf->GetY()+8,"المادة الأولى  : يخصم للسيد(ة) : ".$result["Nomarab"]." ".$result["Prenom_Arabe"]);
	$pdf->Text(35,$pdf->GetY()+8,"بصفته (ها) : ".$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));
	$pdf->Text(35,$pdf->GetY()+8,$result1["DURECONGE"]." يوم / ايام "." من الراتب الشهري  ");
	$pdf->Text(35,$pdf->GetY()+8," نظرا : للغياب الغير المبرر لمدة ".$result1["DURECONGE"]." يوم / ايام "." من ".$result1["DEBUTCONGE"]." إلى ".$result1["FINCONGE"]);
    $pdf->foot_drh($y);
	
}
if($result1["CAUSECONGE"]==22)
{
	$pdf->htiat('مقرر الإحالة على الإستيداع ',$result["rnvgradear"],$y);
	$pdf->Text(5,$pdf->GetY()+8," نظرا : للغياب الغير المبرر لمدة ".$result1["DURECONGE"]." يوم / ايام "." من ".$result1["DEBUTCONGE"]." إلى ".$result1["FINCONGE"]);
	$pdf->Text(5,$pdf->GetY()+8," نظرا : للرد على الإستفسارالكتابي ");
	$pdf->decision_drh($y);
	$pdf->Text(5,$pdf->GetY()+8,"المادة الأولى  : يخصم للسيد(ة) : ".$result["Nomarab"]." ".$result["Prenom_Arabe"]);
	$pdf->Text(35,$pdf->GetY()+8,"بصفته (ها) : ".$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));
	$pdf->Text(35,$pdf->GetY()+8,$result1["DURECONGE"]." يوم / ايام "." من الراتب الشهري  ");
	$pdf->Text(35,$pdf->GetY()+8," نظرا : للغياب الغير المبرر لمدة ".$result1["DURECONGE"]." يوم / ايام "." من ".$result1["DEBUTCONGE"]." إلى ".$result1["FINCONGE"]);
    $pdf->foot_drh($y);
	
}







$pdf->Output('titre_conge_ar_'.$result["Nomlatin"].'.pdf','I');
//$pdf->Output('titre_conge_ar.pdf','I');
?>
