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
$pdf->ENTETEDRH('بطاقة التنقيط'." لسنة  ". date("Y")," _____",date("Y")); 
$pdf->SetFont('aefurat', '', 11);

$pdf->Rect(5, 80, 200, 105,"d");$pdf->Line(5 ,120 ,205 ,120 ); $pdf->Line(100,54+26,100,159+25 ); 
$pdf->Text(5,$pdf->GetY()+5," الاسم : ");               $pdf->SetTextColor(225,0,0);$pdf->Text(17,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);                                                                              $pdf->Text(110,$pdf->GetY(),"الرتبة : ");                               

$pdf->SetTextColor(225,0,0);
if($result["rnvgradear"]==1 or $result["rnvgradear"]==3 )
{
	$pdf->Text(121,$pdf->GetY(),$pdf->nbrtostring("mvc","grade","idg",$result["rnvgradear"],"gradear")." في ".$pdf->nbrtostring("grh","specialite","idspecialite",$result["FILIERE"],"specialitear"));
}
else 
{
	$pdf->Text(121,$pdf->GetY(),$pdf->nbrtostring("mvc","grade","idg",$result["rnvgradear"],"gradear"));	
}
$pdf->SetTextColor(0,0,0);

$pdf->Text(5,$pdf->GetY()+5," اللقب : ");              $pdf->SetTextColor(225,0,0);$pdf->Text(17,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);                                                                                   $pdf->Text(110,$pdf->GetY(),"الدرجة : ");                               $pdf->SetTextColor(225,0,0);$pdf->Text(123,$pdf->GetY(),$result["ECHELON"]);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+5,"المولود (ة) بتاريخ : ");  $pdf->SetTextColor(225,0,0);$pdf->Text(33,$pdf->GetY(),$result["Date_Naissance"]);$pdf->SetTextColor(0,0,0);                                                                            $pdf->Text(110,$pdf->GetY()," تاريخ اخر ترقية  فى الدرجات : ");         $pdf->SetTextColor(225,0,0);$pdf->Text(155,$pdf->GetY(),$result["DATEDEFFET"]);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+5," الحالة العائلية : ");    $pdf->SetTextColor(225,0,0);$pdf->Text(28,$pdf->GetY(),$pdf->nbrtostring("mvc","sf","id",$result["Situation_familliale"],"sf_ar"));$pdf->SetTextColor(0,0,0);                           $pdf->Text(110,$pdf->GetY()," تاريخ تمكن المعنى بالأمر الحصول ");
$pdf->Text(5,$pdf->GetY()+5," الشهادات و  المؤهلات : *** ");                                                                                                                                                                                    $pdf->Text(110,$pdf->GetY()," على الدرجة الموالية (المدة الدنيا) : ");  $pdf->SetTextColor(225,0,0);$pdf->Text(160,$pdf->GetY(),$result["PREVISION"]);$pdf->SetTextColor(0,0,0);
$pdf->Text(45,$pdf->GetY()+5," العلامة : 20 / ______");
//*************************************************************************************************//
$pdf->Text(5,$pdf->GetY()+15,"مكان مخصص للمعني بالأمر لكي يقدم ملاحظاته ");
$pdf->Text(5,$pdf->GetY()+5," أو بطلب إستفسارات و يستطيع أيضا أن يعطي ");
$pdf->Text(5,$pdf->GetY()+5," دلائل أو بينات حول وضعيته و الوظائف");
$pdf->Text(5,$pdf->GetY()+5," أو التعيينات تتطابق مع مؤهلاته:");
$pdf->Text(5,$pdf->GetY()+5," -----------------------------------------------------------------------------");
$pdf->Text(5,$pdf->GetY()+5," -----------------------------------------------------------------------------");
$pdf->Text(5,$pdf->GetY()+5," -----------------------------------------------------------------------------");
//$pdf->Text(5,$pdf->GetY()+5," -----------------------------------------------------------------------------");
//$pdf->Text(5,$pdf->GetY()+5," -----------------------------------------------------------------------------");
$pdf->Text(5,$pdf->GetY()+5," أنا الممضي أسفله أصرح بأنني تعرفت على العلامة التي تحصلت عليها");
$pdf->Text(45,$pdf->GetY()+5," الإمضاء");
//************************************************************************************************//
$pdf->Text(90,$pdf->GetY()+25," الملاحظات العامة للمنقط");
$pdf->Text(5,$pdf->GetY()+5," -----------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Text(5,$pdf->GetY()+5," -----------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Text(80,$pdf->GetY()+10," إسم و صفة السلطة المرخص لها بالتنقيط");
$pdf->Text(5,$pdf->GetY()+5," -----------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Text(100,$pdf->GetY()+5," الإمضاء");
$pdf->Text(5,$pdf->GetY()+5," -----------------------------------------------------------------------------------------------------------------------------------------------------------");
//***********************************************************************************************//
$pdf->Text(85,$pdf->GetY()+10,"رأي اللجنة المتساوية الأعضاء ");

////$pdf->Text(5,215,"اللجنة المتساوية للتنقيط المرقم و الملاحظة العامة في جلستها المنعقدة بتاريخ .............................. ");
$pdf->Text(5,$pdf->GetY()+10,"اللجنة المتساوية الأعضاء في جلستها المنعقدة بتاريخ :................................................");
$pdf->Text(5,$pdf->GetY()+5,"تطلب اللجنة المتساوية الأعضاء من السلطة المرخص لها إعادة النظر في العلامة المنقطة  ");
$pdf->Text(5,$pdf->GetY()+5,"-----------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Text(5,$pdf->GetY()+5," الرئيس");$pdf->Text(100,$pdf->GetY()," الكاتب");
$pdf->Text(5,$pdf->GetY()+5," -----------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Text(5,$pdf->GetY()+5," اجابة السلطة المرخص لها بالتنقيط المطلوب منها إعادة النظر في هذا التنقيط. ");
$pdf->Text(170,$pdf->GetY()+5," الإمضاء");
 

$pdf->Output('notation.pdf','I');
?>
