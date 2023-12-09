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
	$pdf->entetepvc("DU SIÈGE DE L'UNITE DE TRANSPORT SANITAIRE ","Arrêté n° 39 MSP/MIN du 15 septembre 1998");
	$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	while($rowy=mysql_fetch_object($requetey))
	{
		$STL=$rowy->STL;
		$DATEP=$rowy->DATEP;
		$CDS0=$rowy->CDS0;
		$SDS0=$rowy->SDS0;
		$SAH0=$rowy->SAH0;
		$NUMD=$rowy->NUMD;
		$DATED=$rowy->DATED;
	}
	$pdf->SetXY(40,$pdf->GetY()+10);$pdf->Cell(200,5,"Suite à l'inspection éffectuée par le praticien inspecteur,en date du : ".$pdf->dateUS2FR($DATEP),0,1,'L');
	$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Objet de la demande N° : ".$NUMD." du ".$pdf->dateUS2FR($DATED)." ",0,1,'L');
	$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"et compte tenu de l'état des lieux visités,à savoir : ",0,1,'L');
	$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"L'unité de transport sanitaire de ".strtoupper($rowx->NOM).'_'.strtolower ($rowx->PRENOM),0,1,'L');
	$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Situé à : ".$rowx->ADRESSE,0,1,'L');
	$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Commune de : ".$pdf->nbrtostring('mvc','com','IDCOM',$rowx->COMMUNE,'COMMUNE'),0,1,'L');
	$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Wilaya de Djelfa .",0,1,'L');
	$pdf->SetXY(25,$pdf->GetY()+5);$pdf->Cell(200,5,"- Un garage de superficie de : ".$CDS0." M2",0,1,'L');
	$pdf->SetXY(25,$pdf->GetY()+5);$pdf->Cell(200,5,"- Un bureau de réception des appels télephoniques de superficie de : ".$SDS0." M2",0,1,'L');
	$pdf->SetXY(111,$pdf->GetY()+5);$pdf->Cell(200,5,"N° de téléphone : ".$rowx->Mobile,0,1,'L');
	$pdf->SetXY(25,$pdf->GetY()+5);$pdf->Cell(200,5,"- Un lieux de stokage et de rangement du materiel,equipement médical, ",0,1,'L');
	$pdf->SetXY(24,$pdf->GetY()+5);$pdf->Cell(200,5,"consomables et produits pharmaceutiques.",0,1,'L');
	$pdf->SetXY(50,$pdf->GetY()+5);$pdf->Cell(200,5,"* Superficie : ".$SAH0." M2",0,1,'L');
	$pdf->SetXY(50,$pdf->GetY()+5);$pdf->Cell(200,5,"* Materiel disponible  : pieces de rechanges ",0,1,'L');
	$pdf->SetXY(50,$pdf->GetY()+5);$pdf->Cell(200,5,"* autres amenagements existants : néant ",0,1,'L');
	$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Autres observations : RAS ",0,1,'L');
	$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Fait a Djelfa  le : ".$pdf->dateUS2FR($DATEP),0,1,'L');
	$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Le Praticien Inspecteur ",0,1,'L');
	$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Dr  TIBA ",0,1,'L');
	$pdf->Output("PVC_".$rowx->NOM.'_'.$rowx->PRENOM.'.pdf','I');
}
?>
