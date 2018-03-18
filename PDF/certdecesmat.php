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
$pdf = new FPDI();$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->setSourceFile('certdecesmat1.pdf');
$tplIdx = $pdf->importPage(32);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(255,0,0);
$ID=$_GET["uc"];
mysqlconnect();
$query = "SELECT * FROM deceshosp where id='".$ID."'  ";
$resultat=mysql_query($query);
$pdf->SetFont('Arial','B',10);
while($row=mysql_fetch_object($resultat))
{
	//$texte="Ain oussera";$pdf->Write(0,utf8_decode($texte));
	//partie administrative***//
	$pdf->SetXY(36,46);$pdf->Write(0,"Djelfa");
	$pdf->SetXY(45,46+7);$pdf->Write(0,$row->NOM);$pdf->SetXY(127,46+7);$pdf->Write(0,$row->NOM);
	$pdf->SetXY(32,46+14);$pdf->Write(0,$row->PRENOM);
	$pdf->SetXY(46,46+21.5);$pdf->Write(0,$row->DATENAISSANCE);
	$pdf->SetXY(73,46+28);$pdf->Write(0,$row->ADRESSE.'_'.$row->COMMUNER);
    //LIEU DU DECES
	switch($row->LD)  
		{
			case 'DOM':
				{
				$pdf->SetXY(76,91.5);$pdf->Write(0,'X');
				break;
				}
			case 'VP':
				{
				//$pdf->SetXY(65.8,96.7+4);$pdf->Write(0,"X");
				break;
				}
			case 'AAP':
				{
				///$pdf->SetXY(21.8,96.7+8);$pdf->Write(0,"X");// $pdf->SetXY(49.8,96.7+8);$pdf->Write(0,$row->AUTRES);
				break;
				}
			case 'SSP':
				{
				$pdf->SetXY(76.8,111.5);$pdf->Write(0,'X');$pdf->SetXY(90,111.5+24);$pdf->Write(0,$row->STRUCTURED);//
				break;
				}
			case 'SSPV':
				{
				$pdf->SetXY(76,98.2);$pdf->Write(0,'X');
				break;
				}		
		}
		
	$pdf->SetXY(60,111.5+24+6);$pdf->Write(0,$row->SERVICEHOSPIT);	
	$pdf->SetXY(66,123+33.5);$pdf->Write(0,$row->DATEHOSPI);$pdf->SetXY(125,123+33.5);$pdf->Write(0,$row->HINS);
	$pdf->SetXY(56,130+33.5);$pdf->Write(0,$row->DINS);$pdf->SetXY(125,130+33.5);$pdf->Write(0,$row->HINS);  
	//Moment du décès
	if ($row->DECEMAT=='1')
	{
	switch($row->GRS)          
		{
			case 'DGRO':
				{
				$pdf->SetXY(94,178);$pdf->Write(0,"X");
				break;
				}
			case 'DACC':
				{
				$pdf->SetXY(94,178+4.7);$pdf->Write(0,"X");
				break;
				}
			case 'DAVO':
				{
				$pdf->SetXY(94,178+13.5);$pdf->Write(0,"X");
				break;
				}
			case 'AGESTATION':
				{
				$pdf->SetXY(94,178+17.5);$pdf->Write(0,"X");
				break;
				}
			case 'IDETER':
				{
				////$pdf->SetXY(109,142+4.5);$pdf->Write(0,"X");
				break;
				}		
		}
	}
	else
	{
	////$pdf->SetXY(176,136.7+58.5);$pdf->Write(0,"X");
	}	
$pdf->SetXY(28,244.5);$pdf->Write(0,$row->DINS);$pdf->SetXY(100,244.5);$pdf->Write(0,$row->COMMUNED);$pdf->SetXY(93+62,244.5);$pdf->Write(0,$row->USER);
// if($row->SEX=='M' or $row->DECEMAT=='0')
// {
// header('location: ../deces/LDECES/');
// }







$pdf->Output();
}

?>