<?php
// if (!ISSET($_POST['annee'])||!ISSET($_POST['mois'])||!ISSET($_POST['jour'])||!ISSET($_POST['annee1'])||!ISSET($_POST['mois1'])||!ISSET($_POST['jour1'])){$datejour1 =date("Y-m-d");$datejour2 =date("Y-m-d");}
// else{if(empty($_POST['annee'])||empty($_POST['mois'])||empty($_POST['jour'])||empty($_POST['annee1'])||empty($_POST['mois1'])||empty($_POST['jour1'])){$datejour1 =date("Y-m-d");$datejour2 =date("Y-m-d");}else{$datejour1 = $_POST['annee'] .'-'.$_POST['mois'] .'-'.$_POST['jour'];$datejour2 = $_POST['annee1'].'-'.$_POST['mois1'].'-'.$_POST['jour1'];}}
// $datejour11 = $_POST['jour'].'-'.$_POST['mois'] .'-'.$_POST['annee'];$datejour22 = $_POST['jour1'].'-'.$_POST['mois1'].'-'.$_POST['annee1'];

//if ($datejour1>$datejour2 or  $datejour1==$datejour2 ){header("Location: ../../drh/evaluation") ;}


//$ndp=$_GET["uc"];

require_once('drh.php');$pdf = new drh('L', 'cm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');$pdf->setRTL(true);
$pdf->SetTitle('DECISION');
$pdf->SetSubject('PROTOCOLE');
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('aefurat', '', 14);
$pdf-> mysqlconnect();
$pdf->AddPage();
$pdf->Text(6,1,"الجمهورية الجزائرية الديمقراطية الشعبيـة");
$pdf->Text(5.5,2.0,"وزارة الصحة و السكان و إصلاح المستشفيات");
$pdf->Text(0.5,3.0,"مديرية الصحة و السكان لولاية الجلفة");
$pdf->Text(0.5,4.0,"المؤسسة العمومية الاستشفائية عين وسارة");
$pdf->Text(0.5,5.0,"المديرية الفرعية للموارد البشرية ");
$pdf->Text(0.5,6.0," الرقم:......./");


if ($_POST['type']=='1')//list_grh_total 
{
	$pdf->SetXY(11,7.0);$pdf->Cell(6.5,1.5,'القائمة الاسمية',1,1,'C');
	$h=9;
	$pdf->SetXY(0.5,$h); 	  $pdf->cell(7,0.5,"اللقب و الاسم",1,0,'C',1,0);
	$pdf->SetXY(7.5,$h); 	  $pdf->cell(10,0.5,"الرتبة",1,0,'C',1,0);
	$pdf->SetXY(17.5,$h); 	  $pdf->cell(3,0.5,"تاريخ الالتحاق",1,0,'C',1,0);
	$pdf->SetXY(20.5,$h); 	  $pdf->cell(8,0.5,"المصلحة",1,0,'C',1,0);
	$pdf->SetXY(0.5,10);
	mysql_query("SET NAMES 'UTF8' ");
	$query = "SELECT service.servicear as service,grh.servicear,grh.DATEARRIVE,grh.Nomlatin as Nomlatin ,grh.Prenom_Latin as Prenom_Latin,grh.Commune_Naissancear as Commune_Naissancear,grh.Sexe as Sexe ,grh.Date_Naissance as Date_Naissance ,grh.Prenom_Arabe as Prenom_Arabe,grh.Nomarab as Nomarab ,grh.idp as idp,grade.gradear as gradear FROM grh,grade,service where  grade.idg=grh.rnvgradear and  service.ids=grh.servicear and cessation !='y' order by service";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	//***********************************************************************//
	while($row=mysql_fetch_object($resultat))
	  {
	   $pdf->cell(7,1,$row->Nomarab."  ".$row->Prenom_Arabe,1,0,'R',0);//5  =hauteur de la cellule origine =7
	   $pdf->cell(10,1,$row->gradear,1,0,'R',0);
	   $pdf->cell(3,1,$row->DATEARRIVE,1,0,'C',0);
	   $pdf->cell(8,1,$row->service,1,0,'R',0);
	   $pdf->SetXY(0.5,$pdf->GetY()+1); 
	  }
	$pdf->SetXY(0.5,$pdf->GetY()); 	
	$pdf->cell(7,0.5,"المجموع الكلى".$totalmbr1,1,0,'C',1,0);	  
	$pdf->SetXY(7.5,$pdf->GetY()); 	  
	$pdf->cell(21,0.5,"",1,0,'C',1,0);				 
	$pdf->SetXY(13,$pdf->GetY()+2); 	  
	$pdf->cell(6,0.5,"امضاء المدير",0,0,'C',0);				
}
if ($_POST['type']=='2') //list_grh_conge
{
   $pdf->SetXY(11,7.0);$pdf->Cell(6.5,1.5,'القائمة الاسمية',1,1,'C');
	$h=9;
	$pdf->SetXY(0.5,$h); 	  $pdf->cell(7,0.5,"اللقب و الاسم",1,0,'C',1,0);
	$pdf->SetXY(7.5,$h); 	  $pdf->cell(10,0.5,"الرتبة",1,0,'C',1,0);
	$pdf->SetXY(17.5,$h); 	  $pdf->cell(3,0.5,"تاريخ الالتحاق",1,0,'C',1,0);
	$pdf->SetXY(20.5,$h); 	  $pdf->cell(8,0.5,"المصلحة",1,0,'C',1,0);
	$pdf->SetXY(0.5,10);
	mysql_query("SET NAMES 'UTF8' ");
	$query = "SELECT service.servicear as service,grh.servicear,grh.DATEARRIVE,grh.Nomlatin as Nomlatin ,grh.Prenom_Latin as Prenom_Latin,grh.Commune_Naissancear as Commune_Naissancear,grh.Sexe as Sexe ,grh.Date_Naissance as Date_Naissance ,grh.Prenom_Arabe as Prenom_Arabe,grh.Nomarab as Nomarab ,grh.idp as idp,grade.gradear as gradear FROM grh,grade,service where  grade.idg=grh.rnvgradear and  service.ids=grh.servicear and cessation !='y' order by service";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	//***********************************************************************//
	while($row=mysql_fetch_object($resultat))
	  {
	   $pdf->cell(7,1,$row->Nomarab."  ".$row->Prenom_Arabe,1,0,'R',0);//5  =hauteur de la cellule origine =7
	   $pdf->cell(10,1,$row->gradear,1,0,'R',0);
	   $pdf->cell(3,1,$row->DATEARRIVE,1,0,'C',0);
	   $pdf->cell(8,1,$row->service,1,0,'R',0);
	   $pdf->SetXY(0.5,$pdf->GetY()+1); 
	  }
	$pdf->SetXY(0.5,$pdf->GetY()); 	
	$pdf->cell(7,0.5,"المجموع الكلى".$totalmbr1,1,0,'C',1,0);	  
	$pdf->SetXY(7.5,$pdf->GetY()); 	  
	$pdf->cell(21,0.5,"",1,0,'C',1,0);				 
	$pdf->SetXY(13,$pdf->GetY()+2); 	  
	$pdf->cell(6,0.5,"امضاء المدير",0,0,'C',0);			
}

if ($_POST['type']=='3') //list_grh_service
{
   $pdf->SetXY(11,7.0);$pdf->Cell(6.5,1.5,'القائمة الاسمية',1,1,'C');
	$h=9;
	$pdf->SetXY(0.5,$h); 	  $pdf->cell(7,0.5,"اللقب و الاسم",1,0,'C',1,0);
	$pdf->SetXY(7.5,$h); 	  $pdf->cell(10,0.5,"الرتبة",1,0,'C',1,0);
	$pdf->SetXY(17.5,$h); 	  $pdf->cell(3,0.5,"تاريخ الالتحاق",1,0,'C',1,0);
	$pdf->SetXY(20.5,$h); 	  $pdf->cell(8,0.5,"المصلحة",1,0,'C',1,0);
	$pdf->SetXY(0.5,10);
	mysql_query("SET NAMES 'UTF8' ");
	$query = "SELECT service.servicear as service,grh.servicear,grh.DATEARRIVE,grh.Nomlatin as Nomlatin ,grh.Prenom_Latin as Prenom_Latin,grh.Commune_Naissancear as Commune_Naissancear,grh.Sexe as Sexe ,grh.Date_Naissance as Date_Naissance ,grh.Prenom_Arabe as Prenom_Arabe,grh.Nomarab as Nomarab ,grh.idp as idp,grade.gradear as gradear FROM grh,grade,service where  grade.idg=grh.rnvgradear and  service.ids=grh.servicear and cessation !='y' order by service";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	//***********************************************************************//
	while($row=mysql_fetch_object($resultat))
	  {
	   $pdf->cell(7,1,$row->Nomarab."  ".$row->Prenom_Arabe,1,0,'R',0);//5  =hauteur de la cellule origine =7
	   $pdf->cell(10,1,$row->gradear,1,0,'R',0);
	   $pdf->cell(3,1,$row->DATEARRIVE,1,0,'C',0);
	   $pdf->cell(8,1,$row->service,1,0,'R',0);
	   $pdf->SetXY(0.5,$pdf->GetY()+1); 
	  }
	$pdf->SetXY(0.5,$pdf->GetY()); 	
	$pdf->cell(7,0.5,"المجموع الكلى".$totalmbr1,1,0,'C',1,0);	  
	$pdf->SetXY(7.5,$pdf->GetY()); 	  
	$pdf->cell(21,0.5,"",1,0,'C',1,0);				 
	$pdf->SetXY(13,$pdf->GetY()+2); 	  
	$pdf->cell(6,0.5,"امضاء المدير",0,0,'C',0);			
}
















$pdf->Output('rapport_.pdf','I');
?>