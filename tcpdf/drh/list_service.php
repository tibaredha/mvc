<?php 
$ndp=$_GET["idp"];
// $idc=$_GET["idc"];
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
$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,'بطاقــــة التحويلات',0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 14);
$pdf->Text(5,$pdf->GetY()+8," الاسم :");               $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);                                                                   $pdf->Text(120,$pdf->GetY()," اللقب :");                  $pdf->SetTextColor(225,0,0);$pdf->Text(135,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+8,"الرتبـــة :");           $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+8,"الوظيفـة : ");           $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
$pdf->Text(5,$pdf->GetY()+8,"المصلحة :");             $pdf->SetTextColor(225,0,0);$pdf->Text(24,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);                                                                           
$pdf->SetXY(6,$pdf->GetY()+10);
$pdf->cell(12,5,"الرقم",1,0,'C',1,0);
$pdf->cell(70,5,"المصلحة القديمة",1,0,'C',1,0);
$pdf->cell(20,5,"السبب",1,0,'C',1,0);
$pdf->cell(70,5,"المصلحة الجديدة",1,0,'C',1,0);
$pdf->cell(27,5,"تاريخ التحويل",1,0,'C',1,0);

$pdf->SetXY(6,$pdf->GetY()+8); // marge sup 13
$sqlc = "SELECT * FROM regservice WHERE IDP=$ndp";
$requetec = @mysql_query($sqlc) or die($sqlc."<br>".mysql_error()) ;
$totalmbrc=mysql_num_rows($requetec);
$x=0;
$pdf->SetFont('aefurat', '', 12);
while($row=mysql_fetch_object($requetec))
  {
   $pdf->cell(12,5,$x+=1,0,0,'R',0);
   $pdf->cell(70,5,$pdf->nbrtostring("mvc","servicegrh","ids",$row->SERVICEAR_A,"servicear"),0,0,'R',0);
   if($row->CAUSESERVICE==1){
	$pdf->cell(20,5,"ط م",0,0,'C',0);   
   }else{
	$pdf->cell(20,5,"ض م",0,0,'C',0);   
   }
   
   //$pdf->cell(20,5,$row->CAUSESERVICE,0,0,'C',0);
   $pdf->cell(70,5,$pdf->nbrtostring("mvc","servicegrh","ids",$row->SERVICEAR_N,"servicear"),0,0,'R',0);
   $pdf->cell(27,5,$row->DEBUTSERVICE,0,0,'C',0);
   $pdf->SetXY(6,$pdf->GetY()+8); 
  }
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(6,$pdf->GetY());
$pdf->cell(82,5,"المجموع الكلى : ".$totalmbrc,1,0,'C',1,0);
$pdf->cell(20,5,$totalmbrc,1,0,'C',1,0);
$pdf->cell(70,5,$totalmbrc,1,0,'C',1,0);
$pdf->cell(27,5,$totalmbrc,1,0,'C',1,0);
 
$pdf->Text(128,$pdf->GetY()+25,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
$pdf->Text(150,$pdf->GetY()+8," المدير");
$pdf->Output('demande_c_ar.pdf','I');
?>
