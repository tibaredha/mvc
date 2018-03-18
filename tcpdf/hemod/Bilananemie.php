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
header('location: ../../hemod/Bilananemie');
}
require_once('hemo.php');
require_once('NBRTOSTRING.php');
$pdf = new hemo('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetFillColor(240);       //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,200);   //text noire
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 13);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->AddPage();
$pdf->Rect(5, 5, 285, 20 ,'D');
$pdf->SetXY(5,10);$pdf->Cell(285,5,utf8_decode("CLINIQUE D HEMODIALYSE NEPHRODIALE"),0,1,'C');
$pdf->SetXY(5,15);$pdf->Cell(285,5,utf8_decode("DR M.DAOUD NEPHROLOGUE"),0,1,'C');
$pdf->SetXY(230,26);$pdf->Cell(60,5,utf8_decode("Alger : ".date("j-m-Y")),1,1,'C');
$pdf->SetFont('aefurat','B', 13);
$pdf->SetXY(5,33);$pdf->Cell(285,5,"BILAN DE L ANEMIE :  ".$pdf->dateUS2FR($datejour1)."  AU  ".$pdf->dateUS2FR($datejour2),1,1,'C');
$pdf->SetTextColor(0,0,0);    
$pdf-> mysqlconnect();
$pdf->SetFont('aefurat', 'B', 10);
$pdf->SetXY(5,45);
$pdf->cell(10,05,"N°",1,0,'C',1,0);
$pdf->cell(43,05,"Nom et Prenom du Malade",1,0,'C',1,0);
$pdf->cell(43,05,"Beneficiaire",1,0,'C',1,0);
$pdf->cell(30,05,"Situation du Malade",1,0,'C',1,0);
$pdf->cell(30,05,"N°Securite Sociale",1,0,'C',1,0);
$pdf->cell(15,05,"taux HB",1,0,'C',1,0);
$pdf->cell(18,05,"Fer Serique",1,0,'C',1,0);
$pdf->cell(18,05,"Féritinemie",1,0,'C',1,0);
$pdf->cell(16,05,"Dose EPO",1,0,'C',1,0);
$pdf->cell(21,05,"Quantite EPO",1,0,'C',1,0);
$pdf->cell(20,05,"Quantite Fer",1,0,'C',1,0);
$pdf->cell(21,05,"Observation",1,0,'C',1,0);

$pdf->SetXY(5,45+5);
$query_liste = "SELECT * FROM hemo where SORTI = '' order by NOM,PRENOM ";
$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$totalmbr1=mysql_num_rows($requete);
while($row=mysql_fetch_object($requete))
{
   $pdf->SetFont('aefurat', 'B', 9);
	$pdf->cell(10,07,$row->id,1,0,'C',0);
	$pdf->cell(43,07,$row->NOM."_".ucwords(strtolower($row->PRENOM)),1,0,'L',0);
	$pdf->cell(43,07,$row->NOM."_".ucwords(strtolower($row->PRENOM)),1,0,'L',0);
	$pdf->cell(30,07,$row->QUALITE,1,0,'C',0);
	$pdf->cell(30,07,$row->NSS,1,0,'C',0);
	$pdf->cell(15,07,$pdf->valhbfer($row->id,$datejour1,$datejour2,'HB'),1,0,'C',0);
	$pdf->cell(18,07,$pdf->valhbfer($row->id,$datejour1,$datejour2,'FERS'),1,0,'C',0);
	$pdf->cell(18,07,$pdf->valhbfer($row->id,$datejour1,$datejour2,'FERE'),1,0,'C',0);
	$pdf->cell(16,07,'***',1,0,'C',0);
	$pdf->cell(21,07,$pdf->nbrepo($row->id,$datejour1,$datejour2),1,0,'C',0);
	$pdf->cell(20,07,$pdf->nbrfer($row->id,$datejour1,$datejour2),1,0,'C',0);
	$pdf->cell(21,07,'***',1,0,'C',0);
	$pdf->SetXY(5,$pdf->GetY()+7);
$pdf->SetFont('aefurat', 'B', 10);	
}

$pdf->SetXY(5,$pdf->GetY()); 	
$pdf->cell(189+34,05,"Total : ".$totalmbr1." Malades",1,0,'L',1,0);
$pdf->cell(21,05,$pdf->nbrepot($datejour1,$datejour2),1,0,'C',1,0);
$pdf->cell(20,05,$pdf->nbrfert($datejour1,$datejour2),1,0,'C',1,0);
$pdf->cell(21,05,"*** ",1,0,'C',1,0);


$prix=$pdf->nbrepot($datejour1,$datejour2);
$pdf->SetXY(5,$pdf->GetY()+7);$pdf->cell(200,05,"Le nombre De flacon EPO  : ".$prix." flaconss ",0,0,'L',1,0);      
$obj = new nuts($prix, "EUR");
$text = $obj->convert("fr-FR");
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(200,05,"[ ".ucwords($text)." ] flacons",0,0,'L',1,0);     

$prix1=$pdf->nbrfert($datejour1,$datejour2);
$pdf->SetXY(5,$pdf->GetY()+7);$pdf->cell(200,05,"Le nombre d ampoule fer inj  : ".$prix1." amps ",0,0,'L',1,0); $pdf->Text(240,$pdf->GetY(),"Alger le :".date("d-m-Y"));     
$obj = new nuts($prix1, "EUR");
$text = $obj->convert("fr-FR");
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(200,05,"[ ".ucwords($text)." ] amps",0,0,'L',1,0);$pdf->Text(245,$pdf->GetY(),"DR M. DAOUD");      
$pdf->Output();
?>
