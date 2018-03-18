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
header('location: ../../hemod/Bordereau');
}



// $id=$_GET["id"];
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
// $pdf->SetLineWidth(0.4);
$pdf->Rect(5, 5, 285, 20 ,'D');
$pdf->SetXY(5,10);$pdf->Cell(285,5,utf8_decode("CLINIQUE D HEMODIALYSE NEPHRODIALE"),0,1,'C');
$pdf->SetXY(5,15);$pdf->Cell(285,5,utf8_decode("DR M.DAOUD NEPHROLOGUE"),0,1,'C');
$pdf->SetXY(230,26);$pdf->Cell(60,5,utf8_decode("Alger : ".date("j-m-Y")),1,1,'C');
$pdf->SetFont('aefurat','B', 13);
$pdf->SetXY(5,33);$pdf->Cell(285,5,"BORDEREAU D ENVOI DU :  ".$pdf->dateUS2FR($datejour1)."  AU  ".$pdf->dateUS2FR($datejour2),1,1,'C');

//$pdf->Rect(5, 5, 200, 285 ,'D');
// $pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');

$pdf->SetTextColor(0,0,0);    
$pdf-> mysqlconnect();
// $sql = "SELECT * FROM hemo WHERE id = '".$id."'  "; 
// $requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
// if( $result = mysql_fetch_object( $requete ) )
// {
// $pdf->SetXY($x+90,$y);$pdf->Cell(108,5,$result->NOM." ".$result->PRENOM,0,1,'L',0,0);       
// $pdf->SetXY($x+90,$y+5);$pdf->Cell(108,5,$pdf->dateUS2FR($result->DATENAISSA),0,1,'L',0,0);       
// $pdf->SetXY($x+90,$y+10);$pdf->Cell(108,5,$result->NSS,0,1,'L',0,0);       
// $pdf->SetXY($x+90,$y+15);$pdf->Cell(108,5,$result->NOM." ".$result->PRENOM,0,1,'L',0,0);       
// $pdf->SetXY($x+90,$y+20);$pdf->Cell(108,5,$pdf->dateUS2FR($result->DATENAISSA),0,0,'L',0,0);        
// $pdf->SetXY($x+90,$y+25);$pdf->Cell(108,5,$result->NSS,0,1,'L',0,0);        
// $pdf->SetXY($x+90,$y+30);$pdf->Cell(108,5,$result->ADRESSE,0,1,'L',0,0);        
// $pdf->SetXY($x+90,$y+35);$pdf->Cell(108,5,$result->NSS,0,1,'L',0,0);        
// $pdf->SetXY($x+90,$y+40);$pdf->Cell(108,5,$result->NSS,0,1,'L',0,0);        
// $pdf->SetXY($x+90,$y+45);$pdf->Cell(108,5,$result->NSS,0,1,'L',0,0);        
// $pdf->SetXY($x+90,$y+50);$pdf->Cell(108,5,$result->NSS,0,1,'L',0,0); 		
// }
//**********************************************************************************************************// 
// f1	5600	366,36	5233,64
// f2	6100	399,07	5700,93
// f3	5900	385,98	5514,02
// f4	6415	419,67	5995,33
// f5	6115	400,05	5714,95
// round(,2)
$pdf->SetFont('aefurat', 'B', 10);
$pdf->SetXY(5,45);
$pdf->cell(10,05,"N°",1,0,'C',1,0);
$pdf->cell(45,05,"Nom et Prenom du Malade",1,0,'C',1,0);
$pdf->cell(45,05,"Beneficiaire",1,0,'C',1,0);
$pdf->cell(30,05,"Situation du Malade",1,0,'C',1,0);
$pdf->cell(30,05,"N°Securite Sociale",1,0,'C',1,0);
$pdf->cell(20,05,"Mois",1,0,'C',1,0);
$pdf->cell(30,05,"Nbr De Seance",1,0,'C',1,0);
$pdf->cell(30,05,"Depense en DA",1,0,'C',1,0);
$pdf->cell(20,05,"Forfait",1,0,'C',1,0);
$pdf->cell(25,05,"Montant TTC",1,0,'C',1,0);
//nbre de seance par malade
// function nbrseance($id)
// {
// $pdf-> mysqlconnect();
// $query_liste = "SELECT * FROM HEMOSEANCE WHERE  dateseance BETWEEN '$datejour1' AND '$datejour2'  and  id  ='$id' ";
// $requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
// $totalmbr1=mysql_num_rows($requete);
// return $totalmbr1;
// }

$pdf->SetXY(5,45+5);
$query_liste = "SELECT * FROM hemo where SORTI = '' order by NOM,PRENOM ";
$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$totalmbr1=mysql_num_rows($requete);
while($row=mysql_fetch_object($requete))
{
$pdf->SetFont('aefurat', 'B', 9);
    // $prixseance=$row->FORFAIT;
	$pdf->cell(10,07,$row->id,1,0,'C',0);
	$pdf->cell(45,07,$row->NOM."_".ucwords(strtolower($row->PRENOM)),1,0,'L',0);
	$pdf->cell(45,07,$row->NOM."_".ucwords(strtolower($row->PRENOM)),1,0,'L',0);
	$pdf->cell(30,07,$row->id,1,0,'C',0);
	$pdf->cell(30,07,$row->NSS,1,0,'C',0);
	$pdf->cell(20,07,'***',1,0,'C',0);
	$pdf->cell(30,07,$pdf->nbrseance($row->id,$datejour1,$datejour2),1,0,'C',0);
	$pdf->cell(30,07,$pdf->depense($row->id,$datejour1,$datejour2),1,0,'C',0);
	$pdf->cell(20,07,'***',1,0,'C',0);
	$pdf->cell(25,07,'***',1,0,'C',0);
	
	// $pdf->cell(50,07,round($prixseance,2),1,0,'C',0);
	// $pdf->cell(50,07,round(($prixseance*7) /100,2),1,0,'C',0);
	// $pdf->cell(50,07,round($prixseance+(($prixseance*7)/100),2),1,0,'C',0);
	$pdf->SetXY(5,$pdf->GetY()+7);
$pdf->SetFont('aefurat', 'B', 10);	
}
//depense totale seance





$pdf->SetXY(5,$pdf->GetY()); 	
$pdf->cell(180,05,"Total : ".$totalmbr1." Malades",1,0,'L',1,0);
$pdf->cell(30,05,$pdf->nbrseancet($datejour1,$datejour2)." Seances",1,0,'C',1,0);
$pdf->cell(75,05,"Depense totale : ".$pdf->depenset($datejour1,$datejour2),1,0,'L',1,0);



// $pdf->cell(50,05,"Total Séances  ".$totalmbr1,1,0,'C',1,0);	   	  
// $pdf->cell(50,05,$prixseance1,1,0,'C',1,0);	   	  
// $pdf->cell(50,05,round(($prixseance1*7) /100,2),1,0,'C',1,0);	   	  
// $pdf->cell(50,05,round($prixseance1+(($prixseance1*7)/100),2),1,0,'C',1,0);	   	  
// $prix=round($prixseance1+(($prixseance1*7)/100),2);

$prix=$pdf->depenset($datejour1,$datejour2);
$pdf->SetXY(5,$pdf->GetY()+7);$pdf->cell(200,05,"La Presente Facture Est Arretée A La Somme De : ".$prix." Dinars en TTC ",0,0,'L',1,0); $pdf->Text(240,$pdf->GetY(),"Alger le :".date("d-m-Y"));     
$obj = new nuts($prix, "EUR");
$text = $obj->convert("fr-FR");
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(200,05,"[ ".ucwords($text)." ] Dinars en TTC",0,0,'L',1,0);$pdf->Text(245,$pdf->GetY(),"DR M. DAOUD");      
$pdf->Output();
?>
