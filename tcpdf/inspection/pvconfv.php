<?php
$id=$_GET["uc"]; 
require_once('inspection.php');
$pdf = new inspection('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('pv conformite vehicule');
$pdf->SetSubject('PROTOCOLE');
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 12);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->AddPage();
$pdf->SetLineWidth(0.4);
$pdf-> mysqlconnect(); 
$query_listex = "SELECT * FROM auto WHERE id  ='$id' ";//
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE ',0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ',0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA',0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'INSPECTION SANTE PUBLIQUE',0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"N ..... / ".date('Y'),0,1,'L');
$pdf->SetFont('aefurat', '', 15);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Procés-Verbal de Conformité du véhicule de categorie (".$rowx->Categorie.")",0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"de l'unite de transport santaire de Mr : ".$pdf->nbrtostring('mvc','structure','id',$rowx->idt,'NOM').'_'.strtolower ($pdf->nbrtostring('mvc','structure','id',$rowx->idt,'PRENOM')),0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(20,$pdf->GetY()+10);$pdf->Cell(200,5,"Suite à l'inspection éffectuée par le praticien inspecteur,en date du : ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"et compte tenu de l'état du véhicule visité: ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"- Marque : ".$rowx->Marque,0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"- Immatriculation : ".$rowx->Immatri,0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"- Couleur : blanche",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"- Nombre de sièges : ".$rowx->sieges,0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);
$pdf->Cell(20,5,"- Energie :  ",0,0,'L');
$pdf->Cell(21,5,"- Essence : ",0,0,'L');if ($rowx->ess==1){$pdf->Cell(5,5,"X",1,0,'L');}else{$pdf->Cell(5,5,"",1,0,'L');} 
$pdf->Cell(18,5,"- Diesel : ",0,0,'L'); if ($rowx->die==1){$pdf->Cell(5,5,"X",1,0,'L');}else{$pdf->Cell(5,5,"",1,0,'L');} 
$pdf->Cell(15,5,"- GPL : ",0,0,'L');    if ($rowx->gaz==1){$pdf->Cell(5,5,"X",1,1,'L');}else{$pdf->Cell(5,5,"",1,1,'L');} 
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"- Carrosserie entièrement rigide : Oui  ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"- le véhicule contient le nécessaire de secourisme d'urgence : Oui ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"- il est revètu d'un croissant bleu,de la catégorie du transport sanitaire, du N° de télephone,adresse : Oui",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"- il est muni d'un dispositifs sonores  et lumineux en timbre et en feu spéciaux  : Oui ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"- il est équipé de ceinture de securité et enrouleur aux places avant et arriere : Oui ",0,1,'L');
if ($rowx->Categorie == trim("C"))
{
// $pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"- il est équipé de ceinture de securité et enrouleur aux places avant et arriere : Oui / Non",0,1,'L');

} 
else 
{
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"- La cellule de conduite du véhicule est séparée de la cellule sanitaire par une cloison fixe : Oui  ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"- La cellule sanitaire offre les dimensions minimales : ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"* Longueur : 02 mètres au niveau du plan brancard  : Oui ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"* Largeur : 1,10 mètres à hauteur du siège de l'accompagnateur : Oui ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"* Hauteur : 0,95 mètre au dessus du plan du brancard : Oui / Non",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"* les revètements intérieurs des parois doivent etre lisses Ces revêtements, ainsi que ceux du sol ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"  et des sièges doivent être lavable et résistant aux procédes usuels de désinfection : Oui ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"* la cellule sanitaire s'ouvre aisément par l'arrière pour permettre les manœuvres de brancardage ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"* elle dispose d'un système spécial de ventilation de chauffage et d'un dispositif d'éclairage  ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"  independant de la cellule de conduite : Oui ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"* elle contient un poste d'oxygénotherapie mobile,comprenant 02 bouteilles d'oxygène ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"  de 01 mètre cube normobare chacune portables  dont l'une au moins, aisément accessible , ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"  est munie d'un débimètre gradué en litre d'oxygène par minute faisant corps avec un  mano-détendeur  : Oui ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"* Un dispositif fixe permettant de recevoir un flacon de perfusion de 0,500 litres : Oui ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"* Un nécessaire de secourisme d'urgence : Oui ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"* La roue de secours, ainsi que le matériel de réparation et d'entretien doivent",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"  être placés hors de la cellule sanitaire : Oui ",0,1,'L');
}
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"Autres observations : RAS ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"j'atteste que le véhicule immatriculé et appartenant  a l'unité de transport sanitaire ".$pdf->nbrtostring('mvc','structure','id',$rowx->idt,'NOM').'_'.strtolower ($pdf->nbrtostring('mvc','structure','id',$rowx->idt,'PRENOM')),0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"Situé à : ".$pdf->nbrtostring('mvc','structure','id',$rowx->idt,'ADRESSE'),0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"Commune de : ".$pdf->nbrtostring('mvc','com','IDCOM',$pdf->nbrtostring('mvc','structure','id',$rowx->idt,'COMMUNE'),'COMMUNE'),0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(200,5,"Est conforme aux normes concernant les véhicules santaires de categorie (".$rowx->Categorie.").",0,1,'L');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Fait a Djelfa  le : ",0,1,'L');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Le Praticien Inspecteur ",0,1,'L');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Dr  TIBA ",0,1,'L');
}
$pdf->Output();
?>
