<?php 
$ndp=$_GET["idp"];
$ida=$_GET["ida"];
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

$sqla = "SELECT * FROM regavance WHERE  id = '".$ida."' "; 
$requetea = @mysql_query($sqla) or die($sqla."<br>".mysql_error()) ;
$resulta = mysql_fetch_array( $requetea ); 
mysql_free_result($requetea);

$pdf->AddPage();$y=7;
$pdf->entete_drh($y);
$pdf->htiat('مقرر ترقية فى الدرجة',$result["rnvgradear"],$y);
$pdf->decision_drh($y);

$pdf->Text(5,$pdf->GetY()+10,"المادة الأولى : (ت) يرقى  السيد (ة) : ");$pdf->SetTextColor(225,0,0);$pdf->Text(65,$pdf->GetY(),$result["Nomarab"]." ".$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
$pdf->Text(35,$pdf->GetY()+10,"الرتبة : ");                           $pdf->SetTextColor(225,0,0);$pdf->Text(48,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
$pdf->SetFont('aefurat','I', 14);$pdf->SetTextColor(225,0,0);$pdf->SetTextColor(0,0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(25,8,'المدة',1,0,'C');$pdf->Cell(16,8,'الصنف',1,0,'C');$pdf->Cell(16,8,'الدرجة',1,0,'C');$pdf->Cell(40,8,'الرقم الاستدلالى',1,0,'C');$pdf->Cell(30,8,'تاريخ النفاذ',1,0,'C');$pdf->Cell(68,8,'الاقدمية المتبقية'.'  '."".'12/31',1,1,'C');
$pdf->SetXY(5,$pdf->GetY());   $pdf->Cell(25,8,$resulta["DUREE"],1,0,'C');$pdf->Cell(16,8,$resulta["CATEGORIE"],1,0,'C');$pdf->Cell(16,8,$resulta["ECHELON"],1,0,'C');$pdf->Cell(40,8,'الرقم الاستدلالى',1,0,'C');$pdf->Cell(30,8,$resulta["DATEDEFFET"],1,0,'C');$pdf->Cell(22.66,8,'',1,0,'C');$pdf->Cell(22.66,8,'',1,0,'C');$pdf->Cell(22.66,8,'',1,1,'C');

$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+4,"المادة الثانية : تكلف السيدة المديرة الفرعية للموارد البشرية و أمين خزينة المؤسسة العمومية ");
$pdf->Text(25,$pdf->GetY()+8," الإستشفائية بعين وسارة بتنفيذ هذا المقرر.");
$pdf->Text(140,$pdf->GetY()+8," عين وسارة في : ");
$pdf->Text(150,$pdf->GetY()+8," المدير");

// if($result["rnvgradear"]==1 or $result["rnvgradear"]==3 )
// {
	// $pdf->Text(88,170," في ".$pdf->nbrtostring("grh","specialite","idspecialite",$result["FILIERE"],"specialitear"));
// }

$pdf->Output('trav_ar.pdf','I');
?>
