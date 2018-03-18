<?php
if (!ISSET($_POST['annee'])||!ISSET($_POST['mois'])||!ISSET($_POST['jour'])||!ISSET($_POST['annee1'])||!ISSET($_POST['mois1'])||!ISSET($_POST['jour1']))
{
$datejour1 =date("Y-m-d");
$datejour2 =date("Y-m-d");
}
else
{
 if(empty($_POST['annee'])||empty($_POST['mois'])||empty($_POST['jour'])||empty($_POST['annee1'])||empty($_POST['mois1'])||empty($_POST['jour1']))
 {
 $datejour1 =date("Y-m-d");
 $datejour2 =date("Y-m-d");
 }
 else
 {
 $datejour1 = $_POST['annee'] .'-'.$_POST['mois'] .'-'.$_POST['jour'];
 $datejour2 = $_POST['annee1'].'-'.$_POST['mois1'].'-'.$_POST['jour1'];
 }
}
$datejour11 = $_POST['jour'].'-'.$_POST['mois'] .'-'.$_POST['annee'];
$datejour22 = $_POST['jour1'].'-'.$_POST['mois1'].'-'.$_POST['annee1'];
if ($datejour1>$datejour2 or  $datejour1==$datejour2 )
{
header("Location: ../scolaire/Evaluation/") ;
}
if ($_POST['EPSP']=='1') {$EPSP='EPSP_DJALFA';$epsp1="='1'";}
if ($_POST['EPSP']=='2') {$EPSP='EPSP_MESSAAD';$epsp1="='2'";}
if ($_POST['EPSP']=='3') {$EPSP='EPSP_GUETTARA';$epsp1="='3'";}
if ($_POST['EPSP']=='4') {$EPSP='EPSP_HASSI_BAHBAH';$epsp1="='4'";}
if ($_POST['EPSP']=='5') {$EPSP='EPSP_AIN_OUSSERA';$epsp1="='5'";}
if ($_POST['EPSP']=='0') {$EPSP='WILAYA_DJELFA';$epsp1="IS NOT NULL";}
//*****************************************************************************************************************//
if ($_POST['SS']=='0') //1ere partie
{
require('SSC.php');
$pdf = new SSC( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->Text(90,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(70,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ");
$pdf->Text(75,20,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA");
$pdf->Text(05,25,$EPSP);	$pdf->Text(240,25," LE 31/08/2012");
$pdf->Text(05,30,"SEMEP ");
$pdf->Text(05,35,"N.........../...");
$pdf->Text(60,35,"Effectifes des etablissements scolaires");
$pdf->Text(60,40,"Du  ".$pdf->dateUS2FR($datejour1)."  Au  ".$pdf->dateUS2FR($datejour2));
$pdf->Text(60,45,"Ref :  ");
$pdf->SetFillColor(200 );
$w=15;
$pdf->SetXY(05,50); $pdf->cell(45,5,"",1,0,1,'L',0);$pdf->cell($w*16,5,"Effectifs ",1,0,1,'L',0);
$pdf->SetXY(05,55); $pdf->cell(45,5,"",1,0,1,'L',0);$pdf->cell($w*6,5,"Primaire",1,0,1,'L',0);$pdf->cell($w*5,5,"Moyen",1,0,1,'L',0);$pdf->cell($w*4,5,"Secondaire",1,0,1,'L',0);$pdf->cell($w,5,"total",1,0,1,'L',0);


$pdf->SetXY(05,60); $pdf->cell(45,5,"Communes",1,0,1,'L',0);
$pdf->cell($w,5,"1AP",1,0,1,'L',0);
$pdf->cell($w,5,"2AP",1,0,1,'L',0);
$pdf->cell($w,5,"3AP",1,0,1,'L',0);
$pdf->cell($w,5,"4AP",1,0,1,'L',0);
$pdf->cell($w,5,"5AP",1,0,1,'L',0);
$pdf->cell($w,5,"TAP",1,0,1,'L',0);
$pdf->cell($w,5,"1AM",1,0,1,'L',0);
$pdf->cell($w,5,"2AM",1,0,1,'L',0);
$pdf->cell($w,5,"3AM",1,0,1,'L',0);
$pdf->cell($w,5,"4AM",1,0,1,'L',0);
$pdf->cell($w,5,"TAM",1,0,1,'L',0);
$pdf->cell($w,5,"1AS",1,0,1,'L',0);
$pdf->cell($w,5,"2AS",1,0,1,'L',0);
$pdf->cell($w,5,"3AS",1,0,1,'L',0);
$pdf->cell($w,5,"TAS",1,0,1,'L',0);
$pdf->cell($w,5,"TOTAL",1,0,1,'L',0);


$pdf->SetXY(05,65); 
$pdf->mysqlconnect();
$query = "SELECT  WILAYAR,COMMUNER,ETA,DATE,
 
sum(ap1) as Sap1, 
sum(ap2) as Sap2, 
sum(ap3) as Sap3, 
sum(ap4) as Sap4, 
sum(ap5) as Sap5, 
 
sum(am1) as Sam1, 
sum(am2) as Sam2, 
sum(am3) as Sam3, 
sum(am4) as Sam4,  
  
sum(as1) as Sas1, 
sum(as2) as Sas2, 
sum(as3) as Sas3 
 
from scol_effectif  GROUP BY  COMMUNER order by  COMMUNER asc  ";

$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{



$pdf->cell(45,5,$pdf->nbrtostring('com','IDCOM',$row->COMMUNER,'COMMUNE'),1,0,1,'L',0);
$pdf->cell($w,5,$row->Sap1,1,0,'L',0);
$pdf->cell($w,5,$row->Sap2,1,0,'L',0);
$pdf->cell($w,5,$row->Sap3,1,0,'L',0);
$pdf->cell($w,5,$row->Sap4,1,0,'L',0);
$pdf->cell($w,5,$row->Sap5,1,0,'L',0);
$pdf->cell($w,5,$row->Sap1+$row->Sap2+$row->Sap3+$row->Sap4+$row->Sap5,1,0,'L',0);

$pdf->cell($w,5,$row->Sam1,1,0,'L',0);
$pdf->cell($w,5,$row->Sam2,1,0,'L',0);
$pdf->cell($w,5,$row->Sam3,1,0,'L',0);
$pdf->cell($w,5,$row->Sam4,1,0,'L',0);
$pdf->cell($w,5,$row->Sam1+$row->Sam2+$row->Sam3+$row->Sam4,1,0,'L',0);

$pdf->cell($w,5,$row->Sas1,1,0,'L',0);
$pdf->cell($w,5,$row->Sas2,1,0,'L',0);
$pdf->cell($w,5,$row->Sas3,1,0,'L',0);
$pdf->cell($w,5,$row->Sas1+$row->Sas2+$row->Sas3,1,0,'L',0);

$pdf->cell($w,5,$row->Sap1+$row->Sap2+$row->Sap3+$row->Sap4+$row->Sap5+$row->Sam1+$row->Sam2+$row->Sam3+$row->Sam4+$row->Sas1+$row->Sas2+$row->Sas3,1,0,'L',0);


// $pdf->cell(45,5,$pdf->nbrtostring('com','IDCOM',$row->COMMUNER,'COMMUNE') ,1,0,'L',0);
// $pdf->cell(30,5,$pdf->counteta1($row->COMMUNER),1,0,'L',0);
// $pdf->cell(20,5,$pdf->counteta2($row->COMMUNER),1,0,'L',0);
// $pdf->cell(40,5,$pdf->counteta3($row->COMMUNER),1,0,'L',0);
// $pdf->cell(20,5,$pdf->counteta($row->COMMUNER),1,0,'L',0);
// $pdf->cell(20,5,$row->SCH,1,0,'L',0);
// $pdf->cell(10,5,$row->SSTCANTINE,1,0,'L',0);
// $pdf->cell(10,5,$row->SRGCANTINE,1,0,'L',0);
// $pdf->cell(15,5,$row->SSTENVIRONNEMENT,1,0,'L',0);
// $pdf->cell(15,5,$row->SRGENVIRONNEMENT,1,0,'L',0);
// $pdf->cell(10,5,$row->SSTAEP,1,0,'L',0);
// $pdf->cell(10,5,$row->SRGAEP,1,0,'L',0);
// $pdf->cell(10,5,$row->SSTSANITAIRE,1,0,'L',0);
// $pdf->cell(10,5,$row->SRGSANITAIRE,1,0,'L',0);
// $pdf->cell(10,5,$row->SSTCLASES,1,0,'L',0);
// $pdf->cell(10,5,$row->SRGCLASES,1,0,'L',0);
$pdf->SetXY(5,$pdf->GetY()+5); 
}
$pdf->cell(45,5,"TOTAL",1,0,1,'L',0);
$pdf->cell($w,5,"1AP",1,0,1,'L',0);
$pdf->cell($w,5,"2AP",1,0,1,'L',0);
$pdf->cell($w,5,"3AP",1,0,1,'L',0);
$pdf->cell($w,5,"4AP",1,0,1,'L',0);
$pdf->cell($w,5,"5AP",1,0,1,'L',0);
$pdf->cell($w,5,"TAP",1,0,1,'L',0);
$pdf->cell($w,5,"1AM",1,0,1,'L',0);
$pdf->cell($w,5,"2AM",1,0,1,'L',0);
$pdf->cell($w,5,"3AM",1,0,1,'L',0);
$pdf->cell($w,5,"4AM",1,0,1,'L',0);
$pdf->cell($w,5,"TAM",1,0,1,'L',0);
$pdf->cell($w,5,"1AS",1,0,1,'L',0);
$pdf->cell($w,5,"2AS",1,0,1,'L',0);
$pdf->cell($w,5,"3AS",1,0,1,'L',0);
$pdf->cell($w,5,"TAS",1,0,1,'L',0);
$pdf->cell($w,5,"TOTAL",1,0,1,'L',0);




// $pdf->cell(45,5,"Total ".$totalmbr1,1,0,1,'L',0);
// $pdf->cell(30,5,$pdf->counteta1t(),1,0,1,'L',0);
// $pdf->cell(20,5,$pdf->counteta2t(),1,0,1,'L',0);
// $pdf->cell(40,5,$pdf->counteta3t(),1,0,1,'L',0);
// $pdf->cell(20,5,$pdf->countetat(),1,0,1,'L',0);
// $pdf->cell(20,5,$pdf->sumhs('CH'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('STCANTINE'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('RGCANTINE'),1,0,1,'L',0);
// $pdf->cell(15,5,$pdf->sumhs('STENVIRONNEMENT'),1,0,1,'L',0);
// $pdf->cell(15,5,$pdf->sumhs('RGENVIRONNEMENT'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('STAEP'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('RGAEP'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('STSANITAIRE'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('RGSANITAIRE'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('STCLASES'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('RGCLASES'),1,0,1,'L',0);
// $pdf->SetXY(10,$pdf->GetY()+10); $pdf->cell(90,10,utf8_decode("1. Nombre d'établissements scolaires."),0,0,'L',0);
// $pdf->SetXY(10,$pdf->GetY()+5); $pdf->cell(90,10,utf8_decode("2. Nombre de cantines, y compris les réfectoires des internats ou demi-pensions."),0,0,'L',0); 
// $pdf->SetXY(10,$pdf->GetY()+5); $pdf->cell(90,10,utf8_decode("3. Nombre d'établissements dont les élèves (d'au moins une classe) ont été examinés pour visite médicale systématique de dépistage"),0,0,'L',0);
// $pdf->SetXY(10,$pdf->GetY()+5); $pdf->cell(90,10,utf8_decode("4. Nombre d'établissements scolaires dont l'hygiène des locaux a été contrôlée."),0,0,'L',0);
// $pdf->SetXY(10,$pdf->GetY()+5); $pdf->cell(90,10,utf8_decode("5. Nombre total de contrôles d'hygiène effectués dans ces établissements scolaires."),0,0,'L',0);
// $pdf->SetXY(10,$pdf->GetY()+5); $pdf->cell(90,10,utf8_decode("6. Nombre d'établissements scolaires pour lesquels des anomalies (une ou plusieurs) ont été signalées concernant les cantines, l'environnement,..."),0,0,'L',0);
// $pdf->SetXY(10,$pdf->GetY()+5); $pdf->cell(90,10,utf8_decode("7. Nombre d'établissements scolaires pour lesquels ces anomalies ont été corrigées en cours d'année."),0,0,'L',0);
$pdf->SetXY(200,$pdf->GetY()+10);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(200,$pdf->GetY()+5);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}
if ($_POST['SS']=='a') //1ere partie
{
require('SSC.php');
$pdf = new SSC( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->Text(90,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(70,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ");
$pdf->Text(75,20,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA");
$pdf->Text(05,25,$EPSP);	$pdf->Text(240,25," LE 31/08/2012");
$pdf->Text(05,30,"SEMEP ");
$pdf->Text(05,35,"N.........../...");
$pdf->Text(60,35,"Couverture sanitaire en milieu scolaire");
$pdf->Text(60,40,"Du  ".$pdf->dateUS2FR($datejour1)."  Au  ".$pdf->dateUS2FR($datejour2));
$pdf->Text(60,45,"Ref :  ");
$pdf->SetFillColor(200 );
$w=20;
$pdf->SetXY(05,50); $pdf->cell(45,5,"",1,0,1,'L',0);$pdf->cell($w*12,5,"Couverture sanitaire en milieu scolaire ",1,0,1,'L',0);
$pdf->SetXY(05,55); $pdf->cell(45,5,"",1,0,1,'L',0);$pdf->cell($w*4,5,"Effectifs",1,0,1,'L',0);$pdf->cell($w*8,5,"Examines",1,0,1,'L',0);
$pdf->SetXY(05,60); $pdf->cell(45,5,"Communes",1,0,1,'L',0);
$pdf->cell($w,5,"TAP",1,0,1,'L',0);
$pdf->cell($w,5,"TAM",1,0,1,'L',0);
$pdf->cell($w,5,"TAS",1,0,1,'L',0);
$pdf->cell($w,5,"TOTAL",1,0,1,'L',0);
$pdf->cell($w,5,"TAP",1,0,1,'L',0);
$pdf->cell($w,5,"%AP",1,0,1,'L',0);
$pdf->cell($w,5,"TAM",1,0,1,'L',0);
$pdf->cell($w,5,"%AM",1,0,1,'L',0);
$pdf->cell($w,5,"TAS",1,0,1,'L',0);
$pdf->cell($w,5,"%AM",1,0,1,'L',0);
$pdf->cell($w,5,"TOTAL",1,0,1,'L',0);
$pdf->cell($w,5,"%TOTAL",1,0,1,'L',0);





$pdf->SetXY(05,65); 
$pdf->mysqlconnect();
$query = "SELECT  WILAYAR,COMMUNER,ETA,DATE,
 
sum(ap1) as Sap1, 
sum(ap2) as Sap2, 
sum(ap3) as Sap3, 
sum(ap4) as Sap4, 
sum(ap5) as Sap5, 
 
sum(am1) as Sam1, 
sum(am2) as Sam2, 
sum(am3) as Sam3, 
sum(am4) as Sam4,  
  
sum(as1) as Sas1, 
sum(as2) as Sas2, 
sum(as3) as Sas3 
 
from scol_effectif  GROUP BY  COMMUNER order by  COMMUNER asc  ";

$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$p=$row->Sap1+$row->Sap2+$row->Sap3+$row->Sap4+$row->Sap5;$pe=0;
$m=$row->Sam1+$row->Sam2+$row->Sam3+$row->Sam4;           $me=0;
$s=$row->Sas1+$row->Sas2+$row->Sas3;                      $se=0;
$t=$p+$m+$s;$te=$pe+$me+$se;
$pdf->cell(45,5,$pdf->nbrtostring('com','IDCOM',$row->COMMUNER,'COMMUNE'),1,0,1,'L',0);
$pdf->cell($w,5,$p,1,0,'L',0);
$pdf->cell($w,5,$m,1,0,'L',0);
$pdf->cell($w,5,$s,1,0,'L',0);
$pdf->cell($w,5,$t,1,0,'L',0);
$pdf->cell($w,5,$pe,1,0,'L',0);
$pdf->cell($w,5,round($pe*100/$p,2),1,0,'L',0);
$pdf->cell($w,5,$me,1,0,'L',0);
$pdf->cell($w,5,round($me*100/$m,2),1,0,'L',0);
$pdf->cell($w,5,$se,1,0,'L',0);
$pdf->cell($w,5,round($se*100/$s,2),1,0,'L',0);
$pdf->cell($w,5,$te,1,0,'L',0);
$pdf->cell($w,5,round($te*100/$t,2),1,0,'L',0);
// $pdf->cell(45,5,$pdf->nbrtostring('com','IDCOM',$row->COMMUNER,'COMMUNE') ,1,0,'L',0);
// $pdf->cell(30,5,$pdf->counteta1($row->COMMUNER),1,0,'L',0);
// $pdf->cell(20,5,$pdf->counteta2($row->COMMUNER),1,0,'L',0);
// $pdf->cell(40,5,$pdf->counteta3($row->COMMUNER),1,0,'L',0);
// $pdf->cell(20,5,$pdf->counteta($row->COMMUNER),1,0,'L',0);

$pdf->SetXY(5,$pdf->GetY()+5); 
}
$pdf->cell(45,5,"Total ".$totalmbr1,1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
// $pdf->cell(30,5,$pdf->counteta1t(),1,0,1,'L',0);
// $pdf->cell(20,5,$pdf->counteta2t(),1,0,1,'L',0);
// $pdf->cell(40,5,$pdf->counteta3t(),1,0,1,'L',0);
// $pdf->cell(20,5,$pdf->countetat(),1,0,1,'L',0);
// $pdf->cell(20,5,$pdf->sumhs('CH'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('STCANTINE'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('RGCANTINE'),1,0,1,'L',0);
// $pdf->cell(15,5,$pdf->sumhs('STENVIRONNEMENT'),1,0,1,'L',0);
// $pdf->cell(15,5,$pdf->sumhs('RGENVIRONNEMENT'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('STAEP'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('RGAEP'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('STSANITAIRE'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('RGSANITAIRE'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('STCLASES'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('RGCLASES'),1,0,1,'L',0);
$pdf->SetXY(200,$pdf->GetY()+10);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(200,$pdf->GetY()+5);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}



if ($_POST['SS']=='1') //1ere partie
{
require('SSC.php');
$pdf = new SSC( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->Text(90,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(70,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ");
$pdf->Text(75,20,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA");
$pdf->Text(05,25,$EPSP);	$pdf->Text(240,25," LE 31/08/2012");
$pdf->Text(05,30,"SEMEP ");
$pdf->Text(05,35,"N.........../...");
$pdf->Text(60,35,"Affections depistees en milieu scolaire par eleve");
$pdf->Text(60,40,"Du  ".$pdf->dateUS2FR($datejour1)."  Au  ".$pdf->dateUS2FR($datejour2));
$pdf->Text(60,45,"Ref :  ");
$pdf->SetFillColor(200 );
$w=9;$h=42;$y=90;
$pdf->SetXY(05,$y-42); $pdf->cell(45,$h,"Etablissement",1,0,1,'L',0);
$pdf->Rotatedcell(50+(0*$w),$y,$h,$w,'Vaccination incomplete',90);
$pdf->Rotatedcell(50+(1*$w),$y,$h,$w,'Absence cicatrice BCG',90);
$pdf->Rotatedcell(50+(2*$w),$y,$h,$w,'Pediculose',90);
$pdf->Rotatedcell(50+(3*$w),$y,$h,$w,'Gale',90);
$pdf->Rotatedcell(50+(4*$w),$y,$h,$w,'Deformation des membres',90);
$pdf->Rotatedcell(50+(5*$w),$y,$h,$w,'Baisse acuite visuelle',90);
$pdf->Rotatedcell(50+(6*$w),$y,$h,$w,'Strabisme',90);
$pdf->Rotatedcell(50+(7*$w),$y,$h,$w,'Antecedents de RAA',90);
$pdf->Rotatedcell(50+(8*$w),$y,$h,$w,'Diabete',90);
$pdf->Rotatedcell(50+(9*$w),$y,$h,$w,'Asthme',90);
$pdf->Rotatedcell(50+(10*$w),$y,$h,$w,'Epilepsie',90);
$pdf->Rotatedcell(50+(11*$w),$y,$h,$w,'Difficultes scolaires',90);
$pdf->Rotatedcell(50+(12*$w),$y,$h,$w,'Troubles comportement',90);
$pdf->Rotatedcell(50+(13*$w),$y,$h,$w,'Troubles langage',90);
$pdf->Rotatedcell(50+(14*$w),$y,$h,$w,'Surdite Hypoacousie',90);
$pdf->Rotatedcell(50+(15*$w),$y,$h,$w,'Trachome',90);
$pdf->Rotatedcell(50+(16*$w),$y,$h,$w,'Oxyurose',90);
$pdf->Rotatedcell(50+(17*$w),$y,$h,$w,'Enuresie',90);
$pdf->Rotatedcell(50+(18*$w),$y,$h,$w,'Troubles urinaires',90);
$pdf->Rotatedcell(50+(19*$w),$y,$h,$w,'Ptosis Nystagmus',90);
$pdf->Rotatedcell(50+(20*$w),$y,$h,$w,'Paleur conjonctivale',90);
$pdf->Rotatedcell(50+(21*$w),$y,$h,$w,'Goitre',90);
$pdf->Rotatedcell(50+(22*$w),$y,$h,$w,'Souffle cardiaque',90);
$pdf->Rotatedcell(50+(23*$w),$y,$h,$w,'Deformations du rachis',90);
$pdf->Rotatedcell(50+(24*$w),$y,$h,$w,'Ectopie testiculaire',90);
$pdf->Rotatedcell(50+(25*$w),$y,$h,$w,'Total affections depistees',90);
$pdf->Rotatedcell(50+(26*$w),$y,$h,$w,'Total eleves examines',90);
$pdf->SetXY(05,$y); 
$pdf->mysqlconnect();
$query = "SELECT * FROM  scolaire";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$SAD=$row->AD1+$row->AD2+$row->AD3+$row->AD4+$row->AD5+$row->AD6+$row->AD7+$row->AD8+$row->AD9+$row->AD10+$row->AD11+$row->AD12+$row->AD13+$row->AD14+$row->AD15+$row->AD16+$row->AD17+$row->AD18+$row->AD19+$row->AD20+$row->AD21+$row->AD22+$row->AD23+$row->AD24+$row->AD25;
$pdf->SetFillColor(200 );
$pdf->cell(45,5,$row->NEC,1,0,'C',0);
if($row->AD1==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD2==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD3==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD4==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD5==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD6==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD7==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD8==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD9==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD10==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD11==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD12==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD13==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD14==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD15==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD16==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD17==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD18==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD19==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD20==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD21==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD22==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD23==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD24==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
if($row->AD25==1) {$pdf->cell(9,5,'x',1,0,'C',0);} else {$pdf->cell(9,5,'-',1,0,'C',0);}
$pdf->cell(9,5,$SAD,1,0,'C',0);
$pdf->cell(9,5,'',1,0,'C',0);
$pdf->SetXY(5,$pdf->GetY()+5); 
}
$sumad=$pdf->sumad('AD1')+$pdf->sumad('AD2')+$pdf->sumad('AD3')+$pdf->sumad('AD4')+$pdf->sumad('AD5')+$pdf->sumad('AD6')+$pdf->sumad('AD7')+$pdf->sumad('AD8')+$pdf->sumad('AD9')+$pdf->sumad('AD10')
+$pdf->sumad('AD11')+$pdf->sumad('AD12')+$pdf->sumad('AD13')+$pdf->sumad('AD14')+$pdf->sumad('AD15')+$pdf->sumad('AD16')+$pdf->sumad('AD17')+$pdf->sumad('AD18')+$pdf->sumad('AD19')+$pdf->sumad('AD20')
+$pdf->sumad('AD21')+$pdf->sumad('AD22')+$pdf->sumad('AD23')+$pdf->sumad('AD24')+$pdf->sumad('AD25');
$pdf->SetXY(5,$pdf->GetY());
$pdf->cell(45,05,"TOTAL : ".$totalmbr1,1,0,1,'L',0);	  
$pdf->cell(9,5,$pdf->sumad('AD1'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD2'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD3'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD4'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD5'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD6'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD7'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD8'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD9'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD10'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD11'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD12'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD13'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD14'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD15'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD16'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD17'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD18'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD19'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD20'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD21'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD22'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD23'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD24'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD25'),1,0,1,'C',0);
$pdf->cell(9,5,$sumad,1,0,1,'C',0);
$pdf->cell(9,5,'',1,0,1,'C',0);
// $pdf->SetFont('Arial','B',9);$pdf->temporaire( 'tibaredha' );$pdf->SetFont('Arial','B',9);
$pdf->SetXY(190,$pdf->GetY()+10); $pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}
if ($_POST['SS']=='2') //2eME partie par e regroupement  
{
require('SSC.php');
$pdf = new SSC( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);


$groupage='ETA';//id,WILAYAN,COMMUNEN,NEC,WILAYAR,COMMUNER,ETA,DATE,   (valeur de regrouppement  des donnees)


$pdf->Text(90,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(70,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ");
$pdf->Text(75,20,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA");
$pdf->Text(05,25,$EPSP);	$pdf->Text(240,25," LE 31/08/2012");
$pdf->Text(05,30,"SEMEP ");
$pdf->Text(05,35,"N.........../...");
$pdf->Text(60,35,"Affections depistees en milieu scolaire par ".$groupage);
$pdf->Text(60,40,"Du  ".$pdf->dateUS2FR($datejour1)."  Au  ".$pdf->dateUS2FR($datejour2));
$pdf->Text(60,45,"Ref :  ");
$pdf->SetFillColor(200 );
$w=9;$h=42;$y=90;
$pdf->SetXY(05,$y-42); $pdf->cell(45,$h,"Etablissement",1,0,1,'L',0);
$pdf->Rotatedcell(50+(0*$w),$y,$h,$w,'Vaccination incomplete',90);
$pdf->Rotatedcell(50+(1*$w),$y,$h,$w,'Absence cicatrice BCG',90);
$pdf->Rotatedcell(50+(2*$w),$y,$h,$w,'Pediculose',90);
$pdf->Rotatedcell(50+(3*$w),$y,$h,$w,'Gale',90);
$pdf->Rotatedcell(50+(4*$w),$y,$h,$w,'Deformation des membres',90);
$pdf->Rotatedcell(50+(5*$w),$y,$h,$w,'Baisse acuite visuelle',90);
$pdf->Rotatedcell(50+(6*$w),$y,$h,$w,'Strabisme',90);
$pdf->Rotatedcell(50+(7*$w),$y,$h,$w,'Antecedents de RAA',90);
$pdf->Rotatedcell(50+(8*$w),$y,$h,$w,'Diabete',90);
$pdf->Rotatedcell(50+(9*$w),$y,$h,$w,'Asthme',90);
$pdf->Rotatedcell(50+(10*$w),$y,$h,$w,'Epilepsie',90);
$pdf->Rotatedcell(50+(11*$w),$y,$h,$w,'Difficultes scolaires',90);
$pdf->Rotatedcell(50+(12*$w),$y,$h,$w,'Troubles comportement',90);
$pdf->Rotatedcell(50+(13*$w),$y,$h,$w,'Troubles langage',90);
$pdf->Rotatedcell(50+(14*$w),$y,$h,$w,'Surdite Hypoacousie',90);
$pdf->Rotatedcell(50+(15*$w),$y,$h,$w,'Trachome',90);
$pdf->Rotatedcell(50+(16*$w),$y,$h,$w,'Oxyurose',90);
$pdf->Rotatedcell(50+(17*$w),$y,$h,$w,'Enuresie',90);
$pdf->Rotatedcell(50+(18*$w),$y,$h,$w,'Troubles urinaires',90);
$pdf->Rotatedcell(50+(19*$w),$y,$h,$w,'Ptosis Nystagmus',90);
$pdf->Rotatedcell(50+(20*$w),$y,$h,$w,'Paleur conjonctivale',90);
$pdf->Rotatedcell(50+(21*$w),$y,$h,$w,'Goitre',90);
$pdf->Rotatedcell(50+(22*$w),$y,$h,$w,'Souffle cardiaque',90);
$pdf->Rotatedcell(50+(23*$w),$y,$h,$w,'Deformations du rachis',90);
$pdf->Rotatedcell(50+(24*$w),$y,$h,$w,'Ectopie testiculaire',90);
$pdf->Rotatedcell(50+(25*$w),$y,$h,$w,'Total affections depistees',90);
$pdf->Rotatedcell(50+(26*$w),$y,$h,$w,'Total eleves examines',90);

$pdf->SetXY(05,$y); 
$pdf->mysqlconnect();
$query = "SELECT id,WILAYAN,COMMUNEN,NEC,WILAYAR,COMMUNER,ETA,DATE,
sum(AD1) as ADS1,
sum(AD2) as ADS2,
sum(AD3) as ADS3,
sum(AD4) as ADS4,
sum(AD5) as ADS5,
sum(AD6) as ADS6,
sum(AD7) as ADS7,
sum(AD8) as ADS8,
sum(AD9) as ADS9,
sum(AD10) as ADS10,
sum(AD11) as ADS11,
sum(AD12) as ADS12,
sum(AD13) as ADS13,
sum(AD14) as ADS14,
sum(AD15) as ADS15,
sum(AD16) as ADS16,
sum(AD17) as ADS17,
sum(AD18) as ADS18,
sum(AD19) as ADS19,
sum(AD20) as ADS20,
sum(AD21) as ADS21,
sum(AD22) as ADS22,
sum(AD23) as ADS23,
sum(AD24) as ADS24,
sum(AD25) as ADS25
FROM  scolaire  GROUP BY $groupage  order by $groupage desc ";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$SADS=$row->ADS1+$row->ADS2+$row->ADS3+$row->ADS4+$row->ADS5+$row->ADS6+$row->ADS7+$row->ADS8+$row->ADS9+$row->ADS10+$row->ADS11+$row->ADS12+$row->ADS13+$row->ADS14+$row->ADS15+$row->ADS16+$row->ADS17+$row->ADS18+$row->ADS19+$row->ADS20+$row->ADS21+$row->ADS22+$row->ADS23+$row->ADS24+$row->ADS25;
$pdf->SetFillColor(200 );
$pdf->cell(45,5,$row->$groupage,1,0,'C',0);
$pdf->cell(9,5,$row->ADS1,1,0,'C',0);
$pdf->cell(9,5,$row->ADS2,1,0,'C',0);
$pdf->cell(9,5,$row->ADS3,1,0,'C',0);
$pdf->cell(9,5,$row->ADS4,1,0,'C',0);
$pdf->cell(9,5,$row->ADS5,1,0,'C',0);
$pdf->cell(9,5,$row->ADS6,1,0,'C',0);
$pdf->cell(9,5,$row->ADS7,1,0,'C',0);
$pdf->cell(9,5,$row->ADS8,1,0,'C',0);
$pdf->cell(9,5,$row->ADS9,1,0,'C',0);
$pdf->cell(9,5,$row->ADS10,1,0,'C',0);
$pdf->cell(9,5,$row->ADS11,1,0,'C',0);
$pdf->cell(9,5,$row->ADS12,1,0,'C',0);
$pdf->cell(9,5,$row->ADS13,1,0,'C',0);
$pdf->cell(9,5,$row->ADS14,1,0,'C',0);
$pdf->cell(9,5,$row->ADS15,1,0,'C',0);
$pdf->cell(9,5,$row->ADS16,1,0,'C',0);
$pdf->cell(9,5,$row->ADS17,1,0,'C',0);
$pdf->cell(9,5,$row->ADS18,1,0,'C',0);
$pdf->cell(9,5,$row->ADS19,1,0,'C',0);
$pdf->cell(9,5,$row->ADS20,1,0,'C',0);
$pdf->cell(9,5,$row->ADS21,1,0,'C',0);
$pdf->cell(9,5,$row->ADS22,1,0,'C',0);
$pdf->cell(9,5,$row->ADS23,1,0,'C',0);
$pdf->cell(9,5,$row->ADS24,1,0,'C',0);
$pdf->cell(9,5,$row->ADS25,1,0,'C',0);
$pdf->cell(9,5,$SADS,1,0,'C',0);
$pdf->cell(9,5,'',1,0,'C',0);
$pdf->SetXY(5,$pdf->GetY()+5); 
}
$sumad=$pdf->sumad('AD1')+$pdf->sumad('AD2')+$pdf->sumad('AD3')+$pdf->sumad('AD4')+$pdf->sumad('AD5')+$pdf->sumad('AD6')+$pdf->sumad('AD7')+$pdf->sumad('AD8')+$pdf->sumad('AD9')+$pdf->sumad('AD10')
+$pdf->sumad('AD11')+$pdf->sumad('AD12')+$pdf->sumad('AD13')+$pdf->sumad('AD14')+$pdf->sumad('AD15')+$pdf->sumad('AD16')+$pdf->sumad('AD17')+$pdf->sumad('AD18')+$pdf->sumad('AD19')+$pdf->sumad('AD20')
+$pdf->sumad('AD21')+$pdf->sumad('AD22')+$pdf->sumad('AD23')+$pdf->sumad('AD24')+$pdf->sumad('AD25');
$pdf->SetXY(5,$pdf->GetY());
$pdf->cell(45,05,"TOTAL : ".$totalmbr1,1,0,1,'L',0);	  
$pdf->cell(9,5,$pdf->sumad('AD1'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD2'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD3'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD4'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD5'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD6'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD7'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD8'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD9'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD10'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD11'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD12'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD13'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD14'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD15'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD16'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD17'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD18'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD19'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD20'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD21'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD22'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD23'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD24'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD25'),1,0,1,'C',0);
$pdf->cell(9,5,$sumad,1,0,1,'C',0);
$pdf->cell(9,5,'',1,0,1,'C',0);
// $pdf->SetFont('Arial','B',9);$pdf->temporaire( 'tibaredha' );$pdf->SetFont('Arial','B',9);
$pdf->SetXY(190,$pdf->GetY()+10); $pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}
if ($_POST['SS']=='3') //2eME partie par e regroupement  
{
require('SSC.php');
$pdf = new SSC( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);


$groupage='COMMUNER';//id,WILAYAN,COMMUNEN,NEC,WILAYAR,COMMUNER,ETA,DATE,   (valeur de regrouppement  des donnees)


$pdf->Text(90,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(70,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ");
$pdf->Text(75,20,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA");
$pdf->Text(05,25,$EPSP);	$pdf->Text(240,25," LE 31/08/2012");
$pdf->Text(05,30,"SEMEP ");
$pdf->Text(05,35,"N.........../...");
$pdf->Text(60,35,"Affections depistees en milieu scolaire par ".$groupage);
$pdf->Text(60,40,"Du  ".$pdf->dateUS2FR($datejour1)."  Au  ".$pdf->dateUS2FR($datejour2));
$pdf->Text(60,45,"Ref :  ");
$pdf->SetFillColor(200 );
$w=9;$h=42;$y=90;
$pdf->SetXY(05,$y-42); $pdf->cell(45,$h,"Etablissement",1,0,1,'L',0);
$pdf->Rotatedcell(50+(0*$w),$y,$h,$w,'Vaccination incomplete',90);
$pdf->Rotatedcell(50+(1*$w),$y,$h,$w,'Absence cicatrice BCG',90);
$pdf->Rotatedcell(50+(2*$w),$y,$h,$w,'Pediculose',90);
$pdf->Rotatedcell(50+(3*$w),$y,$h,$w,'Gale',90);
$pdf->Rotatedcell(50+(4*$w),$y,$h,$w,'Deformation des membres',90);
$pdf->Rotatedcell(50+(5*$w),$y,$h,$w,'Baisse acuite visuelle',90);
$pdf->Rotatedcell(50+(6*$w),$y,$h,$w,'Strabisme',90);
$pdf->Rotatedcell(50+(7*$w),$y,$h,$w,'Antecedents de RAA',90);
$pdf->Rotatedcell(50+(8*$w),$y,$h,$w,'Diabete',90);
$pdf->Rotatedcell(50+(9*$w),$y,$h,$w,'Asthme',90);
$pdf->Rotatedcell(50+(10*$w),$y,$h,$w,'Epilepsie',90);
$pdf->Rotatedcell(50+(11*$w),$y,$h,$w,'Difficultes scolaires',90);
$pdf->Rotatedcell(50+(12*$w),$y,$h,$w,'Troubles comportement',90);
$pdf->Rotatedcell(50+(13*$w),$y,$h,$w,'Troubles langage',90);
$pdf->Rotatedcell(50+(14*$w),$y,$h,$w,'Surdite Hypoacousie',90);
$pdf->Rotatedcell(50+(15*$w),$y,$h,$w,'Trachome',90);
$pdf->Rotatedcell(50+(16*$w),$y,$h,$w,'Oxyurose',90);
$pdf->Rotatedcell(50+(17*$w),$y,$h,$w,'Enuresie',90);
$pdf->Rotatedcell(50+(18*$w),$y,$h,$w,'Troubles urinaires',90);
$pdf->Rotatedcell(50+(19*$w),$y,$h,$w,'Ptosis Nystagmus',90);
$pdf->Rotatedcell(50+(20*$w),$y,$h,$w,'Paleur conjonctivale',90);
$pdf->Rotatedcell(50+(21*$w),$y,$h,$w,'Goitre',90);
$pdf->Rotatedcell(50+(22*$w),$y,$h,$w,'Souffle cardiaque',90);
$pdf->Rotatedcell(50+(23*$w),$y,$h,$w,'Deformations du rachis',90);
$pdf->Rotatedcell(50+(24*$w),$y,$h,$w,'Ectopie testiculaire',90);
$pdf->Rotatedcell(50+(25*$w),$y,$h,$w,'Total affections depistees',90);
$pdf->Rotatedcell(50+(26*$w),$y,$h,$w,'Total eleves examines',90);

$pdf->SetXY(05,$y); 
$pdf->mysqlconnect();
$query = "SELECT id,WILAYAN,COMMUNEN,NEC,WILAYAR,COMMUNER,ETA,DATE,
sum(AD1) as ADS1,
sum(AD2) as ADS2,
sum(AD3) as ADS3,
sum(AD4) as ADS4,
sum(AD5) as ADS5,
sum(AD6) as ADS6,
sum(AD7) as ADS7,
sum(AD8) as ADS8,
sum(AD9) as ADS9,
sum(AD10) as ADS10,
sum(AD11) as ADS11,
sum(AD12) as ADS12,
sum(AD13) as ADS13,
sum(AD14) as ADS14,
sum(AD15) as ADS15,
sum(AD16) as ADS16,
sum(AD17) as ADS17,
sum(AD18) as ADS18,
sum(AD19) as ADS19,
sum(AD20) as ADS20,
sum(AD21) as ADS21,
sum(AD22) as ADS22,
sum(AD23) as ADS23,
sum(AD24) as ADS24,
sum(AD25) as ADS25
FROM  scolaire  GROUP BY $groupage  order by $groupage desc ";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$SADS=$row->ADS1+$row->ADS2+$row->ADS3+$row->ADS4+$row->ADS5+$row->ADS6+$row->ADS7+$row->ADS8+$row->ADS9+$row->ADS10+$row->ADS11+$row->ADS12+$row->ADS13+$row->ADS14+$row->ADS15+$row->ADS16+$row->ADS17+$row->ADS18+$row->ADS19+$row->ADS20+$row->ADS21+$row->ADS22+$row->ADS23+$row->ADS24+$row->ADS25;
$pdf->SetFillColor(200 );
$pdf->cell(45,5,$row->$groupage,1,0,'C',0);
$pdf->cell(9,5,$row->ADS1,1,0,'C',0);
$pdf->cell(9,5,$row->ADS2,1,0,'C',0);
$pdf->cell(9,5,$row->ADS3,1,0,'C',0);
$pdf->cell(9,5,$row->ADS4,1,0,'C',0);
$pdf->cell(9,5,$row->ADS5,1,0,'C',0);
$pdf->cell(9,5,$row->ADS6,1,0,'C',0);
$pdf->cell(9,5,$row->ADS7,1,0,'C',0);
$pdf->cell(9,5,$row->ADS8,1,0,'C',0);
$pdf->cell(9,5,$row->ADS9,1,0,'C',0);
$pdf->cell(9,5,$row->ADS10,1,0,'C',0);
$pdf->cell(9,5,$row->ADS11,1,0,'C',0);
$pdf->cell(9,5,$row->ADS12,1,0,'C',0);
$pdf->cell(9,5,$row->ADS13,1,0,'C',0);
$pdf->cell(9,5,$row->ADS14,1,0,'C',0);
$pdf->cell(9,5,$row->ADS15,1,0,'C',0);
$pdf->cell(9,5,$row->ADS16,1,0,'C',0);
$pdf->cell(9,5,$row->ADS17,1,0,'C',0);
$pdf->cell(9,5,$row->ADS18,1,0,'C',0);
$pdf->cell(9,5,$row->ADS19,1,0,'C',0);
$pdf->cell(9,5,$row->ADS20,1,0,'C',0);
$pdf->cell(9,5,$row->ADS21,1,0,'C',0);
$pdf->cell(9,5,$row->ADS22,1,0,'C',0);
$pdf->cell(9,5,$row->ADS23,1,0,'C',0);
$pdf->cell(9,5,$row->ADS24,1,0,'C',0);
$pdf->cell(9,5,$row->ADS25,1,0,'C',0);
$pdf->cell(9,5,$SADS,1,0,'C',0);
$pdf->cell(9,5,'',1,0,'C',0);
$pdf->SetXY(5,$pdf->GetY()+5); 
}
$sumad=$pdf->sumad('AD1')+$pdf->sumad('AD2')+$pdf->sumad('AD3')+$pdf->sumad('AD4')+$pdf->sumad('AD5')+$pdf->sumad('AD6')+$pdf->sumad('AD7')+$pdf->sumad('AD8')+$pdf->sumad('AD9')+$pdf->sumad('AD10')
+$pdf->sumad('AD11')+$pdf->sumad('AD12')+$pdf->sumad('AD13')+$pdf->sumad('AD14')+$pdf->sumad('AD15')+$pdf->sumad('AD16')+$pdf->sumad('AD17')+$pdf->sumad('AD18')+$pdf->sumad('AD19')+$pdf->sumad('AD20')
+$pdf->sumad('AD21')+$pdf->sumad('AD22')+$pdf->sumad('AD23')+$pdf->sumad('AD24')+$pdf->sumad('AD25');
$pdf->SetXY(5,$pdf->GetY());
$pdf->cell(45,05,"TOTAL : ".$totalmbr1,1,0,1,'L',0);	  
$pdf->cell(9,5,$pdf->sumad('AD1'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD2'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD3'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD4'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD5'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD6'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD7'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD8'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD9'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD10'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD11'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD12'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD13'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD14'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD15'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD16'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD17'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD18'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD19'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD20'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD21'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD22'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD23'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD24'),1,0,1,'C',0);
$pdf->cell(9,5,$pdf->sumad('AD25'),1,0,1,'C',0);
$pdf->cell(9,5,$sumad,1,0,1,'C',0);
$pdf->cell(9,5,'',1,0,1,'C',0);
// $pdf->SetFont('Arial','B',9);$pdf->temporaire( 'tibaredha' );$pdf->SetFont('Arial','B',9);
$pdf->SetXY(190,$pdf->GetY()+10); $pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}


if ($_POST['SS']=='4') //1ere partie
{
require('SSC.php');
$pdf = new SSC( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->Text(90,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(70,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ");
$pdf->Text(75,20,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA");
$pdf->Text(05,25,$EPSP);	$pdf->Text(240,25," LE 31/08/2012");
$pdf->Text(05,30,"SEMEP ");
$pdf->Text(05,35,"N.........../...");
$pdf->Text(60,35,"Hygiene et salubrite des etablissements scolaires");
$pdf->Text(60,40,"Du  ".$pdf->dateUS2FR($datejour1)."  Au  ".$pdf->dateUS2FR($datejour2));
$pdf->Text(60,45,"Ref :  ");
$pdf->SetFillColor(200 );

$pdf->SetXY(05,50); $pdf->cell(45,5,"",1,0,1,'L',0);$pdf->cell(30,5,"Nombre ",1,0,1,'L',0);$pdf->cell(20,5,"Nombre ",1,0,1,'L',0);$pdf->cell(40,5,"Nombre ",1,0,1,'L',0);$pdf->cell(40,5,"Controle ",1,0,1,'L',0);$pdf->cell(110,5,"Anomalies Constatees / Corrections Apportees",1,0,1,'L',0);
$pdf->SetXY(05,55); $pdf->cell(45,5,"",1,0,1,'L',0);$pdf->cell(30,5,"Etablissement",1,0,1,'L',0);$pdf->cell(20,5,"Cantines",1,0,1,'L',0);$pdf->cell(40,5,"Etablissement D E EX",1,0,1,'L',0);$pdf->cell(40,5,"D'hygiene",1,0,1,'L',0);$pdf->cell(20,5,"Cantine",1,0,1,'L',0);$pdf->cell(30,5,"Environnement",1,0,1,'L',0);$pdf->cell(20,5,"Eau",1,0,1,'L',0);$pdf->cell(20,5,"Sanitaire",1,0,1,'L',0);$pdf->cell(20,5,"Classes",1,0,1,'L',0);


$pdf->SetXY(05,60); $pdf->cell(45,5,"Communes",1,0,1,'L',0);
$pdf->cell(30,5,"1",1,0,1,'L',0);
$pdf->cell(20,5,"2",1,0,1,'L',0);
$pdf->cell(40,5,"3",1,0,1,'L',0);
$pdf->cell(20,5,"4",1,0,1,'L',0);
$pdf->cell(20,5,"5",1,0,1,'L',0);
$pdf->cell(10,5,"6",1,0,1,'L',0);
$pdf->cell(10,5,"7",1,0,1,'L',0);
$pdf->cell(15,5,"6",1,0,1,'L',0);
$pdf->cell(15,5,"7",1,0,1,'L',0);
$pdf->cell(10,5,"6",1,0,1,'L',0);
$pdf->cell(10,5,"7",1,0,1,'L',0);
$pdf->cell(10,5,"6",1,0,1,'L',0);
$pdf->cell(10,5,"7",1,0,1,'L',0);
$pdf->cell(10,5,"6",1,0,1,'L',0);
$pdf->cell(10,5,"7",1,0,1,'L',0);

$pdf->SetXY(05,65); 
$pdf->mysqlconnect();
$query = "SELECT ETA,CH,STCANTINE,RGCANTINE,STENVIRONNEMENT,RGENVIRONNEMENT,STAEP,RGAEP,STSANITAIRE,RGSANITAIRE,STCLASES,RGCLASES,COMMUNER,

sum(CH) as SCH,

sum(STCANTINE) as SSTCANTINE,
sum(RGCANTINE) as SRGCANTINE,

sum(STENVIRONNEMENT) as SSTENVIRONNEMENT,
sum(RGENVIRONNEMENT) as SRGENVIRONNEMENT,

sum(STAEP) as SSTAEP,
sum(RGAEP) as SRGAEP,

sum(STSANITAIRE) as SSTSANITAIRE,
sum(RGSANITAIRE) as SRGSANITAIRE,

sum(STCLASES) as SSTCLASES,
sum(RGCLASES) as SRGCLASES

FROM  chsl  GROUP BY  COMMUNER order by  COMMUNER asc";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$pdf->cell(45,5,$pdf->nbrtostring('com','IDCOM',$row->COMMUNER,'COMMUNE') ,1,0,'L',0);
$pdf->cell(30,5,$pdf->counteta1($row->COMMUNER),1,0,'L',0);
$pdf->cell(20,5,$pdf->counteta2($row->COMMUNER),1,0,'L',0);
$pdf->cell(40,5,$pdf->counteta3($row->COMMUNER),1,0,'L',0);
$pdf->cell(20,5,$pdf->counteta($row->COMMUNER),1,0,'L',0);
$pdf->cell(20,5,$row->SCH,1,0,'L',0);
$pdf->cell(10,5,$row->SSTCANTINE,1,0,'L',0);
$pdf->cell(10,5,$row->SRGCANTINE,1,0,'L',0);
$pdf->cell(15,5,$row->SSTENVIRONNEMENT,1,0,'L',0);
$pdf->cell(15,5,$row->SRGENVIRONNEMENT,1,0,'L',0);
$pdf->cell(10,5,$row->SSTAEP,1,0,'L',0);
$pdf->cell(10,5,$row->SRGAEP,1,0,'L',0);
$pdf->cell(10,5,$row->SSTSANITAIRE,1,0,'L',0);
$pdf->cell(10,5,$row->SRGSANITAIRE,1,0,'L',0);
$pdf->cell(10,5,$row->SSTCLASES,1,0,'L',0);
$pdf->cell(10,5,$row->SRGCLASES,1,0,'L',0);
$pdf->SetXY(5,$pdf->GetY()+5); 
}
$pdf->cell(45,5,"Total ".$totalmbr1,1,0,1,'L',0);
$pdf->cell(30,5,$pdf->counteta1t(),1,0,1,'L',0);
$pdf->cell(20,5,$pdf->counteta2t(),1,0,1,'L',0);
$pdf->cell(40,5,$pdf->counteta3t(),1,0,1,'L',0);
$pdf->cell(20,5,$pdf->countetat(),1,0,1,'L',0);
$pdf->cell(20,5,$pdf->sumhs('CH'),1,0,1,'L',0);
$pdf->cell(10,5,$pdf->sumhs('STCANTINE'),1,0,1,'L',0);
$pdf->cell(10,5,$pdf->sumhs('RGCANTINE'),1,0,1,'L',0);
$pdf->cell(15,5,$pdf->sumhs('STENVIRONNEMENT'),1,0,1,'L',0);
$pdf->cell(15,5,$pdf->sumhs('RGENVIRONNEMENT'),1,0,1,'L',0);
$pdf->cell(10,5,$pdf->sumhs('STAEP'),1,0,1,'L',0);
$pdf->cell(10,5,$pdf->sumhs('RGAEP'),1,0,1,'L',0);
$pdf->cell(10,5,$pdf->sumhs('STSANITAIRE'),1,0,1,'L',0);
$pdf->cell(10,5,$pdf->sumhs('RGSANITAIRE'),1,0,1,'L',0);
$pdf->cell(10,5,$pdf->sumhs('STCLASES'),1,0,1,'L',0);
$pdf->cell(10,5,$pdf->sumhs('RGCLASES'),1,0,1,'L',0);
$pdf->SetXY(10,$pdf->GetY()+10); $pdf->cell(90,10,utf8_decode("1. Nombre d'établissements scolaires."),0,0,'L',0);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->cell(90,10,utf8_decode("2. Nombre de cantines, y compris les réfectoires des internats ou demi-pensions."),0,0,'L',0); 
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->cell(90,10,utf8_decode("3. Nombre d'établissements dont les élèves (d'au moins une classe) ont été examinés pour visite médicale systématique de dépistage"),0,0,'L',0);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->cell(90,10,utf8_decode("4. Nombre d'établissements scolaires dont l'hygiène des locaux a été contrôlée."),0,0,'L',0);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->cell(90,10,utf8_decode("5. Nombre total de contrôles d'hygiène effectués dans ces établissements scolaires."),0,0,'L',0);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->cell(90,10,utf8_decode("6. Nombre d'établissements scolaires pour lesquels des anomalies (une ou plusieurs) ont été signalées concernant les cantines, l'environnement,..."),0,0,'L',0);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->cell(90,10,utf8_decode("7. Nombre d'établissements scolaires pour lesquels ces anomalies ont été corrigées en cours d'année."),0,0,'L',0);
$pdf->SetXY(200,$pdf->GetY()+10);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(200,$pdf->GetY()+5);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}



if ($_POST['SS']=='5') //1ere partie
{
require('SSC.php');
$pdf = new SSC( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->Text(90,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(70,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ");
$pdf->Text(75,20,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA");
$pdf->Text(05,25,$EPSP);	$pdf->Text(240,25," LE 31/08/2012");
$pdf->Text(05,30,"SEMEP ");
$pdf->Text(05,35,"N.........../...");
$pdf->Text(60,35,"Suivi et prise en charge des affections depistees en milieu scolaire");
$pdf->Text(60,40,"Du  ".$pdf->dateUS2FR($datejour1)."  Au  ".$pdf->dateUS2FR($datejour2));
$pdf->Text(60,45,"Ref :  ");
$pdf->SetFillColor(200 );


$pdf->SetXY(05,50); 
$pdf->cell(45,5,"",1,0,1,'L',0);
$pdf->cell(30,5,"ELEVES",1,0,1,'L',0);
$pdf->cell(33,5,"ELEVES",1,0,1,'L',0);
$pdf->cell(20,5,"",1,0,1,'L',0);
$pdf->cell(33,5,"ELEVES",1,0,1,'L',0);
$pdf->cell(20,5,"",1,0,1,'L',0);
$pdf->cell(33,5,"ELEVES",1,0,1,'L',0);
$pdf->cell(20,5,"",1,0,1,'L',0);
$pdf->cell(33,5,"ELEVES",1,0,1,'L',0);
$pdf->cell(20,5,"",1,0,1,'L',0);



$pdf->SetXY(05,55); 
$pdf->cell(45,5,"",1,0,1,'L',0);
$pdf->cell(30,5,"EXAMINES",1,0,1,'L',0);
$pdf->cell(33,5,"CONVOQUES",1,0,1,'L',0);
$pdf->cell(20,5,"%",1,0,1,'L',0);
$pdf->cell(33,5,"PRESENTES",1,0,1,'L',0);
$pdf->cell(20,5,"%",1,0,1,'L',0);
$pdf->cell(33,5,"ORIENTES",1,0,1,'L',0);
$pdf->cell(20,5,"%",1,0,1,'L',0);
$pdf->cell(33,5,"PRIS EN CHARGE",1,0,1,'L',0);
$pdf->cell(20,5,"%",1,0,1,'L',0);
$pdf->SetXY(05,60); 
$pdf->mysqlconnect();
$query = "SELECT id,NEC,COMMUNER,TAD,count(CPS) as cid FROM  scolaire where TAD > 0 GROUP BY COMMUNER ";//  COMMUNER order by  COMMUNER asc

$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$pdf->cell(45,5,$pdf->nbrtostring('com','IDCOM',$row->COMMUNER,'COMMUNE'),1,0,'L',0);
$pdf->cell(30,5,$pdf->eleveexamine($row->COMMUNER),1,0,'L',0);//

// a controle  par un exemple   suite in complete  a revoire 
$pdf->cell(33,5,$row->cid,1,0,'L',0);
$pdf->cell(20,5,round(($row->cid*100)/$pdf->eleveexamine($row->COMMUNER),2) ,1,0,'L',0);//     

$pdf->cell(33,5,$pdf->eleveexaminex($row->COMMUNER,'PPS'),1,0,'L',0);
$pdf->cell(20,5,round(($pdf->eleveexaminex($row->COMMUNER,'PPS')*100)/$row->cid,2) ,1,0,'L',0);

$pdf->cell(33,5,$pdf->eleveexaminex($row->COMMUNER,'OS'),1,0,'L',0);
$pdf->cell(20,5,round(($pdf->eleveexaminex($row->COMMUNER,'OS')*100)/$row->cid,2),1,0,'L',0);

$pdf->cell(33,5,$pdf->eleveexaminex($row->COMMUNER,'PS'),1,0,'L',0);
$pdf->cell(20,5,round(($pdf->eleveexaminex($row->COMMUNER,'PS')*100)/$row->cid,2),1,0,'L',0);




$pdf->SetXY(5,$pdf->GetY()+5); 
}
$pdf->cell(45,5,"",1,0,1,'L',0);
$pdf->cell(30,5,"",1,0,1,'L',0);
$pdf->cell(33,5,"",1,0,1,'L',0);
$pdf->cell(20,5,"",1,0,1,'L',0);
$pdf->cell(33,5,"",1,0,1,'L',0);
$pdf->cell(20,5,"",1,0,1,'L',0);
$pdf->cell(33,5,"",1,0,1,'L',0);
$pdf->cell(20,5,"",1,0,1,'L',0);
$pdf->cell(33,5,"",1,0,1,'L',0);
$pdf->cell(20,5,"",1,0,1,'L',0);
$pdf->SetXY(200,$pdf->GetY()+10);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(200,$pdf->GetY()+5);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}

if ($_POST['SS']=='6') //1ere partie
{
require('SSC.php');
$pdf = new SSC( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->Text(90,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(70,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ");
$pdf->Text(75,20,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA");
$pdf->Text(05,25,$EPSP);	$pdf->Text(240,25," LE 31/08/2012");
$pdf->Text(05,30,"SEMEP ");
$pdf->Text(05,35,"N.........../...");
$pdf->Text(60,35,"Couverture vaccinale en milieu scolaire");
$pdf->Text(60,40,"Du  ".$pdf->dateUS2FR($datejour1)."  Au  ".$pdf->dateUS2FR($datejour2));
$pdf->Text(60,45,"Ref :  ");
$pdf->SetFillColor(200 );
$w=14;
$pdf->SetXY(05,50); $pdf->cell(45,5,"",1,0,1,'L',0);$pdf->cell($w*15+30,5,"Couverture vaccinale en milieu scolaire",1,0,1,'L',0);
$pdf->SetXY(05,55); $pdf->cell(45,5,"",1,0,1,'L',0);$pdf->cell($w*7+15,5,"1AP",1,0,1,'L',0);$pdf->cell($w*5+10,5,"1AM",1,0,1,'L',0);$pdf->cell($w*3+5,5,"1AS",1,0,1,'L',0);
$pdf->SetXY(05,60); $pdf->cell(45,5,"Communes",1,0,1,'L',0);
$pdf->cell($w,5,"1AP",1,0,1,'L',0);
$pdf->cell($w,5,"DTE",1,0,1,'L',0);
$pdf->cell($w,5,"POL",1,0,1,'L',0);
$pdf->cell($w,5,"VAR",1,0,1,'L',0);
$pdf->cell($w+5,5,"Tx Cv DTE",1,0,1,'L',0);
$pdf->cell($w+5,5,"Tx Cv POL",1,0,1,'L',0);
$pdf->cell($w+5,5,"Tx Cv VAR",1,0,1,'L',0);
$pdf->cell($w,5,"1AM",1,0,1,'L',0);
$pdf->cell($w,5,"DTE",1,0,1,'L',0);
$pdf->cell($w,5,"POL",1,0,1,'L',0);
$pdf->cell($w+5,5,"Tx Cv DTE",1,0,1,'L',0);
$pdf->cell($w+5,5,"Tx Cv POL",1,0,1,'L',0);
$pdf->cell($w,5,"1as",1,0,1,'L',0);
$pdf->cell($w,5,"DTP",1,0,1,'L',0);
$pdf->cell($w+5,5,"Tx Cv DTP",1,0,1,'L',0);
$pdf->SetXY(05,65); 
$pdf->mysqlconnect();
$query = "SELECT  WILAYAR,COMMUNER,ETA,DATE,
 
sum(ap1) as Sap1, 
sum(ap2) as Sap2, 
sum(ap3) as Sap3, 
sum(ap4) as Sap4, 
sum(ap5) as Sap5, 
 
sum(am1) as Sam1, 
sum(am2) as Sam2, 
sum(am3) as Sam3, 
sum(am4) as Sam4,  
  
sum(as1) as Sas1, 
sum(as2) as Sas2, 
sum(as3) as Sas3 
 
from scol_effectif  GROUP BY  COMMUNER order by  COMMUNER asc  ";

$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$DTE1=4; $DTE2=4; $DTEP3=4;
$POL1=4; $POL2=4;
$VAR1=4;
$pdf->cell(45,5,$pdf->nbrtostring('com','IDCOM',$row->COMMUNER,'COMMUNE'),1,0,1,'L',0);
$pdf->cell($w,5,$row->Sap1,1,0,'L',0);
$pdf->cell($w,5,$DTE1,1,0,'L',0);
$pdf->cell($w,5,$POL1,1,0,'L',0);
$pdf->cell($w,5,$VAR1,1,0,'L',0);
$pdf->cell($w+5,5,round($DTE1*100/$row->Sap1,2),1,0,'L',0);
$pdf->cell($w+5,5,round($POL1*100/$row->Sap1,2),1,0,'L',0);
$pdf->cell($w+5,5,round($VAR1*100/$row->Sap1,2),1,0,'L',0);
$pdf->cell($w,5,$row->Sam1,1,0,'L',0);
$pdf->cell($w,5,$DTE2,1,0,'L',0);
$pdf->cell($w,5,$POL2,1,0,'L',0);
$pdf->cell($w+5,5,round($DTE2*100/$row->Sam1,2),1,0,'L',0);
$pdf->cell($w+5,5,round($POL2*100/$row->Sam1,2),1,0,'L',0);
$pdf->cell($w,5,$row->Sas1,1,0,'L',0);
$pdf->cell($w,5,$DTEP3,1,0,'L',0);
$pdf->cell($w+5,5,round($DTEP3*100/$row->Sas1,2),1,0,'L',0);
// $pdf->cell(30,5,$pdf->counteta1($row->COMMUNER),1,0,'L',0);
// $pdf->cell(20,5,$pdf->counteta2($row->COMMUNER),1,0,'L',0);
// $pdf->cell(40,5,$pdf->counteta3($row->COMMUNER),1,0,'L',0);
// $pdf->cell(20,5,$pdf->counteta($row->COMMUNER),1,0,'L',0);
$pdf->SetXY(5,$pdf->GetY()+5); 
}
$pdf->cell(45,5,"Total ".$totalmbr1,1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w+5,5,"00",1,0,1,'L',0);
$pdf->cell($w+5,5,"00",1,0,1,'L',0);
$pdf->cell($w+5,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w+5,5,"00",1,0,1,'L',0);
$pdf->cell($w+5,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w,5,"00",1,0,1,'L',0);
$pdf->cell($w+5,5,"00",1,0,1,'L',0);
// $pdf->cell(30,5,$pdf->counteta1t(),1,0,1,'L',0);
// $pdf->cell(20,5,$pdf->counteta2t(),1,0,1,'L',0);
// $pdf->cell(40,5,$pdf->counteta3t(),1,0,1,'L',0);
// $pdf->cell(20,5,$pdf->countetat(),1,0,1,'L',0);
// $pdf->cell(20,5,$pdf->sumhs('CH'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('STCANTINE'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('RGCANTINE'),1,0,1,'L',0);
// $pdf->cell(15,5,$pdf->sumhs('STENVIRONNEMENT'),1,0,1,'L',0);
// $pdf->cell(15,5,$pdf->sumhs('RGENVIRONNEMENT'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('STAEP'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('RGAEP'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('STSANITAIRE'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('RGSANITAIRE'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('STCLASES'),1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumhs('RGCLASES'),1,0,1,'L',0);
$pdf->SetXY(200,$pdf->GetY()+10);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(200,$pdf->GetY()+5);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}





?>