<?php
if (!ISSET($_POST['annee'])||!ISSET($_POST['mois'])||!ISSET($_POST['jour'])||!ISSET($_POST['annee1'])||!ISSET($_POST['mois1'])||!ISSET($_POST['jour1'])){$datejour1 =date("Y-m-d");$datejour2 =date("Y-m-d");}
else{if(empty($_POST['annee'])||empty($_POST['mois'])||empty($_POST['jour'])||empty($_POST['annee1'])||empty($_POST['mois1'])||empty($_POST['jour1'])){$datejour1 =date("Y-m-d");$datejour2 =date("Y-m-d");}else{$datejour1 = $_POST['annee'] .'-'.$_POST['mois'] .'-'.$_POST['jour'];$datejour2 = $_POST['annee1'].'-'.$_POST['mois1'].'-'.$_POST['jour1'];}}
$datejour11 = $_POST['jour'].'-'.$_POST['mois'] .'-'.$_POST['annee'];$datejour22 = $_POST['jour1'].'-'.$_POST['mois1'].'-'.$_POST['annee1'];

if ($datejour1>$datejour2 or  $datejour1==$datejour2 ){header("Location: ../../rds/evaluation") ;}
                       
if ($_POST['EPH']=='0')  {$EPH1='DJELFA';$EPH="IS NOT NULL";}
if ($_POST['EPH']=='1')  {$EPH1='EPH AO';$EPH="='1'";}
if ($_POST['EPH']=='2')  {$EPH1='EPH HBB';$EPH="='2'";}
if ($_POST['EPH']=='3')  {$EPH1='EPH DJELFA';$EPH="='3'";}
if ($_POST['EPH']=='4')  {$EPH1='EPH MESSAAD';$EPH="='4'";}
if ($_POST['EPH']=='5')  {$EPH1='EPH IDRISSIA';$EPH="='5'";}
if ($_POST['EPH']=='6')  {$EPH1='EPH CHAOUA';$EPH="='6'";}
if ($_POST['EPH']=='7')  {$EPH1='EHS DJELFA';$EPH="=7";}
if ($_POST['EPH']=='8')  {$EPH1='EPSP AO';$EPH="=8";}
if ($_POST['EPH']=='9')  {$EPH1='EPSP HBB';$EPH="=9";}
if ($_POST['EPH']=='10') {$EPH1='EPSP DJELFA';$EPH="=10";}
if ($_POST['EPH']=='11') {$EPH1='EPSP MESSAAD';$EPH="=11";}
if ($_POST['EPH']=='12') {$EPH1='EPSP GUETARA';$EPH="=12";}
if ($_POST['EPH']=='13') {$EPH1='EHP  OPHTALMO';$EPH="=13";}


require('INSPECTION1.php');
$pdf = new INSPECTION1 ( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(250);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
if ($_POST['type']=='1')
{
$pdf->AddPage('p','A4');
$pdf->entete1($datejour1,$datejour2,'Objet : A/S Etat Mensuel Des Ruptures Des Produits Pharmaceutiques',$EPH1);
$pdf->pied();

$pdf->AddPage('p','A4');
$pdf->entete($datejour1,$datejour2,'Etat De Rupture Mensuel ',$EPH1);
$pdf->produit(1,"Medicaments",$datejour1,$datejour2,$EPH);

$pdf->AddPage('p','A4');
$pdf->entete($datejour1,$datejour2,'Etat De Rupture Mensuel ',$EPH1);
$pdf->produit(2,"Reactifs",$datejour1,$datejour2,$EPH);


$pdf->AddPage('p','A4');
$pdf->entete($datejour1,$datejour2,'Etat De Rupture Mensuel ',$EPH1);
$pdf->produit(3,"Vaccins",$datejour1,$datejour2,$EPH);

$pdf->AddPage('p','A4');
$pdf->entete($datejour1,$datejour2,'Etat De Rupture Mensuel ',$EPH1);
$pdf->produit(4,"Produits Dentaires",$datejour1,$datejour2,$EPH);

$pdf->AddPage('p','A4');
$pdf->entete($datejour1,$datejour2,'Etat De Rupture Mensuel ',$EPH1);
$pdf->produit(5,"Consomables",$datejour1,$datejour2,$EPH);
}
if ($_POST['type']=='2')
{
$pdf->AddPage('L','A4');
$pdf->entete2($datejour1,$datejour2,'Etat De Rupture Mensuel ',$EPH1);
$pdf->produit2(1,"Medicaments",$datejour1,$datejour2);


$pdf->AddPage('L','A4');
$pdf->entete2($datejour1,$datejour2,'Etat De Rupture Mensuel ',$EPH1);
$pdf->produit2(2,"Reactifs",$datejour1,$datejour2);


$pdf->AddPage('L','A4');
$pdf->entete2($datejour1,$datejour2,'Etat De Rupture Mensuel ',$EPH1);
$pdf->produit2(3,"Vaccins",$datejour1,$datejour2);

$pdf->AddPage('L','A4');
$pdf->entete2($datejour1,$datejour2,'Etat De Rupture Mensuel ',$EPH1);
$pdf->produit2(4,"Produits Dentaires",$datejour1,$datejour2);


$pdf->AddPage('L','A4');
$pdf->entete2($datejour1,$datejour2,'Etat De Rupture Mensuel ',$EPH1);
$pdf->produit2(5,"Consomables",$datejour1,$datejour2);
}
if ($_POST['type']=='3')
{
$pdf->AddPage('L','A4');
$pdf->entete2($datejour1,$datejour2,'Etat De Rupture 12 Derniers Mois',$EPH1);
$pdf->produit3(1,"Medicaments",$EPH);


$pdf->AddPage('L','A4');
$pdf->entete2($datejour1,$datejour2,'Etat De Rupture 12 Derniers Mois ',$EPH1);
$pdf->produit3(2,"Reactifs",$EPH);


$pdf->AddPage('L','A4');
$pdf->entete2($datejour1,$datejour2,'Etat De Rupture 12 Derniers Mois ',$EPH1);
$pdf->produit3(3,"Vaccins",$EPH);

$pdf->AddPage('L','A4');
$pdf->entete2($datejour1,$datejour2,'Etat De Rupture 12 Derniers Mois ',$EPH1);
$pdf->produit3(4,"Produits Dentaires",$EPH);


$pdf->AddPage('L','A4');
$pdf->entete2($datejour1,$datejour2,'Etat De Rupture 12 Derniers Mois ',$EPH1);
$pdf->produit3(5,"Consomables",$EPH);
}
// $path = "../../../../uploads/AAA.pdf";
// $pdf->Output($path,'F');

$pdf->Output($_POST['mois1'].'_'.'Etat De Rupture Mensuel.pdf','I');
?>