<?php
if (!ISSET($_POST['annee'])||!ISSET($_POST['mois'])||!ISSET($_POST['jour'])||!ISSET($_POST['annee1'])||!ISSET($_POST['mois1'])||!ISSET($_POST['jour1']))
{
$datejour1 =date("Y-m-d");
$datejour2 =date("Y-m-d");
}
else
{
 if(empty($_POST['annee'])||empty($_POST['mois'])||empty($_POST['jour'])||empty($_POST['annee1'])||empty($_POST['mois1'])||empty($_POST['jour1']))
 {
 $datejour1 =date("Y-m-d");
 $datejour2 =date("Y-m-d");
 }
 else
 {
 $datejour1 = $_POST['annee'] .'-'.$_POST['mois'] .'-'.$_POST['jour'];
 $datejour2 = $_POST['annee1'].'-'.$_POST['mois1'].'-'.$_POST['jour1'];
 }
}
$datejour11 = $_POST['jour'].'-'.$_POST['mois'] .'-'.$_POST['annee'];
$datejour22 = $_POST['jour1'].'-'.$_POST['mois1'].'-'.$_POST['annee1'];
if ($datejour1>$datejour2 or  $datejour1==$datejour2 )
{
header("Location: ../hemod/Facture") ;
}
require('hemod.php');
$pdf = new hemod( 'P', 'mm', 'A4' );
$pdf->entete1($datejour1,$datejour2);




//1eme Plateau Technique
// if ($_POST['HEMO']=='1') 
// {
// $pdf->SetXY(5,50);$pdf->Cell(200,5,utf8_decode("Plateau Technique"),0,1,'C');
// $pdf->SetTextColor(0,0,0);//text noire
// $pdf->SetXY(05,70);
// $pdf->cell(10,5,'N',1,0,'L',1,0);
// $pdf->cell(30,5,"Etablissement",1,0,'C',1,0);
// $pdf->cell(30,5,"Commune",1,0,'C',1,0);
// $pdf->cell(60,5,"Fonctionnelle",1,0,'C',1,0);
// $pdf->cell(65,5,"Non fonctionnelle",1,0,'C',1,0);
// $pdf->SetXY(05,70+5);
// $pdf->cell(10,15,'N',1,0,'L',0);
// $pdf->cell(30,15,"Etablissement",1,0,'C',0);
// $pdf->cell(30,15,"Commune",1,0,'C',0);
// $pdf->cell(60,15,"Fonctionnelle",1,0,'C',0);
// $pdf->cell(65,15,"Non fonctionnelle",1,0,'C',0);			 		
// }


//2eme partie  Nombres de dialysés
// if ($_POST['HEMO']=='2') 
// {
// $pdf->SetXY(5,50);$pdf->Cell(200,5,utf8_decode("Nombres de dialysés"),0,1,'C');
// $h=70;$pdf->SetTextColor(0,0,0);//text noire
// $pdf->SetXY(05,$h);
// $pdf->cell(10,5,'N',1,0,'L',1,0);
// $pdf->cell(30,5,"Etablissement",1,0,'C',1,0);
// $pdf->cell(30,5,"pris en charge",1,0,'C',1,0);
// $pdf->cell(30,5,"Nbr de seances",1,0,'C',1,0);
// $pdf->cell(35,5,"traites par la DPCA",1,0,'C',1,0);
// $pdf->cell(25,5,"liste d'Attente",1,0,'C',1,0);
// $pdf->cell(35,5,"Dialyses en Urgence",1,0,'C',1,0);
// $pdf->SetXY(05,$h+5);
// $pdf->cell(10,15,'N',1,0,'L',0);
// $pdf->cell(30,15,"Etablissement",1,0,'C',0);
// $pdf->cell(30,15,"pris en charge",1,0,'C',0);
// $pdf->cell(30,15,"Nbr de seances",1,0,'C',0);
// $pdf->cell(35,15,"traites par la DPCA",1,0,'C',0);
// $pdf->cell(25,15,"liste d'Attente",1,0,'C',0);
// $pdf->cell(35,15,"Dialyses en Urgence",1,0,'C',0);			 	
// }
//3eme partie  liste  nominative des  insuffisants renaux chroniques dialyses 
// if ($_POST['HEMO']=='3') 
// { 
// $pdf->SetXY(5,50);$pdf->Cell(200,5,utf8_decode("Liste  Nominative Des  Insuffisants Renaux Chroniques Dialyses "),0,1,'C');
// $pdf->SetTextColor(0,0,0);//text noire
// $pdf->SetXY(05,70);
// $pdf->cell(10,5,'N',1,0,'L',1,0);
// $pdf->cell(60,5,"Nom Prenom",1,0,'C',1,0);
// $pdf->cell(30,5,"Date Naissance",1,0,'C',1,0);
// $pdf->cell(10,5,"Age",1,0,'C',1,0);
// $pdf->cell(10,5,"Sexe",1,0,'C',1,0);
// $pdf->cell(50,5,"Pris en charge  au niveau ",1,0,'C',1,0);
// $pdf->cell(30,5,"Commune",1,0,'C',1,0);
// $pdf->SetXY(05,75); // marge sup 13
// $query = "SELECT * FROM HEMO where SORTI =''  ORDER BY NOM";
// $resultat=mysql_query($query);
// $totalmbr1=mysql_num_rows($resultat);
// while($row=mysql_fetch_object($resultat))
  // {
    // $pdf->cell(10,5,$row->id,1,0,'L',0);
    // $pdf->cell(60,5,$row->NOM.'_'.$row->PRENOM,1,0,'L',0);//5  =hauteur de la cellule origine =7
    // $pdf->cell(30,5,$row->DATENAISSA,1,0,'C',0);
	// $pdf->cell(10,5,date ('Y')-substr($row->DATENAISSA,0,4),1,0,'C',0);
    // $pdf->cell(10,5,$row->SEX,1,0,'C',0);
	// $pdf->cell(50,5,'EPH',1,0,'L',0);
	// $pdf->cell(30,5,'',1,0,'L',0);
    // $pdf->SetXY(5,$pdf->GetY()+5); 
  // }
// $pdf->SetXY(5,$pdf->GetY());$pdf->cell(60,05,"TOTAL",1,0,'C',1,0);	  
// $pdf->SetXY(65,$pdf->GetY());$pdf->cell(140,05,$totalmbr1." Malades",1,0,'C',1,0);				 	
// }
//4eme partie  liste  nominative des  insuffisants renaux chroniques  
// if ($_POST['HEMO']=='4') 
// {
// $pdf->SetXY(5,50);$pdf->Cell(200,5,utf8_decode("Liste  Nominative Des  Insuffisants Renaux Chroniques Porteurs  D'affections "),0,1,'C');
// $pdf->SetTextColor(0,0,0);//text noire
// $pdf->SetXY(05,70);
// $pdf->cell(10,5,'N',1,0,'L',1,0);
// $pdf->cell(60,5,"Nom Prenom",1,0,'C',1,0);
// $pdf->cell(30,5,"Date Naissance",1,0,'C',1,0);
// $pdf->cell(10,5,"Age",1,0,'C',1,0);
// $pdf->cell(10,5,"Sexe",1,0,'C',1,0);
// $pdf->cell(27,5,"HVB",1,0,'C',1,0);
// $pdf->cell(27,5,"HVC",1,0,'C',1,0);
// $pdf->cell(26,5,"HIV",1,0,'C',1,0);
// $pdf->SetXY(05,75); // marge sup 13
// $query = "SELECT * FROM HEMO where SORTI =''  ORDER BY NOM";
// $resultat=mysql_query($query);
// $totalmbr1=mysql_num_rows($resultat);
// while($row=mysql_fetch_object($resultat))
  // {
    // $pdf->cell(10,5,$row->id,1,0,'L',0);
    // $pdf->cell(60,5,$row->NOM.'_'.$row->PRENOM,1,0,'L',0);//5  =hauteur de la cellule origine =7
    // $pdf->cell(30,5,$row->DATENAISSA,1,0,'C',0);
    // $pdf->cell(10,5,date ('Y')-substr($row->DATENAISSA,0,4),1,0,'C',0);
    // $pdf->cell(10,5,$row->SEX,1,0,'C',0);
	// $pdf->cell(27,5,$row->HVB,1,0,'C',0);
	// $pdf->cell(27,5,$row->HVC,1,0,'C',0);
	// $pdf->cell(26,5,$row->HIV,1,0,'C',0);
	// $pdf->SetXY(5,$pdf->GetY()+5); 
  // }
// $pdf->SetXY(5,$pdf->GetY());$pdf->cell(60,05,"TOTAL",1,0,'C',1,0);	  
// $pdf->SetXY(65,$pdf->GetY());$pdf->cell(140,05,$totalmbr1." Malades",1,0,'C',1,0);				 	
// }



//5eme partie  liste  nominative des  insuffisants renaux chroniques  Decedes 
// if ($_POST['HEMO']=='5') 
// {
// $pdf->SetXY(5,50);$pdf->Cell(200,5,utf8_decode("Liste  Nominative Des  Insuffisants Renaux Chroniques Decedes "),0,1,'C');
// $pdf->SetTextColor(0,0,0);//text noire
// $pdf->SetXY(05,70);
// $pdf->cell(10,5,'N',1,0,'L',1,0);
// $pdf->cell(60,5,"Nom Prenom",1,0,'C',1,0);
// $pdf->cell(30,5,"Date Naissance",1,0,'C',1,0);
// $pdf->cell(10,5,"Age",1,0,'C',1,0);
// $pdf->cell(10,5,"Sexe",1,0,'C',1,0);
// $pdf->cell(25,5,utf8_decode("Lieu de décès"),1,0,'C',1,0);
// $pdf->cell(30,5,"Cause de deces",1,0,'C',1,0);
// $pdf->cell(25,5,utf8_decode("Date de décèe"),1,0,'C',1,0);
// $pdf->SetXY(05,75); // marge sup 13
// $query = "SELECT * FROM HEMO where SORTI ='DECES'  ORDER BY NOM";
// $resultat=mysql_query($query);
// $totalmbr1=mysql_num_rows($resultat);
// while($row=mysql_fetch_object($resultat))
  // {
    // $pdf->cell(10,5,$row->id,1,0,'L',0);
    // $pdf->cell(60,5,$row->NOM.'_'.$row->PRENOM,1,0,'L',0);//5  =hauteur de la cellule origine =7
    // $pdf->cell(30,5,$row->DATENAISSA,1,0,'C',0);
    // $pdf->cell(10,5,substr($row->DATESORTI,0,4)-substr($row->DATENAISSA,0,4),1,0,'C',0);
    // $pdf->cell(10,5,$row->SEX,1,0,'C',0);
	// $pdf->cell(25,5,'EPH',1,0,'L',0);
	// $pdf->cell(30,5,'',1,0,'L',0);
    // $pdf->cell(25,5,$row->DATESORTI,1,0,'C',0);
	// $pdf->SetXY(5,$pdf->GetY()+5); 
  // }
// $pdf->SetXY(5,$pdf->GetY());$pdf->cell(60,05,"TOTAL",1,0,'C',1,0);	  
// $pdf->SetXY(65,$pdf->GetY());$pdf->cell(140,05,$totalmbr1." Malades",1,0,'C',1,0);				 	
// }

//5eme partie  liste  nominative des  insuffisants renaux chroniques  Decedes 
// if ($_POST['HEMO']=='8') 
// {
// $pdf->SetXY(5,50);$pdf->Cell(200,5,utf8_decode("Laboratoire D'hemodialyse "),0,1,'C');
// $pdf->SetTextColor(0,0,0);//text noire
// }
//9eme partie  liste  nominative des  insuffisants renaux chroniques dialyses ABO RH
// if ($_POST['HEMO']=='9') 
// {
// $pdf->SetXY(5,50);$pdf->Cell(200,5,utf8_decode("Liste  Nominative Des  Insuffisants Renaux Chroniques Dialyses  Groupage Rhesus "),0,1,'C');
// $pdf->SetTextColor(0,0,0);//text noire
// $pdf->SetXY(05,70);
// $pdf->cell(10,5,'N',1,0,'L',1,0);
// $pdf->cell(60,5,"Nom Prenom",1,0,'C',1,0);
// $pdf->cell(30,5,"Date Naissance",1,0,'C',1,0);
// $pdf->cell(10,5,"Age",1,0,'C',1,0);
// $pdf->cell(10,5,"Sexe",1,0,'C',1,0);
// $pdf->cell(40,5,"ABO ",1,0,'C',1,0);
// $pdf->cell(40,5,"RH",1,0,'C',1,0);
// $pdf->SetXY(05,75); // marge sup 13
// $query = "SELECT * FROM HEMO where SORTI =''  ORDER BY NOM";
// $resultat=mysql_query($query);
// $totalmbr1=mysql_num_rows($resultat);
// while($row=mysql_fetch_object($resultat))
  // {
    // $pdf->cell(10,5,$row->id,1,0,'L',0);
    // $pdf->cell(60,5,$row->NOM.'_'.$row->PRENOM,1,0,'L',0);//5  =hauteur de la cellule origine =7
    // $pdf->cell(30,5,$row->DATENAISSA,1,0,'C',0);
    // $pdf->cell(10,5,date ('Y')-substr($row->DATENAISSA,0,4),1,0,'C',0);
    // $pdf->cell(10,5,$row->SEX,1,0,'C',0);
	// $pdf->cell(40,5,$row->GRABO,1,0,'C',0);
	// $pdf->cell(40,5,$row->GRRH,1,0,'C',0);
    // $pdf->SetXY(5,$pdf->GetY()+5); 
  // }
// $pdf->SetXY(5,$pdf->GetY());$pdf->cell(60,05,"TOTAL",1,0,'C',1,0);	  
// $pdf->SetXY(65,$pdf->GetY());$pdf->cell(140,05,$totalmbr1." Malades",1,0,'C',1,0);				 		
// }
//10eme partie  liste  nominative des  insuffisants renaux chroniques dialyses SEROLOGIE
// if ($_POST['HEMO']=='10') 
// {
// $pdf->SetXY(5,50);$pdf->Cell(200,5,utf8_decode("Liste  Nominative Des  Insuffisants Renaux Chroniques Dialyses Serologie "),0,1,'C');
// $pdf->SetTextColor(0,0,0);//text noire
// $pdf->SetXY(05,70);
// $pdf->cell(10,5,'N',1,0,'L',1,0);
// $pdf->cell(60,5,"Nom Prenom",1,0,'C',1,0);
// $pdf->cell(30,5,"Date Naissance",1,0,'C',1,0);
// $pdf->cell(10,5,"Age",1,0,'C',1,0);
// $pdf->cell(10,5,"Sexe",1,0,'C',1,0);
// $pdf->cell(20,5,"HVB ",1,0,'C',1,0);
// $pdf->cell(20,5,"HVC",1,0,'C',1,0);
// $pdf->cell(20,5,"HIV ",1,0,'C',1,0);
// $pdf->cell(20,5,"TPHA",1,0,'C',1,0);
// $pdf->SetXY(05,75); // marge sup 13
// $query = "SELECT * FROM HEMO where SORTI =''  ORDER BY NOM";
// $resultat=mysql_query($query);
// $totalmbr1=mysql_num_rows($resultat);
// while($row=mysql_fetch_object($resultat))
  // {
    // $pdf->cell(10,5,$row->id,1,0,'L',0);
    // $pdf->cell(60,5,$row->NOM.'_'.$row->PRENOM,1,0,'L',0);//5  =hauteur de la cellule origine =7
    // $pdf->cell(30,5,$row->DATENAISSA,1,0,'C',0);
    // $pdf->cell(10,5,date ('Y')-substr($row->DATENAISSA,0,4),1,0,'C',0);
    // $pdf->cell(10,5,$row->SEX,1,0,'C',0);
	// $pdf->cell(20,5,$row->HVB,1,0,'C',0);
	// $pdf->cell(20,5,$row->HVC,1,0,'C',0);
	// $pdf->cell(20,5,$row->HIV,1,0,'C',0);
	// $pdf->cell(20,5,$row->TPHA,1,0,'C',0);
    // $pdf->SetXY(5,$pdf->GetY()+5); 
  // }
// $pdf->SetXY(5,$pdf->GetY());$pdf->cell(60,05,"TOTAL",1,0,'C',1,0);	  
// $pdf->SetXY(65,$pdf->GetY());$pdf->cell(140,05,$totalmbr1." Malades",1,0,'C',1,0);				 
// }

//11eme partie  liste  nominative des  insuffisants renaux chroniques dialyses SEROLOGIE
// if ($_POST['HEMO']=='11') 
// {
// $pdf->SetXY(5,50);$pdf->Cell(200,5,utf8_decode("Liste  Nominative Des  Insuffisants Renaux Chroniques Dialyses Serologie "),0,1,'C');
// $pdf->SetTextColor(0,0,0);//text noir
// $pdf->SetFont('Times', 'B', 10);
// $h1=10;
// $pdf->SetXY(5,70); 	      
// $pdf->cell(25,05,"Nom du Malade",1,0,'C',1,0);
// $pdf->cell($h1,05,"GB",1,0,'C',1,0);
// $pdf->cell($h1,05,"GR",1,0,'C',1,0);
// $pdf->cell($h1,05,"HB",1,0,'C',1,0);
// $pdf->cell($h1,05,"HT",1,0,'C',1,0);
// $pdf->cell($h1,05,"PLQT",1,0,'C',1,0);
// $pdf->cell($h1,05,"TP",1,0,'C',1,0);
// $pdf->cell($h1,05,"INR",1,0,'C',1,0);
// $pdf->cell($h1,05,"VS1",1,0,'C',1,0);
// $pdf->cell($h1,05,"VS2",1,0,'C',1,0);
// $pdf->cell($h1,05,"GLYC",1,0,'C',1,0);
// $pdf->cell($h1,05,"UREE",1,0,'C',1,0);
// $pdf->cell($h1,05,"CRET",1,0,'C',1,0);
// $pdf->cell($h1,05,"ACUR",1,0,'C',1,0);
// $pdf->cell($h1,05,"BLT",1,0,'C',1,0);
// $pdf->cell($h1,05,"BLD",1,0,'C',1,0);
// $pdf->cell($h1,05,"TGO",1,0,'C',1,0);
// $pdf->cell($h1,05,"TGP",1,0,'C',1,0);
// $pdf->cell($h1,05,"ASLO",1,0,'C',1,0);
// $pdf->cell($h1,05,"CRP",1,0,'C',1,0);
// $pdf->cell($h1,05,"TGC",1,0,'C',1,0);
// $pdf->cell($h1,05,"CHO",1,0,'C',1,0);
// $pdf->cell($h1,05,"NA",1,0,'C',1,0);
// $pdf->cell($h1,05,"K",1,0,'C',1,0);
// $pdf->cell($h1,05,"PHO",1,0,'C',1,0);
// $pdf->cell($h1,05,"CL",1,0,'C',1,0);
// $pdf->cell($h1,05,"CA",1,0,'C',1,0);
// $pdf->SetXY(5,70+5);
// $query_liste = "SELECT * FROM HEMOBIO order by DATE ";
// $requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
// $totalmbr1=mysql_num_rows($requete);
	// while($row=mysql_fetch_object($requete))
	  // {
	  // $pdf->SetFont('Times', 'B', 10);
	  // $pdf->cell(25,05,$pdf->nbrtostring("MVC","hemo","id",$row->id,"NOM")."_".$pdf->nbrtostring("MVC","hemo","id",$row->id,"PRENOM") ,1,0,'L',0);
	  // $pdf->cell(25,05,$row->id,1,0,'C',0);
	  // $pdf->SetFont('Times', 'B', 10);
	  // $pdf->cell($h1,05,$row->GB,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->GR,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->HB,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->HT,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->PLQT,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->TP,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->INR,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->VS1H,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->VS2H,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->GLYCE,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->UREE,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->CREAT,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->ACURIQUE,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->BILIT,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->BILID,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->TGO,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->TGP,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->ASLO,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->CRP,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->TG,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->CHOLES,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->NA,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->K,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->PHOS,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->CL,1,0,'C',0);
	  // $pdf->cell($h1,05,$row->CA,1,0,'C',0);
	  // $pdf->SetXY(5,$pdf->GetY()+5); 
	  // }
	// $pdf->SetXY(5,$pdf->GetY());$pdf->cell(25,05,"Total",1,0,'C',0);	  
	// $pdf->SetXY(30,$pdf->GetY());$pdf->cell(260,05,$totalmbr1."  "."BILANS",1,0,'C',0);				 

// }

	// $pdf->Text(150,$pdf->GetY()+20,"Service Hemodialyse");
    // $pdf->Text(150,$pdf->GetY()+10,"Dr redha TIBA");
$pdf->Output();
?>