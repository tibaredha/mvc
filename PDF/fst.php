<?php
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
function nbrtostring($db_name,$tb_name,$colonename,$colonevalue,$resultatstring) 
{
if (is_numeric($colonevalue) and $colonevalue!=='0') 
{ 
$db_host="localhost"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
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
$IDDNR=$_GET["id"];
mysqlconnect();
$query1 = "select * from dis WHERE  id = '$IDDNR'";
$resultat1=mysql_query($query1);
$row = mysql_fetch_array($resultat1); 
$pdf->setSourceFile('fst.PDF');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);
$pdf->SetTextColor(255,0,0);
$pdf->SetXY(15,48);$pdf->Write(0,'Etablissement Public Hospitalier Ain-Oussera ');
$pdf->SetXY(46,58);$pdf->Write(0, nbrtostring('mvc','ser','id',$row['SERVICE'],'service'));
$pdf->SetFont('Arial','B',12);
if ($row['PSL']=='CGR')
{
$pdf->SetXY(75,72);$pdf->Write(0, trim($row['PSL']));
$pdf->SetXY(75,90);$pdf->Write(0, trim($row['IDP']));
}
if ($row['PSL']=='PFC')
{
$pdf->SetXY(120,72);$pdf->Write(0, trim($row['PSL']));
$pdf->SetXY(120,90);$pdf->Write(0, trim($row['IDP']));
}
if ($row['PSL']=='CPS')
{
$pdf->SetXY(170,72);$pdf->Write(0, trim($row['PSL']));
$pdf->SetXY(170,90);$pdf->Write(0, trim($row['IDP']));
}
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(94,184);$pdf->Write(0, "".nbrtostring('mvc','rec','id',$row['IDREC'],'NOM').''."    ".''.nbrtostring('mvc','rec','id',$row['IDREC'],'PRENOM'));


$pdf->SetXY(94,190);$pdf->Write(0,trim($row['PSL']));
$pdf->SetXY(110,190);$pdf->Write(0,trim($row['IDP']));



$pdf->AddPage();
$pdf->setSourceFile('fst.PDF');
$tplIdx = $pdf->importPage(2);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);

$pdf->Output();
?>