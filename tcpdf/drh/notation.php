<?php 
$ndp=$_GET["uc"];require_once('drh.php');$pdf = new drh('P', 'mm', 'A4', true, 'UTF-8', false);
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
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,0,'C');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->mspar,0,0,'C');
$pdf->SetFont('aefurat', '', 14);
//$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,$pdf->wilayaar,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->dsparp,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"المؤسسة العمومية الاستشفائية عين وسارة",0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"المديرية الفرعية للموارد البشرية",0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'رقم : ............./م . م . ب /'.date("Y"),0,1,'R');$pdf->SetFont('aefurat', '', 16);

$date1=date("Y");
$pdf->setRTL(true);
$pdf->SetFont('aefurat', '', 20);
$pdf->SetXY(70,35);$pdf->Cell(65,15,'بطاقة التنقيط'." لسنة  ". $date1,0,1,'C');
$pdf->SetFont('aefurat', '', 11);
$pdf->Rect(5, 54, 200, 105,"d");$pdf->Line(5 ,95 ,205 ,95 ); $pdf->Line(100,54,100,159 ); 
$pdf->Text(5,55," الاسم : ");               $pdf->SetTextColor(225,0,0);$pdf->Text(17,55,$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);                                                                              $pdf->Text(110,55,"الرتبة : ");                               

$pdf->SetTextColor(225,0,0);
if($result["rnvgradear"]==1 or $result["rnvgradear"]==3 )
{
	$pdf->Text(121,55,$pdf->nbrtostring("mvc","grade","idg",$result["rnvgradear"],"gradear")." في ".$pdf->nbrtostring("grh","specialite","idspecialite",$result["FILIERE"],"specialitear"));
}
else 
{
	$pdf->Text(121,55,$pdf->nbrtostring("mvc","grade","idg",$result["rnvgradear"],"gradear"));	
}
$pdf->SetTextColor(0,0,0);

$pdf->Text(5,60," اللقب : ");              $pdf->SetTextColor(225,0,0);$pdf->Text(17,60,$result["Nomarab"]);$pdf->SetTextColor(0,0,0);                                                                                   $pdf->Text(110,60,"الدرجة : ");                               $pdf->SetTextColor(225,0,0);$pdf->Text(123,60,$result["ECHELON"]);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,65,"المولود (ة) بتاريخ : ");  $pdf->SetTextColor(225,0,0);$pdf->Text(33,65,$result["Date_Naissance"]);$pdf->SetTextColor(0,0,0);                                                                            $pdf->Text(110,65," تاريخ اخر ترقية  فى الدرجات : ");         $pdf->SetTextColor(225,0,0);$pdf->Text(155,65,$result["DATEDEFFET"]);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,70," الحالة العائلية : ");    $pdf->SetTextColor(225,0,0);$pdf->Text(28,70,$pdf->nbrtostring("mvc","sf","id",$result["Situation_familliale"],"sf_ar"));$pdf->SetTextColor(0,0,0);                           $pdf->Text(110,70," تاريخ تمكن المعنى بالأمر الحصول ");
$pdf->Text(5,75," الشهادات و  المؤهلات : *** ");                                                                                                                                                                          $pdf->Text(110,75," على الدرجة الموالية (المدة الدنيا) : ");  $pdf->SetTextColor(225,0,0);$pdf->Text(160,75,$result["PREVISION"]);$pdf->SetTextColor(0,0,0);
$pdf->Text(45,80," العلامة : 20 / ______");
//*************************************************************************************************//
$pdf->Text(5,95,"مكان مخصص للمعني بالأمر لكي يقدم ملاحظاته ");
$pdf->Text(5,100," أو بطلب إستفسارات و يستطيع أيضا أن يعطي ");
$pdf->Text(5,105," دلائل أو بينات حول وضعيته و الوظائف");
$pdf->Text(5,110," أو التعيينات تتطابق مع مؤهلاته:");
$pdf->Text(5,115," -----------------------------------------------------------------------------");
$pdf->Text(5,120," -----------------------------------------------------------------------------");
$pdf->Text(5,125," -----------------------------------------------------------------------------");
$pdf->Text(5,130," -----------------------------------------------------------------------------");
$pdf->Text(5,135," -----------------------------------------------------------------------------");
$pdf->Text(5,140," أنا الممضي أسفله أصرح بأنني تعرفت على العلامة التي تحصلت عليها");
$pdf->Text(45,145," الإمضاء");
//************************************************************************************************//
$pdf->Text(90,160," الملاحظات العامة للمنقط");
$pdf->Text(5,165," -----------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Text(5,170," -----------------------------------------------------------------------------------------------------------------------------------------------------------");


$pdf->Text(80,180," إسم و صفة السلطة المرخص لها بالتنقيط");
$pdf->Text(5,185," -----------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Text(100,190," الإمضاء");
$pdf->Text(5,195," -----------------------------------------------------------------------------------------------------------------------------------------------------------");
//***********************************************************************************************//
$pdf->Text(85,205,"رأي اللجنة المتساوية الأعضاء ");

//$pdf->Text(5,215,"اللجنة المتساوية للتنقيط المرقم و الملاحظة العامة في جلستها المنعقدة بتاريخ .............................. ");
$pdf->Text(5,215,"اللجنة المتساوية الأعضاء في جلستها المنعقدة بتاريخ :................................................");
$pdf->Text(5,220,"تطلب اللجنة المتساوية الأعضاء من السلطة المرخص لها إعادة النظر في العلامة المنقطة  ");
$pdf->Text(5,225,"-----------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Text(5,235," الرئيس");$pdf->Text(100,235," الكاتب");
$pdf->Text(5,240," -----------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Text(5,245," اجابة السلطة المرخص لها بالتنقيط المطلوب منها إعادة النظر في هذا التنقيط. ");
$pdf->Text(170,255," الإمضاء");
 

$pdf->Output('notation.pdf','I');
?>
