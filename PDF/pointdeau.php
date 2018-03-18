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
header("Location: ../pointdeau/Evaluation/") ;
}
if ($_POST['EPSP']=='1') {$EPSP='EPSP_DJALFA';$epsp1="='1'";}
if ($_POST['EPSP']=='2') {$EPSP='EPSP_MESSAAD';$epsp1="='2'";}
if ($_POST['EPSP']=='3') {$EPSP='EPSP_GUETTARA';$epsp1="='3'";}
if ($_POST['EPSP']=='4') {$EPSP='EPSP_HASSI_BAHBAH';$epsp1="='4'";}
if ($_POST['EPSP']=='5') {$EPSP='EPSP_AIN_OUSSERA';$epsp1="='5'";}
if ($_POST['EPSP']=='0') {$EPSP='WILAYA_DJELFA';$epsp1="IS NOT NULL";}
//*****************************************************************************************************************//
if ($_POST['AEP']=='1') //1ere partie
{
require('OAEP.php');
$pdf = new OAEP( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
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
$pdf->Text(60,35,"Canevas d'eau potable ");
$pdf->Text(60,40,"Du  ".$pdf->dateUS2FR($datejour1)."  Au  ".$pdf->dateUS2FR($datejour2));
$pdf->Text(60,45,"Ref :  ");
$h=50;
$pdf->SetFillColor(200 );
$pdf->SetXY(05,$h);$pdf->cell(40,5,"Type d'ouvrage",1,0,1,'C',0);$pdf->cell(40,5,"Nombre",1,0,1,'C',0);$pdf->cell(35,5,"Chlorateur automatique",1,0,1,'C',0);$pdf->cell(35,5,"Chlorateur de fortune",1,0,1,'C',0);$pdf->cell(30,5,"desinfectes",1,0,1,'C',0);$pdf->cell(20,5,"desinfectes",1,0,1,'C',0);$pdf->cell(26,5,"desinfectes",1,0,1,'C',0);$pdf->cell(30,5,"Chlore libre",1,0,1,'C',0);$pdf->cell(33,5,"Colimetrie",1,0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()+5);$pdf->cell(40,5,"AEP",1,0,1,'C',0);$pdf->cell(20,5,"Recenses",1,0,1,'C',0);$pdf->cell(20,5,"Nettoyes",1,0,1,'C',0);$pdf->cell(10,5,"Total",1,0,1,'C',0);$pdf->cell(25,5,"Operationnel",1,0,1,'C',0);$pdf->cell(10,5,"Total",1,0,1,'C',0);$pdf->cell(25,5,"Operationnel",1,0,1,'C',0);$pdf->cell(30,5,"Briques poreuse",1,0,1,'C',0);$pdf->cell(20,5,"Les galets",1,0,1,'C',0);$pdf->cell(26,5,"Manuellement",1,0,1,'C',0);$pdf->cell(15,5,"dosage",1,0,1,'C',0);$pdf->cell(15,5,"positifs",1,0,1,'C',0);$pdf->cell(18,5,"analyses",1,0,1,'C',0);$pdf->cell(15,5,"positifs",1,0,1,'C',0);
$pdf->ligneoaep("Puits collectifs",'=1',$datejour1,$datejour2,$epsp1) ;
$pdf->ligneoaep("Puits individuels",'=2',$datejour1,$datejour2,$epsp1) ;
$pdf->ligneoaep("Puits agricoles",'=3',$datejour1,$datejour2,$epsp1) ;
$pdf->ligneoaep("Source captee",'=4',$datejour1,$datejour2,$epsp1) ;
$pdf->ligneoaep("Source non captee",'=5',$datejour1,$datejour2,$epsp1) ;
$pdf->ligneoaep("Reservoirs",'=6',$datejour1,$datejour2,$epsp1) ;
$pdf->ligneoaep("Chateaux eaux",'=7',$datejour1,$datejour2,$epsp1) ;
$pdf->ligneoaep("Fontaine publique",'=8',$datejour1,$datejour2,$epsp1) ;
$pdf->ligneoaep("Robinets individuels",'=9',$datejour1,$datejour2,$epsp1) ;
$pdf->ligneoaep("Station de traitement",'=10',$datejour1,$datejour2,$epsp1) ;
$pdf->ligneoaep("Station de pompage",'=11',$datejour1,$datejour2,$epsp1) ;
$pdf->ligneoaep("Eau de stockage",'=12',$datejour1,$datejour2,$epsp1) ;
$pdf->ligneoaep("Oued",'=13',$datejour1,$datejour2,$epsp1) ;
$pdf->ligneoaep("Canal",'=14',$datejour1,$datejour2,$epsp1) ;
$pdf->ligneoaep("Forage",'=15',$datejour1,$datejour2,$epsp1) ;
$pdf->ligneoaep("Total",'IS NOT NULL',$datejour1,$datejour2,$epsp1) ;
$pdf->SetXY(190,$pdf->GetY()+10); $pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
}


?>