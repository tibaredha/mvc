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
$pdf->SetDisplayMode('fullpage','single');$pdf->SetLineWidth(0.4);
$pdf-> mysqlconnect();$query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspfr,0,1,'C');
$pdf->SetFont('aefurat', '', 10);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"EXERCICE A TITRE LIBERAL DES PRATICIENS SPECIALISTES",1,1,'C');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"FORMULAIRE (A) : A REMPLIR PAR LE MEDECIN SPECIALISTE",0,1,'L');

$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"NOM : ",0,0,'R');                          $pdf->Cell(120,5,$rowx->NOM,1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"PRENOM : ",0,0,'R');                       $pdf->Cell(120,5,$rowx->PRENOM,1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"DATE ET LIEU DE NAISSANCE : ",0,0,'R');    $pdf->Cell(120,5,$pdf->dateUS2FR($rowx->DNS)." à ".$pdf->nbrtostring('mvc','com','IDCOM',$rowx->COMMUNEN,'COMMUNE'),1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"ADRESSE : ",0,0,'R');                      $pdf->Cell(120,5,$rowx->ADRESSE,1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"TEL : ",0,0,'R');                          $pdf->Cell(120,5,$rowx->Mobile,1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"DIPLOME DE : ",0,0,'R');                   $pdf->Cell(120,5,$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"DATE D OBTENTION : ",0,0,'R');             $pdf->Cell(120,5,$pdf->dateUS2FR($rowx->DIPLOME),1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"LIEU D OBTENTION : ",0,0,'R');             $pdf->Cell(120,5,$rowx->UNIV,1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"INSTALLE EN CABINET LIBERAL A : ",0,0,'R');$pdf->Cell(120,5,"",1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"NON INSTALLE EXERCE A : ",0,0,'R');        $pdf->Cell(120,5,"",1,1,'L');

$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",1,0,'R');$pdf->Cell(190,5,"DEMANDE D'INSTALLATION EN CABINET SPECIALISE DE : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(10,5,"",1,0,'R');$pdf->Cell(190,5,"DEMANDE DE TRANSFER DE CABINET SPECIALISE DE : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(10,5,"",1,0,'R');$pdf->Cell(190,5,"DEMANDE DE FERMETURE DE CABINET SPECIALISE DE : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');

$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(40,5,"",0,0,'R');$pdf->Cell(40,5,"ACCOMPLI",0,0,'L');$pdf->Cell(10,5,"",1,0,'L');                      $pdf->SetXY(110,$pdf->GetY());$pdf->Cell(40,5,"",0,0,'R');$pdf->Cell(40,5,"ACCOMPLI",0,0,'L');$pdf->Cell(10,5,"",1,1,'L');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(40,5,"SERVICE NATIONAL",0,0,'C');$pdf->Cell(40,5,"NON ACCOMPLI",0,0,'L');$pdf->Cell(10,5,"",1,0,'L');  $pdf->SetXY(110,$pdf->GetY());$pdf->Cell(40,5,"CERVICE CIVIL",0,0,'C');$pdf->Cell(40,5,"NON ACCOMPLI",0,0,'L');$pdf->Cell(10,5,"",1,1,'L');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(40,5,"",0,0,'R');$pdf->Cell(40,5,"EXEMPTE",0,0,'L');$pdf->Cell(10,5,"",1,0,'L');                       $pdf->SetXY(110,$pdf->GetY());$pdf->Cell(40,5,"",0,0,'R');$pdf->Cell(40,5,"EXEMPTE",0,0,'L');$pdf->Cell(10,5,"",1,1,'L');

$pdf->SetXY(110,$pdf->GetY()+5);$pdf->Cell(90,5,"LIEU D'ACCOMPLISSEMENT DU SERVICE NATIONAL :",0,0,'C');
$pdf->SetXY(110,$pdf->GetY()+5);$pdf->Cell(90,5,"......................................................................................",0,0,'C');
$pdf->SetXY(110,$pdf->GetY()+5);$pdf->Cell(90,5,"......................................................................................",0,1,'C');


$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"",0,0,'R');                        $pdf->Cell(130,5,"DANS LA WILAYA DE :",0,0,'L');                    
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",1,0,'L'); $pdf->Cell(55,5,"DESIR",0,0,'C');                    $pdf->Cell(130,5,"DANS LA DAIRA DE :",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"M'INSTALLER",0,0,'C');             $pdf->Cell(130,5,"DANS LA COMMUNE :",0,0,'L');   

$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(10,5,"",0,0,'L'); $pdf->Cell(55,5,"DESIR",0,0,'C');                    $pdf->Cell(130,5,"DANS LA WILAYA DE :",0,0,'L');                    
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",1,0,'L'); $pdf->Cell(55,5,"TRANSFERER",0,0,'C');                $pdf->Cell(130,5,"DANS LA DAIRA DE :",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"MON CABINET VERS",0,0,'C');         $pdf->Cell(130,5,"DANS LA COMMUNE :",0,0,'L');   

$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(10,5,"",0,0,'L'); $pdf->Cell(55,5,"DEMANDE DE FERMETURE",0,0,'C');     $pdf->Cell(130,5,"DANS LA WILAYA DE :",0,0,'L');                    
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",1,0,'L'); $pdf->Cell(55,5,"DE MON CABINET POUR",0,0,'C');       $pdf->Cell(130,5,"DANS LA DAIRA DE :",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"POUR LES RAISONS SUIVANTES",0,0,'C');$pdf->Cell(130,5,"DANS LA COMMUNE :",0,0,'L');   

$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"---------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(100,5,"DATE DE LA DEMANDE",0,0,'C'); $pdf->Cell(95,5,"SIGNATURE DE LA DEMANDE",0,0,'C');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(100,5,$pdf->dateUS2FR($rowx->DATEDEM),0,0,'C');$pdf->Cell(95,5,"",0,0,'C');
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"---------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(100,5,"PARTIE RESERVEE A L'ADMINISTRATION ",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(100,5,"NUMERO DE LA DEMANDE : ".$rowx->NUMDEM,0,0,'L'); 



$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'Inspection santé publique',0,1,'L');$pdf->SetXY(155,$pdf->GetY()-5);$pdf->Cell(50,5,'مفتشية الصــــحة العموميـة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"N° : ___________ /".date('Y'),0,1,'L');//$pdf->SetXY(155,$pdf->GetY()-5);$pdf->Cell(50,5,'الرقم : ___________/'.date('Y'),0,1,'R');
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"PROCÉS VERBAL DE CONFORMITÉ D'UN CABINET DE MEDECINE SPECIALISÉE  ",0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->SetFont('aefurat', '', 10);$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"REF : Note N°664/MSP/DSS/SDCC du 01/12/1997 ",0,1,'C');$pdf->SetFont('aefurat', '', 12);
$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowy=mysql_fetch_object($requetey))
{
	$pdf->SetXY(40,$pdf->GetY()+10);$pdf->Cell(200,5,"Suite à l'inspection éffectuée par le praticien inspecteur,en date du : ".$pdf->dateUS2FR($rowy->DATEP),0,1,'L');
	$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Objet de la demande N° : ".$rowy->NUMD." du ".$pdf->dateUS2FR($rowy->DATED)." ",0,1,'L');
	$pdf->SetXY(20,$pdf->GetY()+5);
	if($rowy->NAT==1){$pdf->Cell(200,5,"Dans un Cadre de Transfert d'un cabinet de médecine spécialisée en ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');}
	if($rowy->NAT==2){$pdf->Cell(200,5,"Dans un Cadre d'une Instatllation d'un cabinet de médecine spécialisée en ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');"";}
	if($rowy->NAT==3){$pdf->Cell(200,5,"Dans un Cadre d'une Ouverture d'un cabinet de médecine spécialisée en ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');"";}
	$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Et compte tenu de l'état des lieux visités,à savoir : ",0,1,'L');
	$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Cabinet de consultation ",0,1,'L');$pdf->SetXY(115,$pdf->GetY()-5); $pdf->Cell(20,5,"Superficie  : ".$rowy->CDS0." M2",0,1,'L');
	$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Salle de soins ",0,1,'L');         $pdf->SetXY(115,$pdf->GetY()-5); $pdf->Cell(20,5,"Superficie  : ".$rowy->SDS0." M2",0,1,'L');
	$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Salle d'attente  : Homme",0,1,'L');$pdf->SetXY(115,$pdf->GetY()-5); $pdf->Cell(20,5,"Superficie  : ".$rowy->SAH0." M2",0,1,'L');
	$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Salle d'attente  : Femme",0,1,'L');$pdf->SetXY(115,$pdf->GetY()-5); $pdf->Cell(20,5,"Superficie  : ".$rowy->SAF0." M2",0,1,'L');
}
$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Sanitaire (cabinet de toilette et lavabos) : éxistant homme et femme ",0,1,'L');
$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Chauffage : éxistant et fonctionel.",0,0,'L');$pdf->SetXY(115,$pdf->GetY()); $pdf->Cell(200,5,"- Éclairage artificiele : suffisant.",0,1,'L');
$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Aération : suffisante.",0,0,'L');$pdf->SetXY(115,$pdf->GetY()); $pdf->Cell(200,5,"- État général : bon.",0,1,'L');
$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Éclairage naturel : suffisant.",0,0,'L');$pdf->SetXY(115,$pdf->GetY()); $pdf->Cell(200,5,"- Autres : RAS ",0,1,'L');

$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"J'atteste que le cabinet médicale de Mr/Melle/Mme : ".strtoupper($rowx->NOM).'_'.strtolower ($rowx->PRENOM),0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Situé à : ".$rowx->ADRESSE,0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Commune de : ".$pdf->nbrtostring('mvc','com','IDCOM',$rowx->COMMUNE,'COMMUNE')." Wilaya de djelfa. ",0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Est conforme a l'exercice de la profession de médecine spécialisée en ". $pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');
$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowy=mysql_fetch_object($requetey))
{
	$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Fait a Djelfa  le : ".$pdf->dateUS2FR($rowy->DATEP),0,1,'L');
}
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Le Praticien Inspecteur ",0,1,'L');
$pdf->SetXY(100,$pdf->GetY());$pdf->Cell(200,5,"Dr  TIBA ",0,1,'L');
}
$pdf->Output();
?>
