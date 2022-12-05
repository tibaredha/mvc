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
$pdf->entetedecisions("بغلق عيادة طبية متخصصة",$DATEP,$SPECIALITE);
//*************************************************************************************************************************//
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->loi18_11,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->loi12_07,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->decret92_276,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->decret97_261,0,1,'R');
$pdf->SetFont('aefurat', '', 11.5);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->instruction61_12_4_2021,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->instruction61_12_4_2021_bis,0,1,'R');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->diplome161.$DIPLOME.' الصادرة عن جامعة '.$UNIV,0,1,'R');$pdf->SetFont('aefurat', '', 11.5);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->ordre16.$NUMORDER.' بتاريخ '.$DATEORDER.' للمعنى (ة)  ',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->servicecivile." المؤسسة ".$SERVICECIVILE." المؤرخة في ".$DATEDSC,0,1,'R');$pdf->SetFont('aefurat', '', 12);
$pdf->decision_o($num1,$date1,"متخصصة ",$nomar,$prenomar);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'- بناء على طلب السيد (ة) '.$nomar.' '.$prenomar.' طبيب اخصائي بتاريخ '.$DATED.' المتعلق بغلق عيادة طبية متخصصة',0,1,'R');$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,'  بـ '.$adresse.'  ببلدية  '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->avisfavorable,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5," في القطاع الخاص ".""." المؤرخ في ".$DATECOM,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+3);$pdf->Cell(200,5,$pdf->proposition,0,1,'C');$pdf->SetFont('aefurat', 'U', 16);
$pdf->SetXY(5,$pdf->GetY()+3);$pdf->Cell(200,5,'يقــــــــــرر ',0,1,'C');$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(5,$pdf->GetY()+3);$pdf->Cell(200,5,$pdf->article1.$nomar.' '.$prenomar.' طبيب اخصائ في '.$pdf->nbrtostring('mvc','specialite','idspecialite',$SPECIALITE,'specialitear') ,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,' بغلق عيادته (ها) الطبية المتخصصة الكائن مقرها ' .' ب '.$adresse.' بلدية '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->date_effet($pdf->article_2);$pdf->SetFont('aefurat', '', 12.5);
$pdf->execution($pdf->article_3);$pdf->SetFont('aefurat', 'B', 14);
$pdf->ctdecision($nomfr,$prenomfr,$DATEP);
$pdf->Output($nomfr.'_'.$prenomfr.'.pdf','I');
?>