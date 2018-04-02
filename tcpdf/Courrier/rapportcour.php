<?php
 require_once('inspection.php');
$pdf = new inspection('l', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('courrier');
$pdf->SetSubject('courrier');
$pdf->SetFillColor(152, 251, 152);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 18);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->AddPage();

$pdf->SetLineWidth(0.4);
$dfr1=$_POST["jour"].'-'.$_POST["mois"].'-'.$_POST["annee"];// 
$dfr2=$_POST["jour1"].'-'.$_POST["mois1"].'-'.$_POST["annee1"];//$pdf->dateUS2FR() 
$dus1=$pdf->dateUS2FR($dfr1) ;
$dus2=$pdf->dateUS2FR($dfr2);
$SERVICE=$_POST["SERVICE"];
$pdf->Rect(5, 5, 290, 200 ,'D');$pdf->Rect(5-1, 5-1, 290+2, 200+2 ,'D');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(290,5,$pdf->repar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(290,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(290,5,$pdf->mspar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(290,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(290,5,$pdf->dspar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(290,5,$pdf->dspfr,0,1,'C');
// $pdf->Footer();

$pdf->SetFont('aefurat', 'B', 22);

if ($_POST["type"]==1)//ar 
{
    $pdf->Image('ar.jpg', $x=133, $y=$pdf->GetY()+12, $w=30, $h=30, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
    $pdf->SetXY(5,$pdf->GetY()+55);$pdf->Cell(290,5,'Enregistrement',0,1,'C');
    $pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(290,5,'Courrier',0,1,'C');
	$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(290,5,'Arrivée',0,1,'C');
}
if ($_POST["type"]==2)//dep 
{
    $pdf->Image('dep.jpg', $x=133, $y=$pdf->GetY()+12, $w=30, $h=30, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
    $pdf->SetXY(5,$pdf->GetY()+55);$pdf->Cell(290,5,'Enregistrement',0,1,'C');
    $pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(290,5,'Courrier',0,1,'C');
	$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(290,5,'Depart',0,1,'C');
}
if ($_POST["type"]==3)//dep 
{
    $pdf->Image('arc.jpg', $x=133, $y=$pdf->GetY()+12, $w=30, $h=30, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
    $pdf->SetXY(5,$pdf->GetY()+55);$pdf->Cell(290,5,'Enregistrement',0,1,'C');
    $pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(290,5,'Courrier',0,1,'C');
	$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(290,5,'Archive',0,1,'C');
}
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(290,5,'Du '.$dfr1.' Au '.$dfr2,1,1,'C',1,0);
$pdf->SetFont('aefurat', 'B', 16);


$pdf->AddPage();
$pdf->SetLineWidth(0);
$pdf-> mysqlconnect(); 
if ($_POST["type"]==1)//ar 
{
if ($SERVICE==0) {$query_listey = "SELECT * FROM courar WHERE (DATEAR BETWEEN '$dus1' AND '$dus2') ";$serv='DSP'; } //
if ($SERVICE==1) {$query_listey = "SELECT * FROM courar WHERE (DATEAR BETWEEN '$dus1' AND '$dus2') and DSP=1 ";$serv='DIR'; } 
if ($SERVICE==2) {$query_listey = "SELECT * FROM courar WHERE (DATEAR BETWEEN '$dus1' AND '$dus2') and INSP=1 ";$serv='INSP'; } 
if ($SERVICE==3) {$query_listey = "SELECT * FROM courar WHERE (DATEAR BETWEEN '$dus1' AND '$dus2') and SAS=1 ";$serv='SAS'; } 
if ($SERVICE==4) {$query_listey = "SELECT * FROM courar WHERE (DATEAR BETWEEN '$dus1' AND '$dus2') and PRV=1 ";$serv='PRV'; } 
if ($SERVICE==5) {$query_listey = "SELECT * FROM courar WHERE (DATEAR BETWEEN '$dus1' AND '$dus2') and DRH=1 ";$serv='DRH'; } 
if ($SERVICE==6) {$query_listey = "SELECT * FROM courar WHERE (DATEAR BETWEEN '$dus1' AND '$dus2') and PLF=1 ";$serv='PLF'; } 
$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$totalmbry=mysql_num_rows($requetey);
$pdf->SetXY(5,$pdf->GetY()-5);$pdf->Cell(150,10,'Arrivée : Total Courrier '.$totalmbry.' Service '.$serv,1,1,'L',1);$pdf->SetXY(105+50,$pdf->GetY()-10);$pdf->Cell(140,10,'الـــــوارد',1,1,'R',1);
$pdf->SetFont('aefurat', 'B', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(30,10,'تــاريخ',1,1,'C',1);
$pdf->SetXY(35,$pdf->GetY()-10);$pdf->Cell(30,10,'تــاريخ',1,1,'C',1);
$pdf->SetXY(65,$pdf->GetY()-10);$pdf->Cell(90,10,'البــــاعث',1,1,'C',1);
$pdf->SetXY(155,$pdf->GetY()-10);$pdf->Cell(110,10,'الموضوع',1,1,'C',1);
$pdf->SetXY(265,$pdf->GetY()-10);$pdf->Cell(30,10,'تــاريخ',1,1,'C',1);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(30,10,'الوصول',1,1,'C',1);
$pdf->SetXY(35,$pdf->GetY()-10);$pdf->Cell(30,10,'ورقم الرسالة',1,1,'C',1);
$pdf->SetXY(65,$pdf->GetY()-10);$pdf->Cell(90,10,'',1,1,'C',1);
$pdf->SetXY(155,$pdf->GetY()-10);$pdf->Cell(110,10,'',1,1,'C',1);
$pdf->SetXY(265,$pdf->GetY()-10);$pdf->Cell(30,10,'و رقم الاجابة',1,1,'C',1);
$pdf->SetFont('aefurat', 'B', 9);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(30,10,'DATE',1,1,'C',1);
$pdf->SetXY(35,$pdf->GetY()-10);$pdf->Cell(30,10,'DATE ET N° DE LA ',1,1,'C',1);
$pdf->SetXY(65,$pdf->GetY()-10);$pdf->Cell(90,10,'EXPEDITEUR',1,1,'C',1);
$pdf->SetXY(155,$pdf->GetY()-10);$pdf->Cell(110,10,'OBJET',1,1,'C',1);
$pdf->SetXY(265,$pdf->GetY()-10);$pdf->Cell(30,10,'DATE ET N°',1,1,'C',1);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(30,10,"D'ARRIVEE",1,1,'C',1);
$pdf->SetXY(35,$pdf->GetY()-10);$pdf->Cell(30,10,'CORRESPONDANCE ',1,1,'C',1);
$pdf->SetXY(65,$pdf->GetY()-10);$pdf->Cell(90,10,'',1,1,'C',1);
$pdf->SetXY(155,$pdf->GetY()-10);$pdf->Cell(110,10,'',1,1,'C',1);
$pdf->SetXY(265,$pdf->GetY()-10);$pdf->Cell(30,10,'DE LA REPONSE',1,1,'C',1);
$pdf->SetFont('aefurat', 'B', 10);
$pdf->SetXY(5,$pdf->GetY());
// $x=0;
while($row=mysql_fetch_object($requetey))
{
// $x=$x+1;
	$pdf->Cell(30,5,"Le : ".$pdf->dateUS2FR($row->DATEAR)."",1,1,'L',0,0); 
	$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(30,5,"N° : ".$row->NAR."",1,1,'L',0,0); 
    $pdf->SetXY(35,$pdf->GetY()-10);$pdf->Cell(30,5,"Le : ".$pdf->dateUS2FR($row->DATECR)."",1,1,'L',0,0); 
	$pdf->SetXY(35,$pdf->GetY());$pdf->Cell(30,5,"N° : ".$row->NCR."",1,1,'L',0,0); 
	$pdf->SetXY(65,$pdf->GetY()-10);$pdf->SetFont('aefurat', '', 14);$pdf->Cell(90,10,$row->EXP,1,1,'C',0,0); $pdf->SetFont('aefurat', '', 10);
	$pdf->SetXY(65+90,$pdf->GetY()-10);$pdf->SetFont('aefurat', '', 14);$pdf->Cell(110,10,$row->OBJ,1,1,'C',0,0); $pdf->SetFont('aefurat', '', 10);
	if($row->NRP==0)
	{ 
	$pdf->SetFillColor(255,228,225); 
	} 
	else 
	{
	$pdf->SetFillColor(255, 255, 255); 
	}
	$pdf->SetXY(175+90,$pdf->GetY()-10);$pdf->Cell(30,5,"Le : ".$pdf->dateUS2FR($row->DATERP)."",1,1,'L',1,0); 
	$pdf->SetXY(175+90,$pdf->GetY());$pdf->Cell(30,5,"N° : ".$row->NRP." ",1,1,'L',1,0); 	
	$pdf->SetFillColor(152, 251, 152); 
	$pdf->SetXY(5,$pdf->GetY());
}
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(290,5,'Fin Courrier Arrivée',1,1,'C',1,0);	
}

if ($_POST["type"]==2)//dep 
{
if ($SERVICE==0) {$query_listey = "SELECT * FROM courdep WHERE (DATEDP BETWEEN '$dus1' AND '$dus2') ";$serv='DSP';} 
if ($SERVICE==1) {$query_listey = "SELECT * FROM courdep WHERE (DATEDP BETWEEN '$dus1' AND '$dus2') and EXP=1 ";$serv='DIR';} 
if ($SERVICE==2) {$query_listey = "SELECT * FROM courdep WHERE (DATEDP BETWEEN '$dus1' AND '$dus2') and EXP=2 ";$serv='INSP';} 
if ($SERVICE==4) {$query_listey = "SELECT * FROM courdep WHERE (DATEDP BETWEEN '$dus1' AND '$dus2') and EXP=3 ";$serv='SAS';} 
if ($SERVICE==3) {$query_listey = "SELECT * FROM courdep WHERE (DATEDP BETWEEN '$dus1' AND '$dus2') and EXP=4 ";$serv='PREV';} 
if ($SERVICE==5) {$query_listey = "SELECT * FROM courdep WHERE (DATEDP BETWEEN '$dus1' AND '$dus2') and EXP=5 ";$serv='DRH';} 
if ($SERVICE==6) {$query_listey = "SELECT * FROM courdep WHERE (DATEDP BETWEEN '$dus1' AND '$dus2') and EXP=6 ";$serv='PLF';} 

// $query_listey = "SELECT * FROM courdep";
$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$totalmbry=mysql_num_rows($requetey);
$pdf->SetXY(5,$pdf->GetY()-5);$pdf->Cell(130,10,'Depart : Total Courrier '.$totalmbry.' Service '.$serv,1,1,'L',1);$pdf->SetXY(105+30,$pdf->GetY()-10);$pdf->Cell(160,10,'الصــــادر',1,1,'R',1);
$pdf->SetFont('aefurat', 'B', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(30,10,'تــاريخ',1,1,'C',1);
$pdf->SetXY(35,$pdf->GetY()-10);$pdf->Cell(30,10,'عدد',1,1,'C',1);
$pdf->SetXY(65,$pdf->GetY()-10);$pdf->Cell(70,10,'المرسل اليــه',1,1,'C',1);
$pdf->SetXY(135,$pdf->GetY()-10);$pdf->Cell(90,10,'الموضوع',1,1,'C',1);
$pdf->SetXY(225,$pdf->GetY()-10);$pdf->Cell(25,10,'رقم',1,1,'C',1);
$pdf->SetXY(250,$pdf->GetY()-10);$pdf->Cell(45,10,'الملاحضة',1,1,'C',1);

$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(30,10,'ورقم الرسالة',1,1,'C',1);
$pdf->SetXY(35,$pdf->GetY()-10);$pdf->Cell(30,10,'الوثــائق',1,1,'C',1);
$pdf->SetXY(65,$pdf->GetY()-10);$pdf->Cell(70,10,'',1,1,'C',1);
$pdf->SetXY(135,$pdf->GetY()-10);$pdf->Cell(90,10,'',1,1,'C',1);
$pdf->SetXY(225,$pdf->GetY()-10);$pdf->Cell(25,10,'الارشيف',1,1,'C',1);
$pdf->SetXY(250,$pdf->GetY()-10);$pdf->Cell(45,10,'',1,1,'C',1);
$pdf->SetFont('aefurat', 'B', 9);

$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(30,10,'DATE ET N° DE LA ',1,1,'C',1);
$pdf->SetXY(35,$pdf->GetY()-10);$pdf->Cell(30,10,'NOMBRE',1,1,'C',1);
$pdf->SetXY(65,$pdf->GetY()-10);$pdf->Cell(70,10,'DESTINATAIRE',1,1,'C',1);
$pdf->SetXY(135,$pdf->GetY()-10);$pdf->Cell(90,10,'OBJET',1,1,'C',1);
$pdf->SetXY(225,$pdf->GetY()-10);$pdf->Cell(25,10,'N°',1,1,'C',1);
$pdf->SetXY(250,$pdf->GetY()-10);$pdf->Cell(45,10,'OBSERVATION',1,1,'C',1);

$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(30,10,"CORRESPONDANCE",1,1,'C',1);
$pdf->SetXY(35,$pdf->GetY()-10);$pdf->Cell(30,10,'DE PIECE',1,1,'C',1);
$pdf->SetXY(65,$pdf->GetY()-10);$pdf->Cell(70,10,'',1,1,'C',1);
$pdf->SetXY(135,$pdf->GetY()-10);$pdf->Cell(90,10,'',1,1,'C',1);
$pdf->SetXY(225,$pdf->GetY()-10);$pdf->Cell(25,10,'ARCHIVES',1,1,'C',1);
$pdf->SetXY(250,$pdf->GetY()-10);$pdf->Cell(45,10,'',1,1,'C',1);
$pdf->SetFont('aefurat', 'B', 10);
$pdf->SetXY(5,$pdf->GetY());
// $x=0;
while($row=mysql_fetch_object($requetey))
{
// $x=$x+1;
	$pdf->Cell(30,5,"Le : ".$pdf->dateUS2FR($row->DATEDP)."",1,1,'L',0,0); 
	$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(30,5,"N° : ".$row->NDP."",1,1,'L',0,0); 
    $pdf->SetXY(35,$pdf->GetY()-10);$pdf->Cell(30,10,$row->NP,1,1,'C',0,0); 
	$pdf->SetXY(65,$pdf->GetY()-10);$pdf->SetFont('aefurat', '', 14);$pdf->Cell(70,10,$row->DEST,1,1,'C',0,0); $pdf->SetFont('aefurat', '', 10);
	$pdf->SetXY(135,$pdf->GetY()-10);$pdf->SetFont('aefurat', '', 14);$pdf->Cell(90,10,$row->OBJ,1,1,'C',0,0); $pdf->SetFont('aefurat', '', 10);
	$pdf->SetXY(225,$pdf->GetY()-10);$pdf->Cell(25,10,$row->NA,1,1,'C',0,0); 
	$pdf->SetXY(250,$pdf->GetY()-10);$pdf->Cell(45,10,$row->OBS,1,1,'C',0,0);  
	$pdf->SetXY(5,$pdf->GetY());
}
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(290,5,'Fin Courrier Depart',1,1,'C',1,0);	
}

if ($_POST["type"]==3)//Archives
{
if ($SERVICE==0) {$query_listey = "SELECT * FROM courarch WHERE (DATEARCH BETWEEN '$dus1' AND '$dus2')";$serv='DSP';} 
if ($SERVICE==1) {$query_listey = "SELECT * FROM courarch WHERE (DATEARCH BETWEEN '$dus1' AND '$dus2') and (EXP=1 or DSP=1)";$serv='DIR';} 
if ($SERVICE==2) {$query_listey = "SELECT * FROM courarch WHERE (DATEARCH BETWEEN '$dus1' AND '$dus2') and (EXP=2 or INSP=1)";$serv='INSP';} 
if ($SERVICE==4) {$query_listey = "SELECT * FROM courarch WHERE (DATEARCH BETWEEN '$dus1' AND '$dus2') and (EXP=3 or SAS=1)";$serv='SAS';} 
if ($SERVICE==3) {$query_listey = "SELECT * FROM courarch WHERE (DATEARCH BETWEEN '$dus1' AND '$dus2') and (EXP=4 or PRV=1)";$serv='PRV';} 
if ($SERVICE==5) {$query_listey = "SELECT * FROM courarch WHERE (DATEARCH BETWEEN '$dus1' AND '$dus2') and (EXP=5 or DRH=1)";$serv='DRH';} 
if ($SERVICE==6) {$query_listey = "SELECT * FROM courarch WHERE (DATEARCH BETWEEN '$dus1' AND '$dus2') and (EXP=6 or PLF=1)";$serv='PLF';} 

$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$totalmbry=mysql_num_rows($requetey);
$pdf->SetXY(5,$pdf->GetY()-5);$pdf->Cell(155,10,'Archive : Total Courrier '.$totalmbry.' Service '.$serv,1,1,'L',1);$pdf->SetXY(160,$pdf->GetY()-10);$pdf->Cell(135,10,'الارشيف',1,1,'R',1);
$pdf->SetFont('aefurat', 'B', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(30,10,'تــاريخ',1,1,'C',1);
$pdf->SetXY(35,$pdf->GetY()-10);$pdf->Cell(30,10,'صنف',1,1,'C',1);
$pdf->SetXY(65,$pdf->GetY()-10);$pdf->Cell(25,10,'رقم',1,1,'C',1);
$pdf->SetXY(90,$pdf->GetY()-10);$pdf->Cell(70,10,'مصدر',1,1,'C',1);
$pdf->SetXY(160,$pdf->GetY()-10);$pdf->Cell(90,10,'الموضوع',1,1,'C',1);
$pdf->SetXY(250,$pdf->GetY()-10);$pdf->Cell(45,10,'الملاحضة',1,1,'C',1);

$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(30,10,'ورقم الارشيف',1,1,'C',1);
$pdf->SetXY(35,$pdf->GetY()-10);$pdf->Cell(30,10,'الرسالة',1,1,'C',1);
$pdf->SetXY(65,$pdf->GetY()-10);$pdf->Cell(25,10,'الرسالة',1,1,'C',1);
$pdf->SetXY(90,$pdf->GetY()-10);$pdf->Cell(70,10,'الرسالة',1,1,'C',1);
$pdf->SetXY(160,$pdf->GetY()-10);$pdf->Cell(90,10,'',1,1,'C',1);
$pdf->SetXY(250,$pdf->GetY()-10);$pdf->Cell(45,10,'',1,1,'C',1);
$pdf->SetFont('aefurat', 'B', 9);

$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(30,10,'DATE',1,1,'C',1);
$pdf->SetXY(35,$pdf->GetY()-10);$pdf->Cell(30,10,'CATEGORIE',1,1,'C',1);
$pdf->SetXY(65,$pdf->GetY()-10);$pdf->Cell(25,10,'N°',1,1,'C',1);
$pdf->SetXY(90,$pdf->GetY()-10);$pdf->Cell(70,10,'SOURCE',1,1,'C',1);
$pdf->SetXY(160,$pdf->GetY()-10);$pdf->Cell(90,10,'OBJET',1,1,'C',1);
$pdf->SetXY(250,$pdf->GetY()-10);$pdf->Cell(45,10,'OBSERVATION',1,1,'C',1);

$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(30,10,"ET N° ARCHIVE",1,1,'C',1);
$pdf->SetXY(35,$pdf->GetY()-10);$pdf->Cell(30,10,'COURRIER',1,1,'C',1);
$pdf->SetXY(65,$pdf->GetY()-10);$pdf->Cell(25,10,'COURRIER',1,1,'C',1);
$pdf->SetXY(90,$pdf->GetY()-10);$pdf->Cell(70,10,'COURRIER',1,1,'C',1);
$pdf->SetXY(160,$pdf->GetY()-10);$pdf->Cell(90,10,'',1,1,'C',1);
$pdf->SetXY(250,$pdf->GetY()-10);$pdf->Cell(45,10,'',1,1,'C',1);
$pdf->SetFont('aefurat', 'B', 10);
$pdf->SetXY(5,$pdf->GetY());
// $x=0;
while($row=mysql_fetch_object($requetey))
{
// $x=$x+1;
	$pdf->Cell(30,5,"Le : ".$pdf->dateUS2FR($row->DATEARCH)."",1,1,'L',0,0); 
	$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(30,5,"N° : ".$row->id."",1,1,'L',0,0); 
    $pdf->SetXY(35,$pdf->GetY()-10);
	if($row->CATCOUR==1) {
	$pdf->Cell(30,10,'Arrivé',1,1,'C',0,0);
	$pdf->SetXY(65,$pdf->GetY()-10);$pdf->Cell(25,10,$row->IDCOUR,1,1,'C',0,0);
	$pdf->SetXY(90,$pdf->GetY()-10);$pdf->Cell(70,10,$pdf->nbrtostring('mvc','courar','id',$row->IDCOUR,'EXP'),1,1,'C',0,0);
	$pdf->SetXY(160,$pdf->GetY()-10);$pdf->Cell(90,10,$pdf->nbrtostring('mvc','courar','id',$row->IDCOUR,'OBJ'),1,1,'C',0,0);
	} else {
	$pdf->Cell(30,10,'Depart',1,1,'C',0,0);
	$pdf->SetXY(65,$pdf->GetY()-10);$pdf->Cell(25,10,$row->IDCOUR,1,1,'C',0,0);
	$pdf->SetXY(90,$pdf->GetY()-10);$pdf->Cell(70,10,$pdf->nbrtostring('mvc','courdep','id',$row->IDCOUR,'DEST'),1,1,'C',0,0);
	$pdf->SetXY(160,$pdf->GetY()-10);$pdf->Cell(90,10,$pdf->nbrtostring('mvc','courdep','id',$row->IDCOUR,'OBJ'),1,1,'C',0,0);
	} 
	$pdf->SetXY(250,$pdf->GetY()-10);$pdf->Cell(45,10,'****',1,1,'C',0,0);   
	$pdf->SetXY(5,$pdf->GetY());
}
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(290,5,'Fin Courrier Archive',1,1,'C',1,0);	
}

$pdf->Output();
?>
