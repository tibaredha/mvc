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
$pdf = new FPDI();
$pdf->AddPage();$pdf->AliasNbPages();
$IDDNR=$_GET["id"];

mysqlconnect();
$query1 = "select * from dis WHERE  id = '$IDDNR'";
$resultat1=mysql_query($query1);
$row = mysql_fetch_array($resultat1); 
$pdf->setSourceFile('IT.PDF');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);
$pdf->SetTextColor(255,0,0);
$pdf->SetXY(58,58);$pdf->Write(0,'Etablissement Public Hospitalier Ain-Oussera ');
$pdf->SetXY(36,63.5);$pdf->Write(0,nbrtostring('mvc','ser','id',$row['SERVICE'],'service'));
$pdf->SetXY(145,63.5);$pdf->Write(0,nbrtostring('mvc','ser','id',$row['SERVICE'],'service'));


$pdf->SetXY(82,198);$pdf->Write(0, $row['DATEDIS']);
$pdf->SetXY(110,198);$pdf->Write(0, $row['HEUREDIS']);
$pdf->SetXY(68,138.5);$pdf->Write(0, $row['GROUPAGE']."  ".$row['RHESUS']);
$pdf->SetXY(30,241);$pdf->Write(0, trim($row['PSL']));
$pdf->SetXY(68,241);$pdf->Write(0, trim($row['IDP']));
$pdf->SetXY(98,241);$pdf->Write(0, $row['GROUPAGE']."  ".$row['RHESUS']);
$pdf->SetXY(137,241);$pdf->Write(0,'PTS ');



$pdf->SetXY(80,81);
$pdf->Write(0, "".nbrtostring('mvc','rec','id',$row['IDREC'],'NOM').''."    ".''.nbrtostring('mvc','rec','id',$row['IDREC'],'PRENOM'));
$d1=substr(nbrtostring('mvc','rec','id',$row['IDREC'],'DATENAISSANCE'),6,4);
$d2=substr(date('d/m/Y'),6,4);
$d3=$d2-$d1;
$pdf->SetXY(80,86);
$pdf->Write(0,trim(nbrtostring('mvc','rec','id',$row['IDREC'],'DATENAISSANCE').'    Age :'.$d3 ));




$pdf->AddPage();
$pdf->setSourceFile('../PDF/IT.PDF');
$tplIdx = $pdf->importPage(2);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);
$pdf->SetXY(115,232);$pdf->Write(0, date('d/m/Y'));
$pdf->AddPage();
$pdf->setSourceFile('../PDF/IT.PDF');
$tplIdx = $pdf->importPage(3);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);
$pdf->SetXY(123,145);$pdf->Write(0, date('d/m/Y'));

$pdf->Output();
?>