<?php
function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
	
function dateUS2FR($date)//2013-01-01
    {
	$J      = substr($date,8,2);
    $M      = substr($date,5,2);
    $A      = substr($date,0,4);
	$dateUS2FR =  $J."/".$M."/".$A ;
    return $dateUS2FR;//01/01/2013
    }	
function mysqlconnect()
{
$nomprenom ="tibaredha";
$db_host="localhost";
$db_name="mvc"; //probleme avec base de donnes  il faut change  gpts avec mvc   
$db_user="root";
$db_pass="";
$utf8 = "" ;
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
return $db;
}
function nbrtostring($tb_name,$colonename,$colonevalue,$resultatstring) 
{
if (is_numeric($colonevalue) and $colonevalue!=='0') 
{ 
mysqlconnect();
$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
$row=mysql_fetch_object($result);
$resultat=$row->$resultatstring;
return $resultat;
} 
return $resultat2='??????';
}
require('../fpdf.php');
require('../fpdi.php');
$pdf = new FPDI();$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->setSourceFile('pec.pdf');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$id=$_GET["id"];
// $pdf->EAN13(15,50,$ID,$h=6,$w=.35);$pdf->EAN13(150,50,time(),$h=6,$w=.35);
// $pdf->EAN13(15,144,$ID,$h=6,$w=.35);$pdf->EAN13(150,144,time(),$h=6,$w=.35);
// $pdf->SetFont('Arial','B',9);
mysqlconnect();
$query = "SELECT * FROM hemo where id='".$id."'  ";
$resultat=mysql_query($query);

while($row=mysql_fetch_object($resultat))
{
$pdf->SetFont('Arial','B',7.5);
$pdf->SetXY(150,48);$pdf->Write(0,$row->NSS);
$pdf->SetXY(78,51);$pdf->Write(0,$row->ASSURE);
$pdf->SetXY(35,20);$pdf->Write(0,$row->CAISSE);
$pdf->SetXY(53,27);$pdf->Write(0,$row->NCP);
$pdf->SetXY(18,32);$pdf->Write(0,$row->ADRESSENSS);
$pdf->SetXY(78,71);$pdf->Write(0,"CLINIQUE DE NEPHROLOGIE ET D HEMODIALYSE NEPHRODIALE ");
$pdf->SetXY(78,76);$pdf->Write(0,"170 Rue Sfindja ex La Perlier Telemly - Alger -  TEL  0661 55 15 83 ");
$pdf->SetXY(39,82);$pdf->Write(0,888);    
$pdf->SetXY(70,82);$pdf->Write(0,8);
$pdf->SetXY(75,82);$pdf->Write(0,8);
$pdf->SetXY(80,82);$pdf->Write(0,8);
$pdf->SetXY(84,82);$pdf->Write(0,8);
$pdf->SetXY(89.5,82);$pdf->Write(0,8);
$pdf->SetXY(94,82);$pdf->Write(0,8);
$pdf->SetXY(139.5,88.5);$pdf->Write(0,"X");
$pdf->SetXY(78,95);$pdf->Write(0,$row->NOM."_".$row->PRENOM);
if ($row->QUALITE=='Assure') {$pdf->SetXY(29.5,102.5);$pdf->Write(0,"X");}
if ($row->QUALITE=='Conjoint') {$pdf->SetXY(49.5,102.5);$pdf->Write(0,"X");}
if ($row->QUALITE=='Enfant') {$pdf->SetXY(66.5,102.5);$pdf->Write(0,"X");}
if ($row->QUALITE=='Ascendant') {$pdf->SetXY(89.5,102.5);$pdf->Write(0,"X");}
if ($row->QUALITE=='Autre') {$pdf->SetXY(125.5,102.5);$pdf->Write(0,"X");$pdf->SetXY(136.5,103.5);$pdf->Write(0,"*****");}
//nbr de seance
$pdf->SetXY(71,156);$pdf->Write(0,"0");
$pdf->SetXY(76,156);$pdf->Write(0,"0");
$pdf->SetXY(81,156);$pdf->Write(0,"3");
//du au 
$pdf->SetXY(94,156);$pdf->Write(0,"X");
$pdf->SetXY(99,156);$pdf->Write(0,"X");
$pdf->SetXY(103.5,156);$pdf->Write(0,"X");
$pdf->SetXY(108,156);$pdf->Write(0,"X");
$pdf->SetXY(113,156);$pdf->Write(0,"X");
$pdf->SetXY(118,156);$pdf->Write(0,"X");
//au
$pdf->SetXY(131,156);$pdf->Write(0,"X");
$pdf->SetXY(136,156);$pdf->Write(0,"X");
$pdf->SetXY(140.5,156);$pdf->Write(0,"X");
$pdf->SetXY(145.5,156);$pdf->Write(0,"X");
$pdf->SetXY(150.5,156);$pdf->Write(0,"X");
$pdf->SetXY(155,156);$pdf->Write(0,"X");
$pdf->SetXY(105,181);$pdf->Write(0,"Alger ");
$pdf->SetXY(150,181);$pdf->Write(0,date('d-m-Y'));
$pdf->SetXY(150,189);$pdf->Write(0,"Dr Malek.DAOUD ");
}
$pdf->Output();
?>