<?php 
$ndp=$_GET["uc"];
$idg=$_GET["idg"];
require_once('drh.php');$pdf = new drh('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('DECISION');
$pdf->SetSubject('PROTOCOLE');
$pdf->SetFillColor(250);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf-> mysqlconnect(); 
$sql = "SELECT * FROM grh WHERE  idp = '".$ndp."' "; 
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
$result = mysql_fetch_array( $requete ); 
mysql_free_result($requete);

//******************************************************//
$sql1 = "SELECT * FROM reggrade WHERE  id = '".$idg."' "; 
$requete1 = @mysql_query($sql1) or die($sql1."<br>".mysql_error()) ;
$result1 = mysql_fetch_array( $requete1 ); 
mysql_free_result($requete1);

$pdf->AddPage();
$pdf->SetLineWidth(0.4);
$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,0,'C');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->mspar,0,0,'C');
$pdf->SetFont('aefurat', '', 14);
//$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,$pdf->wilayaar,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->dsparp." لولاية الجلفة ",0,0,'R');  
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"المؤسسة العمومية الاستشفائية عين وسارة",0,0,'R');    
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"المديرية الفرعية للموارد البشرية",0,0,'R');         
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,'رقم : ............./م . م . ب /'.date("Y"),0,1,'R');$pdf->SetFont('aefurat', '', 16);
$pdf->setRTL(true);$pdf->SetFont('aefurat', '', 28);
$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,'كشف الراتب الشهرى',0,1,'C',1,1);
$pdf->SetFont('aefurat', '', 14);
$uc=$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"ids");
$pdf->titre1($uc,$result["NSS"],$result["NCCP"],$JOURS="30",$result["Nomarab"],$result["Prenom_Arabe"],$result["Date_Naissance"],$result["Situation_familliale"],$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"gradear"),$result1["CATEGORIE"],$result1["ECHELON"],$result["NBRE"]);
$pdf->SetFont('aefurat','I', 14);$pdf->SetTextColor(225,0,0);$pdf->SetTextColor(0,0,0);
$pdf->Text(140,$pdf->GetY()+8," عين وسارة في :  ");
$pdf->Text(150,$pdf->GetY()+8,"  المدير");
$pdf->Output('indemnite_ar.pdf','I');
?>
