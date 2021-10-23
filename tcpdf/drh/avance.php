<?php 
$ndp=$_GET["idp"];
$ida=$_GET["ida"];
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

$sqla = "SELECT * FROM regavance WHERE  id = '".$ida."' "; 
$requetea = @mysql_query($sqla) or die($sqla."<br>".mysql_error()) ;
$resulta = mysql_fetch_array( $requetea ); 
mysql_free_result($requetea);

$pdf->AddPage();$y=7;
$datexy=substr($resulta["DATEDECISION"],0,4);
$pdf->ENTETEDRH('مقرر ترقية فى الدرجة',$resulta["NDECISION"],$datexy); 


// $pdf->SetLineWidth(0.4);$pdf->SetFont('aefurat', 'B', 16);
// $pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
// $pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,0,'C');
// $pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->mspar,0,0,'C');
// $pdf->SetFont('aefurat', '', 14);

// $pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->dsparp." لولاية الجلفة",0,0,'R');
// $pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"المؤسسة العمومية الاستشفائية عين وســـارة",0,0,'R');
// $pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"المديرية الفرعية للموارد البشرية",0,0,'R');
// 
// $pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,'رقم : '.$resulta["NDECISION"].' / '.$datexy,0,1,'R');
// $pdf->entete_drh($y);
$pdf->htiat('',$result["rnvgradear"],$y);
$uc=$pdf->nbrtostring("mvc","grade","idg",$result["rnvgradear"],"ids");
$GRADE=$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear");
switch($uc)
{
 case '1' ://specialiste
		{
		$pdf->Text(5,$pdf->GetY()+8," بموجب :المحضر رقم ".$resulta['NPV']." المؤرخ في  ".$resulta['DATEPV']."المتضمن المصادقة على جدول الترقية ");
		$pdf->Text(25,$pdf->GetY()+8," في الدرجات لسنة "." ".$resulta['ANNEEPV']."الخاصة برتبة"." ".$GRADE.".");
		break;
		}	   
case '2' ://generaliste medecin pharmacien dentiste
		{
		$pdf->Text(5,$pdf->GetY()+8," بموجب :المحضر رقم ".$resulta['NPV']." المؤرخ في  ".$resulta['DATEPV']."  المتضمن المصادقة على جدول الترقية ");
		$pdf->Text(25,$pdf->GetY()+8," في الدرجات لسنة "."  ".$resulta['ANNEEPV']."  "."الخاصة برتبة"." ".$GRADE.".");
		break;
		}	    	
case '3' ://paramedicale
		{
		$pdf->Text(5,$pdf->GetY()+8," بموجب :المحضر رقم ".$resulta['NPV']." المؤرخ في  ".$resulta['DATEPV']."  المتضمن المصادقة على جدول الترقية ");
		$pdf->Text(25,$pdf->GetY()+8," في الدرجات لسنة "." ".$resulta['ANNEEPV']." "."الخاصة برتبة"." ".$GRADE.".");
		break;
		}        
case '4' ://psycholgue
		{
		$pdf->Text(5,$pdf->GetY()+8," بموجب :المحضر رقم ".$resulta['NPV']." المؤرخ في  ".$resulta['DATEPV']."  المتضمن المصادقة على جدول الترقية ");
		$pdf->Text(25,$pdf->GetY()+8," في الدرجات لسنة "." ".$resulta['ANNEEPV']." "."الخاصة برتبة"." ".$GRADE.".");
		break;
		}        				
case '5' ://sage femme
		{
		$pdf->Text(5,$pdf->GetY()+8," بموجب :المحضر رقم ".$resulta['NPV']." المؤرخ في  ".$resulta['DATEPV']."  المتضمن المصادقة على جدول الترقية ");
		$pdf->Text(25,$pdf->GetY()+8," في الدرجات لسنة "." ".$resulta['ANNEEPV']." "."الخاصة برتبة"." ".$GRADE.".");
		break;
		}				
case '6' ://biologie
		{
        $pdf->Text(5,$pdf->GetY()+8," بموجب :المحضر رقم ".$resulta['NPV']." المؤرخ في  ".$resulta['DATEPV']."المتضمن المصادقة على جدول الترقية ");
		$pdf->Text(25,$pdf->GetY()+8," في الدرجات لسنة "." ".$resulta['ANNEEPV']." "."الخاصة برتبة"." ".$GRADE.".");
		break;
		}				
case '7' ://annesthesiste
		{
		$pdf->Text(5,$pdf->GetY()+8," بموجب :المحضر رقم ".$resulta['NPV']." المؤرخ في  ".$resulta['DATEPV']."  المتضمن المصادقة على جدول الترقية ");
		$pdf->Text(25,$pdf->GetY()+8," في الدرجات لسنة "." ".$resulta['ANNEEPV']." "."الخاصة برتبة"." ".$GRADE.".");
		break;
		}				
case '8' ://corps communs
		{
		$pdf->Text(5,$pdf->GetY()+8," بموجب :المحضر رقم ".$resulta['NPV']." المؤرخ في  ".$resulta['DATEPV']."المتضمن المصادقة على جدول الترقية ");
		$pdf->Text(25,$pdf->GetY()+8," في الدرجات لسنة "." ".$resulta['ANNEEPV']." "."الخاصة برتبة"." ".$GRADE.".");
		break;
		}				
case '9' ://op
		{
		$pdf->Text(5,$pdf->GetY()+8," بموجب :المحضر رقم ".$resulta['NPV']." المؤرخ في  ".$resulta['DATEPV']."  المتضمن المصادقة على جدول الترقية ");
		$pdf->Text(25,$pdf->GetY()+8," في الدرجات لسنة "." ".$resulta['ANNEEPV']." "."الخاصة برتبة"." ".$GRADE.".");
		break;
		}				
case '10' ://phisi
		{
		$pdf->Text(5,$pdf->GetY()+8," بموجب :المحضر رقم ".$resulta['NPV']." المؤرخ في  ".$resulta['DATEPV']."المتضمن المصادقة على جدول الترقية ");
		$pdf->Text(25,$pdf->GetY()+8," في الدرجات لسنة ".$resulta['ANNEEPV']." "."الخاصة برتبة"." ".$GRADE.".");
		break;
		}				
case '11' ://idmage
		{
		$pdf->Text(5,$pdf->GetY()+8," بموجب :المحضر رقم ".$resulta['NPV']." المؤرخ في  ".$resulta['DATEPV']."  المتضمن المصادقة على جدول الترقية ");
		$pdf->Text(25,$pdf->GetY()+8," في الدرجات لسنة "." ".$resulta['ANNEEPV']." "."الخاصة برتبة"." ".$GRADE.".");
		break;
		}				
case '12' ://idmage
		{
		$pdf->Text(5,$pdf->GetY()+8," بموجب :المحضر رقم ".$resulta['NPV']." المؤرخ في  ".$resulta['DATEPV']."المتضمن المصادقة على جدول الترقية ");
		$pdf->Text(15,$pdf->GetY()+8," في الدرجات لسنة "." ".$resulta['ANNEEPV']." "."الخاصة برتبة"." ".$GRADE.".");
		break;
		}	
case '13' ://idmage
		{
		$pdf->Text(5,$pdf->GetY()+8," بموجب :المحضر رقم ".$resulta['NPV']." المؤرخ في  ".$resulta['DATEPV']."  المتضمن المصادقة على جدول الترقية ");
		$pdf->Text(25,$pdf->GetY()+8," في الدرجات لسنة "." ".$resulta['ANNEEPV']." "."الخاصة برتبة"." ".$GRADE.".");
		break;
		}	
}
$pdf->decision_drh($y);
$A4 = $resulta['ANNEEPV']-substr($resulta["DATEDEFFET"],0,4);
$M4 = 12-substr($resulta["DATEDEFFET"],5,2);
$J4 = 31-substr($resulta["DATEDEFFET"],8,2);
$pdf->Text(5,$pdf->GetY()+10,"المادة الأولى : (ت) يرقى  السيد (ة) : ");$pdf->SetTextColor(225,0,0);$pdf->Text(65,$pdf->GetY(),$result["Nomarab"]." ".$result["Prenom_Arabe"]);$pdf->SetTextColor(0,0,0);
$pdf->Text(35,$pdf->GetY()+10,"الرتبة : ");                           
if($result["rnvgradear"]==1 or $result["rnvgradear"]==3 )
{
	$pdf->SetTextColor(225,0,0);$pdf->Text(48,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear")." في ".$pdf->nbrtostring("grh","specialite","idspecialite",$result["FILIERE"],"specialitear"));$pdf->SetTextColor(0,0,0);
}
else
{
	$pdf->SetTextColor(225,0,0);$pdf->Text(48,$pdf->GetY(),$pdf->nbrtostring("grh","grade","idg",$result["rnvgradear"],"gradear"));$pdf->SetTextColor(0,0,0);
}
$pdf->SetFont('aefurat','I', 14);$pdf->SetTextColor(225,0,0);$pdf->SetTextColor(0,0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(25,8,'المدة',1,0,'C');$pdf->Cell(21,8,'الصنف',1,0,'C');$pdf->Cell(16,8,'الدرجة',1,0,'C');$pdf->Cell(40,8,'الرقم الاستدلالى',1,0,'C');$pdf->Cell(30,8,'تاريخ النفاذ',1,0,'C');$pdf->Cell(68,8,'الاقدمية المتبقية'.'  '.$resulta['ANNEEPV'].'/12/31',1,1,'C');
$pdf->SetXY(5,$pdf->GetY());if($resulta['DUREE']==1){$pdf->Cell(25,8,"الدنيا",1,0,'C');}elseif($resulta['DUREE']==2){$pdf->Cell(25,8,"المتوسطة",1,0,'C');}elseif($resulta['DUREE']==3){$pdf->Cell(25,8,"الطويلة",1,0,'C');}
if($resulta["CATEGORIE"]=="hc1")    {$pdf->Cell(21,8,"ق . ف . 1",1,0,'C');}
elseif($resulta["CATEGORIE"]=="hc2"){$pdf->Cell(21,8,"ق . ف . 2",1,0,'C');}
elseif($resulta["CATEGORIE"]=="hc3"){$pdf->Cell(21,8,"ق . ف . 3",1,0,'C');}
elseif($resulta["CATEGORIE"]=="hc4"){$pdf->Cell(21,8,"ق . ف . 4",1,0,'C');}
elseif($resulta["CATEGORIE"]=="hc5"){$pdf->Cell(21,8,"ق . ف . 5",1,0,'C');}
elseif($resulta["CATEGORIE"]=="hc6"){$pdf->Cell(21,8,"ق . ف . 6",1,0,'C');}
elseif($resulta["CATEGORIE"]=="hc7"){$pdf->Cell(21,8,"ق . ف . 7",1,0,'C');}
else {$pdf->Cell(21,8,$resulta["CATEGORIE"],1,0,'C');}
$pdf->Cell(16,8,$resulta["ECHELON"],1,0,'C');
$pdf->Cell(40,8,$resulta["INDICE"],1,0,'C');
$pdf->Cell(30,8,$resulta["DATEDEFFET"],1,0,'C');
$pdf->Cell(22.66,8,$A4." سنة ",1,0,'C');
$pdf->Cell(22.66,8,$M4." شهر ",1,0,'C');
$pdf->Cell(22.66,8,$J4." يوم ",1,1,'C');
$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+4,"المادة الثانية : تكلف السيدة المديرة الفرعية للموارد البشرية و أمين خزينة المؤسسة العمومية ");
$pdf->Text(25,$pdf->GetY()+8," الإستشفائية بعين وسارة بتنفيذ هذا المقرر.");
$pdf->Text(140,$pdf->GetY()+8," عين وسارة في : ".$resulta["DATEDECISION"]);
$pdf->Text(150,$pdf->GetY()+8," المدير");
$pdf->Output('trav_ar.pdf','I');
?>
