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
$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'الجمـهوريـــة الجزائرية الديمقراطية الشعبية',0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'وزارة الصحة و السكان وإصلاح المستشفيات',0,1,'C');
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'ولايــــــــة الجلفـــــــــة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'مـديريــــــة الصحة و السكان',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'مصلحة الهياكل و النشاط الصحي',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'رقم : ............./م. ص. س/ '.date("Y"),0,1,'R');
$pdf->SetFont('aefurat', '', 16);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'مقررة تتضمن انجاز وحدة للنقل الصحي ',0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'',0,1,'C');
$pdf->SetXY(100,$pdf->GetY());$pdf->Cell(100,5,'إن مدير الصحة و السكان لولاية الجلفة ',0,1,'C');
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'- بمقتضى القانون 18-11 المؤرخ في 02 يوليو 2018 المتعلق بالصحة ',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بمقتضى القرار رقم 39  و. ص. س المؤرخ في 1998/09/15 الخاص بتنظيم النقل الصحي .',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بمقتضى المنشور رقم 03 و. ص. س المؤرخ في 1999/12/25 المتضمن الإجراءات المتعلقة بتسليم مقررات الإنجاز و الفتح ',0,1,'R');
$pdf->SetXY(4,$pdf->GetY());$pdf->Cell(200,5,'لمؤسسات النقل الصحي .',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بمقتضى المذكرة المؤرخة في 2006/06/21 المتعلقة بملف إنجاز وحدة النقل الصحي .',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بمقتضى المذكرة رقم 01 المؤرخة في 2006/09/05 المتعلقة بمحضر المطابقة للنقل الصحي .',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بمقتضى المذكرة رقم 01 و. ص. س المؤرخة في 2008/06/18 المتعلقة بالمقاييس التقنية لسيارات الإسعاف صنف ب . ',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بمقتضى المذكرة رقم 06 و. ص. س المؤرخة في 2013/08/05 المتعلقة بإجراءات تسليم مقررات إنجاز و فتح مؤسسات النقل الصحي .',0,1,'R');
$pdf-> mysqlconnect(); 
$query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";//
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$num=$rowx->NOUVERTURE;
$date=$rowx->OUVERTURE;
$nomar=$rowx->NOMAR;
$prenomar=$rowx->PRENOMAR;
$nomfr=$rowx->NOM;
$prenomfr=$rowx->PRENOM;
$adresse=$rowx->ADRESSEAR;
$commune=$pdf->nbrtostring('mvc','comar','IDCOM',$rowx->COMMUNE,'communear');
$wilaya=$rowx->WILAYA;
}

$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowy=mysql_fetch_object($requetey))
{	
$NAT=$rowy->NAT;
$STL=$rowy->STL;
$DATEP=$rowy->DATEP;
$CDS0=$rowy->CDS0;
$SDS0=$rowy->SDS0;
$SAH0=$rowy->SAH0;
$NUMD=$rowy->NUMD;
$DATED=$rowy->DATED;
}
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بناءا على الطلب الخاص بالسيد(ة) : '.$nomar.' '.$prenomar.' المؤرخ في '.$DATED.' المتضمن انجاز وحدة للنقل الصحي',0,1,'R');//$num.
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- و بعد الإطلاع على ملف وحدة النقل الصحي للسيد(ة) : '.$nomar.' '.$prenomar,0,1,'R');
/*************************************************************************************************************************/
$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'بإقتراح من السيد رئيس مصلحة الهياكل و النشاط الصحي  ',0,1,'C');
$pdf->SetFont('aefurat', 'U', 16);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'يقــــــــــرر ',0,1,'C');
/*************************************************************************************************************************/
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'المادة الأولى : يرخص للسيد (ة) '.$nomar.' '.$prenomar." بانجاز وحدة للنقل الصحي " ,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,' الكائن مقرها ب'.$adresse.' بلدية '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->SetLineWidth(0.4);
$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'المادة 02 : هذه المقررة لاتسمح لحاملها باستغلال مؤسسة النقل الصحي الا بعد حصوله على رخصة الفتح',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"المادة 03 : مدة صلاحية هذه المقررة لا تتجاوز (01) سنة ابتداء من تاريخ إمضائها",0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'المادة 04 : يكلف كل من السادة مدير المؤسسة العمومية للصحة الجوارية '.' و مدير صندوق الضمان الإجتماعي بتنفيذ هذه المقررة .',0,1,'R');
$pdf->SetFont('aefurat', 'B', 14);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(100,5,'الجلفة في : ..............',0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(100,5,'مدير الصحة و السكان ',0,1,'C');
$pdf->Output($nomfr.'_'.$prenomfr.'.pdf','I');
?>
