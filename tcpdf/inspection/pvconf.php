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


$pdf->SetFont('aefurat', '', 15);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Procés Verbal de Conformité du siège de l'unite de transport sanitaire ",0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Mr : ".strtoupper($rowx->NOM).'_'.strtolower ($rowx->PRENOM),0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(40,$pdf->GetY()+10);$pdf->Cell(200,5,"Suite à l'inspection éffectuée par le praticien inspecteur,en date du : ".$_POST["DATEP"],0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"et compte tenu de l'état des lieux visités,à savoir : ",0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"L'unité de transport sanitaire de ".strtoupper($rowx->NOM).'_'.strtolower ($rowx->PRENOM),0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Situé à : ".$rowx->ADRESSE,0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Commune de : ".$pdf->nbrtostring('mvc','com','IDCOM',$rowx->COMMUNE,'COMMUNE'),0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Wilaya de Djelfa .",0,1,'L');
$pdf->SetXY(25,$pdf->GetY()+5);$pdf->Cell(200,5,"- Un garage de superficie de : ".$_POST["GRG"]." M2",0,1,'L');
$pdf->SetXY(25,$pdf->GetY()+5);$pdf->Cell(200,5,"- Un bureau de réception des appels télephoniques de superficie de : ".$_POST["BRE"]." M2",0,1,'L');
$pdf->SetXY(111,$pdf->GetY()+5);$pdf->Cell(200,5,"N° de téléphone : ".$rowx->Mobile,0,1,'L');
$pdf->SetXY(25,$pdf->GetY()+5);$pdf->Cell(200,5,"- Un lieux de stokage et de rangement du materiel,equipement médical, ",0,1,'L');
$pdf->SetXY(24,$pdf->GetY()+5);$pdf->Cell(200,5,"consomables et produits pharmaceutiques.",0,1,'L');
$pdf->SetXY(50,$pdf->GetY()+5);$pdf->Cell(200,5,"* Superficie : ".$_POST["SDS"]." M2",0,1,'L');
$pdf->SetXY(50,$pdf->GetY()+5);$pdf->Cell(200,5,"* Materiel disponible  : pieces de rechanges ",0,1,'L');
$pdf->SetXY(50,$pdf->GetY()+5);$pdf->Cell(200,5,"* autres amenagements existants : néant ",0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(200,5,"Autres observations : RAS ",0,1,'L');



$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Fait a Djelfa  le : ".$_POST["DATEP"],0,1,'L');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Le Praticien Inspecteur ",0,1,'L');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Dr  TIBA ",0,1,'L');
}
$pdf->Output();
?>
