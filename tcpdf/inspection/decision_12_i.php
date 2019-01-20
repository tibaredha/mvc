<?php
$id=$_GET["uc"]; 
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
$query_listex = "SELECT * FROM structure WHERE id  ='$id' ";//
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$num=$rowx->NREALISATION;$date=$rowx->REALISATION;
$num1=$rowx->NOUVERTURE;$date1=$rowx->OUVERTURE;
$nomar=$rowx->NOMAR;$prenomar=$rowx->PRENOMAR;
$adresse=$rowx->ADRESSEAR;$commune=$pdf->nbrtostring('mvc','comar','IDCOM',$rowx->COMMUNE,'communear');$wilaya=$rowx->WILAYA;
}
$y=3;
$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->repar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->wilayaar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->dsparp,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->dssar,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'رقم : '.'_____'.' /م. ص. س / '.substr($pdf->dateUS2FR($_POST["DATEDEC"]),0,4),0,1,'R');$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'مقــــرر تنصيب صيدلـــــية',0,1,'C');$pdf->SetFont('aefurat', '', 16);
$pdf->SetXY(100,$pdf->GetY()+$y);$pdf->Cell(100,5,$pdf->ledspar,0,1,'C');$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->loi85_05,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->decret92_276,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->decret97_261,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->arrete52_95,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->arrete58_95,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->arrete67_96,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->arrete110_96,0,1,'R');$pdf->SetFont('aefurat', '', 12.5);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->cm03_05,0,1,'R');$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->diplome.$pdf->dateUS2FR($_POST["DATED"]).' الصادرة عن جامعة '.$_POST["UNIV"].' تخص السيد (ة) '.$nomar.' '.$prenomar.'',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->ordre.$_POST["NUMORDER"].' بتاريخ '.$pdf->dateUS2FR($_POST["DATEO"]).' للمعنى (ة)  ',0,1,'R');
/*************************************************************************************************************************/
$pdf->SetXY(5,$pdf->GetY()+$y+1);$pdf->Cell(200,5,$pdf->proposition,0,1,'C');$pdf->SetFont('aefurat', 'U', 16);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'يقــــــــــرر ',0,1,'C');$pdf->SetFont('aefurat', '', 13);
/*************************************************************************************************************************/
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->article1.$nomar.' '.$prenomar.' صيدلي (ة) '.' بتنصيب  صيدليته (ها) الكائن مقرها ',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,' ب '.$adresse.' بلدية '.$commune.' ولاية الجلفة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->article2bis,0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->article3,0,1,'R');$pdf->SetFont('aefurat', '', 12.5);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->article4,0,1,'R');$pdf->SetFont('aefurat', 'B', 14);
$pdf->SetXY(5,$pdf->GetY()+$y+1);$pdf->Cell(100,5,'الجلفة في : '.$pdf->dateUS2FR($_POST["DATEDEC"]),0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(100,5,'مدير الصحة و السكان ',0,1,'C');
$pdf->Output();
?>
