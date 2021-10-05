<?php
 require_once('inspection.php');
$pdf = new inspection('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('rapport inspection');
$pdf->SetSubject('PROTOCOLE');
$pdf->SetFillColor(250);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 12);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->AddPage();
$pdf->SetLineWidth(0.4);
$id=$_GET["uc"];
$id1=$_GET["uc1"];  
$id2=$pdf->dateUS2FR($_GET["date"]); 
// $pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');

$pdf->entetesiple();

$pdf-> mysqlconnect(); 
$query_listey = "SELECT * FROM insp WHERE id  ='$id' ";
$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$totalmbry=mysql_num_rows($requetey);
while($rowy=mysql_fetch_object($requetey))
{
	if ($rowy->STRUCTURE==26)
	{	
	
	
	$pdf->SetXY(5,$pdf->GetY()+15);$pdf->Cell(200,10,"INSPECTION  D'UNE ENTREPRISE  ",1,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+11);$pdf->Cell(200,10,"DE PRODUCTION ET/OU DE DISTRIBUTION DE PRODUITS PHARMACEUTIQUES",1,1,'C',1,0);
	
	
	$nom=strtoupper($pdf->nbrtostring('mvc','structure','id',$rowy->ids,'NOM'));
	$prenom=ucfirst(strtolower($pdf->nbrtostring('mvc','structure','id',$rowy->ids,'PRENOM')));
	$sexe=trim($pdf->nbrtostring('mvc','structure','id',$rowy->ids,'SEX'));
	$dateinsp=$pdf->dateUS2FR($rowy->DATE);
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,15,"-> Praticien Inspecteur : Dr TIBA",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,15,"-> Date de l'inspection : ".$dateinsp,0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,15,"-> l'établissement inspecté : ".$nom.'_'.$prenom,0,1,'L',1,0);

	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,15,"-> l'adresse éxacte : ".$pdf->nbrtostring('mvc','com','IDCOM',$pdf->nbrtostring('mvc','structure','id',$rowy->ids,'COMMUNE'),'COMMUNE'),0,0,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+17);$pdf->Cell(200,15,"-> Numéro de téléphone : ",0,0,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+17);$pdf->Cell(200,15,"-> Numéro de fax : ",0,0,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+17);$pdf->Cell(200,15,"-> E-mail : ",0,1,'L',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"-> Enseigne présente : ",1,0,'L',1,0); $pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(200,5,"-> Texte porté sur l'enseigne : ",1,1,'L',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"-> Agrément d'exercice de l'activité de distribution de produits pharmaceutiques: ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(60,5,"-> Délivrée par : ",1,0,'L',1,0);$pdf->Cell(70,5,"sous le N° : ",1,0,'L',1,0);$pdf->Cell(70,5,"en date du  : ",1,1,'L',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"-> Décision du pharmacien ditecteur technique : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(60,5,"-> Délivrée par : ",1,0,'L',1,0);$pdf->Cell(70,5,"sous le N° : ",1,0,'L',1,0);$pdf->Cell(70,5,"en date du  : ",1,0,'L',1,0);

    $pdf->AddPage();
    $pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"-> le pharmacien ditecteur téchnique était présent lors de l'inspection: ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Est-il inscrit au tableau de l'ordre des pharmaciens: ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);

	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"-> Activité éxercée : ",1,0,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Production : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Distribution : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);

	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(160,5,"-> L'établissement détient une liste des fournisseeurs : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(200,5,"-> Si non demander a ce qu'elle soit établie et communiquée,signée et datée .",1,0,'L',1,0);

	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(160,5,"-> L'établissement détient une liste des clients : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(200,5,"-> Si non demander a ce qu'elle soit établie et communiquée,signée et datée .",1,0,'L',1,0);

    $pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(160,5,"-> Stock de produits pharmaceutiques éxiste t-il : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(200,5,"-> Observation : ",1,0,'L',1,0);
	
	$pdf->AddPage();
	 $pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(160,5,"-> les factures d'achats sont elles archivées  : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
	 $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(200,5,"-> elles comportent : ",1,0,'L',1,0);
	 $pdf->SetXY(25,$pdf->GetY()+7);$pdf->Cell(140,5,"-> date d'entrée  : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
     $pdf->SetXY(25,$pdf->GetY()+7);$pdf->Cell(140,5,"-> DCI du médicament forme et dosage   : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
     $pdf->SetXY(25,$pdf->GetY()+7);$pdf->Cell(140,5,"-> la quantitée recus par n° de lot   : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
     $pdf->SetXY(25,$pdf->GetY()+7);$pdf->Cell(140,5,"-> la date de péremption   : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
     $pdf->SetXY(25,$pdf->GetY()+7);$pdf->Cell(140,5,"-> le nom et adresse du fournisseur   : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
     $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(200,5,"-> Observation : ",1,0,'L',1,0);
	 
	 $pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(160,5,"-> les factures de vente sont elles archivées  : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
	 $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(200,5,"-> elles comportent : ",1,0,'L',1,0);
	 $pdf->SetXY(25,$pdf->GetY()+7);$pdf->Cell(140,5,"-> date d'entrée  : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
     $pdf->SetXY(25,$pdf->GetY()+7);$pdf->Cell(140,5,"-> DCI du médicament forme et dosage   : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
     $pdf->SetXY(25,$pdf->GetY()+7);$pdf->Cell(140,5,"-> la quantitée recus par n° de lot   : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
     $pdf->SetXY(25,$pdf->GetY()+7);$pdf->Cell(140,5,"-> la date de péremption   : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
     $pdf->SetXY(25,$pdf->GetY()+7);$pdf->Cell(140,5,"-> le nom et adresse du fournisseur   : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
     $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(200,5,"-> Observation : ",1,0,'L',1,0);
	 
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"-> Produits pharmaceutiques commercialisées : ",1,0,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Médicaments : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Consommables : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Réactifs : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Produits dentaires : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);

	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(160,5,"-> Surface de stockage utile couverte supérieure a 300 m2 : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Avec 200 m2  au sol d'un seul tenant: ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(160,5,"-> les magazins de stockage ne son déstinés qu'a la détention des produits pharmaceutiques : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(200,5,"-> a usage de la médecine humaine : ",1,0,'L',1,0);
	
	$pdf->AddPage();
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"-> Produits pharmaceutiques sont : ",1,0,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Entreposés et rangés dans des conditions appropriés: ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> de maniere methodique permettant la repartition xxx  de la rotaion des stocks: ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
   
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"-> L'établissemnt commercialise des produits pharmaceutiques necessitant des conditions speciales de conservation : ",1,0,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Chaine de froid respecté: ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Groupe éléctrogène existe : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Registre de maintenance existe: ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Registre de maintenance Bien tenu: ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Maintenance périodique ajour: ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"-> L'établissemnt commercialise des produits pharmaceutiques inscrits  ",1,0,'L',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Aux tableaux des substances vénéneuses et stupéfiants : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> La réglementation en vigueur en la matière est respctée: ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> Demander les registres reglementaires : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"-> L'établissemnt dispose d'un stock  en produits pharmaceutiques a usage de la médecine suffisant pour assurer  ",1,0,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(160,5,"-> l'approvisionnement des officines : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(160,5,"-> L'établissemnt dispose de produits pharmaceutiques perimés : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    
	$pdf->AddPage();
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(160,5,"-> La réglementation en matière d'incinération est-elle réspectée : ",1,0,'L',1,0);$pdf->Cell(20,5,"OUI ",1,0,'C',1,0); $pdf->Cell(20,5,"NON ",1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(200,5,"-> Demander les copies des conventions et celle des dernieres PV d'incinérations : ",1,0,'L',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"-> Hygiènne générale des lieux : ",1,0,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(60,5,"-> Bonne : ",1,0,'L',1,0);$pdf->Cell(70,5,"Moyenne : ",1,0,'L',1,0);$pdf->Cell(70,5,"Mauvaise  : ",1,0,'L',1,0);
    $pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(200,5,"-> Observations : ",1,0,'L',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"-> Autres constatations : ",1,0,'L',1,0);
	
	$pdf->AddPage();
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"-> Résumé des réserves constatées : ",1,0,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"-> Recommandations : ",1,0,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"-> Signatures des praticiens médicaux inspecteurs de santé publique  : ",1,0,'L',1,0);
	}
	
	if ($rowy->STRUCTURE==9)
	{
	$pdf->SetFont('aefurat', 'B', 12);
	$pdf->SetXY(5,$pdf->GetY()+15);$pdf->Cell(200,10,"INSPECTION ",1,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+11);$pdf->Cell(200,10,"D'UN ETABLISSEMENT HOSPITALIER PRIVE  ",1,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+11);$pdf->Cell(200,10,"D'UN CENTRE DE  DIAGNOSTIC  ",1,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+11);$pdf->Cell(200,10,"D'UN ETABLISSEMENT DE SANTE PRIVE DE TYPE AMBULATOIRE  ",1,0,'C',1,0);
	$pdf->AddPage();
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"TYPE D'ETABLISSEMENT PRIVE : ETABLISSEMENT HOSPITALIER PRIVE [EHP]",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"ADRESSE : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"TEL :                        FAX :                          EMAIL  : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"ACTIVITES AUTORISEES ET PORTEES SUR LA DECISION D'OUVERTURE : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"JOINDRE COPIE DE LA DECISION : ",0,1,'L',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"SUPPORTS D'INFORMATION ET IDENTIFICATION  : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"- Enseigne : Est-elle conforme à l'article 78 du décret exécutif n°92-276 du 06/07/1992 portant code de déontologie ",0,0,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"   médicale : ",0,0,'L',1,0);                  $pdf->Cell(20,5,"Oui ",0,0,'C',1,0); $pdf->Cell(20,5,"Non ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"- Panneau de renseignements  : ",0,0,'L',1,0); $pdf->Cell(20,5,"Oui ",0,0,'C',1,0); $pdf->Cell(20,5,"Non ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"- Programme de consultation  : ",0,0,'L',1,0); $pdf->Cell(20,5,"Oui ",0,0,'C',1,0); $pdf->Cell(20,5,"Non ",0,0,'C',1,0);
	
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"ACCUEIL / ORIENTATION   : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"Comptoir d'accueil : réceptionniste, téléphone : ",0,0,'L',1,0);           $pdf->Cell(20,5,"Oui ",0,0,'C',1,0); $pdf->Cell(20,5,"Non ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"Salles  d'attentes : hommes, femmes :séparées ou uniques  : ",0,0,'L',1,0);$pdf->Cell(20,5,"Oui ",0,0,'C',1,0); $pdf->Cell(20,5,"Non ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"Sanitaires :hommes, femmes :séparées ou uniques  : ",0,0,'L',1,0);         $pdf->Cell(20,5,"Oui ",0,0,'C',1,0); $pdf->Cell(20,5,"Non ",0,0,'C',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"INFORMATIONS  SUR LA STRUCTURE : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Dénomination portée sur la décision d'ouverture : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Promoteur de l'établissement : Nom et prénom : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Directeur technique (médical) : Nom, prénom et spécialité : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Directeur administratif : Nom, prénom et profil de formation : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Les jours d'ouverture : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Les horaires d'ouverture : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le repos hebdomadaire : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"La garde  est-elle assurée et indication de la plage horaire : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Composition de l'équipe de garde : ",0,1,'L',1,0);
	
	$pdf->AddPage();
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"-Type de construction : RDC :...... / R+1 :...... / R+2 :...... / R+3 :...... / Autre :...... ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"- Ascenseur (s) exist  : ",0,0,'L',1,0);$pdf->Cell(20,5,"OUI ",0,0,'C',1,0); $pdf->Cell(20,5,"NON ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"- Ascenseur (s) Fonctionnel  : ",0,0,'L',1,0);$pdf->Cell(20,5,"OUI ",0,0,'C',1,0); $pdf->Cell(20,5,"NON ",0,1,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"- Capacité en lits théoriques  : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"- Capacité en lits organisés : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"- Les spécialités assurées réellement  : ",0,1,'L',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"ETAT DE LA STRUCTURE  : ",0,1,'L',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Conformité des locaux :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Les locaux de consultation disposent-t-ils des éléments suivants   : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"lavabo, frigo, armoires à pharmacie :",0,1,'L',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"LES SERVICES D’HOSPITALISATIONS   : ",0,1,'L',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"capacité en lits par spécialité:",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Hospitalisation hommes et  femmes ou séparée :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"nombre de chambres :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"nombre de lits :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"équipements des chambres : , , , , ,, :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"tête de lit avec appel malade:",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"chauffage:",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"climatisation:",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"arrivées des fluides:",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"sanitaires:",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"douches sécurisées:",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"mobilier:",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Chambre d’isolement : nombre :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Salle de soins :",0,1,'L',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"LES RESSOURCES HUMAINES   : ",0,1,'L',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Les effectifs par corps, grade  et spécialités  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"(Une liste nominative signée doit être remise, portant le statut de  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"chaque professionnel exerçant au niveau de chaque  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"établissement). :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Nombre de médecins spécialistes (hospitalo-universitaire ou santé publique)  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Nombre de médecins généralistes  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Autres praticiens  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Etat des praticiens médicaux  privés conventionnés avec la clinique : Vérifier la validité de la convention  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"personnel paramédical  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"-ISP : permanents :…. contractuels :……………, autres :…………. :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"-ATS : permanents :………, contractuels :………………, autres :………… :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"-Sages-femmes : permanentes :……………, contractuelles :……………. :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"- Le personnel est-il vacciné ? :	…. :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Les dossiers administratifs des personnels médicaux et paramédicaux existent-t-ils ? et leur tenue :…………………. :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"L’identité de chaque professionnel en exercice doit être vérifiée :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"En de présence d’un professionnel de la santé relevant du secteur public, préciser son employeur  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"LE PLATEAU TECHNIQUE :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"La radio : conventionnelle/numérisée :………..autre :…………………….Existe-t-il  une convention avec le COMENA relative au contrôle dosimétrique du personnel exposé aux rayonnements : la date et la validité des dosimètres individuels et d’ambiance ? :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le laboratoire : citez lesprincipaux équipements :(En cas d’absence de laboratoire : Existe-t-il une convention avec un laboratoire ?  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"L’IRM : Oui/ Non ------ Fonctionnel : Oui/Non. :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le scanner(nombre de barrettes) :Oui/ Non ------ Fonctionnel : Oui/Non. :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le fibroscope/rectoscope/coloscope:Oui/ Non ------ Fonctionnel : Oui/Non :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le mammographe :Oui/ Non ------ Fonctionnel : Oui/Non :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"L’appareil panoramique dentaire :Oui/ Non ------ Fonctionnel : Oui/Non :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"L’échographe :Oui/ Non ------ Fonctionnel : Oui/Non :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"L’ECG :Oui/ Non ------ Fonctionnel : Oui/Non :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"L’Echo doppler :Oui/ Non ------ Fonctionnel : Oui/Non :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Autres (à préciser) : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"LE BLOC OPERATOIRE :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"•	Activités assurées au niveau du bloc opératoire :ORL /Ophtalmologie/chirurgie/gynécologie, autres activités(à préciser) : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"•	Nombre de salles opératoires  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Normes : superficie :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Revêtement du sol et murs: :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Système de filtration et traitement de l’air : :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Équipements disponibles : :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Type de stérilisation : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Bloc sceptique : équipements disponibles : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Conformité du circuit, sale/propre : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Vestiaire des chirurgiens et autres personnels : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Lave-main automatique avec eau traitée : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Local dédié au stockage du matériel stérile : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Salle de réveil/réanimation : baie vitrée : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le couloir technique de la partie sale : guichets, lieu de lavage-décontamination, vidoir, autoclave : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"L’entreposage des produits anesthésiants est-elle conforme à la règlementation :",0,1,'L',1,0); 
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"LE BLOC D’ACCOUCHEMENT : :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Nombre de salles d’accouchement : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Nombre de table d’accouchement par salle et leur état : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Salle de pré travail  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Equipements disponibles : climatisation, arrivée des fluides, scialytiques, table de réanimation du nouveau-né, horloge : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Salle de réanimation du nouveau-né : couveuse ou incubateur, table de réanimation du nouveau née, table de photothérapie : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Nurserie : :",0,1,'L',1,0); 
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"LES SERVICES GENERAUX :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Bureau d’administration  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Local de stockage des produits pharmaceutiques et autres dispositifs médicaux : rayonnage, coffre –fort pour les stupéfiants) : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"La morgue et le nombre de casiers  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"La cuisine : Oui/ Non ------ Plat témoin : Oui/Non.(Convention avec un traiteur pour la restauration :………):",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Chambres froides : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"La buanderie  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"L’incinérateur : Oui/Non. (Si non : y a-t-il une convention avec un établissement  pour l’incinération des DASRI et les produits pharmaceutiques périmés ?).Joindre copies des PV d’incinération. :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Extincteurs, Bouches d’incendie :Oui/Non. :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Groupe électrogène :(démarrage automatique) :Oui/Non. :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Centrale de climatisation :Oui/Non. :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Chaufferie centrale :Oui/Non. :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Centrale de production des fluides (sécurisées) :Oui/Non :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"-Air comprimé, :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"-CO2, :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"-Oxygène (nombre d’obus) : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"-Protoxyde d’azote (nombre d’obus) : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Evaporateur d’oxygène : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Installation externe pour les gaz médicaux : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Centrale de traitement et de filtration d’air : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Bâche à eau : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Citernes : :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Réseau AEP  :",0,1,'L',1,0); 
	
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"L’HYGIENE    : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Existe-t-il  une commission d’hygiène et de sécurité ? :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"La date de son installation  :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Etat de l’hygiène générale  :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Aération :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Port de blouses et de badges  :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Moyens physiques et chimiques de désinfection des locaux, nébuliseur, UV :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Existe-t-il une nichepour les ordures ménagères ? :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Les agents d’entretien : Nombre :…………Si non : Existe-t-il une convention avec une société de nettoyage?  :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le respect des procédures en matière de gestion des DASRI : Oui/Non. :",0,1,'L',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"LA SECURITE   : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"•	Réseau anti incendie : Oui/Non. :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"•	Contrôle des extincteurs :Oui/Non :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"•	Issues de secours :Oui/Non :",0,1,'L',1,0);
	
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"LA GESTION ADMINISTRATIVE   : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"•	Le comité médical  :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"-PV de création :……………………………. :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Sa composition :……………………………………… :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le représentant des agents paramédicaux siège-t-il ?  :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"-Nombre de réunions :……………Joindre copies desP.V. :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"•	Le règlement intérieur (signé par l’inspecteur du travail) : Oui/Non :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"•	Convention avec la CNAS  :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"•	Le contrat d’assurance responsabilité civile  :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"•	Le rapport de conformité du COMENA  :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"•	Ambulances : Oui/Non ------ En marche : Oui/Non. En cas d’indisponibilité, existe-t-il une convention avec un transporteur ? :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"•	Les produits sanguins : y a-t-il une convention avec un établissement  public pour la fourniture  des produits sanguins labiles : date et validité :……………………. :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"•	Conformité des installations électriques : rapport délivré par l’entreprise nationale d’agréage et de contrôle technique (ENACT) :………………………. :",0,1,'L',1,0);
	
	
	
	
	
	
	
	
	
	
	
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"LES REGISTRES REGLEMENTAIRES  : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le registre du protocole opératoire  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le registre des admissions/sorties  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le registre des consultations :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le registre des maladies à déclaration obligatoire (MDO)  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le registre de la pharmacie  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le registre des poches de sang :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le registre des hospitalisations  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le registre des échographies  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le registre des décès  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le registre des naissances  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le registre des inspections  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le registre des doléances  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le registre des protocoles d’accouchements  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le registre des vaccinations  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"les dossiers des malades/parturientes  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"le registre d’anesthésie (consommable)  :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"le registre du bloc sceptique :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Les registres dédiés à la gestion des personnels :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Les bilans activités: sont-t-ils transmis à la DSP ? Oui/Non :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"-Trimestriellement  :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"-Annuellement  :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"L’activité de greffe est-elle assurée ? (implant cochléaire, cornée…) :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Le personnel est-t-il couvert par la médecine du travail ? : :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Existe-t-il une convention avec un établissement public de santé?  :",0,1,'L',1,0);
	
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"LE SERVICE DES URGENCES : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Accès : adapté, réservé aux urgences  :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"La salle de déchoquage : arrivée des fluides, aspirateurs électriques, ECG, défibrillateur, moyens d’intubation et d’insufflation :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Disponibilité des produits pharmaceutiques d’urgence :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Dans le cas des EHP, il y a lieu de préciser si sont-elles assurées ou non? :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"les activités de consultations :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"d’explorations :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"de diagnostic :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"d’urgences :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"de déchocage :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"de réanimation et d’observation :",0,1,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0); 
	
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"GESTION DE LA PHARMACIE  : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Adaptation des locaux :    Oui / Non :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"L’existence d’un pharmacien : Oui / Non :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Gestion drogues et stupéfiants : respectée Oui / Non :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"A signaler, éventuellement, d’autres	informations :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5," :",0,1,'L',1,0);
	
	
	
	
	
	}
	
	
	if ($rowy->STRUCTURE==12)
	{
	$pdf->SetXY(5,$pdf->GetY()+15);$pdf->Cell(200,10,"INSPECTION D'UNE OFFICINE PHARMACEUTIQUE",1,0,'C',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+11);$pdf->Cell(200,10,"REF : circulaire N° 12 MSP-RH/MIN DU 22/10/2006 relative  a l'exercice de la profession de pharmacie d'officine  ",1,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+20);$pdf->Cell(160,5,"La présence éffective du pharmacien titulaire   : ",0,0,'L',1,0);$pdf->Cell(20,5,"OUI ",0,0,'C',1,0); $pdf->Cell(20,5,"NON ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+20);$pdf->Cell(160,5,"Le réspect des regles d'hygiene : ",0,0,'L',1,0);$pdf->Cell(20,5,"OUI ",0,0,'C',1,0); $pdf->Cell(20,5,"NON ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+20);$pdf->Cell(160,5,"La garde au niveau de l'officine est assurée par le pharmacien titulaire : ",0,0,'L',1,0);$pdf->Cell(20,5,"OUI ",0,0,'C',1,0); $pdf->Cell(20,5,"NON ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+20);$pdf->Cell(160,5,"Les conditions de stockage des produits pharmaceutiques son respectées : ",0,0,'L',1,0);$pdf->Cell(20,5,"OUI ",0,0,'C',1,0); $pdf->Cell(20,5,"NON ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+20);$pdf->Cell(160,5,"La presence d'un registre a jours des substances psychotropes et stupefiants : ",0,0,'L',1,0);$pdf->Cell(20,5,"OUI ",0,0,'C',1,0); $pdf->Cell(20,5,"NON ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+20);$pdf->Cell(160,5,"La durée de validité des produits pharmaceutiques est confome : ",0,0,'L',1,0);$pdf->Cell(20,5,"OUI ",0,0,'C',1,0); $pdf->Cell(20,5,"NON ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+20);$pdf->Cell(160,5,"La presence éffective du vignettage des produits pharmaceutiques : ",0,0,'L',1,0);$pdf->Cell(20,5,"OUI ",0,0,'C',1,0); $pdf->Cell(20,5,"NON ",0,0,'C',1,0);
	
	
	
	}
	
	
	
	
}

$pdf->Output('.PDF','I');
?>
