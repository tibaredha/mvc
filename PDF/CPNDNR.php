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
$pdf = new FPDI();$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$pdf->AddPage();
$IDDNR=$_GET["uc"];
// $CIN="";//$_POST["CIN"];
// $DL="";//$_POST["DL"];
// $DLE="";//$_POST["DLE"];
mysqlconnect();
$query1 = "select * from DNR WHERE  id = '$IDDNR'";
$resultat1=mysql_query($query1);
$row = mysql_fetch_array($resultat1); 
$pdf->setSourceFile('cmp1.pdf');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);
$pdf->SetXY(80,128);
$pdf->Write(0, "Nom : ".trim($row['NOM']).''."   Prenom : ".''.trim($row['PRENOM']));
$d1=substr($row['DATENAISSANCE'],6,4);
$d2=substr(date('d/m/Y'),6,4);
$d3=$d2-$d1;
$pdf->SetXY(35,138);
$pdf->Write(0,trim($row['DATENAISSANCE']).'    Age : '.$d3.'  Ans');
$pdf->SetXY(40,148);
$pdf->Write(0, $row['ADRESSE']);
$pdf->SetXY(35,158);
$pdf->Write(0, $_POST["NUMCARTE"]);
$pdf->SetXY(88,158);
$pdf->Write(0, $_POST["DELIVREEA"]);
$pdf->SetXY(135,158);
$pdf->Write(0, $_POST["LE"]);
$pdf->SetXY(68,182);
$pdf->Write(0, $row['GRABO']."  ".'( '.trim($row['GRRH']).' )');
$pdf->SetXY(148,255);
$pdf->Write(0, date('d/m/Y'));
$pdf->SetXY(116,255);
$pdf->Write(0, 'Ain oussera');
$pdf->Output();
?>