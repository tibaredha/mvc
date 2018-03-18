<?php
require('BNMC1.php');
$pdf = new BNMC( 'P', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('P','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',9);

$pdf->SetXY(05,5); $pdf->cell(200,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",1,0,'C',0,0);
$pdf->SetXY(05,10);$pdf->cell(200,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
$pdf->SetXY(05,15);$pdf->cell(200,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
// $pdf->SetXY(05,20);$pdf->cell(100,5,"SERVICE PREVENTION",0,0,'L',0,0);$pdf->cell(142,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
// $pdf->SetXY(05,25);$pdf->cell(100,5,"N               / ".$_POST['annee'],0,0,'L',0,0);
// $pdf->SetXY(60,30);$pdf->cell(100,5,"Mouvement De La Population",0,0,'L',0,0);
// $pdf->SetXY(60,35);$pdf->cell(100,5,"Annee  ".$_POST['annee'],0,0,'L',0,0);
$datejour1='';
$datejour2='';
$EPH1='';
$pdf->SetXY(5,25);$pdf->cell(200,5,html_entity_decode(utf8_decode("I-Distribution des décès par tranche d'age et sexe (global)")),1,0,'C',1,0);
$pdf->SetFont( 'Arial', '', 10 );
$pdf->T2F20($pdf->dataagesexe(5,42,'Years','deceshosp','DINS','COMMUNER',$datejour1,$datejour2,$EPH1),$datejour1,$datejour2);

$pdf->AddPage();
$pdf->SetFont( 'Arial', '', 10 );
$pdf->SetXY(5,25);$pdf->cell(200,5,html_entity_decode(utf8_decode("II-Distribution des décès par communes de residence (SIG) ")),1,0,'C',1,0);
$pdf->djelfa($pdf->datasig($datejour1,$datejour2,$EPH1),20,128,3.7,'commune');//commune//dairas 






// if ($_POST['BNM']=='3') //3eme partie
// {
// $pdf->SetXY(60,40);$pdf->cell(100,5,"Deces Par Mois Et Par Sexe",0,0,'L',0,0);
// $pdf->SetFillColor(200 );
// $pdf->SetXY(05,50);$pdf->cell(25,5,"Mois",1,0,'L',1,0);$pdf->cell(20,5,"Janvier",1,0,'C',1,0);$pdf->cell(20,5,"Fevrier",1,0,'C',1,0);$pdf->cell(20,5,"Mars",1,0,'C',1,0);$pdf->cell(20,5,"Avril",1,0,'C',1,0);$pdf->cell(20,5,"Mai",1,0,'C',1,0);$pdf->cell(20,5,"Juin",1,0,'C',1,0);$pdf->cell(20,5,"Juillet",1,0,'C',1,0);$pdf->cell(20,5,"Aout",1,0,'C',1,0);$pdf->cell(20,5,"Septembre",1,0,'C',1,0);$pdf->cell(20,5,"October",1,0,'C',1,0);$pdf->cell(20,5,"Novombre",1,0,'C',1,0);$pdf->cell(20,5,"Decembre",1,0,'C',1,0);$pdf->cell(20,5,"Total",1,0,'C',1,0);
// $pdf->SetXY(05,55);$pdf->cell(25,5,"Commune",1,0,1,'L',0);
// $pdf->cell(10,5,"Mas",1,0,'C',1,0);$pdf->cell(10,5,"Fem",1,0,'C',1,0);
// $pdf->cell(10,5,"Mas",1,0,'C',1,0);$pdf->cell(10,5,"Fem",1,0,'C',1,0);
// $pdf->cell(10,5,"Mas",1,0,'C',1,0);$pdf->cell(10,5,"Fem",1,0,'C',1,0);
// $pdf->cell(10,5,"Mas",1,0,'C',1,0);$pdf->cell(10,5,"Fem",1,0,'C',1,0);
// $pdf->cell(10,5,"Mas",1,0,'C',1,0);$pdf->cell(10,5,"Fem",1,0,'C',1,0);
// $pdf->cell(10,5,"Mas",1,0,'C',1,0);$pdf->cell(10,5,"Fem",1,0,'C',1,0);
// $pdf->cell(10,5,"Mas",1,0,'C',1,0);$pdf->cell(10,5,"Fem",1,0,'C',1,0);
// $pdf->cell(10,5,"Mas",1,0,'C',1,0);$pdf->cell(10,5,"Fem",1,0,'C',1,0);
// $pdf->cell(10,5,"Mas",1,0,'C',1,0);$pdf->cell(10,5,"Fem",1,0,'C',1,0);
// $pdf->cell(10,5,"Mas",1,0,'C',1,0);$pdf->cell(10,5,"Fem",1,0,'C',1,0);
// $pdf->cell(10,5,"Mas",1,0,'C',1,0);$pdf->cell(10,5,"Fem",1,0,'C',1,0);
// $pdf->cell(10,5,"Mas",1,0,'C',1,0);$pdf->cell(10,5,"Fem",1,0,'C',1,0);
// $pdf->cell(10,5,"Mas",1,0,'C',1,0);$pdf->cell(10,5,"Fem",1,0,'C',1,0);
// $pdf->mysqlconnect();
// $query = "SELECT * from COM where IDWIL='17000' and yes='1' order by COMMUNE "; 
// $pdf->SetXY(05,60); 
// $resultat=mysql_query($query);
// $totalmbr1=mysql_num_rows($resultat);
// while($row=mysql_fetch_object($resultat))
// {
// $pdf->cell(25,5,$row->COMMUNE,1,0,'l',0);
// $pdf->cell(10,5,$pdf->Dbnm('m',$row->IDCOM,'01',$_POST['annee']),1,0,'C',0);$pdf->cell(10,5,$pdf->Dbnm('f',$row->IDCOM,'01',$_POST['annee']),1,0,'C',0);
// $pdf->cell(10,5,$pdf->Dbnm('m',$row->IDCOM,'02',$_POST['annee']),1,0,'C',0);$pdf->cell(10,5,$pdf->Dbnm('f',$row->IDCOM,'02',$_POST['annee']),1,0,'C',0);
// $pdf->cell(10,5,$pdf->Dbnm('m',$row->IDCOM,'03',$_POST['annee']),1,0,'C',0);$pdf->cell(10,5,$pdf->Dbnm('f',$row->IDCOM,'03',$_POST['annee']),1,0,'C',0);
// $pdf->cell(10,5,$pdf->Dbnm('m',$row->IDCOM,'04',$_POST['annee']),1,0,'C',0);$pdf->cell(10,5,$pdf->Dbnm('f',$row->IDCOM,'04',$_POST['annee']),1,0,'C',0);
// $pdf->cell(10,5,$pdf->Dbnm('m',$row->IDCOM,'05',$_POST['annee']),1,0,'C',0);$pdf->cell(10,5,$pdf->Dbnm('f',$row->IDCOM,'05',$_POST['annee']),1,0,'C',0);
// $pdf->cell(10,5,$pdf->Dbnm('m',$row->IDCOM,'06',$_POST['annee']),1,0,'C',0);$pdf->cell(10,5,$pdf->Dbnm('f',$row->IDCOM,'06',$_POST['annee']),1,0,'C',0);
// $pdf->cell(10,5,$pdf->Dbnm('m',$row->IDCOM,'07',$_POST['annee']),1,0,'C',0);$pdf->cell(10,5,$pdf->Dbnm('f',$row->IDCOM,'07',$_POST['annee']),1,0,'C',0);
// $pdf->cell(10,5,$pdf->Dbnm('m',$row->IDCOM,'08',$_POST['annee']),1,0,'C',0);$pdf->cell(10,5,$pdf->Dbnm('f',$row->IDCOM,'08',$_POST['annee']),1,0,'C',0);
// $pdf->cell(10,5,$pdf->Dbnm('m',$row->IDCOM,'09',$_POST['annee']),1,0,'C',0);$pdf->cell(10,5,$pdf->Dbnm('f',$row->IDCOM,'09',$_POST['annee']),1,0,'C',0);
// $pdf->cell(10,5,$pdf->Dbnm('m',$row->IDCOM,'10',$_POST['annee']),1,0,'C',0);$pdf->cell(10,5,$pdf->Dbnm('f',$row->IDCOM,'10',$_POST['annee']),1,0,'C',0);
// $pdf->cell(10,5,$pdf->Dbnm('m',$row->IDCOM,'11',$_POST['annee']),1,0,'C',0);$pdf->cell(10,5,$pdf->Dbnm('f',$row->IDCOM,'11',$_POST['annee']),1,0,'C',0);
// $pdf->cell(10,5,$pdf->Dbnm('m',$row->IDCOM,'12',$_POST['annee']),1,0,'C',0);$pdf->cell(10,5,$pdf->Dbnm('f',$row->IDCOM,'12',$_POST['annee']),1,0,'C',0);
// $pdf->cell(10,5,$pdf->Dbnm('m',$row->IDCOM,'1',$_POST['annee']) + $pdf->Dbnm('m',$row->IDCOM,'2',$_POST['annee']) + $pdf->Dbnm('m',$row->IDCOM,'3',$_POST['annee']) + $pdf->Dbnm('m',$row->IDCOM,'4',$_POST['annee']) + $pdf->Dbnm('m',$row->IDCOM,'5',$_POST['annee']) + $pdf->Dbnm('m',$row->IDCOM,'6',$_POST['annee']) + $pdf->Dbnm('m',$row->IDCOM,'7',$_POST['annee']) + $pdf->Dbnm('m',$row->IDCOM,'8',$_POST['annee']) + $pdf->Dbnm('m',$row->IDCOM,'9',$_POST['annee']) + $pdf->Dbnm('m',$row->IDCOM,'10',$_POST['annee']) + $pdf->Dbnm('m',$row->IDCOM,'11',$_POST['annee']) + $pdf->Dbnm('m',$row->IDCOM,'12',$_POST['annee']) ,1,0,'C',0);
// $pdf->cell(10,5,$pdf->Dbnm('f',$row->IDCOM,'1',$_POST['annee']) + $pdf->Dbnm('f',$row->IDCOM,'2',$_POST['annee']) + $pdf->Dbnm('f',$row->IDCOM,'3',$_POST['annee']) + $pdf->Dbnm('f',$row->IDCOM,'4',$_POST['annee']) + $pdf->Dbnm('f',$row->IDCOM,'5',$_POST['annee']) + $pdf->Dbnm('f',$row->IDCOM,'6',$_POST['annee']) + $pdf->Dbnm('f',$row->IDCOM,'7',$_POST['annee']) + $pdf->Dbnm('f',$row->IDCOM,'8',$_POST['annee']) + $pdf->Dbnm('f',$row->IDCOM,'9',$_POST['annee']) + $pdf->Dbnm('f',$row->IDCOM,'10',$_POST['annee']) + $pdf->Dbnm('f',$row->IDCOM,'11',$_POST['annee']) + $pdf->Dbnm('f',$row->IDCOM,'12',$_POST['annee']) ,1,0,'C',0);
// $pdf->setxy(5,$pdf->gety()+5); 
// }
// $pdf->SetXY(05,65);$pdf->cell(25,5,"Total",1,0,1,'L',0);
// $pdf->cell(10,5,$pdf->sumDbnm('m','1',$_POST['annee']),1,0,'C',1,0);$pdf->cell(10,5,$pdf->sumDbnm('f','1',$_POST['annee']),1,0,'C',1,0);
// $pdf->cell(10,5,$pdf->sumDbnm('m','2',$_POST['annee']),1,0,'C',1,0);$pdf->cell(10,5,$pdf->sumDbnm('f','2',$_POST['annee']),1,0,'C',1,0);
// $pdf->cell(10,5,$pdf->sumDbnm('m','3',$_POST['annee']),1,0,'C',1,0);$pdf->cell(10,5,$pdf->sumDbnm('f','3',$_POST['annee']),1,0,'C',1,0);
// $pdf->cell(10,5,$pdf->sumDbnm('m','4',$_POST['annee']),1,0,'C',1,0);$pdf->cell(10,5,$pdf->sumDbnm('f','4',$_POST['annee']),1,0,'C',1,0);
// $pdf->cell(10,5,$pdf->sumDbnm('m','5',$_POST['annee']),1,0,'C',1,0);$pdf->cell(10,5,$pdf->sumDbnm('f','5',$_POST['annee']),1,0,'C',1,0);
// $pdf->cell(10,5,$pdf->sumDbnm('m','6',$_POST['annee']),1,0,'C',1,0);$pdf->cell(10,5,$pdf->sumDbnm('f','6',$_POST['annee']),1,0,'C',1,0);
// $pdf->cell(10,5,$pdf->sumDbnm('m','7',$_POST['annee']),1,0,'C',1,0);$pdf->cell(10,5,$pdf->sumDbnm('f','7',$_POST['annee']),1,0,'C',1,0);
// $pdf->cell(10,5,$pdf->sumDbnm('m','8',$_POST['annee']),1,0,'C',1,0);$pdf->cell(10,5,$pdf->sumDbnm('f','8',$_POST['annee']),1,0,'C',1,0);
// $pdf->cell(10,5,$pdf->sumDbnm('m','9',$_POST['annee']),1,0,'C',1,0);$pdf->cell(10,5,$pdf->sumDbnm('f','9',$_POST['annee']),1,0,'C',1,0);
// $pdf->cell(10,5,$pdf->sumDbnm('m','10',$_POST['annee']),1,0,'C',1,0);$pdf->cell(10,5,$pdf->sumDbnm('f','10',$_POST['annee']),1,0,'C',1,0);
// $pdf->cell(10,5,$pdf->sumDbnm('m','11',$_POST['annee']),1,0,'C',1,0);$pdf->cell(10,5,$pdf->sumDbnm('f','11',$_POST['annee']),1,0,'C',1,0);
// $pdf->cell(10,5,$pdf->sumDbnm('m','12',$_POST['annee']),1,0,'C',1,0);$pdf->cell(10,5,$pdf->sumDbnm('f','12',$_POST['annee']),1,0,'C',1,0);
// $pdf->cell(10,5,$pdf->sumDbnm('m','1',$_POST['annee'])+$pdf->sumDbnm('m','2',$_POST['annee'])+$pdf->sumDbnm('m','3',$_POST['annee'])+$pdf->sumDbnm('m','4',$_POST['annee'])+$pdf->sumDbnm('m','5',$_POST['annee'])+$pdf->sumDbnm('m','6',$_POST['annee'])+$pdf->sumDbnm('m','7',$_POST['annee'])+$pdf->sumDbnm('m','8',$_POST['annee'])+$pdf->sumDbnm('m','9',$_POST['annee'])+$pdf->sumDbnm('m','10',$_POST['annee'])+$pdf->sumDbnm('m','11',$_POST['annee'])+$pdf->sumDbnm('m','12',$_POST['annee']),1,0,'C',1,0);
// $pdf->cell(10,5,$pdf->sumDbnm('f','1',$_POST['annee'])+$pdf->sumDbnm('f','2',$_POST['annee'])+$pdf->sumDbnm('f','3',$_POST['annee'])+$pdf->sumDbnm('f','4',$_POST['annee'])+$pdf->sumDbnm('f','5',$_POST['annee'])+$pdf->sumDbnm('f','6',$_POST['annee'])+$pdf->sumDbnm('f','7',$_POST['annee'])+$pdf->sumDbnm('f','8',$_POST['annee'])+$pdf->sumDbnm('f','9',$_POST['annee'])+$pdf->sumDbnm('f','10',$_POST['annee'])+$pdf->sumDbnm('f','11',$_POST['annee'])+$pdf->sumDbnm('f','12',$_POST['annee']),1,0,'C',1,0);
// }

// $pdf->SetXY(100,$pdf->GetY()+10);$pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
// $pdf->SetXY(100,$pdf->GetY()+5);$pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
?>