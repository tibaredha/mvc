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
header("Location: ../../maldecobl/Evaluation") ;
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


if ($_POST['MDO']=='0') //0ere partie
{
require('MDOC1.php');
$pdf = new MDOC( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);


$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(05,5); $pdf->cell(290,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",0,0,'C',0,0);
$pdf->SetXY(05,10);$pdf->cell(290,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
$pdf->SetXY(05,15);$pdf->cell(290,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
$pdf->SetXY(05,20);$pdf->cell(145,5,$EPH,0,0,'L',0,0);$pdf->cell(145,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
$pdf->SetXY(05,25);$pdf->cell(145,5,"N               / ".date ('Y'),0,0,'L',0,0);
$pdf->SetXY(05,30); $pdf->cell(290,5,html_entity_decode(utf8_decode('ANNEXE III - CIRCULAIRE N° 1126 /MSP/DP/SDPG... DU 17 NOVEMBER 1990')),0,0,'C',0,0);
$pdf->SetXY(05,35); $pdf->cell(290,5,html_entity_decode(utf8_decode('RELEVE DES MALADIES A DECLARATION OBLIGATOIRE')),0,0,'C',0,0);
$pdf->SetXY(05,40); $pdf->cell(290,5,'DU  '.$pdf->dateUS2FR($datejour1).'  AU  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10);
$pdf->cell(290,5,html_entity_decode(utf8_decode("I-Nombre De Cas Repartis Par Etablissements Sanitaires")),1,0,'L',1,0);


$pdf->SetXY(5,$pdf->GetY()+5);
$pdf->cell(46,10,html_entity_decode(utf8_decode("Etablissements Sanitaires")),1,0,'L',1,0);
$pdf->cell(24.4*10,5,"Nature De L'affection",1,0,'C',1,0);
$pdf->SetXY(5+46,$pdf->GetY()+5);
$pdf->SetFont('Arial', 'B', 8);
$pdf->cell(24.4,5,"Brucellose",1,0,'C',1,0);
$pdf->cell(24.4,5,"Fievre Typhoide ",1,0,'C',1,0);
$pdf->cell(24.4,5,"Hepatite Virale ",1,0,'C',1,0);
$pdf->cell(24.4,5,"VIH ",1,0,'C',1,0);
$pdf->cell(24.4,5,"Kyste Hydatique ",1,0,'C',1,0);
$pdf->cell(24.4,5,"Leishmaniose C ",1,0,'C',1,0);
$pdf->cell(24.4,5,"Meningites ",1,0,'C',1,0);
$pdf->cell(24.4,5,"Syphilis",1,0,'C',1,0);
$pdf->cell(24.4,5,"TIAC",1,0,'C',1,0);
$pdf->cell(24.4,5,"Tuberculose",1,0,'C',1,0);
$pdf->SetFont('Arial', 'B', 9);
$pdf->setxy(5,$pdf->gety()+5);

$pdf->SetXY(5,65);
$pdf->cell(46,5,"Ain-oussera",1,0,'L',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',20,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',2,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',5,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',27,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',17,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',15,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',11,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',26,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',4,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',13,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->SetXY(5,70);
$pdf->cell(46,5,"Hassi-bahbah",1,0,'L',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=2',20,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=2',2,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=2',5,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=2',27,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=2',17,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=2',15,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=2',11,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=2',26,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=2',4,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=2',13,$datejour1,$datejour2),1,0,'C',0,0);


$pdf->SetXY(5,75);
$pdf->cell(46,5,"Djelfa",1,0,'L',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=3',20,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=3',2,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=3',5,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=3',27,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=3',17,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=3',15,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=3',11,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=3',26,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=3',4,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=3',13,$datejour1,$datejour2),1,0,'C',0,0);


$pdf->SetXY(5,80);
$pdf->cell(46,5,"Messaad",1,0,'L',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=4',20,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=4',2,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=4',5,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=4',27,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=4',17,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=4',15,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=4',11,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=4',26,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=4',4,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=4',13,$datejour1,$datejour2),1,0,'C',0,0);

$pdf->SetXY(5,85);
$pdf->cell(46,5,"Guettara",1,0,'L',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=5',20,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=5',2,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=5',5,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=5',27,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=5',17,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=5',15,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=5',11,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=5',26,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=5',4,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=5',13,$datejour1,$datejour2),1,0,'C',0,0);

$pdf->SetXY(5,90);
$pdf->cell(46,5,"Total",1,0,'L',1,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',20,$datejour1,$datejour2)+$pdf->mdocmd('=2',20,$datejour1,$datejour2)+$pdf->mdocmd('=3',20,$datejour1,$datejour2)+$pdf->mdocmd('=4',20,$datejour1,$datejour2)+$pdf->mdocmd('=5',20,$datejour1,$datejour2),1,0,'C',1,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',2,$datejour1,$datejour2)+$pdf->mdocmd('=2',2,$datejour1,$datejour2)+$pdf->mdocmd('=3',2,$datejour1,$datejour2)+$pdf->mdocmd('=4',2,$datejour1,$datejour2)+$pdf->mdocmd('=5',2,$datejour1,$datejour2),1,0,'C',1,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',5,$datejour1,$datejour2)+$pdf->mdocmd('=2',5,$datejour1,$datejour2)+$pdf->mdocmd('=3',5,$datejour1,$datejour2)+$pdf->mdocmd('=4',5,$datejour1,$datejour2)+$pdf->mdocmd('=5',5,$datejour1,$datejour2),1,0,'C',1,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',27,$datejour1,$datejour2)+$pdf->mdocmd('=2',27,$datejour1,$datejour2)+$pdf->mdocmd('=3',27,$datejour1,$datejour2)+$pdf->mdocmd('=4',27,$datejour1,$datejour2)+$pdf->mdocmd('=5',27,$datejour1,$datejour2),1,0,'C',1,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',17,$datejour1,$datejour2)+$pdf->mdocmd('=2',17,$datejour1,$datejour2)+$pdf->mdocmd('=3',17,$datejour1,$datejour2)+$pdf->mdocmd('=4',17,$datejour1,$datejour2)+$pdf->mdocmd('=5',17,$datejour1,$datejour2),1,0,'C',1,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',15,$datejour1,$datejour2)+$pdf->mdocmd('=2',15,$datejour1,$datejour2)+$pdf->mdocmd('=3',15,$datejour1,$datejour2)+$pdf->mdocmd('=4',15,$datejour1,$datejour2)+$pdf->mdocmd('=5',15,$datejour1,$datejour2),1,0,'C',1,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',11,$datejour1,$datejour2)+$pdf->mdocmd('=2',11,$datejour1,$datejour2)+$pdf->mdocmd('=3',11,$datejour1,$datejour2)+$pdf->mdocmd('=4',11,$datejour1,$datejour2)+$pdf->mdocmd('=5',11,$datejour1,$datejour2),1,0,'C',1,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',26,$datejour1,$datejour2)+$pdf->mdocmd('=2',26,$datejour1,$datejour2)+$pdf->mdocmd('=3',26,$datejour1,$datejour2)+$pdf->mdocmd('=4',26,$datejour1,$datejour2)+$pdf->mdocmd('=5',26,$datejour1,$datejour2),1,0,'C',1,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',4,$datejour1,$datejour2)+$pdf->mdocmd('=2',4,$datejour1,$datejour2)+$pdf->mdocmd('=3',4,$datejour1,$datejour2)+$pdf->mdocmd('=4',4,$datejour1,$datejour2)+$pdf->mdocmd('=5',4,$datejour1,$datejour2),1,0,'C',1,0);
$pdf->cell(24.4,5,$pdf->mdocmd('=1',13,$datejour1,$datejour2)+$pdf->mdocmd('=2',13,$datejour1,$datejour2)+$pdf->mdocmd('=3',13,$datejour1,$datejour2)+$pdf->mdocmd('=4',13,$datejour1,$datejour2)+$pdf->mdocmd('=5',13,$datejour1,$datejour2),1,0,'C',1,0);

$pdf->SetXY(5,$pdf->GetY()+10);
$pdf->cell(290,5,html_entity_decode(utf8_decode("II-Nombre De Cas Repartis Par Tranche D age Et Sexe")),1,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+5);
$pdf->cell(46,15,html_entity_decode(utf8_decode("Nature De L'affection")),1,0,'L',1,0);
$pdf->cell(26*8,5,"Tranche D age Et Sexe",1,0,'C',1,0);$pdf->cell(36,10,"Total",1,0,'C',1,0);
$pdf->SetXY(5+46,$pdf->GetY()+5);
$pdf->cell(26,5,"00-01",1,0,'C',1,0);
$pdf->cell(26,5,"02-04",1,0,'C',1,0);
$pdf->cell(26,5,"05-09",1,0,'C',1,0);
$pdf->cell(26,5,"10-14",1,0,'C',1,0);
$pdf->cell(26,5,"15-19",1,0,'C',1,0);
$pdf->cell(26,5,"20-44",1,0,'C',1,0);
$pdf->cell(26,5,"44-64",1,0,'C',1,0);
$pdf->cell(26,5,"65-99",1,0,'C',1,0);
$pdf->SetXY(5+46,$pdf->GetY()+5);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(12,5,"M",1,0,'C',1,0);
$pdf->cell(12,5,"F",1,0,'C',1,0);
$pdf->cell(12,5,"T",1,0,'C',1,0);
$pdf->setxy(5,$pdf->gety()+5);
$pdf->mysqlconnect();
$query = "SELECT * from mdo where yes=1 order by mdo "; 
$res=mysql_query($query);
$tot=mysql_num_rows($res);
while($row=mysql_fetch_object($res))
{
$pdf->lignemdoiiia($EPH1,$row->id,$datejour1,$datejour2,ucwords(strtolower ($pdf->nbrtostring('mdo','id',$row->id,'mdo'))),10);		
$pdf->setxy(5,$pdf->gety()+5); 
}
$pdf->SetXY(100,$pdf->GetY());$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	



// $pdf->AddPage('L','A4');
// $pdf->SetDisplayMode('fullpage','single');//mode d affichage 
// $pdf->SetFont('Arial','B',9);
// $pdf->SetXY(05,5); $pdf->cell(290,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",0,0,'C',0,0);
// $pdf->SetXY(05,10);$pdf->cell(290,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
// $pdf->SetXY(05,15);$pdf->cell(290,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
// $pdf->SetXY(05,20);$pdf->cell(145,5,$EPH,0,0,'L',0,0);$pdf->cell(145,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
// $pdf->SetXY(05,25);$pdf->cell(145,5,"N               / ".date ('Y'),0,0,'L',0,0);
// $pdf->SetXY(05,30); $pdf->cell(290,5,html_entity_decode(utf8_decode('ANNEXE 6 ')),0,0,'C',0,0);
// $pdf->SetXY(05,35); $pdf->cell(290,5,html_entity_decode(utf8_decode('EVALUATION DES TAUX DE COUVERTURE VACCINAL')),0,0,'C',0,0);
// $pdf->SetXY(05,40); $pdf->cell(290,5,'DU  '.$pdf->dateUS2FR($datejour1).'  AU  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);


// $pdf->SetXY(5,$pdf->GetY()+5);
// $pdf->cell(26,5,"VACCIN",1,0,'C',1,0);
// $pdf->cell(24,5,"NSS",1,0,'C',1,0);
// $pdf->cell(24,5,"02M",1,0,'C',1,0);
// $pdf->cell(24,5,"03M",1,0,'C',1,0);
// $pdf->cell(24,5,"04M",1,0,'C',1,0);
// $pdf->cell(24,5,"11M",1,0,'C',1,0);
// $pdf->cell(24,5,"12M",1,0,'C',1,0);
// $pdf->cell(24,5,"18M",1,0,'C',1,0);
// $pdf->cell(24,5,"06A",1,0,'C',1,0);
// $pdf->cell(24,5,"11-13A",1,0,'C',1,0);
// $pdf->cell(24,5,"16-18A",1,0,'C',1,0);
// $pdf->cell(24,5,"/10A",1,0,'C',1,0);


// $pdf->SetXY(5,$pdf->GetY()+5);
// $pdf->SetFillColor(200);$pdf->cell(26,5,"BCG",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(200);$pdf->cell(24,5,"BCG",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);

// $pdf->SetXY(5,$pdf->GetY()+5);
// $pdf->SetFillColor(225,225,0);$pdf->cell(26,5,"HVB",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(225,225,0);$pdf->cell(24,5,"HVB",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);

// $pdf->SetXY(5,$pdf->GetY()+5);
// $pdf->SetFillColor(253, 108, 158);$pdf->cell(26,5,"VPO",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(253, 108, 158);$pdf->cell(24,5,"VPO",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(253, 108, 158);$pdf->cell(24,5,"VPO",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(253, 108, 158);$pdf->cell(24,5,"VPO",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(253, 108, 158);$pdf->cell(24,5,"VPO",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(253, 108, 158);$pdf->cell(24,5,"VPO",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(253, 108, 158);$pdf->cell(24,5,"VPO",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);



// $pdf->SetXY(5,$pdf->GetY()+5);
// $pdf->SetFillColor(123, 160, 91);$pdf->cell(26,5,"PENTA",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(123, 160, 91);$pdf->cell(24,5,"PENTA",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(123, 160, 91);$pdf->cell(24,5,"PENTA",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(123, 160, 91);$pdf->cell(24,5,"PENTA",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);

// $pdf->SetXY(5,$pdf->GetY()+5);
// $pdf->SetFillColor(255, 203, 96);$pdf->cell(26,5,"PNEUMO",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(255, 203, 96);$pdf->cell(24,5,"PNEUMO",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(255, 203, 96);$pdf->cell(24,5,"PNEUMO",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(255, 203, 96);$pdf->cell(24,5,"PNEUMO",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);

// $pdf->SetXY(5,$pdf->GetY()+5);
// $pdf->SetFillColor(254, 231, 240);$pdf->cell(26,5,"VPI",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(254, 231, 240);$pdf->cell(24,5,"VPI",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);

// $pdf->SetXY(5,$pdf->GetY()+5);
// $pdf->SetFillColor(255, 0, 0);$pdf->cell(26,5,"ROR",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(255, 0, 0);$pdf->cell(24,5,"ROR",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(255, 0, 0);$pdf->cell(24,5,"ROR",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);


// $pdf->SetXY(5,$pdf->GetY()+5);
// $pdf->SetFillColor(0, 127, 255);$pdf->cell(26,5,"DTC",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(0, 127, 255);$pdf->cell(24,5,"DTC",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);


// $pdf->SetXY(5,$pdf->GetY()+5);
// $pdf->SetFillColor(116, 208, 241);$pdf->cell(26,5,"DT",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(24,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(116, 208, 241);$pdf->cell(24,5,"DT",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(116, 208, 241);$pdf->cell(24,5,"DT",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(116, 208, 241);$pdf->cell(24,5,"DT",1,0,'C',1,0);$pdf->SetFillColor(230);


// $pdf->SetXY(5,$pdf->GetY()+15);
// $pdf->cell(46,5,html_entity_decode(utf8_decode("NAISSANCE")),1,0,'L',1,0);
// $pdf->cell(17,5,"",1,0,'C',1,0);
// $pdf->cell(17,5,"",1,0,'C',1,0);
// $pdf->SetFillColor(225,225,0);$pdf->cell(15,5,"BCG",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(15,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(253, 108, 158);$pdf->cell(15,5,"VPO",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(15,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(15,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(15,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(123, 160, 91);$pdf->cell(15,5,"VPO",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(15,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(15,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(230);$pdf->cell(15,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(254, 231, 240);$pdf->cell(15,5,"VPO",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(225,225,0);$pdf->cell(15,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(255, 203, 96);$pdf->cell(15,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);
// $pdf->SetFillColor(0, 255, 0);$pdf->cell(15,5,"",1,0,'C',1,0);$pdf->SetFillColor(230);


//https://www.toutes-les-couleurs.com/code-couleur-rvb.php   )






// $pdf->SetXY(5,$pdf->GetY()+5);
// $pdf->cell(46,5,html_entity_decode(utf8_decode("NAISSANCE")),1,0,'L',1,0);
// $pdf->cell(17,5,"DEC",1,0,'C',1,0);
// $pdf->cell(17,5,"CIB",1,0,'C',1,0);
// $pdf->cell(15,5,"HVB",1,0,'C',1,0);
// $pdf->cell(15,5,"%",1,0,'C',1,0);
// $pdf->cell(15,5,"PENTA",1,0,'C',1,0);
// $pdf->cell(15,5,"%",1,0,'C',1,0);
// $pdf->cell(15,5,"VPI",1,0,'C',1,0);
// $pdf->cell(15,5,"%",1,0,'C',1,0);
// $pdf->cell(15,5,"PENTA",1,0,'C',1,0);
// $pdf->cell(15,5,"%",1,0,'C',1,0);
// $pdf->cell(15,5,"ROR1",1,0,'C',1,0);
// $pdf->cell(15,5,"%",1,0,'C',1,0);
// $pdf->cell(15,5,"PENTA",1,0,'C',1,0);
// $pdf->cell(15,5,"%",1,0,'C',1,0);
// $pdf->cell(15,5,"ROR2",1,0,'C',1,0);
// $pdf->cell(15,5,"%",1,0,'C',1,0);

// $pdf->SetXY(5,$pdf->GetY()+5);
// $pdf->cell(46,5,html_entity_decode(utf8_decode("NAISSANCE")),1,0,'L',1,0);
// $pdf->cell(17,5,"",1,0,'C',1,0);
// $pdf->cell(17,5,"",1,0,'C',1,0);
// $pdf->cell(15,5,"VPO",1,0,'C',1,0);
// $pdf->cell(15,5,"",1,0,'C',1,0);
// $pdf->cell(15,5,"PNEMO",1,0,'C',1,0);
// $pdf->cell(15,5,"",1,0,'C',1,0);
// $pdf->cell(15,5,"",1,0,'C',1,0);
// $pdf->cell(15,5,"",1,0,'C',1,0);
// $pdf->cell(15,5,"PNEUMO",1,0,'C',1,0);
// $pdf->cell(15,5,"",1,0,'C',1,0);
// $pdf->cell(15,5,"",1,0,'C',1,0);
// $pdf->cell(15,5,"",1,0,'C',1,0);
// $pdf->cell(15,5,"PNEUMO",1,0,'C',1,0);
// $pdf->cell(15,5,"",1,0,'C',1,0);
// $pdf->cell(15,5,"",1,0,'C',1,0);
// $pdf->cell(15,5,"",1,0,'C',1,0);




// $pdf->SetXY(5,$pdf->GetY()+5);
// $pdf->cell(23,5,"MOIS",1,0,'C',1,0);
// $pdf->cell(23,5,"NSS",1,0,'C',1,0);

// $pdf->SetXY(5,$pdf->GetY()+5);
// $pdf->cell(23,5,"MOIS",1,0,'C',0,0);
// $pdf->cell(23,5,"NSS",1,0,'C',0,0);
// $pdf->cell(17,5,"DEC",1,0,'C',0,0);
// $pdf->cell(17,5,"CIB",1,0,'C',0,0);
// $pdf->cell(15,5,"BHP",1,0,'C',0,0);
// $pdf->cell(15,5,"%",1,0,'C',0,0);
// $pdf->cell(15,5,"PPP1",1,0,'C',0,0);
// $pdf->cell(15,5,"%",1,0,'C',0,0);
// $pdf->cell(15,5,"VPI",1,0,'C',0,0);
// $pdf->cell(15,5,"%",1,0,'C',0,0);
// $pdf->cell(15,5,"PPP2",1,0,'C',0,0);
// $pdf->cell(15,5,"%",1,0,'C',0,0);
// $pdf->cell(15,5,"ROR1",1,0,'C',0,0);
// $pdf->cell(15,5,"%",1,0,'C',0,0);
// $pdf->cell(15,5,"PPP3",1,0,'C',0,0);
// $pdf->cell(15,5,"%",1,0,'C',0,0);
// $pdf->cell(15,5,"ROR2",1,0,'C',0,0);
// $pdf->cell(15,5,"%",1,0,'C',0,0);

// $annee="1992";

// $pdf->SetXY(5,$pdf->GetY()+15);
// $pdf->cell(46,5,html_entity_decode(utf8_decode("NAISSANCE ".$annee)),1,0,'L',1,0);
// $pdf->cell(17,5,"",1,0,'C',1,0);
// $pdf->cell(17,5,"",1,0,'C',1,0);
// $pdf->cell(15,5,"BCG",1,0,'C',1,0);
// $pdf->cell(15,5,"%BCG",1,0,'C',1,0);


// $pdf->cell(15,5,"DTCP1",1,0,'C',1,0);
// $pdf->cell(15,5,"%DTCP1",1,0,'C',1,0);

// $pdf->cell(15,5,"DTCP2",1,0,'C',1,0);
// $pdf->cell(15,5,"%DTCP2",1,0,'C',1,0);

// $pdf->cell(15,5,"DTCP3",1,0,'C',1,0);
// $pdf->cell(15,5,"%DTCP3",1,0,'C',1,0);


// $pdf->cell(15,5,"DTCPR",1,0,'C',1,0);
// $pdf->cell(15,5,"%DTCPR",1,0,'C',1,0);

// $pdf->cell(15,5,"RO",1,0,'C',1,0);
// $pdf->cell(15,5,"%RO",1,0,'C',1,0);






 

// $pdf->tibavac2("janv-".$annee,$annee."-01-01",$annee."-01-31");
// $pdf->tibavac2("fev-".$annee,$annee."-02-01",$annee."-02-31");
// $pdf->tibavac2("mars-".$annee,$annee."-03-01",$annee."-03-31");
// $pdf->tibavac2("T1-".$annee,$annee."-01-01",$annee."-03-31");

// $pdf->tibavac2("avril-".$annee,$annee."-04-01",$annee."-04-31");
// $pdf->tibavac2("mai-".$annee,$annee."-05-01",$annee."-05-31");
// $pdf->tibavac2("juin-".$annee,$annee."-06-01",$annee."-06-31");
// $pdf->tibavac2("T2-".$annee,$annee."-04-01",$annee."-06-31");

// $pdf->tibavac2("juil-".$annee,$annee."-07-01",$annee."-07-31");
// $pdf->tibavac2("aout-".$annee,$annee."-08-01",$annee."-08-31");
// $pdf->tibavac2("sept-".$annee,$annee."-09-01",$annee."-09-31");
// $pdf->tibavac2("T3-".$annee,$annee."-07-01",$annee."-09-31");

// $pdf->tibavac2("oct-".$annee,$annee."-10-01",$annee."-10-31");
// $pdf->tibavac2("nov-".$annee,$annee."-11-01",$annee."-11-31");
// $pdf->tibavac2("dec-".$annee,$annee."-12-01",$annee."-12-31");
// $pdf->tibavac2("T4-".$annee,$annee."-10-01",$annee."-12-31");


// $pdf->tibavac2("total-".$annee,$annee."-01-01",$annee."-12-31");


$pdf->Output();
}		
		




if ($_POST['MDO']=='1') //1ere partie
{
	require('MDOC1.php');
	$pdf = new MDOC( 'P', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
	$date=date("d-m-y");
	$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
	$pdf->SetTextColor(0,0,0);//text noire
	$pdf->SetFont('Times', 'B', 10);
	$pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
	$pdf->SetFont('Arial','B',9);
	$pdf->SetXY(05,5); $pdf->cell(200,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",0,0,'C',0,0);
	$pdf->SetXY(05,10);$pdf->cell(200,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
	$pdf->SetXY(05,15);$pdf->cell(200,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
	$pdf->SetXY(05,20);$pdf->cell(100,5,"SERVICE PREVENTION",0,0,'L',0,0);$pdf->cell(100,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
	$pdf->SetXY(05,25);$pdf->cell(100,5,"N               / ".date ('Y'),0,0,'L',0,0);
        

		if ($_POST['ETABLISSEMENT']=='12') //1ere partie
		{
		$pdf->SetXY(05,30);$pdf->cell(200,5,"RAPPORT MALADIES A DECLARATION OBLIGATOIRE",0,0,'C',0,0);
		$pdf->SetXY(05,35);$pdf->cell(200,5,"DU ".$pdf->dateUS2FR($datejour1)." AU ".$pdf->dateUS2FR($datejour2),0,0,'C',0,0);
		$pdf->SetXY(5,50);$pdf->cell(200,5,html_entity_decode(utf8_decode("I-Nombre De Cas Repartis Par Etablissements Sanitaires")),1,0,'L',1,0);
		$pdf->SetXY(5,55);$pdf->cell(46,10,"Etablissements Sanitaires",1,0,1,'L',0);$pdf->cell(22,10,"Brucellose",1,0,'C',1,0);$pdf->cell(22,5,"Leishmaniose",1,0,'C',1,0);$pdf->cell(22,5,"Tuberculose",1,0,'C',1,0);$pdf->cell(22,10,"Meningite",1,0,'C',1,0);$pdf->cell(22,5,"Hepatites",1,0,'C',1,0);$pdf->cell(22,10,"Syphilis",1,0,'C',1,0);$pdf->cell(22,10,"TIAC",1,0,'C',1,0);
		$pdf->SetXY(51+22,60);$pdf->cell(22,5,"Cutane",1,0,'C',1,0);$pdf->cell(11,5,"TP",1,0,'C',1,0);$pdf->cell(11,5,"TEP",1,0,'C',1,0);
		$pdf->SetXY(51+88,60);$pdf->cell(11,5,"B",1,0,'C',1,0);$pdf->cell(11,5,"C",1,0,'C',1,0);

		
		
		
		
$pdf->SetXY(5,65);
$pdf->cell(46,5,"Ain-oussera",1,0,'L',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=1',20,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=1',15,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=1',13,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=1',11,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=1',5,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=1',26,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=1',4,$datejour1,$datejour2),1,0,'C',0,0);

$pdf->SetXY(5,70);
$pdf->cell(46,5,"Hassi-bahbah",1,0,'L',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=2',20,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=2',15,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=2',13,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=2',11,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=2',5,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=2',26,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=2',4,$datejour1,$datejour2),1,0,'C',0,0);


$pdf->SetXY(5,75);
$pdf->cell(46,5,"Djelfa",1,0,'L',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=3',20,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=3',15,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=3',13,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=3',11,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=3',5,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=3',26,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=3',4,$datejour1,$datejour2),1,0,'C',0,0);


$pdf->SetXY(5,80);
$pdf->cell(46,5,"Messaad",1,0,'L',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=4',20,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=4',15,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=4',13,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=4',11,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=4',5,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=4',26,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=4',4,$datejour1,$datejour2),1,0,'C',0,0);

$pdf->SetXY(5,85);
$pdf->cell(46,5,"Guettara",1,0,'L',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=5',20,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=5',15,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=5',13,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=5',11,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=5',5,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=5',26,$datejour1,$datejour2),1,0,'C',0,0);
$pdf->cell(22,5,$pdf->mdocmd('=5',4,$datejour1,$datejour2),1,0,'C',0,0);

$pdf->SetXY(5,90);
$pdf->cell(46,5,"Total",1,0,'L',1,0);
$pdf->cell(22,5,
$pdf->mdocmd('=1',20,$datejour1,$datejour2)+
$pdf->mdocmd('=2',20,$datejour1,$datejour2)+
$pdf->mdocmd('=3',20,$datejour1,$datejour2)+
$pdf->mdocmd('=4',20,$datejour1,$datejour2)+
$pdf->mdocmd('=5',20,$datejour1,$datejour2)
,1,0,'C',1,0);

$pdf->cell(22,5,
$pdf->mdocmd('=1',15,$datejour1,$datejour2)+
$pdf->mdocmd('=2',15,$datejour1,$datejour2)+
$pdf->mdocmd('=3',15,$datejour1,$datejour2)+
$pdf->mdocmd('=4',15,$datejour1,$datejour2)+
$pdf->mdocmd('=5',15,$datejour1,$datejour2)
,1,0,'C',1,0);
$pdf->cell(22,5,
$pdf->mdocmd('=1',13,$datejour1,$datejour2)+
$pdf->mdocmd('=2',13,$datejour1,$datejour2)+
$pdf->mdocmd('=3',13,$datejour1,$datejour2)+
$pdf->mdocmd('=4',13,$datejour1,$datejour2)+
$pdf->mdocmd('=5',13,$datejour1,$datejour2)
,1,0,'C',1,0);
$pdf->cell(22,5,
$pdf->mdocmd('=1',11,$datejour1,$datejour2)+
$pdf->mdocmd('=2',11,$datejour1,$datejour2)+
$pdf->mdocmd('=3',11,$datejour1,$datejour2)+
$pdf->mdocmd('=4',11,$datejour1,$datejour2)+
$pdf->mdocmd('=5',11,$datejour1,$datejour2)
,1,0,'C',1,0);
$pdf->cell(22,5,
$pdf->mdocmd('=1',5,$datejour1,$datejour2)+
$pdf->mdocmd('=2',5,$datejour1,$datejour2)+
$pdf->mdocmd('=3',5,$datejour1,$datejour2)+
$pdf->mdocmd('=4',5,$datejour1,$datejour2)+
$pdf->mdocmd('=5',5,$datejour1,$datejour2)
,1,0,'C',1,0);

$pdf->cell(22,5,
$pdf->mdocmd('=1',26,$datejour1,$datejour2)+
$pdf->mdocmd('=2',26,$datejour1,$datejour2)+
$pdf->mdocmd('=3',26,$datejour1,$datejour2)+
$pdf->mdocmd('=4',26,$datejour1,$datejour2)+
$pdf->mdocmd('=5',26,$datejour1,$datejour2)
,1,0,'C',1,0);
$pdf->cell(22,5,
$pdf->mdocmd('=1',4,$datejour1,$datejour2)+
$pdf->mdocmd('=2',4,$datejour1,$datejour2)+
$pdf->mdocmd('=3',4,$datejour1,$datejour2)+
$pdf->mdocmd('=4',4,$datejour1,$datejour2)+
$pdf->mdocmd('=5',4,$datejour1,$datejour2)
,1,0,'C',1,0);





$pdf->SetXY(5,100);$pdf->cell(200,5,html_entity_decode(utf8_decode("II-Nombre De Cas Repartis Par Tranche D age Et Sexe")),1,0,'L',1,0);
$pdf->SetXY(5,105);

$pdf->cell(46,15,"Maladies",1,0,'L',1,0);
$pdf->cell(9*14,5,"Tranche D age Et Sexe",1,0,'C',1,0);$pdf->cell(28,10,"Total",1,0,'C',1,0);

$pdf->SetXY(5+46,110);

$pdf->cell(18,5,"00-01",1,0,'C',1,0);
$pdf->cell(18,5,"02-04",1,0,'C',1,0);
$pdf->cell(18,5,"05-09",1,0,'C',1,0);
$pdf->cell(18,5,"10-19",1,0,'C',1,0);
$pdf->cell(18,5,"20-44",1,0,'C',1,0);
$pdf->cell(18,5,"45-65",1,0,'C',1,0);
$pdf->cell(18,5,"66-99",1,0,'C',1,0);


$pdf->SetXY(5+46,115);

$pdf->cell(9,5,"M",1,0,'C',1,0);
$pdf->cell(9,5,"F",1,0,'C',1,0);
$pdf->cell(9,5,"M",1,0,'C',1,0);
$pdf->cell(9,5,"F",1,0,'C',1,0);
$pdf->cell(9,5,"M",1,0,'C',1,0);
$pdf->cell(9,5,"F",1,0,'C',1,0);
$pdf->cell(9,5,"M",1,0,'C',1,0);
$pdf->cell(9,5,"F",1,0,'C',1,0);
$pdf->cell(9,5,"M",1,0,'C',1,0);
$pdf->cell(9,5,"F",1,0,'C',1,0);
$pdf->cell(9,5,"M",1,0,'C',1,0);
$pdf->cell(9,5,"F",1,0,'C',1,0);
$pdf->cell(9,5,"M",1,0,'C',1,0);
$pdf->cell(9,5,"F",1,0,'C',1,0);
$pdf->cell(9,5,"M",1,0,'C',1,0);
$pdf->cell(9,5,"F",1,0,'C',1,0);
$pdf->cell(10,5,"T",1,0,'C',1,0);

$pdf->SetXY(5,120);
$pdf->cell(46,5,"Brucellose",1,0,'L',0,0);
$m=20;
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100),1,0,'C',0,0);
$pdf->cell(9,5,
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);
$pdf->cell(9,5,
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);
$pdf->cell(10,5,
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);

$pdf->SetXY(5,125);
$pdf->cell(46,5,"Leishmaniose Cutane",1,0,'L',0,0);
$m=15;
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100),1,0,'C',0,0);
$pdf->cell(9,5,
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);
$pdf->cell(9,5,
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);
$pdf->cell(10,5,
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);

$pdf->SetXY(5,130);
$pdf->cell(46,5,"Tuberculose",1,0,'L',0,0);
$m=13;
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100),1,0,'C',0,0);
$pdf->cell(9,5,
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);
$pdf->cell(9,5,
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);
$pdf->cell(10,5,
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);




$pdf->SetXY(5,135);
$pdf->cell(46,5,"Meningite",1,0,'L',0,0);
$m=11;
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100),1,0,'C',0,0);
$pdf->cell(9,5,
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);
$pdf->cell(9,5,
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);
$pdf->cell(10,5,
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);

$pdf->SetXY(5,140);
$pdf->cell(46,5,"Hepatites virales",1,0,'L',0,0);
$m=5;
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100),1,0,'C',0,0);
$pdf->cell(9,5,
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);
$pdf->cell(9,5,
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);
$pdf->cell(10,5,
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);

$pdf->SetXY(5,145);
$pdf->cell(46,5,"Syphilis ",1,0,'L',0,0);
$m=26;
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100),1,0,'C',0,0);
$pdf->cell(9,5,
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);
$pdf->cell(9,5,
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);
$pdf->cell(10,5,
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);

$pdf->SetXY(5,150);
$pdf->cell(46,5,"TIAC",1,0,'L',0,0);
$m=4;
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100),1,0,'C',0,0);
$pdf->cell(9,5,$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100),1,0,'C',0,0);
$pdf->cell(9,5,
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);
$pdf->cell(9,5,
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);
$pdf->cell(10,5,
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'M',$datejour1,$datejour2,66,100)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,0,1)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,2,4)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,5,9)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,10,19)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,20,44)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,45,65)+
$pdf->mdocmd1($m,'F',$datejour1,$datejour2,66,100)
,1,0,'C',0,0);



$pdf->SetXY(5,155);
$pdf->cell(46,5,"Total",1,0,'L',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(9,5,"",1,0,'C',1,0);
$pdf->cell(10,5,"",1,0,'C',1,0);
}
$pdf->SetXY(100,$pdf->GetY()+10);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}



if ($_POST['MDO']=='2') // 2ere partie annexe II
{
require('MDOC1.php');
$pdf = new MDOC( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(05,5); $pdf->cell(290,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",0,0,'C',0,0);
$pdf->SetXY(05,10);$pdf->cell(290,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
$pdf->SetXY(05,15);$pdf->cell(290,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
$pdf->SetXY(05,20);$pdf->cell(145,5,"ETABLISSEMENT".$_POST['ETABLISSEMENT'],0,0,'L',0,0);$pdf->cell(145,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
$pdf->SetXY(05,25);$pdf->cell(145,5,"N               / ".date ('Y'),0,0,'L',0,0);
$pdf->SetXY(05,30); $pdf->cell(290,5,html_entity_decode(utf8_decode('ANNEXE II - CIRCULAIRE N° 1126 /MSP/DP/SDPG... DU 17 NOVEMBER 1990')),0,0,'C',0,0);
$pdf->SetXY(05,35); $pdf->cell(290,5,html_entity_decode(utf8_decode('RELEVE DES MALADIES A DECLARATION OBLIGATOIRE')),0,0,'C',0,0);
$pdf->SetXY(05,40); $pdf->cell(290,5,'DU  '.$pdf->dateUS2FR($datejour1).'  AU  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);
$h=50;
$pdf->SetXY(005,$h);$pdf->cell(20,10,html_entity_decode(utf8_decode("N°")),1,0,'C',1,0);
$pdf->cell(20,10,"DATE",1,0,'C',1,0);
$pdf->cell(60,10,"NOM ET PRENOM",1,0,'C',1,0);
$pdf->cell(20,10,"AGE",1,0,'C',1,0);
$pdf->cell(10,5,"SEXE",1,0,'C',1,0);
$pdf->SetXY(125,$h+5);$pdf->cell(5,5,"M",1,0,'C',1,0);
$pdf->SetXY(130,$h+5);$pdf->cell(5,5,"F",1,0,'C',1,0);
$pdf->SetXY(135,$h);$pdf->cell(50,10,"ADRESSE",1,0,'C',1,0);
$pdf->cell(80,10,"MALADIE",1,0,'C',1,0);
$pdf->cell(30,10,"OBSERVATION",1,0,'C',1,0);

$pdf->mysqlconnect();
$STRUCTURE=$_POST['ETABLISSEMENT'];
$mdo=$_POST['MADO'];
if ($STRUCTURE!='12') 
{   
	if ($mdo!=='34') 
	{
	$query = "SELECT * from mdo1 where STRUCTURE=$STRUCTURE  and mdo=$mdo and  (DATEMDO BETWEEN '$datejour1' AND '$datejour2')  "; 
	}
	else
	{
	$query = "SELECT * from mdo1 where STRUCTURE=$STRUCTURE  and   (DATEMDO BETWEEN '$datejour1' AND '$datejour2')  "; 
	}
} 
else 
{
	if ($mdo!=='34') 
	{
	$query = "SELECT * from mdo1 where  mdo=$mdo and  (DATEMDO BETWEEN '$datejour1' AND '$datejour2')  "; 
	}
	else
	{
	$query = "SELECT * from mdo1 where   (DATEMDO BETWEEN '$datejour1' AND '$datejour2')  "; 
	}
}

$res=mysql_query($query);
$tot=mysql_num_rows($res);
// $pdf->SetXY(05,55); 
// for ($i = 1; $i <= $tot; $i++) {
    // $pdf->SetXY(05,$pdf->GetY()+5);
	// $pdf->cell(20,5,$i,1,0,'C',0);  
// }
$pdf->SetXY(5,60); 
while($row=mysql_fetch_object($res))
{
$pdf->cell(20,5,$row->id,1,0,'C',0);
$pdf->cell(20,5,$pdf->dateUS2FR($row->DATEMDO),1,0,'C',0);
$pdf->cell(60,5,$row->NOMPRENOM,1,0,'L',0,0);
$pdf->cell(20,5,$row->AGE,1,0,'C',0,0);
if (Trim($row->SEXE)=='M'){$pdf->cell(5,5,'X',1,0,'L',0);$pdf->cell(5,5,'',1,0,'L',0);}
if (Trim($row->SEXE)=='F'){$pdf->cell(5,5,'',1,0,'L',0);$pdf->cell(5,5,'X',1,0,'L',0);}
$pdf->cell(50,5,$pdf->nbrtostring('com','IDCOM',$row->COMMUNE,'COMMUNE') ,1,0,'L',0,0);
$pdf->cell(80,5,$pdf->nbrtostring('mdo','id',$row->MDO,'mdo'),1,0,'L',0,0);
$pdf->cell(30,5,$row->OBSERVATION,1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);  
}
$pdf->cell(290,10,html_entity_decode(utf8_decode("TOTAL MDO : ".$tot)),1,0,'C',1,0);
$pdf->SetXY(100,$pdf->GetY()+10);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}

if ($_POST['MDO']=='3') //3ere partie annexe III
{

require('MDOC1.php');
$pdf = new MDOC( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(05,5); $pdf->cell(290,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",0,0,'C',0,0);
$pdf->SetXY(05,10);$pdf->cell(290,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
$pdf->SetXY(05,15);$pdf->cell(290,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
$pdf->SetXY(05,20);$pdf->cell(145,5,$EPH,0,0,'L',0,0);$pdf->cell(145,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
$pdf->SetXY(05,25);$pdf->cell(145,5,"N               / ".date ('Y'),0,0,'L',0,0);
$pdf->SetXY(05,30); $pdf->cell(290,5,html_entity_decode(utf8_decode('ANNEXE III - CIRCULAIRE N° 1126 /MSP/DP/SDPG... DU 17 NOVEMBER 1990')),0,0,'C',0,0);
$pdf->SetXY(05,35); $pdf->cell(290,5,html_entity_decode(utf8_decode('RELEVE DES MALADIES A DECLARATION OBLIGATOIRE')),0,0,'C',0,0);
$pdf->SetXY(05,40); $pdf->cell(290,5,'DU  '.$pdf->dateUS2FR($datejour1).'  AU  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);
$pdf->cell(46,10,html_entity_decode(utf8_decode("Nature De L'affection")),1,0,'L',1,0);
$pdf->cell(26*8,5,"Tranche D age Et Sexe",1,0,'C',1,0);$pdf->cell(36,10,"Total",1,0,'C',1,0);
$pdf->SetXY(5+46,$pdf->GetY()+5);
$pdf->cell(26,5,"00-01",1,0,'C',1,0);
$pdf->cell(26,5,"02-04",1,0,'C',1,0);
$pdf->cell(26,5,"05-09",1,0,'C',1,0);
$pdf->cell(26,5,"10-14",1,0,'C',1,0);
$pdf->cell(26,5,"15-19",1,0,'C',1,0);
$pdf->cell(26,5,"20-44",1,0,'C',1,0);
$pdf->cell(26,5,"44-64",1,0,'C',1,0);
$pdf->cell(26,5,"65-99",1,0,'C',1,0);
$pdf->SetXY(5,$pdf->GetY()+5);
$pdf->cell(46,5,html_entity_decode(utf8_decode("Commune D'origine Du Malade")),1,0,'L',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"F",1,0,'C',1,0);
$pdf->cell(12,5,"M",1,0,'C',1,0);
$pdf->cell(12,5,"F",1,0,'C',1,0);
$pdf->cell(12,5,"T",1,0,'C',1,0);

$pdf->mysqlconnect();
$query = "SELECT * from mdo where yes=1 order by mdo "; 
$res=mysql_query($query);
$tot=mysql_num_rows($res);
while($row=mysql_fetch_object($res))
{
    $pdf->lignemdoiii($EPH1,$row->id,$datejour1,$datejour2,ucwords(strtolower ($pdf->nbrtostring('mdo','id',$row->id,'mdo'))),10);		
	$pdf->setxy(10,$pdf->gety()+5); 
}
$pdf->SetXY(100,$pdf->GetY()+10);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}




if ($_POST['MDO']=='4') //5ere partie tableau
{

require('MDOC1.php');
$pdf = new MDOC( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 

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
$pdf->SetXY(05,25); $pdf->cell(200,5,html_entity_decode(utf8_decode('Repartition Geographique')),0,0,'C',0,0);
// $pdf->SetXY(05,35); $pdf->cell(200,5,html_entity_decode(utf8_decode('RELEVE DES MALADIES A DECLARATION OBLIGATOIRE')),0,0,'C',0,0);
$pdf->SetXY(05,29); $pdf->cell(200,5,'Du  '.$pdf->dateUS2FR($datejour1).'  Au  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);
// $pdf->SetXY(5,$pdf->GetY()+10);
$mdo=$_POST['MADO'];
$pdf->djelfa($pdf->datasig($datejour1,$datejour2,$EPH1,$mdo),20,128,3.7,'commune');//commune//dairas 
$pdf->SetXY(100,240);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(100,250);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
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
$pdf->SetXY(05,25);$pdf->cell(100,5,"N               / ".date ('Y'),0,0,'L',0,0);$mdo=$_POST['MADO'];
$pdf->SetXY(05,25); $pdf->cell(200,5,html_entity_decode(utf8_decode('Repartition des cas : '.ucwords(strtolower ($pdf->nbrtostring('mdo','id',$mdo,'mdo'))))),0,0,'C',0,0);
// $pdf->SetXY(05,35); $pdf->cell(200,5,html_entity_decode(utf8_decode('RELEVE DES MALADIES A DECLARATION OBLIGATOIRE')),0,0,'C',0,0);
$pdf->SetXY(05,29); $pdf->cell(200,5,'Du  '.$pdf->dateUS2FR($datejour1).'  Au  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);
$pdf->T2F20($pdf->dataagesexe(5,42,'AGE','mdo1','DATEMDO','COMMUNER',$datejour1,$datejour2,$EPH1,$mdo),$datejour1,$datejour2);
$pdf->SetXY(100,240);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(100,250);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('p','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(05,5); $pdf->cell(200,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",1,0,'C',0,0);
$pdf->SetXY(05,10);$pdf->cell(200,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
$pdf->SetXY(05,15);$pdf->cell(200,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
$pdf->SetXY(05,20);$pdf->cell(100,5,$EPH,0,0,'L',0,0);$pdf->cell(145,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
$pdf->SetXY(05,25);$pdf->cell(100,5,"N               / ".date ('Y'),0,0,'L',0,0);$mdo=$_POST['MADO'];
$pdf->SetXY(05,25); $pdf->cell(200,5,html_entity_decode(utf8_decode('Repartition des cas par mois : '.ucwords(strtolower ($pdf->nbrtostring('mdo','id',$mdo,'mdo'))))),0,0,'C',0,0);
// $pdf->SetXY(05,35); $pdf->cell(200,5,html_entity_decode(utf8_decode('RELEVE DES MALADIES A DECLARATION OBLIGATOIRE')),0,0,'C',0,0);
$pdf->SetXY(05,29); $pdf->cell(200,5,'Du  '.$pdf->dateUS2FR($datejour1).'  Au  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);
// $pdf->SetXY(5,$pdf->GetY()+10);
$year=date('Y');
$mdo01=$pdf->mdobarmois($year.'-01-01',$year.'-01-31',$EPH1,$mdo);
$mdo02=$pdf->mdobarmois($year.'-02-01',$year.'-02-30',$EPH1,$mdo);
$mdo03=$pdf->mdobarmois($year.'-03-01',$year.'-03-31',$EPH1,$mdo);
$mdo04=$pdf->mdobarmois($year.'-04-01',$year.'-04-30',$EPH1,$mdo);
$mdo05=$pdf->mdobarmois($year.'-05-01',$year.'-05-31',$EPH1,$mdo);
$mdo06=$pdf->mdobarmois($year.'-06-01',$year.'-06-30',$EPH1,$mdo);
$mdo07=$pdf->mdobarmois($year.'-07-01',$year.'-07-31',$EPH1,$mdo);
$mdo08=$pdf->mdobarmois($year.'-08-01',$year.'-08-31',$EPH1,$mdo);
$mdo09=$pdf->mdobarmois($year.'-09-01',$year.'-09-30',$EPH1,$mdo);
$mdo10=$pdf->mdobarmois($year.'-10-01',$year.'-10-31',$EPH1,$mdo);
$mdo11=$pdf->mdobarmois($year.'-11-01',$year.'-11-30',$EPH1,$mdo);
$mdo12=$pdf->mdobarmois($year.'-12-01',$year.'-12-31',$EPH1,$mdo);

$h=9.3;
$pdf->SetXY(05,42);$pdf->cell(45,$h,"Mois",1,0,'L',1,0);$pdf->cell(45,$h,"Nombre De Cas",1,0,'C',1,0);
$pdf->SetXY(05,$pdf->GetY()+$h);$pdf->cell(45,$h,"Janvier",1,0,'L',1,0);$pdf->cell(45,$h,$mdo01,1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+$h);$pdf->cell(45,$h,"Fevrier",1,0,'L',1,0);$pdf->cell(45,$h,$mdo02,1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+$h);$pdf->cell(45,$h,"Mars",1,0,'L',1,0);$pdf->cell(45,$h,$mdo03,1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+$h);$pdf->cell(45,$h,"Avril",1,0,'L',1,0);$pdf->cell(45,$h,$mdo04,1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+$h);$pdf->cell(45,$h,"Mai",1,0,'L',1,0);$pdf->cell(45,$h,$mdo05,1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+$h);$pdf->cell(45,$h,"Juin",1,0,'L',1,0);$pdf->cell(45,$h,$mdo06,1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+$h);$pdf->cell(45,$h,"Juillet",1,0,'L',1,0);$pdf->cell(45,$h,$mdo07,1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+$h);$pdf->cell(45,$h,"Aout",1,0,'L',1,0);$pdf->cell(45,$h,$mdo08,1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+$h);$pdf->cell(45,$h,"Septembre",1,0,'L',1,0);$pdf->cell(45,$h,$mdo09,1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+$h);$pdf->cell(45,$h,"October",1,0,'L',1,0);$pdf->cell(45,$h,$mdo10,1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+$h);$pdf->cell(45,$h,"Novombre",1,0,'L',1,0);$pdf->cell(45,$h,$mdo11,1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+$h);$pdf->cell(45,$h,"Decembre",1,0,'L',1,0);$pdf->cell(45,$h,$mdo12,1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+$h);$pdf->cell(45,$h,"Total",1,0,'L',1,0);$pdf->cell(45,$h,$mdo01+$mdo02+$mdo03+$mdo04+$mdo05+$mdo06+$mdo07+$mdo08+$mdo09+$mdo10+$mdo11+$mdo12,1,0,'C',1,0);
$pdf->barmois(135,150,$mdo01,$mdo02,$mdo03,$mdo04,$mdo05,$mdo06,$mdo07,$mdo08,$mdo09,$mdo10,$mdo11,$mdo12,'Repartition des cas par mois  Annee :'.$year);
$pdf->SetXY(100,240);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(100,250);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	


$mdo=$_POST['MADO'];
if ($mdo==11) 
{
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
$pdf->SetXY(05,25);$pdf->cell(100,5,"N               / ".date ('Y'),0,0,'L',0,0);$mdo=$_POST['MADO'];
$pdf->SetXY(05,25); $pdf->cell(200,5,html_entity_decode(utf8_decode('Situation Epidemiologique Des Meningites Purulentes')),0,0,'C',0,0);
$pdf->SetXY(05,29); $pdf->cell(200,5,'Du  '.$pdf->dateUS2FR($datejour1).'  Au  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);
$pdf->SetXY(05,40);
$pdf->cell(200,5,"Nombre De Cas Repartis Par Tranche D'age ",1,0,'C',1,0);
$pdf->SetXY(05,45);
$pdf->cell(40,10,"Periode",1,0,'C',1,0);
$pdf->cell(13*6,5,"Tranche D'age",1,0,'C',1,0);
$pdf->cell(13*2,5,"Germe",1,0,'C',1,0);
$pdf->cell(13*3,5,"Evolution",1,0,'C',1,0);
$pdf->cell(17,10,"Total",1,0,'C',1,0);
$pdf->SetXY(45,50);
$pdf->cell(13,5,"0-1",1,0,'C',1,0);
$pdf->cell(13,5,"1-9",1,0,'C',1,0);
$pdf->cell(13,5,"10-19",1,0,'C',1,0);
$pdf->cell(13,5,"20-29",1,0,'C',1,0);
$pdf->cell(13,5,"30-39",1,0,'C',1,0);
$pdf->cell(13,5,"40-99",1,0,'C',1,0);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"IND",1,0,'C',1,0);
$pdf->cell(13,5,"G",1,0,'C',1,0);
$pdf->cell(13,5,"DC",1,0,'C',1,0);
$pdf->cell(13,5,"S",1,0,'C',1,0);
$pdf->SetXY(05,55);
$pdf->cell(40,5,"Du ".$pdf->dateUS2FR($datejour1),1,0,'C',1,0);
$pdf->SetXY(05,60);
$pdf->cell(40,5,"Au ".$pdf->dateUS2FR($datejour2),1,0,'C',1,0);
$pdf->SetXY(45,55);
$pdf->cell(13,10,$pdf->mdomeningite($EPH1,11,$datejour1,$datejour2,0,0),1,0,'C',0,0);
$pdf->cell(13,10,$pdf->mdomeningite($EPH1,11,$datejour1,$datejour2,1,9),1,0,'C',0,0);
$pdf->cell(13,10,$pdf->mdomeningite($EPH1,11,$datejour1,$datejour2,10,19),1,0,'C',0,0);
$pdf->cell(13,10,$pdf->mdomeningite($EPH1,11,$datejour1,$datejour2,20,29),1,0,'C',0,0);
$pdf->cell(13,10,$pdf->mdomeningite($EPH1,11,$datejour1,$datejour2,30,39),1,0,'C',0,0);
$pdf->cell(13,10,$pdf->mdomeningite($EPH1,11,$datejour1,$datejour2,40,100),1,0,'C',0,0);
$pdf->cell(13,10,"0",1,0,'C',0,0);
$pdf->cell(13,10,$pdf->mdomeningite($EPH1,11,$datejour1,$datejour2,0,100),1,0,'C',0,0);
$pdf->cell(13,10,$pdf->mdomeningite($EPH1,11,$datejour1,$datejour2,0,100),1,0,'C',0,0);
$pdf->cell(13,10,"0",1,0,'C',0,0);
$pdf->cell(13,10,"0",1,0,'C',0,0);
$pdf->cell(17,10,$pdf->mdomeningite($EPH1,11,$datejour1,$datejour2,0,100),1,0,'C',0,0);
$pdf->SetXY(05,70);
$pdf->cell(200,5,"Liste Nominative  ",1,0,'C',1,0);
$pdf->SetXY(05,75);
$pdf->cell(40,10,"Nom Et Prenom",1,0,'C',1,0);
$pdf->cell(10,10,"Sexe  ",1,0,'C',1,0);
$pdf->cell(10,10,"Age  ",1,0,'C',1,0);
$pdf->cell(40,10,"Commune  ",1,0,'C',1,0);
$pdf->cell(13*4,5,"Germe  ",1,0,'C',1,0);
$pdf->cell(16*3,5,"Evolution",1,0,'C',1,0);
$pdf->SetXY(05+100,80);
$pdf->cell(13,5,"M",1,0,'C',1,0);
$pdf->cell(13,5,"SP",1,0,'C',1,0);
$pdf->cell(13,5,"HI",1,0,'C',1,0);
$pdf->cell(13,5,"IND",1,0,'C',1,0);
$pdf->cell(16,5,"G",1,0,'C',1,0);
$pdf->cell(16,5,"DC",1,0,'C',1,0);
$pdf->cell(16,5,"S",1,0,'C',1,0);
$pdf->SetXY(05,85);
$pdf->mysqlconnect();
$query = "SELECT * from mdo1 where MDO=11 AND (DATEMDO BETWEEN '$datejour1' AND '$datejour2')  and   STRUCTURE $EPH1 order by DATEMDO "; 
$res=mysql_query($query);
$tot=mysql_num_rows($res);
while($row=mysql_fetch_object($res))
{
$pdf->cell(40,5,$row->NOMPRENOM,1,0,'L',0,0);
$pdf->cell(10,5,$row->SEXE,1,0,'C',0,0);
$pdf->cell(10,5,$row->AGE,1,0,'C',0,0);
$pdf->cell(40,5,ucwords(strtolower ($pdf->nbrtostring('com','IDCOM',$row->COMMUNE,'COMMUNE'))),1,0,'L',0,0);
$pdf->cell(13,5,"",1,0,'C',0,0);
$pdf->cell(13,5,"",1,0,'C',0,0);
$pdf->cell(13,5,"",1,0,'C',0,0);
$pdf->cell(13,5,"X",1,0,'C',0,0);
$pdf->cell(16,5,"X",1,0,'C',0,0);
$pdf->cell(16,5,"",1,0,'C',0,0);
$pdf->cell(16,5,"",1,0,'C',0,0);	
$pdf->setxy(5,$pdf->gety()+5); 
}
$pdf->SetXY(5,$pdf->gety()+5);$pdf->cell(8,10,"M :",0,0,'L',0);                   $pdf->cell(90,10,"Pour Meningocoque Du Serotype A B C ",0,0,'L',0);
$pdf->SetXY(5,$pdf->gety()+5);$pdf->cell(8,10,"SP :",0,0,'L',0);                  $pdf->cell(10,10,"Pour Pneumocoque ",0,0,'L',0);
$pdf->SetXY(5,$pdf->gety()+5);$pdf->cell(8,10,"HI :",0,0,'L',0);                  $pdf->cell(10,10,"Pour Hoemophilus Influenzae ",0,0,'L',0);
$pdf->SetXY(5,$pdf->gety()+5);$pdf->cell(8,10,"IND :",0,0,'L',0);                 $pdf->cell(10,10,"Pour Indetermine ",0,0,'L',0);
$pdf->SetXY(5,$pdf->gety()+5);$pdf->cell(8,10,"G :",0,0,'L',0);                   $pdf->cell(10,10,"Pour Guerison ",0,0,'L',0);
$pdf->SetXY(5,$pdf->gety()+5);$pdf->cell(8,10,"DC :",0,0,'L',0);                  $pdf->cell(10,10,"Pour Deces ",0,0,'L',0);
$pdf->SetXY(5,$pdf->gety()+5);$pdf->cell(8,10,"S :",0,0,'L',0);                   $pdf->cell(10,10,"Pour Sequelles ",0,0,'L',0);
$pdf->SetXY(100,240);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(100,250);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);
}



if ($mdo==15) 
{
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('p','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(05,5); $pdf->cell(200,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",1,0,'C',0,0);
$pdf->SetXY(05,10);$pdf->cell(200,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
$pdf->SetXY(05,15);$pdf->cell(200,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
$pdf->SetXY(05,20);$pdf->cell(100,5,$EPH,0,0,'L',0,0);$pdf->cell(145,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
$pdf->SetXY(05,25);$pdf->cell(100,5,"N               / ".date ('Y'),0,0,'L',0,0);
$pdf->SetXY(05,25); $pdf->cell(200,5,html_entity_decode(utf8_decode('Evaluation des cas  : '.ucwords(strtolower ($pdf->nbrtostring('mdo','id',$mdo,'mdo'))))),0,0,'C',0,0);
// $pdf->SetXY(05,35); $pdf->cell(200,5,html_entity_decode(utf8_decode('RELEVE DES MALADIES A DECLARATION OBLIGATOIRE')),0,0,'C',0,0);
$pdf->SetXY(05,29); $pdf->cell(200,5,'Du  '.$pdf->dateUS2FR($datejour1).'  Au  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(200,5,"Nombre De Cas de leishmaniose cutane",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Cas Residant Dans La Wilaya",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Cas Residant Hors Wilaya",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Total",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(200,5,"Repartition par sexe",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Cas De Sexe Masculin",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Cas De Sexe Feminin",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(200,5,"Repartition par Age",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Repartition De Cas Chez Les Enfants Ages De Moins De 05 Ans  ",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Repartition De Cas Chez Les Enfants Ages Entre 05-14 Ans",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Repartition De Cas Chez Les Enfants Ages De Plus De 14 Ans",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(200,5,"Diagnostic",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Cas Ayant Beneficier d un examen direct parasitologique ",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Cas confirme parasitologiquement",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(200,5,"Traitement",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Personnes Traitees Par Voie Locale  ",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Personnes Traitees Par Voie Generale",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(160,5,"Nombre De Rechutes",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('p','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(05,5); $pdf->cell(200,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",1,0,'C',0,0);
$pdf->SetXY(05,10);$pdf->cell(200,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
$pdf->SetXY(05,15);$pdf->cell(200,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
$pdf->SetXY(05,20);$pdf->cell(100,5,$EPH,0,0,'L',0,0);$pdf->cell(145,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
$pdf->SetXY(05,25);$pdf->cell(100,5,"N               / ".date ('Y'),0,0,'L',0,0);
$pdf->SetXY(05,25); $pdf->cell(200,5,html_entity_decode(utf8_decode('Repartition Mensuel Et Par Wilaya Des Cas De  : '.ucwords(strtolower ($pdf->nbrtostring('mdo','id',$mdo,'mdo'))))),0,0,'C',0,0);
// $pdf->SetXY(05,35); $pdf->cell(200,5,html_entity_decode(utf8_decode('RELEVE DES MALADIES A DECLARATION OBLIGATOIRE')),0,0,'C',0,0);
$pdf->SetXY(05,29); $pdf->cell(200,5,'Du  '.$pdf->dateUS2FR($datejour1).'  Au  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"Mois",1,0,'L',0,0);     $pdf->cell(40,10,"Nombre De Cas",1,0,'C',0,0); $pdf->cell(40,10,"Sujets Inf A 05 Ans",1,0,'C',0,0); $pdf->cell(40,10,"Sujets Entre 05-14 Ans",1,0,'C',0,0); $pdf->cell(40,10,"Sujets Sup A 14 Ans",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"JANIVIER",1,0,'L',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"FEVRIER",1,0,'L',0,0);  $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"MARS",1,0,'L',0,0);     $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"AVRIL",1,0,'L',0,0);    $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"MAI",1,0,'L',0,0);      $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"JUIN",1,0,'L',0,0);     $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"JUILLET",1,0,'L',0,0);  $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"AOUT",1,0,'L',0,0);     $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"SEPTEMBRE",1,0,'L',0,0);$pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"OCTOBRE",1,0,'L',0,0);  $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"NOVEMBRE",1,0,'L',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"DECEMBRE",1,0,'L',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(100,240);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(100,250);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);
}

if ($mdo==16) 
{
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('p','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(05,5); $pdf->cell(200,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",1,0,'C',0,0);
$pdf->SetXY(05,10);$pdf->cell(200,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
$pdf->SetXY(05,15);$pdf->cell(200,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
$pdf->SetXY(05,20);$pdf->cell(100,5,$EPH,0,0,'L',0,0);$pdf->cell(145,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
$pdf->SetXY(05,25);$pdf->cell(100,5,"N               / ".date ('Y'),0,0,'L',0,0);
$pdf->SetXY(05,25); $pdf->cell(200,5,html_entity_decode(utf8_decode('Evaluation des cas  : '.ucwords(strtolower ($pdf->nbrtostring('mdo','id',$mdo,'mdo'))))),0,0,'C',0,0);
// $pdf->SetXY(05,35); $pdf->cell(200,5,html_entity_decode(utf8_decode('RELEVE DES MALADIES A DECLARATION OBLIGATOIRE')),0,0,'C',0,0);
$pdf->SetXY(05,29); $pdf->cell(200,5,'Du  '.$pdf->dateUS2FR($datejour1).'  Au  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);
// $pdf->SetXY(5,$pdf->GetY()+10);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(200,5,"Nombre De Cas de leishmaniose viscerale",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Cas Residant Dans La Wilaya",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Cas Residant Hors Wilaya",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Total",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(200,5,"Repartition par sexe",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Cas De Sexe Masculin",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Cas De Sexe Feminin",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(200,5,"Repartition par Age",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Repartition De Cas Chez Les Enfants Ages De Moins De 05 Ans  ",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Repartition De Cas Chez Les Enfants Ages Entre 05-14 Ans",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Repartition De Cas Chez Les Enfants Ages De Plus De 14 Ans",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(200,5,"Diagnostic",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Cas diagnostiques par examen directe ponction de moelle osseuse  ",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Cas diagnostiques par un test serologique",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(200,5,"Traitement",1,0,'L',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Personnes Traitees Par Voie Locale  ",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5); $pdf->cell(160,5,"Nombre De Personnes Traitees Par Voie Generale",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(160,5,"Nombre De Rechutes",1,0,'L',0,0);$pdf->cell(40,5,"***",1,0,'C',0,0);
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('p','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(05,5); $pdf->cell(200,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",1,0,'C',0,0);
$pdf->SetXY(05,10);$pdf->cell(200,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
$pdf->SetXY(05,15);$pdf->cell(200,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
$pdf->SetXY(05,20);$pdf->cell(100,5,$EPH,0,0,'L',0,0);$pdf->cell(145,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
$pdf->SetXY(05,25);$pdf->cell(100,5,"N               / ".date ('Y'),0,0,'L',0,0);
$pdf->SetXY(05,25); $pdf->cell(200,5,html_entity_decode(utf8_decode('Repartition Mensuel Et Par Wilaya Des Cas De  : '.ucwords(strtolower ($pdf->nbrtostring('mdo','id',$mdo,'mdo'))))),0,0,'C',0,0);
// $pdf->SetXY(05,35); $pdf->cell(200,5,html_entity_decode(utf8_decode('RELEVE DES MALADIES A DECLARATION OBLIGATOIRE')),0,0,'C',0,0);
$pdf->SetXY(05,29); $pdf->cell(200,5,'Du  '.$pdf->dateUS2FR($datejour1).'  Au  '.$pdf->dateUS2FR($datejour2),0,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"Mois",1,0,'L',0,0);     $pdf->cell(40,10,"Nombre De Cas",1,0,'C',0,0); $pdf->cell(40,10,"Sujets Inf A 05 Ans",1,0,'C',0,0); $pdf->cell(40,10,"Sujets Entre 05-14 Ans",1,0,'C',0,0); $pdf->cell(40,10,"Sujets Sup A 14 Ans",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"JANIVIER",1,0,'L',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"FEVRIER",1,0,'L',0,0);  $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"MARS",1,0,'L',0,0);     $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"AVRIL",1,0,'L',0,0);    $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"MAI",1,0,'L',0,0);      $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"JUIN",1,0,'L',0,0);     $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"JUILLET",1,0,'L',0,0);  $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"AOUT",1,0,'L',0,0);     $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"SEPTEMBRE",1,0,'L',0,0);$pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"OCTOBRE",1,0,'L',0,0);  $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"NOVEMBRE",1,0,'L',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(40,10,"DECEMBRE",1,0,'L',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0); $pdf->cell(40,10,"",1,0,'C',0,0);
$pdf->SetXY(100,240);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(100,250);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);
}






$pdf->Output();
}



?>