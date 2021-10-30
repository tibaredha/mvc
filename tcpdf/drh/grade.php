<?php 
$ndp=$_GET["uc"];$idg=$_GET["idg"];require_once('drh.php');$pdf = new drh('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf-> mysqlconnect(); 
$sql = "SELECT * FROM grh WHERE  idp = '".$ndp."' "; 
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
$result = mysql_fetch_array( $requete ); 
mysql_free_result($requete);

$sql1 = "SELECT * FROM reggrade WHERE  id = '".$idg."' "; 
$requete1 = @mysql_query($sql1) or die($sql1."<br>".mysql_error()) ;
$result1 = mysql_fetch_array( $requete1 ); 
mysql_free_result($requete1);

$pdf->ENTETEDRH('***'," _____",date("Y"));
$pdf->htiat($result["rnvgradear"],7); 
//$pdf->titre1($result1["N_grade"],$result["NSS"],$result["NCCP"],$JOURS="30",$result["Nomarab"],$result["Prenom_Arabe"],$result["Date_Naissance"],$result["Situation_familliale"],$result1["CATEGORIE"],$result1["ECHELON"],$result["NBRE"]);
$pdf->SetFont('aefurat','I', 14);$pdf->SetTextColor(225,0,0);$pdf->SetTextColor(0,0,0);
$pdf->Text(140,$pdf->GetY()+8," عين وسارة في :  ");
$pdf->Text(150,$pdf->GetY()+8,"  المدير");
$pdf->Output('indemnite_ar.pdf','I');
?>
