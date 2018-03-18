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
require('fpdf.php');
require('fpdi.php');
$pdf = new FPDI();
$pdf->AddPage();$pdf->AliasNbPages();
$IDDNR=$_GET["uc"];

mysqlconnect();
$query1 = "select * from rec WHERE  id = '$IDDNR'";
$resultat1=mysql_query($query1);
$row = mysql_fetch_array($resultat1); 
$pdf->setSourceFile('info.PDF');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);


$pdf->SetXY(58,48);$pdf->Write(0,'Etablissement Public Hospitalier Ain-Oussera ');
$pdf->SetXY(100,58);$pdf->Write(0, "".$row['NOM'].''."    ".''.$row['PRENOM']);
$pdf->SetXY(100,63);$pdf->Write(0, $row['GRABO']."  ".$row['GRRH']);

$d1=substr($row['DATENAISSANCE'],6,4);
$d2=substr(date('d/m/Y'),6,4);
$d3=$d2-$d1;
$pdf->SetXY(100,68);$pdf->Write(0,'date de naissance : '.trim($row['DATENAISSANCE']).'   Age : '.$d3.'  Ans');
$pdf->SetXY(100,73);$pdf->Write(0,'Ain oussera le : '. date('d/m/Y'));

$pdf->AddPage();
$pdf->setSourceFile('info.PDF');
$tplIdx = $pdf->importPage(2);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);




$pdf->AddPage();
$pdf->setSourceFile('info.PDF');
$tplIdx = $pdf->importPage(3);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);


$pdf->AddPage();
$pdf->setSourceFile('info.PDF');
$tplIdx = $pdf->importPage(4);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);







$pdf->Output();
?>