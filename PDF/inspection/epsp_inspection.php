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

// $pdf->SetXY(05,10);$pdf->cell(200,5,$pdf->repfr,0,0,'C',0,0);
// $pdf->SetXY(05,$pdf->GetY()+5);$pdf->cell(200,5,$pdf->mspfr,0,0,'C',0,0);
// $pdf->SetXY(05,$pdf->GetY()+5);$pdf->cell(200,5,$pdf->dspfr,0,0,'C',0,0);


// $pdf->SetXY(05,$pdf->GetY()+55);$pdf->cell(200,5,"canvas d'inspection et d'evaluation ",0,0,'C',0,0);
// $pdf->SetXY(05,$pdf->GetY()+5);$pdf->cell(200,5,"des unitées sanitaires de base",0,0,'C',0,0);

// $pdf->SetXY(05,$pdf->GetY()+25);$pdf->cell(200,5,"nom et qualité du praticien inspecteur",0,0,'C',0,0);
// $pdf->SetXY(05,$pdf->GetY()+5);$pdf->cell(200,5,"Dr TIBA",0,0,'C',0,0);
// $pdf->SetXY(05,$pdf->GetY()+5);$pdf->cell(200,5,"periode de deroulement de l'inspection",0,0,'C',0,0);
// $pdf->SetXY(05,$pdf->GetY()+5);$pdf->cell(200,5,date('d-m-Y'),0,0,'C',0,0);

// $pdf->AddPage('','A4');
// $pdf->SetDisplayMode('fullpage','single');//mode d affichage 
// $pdf->SetFont('Arial','B',10);


$pdf->mysqlconnect();
mysql_query("SET NAMES 'UTF8' ");
$query = 'SELECT * FROM epsp where id = '.$id.'  '; //    
$resultat=mysql_query($query);
//$totalmbr1=mysql_num_rows($resultat);
$x=0;
while($row=mysql_fetch_object($resultat))
{
//*********************************//
// $pdf->SetFont('Arial','U',10);$pdf->SetXY(05,$pdf->GetY());$pdf->cell(50,5,"I/ identification : ",0,0,'L',0,0);$pdf->SetFont('Arial','',10);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"Wilaya : Djelfa ",0,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"EPSP : ".$pdf->nbrtostring("structure","id",$row->idstructure,"NOM")."_".$pdf->nbrtostring("structure","id",$row->idstructure,"PRENOM"),0,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"Commune : ".$pdf->nbrtostring("com","IDCOM",$row->COMMUNE,"COMMUNE"),0,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"Type de USB : ",0,0,'L',0,0);

// if ($row->NAT == 1){
	// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"* Polyclinique : X ",0,0,'L',0,0);
    // $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"* Salle de soins : * ",0,0,'L',0,0);}
	// else {
    // $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"* Polyclinique : * ",0,0,'L',0,0);
    // $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"* Salle de soins : X ",0,0,'L',0,0);
	// }
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"Denomination : ".$row->ADRESSE,0,0,'L',0,0);

//*********************************//
//$pdf->SetFont('Arial','U',10);$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(50,5,"II/ etat physique des lieux :",0,0,'L',0,0);$pdf->SetFont('Arial','',10);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* existe t-il un panneau de signalisation de l'unité à l'entrée de la localité (direction distance)? ",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* l'enseigne est elle bien exposée et visible de loin ? ",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* nombre de locaux à usage : ",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"médicale /___/  paramédicale /___ /",0,0,'L',0,0);

// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* éxiste t-il un plateau technique ?",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Laboratoire /___/  Radiologie /___ /",0,0,'L',0,0);

// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* si l'unité et un point de garde existe t-il une chambre de garde ?",0,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* existe t-il des salles d'attente ?",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Hommes /___/  Femmes /___ /   Mixtes /___ /",0,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* les siges sont-ils sufisants ?",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"* Ya t-il un tableau d'activité avec horaire de fonctionnement indiquant les journées de :",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"consultaion de medecine génerale",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"consultaion de médecine scpécialisée",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"vaccination",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"repos hebdomadaire",0,0,'L',0,0);

// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*est-il bien visible au public ? ",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"Etat interieur et exterieur de la structure  ",0,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"l'unité est-elle : ",0,0,'L',0,0);

// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"chauffée en période hivernale avec ",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"gaz de ville  /___/  gaz butane /___ /   mazoute/___ /",0,0,'L',0,0);

// $pdf->SetXY(40,$pdf->GetY()+10);$pdf->cell(50,5,"alimentaion en eau potable en ",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"permanece  /___/  continue /___ /   discontinue/___ /",0,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*existe t-il une reserve d'eau dans l'unité ? ",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*existe t-il un eclairage de secours (groupe electrogene) ? ",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*est t-il fonctionnel ? ",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*existe t-il des moyens de lutte contre l'incendie ? ",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*sont-ils fonctionnels ? ",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*sont-ils controlés periodiquement ? ",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*environement de l'unité ? ",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"salubrité",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"les panssements souillés et autres dechets sont-ils incinerés ?",0,0,'L',0,0);
//*********************************//
// $pdf->SetFont('Arial','U',10);$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(50,5,"III/ equipements :",0,0,'L',0,0);$pdf->SetFont('Arial','',10);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*existe t-il une fiche d'inventaire de l'unité des équipements,materiels et instrument par article ? ",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"est-elle ajours",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"date du dernier inventaire",0,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*existe t-il un sous registre d'inventaire ?",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);


// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,10,"equipements",1,0,'L',0,0);       $pdf->cell(30,10,"non existants",1,0,'L',0,0);$pdf->cell(90,5,"existants",1,0,'L',0,0);
// $pdf->SetXY(95,$pdf->GetY()+5);$pdf->cell(30,5,"type",1,0,'L',0,0);               $pdf->cell(30,5,"fonctionnels",1,0,'L',0,0);$pdf->cell(30,5,"non fonctionnels",1,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"fauteuils dentaires",1,0,'L',0,0);$pdf->cell(30,5,"",1,0,'L',0,0);$pdf->cell(30,5,"",1,0,'L',0,0);$pdf->cell(30,5,"",1,0,'L',0,0);$pdf->cell(30,5,"",1,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"radiologie ",1,0,'L',0,0);        $pdf->cell(30,5,"",1,0,'L',0,0);$pdf->cell(30,5,"",1,0,'L',0,0);$pdf->cell(30,5,"",1,0,'L',0,0);$pdf->cell(30,5,"",1,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"laboratoire",1,0,'L',0,0);        $pdf->cell(30,5,"",1,0,'L',0,0);$pdf->cell(30,5,"",1,0,'L',0,0);$pdf->cell(30,5,"",1,0,'L',0,0);$pdf->cell(30,5,"",1,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"autres",1,0,'L',0,0);             $pdf->cell(30,5,"",1,0,'L',0,0);$pdf->cell(30,5,"",1,0,'L',0,0);$pdf->cell(30,5,"",1,0,'L',0,0);$pdf->cell(30,5,"",1,0,'L',0,0);


// $pdf->SetXY(15,$pdf->GetY()+15);$pdf->cell(50,5,"*mentionner la disponibilité ou l'absence de materiel et instrumentation necessaire aux consultations",0,0,'L',0,0);
// $pdf->SetXY(17,$pdf->GetY()+5);$pdf->cell(50,5,"soins urgence et activités de prevention",0,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"equipements",1,0,'L',0,0);              $pdf->cell(60,5,"Disponible",1,0,'L',0,0);$pdf->cell(60,5,"Non disponible",1,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"sthetoscope",1,0,'L',0,0);              $pdf->cell(60,5,"",1,0,'L',0,0);$pdf->cell(60,5,"",1,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"tensiometre",1,0,'L',0,0);              $pdf->cell(60,5,"",1,0,'L',0,0);$pdf->cell(60,5,"",1,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"speculum",1,0,'L',0,0);                 $pdf->cell(60,5,"",1,0,'L',0,0);$pdf->cell(60,5,"",1,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"balance",1,0,'L',0,0);                  $pdf->cell(60,5,"",1,0,'L',0,0);$pdf->cell(60,5,"",1,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"toise",1,0,'L',0,0);                    $pdf->cell(60,5,"",1,0,'L',0,0);$pdf->cell(60,5,"",1,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"marteaux a reflexe",1,0,'L',0,0);       $pdf->cell(60,5,"",1,0,'L',0,0);$pdf->cell(60,5,"",1,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"tableau d'acuité visuelle",1,0,'L',0,0);$pdf->cell(60,5,"",1,0,'L',0,0);$pdf->cell(60,5,"",1,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"otoscope",1,0,'L',0,0);                 $pdf->cell(60,5,"",1,0,'L',0,0);$pdf->cell(60,5,"",1,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"lampe de poche",1,0,'L',0,0);           $pdf->cell(60,5,"",1,0,'L',0,0);$pdf->cell(60,5,"",1,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"miroire de clarck",1,0,'L',0,0);        $pdf->cell(60,5,"",1,0,'L',0,0);$pdf->cell(60,5,"",1,0,'L',0,0);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"etc",1,0,'L',0,0);                      $pdf->cell(60,5,"",1,0,'L',0,0);$pdf->cell(60,5,"",1,0,'L',0,0);

// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*les besoins en équipements et materiels divers indispensables pour le fonctionnement de l'unité",0,0,'L',0,0);
// $pdf->SetXY(17,$pdf->GetY()+5);$pdf->cell(50,5,"*ont-ils été portés à la connaisance de l'adminstation du secteur ?",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Si Oui, quand : /__ /__ /____ /",0,0,'L',0,0);
// $pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"mesures prises",0,0,'L',0,0); 

//*********************************//
$pdf->SetFont('Arial','U',10);$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(50,5,"IV- personnels :",0,0,'L',0,0);$pdf->SetFont('Arial','',10);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*existe t-il un tableau du service pour l'ensemble du personnel affecté dans l'unité ?",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*effectif reel  des personnels /____ /",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Médecins généralistes /___/",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Chirurgiens dentistes généraliste /___/",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Médecins specialistes /___/",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"specialites : ",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Pramedicaux : AS /___/   IB/___/   IDE/___/",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Agent de services : Femmes de ménages /___/ gardiens /___/",0,0,'L',0,0);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*quels sont les horaires de travail ?",0,0,'L',0,0);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*existe t-il un registre de pointage et d'absenteisme ?",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*le personnel porte t-il la tenue reglementaire pendant le travail ?",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"tenue complete  Oui /___/  Non /___ /",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"blouse sans pantalon et sans calot Oui /___/  Non /___ /",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"la tenue est elle propre Oui /___/  Non /___ /",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"existe t-il une blanchisserie Oui /___/  Non /___ /",0,0,'L',0,0);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*le personnel est t-il stable ?",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*les agents sont-ils identifiés (blouse ou grade) ?",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->cell(50,5,"*existe t-il des badges pour le personnel ?",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"Oui /___/  Non /___ /",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"en carton Oui /___/  Non /___ /",0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(50,5,"plastifiés Oui /___/  Non /___ /",0,0,'L',0,0);



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