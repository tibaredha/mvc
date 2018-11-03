<?php
require('INSPECTION1.php');
$pdf = new INSPECTION1( 'P', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$idt=$_GET['uc'];

$date=date("d-m-y");
// $pdf->setfillcolor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
// $pdf->SetTextColor(0,0,0);//text noire

$pdf->AddPage('P','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Times', 'B', 10); 
$pdf->Text(90-35,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(70-35,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ");
$pdf->Text(75-35,20,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA");

$pdf->Text(240,25," LE : ".date('d-m-Y'));
$pdf->Text(05,30,"INSPECTION SANTE PUBLIQUE");
$pdf->Text(05,35,"N ... /".date('Y'));
$pdf->mysqlconnect();
mysql_query("SET NAMES 'UTF8' ");
$query = "SELECT * FROM auto ";//      where idt=$idt ORDER BY Categorie 
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
// .$row->AUCTRL
}
$pdf->Text(60,35,"procés verbal de conformité du véhicule de categorie () ");
$pdf->Text(60,40,"  " );

$pdf->Text(20,60," suite a l'inspection sffectuée par Mr l'inspecteur en date du " );
$pdf->Text(5,70," et compte tenu de l'état du véhicule visité,a savoir : " );
$pdf->Text(5,80,"marque : " );
$pdf->Text(5,90,"immatriculation: : " );
$pdf->Text(5,100,"couleur : " );
$pdf->Text(5,110,"nombre de sieges : " );
$pdf->Text(5,120,"energie : " );
$pdf->Text(5,130,"la carrosserie est entierement regide : " );
$pdf->Text(5,140,"le vehicule contient le necessaire de secourisme : " );
$pdf->Text(5,150," : " );
$pdf->Text(5,160,"il est muni d'un dispositif sonore et de feux speciaux : " );
$pdf->Text(5,170,"il est équipé de ceintures de securité   et enrouleures aux places avant et arriere " );
$pdf->Text(5,180,"autres observations " );


$pdf->Text(5,190,"j'atteste que le véhicule immatriculé et appartenant  a l'unité de transport sanitaire  " );
$pdf->Text(5,200,"sise a  : " );
$pdf->Text(5,210,"commune de  " );
$pdf->Text(5,220,"wilaya de djelfa  " );
$pdf->Text(5,230,"est conforme aux normes algeriennes concernant les véhicules santaires légers de categorie () de l'exercice  " );
$pdf->Text(5,240,"de l'activité sanitaire " );
$pdf->Text(5,250,"signature" );

// $pdf->Text(60,40,"Du  ".date("d-m-Y"));

// $h=50;
// $pdf->SetFillColor(200 );
// $pdf->SetXY(05,$h);
// $pdf->cell(20,10,"Date",1,0,1,'C',0);
// $pdf->cell(30,10,"Commune",1,0,'C',1,0);
// $pdf->cell(20,10,"Categorie",1,0,'C',1,0);
// $pdf->cell(30,10,"Type",1,0,'C',1,0);
// $pdf->cell(30,10,"Serie_Type",1,0,'C',1,0);
// $pdf->cell(30,10,"Marque",1,0,'C',1,0);
// $pdf->cell(35,10,"N d'Immatriculation",1,0,'C',1,0);
// $pdf->cell(15,10,"Annee",1,0,'C',1,0);
// $pdf->cell(36,10,"ASS",1,0,'C',1,0);
// $pdf->cell(40,10,"CTRL ",1,0,'C',1,0);
// $pdf->SetXY(05,$h+10); 
// $pdf->mysqlconnect();
// $pdf->SetFont('Arial', '',9, '', true);

// mysql_query("SET NAMES 'UTF8' ");
// $query = "SELECT * FROM auto where idt=$idt ORDER BY Categorie ";//      
// $resultat=mysql_query($query);
// $totalmbr1=mysql_num_rows($resultat);
// while($row=mysql_fetch_object($resultat))
// {
// $pdf->SetFillColor(200 );
// $pdf->cell(20,5,$pdf->dateUS2FR($row->Date),1,0,'C',0);

// $pdf->cell(30,5,$pdf->nbrtostring("com","IDCOM",$row->COMMUNE,"COMMUNE"),1,0,'C',0);
// $pdf->cell(20,5,$row->Categorie,1,0,'C',0);
// $pdf->cell(30,5,$row->Type,1,0,'C',0);
// $pdf->cell(30,5,$row->Serie_Type,1,0,'C',0);
// $pdf->cell(30,5,$row->Marque,1,0,'C',0);
// $pdf->cell(35,5,trim($row->Immatri),1,0,'C',0); 
// $pdf->cell(15,5,$row->Annee,1,0,'C',0);
// $date=date('Y-m-d');
// if($date >= $row->AUNASS  ) { 
 // $pdf->SetFillColor(250,200,200);
// $pdf->cell(36,5,html_entity_decode(utf8_decode($row->AUNASS)),1,0,'C',1,0);
// $pdf->SetFillColor(200);
// } else {
// $pdf->cell(36,5,html_entity_decode(utf8_decode($row->AUNASS)),1,0,'C',0);
// }
// if($date >= $row->AUCTRL  ) { 
 // $pdf->SetFillColor(250,200,200);
// $pdf->cell(40,5,html_entity_decode(utf8_decode($row->AUCTRL)),1,0,'C',1,0);
// $pdf->SetFillColor(200);
// } else {
// $pdf->cell(40,5,html_entity_decode(utf8_decode($row->AUCTRL)),1,0,'C',0);
// }
// $pdf->SetXY(5,$pdf->GetY()+5); 
// }
$pdf->SetFillColor(200);
// $pdf->SetFont('Arial', '',10, '', true);  
// $pdf->SetXY(5,$pdf->GetY());$pdf->cell(40,05,"TOTAL",1,0,1,'C',0);	  
// $pdf->SetXY(45,$pdf->GetY());$pdf->cell(246,05,$totalmbr1." Vehicules",1,1,1,'C',0);				 
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(90,10,"LE PRATICIEN INSPECTEUR RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);
$pdf->Output();
?>