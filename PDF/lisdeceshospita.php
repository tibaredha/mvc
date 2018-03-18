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
$datejour1='2007-01-01';
$datejour2='2020-06-01';
$pdf->Text(90,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(70,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ");
$pdf->Text(75,20,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA");
$pdf->Text(05,25,"EPH   AIN OUSSERA");	$pdf->Text(240,25,"AIN OUSSERA LE 31/08/2012");
// $pdf->Text(05,30,"SEMEP AIN OUSSERA");
// $pdf->Text(05,35,"N°.........../...");
$pdf->Text(60,35,"RELEVE DES CAUSES DE DEDECS ");
$pdf->Text(60,40,"Du  ".$pdf->dateUS2FR($datejour1)."  Au  ".$pdf->dateUS2FR($datejour2));
$pdf->Text(60,45,"Ref : circulaire numero 607 du 24 septembre 1994  ");



$h=50;
$pdf->SetFillColor(200 );
$pdf->SetXY(05,$h);$pdf->cell(20,10,"Age",1,0,1,'C',0);
$pdf->SetXY(25,$h);$pdf->cell(20,10,"Sexe",1,0,1,'C',0);
$pdf->SetXY(45,$h);$pdf->cell(50,10,"Commune De Residence ",1,0,1,'C',0);
$pdf->SetXY(95,$h);$pdf->cell(25,10,"Profession",1,0,1,'C',0);
$pdf->SetXY(95+25,$h);$pdf->cell(25,10,"Service Hosp",1,0,1,'C',0);
$pdf->SetXY(95+50,$h);$pdf->cell(25,10,"Duree Hosp",1,0,1,'C',0);
$pdf->SetXY(95+50+25,$h);$pdf->cell(121,10,"Cause du deces",1,0,1,'C',0);
$pdf->SetXY(05,$h+10); 
$pdf->mysqlconnect();
$pdf->SetFont('Arial', '',9, '', true);
$query = "SELECT * FROM deceshosp where DINS BETWEEN '$datejour1' AND '$datejour2'";// 
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$pdf->SetFillColor(200 );
if ($row->Years > 0 ) 
		{
		$pdf->cell(20,5,$row->Years." A",1,0,'C',0);
		} 
		else 
		{
			if ($row->Days <= 30 ) 
			{
			$pdf->cell(20,5,$row->Days." J",1,0,'C',0);
			} 
			else
			{
			$pdf->cell(20,5,$row->Months." M",1,0,'C',0);
			} 
		}
$pdf->cell(20,5,$row->SEX,1,0,'C',0);
$pdf->cell(50,5,$pdf->nbrtostring("MVC","com","IDCOM",$row->COMMUNER,"COMMUNE") 	,1,0,'L',0);
$pdf->cell(25,5,'Sans profession',1,0,'L',0);
$pdf->cell(25,5,$row->SERVICEHOSPIT,1,0,'L',0);
$pdf->cell(25,5,$row->DUREEHOSPIT,1,0,'L',0);
$pdf->cell(121,5,'('.$row->CODECIM.')_'.$row->CIM4,1,0,'L',0);
// $pdf->cell(50,5,$pdf->nbrtostring("MVC","service","ids",$row->SERVICE,"servicefr"),1,0,'L',0);//5  =hauteur de la cellule origine =7
// $pdf->cell(40,5,$row->DH,1,0,'C',0);
// $pdf->cell(106,5,$row->DGC	,1,0,'L',0);
$pdf->SetXY(5,$pdf->GetY()+5); 
}
$pdf->SetFillColor(200 );
$pdf->SetFont('Arial', '',10, '', true);  
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(40,05,"TOTAL",1,0,1,'C',0);	  
$pdf->SetXY(45,$pdf->GetY());$pdf->cell(246,05,$totalmbr1." Deces",1,1,1,'C',0);				 
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	

$pdf->Output();