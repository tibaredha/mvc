<?php
$dateeuro=date('d/m/Y');
require('hemod.php');
$pdf = new hemod( 'p', 'mm', 'A5' );
$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$pdf->AddPage('p','A5');
$pdf->Rect(5,5, 140, 202,"d");
$pdf->Rect(85,152, 55, 40,"d");
$pdf->mysqlconnect();
$pdf->Image('dm.jpg',5.5,5.5,10,10,0);
$pdf->Image('dm.jpg',134.6,5.5,10,10,0);

$idon=$_GET['id'];
$query = "select * from hemo WHERE  id = '$idon'     ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))//
{
$d1=substr($result->DATENAISSA,0,4);
$d2=substr(date('d/m/Y'),6,4);
$d3=$d2-$d1;
$pdf->biopha(trim($result->NOM),trim($result->PRENOM),$d3,trim($result->ADRESSE));
}
if (isset($_POST['ABORH'])){$pdf->SetXY(8,65);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,65);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,65);$pdf->Cell(50,3,"Groupage sanguin",0,1,'L'); 
if (isset($_POST['TP'])){$pdf->SetXY(83,65);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,65);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,65);$pdf->Cell(50,3,"Taux de Prothrombine (TP)",0,1,'L'); 
if (isset($_POST['FNS'])){$pdf->SetXY(8,70);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,70);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,70);$pdf->Cell(50,3,"FNS avec equilibre leucocytaire",0,1,'L');    
if (isset($_POST['INR'])){$pdf->SetXY(83,70);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,70);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,70);$pdf->Cell(50,3,"TCK-INR",0,1,'L'); 
if (isset($_POST['GLYCE'])){$pdf->SetXY(8,75);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,75);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,75);$pdf->Cell(50,3,"Glycemie a jeun",0,1,'L');                    
if (isset($_POST['CRP'])){$pdf->SetXY(83,75);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,75);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,75);$pdf->Cell(50,3,"VS,CRP,Fibrinogene",0,1,'L'); 
if (isset($_POST['HB'])){$pdf->SetXY(8,80);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,80);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,80);$pdf->Cell(50,3,"Hemglobine glyquee (HBA1c)",0,1,'L');         
if (isset($_POST['Fer'])){$pdf->SetXY(83,80);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,80);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,80);$pdf->Cell(50,3,"Fer serique,Feretinemie",0,1,'L'); 
if (isset($_POST['CHOLES'])){$pdf->SetXY(8,85);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,85);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,85);$pdf->Cell(50,3,"Cholesterol total",0,1,'L');                  
if (isset($_POST['Transferine'])){$pdf->SetXY(83,85);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,85);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,85);$pdf->Cell(50,3,"Transferine,coefficient de satu",0,1,'L'); 
if (isset($_POST['HDL'])){$pdf->SetXY(8,90);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,90);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,90);$pdf->Cell(50,3,"HDL Cholesterol",0,1,'L');                    
if (isset($_POST['NA'])){$pdf->SetXY(83,90);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,90);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,90);$pdf->Cell(50,3,"Natremie (NA+)",0,1,'L'); 
if (isset($_POST['LDL'])){$pdf->SetXY(8,95);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,95);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,95);$pdf->Cell(50,3,"LDL Cholesterol",0,1,'L');                    
if (isset($_POST['K'])){$pdf->SetXY(83,95);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,95);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,95);$pdf->Cell(50,3,"Kaliemie (K+)",0,1,'L'); 
if (isset($_POST['TG'])){$pdf->SetXY(8,100);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,100);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,100);$pdf->Cell(50,3,"Triglicerides",0,1,'L');                    
if (isset($_POST['CA'])){$pdf->SetXY(83,100);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,100);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,100);$pdf->Cell(50,3,"Calcemie (CA++)",0,1,'L'); 
if (isset($_POST['UREE'])){$pdf->SetXY(8,105);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,105);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,105);$pdf->Cell(50,3,"Uree Sanguine",0,1,'L');                    
if (isset($_POST['PHOS'])){$pdf->SetXY(83,105);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,105);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,105);$pdf->Cell(50,3,"Phosphoremie (PO4--)",0,1,'L'); 
if (isset($_POST['CREAT'])){$pdf->SetXY(8,110);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,110);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,110);$pdf->Cell(50,3,"Creatinine",0,1,'L');                       
if (isset($_POST['MG'])){$pdf->SetXY(83,110);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,110);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,110);$pdf->Cell(50,3,"Magnesemie (MGO4--)",0,1,'L'); 
if (isset($_POST['ACURIQUE'])){$pdf->SetXY(8,115);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,115);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,115);$pdf->Cell(50,3,"Acide Urique",0,1,'L');                     
if (isset($_POST['ECBU'])){$pdf->SetXY(83,115);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,115);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,115);$pdf->Cell(50,3,"ECBU,Antibiogramme",0,1,'L'); 
if (isset($_POST['BILIT'])){$pdf->SetXY(8,120);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,120);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,120);$pdf->Cell(50,3,"Bilirubine Totale-Conjugee-Libre",0,1,'L'); 
if (isset($_POST['ABORH'])){$pdf->SetXY(83,120);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,120);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,120);$pdf->Cell(50,3,"Chimie des urines",0,1,'L'); 
if (isset($_POST['TGO'])){$pdf->SetXY(8,125);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,125);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,125);$pdf->Cell(50,3,"Transaminases (ASAT-ALAT)",0,1,'L');        
if (isset($_POST['ABORH'])){$pdf->SetXY(83,125);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,125);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,125);$pdf->Cell(50,3,"Proteinurie des 24 heures",0,1,'L'); 
if (isset($_POST['ABORH'])){$pdf->SetXY(8,130);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,130);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,130);$pdf->Cell(50,3,"CPK",0,1,'L');                              
if (isset($_POST['ABORH'])){$pdf->SetXY(83,130);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,130);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,130);$pdf->Cell(50,3,"Microalbuminurie",0,1,'L'); 
if (isset($_POST['ABORH'])){$pdf->SetXY(8,135);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,135);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,135);$pdf->Cell(50,3,"Phosphatases Alcalines",0,1,'L');           
if (isset($_POST['ABORH'])){$pdf->SetXY(83,135);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,135);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,135);$pdf->Cell(50,3,"PTH",0,1,'L'); 
if (isset($_POST['ABORH'])){$pdf->SetXY(8,140);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,140);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,140);$pdf->Cell(50,3,"Albuminemie, Protides Totaux",0,1,'L');     
if (isset($_POST['T3'])){$pdf->SetXY(83,140);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,140);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,140);$pdf->Cell(50,3,"TSHus-FT3-FT4",0,1,'L'); 
if (isset($_POST['ABORH'])){$pdf->SetXY(8,145);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(8,145);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(15,145);$pdf->Cell(50,3,"Autres",0,1,'L');                           
if (isset($_POST['ABORH'])){$pdf->SetXY(83,145);$pdf->Cell(3,3,"X",1,1,'C');}else{$pdf->SetXY(83,145);$pdf->Cell(3,3,"",1,1,'C');}$pdf->SetXY(90,145);$pdf->Cell(50,3,"PSA",0,1,'L');



$pdf->SetXY(15,150);$pdf->Cell(50,3,"________________________________",0,1,'L');
$pdf->SetXY(15,155);$pdf->Cell(50,3,"________________________________",0,1,'L');
$pdf->SetXY(15,160);$pdf->Cell(50,3,"________________________________",0,1,'L');
$pdf->SetXY(15,165);$pdf->Cell(50,3,"________________________________",0,1,'L');
$pdf->SetXY(15,170);$pdf->Cell(50,3,"________________________________",0,1,'L');
$pdf->Output();
?>