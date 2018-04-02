<?php
$ids=$_GET["ids"];
$idm=$_GET["idm"];
require_once('hemo.php');
$pdf = new hemo('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetFillColor(240);       //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,200);   //text noire
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 13);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->AddPage();
$pdf->SetLineWidth(0.4);
$pdf->SetFont('aefurat','B', 11);


$pdf-> mysqlconnect();
$sql = "SELECT * FROM hemo WHERE id = '".$idm."'  "; 
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
if( $result = mysql_fetch_object( $requete ) )
{
// $pdf->SetXY($x+90,$y);$pdf->Cell(108,5,$result->ASSURE,0,1,'L',0,0);       
// $pdf->SetXY($x+90,$y+5);$pdf->Cell(108,5,$pdf->dateUS2FR($result->DNASSURE),0,1,'L',0,0);       
// $pdf->SetXY($x+90,$y+10);$pdf->Cell(108,5,$result->NSS,0,1,'L',0,0);       
$pdf->SetXY(32,5);$pdf->Cell(108,5,$result->NOM."_".$result->PRENOM,0,1,'L',0,0);       
// $pdf->SetXY($x+90,$y+20);$pdf->Cell(108,5,$pdf->dateUS2FR($result->DATENAISSA),0,0,'L',0,0);        
// $pdf->SetXY($x+90,$y+25);$pdf->Cell(108,5,$result->QUALITE,0,1,'L',0,0);        
// $pdf->SetXY($x+90,$y+30);$pdf->Cell(108,5,$result->ADRESSE,0,1,'L',0,0);        
// $pdf->SetXY($x+90,$y+35);$pdf->Cell(108,5,$pdf->dateUS2FR($result->DINS),0,1,'L',0,0);        
// $pdf->SetXY($x+90,$y+40);$pdf->Cell(108,5,$result->CAISSE." : ".$result->ADRESSENSS,0,1,'L',0,0);        
// $pdf->SetXY($x+90,$y+45);$pdf->Cell(108,5,$result->NCP,0,1,'L',0,0);  
}

$pdf->Rect(5, 5, 200, 10 ,'D');
$pdf->SetXY(5,5);$pdf->Cell(70,5,"Nom et Prénom : ",0,1,'L');$pdf->SetXY(150,5);$pdf->Cell(70,5,"Date : ",0,1,'L');       
$pdf->SetXY(5,5+5);$pdf->Cell(70,5,"Médecin : ",0,1,'L');$pdf->SetXY(55,5+5);$pdf->Cell(70,5,"Infirmiers : B ",0,1,'L');$pdf->SetXY(105,5+5);$pdf->Cell(70,5,"S : ",0,1,'L');  $pdf->SetXY(150,5+5);$pdf->Cell(70,5,"D : ",0,1,'L'); 

$pdf->Rect(5, 15, 200, 20 ,'D');
$pdf->SetXY(5,5+10);$pdf->Cell(70,5,"STATUT CLINIQUE AVANT LA SEANCE : ",0,1,'L');   $pdf->SetXY(105,5+10);$pdf->Cell(70,5,"Poids Ideal :",0,1,'L'); $pdf->SetXY(150,5+10);$pdf->Cell(70,5,"Poids Du Jour",0,1,'L');
$pdf->SetXY(5,5+15);$pdf->Cell(70,5,"Etat De La Fistule Ou Du Catheter : ",0,1,'L'); $pdf->SetXY(150,5+15);$pdf->Cell(70,5,"Uniponcture : ",0,1,'L');
$pdf->SetXY(5,5+20);$pdf->Cell(70,5,"Etat Clinique : ",0,1,'L');                     $pdf->SetXY(150,5+20);$pdf->Cell(70,5,"Prise De Poids :",0,1,'L');
$pdf->SetXY(5,5+25);$pdf->Cell(70,5,"- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ",0,1,'L');

$pdf->Rect(5, 35, 200, 35 ,'D');
$pdf->SetXY(5,5+30);$pdf->Cell(70,5,"PRESCRIPTION DU JOUR : ",0,1,'L');
$pdf->SetXY(5,5+35);$pdf->Cell(70,5,"Technique De Dialyse / D hemodialyseur : ",0,1,'L');   $pdf->SetXY(150,5+35);$pdf->Cell(70,5,"Héparinisation : ",0,1,'L');
$pdf->SetXY(5,5+40);$pdf->Cell(70,5,"Durée De Dialyse : ",0,1,'L'); $pdf->SetXY(55,5+40);$pdf->Cell(70,5,"Poids A Perdre : ",0,1,'L');$pdf->SetXY(105,5+40);$pdf->Cell(70,5,"UF/h : ",0,1,'L');$pdf->SetXY(150,5+40);$pdf->Cell(70,5,"UF Tolerée: ",0,1,'L');
$pdf->SetXY(5,5+45);$pdf->Cell(70,5,"Examens Ou Perfusion A Administrer : ",0,1,'L');
$pdf->SetXY(5,5+50);$pdf->Cell(70,5,"Médicaments Ou Perfusion A Administrer : ",0,1,'L');
$pdf->SetXY(5,5+55);$pdf->Cell(70,5,"Surveillances Particulieres : ",0,1,'L');    $pdf->SetXY(55,5+55);$pdf->Cell(70,5,"Dextro   /h: ",0,1,'L');$pdf->SetXY(55+30,5+55);$pdf->Cell(70,5,"TA       /min: ",0,1,'L');$pdf->SetXY(55+60,5+55);$pdf->Cell(70,5,"Pouls    /min: ",0,1,'L');$pdf->SetXY(150,5+55);$pdf->Cell(70,5,"Scope: ",0,1,'L');
$pdf->SetXY(5,5+60);$pdf->Cell(70,5,"Autres A Préciser : ",0,1,'L');

$pdf->Rect(5, 35, 200, 200 ,'D');
$pdf->SetXY(5,5+65);$pdf->Cell(70,5,"SURVEILLANCE DE LA SEANCE  : ",0,1,'L');
$pdf->SetXY(70,5+65);$pdf->Cell(70,5,"Hémodialyseur  : ",0,1,'L');$pdf->SetXY(112,5+65);$pdf->Cell(70,5,"Génerateur  : ",0,1,'L');$pdf->SetXY(155,5+65);$pdf->Cell(70,5,"Bain  : ",0,1,'L');
$pdf->SetXY(70,5+70);$pdf->Cell(70,5,"Test De Rincage  : ",0,1,'L');

$pdf->SetXY(5,85);$pdf->cell(15,05,"Heure",1,0,'C',1,0);$pdf->cell(15,05,"UF/h",1,0,'C',1,0);$pdf->cell(15,05,"UF eff",1,0,'C',1,0);$pdf->cell(15,05,"TAS",1,0,'C',1,0);$pdf->cell(15,05,"TAD",1,0,'C',1,0);$pdf->cell(15,05,"DS",1,0,'C',1,0);$pdf->cell(15,05,"PV",1,0,'C',1,0);$pdf->cell(15,05,"DB",1,0,'C',1,0);$pdf->cell(15,05,"PTM",1,0,'C',1,0);$pdf->cell(15,05,"CDC",1,0,'C',1,0);$pdf->cell(50,05,"Observation",1,0,'C',1,0);
$pdf->SetXY(5,90);$pdf->cell(15,05,"",1,0,'C',1,0);$pdf->cell(15,05,"(ml)",1,0,'C',1,0);$pdf->cell(15,05,"(ml)",1,0,'C',1,0);$pdf->cell(15,05,"(mm Hg)",1,0,'C',1,0);$pdf->cell(15,05,"(mm Hg)",1,0,'C',1,0);$pdf->cell(15,05,"(ml/min)",1,0,'C',1,0);$pdf->cell(15,05,"(mm Hg)",1,0,'C',1,0);$pdf->cell(15,05,"(ml/min)",1,0,'C',1,0);$pdf->cell(15,05,"(mm Hg)",1,0,'C',1,0);$pdf->cell(15,05,"(ms/cm)",1,0,'C',1,0);$pdf->cell(50,05,"",1,0,'C',1,0);


$pdf->SetXY(5,95);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(50,10,"",1,0,'C',0,0);
$pdf->SetXY(5,105);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(50,10,"",1,0,'C',0,0);
$pdf->SetXY(5,115);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(50,10,"",1,0,'C',0,0);
$pdf->SetXY(5,125);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(50,10,"",1,0,'C',0,0);
$pdf->SetXY(5,135);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(50,10,"",1,0,'C',0,0);
$pdf->SetXY(5,145);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(50,10,"",1,0,'C',0,0);
$pdf->SetXY(5,155);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(50,10,"",1,0,'C',0,0);
$pdf->SetXY(5,165);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(50,10,"",1,0,'C',0,0);
$pdf->SetXY(5,175);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(50,10,"",1,0,'C',0,0);
$pdf->SetXY(5,185);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(50,10,"",1,0,'C',0,0);
$pdf->SetXY(5,195);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(50,10,"",1,0,'C',0,0);
$pdf->SetXY(5,205);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(50,10,"",1,0,'C',0,0);
$pdf->SetXY(5,215);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(50,10,"",1,0,'C',0,0);
$pdf->SetXY(5,225);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(50,10,"",1,0,'C',0,0);

$pdf->Rect(5, 235, 200, 50 ,'D');
$pdf->SetXY(5,235);$pdf->Cell(70,5,"APRES DEBRANCHEMENT  : ",0,1,'L');
$pdf->SetXY(125,235);$pdf->Cell(70,5,"Poids Fin De Seance   : ",0,1,'L');
$pdf->SetXY(125,240);$pdf->Cell(70,5,"Perte De Poids   : ",0,1,'L');
$pdf->SetXY(5,245);$pdf->Cell(70,5,"VST  : ",0,1,'L');
$pdf->SetXY(5,250);$pdf->Cell(70,5,"Commentaire  : ",0,1,'L');
$pdf->SetXY(5,255);$pdf->Cell(70,5,"- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ",0,1,'L');
$pdf->SetXY(5,260);$pdf->Cell(70,5,"- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ",0,1,'L');
$pdf->SetXY(5,265);$pdf->Cell(70,5,"- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ",0,1,'L');
$pdf->Text(145,272,"DR M. DAOUD");
$pdf->Output();     
?>
