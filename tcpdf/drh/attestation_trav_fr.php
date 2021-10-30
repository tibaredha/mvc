<?php 
$ndp=$_GET["uc"];require_once('drh.php');$pdf = new drh('P', 'mm', 'A4', true, 'UTF-8', false);
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
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->repfr,0,0,'C');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->mspfr,0,0,'C');
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"Wilaya de Djelfa",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"Direction de la Santé et de la population",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"Etablissement public hospitalier  D'Ain - Oussera",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"S/Direction des Ressources  Humaines ",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,'N°.........../SDRH/'.date("Y"),0,1,'L');
$pdf->SetFont('aefurat', '', 16);
//$pdf->setRTL(true);
$pdf->SetFont('aefurat', '', 20);
$pdf->Text(60,80," ATTESTATION DE TRAVAIL");
$pdf->SetFont('aefurat', '', 14);
$pdf->Text(10,110," Je soussigné , Directeur d établissement public hospitalier d'Ain Oussera Atteste que : ");
$pdf->Text(100,120," Prénom:");
$pdf->Text(10,120,"Nom:");
$pdf->Text(140,130,"wilaya de");
$pdf->Text(65,130," a");
$pdf->Text(10,130,"Né(e) le :");
$pdf->Text(10,140,"Date premier recrutement:");
$pdf->Text(10,160,"Est employé(e) a notre  établissement en qualité de:");
if(trim($result["cessation"])=='y'){
$pdf->Text(70,180,"jusqu'au : ");	
}else{
$pdf->Text(70,180,"jusqu'à ce jour.");
}



$pdf->Text(10,180,"Depuis  Le :");
$pdf->Text(10,200,"En foi de quoi , la présente attestation est délivrée sur demande de ");
$pdf->Text(10,210,"l'intéressé(e)  pour servir et valoir ce que de droit");
$pdf->Text(120,230,"AIN - OUSSERA , LE");
$pdf->Text(120,240," LE DIRECTEUR");
$pdf->SetFont('aefurat', '', 12);
$pdf->Text(5,250," Etabblit par :");
// $pdf->SetFont('aefurat', '', 28);
//$pdf->Text(6,245," السيد(ة):".$_SESSION["USER"]);//
//$pdf->Code39(172,252,$ndp,1,5);
//$pdf->SetFont('aefurat', '', 18);

$pdf->SetTextColor(225,0,0);
$pdf->SetFont('aefurat','I', 14);
$date=date("d-m-Y");$pdf->Text(170,230,$date);
$pdf->Text(120,120,$result["Prenom_Latin"]);$pdf->Text(25,120,$result["Nomlatin"]);
$J0 = substr($result["Date_Naissance"],8,2);
$M0 = substr($result["Date_Naissance"],5,2);
$A0 = substr($result["Date_Naissance"],0,4);
$date0=$J0."-".$M0."-".$A0;$pdf->Text(30,130,$date0);

$J1 = substr($result["Date_Premier_Recrutement"],8,2);
$M1 = substr($result["Date_Premier_Recrutement"],5,2);
$A1 = substr($result["Date_Premier_Recrutement"],0,4);
$date1=$J1."-".$M1."-".$A1;$pdf->Text(64,140,$date1);

$pdf->Text(70,130,$pdf->nbrtostring("mvc","com","IDCOM",$result["Commune_Naissancear"],"COMMUNE"));
$pdf->Text(160,130,$pdf->nbrtostring("mvc","wil","IDWIL",$result["Wilaya_Naissancear"],"WILAYAS"));
$pdf->Text(10,170,$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradefr"));

$Motif_Cessation=$pdf->nbrtostringx('motif_cessation','idcausedepart',trim($result['Motif_Cessation']),'causedepartfr');
if(trim($result["cessation"])=='y'){
	
	$pdf->Text(128-12,180,"("."Date de ".$Motif_Cessation.")");
	$A = substr($result["Date_Cessation"],0,2);
	$M = substr($result["Date_Cessation"],3,2);
	$J = substr($result["Date_Cessation"],6,4);
	$Date_Cessation=$A."-".$M."-".$J;
	$pdf->Text(102-12,180,$Date_Cessation);		
} 

if($result["rnvgradear"]==1 or $result["rnvgradear"]==3 )
{
	$pdf->Text(88,170," en ".$pdf->nbrtostring("grh","specialite","idspecialite",$result["FILIERE"],"specialitefr"));
}
$J2 = substr($result["DATEARRIVE"],8,2);
$M2 = substr($result["DATEARRIVE"],5,2);
$A2 = substr($result["DATEARRIVE"],0,4);
$date2=$J2."-".$M2."-".$A2;$pdf->Text(35,180,$date2);

$pdf->Output('trav_fr.pdf','I');
?>
