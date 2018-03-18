<?php
require('DNR.php');
$pdf = new DNR( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
// $pdf->entetepage1('POIDS EN KG PAR RAPPORT A L AGE DES GARCONS DE 00 A 36 MOIS ');
$pdf->AddPage('L','A4');
	$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
	$pdf->SetFont('Arial','B',10);
	//$pdf->Image('../public/IMAGES/photos/logoao.gif',140,0,15,15,0);
	// $pdf->Text(5,5+3,'AGENCE REGIONALE DE :'.$pdf->nbrtostring($pdf->db_name,"ars","IDARS",$pdf->REGION(),"WILAYAS"));$pdf->Text(230,5," UTILISATEUR :".$pdf->USER());
	// $pdf->Text(5,10+3,'WILAYA DE :'.$pdf->nbrtostring($pdf->db_name,"wrs","IDWIL",$pdf->WILAYA(),"WILAYAS"));         $pdf->Text(230,10," DATE : ".date ('d-m-Y'));
	// $pdf->Text(5,15+3,'STRUCTURE DE TRANSFUSION SANGUINE :'.$pdf->nbrtostring($pdf->db_name,"cts","IDCTS",$pdf->STRUCTURE(),"CTS"));
	// $pdf->SetFont('Arial','B',20);
	// $pdf->SetTextColor(225,0,0);
	// $pdf->SetXY(5,23);	$pdf->cell(285,10,'POIDS EN KG PAR RAPPORT A L AGE DES GARCONS DE 00 A 36 MOIS',1,0,'C',0);
	// $pdf->SetTextColor(0,0,0);
	// $pdf->SetFont('Arial','B',10);
$h=20;
$pdf->SetXY(5,$h);$pdf->cell(15,5,"id",1,0,'C',1,0);
$pdf->SetXY(5+15,$h);$pdf->cell(40,5,"Nom",1,0,'C',1,0);
$pdf->SetXY(5+15+40,$h);$pdf->cell(40,5,"Prenom",1,0,'C',1,0);
$pdf->SetXY(5+15+40+40,$h);$pdf->cell(15,5,"Sexe",1,0,'C',1,0);
$pdf->SetXY(5+15+40+40+15,$h);$pdf->cell(35,5,"Commune",1,0,'C',1,0);
$pdf->SetXY(5+15+40+40+15+35,$h);$pdf->cell(35,5,"Date naissance",1,0,'C',1,0);
$pdf->SetXY(5+15+40+40+15+35+35,$h);$pdf->cell(15,5,"Age (M)",1,0,'C',1,0);
$pdf->SetXY(5+15+40+40+15+35+35+15,$h);$pdf->cell(15,5,"PA",1,0,'C',1,0);
$pdf->SetXY(5+15+40+40+15+35+35+15+15,$h);$pdf->cell(15,5,"TA",1,0,'C',1,0);
$pdf->SetXY(5+15+40+40+15+35+35+15+30,$h);$pdf->cell(15,5,"PT",1,0,'C',1,0);
$pdf->SetXY(5+15+40+40+15+35+35+15+45,$h);$pdf->cell(22.5,5,"HB",1,0,'C',1,0);
$pdf->SetXY(5+15+40+40+15+35+35+15+45+22.5,$h);$pdf->cell(22.5,5,"HT",1,0,'C',1,0);
$pdf->SetXY(5,$h+5); 
$db_host="localhost";
$db_name="mvc"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query="SELECT * FROM mnpe  "; //    % %will search form 0-9,a-z            
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$pdf->SetFont('Times', '', 10);
$pdf->cell(15,4,trim($row->id),1,0,'C',0);
$pdf->cell(40,4,trim($row->NOM),1,0,'C',0);
$pdf->cell(40,4,trim($row->PRENOM),1,0,'C',0);
$pdf->cell(15,4,trim($row->SEX),1,0,'C',0);
$pdf->cell(35,4,trim($row->COMMUNER),1,0,'C',0);
$pdf->cell(35,4,trim($row->DATENAISSANCE),1,0,'C',0);
$pdf->cell(15,4,trim($row->Months),1,0,'C',0);
$pdf->cell(15,4,trim($row->IPA),1,0,'C',0);
$pdf->cell(15,4,trim($row->ISTA),1,0,'C',0);
$pdf->cell(15,4,trim($row->IPT),1,0,'C',0);
$pdf->cell(22.5,4,trim($row->HB),1,0,'C',0);
$pdf->cell(22.5,4,trim($row->HT),1,0,'C',0);




$pdf->SetXY(5,$pdf->GetY()+4); 
}
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(15,5,"Total",1,0,'C',1,0);	  
$pdf->SetXY(20,$pdf->GetY());$pdf->cell(270,5,$totalmbr1."  "." ",1,0,'C',1,0);				 
// $pdf->SetXY(130,$pdf->GetY()+20);$pdf->cell(60,5,"DR TIBA PTS AIN OUSSERA ",0,0,'C',0);		
$pdf->Output();