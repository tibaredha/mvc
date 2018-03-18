<?php
require('bnm.php');
$pdf = new bnm( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$ordre=$_POST['ordre'];
$ascdesc=$_POST['ascdesc'];
$annee=$_POST['annee'];
$COMMUNEN=$_POST['COMMUNEN'];
$nbrlimit=$_POST['nbrlimit'];
$mois=$_POST['mois'];
$date=date("d-m-y");

$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->SetXY(05,5); $pdf->cell(285,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",0,0,'C',0,0);
$pdf->SetXY(05,10);$pdf->cell(285,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
$pdf->SetXY(05,15);$pdf->cell(285,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
$pdf->SetXY(05,20);$pdf->cell(142,5,"SERVICE PREVENTION",0,0,'L',0,0);$pdf->cell(142,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
$pdf->SetXY(60,30);$pdf->cell(100,5,"Bordereau Numerique Mensuel",0,0,'L',0,0);
$h=40;
$pdf->SetXY(05,$h);$pdf->cell(20,5,"Annee",1,0,'C',1,0);
$pdf->cell(40,5,"Mois",1,0,'C',1,0);
$pdf->cell(40,5,"Commune",1,0,'C',1,0);
$pdf->cell(25,5,"Naissance",1,0,'C',1,0);
$pdf->cell(25,5,"Mort Nee",1,0,'C',1,0);
$pdf->cell(25,5,"Mariage",1,0,'C',1,0);
$pdf->cell(25,5,"Deces Jujement",1,0,'C',1,0);
$pdf->cell(25,5,"Deces Masculin",1,0,'C',1,0);
$pdf->cell(25,5,"Deces Feminin",1,0,'C',1,0);
$pdf->cell(35,5,"Deces Total",1,0,'C',1,0);
$pdf->SetXY(5,45); // marge sup 13
$db_host="localhost";
$db_name="MVC"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");                    
$query="select * from bordereau  where annee $annee AND mois $mois AND COMMUNEN $COMMUNEN order by $ordre $ascdesc limit $nbrlimit   "; //% %will search form 0-9,a-z  order by $ordre $ascdesc limit $nbrlimit
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
$pdf->SetFont('Times', '', 9);
while($row=mysql_fetch_object($resultat))
{
$pdf->cell(20,8,trim($row->annee),1,0,'C',0);
$pdf->cell(40,8,trim($row->mois),1,0,'C',0);
$pdf->cell(40,8,trim($pdf->nbrtostring('mvc','com','IDCOM',$row->COMMUNEN,'COMMUNE')),1,0,'L',0);
$pdf->cell(25,8,trim($row->nm1)+trim($row->nm2)+trim($row->nf1)+trim($row->nf2),1,0,'C',0);
$pdf->cell(25,8,trim($row->mnm1)+trim($row->mnf1),1,0,'C',0);
$pdf->cell(25,8,trim($row->m1)+trim($row->m2),1,0,'C',0);
$pdf->cell(25,8,trim($row->djm1)+trim($row->djf1),1,0,'C',0);
$pdf->cell(25,8,trim($row->dm1+$row->dm2+$row->dm3+$row->dm4+$row->dm5+$row->dm6+$row->dm7+$row->dm8+$row->dm9+$row->dm10+$row->dm11+$row->dm12+$row->dm13+$row->dm14+$row->dm15+$row->dm16+$row->dm17+$row->dm18+$row->dm19),1,0,'C',0);
$pdf->cell(25,8,trim($row->df1+$row->df2+$row->df3+$row->df4+$row->df5+$row->df6+$row->df7+$row->df8+$row->df9+$row->df10+$row->df11+$row->df12+$row->df13+$row->df14+$row->df15+$row->df16+$row->df17+$row->df18+$row->df19),1,0,'C',0);
$pdf->cell(35,8,trim($row->df1+$row->df2+$row->df3+$row->df4+$row->df5+$row->df6+$row->df7+$row->df8+$row->df9+$row->df10+$row->df11+$row->df12+$row->df13+$row->df14+$row->df15+$row->df16+$row->df17+$row->df18+$row->df19+$row->dm1+$row->dm2+$row->dm3+$row->dm4+$row->dm5+$row->dm6+$row->dm7+$row->dm8+$row->dm9+$row->dm10+$row->dm11+$row->dm12+$row->dm13+$row->dm14+$row->dm15+$row->dm16+$row->dm17+$row->dm18+$row->dm19),1,0,'C',0);
$pdf->SetXY(5,$pdf->GetY()+8); 
}
$pdf->SetFont('Times', 'B', 11);  
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(20,5,"total",1,0,'C',1,0);	  
$pdf->SetXY(25,$pdf->GetY());$pdf->cell(265,5,$totalmbr1."  "."Bordereaux",1,0,'C',1,0);				 
$pdf->SetXY(220,$pdf->GetY()+15);$pdf->cell(35,5,"Service prevention ",0,0,'C',0,0);
$pdf->SetXY(220,$pdf->GetY()+5);$pdf->cell(35,5,"Dr redha TIBA ",0,0,'C',0,0);	
$pdf->Output();