<?php
$ids=$_GET["ids"]; 
$idh=$_GET["idh"];  
require_once('inspection.php');
$pdf = new inspection('P', 'mm', 'A4', true, 'UTF-8', false);
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
$pdf->AddPage();
$pdf->SetLineWidth(0.4);
$pdf-> mysqlconnect(); 
$query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );//
while($rowx=mysql_fetch_object($requetex))
{
$num=$rowx->NREALISATION;
$date=$rowx->REALISATION;
$num1=$rowx->NOUVERTURE;
$date1=$rowx->OUVERTURE;
$nomar=$rowx->NOMAR;
$prenomar=$rowx->PRENOMAR;
$nom=$rowx->NOM;
$prenom=$rowx->PRENOM;
$nomfr=$rowx->NOM;
$prenomfr=$rowx->PRENOM;
$adresse=$rowx->ADRESSEAR;
$commune=$pdf->nbrtostring('mvc','comar','IDCOM',$rowx->COMMUNE,'communear');
$wilaya=$rowx->WILAYA;
$DIPLOME=$rowx->DIPLOME;
$UNIV=$rowx->UNIV;
$NUMORDER=$rowx->NUMORDER;
$DATEORDER=$rowx->DATEORDER;
$NUMDEM=$rowx->NUMDEM;
$DATEDEM=$rowx->DATEDEM;
$SPECIALITE=$rowx->SPECIALITEX;
$DATEDSC= $rowx->DATEDSC;
$SERVICECIVILE= $rowx->SERVICECIVILE;
}

$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );//
while($rowy=mysql_fetch_object($requetey))
{
$NUMD=$rowy->NUMD;
$DATED=$rowy->DATED;
$DATEP=$rowy->DATEP;

$NUMCOM=$rowy->NUMCOM;
$DATECOM=$rowy->DATECOM;
}
//*************************************************************************************************************************//
$pdf->entetedecisions("بتحويل عيادة طبية متخصصة ",$DATEP);
//*************************************************************************************************************************//
if($SPECIALITE==55){	
//$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$SPECIALITE,0,1,'R');		
}

$y=3;
//$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->ledspar,0,1,'R');
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->loi18_11,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->loi12_07,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->decret92_276,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->decret97_261,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->instruction10_2018,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->instruction04_2013,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->avisfavorable,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->servicecivile,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->diplome161.$DIPLOME.' الصادرة عن جامعة '.$UNIV,0,1,'R');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->ordre16.$NUMORDER.' بتاريخ '.$DATEORDER.' للمعنى (ة)  ',0,1,'R');
//$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بناء على مقرر الاستقالة رقم '.$NUMDEM.' المؤرخ في '.$DATEDEM.' الصادر عن المؤسسة العمومية '.' للصحة الجوارية ',0,1,'R');
//$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'  تخص السيد (ة) '.$nomar.' '.$prenomar.' طبيب عام .',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بناء على طلب السيد (ة) '.$nomar.' '.$prenomar.' طبيب اخصائي بتاريخ '.$DATED.' المتعلق بتحويل عيادة طبية متخصصة',0,1,'R');$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'  إلى '.$adresse.'  ببلدية  '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بناء علي محضر المطابقة الخاص بالعيادة المؤرخ في '.$DATEP,0,1,'R');$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetXY(5,$pdf->GetY()+$y+1);$pdf->Cell(200,5,$pdf->proposition,0,1,'C');$pdf->SetFont('aefurat', 'U', 16);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'يقــــــــــرر ',0,1,'C');$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->article1.$nomar.' '.$prenomar.' طبيب اخصائي '.' بتحويل عيادته (ها) الطبية المتخصصة الكائن مقرها ',0,1,'R');
$pdf->SetXY(0,$pdf->GetY());$pdf->Cell(200,5,'           بـ : '.$adresse.' بلدية '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->article2m,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->article3,0,1,'R');$pdf->SetFont('aefurat', '', 12.5);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->article4,0,1,'R');$pdf->SetFont('aefurat', 'B', 14);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(100,5,'الجلفة في : '.$DATEP,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(100,5,'مدير الصحة و السكان ',0,1,'C');


// $pdf->SetFont('aefurat', 'B', 16);
// $pdf->SetFont('aefurat', '', 16);
// 
// 



// 
// 
// 
// $pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"- بمقتضى التعليمة الوزارية رقم 112 المؤرخة في 1987/03/02 المتعلقة بأحكام تنصيب الممارسين الطبيين العامين و المتخصصين",0,1,'R');
// $pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"- بمقتضى التعليمة الوزارية رقم 06 المؤرخة في 1998/06/28 المتعلقة بتشغيل الشبه الطبيين في الهياكل الصحية الخاصة",0,1,'R');
// $pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"- بمقتضى التعليمة الوزارية رقم 01 المؤرخة في 1999/01/20 المتعلقة بالممارسة في القطاع الخاص لمهنيي الصحة ",0,1,'R');

// 
/*************************************************************************************************************************/

/*************************************************************************************************************************/
// 

$pdf->Output();




// L’instruction n°117/MSP/CAB du 11 avril 1987,  pour les auxiliaires médicaux.
 

// InstructionN°00112/MSP/SG du 02 mars 1987 relative aux modalités d’installation des Médecins, Pharmaciens, Chirurgiens Dentistes,Généralistes et Spécialistes (modifiée et complétée)


?>






















