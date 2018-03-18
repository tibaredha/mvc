<?php
require('DNR.php');
$pdf = new DNR( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
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
if ($_POST['STRUCTURED']=="='1'") {$EPH='EPH_DJALFA';}
if ($_POST['STRUCTURED']=="='2'") {$EPH='EPH_AIN_OUSSERA';}
if ($_POST['STRUCTURED']=="='3'") {$EPH='EPH_HASSI_BAHBAH';}
if ($_POST['STRUCTURED']=="='4'") {$EPH='EPH_MESSAAD';}
if ($_POST['STRUCTURED']=="='5'") {$EPH='EHS_DJELFA';}
if ($_POST['STRUCTURED']=="IS NOT NULL") {$EPH='WILAYA_DJELFA';}
$pdf->Text(05,25,$EPH);	
$pdf->Text(240,25," LE : ".date('d-m-Y'));
$pdf->Text(05,30,"SEMEP");
$pdf->Text(05,35,"N ... /".date('Y'));
$pdf->Text(60,35,"RELEVE DES CAUSES DE DEDECS ");
$pdf->Text(60,40,"Du  ".date("d-m-Y"));
// $pdf->Text(60,45,"Ref : circulaire numero 607 du 24 septembre 1994  ");
$h=50;
$pdf->SetFillColor(200 );
$pdf->SetXY(05,$h);
$pdf->cell(20,10,"Date Deces",1,0,1,'C',0);
$pdf->cell(80,10,"Nom_Prenom",1,0,1,'C',0);
$pdf->cell(10,10,"Sexe",1,0,1,'C',0);
$pdf->cell(20,10,"Nee le",1,0,1,'C',0);
$pdf->cell(10,10,"Age",1,0,1,'C',0);
$pdf->cell(55,10,"Commune residence",1,0,1,'C',0);
$pdf->cell(20,10,"Admission",1,0,1,'C',0);
$pdf->cell(46,10,"Service ",1,0,1,'C',0);
$pdf->cell(15,10,"Duree",1,0,1,'C',0);
$pdf->cell(10,10,"CIM",1,0,1,'C',0);
$pdf->SetXY(05,$h+10); 
$pdf->mysqlconnect();
$pdf->SetFont('Arial', '',9, '', true);
$ordre=$_POST['ordre'];
$ascdesc=$_POST['ascdesc'];
$STRUCTURED=$_POST['STRUCTURED'];
$nbrlimit=$_POST['nbrlimit'];
$SEXE=$_POST['SEXE'];
$date=date("d-m-y");
mysql_query("SET NAMES 'UTF8' ");
$query = "SELECT * FROM deceshosp  where STRUCTURED $STRUCTURED  AND   SEX $SEXE   order by TRIM($ordre)  $ascdesc limit $nbrlimit  ";// 
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$pdf->SetFillColor(200 );
$pdf->cell(20,5,$pdf->dateUS2FR($row->DINS),1,0,'C',0);
$pdf->cell(80,5,trim($row->NOM).'_'.strtolower (trim($row->PRENOM)).' ['.strtolower (trim($row->FILSDE)).']',1,0,'L',0);
$pdf->cell(10,5,$row->SEX,1,0,'C',0);
$pdf->cell(20,5,$row->DATENAISSANCE,1,0,'C',0);
// $pdf->cell(10,5,$row->Years,1,0,'C',0);
if ($row->Years > 0 ) 
{
$pdf->cell(10,5,$row->Years." A",1,0,'C',0);
} 
else 
{
	if ($row->Days <= 30 ) 
	{
	$pdf->cell(10,5,$row->Days." J",1,0,'C',0);
	} 
	else
	{
	$pdf->cell(10,5,$row->Months." M",1,0,'C',0);
	} 
}
$pdf->cell(55,5,$pdf->nbrtostring("MVC","com","IDCOM",$row->COMMUNER,"COMMUNE") 	,1,0,'L',0);
$pdf->cell(20,5,$pdf->dateUS2FR($row->DATEHOSPI),1,0,'C',0);
$pdf->cell(46,5,$pdf->nbrtostring("MVC","service","ids",$row->SERVICEHOSPIT,"servicefr"),1,0,'L',0);
$pdf->cell(15,5,$row->DUREEHOSPIT.' j',1,0,'L',0);
$pdf->cell(10,5,$row->CODECIM,1,0,'C',0);
$pdf->SetXY(5,$pdf->GetY()+5); 
}
$pdf->SetFillColor(200 );
$pdf->SetFont('Arial', '',10, '', true);  
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(40,05,"TOTAL",1,0,1,'C',0);	  
$pdf->SetXY(45,$pdf->GetY());$pdf->cell(246,05,$totalmbr1." Deces",1,1,1,'C',0);				 
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
?>