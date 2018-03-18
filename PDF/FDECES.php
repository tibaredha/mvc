<?php
if (!ISSET($_POST['annee'])||!ISSET($_POST['mois'])||!ISSET($_POST['jour'])||!ISSET($_POST['annee1'])||!ISSET($_POST['mois1'])||!ISSET($_POST['jour1']))
{
$datejour1 =date("Y-m-d");$datejour2 =date("Y-m-d");
}
else
{
 if(empty($_POST['annee'])||empty($_POST['mois'])||empty($_POST['jour'])||empty($_POST['annee1'])||empty($_POST['mois1'])||empty($_POST['jour1']))
 {
 $datejour1 =date("Y-m-d");$datejour2 =date("Y-m-d");
 }
 else
 {
 $datejour1 = $_POST['annee'] .'-'.$_POST['mois'] .'-'.$_POST['jour'];$datejour2 = $_POST['annee1'].'-'.$_POST['mois1'].'-'.$_POST['jour1'];
 }
}
$datejour11 = $_POST['jour'].'-'.$_POST['mois'] .'-'.$_POST['annee'];$datejour22 = $_POST['jour1'].'-'.$_POST['mois1'].'-'.$_POST['annee1'];
if ($datejour1>$datejour2 or  $datejour1==$datejour2 )
{
header("Location: ../deces/eva") ;
}
if ($_POST['EPH']=='1') {$EPH='EPH_DJALFA';$EPH1="='1'";}
if ($_POST['EPH']=='2') {$EPH='EPH_AIN_OUSSERA';$EPH1="='2'";}
if ($_POST['EPH']=='3') {$EPH='EPH_HASSI_BAHBAH';$EPH1="='3'";}
if ($_POST['EPH']=='4') {$EPH='EPH_MESSAAD';$EPH1="='4'";}
if ($_POST['EPH']=='5') {$EPH='EHS_DJELFA';$EPH1="='5'";}
if ($_POST['EPH']=='6') {$EPH='EPH_IDRISSIA';$EPH1="='6'";}
if ($_POST['EPH']=='0') {$EPH='WILAYA_DJELFA';$EPH1="IS NOT NULL";}

//*****************************************************************************************************************//
// a. La mortalité infantile se définit comme étant le décès survenant chez les enfants âgés de 0 à 1 an.
// -Mortalité Néonatale Précoce   av     7 jours
// -Mortalité Néonatale Tardive   entre  7 à 27 jours
// -Mortalité post natale :       entre  28 jours  et 01 an
// b. La mortalité juvénile       entre  1 et 04 ans
// $pdf->AddPage();
// $pdf->SetXY(5,25);$pdf->cell(285,5,html_entity_decode(utf8_decode("Mortalité Générale "."Du ".$pdf->dateUS2FR($datejour1)." Au ".$pdf->dateUS2FR($datejour2))),1,0,'C',1,0);
// $pdf->SetXY(5,25+5);$pdf->cell(285,5,html_entity_decode(utf8_decode("Cette étude a porté sur 13358 décès survenus durant l'année 2002 au niveau de 12 wilaya retenues ")),0,0,'L',0);
if ($_POST['PDFHTML']=='2') 
{
header("Location: ../deces/HTML/") ;
}
if ($_POST['PDFHTML']=='3') 
{
header("Location: ../deces/NDECES/") ;
}

if ($_POST['PDFHTML']=='1') 
{
//1ere partie   Mortalite Intra-Hospitaliere
if ($_POST['deces']=='1') 
{
require('DEC.php');
$pdf = new DEC( 'P', 'mm', 'A4' );
$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$pdf->SetTitle('Deces Hospitalier '."Du ".$datejour1." Au ".$datejour2);$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,255);//text noire
$pdf->SetFont('Times', 'B', 16);$pdf->AliasNbPages();//prise encharge du nbr de page // $pdf->SetMargins(0,0,0);

$pdf->AddPage();//corige
$pdf->SetXY(5,10);$pdf->cell(200,5,"Republique Algerienne Democratique et Populaire ",0,0,'C',1,0);
$pdf->SetXY(5,20);$pdf->cell(200,5,"Ministere De La Sante De La Population Et De La Reforme Hospitaliere ",0,0,'C',1,0);
$pdf->SetXY(5,30);$pdf->cell(200,5,"Direction De La Sante Et De La Population De La Wilaya De Djelfa ",0,0,'C',1,0);
$pdf->SetTextColor(0,0,0);$pdf->SetTextColor(255,0,0);
$pdf->SetXY(5,70);$pdf->cell(200,5,"Mortalite Intra-Hospitaliere",0,0,'C',1,0);
$pdf->SetXY(5,80);$pdf->cell(200,5,"Du ".$pdf->dateUS2FR($datejour1)." Au ".$pdf->dateUS2FR($datejour2),0,0,'C',1,0);
$pdf->SetXY(5,90);$pdf->cell(200,5,$EPH,0,0,'C',1,0);
$pdf->SetXY(5,100);$pdf->cell(200,165,"",0,0,'C',1,0);
$pdf->SetXY(5,270);$pdf->cell(200,5,"Dr TIBA Redha ",0,0,'C',1,0);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Times', 'B', 11);

$pdf->AddPage();
$pdf->SetFont( 'Arial', '', 10 );
$pdf->servicehospitalisation(html_entity_decode(utf8_decode("I-Distribution des décès par Service D'hospitalisation")),$datejour1,$datejour2,'SERVICEHOSPIT',$EPH1);

$pdf->AddPage();
$pdf->SetFont( 'Arial', '', 10 );
//$pdf->dureehospitalisation1(html_entity_decode(utf8_decode("II-Distribution des décès par Durée D'hospitalisation")),$datejour1,$datejour2,'DUREEHOSPIT');
$pdf->dureehospitalisation1(html_entity_decode(utf8_decode("II-Distribution des décès par Durée D'hospitalisation")),$datejour1,$datejour2,'SERVICEHOSPIT',$EPH1);

$pdf->AddPage();//corige
$pdf->SetFont( 'Arial', '', 10 );
$pdf->SetXY(5,25);$pdf->cell(200,5,html_entity_decode(utf8_decode("III-Distribution des décès par tranche d'age et sexe (global)")),1,0,'C',1,0);
$pdf->SetFont( 'Arial', '', 10 );
$pdf->T2F20($pdf->dataagesexe(5,42,'Years','deceshosp','DINS','COMMUNER',$datejour1,$datejour2,$EPH1),$datejour1,$datejour2);

$pdf->AddPage();//corrige
$pdf->SetFont( 'Arial', '', 10 );
$pdf->SetXY(5,25);$pdf->cell(200,5,html_entity_decode(utf8_decode("IV-Distribution des décès par tranche d'age et sexe (pediatrique) ")),1,0,'C',1,0);
$pdf->T2F20PED($pdf->dataagesexeped(5,42,'Days','deceshosp','DINS','COMMUNER',$datejour1,$datejour2,$EPH1),$datejour1,$datejour2);

$pdf->AddPage();//corige
$pdf->SetFont( 'Arial', '', 10 );
$pdf->SetXY(5,25);$pdf->cell(200,5,html_entity_decode(utf8_decode("V-Distribution des décès par tranche d'age et sexe (Néonatale Précoce) ")),1,0,'C',1,0);
$pdf->T2F20PEDJ($pdf->dataagesexepedj(5,42,'Days','deceshosp','DINS','COMMUNER',$datejour1,$datejour2,$EPH1),$datejour1,$datejour2);

$pdf->AddPage();//corige
$pdf->SetFont( 'Arial', '', 10 );
$pdf->SetXY(5,25);$pdf->cell(200,5,html_entity_decode(utf8_decode("VI-Distribution des décès par communes de residence ")),1,0,'C',1,0);
$pdf->tblparcommune('Deces',$datejour1,$datejour2,$EPH1) ;

$pdf->AddPage();//corige
$pdf->SetFont( 'Arial', '', 10 );
$pdf->SetXY(5,25);$pdf->cell(200,5,html_entity_decode(utf8_decode("VII-Distribution des décès par communes de residence (SIG) ")),1,0,'C',1,0);

$pdf->djelfa($pdf->datasig($datejour1,$datejour2,$EPH1),20,128,3.7,'commune');//commune//dairas 
//a revoire non corrigé 
// $pdf->AddPage();
// $pdf->tblparcim1(html_entity_decode(utf8_decode("VIII-Distribution des causes de décès suivant la classification internationale des maladies cim10 (chapitres)")),$datejour1,$datejour2);//CODECIM

// $pdf->AddPage();
// $pdf->tblparcim(html_entity_decode(utf8_decode("IX-Distribution des causes de décès suivant la classification internationale des maladies cim10 (categories)")),$datejour1,$datejour2,'CIM1');

$pdf->SetXY(100,250); $pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(100,255); $pdf->cell(90,10,"Dr TIBA Redha ",0,0,'L',0);	
$pdf->Output();
}

// stringtostring($tb_name,$colonename,$colonevalue,$resultatstring)


//2eme partie   RELEVE DES CAUSES DE DEDECS
if ($_POST['deces']=='2') 
{
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
$pdf->Text(05,25,$EPH);	$pdf->Text(240,25," LE : ".date('d-m-Y'));
$pdf->Text(05,30,"SEMEP");
$pdf->Text(05,35,"N ... /".date('Y'));
$pdf->Text(60,35,"RELEVE DES CAUSES DE DEDECS ");
$pdf->Text(60,40,"Du  ".$pdf->dateUS2FR($datejour1)."  Au  ".$pdf->dateUS2FR($datejour2));
$pdf->Text(60,45,"Ref : circulaire numero 607 du 24 septembre 1994  ");
$h=50;
$pdf->SetFillColor(200 );
$pdf->SetXY(05,$h);
$pdf->cell(20,10,"Date Deces",1,0,1,'C',0);
$pdf->cell(20,10,"Age",1,0,1,'C',0);
$pdf->cell(20,10,"Sexe",1,0,1,'C',0);
$pdf->cell(50,10,"Commune De Residence ",1,0,1,'C',0);
$pdf->cell(25,10,"Profession",1,0,1,'C',0);
$pdf->cell(35,10,"Service ",1,0,1,'C',0);
$pdf->cell(15,10,"Duree",1,0,1,'C',0);
$pdf->cell(101,10,"Cause du deces",1,0,1,'C',0);
$pdf->SetXY(05,$h+10); 
$pdf->mysqlconnect();
$pdf->SetFont('Arial', '',9, '', true);
if ($_POST['EPH']!=='0') 
{
$STRUCTURED = $_POST['EPH'];
$query = "SELECT * FROM deceshosp where DINS BETWEEN '$datejour1' AND '$datejour2' and STRUCTURED='$STRUCTURED'  order by  DINS     ";
}
else
{
$query = "SELECT * FROM deceshosp where DINS BETWEEN '$datejour1' AND '$datejour2'  order by  DINS     ";// 
}
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$pdf->SetFillColor(200 );
$pdf->cell(20,5,$row->DINS,1,0,'C',0);
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
$pdf->cell(35,5,html_entity_decode(utf8_decode($pdf->nbrtostring("MVC","servicedeces","id",$row->SERVICEHOSPIT,"service"))),1,0,'L',0);//5  =hauteur de la cellule origine =7
$pdf->cell(15,5,$row->DUREEHOSPIT.' j',1,0,'L',0);
$pdf->cell(101,5,'('.$row->CODECIM.')_'.$row->CIM1,1,0,'L',0);
$pdf->SetXY(5,$pdf->GetY()+5); 
}
$pdf->SetFillColor(200 );
$pdf->SetFont('Arial', '',10, '', true);  
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(40,05,"TOTAL",1,0,1,'C',0);	  
$pdf->SetXY(45,$pdf->GetY());$pdf->cell(246,05,$totalmbr1." Deces",1,1,1,'C',0);				 
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}




//3eme partie   RELEVE DES CAUSES DE DEDECS
if ($_POST['deces']=='3') 
{
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
$pdf->Text(05,25,$EPH);	$pdf->Text(240,25," LE : ".date('d-m-Y'));
$pdf->Text(05,30,"SEMEP");
$pdf->Text(05,35,"N ... /".date('Y'));
$pdf->Text(60,35,"RELEVE DES CAUSES DE DEDECS ");
$pdf->Text(60,40,"Du  ".$pdf->dateUS2FR($datejour1)."  Au  ".$pdf->dateUS2FR($datejour2));
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
if ($_POST['EPH']!=='0') 
{
$STRUCTURED = $_POST['EPH'];
$query = "SELECT * FROM deceshosp where DINS BETWEEN '$datejour1' AND '$datejour2' and STRUCTURED='$STRUCTURED'  order by  DINS     ";
}
else
{
$query = "SELECT * FROM deceshosp where DINS BETWEEN '$datejour1' AND '$datejour2'  order by  DINS     ";// 
}
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
$pdf->cell(46,5,html_entity_decode(utf8_decode($pdf->nbrtostring("MVC","servicedeces","id",$row->SERVICEHOSPIT,"service"))),1,0,'L',0);
$pdf->cell(15,5,$row->DUREEHOSPIT.' j',1,0,'L',0);
$pdf->cell(10,5,$row->CIM1,1,0,'C',0);
$pdf->SetXY(5,$pdf->GetY()+5); 
}
$pdf->SetFillColor(200 );
$pdf->SetFont('Arial', '',10, '', true);  
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(40,05,"TOTAL",1,0,1,'C',0);	  
$pdf->SetXY(45,$pdf->GetY());$pdf->cell(246,05,$totalmbr1." Deces",1,1,1,'C',0);				 
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}
}

// $pdf->AddPage();
// $pdf->neonat('5','35','Days','1','28',html_entity_decode(utf8_decode("Distribution des décès en ")),$datejour1,$datejour2);
// $pdf->AddPage();
// $pdf->neonat('5','35','Months','1','12',html_entity_decode(utf8_decode("Distribution des décès en ")),$datejour1,$datejour2);
// $pdf->AddPage();
// $pdf->neonat('5','35','Years','1','15',html_entity_decode(utf8_decode("Distribution des décès en ")),$datejour1,$datejour2);
// $pdf->AddPage();
// $pdf->neonat1('SEX','1','15',html_entity_decode(utf8_decode("Distribution des décès en ")),$datejour1,$datejour2);
?>