<?php
$id=$_GET["uc"]; 
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
$query_listex = "SELECT * FROM structure WHERE id  ='$id' ";//
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'Inspection santé publique',0,1,'L');$pdf->SetXY(155,$pdf->GetY()-5);$pdf->Cell(50,5,'مفتشية الصــــحة العموميـة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"N° : ___________ /".date('Y'),0,1,'L');//$pdf->SetXY(155,$pdf->GetY()-5);$pdf->Cell(50,5,'الرقم : ___________/'.date('Y'),0,1,'R');



$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"PROCÉS VERBAL DE CONFORMITÉ D'UN CABINET DE CHIRURGIE DENTAIRE ",0,1,'C');$pdf->SetFont('aefurat', '', 12);

$pdf->SetXY(40,$pdf->GetY()+10);$pdf->Cell(200,5,"Suite à l'inspection éffectuée par le praticien inspecteur,en date du : ".$_POST["DATEP"],0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"et compte tenu de l'état des lieux visités,à savoir :",0,1,'L');
$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Cabinet de soins et de consultation ",0,1,'L');$pdf->SetXY(115,$pdf->GetY()-5); $pdf->Cell(20,5,"Superficie  : ".$_POST["CDS"]." M2",0,1,'L');
$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Salle de stérilisation ",0,1,'L');             $pdf->SetXY(115,$pdf->GetY()-5); $pdf->Cell(20,5,"Superficie  : ".$_POST["SDS"]." M2",0,1,'L');
$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Salle d'attente  : Homme",0,1,'L');            $pdf->SetXY(115,$pdf->GetY()-5); $pdf->Cell(20,5,"Superficie  : ".$_POST["SAH"]." M2",0,1,'L');
$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Salle d'attente  : Femme",0,1,'L');            $pdf->SetXY(115,$pdf->GetY()-5); $pdf->Cell(20,5,"Superficie  : ".$_POST["SAF"]." M2",0,1,'L');
$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Sanitaire (cabinet de toilette et lavabos) : éxistant homme et femme ",0,1,'L');
$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Chauffage : éxistant et fonctionel.",0,1,'L');
$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Aération : suffisante.",0,1,'L');
$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Éclairage naturel : suffisant.",0,1,'L');
$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Éclairage artificiele : suffisant.",0,1,'L');
$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- État général : bon.",0,1,'L');
$pdf->SetXY(30,$pdf->GetY()+5); $pdf->Cell(200,5,"- Autres : RAS ",0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"J'atteste que le cabinet médicale de Mr : ".strtoupper($rowx->NOM).'_'.strtolower ($rowx->PRENOM),0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Situé à : ".$rowx->ADRESSE,0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Commune de : ".$pdf->nbrtostring('mvc','com','IDCOM',$rowx->COMMUNE,'COMMUNE'),0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Est conforme a l'exercice de la profession de chirurgie dentaire ",0,1,'L');

$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Fait a Djelfa  le : ".$_POST["DATEP"],0,1,'L');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Le Praticien Inspecteur ",0,1,'L');
$pdf->SetXY(100,$pdf->GetY());$pdf->Cell(200,5,"Dr  TIBA ",0,1,'L');
}
$pdf->Output();
?>
