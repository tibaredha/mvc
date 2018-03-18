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
header("Location: ../../mors/Evaluation") ;
}
if ($_POST['ETABLISSEMENT']=='1') {$EPH='EPSP_AIN_OUSSERA';$EPH1="='1'";}
if ($_POST['ETABLISSEMENT']=='2') {$EPH='EPSP_HASSI_BAHBAH';$EPH1="='2'";}
if ($_POST['ETABLISSEMENT']=='3') {$EPH='EPSP_DJALFA';$EPH1="='3'";}
if ($_POST['ETABLISSEMENT']=='4') {$EPH='EPSP_MESSAAD';$EPH1="='4'";}
if ($_POST['ETABLISSEMENT']=='5') {$EPH='EPSP_GUETTARA';$EPH1="='5'";}
if ($_POST['ETABLISSEMENT']=='6') {$EPH='EPH_AIN_OUSSERA';$EPH1="='6'";}
if ($_POST['ETABLISSEMENT']=='7') {$EPH='EPH_HASSI_BAHBAH';$EPH1="='7'";}
if ($_POST['ETABLISSEMENT']=='8') {$EPH='EPH_DJALFA';$EPH1="='8'";}
if ($_POST['ETABLISSEMENT']=='9') {$EPH='EPH_MESSAAD';$EPH1="='9'";}
if ($_POST['ETABLISSEMENT']=='10') {$EPH='EPH_IDRISSIA';$EPH1="='10'";}
if ($_POST['ETABLISSEMENT']=='11') {$EPH='EHS_DJALFA';$EPH1="='11'";}
if ($_POST['ETABLISSEMENT']=='12') {$EPH='WILAYA_DJELFA';$EPH1="IS NOT NULL";}


if ($_POST['MORS']=='0') //5ere partie tableau
{

require('MORSC1.php');
$pdf = new MORSC( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('p','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(05,5); $pdf->cell(200,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",1,0,'C',0,0);
$pdf->SetXY(05,10);$pdf->cell(200,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
$pdf->SetXY(05,15);$pdf->cell(200,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
$pdf->SetXY(05,20);$pdf->cell(100,5,$EPH,0,0,'L',0,0);$pdf->cell(145,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
$pdf->SetXY(05,25);$pdf->cell(100,5,"N               / ".date ('Y'),0,0,'L',0,0);
$pdf->SetXY(05,25); $pdf->cell(200,5,html_entity_decode(utf8_decode('Bilan Rage-Morssure-Griffure (1)')),0,0,'C',0,0);
$pdf->SetXY(05,29); $pdf->cell(200,5,'Du  '.$pdf->dateUS2FR($datejour1).'  Au  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);
$pdf->SetXY(05,40);$pdf->cell(80,5,"Affection",1,0,'C',1,0);$pdf->cell(40,10,"Total",1,0,'C',1,0);$pdf->SetXY(125,40);$pdf->cell(80,5,"Rage",1,0,'C',1,0);
$pdf->SetXY(05,45);$pdf->cell(40,5,"Morssures",1,0,'C',1,0);$pdf->cell(40,5,"Griffures ",1,0,'C',1,0);$pdf->SetXY(125,45);$pdf->cell(40,5,"Nombre",1,0,'C',1,0);$pdf->cell(40,5,"Deces ",1,0,'C',1,0);
$pdf->SetXY(05,60);$pdf->cell(40,15,"Communes",1,0,'C',1,0);$pdf->cell(160-16,5,"Nombre De Cas De Morssures Enregistrees ",1,0,'C',1,0);$pdf->cell(16,15,"Total",1,0,'C',1,0);
$pdf->SetXY(45,65);$pdf->cell(160-16,5,"Animal Mordeur ",1,0,'C',1,0);
$pdf->SetXY(45,70);$pdf->cell(16,5,"Chien",1,0,'C',1,0);$pdf->cell(16,5,"Chat",1,0,'C',1,0);$pdf->cell(16,5,"Cheval",1,0,'C',1,0);$pdf->cell(16,5,"Ane ",1,0,'C',1,0);$pdf->cell(16,5,"Vache",1,0,'C',1,0);$pdf->cell(16,5,"Chacal",1,0,'C',1,0);$pdf->cell(16,5,"Rat",1,0,'C',1,0);$pdf->cell(16,5,"Sanglier",1,0,'C',1,0);$pdf->cell(16,5,"Autres",1,0,'C',1,0);

$pdf->SetXY(05,75);
$pdf->mysqlconnect();
$query = "SELECT * from com  where IDWIL='17000' and  yes=1 order by COMMUNE"; 
$res=mysql_query($query);
$tot=mysql_num_rows($res);



while($row=mysql_fetch_object($res))
{
$mors1=$pdf->mors($row->IDCOM,1,1,$datejour1,$datejour2,$EPH1);
$mors2=$pdf->mors($row->IDCOM,2,1,$datejour1,$datejour2,$EPH1);
$mors3=$pdf->mors($row->IDCOM,3,1,$datejour1,$datejour2,$EPH1);
$mors4=$pdf->mors($row->IDCOM,4,1,$datejour1,$datejour2,$EPH1);
$mors5=$pdf->mors($row->IDCOM,5,1,$datejour1,$datejour2,$EPH1);
$mors6=$pdf->mors($row->IDCOM,6,1,$datejour1,$datejour2,$EPH1);
$mors7=$pdf->mors($row->IDCOM,7,1,$datejour1,$datejour2,$EPH1);
$mors8=$pdf->mors($row->IDCOM,8,1,$datejour1,$datejour2,$EPH1);
$mors9=$pdf->mors($row->IDCOM,9,1,$datejour1,$datejour2,$EPH1);
$mors10=$mors1+$mors2+$mors3+$mors4+$mors5+$mors6+$mors7+$mors8+$mors9;
$pdf->cell(40,5,$row->COMMUNE,1,0,'L',0,0);
$pdf->cell(16,5,$mors1 ,1,0,'C',0,0);
$pdf->cell(16,5,$mors2 ,1,0,'C',0,0);
$pdf->cell(16,5,$mors3 ,1,0,'C',0,0);
$pdf->cell(16,5,$mors4 ,1,0,'C',0,0);
$pdf->cell(16,5,$mors5 ,1,0,'C',0,0);
$pdf->cell(16,5,$mors6 ,1,0,'C',0,0);
$pdf->cell(16,5,$mors7 ,1,0,'C',0,0);
$pdf->cell(16,5,$mors8 ,1,0,'C',0,0);
$pdf->cell(16,5,$mors9 ,1,0,'C',0,0);
$pdf->cell(16,5,$mors10 ,1,0,'C',0,0);		
$pdf->setxy(5,$pdf->gety()+5); 
}

$morst1=$pdf->morst(1,1,$datejour1,$datejour2,$EPH1);
$morst2=$pdf->morst(2,1,$datejour1,$datejour2,$EPH1);
$morst3=$pdf->morst(3,1,$datejour1,$datejour2,$EPH1);
$morst4=$pdf->morst(4,1,$datejour1,$datejour2,$EPH1);
$morst5=$pdf->morst(5,1,$datejour1,$datejour2,$EPH1);
$morst6=$pdf->morst(6,1,$datejour1,$datejour2,$EPH1);
$morst7=$pdf->morst(7,1,$datejour1,$datejour2,$EPH1);
$morst8=$pdf->morst(8,1,$datejour1,$datejour2,$EPH1);
$morst9=$pdf->morst(9,1,$datejour1,$datejour2,$EPH1);
$morst10=$morst1+$morst2+$morst3+$morst4+$morst5+$morst6+$morst7+$morst8+$morst9;

$pdf->SetXY(05,$pdf->gety());
$pdf->cell(40,5,"Total ".$tot." communes",1,0,'L',1,0);
$pdf->cell(16,5,$morst1,1,0,'C',1,0);
$pdf->cell(16,5,$morst2,1,0,'C',1,0);
$pdf->cell(16,5,$morst3,1,0,'C',1,0);
$pdf->cell(16,5,$morst4,1,0,'C',1,0);
$pdf->cell(16,5,$morst5,1,0,'C',1,0);
$pdf->cell(16,5,$morst6,1,0,'C',1,0);
$pdf->cell(16,5,$morst7,1,0,'C',1,0);
$pdf->cell(16,5,$morst8,1,0,'C',1,0);
$pdf->cell(16,5,$morst9,1,0,'C',1,0);
$pdf->cell(16,5,$morst10,1,0,'C',1,0);


$morsgt1=$pdf->morst(1,2,$datejour1,$datejour2,$EPH1);
$morsgt2=$pdf->morst(2,2,$datejour1,$datejour2,$EPH1);
$morsgt3=$pdf->morst(3,2,$datejour1,$datejour2,$EPH1);
$morsgt4=$pdf->morst(4,2,$datejour1,$datejour2,$EPH1);
$morsgt5=$pdf->morst(5,2,$datejour1,$datejour2,$EPH1);
$morsgt6=$pdf->morst(6,2,$datejour1,$datejour2,$EPH1);
$morsgt7=$pdf->morst(7,2,$datejour1,$datejour2,$EPH1);
$morsgt8=$pdf->morst(8,2,$datejour1,$datejour2,$EPH1);
$morsgt9=$pdf->morst(9,2,$datejour1,$datejour2,$EPH1);
$morsgt10=$morsgt1+$morsgt2+$morsgt3+$morsgt4+$morsgt5+$morsgt6+$morsgt7+$morsgt8+$morsgt9;

$pdf->SetXY(05,50);
$pdf->cell(40,5,$morst10,1,0,'C',0,0);
$pdf->cell(40,5,$morsgt10,1,0,'C',0,0);
$pdf->cell(40,5,$morst10+$morsgt10,1,0,'C',0,0);
$pdf->cell(40,5,$pdf->ragedeces('Rage',1,$datejour1,$datejour2,$EPH1),1,0,'C',0,0);
$pdf->cell(40,5,$pdf->ragedeces('Deces',1,$datejour1,$datejour2,$EPH1),1,0,'C',0,0);




$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('p','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(05,5); $pdf->cell(200,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",1,0,'C',0,0);
$pdf->SetXY(05,10);$pdf->cell(200,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
$pdf->SetXY(05,15);$pdf->cell(200,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
$pdf->SetXY(05,20);$pdf->cell(100,5,$EPH,0,0,'L',0,0);$pdf->cell(145,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
$pdf->SetXY(05,25);$pdf->cell(100,5,"N               / ".date ('Y'),0,0,'L',0,0);
$pdf->SetXY(05,25); $pdf->cell(200,5,html_entity_decode(utf8_decode('Bilan Rage-Morssure-Griffure (2)')),0,0,'C',0,0);
$pdf->SetXY(05,29); $pdf->cell(200,5,'Du  '.$pdf->dateUS2FR($datejour1).'  Au  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);


$pdf->SetFont('Arial','B',8);
$pdf->SetXY(05,40);
$pdf->cell(20,10,"Animals",1,0,'C',1,0);
$pdf->cell(20,10,"Total",1,0,'C',1,0);
$pdf->cell(160,10,"Nombre De Personnes Ayant Recus Un Traitement Post Exposition",1,0,'C',1,0);
$pdf->SetXY(05,50);
$pdf->cell(20,10,"Mordeurs",1,0,'C',1,0);
$pdf->cell(20,10,"Morssures",1,0,'C',1,0);


$pdf->cell(27,10,"Vaccin Tissulaire",1,0,'C',1,0);
$pdf->cell(37,10,"Vaccin Tissulaire-serum",1,0,'C',1,0);
$pdf->cell(27,10,"Vaccin Cellulaire",1,0,'C',1,0);
$pdf->cell(37,10,"Vaccin Cellulaire-serum",1,0,'C',1,0);
$pdf->cell(32,10,"Situations Particulieres",1,0,'C',1,0);
$pdf->SetFont('Arial','B',9);

         

$pdf->SetXY(05,60);$pdf->cell(20,5,"Chien",1,0,'L',1,0);               $pdf->cell(20,5,$pdf->mors1(1,1,$datejour1,$datejour2,$EPH1),1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(1,1,$datejour1,$datejour2,'Vaccin',1,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(1,1,$datejour1,$datejour2,'Vaccin',2,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(32,5,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(20,5,"Chat",1,0,'L',1,0);    $pdf->cell(20,5,$pdf->mors1(2,1,$datejour1,$datejour2,$EPH1),1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(2,1,$datejour1,$datejour2,'Vaccin',1,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(2,1,$datejour1,$datejour2,'Vaccin',2,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(32,5,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(20,5,"Cheval",1,0,'L',1,0);  $pdf->cell(20,5,$pdf->mors1(3,1,$datejour1,$datejour2,$EPH1),1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(3,1,$datejour1,$datejour2,'Vaccin',1,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(3,1,$datejour1,$datejour2,'Vaccin',2,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(32,5,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(20,5,"Ane",1,0,'L',1,0);     $pdf->cell(20,5,$pdf->mors1(4,1,$datejour1,$datejour2,$EPH1),1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(4,1,$datejour1,$datejour2,'Vaccin',1,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(4,1,$datejour1,$datejour2,'Vaccin',2,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(32,5,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(20,5,"Vache",1,0,'L',1,0);   $pdf->cell(20,5,$pdf->mors1(5,1,$datejour1,$datejour2,$EPH1),1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(5,1,$datejour1,$datejour2,'Vaccin',1,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(5,1,$datejour1,$datejour2,'Vaccin',2,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(32,5,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(20,5,"Chacal",1,0,'L',1,0);  $pdf->cell(20,5,$pdf->mors1(6,1,$datejour1,$datejour2,$EPH1),1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(6,1,$datejour1,$datejour2,'Vaccin',1,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(6,1,$datejour1,$datejour2,'Vaccin',2,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(32,5,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(20,5,"Rat",1,0,'L',1,0);     $pdf->cell(20,5,$pdf->mors1(7,1,$datejour1,$datejour2,$EPH1),1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(7,1,$datejour1,$datejour2,'Vaccin',1,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(7,1,$datejour1,$datejour2,'Vaccin',2,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(32,5,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(20,5,"Sanglier",1,0,'L',1,0);$pdf->cell(20,5,$pdf->mors1(8,1,$datejour1,$datejour2,$EPH1),1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(8,1,$datejour1,$datejour2,'Vaccin',1,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(8,1,$datejour1,$datejour2,'Vaccin',2,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(32,5,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(20,5,"Autres",1,0,'L',1,0);  $pdf->cell(20,5,$pdf->mors1(9,1,$datejour1,$datejour2,$EPH1),1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(9,1,$datejour1,$datejour2,'Vaccin',1,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(27,5,$pdf->mors2(9,1,$datejour1,$datejour2,'Vaccin',2,$EPH1),1,0,'C',0,0);$pdf->cell(37,5,"",1,0,'C',0,0);$pdf->cell(32,5,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(20,5,"Total",1,0,'L',1,0);   $pdf->cell(20,5,"",1,0,'C',1,0);                                    $pdf->cell(27,5,"",1,0,'C',1,0);$pdf->cell(37,5,"",1,0,'C',1,0);$pdf->cell(27,5,"",1,0,'C',1,0);$pdf->cell(37,5,"",1,0,'C',1,0);$pdf->cell(32,5,"",1,0,'C',1,0);



$pdf->SetXY(05,$pdf->gety()+10);
$pdf->cell(200,5,"(1) Nombre De Personnes Exposees A Un Risque Rabique Ou Victimes De Lesion(s) Par Un Animal Mordeur S'etant Presente",0,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);
$pdf->cell(200,5,"En Consultation.",0,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);
$pdf->cell(200,5,"(2) Nombre De Personnes Ayant Rencontre Des Situations Particuliares (Anormales) Comme Beneficier Des Deux Types De Vaccins",0,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);
$pdf->cell(200,5,"Par Suite De Rupture De Stock.",0,0,'L',0,0);




$pdf->AddPage('p','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(05,5); $pdf->cell(200,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",1,0,'C',0,0);
$pdf->SetXY(05,10);$pdf->cell(200,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
$pdf->SetXY(05,15);$pdf->cell(200,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
$pdf->SetXY(05,20);$pdf->cell(100,5,$EPH,0,0,'L',0,0);$pdf->cell(145,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
$pdf->SetXY(05,25);$pdf->cell(100,5,"N               / ".date ('Y'),0,0,'L',0,0);
$pdf->SetXY(05,25); $pdf->cell(200,5,html_entity_decode(utf8_decode('Bilan Rage-Morssure-Griffure (3)')),0,0,'C',0,0);
$pdf->SetXY(05,29); $pdf->cell(200,5,'Du  '.$pdf->dateUS2FR($datejour1).'  Au  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);

$pdf->SetXY(05,40);
$pdf->cell(20,5,"NUM",1,0,'C',1,0);
$pdf->cell(60,5,"NOM ET PRENOM",1,0,'C',1,0);
$pdf->cell(60,5,"COMMUNE",1,0,'C',1,0);
$pdf->cell(60,5,"ANIMAL MORDEUR",1,0,'C',1,0);
$pdf->SetXY(05,$pdf->gety()+5);
$pdf->mysqlconnect();
$query = "SELECT * from mors where STRUCTURE $EPH1  and  (DATEMORS BETWEEN '$datejour1' AND '$datejour2') "; //  mdoIDWIL='17000' and  yes=1 order by COMMUNE
$res=mysql_query($query);
$tot=mysql_num_rows($res);
while($row=mysql_fetch_object($res))
{
$pdf->cell(20,5,$row->id,1,0,'C',1,0);
$pdf->cell(60,5,$row->NOMPRENOM,1,0,'C',0,0);
$pdf->cell(60,5,$row->COMMUNE,1,0,'C',0,0);
$pdf->cell(60,5,$row->ANIMAL,1,0,'C',0,0);
$pdf->setxy(5,$pdf->gety()+5); 
}

$pdf->SetXY(05,$pdf->gety());
$pdf->cell(20,5,"",1,0,'C',1,0);
$pdf->cell(180,5,"",1,0,'C',1,0);











$pdf->SetXY(100,$pdf->gety()+5);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(100,$pdf->gety()+5);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}
if ($_POST['MORS']=='1') //5ere partie tableau
{

require('MORSC1.php');
$pdf = new MORSC( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('p','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(05,5); $pdf->cell(200,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",1,0,'C',0,0);
$pdf->SetXY(05,10);$pdf->cell(200,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
$pdf->SetXY(05,15);$pdf->cell(200,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
$pdf->SetXY(05,20);$pdf->cell(100,5,$EPH,0,0,'L',0,0);$pdf->cell(145,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
$pdf->SetXY(05,25);$pdf->cell(100,5,"N               / ".date ('Y'),0,0,'L',0,0);
$pdf->SetXY(05,25); $pdf->cell(200,5,html_entity_decode(utf8_decode("RAPPORT D'ENQUETE EPIDEMIOLOGIQUE SUR UN CAS DE RAGE HUMAINE")),0,0,'C',0,0);
// $pdf->SetXY(05,29); $pdf->cell(200,5,'Du  '.$pdf->dateUS2FR($datejour1).'  Au  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);

$pdf->SetXY(05,$pdf->gety()+15);$pdf->cell(180,5,"RAPPORT D'ENQUETE EPIDEMIOLOGIQUE SUR UN CAS DE RAGE HUMAINE ",1,0,'L',1,0);$pdf->cell(20,5,"1/4",1,0,'C',1,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(180,5,"NOM ET PRENOM DU MALADE : ",1,0,'L',1,0);$pdf->cell(20,5,"PAGE",1,0,'C',1,0);

$pdf->SetXY(05,$pdf->gety()+10);$pdf->cell(200,5,"ce rapport d'enquete epidemiologique est un document officiel et une source d'information sanitaire",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(200,5,"indisponssable pour chaque cas de rage humaine declare",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(200,5,"il est rempli corectement  par le medecin chef du SEMEP et a envoye a la direction de la prevention MSPRH",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(200,5,"permettre d'ecrire et de cocher les cases correspondantes",1,0,'L',0,0);
// $pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(200,5,"",1,0,'L',0,0);


$pdf->SetXY(05,$pdf->gety()+10);$pdf->cell(200,5,"1 ETAT CIVIL DU MALADE",1,0,'C',1,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(66,5,"NOM : ",1,0,'L',0,0);$pdf->cell(66,5,"POIDS : ",1,0,'L',0,0);$pdf->cell(68,5,"POIDS NON PRECISE : ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(66,5,"PRENOM : ",1,0,'L',0,0);$pdf->cell(66+68,5,"PROFESSION : ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(66,5,"PRENOM DU PERE : ",1,0,'L',0,0);$pdf->cell(66,15,"ADRESSE EXACTE : ",1,0,'L',0,0);$pdf->cell(68,5,"LOCALITE : ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(66,5,"DATE DE NAISSANCE : ",1,0,'L',0,0);$pdf->SetXY(05+66+66,$pdf->gety());            $pdf->cell(68,5,"COMMUNE : ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(66,5,"SEXE : ",1,0,'L',0,0);$pdf->SetXY(05+66+66,$pdf->gety());                         $pdf->cell(68,5,"WILAYA : ",1,0,'L',0,0);

$pdf->SetXY(05,$pdf->gety()+10);$pdf->cell(200,5,"2 LESION",1,0,'C',1,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"DATE ET HEURS DE SURVENUE : ",1,0,'L',0,0);$pdf->cell(50,5,"LE: ",1,0,'L',0,0);$pdf->cell(50,5,": HEURES ",1,0,'R',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"TYPE : ",1,0,'L',0,0);$pdf->cell(33,5,"LECHAGE: ",1,0,'L',0,0);$pdf->cell(33,5,"GRIFFURE: ",1,0,'L',0,0);$pdf->cell(34,5,"MORSSURE: ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"NOMBRE : ",1,0,'L',0,0);$pdf->cell(33,5,"UNIQUE: ",1,0,'L',0,0);$pdf->cell(33,5,"DOUBLE: ",1,0,'L',0,0);$pdf->cell(34,5,"MULTIPLE: ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"PROFONDEUR : ",1,0,'L',0,0);$pdf->cell(50,5,"SUPERFICIELLE: ",1,0,'L',0,0);$pdf->cell(50,5,"PROFONDE: ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,35,"SIEGE : ",1,0,'L',0,0);$pdf->cell(33,5,"TETE: ",1,0,'L',0,0);$pdf->cell(33,5,"CRANE: ",1,0,'L',0,0);$pdf->cell(34,5,"MEMBRE SUP: ",1,0,'L',0,0);
$pdf->SetXY(105,$pdf->gety()+5);$pdf->cell(33,5,"FACE: ",1,0,'L',0,0);$pdf->cell(33,5,"ORGANES GENITAUX: ",1,0,'L',0,0);$pdf->cell(34,5,"MAINS: ",1,0,'L',0,0);
$pdf->SetXY(105,$pdf->gety()+5);$pdf->cell(50,5,"COU: ",1,0,'L',0,0);$pdf->cell(50,5,"MEMBRE INF: ",1,0,'L',0,0);
$pdf->SetXY(105,$pdf->gety()+5);$pdf->cell(50,5,"MUQUEUSES: ",1,0,'L',0,0);$pdf->cell(50,5,"PIEDS: ",1,0,'L',0,0);
$pdf->SetXY(105,$pdf->gety()+5);$pdf->cell(100,5,"AUTRES A PRECISE: ",1,0,'L',0,0);
$pdf->SetXY(105,$pdf->gety()+5);$pdf->cell(100,5,"",1,0,'L',0,0);
$pdf->SetXY(105,$pdf->gety()+5);$pdf->cell(100,5," ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"EN RESUME ",1,0,'L',0,0);$pdf->cell(33,5,"GRADE I: ",1,0,'L',0,0);$pdf->cell(33,5,"GRADE II: ",1,0,'L',0,0);$pdf->cell(34,5,"GRADE III: ",1,0,'L',0,0);

$pdf->SetXY(05,$pdf->gety()+10);$pdf->cell(200,5,"3 ANIMAL MORDEUR",1,0,'C',1,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,10,"ESPECE : ",1,0,'L',0,0);$pdf->cell(33,5,"DOMESTIQUE : ",1,0,'L',0,0);$pdf->cell(33,5,"CHIEN : ",1,0,'L',0,0);$pdf->cell(34,5,"CHAT : ",1,0,'L',0,0);
$pdf->SetXY(105,$pdf->gety()+5);$pdf->cell(100,5,"AUTRES A PRECISE : ",1,0,'L',0,0);

$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,10,"ESPECE : ",1,0,'L',0,0);$pdf->cell(33,5,"SAUVAGE : ",1,0,'L',0,0);$pdf->cell(33,5,"CHACAL : ",1,0,'L',0,0);$pdf->cell(34,5,"FENNEC : ",1,0,'L',0,0);
$pdf->SetXY(105,$pdf->gety()+5);$pdf->cell(100,5,"AUTRES A PRECISE : ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"COULEUR ",1,0,'L',0,0);$pdf->cell(100,5,"PRECISE: ",1,0,'L',0,0);

$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"IDENTIFICATION ",1,0,'L',0,0);$pdf->cell(33,5,"CONNU: ",1,0,'L',0,0);$pdf->cell(33,5,"ERRANT: ",1,0,'L',0,0);$pdf->cell(34,5,"PERDU DE VU: ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"COMPORTEMET ",1,0,'L',0,0);$pdf->cell(33,5,"NORMAL: ",1,0,'L',0,0);$pdf->cell(33,5,"SUSPECT: ",1,0,'L',0,0);$pdf->cell(34,5,"ANORMAL: ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"STATUS VACCINAL ",1,0,'L',0,0);$pdf->cell(33,5,"VACCINE: ",1,0,'L',0,0);$pdf->cell(33,5,"NON VACCINE: ",1,0,'L',0,0);$pdf->cell(34,5,"STATUS INCONNU: ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"MISE EN OBSERVATION VETERINAIRE ",1,0,'L',0,0);$pdf->cell(50,5,"OUI : ",1,0,'L',0,0);$pdf->cell(50,5,"DATE : ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5," ",1,0,'L',0,0);$pdf->cell(50,5,"NON : ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5," ",1,0,'L',0,0);$pdf->cell(33,5,"RESULTAS : ",1,0,'L',0,0);$pdf->cell(33,5,"NON ENRAGE : ",1,0,'L',0,0);$pdf->cell(34,5,"ENRAGE : ",1,0,'L',0,0);

$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"EVOLUTION ",1,0,'L',0,0);$pdf->cell(50,5,"RETROUVE MORT LE : ",1,0,'L',0,0);$pdf->cell(50,5,"ABATE LE  : ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"DIAGNOSTIC DE RAGE ANIMALE ",1,0,'L',0,0);$pdf->cell(73,5,"TETE DE L'ANIMALE ENVOYE AU LABORATOIRE : ",1,0,'L',0,0);$pdf->cell(13,5,"OUI  : ",1,0,'L',0,0);$pdf->cell(14,5,"NON  : ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5," ",1,0,'L',0,0);                          $pdf->cell(73,5,"CONFIRMATION BIOLOGIQUE : ",1,0,'L',0,0);                $pdf->cell(13,5,"OUI  : ",1,0,'L',0,0);$pdf->cell(14,5,"NON  : ",1,0,'L',0,0);


$pdf->AddPage('p','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(05,$pdf->gety()+15);$pdf->cell(180,5,"RAPPORT D'ENQUETE EPIDEMIOLOGIQUE SUR UN CAS DE RAGE HUMAINE ",1,0,'L',1,0);$pdf->cell(20,5,"2/4",1,0,'C',1,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(180,5,"NOM ET PRENOM DU MALADE : ",1,0,'L',1,0);$pdf->cell(20,5,"PAGE",1,0,'C',1,0);

$pdf->SetXY(05,$pdf->gety()+10);$pdf->cell(200,5,"4-A- PREMIERE CONSULTATION MEDICALE DU MALADE APRES LE CONTACT ET AVANT APPARITION DES SIGNES",1,0,'C',1,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"DATE ",1,0,'L',0,0);                     $pdf->cell(100,5," ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"LIEUX ",1,0,'L',0,0);                    $pdf->cell(100,5," ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"NOM DU MEDECIN CONSULTANT ",1,0,'L',0,0);$pdf->cell(100,5," ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,20,"SOINS MEDICAUX RECUS PAR LE MALADE ",1,0,'L',0,0);$pdf->cell(50,5,"LAVAGE DE LA LESION ",1,0,'L',0,0);$pdf->cell(50,5,"SOINS LOCAUX",1,0,'L',0,0);
$pdf->SetXY(105,$pdf->gety()+5);$pdf->cell(100,5,"ANTIBIOTIQUE",1,0,'L',0,0);
$pdf->SetXY(105,$pdf->gety()+5);$pdf->cell(50,5,"VACCIN DT ENFANT ",1,0,'L',0,0);$pdf->cell(50,5,"VACCIN DT ADULT ",1,0,'L',0,0);
$pdf->SetXY(105,$pdf->gety()+5);$pdf->cell(50,5,"SERUM ANTI-RABIQUE ",1,0,'L',0,0);$pdf->cell(50,5,"VACCIN ANTI-RABIQUE ",1,0,'L',0,0);


$pdf->SetXY(05,$pdf->gety()+10);$pdf->cell(180,5,"4-B- VACCINO-THERAPI-ANTI-RABIQUE PAR VACCIN PREPARE SUR CERVEAU DE SOURICEAUX NN",1,0,'C',1,0);$pdf->cell(10,5,"OUI",1,0,'L',1,0);$pdf->cell(10,5,"NON",1,0,'L',1,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"REFERENCE DU VACCIN CSNN INJECTEE N DU LOT : ",1,0,'L',0,0);                     $pdf->cell(100,5,"DATE DE PEREMPTION",1,0,'L',0,0);

$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(66,5,"SCHEMA PRECONISE : ",1,0,'L',0,0);$pdf->cell(67,5,"A/VACCINATION SEULE : ",1,0,'L',0,0);$pdf->cell(67,5,"B/SERO-VACCINATION : ",1,0,'L',0,0);

$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"EN CAS DE VACCINATION SEULE : DOSE DE VACCIN",1,0,'L',0,0);$pdf->cell(100,5,"EN CAS DE SERO-VACCINATION SEULE : DOSE DE VACCIN",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"VAR-CSNN : ",1,0,'L',0,0);$pdf->cell(100,5,"VAR-CSNN : ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"EFFECTIVEMENT INJECTEES AU MALADE : ",1,0,'L',0,0);$pdf->cell(100,5,"EFFECTIVEMENT INJECTEES AU MALADE : ",1,0,'L',0,0);

$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(35,40,"07 doses de base",1,0,'C',0,0);$pdf->cell(15,5,"",1,0,'C',0,0);$pdf->cell(25,5,"Date",1,0,'C',0,0);$pdf->cell(25,5,"Observation",1,0,'C',0,0);   $pdf->cell(35,40,"07 doses de base",1,0,'C',0,0);$pdf->cell(15,5,"",1,0,'C',0,0);$pdf->cell(25,5,"Date",1,0,'C',0,0);$pdf->cell(25,5,"Observation",1,0,'C',0,0);
$pdf->SetXY(40,$pdf->gety()+5);$pdf->cell(15,5,"j0",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->SetXY(140,$pdf->gety());$pdf->cell(15,5,"j0",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);
$pdf->SetXY(40,$pdf->gety()+5);$pdf->cell(15,5,"j1",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->SetXY(140,$pdf->gety());$pdf->cell(15,5,"j1",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);
$pdf->SetXY(40,$pdf->gety()+5);$pdf->cell(15,5,"j2",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->SetXY(140,$pdf->gety());$pdf->cell(15,5,"j2",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);
$pdf->SetXY(40,$pdf->gety()+5);$pdf->cell(15,5,"j3",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->SetXY(140,$pdf->gety());$pdf->cell(15,5,"j3",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);
$pdf->SetXY(40,$pdf->gety()+5);$pdf->cell(15,5,"j4",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->SetXY(140,$pdf->gety());$pdf->cell(15,5,"j4",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);
$pdf->SetXY(40,$pdf->gety()+5);$pdf->cell(15,5,"j5",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->SetXY(140,$pdf->gety());$pdf->cell(15,5,"j5",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);
$pdf->SetXY(40,$pdf->gety()+5);$pdf->cell(15,5,"j6",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->SetXY(140,$pdf->gety());$pdf->cell(15,5,"j6",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(35,25,"04 doses de rappele",1,0,'C',0,0);$pdf->SetXY(105,$pdf->gety());$pdf->cell(35,25,"05 doses de rappele",1,0,'C',0,0);
$pdf->SetXY(40,$pdf->gety());  $pdf->cell(15,5,"j10",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->SetXY(140,$pdf->gety());$pdf->cell(15,5,"j10",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);
$pdf->SetXY(40,$pdf->gety()+5);$pdf->cell(15,5,"j14",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->SetXY(140,$pdf->gety());$pdf->cell(15,5,"j14",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);
$pdf->SetXY(40,$pdf->gety()+5);$pdf->cell(15,5,"j29",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->SetXY(140,$pdf->gety());$pdf->cell(15,5,"j24",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);
$pdf->SetXY(40,$pdf->gety()+5);$pdf->cell(15,5,"j90",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->SetXY(140,$pdf->gety());$pdf->cell(15,5,"j34",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);
$pdf->SetXY(40,$pdf->gety()+5);$pdf->cell(15,5,"",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->SetXY(140,$pdf->gety());$pdf->cell(15,5,"j90",1,0,'C',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);$pdf->cell(25,5,"",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(200,15,"NB : ",1,0,'L',0,0);

$pdf->AddPage('p','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(05,$pdf->gety()+15);$pdf->cell(180,5,"RAPPORT D'ENQUETE EPIDEMIOLOGIQUE SUR UN CAS DE RAGE HUMAINE ",1,0,'L',1,0);$pdf->cell(20,5,"3/4",1,0,'C',1,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(180,5,"NOM ET PRENOM DU MALADE : ",1,0,'L',1,0);$pdf->cell(20,5,"PAGE",1,0,'C',1,0);

$pdf->SetXY(05,$pdf->gety()+10);$pdf->cell(180,5,"4-B- VACCINO-THERAPI-ANTI-RABIQUE PAR VACCIN PREPARE SUR CELLULAIRE",1,0,'C',1,0);$pdf->cell(10,5,"OUI",1,0,'L',1,0);$pdf->cell(10,5,"NON",1,0,'L',1,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"REFERENCE DU VACCIN CSNN INJECTEE N DU LOT : ",1,0,'L',0,0);                     $pdf->cell(100,5,"DATE DE PEREMPTION",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(66,5,"SCHEMA PRECONISE : ",1,0,'L',0,0);$pdf->cell(67,5,"A/VACCINATION SEULE : ",1,0,'L',0,0);$pdf->cell(67,5,"B/SERO-VACCINATION : ",1,0,'L',0,0);

$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"EN CAS DE VACCINATION SEULE : DOSE DE VACCIN",1,0,'L',0,0);$pdf->cell(100,5,"EN CAS DE SERO-VACCINATION SEULE : DOSE DE VACCIN",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"VAR-CSNN : ",1,0,'L',0,0);$pdf->cell(100,5,"VAR-CSNN : ",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->gety()+5);$pdf->cell(100,5,"EFFECTIVEMENT INJECTEES AU MALADE : ",1,0,'L',0,0);$pdf->cell(100,5,"EFFECTIVEMENT INJECTEES AU MALADE : ",1,0,'L',0,0);





// $pdf->SetXY(100,$pdf->gety()+5);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
// $pdf->SetXY(100,$pdf->gety()+5);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}
?>