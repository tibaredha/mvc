<?php
require('INSPECTION1.php');
$pdf = new INSPECTION1( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$idt=$_GET['uc'];

$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',10);
$pdf->Text(90,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(70,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ");
$pdf->Text(75,20,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA");

$pdf->Text(240,25," LE : ".date('d-m-Y'));
$pdf->Text(05,30,"INSPECTION SANTE PUBLIQUE");
$pdf->Text(05,35,"N ... /".date('Y'));
$pdf->Text(60,35,"Fiche vehicules : ".$pdf->nbrtostring('structure','id',$idt,'NOM').'_'.$pdf->nbrtostring('structure','id',$idt,'PRENOM') );
$pdf->Text(60,40,"Du  ".date("d-m-Y"));

$h=50;
$pdf->SetFillColor(200 );
$pdf->SetXY(05,$h);
$pdf->cell(20,10,"Date",1,0,1,'C',0);
$pdf->cell(30,10,"Commune",1,0,'C',1,0);
$pdf->cell(20,10,"Categorie",1,0,'C',1,0);
$pdf->cell(30,10,"Type",1,0,'C',1,0);
$pdf->cell(30,10,"Serie_Type",1,0,'C',1,0);
$pdf->cell(30,10,"Marque",1,0,'C',1,0);
$pdf->cell(35,10,"N d'Immatriculation",1,0,'C',1,0);
$pdf->cell(15,10,"Annee",1,0,'C',1,0);
$pdf->cell(36,10,"ASS",1,0,'C',1,0);
$pdf->cell(40,10,"CTRL ",1,0,'C',1,0);
$pdf->SetXY(05,$h+10); 
$pdf->mysqlconnect();
$pdf->SetFont('Arial', '',9, '', true);

mysql_query("SET NAMES 'UTF8' ");
$query = "SELECT * FROM auto where idt=$idt ORDER BY Categorie ";//      
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$pdf->SetFillColor(200 );
$pdf->cell(20,5,$pdf->dateUS2FR($row->Date),1,0,'C',0);

$pdf->cell(30,5,$pdf->nbrtostring("com","IDCOM",$row->COMMUNE,"COMMUNE"),1,0,'C',0);
$pdf->cell(20,5,$row->Categorie,1,0,'C',0);
$pdf->cell(30,5,$row->Type,1,0,'C',0);
$pdf->cell(30,5,$row->Serie_Type,1,0,'C',0);
$pdf->cell(30,5,$row->Marque,1,0,'C',0);
$pdf->cell(35,5,trim($row->Immatri),1,0,'C',0); 
$pdf->cell(15,5,$row->Annee,1,0,'C',0);
$date=date('Y-m-d');
if($date >= $row->AUNASS  ) { 
 $pdf->SetFillColor(250,200,200);
$pdf->cell(36,5,html_entity_decode(utf8_decode($row->AUNASS)),1,0,'C',1,0);
$pdf->SetFillColor(200);
} else {
$pdf->cell(36,5,html_entity_decode(utf8_decode($row->AUNASS)),1,0,'C',0);
}
if($date >= $row->AUCTRL  ) { 
 $pdf->SetFillColor(250,200,200);
$pdf->cell(40,5,html_entity_decode(utf8_decode($row->AUCTRL)),1,0,'C',1,0);
$pdf->SetFillColor(200);
} else {
$pdf->cell(40,5,html_entity_decode(utf8_decode($row->AUCTRL)),1,0,'C',0);
}
$pdf->SetXY(5,$pdf->GetY()+5); 
}
$pdf->SetFillColor(200);
$pdf->SetFont('Arial', '',10, '', true);  
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(40,05,"TOTAL",1,0,1,'C',0);	  
$pdf->SetXY(45,$pdf->GetY());$pdf->cell(246,05,$totalmbr1." Vehicules",1,1,1,'C',0);				 
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"LE PRATICIEN INSPECTEUR RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);


$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',10);
$pdf->Text(90,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(70,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ");
$pdf->Text(75,20,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA");

$pdf->Text(240,25," LE : ".date('d-m-Y'));
$pdf->Text(05,30,"INSPECTION SANTE PUBLIQUE");
$pdf->Text(05,35,"N ... /".date('Y'));
$pdf->Text(60,35,"Fiche vehicules : " );
$pdf->Text(60,40,"Du  ".date("d-m-Y"));


$h=50;
$pdf->SetFillColor(200 );
$pdf->SetXY(05,$h);
// $pdf->cell(20,10,"Date",1,0,1,'C',0);
// $pdf->cell(30,10,"Commune",1,0,'C',1,0);
$pdf->cell(20,10,"Categorie",1,0,'C',1,0);
$pdf->cell(30,10,"Type",1,0,'C',1,0);
$pdf->cell(40,10,"Serie_Type",1,0,'C',1,0);
$pdf->cell(30,10,"Marque",1,0,'C',1,0);
$pdf->cell(35,10,"N d'Immatriculation",1,0,'C',1,0);
$pdf->cell(15,10,"Annee",1,0,'C',1,0);
$pdf->cell(100,10,"Propritaire",1,0,'C',1,0);
$pdf->cell(15,10,"status",1,0,'C',1,0);
$pdf->SetXY(05,$h+10); 
$pdf->mysqlconnect();
$pdf->SetFont('Arial', '',9, '', true);

mysql_query("SET NAMES 'UTF8' ");
$query = "SELECT * FROM auto  ORDER BY Type,Serie_Type ";   // COUNT(*) AS nbr_doublon,  


// $query = "SELECT COUNT(*) AS nbr,Annee,Type,Marque,Serie_Type FROM auto GROUP BY  Serie_Type  HAVING COUNT(*) > 1 ORDER BY nbr DESC";//    COUNT(*) AS nbr_doublon,  

// $querydb= "SELECT COUNT(*) AS nbr_doublon,NOM,PRENOM,FILSDE,STRUCTURED,DINS FROM deceshosp  where STRUCTURED $STRUCTURED  GROUP BY NOM,PRENOM,FILSDE HAVING COUNT(*) > 1 ORDER BY nbr_doublon DESC ";//
// $resultatdb=mysql_query($querydb);
// $totalmbrdb=mysql_num_rows($resultatdb);


$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);

while($row=mysql_fetch_object($resultat))
{
	$pdf->SetFillColor(200 );
	// $pdf->cell(20,5,$pdf->nbr_doublon,1,0,'C',0);
	// $pdf->cell(30,5,$pdf->nbrtostring("com","IDCOM",$row->COMMUNE,"COMMUNE"),1,0,'C',0);
	
	$pdf->cell(20,5,$row->Categorie,1,0,'C',0);
	$pdf->cell(30,5,$row->Type,1,0,'C',0);
	$pdf->cell(40,5,$row->Serie_Type,1,0,'C',0);
	$pdf->cell(30,5,$row->Marque,1,0,'C',0);
	$pdf->cell(35,5,trim($row->Immatri),1,0,'C',0); 
	$pdf->cell(15,5,trim($row->Annee),1,0,'C',0);
	$pdf->cell(100,5,$pdf->nbrtostring("structure","id",$row->idt,"NOM").'_'.$pdf->nbrtostring("structure","id",$row->idt,"PRENOM"),1,0,'L',0);
	$etat=$pdf->nbrtostring("structure","id",$row->idt,"ETAT");if ($etat == 0){$pdf->cell(15,5,"",1,0,'C',0);}else{$pdf->cell(15,5,"resiliation",1,0,'C',0);	}
	
	// $pdf->cell(15,5,trim($row->nbr),1,0,'C',0);
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
	$pdf->SetXY(5,$pdf->GetY()+5); 
}
$pdf->SetFillColor(200);
$pdf->SetFont('Arial', '',10, '', true);  
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(40,05,"TOTAL",1,0,1,'C',0);	  
$pdf->SetXY(45,$pdf->GetY());$pdf->cell(246,05,$totalmbr1." Vehicules",1,1,1,'C',0);				 
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"LE PRATICIEN INSPECTEUR RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);














$pdf->Output();
?>