<?php
require('DNR.php');
$pdf = new DNR( 'P', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
// $pdf->entetepage1('POIDS EN KG PAR RAPPORT A L AGE DES GARCONS DE 00 A 36 MOIS ');
$pdf->AddPage('P','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',10);
$pdf->mysqlconnect();
function nbrmnpeabcd($Months1,$Months2,$COL,$ABCD)
{
$sql = " select Months,IPA,ISTA,IPT from mnpe where $COL='$ABCD' and  Months >=$Months1  and  Months <=$Months2 ";//and  AGEDNR >=$colone2  and AGEDNR <=$colone3  and DATEDON >='$datejour1'and DATEDON <='$datejour2'
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$collecte=mysql_num_rows($requete);
mysql_free_result($requete);
return $collecte;
}
$pdf->mysqlconnect();
function nbrmnpeabcd0($Months1,$Months2)
{
$sql = " select Months from mnpe where  Months >=$Months1  and  Months <=$Months2 ";//and  AGEDNR >=$colone2  and AGEDNR <=$colone3  and DATEDON >='$datejour1'and DATEDON <='$datejour2'
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$collecte=mysql_num_rows($requete);
mysql_free_result($requete);
return $collecte;
}
$pdf->mysqlconnect();
function nbrmnpeabcdt($COL,$ABCD)
{
$sql = " select Months,IPA,ISTA,IPT from mnpe where $COL='$ABCD'";//and  AGEDNR >=$colone2  and AGEDNR <=$colone3  and DATEDON >='$datejour1'and DATEDON <='$datejour2'
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$collecte=mysql_num_rows($requete);
mysql_free_result($requete);
return $collecte;
}



$NEE1=nbrmnpeabcd0(0,0);	
$A=nbrmnpeabcd(0,0,'IPA','A');$AA=nbrmnpeabcd(0,0,'ISTA','A');$AAA=nbrmnpeabcd(0,0,'IPT','A');
$B=nbrmnpeabcd(0,0,'IPA','B');$BB=nbrmnpeabcd(0,0,'ISTA','B');$BBB=nbrmnpeabcd(0,0,'IPT','B');
$C=nbrmnpeabcd(0,0,'IPA','C');$CC=nbrmnpeabcd(0,0,'ISTA','C');$CCC=nbrmnpeabcd(0,0,'IPT','C');
$D=nbrmnpeabcd(0,0,'IPA','D');$DD=nbrmnpeabcd(0,0,'ISTA','D');$DDD=nbrmnpeabcd(0,0,'IPT','D');

$NEE2=nbrmnpeabcd0(1,5);
$A1=nbrmnpeabcd(1,5,'IPA','A');$AA1=nbrmnpeabcd(1,5,'ISTA','A');$AAA1=nbrmnpeabcd(1,5,'IPT','A');
$B1=nbrmnpeabcd(1,5,'IPA','B');$BB1=nbrmnpeabcd(1,5,'ISTA','B');$BBB1=nbrmnpeabcd(1,5,'IPT','B');
$C1=nbrmnpeabcd(1,5,'IPA','C');$CC1=nbrmnpeabcd(1,5,'ISTA','C');$CCC1=nbrmnpeabcd(1,5,'IPT','C');
$D1=nbrmnpeabcd(1,5,'IPA','D');$DD1=nbrmnpeabcd(1,5,'ISTA','D');$DDD1=nbrmnpeabcd(1,5,'IPT','D');

$NEE3=nbrmnpeabcd0(6,11);
$A2=nbrmnpeabcd(6,11,'IPA','A');$AA2=nbrmnpeabcd(6,11,'ISTA','A');$AAA2=nbrmnpeabcd(6,11,'IPT','A');
$B2=nbrmnpeabcd(6,11,'IPA','B');$BB2=nbrmnpeabcd(6,11,'ISTA','B');$BBB2=nbrmnpeabcd(6,11,'IPT','B');
$C2=nbrmnpeabcd(6,11,'IPA','C');$CC2=nbrmnpeabcd(6,11,'ISTA','C');$CCC2=nbrmnpeabcd(6,11,'IPT','C');
$D2=nbrmnpeabcd(6,11,'IPA','D');$DD2=nbrmnpeabcd(6,11,'ISTA','D');$DDD2=nbrmnpeabcd(6,11,'IPT','D');

$NEE4=nbrmnpeabcd0(12,23);
$A3=nbrmnpeabcd(12,23,'IPA','A');$AA3=nbrmnpeabcd(12,23,'ISTA','A');$AAA3=nbrmnpeabcd(12,23,'IPT','A');
$B3=nbrmnpeabcd(12,23,'IPA','B');$BB3=nbrmnpeabcd(12,23,'ISTA','B');$BBB3=nbrmnpeabcd(12,23,'IPT','B');
$C3=nbrmnpeabcd(12,23,'IPA','C');$CC3=nbrmnpeabcd(12,23,'ISTA','C');$CCC3=nbrmnpeabcd(12,23,'IPT','C');
$D3=nbrmnpeabcd(12,23,'IPA','D');$DD3=nbrmnpeabcd(12,23,'ISTA','D');$DDD3=nbrmnpeabcd(12,23,'IPT','D');

$NEE5=nbrmnpeabcd0(24,35);
$A4=nbrmnpeabcd(24,35,'IPA','A');$AA4=nbrmnpeabcd(24,35,'ISTA','A');$AAA4=nbrmnpeabcd(24,35,'IPT','A');
$B4=nbrmnpeabcd(24,35,'IPA','B');$BB4=nbrmnpeabcd(24,35,'ISTA','B');$BBB4=nbrmnpeabcd(24,35,'IPT','B');
$C4=nbrmnpeabcd(24,35,'IPA','C');$CC4=nbrmnpeabcd(24,35,'ISTA','C');$CCC4=nbrmnpeabcd(24,35,'IPT','C');
$D4=nbrmnpeabcd(24,35,'IPA','D');$DD4=nbrmnpeabcd(24,35,'ISTA','D');$DDD4=nbrmnpeabcd(24,35,'IPT','D');

$NEE6=nbrmnpeabcd0(36,59);
$A5=nbrmnpeabcd(36,59,'IPA','A');$AA5=nbrmnpeabcd(36,59,'ISTA','A');$AAA5=nbrmnpeabcd(36,59,'IPT','A');
$B5=nbrmnpeabcd(36,59,'IPA','B');$BB5=nbrmnpeabcd(36,59,'ISTA','B');$BBB5=nbrmnpeabcd(36,59,'IPT','B');
$C5=nbrmnpeabcd(36,59,'IPA','C');$CC5=nbrmnpeabcd(36,59,'ISTA','C');$CCC5=nbrmnpeabcd(36,59,'IPT','C');
$D5=nbrmnpeabcd(36,59,'IPA','D');$DD5=nbrmnpeabcd(36,59,'ISTA','D');$DDD5=nbrmnpeabcd(36,59,'IPT','D');

//$NEE6t=nbrmnpeabcd0t(36,59);
$A6=nbrmnpeabcdt(36,59,'IPA','A');$AA6=nbrmnpeabcdt(36,59,'ISTA','A');$AAA6=nbrmnpeabcdt(36,59,'IPT','A');
$B6=nbrmnpeabcdt(36,59,'IPA','B');$BB6=nbrmnpeabcdt(36,59,'ISTA','B');$BBB6=nbrmnpeabcdt(36,59,'IPT','B');
$C6=nbrmnpeabcdt(36,59,'IPA','C');$CC6=nbrmnpeabcdt(36,59,'ISTA','C');$CCC6=nbrmnpeabcdt(36,59,'IPT','C');
$D6=nbrmnpeabcdt(36,59,'IPA','D');$DD6=nbrmnpeabcdt(36,59,'ISTA','D');$DDD6=nbrmnpeabcdt(36,59,'IPT','D');


	
$pdf->SetXY(5,5);$pdf->cell(200,5,"Republique Algerienne Democratique et Populaire ",0,0,'C',0,0);
$pdf->SetXY(5,10);$pdf->cell(200,5,"Ministere De La Sante De La Population Et De La Reforme Hospitaliere ",0,0,'C',0,0);
$pdf->SetXY(5,15);$pdf->cell(200,5,"Direction De La Sante Et De La Population De La Wilaya De Djelfa ",0,0,'C',0,0);
$pdf->SetXY(5,20);$pdf->cell(200,5,"EPH / EPSP ",0,0,'L',0,0);
$pdf->SetXY(5,25);$pdf->cell(200,5,"DSS",0,0,'L',0,0);
$pdf->SetXY(5,30);$pdf->cell(200,5,"SEMEP",0,0,'L',0,0);
$pdf->SetXY(5,35);$pdf->cell(200,5,"N°..../....",0,0,'L',0,0);
$pdf->SetXY(5,45);$pdf->cell(200,5,"MNPE",0,0,'C',0,0);


$pdf->SetXY(5,55);$pdf->cell(200,5,"Selon Le Degre De Gravite De MPE Depiste",1,0,'C',1,0);
$pdf->SetXY(5,60);$pdf->cell(35,10,"Tranche d'age",1,0,'C',1,0);$pdf->cell(45,10,"Nombre Enfant Examines",1,0,'C',1,0);$pdf->cell(40,5,"Ponderale P/A",1,0,'C',1,0);$pdf->cell(40,5,"Statural T/A",1,0,'C',1,0);$pdf->cell(40,5,"Maigreur P/T",1,0,'C',1,0);
$pdf->SetXY(5+35+45,65);$pdf->cell(10,5,"A",1,0,'C',1,0);$pdf->cell(10,5,"B",1,0,'C',1,0);$pdf->cell(10,5,"C",1,0,'C',1,0);$pdf->cell(10,5,"D",1,0,'C',1,0);$pdf->cell(10,5,"A",1,0,'C',1,0);$pdf->cell(10,5,"B",1,0,'C',1,0);$pdf->cell(10,5,"C",1,0,'C',1,0);$pdf->cell(10,5,"D",1,0,'C',1,0);$pdf->cell(10,5,"A",1,0,'C',1,0);$pdf->cell(10,5,"B",1,0,'C',1,0);$pdf->cell(10,5,"C",1,0,'C',1,0);$pdf->cell(10,5,"D",1,0,'C',1,0);
$pdf->SetXY(5,70);$pdf->cell(35,5,"0 a 28 jours",1,0,'C',1,0);$pdf->cell(45,5,$NEE1,1,0,'C',0,0);$pdf->cell(10,5,$A,1,0,'C',0,0);$pdf->cell(10,5,$B,1,0,'C',0,0);$pdf->cell(10,5,$C,1,0,'C',0,0);$pdf->cell(10,5,$D,1,0,'C',0,0);$pdf->cell(10,5,$AA,1,0,'C',0,0);$pdf->cell(10,5,$BB,1,0,'C',0,0);$pdf->cell(10,5,$CC,1,0,'C',0,0);$pdf->cell(10,5,$DD,1,0,'C',0,0);$pdf->cell(10,5,$AAA,1,0,'C',0,0);$pdf->cell(10,5,$BBB,1,0,'C',0,0);$pdf->cell(10,5,$CCC,1,0,'C',0,0);$pdf->cell(10,5,$DDD,1,0,'C',0,0);
$pdf->SetXY(5,75);$pdf->cell(35,5,"29j a 05mois",1,0,'C',1,0);$pdf->cell(45,5,$NEE2,1,0,'C',0,0);$pdf->cell(10,5,$A1,1,0,'C',0,0);$pdf->cell(10,5,$B1,1,0,'C',0,0);$pdf->cell(10,5,$C1,1,0,'C',0,0);$pdf->cell(10,5,$D1,1,0,'C',0,0);$pdf->cell(10,5,$AA1,1,0,'C',0,0);$pdf->cell(10,5,$BB1,1,0,'C',0,0);$pdf->cell(10,5,$CC1,1,0,'C',0,0);$pdf->cell(10,5,$DD1,1,0,'C',0,0);$pdf->cell(10,5,$AAA1,1,0,'C',0,0);$pdf->cell(10,5,$BBB1,1,0,'C',0,0);$pdf->cell(10,5,$CCC1,1,0,'C',0,0);$pdf->cell(10,5,$DDD1,1,0,'C',0,0);
$pdf->SetXY(5,80);$pdf->cell(35,5,"06 a 11 mois",1,0,'C',1,0);$pdf->cell(45,5,$NEE3,1,0,'C',0,0);$pdf->cell(10,5,$A2,1,0,'C',0,0);$pdf->cell(10,5,$B2,1,0,'C',0,0);$pdf->cell(10,5,$C2,1,0,'C',0,0);$pdf->cell(10,5,$D2,1,0,'C',0,0);$pdf->cell(10,5,$AA2,1,0,'C',0,0);$pdf->cell(10,5,$BB2,1,0,'C',0,0);$pdf->cell(10,5,$CC2,1,0,'C',0,0);$pdf->cell(10,5,$DD2,1,0,'C',0,0);$pdf->cell(10,5,$AAA2,1,0,'C',0,0);$pdf->cell(10,5,$BBB2,1,0,'C',0,0);$pdf->cell(10,5,$CCC2,1,0,'C',0,0);$pdf->cell(10,5,$DDD2,1,0,'C',0,0);
$pdf->SetXY(5,85);$pdf->cell(35,5,"12 a 23 mois",1,0,'C',1,0);$pdf->cell(45,5,$NEE4,1,0,'C',0,0);$pdf->cell(10,5,$A3,1,0,'C',0,0);$pdf->cell(10,5,$B3,1,0,'C',0,0);$pdf->cell(10,5,$C3,1,0,'C',0,0);$pdf->cell(10,5,$D3,1,0,'C',0,0);$pdf->cell(10,5,$AA3,1,0,'C',0,0);$pdf->cell(10,5,$BB3,1,0,'C',0,0);$pdf->cell(10,5,$CC3,1,0,'C',0,0);$pdf->cell(10,5,$DD3,1,0,'C',0,0);$pdf->cell(10,5,$AAA3,1,0,'C',0,0);$pdf->cell(10,5,$BBB3,1,0,'C',0,0);$pdf->cell(10,5,$CCC3,1,0,'C',0,0);$pdf->cell(10,5,$DDD3,1,0,'C',0,0);
$pdf->SetXY(5,90);$pdf->cell(35,5,"24 a 35 mois",1,0,'C',1,0);$pdf->cell(45,5,$NEE5,1,0,'C',0,0);$pdf->cell(10,5,$A4,1,0,'C',0,0);$pdf->cell(10,5,$B4,1,0,'C',0,0);$pdf->cell(10,5,$C4,1,0,'C',0,0);$pdf->cell(10,5,$D4,1,0,'C',0,0);$pdf->cell(10,5,$AA4,1,0,'C',0,0);$pdf->cell(10,5,$BB4,1,0,'C',0,0);$pdf->cell(10,5,$CC4,1,0,'C',0,0);$pdf->cell(10,5,$DD4,1,0,'C',0,0);$pdf->cell(10,5,$AAA4,1,0,'C',0,0);$pdf->cell(10,5,$BBB4,1,0,'C',0,0);$pdf->cell(10,5,$CCC4,1,0,'C',0,0);$pdf->cell(10,5,$DDD4,1,0,'C',0,0);
$pdf->SetXY(5,95);$pdf->cell(35,5,"36 a 59 mois",1,0,'C',1,0);$pdf->cell(45,5,$NEE6,1,0,'C',0,0);$pdf->cell(10,5,$A5,1,0,'C',0,0);$pdf->cell(10,5,$B5,1,0,'C',0,0);$pdf->cell(10,5,$C5,1,0,'C',0,0);$pdf->cell(10,5,$D5,1,0,'C',0,0);$pdf->cell(10,5,$AA5,1,0,'C',0,0);$pdf->cell(10,5,$BB5,1,0,'C',0,0);$pdf->cell(10,5,$CC5,1,0,'C',0,0);$pdf->cell(10,5,$DD5,1,0,'C',0,0);$pdf->cell(10,5,$AAA5,1,0,'C',0,0);$pdf->cell(10,5,$BBB5,1,0,'C',0,0);$pdf->cell(10,5,$CCC5,1,0,'C',0,0);$pdf->cell(10,5,$DDD5,1,0,'C',0,0);
$pdf->SetXY(5,95);$pdf->cell(35,5,"Total",1,0,'C',1,0);$pdf->cell(45,5,"0000",1,0,'C',1,0);$pdf->cell(10,5,$A6,1,0,'C',1,0);$pdf->cell(10,5,$B6,1,0,'C',1,0);$pdf->cell(10,5,$C6,1,0,'C',1,0);$pdf->cell(10,5,$D6,1,0,'C',1,0);$pdf->cell(10,5,"0000",1,0,'C',1,0);$pdf->cell(10,5,"0000",1,0,'C',1,0);$pdf->cell(10,5,"0000",1,0,'C',1,0);$pdf->cell(10,5,"0000",1,0,'C',1,0);$pdf->cell(10,5,"0000",1,0,'C',1,0);$pdf->cell(10,5,"0000",1,0,'C',1,0);$pdf->cell(10,5,"0000",1,0,'C',1,0);$pdf->cell(10,5,"0000",1,0,'C',1,0);

	//$pdf->Image('../public/IMAGES/photos/logoao.gif',140,0,15,15,0);
	// $pdf->Text(5,5+3,'AGENCE REGIONALE DE :'.$pdf->nbrtostring($pdf->db_name,"ars","IDARS",$pdf->REGION(),"WILAYAS"));$pdf->Text(230,5," UTILISATEUR :".$pdf->USER());
	// $pdf->Text(5,10+3,'WILAYA DE :'.$pdf->nbrtostring($pdf->db_name,"wrs","IDWIL",$pdf->WILAYA(),"WILAYAS"));         $pdf->Text(230,10," DATE : ".date ('d-m-Y'));
	// $pdf->Text(5,15+3,'STRUCTURE DE TRANSFUSION SANGUINE :'.$pdf->nbrtostring($pdf->db_name,"cts","IDCTS",$pdf->STRUCTURE(),"CTS"));
	// $pdf->SetFont('Arial','B',20);
	// $pdf->SetTextColor(225,0,0);
	// $pdf->SetXY(5,23);	$pdf->cell(285,10,'POIDS EN KG PAR RAPPORT A L AGE DES GARCONS DE 00 A 36 MOIS',1,0,'C',0);
	// $pdf->SetTextColor(0,0,0);
	// $pdf->SetFont('Arial','B',10);
// $h=20;
// $pdf->SetXY(5,$h);$pdf->cell(15,5,"id",1,0,'C',1,0);
// $pdf->SetXY(5+15,$h);$pdf->cell(40,5,"Nom",1,0,'C',1,0);
// $pdf->SetXY(5+15+40,$h);$pdf->cell(40,5,"Prenom",1,0,'C',1,0);
// $pdf->SetXY(5+15+40+40,$h);$pdf->cell(15,5,"Sexe",1,0,'C',1,0);
// $pdf->SetXY(5+15+40+40+15,$h);$pdf->cell(35,5,"Commune",1,0,'C',1,0);
// $pdf->SetXY(5+15+40+40+15+35,$h);$pdf->cell(35,5,"Date naissance",1,0,'C',1,0);
// $pdf->SetXY(5+15+40+40+15+35+35,$h);$pdf->cell(15,5,"Age (M)",1,0,'C',1,0);
// $pdf->SetXY(5+15+40+40+15+35+35+15,$h);$pdf->cell(15,5,"PA",1,0,'C',1,0);
// $pdf->SetXY(5+15+40+40+15+35+35+15+15,$h);$pdf->cell(15,5,"TA",1,0,'C',1,0);
// $pdf->SetXY(5+15+40+40+15+35+35+15+30,$h);$pdf->cell(15,5,"PT",1,0,'C',1,0);
// $pdf->SetXY(5+15+40+40+15+35+35+15+45,$h);$pdf->cell(22.5,5,"HB",1,0,'C',1,0);
// $pdf->SetXY(5+15+40+40+15+35+35+15+45+22.5,$h);$pdf->cell(22.5,5,"HT",1,0,'C',1,0);
// $pdf->SetXY(5,$h+5); 
// $db_host="localhost";
// $db_name="mvc"; 
// $db_user="root";
// $db_pass="";
// $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
// $db  = mysql_select_db($db_name,$cnx) ;
// mysql_query("SET NAMES 'UTF8' ");
// $query="SELECT * FROM mnpe  "; //    % %will search form 0-9,a-z            
// $resultat=mysql_query($query);
// $totalmbr1=mysql_num_rows($resultat);
// while($row=mysql_fetch_object($resultat))
// {
// $pdf->SetFont('Times', '', 10);
// $pdf->cell(15,4,trim($row->id),1,0,'C',0);
// $pdf->cell(40,4,trim($row->NOM),1,0,'C',0);
// $pdf->cell(40,4,trim($row->PRENOM),1,0,'C',0);
// $pdf->cell(15,4,trim($row->SEX),1,0,'C',0);
// $pdf->cell(35,4,trim($row->COMMUNER),1,0,'C',0);
// $pdf->cell(35,4,trim($row->DATENAISSANCE),1,0,'C',0);
// $pdf->cell(15,4,trim($row->Months),1,0,'C',0);
// $pdf->cell(15,4,trim($row->IPA),1,0,'C',0);
// $pdf->cell(15,4,trim($row->ISTA),1,0,'C',0);
// $pdf->cell(15,4,trim($row->IPT),1,0,'C',0);
// $pdf->cell(22.5,4,trim($row->HB),1,0,'C',0);
// $pdf->cell(22.5,4,trim($row->HT),1,0,'C',0);
// $pdf->SetXY(5,$pdf->GetY()+4); 
// }
// $pdf->SetXY(5,$pdf->GetY());$pdf->cell(15,5,"Total",1,0,'C',1,0);	  
// $pdf->SetXY(20,$pdf->GetY());$pdf->cell(270,5,$totalmbr1."  "." ",1,0,'C',1,0);
$pdf->SetXY(130,$pdf->GetY()+20);$pdf->cell(60,5,"AIN OUSSERA LE ",0,0,'L',0);				 
$pdf->SetXY(130,$pdf->GetY()+5);$pdf->cell(60,5,"DR TIBA EPH AIN OUSSERA ",0,0,'L',0);		
$pdf->Output();