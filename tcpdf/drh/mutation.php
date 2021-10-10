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
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf-> mysqlconnect(); 
$sql = "SELECT * FROM grh WHERE  idp = '".$ndp."' "; 
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
$result = mysql_fetch_array( $requete ); 
mysql_free_result($requete);
$pdf->AddPage();$y=7;
$pdf->entete_drh($y);
$pdf->htiat('مقرر نقل ',$result["rnvgradear"],$y);
//****************************************************************//
$pdf->Text(5,$pdf->GetY()+$y," بناء :  على المقرر رقم ");$pdf->Text(54,$pdf->GetY()," المؤرخ في  ");$pdf->Text(100,$pdf->GetY(),"المتضمن تثبيت  السيد : ");
$pdf->Text(15,$pdf->GetY()+$y," في رتبة: ");$pdf->Text(130,$pdf->GetY()," ابتداء من:");
$pdf->Text(5,$pdf->GetY()+$y," بناء :  على طلب النقل المقدم من طرف المعني بتاريخ :");
$pdf->Text(5,$pdf->GetY()+$y," بناء : على موافقة الإدارة الأصلية بتاريخ :");		
$pdf->Text(5,$pdf->GetY()+$y," بناء : على موافقة الإدارة المستقبلة بتاريخ :");		
$pdf->decision_drh($y);
$pdf->Text(5,$pdf->GetY()+$y,"المادة الأولى : (ت)  ينقل السيد (ة) :");
$pdf->Text(105,$pdf->GetY()+$y," بناءا على طلبه  ");
$pdf->Text(28,$pdf->GetY()+$y," من ");$pdf->Text(100,$pdf->GetY()," الى ");$pdf->Text(160,$pdf->GetY(),"ابتداء من:");
$pdf->foot_drh($y);
$pdf->Output('mutation_'.$result["Nomlatin"].'.pdf','I');
?>
