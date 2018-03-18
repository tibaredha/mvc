<?php
function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
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
require('fpdf.php');
require('fpdi.php');
$ID=$_GET["uc"];
mysqlconnect();
$query = "SELECT * FROM deceshosp where id='".$ID."'  ";
$resultat=mysql_query($query);
while($row=mysql_fetch_object($resultat))
{
if($row->Days >= 28)
{
   header('location: ../deces/LDECES/');
}
    if ($row->STRUCTURED=='1') {$EPH='EPH_DJALFA';}
	if ($row->STRUCTURED=='2') {$EPH='EPH_AIN_OUSSERA';}
	if ($row->STRUCTURED=='3') {$EPH='EPH_HASSI_BAHBAH';}
	if ($row->STRUCTURED=='4') {$EPH='EPH_MESSAAD';}
	if ($row->STRUCTURED=='5') {$EPH='EHS_DJELFA';}
	if ($row->STRUCTURED=='6') {$EPH='WILAYA_DJELFA';}

$pdf = new FPDI();$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->setSourceFile('deces/fcdpn.pdf');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);
// $pdf->SetXY(36,46);$pdf->Write(0,"Djelfa");
$pdf->SetXY(80,75);$pdf->Write(0,$row->NOM.'_'.$row->PRENOM);
$pdf->SetXY(80,75+6);$pdf->Write(0,$EPH);
$pdf->SetXY(80,75+6+7);$pdf->Write(0,$row->ADRESSE);
$pdf->SetXY(80,75+6+7+6);$pdf->Write(0,$row->NOM.'_'.$row->FILSDE);
$pdf->SetXY(80,75+6+7+6+6);$pdf->Write(0,'/***/');
$pdf->SetXY(80,75+6+7+6+6+6);$pdf->Write(0,$row->ADRESSE);
$pdf->SetXY(80,75+6+7+6+6+6+6+5);$pdf->Write(0,$row->ETDE);$pdf->SetXY(140,75+6+7+6+6+6+6+5);$pdf->Write(0,'/***/');
$pdf->SetXY(80,75+6+7+6+6+6+6+5+10);$pdf->Write(0,$row->ADRESSE);
$pdf->SetXY(80,75+6+7+6+6+6+6+5+10+36);$pdf->Write(0,nbrtostring('WIL','IDWIL',$row->WILAYAD,'WILAYAS'));
$pdf->SetXY(80,75+6+7+6+6+6+6+5+10+46);$pdf->Write(0,nbrtostring('com','IDCOM',$row->COMMUNED,'COMMUNE'));
// $pdf->SetXY(46,46+21.5);$pdf->Write(0,$row->DATENAISSANCE);
// $pdf->SetXY(73,46+28);$pdf->Write(0,$row->ADRESSE.'_'.$row->COMMUNER);
$pdf->AddPage();
$pdf->setSourceFile('deces/fcdpn.pdf');
$tplIdx = $pdf->importPage(2);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);

$pdf->AddPage();
$pdf->setSourceFile('deces/fcdpn.pdf');
$tplIdx = $pdf->importPage(3);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);

$pdf->AddPage();
$pdf->setSourceFile('deces/fcdpn.pdf');
$tplIdx = $pdf->importPage(4);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);
}
$pdf->Output();
?>