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
	}else
	{
		$datejour1 = $_POST['annee'] .'-'.$_POST['mois'] .'-'.$_POST['jour'];
		$datejour2 = $_POST['annee1'].'-'.$_POST['mois1'].'-'.$_POST['jour1'];
	}
}

// $datejour11 = $_POST['jour'].'-'.$_POST['mois'] .'-'.$_POST['annee'];
// $datejour22 = $_POST['jour1'].'-'.$_POST['mois1'].'-'.$_POST['annee1'];

if ($datejour1>$datejour2 or  $datejour1==$datejour2 ){header("Location: ../../inspection/evaluation") ;}

if ($_POST['EPH']=='0')  {$EPH1='structure sanitaire';$EPH="IS NOT NULL";}
if ($_POST['EPH']=='1')  {$EPH1='EHU';$EPH="='1'";}
if ($_POST['EPH']=='2')  {$EPH1='CHU';$EPH="='2'";}
if ($_POST['EPH']=='3')  {$EPH1='EPH';$EPH="='3'";}
if ($_POST['EPH']=='4')  {$EPH1='EH';$EPH="='4'";}
if ($_POST['EPH']=='5')  {$EPH1='EHS';$EPH="='5'";}
if ($_POST['EPH']=='6')  {$EPH1='EPSP';$EPH="='6'";}
if ($_POST['EPH']=='7')  {$EPH1='Polyclinique';$EPH="=7";}
if ($_POST['EPH']=='8')  {$EPH1='Salle de soins';$EPH="=8";}
if ($_POST['EPH']=='9')  {$EPH1='EHP';$EPH="=9";}
if ($_POST['EPH']=='10') {$EPH1='centre d hemodialyse';$EPH="=10";}
if ($_POST['EPH']=='11') {$EPH1='centre de diagnostic';$EPH="=11";}
if ($_POST['EPH']=='12') {$EPH1='officine pharmaceutique';$EPH="=12";}
if ($_POST['EPH']=='13') {$EPH1='laboratoire';$EPH="=13";}
if ($_POST['EPH']=='14') {$EPH1='cabinet chirurugien dentiste specialiste';$EPH="=14";}
if ($_POST['EPH']=='15') {$EPH1='cabinet chirurugien dentiste generaliste';$EPH="=15";}
if ($_POST['EPH']=='16') {$EPH1='cabinet medecin specialiste';$EPH="=16";}
if ($_POST['EPH']=='17') {$EPH1='cabinet medecin generaliste';$EPH="=17";}
if ($_POST['EPH']=='18') {$EPH1='cabinet sagefemme';$EPH="=18";}
if ($_POST['EPH']=='19') {$EPH1='cabinet psychologue clinicien';$EPH="=19";}
if ($_POST['EPH']=='27') {$EPH1='cabinet psychologue orthophoniste';$EPH="=27";}
if ($_POST['EPH']=='20') {$EPH1='cabinet de soins ';$EPH="=20";}
if ($_POST['EPH']=='21') {$EPH1='transport sanitairee ';$EPH="=21";}
if ($_POST['EPH']=='22') {$EPH1='UDS';$EPH="=22";}
if ($_POST['EPH']=='23') {$EPH1='OPTICIEN';$EPH="=23";}
if ($_POST['EPH']=='24') {$EPH1='sage femme';$EPH="=24";}
if ($_POST['EPH']=='25') {$EPH1='kinesitherapeute';$EPH="=25";}
require('INSPECTION1.php');
$pdf = new INSPECTION1 ( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(200);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);

//************************************************* DEBUT MAJ *************************************************************************************//

if ($_POST['type']=='0') {
	$pdf->AddPage('p','A4');
	//$pdf->entete($datejour1,$datejour2,'Liste nominative (Ouverture) : ',$EPH1);
    $pdf->BORDEREAU("",$datejour1,$datejour2,$EPH1,"");
}

if ($_POST['type']=='1') {
	
    if($EPH1=="EPSP"){
		$pdf->structurebase0($datejour1,$datejour2,$EPH,$EPH1);
		$pdf->structurebase($datejour1,$datejour2,$EPH,$EPH1);
		$pdf->structurebase1($datejour1,$datejour2,$EPH,$EPH1);
	} else
	{
		$pdf->AddPage('p','A4');
	    $pdf->entete($datejour1,$datejour2,'Liste nominative  : ',$EPH1);
		$pdf->listenominative($EPH);
	}
	
}

if ($_POST['type']=='2') {
	$pdf->AddPage('p','A4');
	$pdf->entete($datejour1,$datejour2,'Liste nominative (Fermeture) : ',$EPH1);
	$pdf->listenominativef($EPH);
}

if ($_POST['type']=='3') {
    $pdf->AddPage('p','A4');
	$pdf->entete($datejour1,$datejour2,'Liste nominative (Ouverture : Non conforme) : ',$EPH1);
	$pdf->listenominativenc($EPH,0,0);		
}

if ($_POST['type']=='4') {
	$pdf->AddPage('p','A4');
	$pdf->entete($datejour1,$datejour2,'Liste nominative (fermeture : Non conforme) : ',$EPH1);
	$pdf->listenominativenc($EPH,1,0);
	
}
if ($_POST['type']=='5') { //retraite
	$pdf->AddPage('p','A4');
	$pdf->entete($datejour1,$datejour2,"La mise à la retraite : ",$EPH1);
	$pdf->retraite($EPH);	
}


if ($_POST['type']=='6') {
	$pdf->AddPage('p','A4');
	$pdf->entete($datejour1,$datejour2,"Etat inscription au Conseil de l'ordre regional (Blida) : ",$EPH1);
	$pdf->conseildelordre($EPH);
}

if ($_POST['type']=='7') {
    $pdf->AddPage('p','A4');
	$pdf->entete($datejour1,$datejour2,"Annuaire téléphonique / Email : ",$EPH1);
	$pdf->listenominativetelemail($EPH);		
}

if ($_POST['type']=='8') {
	$pdf->AddPage('p','A4');
	$pdf->entete($datejour1,$datejour2,'Repartition par commune (liste nominative) : ',$EPH1);
	$pdf->repartionparcommune($EPH);
	if ($_POST['EPH']=='16') //medecin specialiste 
	{
		$pdf->AddPage('p','A4');
		$pdf->entete($datejour1,$datejour2,'Repartition par spécialite (liste nominative) : ',$EPH1);
		$pdf->medecinspecialiste($EPH);
	}	
}

if ($_POST['type']=='9') {
	
	$pdf->AddPage('p','A4');
	$pdf->entete($datejour1,$datejour2,'Repartition par communes (etat numerique): ',$EPH1);
	$pdf->tblparcommune('Structure',$datejour1,$datejour2,$EPH) ;
}

if ($_POST['type']=='10') {
    

    $pdf->AddPage('p','A4');
	$pdf->entete($datejour1,$datejour2,'SIG COMMUNE : ',$EPH1);
	$pdf->djelfa($pdf->datasig($datejour1,$datejour2,$EPH,33),20,128,3.7,'commune');//commune//dairas 	

	$pdf->AddPage('p','A4');
	$pdf->entete($datejour1,$datejour2,'SIG DAIRAS : ',$EPH1);
	$pdf->djelfa($pdf->datasig($datejour1,$datejour2,$EPH,33),20,128,3.7,'dairas');//commune//dairas 	
}

if ($_POST['type']=='11') {
	
    $pdf->AddPage('p','A4');
	$pdf->entete($datejour1,$datejour2,'Repartition par commune des anomalies (etat numerique) : ',$EPH1);
	$pdf->anomalies($EPH);
}

if ($_POST['type']=='12') {
	
    $pdf->AddPage('L','A4');
	$pdf->entetel($datejour1,$datejour2,"Repartition par date d'inspection/anomalie constatée  : ",$EPH1);
	$pdf->repartanomx($datejour1,$datejour2,$EPH);
}
//************************************************* FIN MAJ *************************************************************************************//



if ($_POST['type']=='13') 
{
	//**********************************************en fonction de la structure *****************************************************************//
	if ($_POST['EPH']=='16') //medecin specialiste 
	{
		$pdf->AddPage('L','A4');
		$pdf->entete($datejour1,$datejour2,'liste nominative  : ',$EPH1);
		$pdf->l_medecinspecialiste($EPH);
		
		$pdf->AddPage('p','A4');
		$pdf->entete($datejour1,$datejour2,'Repartition par spécialite : ',$EPH1);
		$pdf->medecinspecialiste($EPH);

		$pdf->AddPage('p','A4');
		$pdf->entete($datejour1,$datejour2,'Repartition par commune : ',$EPH1);
		$pdf->medecinsp($EPH);

		$pdf->AddPage('L','A4');
		$pdf->entetel($datejour1,$datejour2,"Repartition par date d'inspection/anomalie constatée  : ",$EPH1);
		$pdf->repartanomx($datejour1,$datejour2,$EPH);
	}
	if ($_POST['EPH']=='17') //medecin generaliste
	{ 
		$pdf->AddPage('p','A4');
		$pdf->entete($datejour1,$datejour2,'Repartition par commune : ',$EPH1);
		$pdf->medecing($EPH);
		$pdf->AddPage('L','A4');
		$pdf->entetel($datejour1,$datejour2,"Repartition par date d'inspection/anomalie constatée  : ",$EPH1);
		$pdf->repartanomx($datejour1,$datejour2,$EPH);
	}
	if ($_POST['EPH']=='12') //pharmacie 
	{
		$pdf->AddPage('p','A4');
		$pdf->entete($datejour1,$datejour2,'Repartition par commune : ',$EPH1);
		$pdf->pharmacie($EPH);
		$pdf->AddPage('L','A4');
		$pdf->entetel($datejour1,$datejour2,"Repartition par date d'inspection/anomalie constatée  : ",$EPH1);
		$pdf->repartanomx($datejour1,$datejour2,$EPH);
	}
	if ($_POST['EPH']=='15') //dentiste
	{
		$pdf->AddPage('p','A4');
		$pdf->entete($datejour1,$datejour2,'Repartition par autoclave : ',$EPH1);
		$pdf->dentiste($EPH);
		$pdf->AddPage('L','A4');
		$pdf->entetel($datejour1,$datejour2,"Repartition par date d'inspection/anomalie constatée  : ",$EPH1);
		$pdf->repartanomx($datejour1,$datejour2,$EPH);
	}
	if ($_POST['EPH']=='24') //sage femme
	{
		$pdf->AddPage('p','A4');
		$pdf->entete($datejour1,$datejour2,'Repartition par autoclave : ',$EPH1);
		$pdf->sagefemme($EPH);
		$pdf->AddPage('L','A4');
		$pdf->entetel($datejour1,$datejour2,"Repartition par date d'inspection/anomalie constatée  : ",$EPH1);
		$pdf->repartanomx($datejour1,$datejour2,$EPH);
	}
	if ($_POST['EPH']=='21') //transport
	{
		$pdf->AddPage('p','A4');
		$pdf->entete($datejour1,$datejour2,'Repartition par categorie : ',$EPH1);
		$pdf->transport($EPH);
		$pdf->AddPage('L','A4');
		$pdf->entetel($datejour1,$datejour2,"Repartition par date d'inspection/anomalie constatée  : ",$EPH1);
		$pdf->repartanomx($datejour1,$datejour2,$EPH);
	}
	// if ($_POST['EPH']=='0') {//structure 
	// $pdf->AddPage('L','A4');
	// $pdf->entetel($datejour1,$datejour2,'Repartition par commune  : ',$EPH1);
	// $pdf->structure($EPH1);
	// }
	// if ($_POST['EPH']=='0') {//structure 
	// $pdf->AddPage('L','A4');
	// $pdf->entetel($datejour1,$datejour2,'Repartition par structure : ',$EPH1);
	// $pdf->repartanomx($datejour1,$datejour2,$EPH);
	// }

	// $pdf->SetAutoPageBreak(true ,2);

	//bilan 2018 derniere verssion 2018
	if ($_POST['EPH']=='0') //structure 
	{  
		$pdf->AddPage('L','A4');
		$pdf->enteteinspection($datejour1,$datejour2,'SYNTHESE DU BILAN DES INSPECTIONS EFFECTUÉES (ETABLISSEMENTS PUBLICS)',$EPH1);
		$pdf->bilaninspection($datejour1,$datejour2,$EPH,1);
		$pdf->AddPage('L','A4');
		$pdf->enteteinspection($datejour1,$datejour2,'SYNTHESE DU BILAN DES INSPECTIONS EFFECTUÉES (ETABLISSEMENTS PRIVES)',$EPH1);
		$pdf->bilaninspection($datejour1,$datejour2,$EPH,2);$pdf->pied();
	}

}

//***********************************************************************************************************************************//

if ($_POST['type']=='14') 
{
	if ($_POST['EPH']=='0') //structure 
	{  
		$pdf->enteterapport($datejour1,$datejour2,'BILAN ANNUEL << CHIFFRE >> DES INSPECTIONS EFFECTUÉES PAR LES PRATICIENS INSPECTEURS',$EPH);
	}


	if ($_POST['EPH']=='0') 
	{  
		$pdf->AddPage('p','A4');
		$pdf->SetFont('Times', 'B', 10);

		$pdf->SetXY(8,25);$pdf->cell(195,5,"BILAN ANNUEL << CHIFFRE >> DES INSPECTIONS EFFECTUÉES PAR LES PRATICIENS INSPECTEURS",1,0,'C',1,0);
		$pdf->SetXY(8,30);$pdf->cell(195,5,"Du ".$datejour1." Au ".$datejour2,1,0,'C',1,0);
		$pdf->SetXY(8,35);
		$pdf->cell(10,5,"N°",1,0,'C',1,0);
		$pdf->cell(95,5,"Structures",1,0,'C',1,0);
		$pdf->cell(30,5,"NBR Structures",1,0,'C',1,0);
		$pdf->cell(30,5,"NBR Inspections",1,0,'C',1,0);
		$pdf->cell(30,5,"Rapport Inspections",1,0,'C',1,0);

		$pdf->mysqlconnect();
		$query="SELECT * FROM structurebis order by id ";      
		$resultat=mysql_query($query);
		$totalmbr1=mysql_num_rows($resultat);

		$pdf->SetXY(8,40);
		$x=0;
		while($row=mysql_fetch_object($resultat))
		{
		$pdf->SetFont('Times', '', 10);
		$pdf->cell(10,5,trim($x=$x+1),1,0,'C',0);
		$pdf->cell(95,5,trim($row->structure),1,0,'L',0);
		$pdf->cell(30,5,$pdf->totalstructure("=".$row->id),1,0,'C',0);
		$pdf->cell(30,5,$pdf->inspectionpardate($datejour1,$datejour2,"=".$row->id) ,1,0,'C',0);
		$pdf->cell(30,5,"***",1,0,'C',0);
		$pdf->SetXY(8,$pdf->GetY()+5); 
		}
		$pdf->SetXY(8,$pdf->GetY());
		$pdf->cell(105,5,"Total structures ",1,0,'C',1,0);
		$pdf->cell(30,5,$pdf->totalstructure(NULL) ,1,0,'C',1,0);
		$pdf->cell(30,5,$pdf->inspectionpardate($datejour1,$datejour2,NULL) ,1,0,'C',1,0);
		$pdf->cell(30,5,"***" ,1,0,'C',1,0);
	}	
	//bilan 2018 derniere verssion 2019 
	// if ($_POST['EPH']=='0') {  //structure 
	// $pdf->enteteinspectionp($datejour1,$datejour2,'BILAN ANNUEL << CHIFFRE >> DES INSPECTIONS EFFECTUÉES PAR LES PRATICIENS INSPECTEURS',$EPH);$pdf->pied();
	// }
}
//****************liste de garde
if ($_POST['type']=='15') 
{
	if ($_POST['EPH']=='12') //pharmacie 
	{
		$pdf->AddPage('p','A4');
		$pdf->entete($datejour1,$datejour2,'liste de garde  par commune : ',$EPH1);
		// $pdf->pharmacie($EPH);
		// $pdf->AddPage('L','A4');
		// $pdf->entetel($datejour1,$datejour2,"Repartition par date d'inspection/anomalie constatée  : ",$EPH1);
		// $pdf->repartanomx($datejour1,$datejour2,$EPH);
		$an=2023;
		$mois=01;
		$jour = date("d");
		$debut = mktime(0,0,0,$mois,1,$an);    
		$premJour = date("w" , $debut );    //1er jour dans la grille 
		$nbJours  = date("t" , $debut);      //nb de jours dans le mois
		$numero_semaine=date("W");          //nbr de semaine 
		$jour_semaine=date("w",mktime(0,0,0,$mois,1,$an)); // Jour de la semaine au format numê³©que 0 (pour dimanche) à ¶ (pour samedi)
		$nbEmptyCells = ($premJour + 6)%7;
		
		$h=7;
		$pdf->SetXY(8,$pdf->GetY()+$h); 
		$pdf->cell(30,$h,"date",1,0,'C',1,0);
		$pdf->cell(40,$h,"1er pharmacien",1,0,'C',1,0);
		$pdf->cell(40,$h,"2eme pharmacien",1,0,'C',1,0);
		$pdf->cell(40,$h,"3eme pharmacien",1,0,'C',1,0);
		$pdf->cell(40,$h,"observation",1,0,'C',1,0);	
		
		
		for ($i=1;$i<=$nbJours;$i++) 
		{
			//$pdf->SetXY(8,$pdf->GetY()+$h); 
			//$pdf->cell(30,$h,$pdf->dateUS2FR($pdf->datePlus("00-".$mois."-".$an,$i)),1,0,'C',1,0);
			// $pdf->cell(40,$h,"",1,0,'C',0,0);
			// $pdf->cell(40,$h,"",1,0,'C',0,0);
			// $pdf->cell(40,$h,"",1,0,'C',0,0);
			// $pdf->cell(40,$h,"",1,0,'C',0,0);		
		}
		$pdf->mysqlconnect();
		$query = "SELECT * from structure where STRUCTURE=12 and COMMUNEN=916 and ETAT=0 ORDER BY NOM"; 
		$res=mysql_query($query);
		$tot=mysql_num_rows($res);
		$pdf->SetXY(8,$pdf->GetY()+$h); 
		$x=0;
		while($row=mysql_fetch_object($res))
		{
			$pdf->cell(30,5,$pdf->dateUS2FR($pdf->datePlus("00-".$mois."-".$an,$x=$x+1)),1,0,'C',0);
			$pdf->cell(60,5,strtoupper($row->NOM).'_'.ucwords(strtolower($row->PRENOM)),1,0,'L',0,0);
			$pdf->SetXY(8,$pdf->GetY()+5);  
		}
		
	}
	
	
	
}
//**********************************************en fonction de la structure *****************************************************************//	
// 
$pdf->Output();
?>