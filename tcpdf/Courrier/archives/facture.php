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
header('location: ../../hemod/Facture/16');
}



$id=$_GET["id"];
require_once('hemo.php');
require_once('NBRTOSTRING.php');
$pdf = new hemo('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetFillColor(240);       //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,200);   //text noire
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 13);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->AddPage();
// $pdf->SetLineWidth(0.4);
$pdf->Rect(5, 5, 200, 20 ,'D');
$pdf->SetXY(5,10);$pdf->Cell(200,5,utf8_decode("CLINIQUE D HEMODIALYSE NEPHRODIALE"),0,1,'C');
$pdf->SetXY(5,15);$pdf->Cell(200,5,utf8_decode("DR M.DAOUD NEPHROLOGUE"),0,1,'C');
$pdf->SetXY(145,26);$pdf->Cell(60,5,utf8_decode("Alger : ".date("j-m-Y")),1,1,'C');
$pdf->SetFont('aefurat','B', 13);
$pdf->SetXY(5,33);$pdf->Cell(200,5,"FACTURE N ° : ".$_POST['num']."/".date("Y"),1,1,'C');
$pdf->SetFont('aefurat','B', 11);
//$pdf->Rect(5, 5, 200, 285 ,'D');
// $pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->Rect(5, 40, 200, 58 ,'D');
$x=5;$y=41;
$pdf->SetXY($x,$y);$pdf->Cell(70,5,utf8_decode("Nom et Prenom de l Assure : "),0,1,'L');       
$pdf->SetXY($x,$y+5);$pdf->Cell(70,5,utf8_decode("Date de Naissance : "),0,1,'L');       
$pdf->SetXY($x,$y+10);$pdf->Cell(70,5,utf8_decode("N de SS : "),0,1,'L');       
$pdf->SetXY($x,$y+15);$pdf->Cell(70,5,utf8_decode("Nom et Prenom du Malade : "),0,1,'L');       
$pdf->SetXY($x,$y+20);$pdf->Cell(70,5,utf8_decode("Date de Naissance : "),0,1,'L');        
$pdf->SetXY($x,$y+25);$pdf->Cell(70,5,utf8_decode("Situation du Malade :"),0,1,'L');        
$pdf->SetXY($x,$y+30);$pdf->Cell(70,5,utf8_decode("Adresse :"),0,1,'L');        
$pdf->SetXY($x,$y+35);$pdf->Cell(70,5,utf8_decode("Date d Admission : "),0,1,'L');        
$pdf->SetXY($x,$y+40);$pdf->Cell(70,5,utf8_decode("Agence : "),0,1,'L');        
$pdf->SetXY($x,$y+45);$pdf->Cell(70,5,utf8_decode("Centre Payeur : "),0,1,'L');        
$pdf->SetXY($x,$y+50);$pdf->Cell(70,5,utf8_decode("Forfait : "),0,1,'L'); 
$pdf->SetTextColor(0,0,0);    
$pdf-> mysqlconnect();
$sql = "SELECT * FROM hemo WHERE id = '".$id."'  "; 
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
if( $result = mysql_fetch_object( $requete ) )
{
$pdf->SetXY($x+90,$y);$pdf->Cell(108,5,$result->ASSURE,0,1,'L',0,0);       
$pdf->SetXY($x+90,$y+5);$pdf->Cell(108,5,$pdf->dateUS2FR($result->DNASSURE),0,1,'L',0,0);       
$pdf->SetXY($x+90,$y+10);$pdf->Cell(108,5,$result->NSS,0,1,'L',0,0);       
$pdf->SetXY($x+90,$y+15);$pdf->Cell(108,5,$result->NOM."_".$result->PRENOM,0,1,'L',0,0);       
$pdf->SetXY($x+90,$y+20);$pdf->Cell(108,5,$pdf->dateUS2FR($result->DATENAISSA),0,0,'L',0,0);        
$pdf->SetXY($x+90,$y+25);$pdf->Cell(108,5,$result->QUALITE,0,1,'L',0,0);        
$pdf->SetXY($x+90,$y+30);$pdf->Cell(108,5,$result->ADRESSE,0,1,'L',0,0);        
$pdf->SetXY($x+90,$y+35);$pdf->Cell(108,5,$pdf->dateUS2FR($result->DINS),0,1,'L',0,0);        
$pdf->SetXY($x+90,$y+40);$pdf->Cell(108,5,$result->CAISSE." : ".$result->ADRESSENSS,0,1,'L',0,0);        
$pdf->SetXY($x+90,$y+45);$pdf->Cell(108,5,$result->NCP,0,1,'L',0,0);        
$pdf->SetXY($x+90,$y+50);
// $pdf->Cell(108,5,$result->FORFAIT,0,1,'L',0,0); 
$pdf->Cell(108,5,$pdf->nbrtostring('mvc','forfait','Forfaitm',$result->FORFAIT,'Forfaitl')."(".$result->FORFAIT.")" ,0,1,'L',0,0);		
// $db_name,$tb_name,$colonename,$colonevalue,$resultatstring

}
//**********************************************************************************************************// 
// f1	5600	366,36	5233,64
// f2	6100	399,07	5700,93
// f3	5900	385,98	5514,02
// f4	6415	419,67	5995,33
// f5	6115	400,05	5714,95
// round(,2)
// $pdf->SetFont('aefurat', 'B', 10);
// $pdf->SetFont('helveticaB', 'B', 11);
$pdf->SetXY(5,99);
$pdf->cell(50,05,"Date des Séance",1,0,'C',1,0);
$pdf->cell(50,05,"Prix unitaire de la séance HT",1,0,'C',1,0);
$pdf->cell(50,05,"Montant TVA 7%",1,0,'C',1,0);
$pdf->cell(50,05,"Montant de la séance TTC",1,0,'C',1,0);
$pdf->SetXY(5,99+5);
$query_liste = "SELECT * FROM HEMOSEANCE WHERE  dateseance BETWEEN '$datejour1' AND '$datejour2'  and  id  ='$id' ";
$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$totalmbr1=mysql_num_rows($requete);
while($row=mysql_fetch_object($requete))
{
    $prixseance=$row->FORFAIT;$x=1.0701318555322;
	$pdf->cell(50,07,$pdf->dateUS2FR($row->dateseance),1,0,'C',0);
	
	
	$pdf->cell(50,07,$prixseance/$x,1,0,'C',0);
	$pdf->cell(50,07,$prixseance-($prixseance/$x),1,0,'C',0);
	$pdf->cell(50,07,$prixseance,1,0,'C',0);
	 
	
	
	
	// $pdf->cell(50,07,round($prixseance,2),1,0,'C',0);
	// $pdf->cell(50,07,round(($prixseance*7) /100,2),1,0,'C',0);
	// $pdf->cell(50,07,round($prixseance+(($prixseance*7)/100),2),1,0,'C',0);
	$pdf->SetXY(5,$pdf->GetY()+7); 
}

$req="SELECT SUM(FORFAIT) AS total FROM HEMOSEANCE WHERE  dateseance BETWEEN '$datejour1' AND '$datejour2'  and  id  ='$id' ";
$query1 = mysql_query($req);   
$rs = mysql_fetch_assoc($query1);
$prixseance1=$rs['total'];$x=1.0701318555322;

$pdf->SetXY(5,$pdf->GetY()); 	
$pdf->cell(50,05,"Total Séances  ".$totalmbr1,1,0,'C',1,0);	   	  
$pdf->cell(50,05,$prixseance1/$x,1,0,'C',1,0);	   	  
$pdf->cell(50,05,$prixseance1-($prixseance1/$x),1,0,'C',1,0);	   	  
$pdf->cell(50,05,$prixseance1,1,0,'C',1,0);	   	  
$prix=$prixseance1;

// $pdf->cell(50,05,$prixseance1,1,0,'C',1,0);	   	  
// $pdf->cell(50,05,round(($prixseance1*7) /100,2),1,0,'C',1,0);	   	  
// $pdf->cell(50,05,round($prixseance1+(($prixseance1*7)/100),2),1,0,'C',1,0);	   	  
// $prix=round($prixseance1+(($prixseance1*7)/100),2);




$pdf->SetXY(5,$pdf->GetY()+7);$pdf->cell(200,05,"La Presente Facture Est Arretée A La Somme De : ".$prix." Dinars en TTC ",0,0,'L',1,0);      
$obj = new nuts($prix, "EUR");
$text = $obj->convert("fr-FR");
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(200,05,"[ ".ucwords($text)." ] Dinars en TTC",0,0,'L',1,0);      


$pdf->Text(140,$pdf->GetY()+15,"Alger le :".date("d-m-Y"));
$pdf->Text(145,$pdf->GetY()+5,"DR M. DAOUD");

$pdf->Output();
?>
