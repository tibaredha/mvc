<?php
require('INSPECTION1.php');
$pdf = new INSPECTION1( 'p', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$id=$_GET['id'];
$ids=$_GET['uc'];
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',10);

$pdf->SetXY(05,10);$pdf->cell(200,5,$pdf->repfr,0,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5);$pdf->cell(200,5,$pdf->mspfr,0,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5);$pdf->cell(200,5,$pdf->dspfr,0,0,'C',0,0);


$pdf->SetXY(05,$pdf->GetY()+55);$pdf->cell(200,5,"canvas d'inspection et d'evaluation ",0,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5);$pdf->cell(200,5,"des unitées sanitaires de base",0,0,'C',0,0);

$pdf->SetXY(05,$pdf->GetY()+25);$pdf->cell(200,5,"nom et qualité du praticien inspecteur",0,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5);$pdf->cell(200,5,"Dr TIBA",0,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5);$pdf->cell(200,5,"periode de deroulement de l'inspection",0,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5);$pdf->cell(200,5,date('d-m-Y'),0,0,'C',0,0);

$pdf->AddPage('','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',10);


$pdf->mysqlconnect();
mysql_query("SET NAMES 'UTF8' ");
$query = 'SELECT * FROM epsp where id = '.$id.'  '; //    
$resultat=mysql_query($query);
//$totalmbr1=mysql_num_rows($resultat);
$x=0;
while($row=mysql_fetch_object($resultat))
{
//*********************************//
$pdf->SetFont('Arial','U',10);$pdf->SetXY(05,$pdf->GetY());$pdf->cell(50,5,"I/ identification : ",0,0,'L',0,0);$pdf->SetFont('Arial','',10);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"Wilaya : Djelfa ",0,0,'L',0,0);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"EPSP : ".$pdf->nbrtostring("structure","id",$row->idstructure,"NOM")."_".$pdf->nbrtostring("structure","id",$row->idstructure,"PRENOM"),0,0,'L',0,0);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"Commune : ".$pdf->nbrtostring("com","IDCOM",$row->COMMUNE,"COMMUNE"),0,0,'L',0,0);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"Type de USB : ",0,0,'L',0,0);

if ($row->NAT == 1){
	$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"* Polyclinique : X ",0,0,'L',0,0);
    $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"* Salle de soins : * ",0,0,'L',0,0);}
	else {
    $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"* Polyclinique : * ",0,0,'L',0,0);
    $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"* Salle de soins : X ",0,0,'L',0,0);
	}
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"Denomination : ".$row->ADRESSE,0,0,'L',0,0);

//*********************************//
$pdf->SetFont('Arial','U',10);$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(50,5,"II/ etat physique des lieux :",0,0,'L',0,0);$pdf->SetFont('Arial','',10);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* existe t-il un panneau de signalisation de l'unité à l'entrée de la localité (direction distance)? ",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* l'enseigne est elle bien exposée et visible de loin ? ",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* nombre de locaux à usage : ",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"médicale /___/  paramédicale /___ /",0,0,'L',0,0);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* éxiste t-il un plateau technique ?",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Laboratoire /___/  Radiologie /___ /",0,0,'L',0,0);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* si l'unité et un point de garde existe t-il une chambre de garde ?",0,0,'L',0,0);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* existe t-il des salles d'attente ?",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Hommes /___/  Femmes /___ /   Mixtes /___ /",0,0,'L',0,0);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* les siges sont-ils sufisants ?",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* Ya t-il un tableau d'activité avec horaire de fonctionnement indiquant les journées de :",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"consultaion de medecine génerale",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"consultaion de médecine scpécialisée",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"vaccination",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"repos hebdomadaire",0,0,'L',0,0);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*est-il bien visible au public ? ",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"Etat interieur et exterieur de la structure  ",0,0,'L',0,0);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"l'unité est-elle : ",0,0,'L',0,0);

$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"chauffée en période hivernale avec ",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"gaz de ville  /___/  gaz butane /___ /   mazoute/___ /",0,0,'L',0,0);

$pdf->SetXY(40,$pdf->GetY()+10);$pdf->cell(50,5,"alimentaion en eau potable en ",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"permanece  /___/  continue /___ /   discontinue/___ /",0,0,'L',0,0);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*existe t-il une reserve d'eau dans l'unité ? ",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*existe t-il un eclairage de secours (groupe electrogene) ? ",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*est t-il fonctionnel ? ",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*existe t-il des moyens de lutte contre l'incendie ? ",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*sont-ils fonctionnels ? ",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*sont-ils controlés periodiquement ? ",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*environement de l'unité ? ",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"salubrité",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"les panssements souillés et autres dechets sont-ils incinerés ?",0,0,'L',0,0);
//*********************************//
$pdf->SetFont('Arial','U',10);$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(50,5,"III/ equipements :",0,0,'L',0,0);$pdf->SetFont('Arial','',10);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*existe t-il une fiche d'inventaire de l'unité des équipements,materiels et instrument par article ? ",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"est-elle ajours",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"date du dernier inventaire",0,0,'L',0,0);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*existe t-il un sous registre d'inventaire ?",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
//*********************************//
$pdf->SetFont('Arial','U',10);$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(50,5,"IV- personnels :",0,0,'L',0,0);$pdf->SetFont('Arial','',10);

//*********************************//
$pdf->SetFont('Arial','U',10);$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(50,5,"V- organisation et fonctionnement :",0,0,'L',0,0);$pdf->SetFont('Arial','',10);

//*********************************//
$pdf->SetFont('Arial','U',10);$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(50,5,"VI- activités medicales :",0,0,'L',0,0);$pdf->SetFont('Arial','B',10);

//*********************************//
$pdf->SetFont('Arial','U',10);$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(50,5,"VII- activités paramedicales :",0,0,'L',0,0);$pdf->SetFont('Arial','B',10);

//*********************************//
$pdf->SetFont('Arial','U',10);$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(50,5,"VIII- activités de prevention :",0,0,'L',0,0);$pdf->SetFont('Arial','B',10);

//*********************************//
$pdf->SetFont('Arial','U',10);$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(50,5,"IX- medicaments et produits vaccinaux :",0,0,'L',0,0);$pdf->SetFont('Arial','B',10);

//*********************************//
$pdf->SetFont('Arial','U',10);$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(50,5,"X- activités de la garde :",0,0,'L',0,0);$pdf->SetFont('Arial','B',10);

//*********************************//
$pdf->SetFont('Arial','U',10);$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(50,5,"XI- adminstration information :",0,0,'L',0,0);$pdf->SetFont('Arial','B',10);
}

$pdf->Output();
?>