<?php
if ($_GET['MODESORTI'] =='') {
require('PDF0.php');
$pdf = new PDF0( 'L', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','two');//mode d affichage

$IDDNR=$_GET['IDDNR'];
$pdf->mysqlconnect();
$query1 = "select * from pat WHERE  id = '$IDDNR'    ";
$resultat1=mysql_query($query1);
while($result1=mysql_fetch_object($resultat1))
{
$pdf->SetTextColor(225,0,0);
$pdf->Text(5+10,12,$result1->NOM);
$pdf->Text(50+15,12,$result1->PRENOM);
$pdf->Text(100+34,12,$result1->DATENAISSANCE);
$A = substr($result1->DATENAISSANCE,6,4);$AGE    = date("Y")-$A;
$pdf->Text(180,12,$AGE);
$pdf->Text(223,12,date('Y-m-d'));
$pdf->Text(280,12,date('H:s'));
$pdf->SetTextColor(0,0,0);
}
$id=$_GET['id'];
$query = "select * from hosp WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->SetFont('aefurat','B',12);
$pdf->Text(5,4,"FEUILLE DE SURVEILLANCE");
$pdf->Text(210,4,"SERVICE : ".$pdf->nbrtostring("MVC","service","ids",$result->SERVICE,"servicefr"));
$pdf->Text(264,4,"NLIT : ".$pdf->nbrtostring("grh","lit","idlit",$result->NLIT,"nlit"));
}
$pdf->Text(5,12,"Nom:");
$pdf->Text(50,12,"Prénom:");
$pdf->Text(100,12,"Date De Naissance:");
$pdf->Text(170,12,"Age:"."_ _ _"."Ans");
$pdf->Text(210,12,"DATE:");
$pdf->Text(264,12,"HEURE:");
$pdf->RoundedRect(4,3,290,8, 2, $round_corner='1111', $style='', $border_style=array(),  $fill_color=array());
$pdf->RoundedRect(4,11,290,8, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect(4,19,290,8, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect(4,27,290,8, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect(4,35,290,8, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect(4,43,290,8, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect(4,51,290,9, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect(4,35,290,160, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect(4,60,31,135, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect(4,70,10,125, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect(14,70,11,125, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect(15+10,70,10,125, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetTextColor(0,0,255);
$pdf->Text(5,63,"Date :"); $pdf->Text(6,70,"T°");$pdf->Text(17,70,"TA");$pdf->Text(27,70,"DU");
$pdf->SetFont('aefurat', '', 10);
//ligne horizentale
for($i=60; $i<=195; $i += 10) 
{
$pdf->Line(35 ,$i,294 ,$i );
}
for($i=75; $i<=195; $i += 10) 
{
$pdf->Line(35 ,$i,294 ,$i );
}
//ligne verticale
for($i=40; $i<=290; $i += 10) 
{
$pdf->Line($i,70,$i,195);
}

for($i=35; $i<=290; $i += 10) 
{
$pdf->Line($i,19,$i,195);
}
for($i=0;$i<=25;$i +=1) 
{
$pdf->Text($i."3"+34,64,substr($pdf->datePlus(date('Y/m/d'),$i),8,2));
}
//temperature
$i=150;
$pdf->Text(7,105,"37");
$pdf-> SetDrawColor(225,0,0);
$pdf->SetLineWidth(1);
$pdf->Line(15 ,$i,294 ,$i );
$pdf->Text(7,$i-3,"37");
$pdf->SetDrawColor(0,0,255);
//ta
$i=130;
$pdf->Line(25,$i,294,$i);
$pdf->Text(17,$i-5,"110");
$pdf->Text(17,$i-10,"120");
$pdf->Text(17,$i-15,"130");
$pdf->Text(17,$i-20,"140");
$pdf->Text(17,$i-25,"150");
$pdf->Text(17,$i-30,"160");
$pdf->Text(17,$i-35,"170");
$pdf->Text(17,$i-40,"180");
$pdf->Text(17,$i-45,"190");
$pdf->Text(17,$i-50,"200");
$pdf->Text(17,$i-55,"210");
$pdf->Text(17,$i,"100");
$pdf->Text(17,$i+5,"090");
$pdf->Text(17,$i+10,"080");
$pdf->Text(17,$i+15,"070");
$pdf->Text(17,$i+20,"060");
$pdf->Text(17,$i+25,"050");
$pdf->Text(17,$i+30,"040");
$pdf->Text(17,$i+35,"030");
$pdf->Text(17,$i+40,"020");
$pdf->Text(17,$i+45,"010");
$pdf->Text(17,$i+50,"000");
$pdf->Output();
}
else
{
header('location: ../Pat/view/'.$_GET['IDDNR']);
}

?>



