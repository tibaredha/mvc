<?php
$ids=$_GET["ids"]; 
$id=$_GET["id"];  
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
$pdf->setFooterMargin($fm=1);
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

$adresse=$rowx->ADRESSEAR;
$commune=$pdf->nbrtostring('mvc','comar','IDCOM',$rowx->COMMUNE,'communear');
$wilaya=$rowx->WILAYA;


$NREALISATION=$rowx->NREALISATION;
$REALISATION=$rowx->REALISATION;
$NOUVERTURE=$rowx->NOUVERTURE;
$OUVERTURE=$rowx->OUVERTURE;

}

// $query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );//
// while($rowy=mysql_fetch_object($requetey))
// {
// $NUMD=$rowy->NUMD;
// $DATED=$rowy->DATED;
// $DATEP=$rowy->DATEP;
// }


$y=3;
$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->wilayaar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dsparp,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dssar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'رقم : '.'_____'.' / م. ص. س / '.date('Y'),0,1,'R');$pdf->SetFont('aefurat', 'B', 16);

$query_listep = "SELECT * FROM pers WHERE id ='$id' and  ETAT='0'  ";//and Categorie='TDM'
$requetep = mysql_query( $query_listep ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$pdf->SetXY(25,$pdf->GetY());/// un contrat établi avec une société de maintenance
while($rowp=mysql_fetch_object($requetep))
{
	
	$pdf->SetXY(5,$pdf->GetY()+7);$pdf->Cell(200,5,'مقرر رقم : '.'________'.'/ م. ص. س /'.' المؤرخ في : '.'_________________',0,1,'C');$pdf->SetFont('aefurat', '', 16);

	$etablissement0=' المؤسسة الإستشفائية الخاصة';
	$etablissement='لدى'.$etablissement0;
	$travail='المتضمن الترخيص بعمل ';
	
	$pdf->SetXY(5,$pdf->GetY()+$y);
	if ($rowp->Categorie=='MS'){$pdf->Cell(200,5,$travail.'طبيب أخصائي '.$etablissement,0,1,'C');}
	if ($rowp->Categorie=='MG'){$pdf->Cell(200,5,$travail.'طبيب عام '.$etablissement,0,1,'C');}
	if ($rowp->Categorie=='P'){$pdf->Cell(200,5,$travail.'عون شبه طبي '.$etablissement,0,1,'C');}
	if ($rowp->Categorie=='TDM'){$pdf->Cell(200,5,$travail.'تقني في الصيانة '.$etablissement,0,1,'C');}
	if ($rowp->Categorie=='ADH'){$pdf->Cell(200,5,$travail.'عون نظافة '.$etablissement,0,1,'C');}
	if ($rowp->Categorie=='ADS'){$pdf->Cell(200,5,$travail.'عون أمن '.$etablissement,0,1,'C');}
	if ($rowp->Categorie=='C'){$pdf->Cell(200,5,$travail.'سائق مركبة '.$etablissement,0,1,'C');}
	
	$etax="( العيادة الطبية الجراحية";
	
	
	$eta1=$etax." نايل )";
	$eta2=$etax." المروج)";
	$eta3=$etax." نائلة )";
	
	if (trim($nom) =='LAHRECH'){$clinique=$eta1;}
	if (trim($nom) =='KHALDI'){$clinique=$eta2;}
	if (trim($nom) =='BAFA'){$clinique=$eta3;}
	$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$clinique,0,1,'C');
	
	
	$pdf->SetFont('aefurat', '', 16);	
	
	$pdf->SetXY(100,$pdf->GetY()+$y+10);$pdf->Cell(100,5,$pdf->ledspar,0,1,'C');$pdf->SetFont('aefurat', '', 13);
	$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->loi18_11,0,1,'R');
	if ($rowp->Categorie =='MS' || $rowp->Categorie =='MG'   ) {$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->decret92_276,0,1,'R');}
	
	$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->decret97_261,0,1,'R');
    $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,"- بمقتضى المرسوم التنفيذي رقم 204-88 المؤرخ في 1988/10/18 المحدد لشروط إنجاز فتح وتسيرالعيادات الخاصة ",0,1,'R');
	$pdf->SetXY(0,$pdf->GetY()+$y);$pdf->Cell(200,5," المعدل و المتمم بالمرسوم رقم 380-92 المؤرخ في 1992/10/13 .",0,1,'R');
	
	$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,"- بمقتضى تعليمة وزارة الصحة  رقم 01 المؤرخة في 1999/01/20 المتعلقة بالممارسة الحرة لمهن الصحة ",0,1,'R');

	if ($rowp->Categorie=='P') {$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,"- بمقتضى تعليمة وزارة الصحة  رقم 06 المؤرخة في 1998/06/28 المتعلقة بتشغيل الشبه طبيين في الهياكل الصحية الخاصة",0,1,'R');}
	
	
	$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,"- بناء على المقرر رقم ".$NREALISATION." / و ص س / "."المؤرخ في ".$REALISATION." المتضمن الترخيص بإنجاز ".$clinique,0,1,'R');
	$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,"- بناء على المقرر رقم ".$NOUVERTURE." / و ص س / "."المؤرخ في ".$OUVERTURE." المتضمن الترخيص بفتح ".$clinique,0,1,'R');

	$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,"- بناء على ملف التوظيف المودع من طرف ".$etablissement0." للسيد(ة) : ".$rowp->PRENOMAR.' '.$rowp->NOMAR,0,1,'R');
	
	if ($rowp->Categorie=='MS'){$pdf->SetXY(0,$pdf->GetY()+$y);$pdf->Cell(200,5,"أخصائي في : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowp->SPECIALITE,'specialitear'),0,1,'R');}	
	else {$pdf->SetXY(0,$pdf->GetY()+$y);$pdf->Cell(200,5,"",0,1,'R');}
	
	$pdf->SetFont('aefurat', '', 16);
    
	
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'باقتراح من السيد رئيس مصلحة الهياكل و النشاط الصحي ',0,1,'C');
	$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'يقــــــــــرر ',0,1,'C');$pdf->SetFont('aefurat', '', 13);
	$pdf->SetXY(5,$pdf->GetY()+$y);
	if ($rowp->Categorie=='MS'){$pdf->Cell(200,5,$pdf->article1.$rowp->PRENOMAR.' '.$rowp->NOMAR.' طبيب أخصائي '.' بالعمل '.$etablissement ,0,1,'R');}
	if ($rowp->Categorie=='MG'){$pdf->Cell(200,5,$pdf->article1.$rowp->PRENOMAR.' '.$rowp->NOMAR.' طبيب عام '.' بالعمل '.$etablissement ,0,1,'R');}
	if ($rowp->Categorie=='P'){$pdf->Cell(200,5,$pdf->article1.$rowp->PRENOMAR.' '.$rowp->NOMAR.' عون شبه طبي '.' بالعمل '.$etablissement ,0,1,'R');}
	if ($rowp->Categorie=='TDM'){$pdf->Cell(200,5,$pdf->article1.$rowp->PRENOMAR.' '.$rowp->NOMAR.'***  '.' بالعمل '.$etablissement ,0,1,'R');}
	if ($rowp->Categorie=='ADH'){$pdf->Cell(200,5,$pdf->article1.$rowp->PRENOMAR.' '.$rowp->NOMAR.'***  '.' بالعمل '.$etablissement ,0,1,'R');}
    if ($rowp->Categorie=='ADS'){$pdf->Cell(200,5,$pdf->article1.$rowp->PRENOMAR.' '.$rowp->NOMAR.'***  '.' بالعمل '.$etablissement ,0,1,'R');}
    $pdf->SetXY(0,$pdf->GetY()+$y);$pdf->Cell(200,5,$clinique." الكائن مقرها ب : ".$adresse.' بلدية '.$commune.' ولاية الجلفة ',0,1,'R');
	$pdf->SetXY(0,$pdf->GetY()+$y);$pdf->Cell(200,5,' إبتداء من '.$rowp->DEBUTCONTRAT." إلى غاية ".$rowp->FINCONTRAT,0,1,'R');
	$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'المادة 02 :  يكلف كل من السادة المدير التقني . مدير المؤسسة العمومية للصحة الجوارية . ',0,1,'R');
	$pdf->SetXY(0,$pdf->GetY()+$y);$pdf->Cell(200,5,'مدير صندوق الضمان الاجتماعي بتنفيذ هذا المقرر',0,1,'R');
	
	$pdf->SetFont('aefurat', 'B', 14);
	$pdf->setRTL(true); 
	// $pdf->SetXY(5,$pdf->GetY()+$y+10);$pdf->Cell(100,5,"نسخة مرسلة الى :",0,0,'R');
	$pdf->SetXY(130,$pdf->GetY());$pdf->Cell(50,5,'مدير الصحة و السكان ',0,0,'C');
	// $pdf->SetXY(5,$pdf->GetY()+$y+5);$pdf->Cell(100,5,"*".$etablissement0,0,0,'R'); 
	// $pdf->SetXY(5,$pdf->GetY()+$y+5);$pdf->Cell(100,5,"* الصندوق الوطني للضمان الاجتماعي",0,0,'R');    
	// $pdf->SetXY(5,$pdf->GetY()+$y+5);$pdf->Cell(100,5,"* المعني بالامر",0,0,'R');
	// $pdf->SetXY(5,$pdf->GetY()+$y+5);$pdf->Cell(100,5,"* الارشيف",0,0,'R');
}
$pdf->Output("Autorisation.pdf","I");
?>
