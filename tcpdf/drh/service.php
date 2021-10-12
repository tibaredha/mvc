<?php 
$ndp=$_GET["idp"];
$ids=$_GET["ids"];require_once('drh.php');$pdf = new drh('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('DECISION');
$pdf->SetSubject('PROTOCOLE');
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf-> mysqlconnect(); 
$sql = "SELECT * FROM grh WHERE  idp = '".$ndp."' "; 
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
$result = mysql_fetch_array( $requete ); 
mysql_free_result($requete);

$sqls = "SELECT * FROM regservice WHERE  id = '".$ids."' "; 
$requetes = @mysql_query($sqls) or die($sqls."<br>".mysql_error()) ;
$results = mysql_fetch_array( $requetes ); 
mysql_free_result($requetes);

$pdf->AddPage();$y=7;
$pdf->entete_drh($y);
$pdf->htiat('مقرر تحويل',$result["rnvgradear"],$y);
//****************************************************************//
$pdf->Text(5,$pdf->GetY()+$y," بناء : ".$results["CAUSESERVICE"]);
$pdf->Text(5,$pdf->GetY()+$y,"المادة الأولى : (ت) يحول السيد(ة) : ".$result["Nomarab"]." ".$result["Prenom_Arabe"]);
$pdf->Text(35,$pdf->GetY()+$y,"الرتبة : ".$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));
$pdf->Text(35,$pdf->GetY()+$y,"من : ".$pdf->nbrtostring("mvc","service","ids",$results["SERVICEAR_A"],"servicear"));
$pdf->Text(35,$pdf->GetY()+$y,"الى : ".$pdf->nbrtostring("mvc","service","ids",$results["SERVICEAR_N"],"servicear"));
$pdf->Text(35,$pdf->GetY()+$y,"ابتداء من : ".$results["DEBUTSERVICE"]);
$pdf->foot_drh($y);
$pdf->Output('deces_'.$result["Nomlatin"].'.pdf','I');
?>
