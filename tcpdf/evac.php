<?php
require('PDF0.php');
$pdf = new PDF0( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage('p','A4');
$pdf->SetDisplayMode('fullpage','two');//mode d affichage
$pdf->SetFont('aefurat','B',12);
$pdf->RoundedRect(4, 3, 202, 30, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect(5, 4, 202, 30, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect(4, 45, 202, 240, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect(5, 46, 202, 240, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(50,5,"Minstére de la Santé de la Population et de réforme hospitaliére ");
$pdf->Text(50,10,"Direction de la Santé et de la Population de la Wilaya de Djelfa ");
$pdf->Text(65,15,"Etablissement public hospitalier d'Ain oussera  ");
$pdf->SetFont('aefurat','B',16);
$pdf->Text(40,23,"Fiche D'évacuation De Malade Entre Etablissement De Santé  ");
$pdf->SetFont('aefurat','B',14);
$pdf->Text(5,50,"Identification de l'établissement évacuateur : EPH AIN OUSSERA WILAYA DE DJELFA ");
$pdf->Text(5,60,"Date : ".$_POST['DATESORTI']);                     $pdf->Text(50,60," Heurs de départ : ".$_POST['HEURESORTI']);
$pdf->Text(5,70,"Identification du service évacuateur:"); 
$pdf->Text(5,80,"identification du médecin évacuateur: DR TIBA");
$pdf->Text(70,90,"Renseignement sur le malade  ");
$pdf->Text(5,100,"Nom :");
$pdf->Text(5,110,"Prénom :");
$pdf->Text(5,120,"Nom de l'épouse : ");
$pdf->Text(5,130,"Date et lieu de naissance :");   $pdf->Text(80,130," à:");
$pdf->Text(5,140,"Adresse : ");                    $pdf->Text(80,140,"Wilaya:  ");
$pdf->Text(5,150,"Caise de sécurité : ");          $pdf->Text(80,150," N° d'immatriculation: ");
$pdf->Text(5,160,"Autre : ");
$pdf->Text(5,170,"Renseingnement cliniques : ");
$pdf->Text(5,190,"Préstation dispensées : ");
$pdf->Text(5,200,"Motif d'évacuation: ");
$pdf->Text(5,210,"Identification de l'établissement d'acceuil : ");
$pdf->Text(5,220,"Moyens d'évacuation  : ");
$pdf->Text(5,230,"Identification de ou des accompagnateurs et signature :  ");
$pdf->Text(90,240,"Signatures "); 
$pdf->Text(8,250,"Le médecin  ");  $pdf->Text(80,250,"Le directeur de l'établissement : ");$pdf->Text(160,250,"l'Auxiliaire médical: ");
$pdf->Text(8,255,"Dr TIBA  ");
$pdf->SetFont('aefurat','B',14);
$pdf->SetTextColor(225,0,0);
$IDDNR=$_POST['IDDNR'];
$pdf->mysqlconnect();
$query = "select * from pat WHERE  id = '$IDDNR'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->Text(19,100,$result->NOM);
$pdf->Text(24,110,$result->PRENOM);
$pdf->Text(57,130,$result->DATENAISSANCE);
$pdf->Text(86,130,$pdf->nbrtostring("mvc","com","IDCOM",$result->COMMUNE,"COMMUNE")." wilaya de : ".$pdf->nbrtostring("mvc","wil","IDWIL",$result->WILAYA,"WILAYAS"));
$pdf->Text(25,140,$pdf->nbrtostring("mvc","com","IDCOM",$result->COMMUNER,"COMMUNE"));
$pdf->Text(97,140,$pdf->nbrtostring("mvc","wil","IDWIL",$result->WILAYAR,"WILAYAS"));
$pdf->Text(42,150,$_POST['CAISE']);$pdf->Text(126,150,$_POST['NSS']);
}
$pdf->Text(62,170,$_POST['DGC']);
$pdf->Text(50,190,$_POST['PRD']);
$pdf->Text(50,200,$_POST['MEVAC']);
$pdf->Text(85,70,$pdf->nbrtostring("mvc","SERVICE","ids",$_POST['SERVICE'],"servicefr")); 
$pdf->Text(92,210,$_POST['ETAACC']);
$pdf->Text(52,220,"Ambulance ");// 
$pdf->Text(115,230,$_POST['ACCOMP']);
$pdf->SetTextColor(0,0,0);
//2EME PAGE
$pdf->AddPage('p','A4');
$pdf->RoundedRect(4, 5, 202, 285, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect(5, 6, 202, 285, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('aefurat','B',12);
$pdf->Text(55,10,"République Algerienne Démocratique et Populaire "); 
$pdf->Text(40,20,"Ministére de la Santé de la Population et de la Réforme Hospitaliére"); 
$pdf->SetFont('aefurat','B',14);
$pdf->Text(55,35,"FICHE DE RECEPTION DE MALADE "); 
$pdf->SetFont('aefurat','B',14);
$pdf->Text(5,50,"Identification de l'établissement d'accueil :------------------------------------------------------------------"); 
$pdf->Text(5,60,"----------------------------------------------------------------------------------------------------------------------"); 
$pdf->Text(5,70,"----------------------------------------------------------------------------------------------------------------------"); 
$pdf->Text(5,80,"----------------------------------------------------------------------------------------------------------------------"); 
$pdf->Text(5,90,"Date :------------------------------------------------"); 
$pdf->Text(95,90,"Heure d'arrivée du malade évacué :-------------------"); 
$pdf->Text(5,100,"Identification du service d'accueil :------------------------------------------------------------------------------"); 
$pdf->Text(5,110,"Identification du médecin d'accueil :----------------------------------------------------------------------------"); 
$pdf->Text(65,120,"Renseignement sur le malade "); 
$pdf->Text(5,130,"Nom: ");                   $pdf->Text(100,130,"Prénom:"); 
$pdf->Text(5,140,"Date et lieu de naissance:");  
$pdf->Text(5,150,"Adresse :"); 
$pdf->Text(5,160,"Etat du malade a l'arrivée : Vivant  -------------");  $pdf->Text(150,160,"Décédé -----------"); 
$pdf->Text(65,180,"Signature de l'étalibssement d'accueil "); 
$pdf->Text(5,190,"Le médecin ");         $pdf->Text(160,190,"Le surveillant "); 
$pdf->Text(90,210,"Le Directeur");  
$pdf->mysqlconnect();
$query1 = "select * from pat WHERE  id = '$IDDNR'    ";
$resultat1=mysql_query($query1);
while($result1=mysql_fetch_object($resultat1))
{
$pdf->SetTextColor(225,0,0);
$pdf->Text(18,130,$result1->NOM);
$pdf->Text(118,130,$result1->PRENOM);
$pdf->Text(58,140,$result1->DATENAISSANCE);
$pdf->Text(90,140,"A: ".$pdf->nbrtostring("mvc","com","IDCOM",$result1->COMMUNE,"COMMUNE")." wilaya de : ".$pdf->nbrtostring("mvc","wil","IDWIL",$result1->WILAYA,"WILAYAS"));
$pdf->Text(25,150,$pdf->nbrtostring("mvc","com","IDCOM",$result1->COMMUNER,"COMMUNE")." wilaya de : ".$pdf->nbrtostring("mvc","wil","IDWIL",$result1->WILAYAR,"WILAYAS"));
$pdf->SetTextColor(0,0,0);
}
$pdf->Output();
?>



