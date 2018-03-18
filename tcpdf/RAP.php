<?php
require('PDF0.php');
$pdf = new PDF0( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire
$pdf->AddPage('P','A4');
$pdf->SetDisplayMode('fullpage','two');//mode d affichage
$datejour1=$_GET['d1'];
$datejour2=$_GET['d2'];

function numbr($tbl,$y,$datejour1,$datejour2) 
{
$db_host="localhost";
$db_name="mvc"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$sql = "select * from $tbl where MODESORTI=$y AND DATEDON BETWEEN '$datejour1' AND '$datejour2' ";//	
$resul=mysql_query($sql);
$total=mysql_num_rows($resul);
return $total;
}
function numbr1($tbl,$datejour1,$datejour2) {
$db_host="localhost";
$db_name="mvc"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$sql = "select * from $tbl  where  DATEDON BETWEEN '$datejour1' AND '$datejour2'  ";
$resul=mysql_query($sql);
$total=mysql_num_rows($resul);
return $total;
}
$pdf->Text(50,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(20,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE");
$pdf->Text(60,20,"DIRECTION DE LA SANTÉ WILAYA DE DJELFA");
$pdf->Text(5,30,"ETABLISSEMENT PUBLIC HOSPITALIER  D'AIN - OUSSERA");
$pdf->Text(5,35,"SERVICE: UMC");$pdf->Text(130,35,"AIN OUSSERA LE :".date("j-m-Y"));
$pdf->Text(5,40,"N°.........../".date("Y"));
$pdf->SetXY(55,50);
$pdf->Cell(95,10,'ACTIVITE DE LA GARDE',1,1,'C');
$pdf->SetXY(55,60);$pdf->Cell(95,10," Du ".$pdf->dateUS2FR($datejour1)." Au ".$pdf->dateUS2FR($datejour2),1,1,'C');
$h=80;
$pdf->SetXY(05,$h);$pdf->cell(80,10,"Malades",1,0,'C',1,0);
$pdf->SetXY(85,$h);$pdf->cell(46,10,"Nombres",1,0,'C',1,0);
$pdf->SetXY(131,$h);$pdf->cell(70,10,"Observations",1,0,'C',1,0);
$h=90;
$pdf->SetXY(05,$h);$pdf->cell(80,10,"Examinés",1,0,'L',0);
$pdf->SetXY(85,$h);$pdf->cell(46,10,numbr1('cons',$datejour1,$datejour2),1,0,'C',0);
$pdf->SetXY(131,$h);$pdf->cell(70,10,"RAS",1,0,'C',0);
$h=100;
$pdf->SetXY(05,$h);$pdf->cell(80,10,"Hospitalisés",1,0,'L',0);
$pdf->SetXY(85,$h);$pdf->cell(46,10,numbr('hosp',0,$datejour1,$datejour2),1,0,'C',0);
$pdf->SetXY(131,$h);$pdf->cell(70,10,"RAS",1,0,'C',0);
$h=110;
$pdf->SetXY(05,$h);$pdf->cell(80,10,"Ayant Subi Une Intervention Chirurgicale",1,0,'L',0);
$pdf->SetXY(85,$h);$pdf->cell(46,10,"0",1,0,'C',0);
$pdf->SetXY(131,$h);$pdf->cell(70,10,"RAS",1,0,'C',0);
$h=120;
$pdf->SetXY(05,$h);$pdf->cell(80,10,"Recus Par Evacuation Origines Et Motifs",1,0,'L',0);
$pdf->SetXY(85,$h);$pdf->cell(46,10,"0",1,0,'C',0);
$pdf->SetXY(131,$h);$pdf->cell(70,10,"RAS",1,0,'C',0);
$h=130;
$pdf->SetXY(05,$h);$pdf->cell(80,10,"Traités A Titre Externe ",1,0,'L',0);
$pdf->SetXY(85,$h);$pdf->cell(46,10,numbr1('cons',$datejour1,$datejour2)-numbr('hosp',0,$datejour1,$datejour2),1,0,'C',0);
$pdf->SetXY(131,$h);$pdf->cell(70,10,"RAS",1,0,'C',0);
$h=140;
$pdf->SetXY(05,$h);$pdf->cell(80,10,"Evacués Motifs Lieu D'évacuation ",1,0,'L',0);
$pdf->SetXY(85,$h);$pdf->cell(46,10,numbr('hosp',3,$datejour1,$datejour2),1,0,'C',0);
$pdf->SetXY(131,$h);$pdf->cell(70,10,"***",1,0,'C',0);
$h=155;
$pdf->SetXY(05,$h);$pdf->cell(100,10,"DIFFICULTES RENCONTREES PENDANT LA GARDE ",0,0,'L',0);
$h=200;
$pdf->SetXY(05,$h);$pdf->cell(100,10,"SUGGESTIONS ",0,0,'L',0);
$h=240;
$pdf->SetXY(05,$h);$pdf->cell(90,10,"VISA DU DIRECTEUR DE GARDE ",0,0,'L',0);
$h=240;
$pdf->SetXY(110,$h);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE DE LA GARDE ",0,0,'L',0);


$pdf->AddPage();
$pdf->Text(50,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(20,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE");
$pdf->Text(60,20,"DIRECTION DE LA SANTÉ WILAYA DE DJELFA");
$pdf->Text(5,30,"ETABLISSEMENT PUBLIC HOSPITALIER  D'AIN - OUSSERA");
$pdf->Text(5,35,"SERVICE: UMC");$pdf->Text(130,35,"AIN OUSSERA LE :".date("j-m-Y"));
$pdf->Text(5,40,"N°.........../".date("Y"));
$pdf->SetXY(55,50);$pdf->Cell(95,10,'PASSATION DE SERVICES',1,1,'C');
$pdf->SetXY(55,60);$pdf->Cell(95,10," Du ".$pdf->dateUS2FR($datejour1)." Au ".$pdf->dateUS2FR($datejour2),1,1,'C');
$h=80;
$pdf->SetXY(05,$h);$pdf->cell(30,10,"SERVICE",1,0,'C',1,0);
$pdf->SetXY(35,$h);$pdf->cell(10,10,"LIT",1,0,'C',1,0);
$pdf->SetXY(45,$h);$pdf->cell(50,10,"NOM_PRENOM",1,0,'C',1,0);
$pdf->SetXY(95,$h);$pdf->cell(106,10,"DIAGNOSTIC",1,0,'C',1,0);
$pdf->SetXY(05,90); 
$pdf->mysqlconnect();
$pdf->SetFont('dejavusans', '',9, '', true);
$query = "SELECT * FROM hosp where MODESORTI=0 and DATEDON BETWEEN '$datejour1' AND '$datejour2'  ";//where SORTI =''where DATEDUDECE >= '2014-01-01'
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
  {
    
    $pdf->cell(30,10,$pdf->nbrtostring("MVC","service","ids",$row->SERVICE,"servicefr"),1,0,'L',0);//5  =hauteur de la cellule origine =7
    $pdf->cell(10,10,$pdf->nbrtostring("MVC","lit","idlit",$row->NLIT,"nlit"),1,0,'C',0);//5  =hauteur de la cellule origine =7
    $pdf->cell(50,10,$pdf->nbrtostring("MVC","pat","id",$row->IDDNR,"NOM").'_'.$pdf->nbrtostring("MVC","pat","id",$row->IDDNR,"PRENOM"),1,0,'L',0);
    $pdf->cell(106,10,$row->DGC	,1,0,'L',0);
    $pdf->SetXY(5,$pdf->GetY()+10); 
  }
$pdf->SetFont('dejavusans', '',10, '', true);  
$pdf->SetXY(5,$pdf->GetY()); 	  
$pdf->cell(40,05,"TOTAL",1,0,'C',1,0);	  
$pdf->SetXY(45,$pdf->GetY()); 	  
$pdf->cell(116+40,05,$totalmbr1." Malades",1,0,'C',1,0);				 
$pdf->SetXY(110,$pdf->GetY()+20); 	  
$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE DE LA GARDE ",0,0,'L',0);


$pdf->Output();
?>



