<?php
$ids=$_GET["ids"]; 
$idh=$_GET["idh"];  
require_once('inspection.php');
$pdf = new inspection('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('DECISION');
$pdf->SetSubject('PROTOCOLE');
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 12);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetLineWidth(0.4);
$pdf-> mysqlconnect(); 
$query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";//
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'Inspection santé publique',0,1,'L');$pdf->SetXY(155,$pdf->GetY()-5);$pdf->Cell(50,5,'مفتشية الصــــحة العموميـة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"N° : ___________ /".date('Y'),0,1,'L');//$pdf->SetXY(155,$pdf->GetY()-5);$pdf->Cell(50,5,'الرقم : ___________/'.date('Y'),0,1,'R');
$pdf->SetFont('aefurat', '', 15);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Procés Verbal de Conformité d'un centre d'hemodialyse ",0,1,'C');
$pdf->SetFont('aefurat', '', 10);$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"REF : Arrête N°07/MSP/MIN du 25 février 1995 ",0,1,'C');$pdf->SetFont('aefurat', '', 12);
//Circulaire N°04/MSP/DSS/SDCC du 26 avril 1998  
// A/S Exercice à titre privé de la médecine au sein des cliniques et autres
// structures privées de santé dans un cadre associatif.

$nomfr=$rowx->NOM;
$prenomfr=$rowx->PRENOM;

$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Promoteur Mr : ".strtoupper($rowx->NOM).'_'.strtolower ($rowx->PRENOM),0,1,'C');$pdf->SetFont('aefurat', '', 12);
$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowy=mysql_fetch_object($requetey))
{
$STL=$rowy->STL;
$DATEP=$rowy->DATEP;
$CDS0=$rowy->CDS0;
$SDS0=$rowy->SDS0;
$SAH0=$rowy->SAH0;
$SAF0=$rowy->SAF0;
$SAN0=$rowy->SAN0;
$NUMD=$rowy->NUMD;
$DATED=$rowy->DATED;
}
$pdf->SetXY(40,$pdf->GetY()+10);$pdf->Cell(200,5,"Suite à l'inspection éffectuée par le praticien inspecteur,en date du : ".$pdf->dateUS2FR($DATEP),0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"Objet de la demande N° : ".$NUMD." du ".$pdf->dateUS2FR($DATED)." ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"et compte tenu de l'état des lieux visités,à savoir : ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"Le centre d'hemodialyse de ".strtoupper($rowx->NOM).'_'.strtolower ($rowx->PRENOM),0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"Situé à : ".$rowx->ADRESSE,0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"Commune de : ".$pdf->nbrtostring('mvc','com','IDCOM',$rowx->COMMUNE,'COMMUNE'),0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"Wilaya de Djelfa .",0,1,'L');


//Le centre d’hémodialyse est assimilé à une clinique de type ambulatoire,
//************************************************************************************************************************************************//
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"I-NORMES EN PERSONNELS .",0,1,'L');
$query_listep = "SELECT * FROM pers WHERE idt ='$ids' and  ETAT='0' and Categorie='MS' ";//
$requetep = mysql_query( $query_listep ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$tot1p=mysql_num_rows($requetep);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"- Un (01) médecin spécialiste en néphrologie directeur médicale du centre : ".$tot1p,0,1,'L');                         $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(25,$pdf->GetY());
while($rowp=mysql_fetch_object($requetep)){
	
	$pdf->SetXY(25,$pdf->GetY());
	$pdf->cell(40,06,"- ".$rowp->PRENOMFR."_".$rowp->NOMFR,0,0,'L',0);$pdf->SetXY(15,$pdf->GetY()+6); }
//************************************************************************************************************************************************//
$query_listep = "SELECT * FROM pers WHERE idt ='$ids' and  ETAT='0' and Categorie='MG' ";//
$requetep = mysql_query( $query_listep ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$tot1p=mysql_num_rows($requetep);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"- Un (01) médecin dialyseur pour 25 malades. reconnu compétent en hémodialyse : ".$tot1p,0,1,'L');                     $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(25,$pdf->GetY());
while($rowp=mysql_fetch_object($requetep)){$pdf->SetXY(25,$pdf->GetY());$pdf->cell(40,06,"- ".$rowp->PRENOMFR."_".$rowp->NOMFR,0,0,'L',0);$pdf->SetXY(15,$pdf->GetY()+5); }
//************************************************************************************************************************************************//
$query_listep = "SELECT * FROM pers WHERE idt ='$ids' and  ETAT='0' and Categorie='P' ";//
$requetep = mysql_query( $query_listep ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$tot1p=mysql_num_rows($requetep);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"- Un (01) agent paramédical pour trois (03) machines d'hémodialyse fonctionnelles : ".$tot1p,0,1,'L');                 $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(25,$pdf->GetY());
while($rowp=mysql_fetch_object($requetep)){$pdf->SetXY(25,$pdf->GetY());$pdf->cell(40,06,"- ".$rowp->PRENOMFR."_".$rowp->NOMFR,0,0,'L',0);$pdf->SetXY(15,$pdf->GetY()+5); }
//************************************************************************************************************************************************//
$query_listep = "SELECT * FROM pers WHERE idt ='$ids' and  ETAT='0' and Categorie='TDM' ";//
$requetep = mysql_query( $query_listep ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$tot1p=mysql_num_rows($requetep);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"- Un (01) technicien de maintenance  : ".$tot1p,0,1,'L');          $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(25,$pdf->GetY());/// un contrat établi avec une société de maintenance
while($rowp=mysql_fetch_object($requetep)){$pdf->cell(40,06,"*".$rowp->NOMFR."_".$rowp->PRENOMFR,0,0,'L',0);$pdf->SetXY(15,$pdf->GetY()+5); }
//************************************************************************************************************************************************//
$query_listep = "SELECT * FROM pers WHERE idt ='$ids' and  ETAT='0' and Categorie='ADH' ";//
$requetep = mysql_query( $query_listep ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$tot1p=mysql_num_rows($requetep);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"- Un (01) agent d'hygiène pour une salle de (04) machines : ".$tot1p,0,1,'L');                                         $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(25,$pdf->GetY());
while($rowp=mysql_fetch_object($requetep)){$pdf->cell(40,06,"*".$rowp->NOMFR."_".$rowp->PRENOMFR,0,0,'L',0);$pdf->SetXY(15,$pdf->GetY()+6); }
//************************************************************************************************************************************************//
$query_listep = "SELECT * FROM pers WHERE idt ='$ids' and  ETAT='0' and Categorie='ADS' ";//
$requetep = mysql_query( $query_listep ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$tot1p=mysql_num_rows($requetep);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"- Un (01) agent de sécurité. : ".$tot1p,0,1,'L');                                                                      $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(25,$pdf->GetY());
while($rowp=mysql_fetch_object($requetep)){$pdf->cell(40,06,"*".$rowp->NOMFR."_".$rowp->PRENOMFR,0,0,'L',0);$pdf->SetXY(15,$pdf->GetY()+6); }
//************************************************************************************************************************************************//

$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,$pdf->GetY()+10);$pdf->Cell(200,5,"II-NORMES EN LOCAUX .",0,1,'L');
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"1-Le centre d'hémodialyse obéir aux normes générales suivantes en matière des locaux :",0,1,'L');                                              $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
	$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"* Situés dans un environnement sain et ne présentant pas de danger pour la sécurité des malades.",0,1,'L');                  
	$pdf->SetXY(20,$pdf->GetY());$pdf->Cell(200,5,"* Dotés d'une climatisation et d'installation technique agréées par le MSPRH.",0,1,'L');
	$pdf->SetXY(20,$pdf->GetY());$pdf->Cell(200,5,"* Répond aux normes de sécurité conformément aux prescriptions des services de la protection civile.",0,1,'L');             
	$pdf->SetXY(20,$pdf->GetY());$pdf->Cell(200,5,"* Les locaux sont suffisamment spacieux pour la circulation des personnes et des équipements..",0,1,'L');                   
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"2-Une ou plusieurs salles d'hémodialyse ayant au minimum une superficie de 6 m²/PDD : ".$CDS0." m2",0,1,'L');                                                $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"3-Deux (02) cabinets de toilettes au minimum sont mis à la dispositions des malades : ".$SDS0." m2",0,1,'L');                                              $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"4-Une salle de repos et d'urgence de deux lits, équipée de (S/d'O2 + S/d'aspiration) : ".$SAH0." m2",0,1,'L');                            $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"5-Une salle d'isolement pour malades porteurs d'une maladie transmissible par le sang : ".$SAF0." m2",0,1,'L');                                            $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"6-Un local pour la station de traitement de l'eau : ".$SAN0." m2",0,1,'L');                                                                                $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"7-Une salle de stérilisation :",0,1,'L');                                                                                                     $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"8-Une salle de stockage des médicaments, des filtres et du liquide de dialyse :",0,1,'L');                                                    $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"9-Une salle équipée pour les examens biologiques :",0,1,'L');                                                                                 $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);


$pdf->SetXY(10,$pdf->GetY()+10);$pdf->Cell(200,5,"III-NORMES EN EQUIPEMENTS .",0,1,'L');
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"1-La capacité du centre d'hémodialyse : N = entre(05) et (12) appareils d'hémodialyse :",0,1,'L');                                            $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);


$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"2-Le centre d'hémodialyse dispose d'un appareil de réserve : 1 si inf a 6 / 2 si sup a 6",0,1,'L');                                                                                                $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
// $pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"* pour une capacité ne dépassant pas six (06).",0,1,'L');                  
// $pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*et de deux (02) appareils de réserve pour une capacité supérieure à six (06).",0,1,'L');                  

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"3-Les machines d'hémodialyses fonctionnent avec des filtres de type capillaire ou plaques :",0,1,'L');                                        $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+3);$pdf->Cell(200,5,"4-Les machines d'hémodialyses comportent des accessoires de sécurité minimum :",0,1,'L');                                   
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*Une pompe à sang.",0,1,'L');                                                                                                                 $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);                 
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*Un détecteur d'hémoglobine.",0,1,'L');                                                                                                       $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);                 
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*Un manomètre de mesure de la pression veineuse.",0,1,'L');                                                                                   $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);                 
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*Un détecteur de niveau d'eau.",0,1,'L');                                                                                                     $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);                 
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*Un électroclamp automatique.",0,1,'L');                                                                                                      $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);                 
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*Un système de stérilisation chimique et thermique.",0,1,'L');                                                                                $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);

$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"5-Les machines d'hémodiafiltration comportent des accessoires de sécurité minimum :",0,1,'L'); 
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*Une pompe à sang.",0,1,'L');                                                                                                                 $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);                 
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*Un détecteur d'hémoglobine.",0,1,'L');                                                                                                       $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);                 
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*Un manomètre de mesure de la pression veineuse.",0,1,'L');                                                                                   $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);                 
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*Un détecteur de niveau d'eau.",0,1,'L');                                                                                                     $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);                 
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*Un électroclamp automatique.",0,1,'L');                                                                                                      $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);                 
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*Un système de stérilisation chimique et thermique.",0,1,'L');                                                                                $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"6-La centrale de traitement d'eau comporte :",0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*deux (02) adoucisseurs.",0,1,'L');                                                                $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*deux (02) appareils d'osmose inverse.",0,1,'L');                                                  $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*une (01) boucle de recirculation.",0,1,'L');                                                      $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*des baches de réserve d'eau SONEDE en amont.",0,1,'L');                                           $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*des baches d'eau traitée en aval.",0,1,'L');                                                      $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+3);$pdf->Cell(200,5,"7-un autoclave pour quatre machines d'hémodialyse.",0,1,'L');                                      $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+3);$pdf->Cell(200,5,"8-un matériel d'intubation.",0,1,'L');                                                             $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+3);$pdf->Cell(200,5,"9-un groupe électrogène de secours.",0,1,'L');                                                     $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+3);$pdf->Cell(200,5,"10-une source d'oxygène pour chaque poste d'hémodialyse.",0,1,'L');                                $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+3);$pdf->Cell(200,5,"11-un dispositif d'aspiration fixe ou mobile.",0,1,'L');                                           $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+3);$pdf->Cell(200,5,"12-des lits articulés permettant la position de trandelenbourg.",0,1,'L');                         $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+3);$pdf->Cell(200,5,"13-un chariot d'urgence comportant au minimum : un défibrillateurun cardioscope.",0,1,'L');        $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+3);$pdf->Cell(200,5,"14-balance pour peser les patients.",0,1,'L');                                                     $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+3);$pdf->Cell(200,5,"15-une ambulance équipée/un contrat établi par un service de transport sanitaire privé.",0,1,'L'); $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(15,$pdf->GetY()+3);$pdf->Cell(200,5,"16-Le centre d'hémodialyse assure au minimum, les examens biologiques suivants : ",0,1,'L');       $pdf->SetXY(180,$pdf->GetY()-5); $pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*urée sanguine.",0,1,'L');// , sauf si ceux-ci sont sous traités.
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*créatinémie.",0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*calcémie.",0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(200,5,"*phosphorémie.",0,1,'L');

$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,$pdf->GetY()+10);$pdf->Cell(200,5,"IV-NORMES REQUISES POUR L'EAU UTILISEE EN HEMODIALYSE .",0,1,'L');

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"1-La qualité du traitement de l'eau destinée à l'hémodialyse analyses physico-chimiques :",0,1,'L');                                            
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"Désignation",0,0,'C',1,0);               $pdf->Cell(50,5,"Resultat",0,0,'C',1,0);$pdf->Cell(50,5,"Taux maximums tolérés",0,0,'C',1,0);$pdf->Cell(20,5,"Tolerance",0,1,'C',1,0);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"1-Calcium.*",0,0,'L');                      $pdf->Cell(50,5,"",0,0,'C');$pdf->Cell(50,5,"02,000 mg/1",0,0,'C');$pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"2-Magnésium.",0,0,'L');                     $pdf->Cell(50,5,"",0,0,'C');$pdf->Cell(50,5,"01,200 mg/1",0,0,'C');$pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"3-Aluminium.*",0,0,'L');                    $pdf->Cell(50,5,"",0,0,'C');$pdf->Cell(50,5,"00,010 mg/5",0,0,'C');$pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"4-Sulfates.",0,0,'L');                      $pdf->Cell(50,5,"",0,0,'C');$pdf->Cell(50,5,"05,000 mg/1",0,0,'C');$pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"5-Nitrates.",0,0,'L');                      $pdf->Cell(50,5,"",0,0,'C');$pdf->Cell(50,5,"00,200 mg/5",0,0,'C');$pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"6-Fluorures.",0,0,'L');                     $pdf->Cell(50,5,"",0,0,'C');$pdf->Cell(50,5,"00.500 mg/1",0,0,'C');$pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"7-Amonium.",0,0,'L');                       $pdf->Cell(50,5,"",0,0,'C');$pdf->Cell(50,5,"00,200 mg/1",0,0,'C');$pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"8-Sodium.",0,0,'L');                        $pdf->Cell(50,5,"",0,0,'C');$pdf->Cell(50,5,"05,000 mg/1",0,0,'C');$pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"9-Potassium.",0,0,'L');                     $pdf->Cell(50,5,"",0,0,'C');$pdf->Cell(50,5,"02,000 mg/1",0,0,'C');$pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"10-Chlorures.",0,0,'L');                    $pdf->Cell(50,5,"",0,0,'C');$pdf->Cell(50,5,"50,000 mg/1",0,0,'C');$pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"11-Zinc.",0,0,'L');                         $pdf->Cell(50,5,"",0,0,'C');$pdf->Cell(50,5,"00,050 mg/1",0,0,'C');$pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"12-Étain.",0,0,'L');                        $pdf->Cell(50,5,"",0,0,'C');$pdf->Cell(50,5,"00,100 mg/1",0,0,'C');$pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"13-Mercure.",0,0,'L');                      $pdf->Cell(50,5,"",0,0,'C');$pdf->Cell(50,5,"00,004 mg/1",0,0,'C');$pdf->Cell(20,5,"Oui",0,1,'C',1,1); 

$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,"2-La qualité du traitement de l'eau destinée à l'hémodialyse analyses bactériologiques :",0,1,'L');                                            
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"Désignation",0,0,'C',1,0);               $pdf->Cell(50,5,"Resultat",0,0,'C',1,0);$pdf->Cell(50,5,"Taux maximums tolérés",0,0,'C',1,0);$pdf->Cell(20,5,"Tolerance",0,1,'C',1,0);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"1-ESCHERICHIA COLI.",0,0,'L');                     $pdf->Cell(50,5,"",0,0,'C');$pdf->Cell(50,5,"***",0,0,'C');$pdf->Cell(20,5,"Oui",0,1,'C',1,1);
$pdf->SetXY(20,$pdf->GetY()+3);$pdf->Cell(50,5,"2-AUTRES.",0,0,'L');                     $pdf->Cell(50,5,"",0,0,'C');$pdf->Cell(50,5,"***",0,0,'C');$pdf->Cell(20,5,"Oui",0,1,'C',1,1);
// PrÈlever les Èchantillons et les transmettre au
// laboratoire conformÈment ‡ la mÈthode de dÈnombrement
// des micro-organismes sur milieu de culture. 

// d'organismes coliformes                  dÈnombrement    x/100 ml d'Èchantillon.
// d'organismes coliformes thermotolÈrants       x/100 ml d'Èchantillon.
// d'escherichia coli prÈsumÈs                   x/100 ml d'Èchantillon.
// des bactÈries sulfito-rÈductrices 
// Pseudomonas aeruginosa   250m


// Coliformes totaux / 100 ml
// Coliformes fécaux / 100
// Streptocoques fécaux / 100 ml






 // La qualité du traitement de l’eau doit être contrôlée tous les trimestres par des analyses bactériologiques et physico-chimiques(en particulier de dosage du calcium et de l’aluminium) qui doivent être effectuées dans un laboratoire agrée.



// Le nombre de patients qui y sont traités de façon périodique ne peut dépasser soixante (60). 

// Une garde médicale et paramédicale doit être assurée le personnel y exerçant


// $pdf->SetXY(25,$pdf->GetY()+5);$pdf->Cell(200,5,"- Un garage de superficie de : ".$CDS0." M2",0,1,'L');
// $pdf->SetXY(25,$pdf->GetY()+5);$pdf->Cell(200,5,"- Un bureau de réception des appels télephoniques de superficie de : ".$SDS0." M2",0,1,'L');
// $pdf->SetXY(111,$pdf->GetY()+5);$pdf->Cell(200,5,"N° de téléphone : ".$rowx->Mobile,0,1,'L');
// $pdf->SetXY(25,$pdf->GetY()+5);$pdf->Cell(200,5,"- Un lieux de stokage et de rangement du materiel,equipement médical, ",0,1,'L');
// $pdf->SetXY(24,$pdf->GetY()+5);$pdf->Cell(200,5,"consomables et produits pharmaceutiques.",0,1,'L');
// $pdf->SetXY(50,$pdf->GetY()+5);$pdf->Cell(200,5,"* Superficie : ".$SAH0." M2",0,1,'L');
// $pdf->SetXY(50,$pdf->GetY()+5);$pdf->Cell(200,5,"* Materiel disponible  : pieces de rechanges ",0,1,'L');
// $pdf->SetXY(50,$pdf->GetY()+5);$pdf->Cell(200,5,"* autres amenagements existants : néant ",0,1,'L');
// $pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Autres observations : RAS ",0,1,'L');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Fait a Djelfa  le : ".$pdf->dateUS2FR($DATEP),0,1,'L');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Le Praticien Inspecteur ",0,1,'L');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Dr  TIBA ",0,1,'L');
}
$pdf->Output($nomfr.'_'.$prenomfr.'.pdf','I');
?>
