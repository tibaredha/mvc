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
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"TYPE D'ETABLISSEMENT PRIVE : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"ADRESSE : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"TEL :                        FAX :                          EMAIL  : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"ACTIVITES AUTORISEES ET PORTEES SUR LA DECISION D'OUVERTURE : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"JOINDRE COPIE DE LA DECISION : ",0,1,'L',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"SUPPORTS D'INFORMATION ET IDENTIFICATION  : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"- Enseigne : Est-elle conforme à l'article 78 du décret exécutif n°92-276 du 06/07/1992 portant code de déontologie ",0,0,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"   médicale : ",0,0,'L',1,0);                  $pdf->Cell(20,5,"OUI ",0,0,'C',1,0); $pdf->Cell(20,5,"NON ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"- Panneau de renseignements  : ",0,0,'L',1,0);$pdf->Cell(20,5,"OUI ",0,0,'C',1,0); $pdf->Cell(20,5,"NON ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"- Programme de consultation  : ",0,0,'L',1,0);$pdf->Cell(20,5,"OUI ",0,0,'C',1,0); $pdf->Cell(20,5,"NON ",0,0,'C',1,0);
	
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"______________________________________________________________________________________________ ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"ACCUEIL / ORIENTATION   : ",0,1,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"Comptoir d'accueil : réceptionniste, téléphone : ",0,0,'L',1,0);$pdf->Cell(20,5,"OUI ",0,0,'C',1,0); $pdf->Cell(20,5,"NON ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"Salles  d'attentes : hommes, femmes :   séparées ou uniques  : ",0,0,'L',1,0);$pdf->Cell(20,5,"OUI ",0,0,'C',1,0); $pdf->Cell(20,5,"NON ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(160,5,"Sanitaires :            hommes, femmes :   séparées ou uniques  : ",0,0,'L',1,0);$pdf->Cell(20,5,"OUI ",0,0,'C',1,0); $pdf->Cell(20,5,"NON ",0,0,'C',1,0);
	
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
