<?php
$id=$_GET["uc"]; 
require_once('inspection.php');
$pdf = new inspection();
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
$pdf->SetLineWidth(0.4);$pdf->setRTL(false);
$pdf-> mysqlconnect(); 
$query_listex = "SELECT * FROM structure WHERE id  ='$id' ";//
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$y=3;
$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->repar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->mspar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$y=10;$pdf->SetFont('aefurat', '', 16);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'Fiche de renseignements',0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Nom : ".$rowx->NOM,0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Prénom : ".$rowx->PRENOM,0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Sexe :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Fils de :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Et De :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"NEC :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Date De Naissance : ",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Commune  :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Wilaya :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Commune  : ".$pdf->nbrtostring('mvc','comar','IDCOM',$rowx->COMMUNE,'COMMUNE'),0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"wilaya  :".$rowx->WILAYA,0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Adresse  : ".$rowx->ADRESSE,0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Tel   Fixe  :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Tel Portable  :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"E-mail  :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Situation familial  :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"NBR enfant   :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Situation vis-à-vis le Service national   :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Diplôme :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Date Obtention  :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Spécialité :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Numéro  d'inscription au tableau de l'ordre   :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y+5);$pdf->Cell(50,5,"Bail de location ou acte de propriété",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Propriétaire :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Début contrat :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Fin contrat :",0,0,'L');

}
//
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->dsparp,0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->dssar,0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'رقم : '.'_____'.' /م. ص. س / '.substr($pdf->dateUS2FR($_POST["DATEDEC"]),0,4),0,1,'R');$pdf->SetFont('aefurat', '', 16);
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'مقــــرر تحويل صيدلــــــية',0,1,'C');$pdf->SetFont('aefurat', '', 16);
// $pdf->SetXY(100,$pdf->GetY()+$y);$pdf->Cell(100,5,$pdf->ledspar,0,1,'C');$pdf->SetFont('aefurat', '', 13);
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->loi85_05,0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->decret97_261,0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->arrete52_95,0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->arrete58_95,0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->arrete67_96,0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->arrete110_96,0,1,'R');$pdf->SetFont('aefurat', '', 12.5);
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->cm03_05,0,1,'R');$pdf->SetFont('aefurat', '', 13);
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->diplome.$pdf->dateUS2FR($_POST["DATED"]).' الصادرة عن جامعة '.$_POST["UNIV"].' تخص السيد (ة) '.$nomar.' '.$prenomar.'',0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->ordre.$_POST["NUMORDER"].' بتاريخ '.$pdf->dateUS2FR($_POST["DATEO"]).' للمعنى (ة)  ',0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'- بناء على مقرر الفتح رفم  '.$_POST["NUMOUVERTURE"].' المؤرخ ب  '.$pdf->dateUS2FR($_POST["DATEOUV"]).' الصادر عن م. ص. س  بالجلفة '.''.' تخص السيد (ة) '.$nomar.' '.$prenomar.'',0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'- بناء على طلب السيد (ة) '.$nomar.' '.$prenomar.' صيدلي (ة)  بتاريخ '.$pdf->dateUS2FR($_POST["DATEDEM"]).' المتعلق بتحويل صيدليته (ها)  الى  بلدية '.$commune,0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->pvconformite.$pdf->dateUS2FR($_POST["DATECONF"]),0,1,'R');$pdf->SetFont('aefurat', 'B', 16);
// /*************************************************************************************************************************/
// $pdf->SetXY(5,$pdf->GetY()+$y+1);$pdf->Cell(200,5,$pdf->proposition,0,1,'C');$pdf->SetFont('aefurat', 'U', 16);
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'يقــــــــــرر ',0,1,'C');$pdf->SetFont('aefurat', '', 13);
// /*************************************************************************************************************************/
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->article1.$nomar.' '.$prenomar.' صيدلي (ة) '.' بتحويل   صيدليته (ها)  الى العنوان التالي  ',0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,' ب '.$adresse.' بلدية '.$commune.' ولاية الجلفة',0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->article2,0,1,'R');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->article3,0,1,'R');$pdf->SetFont('aefurat', '', 12.5);
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->article4,0,1,'R');$pdf->SetFont('aefurat', 'B', 14);
// $pdf->SetXY(5,$pdf->GetY()+$y+1);$pdf->Cell(100,5,'الجلفة في : '.$pdf->dateUS2FR($_POST["DATEDEC"]),0,1,'C');
// $pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(100,5,'مدير الصحة و السكان ',0,1,'C');
$pdf->Output();
?>
