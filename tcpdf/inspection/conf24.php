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
$pdf->SetDisplayMode('fullpage','single');
$pdf->SetLineWidth(0.4);
$pdf-> mysqlconnect();
$query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
	$pdf->entetepvc("D'UN CABINET DE SAGE FEMME","Instruction N°1765/MSP/SG/ du 11 octobre 1987");

	$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	while($rowy=mysql_fetch_object($requetey))
	{
		$pdf->SetXY(40,$pdf->GetY()+10);$pdf->Cell(200,5,"Suite à l'inspection éffectuée par le praticien inspecteur,en date du : ".$pdf->dateUS2FR($rowy->DATEP),0,1,'L');
		$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Objet de la demande N° : ".$rowy->NUMD." du ".$pdf->dateUS2FR($rowy->DATED)." ",0,1,'L');
		$pdf->SetXY(20,$pdf->GetY()+5);
		if($rowy->NAT==1){$pdf->Cell(200,5,"Dans un Cadre de Transfert d'un cabinet de sage femme  ",0,1,'L');}
		if($rowy->NAT==2){$pdf->Cell(200,5,"Dans un Cadre d'une Instatllation d'un cabinet de sage femme",0,1,'L');"";}
		if($rowy->NAT==3){$pdf->Cell(200,5,"Dans un Cadre d'une Ouverture d'un cabinet de sage femme ",0,1,'L');"";}
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
	$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"J'atteste que le cabinet de Mr/Melle/Mme : ".strtoupper($rowx->NOM).'_'.strtolower ($rowx->PRENOM),0,1,'L');
	$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Situé à : ".$rowx->ADRESSE,0,1,'L');
	$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Commune de : ".$pdf->nbrtostring('mvc','com','IDCOM',$rowx->COMMUNE,'COMMUNE'),0,1,'L');
	$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Est conforme a l'exercice de la profession de sage femme. ",0,1,'L');
	$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	while($rowy=mysql_fetch_object($requetey))
	{
		$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Fait a Djelfa  le : ".$pdf->dateUS2FR($rowy->DATEP),0,1,'L');
	}
	$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Le Praticien Inspecteur ",0,1,'L');
	$pdf->SetXY(100,$pdf->GetY());$pdf->Cell(200,5,"Dr  TIBA ",0,1,'L');
	$pdf->Output("PVC_".$rowx->NOM.'_'.$rowx->PRENOM.'.pdf','I');
}
?>
