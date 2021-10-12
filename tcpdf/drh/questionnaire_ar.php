<?php 
$ndp=$_GET["idp"];
$idc=$_GET["idc"];
require_once('drh.php');$pdf = new drh('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('DECISION');
$pdf->SetSubject('PROTOCOLE');
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
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
$sql1 = "SELECT * FROM regconge WHERE  id = '".$idc."' "; 
$requete1 = @mysql_query($sql1) or die($sql1."<br>".mysql_error()) ;
$result1 = mysql_fetch_array( $requete1 ); 
mysql_free_result($requete1);
$pdf->AddPage();
$pdf->SetLineWidth(0.4);
$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->repar,0,0,'C');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->mspar,0,0,'C');
$pdf->SetFont('aefurat', '', 14);
//$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,$pdf->wilayaar,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->dsparp,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"المؤسسة العمومية الاستشفائية عين وسارة",0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"المديرية الفرعية للموارد البشرية",0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,'رقم : ............./م . م . ب /'.date("Y"),0,1,'R');$pdf->SetFont('aefurat', '', 16);
$pdf->setRTL(true);
$pdf->SetFont('aefurat', 'U', 28);
$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,'طلــب استفســار',0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 14);
$pdf->Text(5,$pdf->GetY()+8," الاسم :");               $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);                                                                   $pdf->Text(120,$pdf->GetY()," اللقب :");                  $pdf->SetTextColor(225,0,0);$pdf->Text(135,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+8,"الرتبـــة :");           $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+8,"الوظيفـة : ");           $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
$pdf->Text(5,$pdf->GetY()+8,"المصلحة :");             $pdf->SetTextColor(225,0,0);$pdf->Text(24,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);                                                                           
$pdf->SetXY(6,$pdf->GetY()+10);$pdf->Cell(100,10,'طلــب استفســار',1,0,'C',0,0);$pdf->Cell(98,10,'الجـــــــــــواب',1,1,'C',0,0);
$pdf->SetXY(6,$pdf->GetY());      $pdf->Cell(100,10,'علل سبب غيابك عن العمل لمدة : '.$result1["DURECONGE"]." يوم / ايام ",1,0,'R',0,0);$pdf->Cell(100,90,'',1,0,'R',0,0);
$pdf->SetXY(6,$pdf->GetY());      $pdf->Cell(100,10,'',1,1,'R',0,0);
$pdf->SetXY(6,$pdf->GetY());      $pdf->Cell(100,10,'من : '.$result1["DEBUTCONGE"],1,1,'R',0,0);
$pdf->SetXY(6,$pdf->GetY());      $pdf->Cell(100,10,'الى : '.$result1["FINCONGE"],1,1,'R',0,0);
$pdf->SetXY(6,$pdf->GetY());      $pdf->Cell(100,60,'',1,1,'R',0,0);
$pdf->Text(5,$pdf->GetY()+5,"ملاحضة: الاجابة تكون خلال 48 ساعة");    
$pdf->Text(128,$pdf->GetY()+25,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
$pdf->Text(150,$pdf->GetY()+8," المدير");
$pdf->Output('questionnaire_ar.pdf','I');
?>
