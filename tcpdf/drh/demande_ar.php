<?php 
$ndp=$_GET["idp"];$idc=$_GET["idc"];require_once('drh.php');$pdf = new drh('P', 'mm', 'A4', true, 'UTF-8', false);

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

$pdf->ENTETEDRH('طلـــــب عطلــــــــة'," _____",date("Y"));

$pdf->Text(5,$pdf->GetY()+8," الاسم :");               $pdf->SetTextColor(225,0,0);$pdf->Text(20,$pdf->GetY(),$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);                                                                   $pdf->Text(120,$pdf->GetY()," اللقب :");                  $pdf->SetTextColor(225,0,0);$pdf->Text(135,$pdf->GetY(),$result["Nomarab"]);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+8,"الرتبـــة :");           $pdf->SetTextColor(225,0,0);$pdf->Text(26,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+8,"الوظيفـة : ");           $pdf->SetTextColor(225,0,0);$pdf->Text(25,$pdf->GetY(),"***");$pdf->SetTextColor(0,0,0);  
$pdf->Text(5,$pdf->GetY()+8,"المصلحة :");             $pdf->SetTextColor(225,0,0);$pdf->Text(24,$pdf->GetY(),$pdf->nbrtostring("mvc","service","ids",$result["SERVICEAR"],"servicear"));$pdf->SetTextColor(0,0,0);                                                                           $pdf->Text(120,$pdf->GetY(),"المدة :");                   $pdf->SetTextColor(225,0,0);$pdf->Text(132,$pdf->GetY(),$result1["DURECONGE"]." يوم / ايام ");$pdf->SetTextColor(0,0,0);  
$pdf->Text(5,$pdf->GetY()+8,"تاريخ بداية العطلة :");  $pdf->SetTextColor(225,0,0);$pdf->Text(41,$pdf->GetY(),$result1["DEBUTCONGE"]);$pdf->SetTextColor(0,0,0);                                                                    $pdf->Text(120,$pdf->GetY(),"تاريخ نهاية العطلة :");      $pdf->SetTextColor(225,0,0);$pdf->Text(156,$pdf->GetY(),$result1["FINCONGE"]);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+8,"سبب الخروج :");          $pdf->SetTextColor(225,0,0);$pdf->Text(31,$pdf->GetY(),$pdf->nbrtostring("mvc","causeconge","id",$result1["CAUSECONGE"],"causecongear"));$pdf->SetTextColor(0,0,0);          $pdf->Text(120,$pdf->GetY()," المستخلـف :");              $pdf->SetTextColor(225,0,0);$pdf->Text(145,$pdf->GetY(),$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Nomarab")." _ ".$pdf->nbrtostring("mvc","grh","idp",$result1["REMPLACANT"],"Prenom_Arabe"));$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+15,"إمضاء المعني");         $pdf->Text(70,$pdf->GetY(),"إمضاء المستخلف");$pdf->Text(130,$pdf->GetY(),"رئيس المصلحة");
$pdf->Text(5,$pdf->GetY()+25,"المراقبة الطبية");      $pdf->Text(130,$pdf->GetY()," رئيس المجلس الطبي");
$pdf->Text(5,$pdf->GetY()+25,"المدير الفرعي للمالية و الوسائل");   $pdf->Text(130,$pdf->GetY(),"المدير الفرعي للمصالح الصحية");
$pdf->Text(5,$pdf->GetY()+25,"المدير الفرعي لصيانة المعدات الطبية");$pdf->Text(130,$pdf->GetY(),"المدير الفرعي للموارد البشرية");
$pdf->Text(128,$pdf->GetY()+25,"عين وسارة في : ");$date=date("Y-m-d");$pdf->SetTextColor(225,0,0);$pdf->Text(158,$pdf->GetY(),$date);$pdf->SetTextColor(0,0,0);
$pdf->Text(150,$pdf->GetY()+8," المدير");
$pdf->Output('demande_c_ar.pdf','I');
?>
